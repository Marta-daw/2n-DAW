<?php

class view {
  
	//Array que ens permetrà afegir un text predefinit a la pestanya del navegador ('subtitle'),
	// establir quina capçalera tindra cada una de les taules que es mostraràn segons la vista indicada ('capcalera'),
	// i finalment també podem indicar a dins l'apartat de ('form') quins seran els 'label' i 'inputs' que utilitzarem en els nostres formularis
  private $diccionari = array (
    'subtitle' => array ('inici' => 'Inici',
						 'view1' => 'Tots els productes',
    					 'form_insert' => 'Inserir productes',
						 'view_insert' => 'Tots els productes', 
						 ),
    'capçalera' => array ('view1' => array('nom','categoria','preu','color'),
						 'view_insert' => array('id', 'nom','categoria','preu','color'),
						),
	'form' => array ('form_insert' => array('nom', 'categoria', 'preu', 'color'),
					),
  );


public function retornar_vista ($vista, $dades=array(), $message="") {
	
	if($vista == "ERROR"){
		$html = file_get_contents(__DIR__ . '/../site_media/html/products_template.html');
		$view = file_get_contents(__DIR__ . '/../site_media/html/error_template.html');
		$html = str_replace('{subtitle}', "ERROR", $html);
		$html = str_replace('{message}', $message, $html);
		$html = str_replace('{main}', $view, $html);
	}

	else{

		$html = file_get_contents(__DIR__ . '/../site_media/html/products_template.html');

	
		$html = str_replace('{subtitle}', $this->diccionari['subtitle'][$vista], $html);


		$html = str_replace('{message}', $message, $html);

		if ($vista=='view1'  || $vista=='view_insert') {
			$view = file_get_contents(__DIR__ . '/../site_media/html/view_template.html');
			$html = str_replace ('{main}', $view, $html);

			$capçalera = $this->buildHeader ($vista);
			$html = str_replace('{capçalera}', $capçalera,$html);

			$contingut = $this->buildContents ($dades);
			$html = str_replace('{contingut}', $contingut, $html);
		}

		if ($vista=='form_insert'){

			$view = file_get_contents(__DIR__ . '/../site_media/html/form_template.html');
			$html = str_replace ('{main}', $view, $html);

			$html = str_replace('{url}', 'view_insert', $html);

			$contingut = $this->buildForm ($vista);
			$html = str_replace('{contingut}', $contingut, $html);
		}
	}

	print $html;
} 


private function buildHeader ($vista) {
	$str = "";
	foreach ($this->diccionari['capçalera'][$vista] as $value) 
		$str .= "<th>" . $value . "</th>";
	return $str;
} 


private function buildContents ($dades) {
	$str = "";
	for ($i=0; $i<count($dades); $i++) {
		$str .= "<tr>";
		foreach ($dades[$i] as $value) 
			$str .= "<td>$value</td>";
		$str .= "</tr>";
	}
	return $str;
}


private function buildForm ($vista, $dades = array()) {
	$str = "";
	if(!empty($dades)){
		$count = count($dades[0]);
	}
	foreach ($this->diccionari['form'][$vista] as $value) {
		$str .= "<div> $value </div>";
		$str .= "<div><input type='text' name='$value' id='$value' required></div>";
		
	}
	return $str;
}

}
?>
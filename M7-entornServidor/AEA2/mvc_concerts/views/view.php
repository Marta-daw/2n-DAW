<?php

class view {
    private $diccionari = array (
        //Afegim el que necessitem per la 'consulta'
        'subtitle' => array (
            'iniciUser' => 'Inici Usuari',
            'iniciAdmin' => 'Inici Administrador',
            'form_select_byName' => 'Consulta de concerts per nom de banda',
            'view_select_byName' => 'Resultats de la consulta per nom de banda',
            'form_select_byDateRange' => 'Consulta de concerts entre dues dates',
            'view_select_byDateRange' => 'Concerts entre dues dates',
            'admin_form_insertConcerts' => 'Afegir nous concerts',
            'admin_view_insertConcerts' => 'Confirmació d\'afegir nous concerts',
            'admin_form_updateConcerts' => 'Modifica un concert',
            'admin_view_updateConcerts' => 'Coanfirmació de modificació de concert'
        ),
        'capçalera' => array (
            'view_select_byName' => array ('Grup', 'Ciutat', 'Sala', 'Data', 'Hora'),
            'view_select_byDateRange' => array ('Grup', 'Ciutat', 'Sala', 'Data', 'Hora'),
            'admin_view_insertConcerts' => array ('Confirmat'),
            'admin_view_updateConcerts' => array ('Modificat'),
        ),
        'form' => array (
            'form_select_byName' => array ('nomBanda'),
            'form_select_byDateRange' => array ('startDate', 'endDate'),
            'admin_form_insertConcerts' => array('grup', 'ciutat', 'sala', 'data', 'hora'),
            'admin_form_updateConcerts' => array('grup', 'ciutat', 'sala'),
        ),
    );

    public function retorna_vista ($vista, $template='User', $dades=array(), $message="Benvinguts a l'aplicació de concerts") {
        //Carreguem la plantilla
        $html= file_get_contents (__DIR__."/templates/inici".$template.".html"); //Utilitzar-ho aixi per fer dos templates de concerts.html diferents per a usuari i admin

        $html = str_replace('{subtitle}', $this->diccionari['subtitle'][$vista], $html);

        $html = str_replace('{message}', $message, $html);

        if($vista == 'form_select_byName' || $vista == 'form_select_byDateRange' || $vista == 'admin_form_insertConcerts' || $vista == 'admin_form_updateConcerts'){
            // the form template is read and its contents is included in the main template
            $form = file_get_contents(__DIR__ . '/templates/form_template.html');
            $html = str_replace ('{main}', $form, $html);

            $dadesFields = array(); //Array buit per defecte que passarem per paràmetre a buildForm

            if($vista == 'form_select_byName'){
                $html = str_replace('{url}', 'view_select_byName', $html);
            }

            if($vista == 'form_select_byDateRange'){
                $html = str_replace('{url}', 'view_select_byDateRange', $html);
            }

            if($vista == 'admin_form_insertConcerts'){
                $html = str_replace('{url}', 'admin_view_insertConcerts', $html);
            }

            if($vista == 'admin_form_updateConcerts'){
                $html = str_replace('{url}', 'admin_view_updateConcerts', $html);
            }

            $formulari = $this->buildForm ($vista, $dadesFields);
            $html = str_replace('{contingut}', $formulari, $html);
        }
        
        if (($vista == 'view_select_byName' && count($dades)>0) || ($vista == 'view_select_byDateRange' && count($dades)>0)){
            $view = file_get_contents(__DIR__ . '/templates/view_template.html');
            $html = str_replace ('{main}', $view, $html);

            $capçalera = $this->buildHeader ($vista);
            $html = str_replace('{capçalera}', $capçalera, $html);

            $contingut = $this->buildContents ($dades);
            $html = str_replace('{contingut}', $contingut, $html);
        }

        if ($vista == 'admin_view_insertConcerts' || $vista == 'admin_view_updateConcerts'){
            $view = file_get_contents(__DIR__ . '/templates/view_msg_template.html');
            $html = str_replace ('{main}', $view, $html);

            $cap = $this->buildHeader ($vista);
            $html = str_replace('{cap}', $cap, $html);

            $html = str_replace('{contingut}', $dades, $html);
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
    
    private function buildForm ($vista, $dades=array()) {
        $str = "";
        foreach ($this->diccionari['form'][$vista] as $value) {
            $valorActual=(count($dades)>0)?"value=".$dades[$value]:""; //Omplim el formulari amb les dades actuals si les rep per paràmetre
            $str .= "<div> $value </div>";
            $str .= "<div><input type='text' name='$value' id='$value' $valorActual></div>";
        }	
        return $str;
	}
}


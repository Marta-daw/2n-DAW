<?php

require_once 'model.php';
require_once 'view.php';

class controller {

	private $peticions = array('inici', 'view1', 'form_insert','view_insert');

	public function handler() {

		$event = 'inici';

		$uri = $_SERVER['REQUEST_URI'];
		echo $uri;

		foreach ($this->peticions as $peticio)
			if (strpos($uri, $peticio) == true)
				$event = $peticio;

		$prod = new products(); 

		$view = new view(); 

		switch ($event) {
			//Vista que tindrem a la nostra pàgina cada vegada que hi entrem i/o cada vegada que cliquem en aquesta opció
			case 'inici':
				$view->retornar_vista($event);
				break;
			
			// Al escullir aquesta opció, utilitzarà el mètode 'selectAll()' del model per agafar 
			// les dades de la BBDD, s'ho guardarà a la variable '$dades' i es passarà ala vista.
			case 'view1':
				$dades = $prod -> selectAll(array('nom', 'categoria', 'preu', 'color'));
				$view -> retornar_vista($event, $dades);
				break;
			
			// Al escullir aquesta opció, dibuixarem a la vista (view.php) el formulari per afegir un producte.
			case 'form_insert':
				$view -> retornar_vista($event);
				break;
			
			//Amb les dades rebudes del formulari, s'agafen les dades per fer un insert a la BBDD que es troba al
			//model (model.php) per seguidament recuperar les dades i mostrar-les a la vista (view.php)
			case 'view_insert':
				$prod -> insert(
					test_input( $_POST['nom']),
					test_input($_POST['categoria']),
					test_input($_POST['preu']),
					test_input($_POST['color']),
				);

				$dades = $prod -> selectAll(array('id', 'nom', 'categoria', 'preu', 'color'));
				$view -> retornar_vista ($event, $dades);
				break;
		}
		
	}
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
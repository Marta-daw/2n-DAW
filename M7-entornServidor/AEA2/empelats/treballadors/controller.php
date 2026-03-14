<?php

require_once 'model.php';
require_once 'view.php';

class controller {
  
  //rutes o esdeveniments possibles
  //view1: nom i edat
  //view2: nom i alçada
  //consulta: 
  private $peticions = array('view1', 'view2', 'form_select', 'view_select', 'form_insert', 'view_insert', 'form_searchPerson', 'form_update', 'view_update', 'form_delete', 'view_delete');
  
  public function handler () {
    
    // Què em demanen?
    $event = 'inici';
    
    // On som?
    $uri = $_SERVER['REQUEST_URI'];
    echo $uri;

    foreach ($this->peticions as $peticio) //Find the position of the first occurrence of a substring in a string
      if (strpos($uri,$peticio) == true)
        $event = $peticio;
          
    $per = new persones();
    
    $view = new view();
    
    switch ($event) {
        /* case 'view1':
          $dades = $per->selectAll(array("nom","edat"));
          $view->retornar_vista($event, $dades);
          break;
        
        case 'view2':
          $dades = $per->selectAll(array("nom","alcada"));
          $view->retornar_vista($event, $dades);
          break; */
        
        //CONSULTAR = Cas en el que volem veure les dades d'una persona.
        case 'form_select': //Esto es el action realmente
        $view->retornar_vista($event);
        break;
        
        case 'view_select':
        $dades = $per->select($_POST['nom']);
        $view->retornar_vista($event, $dades);
        break;
        
        //INSERT = Cas on volem inserir una nova persona i després veure les dades de totes les persones.
        case 'form_insert':
        $view->retornar_vista($event);
        break;
        
        case 'view_insert':
        //Consulta model per a inserir la nova persona
        $per->insert(array(
          'nom' => $_POST['nom'],
          'cognoms' => $_POST['cognoms'],
          'profession' => $_POST['profession'],
          'telefon' => $_POST['telefon']
        ));

        //Consulta model per a obtenir les dades de totes les persones
        $dades= $per->selectAll(array("nom","cognoms","profession", "telefon"));
        
        //Muestra vista amb les dades de totes les persones
        $view->retornar_vista($event, $dades);
        break;

        // UPDATE = Cas on volem actualitzar les dades d'una persona i veure-les.
        case 'form_searchPerson':
        $view -> retornar_vista($event);
        break;
        
        case 'form_update':
        $dades = $per -> select($_POST['nom']);
        $view -> retornar_vista($event, $dades);
        break;

        case 'view_update':
        $per -> update(array(
          'nom' => $_POST['nom'],
          'cognoms' => $_POST['cognoms'],
          'profession' => $_POST['profession'],
          'telefon' => $_POST['telefon']
        ));

        $dades = $per -> select($_POST['nom']);
        
        $view -> retornar_vista($event, $dades);
        
        break;
        
        //DELETE
        case 'form_delete':
        $view -> retornar_vista($event);
        break;
        
        case 'view_delete':
        $per -> delete ($_POST['nom']);

        $dades= $per->selectAll(array("nom","cognoms","profession", "telefon"));
        $view -> retornar_vista ($event, $dades);
        break;

        case 'inici':
            $view->retornar_vista($event, array());
            
        }
      
  }
}





?>
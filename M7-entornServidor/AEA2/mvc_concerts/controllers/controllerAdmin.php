<?php

require_once (__DIR__."/../models/Concerts.php");
require_once (__DIR__.'/../views/view.php');

echo "Benvingut al controllador de l'Admnistrador";

class controllerAdmin {
    private $peticiones = array('iniciAdmin', 'admin_form_insertConcerts', 'admin_view_insertConcerts', 'admin_form_updateConcerts', 'admin_view_updateConcerts');

    const VIEW = 'Admin'; //per diferenciar vistes d'usuari i admin

    public function handler() {
        //Que demana?
        $event = 'iniciAdmin';

        //on som?
        $uri = $_SERVER['REQUEST_URI'];
        //echo $uri;

        foreach ($this->peticiones as $peticio){
            if (strpos($uri,$peticio) == true)
                $event = $peticio;
        }

        $concerts = new concerts();

        $view = new view();

        switch ($event) {
            case 'iniciAdmin':
                $view->retorna_vista($event, self::VIEW);
                break;

            //Afegir concerts per part de l'administrador
            case 'admin_form_insertConcerts':
                // $view->retorna_vista($event);

                $view->retorna_vista($event, self::VIEW);
                break;
            
            case 'admin_view_insertConcerts':
                $concerts -> insert(array(
                    'grup' => $_POST['grup'],
                    'ciutat' => $_POST['ciutat'],
                    'sala' => $_POST['sala'],
                    'data' => $_POST['data'],
                    'hora' => $_POST['hora']
                ));

                $missatge = "Concert afegit correctament";
                $view -> retorna_vista($event, self::VIEW, $missatge);
                break;

            //Modificar concerts per part de l'administrador
            case 'admin_form_updateConcerts':
                $view->retorna_vista($event, self::VIEW);
                break; 
            
            case 'admin_view_updateConcerts':
                $concerts -> update(array(
                    'grup' => $_POST['grup'],
                    'ciutat' => $_POST['ciutat'],
                    'sala' => $_POST['sala']
                ));

                $missatge = "Concert modificat correctament";
                $view -> retorna_vista($event, self::VIEW, $missatge);
                break;
        }
    }
        
}

?>
<?php

require_once (__DIR__."/../models/Concerts.php");
require_once (__DIR__.'/../views/view.php');

echo "Benvingut al controllador d'usuari";

class controllerUser {

    private $peticiones = array('iniciUser', 'form_select_byName', 'view_select_byName', 'form_select_byDateRange', 'view_select_byDateRange');

    const VIEW = 'User'; //per diferenciar vistes d'usuari i admin

    public function handler() {
        //Que demana?
        $event = 'iniciUser';

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
            case 'iniciUser':
                $view->retorna_vista($event, self::VIEW);
                break;
                
            //Consultar per nom de banda
            case 'form_select_byName':
                //$view->retorna_vista($event);

                $view->retorna_vista($event, self::VIEW);
                break;
            
            case 'view_select_byName':
                $dades = $concerts -> select($_POST['nomBanda']);
                $view -> retorna_vista($event, self::VIEW, $dades);
                break;
            
            //Consulta per rang de  dates
            case 'form_select_byDateRange':
                $view->retorna_vista($event, self::VIEW);
                break;
            
            case 'view_select_byDateRange':
                $dades = $concerts -> selectByDateRange($_POST['startDate'], $_POST['endDate']);
                $view -> retorna_vista($event, self::VIEW, $dades);
                break;

        }
    }
        
}

?>
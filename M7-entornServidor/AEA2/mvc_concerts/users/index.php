<?php

// Controlador principal de l'aplicació
    error_reporting(-1);
    ini_set('display_errors','On');

    require_once "../controllers/controllerUser.php";

    $controller = new controllerUser();

    $controller->handler();

?>

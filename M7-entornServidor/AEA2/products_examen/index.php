<?php
  error_reporting(-1);
  ini_set('display_errors', '-1');

  require_once  "products/controller.php";

  $controller = new controller();

  $controller->handler();
?>
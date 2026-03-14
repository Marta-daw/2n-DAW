<?php

//Configuració de CORS per permetre que el frontend pugui accedir a aquesta API
header("Access-Control-Allow-Origin: *"); // Permet l'accés des de qualsevol origen (canviar a l'URL del frontend en producció)
header("Access-Control-Allow-Methods: POST"); // Permet només el mètode POST (canviar segons les necessitats: GET, PUT, DELETE, etc.)
header("Access-Control-Allow-Headers: Content-Type"); // Permet que el frontend enviï dades en format JSON
header("Content-Type: application/json"); // Especifica que la resposta serà en format JSON

// Lectura del JSON
$input = file_get_contents("php://input");
$dades = json_decode($input, true); // True per obtenir un array associatiu

// Montem la resposta de confirmació
$resposta = [
    "message" => "Dades rebudes correctament",
    "dades" => $dades
];

// Enviem la resposta generada en format JSON
echo json_encode($resposta);


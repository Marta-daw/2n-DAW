<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exercicis bàsics i estructures condicionals - pràcticar</title>
    </head>
<?php
/* 1.1 Crea un script PHP que calculi el preu final d'un producte aplicant un descompte segons aquestes condicions:
si el preu és superior a 100€, s'aplica un 15% de descompte;
si està entre 50€ i 100€, un 10%;
i si és inferior a 50€, un 5%.
Mostra el preu original, el descompte aplicat i el preu final. */

$preu=120;
$dto;
$preuAmbDto;

if($preu > 100){
    $dto= ($preu*15)/100;
    $preuAmbDto= $preu-$dto;
} elseif ($preu > 50 && $preu <=100){
    $dto = ($preu*10)/100;
    $preuAmbDto= $preu-$dto;
} elseif ($preu <= 50){
    $dto = ($preu*5)/100;
    $preuAmbDto= $preu-$dto;
}

echo "<h2>ACTIVITAT 1</h2>";
echo "El preu original és de ".$preu."€ <br>";
echo "El descompte aplicat és de ".$dto."€ <br>";
echo "El preu final és de ".$preuAmbDto."€";

// -------------------------------------------------------------------------------------------------------------------------
/* 1.2 Escriu un programa que determini si un any és de traspàs o no. Un any és de traspàs si és divisible per 4,
excepte els anys seculars (divisibles per 100), que només són de traspàs si també són divisibles per 400.
Mostra un missatge adequat per a l'any 2024 i 2100. */

$year1= 2024;
$year2= 2100;
define('YEAR_PREFIX', "L'any ");

echo "<h2>ACTIVITAT 2</h2>";

if ($year1%4 == 0 && $year1%400 == 0 || $year1%100 != 0){
    echo YEAR_PREFIX.$year1." va ser de traspàs<br>";
} else {
    echo YEAR_PREFIX.$year1." <strong>NO</strong> va ser de traspàs<br>";
}

if ($year2%4 == 0 && $year2%400 == 0 || $year2%100 != 0){
    echo YEAR_PREFIX.$year2." serà de traspàs";
} else {
    echo YEAR_PREFIX.$year2." <strong>NO</strong> serà de traspàs";
}

// -------------------------------------------------------------------------------------------------------------------------
/* 1.3 Desenvolupa un script que, donada una nota numèrica (0-10), mostri la qualificació corresponent:
Suspès (0-4.9), Aprovat (5-5.9), Notable (6-8.9), Excel·lent (9-10).
Si la nota està fora del rang, mostra un missatge d'error.
Utilitza l'estructura switch o if-elseif segons consideris més adequat.*/

define('NOTE_PREFIX',"La teva nota és ");
$nota= 7.1;

echo "<h2>ACTIVITAT 3</h2>";

switch ($nota):
    case $nota < 0:
        echo "La nota no pot ser negativa";
        break;
    case $nota < 5:
        echo NOTE_PREFIX.$nota." i has <b>suspès</b>";
        break;
    case $nota < 6:
        echo NOTE_PREFIX.$nota." i has <b>aprovat</b>";
        break;
    case $nota < 9:
        echo NOTE_PREFIX.$nota." i tens un <b>notable</b>";
        break;
    case $nota <= 10:
        echo NOTE_PREFIX.$nota." i tens un <b>Excel·lent</b>";
        break;
    default:
        echo "La nota no pot ser mes gran a 10";
        break;
    endswitch;

// -------------------------------------------------------------------------------------------------------------------------
/* 1.4 Crea un programa que calculi el cost d'un enviament segons el pes del paquet i la destinació.
Si és nacional: fins 1kg costa 5€, de 1 a 5kg costa 10€, més de 5kg costa 15€.
Si és internacional: multiplica els preus anteriors per 2.5.
El programa ha de demanar el pes i la destinació (nacional/internacional) i mostrar el cost total.*/

echo "<h2>ACTIVITAT 4</h2>";
?>
        <body>
            <form method="GET" action="<?php echo $_SERVER["PHP_SELF"];?>">
                Destinació: <input type="text" name="destinacio"><br>
                Pes (en kg): <input type="text" name="pes"><br>
                <input type="submit">
            </form>
        </body>
    </html>
<?php

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['destinacio']) && isset($_GET['pes'])){
        $destinacio= strtolower($_GET['destinacio']);
        $pes= $_GET['pes'];

        $preu=5;
        if ($destinacio == "nacional"){
            if ($pes < 1){
                echo "Per un enviament nacional d'un paquest de menys de 1kg el cost és de ".$preu." €";
            } elseif ($pes >= 1 && $pes< 5) {
                $preu *= 2;
                echo "Per un enviament nacional d'un paquest d'entre 1 i 5 kg el cost és de ".$preu." €";
            } elseif ($pes >= 5){
                $preu *= 3;
                echo "Per un enviament nacional d'un paquest de 5 kg o més el cost és de ".$preu." €";
            }
        } elseif ($destinacio == "internacional"){
            if ($pes < 1){
                $preu *= 2.5;
                echo "Per un enviament internacional d'un paquest de 1kg el cost és de ".$preu." €";
            } elseif ($pes >= 1 && $pes< 5) {
                $preu = ($preu * 2) * 2.5;
                echo "Per un enviament internacional d'un paquest d'entre 1 i 5 kg el cost és de ".$preu." €";
            } elseif ($pes >= 5){
                $preu = ($preu * 3) * 2.5;
                echo "Per un enviament internacional d'un paquest de 5 kg o més el cost és de ".$preu." €";
            }
        }
    } else {
        echo "La destinació no és correcte. Escull entre nacional i internacional";
    }
// -------------------------------------------------------------------------------------------------------------------------
/* 1.5 Escriu un script que determini la categoria d'edat d'una persona: Infant (0-12 anys), Adolescent (13-17),
Adult (18-64), Jubilat (65 o més). A més, si és adult i té exactament 18 anys, mostra un missatge especial de
"Acabes de ser major d'edat!". Gestiona els casos de edats negatives mostrant un error.*/

echo "<h2>ACTIVITAT 5</h2>";

$edat= 6;

switch ($edat):
    case $edat < 0:
        echo "Error! No pot ser una edat negativa.";
        break;
    case $edat <= 12:
        echo "Ets un <b>infant</b>.";
        break;
    case $edat <= 17:
        echo "Ets un <b>adolescent</b>.";
        break;
    case $edat <= 64:
        echo "Ets un <b>adult</b>.";
        
        if ($edat == 18){
            echo " Acabes de ser major d'edat!";
        }
        break;
    case $edat >= 65:
        echo "Ja estàs <b>jubilat</b>.";
        break;
    default:
        echo "ERROR!";
        break;
    endswitch;

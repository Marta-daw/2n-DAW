<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
/* 3.1 Crea una funció anomenada validarDNI($dni) que comprovi si un DNI espanyol és vàlid.
Ha de verificar que tingui 8 dígits seguits d'una lletra majúscula, i que la lletra sigui
correcta segons l'algorisme oficial (dividir el número per 23 i obtenir la lletra corresponent).
La funció ha de retornar true o false. */
echo "<h2>ACTIVITAT 1</h2>";

$dni="38871607C";

function validarDNI($dni){
    $num=substr($dni, 0, -1);
    $letra=substr($dni, -1);

    $letrasDni="TRWAGMYFPDXBNJZSQVHLCKE";

    $restoDni= $num%23;

    $letraCorrect=$letrasDni[$restoDni];

    return $letra === $letraCorrect;
}

if (validarDNI($dni)){
    echo "El dni ".$dni." és correcte";
} else {
    echo "El dni ".$dni." NO és correcte";
}


// -------------------------------------------------------------------------------------------------------------------------
/* 3.2 Desenvolupa una funció
generarContrasenya($longitud, $incloureMajuscules = true, $incloureNumeros = true, $incloureSimbols = false)
que generi una contrasenya aleatòria amb les característiques indicades pels paràmetres. Per defecte, ha
d'incloure minúscules, majúscules i números. */
echo "<h2>ACTIVITAT 2</h2>";

$longitud= 8;


function generarContrasenya($longitud){
    $caracteres="abcdefghijklmnopqrstuvwxyz1234567890_-.;,";
    $contrasena='';

    for ($i=0; $i<$longitud; $i++){
        $index=rand(0, strlen($caracteres)-1);
        $contrasena.=$caracteres[$index];
    }

    return "Nova contrasenya: ".$contrasena;
}

echo generarContrasenya($longitud);

// -------------------------------------------------------------------------------------------------------------------------
/* 3.3 Crea una funció calcularIVA($preu, $tipus = 21) que calculi el preu amb IVA inclòs.
Els tipus d'IVA possibles són: 21% (general), 10% (reduït), 4% (superreduït). La funció
ha de retornar un array associatiu amb: preu_base, iva, tipus_iva i preu_total. Si el
tipus no és vàlid, ha de llançar un missatge d'error. */
echo "<h2>ACTIVITAT 3</h2>";

$preu=15;

function calcularIVA($preu, $tipus = 21){
    $tipus_iva="";

    if ($tipus == 21){
        $tipus_iva="general";
    } elseif ($tipus == 10){
        $tipus_iva="reduït";
    } elseif ($tipus == 4){
        $tipus_iva="superreduït";
    }

    $reultatIva= ($preu*$tipus)/100;
    $preuAmbIva=$preu+$reultatIva;

    echo "Preu base: ".$preu." €<br>";
    echo "IVA: ".$tipus." %<br>";
    echo "El tipus d'iva és ".$tipus_iva."<br>";
    echo "El preu total amb iva és ".$preuAmbIva." €";
}

calcularIVA($preu);
// -------------------------------------------------------------------------------------------------------------------------
/* 3.4 Desenvolupa una funció recursiva factorial($n) que calculi el factorial d'un número.
La funció ha de validar que el número sigui enter positiu. Crea també una funció no recursiva
amb el mateix propòsit i compara els resultats de totes dues per als números 5, 10 i 15. */
echo "<h2>ACTIVITAT 4</h2>";

$n=5;

function factorial($n){
    if ($n < 0) {
        echo "ERROR en introduir el número";
    } elseif ($n==0 || $n==1){
        echo 1;
    } else {
        for ($i=$n-1; $i>=1; $i--){
            $n *= $i;
        }
        echo $n;
    }
}

factorial($n);

// -------------------------------------------------------------------------------------------------------------------------
/* 3.5 Escriu una funció analitzarText($text) que rebi una cadena de text i retorni un array associatiu amb:
número total de caràcters, número de paraules, número de vocals, número de consonants, i la paraula més llarga.
Prova la funció amb almenys dues frases diferents. */
echo "<h2>ACTIVITAT 5</h2>";
$text="Aqui guardem un text de prova";

function analitzarText($text){
    $numCaracteres= strlen($text);
    $numParaules=str_word_count($text);

    $vocals=0;
    $consonants=0;
    if (preg_match_all('/[aeiouAEIOU]/', $text, $matches)){
        $vocals= count($matches[0]);
    }
    if (preg_match_all('/[bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ]/', $text, $matches)){
        $consonants= count($matches[0]);
    }

    $palabraMasLarga=" ";
    $paraules=explode(" ", $text);

    foreach ($paraules as $x => $y){
        if (strlen($y)>strlen($palabraMasLarga)){
            $palabraMasLarga=$y;
        }
    }

    echo $numCaracteres."<br>";
    echo $numParaules."<br>";
    echo $vocals."<br>";
    echo $consonants."<br>";
    echo $palabraMasLarga;
    
}

analitzarText($text);
?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
/* 4.1 Crea un formulari de registre amb els camps: nom, cognom, email, contrasenya i confirmació de contrasenya.
Valida que tots els camps estiguin emplenats, que l'email tingui un format vàlid, que la contrasenya tingui
almenys 8 caràcters i que ambdues contrasenyes coincideixin. Mostra els errors de validació al costat de cada camp si escau. */
echo "<h2>ACTIVITAT 1</h2>";
?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <label> Nom: <input type="text" name="nom"></label><br>
        <label> Cognom: <input type="text" name="cognom"></label><br>
        <label> email: <input type="text" name="email"></label><br>
        <label> contrasenya: <input type="text" name="passwrd"></label><br>
        <input type="submit">
    </form>

<?php

if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['nom']) && isset($_POST['cognom']) && isset($_POST['email']) && isset($_POST['passwrd'])){
    $nom=$_POST['nom'];
    $cognom=$_POST['cognom'];
    $email=$_POST['email'];
    $passwrd=$_POST['passwrd'];

    define('ERROR_MSG', 'Error en el camp ');

    if (empty($nom)){
        echo ERROR_MSG."Nom: El camp no pot estar buit<br>";
    }
    if (empty($cognom)){
        echo ERROR_MSG."Cognom: El camp no pot estar buit<br>";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo ERROR_MSG."Email: Format d'email invàlid<br>";
    }
    if (empty($passwrd) || strlen($passwrd)<8){
        echo ERROR_MSG."Contrasenya: La contrasenya ha de tenir almenys 8 caràcters<br>";
    }
}

/* 4.2 Desenvolupa un formulari de cerca de llibres amb els següents camps: títol (text), autor (text), gènere (desplegable
amb opcions: ficció, no-ficció, ciència, història), any de publicació (número) i disponible (checkbox). Quan s'enviï el
formulari, mostra un resum de tots els criteris de cerca introduïts per l'usuari, tractant correctament els camps buits. */
echo "<h2>ACTIVITAT 2</h2>";
?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <label> Títol: <input type="text" name="title"></label><br>
        <label> Autor: <input type="text" name="author"></label><br>
        <label> Gènere:
            <select id="genere" name="genere">
                <option>Ficció</option>
                <option>No-ficció</option>
                <option>Ciència</option>
                <option>Història</option>
            </select>
        </label><br>
        <label> Any de publicació: <input type="number" name="publicacio"></label><br>
        <label> Disponible: <input type="checkbox" id="check1" name="dispo">Si</input><input type="checkbox" id="check2" name="dispo">No</input></label><br>
        <input type="submit">
    </form>
<?php

if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['title']) && isset($_POST['author']) && isset($_POST['genere']) && isset($_POST['publicacio']) && isset($_POST['dispo'])){
    echo "<h3>Resum de la cerca:</h3>";
    $title=$_POST['title'];
    $author=$_POST['author'];
    $genere=$_POST['genere'];
    $publicacio=$_POST['publicacio'];
    $dispo=$_POST['dispo'].$value;

    define('NO_ESPECIFICAT', 'No especificat');
    echo "El títol del llibre és: ".($title ? $title : NO_ESPECIFICAT)."<br>";
    echo "L'autor del llibre és: ".($author ? $author : NO_ESPECIFICAT)."<br>";
    echo "El gènere del llibre és: ".($genere ? $genere : NO_ESPECIFICAT)."<br>";
    echo "L'any de publicació és: ".($publicacio ? $publicacio : NO_ESPECIFICAT)."<br>";
    echo "El llibre està disponible: ".($dispo ? $dispo : NO_ESPECIFICAT);
}
/* 4.3 Crea un formulari de contacte amb els camps: nom, email, assumpte (desplegable: consulta, suggeriment, reclamació)
i missatge (textarea). Valida que el nom tingui almenys 3 caràcters, que l'email sigui vàlid, que s'hagi seleccionat
un assumpte i que el missatge tingui entre 20 i 500 caràcters. Manté els valors introduïts després de l'enviament si hi ha errors. */
echo "<h2>ACTIVITAT 3</h2>";

/* 4.4 Desenvolupa un formulari de reserva de restaurant amb: nom, telèfon, data de reserva, hora (desplegable amb franges horàries),
número de comensals (entre 1 i 10) i preferències alimentàries (checkboxes: vegetarià, vegà, celíac, sense lactosa).
Valida que la data sigui futura i que el telèfon tingui un format vàlid (9 dígits). Mostra un resum de la reserva després de validar. */
echo "<h2>ACTIVITAT 4</h2>";

/* 4.5 Crea un formulari de càlcul d'IMC (Índex de Massa Corporal) amb els camps: nom, pes (en kg), alçada (en cm) i
sexe (radio buttons: home/dona). Calcula l'IMC (pes / (alçada en metres)²) i mostra el resultat amb la interpretació:
Baix pes (<18.5), Normal (18.5-24.9), Sobrepès (25-29.9), Obesitat (>=30). Valida que el pes i l'alçada siguin números positius. */
echo "<h2>ACTIVITAT 5</h2>";
?>

</body>
</html>

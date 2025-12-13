<?php
/* 2.1 Crea un array associatiu amb 5 alumnes i les seves notes (noms com a claus, notes com a valors).
Recorre l'array i mostra per a cada alumne si ha aprovat (nota >= 5) o suspès.
Al final, mostra la nota mitjana de la classe i quants alumnes han aprovat. */
echo "<h2>ACTIVITAT 1</h2>";

$alumnes = array(
    "Maria" => 7.2,
    "Pere" => 9.8,
    "Marc" => 3.05,
    "Cristina" => 6.15,
    "Faviola" => 4.7
);

$i=0;
$aprovats= 0;
$notes=0;

foreach($alumnes as $x => $y) {
    if ($y>= 5){
        echo $x." has aprovat<br>";
        $aprovats++;
    } else {
        echo $x." has suspès<br>";
    }

    $notes+= $y;
    $i++;
}

echo "<br>Han aprovat un total de ".$aprovats." alumnes<br>";
echo "La nota mitjana dels alumnes és ".($notes/$i);

// -------------------------------------------------------------------------------------------------------------------------
/* 2.2 Genera un array amb 10 números aleatoris entre 1 i 50. Ordena'l de menor a major i mostra:
l'array original, l'array ordenat, el número més gran, el més petit, i la suma de tots els
números parells que contingui. */
echo "<h2>ACTIVITAT 2</h2>";

$arrayNum= array();

for ($i=0; $i<10; $i++){
    $numAleatori= rand(1,50);
    array_push($arrayNum, $numAleatori);
}

echo "<b>Array original: </b>".implode(", ", $arrayNum);

/* sort($arrayNum);
echo "<br><b>Array ordenada: </b>";
foreach ($arrayNum as $key => $value){
    echo $value.", ";
} */

$arrayOrd=$arrayNum;
sort($arrayOrd);
echo "<br><b>Array ordenada: </b>".implode(", ", $arrayOrd);

echo "<br><b>Nombre més gran: </b>".max($arrayNum);
echo "<br><b>Nombre més petit: </b>".min($arrayNum);

$sum=0;
foreach ($arrayNum as $key => $value){
    if($value%2==0){
        $sum+=$value;
    }
}
echo "<br><b>La suma dels valors de l'array són </b>".$sum;

// -------------------------------------------------------------------------------------------------------------------------
/* 2.3 Crea un array multidimensional que representi un inventari de 4 productes.
Cada producte ha de tenir: nom, preu, stock i categoria. Recorre l'array i mostra
els productes en format taula HTML. Marca en vermell aquells productes amb stock
inferior a 10 unitats i calcula el valor total de l'inventari. */
echo "<h2>ACTIVITAT 3</h2>";

$productes=array(
    array("nom" => "Taronja", "preu" => 1.5, "stock" => 25, "categoria" => "Fruita"),
    array("nom" => "Estoig", "preu" => 3, "stock" => 9, "categoria" => "Papeleria"),
    array("nom" => "Plàtan", "preu" => 2, "stock" => 3, "categoria" => "Fruita"),
    array("nom" => "Llibreta a5", "preu" => 2.5, "stock" => 23, "categoria" => "Papeleria")
);

echo "<table border='1' style='text-align: center'>";
$sum=0;

foreach($productes as $clue => $value){
    echo "<tr>";
    if ($value['stock'] < 10){
        echo "<tr style='background-color: red'>";
        echo "<td>".$value['nom']."</td><td>".$value['preu']."</td><td>".$value['stock']."</td><td>".$value['categoria']."</td>";
        echo "</tr>";
    } else {
        echo "<tr>";
        echo "<td>".$value['nom']."</td><td>".$value['preu']."</td><td>".$value['stock']."</td><td>".$value['categoria']."</td>";
        echo "</tr>";
    }

    $sum+=$value['stock'];
}
echo "</table>";
echo "<br> La suma d'estoc és ".$sum;

// -------------------------------------------------------------------------------------------------------------------------
/* 2.4 Escriu un programa que creï dos arrays: un amb 5 fruites i un altre amb 5 colors.
Utilitzant bucles, genera totes les combinacions possibles entre fruites i colors
(exemple: "poma vermella", "poma verda", etc.) i emmagatzema-les en un nou array.
Mostra el total de combinacions generades. */
echo "<h2>ACTIVITAT 4</h2>";

$fruits=array("poma", "pera", "maduixa", "pinya", "cirera");

$color=array("vermella", "verda", "groga", "taronja", "marró");

$arrayFruitColor= array();
$nombre;
for ($i=0; $i<count($fruits); $i++){
    for ($j=0; $j<count($color); $j++){
        $nombre=$fruits[$i]." ".$color[$j];
        array_push($arrayFruitColor, $nombre);
    }
}

foreach ($arrayFruitColor as $clue => $value){
    echo $value."<br>";
}

// -------------------------------------------------------------------------------------------------------------------------
/* 2.5 Desenvolupa un script que generi la taula de multiplicar del 1 al 10 utilitzant bucles niats.
Mostra el resultat en format taula HTML on les files representin el multiplicand i les columnes el multiplicador.
Aplica estils CSS per fer la taula més llegible (capçaleres destacades, colors alterns per files). */
echo "<h2>ACTIVITAT 5</h2>";

$num=4;

$n=1;

for ($i=0; $i<10; $i++){
    $res=$num*$n;
    echo $num." * ".$n." = ".$res."<br>";

    $n++;
}


<?php

echo "<!DOCTYPE html>
<html>
<body>";
define("PI", 3.141592);
$x = 5;
$y = 9;
echo "<h1>Hola mundo!</h1>";
$suma = $x+$y;

echo "la suma de ".$x. " y ".$y. " = ".$suma;
echo "<br>";
echo "PI value ".PI;

function saludar ($nombre){

    
    echo "<br> Hola ".$nombre;

}

saludar("Fonsi");

if($x > $y){
    echo "<br>" .$x. "es mayor que ".$y;
}else if ($x == $y || $x < $y){
    echo "<br>".$x. " es menor o igual que ".$y;
}

echo "</body>
</html>";


?>
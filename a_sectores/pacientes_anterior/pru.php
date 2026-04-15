<?php

$arr1 = array("a" => 1, "b" => 2, "c" => 3);
$arr2 = array("x" => 4, "y" => 5, "z" => 6);

foreach ($arr1 as $key => &$val) {}
foreach ($arr2 as $key => $val) {}

var_dump($arr1);
var_dump($arr2);

$cadena = "Esta es la cadena de ejemplo para sustituir un caracter";
echo $cadena;
$resultado = str_replace("a", "", $cadena);
echo "La cadena resultante es: " . $resultado;
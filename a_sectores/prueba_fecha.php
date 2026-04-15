<?php


$a = date("Y-m-d");
$b = '2013-07-01';

echo "<br>";

$fecha1 = new DateTime($a);
$fecha2 = new DateTime($b);
$fecha = $fecha1->diff($fecha2);

 $a = $fecha->y;
 $m = $fecha->m;
 $d = $fecha->d;

if ($m > 3){
echo $a;
}else
{
echo "b";
}






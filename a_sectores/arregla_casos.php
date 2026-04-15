<?php

include ("../conexiones/config.inc.php");


$sql2="select * from casos";
$result2 = $db->Execute($sql2);

$nro_orden = 0;

if (!$result2) die("fallo".$db->ErrorMsg());
 while (!$result2->EOF) {



$practica1=strtoupper($result2->fields["practica1"]);
$cod_operacion=strtoupper($result2->fields["cod_operacion"]);
$practica2=strtoupper($result2->fields["practica2"]);



echo $sql8="select practica from convenio_practica where cod_practica = '$practica1' ";
$result8 = $db->Execute($sql8);
$nombre_practica1=$result8->fields["practica"];


echo $sql8="select practica from convenio_practica where cod_practica = '$practica2' ";
$result8 = $db->Execute($sql8);
$nombre_practica2=$result8->fields["practica"];


echo  $sql = "UPDATE casos SET nombre1 = '$nombre_practica1' , nombre2 = '$nombre_practica2'  WHERE cod_operacion = $cod_operacion";
$result = $db->Execute($sql);
echo "<br>";

$result2->MoveNext();

	}


 
?>



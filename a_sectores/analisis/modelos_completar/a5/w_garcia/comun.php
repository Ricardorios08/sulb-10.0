<?php 
$sql111="select * from detalle_referencia where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result111 = $db->Execute($sql111);


 $valor=$result111->fields["valor"];
 $valor1=$result111->fields["valor"];
$referencia=$result111->fields["referencia"];
$referencia1=$result111->fields["referencia1"];
$referencia2=$result111->fields["referencia2"];
$referencia3=$result111->fields["referencia3"];


$observaciones=$result111->fields["observaciones"];

if ($nro_practica == 343){
$hierro_reservado = $valor;
}

 

if ($nro_practica == 875){
$saturacion = ($hierro_reservado * 70.9)/$valor;
}



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result111 = $db->Execute($sql11);
$nombre_practica=strtoupper($result111->fields["practica"]);
 
$unidad=$result111->fields["unidad"];

$salto=$result111->fields["salto"];

$metodo=$result111->fields["metodo"];
//$metodo = nl2br( stripslashes( htmlentities($metodo)));

$det = substr($nombre_practica,0,22);

$tipo_det=$result111->fields["tipo_det"];



 
include ("titulo_practica.php");


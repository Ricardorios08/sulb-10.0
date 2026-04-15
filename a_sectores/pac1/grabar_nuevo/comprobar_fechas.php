<?php  if ($nro_orden == ""){
	$nro_orden = "S/N";
 } 


if (is_numeric($dia)==FALSE) {
$leyenda = "FECHA INVALIDA";
include ("../../../alertas/campo_vacio.php");
exit;
}

if (($dia < 0) or ($dia > 31)){
$leyenda = "FECHA INVALIDA";
include ("../../../alertas/campo_vacio.php");
exit;
}


if (is_numeric($mes)==FALSE) {
$leyenda = "FECHA INVALIDA";
include ("../../../alertas/campo_vacio.php");
exit;
}

if (($mes < 0) or ($mes > 12)){
 $leyenda = "FECHA INVALIDA";
include ("../../../alertas/campo_vacio.php");
exit;
}


?>
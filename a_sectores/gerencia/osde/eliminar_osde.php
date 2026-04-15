<?php
include ("../../../conexiones/config.inc.php");

$cod_operacion = $_REQUEST['cod_operacion'];


 $SQL="Delete From datos_osde where cod_operacion = $cod_operacion";
$db->Execute($SQL);

$leyenda = "SE ELIMINO EL CUIT";
include ("../../../alertas/campo_informacion.php");

include ("datos_osde.php");	
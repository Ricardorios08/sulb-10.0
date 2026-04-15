<?php

include ("../../conexiones/config.inc.php");

$cod_operacion = $_REQUEST['cod_operacion'];
$cod_grabacion = $_REQUEST['cod_grabacion'];

 


$SQL="Delete From detalle_complejos where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);



 $SQL="Delete From detalle where cod_operacion = $cod_operacion";
$db->Execute($SQL);

 $SQL="Delete From detalle_referencia where cod_operacion = $cod_operacion";
$db->Execute($SQL);

//$SQL="Delete From detalle_hemoglobina where cod_grabacion = $cod_grabacion";
//$db->Execute($SQL);


















$SQL="Delete From detalle_fosforo where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_iono_urinario where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_proteino where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);







//$leyenda = "SE ELIMINO LA ORDEN Y SUS RESULTADOS";
//include ("../../alertas/campo_informacion.php");

$banderin = 2;
$palabra = $nro_paciente;
include ("emision_mod.php");
?>



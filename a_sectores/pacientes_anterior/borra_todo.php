<?php

include ("../../conexiones/config.inc.php");

$nro_paciente = $_REQUEST['nro_paciente'];
$tipo_operador = $_REQUEST['tipo_operador'];


$sql="select * from ordenes where nro_paciente = $nro_paciente and confirmada = 10";
$result = $db->Execute($sql);

$nro_pac=$result->fields["nro_paciente"];


if ($nro_pac == ""){

$SQL="Delete From pacientes where nro_paciente= $nro_paciente";
$db->Execute($SQL);
}


$SQL="Delete From ordenes where nro_paciente = $nro_paciente and confirmada != 10";
$db->Execute($SQL);
$SQL="Delete From detalle where nro_paciente = $nro_paciente and confirmada != 10";
$db->Execute($SQL);
$SQL="Delete From detalle where nro_paciente = $nro_paciente";
$db->Execute($SQL);
$SQL="Delete From detalle_fecal where nro_paciente = $nro_paciente";
$db->Execute($SQL);
$SQL="Delete From detalle_hemo where nro_paciente = $nro_paciente";
$db->Execute($SQL);
$SQL="Delete From detalle_hemoglobina where nro_paciente = $nro_paciente";
$db->Execute($SQL);
$SQL="Delete From detalle_orina where nro_paciente = $nro_paciente";
$db->Execute($SQL);
$SQL="Delete From detalle_referencia where nro_paciente = $nro_paciente";
$db->Execute($SQL);


$leyenda = "SE ELIMINO EL PACIENTE CON TODA SU HISTORIA CLINICA";
include ("../../alertas/campo_informacion.php");

$band = 1;
$bande = 2;
$palabra = $nro_paciente;
 
/*
if ($tipo_operador == "val"){
include ("buscar_paciente_individual_validar.php");
}else{
include ("buscar_paciente_individual.php");
}
*/
?>



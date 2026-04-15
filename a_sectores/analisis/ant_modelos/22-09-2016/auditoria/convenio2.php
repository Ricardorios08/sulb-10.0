<?php 

include ("../../conexiones/config.inc.php");
$sql="select * from arancel where nro_os = $nro_os";
$result = $db->Execute($sql);
 
$modalidad=ucwords($result->fields["modalidad"]);
$vuh=ucwords($result->fields["uh"]);
$vug=ucwords($result->fields["ug"]);

$modalidad_especiales=ucwords($result->fields["modalidad_especiales"]);
$vuh_especiales=ucwords($result->fields["uh_especiales"]);
$vug_especiales=ucwords($result->fields["ug_especiales"]);

$modalidad_alta=ucwords($result->fields["modalidad_alta"]);
$vuh_alta=ucwords($result->fields["uh_alta"]);
$vug_alta=ucwords($result->fields["ug_alta"]);


$vuh1=ucwords($result->fields["uh"]);
$vug1=ucwords($result->fields["ug"]);


$sql11="select * from incremento where nro_os = $nro_os";
$result11 = $db->Execute($sql11);

$material_descartable=ucwords($result11->fields["material_descartable"]);
$acto_bioquimico=ucwords($result11->fields["acto_bioquimico"]);
$toma_muestra=ucwords($result11->fields["toma_muestra"]);

$sql12="select * from op_facturacion where nro_os = $nro_os";
$result12 = $db->Execute($sql12);

$operacion=ucwords($result12->fields["operacion"]);
$porc_gastos=ucwords($result12->fields["gastos"]);
$porc_honorarios=ucwords($result12->fields["honorarios"]);

$coseguro=ucwords($result12->fields["coseguro"]);
$valor_porcentaje=ucwords($result12->fields["valor_porcentaje"]);

$coseguro_esp=$result12->fields["coseguro_esp"];
$valor_porc_esp=$result12->fields["valor_porc_esp"];

$coseguro_comp=ucwords($result12->fields["coseguro_comp"]);
$valor_porc_comp=ucwords($result12->fields["valor_porc_comp"]);


$coseguro_esp=ucwords($result12->fields["coseguro"]);
$valor_porc_esp=ucwords($result12->fields["valor_porcentaje"]);

$coseguro_comp=ucwords($result12->fields["coseguro"]);
$valor_porc_comp=ucwords($result12->fields["valor_porcentaje"]);

$vuh1 = $vuh1." + ".$porc_honorarios." %";
$vug1 = $vug1." + ".$porc_gastos." %";

if ($operacion == "SUMA"){
$porc_vuh = (($vuh * $porc_honorarios)/100);
$vuh = $vuh + $porc_vuh;
$porc_vug = (($vug * $porc_gastos)/100);
$vug = $vug + $porc_vug;
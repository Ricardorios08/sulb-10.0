<?php 
include ("../../../conexiones/config.inc.php");

$sql="select * from arancel where nro_os = $nro_os";
$result_convenio = $db->Execute($sql);
 
$modalidad=ucwords($result_convenio->fields["modalidad"]);
$vuh=$result_convenio->fields["uh"];
$vug=$result_convenio->fields["ug"];

$modalidad_especiales=ucwords($result_convenio->fields["modalidad_especiales"]);
$vuh_especiales=ucwords($result_convenio->fields["uh_especiales"]);
$vug_especiales=ucwords($result_convenio->fields["ug_especiales"]);

$modalidad_alta=ucwords($result_convenio->fields["modalidad_alta"]);
$vuh_alta=ucwords($result_convenio->fields["uh_alta"]);
$vug_alta=ucwords($result_convenio->fields["ug_alta"]);


$vuh1=$result_convenio->fields["uh"];
$vug1=$result_convenio->fields["ug"];



$sql11="select * from incremento where nro_os = $nro_os";
$result_convenio11 = $db->Execute($sql11);

$material_descartable=ucwords($result_convenio11->fields["material_descartable"]);
$acto_bioquimico=ucwords($result_convenio11->fields["acto_bioquimico"]);
$toma_muestra=ucwords($result_convenio11->fields["toma_muestra"]);


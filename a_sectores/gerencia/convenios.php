<?php 
include ("../../conexiones/config.inc.php");
$nro_os = $_REQUEST['nro_os'];

$sql="select * from datos_os where nro_os like '$nro_os'";
$result = $db->Execute($sql);
  
 $sigla=ucwords($result->fields["sigla"]);
 $domicilio_l=ucwords($result->fields["domicilio_l"]);
 $denominacion=ucwords($result->fields["denominacion"]);
 $cuit=ucwords($result->fields["cuit"]);

$sql1="select * from convenios where nro_os like '$nro_os'";
$result1 = $db->Execute($sql1);
$nro_os=ucwords($result1->fields["nro_os"]); 
$nro_os=ucwords($result->fields["nro_os"]);

$sql1="select * from facturar_con where nro_os like '$nro_os'";
$result1 = $db->Execute($sql1);
$nro_os_facturar=ucwords($result1->fields["nro_os_facturar"]); 

include ("convenio_mod.php");

?>
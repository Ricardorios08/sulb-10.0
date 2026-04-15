<?php

include("../../../conexiones/config.inc.php");
require_once("../../../nusoap/lib/nusoap.php");

$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('requisitos', $param1);

  $sql = "TRUNCATE TABLE requisitos_os";
 $result = $db->Execute($sql);

$hoy = date("Y-m-d");

  $a = "INSERT INTO `requisitos_os` (`nro_os` ,`denominacion` ,`sigla` ,`requisitos` ,`version` ,`suspendido` ,`vigencia` ,`comunes` ,`especiales` ,`alta` ,`antibiograma` ,`diagnostico` ,
`planes` ,`info_planes` ,`planes_rechazados` ,`motivo_rechazo`) VALUES ".$response;
 $result = $db->Execute($a);


$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('rechazadas', $param1);

  $sql = "TRUNCATE TABLE a_practicas_rechazadas";
 $result = $db->Execute($sql);

$hoy = date("Y-m-d");

 $a = "INSERT INTO `a_practicas_rechazadas`  (`nro_os`, `cod_practica`, `motivo`, `fecha` , `tipo`) VALUES ".$response;
 $result = $db->Execute($a);


$leyenda = "SE ACTUALIZARON LOS REQUISITOS A LA FECHA";
include("../../../alertas/campo_informacion.php");
?>

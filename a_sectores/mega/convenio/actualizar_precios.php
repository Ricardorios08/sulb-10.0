<?php

include("../../../conexiones/config.inc.php");
require_once("../../../nusoap/lib/nusoap.php");

$wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('mega', $param1);

  $sql = "TRUNCATE TABLE precio_derivaciones";
 $result = $db->Execute($sql);

  $sql = "TRUNCATE TABLE fecha_actualizacion_mega";
 $result = $db->Execute($sql);

$hoy = date("Y-m-d");

   $a = "INSERT INTO fecha_actualizacion_mega ( `fecha_actualizacion`  ) VALUES ('$hoy')";
 $result = $db->Execute($a);

   $a = "INSERT INTO precio_derivaciones ( `cod_practica`  , `descripcion` ,`laboratorio_realizacion` , `precio` ,`cod_operacion` ,`metodo`) VALUES ".$response;
 $result = $db->Execute($a);


$leyenda = "SE ACTUALIZARON LOS PRECIOS A LA FECHA";
include("../../../alertas/campo_informacion.php");
?>

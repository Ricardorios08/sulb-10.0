<?php 
global $bandera_borrar;
include ("../../../conexiones/config_gb.php");


$sql="Delete From detalle_temp";
mysql_query($sql);

$sql="Delete From grabadas_temp";
mysql_query($sql);


$leyenda = "SE BORRO EL TEMPORAL DE TODOS LOS GRABADORES";
include ("../../../alertas/campo_informacion.php");
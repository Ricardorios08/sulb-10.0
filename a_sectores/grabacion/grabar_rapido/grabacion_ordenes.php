<?php
include ("../../../conexiones/config.inc.php");
$nro_os = $_REQUEST['nro_os'];
$nombre= $_REQUEST['nombre'];
$nro_afiliado = $_REQUEST['nro_afiliado'];
$sigla = $_REQUEST['sigla'];


$sql="select * from datos_orden";
$result = $db->Execute($sql);

$orden=strtoupper($result->fields["orden"]);

if ($orden == "SI"){
include ("grabacion_ordenes_completo.php");
}else{
include ("grabacion_ordenes_reducido.php");
}
?>
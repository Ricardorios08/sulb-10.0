<?php
include ("../../../conexiones/config.inc.php");

 $usuario = $_REQUEST['usuario'];
$tipo_operador = $_REQUEST['tipo_operador'];

$sql="select * from datos_orden";
$result = $db->Execute($sql);

 $orden=strtoupper($result->fields["orden"]);

if ($orden == "SI"){
include ("grabacion_ordenes_completo.php");
}else{
include ("grabacion_ordenes_reducido.php");
}
?>
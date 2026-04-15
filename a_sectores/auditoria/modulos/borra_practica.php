<?php 
include ("../../../conexiones/config.inc.php");

$cod_operacion = $_REQUEST['cod_operacion'];
$cod_practica = $_REQUEST['cod_practica'];


$sql10="DELETE from deta_modulo where cod_operacion = $cod_operacion";
$result10 = $db->Execute($sql10);

echo "sdfsd".$palabra = "poner";
include ("agregar_practica.php");
?>
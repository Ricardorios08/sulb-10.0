<?php 

include ("../../../conexiones/config.inc.php");

echo "fdsfsd".$cod_modulo=$_POST["cod_modulo11"];



echo $sql10="select * from deta_modulo where cod_modulo = $cod_modulo";
$result10 = $db->Execute($sql10);

$cod_practica=strtoupper($result10->fields["cod_practica"]);

IF ($cod_practica != ""){
$leyenda = "SE GRABO EL MODULO";
include ("../../../alertas/campo_informacion.php");

}else
{
$leyenda = "NO SE GRABO EL MODULO POR QUE NO INGRESO PRACTICAS";
include ("../../../alertas/campo_informacion.php");
include ("agregar_practica.php");

$sql10="DELETE from modulo where modulo = $cod_modulo";
$result10 = $db->Execute($sql10);

}
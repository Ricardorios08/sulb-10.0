<?php 

 

$binario_nombre_temporal=$_FILES['archivo']['tmp_name'];
$tipo= $_REQUEST['tipo'];

$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];
$cuit_agente = $_REQUEST['cuit_agente'];


$dia_orden = $_REQUEST['dia_orden'];
$mes_orden = $_REQUEST['mes_orden'];
$anio_orden = $_REQUEST['anio_orden'];

$fecha_orden = $anio_orden."-".$mes_orden."-".$dia_orden;


$modul=$_POST["modulo"];
	for ($i=0;$i<count($modul);$i++)    
	{     
	$modulo = $modul[$i];    
	}

include ("cargar_cuota_venta.php");

/*
echo "fdgdfgdfgdf".$tipo;
if ($binario_nombre_temporal != ""){
if ($tipo == 1){
include ("cargar_cuota_venta.php");}
elseIF ($tipo == 2){
include ("cargar_cuota_compra.php");
}ELSEIF ($tipo == 3){
include ("cargar_alicuota_compra.php");
}ELSEIF ($tipo == 4){
include ("cargar_alicuota_venta.php");
}


}
*/






?>
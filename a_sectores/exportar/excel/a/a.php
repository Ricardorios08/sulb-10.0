<?php 

 $binario_nombre_temporal=$_FILES['archivo']['tmp_name'] ;

$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];

$dia_orden = $_REQUEST['dia_orden'];
$mes_orden = $_REQUEST['mes_orden'];
$anio_orden = $_REQUEST['anio_orden'];

$fecha_orden = $anio_orden."-".$mes_orden."-".$dia_orden;


$modul=$_POST["modulo"];
	for ($i=0;$i<count($modul);$i++)    
	{     
	$modulo = $modul[$i];    
	}




if ($binario_nombre_temporal != ""){
include ("cargar_cuota.php");
}



?>
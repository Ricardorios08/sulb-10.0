<?php 
$nro_os=$_REQUEST ['nro_os'];
$buscar_po=$_REQUEST ['buscar_por'];
$nro_factura=$_REQUEST ['nro_factura'];
$anio=$_REQUEST ['anio'];


$buscar_po=$_POST["buscar_por"];
	for ($i=0;$i<count($buscar_po);$i++)    
	{     
	$buscar_por = $buscar_po[$i];    
	}

	$me=$_POST["mes"];
	for ($i=0;$i<count($me);$i++)    
	{     
	$mes= $me[$i];    
	}

$orde=$_POST["orden"];
	for ($i=0;$i<count($orde);$i++)    
	{     
	$orden= $orde[$i];    
	}


$buscar_por;

//$nro_factura=$_REQUEST ['nro_factura'];

$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";

switch ($buscar_por){

	
		case "imprimir":
	{
					$estado = 'PENDIENTE';
		include ("todas_imp.php");
		break;
	}

	case "facturar":
	{
	$estado = 'PENDIENTE';
	include ("facturar.php");
	break;
	}


case "ordenes":
	{
	$estado = 'PENDIENTE';
	include ("ordenes.php");
	break;
	}



}


$hoy = date("d/m/y");


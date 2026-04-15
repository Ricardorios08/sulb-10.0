<?php 

include ("../../conexiones/config_gb.php");
$cod_grabacion = $_REQUEST['cod_grabacion'];
$anio= $_REQUEST['anio'];


switch ($anio){
case "08":{
$ordenes = "ordenes_2008";
$detalle = "detalle_2009";
break;
		}

case "09":{
$ordenes = "ordenes_2009";
$detalle = "detalle_2009";

break;
		}

case "10":{
$ordenes = "ordenes";
$detalle = "detalle";
break;
		}

		case "11":{
$ordenes = "ordenes";
$detalle = "detalle";
break;
		}

		case "12":{
$ordenes = "ordenes";
$detalle = "detalle";
break;
		}

		case "13":{
$ordenes = "ordenes";
$detalle = "detalle";
break;
		}

				case "14":{
$ordenes = "ordenes";
$detalle = "detalle";
break;
		}

				case "15":{
$ordenes = "ordenes";
$detalle = "detalle";
break;
		}

}




$SQL="Delete From $detalle where cod_grabacion = $cod_grabacion and confirmada != 10";
$db->Execute($SQL);
$SQL="Delete From $ordenes where cod_grabacion like $cod_grabacion and confirmada != 10";
$db->Execute($SQL);

$leyenda = "LA ORDEN HA SIDO ELIMINADA DEL SISTEMA";
include ("../../alertas/campo_informacion.php");



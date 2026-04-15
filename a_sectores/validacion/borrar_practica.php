
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo40 {
	font-size: 16px;
	font-weight: bold;
}
body {
	
	background-color: #FFFFFF;
}
.Estilo42 {
	font-size: 18px;
	font-weight: bold;
}
.Estilo43 {color: #FFFFFF}
.Estilo44 {
	font-size: x-large;
	font-weight: bold;
}
.Estilo45 {font-size: 16px}
.Estilo46 {font-family: Arial, Helvetica, sans-serif}
.Estilo47 {
	color: #FF0000;
	font-weight: bold;
	font-size: 16px;
}
.Estilo48 {font-size: 14px}
-->
</style>

<?php

   include("../../conexiones/config.inc.php");

 $nro_os=$_REQUEST["nro_os"];
$cod_practica=$_REQUEST["cod_practica"];
$nombre_plan=$_REQUEST["nombre_plan"];



$sql8="delete from `detalle_presupuesto`  where `nro_practica` = '$cod_practica'";
$result8 = $db->Execute($sql8);


include ("ver_presupuesto.php");


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



$sql8="select practica from convenio_practica where cod_practica = '$cod_practica' and nro_os = 4975 order by rand()";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);


$sql ="INSERT INTO `detalle_presupuesto` ( `cod_grabacion` ,  `nro_practica` , `practica` , `cod_operacion` , `operador` , `nro_laboratorio` ) VALUES ('999' ,  '$cod_practica' , '$practica' , '' , '999' , '')";
mysql_query($sql);


$bande = 1;

include ("ver_presupuesto.php");

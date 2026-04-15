<?php 

include ("../../../conexiones/config.inc.php");
$rast=$_POST["rast"];//110
$sql = "INSERT INTO `rast` (`rast`, `cod_rast`) VALUES ('$rast', NULL)";
mysql_query($sql);

include ("agregar_rast.php");


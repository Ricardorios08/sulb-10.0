<?php 

include ("../../../conexiones/config.inc.php");
$antibiotico=$_POST["antibiotico"];//110
$sql = "INSERT INTO `lote` (`lote`, `cod_lote`) VALUES ('$antibiotico', NULL)";
mysql_query($sql);

include ("agregar_practica.php");


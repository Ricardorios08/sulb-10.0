<?php 

include ("../../../conexiones/config.inc.php");
$antibiotico=$_POST["antibiotico"];//110
$sql = "INSERT INTO `antibioticos` (`antibiotico`, `cod_antibiotico`) VALUES ('$antibiotico', NULL)";
mysql_query($sql);

include ("agregar_practica.php");


<?php 

include ("../../../conexiones/config.inc.php");


$cod_antibiotico=$_REQUEST["cod_antibiotico"];//110
 $sql = "DELETE FROM `lote` WHERE cod_lote = $cod_antibiotico";
mysql_query($sql);

include ("agregar_practica.php");


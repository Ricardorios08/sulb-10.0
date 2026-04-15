<?php 
include ("../../../conexiones/config.inc.php");


$cod_grabacion=$_REQUEST["cod_grabacion"];



$sql = "ALTER TABLE `ordenes`\n auto_increment = $cod_grabacion";
mysql_query($sql);



include ("arranque_protocolo.php");	

?>


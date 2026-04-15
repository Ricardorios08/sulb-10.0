<?php 
include ("../../../conexiones/config.inc.php");


$orden=$_POST["orden"];



$sql= "TRUNCATE TABLE datos_orden";
mysql_query($sql);

 $sql= "INSERT INTO datos_orden ( `orden` ) VALUES ( '$orden')";
mysql_query($sql);

include ("datos_orden.php");	

?>


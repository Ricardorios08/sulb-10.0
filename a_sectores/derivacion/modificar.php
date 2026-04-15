<?php
include ("../../conexiones/config.inc.php");

 
$cod_operacion=$_POST["cod_operacion"];

$mega=$_POST["mega"];
$manlab=$_POST["manlab"];

	
$sql= "UPDATE tabla_conversion SET `mega` = '$mega', `manlab` = '$manlab' WHERE cod_operacion = $cod_operacion";
mysql_query($sql);



$bande_nuevo = 1;
$palabra = $nro_paciente;
$bande = 2;
include ("buscar_derivacion.php");	

?>


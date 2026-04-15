<?php
include ("../../conexiones/config.inc.php");

 
$nbu=$_POST["nbu"];
$mega=$_POST["mega"];
$manlab=$_POST["manlab"];

	
$sql= "INSERT INTO tabla_conversion ( `nbu`, `mega`, `manlab`  ) VALUES ( '$nbu', '$mega', '$manlab' )";
mysql_query($sql);


//$leyenda = "LOS DATOS HAN SIDO GUARDADOS EN EL SISTEMA";
//include ("../../alertas/campo_informacion.php");

$bande_nuevo = 1;
$palabra = $nro_paciente;
$bande = 2;
include ("entrada_derivacion.php");	

?>


<?php 
include ("../../conexiones/config.inc.php");



$nro_os=$_POST["nro_os"];//110

$cod_practica=$_POST["cod_practica"];//110
$practica=$_POST["practica"];//110

$categori=$_POST["categoria"];
for ($i=0;$i<count($categori);$i++)    
	{     
	$categoria = $categori[$i];    
	}



$honorarios=$_POST["honorarios"];
$valor=$_POST["valor"]; 





echo    $sql = "UPDATE convenio_practica_factura SET `honorarios` = '$honorarios' , `valor` = '$valor'  WHERE `cod_practica` = '$cod_practica' and nro_os = $nro_os LIMIT 1";
$result = $db->Execute($sql);

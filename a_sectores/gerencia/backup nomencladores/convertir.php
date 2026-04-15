<?php 
		
include ("../../../conexiones/config_pr.php");

$sql="select * from convenio_practica where nro_os like '$a' order by cod_practica asc";
$result = $db->Execute($sql);

if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {

$cod_practica=$result->fields["cod_practica"];
$categoria=$result->fields["categoria"];
$honorarios=$result->fields["honorarios"];
$gastos=$result->fields["gastos"];
$toma=$result->fields["toma"];
$urgencia=$result->fields["urgencia"];
$material_descartable=$result->fields["material_descartable"];
$valor=$result->fields["valor"];
$autorizada=$result->fields["autorizada"];
$practica=$result->fields["practica"];

include ("../../../conexiones/config_os_bk.php");

$sql1 = "INSERT INTO `convenio_practica` ( `cod_practica` , `nro_os` , `categoria` , `honorarios` , `gastos` , `toma` , `urgencia` , `material_descartable` , `valor` , `autorizada` , `practica` ) VALUES ( '$cod_practica' , '$nro_os' , '$categoria' , '$honorarios' , '$gastos' , '$toma' , '$urgencia' , '$material_descartable' , '$valor' , '$autorizada' , '$practica')";
mysql_query($sql1);
	 
$result->MoveNext();



	}


?>

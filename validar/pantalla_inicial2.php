<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--

	

.Estilo1 {
	font-family: "Arial Black";
	font-size: 24px;
}
.Estilo5 {color: #000099}
.Estilo15 {font-family: Arial, Helvetica, sans-serif}
body {
	background-color: #FFFFFF;
	/*background-image: url(../imagenes8/blanco.jpg);
	background-repeat: no-repeat;*/
}
.Estilo21 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo24 {font-size: 14px; font-family: Arial, Helvetica, sans-serif; }
-->
</style>
<script language="javascript">
<!--
function on_load()
{
document.getElementById("usuario").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "usuario":
				document.getElementById("password").focus();
				
				break;
				case "password":
				document.getElementById("entrar").focus();
				break;
			
		}
		return false;
	}
	return true;
}



</SCRIPT>
</head>

<BODY onLoad="on_load()" > 

<?php


/*
include("../conexiones/config.inc.php");
require_once("../nusoap/lib/nusoap.php");

$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('requisitos', $param1);

if ($response != ""){
  $sql = "TRUNCATE TABLE requisitos_os";
 $result = $db->Execute($sql);

$hoy = date("Y-m-d");

  $a = "INSERT INTO `requisitos_os` (`nro_os` ,`denominacion` ,`sigla` ,`requisitos` ,`version` ,`suspendido` ,`vigencia` ,`comunes` ,`especiales` ,`alta` ,`antibiograma` ,`diagnostico` ,
`planes` ,`info_planes` ,`planes_rechazados` ,`motivo_rechazo`) VALUES ".$response;
 $result = $db->Execute($a);


$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('rechazadas', $param1);

  $sql = "TRUNCATE TABLE a_practicas_rechazadas";
 $result = $db->Execute($sql);

$hoy = date("Y-m-d");

 $a = "INSERT INTO `a_practicas_rechazadas`  (`nro_os`, `cod_practica`, `motivo`, `fecha` , `tipo` , `plan` ) VALUES ".$response;
 $result = $db->Execute($a);


//-------------------------------------------------------------------------------------------//

$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('planes', $param1);

  $sql = "TRUNCATE TABLE planes_os";
 $result = $db->Execute($sql);

$hoy = date("Y-m-d");

  $a = "INSERT INTO `planes_os` (`nro_os`, `cod_operacion`, `nro_plan`, `nombre_plan`, `reducido_plan`, `coseguro`, `comunes`, `especiales`, `alta`, `pmo`, `texto`) VALUES ".$response;
 $result = $db->Execute($a);





//// actualizar convenio        ///
include("../../../conexiones/config.inc.php");
require_once("../../../nusoap/lib/nusoap.php");

$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('actualizar', $param1);



include ("../../../conexiones/config.inc.php");

  $sql = "TRUNCATE TABLE `arancel_migrado`";
 $result = $db->Execute($sql);

  $a = "INSERT INTO `arancel_migrado` (`nro_os`, `modalidad`, `ug`, `uh`, `modalidad_especiales`, `ug_especiales`, `uh_especiales`, `modalidad_alta`, `ug_alta`, `uh_alta`, `nomenclador`) VALUES ".$response;
 $result = $db->Execute($a);

 


$sql2="select * from arancel where nro_os > 999 and nro_os < 9999 order by nro_os";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {


$nro_os=strtoupper($result2->fields["nro_os"]);
$modalidad=strtoupper($result2->fields["modalidad"]);
$ug=strtoupper($result2->fields["ug"]);
$uh=strtoupper($result2->fields["uh"]);
$modalidad_especiales=strtoupper($result2->fields["modalidad_especiales"]);
$ug_especiales=strtoupper($result2->fields["ug_especiales"]);
$uh_especiales=strtoupper($result2->fields["uh_especiales"]);
$modalidad_alta=strtoupper($result2->fields["modalidad_alta"]);
$ug_alta=strtoupper($result2->fields["ug_alta"]);
$uh_alta=strtoupper($result2->fields["uh_alta"]);
$nomenclador=strtoupper($result2->fields["nomenclador"]);


$sql3="select * from arancel_migrado where nro_os = $nro_os";
$result3 = $db->Execute($sql3);

$uh_abm=strtoupper($result3->fields["uh"]);
$uh_especiales_abm=strtoupper($result3->fields["uh_especiales"]);
$uh_alta_abm=strtoupper($result3->fields["uh_alta"]);


$sql3="select * from datos_os where nro_os = $nro_os";
$result3 = $db->Execute($sql3);

$sigla=strtoupper($result3->fields["sigla"]);
$nro_os2=strtoupper($result3->fields["nro_os"]);
$denominacion=strtoupper($result3->fields["denominacion"]);

if ($nro_os2 != ""){



 $sql = "UPDATE `arancel` SET `uh` = '$uh_abm', `uh_especiales` = '$uh_especiales_abm', `uh_alta` = '$uh_alta_abm' WHERE `nro_os` = $nro_os";
$result = $db->Execute($sql);




 
}


$result2->MoveNext();
}













$leyenda = "SE ACTUALIZARON LOS REQUISITOS Y CONVENIOS";
include("../alertas/campo_informacion.php");
}


*/
?>


</body>
</html>



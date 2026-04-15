<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
	/*background-image: url(../imagenes8/blanco.jpg);
	background-repeat: no-repeat;*/
}
.Estilo25 {
	font-family: "Arial Black";
	font-size: 36px;
}
.Estilo26 {
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo27 {font-family: "Trebuchet MS"}
.Estilo29 {font-size: 12px}
.Estilo30 {font-family: "Trebuchet MS"; font-size: 14px; }
.Estilo31 {font-size: 14px}
.Estilo32 {font-family: "Trebuchet MS"; font-size: 16px; }
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

include("../conexiones/config.inc.php");




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


 $sql2="select * from datos_osde";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {
$conta = $conta + 1;
$result2->MoveNext();
}

if ($conta > 1){
$cartel = "BIENVENIDOS";
}ELSE{
$cartel = "BIENVENIDO";
}
?>


<table width="800" border="0" cellpadding="0">
  <tr>
    <td height="43" bgcolor="#003366"><div align="center" class="Estilo25 Estilo26 Estilo27"><?php echo $cartel;?></div></td>
  </tr>
  <tr>

 <?php
 
 $sql2="select * from datos_osde";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {


$prestador=strtoupper($result2->fields["prestador"]);

?>  <td height="18" bgcolor="#CCCCCC"><div align="center" class="Estilo32"><?php echo $prestador;?></div></td>  </tr>
  <tr>
 
	
	
  <?php


$result2->MoveNext();
}

?>

<td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="justify" class="Estilo30">El sistema SULB y Asociaci&oacute;n Bioqu&iacute;mica le presentan una nueva herramienta para poder agilizar algunas consultas administrativas:</div></td>
  </tr>
  <tr>
    <td><div align="justify" class="Estilo30">En esta versi&oacute;n usted podr&aacute; controlar afiliados directamente con las obras sociales, a fin de constatar la existencia y estado de un paciente dentro la obra social. En el men&uacute; pacientes podra ver cuales ya estan funcionando. </div></td>
  </tr>
  <tr>
    <td><div align="justify" class="Estilo30">Otros de los temas es poder evitar d&eacute;bitos, por lo cual podr&aacute; tener actualizado los convenios y practicas que requieren autorizacion previa. </div></td>
  </tr>
  <tr>
    <td><div align="justify" class="Estilo30">Por ultimo y no menos importante es la posibilidad de enviar a la ABM todas las ordenes en forma digital y evitar errores de carga o cargas duplicadas, para lograr disminuir los d&eacute;bitos. </div></td>
  </tr>
  <tr>
    <td><div align="justify"><span class="Estilo27"><span class="Estilo29"><span class="Estilo31"></span></span></span></div></td>
  </tr>
  <tr>
    <td><div align="justify" class="Estilo30">El el caso de OSDE: El sistema reemplaza al PCPOS tradicional y lo incorpora dentro del sistema, es decir que usted ya cuenta con PRONTOPAGO. </div></td>
  </tr>
  <tr>
    <td><div align="justify"><span class="Estilo27"><span class="Estilo29"><span class="Estilo31"></span></span></span></div></td>
  </tr>
  <tr>
    <td><div align="justify" class="Estilo30">En el transcurso del a&ntilde;o intentaremos agregar todas las obras sociales que sobre todo realizamos en forma duplicada en otros sistemas y unificarlos en un solo paso. </div></td>
  </tr>
  <tr>
    <td><div align="justify"><span class="Estilo27"><span class="Estilo29"><span class="Estilo31"></span></span></span></div></td>
  </tr>
  <tr>
    <td><div align="justify" class="Estilo30">Agradecemos su utilizaci&oacute;n y cualquier consulta no deje de comunirse con SULB y/o ABM para mejoras y/o sugerencias. </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right">Atte.</div></td>
  </tr>
  <tr>
    <td><div align="right">Ricardo Rios </div></td>
  </tr>
  <tr>
    <td><div align="right">Analista de Sistemas </div></td>
  </tr>
  <tr>
    <td><div align="right">Asociacion Bioquimica de Mendoza </div></td>
  </tr>
</table>
</body>
</html>



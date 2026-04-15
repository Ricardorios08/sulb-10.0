<style type="text/css">
<!--
.Estilo1 {
	font-size: 14px;
	color: #000099;
	font-family: "Trebuchet MS";
}
-->
</style>

<?php

/*require_once("../../nusoap/lib/nusoap.php");

$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$desde , 'apellido'=>$hasta);
$response= $client->call('requisitos', $param1);

if ($response == ""){
$leyenda = "NO HAY CONEXION A INTERNET, INTENTE NUEVAMENTE";
include ("../../alertas/campo_informacion2.php");
EXIT;
}

*/

include ("../../conexiones/config.inc.php");


$nro_o=$_POST["nro_os"];
	for ($i=0;$i<count($nro_o);$i++)    
	{     
	$nro_os = $nro_o[$i];    
	}

	if ($nro_os == 5354){
		$nro_os = 5396;
	}

	$cui=$_POST["cuit"];
	for ($i=0;$i<count($cui);$i++)    
	{     
	$cuit = $cui[$i];  
	$cuit_prestador = $cui[$i];
	}


$sql = "SELECT * FROM datos_osde where cuit = '$cuit'";
$result = $db->Execute($sql);
$prestador=strtoupper($result->fields["prestador"]);
$cuenta_abm=strtoupper($result->fields["cuenta_abm"]);
?>
<table width="850" border="0" cellpadding="0">
  <tr>
    <th bgcolor="#FFFFCC" scope="col"><div align="left"><span class="Estilo1"><?PHP echo $cuit;?> <?PHP echo $prestador;?></span></div></th>
  </tr>
</table>

<?php



if ($nro_os == 5396){ //BOREAL
include ("../../conexiones/config.inc.php");

 $nro_afiliado=$_POST["numero_credencial_lector"];
$nro_afiliado33=$_POST["numero_credencial_lector"];
$nro_afiliado444=substr($nro_afiliado,0,8);

 $digito = substr($nro_afiliado33,8,2);
$sql10="select * from datos_principales";
$result10 = $db->Execute($sql10);

$nro_laboratorio1=$result10->fields["matricula"];
//$cuit_prestador=$result10->fields["cuit"];
//$cuit=$result10->fields["cuit"];
$terminal=$result10->fields["terminal"];

  $sql="select * from pacientes where nro_afiliado = '$nro_afiliado' and nro_os = '$nro_os'";
$result = $db->Execute($sql);

$nro_pac=$result->fields["nro_paciente"];

if ($nro_pac != ''){
$bande_nuevo = 1;
$palabra = $nro_pac;
$bande = 2;

if ($nro_os == ""){
$leyenda = "NO INGRESO OBRA SOCIAL";
include ("../../alertas/campo_informacion2.php");
EXIT;
}

 $sql1="SELECT * FROM datos_os where nro_os = $nro_os";
$result1 = $db->Execute($sql1);

$sigla=$result1->fields["sigla"];


  $sql1="select * from requisitos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$requisitos=$result1->fields["requisitos"];
$version=$result1->fields["version"];
$suspendido=$result1->fields["suspendido"];
$vigencia=$result1->fields["vigencia"];
$comunes=$result1->fields["comunes"];
$especiales=$result1->fields["alta"];
$alta=$result1->fields["alta"];
$planes=$result1->fields["planes"];
$diagnostico=$result1->fields["diagnostico"];
$info_planes=$result1->fields["info_planes"];
$planes_rechazados=$result1->fields["planes_rechazados"];
$motivo_rechazo=$result1->fields["motivo_rechazo"];
include ("buscar_paciente_individual.php");
exit;
}


	include ("web_boreal.php");
	exit;

}else{
	
	include ("todas_os.php");
}
?>
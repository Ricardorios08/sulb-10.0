<?php
include ("../../conexiones/config.inc.php");

echo "GUARDAR";
$nro_paciente=$_POST["nro_paciente"];

if ($nro_paciente == ""){
$leyenda = "NO INGRESO NUMERO DE PACIENTE";
include ("../../alertas/campo_informacion2.php");
EXIT;
}



$nro_afiliado=$_POST["nro_afiliado"];

if ($nro_afiliado == ""){
$leyenda = "NO INGRESO NUMERO DE AFILIADO";
include ("../../alertas/campo_informacion2.php");
EXIT;
}


$nombre=$_POST["nombre"];

if ($nombre == ""){
$leyenda = "NO INGRESO NOMBRE DE PACIENTE";
include ("../../alertas/campo_informacion2.php");
EXIT;
}

$apellido=$_POST["apellido"];

if ($apellido == ""){
$leyenda = "NO INGRESO APELLIDO DEL PACIENTE";
include ("../../alertas/campo_informacion2.php");
EXIT;
}



$tipo_docs=$_POST["tipo_doc"];
for ($i=0;$i<count($tipo_docs);$i++)    
{     
$tipo_doc = $tipo_docs[$i];    
}

if ($tipo_doc == ""){
 $sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);
$tipo_doc=$result->fields["tipo_doc"];
}

$nro_documento=$_POST["nro_documento"];

if ($nro_documento == ""){
$leyenda = "NO INGRESO NUMERO DE DOCUMENTO";
include ("../../alertas/campo_informacion2.php");
EXIT;
}


$nro_o=$_POST["nro_os"];
	for ($i=0;$i<count($nro_o);$i++)    
	{     
	$nro_os = $nro_o[$i];    
	}

if ($nro_os == ""){
$leyenda = "NO INGRESO OBRA SOCIAL";
include ("../../alertas/campo_informacion2.php");
EXIT;
}


$domicilio=$_POST["domicilio"];

$localida=$_POST["localidad"];
for ($i=0;$i<count($localida);$i++)    
{     
$localidad= $localida[$i];    
}


if ($localidad == ""){
 $sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);
$localidad=$result->fields["localidad"];
}



$telefono=$_POST["telefono"];
$celular=$_POST["celular"];

$sex=$_POST["sexo"];
	for ($i=0;$i<count($sex);$i++)    
	{     
	$sexo = $sex[$i];    
	}

if ($sexo == ""){
 $sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);
$sexo=$result->fields["sexo"];
}


$dia=$_POST["dia"];
$mes=$_POST["mes"];
$anio=$_POST["anio"];
$fecha_nacimiento=$anio."-".$mes."-".$dia;


if ($nro_paciente == ""){$leyenda = "NO INGRESO Nº MATRICULA";include ("../../alertas/campo_informacion2.php");exit;}

$tipo_afiliad=$_POST["tipo_afiliado"];
	for ($i=0;$i<count($tipo_afiliad);$i++)    
	{     
	$tipo_afiliado = $tipo_afiliad[$i];    
	}

if ($tipo_afiliado == ""){
 $sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);
$tipo_afiliado=$result->fields["tipo_afiliado"];
}

$pla=$_POST["nombre_plan"];
	for ($i=0;$i<count($pla);$i++)    
	{     
	$plan = $pla[$i];    
	}

/*
list($ape,$nom) = explode("'",$apellido);

echo "***".$apellido = $ape."''".$nom;
*/


	
  $sql= "INSERT INTO pacientes ( `nro_paciente`, `nro_afiliado`, `nombre`, `tipo_doc`, `nro_documento`, `nro_os`, `domicilio`, `localidad`, `telefono`, `celular`, `sexo`, `fecha_nacimiento` , `apellido` , `tipo_afiliado` , `coseguro` , `plan` ) VALUES ( '$nro_paciente', '$nro_afiliado', '$nombre', '$tipo_doc', '$nro_documento', '$nro_os', '$domicilio', '$localidad', '$telefono', '$celular', '$sexo', '$fecha_nacimiento' , '$apellido' , '$tipo_afiliado' , '$coseguro' , '$plan' )";
mysql_query($sql);

/*require_once("../../nusoap/lib/nusoap.php");
$wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$sql); 
$response= $client->call('pacientes', $param1);

*/






//$leyenda = "LOS DATOS HAN SIDO GUARDADOS EN EL SISTEMA";
//include ("../../alertas/campo_informacion.php");

$bande_nuevo = 1;
$palabra = $nro_paciente;
$bande = 2;
include ("grabar_nuevo/grabacion_ordenes.php");	

?>


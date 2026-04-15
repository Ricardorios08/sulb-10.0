<?php

include("../../conexiones/config.inc.php");

  $sql10="select * from pacientes where nro_paciente = $nro_paciente";
$result10 = $db->Execute($sql10);

  $numero_credencial=$result10->fields["nro_afiliado"];
//$numero_credencial = $numero_credencial * 1;
$ultima_fecha=$result10->fields["ultima_fecha"];
$track=$result10->fields["track"];
$ultima_01a=$result10->fields["ultima_01a"];


$dia = substr($ultima_fecha,8,2);
$mes= substr($ultima_fecha,5,2);
$anio = substr($ultima_fecha,0,4);

$ultima_fecha = $anio.$mes.$dia;

$sql="select * from datos_osde";
$result = $db->Execute($sql);
$cuenta_abm=strtoupper($result->fields["cuenta_abm"]);


    $sql10="select * from detalle WHERE cod_grabacion = '$cod_grabacion' and facturar = 0 and nro_practica < 10000";
$resulta11 = $db->Execute($sql10);
if (!$resulta11) die("fallo 1".$db->ErrorMsg());
 while (!$resulta11->EOF) {
   $nro_practica=$resulta11->fields["nro_practica"];

 $cont = $cont + 1;


 $pra = $pra."<Prestacion codigo='$nro_practica' secuencia='$cont'/>";



$resulta11->MoveNext();
	}



ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);




/*
//DATOS DE CONEXION
$servicio="http://server.biosoft-online.net:40080/pamimendoza/PamiMendozaAfiliadoAutoriza.asmx?wsdl"; // Dirección del WS

// PARAMETROS

$client = new SoapClient($servicio, $parametros);
$result = $client->AUTORIZACION($parametros);
var_dump($result);

*/


//$cuenta_abm = "99999";
//$clave = "99999";
$fecha_hoy = date("Ymd");


$oSoapClient = new soapclient('http://181.15.123.114/WS_PAMIMENDOZA/ConsultaAfiliado.asmx?wsdl');

$a = "<?xml version='1.0' encoding='iso-8859-1'?>";
$b = "<Requerimiento><Bioquimico CodUsu='$cuenta_abm' Clave='$cuenta_abm'/><Afiliado NroAfi='$numero_credencial' FecRea='$fecha_hoy' CodSeg='1234567891' CodPlan='1'/><Prescriptor MatPresc='$medico' FecPresc='$fecha_hoy' CodDiag=''/>";
$c = "<ListaPrestaciones>";
$d= "<Prestacion codigo='475' secuencia='1'/><Prestacion codigo='297' secuencia='2'/><Prestacion codigo='412' secuencia='3'/><Prestacion codigo='711' secuencia='4'/><Prestacion codigo='876' secuencia='5'/><Prestacion codigo='105' secuencia='6'/><Prestacion codigo='35' secuencia='7'/><Prestacion codigo='711' secuencia='8'/><Prestacion codigo='1070' secuencia='9'/><Prestacion codigo='1035' secuencia='10'/><Prestacion codigo='1040' secuencia='11'/><Prestacion codigo='873' secuencia='12'/><Prestacion codigo='873' secuencia='13'/><Prestacion codigo='357' secuencia='14'/><Prestacion codigo='110' secuencia='15'/>";
$e = "</ListaPrestaciones></Requerimiento>";

 $aParametros = array("XMLRequerimiento" => $a.$b.$c.$pra.$e);
//var_dump($aParametros);
$result=$oSoapClient->autorizacion($aParametros);
$result->autorizacionResult;
$myText = (string)$result->autorizacionResult;

//var_dump($result);

unset($oSoapClient); 
 file_put_contents("envio_pami.xml", $aParametros);
 file_put_contents("respuesta_pami.xml", $myText);

 

$xml = simplexml_load_string($myText);

//print_r($xml);


include ("leer_pami.php");


$NroAutoRed;

clearstatcache(); 

ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);


?>


	

<?PHP 

$sql10="select * from datos_principales";
$result10 = $db->Execute($sql10);

//$cuit_prestador=$result10->fields["cuit"];
$terminal=$result10->fields["terminal"];

 $numero_credencial;
 

 $sql10="select * from ordenes where cod_grabacion = $cod_grabacion";
$result10 = $db->Execute($sql10);

$autorizacion=$result10->fields["autorizacion"];
$autorizacion_ws=$result10->fields["autorizacion_ws"];
$nro_os=$result10->fields["nro_os"];

 $fechaTrx=$result10->fields["fecha_osde"];
 $HoraTrx=$result10->fields["hora_osde"];
$cuit_prestador=$result10->fields["cuit_osde"];


 


ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);




$fecha_hoy = date("Ymd");


$oSoapClient = new soapclient('http://190.247.70.25/WS_PAMIMENDOZA/ConsultaAfiliado.asmx?wsdl');

$e = "<?xml version='1.0' encoding='iso-8859-1'?><Requerimiento><Bioquimico CodUsu='$cuenta_abm' Clave='$cuenta_abm'/><Afiliado NroAfi='$numero_credencial'/><Autorizacion NroAutoOri='$autorizacion_ws'/></Requerimiento>";

 $aParametros = array("XMLRequerimiento" => $e);
//var_dump($aParametros);
$result=$oSoapClient->anulacion($aParametros);
$result->anulacionResult;
$myText = (string)$result->anulacionResult;

//var_dump($result);

unset($oSoapClient); 
 file_put_contents("envio_pami_anula.xml", $aParametros);
 file_put_contents("respuesta_pami_anula.xml", $myText);

 

$xml = simplexml_load_string($myText);

//print_r($xml);


include ("leer_pami_anula.php");


$NroAutoRed;

clearstatcache(); 

ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);



if ($Nroautorizacion > 0){
include ("anula_abm_ws.php");
}















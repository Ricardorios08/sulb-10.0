<?php

include('../../nusoap/lib/nusoap.php');

$soapAction = "http://tempuri.org/PAMIMENDOZA/Service1/PamiMendozaAfiliadoConsulta";
$operation = "PamiMendozaAfiliadoConsulta";
$space = "http://tempuri.org/PAMIMENDOZA/Service1";

$client = new nusoap_client('http://server.biosoft-online.net:40080/pamimendoza/PamiMendozaAfiliadoConsulta.asmx?WSDL');
$err = $client->getError();
if ($err) {
 echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
}

//$param = array('CodUsu'=>'99999','Clave'=>'99999','NroAfi'=>'15035460300300');

$param = '<?xml version="1.0" encoding="iso-8859-1"?><Requerimiento><Bioquimico CodUsu="99999" Clave="99999"/><Afiliado NroAfi="15035460300300"/></Requerimiento>';


$result = $client->call('PamiMendozaAfiliadoConsulta',$param, $space, $soapAction);

if ($client->fault) {
 echo '<h2>Fault</h2><pre>';
  print_r($result);
 echo '</pre>';
} else {
 // Check for errors
 $err = $client->getError();
 if ($err) {
  // Display the error
  echo '<h2>Error</h2><pre>' . $err . '</pre>';
 } else {
  // Display the result
  echo '<h2>Result</h2><pre>';
   print_r($result);
  echo '</pre>';
 }
}

echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
?>


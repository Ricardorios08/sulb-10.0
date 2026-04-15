<?php
include ("../../conexiones/config.inc.php");

//header ("Content-Type:text/xml");
include("../../conexiones/config.inc.php");
require_once("../../nusoap/lib/nusoap.php");

$cod_usu = 715;
$clave = 715;
$numero_credencial = 15064203570000;


$servicio="http://server.biosoft-online.net:40080/pamimendoza/PamiMendozaAfiliadoConsulta.asmx?wsdl"; // Dirección del WS
$parametros=array("pParameters" => "<?xml version='1.0' encoding='iso-8859-1'?><Requerimiento><Bioquimico CodUsu='$cod_usu' Clave='$clave'/><Afiliado NroAfi='$numero_credencial'/></Requerimiento>");

var_dump($parametros);

//LLAMADA AL MÉTODO

$client = new SoapClient($servicio, $parametros);
$result = $client->PamiMendozaAfiliadoConsultaResult;

var_dump($result);

 file_put_contents("envio_pami_prueba.xml", $result);
//LECTURA DEL ARRAY
$result = obj2array($result);
$respuestas=$result['Codigorespuesta'];
$n=count($respuestas);


//////////////////








function obj2array($obj) {
  $out = array();
  foreach ($obj as $key => $val) {
    switch(true) {
        case is_object($val):
         $out[$key] = obj2array($val);
         break;
      case is_array($val):
         $out[$key] = obj2array($val);
         break;
      default:
        $out[$key] = $val;
    }
  }
  return $out;
}

function obj2array2($obj) {
  $out = array();
  foreach ($obj as $key => $val) {
    switch(true) {
        case is_object($val):
         $out[$key] = obj2array2($val);
         break;
      case is_array($val):
         $out[$key] = obj2array2($val);
         break;
      default:
        $out[$key] = $val;
    }
  }
  return $out;
}






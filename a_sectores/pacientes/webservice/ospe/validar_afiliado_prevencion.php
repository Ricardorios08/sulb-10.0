<?php
require_once("../../../nusoap/lib/nusoap.php");

/*

PGIA00021632
CUIT 30545508652

User : biomza
Pass : 123456


 https://www.pogomed.com:8002/AutorizacionPoGoMEDService.svc


98900016 IBAÑEZ MARTA

Terminal Asociada: PGIA00021632



*/

$txtUsr  = "sa_integracion";
$txtPass = "sa2014";
$txtCuit = "30123456789";
$txtAseguradoraCodigo = "BIOMZA";
$txtCredencial = "014066370011";//Credencial de Prueba BIOMZA
$txtSitioEmisor = "PGIA00020433";

 
echo $wsdl=' https://www.pogomed.com:8002/AutorizacionPoGoMEDService.svc';
$client=new AutorizacionPoGoMEDServiceClient($wsdl, 'wsdl'); 
$ap_param=array('txtUsr'=>$txtUsr,'txtPass'=>$txtPass, 'txtCuit'=>$txtCuit, 'txtAseguradoraCodigo'=>$txtAseguradoraCodigo, 'txtCredencial'=>$txtCredencial, 'txtSitioEmisor'=>$txtSitioEmisor ); 


$response= $client->call('ConsultarElegibilidad', array($ap_param));

echo $resultado = $info->consultaDeElegibilidadRequest;


/*

foreach ($response as $k => $v) {
$c = $c.$v."*";
}

$r=  list($nombre, $apellido, $credencial,  $TipoDocumento, $nro_documento, $CUIL,  $NF, $fecha_nacimiento,  $Edad,  $sexo, $Parentesco,  $mensaje_display,  $NroPlan, $plan, $coseguro,  $CodigoPostal, $Localidad,  $Provincia, $ProvinciaDesc, $NivelPlan, $Saldo) = explode("*",$c);


*/

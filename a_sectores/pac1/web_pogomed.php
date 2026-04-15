 <?PHP

/*	 
 $ap_param = array(
'txtUsr'     => 'sa_integracion',  
'txtPass'   =>  'sa2014',
'txtCuit' =>  '30123456789',
'txtAseguradoraCodigo' =>  'BIOMZA',
'txtCredencial' =>  '014066370011',
'txtSitioEmisor' =>  'PGIA00020433'
);

VAR_DUMP($ap_param);

 $soapClient = new SoapClient("https://www.pogomed.com:8002/AutorizacionPoGoMEDService.svc?wdsl");
VAR_DUMP($soapClient);

       // Call RemoteFunction ()
       $error = 0;
       try {
           $info = $soapClient->__call("AutorizacionPoGoMEDServiceClient ", array($ap_param));
       } catch (SoapFault $fault) {
           $error = 1;
           print("Sorry, the WebService returned the following ERROR: ".$fault->faultcode."-".$fault->faultstring.". We will now take you back to our home page.");
       }
     
      /* if ($error == 0) {      
//print_r($info->ObtenerInfoPadronResult);

$resultado = $info->ConsultaDeElegibilidadResponse;

}*/



require_once('lib/nusoap.php');

$oSoapClient = new nusoap_client('https://www.pogomed.com:8002/Autorizacionpogomedservice.svc?wsdl','wsdl');

 
 $parametros = array(
'txtUsr'     => 'biomza',  
'txtPass'   =>  '123456',
'txtCuit' =>  '30123456789',
'txtAseguradoraCodigo' =>  'BIOMZA',
'txtCredencial' =>  '98900016',
'txtSitioEmisor' =>  'PGIA00021632'
);


$oSoapClient->loadWSDL();
$respuesta = $oSoapClient->call("ConsultarElegibilidad", $parametros);
if ($oSoapClient->fault) { // Si
        echo 'No se pudo completar la operación '.$oSoapClient->getError();
        die();
} else { // No
        $sError = $oSoapClient->getError();
       if ($sError) { 
                echo 'Error!:'.$sError;
        }
}
echo '<br>';
echo '<pre>';
print_r( $respuesta );
echo '</pre>';  



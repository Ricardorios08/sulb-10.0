
<?php
try{

require_once('lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);


$afiliado_prueba = "15035460300300";

$afiliado = "15058196880600";
$cod_usu = "99999";
$clave = "99999";
$afiliado = "15057131730900";

 /*<pszMsg>string</pszMsg>
      <pszUser>string</pszUser>
      <pszPwd>string</pszPwd>
      <pszMsgType>string</pszMsgType>
*/

$pszMsg = "<pszMsg>MSH|^~\&|TRIA0100M|TRIA00000001|SWISSHL7|SWISS^800006^IIN|20080505223045||ZQI^Z01^ZQI_Z01|08050522304540783782|P|2.4|||NE|AL|ARGPRD|PS^Prestador Solicitante||||||30546207222^CUPID|||0536485011102^^^SWISS^HC||UNKNOWN/pszMsg>";

$oSoapClient = new soapclient('https://canalws.traditum.com/WebService_IA.asmx?wsdl');
$aParametros = array("pszMsg" => $pzzMsg, "pszUser" => "IA000007" , "pszPwd" => "IA000007" , "pszMsgType" => "SI" );

$result=$oSoapClient->Enviar($aParametros);
echo  $result->EnviarResult;

echo "<br>";



}catch(Exception $e){
echo($e);
}







 




?>

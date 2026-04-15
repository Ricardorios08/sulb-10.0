<?php
include ("../../conexiones/config.inc.php");

ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);

echo "validacion de afiliado";
echo "<br>";


$oSoapClient = new soapclient('http://server.biosoft-online.net:40080/pamimendoza/PamiMendozaAfiliadoConsulta.asmx?wsdl');
$aParametros = array("pParameters" => "<?xml version='1.0' encoding='iso-8859-1'?><Requerimiento><Bioquimico CodUsu='657' Clave='657'/><Afiliado NroAfi='15035460300300'/></Requerimiento>");
$result=$oSoapClient->PamiMendozaAfiliadoConsulta($aParametros);
$result->PamiMendozaAfiliadoConsultaResult;
$myText = (string)$result->PamiMendozaAfiliadoConsultaResult;
unset($oSoapClient); 

$xml = new SimpleXmlElement($myText, LIBXML_NOCDATA);
foreach($xml->Bioquimico as $item1){
$prestador = $item1;
}
foreach($xml->EstLogIn as $item1){
$estado = $item1;
}
foreach($xml->ApeNom as $item1){
$apellido = $item1;
}
foreach($xml->N_Docu as $item1){
$nro_docu = $item1;
}
foreach($xml->Sexo as $item1){
$sexo = $item1;
}
foreach($xml->F_Nac as $item1){
$fecha_nac = $item1;
}
echo "paciente: ".$apellido;

echo "<br>";


echo "autorizacion";
$oSoapClient = new soapclient('http://server.biosoft-online.net:40080/pamimendoza/PamiMendozaAfiliadoAutoriza.asmx?wsdl');
$aParametros = array("pParameters" => "<?xml version='1.0' encoding='iso-8859-1'?><Requerimiento><Bioquimico CodUsu='657' Clave='657'/><Afiliado NroAfi='15035460300300' FecRea='20150220' CodSeg='1234567890' CodPlan='1'/><Prescriptor MatPresc='123456' FecPresc='20150219' CodDiag='R681'/><ListaPrestaciones><Prestacion codigo='475' secuencia='1'/><Prestacion codigo='297' secuencia='2'/><Prestacion codigo='412' secuencia='3'/><Prestacion codigo='711' secuencia='4'/><Prestacion codigo='876' secuencia='5'/><Prestacion codigo='105' secuencia='6'/><Prestacion codigo='35' secuencia='7'/><Prestacion codigo='711' secuencia='8'/><Prestacion codigo='1070' secuencia='9'/><Prestacion codigo='1035' secuencia='10'/><Prestacion codigo='1040' secuencia='11'/><Prestacion codigo='873' secuencia='12'/><Prestacion codigo='873' secuencia='13'/><Prestacion codigo='357' secuencia='14'/><Prestacion codigo='110' secuencia='15'/></ListaPrestaciones></Requerimiento>");
$result=$oSoapClient->PamiMendozaAutoriza($aParametros);
$result->PamiMendozaAutorizaResult;
$myText = (string)$result->PamiMendozaAutorizaResult;
unset($oSoapClient); 

$xml = new SimpleXmlElement($myText, LIBXML_NOCDATA);
foreach($xml->Bioquimico as $item1){
$prestador = $item1;
}
foreach($xml->EstLogIn as $item1){
$estado = $item1;
}
foreach($xml->ApeNom as $item1){
$apellido = $item1;
}
foreach($xml->N_Docu as $item1){
$nro_docu = $item1;
}
foreach($xml->Sexo as $item1){
$sexo = $item1;
}
foreach($xml->F_Nac as $item1){
$fecha_nac = $item1;
}
echo $apellido;


 
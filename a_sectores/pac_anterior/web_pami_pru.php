<?php

$numero_credencial = "15557206991800";
$cod_usu = "1098";
$clave = "1098";


$oSoapClient = new soapclient('http://server.biosoft-online.net:40080/pamimendoza/PamiMendozaAfiliadoConsulta.asmx?wsdl');
$aParametros = array("pParameters" => "<?xml version='1.0' encoding='iso-8859-1'?><Requerimiento><Bioquimico CodUsu='$cod_usu' Clave='$clave'/><Afiliado NroAfi='$numero_credencial'/></Requerimiento>");




$result=$oSoapClient->PamiMendozaAfiliadoConsulta($aParametros);
$result->PamiMendozaAfiliadoConsultaResult;




$myText = (string)$result->PamiMendozaAfiliadoConsultaResult;

 file_put_contents("request.xml", $aParametros);
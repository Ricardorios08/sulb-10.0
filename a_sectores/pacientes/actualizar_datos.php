<?php


include ("../../conexiones/config.inc.php");
$nro_paciente=$_REQUEST["nro_paciente"];
$nro_afiliado=$_REQUEST["nro_afiliado"];
$nro_os=$_REQUEST["nro_os"];


$sql10="select * from datos_principales";
$result10 = $db->Execute($sql10);

$nro_laboratorio1=$result10->fields["matricula"];
$cuit_prestador=$result10->fields["cuit"];
$terminal=$result10->fields["terminal"];



 $numero_credencial = $nro_afiliado;


IF ($nro_os == 1041){

$tipo_transaccion = "01A";
$fechaTrx = date("Ymd");
$HoraTrx = time("hms");
//0$cuit_financiador = "30546741253";
//$cuit_prestador = "30580910927";
$afil = "62090275102";
$id = rand();

$ws = "ws.itcsoluciones.com:48080/jSitelServlet/Do?";
//$pas = "pas=32dbf220f1ab2303592b4a076162c221600ef704";

$pas_abm = "a81757c8-0dc4-1030-9364-001a6464572c";

$tipo_transaccion = "01A";
$fechaTrx = date("Ymd");
$HoraTrx = date("hms");

 echo $mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=".$pass_abm."&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Terminal><TipoTerminal>PC</TipoTerminal><NumeroTerminal>".$terminal."</NumeroTerminal></Terminal><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador></Prestador></EncabezadoMensaje><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial><track>".$track."</track></Credencial></Mensaje>";



$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $mensaje);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $consulta);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$resp=curl_exec ($ch);
curl_close ($ch);

$xml = new SimpleXmlElement($resp, LIBXML_NOCDATA);

foreach($xml->EncabezadoMensaje->Rta->MensajeDisplay as $item1){
$mensaje_display = $item1;
}

foreach($xml->EncabezadoMensaje->Rta->MensajePrinter as $item2){
$mensaje_printer = $item2;
}

foreach($xml->EncabezadoMensaje->IdMsj as $item3){
$id = $item3;
}

foreach($xml->EncabezadoAtencion->Credencial->NumeroCredencial as $item4){
$credencial = $item4;
}

foreach($xml->EncabezadoAtencion->Credencial->NumeroCredencial as $item4){
$credencial = $item4;
}

foreach($xml->EncabezadoAtencion->Credencial->PlanCredencial as $item5){
$plan = $item5;
}

foreach($xml->EncabezadoAtencion->Credencial->CondicionIVA as $item6){
$iva = $item6;
}

foreach($xml->EncabezadoAtencion->Beneficiario->ApellidoBeneficiario as $item6){
$apellido = $item6;
}

foreach($xml->EncabezadoAtencion->Beneficiario->NombreBeneficiario as $item7){
$nombre = $item7;
}

foreach($xml->EncabezadoAtencion->Beneficiario->Sexo as $item8){
$sexo = $item8;
}


foreach($xml->EncabezadoMensaje->NroReferencia as $item9){
$transaccion = $item9;
}

foreach($xml->EncabezadoAtencion->NroDocBeneficiario as $item10){
$nro_documento = $item10;
}

foreach($xml->EncabezadoAtencion->Beneficiario->FechaNacimiento as $item11){
$fecha_nacimiento = $item11;
}

foreach($xml->EncabezadoMensaje->Rta->CodRtaGeneral as $item12){
 $respuesta1 = $item12;
}



$dia_nac = substr($fecha_nacimiento,6,2);
$mes_nac = substr($fecha_nacimiento,4,2);
$anio_nac = substr($fecha_nacimiento,0,4);





 $fecha_nacimiento;


if ($iva == "E"){
$tp_afiliado = "NO GRAVADO (OBLIGATORIO) EXENTO";
$tipo_afiliado = 0;
}else{
$tp_afiliado = "GRAVADO (VOLUNTARIO) CON IVA";
$tipo_afiliado = 1;
}

if ($sexo == "F"){
$sexo = "Femenino";
}else{
$sexo = "Masculino";
}


   $sql = "UPDATE pacientes SET  `fecha_nacimiento` = '$fecha_nacimiento' , `tipo_afiliado` = '$tipo_afiliado' , `plan` = '$plan' , `coseguro` = '$coseguro' , `activo` = '$mensaje_display' WHERE `nro_paciente` = $nro_paciente LIMIT 1";
mysql_query($sql);



}elseif($nro_os == 5171){




  $soapClient = new SoapClient("http://wsospeonline.gmssa.com.ar/wsoPadronSAN.asmx?wsdl");

       // Setup the RemoteFunction parameters
       $ap_param = array(
'cuil'     =>  $numero_credencial,  
'nf'   =>  '0',
'username' =>  '30545508652',
'password' =>  'cb1999ae13d1c438abd1b43c5fe08f8e'
);
                 
       // Call RemoteFunction ()
       $error = 0;
    /*   try {
           $info = $soapClient->__call("ObtenerInfoPadron", array($ap_param));
       } catch (SoapFault $fault) {
           $error = 1;
           print("Sorry, the WebService returned the following ERROR: ".$fault->faultcode."-".$fault->faultstring.". We will now take you back to our home page.");
       }*/
     
       if ($error == 0) {      
//print_r($info->ObtenerInfoPadronResult);

$resultado = $info->ObtenerInfoPadronResult;

}
 
unset($soapClient); 


foreach ($resultado as $k => $v) {
$c = $c.$v."*";
}

$r=  list($nombre, $apellido, $credencial,  $TipoDocumento, $nro_documento, $CUIL,  $NF, $fecha_nacimiento,  $Edad,  $sexo, $Parentesco,  $mensaje_display,  $NroPlan, $plan, $coseguro,  $CodigoPostal, $Localidad,  $Provincia, $ProvinciaDesc, $NivelPlan, $Saldo) = explode("*",$c);





$dia_nac = substr($fecha_nacimiento,6,2);
$mes_nac = substr($fecha_nacimiento,4,2);
$anio_nac = substr($fecha_nacimiento,0,4);


if ($sexo == "F"){
$sexo = "Femenino";
}else{
$sexo = "Masculino";
}


   $sql = "UPDATE pacientes SET  `nombre` = '$nombre', `apellido` = '$apellido',`nro_documento` = '$nro_documento', `fecha_nacimiento` = '$fecha_nacimiento' , `tipo_afiliado` = '$tipo_afiliado' , `plan` = '$plan' , `coseguro` = '$coseguro' , `activo` = '$mensaje_display' WHERE `nro_paciente` = $nro_paciente LIMIT 1";
mysql_query($sql);



}else

{


}




$hoy = date("Y-m-d");
$sql="select * from pacientes where ultima_fecha = '$hoy' order by nro_llegada desc";
$result = $db->Execute($sql);
$nro_llegada=$result->fields["nro_llegada"]+1;

  $sql = "UPDATE pacientes SET  `ultima_fecha` = '$hoy', `nro_llegada` = '$nro_llegada' WHERE `nro_paciente` = $nro_paciente LIMIT 1";
mysql_query($sql);



$bande_nuevo = 1;
$palabra = $nro_paciente;
$bande = 2;
include ("buscar_paciente_individual.php");
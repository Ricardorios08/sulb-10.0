<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">

<?php

include("../../conexiones/config.inc.php");
require_once("../../nusoap/lib/nusoap.php");

$cuit_financiador = "30546741253"; //osde
$tipo_transaccion = "01A";
switch ($nro_os){
case "1041":{
$codigo_financiador = "11"; // osde
$cuit_financiador = "30546741253";
// afil 60802161901
break;}
case "5291":{
$codigo_financiador = "35"; // HOPE supuestamente activa con ITC
$cuit_financiador = "30565786306";
// afil 129503899 
break;}
case "2462":{
$codigo_financiador = "36"; // SERVESA supuestamente activa con ITC
$cuit_financiador = "30550194283";
// afil 254801
break;}
case "3771":{
$codigo_financiador = "59"; // OSDIPP supuestamente activa con ITC
$cuit_financiador = "30547416011";
// afil 99999800405
break;}
case "2042":{
$codigo_financiador = "27"; // AAPM supuestamente activa con ITC
$cuit_financiador = "30623134659";
// 09999999900
//mariano int 24 0810-3333482 itc.
break;}
case "4723":{
$codigo_financiador = "26"; // SWISS
$cuit_financiador = "30654855168";
// 09999999900
//mariano int 24 0810-3333482 itc.
break;}
case "5192":{
$codigo_financiador = "31"; // ACA SALUD
$cuit_financiador = "30604958640";
// 09999999900
//mariano int 24 0810-3333482 itc.
break;}
case "5240":{
$codigo_financiador = "32"; // SCIS
$cuit_financiador = "30708428082";
// 09999999900
//mariano int 24 0810-3333482 itc.
break;}
}

$tipo_transaccion = "01A";
$fechaTrx = date("Ymd");
$HoraTrx = date("hms");



 $sql10="select * from pacientes where nro_paciente = $nro_paciente";
$result10 = $db->Execute($sql10);

$numero_credencial=$result10->fields["nro_afiliado"];
//$numero_credencial = $numero_credencial * 1;
$ultima_fecha=$result10->fields["ultima_fecha"];
$track=$result10->fields["track"];
$ultima_01a=$result10->fields["ultima_01a"];
$ultima_transaccion=$result10->fields["transaccion"];
 $cuit_verificacion=$result10->fields["cuit_verificacion"];
 $cod_seg=$result10->fields["cod_seg"];


/*if ($cuit_verificacion != $cuit_prestador){

	 $sql="select * from datos_osde where cuit = $cuit_verificacion";
 $result5 = $db->Execute($sql);

$nro_laboratorio1=strtoupper($result5->fields["cuenta_abm"]);
$sucursal=strtoupper($result5->fields["sucursal"]);
$prestador=strtoupper($result5->fields["prestador"]);


$leyenda = "CUANDO VERIFICO UTILIZO EL CUIT: ".$prestador." - ".$cuit_verificacion;
include ("../../alertas/campo_informacion2.php");
EXIT;
}*/



$dia = substr($ultima_fecha,8,2);
$mes= substr($ultima_fecha,5,2);
$anio = substr($ultima_fecha,0,4);

 $ultima_fecha = $anio.$mes.$dia;
 $ultima_fecha_osde = $anio."-".$mes."-".$dia;
// $ultima_fecha_osde = "2016-11-30";
 $fecha_de_hoy = date("Y-m-d");


 $vto_trata = "+555 day";
$nuevafecha = strtotime ( $vto_trata , strtotime ( $ultima_fecha_osde ) ) ;
 $nuevafecha = date ( 'Y-m-j' , $nuevafecha );


/*
if ($nuevafecha < $fecha_de_hoy){

      $mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=a81757c8-0dc4-1030-9364-001a6464572c&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Terminal><TipoTerminal>PC</TipoTerminal><NumeroTerminal>1234</NumeroTerminal></Terminal><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_verificacion."</CuitPrestador><SucursalPrestador>".$terminal."</SucursalPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial><track></track><VersionCredencial>".$cod_seg."</VersionCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";

     file_put_contents("nueva_verificacion_osde.xml", $mensaje);

$myText = (string)$mensaje;


require_once("../../nusoap/lib/nusoap.php");
$wsdl='http://laboratoriosegura.com/nusoap/lib/web_service.php?wsdl';

//$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/web_service.php?wsdl';

$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('xml'=>$mensaje , 'variable2'=>$nro_afiliado444);
     $response= $client->call('itc', $param1);

    file_put_contents("respuesta_osde.xml", $response);





unlink('respuesta_osde.xml');
unlink('respuesta.xml');
file_put_contents("respuesta_osde.xml", $mensaje);
file_put_contents("respuesta.xml", $response);

 
$xml = new SimpleXmlElement($response, LIBXML_NOCDATA);

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
foreach($xml->EncabezadoAtencion->Beneficiario->NroDocBeneficiario as $item10){
$nro_documento = $item10;
}
foreach($xml->EncabezadoMensaje->NroReferencia as $item9){
$transaccion = $item9;
}
foreach($xml->EncabezadoAtencion->Beneficiario->FechaNacimiento as $item11){
$fecha_nacimiento = $item11;
}
foreach($xml->EncabezadoMensaje->Rta->CodRtaGeneral as $item12){
$respuesta1 = $item12;
}
foreach($xml->EncabezadoAtencion->Beneficiario->Credencial as $item8){
$credencial = $item8;
}

 list($ape,$nom,$segnom) = explode(" ",$apellido);

   $ape; // Imprime 12
  $nom; // Imprime 01
$segnom; // Imprime 01
$apellido = $ape;
$nombre = $nom." ".$segnom;


 $respuesta;

switch ($respuesta1){
case "00": { 	$respuesta = "Solicitud Autorizada/Aprobada";break;}
case "01": { 	$respuesta = "ERROR, ERROR VALIDACION TO. LLAME A ITC 	";break;}
case "02": {	$respuesta = "ERROR, ADMINISTRADORA NO VIGENTE O INEXISTENTE 	";break;}
case "03": { 	$respuesta = "ERROR, TERMINAL INEXISTENTE 	";break;}
case "04": { 	$respuesta = "ERROR, TERMINAL DADA DE BAJA 	";break;}
case "05": { 	$respuesta = "ERROR, TERMINAL INEXISTENTE EN ADMINISTRADORA 	";break;}
case "06": { 	$respuesta = "ERROR, TIPO DE TRANSACCION INEXISTENTE 	";break;}
case "07": { 	$respuesta = "ERROR, TIPO DE TRANSACCION NO HABILITADA 	";break;}
case "10": { 	$respuesta = "ERROR, EL NUMERO DE ASOCIADO XX ES INEXISTENTE O INCORRECTO. 	";break;}
case "11": { 	$respuesta = "ERROR, EL ASOCIADO NUMERO XX NO ESTA VIGENTE. 	";break;}
case "12": { 	$respuesta = "ERROR, EL ASOCIADO NUMERO XX NO ESTA HABILITADO, COMUNIQUESE CON YY. 	";break;}
case "13": { 	$respuesta = "ERROR, LA CREDENCIAL SE ENCUENTRA VENCIDA. 	";break;}
case "14": { 	$respuesta = "ERROR, EL ASOCIADO NUMERO XX SE ENCUENTRA SUSPENDIDO. ";break;}	
case "20": { 	$respuesta = "ERROR, PRESTADOR INVALIDO O NO HABILITADO. 	";break;}
case "21": { 	$respuesta = "ERROR, PRESTADOR NO AUTORIZADO PARA EL SERVICIO. 	";break;}
case "22": { 	$respuesta = "ERROR, PLAN NO CONTRATADO. 	";break;}
case "23": { 	$respuesta = "ERROR, TIPO DE TRANSACCION INHABILITADA";break;} 	
case "30": { 	$respuesta = "ERROR, LA PRESTACION XX Y/O EL PLAN DEL ASOCIADO NO ESTA HABILITADO. 	";break;}
case "31": { 	$respuesta = "ERROR, PRESTACION XX NO CONTRATADA. 	";break;}
case "32": { 	$respuesta = "ERROR, LA PRESTACION XX ES INEXISTENTE. 	";break;}
case "33": { 	$respuesta = "ERROR, LA PRESTACION XX NO ESTA HABILITADA, ASOCIADO CON CARENCIAS O PREEXISTENCIAS. 	";break;}
case "34": { 	$respuesta = "ERROR, LA PRESTACION XX REQUIERE AUTORIZACION PREVIA. 	";break;}
case "35": { 	$respuesta = "ERROR, LA PRESTACION XX SUPERA EL TOPE. 	";break;}
case "36": { 	$respuesta = "ERROR, LA PRESTACION XX NO REQUIERE AUTORIZACION PREVIA. 	";break;}
case "37": { 	$respuesta = "ERROR, LA PRESTACION XX REQUIERE AUDITORIA MEDICA U ORDEN DE INTERNACION. 	";break;}
case "38": { 	$respuesta = "ERROR, LA PRESTACION XX NO ESTA INCLUIDA EN EL PLAN. 	";break;}
case "39": { 	$respuesta = "ERROR, PRESTACION XX REPETIDA 	";break;}
case "40": { 	$respuesta = "ERROR, LA FECHA INGRESADA DE LA PRESTACION NO ES VALIDA. 	";break;}
case "41": { 	$respuesta = "ERROR, HA SUPERADO LOS DIAS PARA REGISTRAR UNA PRESTACION. 	";break;}
case "42": { 	$respuesta = "ERROR, SEXO INVALIDO PARA LA PRESTACION XX. 	";break;}
case "43": { 	$respuesta = "ERROR, FECHA FUERA DE RANGO PARA LA PRESTACION XX 	";break;}
case "50": { 	$respuesta = "ERROR, LA ORDEN DE AUTORIZACION NUMERO XX NO EXISTE. 	";break;}
case "51": { 	$respuesta = "ERROR, LA ORDEN DE AUTORIZACION NUMERO XX NO SE PUEDE ANULAR. ";break;}	
case "52": { 	$respuesta = "ERROR, LA ORDEN DE AUTORIZACION NUMERO XX FUE RECHAZADA. 	";break;}
case "53": { 	$respuesta = "ERROR, EL ASOCIADO NUMERO XX NO TIENE ORDENES DE AUTORIZACION VIGENTES. 	";break;}
case "60": { 	$respuesta = "ERROR, ANULACION INVALIDA, NUMERO DE TRANSACCION XX INEXISTENTE. 	";break;}
case "61": { 	$respuesta = "ERROR, ANULACION INVALIDA, TRANSACCION NUMERO XX NO ANULABLE. 	";break;}
case "62": { 	$respuesta = "ERROR, LA TRANSACCION NUMERO XX YA FUE ANULADA. 	";break;}
case "70": { 	$respuesta = "ERROR, EL NUMERO DE ASOCIADO XX NO SE ENCUENTRA HABILITADO. (Para caso de TO) 	";break;}
case "71": { 	$respuesta = "ERROR, NO HAY COMUNICACION CON EL SISTEMA. INTENTE NUEVAMENTE. (Para caso de TO) 	";break;}
case "72": { 	$respuesta = "ERROR, NO HAY COMUNICACION CON EL SISTEMA. INTENTE NUEVAMENTE. (Para caso de TO) 	";break;}
case "80": { 	$respuesta = "ERROR, TRANSACCION CON FORMATO INVALIDO 	";break;}
case "92": { $respuesta = "ERROR, COMUNIQUESE CON ITC 	";break;}
case "101": { $respuesta = "Validador de destino NO habilitado. La transacción no puede ser procesada por XX. 	";break;}
case "102": { $respuesta = "Financiador de destino NO habilitado. La transacción no puede ser procesada por XX. 	";break;}
case "200": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO TROQUEL XX INEXISTENTE. REVISE EL TROQUEL ENVIADO. ";break;}	
case "201": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX DADO DE BAJA 	";break;}
case "202": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX NO CUBIERTO 	";break;}
case "203": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX CUBIERTO POR REINTEGRO ";break;}	
case "204": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX PROVISTO POR FINANCIADOR 	";break;}
case "205": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX DE VENTA LIBRE 	";break;}
case "206": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX SOLO AUTORIZADO PM/PMI 	";break;}
case "207": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX RESTRINGIDO REQ.AUT. 	";break;}
case "208": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX AUT. SOLO RES.310/04 	";break;}
case "209": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO XX - XX RESTRINGIDO REQ.AUT. 	";break;}
case "210": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA TROQUEL XX - XX DUPLICADO 	";break;}
case "211": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA FECHA DE RECETA INCORRECTA 	";break;}
case "212": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA PRECIO INVALIDO MEDICAMENTO XX - XX 	";break;}
case "213": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA CANTIDAD EXCEDIDA DE MEDICAMENTOS 	";break;}
case "214": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA NO HAY RECETA AUTORIZADA 	";break;}
case "215": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA MEDICAMENTO TROQUEL XX NO ESTA EN TICKET 	";break;}
case "216": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA TAMAÑO DEL MEDICAMENTO XX - XX INVALIDO 	";break;}
case "217": { $respuesta = "ERROR, SOLICITUD NO AUTORIZADA PERIODO DE CONSUMO INVALIDO MEDICAMENTO XX 	";break;}
case "218": { $respuesta = "ERROR, DEBE INGRESAR AL MENOS 1 MEDICAMENTO DEBE INGRESAR AL MENOS 1 MEDICAMENTO. 	";break;}
case "300": { $respuesta = "Error en Cierre de Lote. No hay tickets para procesar 	";break;}
case "301": { $respuesta = "Error en Cierre de Lote. No existe Cierre 	";break;}
case "302": { $respuesta = "Error en Cierre de Lote. Ticket ya ingresado en cierre ";break;}	
case "303": { $respuesta = "Error en Cierre de Lote. Rango de fechas solicitado erroneo 	";break;}
case "400": { $respuesta = "Error en Médico No existe el médico efector 	";break;}
case "401": { $respuesta = "Error No existe el medico prescriptor 	";break;}
case "402": { $respuesta = "Error, Médico prescriptor No Habilitado 	";break;}
case "410": { $respuesta = "Error en Receta o Recetario, número de Receta Inválido 	";break;}
case "411": { $respuesta = "Error en Receta o Recetario Recetario ya utilizado 	";break;}
case "412": { $respuesta = "Error en Receta o Recetario Vencido 	";break;}
case "420": { $respuesta = "Error en Diagnóstico. No existe diagnóstico ingresado ";break;}
}

if ($respuesta1 != 00){
$leyenda = "YA HAN PASADO 5 DIAS O MAS DESDE LA VERIFICACION, EL ESTADO ACTUAL ES: ".$respuesta;
include ("../../alertas/campo_informacion2.php");
EXIT;
}else{
 $sql10 = "UPDATE `pacientes` SET `ultima_fecha` = '$fecha_de_hoy', `track` = '$mensaje_printer', `ultima_01a` = '$transaccion', `cuit_verificacion` = '$cuit_verificacion' WHERE `nro_paciente`  = $nro_paciente";
$result10 = $db->Execute($sql10);
echo $respuesta;
//$ultima_transaccion = $transaccion;
}

}////////////////////cierra dias 5 

*/


$fechaTrx = date("Ymd");
$HoraTrx = date("his");



  $sql2="select * from ordenes  where cod_grabacion = $cod_grabacion";
$result2 = $db->Execute($sql2);
$aut_mail=$result2->fields["aut_mail"];
 $nro_afiliado=strtoupper($result10->fields["nro_afiliado"]);
 $nro_paciente=strtoupper($result10->fields["nro_paciente"]);
 $palabra=strtoupper($result10->fields["nro_paciente"]);

$afil = "62090275102";
$id = rand();

$ws = "ws.itcsoluciones.com:48080/jSitelServlet/Do?";
$pas = "32dbf220f1ab2303592b4a076162c221600ef704";




//$numero_credencial = "61667853201";

$pas_abm = "a81757c8-0dc4-1030-9364-001a6464572c";
$tipo_transaccion = "02A";

//$cuit_prestador = "30689310547"; // SV LABORATORIO
//$terminal = 0027;




    $sql10="select * from detalle WHERE cod_grabacion = '$cod_grabacion' and facturar = 0";
$result10 = $db->Execute($sql10);
if (!$result10) die("fallo 1".$db->ErrorMsg());
 while (!$result10->EOF) {
  $nro_practica=$result10->fields["nro_practica"];


$nro_practica = str_pad($nro_practica, 4, "0", STR_PAD_LEFT);
$nro_practica = "66".$nro_practica;
$cont = $cont + 1;
 $a5 = $a5."<DetalleProcedimientos><NroItem>".$cont."</NroItem><CodPrestacion>".$nro_practica."</CodPrestacion><TipoPrestacion>1</TipoPrestacion><ArancelPrestacion>0</ArancelPrestacion><CantidadSolicitada>1</CantidadSolicitada></DetalleProcedimientos>";

$result10->MoveNext();
	}
		


   $a = "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=".$pas_abm."&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>".$tipo_transaccion."</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$ultima_fecha."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Financiador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador><SucursalPrestador>".$sucursal."</SucursalPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial><track></track><VersionCredencial>".$cod_seg."</VersionCredencial><Preautorizacion>".$aut_mail."</Preautorizacion></Credencial></EncabezadoAtencion>";


//$cont = 1;
//$cod_practica = 475;

//$a2 = "<DetalleProcedimientos><NroItem>".$cont."</NroItem><CodPrestacion>".$cod_practica."</CodPrestacion><CodAlternativo></CodAlternativo><TipoPrestacion>1</TipoPrestacion><ArancelPrestacion>0</ArancelPrestacion><CantidadSolicitada>1</CantidadSolicitada><DescripcionPrestacion></DescripcionPrestacion></DetalleProcedimientos>";

//$cont = 2;
//$cod_practica = 876;
//$a3 = "<DetalleProcedimientos><NroItem>".$cont."</NroItem><CodPrestacion>".$cod_practica."</CodPrestacion><CodAlternativo></CodAlternativo><TipoPrestacion>1</TipoPrestacion><ArancelPrestacion>0</ArancelPrestacion><CantidadSolicitada>1</CantidadSolicitada><DescripcionPrestacion></DescripcionPrestacion></DetalleProcedimientos>";



//$a7 = $a2.$a3;

$afinal = "</Mensaje>";
 




//  $final = $a.$a6.$afinal;

     $final = $a.$a5.$afinal;

$xm = "autorizacion_osde".$usuario.".xml";
     file_put_contents("autorizacion_osde1.xml", $final);
 file_put_contents($xm, $final);
 $myText = (string)$final;


require_once("../../nusoap/lib/nusoap.php");
$wsdl='http://laboratoriosegura.com/nusoap/lib/web_service.php?wsdl';

//$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/web_service.php?wsdl';

$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('xml'=>$final , 'variable2'=>$nro_afiliado444);
     $response= $client->call('aut_itc', $param1);

    file_put_contents("respuesta_osde1.xml", $response);





//unlink('respuesta_osde1.xml');

//file_put_contents("respuesta_osde1.xml", $response);
file_put_contents("respuesta_osde1.xml", $final);





$xml = new SimpleXmlElement($response, LIBXML_NOCDATA);
//print_r($xml); 




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


foreach($xml->EncabezadoMensaje->Financiador->CuitPrestador as $item12){
 $cuit_prestador = $item12;

}

foreach($xml->EncabezadoMensaje->Financiador->CuitPrestador as $item12){
 $cuit_prestador = $item12;

}

foreach($xml->EncabezadoMensaje->ImporteACargoAfiliado as $item12){
 $importe = $item12;

}


$importe;

IF ($iva == "G"){
	$marca = "1";
}elseif ($marca == "E"){
	$marca = "0";
}

?>
<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo2 {font-size: 12px}
.Estilo3 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo4 {font-size: 14px}
-->
</style>


<table width="230" border="0" cellpadding="0" cellspacing="0">

  <tr>
    <td bgcolor="#F0F0F0"><div align="left" class="Estilo3"><?php  $apellido;?><?php  $nombre;?></div>     </td>
  </tr>
      
   <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3">
	
	
	<?php 
	
	  $mensaje_printer = nl2br( stripslashes( htmlentities($mensaje_printer)));
 echo $mensaje_printer;

	/*$porciones = explode("--------------------------------------", $mensaje_printer);
	echo $porciones[0]; // porción1
echo "<br>";
echo "*--------------------------------------";
echo "<br>";
echo $porciones[1]; // porción2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[2]; // porción2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[3]; // porción2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[4]; // porción2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[5]; // porción2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[6]; // porción2

*/


/*
$practicas = $porciones[6]; // porción2

$practi = explode("(P", $practicas);
echo "(P".$practi[0];
echo "<br>";
echo "(P".$practi[1];
echo "<br>";
echo "(P".$practi[2];
echo "<br>";
echo "(P".$practi[3];


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
*/

/*
echo "<br>";
echo "--------------------------------------";
echo "<br>";
 

echo $firma = substr($fir,0,38);
echo "<br>";
echo $aclaracion = substr($porciones[8],38,38);
echo "<br>";
echo $tipo = substr($porciones[8],76,38);
echo "<br>";
echo $tipo2 = substr($porciones[8],114,38);
echo "<br>";
*/

?></span></td>
  </tr>
</table>

<?php 
	$respuesta1;
	if ($respuesta1 == 00){

		   $sql = "UPDATE pacientes SET  `nombre` = '$nombre', `apellido` = '$apellido',`nro_documento` = '$nro_documento', `fecha_nacimiento` = '$fecha_nacimiento' , `tipo_afiliado` = '$tipo_afiliado' , `plan` = '$plan' , `coseguro` = '$coseguro' , `activo` = '$mensaje_display' , `ultima_01a` = '$fechaTrx' WHERE `nro_paciente` = $nro_paciente LIMIT 1";
//mysql_query($sql);

$leyenda = "OSDE: ".$transaccion;

?>
<table width="230" border="2" cellspacing="0">
  <tr>
    <th height="61" bgcolor="#EDEDED" scope="col"><blink></blink><blink><span class="Estilo12"><?php echo $leyenda;?></span></blink><span class="Estilo1 Estilo25"><blink></blink></span> </th>
  </tr>
</table>
<table width="230" border="1">
  <tr>
    <td width="101"><div align="center"><a href="buscar_paciente_individual_validar.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>">Volver al paciente</a></div></td>
    <td width="98"><div align="center"><a href="reimprimir.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>">RE-IMPRIMIR</a></div></td>
  </tr>
</table>
<?php 

	include ("abm_ws.php");

	}else{

?>
<table width="230" border="1">
  <tr>
    <td><?php echo $mensaje_display;?></td>
	 <td><?php echo $respuesta1;?></td>
  </tr>
</table>

<?php
}

	

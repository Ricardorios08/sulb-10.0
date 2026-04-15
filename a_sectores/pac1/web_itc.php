<?php
//header ("Content-Type:text/xml");

include ("../../conexiones/config.inc.php");

$sql10="select * from datos_principales";
$result10 = $db->Execute($sql10);
// $cuit_prestador=$result10->fields["cuit"];

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

//$cuit_prestador = "30708402911"; // prestador de prueba
//30708402911

$afil = "62090275102";
$id = rand();

$ws = "ws.itcsoluciones.com:48080/jSitelServlet/Do?";
$pas = "pas=32dbf220f1ab2303592b4a076162c221600ef704";
$pas = "a81757c8-0dc4-1030-9364-001a6464572c";

$a = "123%20B%20AFILIADO%20PRUEBA%20AUTORIZ.AUTOM.-20310201510%20121%20_ñ610531606719562017¡151010150120000008_";
list($n1,$n2, $n3, $n4, $n5, $n6, $n7) = explode("%20",$a);

 //$track = $n1." ".$n2." ".$n3." ".$n4." ".$n5." ".$n6." ".$n7;
//$track = "123_20B_20AFILIADO_20PRUEBA_20AUTORIZ_AUTOM__20310201510_20121_20__610531606719562017_151010150120000008_";
 $cuit_prestador;

if ($nro_os == 1041){ //OSDE
     $mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=a81757c8-0dc4-1030-9364-001a6464572c&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Terminal><TipoTerminal>PC</TipoTerminal><NumeroTerminal>1234</NumeroTerminal></Terminal><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador><SucursalPrestador>".$terminal."</SucursalPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial><track>".$track."</track></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";

	    file_put_contents("envio_osde.xml", $mensaje);
}

if ($nro_os == 4723){ //swiss
     $mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=a81757c8-0dc4-1030-9364-001a6464572c&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Terminal><TipoTerminal>PC</TipoTerminal><NumeroTerminal>1234</NumeroTerminal></Terminal><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador><SucursalPrestador>".$terminal."</SucursalPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial><track>".$track."</track></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";

	    file_put_contents("envio_swiss.xml", $mensaje);
}

if ($nro_os == 5192){ //ACA
     $mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=a81757c8-0dc4-1030-9364-001a6464572c&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Terminal><TipoTerminal>PC</TipoTerminal><NumeroTerminal>1234</NumeroTerminal></Terminal><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador><SucursalPrestador>".$terminal."</SucursalPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial><track>".$track."</track></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";

	    file_put_contents("envio_aca.xml", $mensaje);
}

if ($nro_os == 5240){ //SCIS
     $mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=a81757c8-0dc4-1030-9364-001a6464572c&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Terminal><TipoTerminal>PC</TipoTerminal><NumeroTerminal>1234</NumeroTerminal></Terminal><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador><SucursalPrestador>".$terminal."</SucursalPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial><track>".$track."</track></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";

	    file_put_contents("envio_scis.xml", $mensaje);
}




if ($nro_os == 2462){ // SERVESALUD no anda
	$cuit_prestador = "30545508652";
$mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=a81757c8-0dc4-1030-9364-001a6464572c&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Terminal><TipoTerminal>PC</TipoTerminal><NumeroTerminal>1234</NumeroTerminal></Terminal><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";

    file_put_contents("envio_servesalud.xml", $mensaje);
}

if ($nro_os == 5291){ //HOPE  no anda
 $mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=a81757c8-0dc4-1030-9364-001a6464572c&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Terminal><TipoTerminal>PC</TipoTerminal><NumeroTerminal>1234</NumeroTerminal></Terminal><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";


    file_put_contents("envio_hope.xml", $mensaje);
}

if ($nro_os == 3771){ //OSDIP

$mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=a81757c8-0dc4-1030-9364-001a6464572c&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>30547416011</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><MensajeParaFinanciador/></EncabezadoAtencion></Mensaje>";
file_put_contents("envio_osdip.xml", $mensaje);
}

if ($nro_os == 2042){ //AAPM
   
  $mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=a81757c8-0dc4-1030-9364-001a6464572c&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>30623134659</CuitFinanciador></Financiador><Prestador><CuitPrestador>30545508652</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><MensajeParaFinanciador/></EncabezadoAtencion></Mensaje>";

 file_put_contents("envio_hope.xml", $mensaje);
}


 $myText = (string)$mensaje;

$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $mensaje);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $consulta);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$resp=curl_exec ($ch);
curl_close ($ch);

unlink('mensaje.xml');
unlink('respuesta.xml');
file_put_contents("mensaje.xml", $mensaje);
file_put_contents("respuesta.xml", $resp);


//$xml = new SimpleXmlElement($resp, LIBXML_NOCDATA);
$xml = new SimpleXmlElement($resp);


foreach($xml->EncabezadoMensaje->Rta->MensajeDisplay as $item1){
  $mensaje_display = $item1;
}

foreach($xml->EncabezadoMensaje->Rta->CodRtaGeneral as $item12){
 $respuesta1 = $item12;
}




if ($respuesta1 == "1001"){
	
$leyenda = "-3: Pasaporte incorrecto. Comuniquese con soporte SULB";
include ("../../alertas/campo_informacion2.php");
exit;
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



foreach($xml->EncabezadoAtencion->Beneficiario->Credencial as $item8){
$credencial = $item8;
}


$transaccion;
  
  $mensaje_printer;

$respuesta1;

if ($nro_os == 1041) {

	  list($ape,$nom,$segnom) = explode(" ",$apellido);

   $ape; // Imprime 12
  $nom; // Imprime 01
$segnom; // Imprime 01
$apellido = $ape;
$nombre = $nom." ".$segnom;


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
}

if ($nro_os == 2462){
switch ($respuesta1){
case "0000": { 	$respuesta = "Solicitud Autorizada/Aprobada";break;}
case "0001": { 	$respuesta = "Asociado (beneficiario) Inexistente";break;}
case "0002": { 	$respuesta = "Asociado (beneficiario) dado de baja o con alta a futuro";break;}
case "0003": { 	$respuesta = "Asociado (beneficiario) moroso";break;}
case "0004": { 	$respuesta = "Prestación Inexistente";break;}
case "0005": { 	$respuesta = "Carencia o tiempo de espera para la prestación";break;}
case "0006": { 	$respuesta = "Preexistencia";break;}
case "0007": { 	$respuesta = "Excepción";break;}
case "0008": { 	$respuesta = "Supera Tope";break;}
case "0010": { 	$respuesta = "Prestador Inexistente";break;}
case "0011": { 	$respuesta = "Prestador No Habilitado para el POS XXX ";break;}
}
}

if ($nro_os == 5291){
switch ($respuesta1){
case "00": { 	$respuesta = "Solicitud Autorizada/Aprobada";break;}
case "01": { 	$respuesta = "Asociado (beneficiario) Inexistente";break;}
case "02": { 	$respuesta = "Asociado (beneficiario) dado de baja o con alta a futuro";break;}
case "03": { 	$respuesta = "Asociado (beneficiario) moroso";break;}
case "04": { 	$respuesta = "Prestación Inexistente";break;}
case "05": { 	$respuesta = "Carencia o tiempo de espera para la prestación";break;}
case "06": { 	$respuesta = "Preexistencia";break;}
case "07": { 	$respuesta = "Excepción";break;}
case "08": { 	$respuesta = "Supera Tope";break;}
case "10": { 	$respuesta = "Prestador Inexistente";break;}
case "11": { 	$respuesta = "Prestador No Habilitado para el POS XXX ";break;}
}
}

if ($nro_os == 4723){
switch ($respuesta1){
case "000": { 	$respuesta = "Solicitud Autorizada/Aprobada";break;}
case "001": { 	$respuesta = "Asociado (beneficiario) Inexistente";break;}
case "002": { 	$respuesta = "Asociado (beneficiario) dado de baja o con alta a futuro";break;}
case "003": { 	$respuesta = "Asociado (beneficiario) moroso";break;}
case "004": { 	$respuesta = "Prestación Inexistente";break;}
case "005": { 	$respuesta = "Carencia o tiempo de espera para la prestación";break;}
case "006": { 	$respuesta = "Preexistencia";break;}
case "007": { 	$respuesta = "Excepción";break;}
case "008": { 	$respuesta = "Supera Tope";break;}
case "010": { 	$respuesta = "Prestador Inexistente";break;}
case "011": { 	$respuesta = "Prestador No Habilitado para el POS XXX ";break;}
case "012": { 	$respuesta = "Prestación no contratada.";break;}
case "013": { 	$respuesta = "Código de autorización erróneo.";break;}
case "014": { 	$respuesta = "Solicitud anulada / rechazada/ o sin saldo";break;}
case "015": { 	$respuesta = "No existe la solicitud para el socio";break;}
case "017": { 	$respuesta = "Prestador no autorizado a prescribir";break;}
case "018": { 	$respuesta = "Prestador no autorizado a emitir órdenes de internación.";break;}
case "019": { 	$respuesta = "La transacción es errónea.";break;}
 
case "021": { 	$respuesta = "La prestación no requiere autorización previa.";break;}
case "023": { 	$respuesta = "La prestación no requiere autorización previa.";break;}
case "024": { 	$respuesta = "Solicitud existente	Puede deberse a que se haya solicitado con anterioridad la autorización para ese asociado y esa prestación.";break;}
case "025": { 	$respuesta = "Fecha inválida";break;}

case "026": { 	$respuesta = "Credencial vencida";break;}
case "027": { 	$respuesta = "Código de Fin de Terapia Inválido";break;}
case "028": { 	$respuesta = "Fecha de Práctica < Fecha de la Ordena";break;}case "25": { 	$respuesta = "Fecha inválida";break;}
case "029": { 	$respuesta = "Debe ser ingreso manual";break;}
case "030": { 	$respuesta = "Debe informar número de orden";break;}
case "031": { 	$respuesta = "Asociado (beneficiario) no habilitado";break;}
case "032": { 	$respuesta = "Asociado (beneficiario) no habilitado";break;}
case "036": { 	$respuesta = "Pendiente de resolución	Intente la consulta en 24 horas, aun no ha sido revisada por los auditores.";break;}
case "037": { 	$respuesta = "Solicitud rechazada	No ha sido autorizada la solicitud. Consulte directamente al financiador para más detalles.";break;}
case "038": { 	$respuesta = "La solicitud está anulada	No es necesario realizar una nueva anulación.";break;}
case "039": { 	$respuesta = "Se ha cargado mal el número de solicitud";break;}
case "040": { 	$respuesta = "Anulación no registrada	No es posible anular la transacción deseada. La transacción que se desea anular fue rechazada o corresponde a un tipo de transacción que no es necesario anular. No es necesario realizar una nueva transacción de anulación.";break;}
case "041": { 	$respuesta = "La solicitud no existe	Revise el número ingresado de transacción ingresado.";break;}
case "044": { 	$respuesta = "El protocolo no se puede volver a enviar sin antes anular la transacción anterior";break;}
case "045": { 	$respuesta = "Protocolo quirúrgico no aceptado, número de orden de internación incorrecto	Revise el número de orden de internación (OI) enviado que corresponda al afiliado y al prestador que fue otorgado.";break;}
case "046": { 	$respuesta = "Se intentó enviar el protocolo sin antes informar la cirugía";break;}
case "047": { 	$respuesta = "Orden de cirugía o transacción anulada, la solicitud fue rechazada o anulada";break;}

}
}

 

 if ($nro_os == 5192){
switch ($respuesta1){
case "000": { 	$respuesta = "Solicitud Autorizada/Aprobada";break;}
case "001": { 	$respuesta = "Asociado (beneficiario) Inexistente";break;}
case "002": { 	$respuesta = "Asociado (beneficiario) dado de baja o con alta a futuro";break;}
case "003": { 	$respuesta = "Asociado (beneficiario) moroso";break;}
case "004": { 	$respuesta = "Prestación Inexistente";break;}
case "005": { 	$respuesta = "Carencia o tiempo de espera para la prestación";break;}
case "006": { 	$respuesta = "Preexistencia";break;}
case "007": { 	$respuesta = "Excepción";break;}
case "008": { 	$respuesta = "Supera Tope";break;}
case "010": { 	$respuesta = "Prestador Inexistente";break;}
case "011": { 	$respuesta = "Prestador No Habilitado para el POS XXX ";break;}
case "012": { 	$respuesta = "Prestación no contratada.";break;}
case "013": { 	$respuesta = "Código de autorización erróneo.";break;}
case "014": { 	$respuesta = "Solicitud anulada / rechazada/ o sin saldo";break;}
case "015": { 	$respuesta = "No existe la solicitud para el socio";break;}
case "017": { 	$respuesta = "Prestador no autorizado a prescribir";break;}
case "018": { 	$respuesta = "Prestador no autorizado a emitir órdenes de internación.";break;}
case "019": { 	$respuesta = "La transacción es errónea.";break;}
 
case "021": { 	$respuesta = "La prestación no requiere autorización previa.";break;}
case "023": { 	$respuesta = "La prestación no requiere autorización previa.";break;}
case "024": { 	$respuesta = "Solicitud existente	Puede deberse a que se haya solicitado con anterioridad la autorización para ese asociado y esa prestación.";break;}
case "025": { 	$respuesta = "Fecha inválida";break;}

case "026": { 	$respuesta = "Credencial vencida";break;}
case "027": { 	$respuesta = "Código de Fin de Terapia Inválido";break;}
case "028": { 	$respuesta = "Fecha de Práctica < Fecha de la Ordena";break;}case "25": { 	$respuesta = "Fecha inválida";break;}
case "029": { 	$respuesta = "Debe ser ingreso manual";break;}
case "030": { 	$respuesta = "Debe informar número de orden";break;}
case "031": { 	$respuesta = "Asociado (beneficiario) no habilitado";break;}
case "032": { 	$respuesta = "Asociado (beneficiario) no habilitado";break;}
case "036": { 	$respuesta = "Pendiente de resolución	Intente la consulta en 24 horas, aun no ha sido revisada por los auditores.";break;}
case "037": { 	$respuesta = "Solicitud rechazada	No ha sido autorizada la solicitud. Consulte directamente al financiador para más detalles.";break;}
case "038": { 	$respuesta = "La solicitud está anulada	No es necesario realizar una nueva anulación.";break;}
case "039": { 	$respuesta = "Se ha cargado mal el número de solicitud";break;}
case "040": { 	$respuesta = "Anulación no registrada	No es posible anular la transacción deseada. La transacción que se desea anular fue rechazada o corresponde a un tipo de transacción que no es necesario anular. No es necesario realizar una nueva transacción de anulación.";break;}
case "041": { 	$respuesta = "La solicitud no existe	Revise el número ingresado de transacción ingresado.";break;}
case "044": { 	$respuesta = "El protocolo no se puede volver a enviar sin antes anular la transacción anterior";break;}
case "045": { 	$respuesta = "Protocolo quirúrgico no aceptado, número de orden de internación incorrecto	Revise el número de orden de internación (OI) enviado que corresponda al afiliado y al prestador que fue otorgado.";break;}
case "046": { 	$respuesta = "Se intentó enviar el protocolo sin antes informar la cirugía";break;}
case "047": { 	$respuesta = "Orden de cirugía o transacción anulada, la solicitud fue rechazada o anulada";break;}

}
}


if ($nro_os == 5240){
switch ($respuesta1){
case "000": { 	$respuesta = "Solicitud Autorizada/Aprobada";break;}
case "001": { 	$respuesta = "Asociado (beneficiario) Inexistente";break;}
case "002": { 	$respuesta = "Asociado (beneficiario) dado de baja o con alta a futuro";break;}
case "003": { 	$respuesta = "Asociado (beneficiario) moroso";break;}
case "004": { 	$respuesta = "Prestación Inexistente";break;}
case "005": { 	$respuesta = "Carencia o tiempo de espera para la prestación";break;}
case "006": { 	$respuesta = "Preexistencia";break;}
case "007": { 	$respuesta = "Excepción";break;}
case "008": { 	$respuesta = "Supera Tope";break;}
case "010": { 	$respuesta = "Prestador Inexistente";break;}
case "011": { 	$respuesta = "Prestador No Habilitado para el POS XXX ";break;}
case "012": { 	$respuesta = "Prestación no contratada.";break;}
case "013": { 	$respuesta = "Código de autorización erróneo.";break;}
case "014": { 	$respuesta = "Solicitud anulada / rechazada/ o sin saldo";break;}
case "015": { 	$respuesta = "No existe la solicitud para el socio";break;}
case "017": { 	$respuesta = "Prestador no autorizado a prescribir";break;}
case "018": { 	$respuesta = "Prestador no autorizado a emitir órdenes de internación.";break;}
case "019": { 	$respuesta = "La transacción es errónea.";break;}
 
case "021": { 	$respuesta = "La prestación no requiere autorización previa.";break;}
case "023": { 	$respuesta = "La prestación no requiere autorización previa.";break;}
case "024": { 	$respuesta = "Solicitud existente	Puede deberse a que se haya solicitado con anterioridad la autorización para ese asociado y esa prestación.";break;}
case "025": { 	$respuesta = "Fecha inválida";break;}

case "026": { 	$respuesta = "Credencial vencida";break;}
case "027": { 	$respuesta = "Código de Fin de Terapia Inválido";break;}
case "028": { 	$respuesta = "Fecha de Práctica < Fecha de la Ordena";break;}case "25": { 	$respuesta = "Fecha inválida";break;}
case "029": { 	$respuesta = "Debe ser ingreso manual";break;}
case "030": { 	$respuesta = "Debe informar número de orden";break;}
case "031": { 	$respuesta = "Asociado (beneficiario) no habilitado";break;}
case "032": { 	$respuesta = "Asociado (beneficiario) no habilitado";break;}
case "036": { 	$respuesta = "Pendiente de resolución	Intente la consulta en 24 horas, aun no ha sido revisada por los auditores.";break;}
case "037": { 	$respuesta = "Solicitud rechazada	No ha sido autorizada la solicitud. Consulte directamente al financiador para más detalles.";break;}
case "038": { 	$respuesta = "La solicitud está anulada	No es necesario realizar una nueva anulación.";break;}
case "039": { 	$respuesta = "Se ha cargado mal el número de solicitud";break;}
case "040": { 	$respuesta = "Anulación no registrada	No es posible anular la transacción deseada. La transacción que se desea anular fue rechazada o corresponde a un tipo de transacción que no es necesario anular. No es necesario realizar una nueva transacción de anulación.";break;}
case "041": { 	$respuesta = "La solicitud no existe	Revise el número ingresado de transacción ingresado.";break;}
case "044": { 	$respuesta = "El protocolo no se puede volver a enviar sin antes anular la transacción anterior";break;}
case "045": { 	$respuesta = "Protocolo quirúrgico no aceptado, número de orden de internación incorrecto	Revise el número de orden de internación (OI) enviado que corresponda al afiliado y al prestador que fue otorgado.";break;}
case "046": { 	$respuesta = "Se intentó enviar el protocolo sin antes informar la cirugía";break;}
case "047": { 	$respuesta = "Orden de cirugía o transacción anulada, la solicitud fue rechazada o anulada";break;}

}
}



if ($nro_os == 3771){

$r=  list($apellido, $nombre, $nombre2, $nombre3) = explode(" ",$nombre);
$nombre = $nombre." ".$nombre2." ".$nombre3;


switch ($respuesta1){
case "0000": { 	$respuesta = "Solicitud Autorizada/Aprobada";break;}
case "0001": { 	$respuesta = "Asociado (beneficiario) Inexistente";break;}
case "0002": { 	$respuesta = "Asociado (beneficiario) dado de baja o con alta a futuro";break;}
case "0003": { 	$respuesta = "Asociado (beneficiario) moroso";break;}
case "0004": { 	$respuesta = "Prestación Inexistente";break;}
case "0005": { 	$respuesta = "Carencia o tiempo de espera para la prestación";break;}
case "0006": { 	$respuesta = "Preexistencia";break;}
case "0007": { 	$respuesta = "Excepción";break;}
case "0008": { 	$respuesta = "Supera Tope";break;}
case "0010": { 	$respuesta = "ASOC.INEXISTENTE";break;}
case "0011": { 	$respuesta = "Prestador No Habilitado para el POS XXX ";break;}
}
}

if ($nro_os == 2042){
switch ($respuesta1){
case "00": { 	$respuesta = "Solicitud Autorizada/Aprobada";break;}
case "01": { 	$respuesta = "Asociado (beneficiario) Inexistente";break;}
case "02": { 	$respuesta = "Asociado (beneficiario) dado de baja o con alta a futuro";break;}
case "03": { 	$respuesta = "Asociado (beneficiario) moroso";break;}
case "04": { 	$respuesta = "Prestación Inexistente";break;}
case "05": { 	$respuesta = "Carencia o tiempo de espera para la prestación";break;}
case "06": { 	$respuesta = "Preexistencia";break;}
case "07": { 	$respuesta = "Excepción";break;}
case "08": { 	$respuesta = "Supera Tope";break;}
case "10": { 	$respuesta = "Prestador Inexistente";break;}
case "11": { 	$respuesta = "Prestador No Habilitado para el POS XXX ";break;}
}
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

 $sql1="select * from requisitos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$requisitos=$result1->fields["requisitos"];
$version=$result1->fields["version"];
$suspendido=$result1->fields["suspendido"];
$vigencia=$result1->fields["vigencia"];
$comunes=$result1->fields["comunes"];
$especiales=$result1->fields["alta"];
$alta=$result1->fields["alta"];
$planes=$result1->fields["planes"];
$diagnostico=$result1->fields["diagnostico"];
$info_planes=$result1->fields["info_planes"];
$planes_rechazados=$result1->fields["planes_rechazados"];
$motivo_rechazo=$result1->fields["motivo_rechazo"];



 if ($respuesta1 == 00){
	 
 $sql="select * from planes_os where nro_os like '$nro_os' and nro_plan = $plan";
$result = $db->Execute($sql);

 
$cod_operacion=$result->fields["cod_operacion"];
$nro_plan=$result->fields["nro_plan"];
$nombre_plan=$result->fields["nombre_plan"];
$reducido_plan=$result->fields["reducido_plan"];
$coseguro=$result->fields["coseguro"];
$comunes=$result->fields["comunes"];
$especiales=$result->fields["especiales"];
$alta=$result->fields["alta"];
$pmo=$result->fields["pmo"];
$texto=$result->fields["texto"];

$mensaje_display;


include ("respuesta_osde.php");



  }else{
 
include ("respuesta_osde_error.php");

  }

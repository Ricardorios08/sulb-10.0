<?php

include ("../../conexiones/config.inc.php");
$codigo_financiador = "11"; // osde
$cuit_financiador = "30546741253";
$tipo_transaccion = "01A";
$fechaTrx = date("Ymd");
$HoraTrx = date("hms");
$cuit_prestador = "30545508652";
$numero_credencial = "61743962001";


   echo $mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=a81757c8-0dc4-1030-9364-001a6464572c&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Terminal><TipoTerminal>PC</TipoTerminal><NumeroTerminal>1234</NumeroTerminal></Terminal><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador><SucursalPrestador>".$terminal."</SucursalPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial><track>".$track."</track></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";


   
echo $myText = (string)$mensaje;

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



$dia_nac = substr($fecha_nacimiento,6,2);
$mes_nac = substr($fecha_nacimiento,4,2);
$anio_nac = substr($fecha_nacimiento,0,4);





 $fecha_nacimiento;


if ($iva == "E"){
$tp_afiliado = "NO GRAVADO";
$tipo_afiliado = 0;
}else{
$tp_afiliado = "GRAVADO";
$tipo_afiliado = 1;
}

if ($sexo == "F"){
$sexo = "Femenino";
}else{
$sexo = "Masculino";
}


echo $resp = $tipo_afiliado.";".$mensaje_display.";".$apellido.";".$tp_afiliado;
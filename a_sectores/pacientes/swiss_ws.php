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

$cuit_prestador;
if ($cuit_verificacion != $cuit_prestador){

	   $sql="select * from datos_osde where cuit = $cuit_verificacion";
 $result5 = $db->Execute($sql);

$nro_laboratorio1=strtoupper($result5->fields["cuenta_abm"]);
$sucursal=strtoupper($result5->fields["sucursal"]);
$prestador=strtoupper($result5->fields["prestador"]);



$leyenda = "CUANDO VERIFICO UTILIZO EL CUIT: ".$prestador." - ".$cuit_verificacion;
include ("../../alertas/campo_informacion2.php");
EXIT;
}


$dia = substr($ultima_fecha,8,2);
$mes= substr($ultima_fecha,5,2);
$anio = substr($ultima_fecha,0,4);

 $ultima_fecha = $anio.$mes.$dia;
 $ultima_fecha_osde = $anio."-".$mes."-".$dia;
// $ultima_fecha_osde = "2016-11-30";
 $fecha_de_hoy = date("Y-m-d");


 $vto_trata = "+50 day";
$nuevafecha = strtotime ( $vto_trata , strtotime ( $ultima_fecha_osde ) ) ;
 $nuevafecha = date ( 'Y-m-j' , $nuevafecha );

 


if ($nuevafecha < $fecha_de_hoy){



}



$fechaTrx = date("Ymd");
$HoraTrx = date("his");

include("../../conexiones/config.inc.php");

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
		


   //$a = "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=".$pas_abm."&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>".$tipo_transaccion."</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$ultima_fecha."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Financiador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador><SucursalPrestador>".$sucursal."</SucursalPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial><Preautorizacion>".$aut_mail."</Preautorizacion></Credencial></EncabezadoAtencion>";

  $a = "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=".$pas_abm."&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>02A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$ultima_fecha."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Financiador><CodigoFinanciador>26</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_swiss."</CuitPrestador><RazonSocial></RazonSocial><SucursalPrestador>".$sucursal_swiss."</SucursalPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion>";



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


//$final = "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=".$pas_abm."&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>02A</TipoTransaccion><IdMsj>29450</IdMsj><InicioTrx><FechaTrx>20170502</FechaTrx><HoraTrx>190620</HoraTrx></InicioTrx><Financiador><CodigoFinanciador>26</CodigoFinanciador><CuitFinanciador>30654855168</CuitFinanciador></Financiador><Prestador><CuitPrestador>20125735496</CuitPrestador><RazonSocial></RazonSocial></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>7180171000054</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos><NroItem>1</NroItem><CodPrestacion>660475</CodPrestacion><CodAlternativo></CodAlternativo><TipoPrestacion>1</TipoPrestacion><ArancelPrestacion>0</ArancelPrestacion><CantidadSolicitada>1</CantidadSolicitada><DescripcionPrestacion></DescripcionPrestacion></DetalleProcedimientos></Mensaje>";


     file_put_contents("autorizacion_swiss.xml", $final);


   $myText = (string)$final;
 
 
require_once("../../nusoap/lib/nusoap.php");
$wsdl='http://laboratoriosegura.com/nusoap/lib/web_service.php?wsdl';

$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('xml'=>$final , 'variable2'=>$nro_afiliado444);
$response1= $client->call('aut_itc', $param1);

$xm = "autorizacion_swiss".$usuario.".xml";

file_put_contents("respuesta_swiss_new.xml", $response1);


file_put_contents($xm, $response1);


//unlink('respuesta_osde1.xml');



//print_r($response1); 

$xml = new SimpleXmlElement($response1, LIBXML_NOCDATA);
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
$referencia = $item9;
}

foreach($xml->EncabezadoAtencion->Preautorizacion->CodigoPreautorizacion as $item20){
$transaccion = $item20;
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


switch ($respuesta1){
case "0000": { 	$respuesta = "Solicitud Autorizada/Aprobada";break;}
case "000": { 	$respuesta = "Solicitud Autorizada/Aprobada";break;}
case "001": { 	$respuesta = "Asociado (beneficiario) Inexistente";break;}
case "002": {	$respuesta = "Asociado (beneficiario) dado de baja o con alta a futuro 	El asociado debe comunicarse con el financiador para confirmar su situación. No es posible subsanar este error sin la intervención de la prepaga u obra social.";break;}
case "003": { 	$respuesta = "Asociado (beneficiario) moroso 	El asociado debe comunicarse con el financiador. No es posible subsanar este error sin la intervención de la prepaga u obra social.";break;}
case "004": { 	$respuesta = "Prestación Inexistente 	Revisar si el código de prestación que ingresó es correcto. Si utiliza nomenclador propio envíenos el código y descripción para que verifiquemos su tabla de transcodificación.";break;}
case "005": { 	$respuesta = "Carencia o tiempo de espera para la prestación 	El asociado no está autorizado a recibir dicha prestación.";break;}
case "006": { 	$respuesta = "Preexistencia 	El asociado no está autorizado a recibir dicha prestación.";break;}
case "007": { 	$respuesta = "Excepción 	El asociado no está autorizado a recibir dicha prestación.";break;}
case "008": { 	$respuesta = "Supera Tope 	El asociado no está autorizado a recibir dicha prestación.";break;}

case "010": { 	$respuesta = "Prestador Inexistente 	El CUIT enviado en la transacción para identificar al prestador que va a facturar la transacción no existe. Revise el CUIT o póngase en contacto con nuestra Mesa de Ayuda para verificar el alta.";break;}
case "011": { 	$respuesta = "Prestador No Habilitado para el POS XXX 	El CUIT enviado en la transacción para identificar al prestador que va a facturar es correcto pero el alta está incompleta, o póngase en contacto con nuestra Mesa de Ayuda para verificar el alta.";break;}
case "012": { 	$respuesta = "Prestación no contratada 	El prestador debe comunicarse directamente con el Financiador para solicitar inclusión.";break;}
case "013": { 	$respuesta = "Código de autorización erróneo 	Realice la transacción sin ingresar el código de autorización, el sistema intentará recuperar automáticamente si existe un código vigente para el prestador,asociado y prestación.";break;}
case "014": { 	$respuesta = "Solicitud anulada / rechazada/ o sin saldo 	Debe consultarse si dicha solicitud no ha sido anulada previamente, rechazada o si ya ha sido utilizada. No es posible utilizarla. Si está realizando un tratamiento por sesiones debe solicitar el alta de un nuevo tratamiento (en forma electrónica) o revisar las sesiones consumidas y anular las que se encuentran incorrectamente solicitadas.";break;}	
//case "020": { 	$respuesta = "ERROR, PRESTADOR INVALIDO O NO HABILITADO. 	";break;}
case "021": { 	$respuesta = "No requiere prescripción 	No es necesario informar esta prescripción para que el beneficiario pueda acceder a la prestación. Directamente envíe una registración para su autorización.	";break;}
//case "022": { 	$respuesta = "ERROR, PLAN NO CONTRATADO. 	";break;}
case "023": { 	$respuesta = "La prestación no requiere autorización previa 	Directamente envíe una registración para su autorización.";break;} case "024": { 	$respuesta = "Solicitud existente 	Puede deberse a que se haya solicitado con anterioridad la autorización para ese asociado y esa prestación.";break;}
case "025": { 	$respuesta = "Fecha inválida 	Verificar la fecha que se ha cargado.";break;}
case "026": { 	$respuesta = "Credencial vencida 	El asociado ha presentado una credencial vencida. Aunque no necesariamente carece de cobertura, la identificación que está presentando se encuentra vencida o ha sido dada de baja por su financiador. Debería por lo tanto comunicarse el beneficiario con su prepago u obra social obtener una nueva credencial.";break;}
case "027": { 	$respuesta = "Código de Fin de Terapia Inválido 	El código de finalización o motivo de alta es incorrecto.";break;}
case "028": { 	$respuesta = "Fecha de Práctica < Fecha de la Orden 	A la fecha en que se realizó la prestación no estaba autorizada la orden o el alta de tratamiento. Revise la fecha de práctica y reintente la transacción.";break;}
case "029": { 	$respuesta = "Debe ser ingreso manual 	En la transacción al ser por diferida el afiliado no se encuentra presente. Debe indicarse que el ingreso de la credencial es manual en lugar de lectura de banda magnética.";break;}


case "030": { 	$respuesta = "Debe informar número de orden 	Ingrese el número de autorización asignado por el financiador para acceder a esta/s prestación/es";break;}
case "031": { 	$respuesta = "Asociado (beneficiario) no habilitado 	Es la credencial (plástico) que se utiliza para identificar al afiliado el que no está vigente. Seguramente el afiliado recibió una credencial de reemplazo y está presentando fue dada de baja.";break;}
case "032": { 	$respuesta = "Asociado (beneficiario) no habilitado 	Es la credencial (plástico) que se utiliza para identificar al afiliado el que no está vigente. Seguramente el afiliado recibió una credencial de reemplazo y está presentando se encuentra vencida, no puede utilizarse.";break;}

case "036": { 	$respuesta = "Pendiente de resolución 	Intente la consulta en 24 horas, aun no ha sido revisada por los auditores.	";break;}
case "037": { 	$respuesta = "Solicitud rechazada 	No ha sido autorizada la solicitud. Consulte directamente al financiador para más detalles.";break;}
case "038": { 	$respuesta = "La solicitud está anulada 	No es necesario realizar una nueva anulación.	";break;}
case "039": { 	$respuesta = "Se ha cargado mal el número de solicitud 	Revise el número ingresado.";break;}
case "040": { 	$respuesta = "Anulación no registrada 	No es posible anular la transacción deseada. La transacción que se desea anular fue rechazada o corresponde a un tipo de transacción que no es necesario anular. No es necesario realizar una nueva transacción de anulación.	";break;}
case "041": { 	$respuesta = "La solicitud no existe 	Revise el número ingresado de transacción ingresado.	";break;}

case "044": { 	$respuesta = "El protocolo no se puede volver a enviar sin antes anular la transacción anterior 	";break;}
case "045": { 	$respuesta = "Protocolo quirúrgico no aceptado, número de orden de internación incorrecto 	Revise el número de orden de internación (OI) enviado que corresponda al afiliado y al prestador que fue otorgado.";break;}
case "046": { 	$respuesta = "Se intentó enviar el protocolo sin antes informar la cirugía 	El protocolo no tiene una cirugía asociada. Revise el número de orden de internación (OI) enviado.	";break;}
case "047": { 	$respuesta = "Orden de cirugía o transacción anulada, la solicitud fue rechazada o anulada 	La OI enviada se encuentra anulada. ";break;}	
case "048": { 	$respuesta = "Nombre de archivo inválido, el archivo de la imagen digitalizada ya fue enviado 	Si desea enviar un nuevo archivo debe asignarle otro nombre.	";break;}
case "049": { 	$respuesta = "Número de orden de cirugía o transacción no informado en la transacción 	 	";break;}

case "051": { 	$respuesta = "Debe Registrar Cirugía 	";break;}
case "055": { 	$respuesta = "Prestación XXXXXX no habilitada, el beneficiario posee una carencia o restricción 	Comuníquese con la Mesa de Ayuda del financiador para conocer los motivos o derive al paciente, si es posible, a tramitar una autorización especial.";break;}
case "061": { 	$respuesta = "Anulación no registrada 	La transacción que desea anular ya entró en el circuito de facturación. No es posible realizar la anulación. Deberá contactarse con facturación o no incluirla en el lote de transacciones a facturar. 	";break;}
case "062": { 	$respuesta = "Anulación no registrada 	No es necesario realizar la anulación de la transacción enviada, la misma ya se encuentra anulada.";break;}
case "073": { 	$respuesta = "Plan no contratado 	Póngase en contacto con el financiador para verificar su contratación.	";break;}
case "077": { 	$respuesta = "La transacción posee prestaciones pertenecientes a órdenes de internación diferentes o no incluidas en la orden de internación informada 	";break;}
case "093": { 	$respuesta = "Código de Seguridad Erroneo	";break;}
case "099": { 	$respuesta = "Supera tope diario. Necesita HC	";break;}
}


  $mensaje_printer;
  $respuesta1;
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


<table width="215" border="0" cellpadding="0" cellspacing="0">

  <!-- <tr>
    <td bgcolor="#F0F0F0"><div align="left" class="Estilo3"><?php echo $apellido;?> <?php echo $nombre;?></div>     </td>
  </tr> -->
      
   <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3">
	
	
	<?php 

  $mensaje_printer = nl2br( stripslashes( htmlentities($mensaje_printer)));
 echo $mensaje_printer;


/*if (($respuesta != 000) or ($respuesta != 0000)){

	  $mensaje_printer = nl2br( stripslashes( htmlentities($mensaje_printer)));
 echo $mensaje_printer;


$porciones = explode("--------------------------------------", $mensaje_printer);
echo $porciones[0]; // porción1
echo "<br>";
echo "--------------------------------------";
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
}else{
echo $mensaje_printer;
}
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
	
	if (($respuesta1 == 0000) or ($respuesta1 == 0000)){

		   $sql = "UPDATE pacientes SET  `nombre` = '$nombre', `apellido` = '$apellido',`nro_documento` = '$nro_documento', `fecha_nacimiento` = '$fecha_nacimiento' , `tipo_afiliado` = '$tipo_afiliado' , `plan` = '$plan' , `coseguro` = '$coseguro' , `activo` = '$mensaje_display' , `ultima_01a` = '$fechaTrx' WHERE `nro_paciente` = $nro_paciente LIMIT 1";
//mysql_query($sql);

$leyenda = "SWISS: ".$transaccion;

?>
<table width="215" border="2" cellspacing="0">
  <tr>
    <th height="61" bgcolor="#EDEDED" scope="col"><blink></blink><blink><span class="Estilo12"><?php echo $leyenda;?></span></blink><span class="Estilo1 Estilo25"><blink></blink></span> </th>
  </tr>
</table>
<table width="215" border="1">
  <tr>
    <td width="101"><div align="center"><a href="buscar_paciente.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"></a><a href="buscar_paciente.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"> Volver al paciente</a></div></td>
    <td width="98"><div align="center"><a href="reimprimir.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>">RE-IMPRIMIR</a></div></td>
  </tr>
</table>
<?php 

	include ("abm_ws.php");

	}

	?>

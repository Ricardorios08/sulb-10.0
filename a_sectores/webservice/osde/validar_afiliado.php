<style type="text/css">
<!--
.Estilo42 {font-family: "Trebuchet MS"}
-->
</style>


<?php
ECHO $numero_credencial= $_REQUEST['nro_afiliado'];


//$numero_credencial =  str_pad($numero_credencial, 11, "0", STR_PAD_LEFT); 

$tipo_transaccion = "02A";
$tipo_transaccion = "02L";

$tipo_transaccion = "02L";
$tipo_transaccion = "01A";


$fechaTrx = date("Ymd");
$HoraTrx = time("hms");
$cuit_financiador = "30546741253";
$cuit_prestador = "30708402911";
$afil = "62090275102";
$id = rand();

$ws = "ws.itcsoluciones.com:48080/jSitelServlet/Do?";
$pas = "pas=32dbf220f1ab2303592b4a076162c221600ef704";


//$mensaje = "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=32dbf220f1ab2303592b4a076162c221600ef704&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>".$tipo_transaccion."</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>20130520</FechaTrx><HoraTrx>190620</HoraTrx></InicioTrx><Financiador><CodigoFinanciador>11</CodigoFinanciador><CuitFinanciador>30546741253</CuitFinanciador></Financiador><Prestador><CuitPrestador>30708402911</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";

//$mensaje = "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=32dbf220f1ab2303592b4a076162c221600ef704&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>02A</TipoTransaccion><IdMsj>1</IdMsj><InicioTrx><FechaTrx>20090902</FechaTrx><HoraTrx>090020</HoraTrx></InicioTrx><Financiador><CuitFinanciador>30546741253</CuitFinanciador></Financiador><Prestador><CuitPrestador>30580910927</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>60671956201</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTramiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";

$mensaje = "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=32dbf220f1ab2303592b4a076162c221600ef704&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>02A</TipoTransaccion><IdMsj>354</IdMsj><InicioTrx><FechaTrx>20091005</FechaTrx><HoraTrx>190620</HoraTrx></InicioTrx><Financiador><CodigoFinanciador>11</CodigoFinanciador><CuitFinanciador>30546741253</CuitFinanciador></Financiador><Prestador><CuitPrestador>30708402911</CuitPrestador><RazonSocial>CENTRO DE DIAGNOSTICO POR IMAGENES</RazonSocial></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>60671956201</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos><NroItem>1</NroItem><CodPrestacion>290106</CodPrestacion><CodAlternativo></CodAlternativo><TipoPrestacion>1</TipoPrestacion><ArancelPrestacion>0</ArancelPrestacion><CantidadSolicitada>1</CantidadSolicitada><DescripcionPrestacion>ELECTROMIOGRAFIA CON VELOCIDAD</DescripcionPrestacion></DetalleProcedimientos></Mensaje>";


 $mensaje = "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=32dbf220f1ab2303592b4a076162c221600ef704&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>".$tipo_transaccion."</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Financiador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTramiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";


$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $mensaje);

curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $consulta);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$resp=curl_exec ($ch);
curl_close ($ch);

//var_dump($resp);






$xml = new SimpleXmlElement($resp, LIBXML_NOCDATA);
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


?>

<table width="822" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center" class="Estilo42">VALIDACION AFILIADO OSDE </div></td>
  </tr>
  <tr>
    <td><div align="center"><span class="Estilo42">Afiliado</span></div></td>
    <td><?php echo $apellido;?> <?php echo $nombre;?> </td>
  </tr>
      <tr>
    <td><div align="center"><span class="Estilo42">Documento</span></div></td>
    <td><?php echo $nro_documento;?></td>
  </tr>

  
  <tr>
    <td width="151"><div align="center"><span class="Estilo42">Mensaje</span></div></td>
    <td width="665"><?php echo $mensaje_display;?></td>
  </tr>

    <tr>
    <td width="151"><div align="center"><span class="Estilo42">Mensaje</span></div></td>
    <td width="665"><?php echo $mensaje_printer;?></td>
  </tr>

  <!-- <tr>
    <td><div align="center"><span class="Estilo42">id</span></div></td>
    <td><?php echo $id;?></td>
  </tr> -->
  <tr>
    <td><div align="center"><span class="Estilo42">Credencial</span></div></td>
    <td><?php echo $credencial;?></td>
  </tr>
  <tr>
    <td><div align="center"><span class="Estilo42">Plan</span></div></td>
    <td><?php echo $plan;?></td>
  </tr>
  <tr>
    <td><div align="center"><span class="Estilo42">Condicion IVA</span></div></td>
    <td><?php echo $iva;?></td>
  </tr>
  <tr>
    <td><div align="center"><span class="Estilo42">Sexo</span></div></td>
    <td><?php echo $sexo;?></td>
  </tr>
    <tr>
    <td><div align="center"><span class="Estilo42">NroReferencia</span></div></td>
    <td><?php echo $transaccion;?></td>
  </tr>
      <tr>
    <td><div align="center"><span class="Estilo42">CodRtaGeneral</span></div></td>
    <td><?php echo $respuesta1;?></td>
  </tr>

</table>


<?php




/*$ch = curl_init('ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=32dbf220f1ab2303592b4a076162c221600ef704&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>333</IdMsj><InicioTrx><FechaTrx>20130520</FechaTrx><HoraTrx>190620</HoraTrx></InicioTrx><Financiador><CodigoFinanciador>11</CodigoFinanciador><CuitFinanciador>30546741253</CuitFinanciador></Financiador><Prestador><CuitPrestador>30708402911</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>60671956201</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>');
*/
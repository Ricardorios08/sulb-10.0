<style type="text/css">
<!--
.Estilo42 {font-family: "Trebuchet MS"}
-->
</style>

<?php

$numero_credencial = "61904246903";

 $ch = curl_init('ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=32dbf220f1ab2303592b4a076162c221600ef704&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>2</IdMsj><InicioTrx><FechaTrx>20130520</FechaTrx><HoraTrx>190620</HoraTrx></InicioTrx><Financiador><CodigoFinanciador>11</CodigoFinanciador><CuitFinanciador>30546741253</CuitFinanciador></Financiador><Prestador><CuitPrestador>30708402911</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>61981168302</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>');
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $consulta);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$resp=curl_exec ($ch);
curl_close ($ch);

//var_dump($resp);

 $resp;






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

foreach($xml->EncabezadoAtencion->Beneficiario->FechaNacimiento as $item11){
$fecha_nacimiento = $item11;
}


foreach($xml->EncabezadoAtencion->NroDocBeneficiario as $item10){
$nro_documento = $item10;
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
    <td width="151"><div align="center"><span class="Estilo42">Mensaje</span></div></td>
    <td width="665"><?php echo $mensaje_display;?></td>
  </tr>
  <tr>
    <td><div align="center"><span class="Estilo42">id</span></div></td>
    <td><?php echo $id;?></td>
  </tr>
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
    <td><div align="center"><span class="Estilo42">Nacimiento</span></div></td>
    <td><?php echo $fecha_nacimiento;?></td>
  </tr>


</table>

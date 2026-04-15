<?PHP 

$sql10="select * from datos_principales";
$result10 = $db->Execute($sql10);

//$cuit_prestador=$result10->fields["cuit"];
$terminal=$result10->fields["terminal"];



$tipo_transaccion = "04A";

 $sucursal_swiss;
 $cuit_swiss;


 

//$cuit_prestador = "30708402911"; // anular cuando empiece a funcionar...

$afil = "62090275102";
$id = rand();

$ws = "ws.itcsoluciones.com:48080/jSitelServlet/Do?";
$pas = "pas=32dbf220f1ab2303592b4a076162c221600ef704";
$pas_abm = "a81757c8-0dc4-1030-9364-001a6464572c";

//$numero_credencial = "61667853201";
$tipo_transaccion = "04A";
$codigo_financiador = "11";
//$cuit_prestador = "30689310547"; // SV LABORATORIO

$codigo_financiador = "26"; // SWISS
$cuit_financiador = "30654855168";



 // $mensaje = "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=e1e702ba-65a3-102f-9fa6-001a6464572c&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj>  <NroReferenciaCancel>".$autorizacion_ws."</NroReferenciaCancel><TipoTransaccion>".$tipo_transaccion."</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Financiador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial><Track>".$numero_credencial."</Track></Credencial><Atencion><FechaAtencion>".$fechfecha."</FechaAtencion></Atencion></EncabezadoAtencion></Mensaje>";
  

    $mensaje = "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=".$pas_abm."&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><NroReferenciaCancel>".$autorizacion_ws."</NroReferenciaCancel><TipoTransaccion>04A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_swiss."</CuitPrestador><SucursalPrestador>".$sucursal_swiss."</SucursalPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial></Credencial><Atencion><FechaAtencion></FechaAtencion></Atencion></EncabezadoAtencion></Mensaje>";


file_put_contents("anula_swiss.xml", $mensaje);
 


 $myText = (string)$mensaje;


require_once("../../nusoap/lib/nusoap.php");
$wsdl='http://laboratoriosegura.com/nusoap/lib/web_service.php?wsdl';

//$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/web_service.php?wsdl';

$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('xml'=>$mensaje , 'variable2'=>$nro_afiliado444);
     $response= $client->call('itc', $param1);

    file_put_contents("respuesta_swiss_anula.xml", $response);





unlink('respuesta_swiss_anula.xml');
unlink('anula_swiss.xml');
file_put_contents("respuesta_swiss_anula.xml", $mensaje);
file_put_contents("anula_swiss.xml", $response);






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


IF ($iva == "G"){
	$marca = "1";
}elseif ($marca == "E"){
	$marca = "0";
}

?>

<table width="350" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#B8B8B8"><div align="center" class="Estilo42 Estilo1 Estilo4">RESPUESTA DE OBRA SOCIAL  SWISS </div></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><div align="left" class="Estilo3"><?php echo $apellido;?><?php echo $nombre;?></div>     </td>
  </tr>
      

  
  <tr>
    <td bgcolor="#F0F0F0"><div align="left"><span class="Estilo1"><span class="Estilo2"></span></span><span class="Estilo3"><?php echo $mensaje_display;?></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3"><?php echo $nro_referencia;?></span></td>
  </tr>

  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3">Transacción: <?php echo $transaccion;?></span></td>
  </tr>
    <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3">IdMsj <?php echo $id;?></span></td>
  </tr>


  <!-- <tr>
    <td><div align="center"><span class="Estilo42">id</span></div></td>
    <td><?php echo $id;?></td>
  </tr> -->
</table>



<?php

if ($respuesta1 == 00){
include ("anula_abm_ws.php");
}















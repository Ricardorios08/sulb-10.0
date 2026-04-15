<?php

include("../../conexiones/config.inc.php");
require_once("../../nusoap/lib/nusoap.php");


 $sql10="select * from pacientes where nro_paciente = $nro_paciente";
$result10 = $db->Execute($sql10);

$numero_credencial=$result10->fields["nro_afiliado"];
$numero_credencial = $numero_credencial * 1;
$ultima_fecha=$result10->fields["ultima_fecha"];
$track=$result10->fields["track"];
$ultima_01a=$result10->fields["ultima_01a"];


$dia = substr($ultima_fecha,8,2);
$mes= substr($ultima_fecha,5,2);
$anio = substr($ultima_fecha,0,4);

$ultima_fecha = $anio.$mes.$dia;



$tipo_transaccion = "02A";
$tipo_transaccion = "02L";
$tipo_transaccion = "01A";
$tipo_transaccion = "02L";
$tipo_transaccion = "01A";

//77651215
$fechaTrx = date("Ymd");
$HoraTrx = date("his");


$cuit_financiador = "30546741253";
//$cuit_prestador = "30708402911"; // anular cuando empiece a funcionar...


$afil = "62090275102";
$id = rand();

$ws = "ws.itcsoluciones.com:48080/jSitelServlet/Do?";
$pas = "32dbf220f1ab2303592b4a076162c221600ef704";




//$numero_credencial = "61667853201";

$pas_abm = "a81757c8-0dc4-1030-9364-001a6464572c";
$tipo_transaccion = "02A";

//$cuit_prestador = "30689310547"; // SV LABORATORIO
//$terminal = 0027;




  $sql10="select * from detalle WHERE cod_grabacion = '$cod_grabacion'";
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
		


   $a = "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=".$pas_abm."&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>".$tipo_transaccion."</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$ultima_fecha."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Financiador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial><track>".$track."</track></Credencial></EncabezadoAtencion>";


//$cont = 1;
//$cod_practica = 475;

//$a2 = "<DetalleProcedimientos><NroItem>".$cont."</NroItem><CodPrestacion>".$cod_practica."</CodPrestacion><CodAlternativo></CodAlternativo><TipoPrestacion>1</TipoPrestacion><ArancelPrestacion>0</ArancelPrestacion><CantidadSolicitada>1</CantidadSolicitada><DescripcionPrestacion></DescripcionPrestacion></DetalleProcedimientos>";

//$cont = 2;
//$cod_practica = 876;
//$a3 = "<DetalleProcedimientos><NroItem>".$cont."</NroItem><CodPrestacion>".$cod_practica."</CodPrestacion><CodAlternativo></CodAlternativo><TipoPrestacion>1</TipoPrestacion><ArancelPrestacion>0</ArancelPrestacion><CantidadSolicitada>1</CantidadSolicitada><DescripcionPrestacion></DescripcionPrestacion></DetalleProcedimientos>";



//$a7 = $a2.$a3;

$afinal = "</Mensaje>";
 




//  $final = $a.$a6.$afinal;

    echo  $final = $a.$a5.$afinal;

   

$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $final);

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
<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo2 {font-size: 12px}
.Estilo3 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo4 {font-size: 14px}
-->
</style>


<table width="850" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#B8B8B8"><div align="center" class="Estilo42 Estilo1 Estilo4">RESPUESTA DE OBRA SOCIAL  OSDE </div></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><div align="left" class="Estilo3"><?php echo $apellido;?><?php echo $nombre;?></div>     </td>
  </tr>
      

  
  <tr>
    <td bgcolor="#F0F0F0"><div align="left"><span class="Estilo1"><span class="Estilo2"></span></span><span class="Estilo3"><?php echo $mensaje_display;?></span></div></td>
  </tr>
   <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3"><?php echo $mensaje_printer;?></span></td>
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

		   $sql = "UPDATE pacientes SET  `nombre` = '$nombre', `apellido` = '$apellido',`nro_documento` = '$nro_documento', `fecha_nacimiento` = '$fecha_nacimiento' , `tipo_afiliado` = '$tipo_afiliado' , `plan` = '$plan' , `coseguro` = '$coseguro' , `activo` = '$mensaje_display' , `ultima_01a` = '$fechaTrx' WHERE `nro_paciente` = $nro_paciente LIMIT 1";
//mysql_query($sql);



	include ("abm_ws.php");

	}

	?>

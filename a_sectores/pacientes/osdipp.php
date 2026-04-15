<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">

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



/*$tipo_transaccion = "02A";
$tipo_transaccion = "02L";
$tipo_transaccion = "01A";
$tipo_transaccion = "02L";
$tipo_transaccion = "01A";
*/



//77651215
$fechaTrx = date("Ymd");
$HoraTrx = date("his");


$cuit_financiador = "30547416011";
//$cuit_prestador = "30708402911"; // anular cuando empiece a funcionar...


$codigo_financiador = "59";
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
 $a5 = $a5."<DetalleProcedimientos><NroItem>".$cont."</NroItem><CodPrestacion>".$nro_practica."</CodPrestacion><CodAlternativo></CodAlternativo><TipoPrestacion>1</TipoPrestacion><ArancelPrestacion>0</ArancelPrestacion><CantidadSolicitada>1</CantidadSolicitada><DescripcionPrestacion></DescripcionPrestacion></DetalleProcedimientos>";

 



$result10->MoveNext();
	}
		



   $a = "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=a81757c8-0dc4-1030-9364-001a6464572c&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>02A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>30547416011</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><MensajeParaFinanciador/></EncabezadoAtencion>";


//$cont = 1;
//$cod_practica = 475;

//$a2 = "<DetalleProcedimientos><NroItem>".$cont."</NroItem><CodPrestacion>".$cod_practica."</CodPrestacion><CodAlternativo></CodAlternativo><TipoPrestacion>1</TipoPrestacion><ArancelPrestacion>0</ArancelPrestacion><CantidadSolicitada>1</CantidadSolicitada><DescripcionPrestacion></DescripcionPrestacion></DetalleProcedimientos>";

//$cont = 2;
//$cod_practica = 876;
//$a3 = "<DetalleProcedimientos><NroItem>".$cont."</NroItem><CodPrestacion>".$cod_practica."</CodPrestacion><CodAlternativo></CodAlternativo><TipoPrestacion>1</TipoPrestacion><ArancelPrestacion>0</ArancelPrestacion><CantidadSolicitada>1</CantidadSolicitada><DescripcionPrestacion></DescripcionPrestacion></DetalleProcedimientos>";



//$a7 = $a2.$a3;

 $afinal = "</Mensaje>";
 





//  $final = $a.$a6.$afinal;

  echo    $final = $a.$a5.$afinal;


 //echo $final =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=a81757c8-0dc4-1030-9364-001a6464572c&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>02A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>30623134659</CuitFinanciador></Financiador><Prestador><CuitPrestador>30545508652</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos><NroItem>1</NroItem><CodPrestacion>660475</CodPrestacion><CodAlternativo></CodAlternativo><TipoPrestacion>1</TipoPrestacion><ArancelPrestacion>0</ArancelPrestacion><CantidadSolicitada>1</CantidadSolicitada><DescripcionPrestacion>HEMOGRAMA</DescripcionPrestacion></DetalleProcedimientos></Mensaje>";



$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $final);

curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $consulta);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$resp=curl_exec ($ch);
curl_close ($ch);

var_dump($resp);






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


echo $mensaje_display;
?>
 


<table width="215" border="0" cellpadding="0" cellspacing="0">

  <tr>
    <td bgcolor="#F0F0F0"><div align="left" class="Estilo3"><?php echo $apellido;?><?php echo $nombre;?></div>     </td>
  </tr>
      
   <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3">
	
	
	<?php 
	
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
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[7]; // porción2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[8]; // porción2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[9]; // porción2
echo "<br>";
echo "--------------------------------------";
echo "<br>";
echo $porciones[10]; // porción2


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


?></span></td>
  </tr>

  </table>

<?php 
	
	echo "respuesta1".$respuesta1;

	if ($respuesta1 == 0000){

		   $sql = "UPDATE pacientes SET  `nombre` = '$nombre', `apellido` = '$apellido',`nro_documento` = '$nro_documento', `fecha_nacimiento` = '$fecha_nacimiento' , `tipo_afiliado` = '$tipo_afiliado' , `plan` = '$plan' , `coseguro` = '$coseguro' , `activo` = '$mensaje_display' , `ultima_01a` = '$fechaTrx' WHERE `nro_paciente` = $nro_paciente LIMIT 1";
mysql_query($sql);



	include ("abm_ws.php");

	}

	?>

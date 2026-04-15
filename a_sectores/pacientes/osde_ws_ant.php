<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">

<?php
echo "aca";

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


 $vto_trata = "+555 day";
$nuevafecha = strtotime ( $vto_trata , strtotime ( $ultima_fecha_osde ) ) ;
 $nuevafecha = date ( 'Y-m-j' , $nuevafecha );






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
		


   $a = "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=".$pas_abm."&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>".$tipo_transaccion."</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$ultima_fecha."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Financiador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador><SucursalPrestador>".$sucursal."</SucursalPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial><track></track><Preautorizacion>".$aut_mail."</Preautorizacion></Credencial></EncabezadoAtencion>";


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
$wsdl='http://fa000651.ferozo.com/nusoap/lib/web_service.php?wsdl';

//$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/web_service.php?wsdl';

$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('xml'=>$final , 'variable2'=>$nro_afiliado444);
     $response= $client->call('aut_itc', $param1);

    file_put_contents("respuesta_osde1.xml", $response);





//unlink('respuesta_osde1.xml');

file_put_contents("res_osde1.xml", $response);
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

	

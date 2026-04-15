<!-- <link href="../../css/fondo.css" rel="stylesheet" type="text/css" /> -->


<script language="javascript">
function on_load()
{
document.getElementById("nro_afiliado").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "nro_paciente":
				document.getElementById("nro_afiliado").focus();
				break;
				case "nro_afiliado":
				document.getElementById("apellido").focus();
				break;
					case "apellido":
				document.getElementById("nombre").focus();
				break;

				case "nombre":
				document.getElementById("nro_documento").focus();
				break;
				case "nro_documento":
				document.getElementById("domicilio").focus();
				break;
			
				case "domicilio":
				document.getElementById("telefono").focus();
				break;
				case "telefono":
				document.getElementById("celular").focus();
				break;
				case "celular":
				document.getElementById("dia").focus();
				break;
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("anio").focus();
				break;
				case "anio":
				document.getElementById("GUARDAR").focus();
				break;

				


				
		}
		return false;
	}
	return true;
}


</script>

<style type="text/css">
<!--
.Estilo25 {font-family: "Trebuchet MS"}
.Estilo26 {font-size: 18px}
.Estilo27 {font-family: "Trebuchet MS"; font-size: 18px; }
.Estilo36 {font-family: "Trebuchet MS"; font-size: 10; }
.Estilo37 {font-size: 10}
.Estilo38 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo41 {font-size: 12px}
.Estilo43 {font-family: "Trebuchet MS"; font-size: 18px; font-weight: bold; }
.Estilo44 {
	color: #FF0000;
	font-family: "Trebuchet MS";
}
-->
</style>
<BODY onload = "on_load()">
<form action="guardar_abm.php" method="post">
<?php 


include ("../../conexiones/config.inc.php");


$nro_o=$_POST["nro_os"];
	for ($i=0;$i<count($nro_o);$i++)    
	{     
	$nro_os = $nro_o[$i];    
	}



$sql10="select * from datos_principales";
$result10 = $db->Execute($sql10);

$nro_laboratorio1=$result10->fields["matricula"];
$cuit_prestador=$result10->fields["cuit"];
$terminal=$result10->fields["terminal"];


$sql="select * from pacientes ORDER BY nro_paciente DESC";
$result = $db->Execute($sql);

$nro_paciente=($result->fields["nro_paciente"] + 1);


$track=$_POST["track"];


//123_20B_20AFILIADO_20PRUEBA_20AUTORIZ_AUTOM__20310201510_20121_20__610531606719562017_151010150120000008_
//123_B_AFILIADO_PRUEBA_AUTORIZ_AUTOM__20310201510__135___610531606719562017_151010150120000008_

 $nro_afiliado=$_POST["nro_afiliado"];
$nro_afiliado=$_POST["numero_credencial_lector"];

if ($track != ""){
 $numero_credencial = substr($track,73,11);
}else{
 $numero_credencial = $nro_afiliado;
}


  $sql="select * from pacientes where nro_afiliado = '$numero_credencial' and nro_os = '$nro_os'";
$result = $db->Execute($sql);

$nro_pac=$result->fields["nro_paciente"];

if ($nro_pac != ''){

	$bande_nuevo = 1;
$palabra = $nro_pac;
$bande = 2;

include ("buscar_paciente_individual.php");
exit;
}




 $sql="select * from pacientes where nro_afiliado = $numero_credencial and nro_os = '$nro_os'";
$result = $db->Execute($sql);
$nro_afiliado1=$result->fields["nro_afiliado"];
$nro_paciente=$result->fields["nro_paciente"];


if ($nro_afiliado1 != ""){
$bande = 2;
$palabra = $nro_paciente;


$cuit_prestador = "30708402911"; // prestador de prueba
 //laboratorio
// 27002 concepto
/////////////////////////////////////////////////
if (($nro_os == 1041) or ($nro_os == 2462) or ($nro_os == 5291) or ($nro_os == 3771)){ //or ($nro_os == 5240) or ($nro_os == 5291) or ($nro_os == 2462) or ($nro_os == 4751)){ //abre obras sociales
//$numero_credencial = $nro_afiliado;
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
// afil 127931039
break;}

case "2462":{
$codigo_financiador = "36"; // SERVESA supuestamente activa con ITC
$cuit_financiador = "30550194283";
// afil 254801
break;}

case "3771":{
$codigo_financiador = "59"; // OSDIP supuestamente activa con ITC
$cuit_financiador = "30547416011";
// afil 254801
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
$pas_abm = "a81757c8-0dc4-1030-9364-001a6464572c";




$a = "123%20B%20AFILIADO%20PRUEBA%20AUTORIZ.AUTOM.-20310201510%20121%20_ñ610531606719562017¡151010150120000008_";
list($n1,$n2, $n3, $n4, $n5, $n6, $n7) = explode("%20",$a);

 //$track = $n1." ".$n2." ".$n3." ".$n4." ".$n5." ".$n6." ".$n7;


//$track = "123_20B_20AFILIADO_20PRUEBA_20AUTORIZ_AUTOM__20310201510_20121_20__610531606719562017_151010150120000008_";



if ($nro_os == 1041){
  $mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=".$pass_abm."&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Terminal><TipoTerminal>PC</TipoTerminal><NumeroTerminal>".$terminal."</NumeroTerminal></Terminal><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador></Prestador></EncabezadoMensaje><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial><track>".$track."</track></Credencial></Mensaje>";
}

if ($nro_os == 2462){

   $mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=".$pass_abm."&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Terminal><TipoTerminal>PC</TipoTerminal><NumeroTerminal>1234</NumeroTerminal></Terminal><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";
}

if ($nro_os == 5291){

  $mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=32dbf220f1ab2303592b4a076162c221600ef704&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Terminal><TipoTerminal>PC</TipoTerminal><NumeroTerminal>1234</NumeroTerminal></Terminal><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";
}



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


  $sql = "UPDATE pacientes SET `ultima_01a` = '$transaccion'   WHERE nro_afiliado = $numero_credencial";
mysql_query($sql);


}


$transaccion;
include ("buscar_paciente_individual.php");
EXIT;
}else{

$sql="select * from pacientes ORDER BY nro_paciente DESC";
$result = $db->Execute($sql);

$nro_paciente=($result->fields["nro_paciente"] + 1);


}



//if ($nro_afiliado == ""){
//$leyenda = "NO INGRESO NUMERO DE AFILIADO";
//include ("../../alertas/campo_informacion2.php");
//EXIT;
//}


$nro_o=$_POST["nro_os"];
	for ($i=0;$i<count($nro_o);$i++)    
	{     
	$nro_os = $nro_o[$i];    
	}

//$nro_os = 1041;
if ($nro_os == ""){
$leyenda = "NO INGRESO OBRA SOCIAL";
include ("../../alertas/campo_informacion2.php");
EXIT;
}

 $sql1="SELECT * FROM datos_os where nro_os = $nro_os";
$result1 = $db->Execute($sql1);

$sigla=$result1->fields["sigla"];


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



?>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" >
	

  <tr bgcolor="#CECECE">
  <td colspan="6"><div align="left" class="Estilo27 Estilo26"> 
    <div align="center"><font face="Trebuchet MS"><strong>REQUISITOS OBRA SOCIAL: <?php echo $nro_os;?> <?php echo $sigla;?></strong></font></div>
  </div></td>
</tr>

<?php if ($requisitos != ""){?>
  
  <tr bgcolor="#CECECE">
    <td colspan="7" bgcolor="#EDEDED"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $requisitos;?></font></div></td>
  </tr>
	<?php } ?>
</table>

<?php 

$cuit_prestador = "30708402911"; // prestador de prueba

 //laboratorio
// 27002 concepto
/////////////////////////////////////////////////
if (($nro_os == 1041) or ($nro_os == 2462) or ($nro_os == 5291)){ //or ($nro_os == 5240) or ($nro_os == 5291) or ($nro_os == 2462) or ($nro_os == 4751)){ //abre obras sociales
//$numero_credencial = $nro_afiliado;
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
// afil 127931039
break;}

case "2462":{
$codigo_financiador = "36"; // SERVESA supuestamente activa con ITC
$cuit_financiador = "30550194283";
// afil 254801
break;}

}



$tipo_transaccion = "01A";
$fechaTrx = date("Ymd");
$HoraTrx = date("hms");

$cuit_prestador = "30708402911"; // prestador de prueba
//30708402911

$afil = "62090275102";
$id = rand();

$ws = "ws.itcsoluciones.com:48080/jSitelServlet/Do?";
$pas = "pas=32dbf220f1ab2303592b4a076162c221600ef704";





$a = "123%20B%20AFILIADO%20PRUEBA%20AUTORIZ.AUTOM.-20310201510%20121%20_ñ610531606719562017¡151010150120000008_";
list($n1,$n2, $n3, $n4, $n5, $n6, $n7) = explode("%20",$a);

 //$track = $n1." ".$n2." ".$n3." ".$n4." ".$n5." ".$n6." ".$n7;


//$track = "123_20B_20AFILIADO_20PRUEBA_20AUTORIZ_AUTOM__20310201510_20121_20__610531606719562017_151010150120000008_";



if ($nro_os == 1041){
  $mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=32dbf220f1ab2303592b4a076162c221600ef704&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Terminal><TipoTerminal>PC</TipoTerminal><NumeroTerminal>1234</NumeroTerminal></Terminal><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial><track>".$track."</track></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";
}

if ($nro_os == 2462){
   $mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=32dbf220f1ab2303592b4a076162c221600ef704&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Terminal><TipoTerminal>PC</TipoTerminal><NumeroTerminal>1234</NumeroTerminal></Terminal><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";
}

if ($nro_os == 5291){
  $mensaje =  "ws.itcsoluciones.com:48080/jSitelServlet/Do?pas=32dbf220f1ab2303592b4a076162c221600ef704&msj=<Mensaje><EncabezadoMensaje><VersionMsj>1.0</VersionMsj><TipoTransaccion>01A</TipoTransaccion><IdMsj>".$id."</IdMsj><InicioTrx><FechaTrx>".$fechaTrx."</FechaTrx><HoraTrx>".$HoraTrx."</HoraTrx></InicioTrx><Terminal><TipoTerminal>PC</TipoTerminal><NumeroTerminal>1234</NumeroTerminal></Terminal><Financiador><CodigoFinanciador>".$codigo_financiador."</CodigoFinanciador><CuitFinanciador>".$cuit_financiador."</CuitFinanciador></Financiador><Prestador><CuitPrestador>".$cuit_prestador."</CuitPrestador></Prestador></EncabezadoMensaje><EncabezadoAtencion><Efector/><Prescriptor/><Credencial><NumeroCredencial>".$numero_credencial."</NumeroCredencial></Credencial><Preautorizacion/><Documentacion/><Atencion/><Diagnostico/><CodFinalizacionTratamiento/><MensajeParaFinanciador/></EncabezadoAtencion><DetalleProcedimientos/></Mensaje>";
}



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



    list($ape,$nom,$segnom) = explode(" ",$apellido);

     $ape; // Imprime 12

	  $nom; // Imprime 01

		$segnom; // Imprime 01

$apellido = $ape;
$nombre = $nom." ".$segnom;

?>
<!-- 
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
    <td><div align="center"><span class="Estilo42">NroReferencia</span></div></td>
    <td><?php echo $transaccion;?></td>
  </tr>
      <tr>
    <td><div align="center"><span class="Estilo42">CodRtaGeneral</span></div></td>
    <td><?php echo $respuesta1;?></td>
  </tr>

</table>  -->

<?php 
/////////////////
if ($nro_os == 1041){
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

/////////////




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

$nro_os=strtoupper($result->fields["nro_os"]);
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
?>





<table width="800" border="0" align="center" cellspacing="0" style="border-radius: 20px; padding: 15px; border: 0px none; text-align: justify; text-indent: 18px; background-color: rgba(100, 194, 191, 0.69);" >
    <!--DWLayoutTable-->
    
    <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="4" bgcolor="#BBDDFF" style="border-radius: 20px; padding: 15px; border: 0px none; text-align: justify; text-indent: 18px; background-color: rgba(100, 194, 191, 0.69);" ><span class="Estilo43"><font color="#000000">RESPUESTA: <?php echo $respuesta1;?> - <?php echo $respuesta;?><?php  $track;?></font></span></td>
    </tr>


    <tr align="center" bordercolor="#FFFFFF">
      <td width="157" height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2"> N&ordm; PACIENTE </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><div align="left">
          <font color="#000000" size="2">
          <input name="nro_paciente" type="text" id="nro_paciente" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" value = "<?php echo $nro_paciente;?>">
      </font></div></td>
      <td width="175" bgcolor="#EDEDED"><div align="right"><font color="#000000" size="2">N&deg; </font></div></td>
      <td width="154" bgcolor="#EDEDED"><div align="left"></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; AFILIADO </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nro_afiliado" type="text" id="nro_afiliado"onKeyPress="return verif_caracter(this,event)" value="<?php echo $numero_credencial;?>"  size="20" maxlength="20">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td align="center" bgcolor="#EDEDED"><div align="right"><font color="#000000" size="2">PLAN:</font></div></td>
      <td align="center" bgcolor="#EDEDED"><div align="left"><font color="#000000" size="2"><?php echo $plan;?>
            <input name="plan" type="hidden" value = "<?php echo $plan;?>">
      </font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="left" class="Estilo25"><font color="#000000" size="2">TIPO AFILIADO </font></div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2"><?php echo $tp_afiliado;?>
	  
	   <input name="tipo_afiliado" type="hidden" value = "<?php echo $tipo_afiliado;?>">
	  
	   <strong><font color="#000000" size="2">
	   <input name="nro_os" type="hidden" value = "<?php echo $nro_os;?>"><?php echo $nro_os;?>
      </font></strong></font></td>
      <td align="center" bgcolor="#EDEDED"><div align="right"><font color="#000000" size="2">COSEGURO</font></div></td>
      <td align="center" bgcolor="#EDEDED"><div align="left"><font color="#000000" size="2"><?php echo $coseguro;?>
            <input name="coseguro" type="hidden" value = "<?php echo $coseguro;?>">
      </font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">APELLIDO</font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="apellido" type="text" id="apellido"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $apellido;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td colspan="2" bgcolor="#EDEDED"><div align="center" class="Estilo38">AUTORIZAR</div>
      <div align="center" class="Estilo36"></div></td>
    </tr>

      <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">NOMBRE </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nombre" type="text" id="nombre"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $nombre;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38">COMUNES</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37"><font color="#000000"><?php echo $comunes;?></font></span></td>
    </tr>


    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">TIPO DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2"><strong><font color="#000000" size="2">
        <select name="tipo_doc[]" id="tipo_doc"onkeypress="return verif_caracter(this,event)">
          <option value = "D.N.I">D.N.I </option>
          <option value = "L.E">L.E </option>
          <option value = "L.C">L.C </option>
        </select>
      </font></strong>
      </font></td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38">ESPECIALES</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37"><font color="#000000"><?php echo $especiales;?></font></span></td>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="nro_documento" type="text" id="nro_documento" onKeyPress="return verif_caracter(this,event)"  VALUE = "<?php echo $nro_documento;?>" size="8" maxlength="8">
        <input name="nro_os" type="hidden" value = "<?php echo $nro_os;?>">
      </font></strong><font size="2"><span class="Estilo44">* Obligatorio</span></font> </td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38">ALTA</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37"><font color="#000000"><?php echo $alta;?></font></span></td>
    <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">DOMICILIO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">
        <input name="domicilio" type="text"  id="domicilio" onKeyPress="return verif_caracter(this,event)" size="40" maxlength="40">
      </font></td>
      <td colspan="2" bgcolor="#EDEDED"><div align="center" class="Estilo38"></div></td>
    <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">LOCALIDAD</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">

	  <?php 
$sql = "SELECT * FROM localidades order by cod_operacion";
$result = $db->Execute($sql);
echo "<select name=localidad[] size=1 id =localidad onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione LOCALIDAD</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$localidad=$result->fields["localidad"];



$departamento=strtoupper($result->fields["departamento"]);
echo"<option value='$localidad'>$departamento ($localidad)</option>";

$result->MoveNext();
	}
echo"</select>";

?>  </td>
      <td colspan="2" bgcolor="#EDEDED"><div align="center" class="Estilo38"></div></td>
    <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">TEL. FIJO </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="telefono" type="text" id="telefono"onKeyPress="return verif_caracter(this,event)"  size="12" maxlength="12">
      </font></strong></td>
      <td colspan="2" bgcolor="#EDEDED"><div align="center" class="Estilo38">DETALLE DEL PLAN </div></td>
    <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">CELULAR</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">
        <input name="celular" type="text" id="celular" onKeyPress="return verif_caracter(this,event)"size="12" maxlength="12">
      </font></td>
      <td colspan="2" rowspan="3" bgcolor="#EDEDED"><div align="center"><font color="#000000"><?php echo $texto;?></font></div></td>
    <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">SEXO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2">
      <?php echo $sexo;?>    <input name="sexo" type="hidden" value = "<?php echo $sexo;?>">
      </font><font size="2"><span class="Estilo44"> * Necesario </span> </font></td>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">FECHA NACIMIENTO </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2">

<?php echo $dia_nac;?> / <?php echo $mes_nac;?> / <?php echo $anio_nac;?>
        <input type="hidden" name="dia" id="dia"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2" value = <?php echo $dia_nac;?>>

<input type="hidden" name="mes" id="mes"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2" value = <?php echo $mes_nac;?>>

<input type="hidden" name="anio" id="anio"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4" value = <?php echo $anio_nac;?>>
      </font><font size="2"><span class="Estilo44">* Necesario </span> </font></td>
    <tr bordercolor="#FFFFFF">
    <td height="26" colspan="4" valign="top" bgcolor="#B8B8B8"><div align="center">

	   <input name="activo" type="hidden" value = "<?php echo $mensaje_display;?>">
  <input name="track" type="hidden" value = "<?php echo $track;?>">



      <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR PACIENTE">
    </div></td>
  <tr>
    <td height="0"></td>
    <td width="306"></td>
    <td colspan="2"></td>
  </tr>  
</table>

</form>


  <?php }ELSE{ ?>
<table width="800" border="0" align="center" cellspacing="0">
    <!--DWLayoutTable-->
    <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td height="37" colspan="4"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">VALIDACION EN LINEA  AFILIADOS</font></div></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td height="24" style="border-radius: 20px; padding: 15px; border: 0px none; text-align: justify; text-indent: 18px; background-color: rgba(100, 194, 191, 0.69);"  colspan="4" bgcolor="#BBDDFF"><div align="center" class="Estilo43"><font color="#000000">RESPUESTA OBRA SOCIAL:  <?php echo $respuesta1;?> - <?php echo $respuesta;?></font></div></td>
    </tr>
	   <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="4" bgcolor="#BBDDFF"><div align="center" class="Estilo43"><font color="#000000"><?php echo $mensaje_display;?></font></div></td>
    </tr>

 <tr>
    <th height="36" bgcolor="#EDEDED" scope="col"><span class="Estilo1 Estilo4">
      <input name="button" type="button" id ="boton" onClick="history.back()" onKeyPress="history.back()" value="Presione ENTER">
    </span></th>
  </tr>
</table>


<?php
}


}ELSEif ($nro_os == 5171){ // cambia obra social

 $numero_credencial = $nro_afiliado;
  $nf = substr($numero_credencial,11,2);


  $soapClient = new SoapClient("http://wsospeonline.gmssa.com.ar/wsoPadronSAN.asmx?wsdl");

       // Setup the RemoteFunction parameters
       $ap_param = array(
'cuil'     =>  $numero_credencial,  
'nf'   =>  $nf,
'username' =>  '30545508652',
'password' =>  'cb1999ae13d1c438abd1b43c5fe08f8e'
);
                 
       // Call RemoteFunction ()
       $error = 0;
       try {
           $info = $soapClient->__call("ObtenerInfoPadron", array($ap_param));
       } catch (SoapFault $fault) {
           $error = 1;

$leyenda = "Ha ingresado un numero incorrecto";
include ("../../alertas/campo_informacion2.php");
		   exit;
       }
     
       if ($error == 0) {      
//print_r($info->ObtenerInfoPadronResult);

$resultado = $info->ObtenerInfoPadronResult;

}
 
unset($soapClient); 


foreach ($resultado as $k => $v) {
$c = $c.$v."*";
}

$r=  list($nombre, $apellido, $credencial,  $TipoDocumento, $nro_documento, $CUIL,  $NF, $fecha_nacimiento,  $Edad,  $sexo, $Parentesco,  $mensaje_display,  $NroPlan, $plan, $coseguro,  $CodigoPostal, $Localidad,  $Provincia, $ProvinciaDesc, $NivelPlan, $Saldo) = explode("*",$c);





$dia_nac = substr($fecha_nacimiento,6,2);
$mes_nac = substr($fecha_nacimiento,4,2);
$anio_nac = substr($fecha_nacimiento,0,4);


if ($sexo == "F"){
$sexo = "Femenino";
}else{
$sexo = "Masculino";
}








if ($mensaje_display == "SI"){


  $sql="select * from planes_os where nro_os like '$nro_os' and nro_plan = $NroPlan";
$result = $db->Execute($sql);

$nro_os=strtoupper($result->fields["nro_os"]);
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

?>
<table width="800" border="0" align="center" cellspacing="0">
 
    <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="4" style="border-radius: 20px; padding: 15px; border: 0px none; text-align: justify; text-indent: 18px; background-color: rgba(100, 194, 191, 0.69);"  bgcolor="#BBDDFF"><div align="center" class="Estilo43"><font color="#000000">RESPUESTA OBRA SOCIAL: ACTIVO</font></div></td>
    </tr>


    <tr align="center" bordercolor="#FFFFFF">
      <td width="157" height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2"> N&ordm; PACIENTE </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><div align="left">
          <font color="#000000" size="2">
          <input name="nro_paciente" type="text" id="nro_paciente" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" value = "<?php echo $nro_paciente;?>">
      </font></div></td>
      <td width="100" bgcolor="#EDEDED"><div align="right" class="Estilo38"><font color="#000000">N&deg; </font></div></td>
      <td width="229" bgcolor="#EDEDED"><div align="left" class="Estilo41"><font color="#000000"><?php echo $NroPlan;?></font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; AFILIADO </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nro_afiliado" type="text" id="nro_afiliado"onKeyPress="return verif_caracter(this,event)" value="<?php echo $nro_afiliado;?>"  size="20" maxlength="20">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td align="center" bgcolor="#EDEDED"><div align="right" class="Estilo38"><font color="#000000">PLAN</font></div></td>
      <td align="center" bgcolor="#EDEDED"><div align="left" class="Estilo41"><font color="#000000"><?php echo $plan;?>
        <input name="plan" type="hidden" value = "<?php echo $plan;?>">


        <input name="activo" type="hidden" value = "<?php echo $mensaje_display;?>">
      </font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="left" class="Estilo25"><font color="#000000" size="2">TIPO AFILIADO </font></div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2"><?php echo $tp_afiliado;?>
	  
	   <input name="tipo_afiliado" type="hidden" value = "<?php echo $tipo_afiliado;?>">
	  
	  </font></td>
      <td align="center" bgcolor="#EDEDED"><div align="right" class="Estilo38"><font color="#000000">COSEGURO:</font></div></td>
      <td align="center" bgcolor="#EDEDED"><div align="left" class="Estilo41"><font color="#000000"><?php echo $coseguro;?>
        <input name="coseguro" type="hidden" value = "<?php echo $coseguro;?>">
      </font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">APELLIDO</font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="apellido" type="text" id="apellido"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $apellido;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td colspan="2" bgcolor="#EDEDED"><div align="center" class="Estilo38">AUTORIZAR</div>        
      <div align="center" class="Estilo36"></div></td>
  </tr>

      <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">NOMBRE </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nombre" type="text" id="nombre"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $nombre;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38">COMUNES</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37"><font color="#000000"><?php echo $comunes;?></font></span></td>
  </tr>


    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">TIPO DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2"><strong><font color="#000000" size="2">
        <select name="tipo_doc[]" id="tipo_doc"onkeypress="return verif_caracter(this,event)">
          <option value = "D.N.I">D.N.I </option>
          <option value = "L.E">L.E </option>
          <option value = "L.C">L.C </option>
        </select>
      </font></strong>
      </font></td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38">ESPECIALES</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37"><font color="#000000"><?php echo $especiales;?></font></span></td>
  <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="nro_documento" type="text" id="nro_documento" onKeyPress="return verif_caracter(this,event)"  VALUE = "<?php echo $nro_documento;?>" size="8" maxlength="8">
        <input name="nro_os" type="hidden" value = "<?php echo $nro_os;?>">
      </font></strong><font size="2"><span class="Estilo44">* Obligatorio</span></font> </td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38">ALTA</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37"><font color="#000000"><?php echo $alta;?></font></span></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">DOMICILIO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">
        <input name="domicilio" type="text"  id="domicilio" onKeyPress="return verif_caracter(this,event)" size="40" maxlength="40">
      </font></td>
    <td colspan="2" bgcolor="#EDEDED"><div align="center" class="Estilo38">PMO</div></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">LOCALIDAD</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">

	  <?php 
$sql = "SELECT * FROM localidades order by cod_operacion";
$result = $db->Execute($sql);
echo "<select name=localidad[] size=1 id =localidad onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione LOCALIDAD</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$localidad=$result->fields["localidad"];



$departamento=strtoupper($result->fields["departamento"]);
echo"<option value='$localidad'>$departamento ($localidad)</option>";
$result->MoveNext();
	}
echo"</select>";

?>  </td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38">PLAN PMO </div></td>
      <td bgcolor="#EDEDED"><span class="Estilo25 Estilo41"><font color="#000000"><?php echo $pmo;?></font></span></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">TEL. FIJO </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="telefono" type="text" id="telefono"onKeyPress="return verif_caracter(this,event)"  size="12" maxlength="12">
      </font></strong></td>
    <td colspan="2" bgcolor="#EDEDED"><div align="center" class="Estilo38">DETALLE DEL PLAN </div></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">CELULAR</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">
        <input name="celular" type="text" id="celular" onKeyPress="return verif_caracter(this,event)"size="12" maxlength="12">
      </font></td>
      <td colspan="2" rowspan="3" bgcolor="#EDEDED"><div align="center"><font color="#000000"><?php echo $texto;?></font></div></td>
  <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">SEXO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2">
      <?php echo $sexo;?>    <input name="sexo" type="hidden" value = "<?php echo $sexo;?>">
      </font><font size="2"><span class="Estilo44"> * Necesario </span> </font></td>
  <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">FECHA NACIMIENTO </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2">

<?php echo $dia_nac;?> / <?php echo $mes_nac;?> / <?php echo $anio_nac;?>
        <input type="hidden" name="dia" id="dia"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2" value = <?php echo $dia_nac;?>>

<input type="hidden" name="mes" id="mes"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2" value = <?php echo $mes_nac;?>>

<input type="hidden" name="anio" id="anio"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4" value = <?php echo $anio_nac;?>>
      </font><font size="2"><span class="Estilo44">* Necesario </span> </font></td>
  <tr bordercolor="#FFFFFF">
    <td height="26" colspan="4" valign="top" bgcolor="#B8B8B8"><div align="center">
      <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR PACIENTE">
    </div></td>
  <tr>
    <td height="0"></td>
    <td width="306"></td>
    <td colspan="2"></td>
  </tr>  
</table>
</form>

  <?php }ELSE{ ?>
<table width="800" border="0" align="center" cellspacing="0">
    <!--DWLayoutTable-->
    
    <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="4" style="border-radius: 20px; padding: 15px; border: 0px none; text-align: justify; text-indent: 18px; background-color: rgba(100, 194, 191, 0.69);"  bgcolor="#BBDDFF"><div align="center" class="Estilo43"><font color="#000000">RESPUESTA OBRA SOCIAL:  NO ACTIVO </font></div></td>
    </tr>

 <tr>
    <th height="36" bgcolor="#EDEDED" scope="col"><span class="Estilo1 Estilo4">
      <input name="button" type="button" id ="boton" onClick="history.back()" onKeyPress="history.back()" value="Presione ENTER">
    </span></th>
  </tr>
</table>


<?php
}

}else{

?>
<form action="guardar.php" method="post">
<table width="800" border="0" align="center" cellspacing="0">
    <!--DWLayoutTable-->
    
    <tr align="center" bordercolor="#FFFFFF">
      <td width="156" height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2"> N&ordm; PACIENTE </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><div align="left">
          <font color="#000000" size="2">
          <input name="nro_paciente" type="text" id="nro_paciente" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" value = "<?php echo $nro_paciente;?>">
      </font></div></td>
      <td colspan="2" bgcolor="#EDEDED"><div align="right" class="Estilo38">
        <div align="center"><font color="#000000">PLAN</font>ES</div>
      </div>        <div align="left" class="Estilo41"></div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><font size="2">OBRA SOCIAL </font></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2"><strong><font color="#000000" size="2"> <?php echo $nro_os;?> <?php echo $sigla;?>
              <input name="nro_os[]" type="hidden" value = "<?php echo $nro_os;?>">
              <input name="band" type="hidden" value = "1">
      </font><font size="2"><span class="Estilo44">* Obligatorio</span></font></strong></font></td>
      <td width="192" colspan="2" rowspan="13" align="center" valign="top" bgcolor="#EDEDED"><span class="Estilo41">
        <?php 
$sql = "SELECT * FROM planes_os where nro_os = $nro_os";
$result = $db->Execute($sql);
echo "<select name=nombre_plan[] size=16 id =nombre_plan onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione PLAN</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod_operacion=$result->fields["cod_operacion"];
 $nombre_plan=strtoupper($result->fields["nombre_plan"]);
$nro_plan=strtoupper($result->fields["nro_plan"]);
echo"<option value='$nombre_plan'>$nombre_plan ($nro_plan)</option>";
$result->MoveNext();
	}
echo"</select>";



?>
      </span>
      <div align="right" class="Estilo38"></div>        <div align="left" class="Estilo41"></div>      <div align="center"></div>      <div align="center"></div>      <div align="center"></div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; AFILIADO </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nro_afiliado" type="text" id="nro_afiliado"onKeyPress="return verif_caracter(this,event)"  value = "<?php echo $nro_afiliado;?>" size="20" maxlength="20" >      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
    </tr>
    
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">APELLIDO</font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="apellido" type="text" id="apellido"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $apellido;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
    </tr>

      <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">NOMBRE </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nombre" type="text" id="nombre"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $nombre;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
    </tr>


      <tr bordercolor="#FFFFFF">
        <td height="24" bgcolor="#EDEDED"><div align="left"><span class="Estilo25"><font color="#000000" size="2">TIPO AFILIADO </font></span></div></td>
        <td bgcolor="#EDEDED"><font color="#000000" size="2"><strong><font color="#000000" size="2">
          <select name="tipo_afiliado[]" id="tipo_afiliado[]"onkeypress="return verif_caracter(this,event)">
            <option value="0">NO GRAVADO (OBLIGATORIO) EXENTO</option>
            <option value="1">GRAVADO    (VOLUNTARIO)  CON IVA</option>
          </select>
        </font></strong></font></td>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">TIPO DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2"><strong><font color="#000000" size="2">
        <select name="tipo_doc[]" id="tipo_doc"onkeypress="return verif_caracter(this,event)">
          <option value = "D.N.I">D.N.I </option>
          <option value = "L.E">L.E </option>
          <option value = "L.C">L.C </option>
        </select>
      </font></strong>
      </font></td>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="nro_documento" type="text" id="nro_documento" onKeyPress="return verif_caracter(this,event)"  VALUE = "<?php echo $nro_documento;?>" size="8" maxlength="8">
      </font></strong>      <font size="2"><span class="Estilo44">* Obligatorio</span></font> </td>
    <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">DOMICILIO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">
        <input name="domicilio" type="text"  id="domicilio" onKeyPress="return verif_caracter(this,event)" size="40" maxlength="40">
      </font></td>
    <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">LOCALIDAD</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><?php 
$sql = "SELECT * FROM localidades order by cod_operacion";
$result = $db->Execute($sql);
echo "<select name=localidad[] size=1 id =localidad onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione LOCALIDAD</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$localidad=$result->fields["localidad"];


 


$departamento=strtoupper($result->fields["departamento"]);
echo"<option value='$localidad'>$departamento ($localidad)</option>";
$result->MoveNext();
	}
echo"</select>";

?>  </td>
    <tr bordercolor="#FFFFFF">
      <td height="26" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">TEL. FIJO </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="telefono" type="text" id="telefono"onKeyPress="return verif_caracter(this,event)"  size="12" maxlength="12">
      </font></strong></td>
    <tr bordercolor="#FFFFFF" bgcolor="#EDEDED">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">CELULAR</font></div>
      </div></td>
      <td><font size="2">
        <input name="celular" type="text" id="celular" onKeyPress="return verif_caracter(this,event)"size="12" maxlength="12">
      </font></td>
    <tr bordercolor="#FFFFFF" bgcolor="#EDEDED">
      <td height="26"><div align="right" class="Estilo25">
        <div align="left"><font size="2">SEXO</font></div>
      </div></td>
      <td><font color="#000000" size="2">
        <select name="sexo[]" id="select6" onkeypress="return verif_caracter(this,event)">
          <option value="">Seleccione Sexo</option>
		  <option value="Masculino">Masculino</option>
          <option value ="Femenino">Femenino</option>
        </select>
      </font><font size="2"><span class="Estilo44">* Necesario </span> </font></td>
    <tr bordercolor="#FFFFFF" bgcolor="#EDEDED">
      <td height="24"><div align="right" class="Estilo25">
        <div align="left"><font size="2">FECHA NACIMIENTO </font></div>
      </div></td>
      <td><font color="#000000" size="2">
        <input type="text" name="dia" id="dia"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="mes" id="mes"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="anio" id="anio"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4">
      </font><font size="2"><span class="Estilo44">* Necesario </span> </font></td>
    <tr bordercolor="#FFFFFF">
    <td height="26" colspan="4" valign="top" bgcolor="#B8B8B8"><div align="center">
      <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR PACIENTE">
    </div></td>
  <tr>
    <td height="0"></td>
    <td width="308"></td>
    <td colspan="2"></td>
  </tr>  
</table>
</form>
<?php
}


?>









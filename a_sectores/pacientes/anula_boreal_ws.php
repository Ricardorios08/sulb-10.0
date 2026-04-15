<?PHP 

include ("../pac/codificar_boreal.php");
$cuit_prestador = 30545508652;
$$autorizacion_ws = 1337940;
$xml ="<Boreal> 
<Mensaje> 
<Canal>ID</Canal> 
<SitioEmisor>ABM000000657</SitioEmisor>
<Receptor> 
<Nombre>BOREAL</Nombre> 
<ID>222023</ID> 
<Tipo>IIN</Tipo> 
</Receptor> 
<MsgTipo> 
<Tipo>ZQA</Tipo> 
<Evento>Z04</Evento> 
<Estructura>ZQA_Z02</Estructura> 
</MsgTipo> 
<MsgEntorno>P</MsgEntorno>
</Mensaje> 
<Seguridad> 
<Usuario>abmws</Usuario>
<Clave>".$contra_boreal."</Clave> 
</Seguridad> 
<Prestador> 
<PrestadorId>".$cuit_prestador."</PrestadorId>
<PrestadorTipoIdent>CU</PrestadorTipoIdent> 
</Prestador> 
<Autorizacion> 
<AutCod></AutCod> 
<AutEstadoId></AutEstadoId> 
<AutObs></AutObs> 
<AutCodAnulacion>".$autorizacion_ws."</AutCodAnulacion> 
</Boreal>";



ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);
	

	try{
$oSoapClient = new soapclient('http://sistemasboreal.com.ar:5480/WsBoreal/servlet/awsboreal?wsdl');
$aParametros = array("Ingresoxml" => "<?xml version='1.0' encoding='iso-8859-1'?>".$xml);

$result=$oSoapClient->Execute($aParametros);
 $result->Egresoxml;



  file_put_contents("respuesta_boreal_anula.xml", $result->Egresoxml);


}catch(Exception $e){
echo($e);
}


$xml = simplexml_load_file("respuesta_boreal_anula.xml");
 $Nombreafiliado = $xml->Afiliado->AfiliadoNombre;
 $apellido = $xml->Afiliado->AfiliadoNombre;
$tp_afiliado = $xml->Afiliado->afiliadoivades;

 $Planrta = $xml->Afiliado->AfiliadoPlanDes;
 $NroPlan = $xml->Afiliado->AfiliadoPlanCod;
 $tp_afiliado = $xml->Afiliado->AfiliadoIVADes;

 $Nroautorizacion = $xml->Autorizacion->AutCod;


  $Codigorespuesta = $xml->Autorizacion->AutEstadoId;
 $Descripcionrespuesta = $xml->Autorizacion->AutObs;

$Descripcionrespuesta = utf8_decode($Descripcionrespuesta);

 


  switch ($codigo_respuesta){
case "B000":{$Descripcionrespuesta = "ACEPTADO";break;}
case "B001":{$Descripcionrespuesta = "AUTORIZACION PARCIAL";break;}
case "M000":{$Descripcionrespuesta = "PRESTACIONES RECHAZADAS";break;}
case "M001":{$Descripcionrespuesta = "PRESTADOR INEXISTENTE";break;}
case "M002":{$Descripcionrespuesta = "PRESTADOR DADO DE BAJA";break;}
case "M003":{$Descripcionrespuesta = "AFILIADO INEXISTENTE";break;}
case "M004":{$Descripcionrespuesta = "AFILIADO DADO DE BAJA";break;}
case "M005":{$Descripcionrespuesta = "AFILIADO CON PROBLEMAS ADMINISTRATIVOS";break;}
case "M006":{$Descripcionrespuesta = "ESPECIALIDAD NO CORRESPONDE AL PRESTADOR";break;}
case "M007":{$Descripcionrespuesta = "PRESTADOR SIN COBERTURA PARA EL PLAN";break;}
case "M009":{$Descripcionrespuesta = "FINANCIADORA DADA DE BAJA";break;}
case "M010":{$Descripcionrespuesta = "AUTORIZACION RECHAZADA";break;}
case "M011":{$Descripcionrespuesta = "AUTORIZACION NO CORRESPONDE AL PRESTADOR";break;}
case "M013":{$Descripcionrespuesta = "PRESTADOR PRESCRIPTOR SIN COBERTURA PARA EL PLAN";break;}
case "M014":{$Descripcionrespuesta = "PRESTADOR EFECTOR SIN COBERTURA PARA EL PLAN";break;}
case "M015":{$Descripcionrespuesta = "PRESTADOR PRESCRIPTOR INEXISTENTE";break;}
case "M016":{$Descripcionrespuesta = "PRESTADOR EFECTOR INEXISTENTE";break;}
case "M018":{$Descripcionrespuesta = "EL NUMERO DE AUTORIZACION ES INEXISTENTE";break;}
case "M019":{$Descripcionrespuesta = "DIAGNOSTICO CORRESPONDIENTEA A OTRO PRESTADOR";break;}
case "M020":{$Descripcionrespuesta = "PRESTACION INEXISTENTE";break;}
case "M021":{$Descripcionrespuesta = "TOPE SUPERADO";break;}
case "M022":{$Descripcionrespuesta = "PRESTACION SIN COBERTURA PARA EL PLAN";break;}
case "M023":{$Descripcionrespuesta = "PRETACION NO CORRESPONDE A LA ESPECIALIDAD";break;}
case "M024":{$Descripcionrespuesta = "TIEMPO DE CARENCIA NO CUBIERTO - DEBE REALIUZAR PRE AUTORIZACION";break;}
case "M025":{$Descripcionrespuesta = "SUPERA TOPE DIARIO - DEBE REALIZAR PRE AUTORIZACION";break;}
case "M026":{$Descripcionrespuesta = "SUPERA TOPE SEMANAL - DEBE REALIZAR PRE AUTORIZACION";break;}
case "M027":{$Descripcionrespuesta = "SUPERA TOPE MENSUAL - DEBE REALIZAR PRE AUTORIZACION";break;}
case "M028":{$Descripcionrespuesta = "SUPERA TOPE TRIMESTRAL - DEBE REALIZAR PRE AUTORIZACION";break;}
case "M029":{$Descripcionrespuesta = "SUPERA TOPE SEMESTRAL - DEBE REALIZAR PRE AUTORIZACION";break;}
case "M030":{$Descripcionrespuesta = "SUPERA TOPE ANUAL - DEBE REALIZAR PRE AUTORIZACION";break;}
case "M031":{$Descripcionrespuesta = "REQUIERE AUTORIZACION PREVIA - DEBE REALIZAR PRE AUTORIZACION";break;}
case "M032":{$Descripcionrespuesta = "PREAUTORIZACION INEXISTENTE";break;}
case "M033":{$Descripcionrespuesta = "PREAUTORIZACION AUTORIZACION UTILIZADA ANTERIORMENTE";break;}
case "M034":{$Descripcionrespuesta = "AUTORIZACION INEXISTENTE";break;}
case "M035":{$Descripcionrespuesta = "AUTORIZACION YA ANULADA INEXISTENTE";break;}
case "M036":{$Descripcionrespuesta = "LA AUTORIZACION NO CORRESPONDE A ESE AFILIADO";break;}
case "M037":{$Descripcionrespuesta = "PREAUTORIZACION VENCIDA";break;}
case "M038":{$Descripcionrespuesta = "PREAUTORIZACION UTILIZADA EN SU TOTALIDAD";break;}
case "M039":{$Descripcionrespuesta = "PREAUTORIZACION NO CORRESPONDE A ESE AFILIADO";break;}
case "M040":{$Descripcionrespuesta = "PREAUTORIZACION NO CORRESPONDE A LA PRACTICA";break;}
case "M041":{$Descripcionrespuesta = "PREAUTORIZACION NO CORRESPONDE AL PRESTADOR";break;}
case "M042":{$Descripcionrespuesta = "PRESTACION RECHAZADA";break;}
case "M043":{$Descripcionrespuesta = "PREAUTORIZACION YA ANULADA";break;}
case "M044":{$Descripcionrespuesta = "PRESTACION NO HABILITADA PARA EL PRESTADOR";break;}
case "M045":{$Descripcionrespuesta = "PRESTACION NO HABILITADA PARA EL PRESTADOR EN ESE PLAN";break;}
case "M046":{$Descripcionrespuesta = "FECHA DE REALIZACION ANTERIOR A LO PERMITIDO - DEBE SOLICITAR PREAUTORIZACION";break;}
case "M047":{$Descripcionrespuesta = "PRACTICA NO HABILITADA PARA EL SEXO DEL AFILIADO";break;}
case "M048":{$Descripcionrespuesta = "PRACTICA NO HABILITADA PARA LA EDAD DEL AFILIADO";break;}
case "M050":{$Descripcionrespuesta = "LA AUTORIZACION FUE ANULADA";break;}
case "M051":{$Descripcionrespuesta = "DIAGNOSTICO CORRESPONDIENTE A OTRO AFILIADO";break;}
case "M052":{$Descripcionrespuesta = "DIAGNOSTICO INEXISTENTE";break;}
case "M053":{$Descripcionrespuesta = "DIAGNOSTICOS RECHAZADOS";break;}
case "M054":{$Descripcionrespuesta = "VARIOS";break;}
 }


?>

<table width="350" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#B8B8B8"><div align="center" class="Estilo42 Estilo1 Estilo4">RESPUESTA DE OBRA SOCIAL BOREAL </div></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><div align="left" class="Estilo3"><?php echo $apellido;?><?php echo $nombre;?></div>     </td>
  </tr>
      

  
  <tr>
    <td bgcolor="#F0F0F0"><div align="left"><span class="Estilo1"><span class="Estilo2"></span></span><span class="Estilo3"><?php echo $codigo_respuesta;?></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3"><?php echo $Descripcionrespuesta;?></span></td>
  </tr>

  <tr>
    <td bgcolor="#F0F0F0"><span class="Estilo3">Transacción: <?php echo $autorizacion_ws;?></span></td>
  </tr>



</table>



<?php

if ($Codigorespuesta == 'B000') {
include ("anula_abm_ws.php");
}















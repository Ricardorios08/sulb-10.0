<?php
$anio = date("y");
$mes = date("m");
$dia = date("d");

$hoy = $dia."/".$mes."/".$anio;

include ("../pac/codificar_boreal.php");
include ("../../conexiones/config.inc.php");

 $cuit_prestador = 30545508652;


  $sql10="select * from pacientes where nro_paciente = $nro_paciente";
$result10 = $db->Execute($sql10);

 $numero_credencial=$result10->fields["nro_afiliado"];
$ultima_fecha=$result10->fields["ultima_fecha"];

$nro_afiliado444=substr($numero_credencial,0,8);
$digito = substr($numero_credencial,8,2);



$dia = substr($ultima_fecha,8,2);
$mes= substr($ultima_fecha,5,2);
$anio = substr($ultima_fecha,0,4);

$ultima_fecha = $anio.$mes.$dia;


 $cuit = $cuit *1;

$cuenta_abm = str_pad($nro_laboratorio1, 9, "0", STR_PAD_LEFT); 
$sitio_emisor = "ABM".$cuenta_abm;


// AUTORIZACION
$xml ="<Boreal> 
<Mensaje> 
<Canal>ID</Canal> 
<SitioEmisor>".$sitio_emisor."</SitioEmisor>
<Receptor> 
<Nombre>BOREAL</Nombre> 
<ID>222023</ID> 
<Tipo>IIN</Tipo> 
</Receptor> 
<MsgTipo> 
<Tipo>ZQA</Tipo> 
<Evento>Z02</Evento> 
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
<Afiliado> 
<AfiliadoNroCredencial>".$nro_afiliado444."</AfiliadoNroCredencial> 
<AfiliadoGf>".$digito."</AfiliadoGf> 
<TipoIdentificador>HC</TipoIdentificador> 
</Afiliado>";

$sql10="select * from detalle WHERE cod_grabacion = '$cod_grabacion' and facturar = 0 and nro_practica < 10000";
$result10 = $db->Execute($sql10);
if (!$result10) die("fallo 1".$db->ErrorMsg());
 while (!$result10->EOF) {
 $nro_practica=$result10->fields["nro_practica"];
$cod_autorizacion=$result10->fields["cod_autorizacion"];

$nro_practica = str_pad($nro_practica, 4, "0", STR_PAD_LEFT);
$nro_practica = "66".$nro_practica;
$cont = $cont + 1;

$pra = $pra."<Practica>
<LineaNro>".$cont."</LineaNro>
<SeccionId>15</SeccionId>
<PracticaId>".$nro_practica."</PracticaId>
<PracticaItem>5</PracticaItem>
<PracticaCantSol>1</PracticaCantSol>
<PracticaCantAprob> </PracticaCantAprob>
<PracticaDes></PracticaDes>
<PracticaCoseguro></PracticaCoseguro>
<PracticaIdEstado></PracticaIdEstado>
<PracticaObs></PracticaObs>
<PracticaPreAutorizacion></PracticaPreAutorizacion>
</Practica>";

$result10->MoveNext();
	}

 $pra;
$fin ="</Practicas></Boreal>";


 $xml = $xml."<Practicas>".$pra.$fin;




try{

$oSoapClient = new soapclient('http://sistemasboreal.com.ar:5480/WsBoreal/servlet/awsboreal?wsdl');
$aParametros = array("Ingresoxml" => "<?xml version='1.0' encoding='iso-8859-1'?>".$xml);

$result=$oSoapClient->Execute($aParametros);
 $result->Egresoxml;



  file_put_contents("respuesta_boreal.xml", $result->Egresoxml);

}catch(Exception $e){
echo($e);
}

function obj2array($obj) {
  $out = array();
  foreach ($obj as $key => $val) {
    switch(true) {
        case is_object($val):
         $out[$key] = obj2array($val);
         break;
      case is_array($val):
         $out[$key] = obj2array($val);
         break;
      default:
        $out[$key] = $val;
    }
  }
  return $out;
}


$xml = simplexml_load_file("respuesta_boreal.xml");
 $Nombreafiliado = $xml->Afiliado->AfiliadoNombre;
 $apellido = $xml->Afiliado->AfiliadoNombre;
$tp_afiliado = $xml->Afiliado->afiliadoivades;

 $Planrta = $xml->Afiliado->AfiliadoPlanDes;
 $NroPlan = $xml->Afiliado->AfiliadoPlanCod;
 $tp_afiliado = $xml->Afiliado->AfiliadoIVADes;

 $Nroautorizacion = $xml->Autorizacion->AutCod;
 $Codigorespuesta = $xml->Autorizacion->AutEstadoId;

switch ($Codigorespuesta){
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


$r=  list($Apellido, $nombre, $nombre2, $nombre3) = explode(" ",$Nombreafiliado);


$Nombre = $nombre." ".$nombre2." ".$nombre3;
//$cuit = $cuit_prestador;

?>
<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo2 {font-family: "Trebuchet MS"; font-weight: bold; }
.Estilo3 {font-size: 12px}
.Estilo4 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo5 {
	font-size: 18px;
	font-weight: bold;
}
-->
</style>



<table width="315" border="1" cellpadding="0" cellspacing="0">

  <tr>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center" class="Estilo2">VALIDACION BOREAL SULB </div></td>
    </tr>
<tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Fecha Validación: <?php echo $hoy;?> </span></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1"><?php echo $nro_laboratorio1;?> <?php echo $prestador;?></span></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Cuit: <?php echo $cuit;?></span></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><div align="left" class="Estilo3 Estilo1">Afiliado: <?php echo $Apellido;?>, <?php echo $Nombre;?></div>     </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">N° Credencial: <?php echo $numero_credencial;?></span></td>
  </tr>
    

    <tr>
      <td colspan="2" bgcolor="#F0F0F0"><span class="Estilo3 Estilo1">Plan: <?php echo $Planrta;?></span></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#B8B8B8"><div align="center"><span class="Estilo3 Estilo1">Respuesta Boreal</span></div></td>
    </tr>
  <tr>
    <td colspan="2" bgcolor="#F0F0F0"><div align="center"><span class="Estilo3 Estilo1"><span class="Estilo5"><?php echo $Descripcionrespuesta;?></span></span></div></td>
  </tr>

<tr>
  <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo3 Estilo1">Practicas informadas </span></div></td>
  <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo4">Cos.</span></div></td>
</tr>
<tr>
<?php

 foreach ($xml->Practicas->Practica as $personaje) {

 
  $PracticaId =  $personaje->PracticaId;
  $PracticaDes =  $personaje->PracticaDes;
  $PracticaCoseguro =  $personaje->PracticaCoseguro;
 $PracticaIdEstado =  $personaje->PracticaIdEstado;
$PracticaObs =  $personaje->PracticaObs;
  if ($PracticaCoseguro == 0){
	  $PracticaCoseguro = "";
	  }

$Prestacion = substr($PracticaId,2,4)*1;

  if ($PracticaId != 660001){

		if ($Codigorespuesta == 'B000'){
   $sql = "UPDATE detalle SET  `coseguro` = '$PracticaCoseguro' WHERE cod_grabacion = $cod_grabacion and nro_practica = $Prestacion LIMIT 1";
mysql_query($sql);
		}

			if ($PracticaIdEstado != 'B000'){
   $sql = "UPDATE detalle SET   PracticaObs = '$PracticaObs' WHERE cod_grabacion = $cod_grabacion and nro_practica = $Prestacion LIMIT 1";
mysql_query($sql);
		}

	  
?><td bgcolor="#F0F0F0"><span class="Estilo4 Estilo1">&nbsp;&nbsp;&nbsp;<?php echo $Prestacion;?> - <?php echo $PracticaDes;?> <?php echo $PracticaObs;?> </span></td>
   <td bgcolor="#F0F0F0"><div align="right"><span class="Estilo4 Estilo1"><?php echo $PracticaCoseguro;?></span></div></td>
</tr><?php
}
}

	?>
</table>

<?php 
	
	if (($Codigorespuesta == 'B000') or ($Codigorespuesta == 'B001')){

		   $sql = "UPDATE pacientes SET  `nombre` = '$Nombre', `apellido` = '$Apellido',`nro_documento` = '$nro_documento', `fecha_nacimiento` = '$fecha_nacimiento' , `tipo_afiliado` = '$tipo_afiliado' , `plan` = '$plan' , `coseguro` = '$coseguro' , `activo` = '$mensaje_display' , `ultima_01a` = '$fechaTrx' WHERE `nro_paciente` = $nro_paciente LIMIT 1";
//mysql_query($sql);

$leyenda = "BOREAL: ".$Nroautorizacion;

?>


<table width="315" border="2" cellspacing="0">
  <tr>
    <th height="61" bgcolor="#EDEDED" scope="col"><blink></blink><blink><span class="Estilo12"><?php echo $leyenda;?></span></blink><span class="Estilo1 Estilo25"><blink></blink></span> </th>
  </tr>
</table>

<table width="316" border="0" cellpadding="0">
  <tr>
    <th width="312" scope="col"><div align="left"><span class="Estilo3">Firma: ......................................................</span></div></th>
  </tr>
  <tr>
    <th scope="col"><div align="left"><span class="Estilo3">Tipo y Nro Doc: ........................................ </span></div></th>
  </tr>
  <tr>
    <th scope="col"><div align="left"><span class="Estilo3">Aclaracion: ..............................................</span></div></th>
  </tr>
</table>
<?php 

	include ("abm_ws.php");

	}

	?>


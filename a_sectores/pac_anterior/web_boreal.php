<?php
 $cuit;

$anio = date("y");
$mes = date("m");
$dia = date("d");


//ELEGIBILIDAD

//28290273 miguel 

include ("codificar_boreal.php");
$cuit_prestador = 30545508652;
$cuenta_abm = str_pad($nro_laboratorio1, 9, "0", STR_PAD_LEFT); 
$sitio_emisor = "ABM".$cuenta_abm;


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
<Tipo>ZQI</Tipo> 
<Evento>Z01</Evento> 
<Estructura>ZQI_Z01</Estructura> 
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
</Afiliado> 
</Boreal>";


/*
// AUTORIZACION
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
<PrestadorId>30545508652</PrestadorId>
<PrestadorTipoIdent>CU</PrestadorTipoIdent> 
</Prestador> 
<Afiliado> 
<AfiliadoNroCredencial>37967838</AfiliadoNroCredencial> 
<AfiliadoGf>2</AfiliadoGf> 
<TipoIdentificador>HC</TipoIdentificador> 
</Afiliado> 
<Practicas>
<Practica>
<LineaNro>1</LineaNro>
<SeccionId>15</SeccionId>

<PracticaId>661180</PracticaId>
<PracticaItem>5</PracticaItem>
<PracticaCantSol>1</PracticaCantSol>
<PracticaCantAprob> </PracticaCantAprob>
<PracticaDes></PracticaDes>
<PracticaCoseguro></PracticaCoseguro>
<PracticaIdEstado></PracticaIdEstado>
<PracticaObs></PracticaObs>
<PracticaPreAutorizacion></PracticaPreAutorizacion>
</Practica>


<Practica>
<LineaNro>2</LineaNro>
<SeccionId>15</SeccionId>
<PracticaId>660035</PracticaId>
<PracticaItem>5</PracticaItem>
<PracticaCantSol>1</PracticaCantSol>
<PracticaCantAprob> </PracticaCantAprob>
<PracticaDes></PracticaDes>
<PracticaCoseguro></PracticaCoseguro>
<PracticaIdEstado></PracticaIdEstado>
<PracticaObs></PracticaObs>
<PracticaPreAutorizacion></PracticaPreAutorizacion>
</Practica>

<Practica>
<LineaNro>3</LineaNro>
<SeccionId>15</SeccionId>
<PracticaId>660309</PracticaId>
<PracticaItem>5</PracticaItem>
<PracticaCantSol>1</PracticaCantSol>
<PracticaCantAprob> </PracticaCantAprob>
<PracticaDes></PracticaDes>
<PracticaCoseguro></PracticaCoseguro>
<PracticaIdEstado></PracticaIdEstado>
<PracticaObs></PracticaObs>
<PracticaPreAutorizacion></PracticaPreAutorizacion>
</Practica>
<Practica>
<LineaNro>4</LineaNro>
<SeccionId>15</SeccionId>
<PracticaId>661200</PracticaId>
<PracticaItem>5</PracticaItem>
<PracticaCantSol>1</PracticaCantSol>
<PracticaCantAprob> </PracticaCantAprob>
<PracticaDes></PracticaDes>
<PracticaCoseguro></PracticaCoseguro>
<PracticaIdEstado></PracticaIdEstado>
<PracticaObs></PracticaObs>
<PracticaPreAutorizacion></PracticaPreAutorizacion>
</Practica>
</Practicas>
</Boreal>";

//anulacion

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
<PrestadorId>30545508652</PrestadorId>
<PrestadorTipoIdent>CU</PrestadorTipoIdent> 
</Prestador> 
<Autorizacion> 
<AutCod></AutCod> 
<AutEstadoId></AutEstadoId> 
<AutObs></AutObs> 
<AutCodAnulacion>1330848</AutCodAnulacion> 
</Boreal>";
*/

try{
//require_once('../webservice/lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);
	
$oSoapClient = new soapclient('http://sistemasboreal.com.ar:5480/WsBoreal/servlet/awsboreal?wsdl');
$aParametros = array("Ingresoxml" => "<?xml version='1.0' encoding='iso-8859-1'?>".$xml);

$result=$oSoapClient->Execute($aParametros);
 $result->Egresoxml;



  file_put_contents("respuesta.xml", $result->Egresoxml);


}catch(Exception $e){
echo($e);
}


$xml = simplexml_load_file("respuesta.xml");
$ns = $xml->getNamespaces(false);

 $Nombreafiliado = $xml->Afiliado->AfiliadoNombre;
 $apellido = $xml->Afiliado->AfiliadoNombre;
$tp_afiliado = $xml->Afiliado->afiliadoivades;

 $plan = $xml->Afiliado->AfiliadoPlanDes;
 $NroPlan = $xml->Afiliado->AfiliadoPlanCod;
 $tp_afiliado = $xml->Afiliado->AfiliadoIVADes;

 $AutCod = $xml->Autorizacion->AutCod;
  $codigo_respuesta = $xml->Autorizacion->AutEstadoId;



 $r = "";
$r=  list($apellido, $nombre, $nombre2, $nombre3) = explode(" ",$Nombreafiliado);


$nombre = $nombre." ".$nombre2." ".$nombre3;


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
<?php



/*
$info = $soapClient->__call("ELEGIBILIDAD", array($ap_param));
$Nombreentidad = $info->Descripcionrespuesta;
$Nombreefector = $info->Nombreefector;
$Nombreafiliado = $info->Nombreafiliado;
$Edad = $info->Edad;
$Codigorespuesta = $info->Codigorespuesta;
$Descripcionrespuesta = $info->Descripcionrespuesta;
$Planrta = $info->Planrta;
$nombre = $info->Nombre;
$apellido = $info->Apellido;
$credencial  = $info->numero_credencial;
$nro_documento = $info->Nrodocumento;
$fecha_nacimiento  = $info->Fechanacimiento;
$Edad  = $info->Edad;
$sexo = $info->sexo; //solicittar
$mensaje_display  = $info->Codigorespuesta;
$mensaje_display1  = $info->Descripcionrespuesta;
$NroPlan= $info->Planrta;
$plan= $info->Planrta;
$tp_afiliado = $info->Condicionafiliado;
*/




include ("../../conexiones/config.inc.php");


$sql10="select * from datos_principales";
$result10 = $db->Execute($sql10);

$nro_laboratorio1=$result10->fields["matricula"];
$cuit_prestador=$result10->fields["cuit"];
$terminal=$result10->fields["terminal"];





$sql="select * from pacientes ORDER BY nro_paciente DESC";
$result = $db->Execute($sql);
$nro_paciente=($result->fields["nro_paciente"] + 1);
//$track=$_POST["track"];



  $sql="select * from pacientes where nro_afiliado = '$nro_afiliado' and nro_os = '$nro_os'";
$result = $db->Execute($sql);

$nro_pac=$result->fields["nro_paciente"];

if ($nro_pac != ''){
$bande_nuevo = 1;
$palabra = $nro_pac;
$bande = 2;

include ("buscar_paciente_individual.php");
exit;
}


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
<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
.Estilo2 {font-family: "Trebuchet MS"}
.Estilo3 {font-size: 12px; font-family: "Trebuchet MS"; }
-->
</style>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
	

  
  <tr bgcolor="#CECECE">
    <td colspan="7" bgcolor="#EDEDED"><table width="800" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="8" bgcolor="#CCCCCC"><div align="center" class="Estilo42"><font face="Trebuchet MS">REQUISITOS OBRA SOCIAL:  <?php echo $nro_os;?> <?php echo $sigla;?></font></div></td>
      </tr>
      
	  <?php

	  if ($requisitos != ""){ ?>
	  
      <tr>
		 <td height="33" colspan="2" style="padding: 10px;" bgcolor="#D8F1FA"><span class="Estilo46"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $requisitos;?></font></span></td>
      </tr>
    <?php }else{  ?>

  <tr>
         <td height="33" colspan="2" bgcolor="#FFFFFF"><span class="Estilo46"><font color="#000000" face="Trebuchet MS">No hay requisitos<?php echo $requisitos;?></font></span></td>
      </tr>

 <?php } ?>


</table>

<?php


if ($Nombreafiliado != "Inexistente"){


  $sql="select * from planes_os where nro_os like '$nro_os' and nro_plan = $NroPlan";
$result = $db->Execute($sql);

$nro_os1=strtoupper($result->fields["nro_os"]);
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

<BODY onload = "on_load()">
<form action="guardar_abm.php" method="post">


<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
 
    <tr align="center" bordercolor="#FFFFFF">
      <td colspan="4" bgcolor="#CCEDCB"><div align="center" class="Estilo43"><font color="#000000">RESPUESTA OBRA SOCIAL: <?PHP ECHO $codigo_respuesta;?> <?PHP ECHO $Descripcionrespuesta;?></font></div></td>
    </tr>


    <tr align="center" bordercolor="#FFFFFF">
      <td width="157" bgcolor="#EDEDED">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2"> N&ordm; PACIENTE </font></div>
      </div></td>
      <td width="306" bgcolor="#EDEDED"><div align="left">
          <font color="#000000" size="2">
          <input name="nro_paciente" type="text" id="nro_paciente" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" value = "<?php echo $nro_paciente;?>">
      </font></div></td>
      <td width="100" bgcolor="#EDEDED"><div align="right" class="Estilo38 Estilo1 Estilo2"><font color="#000000">N&deg; </font></div></td>
      <td width="229" bgcolor="#EDEDED"><div align="left" class="Estilo41 Estilo1 Estilo2"><font color="#000000"><?php echo $NroPlan;?></font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#EDEDED">
      <div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; AFILIADO </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nro_afiliado" type="text" id="nro_afiliado"onKeyPress="return verif_caracter(this,event)" value="<?php echo $nro_afiliado;?>"  size="20" maxlength="20">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td align="center" bgcolor="#EDEDED"><div align="right" class="Estilo38 Estilo1 Estilo2"><font color="#000000">PLAN</font></div></td>
      <td align="center" bgcolor="#EDEDED"><div align="left" class="Estilo41 Estilo1 Estilo2"><font color="#000000"><?php echo $plan;?>
          <input name="plan" type="hidden" value = "<?php echo $plan;?>">


          <input name="activo" type="hidden" value = "<?php echo $mensaje_display;?>">
      </font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#EDEDED"><div align="left" class="Estilo25"><font color="#000000" size="2">TIPO AFILIADO </font></div></td>
      <td bgcolor="#EDEDED"><font color="#000000" size="2"><?php echo $tp_afiliado;?>
	  
	   <input name="tipo_afiliado" type="hidden" value = "<?php echo $tipo_afiliado;?>">
	  
	  </font></td>
      <td align="center" bgcolor="#EDEDED"><div align="right" class="Estilo38 Estilo1 Estilo2"><font color="#000000">COSEGURO:</font></div></td>
      <td align="center" bgcolor="#EDEDED"><div align="left" class="Estilo41 Estilo1 Estilo2"><font color="#000000"><?php echo $coseguro;?>
          <input name="coseguro" type="hidden" value = "<?php echo $coseguro;?>">
      </font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">APELLIDO</font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="apellido" type="text" id="apellido"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $apellido;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td colspan="2" bgcolor="#FFFFCC"><div align="center" class="Estilo38 Estilo1 Estilo2">AUTORIZAR</div>        <div align="center" class="Estilo36 Estilo1 Estilo2"></div></td>
  </tr>

      <tr bordercolor="#FFFFFF">
      <td bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">NOMBRE </font></div>
      </div></td>
      <td bgcolor="#EDEDED">        <font color="#000000" size="2">
      <input name="nombre" type="text" id="nombre"onKeyPress="return verif_caracter(this,event)" size="30" maxlength="30" value = "<?php echo $nombre;?>">      
      </font><font size="2"><span class="Estilo44">* Obligatorio</span> </font></td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38 Estilo1 Estilo2">COMUNES</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37 Estilo1 Estilo2"><font color="#000000"><?php echo $comunes;?></font></span></td>
  </tr>


    <tr bordercolor="#FFFFFF">
      <td bgcolor="#EDEDED"><div align="right" class="Estilo25">
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
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38 Estilo1 Estilo2">ESPECIALES</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37 Estilo1 Estilo2"><font color="#000000"><?php echo $especiales;?></font></span></td>
  <tr bordercolor="#FFFFFF">
      <td bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font color="#000000" size="2">N&ordm; DOCUMENTO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="nro_documento" type="text" id="nro_documento" onKeyPress="return verif_caracter(this,event)"  VALUE = "<?php echo $nro_documento;?>" size="8" maxlength="8">
        <input name="nro_os" type="hidden" value = "<?php echo $nro_os;?>">
      </font></strong><font size="2"><span class="Estilo44">* Obligatorio</span></font> </td>
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38 Estilo1 Estilo2">ALTA</div></td>
      <td bgcolor="#EDEDED"><span class="Estilo37 Estilo1 Estilo2"><font color="#000000"><?php echo $alta;?></font></span></td>
  <tr bordercolor="#FFFFFF">
      <td bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">DOMICILIO</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">
        <input name="domicilio" type="text"  id="domicilio" onKeyPress="return verif_caracter(this,event)" size="40" maxlength="40">
      </font></td>
      <td colspan="2" bgcolor="#FFFFCC"><div align="center" class="Estilo38 Estilo1 Estilo2">PMO</div></td>
  <tr bordercolor="#FFFFFF">
      <td bgcolor="#EDEDED"><div align="right" class="Estilo25">
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
      <td bgcolor="#EDEDED"><div align="center" class="Estilo38 Estilo1 Estilo2">PLAN PMO </div></td>
      <td bgcolor="#EDEDED"><span class="Estilo25 Estilo41 Estilo1 Estilo2"><font color="#000000"><?php echo $pmo;?></font></span></td>
  <tr bordercolor="#FFFFFF">
      <td bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">TEL. FIJO </font></div>
      </div></td>
      <td bgcolor="#EDEDED"><strong><font color="#000000" size="2">
        <input name="telefono" type="text" id="telefono"onKeyPress="return verif_caracter(this,event)"  size="12" maxlength="12">
      </font></strong></td>
      <td colspan="2" bgcolor="#FFFFCC"><div align="center" class="Estilo38 Estilo1 Estilo2">DETALLE DEL PLAN </div></td>
  <tr bordercolor="#FFFFFF">
      <td bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">CELULAR</font></div>
      </div></td>
      <td bgcolor="#EDEDED"><font size="2">
        <input name="celular" type="text" id="celular" onKeyPress="return verif_caracter(this,event)"size="12" maxlength="12">
      </font></td>
      <td colspan="2" rowspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo3"><font color="#000000"><?php echo $texto;?></font></div></td>
  <tr bordercolor="#FFFFFF">
      <td bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="left"><font size="2">SEXO</font></div>
      </div></td>



      <td bgcolor="#EDEDED"><font color="#000000" size="2"><select name="sexo[]" id="select6" onkeypress="return verif_caracter(this,event)">
          <option value="">Seleccione Sexo</option>
		  <option value="Masculino">Masculino</option>
          <option value ="Femenino">Femenino</option>
        </select>
      </font><font size="2"><span class="Estilo44"> * Necesario </span> </font></td>
  <tr bordercolor="#FFFFFF">
      <td bgcolor="#F0F0F0"><div align="right" class="Estilo25">
        <div align="left"><font size="2">FECHA NACIMIENTO </font></div>
    </div></td>
      <td bgcolor="#F0F0F0"><font color="#000000" size="2">
        <input type="text" name="dia" id="dia"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="mes" id="mes"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
/
<input type="text" name="anio" id="anio"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4">
    </font><font size="2"><span class="Estilo44">* Necesario</span></font></td>
 <tr><td colspan="4" valign="top" bgcolor="#B8B8B8"><div align="center">
   <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR PACIENTE">
 </div>
   </table>
</form>

  <?php }ELSE{ ?>
<table width="800" border="0" cellspacing="0">
    <!--DWLayoutTable-->
    
    <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="4" bgcolor="#CCEDCB"><div align="center" class="Estilo43"><font color="#000000">RESPUESTA OBRA SOCIAL:  NO ACTIVO </font></div></td>
    </tr>

 <tr>
    <th height="36" bgcolor="#EDEDED" scope="col"><span class="Estilo1 Estilo4">
      <input name="button" type="button" id ="boton" onClick="history.back()" onKeyPress="history.back()" value="Presione ENTER">
    </span></th>
  </tr>
</table>

<?php

  }




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>LISTADO DE PACIENTES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../../menus.css" rel="stylesheet" type="text/css" />
<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />
 <link href="../../css/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<script type="text/javascript"  src ="scckeditor/ckeditor.js"></script>

<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
.Estilo2 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo25 {color: #FFFFFF}
.Estilo26 {font-size: 10px; color: #FFFFFF; }
.Estilo27 {color: #FFFFFF; font-family: "Trebuchet MS"; }
.Estilo28 {font-family: "Trebuchet MS"}
.Estilo29 {font-size: 10px; color: #FFFFFF; font-family: "Trebuchet MS"; }
.Estilo31 {
	font-family: "Trebuchet MS";
	font-size: 24px;
	font-weight: bold;
}
.Estilo32 {font-size: 24px}
.Estilo40 {font-family: "Trebuchet MS"; font-size: 14px; font-weight: bold; }
.Estilo30 {font-size: 16px}
.Estilo41 {
	font-family: "Trebuchet MS";
	font-size: 16px;
	font-weight: bold;
	color: #0000FF;
}
.Estilo42 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>



</head>









<?php 


 function CalculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}

include("../../conexiones/config.inc.php");

if ($bande_nuevo != 1){
  $palabra = $_REQUEST['palabra'];
$usuario = $_REQUEST['usuario2'];

}

$band = 1;

$usuario;


   $submit = $_REQUEST['ok'];
   
if ($submit == "PROT"){
include ("buscar_paciente_protocolo.php");
exit;
}

if ($submit == "PRAC"){
include ("buscar_paciente_practica.php");
exit;
}


list($ape,$nom) = explode("+",$palabra);

     $ape; // Imprime 12
     $nom; // Imprime 01
  





$sql="select * from datos_orden where id = $usuario";
$result = $db->Execute($sql);

$orden=strtoupper($result->fields["orden"]);

if ($palabra == "") { 
 
include ("seleccionar_planilla.php");
exit;

}else{




if (is_numeric($palabra) == false){
if (($ape != "") and ($nom != "")){
 $sql="select * from pacientes where  nombre like '$nom%' and  apellido like '$ape%' order by nombre";
}elseif (($ape != "") and ($nom == "")){
 $sql="select * from pacientes where  apellido like '$ape%' or nombre like '$ape%' order by nombre";
}elseif (($ape == "") and ($nom != "")){
$sql="select * from pacientes where  nombre like '%$nom%' order by nombre";
}

}else
{

  $sql="select * from pacientes where nro_paciente like '$palabra' or nro_afiliado like '$palabra' or nro_documento like '$palabra'";
}
}
	
$result = $db->Execute($sql);

 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
 $nro_paciente=$result->fields["nro_paciente"];
 $nombre=strtoupper($result->fields["nombre"]);
  $apellido=strtoupper($result->fields["apellido"]);

 $nro_os=$result->fields["nro_os"];
 $nro_documento=$result->fields["nro_documento"];

 $fecha_nacimiento=$result->fields["fecha_nacimiento"];

 $nro_afiliado=$result->fields["nro_afiliado"];
 $ultima_fecha=$result->fields["ultima_fecha"];
  $cuit_verificacion=$result->fields["cuit_verificacion"];
 
   $sql8="select * from pacientes_mail where nro_paciente = $nro_paciente";
$result8 = $db->Execute($sql8);
$mail=$result8->fields["mail"];




 $sql="select * from datos_osde where cuit = $cuit_verificacion";
$result5 = $db->Execute($sql);

$nro_laboratorio1=strtoupper($result5->fields["cuenta_abm"]);
$sucursal=strtoupper($result5->fields["sucursal"]);
$prestador=strtoupper($result5->fields["prestador"]);


 $dia = substr($ultima_fecha,8,2);
 $mes = substr($ultima_fecha,5,2);
 $anio = substr($ultima_fecha,0,4);

 $ultima_fecha = $dia."/".$mes."/".$anio;


 $tipo_afiliado=$result->fields["tipo_afiliado"];
  $coseguro=$result->fields["coseguro"];
   $plan=$result->fields["plan"];
   $activo=$result->fields["activo"];

	 if ($tipo_afiliado == "0"){
$tp_afiliado = "NO GRAVADO (OBLIGATORIO) EXENTO";
}elseif ($tipo_afiliado == 1){
$tp_afiliado = "GRAVADO (VOLUNTARIO) CON IVA";
}
 

IF ($fecha_nacimiento == "0000-00-00"){
$edad = "SIN CARGAR";
}ELSE{
$edad = calculaEdad($fecha_nacimiento);
}

$sql1="select * from datos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$sigla=strtoupper($result1->fields["sigla"]);
$webservice=strtoupper($result1->fields["webservice"]);


 $sql1="select * from requisitos_os where nro_os = $nro_os";
$result1 = $db->Execute($sql1);
$requisitios=$result1->fields["requisitios"];

$requisitos=$result1->fields["requisitos"];
$version=$result1->fields["version"];
$suspendido=$result1->fields["suspendido"];
$vigencia=$result1->fields["vigencia"];

 $dia = substr($vigencia,8,2);
 $mes = substr($vigencia,5,2);
 $anio = substr($vigencia,0,4);

 $vigencia = $dia."/".$mes."/".$anio;



$comunes=$result1->fields["comunes"];
$especiales=$result1->fields["alta"];
$alta=$result1->fields["alta"];
$planes=$result1->fields["planes"];
$diagnostico=$result1->fields["diagnostico"];
$info_planes=$result1->fields["info_planes"];
$planes_rechazados=$result1->fields["planes_rechazados"];
$motivo_rechazo=$result1->fields["motivo_rechazo"];






?>
<table width="850" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bgcolor="#CECECE">
	 <td colspan="7" bgcolor="#CCCCCC"><div align="center" class="Estilo42"><font face="Trebuchet MS">DATOS PERSONALES</font></div></td>
  </tr>
  

<tr>
    <td width="109" valign="middle" bgcolor="#CCCCCC"><div align="right"><a href="../grabacion/grabar_nuevo\grabacion_ordenes.php?nro_paciente=<?php print("$nro_paciente");?>&&nro_os=<?php print("$nro_os");?>&&usuario=<?php print("$usuario");?>"> </a>PACIENTE:</div></td>
    <td width="10" valign="middle" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="294" colspan="-2" valign="middle" bgcolor="#EDEDED"><span class="Estilo40"><?php echo $apellido;?> <?php echo $nombre;?> (<?php echo $nro_paciente;?>)</span></td>
    <td width="379" rowspan="8" bgcolor="#EDEDED"><div align="center" style="width: 100%; height: 90px;"><a href="../grabacion/grabar_nuevo/grabacion_ordenes.php?nro_paciente=<?php print("$nro_paciente");?>&&nro_os=<?php print("$nro_os");?>&&usuario=<?php print("$usuario");?>" class="bot_receta1">Receta<img src="../pac/alta.png" width="70" height="70" border="0" alt=""></a><a class="bot_receta2" href="modificar.php?nro_paciente=<?php print("$nro_paciente");?>&&usuario=<?php print("$usuario");?>" target = "central">Modificar<img src="../pac/editar.png" width="70" height="70" border="0" alt=""></a><a class="bot_receta3" href="borra_todo.php?nro_paciente=<?php print("$nro_paciente");?>" onClick="return confirm('&iquest;Est&aacute; seguro de Borrar el paciente con toda su historia Clinica?');">Borrar<img src="../pac/borrar.png" width="70" height="70" border="0" alt=""></a><a class="bot_receta4" href="ficha.php?nro_paciente=<?php print("$nro_paciente");?>&&usuario=<?php print("$usuario");?>">Ficha<img src="../pac/ver_ficha.png" width="70" height="70" border="0" ></a></div></td>
  </tr>


  <tr>
    <td bgcolor="#CCCCCC">
    <div align="right">N° AFILIADO: </div></td>
    <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="-2" bgcolor="#EDEDED"><span class="Estilo40"><?php echo $nro_afiliado;?></span></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC">
    <div align="right">DOCUMENTO: </div></td>
    <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="-2" bgcolor="#EDEDED"><span class="Estilo40"><?php echo $nro_documento;?></span></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="right">EDAD: </div></td>
    <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="-2" bgcolor="#EDEDED"><span class="Estilo40"><?php echo $edad;?></span></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="right">OBRA SOCIAL: </div></td>
    <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="-2" bgcolor="#EDEDED"><span class="Estilo40">(<?php echo $nro_os;?>)<?php echo $sigla;?></span></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="right">IVA:</div></td>
    <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="-2" bgcolor="#EDEDED"><span class="Estilo40"><?php echo $tp_afiliado;?></span></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="right">COSEGURO:</div></td>
    <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="-2" bgcolor="#EDEDED"><span class="Estilo40"><?php echo $coseguro;?></span></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="right">PLAN:</div></td>
    <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="-2" bgcolor="#EDEDED"><span class="Estilo40"><?php echo $plan;?></span></td>
  </tr>
 
  
  <tr>
    <td height="20" bgcolor="#CCCCCC"><div align="right">RESPUESTA O.S.: </div></td>
    <td valign="top" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="top" bgcolor="#EDEDED"><span class="Estilo41"><?php echo $activo;?> * Ultima Verificación: <?php echo $ultima_fecha;?> <?php echo $prestador;?> <?php echo $cuit_verificacion;?></span></td>
  </tr>



<?PHP  if ($webservice == "SI"){?>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="-2" bgcolor="#EDEDED"><div align="center"><a href="../pacientes/actualizar_datos.php?nro_afiliado=<?php print("$nro_afiliado");?>&&nro_paciente=<?php print("$nro_paciente");?>&&nro_os=<?php print("$nro_os");?>&&usuario=<?php print("$usuario");?>" class="Estilo2">Actualizar Datos Obra Social</a></div></td>
  </tr>
  
<?php
	
}

?>
	<tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="-2" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#EDEDED"><div align="right"><strong> <!-- <a href="../analisis/modelos/elegir_modelos_qr.php?nro_paciente=<?php print("$nro_paciente");?>&&usuario=<?php print("$usuario");?>" >ENVIAR QR POR MAIL</a> --></strong></div></td>
  </tr>
	<tr>
	  <td bgcolor="#CCCCCC">&nbsp;</td>
	  <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td colspan="2" bgcolor="#EDEDED"><div align="right"><strong>
	    <?php echo $mail;?>
      </strong></div></td>
  </tr>
</table>
<?php

if ($requisitos != ""){?>
   <table width="850" border="0" cellpadding="0" cellspacing="0">
            
            <tr>
              <td colspan="8" bgcolor="#CCCCCC"><div align="center" class="Estilo42"><font face="Trebuchet MS">REQUISITOS</font></div></td>
            </tr>
               <tr>
              <td colspan="2" style="padding: 10px;" bgcolor="#D8F1FA"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $requisitos;?></font></td>

       
            </tr>
</table>

<!-- <table width="850" border="1" cellpadding="0" cellspacing="0">
 <tr>
    <td colspan="8" bgcolor="#FF6600"><div align="center"><font face="Trebuchet MS"><strong>PLANES</strong></font></div></td>
  </tr>
  <tr>
    <td width="21%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"> PLAN </font></div>      <div align="center"></div></td>
    <td width="8%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">COSEGURO</font></div></td>
    <td width="9%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">AUT. COM</font></div></td>
    <td width="9%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">AUT. ESP</font></div></td>
    <td width="9%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">AUT. ALT</font></div></td>
    <td width="4%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">PMO</font></div></td>
    <td width="48%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">TEXTO</font></div></td>
  </tr>

</table> -->
<?PHP 
				
			 $sql="select * from planes_os where nro_os like '$nro_os'";
$result14 = $db->Execute($sql);
$nro_plan=strtoupper($result14->fields["nro_plan"]);

if ($nro_plan != ""){
?>
<!-- <iframe src="planes_os.php?nro_os=<?php print("$nro_os");?>&&plan=<?php print("$plan");?>" width="820" height = "70"  frameborder="0"> </iframe> -->
		
  <?php } 
}


	



IF ($orden == "SI"){


 $ordenes = "ordenes";
$detalle = "detalle";

 $sql3="select * from $ordenes where nro_paciente = $nro_paciente order by fecha_grabacion";
$result3 = $db->Execute($sql3);


 if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {


$diagnostico=strtoupper($result3->fields["diagnostico"]);
$motivo=strtoupper($result3->fields["motivo"]);
$observaciones=strtoupper($result3->fields["observaciones"]);

if ($no_mostrar == ""){
if (($diagnostico != "") or ($motivo != "") or ($observaciones != "")){
	$no_mostrar = 1;
?><table width="850" border="0" cellspacing="0">


<tr bgcolor="#CECECE">
   <td colspan="6"><div align="center"><img src="../../imagenes/clinica.jpg" ></div></td>
  </tr>
 <tr bgcolor="#CECECE">
   <td colspan="2" valign="top" bgcolor="#666666"><div align="center" class="Estilo27">
     <div align="center">Fecha</div>
   </div></td>
   <td colspan="3" valign="top" bgcolor="#666666"><div align="center" class="Estilo28"><span class="Estilo25">Diagn&oacute;stico</span></div></td>
   <td valign="top" bgcolor="#666666"><div align="center" class="Estilo27">
     <div align="center">Observaciones</div>
   </div></td>
 </tr><?php 

}}




$fecha_grabacion=strtoupper($result3->fields["fecha_grabacion"]);

$dia = substr($fecha_grabacion,8,2);
$mes= substr($fecha_grabacion,5,2);
$anio = substr($fecha_grabacion,0,4);
$fecha_grabacion = $dia."-".$mes."-".$anio;



if (($diagnostico != "") or ($motivo != "") or ($observaciones != "")){
?>
  <tr>
   <td colspan="2" valign="top" bgcolor="#E0EDF3"><?php echo $fecha_grabacion;?></td>
   <td colspan="3" valign="top" bgcolor="#E0EDF3"><?php echo $diagnostico;?></td>
   <td valign="top" bgcolor="#E0EDF3"><?php echo $observaciones;?></td>
 </tr>
 

<?php 

}


$result3->MoveNext();
		}


?></table>
<?php
}


$ordenes = "ordenes";
$detalle = "detalle";

  $sql2="select * from $ordenes where nro_paciente = $nro_paciente order by cod_grabacion, fecha_grabacion";
$result2 = $db->Execute($sql2);

 if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {

$nro_os=strtoupper($result2->fields["nro_os"]);
$nro_paciente=strtoupper($result2->fields["nro_paciente"]);
$periodo=strtoupper($result2->fields["periodo"]);
$marca=strtoupper($result2->fields["marca"]);
$lote=strtoupper($result2->fields["lote"]);
$cod_operacion=strtoupper($result2->fields["cod_operacion"]);
$modulo=strtoupper($result2->fields["modulo"]);



$año=strtoupper($result2->fields["ano"]);
$nro_afiliado=$result2->fields["nro_afiliado"];
$nro_orden=$result2->fields["nro_orden"];
$autorizacion=strtoupper($result2->fields["autorizacion"]);
$autorizacion_ws=strtoupper($result2->fields["autorizacion_ws"]);

$operador=strtoupper($result2->fields["operador"]);


$cod_grabacion=strtoupper($result2->fields["cod_grabacion"]);

$fecha_grabacion=strtoupper($result2->fields["fecha_grabacion"]);

$dia = substr($fecha_grabacion,8,2);
$mes= substr($fecha_grabacion,5,2);
$anio = substr($fecha_grabacion,0,4);
$fecha_grabacion = $dia."-".$mes."-".$anio;


$fecha=strtoupper($result2->fields["fecha"]);


$dia = substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio = substr($fecha,0,4);
$fecha = $dia."-".$mes."-".$anio;



$matricula=strtoupper($result2->fields["matricula"]);
$prescriptor=strtoupper($result2->fields["medico"]);
$confirmada=strtoupper($result2->fields["confirmada"]);


/*
require_once("../../nusoap/lib/nusoap.php");
$wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('cod_grabacion'=>$cod_grabacion); 
 $response= $client->call('buscar_orden', $param1);

*/

 if ($response == $cod_grabacion){
$web = "WEB";
 }

if ($autorizacion == 0){
$autorizacion = "S/A";
}
 
 if ($band == 1){
 $band = 2;
 ?>
<table width="850" border="1" cellspacing="0">
  <!--DWLayoutTable-->
  <tr >
    <td width="37" bgcolor="#666666"><div align="center" class="Estilo27">
      <div align="center">ABM</div>
    </div></td>
    <td width="35" bgcolor="#666666"><div align="center" class="Estilo25">AUT</div></td>
    <td width="35" bgcolor="#666666"><div align="center" class="Estilo25">OS</div></td>
    <td width="55" bgcolor="#666666"><span class="Estilo25">Protocolo</span></td>
    <td width="60" bgcolor="#666666"><div align="center" class="Estilo27">
      <div align="center">Solicitada</div>
    </div></td>
    <td width="81" bgcolor="#666666"><div align="center" class="Estilo27">
      <div align="center">Análisis</div>
    </div></td>
    <td width="188" bgcolor="#666666"><div align="center" class="Estilo27">
      <div align="center">Pr&aacute;cticas Solicitadas </div>
    </div>
        <div align="center" class="Estilo27"></div></td>
    <td width="87" bgcolor="#666666"><div align="center"><span class="Estilo26">COMPLETAR</span></div></td>
    <td width="52" bgcolor="#666666"><div align="center" class="Estilo28"><span class="Estilo26">DERIVAR</span></div></td>
    <td width="39" bgcolor="#666666"><div align="center" class="Estilo28"><span class="Estilo26">BORRAR</span></div></td>
    <td width="42" bgcolor="#666666"><div align="center" class="Estilo29">
      <div align="center">INFORME</div>
    </div></td>
    <td width="36" bgcolor="#666666"><div align="center"><span class="Estilo26">ANULAR</span></div></td>
    <td width="41" bgcolor="#666666"><div align="center"><span class="Estilo26">AUT</span></div></td>
  </tr>
  <?php }?>
  <tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">
    <td bgcolor="#EDEDED"><div align="center"><?php echo $autorizacion;?></div></td>
    <?php if ($autorizacion_ws  > 0){?>
    <td bgcolor="#EDEDED"><div align="center"><a href="reimprimir.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><?php echo $autorizacion_ws;?></a></div></td>
    <?php } else{?>
    <td bgcolor="#EDEDED"><div align="center"><?php echo $autorizacion_ws;?></div></td>
    <?php }?>
    <td bgcolor="#EDEDED"><div align="center"><?php echo $nro_os;?></div></td>
    <td bgcolor="#EDEDED"><div align="center"><a href="../analisis/emisionA6/emision_normal_todos.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><?php echo $cod_grabacion;?> <?php echo $web;?></a></div></td>
    <td bgcolor="#EDEDED"><div align="center"><?php echo $fecha_grabacion;?></div></td>
    <td bgcolor="#EDEDED"><div align="center"><?php echo $fecha;?></div></td>
    <td bgcolor="#EDEDED"><?php include ("../analisis/practicas.php");?>
        <div align="center"><font size="3" face="Arial, Helvetica, sans-serif"></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"> <a href="../analisis/emision_mod.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&usuario=<?php print("$usuario");?>"><span class="glyphicon glyphicon-th-list"></span></div></a></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"> <a href="../analisis/practicas_imp.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&usuario=<?php print("$usuario");?>"><img src="../../imagenes/office//011.ico" alt="Ficha" border = "0"></a> </font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"> <a href="borra_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&usuario=<?php print("$usuario");?>&&nro_paciente=<?php print("$nro_paciente");?>" onClick="return confirm('¿Está seguro de Borrar la orden y sus RESULTADOS?');"><img src="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="../analisis/modelos/elegir_modelos.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><img src="../../imagenes/office//005.ico" alt="Informe" border = "0"></a></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="../analisis/modelos_completar/elegir_modelos.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"></a></font><font size="1" face="Arial, Helvetica, sans-serif"><a href="autorizar.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"></a></font><font size="1" face="Arial, Helvetica, sans-serif"><a href="anular_osde.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><img src="../../imagenes/office//951.ico" alt="Informe" border = "0"></a></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="autorizar_osde.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"></a></font><font size="1" face="Arial, Helvetica, sans-serif"><a href="autorizar_osde.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><img src="../../imagenes/office//951.ico" alt="Informe" border = "0"></a></font></div></td>
  </tr>
  <?php 


$result2->MoveNext();
		}

?>
</table>
<?php 

	$band = 1;
$result->MoveNext();
		}

		if (($nombre == "") and ($apellido == "")){
		

		if ($nro_os == ""){
$leyenda = "NO EXISTE PACIENTE CON ESAS CARACTERISTICAS";
include ("../../alertas/campo_informacion.php");

}

?>
<table width="850" border="1" cellspacing="0">
  <tr>
<td width="75" height="8" bgcolor="#CC3333" class="Estilo42"><div align="center"></div>
</div></td>
<td width="385" bgcolor="#EDEDED" class="Estilo42"><div align="center"><a href="../pac/entrada_dato_offline.php?nombre=<?php print("$palabra");?>" class="Estilo28">DAR INGRESO</a> </div></td>
<td width="376" height="8" bgcolor="#EDEDED" class="Estilo42"><div align="center"><a href="../pac/entrada_dato_abm.php?nombre=<?php print("$palabra");?>" class="Estilo28">DAR INGRESO ABM</a>
    </div>
    </span></div></td>
</tr>
</table>





<?php }else{?>
  <tr>
    <td colspan="12"></td>
  </tr>
  <tr>
    <td colspan="12"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td colspan="12"></td>
  </tr>
  <tr>
    <td height="2"></td>
    <td width="21"></td>
    <td width="64"></td>
    <td></td>
    <td width="83"></td>
    <td width="1"></td>
    <td width="19"></td>
    <td width="58"></td>
    <td width="276"></td>
    <td></td>

    <td></td>
    <td></td>

  </tr>
<?php }?>
</table>

</body>
</html>

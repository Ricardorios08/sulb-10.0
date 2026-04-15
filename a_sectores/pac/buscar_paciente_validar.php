<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>LISTADO DE PACIENTES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

 <link href="../../menus.css" rel="stylesheet" type="text/css" />
<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />


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
.Estilo31 {
	font-family: "Trebuchet MS";
	font-size: 24px;
	font-weight: bold;
}
.Estilo32 {font-size: 24px}
.Estilo40 {font-family: "Trebuchet MS"; font-size: 14px; font-weight: bold; }
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
$usuario = $_REQUEST['usuario'];

}

$band = 1;

$usuario;

echo "dd".$pac = $_REQUEST['pac'];
$submit = $_REQUEST['ok'];
 
$tipo_operador = $_REQUEST['tipo_operador'];  
if ($submit == "PRO"){
//include ("buscar_paciente_protocolo.php");
exit;
}

 


list($ape,$nom) = explode("+",$palabra);

     $ape; // Imprime 12
     $nom; // Imprime 01
  





 $sql="select * from datos_orden where id = $usuario";
$result = $db->Execute($sql);

$orden=strtoupper($result->fields["orden"]);

if ($palabra == ""){
 
include ("seleccionar_planilla_validar.php");
exit;

}else
{
if (is_numeric($palabra) == false){

if (($ape != "") and ($nom != "")){
 $sql="select * from pacientes where  nombre like '$nom%' and  apellido like '$ape%' and usuario = '$usuario' order by nombre ";
}elseif (($ape != "") and ($nom == "")){
$sql="select * from pacientes where  apellido like '$ape%' and usuario = '$usuario' order by nombre ";
}elseif (($ape == "") and ($nom != "")){
$sql="select * from pacientes where  nombre like '$nom%' and usuario = '$usuario'order by nombre  ";
}

}else
{

if ($pac == 1){
$sql="select * from pacientes where nro_paciente like '$palabra' and usuario = '$usuario' order by nombre ";
}else{
$sql="select * from pacientes where nro_paciente like '$palabra' and usuario = '$usuario' or nro_documento like '$palabra%' and usuario = '$usuario' or  nro_afiliado like '$palabra%' and usuario = '$usuario' order by nombre ";
}
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
<table width="829" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bgcolor="#CECECE">
    <td colspan="4" bgcolor="#CECECE"><div align="center" class="titulo"><font face="Trebuchet MS">DATOS PERSONALES </font></div></td>
  </tr>
  
 <tr>
    <td width="109" valign="middle" bgcolor="#CCCCCC"><div align="right"><a href="../grabacion/grabar_nuevo\grabacion_ordenes.php?usuario=<?php print("$usuario");?>&&nro_paciente=<?php print("$nro_paciente");?>&&nro_os=<?php print("$nro_os");?>&&usuario=<?php print("$usuario");?>&&tipo_operador=val"> </a>PACIENTE:</div></td>
    <td width="10" valign="middle" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="294" colspan="-2" valign="middle" bgcolor="#EDEDED"><span class="Estilo40"><?php echo $apellido;?> <?php echo $nombre;?> (<?php echo $nro_paciente;?>)</span></td>
    <td width="379" rowspan="8" bgcolor="#EDEDED"><div align="center" style="width: 100%; height: 90px;"><a href="../grabacion/grabar_nuevo/grabacion_ordenes.php?usuario=<?php print("$usuario");?>&&nro_paciente=<?php print("$nro_paciente");?>&&nro_os=<?php print("$nro_os");?>&&usuario=<?php print("$usuario");?>&&tipo_operador=val" class="bot_receta1">Nueva Orden<img src="../pac/alta.png" width="70" height="70" border="0" alt=""></a><a class="bot_receta2" href="modificar.php?usuario=<?php print("$usuario");?>&&nro_paciente=<?php print("$nro_paciente");?>&&usuario=<?php print("$usuario");?>&&tipo_operador=val" target = "central">Modificar<img src="../pac/editar.png" width="70" height="70" border="0" alt=""></a><a class="bot_receta3" href="borra_todo.php?usuario=<?php print("$usuario");?>&&nro_paciente=<?php print("$nro_paciente");?>&&tipo_operador=val" onClick="return confirm('&iquest;Est&aacute; seguro de Borrar el paciente con toda su historia Clinica?');">Borrar<img src="../pac/borrar.png" width="70" height="70" border="0" alt=""></a><a class="bot_receta4" href="ficha.php?usuario=<?php print("$usuario");?>&&nro_paciente=<?php print("$nro_paciente");?>&&usuario=<?php print("$usuario");?>&&tipo_operador=val">Ficha<img src="../pac/ver_ficha.png" width="70" height="70" border="0" ></a></div></td>
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
    <td colspan="2" valign="top" bgcolor="#EDEDED"><span class="Estilo41"><?php echo $activo;?> * Ultima Verificación: <?php echo $ultima_fecha;?></span></td>
  </tr>

<?PHP  if ($webservice == "SI"){?>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="-2" bgcolor="#EDEDED"><div align="center"><a href="../pacientes/actualizar_datos.php?usuario=<?php print("$usuario");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&nro_paciente=<?php print("$nro_paciente");?>&&nro_os=<?php print("$nro_os");?>&&usuario=<?php print("$usuario");?>" class="Estilo2">Actualizar Datos Obra Social</a></div></td>
    <td bgcolor="#EDEDED">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="-2" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#EDEDED">&nbsp;</td>
  </tr>
</table>
<?php
	
}


	
if ($requisitos != ""){?>
   <table width="829" border="0" cellpadding="0" cellspacing="0">
            
            <tr>
              <td colspan="8" bgcolor="#CCCCCC"><div align="center" class="Estilo42"><font face="Trebuchet MS">REQUISITOS</font></div></td>
            </tr>
               <tr>
              <td colspan="2" bgcolor="#D8F1FA" style="padding: 10px;"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $requisitos;?></font></td>
       
            </tr>
</table>


		  <?php //include ("planes_os.php");?>
  <?php } 


	



IF ($orden == "SI"){


 $ordenes = "ordenes";
$detalle = "detalle";

 $sql3="select * from $ordenes where nro_paciente = $nro_paciente and operador = '$usuario' order by fecha_grabacion";
$result3 = $db->Execute($sql3);


 if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {


$diagnostico=strtoupper($result3->fields["diagnostico"]);
$motivo=strtoupper($result3->fields["motivo"]);
$observaciones=strtoupper($result3->fields["observaciones"]);

if ($no_mostrar == ""){
if (($diagnostico != "") or ($motivo != "") or ($observaciones != "")){
	$no_mostrar = 1;
?><table width="829" border="0" cellspacing="0">


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

  $sql2="select * from $ordenes where nro_paciente = $nro_paciente and operador = '$usuario' order by cod_grabacion, fecha_grabacion";
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

$autorizacion=strtoupper($result2->fields["autorizacion"]);
$autorizacion_ws=strtoupper($result2->fields["autorizacion_ws"]);

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
 




<table width="829" border="1" cellspacing="0">
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
    <td bgcolor="#666666"><div align="center" class="Estilo27">
      <div align="center">Pr&aacute;cticas Solicitadas </div>
    </div>      <div align="center" class="Estilo27"></div></td>

		    <td width="36" bgcolor="#666666"><div align="center"><span class="Estilo26">MODIFICAR ORDEN</span></div></td>
	    <td width="36" bgcolor="#666666"><div align="center"><span class="Estilo26">BORRAR ORDEN</span></div></td>
    <td width="36" bgcolor="#666666"><div align="center"><span class="Estilo26">ANULAR AUTORIZACION</span></div></td>
    <td width="41" bgcolor="#666666"><div align="center"><span class="Estilo26">SOLICITAR AUTORIZACION</span></div></td>
 </tr>
  <?php }?>



 <tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">
    <td bgcolor="#EDEDED"><div align="center"><?php echo $autorizacion;?></div></td>
   
	

 

	<?php if ($autorizacion_ws > 0){?>


	<td bgcolor="#EDEDED"><div align="center"><a href="reimprimir.php?nro_paciente=<?php print("$nro_paciente");?>&&usuario=<?php print("$usuario");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><?php echo $autorizacion_ws;?></a></div></td>
	<?php }else{?>


	<td bgcolor="#EDEDED"><div align="center"><?php echo $autorizacion_ws;?></div></td>
<?php }?>




    <td bgcolor="#EDEDED"><div align="center"><?php echo $nro_os;?></div></td>

    <td bgcolor="#EDEDED"><div align="center"> <?php echo $cod_grabacion;?> <?php echo $web;?> </div></td>


    <td bgcolor="#EDEDED"><div align="center"><?php echo $fecha_grabacion;?></div></td>
    <td bgcolor="#EDEDED"><div align="center"><?php echo $fecha;?></div></td>
    <td bgcolor="#EDEDED"><?php include ("../analisis/practicas.php");?>
      <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"></font></div>      <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"></font></div></td>
    
		
		 <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="../analisis/emision_mod_validar.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><img src="../../imagenes/office//011.ico" alt="Informe" border = "0"></a></font></div></td>


	 <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="borra_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&usuario=<?php print("$usuario");?>&&nro_paciente=<?php print("$nro_paciente");?>&&tipo_operador=val" onclick="return confirm('¿Está seguro de Borrar la orden y sus RESULTADOS?');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></font></div></td>
	
	
	<td bgcolor="#EDEDED"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">
<a href="anular_osde.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>&&tipo_operador=val""><img src="../../imagenes/office//783.ico" alt="Informe" border = "0"></a></font></div></td>


    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="autorizar_osde.php?usuario=<?php print("$usuario");?>&&nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>&&tipo_operador=val"><img src="../../imagenes/office//1086.ico" alt="Informe" border = "0"></a></font></div></td>
  </tr>
<?php 


$result2->MoveNext();
		}

?></table>
<?php 

	$band = 1;
$result->MoveNext();
		}

		if (($nombre == "") and ($apellido == "")){?>
		
<table width="829">
  <tr>
<td height="8" colspan="12"><div align="center" class="Estilo31">NO EXISTE PACIENTE CON ESAS CARACTERISTICAS</div>  <div align="center" class="titulo"><a href="../pac/entrada_dato_abm.php?usuario=<?php print("$usuario");?>&&nombre=<?php print("$palabra");?>" class="Estilo28">INGRESAR NUEVO PACIENTE</a></span></div></td>
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

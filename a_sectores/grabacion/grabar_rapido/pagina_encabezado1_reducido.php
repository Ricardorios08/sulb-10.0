<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Grabación de Ordenes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">



<link href="../../../css/fondo.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.Estilo1 {font-family: Arial, Helvetica, sans-serif}
.Estilo4 {font-size: 12px}
.Estilo6 {color: #FFFFFF}
.Estilo9 {color: #000000}
.Estilo15 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; }
.Estilo17 {font-size: 12px; font-weight: bold; }
.Estilo18 {font-size: 14px}
.Estilo19 {
	font-size: 16px;
	color: #FF0000;
}
.Estilo20 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo8 {color: #FFFFFF; font-weight: bold; }
-->
</style>

<script language="javascript">
function on_load()
{
document.getElementById("nro_practica").focus();
}



function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
							
				
				
				
				case "afiliado":
				document.getElementById("prescriptor").focus();
				break;

				case "prescriptor":
				document.getElementById("fecha_orden").focus();
				break;
					
					case "nro_orden":
				document.getElementById("afiliado").focus();
				break;


				case "fecha_orden":
				document.getElementById("autorizacion").focus();
				break;

				case "autorizacion":
				document.getElementById("coseguro").focus();
				break;

				case "coseguro":
				document.getElementById("OK").focus();
				break;

				case "nro_practica":
				document.getElementById("SI").focus();
				break;


				
		}
		return false;
	}
	return true;
}


</script>

</head>


<?php 

function ceros_nro_temp($palabra) {
		
		if (strlen($palabra) == 1){
return	$resultado = "0000".$palabra;
		}

		if (strlen($palabra) == 2){
return	$resultado = "000".$palabra;
		}

if (strlen($palabra) == 3){
return	$resultado = "00".$palabra;
		}

		if (strlen($palabra) == 4){
return	$resultado = "0".$palabra;
		}

if (strlen($palabra) == 5){
return	$resultado = $palabra;
		} 
}


include ("../../../lautaro/funciones.php");

$nro_os = $_REQUEST['nro_os'];
include ("convenio.php");
$nro_laboratorio = $_REQUEST['nro_paciente'];
$periodo= $_REQUEST['periodo'];
$anio= $_REQUEST['anio'];
$actualiza = $_REQUEST["actualiza"];
$nro_orden= trim($_REQUEST['nro_orden']);
$nro_orden = ceros_nro_orden($nro_orden); 


$medico=$_REQUEST['medico'];
$nombre_medico=strtoupper($_REQUEST['nombre_medico']);


$motivo=$_REQUEST['motivo'];
$diagnostico=$_REQUEST['diagnostico'];
$observaciones=$_REQUEST['observaciones'];

$dia= trim($_REQUEST['dia']);
$mes= trim($_REQUEST['mes']);
$anio_o= trim($_REQUEST['anio_o']);


if ($dia == ""){
$dia = date("d");
}

if ($mes== ""){
$mes = date("m");
}

if ($anio_o == ""){
$anio_o = date("y");
}

if (strlen($mes) == 1){
$mes = "0".$mes;
}

if (strlen($dia) == 1){
$dia = "0".$dia;
}

IF (checkdate ($mes, $dia, $anio_o))
{
$fecha_orden= $dia.$mes.$anio_o;
}
ELSE
{

$leyenda = "La fecha no es correcta";
include ("../../../alertas/campo_informacion2.php");
exit;
}


// fecha realizacion

$dia_r= trim($_REQUEST['dia_r']);
$mes_r= trim($_REQUEST['mes_r']);
$anio_o_r= trim($_REQUEST['anio_o_r']);


if ($dia_r == ""){
$dia_r = date("d");
}

if ($mes== ""){
$mes_r = date("m");
}

if ($anio_o_r == ""){
$anio_o_r = date("y");
}

if (strlen($mes_r) == 1){
$mes_r = "0".$mes_r;
}

if (strlen($dia_r) == 1){
$dia_r = "0".$dia_r;
}


$fecha_realizacion= "20".$anio_o_r."-".$mes_r."-".$dia_r;

if ($nro_os == 5171){
IF (checkdate ($mes_r, $dia_r, $anio_o_r))
{

}
ELSE
{

$leyenda = "La fecha no es correcta";
include ("../../../alertas/campo_informacion2.php");
exit;
}
}

/*if (($dia < 1) or ($dia > 31)){
$leyenda = "Dia no valido";
include ("../../../alertas/campo_vacio.php");
exit;
}

if (($mes < 1) or ($mes > 12)){
$leyenda = "Mes no valido";
include ("../../../alertas/campo_vacio.php");
exit;
}
*/


$periodo= $_REQUEST['periodo'];

$lote= $_REQUEST['lote'];
$operador= $_REQUEST['operador'];
$fecha_orden= $dia."-".$mes."-20".$anio_o;
$fecha_orde= "20".$anio_o."-".$mes."-".$dia;





if ($nro_orden == ""){
include ("../../../conexiones/config.inc.php");
 $sql = "SELECT distinct(nro_orden) FROM `ordenes` WHERE  periodo = $periodo AND ano = $anio AND nro_os = $nro_os and nro_orden like '$operador%' ORDER BY nro_orden DESC LIMIT 1";
$result = $db->Execute($sql);


$nro_orde=strtoupper($result->fields["nro_orden"]);
if ($nro_orde == ""){
$nro_orden = $operador."00001";
}
else
	{
$nro_orden = $nro_orde +1;
	}

}


$sql8 = "SELECT operador, fecha FROM `ordenes` WHERE nro_orden = $nro_orden";
$result8 = $db->Execute($sql8);
$operad=strtoupper($result4->fields["operador"]);
$fech=strtoupper($result4->fields["fecha"]);

if ($operad != ""){
$operador = $operad;
}


$sql="select * from datos_os where nro_os = $nro_os";
$result = $db->Execute($sql);
$sigla=strtoupper($result->fields["sigla"]);

 $sql12="select * from pacientes where nro_paciente = $nro_laboratorio";
$result12 = $db->Execute($sql12);
$nombre_laboratorio=strtoupper($result12->fields["nombre"]);

$sql="select * from usuarios where id = '$operador'";
$result = $db->Execute($sql);
$nombre_operador=strtoupper($result->fields["usuario"]);


switch ($periodo)
	{
		case "1":{$mes1= "ENERO";}break;
		case "2":{$mes1= "FEBRERO";}break;
		case "3":{$mes1= "MARZO";}break;
		case "4":{$mes1= "ABRIL";}break;
		case "5":{$mes1= "MAYO";}break;
		case "6":{$mes1= "JUNIO";}break;
		case "7":{$mes1= "JULIO";}break;
		case "8":{$mes1= "AGOSTO";}break;
		case "9":{$mes1= "SETIEMBRE";}break;
		case "10":{$mes1= "OCTUBRE";}break;
		case "11":{$mes1= "NOVIEMBRE";}break;
		case "12":{$mes1= "DICIEMBRE";}break;
				}



switch ($tipo_afiliado22){
case "SIN IVA":{
$marca = "sin_iva";
break;
}

case "CON IVA":{
$marca = "con_iva";
break;
}
}

$sql8="select * from grabadas_temp where operador = $operador";
$result8 = $db->Execute($sql8);
$cod_gra=strtoupper($result8->fields["cod_grabacion"]);

if ($cod_gra == ""){

 $sql = "INSERT INTO `grabadas_temp` ( `cod_grabacion` , `periodo` , `ano` , `nro_os` , `sigla` , `nro_laboratorio` , `nombre_laboratorio` ,`matricula` , `nro_afiliado` , `nombre_afiliado` ,`nro_orden` , `fecha` ,`medico`  ,`nombre_medico` , `coseguro` , `autorizacion` , `fecha_fac` , `nro_fac` , `confirmada` , `marca` , `lote` , `operador` , `nombre_operador` ,  `fecha_realizacion` , `diagnostico` , `motivo` , `observaciones` ) VALUES ( '$operador' , '$periodo' , '$anio' , '$nro_os' , '$sigla' , '$nro_laboratorio' , '$nombre_laboratorio' , '$matricula' , '$afiliado' , '$nombre_afiliado', '$nro_orden' , '$fecha_orde' , '$medico' , '$nombre_medico' , '$coseguro' , '$autorizacion' , '' , '' , 7 , '$tipo_afiliado' , '$lote' , '$operador' , '$nombre_operador' , '$fecha_realizacion' , '$diagnostico' , '$motivo' , '$observaciones')";
$result9 = $db->Execute($sql);
}else{
$sql = "UPDATE `grabadas_temp` SET `nro_orden` = '$nro_orden' , `nro_afiliado` = '$afiliado', `fecha_realizacion` = '$fecha_realizacion' , `fecha` = '$fecha_orde', `medico` = '$medico' , `nombre_medico` = '$nombre_medico' , `diagnostico` = '$diagnostico' , `motivo` = '$motivo' , `observaciones` = '$observaciones' WHERE `cod_grabacion` = '$operador' ";
$result9 = $db->Execute($sql);
}


?>
<BODY onload = "on_load()">
<FORM name="form" ACTION="pagina_completa_reducida.php" METHOD = "POST">

<table width="850" cellpadding="3" cellspacing="0" BORDER = "0">
  <!--DWLayoutTable-->
 <tr bgcolor="#000099" >
   <td colspan="4" bgcolor="#CCCCCC"  ><div align="center"><span class="Estilo12"> ANALISIS SOLICITADO DEL PACIENTE: </span> <strong><?php echo $nombre_laboratorio;?> <?php echo $nro_laboratorio;?></strong></div>
     <div align="right"></div></td>
   </tr>
 <tr bgcolor="#E1F2EF"  >
   <td width="257" bgcolor="#CCCCCC"  ><div align="center">
     <div align="left">Obra Social: <?php echo$sigla;?> - <?php echo $nro_os;?></div>
   </div></td>
   <td colspan="2" bgcolor="#CCCCCC"  ><div align="center">Fecha  Orden: <?php echo $fecha_orden;?> </div></td>
   <td width="249" bgcolor="#CCCCCC"><div align="center">N&ordm; Orden: <?php echo $nro_orden;?></div></td>
 </tr>
 
 
 <tr bgcolor="#D2CCF9" >
   <td colspan="4" bgcolor="#FFFF99"><div align="center"><span class="Estilo10"> 475 = HEMOGRAMA 471 = HEMOGLOBINA 711 = ORINA 736 = MATERIA FECAL</span></div></td>
   </tr>
 
 <tr>
   <td height="0"></td>
   <td></td>
   <td width="188"></td>
   <td></td>
 </tr>
 <tr>
   <td height="7"></td>
   <td width="132"></td>
   <td></td>
   <td></td>
 </tr>
 </table>

 <input type="hidden" size="4" name="nro_os" value="<?php echo $nro_os;?>">
<input type="hidden" size="4" name="operador" value="<?php echo $operador;?>">
<input type="hidden" size="4" name="nro_laboratorio" value="<?php echo $nro_laboratorio;?>">
<input name="nro_orden" type="hidden"   value = "<?php echo $nro_orden;?>" >
<input type="hidden" size="1" name="periodo"  value="<?php echo $periodo;?>" id="periodo">
<input name="afiliado" type="hidden"   id="afiliado2" value = "<?php echo $afiliado;?>" >
<input name="lote" type="hidden" value="<?php echo $lote;?>">


<table width="850" height="44" border="0
" cellpadding="5" cellspacing="0">
  <!--DWLayoutTable-->
 <tr valign="middle" bgcolor="#E6E6E6" >
   <td width="76%" valign="middle"  >Practica:
          <input type="text" size="5" name="nro_practica" id="nro_practica" tabindex = "26" value = "<?php echo $cod_practica;?>">      <span class="right Estilo6">
     <span class="Estilo9">
     <input type="submit" name="Alta" value="SI" id="SI">
     <input name="tipo" type="radio" value="1" checked>
    Practicas 
     <input name="tipo" type="radio" value="2">
        M&oacute;dulos
        <input type="submit" name="tipo" value="BUSCAR PRACTICAS">
		<input type="submit" name="tipo" value="BUSCAR MODULOS">

      </td>
  </table>
</form>


<table width="850" border="0">
  <tr bgcolor="#C4D7E6">
    <td width="89"><div align="center" >ITEM</div></td>
    <td width="179"><div align="center">NRO PRACTICA</div></td>
    <td width="768"><div align="center">PRACTICA</span></div></td>
  </tr>
</table>

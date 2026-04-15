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
include ("../../../conexiones/config.inc.php");
$nro_os = $_REQUEST['nro_os'];
//include ("convenio.php");
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

$lote11=$_POST["lote1"];
for ($i=0;$i<count($lote11);$i++)    
{     
$lote1 = $lote11[$i];    
}

if ($lote1 != ''){
$lote = $lote1;
}



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
$coseguro=strtoupper($result12->fields["coseguro"]);
$plan=strtoupper($result12->fields["plan"]);
$activo=strtoupper($result12->fields["activo"]);
$ultima_fecha=strtoupper($result12->fields["ultima_fecha"]);







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

   $sql = "INSERT INTO `grabadas_temp` ( `cod_grabacion` , `periodo` , `ano` , `nro_os` , `sigla` , `nro_laboratorio` , `nombre_laboratorio` ,`matricula` , `nro_afiliado` , `nombre_afiliado` ,`nro_orden` , `fecha` ,`medico`  ,`nombre_medico` , `coseguro` , `autorizacion` , `fecha_fac` , `nro_fac` , `confirmada` , `marca` , `lote` , `operador` , `nombre_operador` ,  `fecha_realizacion` , `diagnostico` , `motivo` , `observaciones` ) VALUES ( '$operador' , '$periodo' , '$anio' , '$nro_os' , '$sigla' , '$nro_laboratorio' , '$nombre_laboratorio' , '$matricula' , '$nro_afiliado' , '$nombre_afiliado', '$nro_orden' , '$fecha_orde' , '$medico' , '$nombre_medico' , '$coseguro' , '$autorizacion' , '' , '' , 7 , '$tipo_afiliado' , '$lote' , '$operador' , '$nombre_operador' , '$fecha_realizacion' , '$diagnostico' , '$motivo' , '$observaciones')";
$result9 = $db->Execute($sql);
}else{
 $sql = "UPDATE `grabadas_temp` SET `nro_orden` = '$nro_orden' , `nro_afiliado` = '$afiliado', `fecha_realizacion` = '$fecha_realizacion' , `fecha` = '$fecha_orde', `medico` = '$medico' , `nombre_medico` = '$nombre_medico' , `diagnostico` = '$diagnostico' , `motivo` = '$motivo' , `observaciones` = '$observaciones' WHERE `cod_grabacion` = '$operador' ";
$result9 = $db->Execute($sql);
}

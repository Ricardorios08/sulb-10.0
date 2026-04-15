<style type="text/css">
<!--
.Estilo1 {font-weight: bold}
.Estilo2 {font-weight: bold}
.Estilo3 {font-weight: bold}
.Estilo4 {font-weight: bold}
-->
</style>


<?php $hoy=date("d/m/y");


if ($banderin != 1){
$nro_paciente= $_REQUEST['nro_paciente'];
$nro_os= $_REQUEST['nro_os'];
 $cod_grabacion= $_REQUEST['cod_grabacion'];
$fecha_grabacion= $_REQUEST['fecha_grabacion'];
}

   $enviar= $_REQUEST['enviar'];
   
   $lote= $_REQUEST['lote'];

if ($enviar == "MODIFICAR"){

	include("../../conexiones/config.inc.php");

 $nro_paciente= $_REQUEST['nro_paciente'];

  $medico= $_REQUEST['medico'];



 $nombre_medico= $_REQUEST['nombre_medico'];
 $dia_orden= $_REQUEST['dia_orden'];
 $mes_orden= $_REQUEST['mes_orden'];
 $anio_orden= $_REQUEST['anio_orden'];
 $validada= $_REQUEST['validada'];
if ($dia_orden == ""){
$leyenda = "NO PUEDE DEJAR DIA VACIO";
include ("../../alertas/campo_informacion2.php");
exit;
}

if ($mes_orden == ""){
$leyenda = "NO PUEDE DEJAR MES VACIO";
include ("../../alertas/campo_informacion2.php");
exit;
}

if ($anio_orden == ""){
$leyenda = "NO PUEDE DEJAR AÑO VACIO";
include ("../../alertas/campo_informacion2.php");
exit;
}


$validada_po=$_POST["validada_por"];
	for ($i=0;$i<count($validada_po);$i++)    
	{     
	$validada_por = $validada_po[$i];    
	}

 

$fecha = $anio_orden."-".$mes_orden."-".$dia_orden;



 $sql = "UPDATE ordenes SET `fecha_grabacion` = '$fecha' , `nombre_medico` = '$nombre_medico' , `medico` = '$medico'  WHERE cod_grabacion = $cod_grabacion LIMIT 1";
 $result = $db->Execute($sql);


   $sql = "UPDATE detalle SET `fecha` = '$fecha' , `lote` = '$lote' WHERE cod_grabacion = $cod_grabacion";
 $result = $db->Execute($sql);

     $sql = "UPDATE ordenes SET `fecha` = '$fecha' , `lote` = '$lote'   WHERE cod_grabacion = $cod_grabacion";
 $result = $db->Execute($sql);


}elseif ($enviar == "VALIDAR"){

include("../../conexiones/config.inc.php");

 $nro_paciente= $_REQUEST['nro_paciente'];
 $nombre_medico= $_REQUEST['nombre_medico'];
 $dia_orden= $_REQUEST['dia_orden'];
 $mes_orden= $_REQUEST['mes_orden'];
 $anio_orden= $_REQUEST['anio_orden'];
 $validada= $_REQUEST['validada'];
if ($dia_orden == ""){
$leyenda = "NO PUEDE DEJAR DIA VACIO";
include ("../../alertas/campo_informacion2.php");
exit;
}

if ($mes_orden == ""){
$leyenda = "NO PUEDE DEJAR MES VACIO";
include ("../../alertas/campo_informacion2.php");
exit;
}

if ($anio_orden == ""){
$leyenda = "NO PUEDE DEJAR AÑO VACIO";
include ("../../alertas/campo_informacion2.php");
exit;
}


$validada_po=$_POST["validada_por"];
	for ($i=0;$i<count($validada_po);$i++)    
	{     
	$validada_por = $validada_po[$i];    
	}

 IF ($validada_por == ""){
$sql="select * from ordenes WHERE cod_grabacion = $cod_grabacion";
$result = $db->Execute($sql);
$validada_por=$result->fields["validada_por"];
}

 IF ($validada_por == "sin"){
 $validada_por="";
}



$fecha = $anio_orden."-".$mes_orden."-".$dia_orden;

  $sql = "UPDATE ordenes SET  `validada_por` = '$validada_por' WHERE cod_grabacion = $cod_grabacion";
 $result = $db->Execute($sql);


}elseif ($enviar == "ACTUALIZAR MAIL"){
include("../../conexiones/config.inc.php");

 $nro_paciente= $_REQUEST['nro_paciente'];
$mail= $_REQUEST['mail'];


 $sql="select * from pacientes_mail WHERE nro_paciente = $nro_paciente";
$result = $db->Execute($sql);
$nro_paciente_mail=$result->fields["nro_paciente"];


if (($nro_paciente_mail == '') and ($mail != '')){
  $sql = "INSERT INTO `pacientes_mail` (`nro_paciente`, `nro_afiliado`, `mail`) VALUES ('$nro_paciente', '$nro_afiliado', '$mail')";
 $result = $db->Execute($sql);
}else{
      $sql = "UPDATE pacientes_mail SET  `mail` = '$mail' WHERE nro_paciente= $nro_paciente";
 $result = $db->Execute($sql);
}




}elseif ($enviar == "VALIDAR WEB"){

include("../../conexiones/config.inc.php");

 $nro_paciente= $_REQUEST['nro_paciente'];
 $nombre_medico= $_REQUEST['nombre_medico'];
 $dia_orden= $_REQUEST['dia_orden'];
 $mes_orden= $_REQUEST['mes_orden'];
 $anio_orden= $_REQUEST['anio_orden'];
 $validada= $_REQUEST['validada'];
if ($dia_orden == ""){
$leyenda = "NO PUEDE DEJAR DIA VACIO";
include ("../../alertas/campo_informacion2.php");
exit;
}

if ($mes_orden == ""){
$leyenda = "NO PUEDE DEJAR MES VACIO";
include ("../../alertas/campo_informacion2.php");
exit;
}

if ($anio_orden == ""){
$leyenda = "NO PUEDE DEJAR AÑO VACIO";
include ("../../alertas/campo_informacion2.php");
exit;
}


$validada_po=$_POST["validada_por"];
	for ($i=0;$i<count($validada_po);$i++)    
	{     
	$validada_por = $validada_po[$i];    
	}

 IF ($validada_por == ""){
$sql="select * from ordenes WHERE cod_grabacion = $cod_grabacion";
$result = $db->Execute($sql);
$validada_por=$result->fields["validada_por"];
}

$fecha = $anio_orden."-".$mes_orden."-".$dia_orden;

    $sql = "UPDATE ordenes SET  `validada` = '$validada' WHERE cod_grabacion = $cod_grabacion";
 $result = $db->Execute($sql);
}



include ("encabezado.php");
include ("practicas_mod_completas.php");

?><a href="emision/emision_pdf.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"></a>
<?php

//include ("pie.php");?> 
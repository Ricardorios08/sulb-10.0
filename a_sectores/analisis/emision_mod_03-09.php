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

if ($enviar == "MODIFICAR"){

	include("../../conexiones/config.inc.php");


 $nombre_medico= $_REQUEST['nombre_medico'];
 $dia_orden= $_REQUEST['dia_orden'];
 $mes_orden= $_REQUEST['mes_orden'];
 $anio_orden= $_REQUEST['anio_orden'];

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



$fecha = $anio_orden."-".$mes_orden."-".$dia_orden;


 $sql = "UPDATE ordenes SET `fecha_grabacion` = '$fecha' , `nombre_medico` = '$nombre_medico' WHERE cod_grabacion = $cod_grabacion LIMIT 1";
 $result = $db->Execute($sql);

 $sql = "UPDATE detalle SET `fecha` = '$fecha'WHERE cod_grabacion = $cod_grabacion";
 $result = $db->Execute($sql);

}





include ("encabezado.php");
include ("practicas_mod.php");

?><a href="emision/emision_pdf.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"></a>
<?php

//include ("pie.php");?>

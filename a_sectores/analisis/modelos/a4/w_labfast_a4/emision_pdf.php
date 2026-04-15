<?php 



$hoy=date("d/m/y");
$nro_paciente= $_REQUEST['nro_paciente'];
$nro_os= $_REQUEST['nro_os'];
$cod_grabacion= $_REQUEST['cod_grabacion'];
$fecha_grabacion= $_REQUEST['fecha_grabacion'];

$fecha_mostrar= $_REQUEST['fecha_grabacion'];
$modulo= $_REQUEST['modulo'];

if ($modulo == 18){ //PERFIL HORMONAL
include ("perfil_hormonal.php");
}
else
{
include ("emision_reducidal.php");
}


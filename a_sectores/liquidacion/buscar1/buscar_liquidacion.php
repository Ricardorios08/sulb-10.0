<?php 
$band_deb = 1;
$band_acred = 1;


$band = 1;
$bande = 1;
$bande1 = 1;
$bande2=1;
$nro_laboratorio = $_REQUEST['nro_laboratorio'];
  $anio= $_REQUEST['anio'];
 $periodo= $_REQUEST['periodo'];
 $nro_liquidacion= $_REQUEST['nro_liquidacion'];
$que_ver= $_REQUEST['que_ver'];

$radiobutton= $_REQUEST['radiobutton'];


$anio_liquidacion = $_REQUEST['anio'];

$periodo_liq = $periodo;
$anio_liquidacion_liq = $anio_liquidacion;

 $que_ver;



include ("liq_pdf_individual.php");


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



SWITCH ($que_ver){
	
	case "1":{

		IF ($anio > 10){
	
include ("buscar_liquidacion_individual_v3.php");
exit;
		}else

		{
		IF (($periodo >= 11)){
		
		include ("buscar_liquidacion_individual_v3.php");
		}else{
include ("buscar_liquidacion_individual.php");
		}
		}


		exit;break;}


	case "2":{include ("buscar_liquidacion_deuda.php");exit;break;}
	case "3":{
		
IF ($anio > 10){
	
include ("buscar_liquidacion_individual_v3.php");
exit;
}else
		{

if ($periodo >= 11){
include ("buscar_liquidacion_individual_v3.php");
		}else{
include ("buscar_liquidacion_individual.php");
		}
	
		}
	$bandera_liq = 1;exit;break;}
	case "4":{include ("buscar_liquidacion_masiva.php");$bandera_liq = 1;exit;break;}



case "5":{
$base = 10;
include ("buscar_individual_iva_pdf.php");exit;break;}

case "6":{include ("buscar_liquidacion_web.php");$bandera_liq = 1;exit;break;}

case "7":{include ("buscar_liquidacion_individual_v2_word.php");exit;break;}

case "8":{include ("buscar_liquidacion_masiva_iva.php");exit;break;}


case "9":{
$base = 10;
include ("buscar_liquidacion_iva_word.php");exit;break;}

case "11":{include ("buscar_liquidacion_masiva_iva_pdf.php");exit;break;}
}
/*


IF ($nro_liquidacion == "") {
include ("buscar_liquidaciones_individual.php");
exit;
}


// factura a cuenta.....

8807
8748
8735
8679
*/



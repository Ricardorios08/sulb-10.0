

<?
$anio= $_REQUEST['anio'];
$anio1 = $anio;
$periodo= $_REQUEST['periodo'];
$nro_laboratorio= $_REQUEST['nro_lab2'];
$nro_liquidacion= $_REQUEST['nro_liquidacion2'];
$ver= $_REQUEST['ver'];

if ($ver == 1){

if ($nro_liquidacion == ""){
	include ("todas.php");
}
else{
	include ("por_periodo.php");
}

}else
{

	include ("iva_mes.php");
}
?>



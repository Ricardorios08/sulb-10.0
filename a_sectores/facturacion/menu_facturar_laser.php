<?php 
$nro_os = $_REQUEST['nro_os'];
$lote= $_REQUEST['lote'];
$nro_os2 = $_REQUEST['nro_os2'];
//$agrega_iva= $_REQUEST['agrega_iva'];

$agrega_iva = "SI";

$pro_forma= $_REQUEST['pro_forma'];

$dia_actua= $_REQUEST['dia_actual'];
$mes_actua= $_REQUEST['mes'];
$anio_actua= $_REQUEST['anio_actual'];
$descuento= $_REQUEST['descuento'];

$dia_desde= $_REQUEST['dia_desde'];
$mes_desde= $_REQUEST['mes_desde'];
$anio_desde= $_REQUEST['anio_desde'];
$desde = "20".$anio_desde."-".$mes_desde."-".$dia_desde;

$dia_hasta= $_REQUEST['dia_hasta'];
$mes_hasta= $_REQUEST['mes_hasta'];
$anio_hasta= $_REQUEST['anio_hasta'];
$hasta = "20".$anio_hasta."-".$mes_hasta."-".$dia_hasta;


if ($pro_forma == "SI"){
	$guardar = "NO";
}else{
$guardar = "SI";
}


$anio_a_fact= $_REQUEST['anio_a_fact'];
$marc=$_POST["marca"];
	for ($i=0;$i<count($marc);$i++)    
	{     
$marca = $marc[$i];    
	}

include ("../../conexiones/config.inc.php");

 $sql34="select * from datos_os where nro_os = $nro_os";
$result34 = $db->Execute($sql34);

$nro_os_facturar=$result34->fields["nro_os_facturar"];





if ($agrega_iva == "SI"){
include ("gas-hon_laser.php");
exit;
}
else{

if (($marca == 4) or ($marca == "")) {
include ("gas-hon_laser.php");
exit;
}
else
{
include ("gas-hon_laser.php");
//include ("gas-hon_pdf.php");
exit;
}

}


if ($lote != ""){
include ("gas-hon_laser.php");
exit;
}



?>
</body>
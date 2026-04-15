<style type="text/css">
<!--
.Estilo1 {color: #FFFFFF}
.Estilo2 {font-size: 10px}
.Estilo3 {color: #FFFFFF; font-size: 10px; }
.Estilo6 {font-family: Arial, Helvetica, sans-serif}
.Estilo7 {font-size: 10px; font-family: Arial, Helvetica, sans-serif; }
.Estilo8 {color: #FFFFFF; font-size: 10px; font-family: Arial, Helvetica, sans-serif; }
.Estilo9 {color: #000000}
.Estilo10 {font-weight: bold}
-->
H1.SaltoDePagina
{
PAGE-BREAK-AFTER: always
}

.Estilo11 {font-size: 12px}
.Estilo12 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo13 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.Estilo14 {font-size: 12px; color: #000000; }
.Estilo15 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 10px; }
.Estilo17 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; }
.Estilo19 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 12px; }
.Estilo21 {font-size: 14px; font-family: Arial, Helvetica, sans-serif; }
.Estilo4 {font-size: 14px}
.Estilo23 {
	font-size: 12;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
</style>

<?

$nro_laboratorio = $_REQUEST['nro_laboratorio'];
$anio= 10;
$periodo= "05";
$nro_liquidacion= 2;









include ("../../../conexiones/config.inc.php");


echo  $sql = "SELECT sit_iva, nro_laboratorio FROM `afip` WHERE  sit_iva = 1";
$result = $db_bq->Execute($sql);


if (!$result) die("fallo".$db_bq->ErrorMsg());

  while (!$result->EOF) {

echo $nro_laboratorio=ucwords($result->fields["nro_laboratorio"]);

 $sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";
$result5 = $db_bq->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
echo $nombre_laboratorio = " (".$nro_laboratorio.") ". $nombre_laboratorio;


 $sql = "SELECT * FROM `liquidacion` WHERE  nro_liquidacion = $nro_liquidacion and `anio` like '$anio' and periodo like '$periodo' and nro_laboratorio = $nro_laboratorio and operacion like '200' GROUP by nro_laboratorio";
$result3 = $db_liq->Execute($sql);

if (!$result3) die("fallo".$db_liq->ErrorMsg());

  while (!$result3->EOF) {



echo $nro_factura=strtoupper($result3->fields["nro_factura"]); 
echo "--";
echo $nro_os=strtoupper($result3->fields["nro_os"]); 
echo "--";

 $sql2 = "SELECT * FROM `composicion` WHERE   nro_factura = $nro_factura and `nro_os` like '$nro_os' and nro_laboratorio = '$nro_laboratorio'";
$result2 = $db_liq->Execute($sql2);


echo "iva ".$iva=strtoupper($result2->fields["iva"]); 
echo "neto_gravado ".$neto_gravado=strtoupper($result2->fields["neto_gravado"]); 

echo "<br>";

 $result3->MoveNext();
	}


 $result->MoveNext();
	}

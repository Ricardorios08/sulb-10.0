
 
<!--  <body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();"> -->
<?
$band_deb = 1;
$band_acred = 1;

$band = 1;
$bande = "";
$bande1 = 1;
$bande2=1;
$banderin = 1;


include ("../../../conexiones/config.inc.php");

//$sql20 = "SELECT * FROM `liquidacion` WHERE  operacion = 200 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = 3 group by nro_laboratorio";
$sql7 = "TRUNCATE TABLE liquidacion_web";
$result7 = $db_liq->Execute($sql7);

$liquidacion = "liquidacion";

$anio_web = $anio_liquidacion;
$mes_web = $periodo;
$nro_liquidacion_web = $nro_liquidacion;
$sql20 = "SELECT * FROM $liquidacion WHERE  operacion = 100 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = $nro_liquidacion group by nro_laboratorio order by nro_laboratorio";






$result20 = $db_liq->Execute($sql20);

if (!$result20) die("fallo".$db_liq->ErrorMsg());
  while (!$result20->EOF) {

include ("borrar_va.php");
$pasada = 1;

$nro_lab = $nro_laboratorio;
$nro_laboratorio=strtoupper($result20->fields["nro_laboratorio"]); 
$nro_liquidacion=strtoupper($result20->fields["nro_liquidacion"]);

include ("buscar_liquidacion_diskette.php");


?><H1 class=SaltoDePagina> </H1><?


  $result20->MoveNext();


	}


$fecha_hoy = date("dmY");
echo $ruta="c:/informes/web/liquidacion_".$anio_web.$mes_web."-".$nro_liquidacion_web.".txt";



 echo $sql= "SELECT * FROM liquidacion_web where nro_liquidacion = $nro_liquidacion and periodo = $periodo and anio = $anio_liquidacion INTO OUTFILE '$ruta' FIELDS TERMINATED BY ';' LINES TERMINATED BY '\r\n'";
$result = $db_liq->Execute($sql);




?>


 
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


$liquidacion = "liquidacion";
SWITCH ($radiobutton){
case "1":{
$sql20 = "SELECT * FROM $liquidacion WHERE  operacion = 100 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = $nro_liquidacion and nro_laboratorio between '1' and '300' group by nro_laboratorio";
break;
}
case "2":{
$sql20 = "SELECT * FROM $liquidacion WHERE  operacion = 100 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = $nro_liquidacion and nro_laboratorio between '301' and '600' group by nro_laboratorio";
break;
}
case "3":{
$sql20 = "SELECT * FROM $liquidacion WHERE  operacion = 100 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = $nro_liquidacion and nro_laboratorio between '601' and '900' group by nro_laboratorio";
break;
}
case "4":{
$sql20 = "SELECT * FROM $liquidacion WHERE  operacion = 100 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = $nro_liquidacion and nro_laboratorio between '901' and '7999' group by nro_laboratorio";
break;
}
case "5":{
$sql20 = "SELECT * FROM $liquidacion WHERE  operacion = 100 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = $nro_liquidacion and nro_laboratorio between '8000' and '10000' group by nro_laboratorio";
break;
}

}


$result20 = $db_liq->Execute($sql20);

if (!$result20) die("fallo".$db_liq->ErrorMsg());
  while (!$result20->EOF) {

include ("borrar_va.php");
$pasada = 1;

$nro_lab = $nro_laboratorio;
$nro_laboratorio=strtoupper($result20->fields["nro_laboratorio"]); 
$nro_liquidacion=strtoupper($result20->fields["nro_liquidacion"]);

include ("buscar_liquidacion_individual_v2.php");


?><H1 class=SaltoDePagina> </H1><?


  $result20->MoveNext();


	}
?>

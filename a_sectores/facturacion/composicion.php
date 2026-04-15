<?php 
$hoy1= "20".$anio_actua."-".$mes_actua."-".$dia_actua;
$observaciones = "PENDIENTE";



//include ("../../conexiones/config_liq.php"); 

$iva_bioq = round($iva_bioq,2);
$neto_gravado1= round($neto_gravado1,2);
$exento1= round($exento1,2);

$sql2="select * from afip where nro_laboratorio like '$nro_laboratorio'";
$result2 = $db_bq->Execute($sql2);

$sit_iva=strtoupper($result2->fields["sit_iva"]);


if ($sit_iva == 1){
$iva_ri = $iva_bioq;
}
elseif (($sit_iva == 3) or ($sit_iva == 4)){
$iva_mon = $iva_bioq;
}


$sql2="select sum(suma_coseguro) as suma_coseguro from ordenes where nro_fac = $nro_factura and nro_os = $nro_os and nro_laboratorio = $nro_laboratorio";
$result2 = $db->Execute($sql2);

$suma_coseguro=$result2->fields["suma_coseguro"];



$sql = "INSERT INTO `composicion` ( `nro_laboratorio` , `matricula` , `nro_factura` , `nro_os` , `fecha_factura` ,  `cantidad_ordenes` , `importe` , `pagados` , `saldo` , `observaciones` , `fecha_pago_fact` , `periodo` , `anio` , `coseguro` , `tipo_fact` , `iva` , `neto_gravado` , `exento` , `tipo_iva` , `iva_ri` , `iva_mon`) VALUES ('$nro_laboratorio' , '$matricula' , '$nro_factura' , '$nro_os' , '$hoy1' , '$contador_ordenes' , '$importe1' , 0 , $importe1,  '$observaciones' , '00/00/0000' ,  '$mes_actual' , '$anio' , '$suma_coseguro' , '$tipo_fact' , '$iva_bioq' , '$neto_gravado1' , '$exento1' , '$sit_iva' , '$iva_ri' , '$iva_mon')";
$result3 = $db->Execute($sql);



$sql5 = "INSERT INTO `resumen_cta_vta_os` ( `cuenta` , `tipo_cuenta` , `fecha` , `tipo_fact` , `comprobante` , `cod_movimiento` , `importe` , `vencimiento` , `referencia` , `afectacion` )  VALUES ('$nro_os' , '3' , '$hoy1' , '$tipo_fact' , '$nro_factura' , '1' , '$importe1' , '' , '' , '' )";
//$result5 = $db_liq->Execute($sql5);



$sql4 = "INSERT INTO `resumen_cta_vta_lab` ( `cuenta` , `tipo_cuenta` , `fecha` , `tipo_fact` , `comprobante` , `cod_movimiento` , `importe` , `vencimiento` , `referencia` , `afectacion` )  VALUES ('$nro_laboratorio' , '$tipo_cuenta' , '$hoy1' , '$tipo_fact' , '$nro_factura' , '1' , '$importe1' , '' , '$sigla' , '' )";
$result4 = $db->Execute($sql4);

?>
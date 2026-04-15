<?php 

include ("../../conexiones/config.inc.php"); //guardar factura en base de datos ordens_facturacion tabla factura.

$dia1 = substr($hoy,0,2);
$mes1= substr($hoy,3,2);
$anio1 = substr($hoy,6,2);

$hoy1= "20".$anio_actua."-".$mes_actua."-".$dia_actua;




 $sql = "INSERT INTO `factura` ( `nro_factura` , `tipo_fact` , `fecha` , `periodo` ,  `anio`, `nro_os` , `cant_ordenes` , `cant_bioquimicos` , `iva` , `total` , `estado` ,  `lote` , `marca` , `leyenda`, `fecha_pago_fact` , `pagados` , `saldo` , `tipo_operacion` , `fecha_liquidacion` , `nro_liquidacion` , `mes_liquidacion` , `anio_liquidacion` , `subtotal` , `neto_gravado` , `exento`  ) VALUES ('$nro_factura' , '$tipo_fact' , '$hoy1' , '$mes_actua' , '$anio_actua' , '$nro_os' , '$ordenes_facturadas' , '$cantidad_laboratorios' , '$iva_total' , '$total_ac' , 'PENDIENTE' , '$lote' , '$marca', '$leyenda' , '00/00/00' , 0, '$total_ac' , '0' , '' , '' , '' , '' , '$subtotal', '$neto_gravado', '$exento')";
$result = $db->Execute($sql);

 $sql5 = "INSERT INTO `resumen_cta_vta_os` ( `cuenta` , `tipo_cuenta` , `fecha` , `tipo_fact` , `comprobante` , `cod_movimiento` , `importe` , `vencimiento` , `referencia` , `afectacion` )  VALUES ('$nro_os' , '3' , '$hoy1' , '$tipo_fact' , '$nro_factura' , '1' , '$total_ac' , '' , '' , ''   )";
//$result5 = $db->Execute($sql5);


$sql = "UPDATE `periodos_cerrados` SET `facturado` = 'SI' WHERE periodo = '$mes_actual' and anio = $anio and nro_os = '$nro_os' and lote = '$lote'";
mysql_query($sql);




?>


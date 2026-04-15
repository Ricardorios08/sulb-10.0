<?php 
include ("../../../conexiones/config_os_bk.php");
$nro_os = $nro_os.$periodo.$anio;
$sql = "INSERT INTO datos_os ( `nro_os` , `denominacion` , `sigla` , `domicilio_n` , `cod_area_n` , `telefono_n` , `telefax_n` , `localidad_n` , `cod_postal_n` , `email_n` , `domicilio_l` , `cod_area_l` , `telefono_l` , `telefax_l` , `localidad_l` , `cod_postal_l` , `email_l` , `inscripcion` , `cuit` , `nro_prestador` , `contacto` , `nivel` , `cargo` , `domi_facturacion`) VALUES ( '$nro_os' , '$denominacion' , '$sigla' , '$domicilio_n' , '$cod_area_n' ,'$telefono_n' , '$telefax_n' ,  '$localidad_n' , '$cod_postal_n' , '$email_n' , '$domicilio_l' , '$cod_area_l' , '$telefono_1' , '$telefax_l' ,  '$localidad_l' , '$cod_postal_l' , '$email_l' , '$inscripcion' , '$cuit' , '$nro_prestador' , '$nom_contacto' , '$nivel' , '$cargo' , '$facturar')";
mysql_query($sql);

$sql = "INSERT INTO `convenios` ( `nro_os` , `inicio` , `fin` , `tipo` )  VALUES ( '$nro_os' , '$inicio' , '$fin' , '$tipo')";
mysql_query($sql);

$sql = "INSERT INTO `forma_pago` ( `nro_os` , `vencimiento` , `antiguedad` , `interes` , `plan` ) VALUES ('$nro_os' , '$vencimiento' , '$antiguedad' , '$interes' , '$plan')";
mysql_query($sql);

$sql = "INSERT INTO `capitacion` ( `nro_os` , `prorrateo` , `cuota` , `porcentaje` , `porcentaje_cuota` ) VALUES ('$nro_os' , '$prorrateo' , '$cuota' , '$porcentaje' , '$porcentaje_cuota' )";
mysql_query($sql);

$sql = "INSERT INTO `arancel` ( `nro_os` , `modalidad` , `ug` , `uh` , `nomenclador`  )VALUES ( '$nro_os' , '$modalidad' , '$ug' , '$uh' , '$nomenclador')";
mysql_query($sql);

$sql = "INSERT INTO `incremento` ( `nro_os` , `material_descartable` , `acto_bioquimico` , `toma_muestra` ) VALUES (  '$nro_os' , '$material_descartable' , '$acto_bioquimico' , '$toma_muestra' )";
mysql_query($sql);

$sql = "INSERT INTO `op_practicas` ( `nro_os` , `efector` , `prescriptor` , `afiliado`  ) VALUES ( '$nro_os' , '$efector' , '$prescriptor' , '$afiliados' )";
mysql_query($sql);

$sql = "INSERT INTO `op_facturacion` ( `nro_os` , `detalle` , `post_factura` , `separacion` , `coseguro` , `valor_porcentaje` , `coseguro_esp` , `valor_porc_esp` , `coseguro_comp` , `valor_porc_comp` , `gastos` , `honorarios` , `operacion` , `iva` ) VALUES ( '$nro_os' , '$detalle' , '$post_factura' , '$separacion' , '$coseguro' , '$valor_porcentaje' , '$coseguro_esp' , '$valor_porc_esp' , '$coseguro_comp' , '$valor_porc_comp' , '$gastos' , '$honorarios' , '$operacion' , '$iva'  )"; 
mysql_query($sql);

 $sql = "INSERT INTO `fecha_aranceles` (`nro_os` , `nro_os_vi` , `fecha` , `periodo` , `anio` , `nombre_arancel` , `detalle`) VALUES ( '$nro_os' , '$a', '$hoy' , '$periodo' , '$anio' , '$nombre_arancel' , '$observaciones' )";
mysql_query($sql);


?>
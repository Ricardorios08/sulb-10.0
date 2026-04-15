<?php

//// actualizar obras sociales  ///

include("../../../conexiones/config.inc.php");

$sql2="delete from `datos_os` where nro_os > 999 and nro_os < 9999 order by nro_os";
$result2 = $db->Execute($sql2);


$sql2="select * from `datos_os_abm` where nro_os > 999 and nro_os < 9999 order by nro_os";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {


$nro_os=strtoupper($result2->fields["nro_os"]);
$denominacion=strtoupper($result2->fields["denominacion"]);
$sigla=strtoupper($result2->fields["sigla"]);
$inscripcion=strtoupper($result2->fields["inscripcion"]);
$cuit=strtoupper($result2->fields["cuit"]);
$domicilio_l=strtoupper($result2->fields["domicilio_l"]);
$cod_area_l=strtoupper($result2->fields["cod_area_l"]);
$telefono_l=strtoupper($result2->fields["telefono_l"]);
$telefax_l=strtoupper($result2->fields["telefax_l"]);
$email_l=strtoupper($result2->fields["email_l"]);
$domicilio_n=strtoupper($result2->fields["domicilio_n"]);
$cod_area_n=strtoupper($result2->fields["cod_area_n"]);
$telefono_n=strtoupper($result2->fields["telefono_n"]);
$telefax_n=strtoupper($result2->fields["telefax_n"]);
$email_n=strtoupper($result2->fields["email_n"]);
$nro_prestador=strtoupper($result2->fields["nro_prestador"]);
$contacto=strtoupper($result2->fields["contacto"]);
$nivel=strtoupper($result2->fields["nivel"]);
$cargo=strtoupper($result2->fields["cargo"]);

$activa=strtoupper($result2->fields["activa"]);
$ws=strtoupper($result2->fields["ws"]);



 $sql3="select * from datos_os where nro_os = $nro_os";
$result3 = $db->Execute($sql3);

$nro_os1=strtoupper($result3->fields["nro_os"]);


$sql3="select * from arancel_migrado where nro_os = $nro_os";
$result3 = $db->Execute($sql3);

$uh_abm=strtoupper($result3->fields["uh"]);
$uh_especiales_abm=strtoupper($result3->fields["uh_especiales"]);
$uh_alta_abm=strtoupper($result3->fields["uh_alta"]);



$sql3="select * from arancel where nro_os = $nro_os";
$result3 = $db->Execute($sql3);

$nro_o=strtoupper($result3->fields["nro_os"]);
if ($nro_o == ""){
$sql = "INSERT INTO `arancel` ( `nro_os` , `modalidad` , `ug` , `uh` , `modalidad_especiales` , `ug_especiales` , `uh_especiales` , `modalidad_alta` , `ug_alta` , `uh_alta` , `nomenclador` )VALUES ( '$nro_os' , '$modalidad' , '$ug' , '$uh' , '$modalidad_especial' , '$ug_especiales' , '$uh_especial' , '$modalidad_alta' , '$ug_alta' , '$uh_alta' , '$nomenclador')";
 $result = $db->Execute($sql);
}


$sql3="select * from arancel_migrado where nro_os = $nro_os";
$result3 = $db->Execute($sql3);

$uh_abm=strtoupper($result3->fields["uh"]);
$uh_especiales_abm=strtoupper($result3->fields["uh_especiales"]);
$uh_alta_abm=strtoupper($result3->fields["uh_alta"]);


$denominacion = substr($denominacion,0,40);

IF ($nro_os1 == ""){


 $sql = "INSERT INTO datos_os ( `nro_os` , `domicilio_n` , `localidad_n` , `cod_area_n` , `telefono_n` , `telefax_n` , `denominacion` , `sigla` , `cod_postal_n` , `email_n` , `cuit` , `nro_prestador` , `contacto` , `nivel` , `cargo` , `domi_facturacion` , `domicilio_l` , `cod_area_l` , `telefono_l` , `telefax_l` , `localidad_l` , `cod_postal_l` , `email_l` , `inscripcion` , `activa` , `ws` ) VALUES ( '$nro_os' , '$domicilio_n' , '$localidad_n' , '$cod_area_n' , '$telefono_n' ,'$telefax_n' , '$denominacion' ,  '$sigla' , '$cod_postal_n' , '$email_n' , '$cuit' , '$nro_prestador' , '$nom_contacto' , '$nivel' ,  '$cargo' , '$facturar' , '$domicilio_l' , '$cod_area_l' , '$telefono_1' , '$telefax_l' , '$localidad_l' , '$cod_postal_l' , '$email_l' , '$inscripcion' , '$activa' , '$ws')";
$result = $db->Execute($sql);

}else{


  $sql = "UPDATE `datos_os` SET `denominacion` = '$denominacion' , `sigla` = '$sigla', `domicilio_n` = '$domicilio_n' ,`cod_area_n` = '$cod_area_n' , `telefono_n` = '$telefono_n', `telefax_n` = '$telefax_n' ,`email_n` = '$email_n', `domicilio_l` = '$domicilio_l' , `cod_area_l` = '$cod_area_l', `telefono_l` = '$telefono_l', `telefax_l` = '$telefax_l', `email_l` = '$email_l', `inscripcion` = '$inscripcion', `cuit` = '$cuit', `nro_prestador` = '$nro_prestador' , `contacto` = '$contacto', `nivel` = '$nivel', `cargo` = '$cargo' , `webservice` = '$webservice' WHERE `nro_os` = '$nro_os'" ;
$result = $db->Execute($sql);

}




$result2->MoveNext();
}


ECHO "actualizado";
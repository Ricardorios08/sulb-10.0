<?php

include("../conexiones/config.inc.php");

$actual = 4716;
$nueva = 5291;

echo $sql2="UPDATE `ordenes` SET `nro_os` = '$nueva' WHERE `nro_os` = '$actual'";
$result2 = $db->Execute($sql2);

echo $sql2="UPDATE `pacientes` SET `nro_os` = '$nueva' WHERE `nro_os` = '$actual'";
$result2 = $db->Execute($sql2);


echo $sql2="select * from `ordenes` where nro_os = $nueva";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {

	 $nro_os=strtoupper($result2->fields["nro_os"]);
$cod_grabacion=strtoupper($result2->fields["cod_grabacion"]);


echo $a = "UPDATE detalle SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_aglutininas SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_antibiograma SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_antigeno SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_bacteriologico SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_bilirrubina SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_calcio SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_clearence SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_coagulograma SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_coombs SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_coprocultivo SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_espermograma SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_exudado SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_fecal SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_fosforo SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_hemo SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_hemoglobina SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_hepatograma SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_iono SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_iono_urinario SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_lipidograma SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_magnesio SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_orina SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_parasitologico SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_pmn SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_proteinas_fraccionadas SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_proteino SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_proteinura SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_uretral SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_uricosuria SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_urocultivo SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_vaginal SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);
echo $a = "UPDATE detalle_widal SET `nro_os` = '$nueva' WHERE cod_grabacion = $cod_grabacion";
 $result20 = $db->Execute($a);



	$result2->MoveNext();
}

<?php

//// actualizar aranceles  ///

include("../../../conexiones/config.inc.php");




$sql2="select * from arancel where nro_os > 999 and nro_os < 9999 order by nro_os";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo 1".$db->ErrorMsg());
 while (!$result2->EOF) {


$nro_os=strtoupper($result2->fields["nro_os"]);
$modalidad=strtoupper($result2->fields["modalidad"]);
$ug=strtoupper($result2->fields["ug"]);
$uh=strtoupper($result2->fields["uh"]);
$modalidad_especiales=strtoupper($result2->fields["modalidad_especiales"]);
$ug_especiales=strtoupper($result2->fields["ug_especiales"]);
$uh_especiales=strtoupper($result2->fields["uh_especiales"]);
$modalidad_alta=strtoupper($result2->fields["modalidad_alta"]);
$ug_alta=strtoupper($result2->fields["ug_alta"]);
$uh_alta=strtoupper($result2->fields["uh_alta"]);
$nomenclador=strtoupper($result2->fields["nomenclador"]);


$sql3="select * from arancel_migrado where nro_os = $nro_os";
$result3 = $db->Execute($sql3);

$uh_abm=strtoupper($result3->fields["uh"]);
$uh_especiales_abm=strtoupper($result3->fields["uh_especiales"]);
$uh_alta_abm=strtoupper($result3->fields["uh_alta"]);


$sql3="select * from datos_os where nro_os = $nro_os";
$result3 = $db->Execute($sql3);

$sigla=strtoupper($result3->fields["sigla"]);
$nro_os2=strtoupper($result3->fields["nro_os"]);


if ($nro_os2 != ""){


 $sql = "UPDATE `arancel` SET `uh` = '$uh_abm', `uh_especiales` = '$uh_especiales_abm', `uh_alta` = '$uh_alta_abm' WHERE `nro_os` = $nro_os";
$result = $db->Execute($sql);


 
}


$result2->MoveNext();
}

ECHO "actualizado";
?>

 
<?php

include ("../conexiones/config.inc.php");

$cod_operacion = $_REQUEST['cod_operacion'];
$cod_grabacion = $_REQUEST['cod_grabacion'];

 $SQL="Delete From detalle";
$db->Execute($SQL);

 $SQL="Delete From detalle_referencia";
$db->Execute($SQL);


$SQL="Delete From detalle_fecal";
$db->Execute($SQL);
$SQL="Delete From detalle_hemo";
$db->Execute($SQL);
$SQL="Delete From detalle_hemoglobina ";
$db->Execute($SQL);
$SQL="Delete From detalle_orina ";
$db->Execute($SQL);




$SQL="Delete From detalle_proteinograma";
$db->Execute($SQL);
$SQL="Delete From detalle_curva ";
$db->Execute($SQL);
$SQL="Delete From detalle_bilirrubina ";
$db->Execute($SQL);
$SQL="Delete From detalle_aglutininas ";
$db->Execute($SQL);
$SQL="Delete From detalle_iono ";
$db->Execute($SQL);
$SQL="Delete From detalle_clearence ";
$db->Execute($SQL);
$SQL="Delete From detalle_hepatograma ";
$db->Execute($SQL);
$SQL="Delete From detalle_antigeno ";
$db->Execute($SQL);
$SQL="Delete From detalle_orina ";
$db->Execute($SQL);
$SQL="Delete From detalle_magnesio ";
$db->Execute($SQL);
$SQL="Delete From detalle_proteinura ";
$db->Execute($SQL);
$SQL="Delete From detalle_antibiograma ";
$db->Execute($SQL);
$SQL="Delete From detalle_bacteriologico ";
$db->Execute($SQL);
$SQL="Delete From detalle_urinario ";
$db->Execute($SQL);
$SQL="Delete From detalle_coagulograma ";
$db->Execute($SQL);
$SQL="Delete From detalle_lipidograma ";
$db->Execute($SQL);



$SQL="Delete From detalle_fosforo ";
$db->Execute($SQL);
$SQL="Delete From detalle_iono_urinario ";
$db->Execute($SQL);
$SQL="Delete From detalle_proteino ";
$db->Execute($SQL);

$SQL="Delete From detalle_urocultivo ";
$db->Execute($SQL);

$SQL="Delete From detalle_widal";
$db->Execute($SQL);

$SQL="Delete From detalle_coprocultivo";
$db->Execute($SQL);

$SQL="Delete From detalle_exudado";
$db->Execute($SQL);



$SQL="Delete From pacientes ";
$db->Execute($SQL);

$SQL="Delete From ordenes empleados";
$db->Execute($SQL);

$SQL="Delete From empleados ";
$db->Execute($SQL);

$SQL="Delete From ordenes";
$db->Execute($SQL);

$sql = "ALTER TABLE `ordenes` auto_increment = 1\n ROW_FORMAT = DYNAMIC";
$db->Execute($SQL);

$leyenda = "SE ELIMINO TODO";
include ("../alertas/campo_informacion.php");
 

 /*

TRUNCATE `antibioticos`;
TRUNCATE `detalle`;
TRUNCATE `detalle_aglutininas`;
TRUNCATE `detalle_antibiograma`;
TRUNCATE `detalle_antigeno`;
TRUNCATE `detalle_bacteriologico`;
TRUNCATE `detalle_bilirrubina`;
TRUNCATE `detalle_calcio`;
TRUNCATE `detalle_clearence`;
TRUNCATE `detalle_coagulograma`;
TRUNCATE `detalle_coombs`;
TRUNCATE `detalle_curva`;
TRUNCATE `detalle_espermo`;
TRUNCATE `detalle_fecal`;
TRUNCATE `detalle_fosforo`;
TRUNCATE `detalle_hemo`;
TRUNCATE `detalle_hemoglobina`;
TRUNCATE `detalle_hepatograma`;
TRUNCATE `detalle_iono`;
TRUNCATE `detalle_iono_urinario`;
TRUNCATE `detalle_lipidograma`;
TRUNCATE `detalle_magnesio`;
TRUNCATE `detalle_modulo`;
TRUNCATE `detalle_orina`;
TRUNCATE `detalle_parasitologico`;
TRUNCATE `detalle_pmn`;
TRUNCATE `detalle_proteinas_fraccionadas`;
TRUNCATE `detalle_proteino`;
TRUNCATE `detalle_proteinura`;
TRUNCATE `detalle_referencia`;
TRUNCATE `detalle_temp`;
TRUNCATE `detalle_temp_nuevo`;
TRUNCATE `detalle_urocultivo`;
TRUNCATE `detalle_urocultivo_torrecilla`;
TRUNCATE `detalle_widal`;
TRUNCATE `ordenes`;
TRUNCATE `pacientes`;


 */
?>


3485726
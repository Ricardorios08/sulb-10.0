<?php

include ("../../conexiones/config.inc.php");

$cod_operacion = $_REQUEST['cod_operacion'];
$cod_grabacion = $_REQUEST['cod_grabacion'];

$sql4="select * from detalle where cod_operacion = $cod_operacion";
$result4 = $db->Execute($sql4);

$nro_practica=strtoupper($result4->fields["nro_practica"]);


 $SQL="Delete From detalle where cod_operacion = $cod_operacion";
$db->Execute($SQL);

 $SQL="Delete From detalle_referencia where cod_operacion = $cod_operacion";
$db->Execute($SQL);





if ($nro_practica == 711){$SQL="Delete From detalle_orina where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 736){ $SQL="Delete From detalle_fecal where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 475){	$SQL="Delete From detalle_hemo where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 764){	$SQL="Delete From detalle_proteinograma where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 413){	$SQL="Delete From detalle_curva where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 110){	$SQL="Delete From detalle_bilirrubina where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 13){	$SQL="Delete From detalle_aglutininas where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 546){	$SQL="Delete From detalle_iono where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 193){$SQL="Delete From detalle_clearence where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 481){	$SQL="Delete From detalle_hepatograma where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 2734){$SQL="Delete From detalle_antigeno where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 136){	$SQL="Delete From detalle_calcio where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 363){	$SQL="Delete From detalle_orina where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 654){	$SQL="Delete From detalle_magnesio where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 767){	$SQL="Delete From detalle_proteinura where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 35){	$SQL="Delete From detalle_antibiograma where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 105){	$SQL="Delete From detalle_bacteriologico where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 547){	$SQL="Delete From detalle_urinario where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 171){	$SQL="Delete From detalle_coagulograma where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 615){	$SQL="Delete From detalle_lipidograma where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 911){$SQL="Delete From detalle_urocultivo where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 953){$SQL="Delete From detalle_widal where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);

}elseif ($nro_practica == 186){	$SQL="Delete From detalle_coombs where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 4858){	$SQL="Delete From detalle_espermo where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}elseif ($nro_practica == 430){	$SQL="Delete From detalle_graham430 where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
}





/*
$SQL="Delete From detalle_hemoglobina where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);


$SQL="Delete From detalle_fosforo where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_iono_urinario where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_proteino where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);

*/

$banderin = 2;
$palabra = $nro_paciente;
include ("emision_mod_validar.php");
?>



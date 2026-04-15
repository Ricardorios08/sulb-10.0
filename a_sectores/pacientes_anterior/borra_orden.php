<?php
$tipo_operador = $_REQUEST['tipo_operador'];


include ("../../conexiones/config.inc.php");

$cod_grabacion = $_REQUEST['cod_grabacion'];
$nro_paciente = $_REQUEST['nro_paciente'];
$usuario = $_REQUEST['usuario'];

$sql1="select * from ordenes where cod_grabacion = '$cod_grabacion'";
$result1 = $db->Execute($sql1);
$autorizacion_ws=strtoupper($result1->fields["autorizacion_ws"]);
$autorizacion=strtoupper($result1->fields["autorizacion"]);

if (($autorizacion > 0) or ($autorizacion_ws > 0)){
$leyenda = "NO PUEDE ELIMINAR LA ORDEN PORQUE ESTA AUTORIZADA, ANULE LA AUTORIZACION SI DESEA BORRARLA";
include ("../../alertas/campo_informacion2.php");
exit;
}



$SQL="Delete From ordenes where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_fecal where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_hemo where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_hemoglobina where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_orina where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_referencia where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);



$SQL="Delete From detalle_proteinograma where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_curva where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_bilirrubina where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_aglutininas where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_iono where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_clearence where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_hepatograma where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_antigeno where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_orina where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_magnesio where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_proteinura where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_antibiograma where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_bacteriologico where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_urinario where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_coagulograma where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_lipidograma where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);



$SQL="Delete From detalle_fosforo where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_iono_urinario where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);
$SQL="Delete From detalle_proteino where cod_grabacion = $cod_grabacion";
$db->Execute($SQL);







//$leyenda = "SE ELIMINO LA ORDEN Y SUS RESULTADOS";
//include ("../../alertas/campo_informacion.php");

$bande = 2;
$palabra = $nro_paciente;

if ($tipo_operador == "val"){
include ("buscar_paciente_individual_validar.php");

}else{
include ("buscar_paciente_individual.php");
}


?>



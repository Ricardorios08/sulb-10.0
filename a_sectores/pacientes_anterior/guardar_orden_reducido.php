<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../../menus.css" rel="stylesheet" type="text/css" />
<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />


<script language="javascript">
function on_load()
{
document.getElementById("nro_laboratorio").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
							
				case "lote":
				document.getElementById("periodo").focus();
				break;
				
				case "periodo":
				document.getElementById("anio").focus();
				break;
				
				case "anio":
				document.getElementById("nro_os").focus();
				break;

				case "nro_os":
				document.getElementById("nro_laboratorio").focus();
				break;

				case "nro_laboratorio":
				document.getElementById("OK").focus();
				break;
					
								
		}
		return false;
	}
	return true;
}


</script>



<style type="text/css">
<!--
.Estilo1 {color: #000000}
.Estilo26 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
}
.Estilo27 {font-family: Arial, Helvetica, sans-serif}
.Estilo28 {
	color: #FF0000;
	font-family: Arial, Helvetica, sans-serif;
	font-style: italic;
	font-size: 12px;
}
.Estilo29 {font-size: 12px}
.Estilo30 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo31 {
	font-size: 12px;
	color: #FF0000;
	font-style: italic;
}
.Estilo32 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>

<?php 



$cod_grabacion=$_REQUEST['cod_grabacion'];
$periodo=$_REQUEST['periodo'];
$anio= $_REQUEST['anio'];
$operador=$_REQUEST['operador'];
$usuario = $operador; 
$tipo_operador = $_REQUEST['tipo_operador'];

$matricula = 792;

include ("../../conexiones/config.inc.php");
$sql="select * from grabadas_temp";
$result = $db->Execute($sql);

$periodo1=strtoupper($result->fields["periodo"]);
$ano=strtoupper($result->fields["ano"]);
$nro_os=strtoupper($result->fields["nro_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$nro_laboratorio=strtoupper($result->fields["nro_laboratorio"]);
$nombre_laboratorio=$result->fields["nombre_laboratorio"];
$nro_afiliado=strtoupper($result->fields["nro_afiliado"]);
$nombre_afiliado=strtoupper($result->fields["nombre_afiliado"]);
$nro_orden=strtoupper($result->fields["nro_orden"]);
$fecha=strtoupper($result->fields["fecha"]);
$fecha_realizacion=strtoupper($result->fields["fecha_realizacion"]);
$medico=$result->fields["medico"];
$nombre_medico=$result->fields["nombre_medico"];
$coseguro=strtoupper($result->fields["coseguro"]);
$autorizacion=strtoupper($result->fields["autorizacion"]);
$confirmada=strtoupper($result->fields["confirmada"]);
$marca=strtoupper($result->fields["marca"]);
$lote=strtoupper($result->fields["lote"]);
$modulo=strtoupper($result->fields["modulo"]);
$diagnostico=strtoupper($result->fields["diagnostico"]);
$motivo=strtoupper($result->fields["motivo"]);
$observaciones=strtoupper($result->fields["observaciones"]);


$operador=strtoupper($result->fields["operador"]);
$nombre_operador=strtoupper($result->fields["nombre_operador"]);

if (strlen($periodo1) == 1){
$periodo1 = "0".$periodo1;
}


$sql10="select * from detalle_temp";
$result10 = $db->Execute($sql10);
$cod_grabacion3=strtoupper($result10->fields["cod_grabacion"]);

if ($cod_grabacion3 == ""){
$leyenda = "NO INGRESO PRACTICAS A ESA ORDEN";
include ("../../alertas/campo_informacion2.php");
exit;
}

$fecha_grabacion = date("Y-m-d");

include ("../../conexiones/config.inc.php");
 $sql = "INSERT INTO `ordenes` ( `cod_grabacion` , `periodo` , `ano` , `nro_os` , `nro_paciente` ,`matricula` , `nro_afiliado` ,`nro_orden` , `fecha` ,`medico` , `coseguro` , `autorizacion` , `fecha_fac` , `nro_fac` , `confirmada` , `marca` , `lote` , `operador` , `suma_coseguro` , `tipo_fact` , `cod_diag` , `cod_grabacion1` , `fecha_grabacion`, `iva` , `neto_gravado` , `exento` , `total_orden` , `fecha_realizacion` , `diagnostico` , `motivo` , `observaciones` , `modulo` , `nombre_medico`) VALUES ( '' , '$periodo1' , '$ano' , '$nro_os' , '$nro_laboratorio' , '$matricula' , '$nro_afiliado' , '$nro_orden' , '$fecha' , '$medico' ,'$coseguro' , '$autorizacion' , '' , '' , '$confirmada' , '$marca' , '$lote' , '$operador' , '' , '' , '' , '' , '$fecha_grabacion' , '' , '' , '' , '' , '$fecha_realizacion' , '$diagnostico' , '$motivo' , '$observaciones' , '$modulo', '$nombre_medico')";
mysql_query($sql);

$idgenerado = mysql_insert_id();

/*
require_once("../../nusoap/lib/nusoap.php");
$wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl'); 
 $sql = "INSERT INTO `ordenes` ( `cod_grabacion` , `periodo` , `ano` , `nro_os` , `nro_paciente` ,`matricula` , `nro_afiliado` ,`nro_orden` , `fecha` ,`medico` , `coseguro` , `autorizacion` , `fecha_fac` , `nro_fac` , `confirmada` , `marca` , `lote` , `operador` , `suma_coseguro` , `tipo_fact` , `cod_diag` , `cod_grabacion1` , `fecha_grabacion`, `iva` , `neto_gravado` , `exento` , `total_orden` , `fecha_realizacion` , `diagnostico` , `motivo` , `observaciones` , `modulo` , `nombre_medico`) VALUES ( '$idgenerado' , '$periodo1' , '$ano' , '$nro_os' , '$nro_laboratorio' , '$matricula' , '$nro_afiliado' , '$nro_orden' , '$fecha' , '$medico' ,'$coseguro' , '$autorizacion' , '' , '' , '$confirmada' , '$marca' , '$lote' , '$operador' , '' , '' , '' , '' , '$fecha_grabacion' , '' , '' , '' , '' , '$fecha_realizacion' , '$diagnostico' , '$motivo' , '$observaciones' , '$modulo', '$nombre_medico')";
$param1=array('sql'=>$sql); 
$response= $client->call('pacientes', $param1);
*/



/*
$sql = "INSERT INTO `a_ordenes_encabezado` (`nro_autorizacion`) VALUES (NULL)";

require_once("../../nusoap/lib/nusoap.php");
$wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_ordenes.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$sql); 
$response= $client->call('pacientes', $param1);


 
echo $nro_autorizacion = $response;

*/




$sql10="select * from detalle_temp";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo 1".$db->ErrorMsg());
 while (!$result10->EOF) {

$cod_grabacion2=strtoupper($result10->fields["cod_grabacion"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
 $nro_practica=strtoupper($result10->fields["nro_practica"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);

$sql8="select prioridad,clase, deriva from convenio_practica where cod_practica = '$nro_practica' ";
$result8 = $db->Execute($sql8);
$prioridad=strtoupper($result8->fields["prioridad"]);
$clase=strtoupper($result8->fields["clase"]);
$deriva=strtoupper($result8->fields["deriva"]);
 
$orden = $orden + 1;

  $sql ="INSERT INTO `detalle` ( `cod_grabacion` , `nro_os` , `nro_paciente` , `nro_orden` , `nro_practica` , `valor` , `periodo` , `ano` , `nro_factura` , `confirmada` , `cod_operacion` , `marca` , `lote`, `operador` , `categoria` , `coseguro` , `tipo_fact` , `prioridad` , `imprimir` , `deriva` , `cod_mega` ,	`nro_lab`, `fecha` , `clase` , `enter` , `nro_ref` , `orden` , `facturar`) VALUES ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '$valor' ,'$periodo1' , '$ano' , '$nro_factura' , '$confirmada' , '' , '$marca' , '$lote' , '$operador' , '' , '' , '' , '$prioridad' , '1' , 	'$deriva' , '' , '' , '$fecha' , '$clase' , '' , '' , '$orden' , '0' )";
mysql_query($sql);

$cod_operacion = mysql_insert_id();


///////////////////   NUSOAP  ///////////
/*$nro_laboratorio1 = 1098;
$hoy = date("Y-m-d");

$sql = "INSERT INTO `a_ordenes` (`codbioq`, `nroautored`, `nroafi`, `codpres`, `cantidad`, `matpresc`, `fecpresc`, `fecrea`, `fecauto`, `codseg`, `cod_diag`) VALUES ('$nro_laboratorio1', '$nro_autorizacion', '$nro_afiliado', '$nro_practica', '1', '$medico', '$fecha', '$fecha_realizacion', '$hoy', '$codseg', '')";

$wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_ordenes.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$sql); 
$response= $client->call('pacientes', $param1);

 $sql = "UPDATE `ordenes` SET `autorizacion` = '$nro_autorizacion' WHERE `cod_grabacion` = $idgenerado";
mysql_query($sql);

////////////////////////////////////
*/

if ($nro_practica == 711){
$sql = "INSERT INTO detalle_orina (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `densidad`, `color`, `aspecto`, `sedimento`, `reaccion`, `proteinas`, `glucosa`, `biliares`, `cetonicos`, `hemoglobina`, `epiteliales`, `leucocito`, `piocitos`, `hematies`, `cilindros`, `mucus`, `uratos`, `observaciones`) VALUES ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";
mysql_query($sql);
}elseif ($nro_practica == 736){
 $sql = "INSERT INTO detalle_fecal (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `macroscopico`, `metodo_macro`, `microscopico`, `metodo_micro`, `observaciones`) VALUES ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '', '', '')";
mysql_query($sql);
}elseif ($nro_practica == 475){
$sql = "INSERT INTO detalle_hemo (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `hematies`, `hemoglobina`, `hematocrito`, `reticulocitos`, `plaquetas`, `mcv`, `mch`, `mchc`, `leucocitos`, `neutro_cayado`, `neutro_segmentado`, `eosinofilos`, `basofilos`, `linfocitos`, `monocitos`, `carac_plaquetas`, `carac_leucocitos`, `carac_hematies`, `observaciones`) VALUES ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";
mysql_query($sql);
}elseif ($nro_practica == 764){
 $sql = "INSERT INTO detalle_proteino (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `albumina`, `alfa1`, `alfa2`, `beta`, `gamma`, `relacion_ag`, `proteinas_totales`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '', '', '', '', '', '')";
mysql_query($sql);
}elseif ($nro_practica == 413){
 $sql = "INSERT INTO detalle_curva (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `basal`, `a30`, `a60`, `a120`, `a180`, `basal_mg`, `a30mg`, `a60mg`, `a120mg`, `a180mg`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '', '', '', '', '', '' , '' , '' , '')";
mysql_query($sql);
}elseif ($nro_practica == 110){
 $sql = "INSERT INTO detalle_bilirrubina (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `total`, `directa`, `indirecta`, `observaciones`
) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '', '')";
mysql_query($sql);
}elseif ($nro_practica == 13){
 $sql = "INSERT INTO detalle_aglutininas (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `salino`, `albuminoso`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '')";
mysql_query($sql);
}elseif ($nro_practica == 546){
 $sql = "INSERT INTO detalle_iono (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `natremia`, `kalemia`, `cloremia`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' , '')";
mysql_query($sql);
}elseif ($nro_practica == 193){
 $sql = "INSERT INTO detalle_clearence (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `creatinemia`, `creatinuria`, `diuresis`, `sup_corporal`, `clearence`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' , '' , '' , '')";
mysql_query($sql);
}elseif ($nro_practica == 481){
 $sql = "INSERT INTO detalle_hepatograma (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `aspartato`, `alanina`, `fosfatasa`, `total`, `directa`, `indirecta`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' , '' , '', '' , '')";
mysql_query($sql);
}elseif ($nro_practica == 2734){
 $sql = "INSERT INTO detalle_antigeno (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `enzima`, `elisa`, `razon_porcentual`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' , '' )";
mysql_query($sql);
}elseif ($nro_practica == 136){
  $sql = "INSERT INTO detalle_calcio (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `diuresis`, `valor_hallado`,  `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' )";
mysql_query($sql);
}elseif ($nro_practica == 363){
 $sql = "INSERT INTO detalle_fosforo (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `diuresis`, `valor_hallado`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' )";
mysql_query($sql);
}elseif ($nro_practica == 654){
 $sql = "INSERT INTO detalle_magnesio (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `diuresis`, `valor_hallado`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' )";
mysql_query($sql);
}elseif ($nro_practica == 767){
 $sql = "INSERT INTO detalle_proteinura (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `diuresis`, `valor_hallado`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' )";
mysql_query($sql);
}elseif ($nro_practica == 35){
 $sql = "INSERT INTO detalle_antibiograma (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `s1`, `s2`, `s3`, `s4`, `s5`, `r1`, `r2`, `r3`, `r4`, `r5`, `observaciones`
) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' , '', '', '' , '', '', '' , '', '' )";
mysql_query($sql);
}elseif ($nro_practica == 105){
 $sql = "INSERT INTO detalle_bacteriologico (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `muestra`, `color`, `aspecto`, `obs_micro`, `nicolle`, `cultivo`, `observaciones` ) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' , '', '', '' , '' )";
mysql_query($sql);
}elseif ($nro_practica == 547){
 $sql = "INSERT INTO detalle_iono_urinario (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `resultado` ,`sodio`, `potasio`, `cloro`, `observaciones`
 ) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '' ,  '', '', '' , '' )";
mysql_query($sql);
}elseif ($nro_practica == 171){
 $sql = "INSERT INTO detalle_coagulograma ( `cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `min`, `seg`, `porcentaje`, `ttpk_seg`, `observaciones`
 ) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' , '', '' )";
mysql_query($sql);
}elseif ($nro_practica == 615){
 $sql = "INSERT INTO detalle_lipidograma ( `cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `suero`, `quilomicrones`, `beta`, `prebeta`, `alfa`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' , '', '', '' )";
mysql_query($sql);
}elseif ($nro_practica == 762){
 $sql = "INSERT INTO detalle_lipidogramaa ( `cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `protidemia`, `globulinas`, `albumina`, `relacion_ag`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' , '', '' )";
mysql_query($sql);
}else{
 $sql = "INSERT INTO detalle_referencia ( `cod_grabacion` , `nro_os` , `nro_paciente` , `nro_orden` ,`nro_practica` ,`valor` ,`referencia` ,`observaciones` ,`referencia1` , `referencia2` ,`referencia3` ,`cod_operacion` ) VALUES ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica'  , '', '', '' , '' , '' , '' , '$cod_operacion');";
mysql_query($sql);
 }


$result10->MoveNext();

	}


$sql="select * from convenio_practica where cod_practica = $nro_practica";
$result = $db->Execute($sql);

$clase=strtoupper($result->fields["clase"]);

if ($clase == 2){

  $sql = "INSERT INTO detalle_modulo ( `cod_grabacion` ,`modulo1`, `modulo2`, `modulo3`, `modulo4`, `modulo5`, `modulo6`, `modulo7`, `modulo8`, `modulo9`, `modulo10`, `modulo11`, `modulo12`, `modulo13`) VALUES ('$idgenerado', '$modulo1', '$modulo2', '$modulo3', '$modulo4', '$modulo5', '$modulo6', '$modulo7', '$modulo8', '$modulo9', '$modulo10', '$modulo11', '$modulo12', '$modulo13')";
mysql_query($sql);
}


$sql = "DELETE FROM grabadas_temp";
mysql_query($sql);

$sql = "DELETE FROM detalle_temp";
mysql_query($sql);



include ("../../conexiones/close.php");

 $nro_paciente = $nro_laboratorio;
$band = 1;
$bande = 2;
$palabra = $nro_paciente;
//$leyenda = "SE GUARDO LA RECETA CORRECTAMENTE";
//include ("../../../alertas/campo_informacion.php");
$usuario;

 $tipo_operador;

if ($tipo_operador == "val"){
	
include ("buscar_paciente_individual_validar.php");

}else{
		
include ("buscar_paciente_individual.php");
}

?>



</html>


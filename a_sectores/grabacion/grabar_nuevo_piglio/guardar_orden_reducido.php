<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

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


include ("../../../conexiones/config.inc.php");
$sql="select * from grabadas_temp";
$result = $db->Execute($sql);

$periodo1=strtoupper($result->fields["periodo"]);
$ano=strtoupper($result->fields["ano"]);
$nro_os=strtoupper($result->fields["nro_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$nro_laboratorio=strtoupper($result->fields["nro_laboratorio"]);
$nombre_laboratorio=strtoupper($result->fields["nombre_laboratorio"]);
$nro_afiliado=strtoupper($result->fields["nro_afiliado"]);
$nombre_afiliado=strtoupper($result->fields["nombre_afiliado"]);
$nro_orden=strtoupper($result->fields["nro_orden"]);
$fecha=strtoupper($result->fields["fecha"]);
$fecha_realizacion=strtoupper($result->fields["fecha_realizacion"]);
$medico=strtoupper($result->fields["medico"]);
$nombre_medico=strtoupper($result->fields["nombre_medico"]);
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





$fecha_grabacion = date("Y-m-d");

include ("../../../conexiones/config.inc.php");
  $sql = "INSERT INTO `ordenes` ( `cod_grabacion` , `periodo` , `ano` , `nro_os` , `nro_paciente` ,`matricula` , `nro_afiliado` ,`nro_orden` , `fecha` ,`medico` , `coseguro` , `autorizacion` , `fecha_fac` , `nro_fac` , `confirmada` , `marca` , `lote` , `operador` , `suma_coseguro` , `tipo_fact` , `cod_diag` , `cod_grabacion1` , `fecha_grabacion`, `iva` , `neto_gravado` , `exento` , `total_orden` , `fecha_realizacion` , `diagnostico` , `motivo` , `observaciones` , `modulo` , `nombre_medico`) VALUES ( '' , '$periodo1' , '$ano' , '$nro_os' , '$nro_laboratorio' , '$matricula' , '$nro_afiliado' , '$nro_orden' , '$fecha' , '$medico' ,'$coseguro' , '$autorizacion' , '' , '' , '$confirmada' , '$marca' , '$lote' , '$operador' , '' , '' , '' , '' , '$fecha_grabacion' , '' , '' , '' , '' , '$fecha_realizacion' , '$diagnostico' , '$motivo' , '$observaciones' , '$modulo' , '$nombre_medico')";
mysql_query($sql);

$idgenerado = mysql_insert_id();


$sql = "DELETE FROM grabadas_temp";
mysql_query($sql);


$sql10="select * from detalle_temp";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo 1".$db->ErrorMsg());
 while (!$result10->EOF) {

$cod_grabacion2=strtoupper($result10->fields["cod_grabacion"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
$nro_practica=strtoupper($result10->fields["nro_practica"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
$honorarios=strtoupper($result10->fields["honorarios"]);
 $categoria=strtoupper($result10->fields["categoria"]);



$sql8="select prioridad from convenio_practica where cod_practica = '$nro_practica' ";
$result8 = $db->Execute($sql8);
$prioridad=strtoupper($result8->fields["prioridad"]);



  $sql ="INSERT INTO `detalle` ( `cod_grabacion` , `nro_os` , `nro_paciente` , `nro_orden` , `nro_practica` , `valor` , `periodo` , `ano` , `nro_factura` , `confirmada` , `cod_operacion` , `marca` , `lote`, `operador` , `categoria` , `coseguro` , `tipo_fact` , `prioridad`) VALUES ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '$valor' ,'$periodo1' , '$ano' , '$nro_factura' , '$confirmada' , '' , '$marca' , '$lote' , '$operador' , '$categoria' , '' , '' , '$prioridad')";
mysql_query($sql);




if ($nro_practica == 711){
$sql = "INSERT INTO detalle_orina (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `densidad`, `color`, `aspecto`, `sedimento`, `reaccion`, `proteinas`, `glucosa`, `biliares`, `cetonicos`, `hemoglobina`, `epiteliales`, `leucocito`, `piocitos`, `hematies`, `cilindros`, `mucus`, `uratos`, `observaciones`) VALUES ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";
mysql_query($sql);

}elseif ($nro_practica == 736){
 $sql = "INSERT INTO detalle_fecal (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `macroscopico`, `metodo_macro`, `microscopico`, `metodo_micro`, `observaciones`) VALUES ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '', '', '')";
mysql_query($sql);
}elseif ($nro_practica == 475){

$sql = "INSERT INTO detalle_hemo (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `hematies`, `hemoglobina`, `hematocrito`, `reticulocitos`, `plaquetas`, `mcv`, `mch`, `mchc`, `leucocitos`, `neutro_cayado`, `neutro_segmentado`, `eosinofilos`, `basofilos`, `linfocitos`, `monocitos`, `carac_plaquetas`, `carac_leucocitos`, `carac_hematies`, `observaciones`) VALUES ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";
mysql_query($sql);
}elseif ($nro_practica == 471){
 $sql = "INSERT INTO detalle_hemoglobina (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `albumina`, `alfa_1`, `alfa_2`, `beta`, `gamma`, `relacion_ag`, `proteinas_totales`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '', '', '', '', '', '')";
mysql_query($sql);
}else{
$sql = "INSERT INTO detalle_referencia (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `valor`, `referencia`, `observaciones`) VALUES ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica'  , '', '', '');";
mysql_query($sql);
}




$result10->MoveNext();

	}

$sql = "DELETE FROM detalle_temp";
mysql_query($sql);



include ("../../../conexiones/close.php");

 $nro_paciente = $nro_laboratorio;
$band = 1;
$bande = 2;

//$leyenda = "SE GUARDO LA RECETA CORRECTAMENTE";
//include ("../../../alertas/campo_informacion.php");

include ("../../pacientes/buscar_paciente_individual.php");
?>



</html>


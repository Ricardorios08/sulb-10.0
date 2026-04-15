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

echo "POR ACA";

$cod_grabacion=$_REQUEST['cod_grabacion'];
$periodo=$_REQUEST['periodo'];
$anio= $_REQUEST['anio'];
$operador=$_REQUEST['operador'];


include ("../../../conexiones/config.inc.php");
$sql="select * from grabadas_temp where cod_grabacion = $operador ";
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
 $sql = "INSERT INTO `ordenes` ( `cod_grabacion` , `periodo` , `ano` , `nro_os` , `nro_paciente` ,`matricula` , `nro_afiliado` ,`nro_orden` , `fecha` ,`medico` , `coseguro` , `autorizacion` , `fecha_fac` , `nro_fac` , `confirmada` , `marca` , `lote` , `operador` , `suma_coseguro` , `tipo_fact` , `cod_diag` , `cod_grabacion1` , `fecha_grabacion`, `iva` , `neto_gravado` , `exento` , `total_orden` , `fecha_realizacion` , `diagnostico` , `motivo` , `observaciones`) VALUES ( '' , '$periodo1' , '$ano' , '$nro_os' , '$nro_laboratorio' , '$matricula' , '$nro_afiliado' , '$nro_orden' , '$fecha' , '$medico' ,'$coseguro' , '$autorizacion' , '' , '' , '$confirmada' , '$marca' , '$lote' , '$operador' , '' , '' , '' , '' , '$fecha_grabacion' , '' , '' , '' , '' , '$fecha_realizacion' , '$diagnostico' , '$motivo' , '$observaciones')";
mysql_query($sql);

$idgenerado = mysql_insert_id();


$sql = "DELETE FROM grabadas_temp where cod_grabacion = $operador";
mysql_query($sql);


$sql10="select * from detalle_temp where cod_grabacion = $operador";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo 1".$db->ErrorMsg());
 while (!$result10->EOF) {

$cod_grabacion2=strtoupper($result10->fields["cod_grabacion"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
$nro_practica=strtoupper($result10->fields["nro_practica"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);

$sql8="select prioridad from convenio_practica where cod_practica = '$nro_practica' ";
$result8 = $db->Execute($sql8);
$prioridad=strtoupper($result8->fields["prioridad"]);



  $sql ="INSERT INTO `detalle` ( `cod_grabacion` , `nro_os` , `nro_paciente` , `nro_orden` , `nro_practica` , `valor` , `periodo` , `ano` , `nro_factura` , `confirmada` , `cod_operacion` , `marca` , `lote`, `operador` , `categoria` , `coseguro` , `tipo_fact` , `prioridad` , `imprimir`) VALUES ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '$valor' ,'$periodo1' , '$ano' , '$nro_factura' , '$confirmada' , '' , '$marca' , '$lote' , '$operador' , '' , '' , '' , '$prioridad' , '1')";
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

}elseif ($nro_practica == 764){
echo $sql = "INSERT INTO detalle_proteino (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `albumina`, `alfa1`, `alfa2`, `beta`, `gamma`, `proteinas_totales`, `relacion_ag`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '', '', '', '', '', '')";
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
 $sql = "INSERT INTO detalle_hepatograma (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `aspartato`, `alanina`, `fosfatasa`, `total`, `directa`, `indirecta`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' , '' . '', '' , '')";
mysql_query($sql);

}elseif ($nro_practica == 2734){
 $sql = "INSERT INTO detalle_antigeno (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `enzima`, `elisa`, `razon_procentual`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' , '' )";
mysql_query($sql);


}elseif ($nro_practica == 136){
 $sql = "INSERT INTO detalle_calcio (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `enzima`, `elisa`, `razon_procentual`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' )";
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
 $sql = "INSERT INTO detalle_lipidogramaa ( `cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `suero`, `quilomicrones`, `beta`, `prebeta`, `alfa`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' , '', '', '' )";
mysql_query($sql);

}elseif ($nro_practica == 762){
 $sql = "INSERT INTO detalle_lipidogramaa ( `cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `protidemia`, `globulinas`, `albumina`, `relacion_ag`, `observaciones`) VALUES  ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '', '', '' , '', '' )";
mysql_query($sql);
$sql = "INSERT INTO `laboratorio`.`detalle_proteinas_fraccionadas` (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `protidemia`, `globulinas`, `albumina`, `relacion_ag`, `observaciones`) VALUES (\'0\', \'0\', \'0\', \'0\', \'0\', \'\', \'\', \'\', \'\', \'\');";

}else{
$sql = "INSERT INTO detalle_referencia (`cod_grabacion`, `nro_os`, `nro_paciente`, `nro_orden`, `nro_practica`, `valor`, `referencia`, `observaciones` , `referencia1` , `referencia2` , `referencia3`) VALUES ('$idgenerado' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica'  , '', '', '' , '' , '' , '' );";
mysql_query($sql);
}




$result10->MoveNext();

	}

$sql = "DELETE FROM detalle_temp where cod_grabacion = $operador";
mysql_query($sql);



include ("../../../conexiones/close.php");

 $nro_paciente = $nro_laboratorio;
$band = 1;

$bande_nuevo = 1;

$bande = 2;
$palabra = $nro_paciente
include ("../../pacientes/buscar_paciente.php");
?>



</html>


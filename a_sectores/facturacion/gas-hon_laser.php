

<title>FACTURACION</title><style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo1 {
	font-size: 16px;
	font-weight: bold;
}
.Estilo3 {font-family: "Courier New", Courier, mono}
-->
</style><body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">

<body>
    <?php 
	global $importe;
global $total_acumulado;
global $cont;
global $contador_practicas;

global $coseguro;
global $coseguro_comp;
global $coseguro_esp;
global $no_677;
global $valor_998_1;



$hora_inicio  = time();

	
function redondeado ($numero, $decimales) {
   $factor = pow(10, $decimales);
   return (round($numero*$factor)/$factor); } 

//$facturar = $_REQUEST['facturar'];
$nro_os2= $_REQUEST['nro_os2'];
$nro_os = $_REQUEST['nro_os'];


include ("../../conexiones/config.inc.php");




if ($enca != 1){
function redondear($valor) {
$float_redondeado=round(($valor * 100) / 100,2);
return $float_redondeado;
}
}

$hoy = $dia_actua."-".$mes_actua."-".$anio_actua;
$hoy_pr = "20".$anio_actua."-".$mes_actua."-".$dia_actua;
$observaciones = "NINGUNA";
$nro_factura = $_REQUEST['nro_factura'];



if ($nro_factura == ""){
$leyenda = "NO INGRESO Nº FACTURA";
include ("../../alertas/campo_informacion2.php");
exit;
}






$leyenda = $_REQUEST['leyenda'];
$marca= $_REQUEST['marca'];
$lote= $_REQUEST['lote'];

$mes= $_REQUEST['mes'];
$mes_actual= $_REQUEST['mes'];
$año= $_REQUEST['hoy'];
$nro_os = $_REQUEST['nro_os'];
$nro_os2 = $_REQUEST['nro_os2'];
$nro_labo = $_REQUEST['nro_laboratorio'];

$anio_a_fact= $_REQUEST['anio_a_fact'];
$año = $anio_a_fact;
$periodo= $mes." - ".$anio;

$marc=$_POST["marca"];
	for ($i=0;$i<count($marc);$i++)    
	{     
$marca = $marc[$i];    
	}

if (strlen($anio) == 4){
$anio = substr($anio,2);
}


if ($nro_factura == ""){
$leyenda = "NO INGRESO Nº DE FACTURA";
include ("../../alertas/campo_informacion2.php");
exit;
}




if ($nro_os == ""){
$leyenda = "NO INGRESO Nº OBRA SOCIAL";
include ("../../alertas/campo_informacion2.php");
exit;
}


$sql="select * from datos_os where nro_os like '$nro_os'";
$result = $db->Execute($sql);
  
 $domicilio_l=ucwords($result->fields["domicilio_l"]);
 $denominacion=ucwords($result->fields["denominacion"]);
 $cuit=ucwords($result->fields["cuit"]);
 $sigla=ucwords($result->fields["sigla"]);
$inscripcion=ucwords($result->fields["inscripcion"]);

if ($sigla == ""){
$leyenda = "NO EXISTE OBRA SOCIAL CON ESE NUMERO";
include ("../../alertas/campo_informacion2.php");
exit;
}

switch ($mes)
					{
		case "ENERO":{$periodo1= "01".$año; $mes_actual="01";}break;
		case "FEBRERO":{$periodo1= "02".$año;$mes_actual="02";}break;
		case "MARZO":{$periodo1= "03".$año;$mes_actual="03";}break;
		case "ABRIL":{$periodo1= "04".$año;$mes_actual="04";}break;
		case "MAYO":{$periodo1= "05".$año;$mes_actual="05";}break;
		case "JUNIO":{$periodo1= "06".$año;$mes_actual="06";}break;
		case "JULIO":{$periodo1= "07".$año;$mes_actual="07";}break;
		case "AGOSTO":{$periodo1= "08".$año;$mes_actual="08";}break;
		case "SETIEMBRE":{$periodo1= "09".$año;$mes_actual="09";break;}
		case "OCTUBRE":{$periodo1= "10".$año;$mes_actual="10";}break;
		case "NOVIEMBRE":{$periodo1= "11".$año;$mes_actual="11";}break;
		case "DICIEMBRE":{$periodo1= "12".$año;$mes_actual="12";}break;
					}

$nro = 1;
$no_677 = 1;
$cont = 1;
if ($mes_actual == ""){
	$mes_actual = date("m");
					}
$anio = $anio_a_fact;


include ("../../conexiones/config.inc.php");


 $sql="select * from datos_os where nro_os like '$nro_os'";
$result = $db->Execute($sql);
 
 //$domicilio_l=ucwords($result->fields["domicilio_l"]);
 $denominacion=ucwords($result->fields["denominacion"]);
 $cuit_os=ucwords($result->fields["cuit"]);
 $sigla=ucwords($result->fields["sigla"]);
 $inscripcion=ucwords($result->fields["inscripcion"]);

switch ($inscripcion){
case "1":
	{
	$tipo_fact= "A";
	$tipo_iva = "RESPONSABLE INSCRIPTO";
	break;
}
case "2":
	{
	$tipo_fact= "B";
		$tipo_iva = "RESPONSABLE NO INSCRIPTO";
	break;
}

case "3":
	{
	$tipo_fact= "B";
		$tipo_iva = "MONOTRIBUTISTA";
	break;
}

case "4":
	{
	$tipo_fact= "B";
		$tipo_iva = "EXENTO";
	break;
}
}
  
  if ($cuit == 1){
  }


$sql1="select * from datos_os where nro_os like '$nro_os2'";
$result1 = $db->Execute($sql1);
$sigla2=ucwords($result1->fields["sigla"]);


 $sql9="select * from factura where nro_factura = '$nro_factura' and tipo_fact = '$tipo_fact'";
$result9 = $db->Execute($sql9);

$nro_fac=$result9->fields["nro_factura"];

if ($nro_fac != ""){

$leyenda = "YA EXISTE UNA FACTURA CON ESE NUMERO, POR FAVOR CAMBIE EL NUMERO INGRESADO";
include ("../../alertas/campo_informacion2.php");
exit;
}



$sql="select * from datos_principales";
$result = $db->Execute($sql);
$nombre_laboratorio1=strtoupper($result->fields["nombre_laboratorio"]);
$direccion=strtoupper($result->fields["direccion"]);
$matricula=strtoupper($result->fields["matricula"]);
$telefono=strtoupper($result->fields["telefono"]);
$celular=strtoupper($result->fields["celular"]);
$mail=strtoupper($result->fields["mail"]);

$cuit=strtoupper($result->fields["cuit"]);
$comercio=strtoupper($result->fields["comercio"]);
$ingresos_brutos=strtoupper($result->fields["ingresos_brutos"]);
$inicio_actividad=strtoupper($result->fields["inicio_actividad"]);

$dia2 = substr($inicio_actividad,8,2);
$mes2 = substr($inicio_actividad,5,2);
$anio2 = substr($inicio_actividad,0,4);

$inicio_actividad = $dia2."/".$mes2."/".$anio2;



?>


<table width="750" border="1" cellspacing="0">

	<tr>
	  <td colspan="2"><div align="center"><span class="Estilo27">------------ Documento no v&aacute;lido como Factura ------------ </span></div></td>
  </tr>
	<tr>
	  <td colspan="2" bgcolor="#BBDDFF"><div align="center" class="Estilo27"><span class="Estilo28 Estilo14"><strong>DETALLE </strong>
	    <BR>
	    </span> </div>        
      <div align="center"></div></td>
  </tr>
	<tr>
	  <td width="118" height="24" bordercolor="#FFFFFF" bgcolor="#F0F0F0"><div align="right"><span class="Estilo16 Estilo27  Estilo15">Nº</span></div></td>
      <td width="622" bordercolor="#FFFFFF"><div align="right" class="Estilo16 Estilo27  Estilo15">
        <div align="left"><span class="Estilo27 Estilo15 Estilo16"><?php echo $nro_factura;?></span>: </div>
      </div>        <div align="left" class="Estilo27 Estilo15 Estilo16"></div></td>
  </tr>
  <tr>
    <td width="118" bordercolor="#FFFFFF" bgcolor="#F0F0F0"><div align="right"><span class="Estilo16 Estilo27  Estilo15">Fecha :</span></div></td>
    <td bordercolor="#FFFFFF"><div align="right" class="Estilo16 Estilo27  Estilo15">
      <div align="left"><span class="Estilo27 Estilo15 Estilo16"><?php echo $hoy;?></span></div>
    </div>      <div align="left" class="Estilo27 Estilo15 Estilo16"></div></td>
  </tr>
  
  <tr class="Estilo6">
    <td bordercolor="#FFFFFF" bgcolor="#F0F0F0"> <div align="right">OBRA SOCIAL:</div></td>
    <td bordercolor="#FFFFFF"><?php print("$denominacion");?><?php  print "(".$nro_os.")";?>
      <?php if ($facturara == "NO"){
		  echo "<br>";
	  echo "Facturado con el nomenclador de Obra Social: ".$nro_os2." - ".$sigla;}?></td>
  </tr>
  <tr class="Estilo6">
    <td bordercolor="#FFFFFF" bgcolor="#F0F0F0"><div align="right">SIGLA</div></td>
    <td bordercolor="#FFFFFF"><?php print $sigla;?></td>
  </tr>
  <tr class="Estilo6">
    <td bordercolor="#FFFFFF" bgcolor="#F0F0F0"><div align="right">I.V.A:     </div></td>
    <td bordercolor="#FFFFFF"><?php print("$tipo_iva");?></td>
  </tr>
  <tr class="Estilo6">
    <td bordercolor="#FFFFFF" bgcolor="#F0F0F0"><div align="right">C.U.I.T.  
    </div></td>
    <td bordercolor="#FFFFFF"><?php print("$cuit_os");?></td>
  </tr>
</table>

<table width="750" border="1" cellspacing="0" bordercolor="#FFFFFF">
  <!--DWLayoutTable-->
  



  <tr>
    <td width="119" bgcolor="#BBDDFF"><div align="center"><span class="Estilo39">Fecha</span></div></td>
    <td width="542" valign="top" bgcolor="#BBDDFF"><div align="center"><span class="Estilo39">Prestaciones</span></div></td>
    <td width="75" valign="top" bgcolor="#BBDDFF"><div align="right"><span class="Estilo45">Total</span></div></td>
  </tr>

 <?php  
 
 $mes_actual;
 $anio;


include ("convenio.php");
include ("998677001.php");

/*if (($agrega_iva == "SI") and ($iva_convenido == 0.00)){
$leyenda = "NO TIENE CARGADO TASA DE IVA CONSULTE EN GERENCIA POR CONVENIO";
include ("../../alertas/campo_informacion2.php");
exit;
}*/


 $sql = "SELECT * FROM `detalle` WHERE  `nro_os` = $nro_os AND `fecha` between '$desde' and '$hasta'  and lote = '$lote' and confirmada = '7' GROUP BY nro_paciente order by fecha, nro_paciente";
				

$result = $db->Execute($sql);
$nro_lab=ucwords($result->fields["nro_paciente"]);

if ($nro_lab == ""){
$leyenda = "NO SE PUEDE REALIZAR ESTA FACTURA"; 
$leyenda2 = "NO TIENE ORDENES GRABADAS O YA ESTAN FACTURADAS";
$leyenda3 = "Consulte ORDENES SIN FACTURAR";
include ("../../alertas/campo_informacion_doble.php");
exit;}


if (!$result) die("fallo".$db->ErrorMsg());
	 while (!$result->EOF)										{ 

$cantidad_laboratorios = $cantidad_laboratorios +1;

$nro_laboratorio=ucwords($result->fields["nro_paciente"]);
//include ("../../conexiones/config.inc.php");

 $sql5="select * from pacientes where nro_paciente = $nro_laboratorio";
$result5 = $db->Execute($sql5);
$nombre=$result5->fields["nombre"];
$apellido=$result5->fields["apellido"];
$nro_afiliado=$result5->fields["nro_afiliado"];

 


?>


  <tr bgcolor="#F7F7F3">
    <td colspan="3" valign="top" class="Estilo36  Estilo3"><?php echo $apellido." ".$nombre;?> N&ordm; Afil: <?php echo $nro_afiliado;?></td>
  </tr>
  
   


<?php 



	
//include ("../../conexiones/config_gb.php");
  if ($nro_os == 5073){
 $sql1 = "SELECT cod_grabacion, nro_orden FROM `detalle` WHERE 1 AND `nro_os` like '$nro_os' AND `nro_paciente` = $nro_laboratorio AND `periodo` = $mes_actual AND `ano` = $anio AND (`confirmada` = 1 or `confirmada` = 7)   and lote = '$lote' group by cod_grabacion order by nro_orden";
  }
  else
		 {

//$sql1 = "SELECT DISTINCT(cod_grabacion), nro_orden FROM `detalle` WHERE 1 AND `nro_os` = $nro_os AND `nro_paciente` = $nro_laboratorio AND `periodo` = $mes_actual AND `ano` = $anio  and lote = '$lote' and  confirmada = '7' order by fecha";

  $sql1 = "SELECT DISTINCT(cod_grabacion), nro_orden ,  nro_os ,  periodo ,  ano, facturar FROM `detalle` WHERE 1 AND `nro_os` = $nro_os AND `nro_paciente` = $nro_laboratorio AND `fecha` between '$desde' and '$hasta'  and lote = '$lote' and  confirmada = '7' and facturar = 0 order by fecha";
		 }
$result1 = $db->Execute($sql1);


if (!$result1) die("fallo2".$db->ErrorMsg());
	 while (!$result1->EOF)                                       { 

$contador_ordenes = $contador_ordenes + 1;
$ordenes_facturadas = $ordenes_facturadas + 1;

$cod_grabacion=ucwords($result1->fields["cod_grabacion"]);
 $nro_orden=ucwords($result1->fields["nro_orden"]);

 $periodo22=ucwords($result1->fields["periodo"]);
  $nro_os22=ucwords($result1->fields["nro_os"]);
   $ano22=ucwords($result1->fields["ano"]);



if ($nro_orden == ""){
 $sql78 = "SELECT autorizacion FROM ordenes where cod_grabacion = $cod_grabacion";
$result78 = $db->Execute($sql78);
$nro_orden=$result78->fields["autorizacion"];

}

if (strlen($nro_orden) == 8){
$nro_orden1 = $nro_orden;
							}

if (strlen($nro_orden) == 7){
$nro_orden1 = "0".$nro_orden;
							}

if (strlen($nro_orden) == 6){
$nro_orden1 = "00".$nro_orden;
							}

if (strlen($nro_orden) == 5){
$nro_orden1 = "000".$nro_orden;
							}

if (strlen($nro_orden) == 4){
$nro_orden1 = "0000".$nro_orden;
							}

if (strlen($nro_orden) == 3){
$nro_orden1 = "00000".$nro_orden;
							}




$fact_677 =0;

//$sql2 = "SELECT nro_practica FROM `detalle` WHERE cod_grabacion = $cod_grabacion order by nro_practica";

//include ("../../conexiones/config_gb.php");


if ($facturar == "NO")		{
	$nro_os = $nro_os2;
							}


$base =  "pg000122_sulb";
$base =  "ei000052_laboratorio";
$base =  "i8000155_LBA";
$base =  "laboratorio";



  $sql6 = "SELECT $base.detalle.facturar, $base.detalle.cod_grabacion, $base.detalle.cod_operacion, $base.detalle.nro_practica, $base.detalle.marca, $base.convenio_practica.valor,$base.convenio_practica.categoria, $base.convenio_practica.practica,  $base.convenio_practica.gastos,  $base.convenio_practica.honorarios, $base.convenio_practica.por FROM $base.detalle INNER JOIN $base.convenio_practica ON $base.detalle.nro_practica = $base.convenio_practica.cod_practica WHERE $base.convenio_practica.nro_os like '4975' AND $base.detalle.cod_grabacion = $cod_grabacion AND $base.detalle.fecha between '$desde' and '$hasta' AND ($base.detalle.confirmada = 1 or $base.detalle.confirmada = 7)  and $base.detalle.lote = '$lote' and $base.detalle.facturar = '0' group by cod_operacion order by $base.detalle.marca desc, $base.detalle.cod_operacion desc ";
$result3 = $db->Execute($sql6);




$sql4 = "SELECT fecha_realizacion, medico, coseguro,  cod_diag, marca FROM `ordenes` WHERE cod_grabacion = $cod_grabacion";
$result4 = $db->Execute($sql4);


$fecha=$result4->fields["fecha_realizacion"];
$cod_diag=$result4->fields["cod_diag"];

$dia_orden = substr($fecha,8,2);
$mes_orden = substr($fecha,5,2);
$anio_orden = substr($fecha,0,4);
$anio_orden1 = substr($fecha,2,4);

$fecha = $dia_orden."-".$mes_orden."-".$anio_orden;
$fecha_pami = $dia_orden.$mes_orden.$anio_orden;
$fecha_osep = $dia_orden.$mes_orden.$anio_orden1;


$medico=$result4->fields["medico"];
$tipo_afiliado=$result4->fields["marca"];

if (($tipo_afiliado == "1") or ($tipo_afiliado == "CON_IVA")){
$afili = "*";
}else{
$afili = "";
}




?>
  <tr valign="top">
    <td scope="col"><span class="Estilo41"><?php echo $fecha;?></span> </td>
    <td scope="col"><div align="justify" class="Estilo11 ">
      <span class="Estilo43">
      <?php 

if (!$result3) die("fallo3".$db->ErrorMsg());
	 while (!$result3->EOF)									 { 

 $nro_practica=$result3->fields["nro_practica"];
$nro_practica1=$result3->fields["nro_practica"];



$nombre_practica=$result3->fields["practica"];
$honorarios=round($result3->fields["honorarios"],2);
$categoria=$result3->fields["categoria"];
$gastos=round($result3->fields["gastos"],2);
$toma=$result3->fields["toma"];
$urgencia=$result3->fields["urgencia"];
$mate_desc=$result3->fields["material_descartable"];
$valor=$result3->fields["valor"];


  $sql34="select * from datos_os where nro_os = $nro_os";
$result34 = $db->Execute($sql34);

 $nro_os_facturar=$result34->fields["nro_os_facturar"];


if ($nro_os_facturar != 4975){
  $sql4 = "SELECT valor FROM `convenio_practica_factura` WHERE nro_os = $nro_os_facturar";
$result4 = $db->Execute($sql4);
$valor=$result4->fields["valor"];
}

$autorizada=$result3->fields["autorizada"];
$marcado=$result3->fields["marca"];
$cod_grabacion=$result3->fields["cod_grabacion"];
$cod_operacion=$result3->fields["cod_operacion"];

$por=$result3->fields["por"];

if (($por == 0) or ($por == "")){
$por = 1;
}

if (($nro_os == 2616) && ($nro_practica == 066)){

$valor_066 = $valor;
}
if ($nro_os == 5045){ //le cobra toma y muestra a todas las ordenes no importa lo que dice el nomenclador
	$toma = "SI";
}


$cont = $cont + 1;

 $modalidad;
switch ($categoria){
	case "1":{
		
$contador_comunes = $contador_comunes + 1;
		include ("modalidad_comunes.php");

		BREAK;
	}

		case "2":{
$contador_especiales = $contador_especiales + 1;

		include ("modalidad_especiales.php");
		BREAK;
	}

		case "3":{
$contador_alta = $contador_alta + 1;

	include ("modalidad_alta.php");
		BREAK;
	}

}




if ($guardar == "SI"){
  $sql = "UPDATE `detalle` SET `valor` = '$valor', `nro_factura` = '$nro_factura' ,`categoria` = '$categoria', `confirmada` = '10' ,`tipo_fact` = '$tipo_fact' WHERE `cod_grabacion` = '$cod_grabacion' and `nro_practica` = '$nro_practica'";
$db->Execute($sql);


}




$valor = number_format($valor,2);
$cuenta_practica = $cuenta_practica + 1;




$result3->MoveNext();



$cose_alt = "";
$cose_esp = "";

$total_comunes=0;
$total_especiales=0;
$total_alta=0;








//************************************************************************************




$total_cose = 0;
$cose = 0;
$cos = 0;
$total_ac_cimesa = 0;
$coseguro_en_orden= 0;
$importe1 = $importe1 - $coseguro_final;
$importe = $importe - $coseguro_final;
$coseguro_total = $coseguro_total + $coseguro_final;
$coseguro_final = 0;
$valor_coseguro = 0;
$total_coseguro_comunes = 0;
$total_coseguro_especiales = 0;
$total_coseguro_alta = 0;
$coseguro_a_facturar = 0;
$contador_practicas = 0;
}


if ($acto_bioquimico == "SI"){

 $sql11="select * from convenio_practica where cod_practica = 1";
$result11 = $db->Execute($sql11);

$hono_001=$result11->fields["honorarios"];

$valor_001 = $hono_001 * $vuh;


echo "(001 - $".number_format($valor_001,2).") ";

	if ($guardar == "SI"){



 $sql ="INSERT INTO `detalle` ( `cod_grabacion` , `nro_os` , `nro_paciente` , `nro_orden` , `nro_practica` , `valor` , `periodo` , `ano` , `nro_factura` , `confirmada` , `cod_operacion` , `marca` , `lote`, `operador` , `coseguro` , `categoria` , `tipo_fact`   ) VALUES ('$cod_grabacion' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '001' , '$valor_001' ,'$mes_actual' , '$anio' , '$nro_factura' , '10' , '' , '' , '$lote' , '$operador' , '$valor_cose' , '', '$tipo_fact')";
$db->Execute($sql);
	}
$importe1 = $importe1 + $valor_001;
$importe = $importe + $valor_001;

}


$exento = $exento + $importe;
$exento1 = $exento1 + $importe;
$iva_total_bioq = $importe;




?>
      </span><span class="Estilo12">      </span></td>
  <td valign="top" class="Estilo10" scope="col">    <div align="right"><span class="Estilo44"><?php echo round($iva_total_bioq,2);?></span></div>    
  </tr>


<?php 


		 if ($guardar == "SI"){

if (($tipo_afiliado == "1") OR ($tipo_afiliado == "CON_IVA")){
$sql = "UPDATE `ordenes` SET  `iva` = '$iva_orden1' ,  `neto_gravado` = '$importe' , `total_orden` = '$iva_total_bioq' WHERE `cod_grabacion` = '$cod_grabacion'";
$db->Execute($sql);
}else{
$sql = "UPDATE `ordenes` SET  `iva` = '$iva_orden1' , `exento` = '$iva_total_bioq' , `total_orden` = '$importe' WHERE `cod_grabacion` = '$cod_grabacion'";
$db->Execute($sql);
}
}


$importe=0;	
$no_677 = 1;
$cont = 1;
$contador_practicas_1 = 0;
$cuenta_practica = 0;
$iva_orden1 = "";
$contador_comunes = 0;
$contador_especiales = 0;
$contador_alta = 0;

$iva_total_bioq;

$result1->MoveNext();





if ($guardar == "SI"){

 $sql = "UPDATE `ordenes` SET `fecha_fac` = '$hoy_pr',`nro_fac` = '$nro_factura' , `confirmada` = '10' ,`tipo_fact` = '$tipo_fact' WHERE `cod_grabacion` = '$cod_grabacion'";
$db->Execute($sql);



}

	 }

if ($agrega_iva == "SI"){
$importe_sin_iva = $importe1;

$iva_orden1;
$importe1 = $importe1+ $iva_orden;
	}





	 	if ($guardar == "SI"){		
//include ("composicion.php");
}





?>

<tr><td colspan="2" bgcolor="#F0F0F0" class="Estilo21" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#F0F0F0" scope="col"><div align="right" class="Estilo12">
      <div align="right"><strong><span class="Estilo33">$</span> <?php echo number_format($importe1,2);?></strong></div>
    </div>      </td>

    <?php 



$iva_bioq = 0;
$iva_orden = 0;
$iva_practica  = 0;
$total_ac_cimesa = 0;
$total_acumulado = 0;
$contador_ordenes=0;
 $total_ac = $total_ac + $importe1;
$total_mostrar = $total_ac;
$total_sin_iva = $total_sin_iva + $importe_sin_iva;
$iva_total_bioq = "";

$acumulado_por_orden=0;
$importe1= 0;
$coseguro_acumulado_lab=0;
$neto_gravado1 = "";
$exento1= "";
$result->MoveNext();
																}
																

?>
    
  
    <?php 
	
	 $descuento;
	if ($descuento > 0){
$desc = round($total_ac * $descuento /100,2);
$total_sin_descuento = $total_ac;
$total_ac = $total_ac - $desc;
}ELSE{
$total_sin_descuento = $total_ac;
}

	 $total_ac;


/*
$iva = round((($total_ac * $iva_convenido)/100),2);
$total_ac = $total_sin_iva + $iva_total;
$iva= round($iva,2);
$neto_gravado= round($neto_gravado,2);
$total_ac= round($total_ac,2);
$exento = round($exento,2);
$subtotal = $total_sin_iva;*/


	?>
</table>

<table width="750" border="0" cellspacing="0">
	  
      <tr>
        <td colspan="2" valign="top" scope="col"><div align="right"><span class="Estilo12">Cantidad</span> <span class="Estilo12">de</span> <span class="Estilo12">Ordenes</span></div></td>
        <td valign="top" scope="col">&nbsp;</td>
        <td valign="top" scope="col"><div align="right"><span class="Estilo12 Estilo30"><span class="Estilo19"><?php ECHO $ordenes_facturadas;?></span></span></div></td>
      </tr>
      <tr>
        <td colspan="2" valign="top" scope="col"><div align="right"><span class="Estilo12 Estilo30"><span class="Estilo19">Cantidad de Pacientes </span></span></div></td>
        <td valign="top" scope="col">&nbsp;</td>
        <td valign="top" scope="col"><div align="right"><span class="Estilo12 Estilo30"><span class="Estilo19"><?php ECHO $cantidad_laboratorios;?></span></span></div></td>
      </tr>
      <tr>
        <td colspan="2" valign="top" scope="col">&nbsp;</td>
        <td valign="top" scope="col">&nbsp;</td>
        <td valign="top" scope="col">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" valign="top" scope="col"><div align="right"><span class="Estilo1">SUB TOTAL: </span></div></td>
        <td valign="top" scope="col">&nbsp;</td>
        <td valign="top" scope="col"><div align="right"><span class="Estilo1"><?php ECHO "$ ". number_format($total_sin_descuento,2);?></span></div></td>
      </tr>
      <tr>
        <td colspan="2" valign="top" scope="col"><div align="right"><span class="Estilo1">DESCUENTO:</span></div></td>
        <td valign="top" scope="col">&nbsp;</td>
        <td valign="top" scope="col"><div align="right"><span class="Estilo1"><?php ECHO "$ ". number_format($desc,2);?></span></div></td>
      </tr>
      <tr>
        <td colspan="2" valign="top" scope="col">&nbsp;</td>
        <td valign="top" scope="col">&nbsp;</td>
        <td valign="top" scope="col">&nbsp;</td>
      </tr>
  <tr>
    <td colspan="2" valign="top" scope="col"><div align="right" class="Estilo1">TOTAL: </span></span>      </div></td>
	  <td valign="top" scope="col">&nbsp;</td>
	  <td valign="top" scope="col"><div align="right"><span class="Estilo1"><?php ECHO "$ ". number_format($total_ac,2);?></span></div></td>
  </tr>
	<?php 


$guardar;

if ($guardar == "SI"){
include ("guardar_factura.php");
}

?>
</table>

<?php 

$hora_final  = time();
$enca=1;


include ("../../conexiones/close.php");
?>







<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Estilo5 {font-size: 12px}
.Estilo6 {font-family: Arial, Helvetica, sans-serif}
-->
<style type="text/css">
<!--
.Estilo26 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo27 {font-family: Arial, Helvetica, sans-serif}
.Estilo28 {font-size: 12px}
.Estilo29 {color: #000000}
.Estilo31 {font-size: 10px}
-->
</style>
<?php 

$primera=$_POST["primera"];		
$anio=$_POST["anio"];
$lote=strtoupper($_POST["lote"]);
$anio2 = "20".$anio;

if ($lote == "DOCTHOS"){

$nro_os_recep = 3876;
}

$nro_os=$_POST["nro_os"];		
$me=$_POST["mes"];
	for ($i=0;$i<count($me);$i++)    
	{     
	$mes = $me[$i];    
	}

	$marc=$_POST["marca"];
	for ($i=0;$i<count($marc);$i++)    
	{     
	$marca = $marc[$i];    
	}



				switch ($mes)
	{
		case "1":{$periodo= "ENERO";}break;
		case "2":{$periodo= "FEBRERO";}break;
		case "3":{$periodo= "MARZO";}break;
		case "4":{$periodo= "ABRIL";}break;
		case "5":{$periodo= "MAYO";}break;
		case "6":{$periodo= "JUNIO";}break;
		case "7":{$periodo= "JULIO";}break;
		case "8":{$periodo= "AGOSTO";}break;
		case "9":{$periodo= "SETIEMBRE";}break;
		case "10":{$periodo="OCTUBRE";}break;
		case "11":{$periodo="NOVIEMBRE";}break;
		case "12":{$periodo="DICIEMBRE";}break;
				}
	


global $total;
include ("../../conexiones/config_or.php");


$hoy = date("d/m/y");

include ("../../conexiones/config_os.php");
$sql2="select * from datos_os where nro_os = $nro_os";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);
$denominacion=strtoupper($result2->fields["denominacion"]);?>

<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">
<table width="106%" height="161" border="1">
  <tr bgcolor="#E1F2EF">
<td height="31" colspan="10"><div align="center" class="Estilo28"><span class="Estilo29 Estilo6"><strong>CONTROL CRUZADO:    <strong>PERIODO: <?php  echo $mes." - ".$anio;?> OBRA SOCIAL: <?php  echo $sigla." - ".$nro_os;?> </strong>Emitido el:<strong><?php  echo $hoy;?>. LOTE: <strong><?php  echo $lote;?></strong></strong></span></div></td>
  </tr>
  <tr bgcolor="#E8DCFC">
    <td colspan="10"><hr noshade></td>
  </tr>
  <tr bgcolor="#E8DCFC"> 


	<td colspan="2"><div align="center" class="Estilo26 Estilo6 Estilo28"><font color="#000000">Bioquimico</font></div></td>
	
	<td width="10%"><div align="center" class="Estilo26 Estilo6 Estilo28"><font color="#000000">N&ordm; Planilla</font></div></td>
	<td width="4%"><div align="center" class="Estilo26 Estilo6 Estilo28"><font color="#000000">Oper.</font></div></td>
	<td width="4%"><div align="center" class="Estilo26 Estilo6 Estilo28"><font color="#000000"><font color="#000000">Recep.</font></font></div></td>
	<td width="4%"><div align="center" class="Estilo26 Estilo6 Estilo28">Grab.</div></td>
	<td width="6%"><div align="center" class="Estilo26 Estilo6 Estilo28"><font color="#000000">Dif. Recep.</font></div></td>
	<td width="8%"><div align="center" class="Estilo26 Estilo6 Estilo28"><font color="#000000">Dif. Grab.</font></div></td>
	<td width="5%"><div align="center" class="Estilo26 Estilo6 Estilo28">Grab.</div></td>
  </tr>
  <?php 


include ("../../conexiones/config.inc.php");		

$sq = "TRUNCATE TABLE `validas`";
$result2 = $db_gb->Execute($sq);


$sql2="select * from datos_os where nro_os = $nro_os";
$result2 = $db_os->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);
$denominacion=strtoupper($result2->fields["denominacion"]);

if (($lote == "") && ($marca == "")){
$sql = "SELECT nro_laboratorio, cod_grabacion, operador FROM `ordenes`  WHERE  `nro_os` = $nro_os AND `periodo` = $mes AND `ano`  = $anio AND (confirmada = 7 or confirmada = 8 or confirmada = 10 or confirmada = 1) GROUP BY nro_laboratorio ORDER BY nro_laboratorio";
$result = $db_gb->Execute($sql);

}elseif (($lote != "") && ($marca == "")){
$sql = "SELECT nro_laboratorio, cod_grabacion, operador FROM `ordenes`  WHERE  `nro_os` = $nro_os AND `periodo` = $mes AND `ano`  = $anio AND (confirmada = 7 or confirmada = 8 or confirmada = 10 or confirmada = 1) and lote = '$lote' GROUP BY nro_laboratorio ORDER BY nro_laboratorio";

}elseif (($lote == "") && ($marca != "")){
$sql = "SELECT nro_laboratorio, cod_grabacion, operador FROM `ordenes`  WHERE  `nro_os` = $nro_os AND `periodo` = $mes AND `ano`  = $anio AND (confirmada = 7 or confirmada = 8 or confirmada = 10 or confirmada = 1 ) and marca = '$marca' GROUP BY nro_laboratorio ORDER BY nro_laboratorio";

}elseif (($lote != "") && ($marca != "")){
$sql = "SELECT nro_laboratorio, cod_grabacion, operador FROM `ordenes`  WHERE  `nro_os` = $nro_os AND `periodo` = $mes AND `ano`  = $anio AND (confirmada = 7 or confirmada = 8 or confirmada = 10 or confirmada = 1) and lote = '$lote' and  marca = '$marca' GROUP BY nro_laboratorio ORDER BY nro_laboratorio";
}






if (!$result) die("fallo".$db_gb->ErrorMsg());

 while (!$result->EOF) {

$nro_laboratorio=$result->fields["nro_laboratorio"];
$operador=$result->fields["operador"];

switch ($operador){

case  "106":{
	$nombre_operador = "EST";
BREAK;
}

case  "107":{
	$nombre_operador = "JOH";
BREAK;
}

case  "108":{
	$nombre_operador = "JES";
BREAK;
}

case "109":{
	$nombre_operador = "CAR";
BREAK;
}

case "110":{
	$nombre_operador = "GIC";
BREAK;
}


}


 $sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";
$result5 = $db_bq->Execute($sql4);
$nombre_laboratorio=strtoupper($result5->fields["nombre_laboratorio"]);




$sql2 = "INSERT INTO `validas` ( `cod_operacion` , `nro_os` , `nombre_os` , `nro_laboratorio` , `nombre_laboratorio` , `nro_planilla` , `operador_recep` , `nombre_operador_recep` , `cant_recep` , `cant_grab` , `cant_dif` , `operador_grab` , `nombre_operador_grab` , `lote` ) VALUES ('$cod_operacion' , '$nro_os' , '$denominacion' , '$nro_laboratorio' , '$nombre_laboratorio' , '$nro_planilla' , '$operador_recep' , '$nombre_operador_recep' , '$cant_recep' , '$cant_grab' , '$cant_dif' , '$operador' , '$nombre_operador' , '$lote' )";
$result2 = $db_gb->Execute($sql2);


$result->MoveNext(); // pasa al siguiente laboratorio
}


include ("../../conexiones/config_gb.php");	

$sql = "SELECT * from validas order by nro_laboratorio";
$result = $db_gb->Execute($sql);

if (!$result) die("fallo".$db_gb->ErrorMsg());

 while (!$result->EOF) {


 $nro_laboratorio=$result->fields["nro_laboratorio"];
$nombre_laboratorio=$result->fields["nombre_laboratorio"];


if ($lote == ""){
$sql1 = "SELECT count(*) AS suma FROM `ordenes` where nro_laboratorio = $nro_laboratorio and periodo  = $mes and ano = $anio and nro_os = $nro_os and (confirmada = 7 or confirmada = 8 or confirmada = 10 or confirmada = 1)";
}
else{

	
$sql1 = "SELECT count(*) AS suma FROM `ordenes` where nro_laboratorio = $nro_laboratorio and periodo  = $mes and ano = $anio and nro_os = $nro_os and (confirmada = 7 or confirmada = 8 or confirmada = 10 or confirmada = 1) and lote = '$lote'";
 
}


$result1 = mysql_query($sql1) or die(mysql_error());
$cantidad_ordenes = mysql_fetch_array($result1);
$grabadas= $cantidad_ordenes['suma'];  

$total_grabadas = $total_grabadas + $grabadas;

?>
    

  <tr bgcolor="#E1F2EF">
      <td colspan="2" bgcolor="#FFFFFF"><div align="left" class="Estilo26 Estilo27 Estilo31"><?php echo $nro_laboratorio." - ".$nombre_laboratorio;?></div></td>
    <?php  if ($recep == ""){;?>
      <td bgcolor="#FFFFFF"><div align="center" class="Estilo26 Estilo27 Estilo28">-</div></td>
<td bgcolor="#FFFFFF"><div align="center" class="Estilo26 Estilo27 Estilo28"><span class="Estilo27">-</span></div></td>

     <?php }else{?>
	 <td bgcolor="#FFFFFF"><div align="center" class="Estilo26 Estilo27 Estilo28"><?php echo $nro_recibo;?></div></td>
	 <td bgcolor="#FFFFFF"><div align="center" class="Estilo26 Estilo27 Estilo28"><span class="Estilo27"><?php echo $operario;?></span></div></td>
	<?php }?>

	  
	  
<?php  if ($recep == ""){;?>
	  <td bgcolor="#FFFFFF"><div align="center" class="Estilo27 Estilo28"><span class="Estilo26">-</span></div></td>
<?php }else{?>
	  <td bgcolor="#FFFFFF"><div align="center" class="Estilo27 Estilo28"><span class="Estilo26"><?php  echo $recep;?></span></div></td>
	  <?php }?>
	  <td width="5%" bgcolor="#FFFFFF"><div align="center" class="Estilo26"><?php echo $grabadas;?></div></td>

	 
	  <td width="5%" bgcolor="#FFFFFF"><div align="center" class="Estilo26"><strong>   <?php print("$diferencia_recepcion");?></strong></div></td>


	 
	  <td width="4%" bgcolor="#FFFFFF"><div align="center" class="Estilo26"><strong>    <?php print("$diferencia_grabacion");?></strong></div></td>




	  <td width="3%" bgcolor="#FFFFFF">	    <div align="center" class="Estilo26 Estilo27 Estilo28"><?php echo $nombre_operador;?></div></td>
  </tr> 
  <?php 


$result->MoveNext();
}

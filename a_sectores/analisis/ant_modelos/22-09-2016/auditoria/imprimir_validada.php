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
</style>
<?php 

$primera=$_POST["primera"];		
$anio=$_POST["anio"];
$anio2 = "20".$anio;

$nro_os=$_POST["nro_os"];		
$me=$_POST["mes"];
	for ($i=0;$i<count($me);$i++)    
	{     
	$mes = $me[$i];    
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
	
//$periodo = "MAYO";

?>
<style type="text/css">
<!--
.Estilo26 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo27 {font-family: Arial, Helvetica, sans-serif}
-->
</style>

<?php 
global $total;
include ("../../conexiones/config_or.php");


$hoy = date("d/m/y");


?>


<?php include ("../../conexiones/config_os.php");
$sql2="select * from datos_os where nro_os like '$nro_os'";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);
$denominacion=strtoupper($result2->fields["denominacion"]);?>

<?php 
if ($caso == "impresion"){?>
<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">
<?php }else{

	$a = "val".$denominacion.$mes.$anio2;

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$a");
}
?>
<table width="93%" height="191" border="1">
  <tr bgcolor="#E1F2EF">
<td height="31" colspan="5" bgcolor="#FFFFFF"><div align="center" class="Estilo28"><span class="Estilo29 Estilo6"><strong>Validación de ordenes:    <strong>PERIODO: <?php  echo $mes." - ".$anio;?> OBRA SOCIAL: <?php  echo $sigla." - ".$nro_os;?> </strong>Emitido el:<strong><?php  echo $hoy;?></strong></span></div></td>
  </tr>
  <tr bgcolor="#E8DCFC">
    <td colspan="5" bgcolor="#FFFFFF"><hr noshade></td>
  </tr>
  <tr bgcolor="#E8DCFC"> 


	<td width="36%" height="22" bgcolor="#FFFFFF"><div align="center" class="Estilo26 Estilo6"><font color="#000000">Bioquimico</font></div></td>
	<td width="5%" bgcolor="#FFFFFF"><div align="center" class="Estilo26 Estilo6"><font color="#000000"><font color="#000000">Recep.</font></font></div></td>
	<td width="5%" bgcolor="#FFFFFF"><div align="center" class="Estilo26 Estilo6">Grab.</div></td>
	<td width="7%" bgcolor="#FFFFFF"><div align="center" class="Estilo26 Estilo6"><font color="#000000">Diferencia</font></div></td>
    <td width="20%" bgcolor="#FFFFFF"><span class="Estilo26">Observaciones</span></td>
  </tr>
  <?php 


include ("../../conexiones/config_gb.php");		
$sql = "SELECT nro_laboratorio, cod_grabacion, operador FROM `detalle`  WHERE  `nro_os` = $nro_os AND `periodo` = $mes AND `ano`  LIKE '$anio' AND confirmada = 7 GROUP BY nro_laboratorio ORDER BY nro_laboratorio";
$result = $db->Execute($sql);


if (!$result) die("fallo".$db->ErrorMsg());

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
	$nombre_operador = "ROS";
BREAK;
}

case "109":{
	$nombre_operador = "CAR";
BREAK;
}
}


$cod_grabacion=$result->fields["cod_grabacion"];

include ("../../conexiones/config_gb.php");		
$sql1 = "SELECT count(*) AS suma FROM `ordenes` where nro_laboratorio like '$nro_laboratorio' and periodo  = $mes and ano = $anio and nro_os = $nro_os and confirmada = 7";
$result1 = mysql_query($sql1) or die(mysql_error());
$cantidad_ordenes = mysql_fetch_array($result1);
$grabadas= $cantidad_ordenes['suma'];  

$total_grabadas = $total_grabadas + $grabadas;


include ("../../conexiones/config_or.php");
$sql32= "select * from recibos where nro_laboratorio like '$nro_laboratorio' and periodo = $mes and anio = $anio2";
$result32 = $db->Execute($sql32);

if (!$result32) die("fallo".$db->ErrorMsg());
 while (!$result32->EOF) {

$nro_recibo=$result32->fields["nro_recibo"];
$operario=$result32->fields["operario"];
$operario = substr($operario, 0,3);

$sql12 = "SELECT cantidad FROM `detalle` where nro_recibo like '$nro_recibo' and nro_os like '$nro_os'";
$result12 = $db->Execute($sql12);

$cantidad=$result12->fields["cantidad"];


$recep = $recep + $cantidad;
$total_recepcionadas = $total_recepcionadas + $cantidad;


if ($recep < $grabadas){
	$diferencia = $recep - $grabadas;
}
else
	 {
	$diferencia = $grabadas - $recep;
	 }



if ($diferencia < 0){
$diferencia = ($diferencia * (-1));
}




$result32->MoveNext(); // pasa al siguiente laboratorio
}



include ("../../conexiones/config.inc.php");
 $sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";
$result5 = $db->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio." (".$nro_laboratorio.")";


?>
    

  <tr bgcolor="#E1F2EF">
      <td bgcolor="#FFFFFF"><div align="left" class="Estilo26"><?php echo $nro_laboratorio." - ".$nombre_laboratorio;?></div></td>
    
	 <?php  if ($recep == ""){;?>
	  <td bgcolor="#FFFFFF"><div align="center" class="Estilo27 Estilo28"><span class="Estilo26">-</span></div></td>

    <?php }else{?>

<td bgcolor="#FFFFFF"><div align="center" class="Estilo27 Estilo28"><span class="Estilo26"><?php echo $recep;?></span></div></td>
    
	  <?php }?> 
<td bgcolor="#FFFFFF"><div align="center" class="Estilo27 Estilo28"><span class="Estilo26"><?php echo $grabadas;?></span></div></td>
     
	
<?php  if ($diferencia == 0){;?>
	  <td width="5%" bgcolor="#FFFFFF"><div align="center" class="Estilo26">-</td>
<?php }else{?>
	 
	  <td width="8%" bgcolor="#FFFFFF"><div align="center" class="Estilo26"><strong> <?php print("$diferencia");?></strong></div></td>
<?php }?>
  <td bgcolor="#FFFFFF"></td>
  </tr> 
 

  <?php 



$cant = $cant +1;
$recep = "";

$result->MoveNext(); // sdsd
$cantidad_bioq = "";

 }  

 $total_diferencia = $total_recepcionadas - $total_grabadas;
 if ($total_diferencia < 0){
$total_diferencia = ($total_diferencia * (-1));
 }


?>
   <tr>
    <td colspan="5" bgcolor="#FFFFFF"><hr noshade></td>
  </tr>
  <tr>
<td height="35" bgcolor="#FFFFFF"><div align="center" class="Estilo26 Estilo5 Estilo6">
  <div align="left"><strong> LABORATORIOS: <?php echo $cant;?></strong></div>
</div>  </td>
<td height="35" bgcolor="#FFFFFF"><div align="center"><span class="Estilo26 Estilo5 Estilo6"><strong><?php echo $total_recepcionadas;?></strong></span></div></td>
<td height="35" bgcolor="#FFFFFF"><div align="center"><span class="Estilo26 Estilo5 Estilo6"><strong><?php echo $total_grabadas;?></strong></span></div></td>
<td height="35" bgcolor="#FFFFFF"><div align="center"><span class="Estilo26 Estilo5 Estilo6"><strong><?php echo $total_diferencia;?></strong></span></div></td>
<td height="35" bgcolor="#FFFFFF">&nbsp;</td>
  </tr> 
</table>
</body>

<?php 




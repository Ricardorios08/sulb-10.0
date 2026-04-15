<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo2 {color: #000000}
.Estilo3 {font-size: 14px}
.Estilo4 {
	color: #FF0000;
	font-style: italic;
}
-->
</style>

<body>
<?php 

$dia_d = $_REQUEST['dia_d'];
$mes_d = $_REQUEST['mes_d'];
$anio_d = $_REQUEST['anio_d'];
 $fecha_desde = "20".$anio_d."-".$mes_d."-".$dia_d;
$fecha_desde_mostrar = $dia_d."/".$mes_d."/20".$anio_d;

$dia_h = $_REQUEST['dia_h'];
$mes_h = $_REQUEST['mes_h'];
$anio_h = $_REQUEST['anio_h'];

 $fecha_hasta = "20".$anio_h."-".$mes_h."-".$dia_h;
$fecha_hsata_mostrar = $dia_h."/".$mes_h."/20".$anio_h;


$valorizar = $_REQUEST['valorizar'];
$contra = $_REQUEST['contra'];

if (($valorizar == 1) and ($contra == "321")){
$mostrar_importe = "si"; 
}else{
$leyenda = "contraseña incorrecta";
	//include ("../../../alertas/campo_informacion2.php");
//	exit;
}
?>

<table width="850" border="0">
  <!--DWLayoutTable-->
<tr bordercolor="#0066FF" bgcolor="#FFFFFF">
  <td height="26" colspan="4" valign="top"><div align="center"><strong>PRESENTACION ABM </strong></div></td>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
  <td height="20" colspan="4" valign="top"><div align="center">ORDENES REALIZADAS DESDE: <?php ECHO $fecha_desde_mostrar;?> HASTA: <?php ECHO $fecha_hsata_mostrar;?></div></td>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="17" colspan="4" valign="top"><hr noshade></td>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
      <td width="34" height="17"></td>
      <td width="367"></td>
      <td width="185"></td>
      <td width="246"></td>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF"> 
<td><div align="center" class="Estilo2"><font size="2" face="Arial, Helvetica, sans-serif">Nº </font></div></td>
<td><div align="center" class="Estilo2"><font size="2" face="Arial, Helvetica, sans-serif">OBRA SOCIAL </font></div></td>
<!-- <td><div align="center" class="Estilo2"><font size="2" face="Arial, Helvetica, sans-serif">ESTIMATIVO </font></div></td> -->
<td><div align="center" class="Estilo2"><font size="2" face="Arial, Helvetica, sans-serif">ORDENES</font></div></td>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="17"><hr noshade></td>
    <td colspan="3"><hr noshade></td>
    <?php 




	include ("../../../conexiones/config.inc.php");

 $sql="select * from ordenes where fecha between '$fecha_desde' and '$fecha_hasta' and nro_os > 999 group by nro_os";
$result = $db->Execute($sql);



if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
	
$fecha=strtoupper($result->fields["fecha"]);
$nro_os=strtoupper($result->fields["nro_os"]);

$sql1="select * from datos_os where nro_os = $nro_os";
$result1 = $db->Execute($sql1);

$sigla=strtoupper($result1->fields["sigla"]);


$sql1="select * from datos_os_abm where nro_os = $nro_os";
$result1 = $db->Execute($sql1);

$sigla1=strtoupper($result1->fields["sigla"]);

if ($mostrar_importe == "si"){
include ("convenio.php");
include ("998677001.php");
}


if ($sigla1 != ""){

 $sql1="select count(cod_grabacion) as cantidad from ordenes where nro_os = $nro_os and fecha between '$fecha_desde' and '$fecha_hasta'";
$result2 = $db->Execute($sql1);

$cantidad=strtoupper($result2->fields["cantidad"]);

$total_cantidad = $total_cantidad + $cantidad;


if ($mostrar_importe == "si"){
$sql3 = "SELECT * from detalle where fecha between '$fecha_desde' AND '$fecha_hasta' and nro_os = '$nro_os'";
$result3 = $db->Execute($sql3);

if (!$result3) die("fallo3".$db->ErrorMsg());
	 while (!$result3->EOF)									 { 


$nro_practica=$result3->fields["nro_practica"];

   $sql1="select * from convenio_practica where cod_practica = $nro_practica";
$result1 = $db->Execute($sql1);
 $honorarios=strtoupper($result1->fields["honorarios"]);
  $categoria=strtoupper($result1->fields["categoria"]);

$contador_998 = $contador_998 + 1;

switch ($categoria){
case "1": {$valor = $honorarios * $vuh;break;}
case "2": {$valor = $honorarios * $vuh_especiales;break;}
case "3": {$valor = $honorarios * $uh_alta;break;}
}


 $total = $total + $valor;


$result3->MoveNext();


}




if ($acto_bioquimico == "SI"){
$total = $total + $valor_001;
}


switch ($toma_muestra){
	case "3":{//por o
$total = $total + $valor_998;
break;
}

	case "2":{//por p
$valor_998_1 = round($valor_998 * $contador_998,2);
$total = $total + $valor_998_1;
}

}

}



$total_presentado = $total_presentado + $total;
?>
  <tr bordercolor="#FFFFFF"> 
<td><div align="center"><?php print("$nro_os");?></div></td>
<td><div align="left"><?php print("$sigla");?></div></td>

<?php 
if ($mostrar_importe == "si"){?>
 <td><div align="right"><?php echo number_format($total,2);?></div>
<?php }?>

  <div align="right"></div></td>
<td><div align="center"><?php print("$cantidad");?></div></td>
<?php 

}


$contador_998 = "";
$total = "";
$valor = "";

$result->MoveNext();
	}

$valor_final = 0;
$valor_toma = 0;

?>
</tr>
  <tr bordercolor="#FFFFFF">
    <td height="17" colspan="3"></td>
    <td></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td height="17" colspan="4" valign="top"><hr noshade></td>
  </tr>
  
<tr bordercolor="#FFFFFF">
  <td height="20">&nbsp;</td>
  <td><div align="right" class="Estilo3"><strong>TOTAL A PRESENTAR </strong></div></td>
 <?php 
	if ($mostrar_importe == "si"){?>
	<td valign="top"><div align="center" class="Estilo3">
    <div align="right"><strong><?php echo number_format($total_presentado,2);?></strong></div>
  </div></td> 
  <?php }?>



  <td valign="top"><div align="center"><strong><?php print("$total_cantidad");?></strong></div></td>
</tr>
<tr bordercolor="#FFFFFF">
  <td height="20">&nbsp;</td>
  <td><!--DWLayoutEmptyCell-->&nbsp;</td>
  <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
</tr>
<tr bordercolor="#FFFFFF">
  <td height="20">&nbsp;</td>
  <td><!--DWLayoutEmptyCell-->&nbsp;</td>
  <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
</tr>
<tr bordercolor="#FFFFFF">
  <td height="20">&nbsp;</td>
  <td colspan="2"><div align="center" class="Estilo4">Nota: Los valores son una aproximaci&oacute;n en pesos de lo que tendria que facturar, no implica un monto exacto en ABM. No incluye coseguros </div></td>
  </tr>
</table>

</body>
</html>

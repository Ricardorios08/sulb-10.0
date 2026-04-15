<title>LIQUIDACIONES ANUALES</title><style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>

 <body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();"> 


 <table width="1008">
   <tr>
     <td width="732" height="33"><div align="center">RESUMEN DEL IMPORTE BRUTO LIQUIDACIONES ASOCIACION BIOQUIMICA DE MENDOZA. impreso el: <?php echo $fecha_hoy = date("d-m-Y"); ?></div></td>
   </tr>
 </table>


 <table width="1010" border="1" cellpadding="0" cellspacing="0">
 <tr>
    <td>N° </td>
    <td>LABORATORIO</td> 
  



<?php 
$desde = $_REQUEST['desde'];
$hasta= $_REQUEST['hasta'];

$dia = substr($desde,0,2);
$mes_inicial= substr($desde,3,2);
$anio_inicial = substr($desde,6,4);
$anio = substr($desde,8,2);
$anio_ini = substr($desde,8,2);

$fecha_desde = $anio_inicial."-".$mes_inicial."-".$dia;

$dia = substr($hasta,0,2);
$mes_final= substr($hasta,3,2);
$anio_final = substr($hasta,6,4);

$fecha_hasta = $anio_final."-".$mes_final."-".$dia;


$uno = $mes_inicial;
if ($uno == 13){$uno = 1;echo $anio = $anio + 1;}
	?>
<td><div align="center"><strong><?php echo $uno;?>  </strong>  <strong>/  <?php echo $anio;?></strong></div></td>
<?php 

$dos = $uno + 1;
if ($dos == 13){$dos = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?php echo $dos;?> /  <?php echo $anio;?></strong></div></td>
<?php 

$tres = $dos+ 1;
if ($tres== 13){$tres= 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?php echo $tres;?> /  <?php echo $anio;?></strong></div></td>
<?php 

$cuatro = $tres+ 1;
if ($cuatro == 13){$cuatro = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?php echo $cuatro;?> /  <?php echo $anio;?></strong></div></td>
<?php 

$cinco = $cuatro + 1;
if ($cinco== 13){$cinco = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?php echo $cinco;?> /  <?php echo $anio;?></strong></div></td>
<?php 
$seis = $cinco + 1;

if ($seis == 13){$seis = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?php echo $seis;?> /  <?php echo $anio;?></strong></div></td>
<?php 

$siete = $seis + 1;
if ($siete == 13){$siete = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?php echo $siete;?> /  <?php echo $anio;?></strong></div></td>
<?php 

$ocho = $siete+ 1;
if ($ocho == 13){$ocho = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?php echo $ocho;?> /  <?php echo $anio;?></strong></div></td>
<?php 

$nueve = $ocho + 1;
if ($nueve == 13){$nueve = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?php echo $nueve;?> /  <?php echo $anio;?></strong></div></td>
<?php 

$diez = $nueve+ 1;
if ($diez == 13){$diez = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?php echo $diez;?> /  <?php echo $anio;?></strong></div></td>
<?php 

$once= $diez+ 1;
if ($once == 13){$once = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?php echo $once;?> /  <?php echo $anio;?></strong></div></td>
<?php 

$doce = $once+ 1;
if ($doce == 13){$doce = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?php echo $doce;?> /  <?php echo $anio;?></strong></div></td>
<?php 



?>
<td bgcolor="#E4E4E4"><div align="center"><strong>TOTAL</strong></div></td>
 </tr>
<?php 


include ("../../../conexiones/config.inc.php");

$sql="select * from liquidacion where operacion = 100 and fecha between '$fecha_desde' and '$fecha_hasta' group by nro_laboratorio";
$result = $db_liq->Execute($sql);

if (!$result) die("fallo".$db_liq->ErrorMsg());
  while (!$result->EOF) {

$nro_laboratorio=$result->fields["nro_laboratorio"];


$sql="select * from datos_laboratorio where nro_laboratorio = '$nro_laboratorio'";
$result1 = $db_bq->Execute($sql);
$nombre_laboratorio=strtoupper($result1->fields["nombre_laboratorio"]);
$nombre_laboratorio =substr($nombre_laboratorio,0,22);


$uno = $mes_inicial;
if ($uno == 13){$uno = 1;echo $anio_1 = $anio_ini + 1;}else{$anio_1 = $anio_ini;}


$dos = $uno + 1;
if ($dos == 13){$dos = 1;$anio_2 = $anio_ini + 1;}else{$anio_2 = $anio_1;}


$tres = $dos+ 1;
if ($tres== 13){$tres= 1;$anio_3 = $anio_ini + 1;}else{$anio_3 = $anio_2;}


$cuatro = $tres+ 1;
if ($cuatro == 13){$cuatro = 1;$anio_4 = $anio_ini + 1;}else{$anio_4 = $anio_3;}


$cinco = $cuatro + 1;
if ($cinco== 13){$cinco = 1;$anio_5 = $anio_ini + 1;}else{$anio_5 = $anio_4;}

$seis = $cinco + 1;

if ($seis == 13){$seis = 1;$anio_6 = $anio_ini + 1;}else{$anio_6 = $anio_5;}


$siete = $seis + 1;
if ($siete == 13){$siete = 1;$anio_7 = $anio_ini + 1;}else{$anio_7 = $anio_6;}


$ocho = $siete+ 1;
if ($ocho == 13){$ocho = 1;$anio_8 = $anio_ini + 1;}else{$anio_8 = $anio_7;}


$nueve = $ocho + 1;
if ($nueve == 13){$nueve = 1;$anio_9 = $anio_ini + 1;}else{$anio_9 = $anio_8;}


$diez = $nueve+ 1;
if ($diez == 13){$diez = 1;$anio_10 = $anio_ini + 1;}else{$anio_10 = $anio_9;}


$once= $diez+ 1;
if ($once == 13){$once = 1;$anio_11 = $anio_ini + 1;}else{$anio_11 = $anio_10;}

$doce = $once+ 1;
if ($doce == 13){$doce = 1;$anio_12 = $anio_ini + 1;}else{$anio_12 = $anio_11;}

?>
<tr>
    <td><div align="center"><?php echo $nro_laboratorio;?></div></td>
    <td><?php echo $nombre_laboratorio;?></td>
  <?php 
	
	



$sql10 = "SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $uno AND anio = $anio_1 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $dos AND anio = $anio_2 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $tres AND anio = $anio_3 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $cuatro AND anio = $anio_4 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $cinco AND anio = $anio_5 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $seis AND anio = $anio_6 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $siete AND anio = $anio_7 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $ocho AND anio = $anio_8 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $nueve AND anio = $anio_9 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $diez AND anio = $anio_10 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $once AND anio = $anio_11 AND operacion = 800 AND motivo = 10";

$sql10 = $sql10." UNION ALL SELECT sum( importe ) AS uno FROM `liquidacion`  WHERE nro_laboratorio = $nro_laboratorio AND periodo = $doce AND anio = $anio_12 AND operacion = 800 AND motivo = 10";


$result10 = $db_liq->Execute($sql10);



if (!$result10) die("fallo".$db_liq->ErrorMsg());
  while (!$result10->EOF) {

$importe=$result10->fields["uno"];

$total_bioq = $total_bioq + $importe;

if ($importe > 0){
?><td><div align="right"><?php echo $importe;?></div></td><?php 
}
else
	  {
?><td><div align="center">&nbsp;</div></td><?php 
	  }
$result10->MoveNext(); //mueve registro matricula
 
 }

?><td bgcolor="#E4E4E4"><div align="right"><?php 
if ($total_bioq > 0){echo number_format($total_bioq,2);$total_bioq = "";}else{$total_bioq = "&nbsp;";}?></div></td>
  </tr><?php 

	/*
echo $sql10;
echo "<br>";
echo "<br>";
echo "<br>";
*/

?>





<?php 
$result->MoveNext(); //mueve registro matricula
 
 }


?>
</table>

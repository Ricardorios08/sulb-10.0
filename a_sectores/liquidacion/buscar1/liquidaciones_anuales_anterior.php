<style type="text/css">
<!--
.Estilo1 {font-family: Arial, Helvetica, sans-serif}
.Estilo2 {font-size: 12px}
.Estilo3 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo5 {color: #FFFFFF}
.Estilo6 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #FFFFFF; }
.Estilo36 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
.Estilo37 {color: #0000FF}
-->
</style>



<?$anio = "09";?>
<table width="723" border="0">

  <tr bgcolor="#FFFFFF">
    <td height="33" colspan="5"><div align="center" class="Estilo1"><strong>ASOCIACION BIOQUIMICA DE MENDOZA </strong></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="37" colspan="5"><div align="center" class="Estilo1"><strong>CONSULTA DE LIQUIDACIONES EMITIDO EL: <?ECHO $hoy;?><span class="Estilo3"></span></strong></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="5"><HR noshade></td>
  </tr>
  <tr bgcolor="#000099">
      <td width="136"><div align="center" class="Estilo1 Estilo2 Estilo5">FECHA LIQ</div></td>
    <td width="160"><div align="center" class="Estilo5"><span class="Estilo3">LIQ - MES</span></div></td>
    <td width="151"><div align="center" class="Estilo6">CUIT</div></td>
    <td width="183"><div align="center" class="Estilo6">IMPORTE</div></td>
    <td width="71"><div align="center"><span class="Estilo6">DETALLE</span></div></td>
  </tr>
  

<?


$anio= $_REQUEST['anio'];
$anio1 = $anio;
$periodo= $_REQUEST['periodo'];
$nro_laboratorio= $_REQUEST['nro_lab2'];
$hoy = date("d-m-Y");
include ("../../../conexiones/config.inc.php");



if (($anio != "") && ($periodo != "") && ($nro_laboratorio == "")) {
$sql2 = "SELECT DISTINCT(nro_laboratorio) FROM `liquidacion` WHERE  `anio` = '$anio' and periodo like '$periodo' and operacion like '200' order by nro_laboratorio, nro_liquidacion";}

elseif (($anio != "") && ($periodo != "") && ($nro_laboratorio != "")) {
$sql2 = "SELECT DISTINCT(nro_laboratorio) FROM `liquidacion` WHERE  `anio` = '$anio'  and `periodo` like '$periodo' and operacion like '200' and `nro_laboratorio` = '$nro_laboratorio' order by nro_laboratorio, nro_liquidacion";}

elseif (($anio == "") && ($periodo != "") && ($nro_laboratorio != "")) {
$sql2 = "SELECT DISTINCT(nro_laboratorio) FROM `liquidacion` WHERE  operacion like '200' and `periodo` like '$periodo' and `nro_laboratorio` = '$nro_laboratorio' order by nro_laboratorio, nro_liquidacion";}

elseif (($anio != "") && ($periodo == "") && ($nro_laboratorio == "")) {
$sql2 = "SELECT DISTINCT(nro_laboratorio) FROM `liquidacion` WHERE  operacion like '200' and `anio` = '$anio' order by nro_laboratorio, nro_liquidacion";}




elseif (($anio == "") && ($periodo == "") && ($nro_laboratorio != "")) {
$sql2 = "SELECT DISTINCT(nro_laboratorio) FROM `liquidacion` WHERE  operacion like '200' and `nro_laboratorio` = '$nro_laboratorio' order by nro_laboratorio, nro_liquidacion";}


elseif (($anio != "") && ($periodo == "") && ($nro_laboratorio != "")) {
$sql2 = "SELECT DISTINCT(nro_laboratorio) FROM `liquidacion` WHERE  `anio` = '$anio'  and operacion like '200' and `nro_laboratorio` = '$nro_laboratorio' order by nro_laboratorio, nro_liquidacion";}

elseif (($anio == "") && ($periodo != "") && ($nro_laboratorio == "")) {
$sql2 = "SELECT DISTINCT(nro_laboratorio) FROM `liquidacion` WHERE  `periodo` like '$periodo' and operacion like '200' order by nro_laboratorio, nro_liquidacion";}


elseif (($anio == "") && ($periodo == "") && ($nro_laboratorio == "")) {
$sql2 = "SELECT DISTINCT(nro_laboratorio) FROM `liquidacion` WHERE  `operacion` like '200' order by nro_laboratorio, nro_liquidacion";}


$result2 = $db_liq->Execute($sql2);


$nro_laboratorio= "";



if (!$result2) die("fallo".$db_liq->ErrorMsg());
  while (!$result2->EOF) {

$nro_lab = $nro_laboratorio;
$nro_laboratorio=strtoupper($result2->fields["nro_laboratorio"]); //1580

if ($nro_laboratorio == ""){
$leyenda = "No se encontraron liquidaciones en ese año o periodo";
include ("../../../alertas/campo_vacio.php");
exit;
}



 



include ("../../../conexiones/config.inc.php");
$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";

$result5 = $db_bq->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio = " (".$nro_laboratorio.") ". $nombre_laboratorio;


$sql9 = "SELECT * FROM afip WHERE  `nro_laboratorio` = $nro_laboratorio";
$result9 = $db_bq->Execute($sql9);
$cuit=ucwords($result9->fields["nro_afip"]);


//$periodo=strtoupper($result2->fields["periodo"]); //1580
//$anio=strtoupper($result2->fields["anio"]); //1580
//$anio1=strtoupper($result2->fields["anio"]); //1580
 $nro_liquidacion=strtoupper($result2->fields["nro_liquidacion"]); //1580


$importe=strtoupper($result2->fields["importe"]); //1580

 



 $sql1 = "SELECT * FROM `liquidacion` WHERE  `anio` = '$anio1' and periodo like '$periodo' and operacion like '1200' and nro_laboratorio = $nro_laboratorio order by nro_laboratorio, nro_liquidacion";
$result1 = $db_liq->Execute($sql1);
$importe=strtoupper($result1->fields["importe"]); //1580
$fecha_liq=strtoupper($result1->fields["fecha"]); //1580


  $dia3 = substr($fecha_liq,8,2);
 $mes3= substr($fecha_liq,5,2);
 $anio3= substr($fecha_liq,0,4);
$fecha_liq = $dia3."-".$mes3."-".$anio3;


$suma_importe = $suma_importe + $importe;
$suma_total= $suma_total + $importe; //para el final

if ($importe == ""){
$estado =  "CON DEUDA";
}
ELSE
	  {
$estado =  $importe;
	  }




?>

<?if ($nro_lab != $nro_laboratorio){?>
<tr bgcolor="#000099">
    <td colspan="5" bgcolor="#FFFFFF"><hr noshade></td>
  </tr>
  <tr bgcolor="#000099">
    <td colspan="5" bgcolor="#FFFFFF"><span class="Estilo37"><span class="Estilo36"><?ECHO $nombre_laboratorio;?></span></span></td>
  </tr>
<?}?>

<tr>
    <td><div align="center"><span class="Estilo3"><?ECHO $fecha_liq;?></span></div></td>
    <td><div align="center" class="Estilo3"><?ECHO $nro_liquidacion;?> (<?ECHO $periodo;?> - <?ECHO $anio1;?>)</div></td>
    <td><div align="center" class="Estilo3"><?ECHO $cuit;?></div></td>


	
<td><div align="right" class="Estilo3"> <?ECHO $estado;?></div></td>





    <td><div align="center"><a href="../buscar/buscar_liquidacion.php?nro_laboratorio=<?print("$nro_laboratorio");?>&&periodo=<?print("$periodo");?>&&anio=<?print("$anio1");?>&&nro_liquidacion=<?print("$nro_liquidacion");?>"><img src="../../../imagenes/office//005.ico" alt="Imprimir" border = "0" target= "_top"></a></div></td>
</tr>
  
<?

$suma_importe = "";
$result2->MoveNext();
  }


$result2->Close();

?>
	
<tr bgcolor="#E6E6E6">
  <td colspan="5"><HR noshade></td>
  </tr>
<tr bgcolor="#E6E6E6">
    <td colspan="3">&nbsp;</td>
    <td><div align="right" class="Estilo1"><strong>$ <?ECHO $suma_total;?></strong></div></td>
    <td>&nbsp;</td>
</tr>
</table>

<script languaje="vbscript">
mensaje = MsgBox("Error grave, se ha perdido la informacion",4117,"Error grave")
</script> 

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
<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">
<?$hoy = date("d-m-Y");?>

<table width="723" border="0">

  <tr bgcolor="#FFFFFF">
    <td colspan="5"><div align="center" class="Estilo1"><strong>ASOCIACION BIOQUIMICA DE MENDOZA </strong></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="5"><div align="center" class="Estilo1"><strong>CONSULTA DE IVA DE UNA LIQUIDACION EMITIDO EL: <?ECHO $hoy;?><span class="Estilo3"></span></strong></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="5"><HR noshade></td>
  </tr>
  <tr bgcolor="#000099">
      <td><div align="center" class="Estilo1 Estilo2 Estilo5">LABORATORIO</div></td>
    <td width="77"><div align="center" class="Estilo5"><span class="Estilo3">LIQ - MES</span></div></td>
    <td width="82"><div align="center" class="Estilo6">
      <div align="center" class="Estilo6">IVA</div>
    </div></td>
    <td width="76"><div align="center"><span class="Estilo6">IVA A FACT </span></div></td>
    <td width="91"><div align="center"><span class="Estilo6">DETALLE</span></div></td>
  </tr>
  

<?



$hoy = date("d-m-Y");
include ("../../../conexiones/config.inc.php");



 $sql2 = "SELECT * FROM iva_facturar WHERE   nro_liquidacion = $nro_liquidacion and periodo_liquidacion = $periodo and anio_liquidacion = $anio1 group by nro_laboratorio";

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


 $sql3 = "SELECT sum(iva) as iva, sum(importe_original) as iva_original  FROM iva_facturar WHERE   nro_liquidacion = $nro_liquidacion and periodo_liquidacion = $periodo and anio_liquidacion = $anio1 and nro_laboratorio = $nro_laboratorio";

$result3 = $db_liq->Execute($sql3);
$iva=$result3->fields["iva"]; 
$iva_original=$result3->fields["iva_original"]; 


include ("../../../conexiones/config.inc.php");
$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";

$result5 = $db_bq->Execute($sql4);
$nombre_laboratorio=strtoupper($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio = " (".$nro_laboratorio.") ". $nombre_laboratorio;



 $nro_liquidacion=strtoupper($result2->fields["nro_liquidacion"]); //1580


$importe=strtoupper($result2->fields["importe"]); //1580
$fecha_liq=strtoupper($result2->fields["fecha"]); //1580


  $dia3 = substr($fecha_liq,8,2);
 $mes3= substr($fecha_liq,5,2);
 $anio3= substr($fecha_liq,0,4);
$fecha_liq = $dia3."-".$mes3."-".$anio3;


$suma_iva_original = $suma_iva_original + $iva_original;
$suma_iva = $suma_iva + $iva; //para el final

if ($importe == ""){
$estado =  "CON DEUDA";
}
ELSE
	  {
$estado =  $importe;
	  }




?>


<tr>
    <td width="328"><div align="left"><span class="Estilo37"><span class="Estilo36"><?ECHO $nombre_laboratorio;?></span></span></div></td>
    <td><div align="center" class="Estilo3"><?ECHO $nro_liquidacion;?> (<?ECHO $periodo;?> - <?ECHO $anio1;?>)</div></td>
    <td><div align="center" class="Estilo3"><?ECHO $iva_original;?></div></td>
<td><div align="right"><span class="Estilo3"><?ECHO $iva;?></span></div></td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right"><span class="Estilo1"><strong>$ <?ECHO number_format($suma_iva_original,2);?></strong></span></div></td>
    <td><div align="right" class="Estilo1"><strong>$ <?ECHO number_format($suma_iva,2);?></strong></div></td>
    <td>&nbsp;</td>
</tr>
</table>

<script languaje="vbscript">
mensaje = MsgBox("Error grave, se ha perdido la informacion",4117,"Error grave")
</script> 

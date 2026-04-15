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

<?$hoy = date("d-m-Y");
$pagina = 1;
?>


 <body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();"> 
<table width="723" border="0">

  <tr bgcolor="#FFFFFF">
    <td colspan="5"><div align="center" class="Estilo1"><strong>ASOCIACION BIOQUIMICA DE MENDOZA </strong></div></td>
    <td><div align="center"><?echo $pagina;?></div></td>
    <td rowspan="2"><img src="../../../imagenes/logo.gif" width="118" height="74"></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="6"><div align="center" class="Estilo1"><strong>CONSULTA DE LIQUIDACIONES EMITIDO EL: <?ECHO $hoy;?><span class="Estilo3"></span></strong></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="7"><HR noshade></td>
  </tr>
  <tr bgcolor="#000099">
      <td><div align="center" class="Estilo1 Estilo2 Estilo5">LABORATORIO</div></td>
      <td><div align="center">
        <div align="center" class="Estilo1 Estilo2 Estilo5">FECHA LIQ</div>
      </div></td>
    <td width="81"><div align="center" class="Estilo5"><span class="Estilo3">LIQ - MES</span></div></td>
    <td width="99"><div align="center" class="Estilo6">CUIT</div></td>
    <td width="49"><div align="center" class="Estilo6">IVA</div></td>
    <td width="51"><div align="center"><span class="Estilo6">IMPORTE</span></div></td>
    <td width="71"><div align="center"><span class="Estilo6">DETALLE</span></div></td>
  </tr>
  

<?



$hoy = date("d-m-Y");
include ("../../../conexiones/config.inc.php");


if ($nro_liquidacion == ""){
$sql2 = "SELECT * FROM `liquidacion` WHERE  `operacion` like '1200' order by nro_laboratorio, nro_liquidacion";
}
else{
$sql2 = "SELECT * FROM `liquidacion` WHERE  `operacion` like '1200' and nro_liquidacion = $nro_liquidacion and periodo = $periodo and anio = $anio1 order by nro_laboratorio, nro_liquidacion";
}
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


/*$sql3 = "SELECT * FROM `liquidacion` WHERE  `operacion` like '200' and nro_liquidacion = $nro_liquidacion and periodo = $periodo and anio = $anio1";
$result3 = $db_liq->Execute($sql3);

if (!$result3) die("fallo".$db_liq->ErrorMsg());
  while (!$result3->EOF) {

$nro_factura=strtoupper($result3->fields["nro_factura"]); //1580
$nro_os=strtoupper($result3->fields["nro_os"]); //1580

 $sql4 = "SELECT * FROM composicion WHERE  `nro_factura` like '$nro_factura' and nro_os = $nro_os and   nro_laboratorio = $nro_laboratorio";
$result4 = $db_liq->Execute($sql4);
$iva=strtoupper($result4->fields["iva"]);

$suma_iva = $suma_iva + $iva;
$result3->MoveNext();


  }
 

*/

include ("../../../conexiones/config.inc.php");
$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";

$result5 = $db_bq->Execute($sql4);
$nombre_laboratorio=strtoupper($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio = " (".$nro_laboratorio.") ". $nombre_laboratorio;

$nombre_laboratorio = substr($nombre_laboratorio,0,32);

$sql9 = "SELECT * FROM afip WHERE  `nro_laboratorio` = $nro_laboratorio";
$result9 = $db_bq->Execute($sql9);
$cuit=$result9->fields["nro_afip"];


//$periodo=strtoupper($result2->fields["periodo"]); //1580
//$anio=strtoupper($result2->fields["anio"]); //1580
//$anio1=strtoupper($result2->fields["anio"]); //1580
 $nro_liquidacion=strtoupper($result2->fields["nro_liquidacion"]); //1580


$importe=strtoupper($result2->fields["importe"]); //1580
$fecha_liq=strtoupper($result2->fields["fecha"]); //1580


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


$cont = $cont + 1;

if ($cont == 47){

$pagina = $pagina + 1;
?>
<tr bgcolor="#FFFFFF">
    <td colspan="5"><div align="center" class="Estilo1"><strong>ASOCIACION BIOQUIMICA DE MENDOZA </strong></div></td>
    <td><div align="center"><?echo $pagina;?></div></td>
    <td rowspan="2"><img src="../../../imagenes/logo.gif" width="118" height="74"></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="6"><div align="center" class="Estilo1"><strong>CONSULTA DE LIQUIDACIONES EMITIDO EL: <?ECHO $hoy;?><span class="Estilo3"></span></strong></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="7"><HR noshade></td>
  </tr>
  <tr bgcolor="#000099">
      <td><div align="center" class="Estilo1 Estilo2 Estilo5">LABORATORIO</div></td>
      <td><div align="center">
        <div align="center" class="Estilo1 Estilo2 Estilo5">FECHA LIQ</div>
      </div></td>
    <td width="81"><div align="center" class="Estilo5"><span class="Estilo3">LIQ - MES</span></div></td>
    <td width="99"><div align="center" class="Estilo6">CUIT</div></td>
    <td width="49"><div align="center" class="Estilo6">IVA</div></td>
    <td width="51"><div align="center"><span class="Estilo6">IMPORTE</span></div></td>
    <td width="71"><div align="center"><span class="Estilo6">DETALLE</span></div></td>
  </tr>
<?

	$cont = 0;
}

?>


<tr>
    <td width="268"><div align="left"><span class="Estilo37"><span class="Estilo36"><?ECHO $nombre_laboratorio;?></span></span></div></td>
    <td width="76"><span class="Estilo3"><?ECHO $fecha_liq;?></span></td>
    <td><div align="center" class="Estilo3"><?ECHO $nro_liquidacion;?> (<?ECHO $periodo;?> - <?ECHO $anio1;?>)</div></td>
    <td><div align="center" class="Estilo3"><?ECHO $cuit;?></div></td>


	
<td><div align="right" class="Estilo3"> <?ECHO $suma_iva;?></div></td>






    <td><div align="right"><span class="Estilo3"><?ECHO $estado;?></span></div></td>
    <td><div align="center"><a href="../buscar/buscar_liquidacion.php?nro_laboratorio=<?print("$nro_laboratorio");?>&&periodo=<?print("$periodo");?>&&anio=<?print("$anio1");?>&&nro_liquidacion=<?print("$nro_liquidacion");?>"><img src="../../../imagenes/office//005.ico" alt="Imprimir" border = "0" target= "_top"></a></div></td>
</tr>
  
<?

$suma_importe = "";
$result2->MoveNext();
  }


$result2->Close();

?>
	
<tr bgcolor="#E6E6E6">
  <td colspan="7"><HR noshade></td>
  </tr>
<tr bgcolor="#E6E6E6">
    <td colspan="4">&nbsp;</td>
    <td colspan="3"><div align="right" class="Estilo1"><strong>$ <?ECHO $suma_total;?></strong></div></td>
  </tr>
</table>

<script languaje="vbscript">
mensaje = MsgBox("Error grave, se ha perdido la informacion",4117,"Error grave")
</script> 

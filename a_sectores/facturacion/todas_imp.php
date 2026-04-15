<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.Estilo1 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo2 {font-family: Arial, Helvetica, sans-serif}
.Estilo4 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; }
.Estilo5 {font-size: 12px}
.Estilo6 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo8 {font-size: 14px}
.Estilo10 {
	font-size: 14px;
	color: #FF0000;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>
<style type="text/css">
<!--
.Estilo1 {
	color: #000000;
	font-weight: bold;
}
.Estilo4 {font-size: 9px}
.Estilo5 {font-family: Arial, Helvetica, sans-serif}
.Estilo6 {font-size: 9px; font-family: Arial, Helvetica, sans-serif; }
.Estilo8 {
	font-family: Arial, Helvetica, sans-serif;
	color: #0000CC;
	font-weight: bold;
}
.Estilo12 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.Estilo13 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo13 {font-size: 9px; font-family: Arial, Helvetica, sans-serif; }
.Estilo16 {font-size: 10px}
.Estilo17 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo17 {font-size: 9px; font-family: Arial, Helvetica, sans-serif; }
.Estilo20 {
	font-size: 11px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo22 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 11px;
	color: #0000FF;
}
.Estilo23 {
	color: #FF6600;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 12px;
}
-->
</style>
<?php 

include ("../../conexiones/config.inc.php");

$nro_factura=STRTOUPPER($_REQUEST ['nro_factura']);

$orde=$_POST["orden"];
	for ($i=0;$i<count($orde);$i++)    
	{     
$orden = $orde[$i];    
	}

$hoy = date("d/m/y");

?>


<table width="850" height="86" border="0">
<tr bgcolor="#000099">
    <td height="21" colspan="16" valign="top" bgcolor="#999999"><div align="center"><span class="Estilo5"><span class="Estilo1">Listado de Facturas emitidas al: <?php ECHO $hoy;?></span> </span></div></td>
  </tr>
   <tr bgcolor="#DAFAFC">
     <td height="21" bgcolor="#EDEDED"><div align="center"><span class="Estilo6"></span></div>       <div align="center"></div>       <div align="center"><span class="Estilo6"></span></div></td>
     <td height="21" bgcolor="#EDEDED"><div align="center">os</div></td>
     <td height="21" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
     <td height="21" bgcolor="#EDEDED"><span class="Estilo16">Fac Ind</span> </td>
     <td height="21" bgcolor="#EDEDED"><div align="center" class="Estilo16">Tod Bq</div></td>
     <td height="21" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
     <td height="21" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
     <td height="21" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
     <td height="21" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
     <td height="21" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
     <td height="21" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>

     <td height="21" bgcolor="#EDEDED"><div align="center"><span class="Estilo17"></span></div></td>
    
     
   </tr>
   <tr bgcolor="#DAFAFC">
     <td width="8%" height="21" bgcolor="#EDEDED"><div align="center">       <div align="center"><span class="Estilo6 Estilo2  Estilo5">N&ordf; Factura</span></div>
     <td width="4%" bgcolor="#EDEDED"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Periodo</span></div></td>
     <td width="3%" bgcolor="#EDEDED"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Bioq</span></div></td>
     <td width="5%" bgcolor="#EDEDED"><div align="center" class="Estilo6 Estilo2  Estilo5">
       <div align="center">Ordenes</div>
     </div></td>
     <td width="4%" bgcolor="#EDEDED"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Fecha</span></div></td>
<td width="9%" bgcolor="#EDEDED"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Bruto</span></div></td>
<td width="9%" bgcolor="#EDEDED"><div align="center"><span class="Estilo6 Estilo2  Estilo5">IVA</span></div></td>

     <td width="9%" bgcolor="#EDEDED"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Total</span></div></td>
	      
          <td width="14%" bgcolor="#EDEDED"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Lote</span></div></td>
          <td width="7%" bgcolor="#EDEDED"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Estado<span class="Estilo6"></span></span></div></td>
          <td width="7%" bgcolor="#EDEDED"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Estadis./Exc</span></div></td>
     <td colspan="2" bgcolor="#EDEDED"><div align="center"><span class="Estilo6 Estilo2  Estilo5"><span class="Estilo6">Factura/</span></span><span class="Estilo6"><span class="Estilo6 Estilo2  Estilo5">Detalle/</span></span><span class="Estilo13"><span class="Estilo6 Estilo2  Estilo5">Resumen</span></span></div>       </td>
   </tr>
<?php 

$estado = '';
switch ($orden){
	case "nro_os":{
if ($nro_factura == "CIMESA"){
if (($mes == 13) && ($nro_factura != "")){
$sql="select * from factura where nro_os = '3764' or  nro_os = '37641' or nro_os = '4506' or nro_os = '4646' or nro_os = '4821' or nro_os = '4842'or nro_os = '4982' or nro_os = '5052' or nro_os = '5220'   ORDER by nro_os, fecha desc, periodo, anio";
}elseif (($mes != 13) && ($nro_factura != "")){
$sql="select * from factura where nro_os = '3764'  and periodo = $mes and anio = $anio or  nro_os = '37641' and  periodo = $mes and anio = $anio or nro_os = '4506'  and periodo = $mes and anio = $anio or nro_os = '4646'  and periodo = $mes and anio = $anio or nro_os = '4821'  and periodo = $mes and anio = $anio or nro_os = '4842' and periodo = $mes and anio = $anio or nro_os = '4982' and periodo = $mes and anio = $anio  or nro_os = '5052' and periodo = $mes and anio = $anio or nro_os = '5220' and periodo = $mes and anio = $anio ORDER by nro_os, fecha desc, periodo, anio";
	}
}
ELSE
{
	if (($mes == 13) && ($nro_factura == "")){
 $sql="select * from factura where anio = '$anio' ORDER by nro_os, fecha desc,  periodo, anio ";
}elseif (($mes == 13) && ($nro_factura != "")){
 $sql="select * from factura where (nro_factura like '$nro_factura') or (nro_os like '$nro_factura')   ORDER by nro_os, fecha desc, periodo, anio";
}elseif (($mes != 13) && ($nro_factura == "")){
$sql="select * from factura where periodo = $mes and anio = $anio ORDER by nro_os, fecha desc, periodo, anio";
}elseif (($mes != 13) && ($nro_factura != "")){
$sql="select * from factura where (nro_os = '$nro_factura' or nro_factura = '$nro_factura' or fecha = '$nro_factura')  and periodo = $mes and anio = $anio ORDER by nro_os, fecha desc, periodo, anio";
	}}

	break;
	}

	case "fecha":{
if ($nro_factura == "CIMESA"){
if (($mes == 13) && ($nro_factura != "")){
$sql="select * from factura where nro_os = '3764' or  nro_os = '37641' or nro_os = '4506' or nro_os = '4646' or nro_os = '4821' or nro_os = '4842'or nro_os = '4982' or nro_os = '5052'  or nro_os = '5220' ORDER by fecha, nro_os, periodo, anio";
}elseif (($mes != 13) && ($nro_factura != "")){
$sql="select * from factura where nro_os = '3764'  and periodo = $mes and anio = $anio or  nro_os = '37641'  and periodo = $mes and anio = $anio or nro_os = '4506'  and periodo = $mes and anio = $anio or nro_os = '4646' and   periodo = $mes and anio = $anio or nro_os = '4821'  and periodo = $mes and anio = $anio or nro_os = '4842' and periodo = $mes and anio = $anio or nro_os = '4982'  and periodo = $mes and anio = $anio  or nro_os = '5052'  and periodo = $mes and anio = $anio or nro_os = '5220'  and periodo = $mes and anio = $anio ORDER by fecha, nro_os , periodo, anio";
	}
}
ELSE
{
	if (($mes == 13) && ($nro_factura == "")){
$sql="select * from factura where anio = '$anio' ORDER by fecha, nro_os,  periodo, anio ";
}elseif (($mes == 13) && ($nro_factura != "")){
$sql="select * from factura where nro_factura like '$nro_factura'  ORDER by fecha, nro_os , periodo, anio";
}elseif (($mes != 13) && ($nro_factura == "")){
$sql="select * from factura where and periodo = $mes and anio = $anio ORDER by fecha, nro_os, periodo, anio";
}elseif (($mes != 13) && ($nro_factura != "")){
$sql="select * from factura where (nro_os = '$nro_factura' or nro_factura = '$nro_factura' or fecha = '$nro_factura')  and periodo = $mes and anio = $anio ORDER by fecha, nro_os, periodo, anio";
	}}

	break;
	}

		case "nro_factura":{
if ($nro_factura == "CIMESA"){
if (($mes == 13) && ($nro_factura != "")){
$sql="select * from factura where nro_os = '3764' or  nro_os = '37641' or nro_os = '4506' or nro_os = '4646' or nro_os = '4821' or nro_os = '4842'or nro_os = '4982' or nro_os = '5052' or nro_os = '5220'  ORDER by nro_factura , fecha, nro_os, periodo, anio";
}elseif (($mes != 13) && ($nro_factura != "")){
$sql="select * from factura where nro_os = '3764'  and periodo = $mes and anio = $anio or  nro_os = '37641'  and periodo = $mes and anio = $anio or nro_os = '4506'  and periodo = $mes and anio = $anio or nro_os = '4646' and  periodo = $mes and anio = $anio or nro_os = '4821' and periodo = $mes and anio = $anio or nro_os = '4842' and periodo = $mes and anio = $anio or nro_os = '4982' and periodo = $mes and anio = $anio  or nro_os = '5052'  and periodo = $mes and anio = $anio or nro_os = '5220'  and periodo = $mes and anio = $anio ORDER by nro_factura , fecha, nro_os , periodo, anio";
	}
}
ELSE
{
	if (($mes == 13) && ($nro_factura == "")){
$sql="select * from factura where  anio = '$anio' ORDER by nro_factura , fecha, nro_os,  periodo, anio ";
}elseif (($mes == 13) && ($nro_factura != "")){
$sql="select * from factura where (nro_factura like '$nro_factura') or (nro_os like '$nro_factura' )  ORDER by nro_factura , fecha, nro_os , periodo, anio";
}elseif (($mes != 13) && ($nro_factura == "")){
echo $sql="select * from factura where fecha between  '$desde' and '$hasta' ORDER by nro_factura , fecha, nro_os, periodo, anio";
}elseif (($mes != 13) && ($nro_factura != "")){
$sql="select * from factura where (nro_os = '$nro_factura' or nro_factura = '$nro_factura' or fecha = '$nro_factura')  and periodo = $mes and anio = $anio ORDER by nro_factura, fecha, nro_os, periodo, anio";
	}}

	break;
	}
}//cierra el switch case
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$nro_os1 = $nro_os;
$nro_os=strtoupper($result->fields["nro_os"]);

$sql5="select * from op_facturacion where nro_os = '$nro_os'";
$result5 = $db->Execute($sql5);
$post_factura=strtoupper($result5->fields["post_factura"]);


$nro_factura=strtoupper($result->fields["nro_factura"]);
$fecha=strtoupper($result->fields["fecha"]);

$dia=substr($fecha,8,2);
$mes=substr($fecha,5,2);
$anio=substr($fecha,0,4);
$fecha = $dia."-".$mes."-".$anio;

$periodo=strtoupper($result->fields["periodo"]);
$anio=strtoupper($result->fields["anio"]);
$iva=strtoupper($result->fields["iva"]);
$tipo_fact=strtoupper($result->fields["tipo_fact"]);
$marca=strtoupper($result->fields["marca"]);
$lote=strtoupper($result->fields["lote"]);
$leyenda1=strtoupper($result->fields["leyenda"]);



$total=strtoupper($result->fields["total"]);
$bruto = $total - $iva;

if ($tipo_fact == "A"){
	$cont_a = $cont_a + 1;
}

$cant_bioq=strtoupper($result->fields["cant_bioquimicos"]);
$cant_ordenes=strtoupper($result->fields["cant_ordenes"]);
$estado=strtoupper($result->fields["estado"]);

$fecha_liquidacion=strtoupper($result->fields["fecha_liquidacion"]);
$nro_liquidacion=strtoupper($result->fields["nro_liquidacion"]);
$mes_liquidacion=strtoupper($result->fields["mes_liquidacion"]);
$anio_liquidacion=strtoupper($result->fields["anio_liquidacion"]);




$sql1="select nro_recibo from detalle_recibo where nro_factura_afectado = $nro_factura and tipo_fact = '$tipo_fact'";
$result1 = $db->Execute($sql1);

$nro_recibo=$result1->fields["nro_recibo"];

if ($estado == "COBRADA"){
	$estado = "Cob.";
}

if ($estado == "LIQUIDADA"){
	$estado = "Liq. ".$nro_liquidacion."  ".$mes_liquidacion."/".$anio_liquidacion;
	$a1 = 1;
	}

$sql1="select * from datos_os where nro_os like '$nro_os'";
$result1 = $db->Execute($sql1);
$sigla=strtoupper($result1->fields["sigla"]);
$denominacion=strtoupper($result1->fields["denominacion"]);

$CONT = $CONT +1;

 if ($nro_os1 != $nro_os){?>
   <tr>
     <td height="42" colspan="15" valign="top"><span class="Estilo10"><?php print("$nro_os");?> - <?php print("$sigla");?> - <?php print("$denominacion");?></span>       <hr>     </td>
   </tr>
<?php }?>

   <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#FFFFFF'; this.style.color='black'">

<?php if ($tipo_fact == "A"){?>
<td><span class="Estilo22"><?php print("$tipo_fact");?></span> <span class="Estilo4"><span class="Estilo16">- <?php print("$nro_factura");?></span></span></td>
<?php }else{?>
<td><span class="Estilo23"><?php print("$tipo_fact");?></span> <span class="Estilo4"><span class="Estilo16">- <?php print("$nro_factura");?></span></span></td>
<?php }?>


   <td><div align="left" class="Estilo6">
	  <div align="center"><strong>
<a href="../facturacion/diskette/composicion_os.php?tipo_fact=<?php print("$tipo_fact");?>&&nro_os=<?php print("$nro_os");?>&&sigla=<?php print("$sigla");?>&&nro_factura=<?php print("$nro_factura");?>&&nro_os=<?php print("$nro_os");?>&&periodo=<?php print("$periodo");?>&&anio=<?php print("$anio");?>&&fecha=<?php print("$fecha");?>&&total=<?php print("$total");?>&&iva=<?php print("$iva");?>"> <?php print("$periodo");?> - <?php print("$anio");?></a>
	  
	
	</div>      </td>

    <td><div align="center" class="Estilo6"><?php print("$cant_bioq");?></div></td>
    <td><div align="center" class="Estilo6"><a href="../facturacion/diskette/composicion_indiv.php?nro_os=<?php print("$nro_os");?>&&sigla=<?php print("$sigla");?>&&nro_factura=<?php print("$nro_factura");?>&&nro_os=<?php print("$nro_os");?>&&periodo=<?php print("$periodo");?>&&anio=<?php print("$anio");?>&&fecha=<?php print("$fecha");?>&&total=<?php print("$total");?>&&iva=<?php print("$iva");?>"><?php print("$cant_ordenes");?></a></div></td>
    <td><div align="right" class="Estilo6"><span class="Estilo4 Estilo5">
	<a href="../facturacion/diskette/composicion.php?tipo_fact=<?php print("$tipo_fact");?>&&nro_os=<?php print("$nro_os");?>&&sigla=<?php print("$sigla");?>&&nro_factura=<?php print("$nro_factura");?>&&nro_os=<?php print("$nro_os");?>&&periodo=<?php print("$periodo");?>&&anio=<?php print("$anio");?>&&fecha=<?php print("$fecha");?>&&total=<?php print("$total");?>&&iva=<?php print("$iva");?>"><?php print("$fecha");?></a>
	
	</span></div></td>
   <td><div align="right" class="Estilo6">     <?php echo number_format($bruto,2);?></div>     </td>

    <?php IF ($iva == "0.00"){?>
   <td><div align="center" class="Estilo6">
     <div align="right">-</div>
   </div>     </td>
<?php }else{?>
<td><div  class="Estilo6">
     <div align="right"><?php echo number_format($iva,2);?></div>
   </div>     </td>

<?php }?>

   	<td><div align="right" class="Estilo8 Estilo6">
   	  <div align="right"><strong><?php echo number_format($total,2);?></strong></div>
   	</div></td>

	<td><div align="center" class="Estilo20"><?php echo $lote;?></div></td>
	<td><div align="center"><span class="Estilo6">

<?php 	if ($a1 == 1){?>
	<a href="../tesoreria/buscar_recibos1.php?nro_factura=<?php print("$nro_recibo");?>&&orden=nro_factura"><?php print("$estado");?></a>
	<?php }else{?>
	
	<?php print("$estado");?> 	
	<a href="../tesoreria/buscar_recibos1.php?nro_factura=<?php print("$nro_recibo");?>&&orden=nro_factura"><?php print("$nro_recibo");?></a>
	  <?php }?>
		</span></div></td>
	<td width="6%"> <div align="center" class="Estilo6"><font color="#000000" size="2"><font color="#000000" size="2"><a href="../facturacion/diskette/estadisticas.php?nro_os=<?php print("$nro_os");?>&&sigla=<?php print("$sigla");?>&&nro_factura=<?php print("$nro_factura");?>&&nro_os=<?php print("$nro_os");?>&&periodo=<?php print("$periodo");?>&&anio=<?php print("$anio");?>&&fecha=<?php print("$fecha");?>&&total=<?php print("$total");?>&&iva=<?php print("$iva");?>"><img src="../../imagenes/office//1104.ico" alt="Imprimir" border = "0" target= "_top"></a> &nbsp;<a href="../facturacion/diskette/excel.php?nro_os=<?php print("$nro_os");?>&&sigla=<?php print("$sigla");?>&&nro_factura=<?php print("$nro_factura");?>&&nro_os=<?php print("$nro_os");?>&&periodo=<?php print("$periodo");?>&&anio=<?php print("$anio");?>&&fecha=<?php print("$fecha");?>&&total=<?php print("$total");?>&&iva=<?php print("$iva");?>"><img src="../../imagenes/office//041.ico" alt="Imprimir" border = "0" target= "_top"></a></font></font> </div></td>
	<td colspan="2"><div align="center"><font color="#000000" size="2"></font></div>	  <div align="center"><font color="#000000" size="2"><a href="../facturacion/papel/factura_papel.php?nro_os=<?php print("$nro_os");?>&&tipo_fact=<?php print("$tipo_fact");?>&&nro_factura=<?php print("$nro_factura");?>&&sigla=<?php print("$sigla");?>&&cant_bioq=<?php print("$cant_bioq");?>&&cant_ordenes=<?php print("$cant_ordenes");?>&&fecha=<?php print("$fecha");?>&&total=<?php print("$total");?>&&iva=<?php print("$iva");?>"><img src="../../imagenes/office//004.ico" alt="Imprimir" border = "0" target= "_top"></a> &nbsp;&nbsp;&nbsp;<a href="../facturacion/papel/factura_detalle.php?nro_os=<?php print("$nro_os");?>&&nro_factura=<?php print("$nro_factura");?>&&leyenda1=<?php print("$leyenda1");?>&&sigla=<?php print("$sigla");?>&&tipo_fact=<?php print("$tipo_fact");?>&&cant_ordenes=<?php print("$cant_ordenes");?>&&fecha=<?php print("$fecha");?>&&total=<?php print("$total");?>&&iva=<?php print("$iva");?>"><img src="../../imagenes/office//521.ico" alt="Imprimir Detalle" border = "0" target= "_top"></a>
	  <?php if (($leyenda1 != "ANULADA") OR ($leyenda1 != "CAPITA") OR ($leyenda1 != "CONCEPTOS")){?>
&nbsp;&nbsp;      &nbsp;&nbsp;<a href="../facturacion/factura_resumen/buscar_factura.php?&&nro_factura=<?php print("$nro_factura");?>&&tipo_fact=<?php print("$tipo_fact");?>&&nro_os=<?php print("$nro_os");?>"><img src="../../imagenes/office//985.ico" alt="Resumen" border = "0" target= "_top"></a>
      <?php }?>
	</font></div>	  <div align="center"><font color="#000000" size="2">
	  
	</font></div></td>
	<td width="4%"> <div align="center"><font color="#000000" size="2"><a href="../facturacion/papel/factura_papel.php?nro_os=<?php print("$nro_os");?>&&nro_factura=<?php print("$nro_factura");?>&&sigla=<?php print("$sigla");?>&&cant_bioq=<?php print("$cant_bioq");?>&&cant_ordenes=<?php print("$cant_ordenes");?>&&fecha=<?php print("$fecha");?>&&total=<?php print("$total");?>&&iva=<?php print("$iva");?>"> 
	</a>

<?php if($post_factura == "DISKETTE"){?>
<a href="../facturacion/diskette/diskette.php?nro_os=<?php print("$nro_os");?>&&tipo_fact=<?php print("$tipo_fact");?>&&sigla=<?php print("$sigla");?>&&nro_factura=<?php print("$nro_factura");?>&&nro_os=<?php print("$nro_os");?>&&periodo=<?php print("$periodo");?>&&anio=<?php print("$anio");?>&&fecha=<?php print("$fecha");?>&&total=<?php print("$total");?>&&iva=<?php print("$iva");?>"><img src="../../imagenes/office//003.ico" alt="Imprimir" border = "0" target= "_top"></a>
<?php }?>

</font></div></td>
  </tr>
   

<?php 
	$total_periodo = $total_periodo + $total;
	$result->MoveNext();
	}


	?>

	<tr>
	  <td colspan="16" bgcolor="#999999"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
	<tr>
     <td colspan="9"><div align="center"><span class="Estilo12"><?php  ECHO "Cantidad de Facturas Ingresadas: ".$CONT;?></span></div></td>
     <td colspan="7"><div align="center"><span class="Estilo5"><strong><?php  ECHO "Total Periodo: ".number_format($total_periodo,2);?></strong></span></div></td>
   </tr>
</table>


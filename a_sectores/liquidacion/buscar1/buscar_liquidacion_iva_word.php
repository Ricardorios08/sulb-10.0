<style type="text/css">

H1.SaltoDePagina
{
PAGE-BREAK-AFTER: always
}

<!--
.Estilo2 {font-size: 10px}
.Estilo7 {font-size: 10px; font-family: Arial, Helvetica, sans-serif; }
-->

.Estilo11 {font-size: 12px}
.Estilo12 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo13 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 12px;
}
.Estilo23 {
	font-size: 12px;
	font-weight: bold;
	font-style: italic;
}
.Estilo25 {font-weight: bold; color: #000000;}
.Estilo26 {font-family: Arial, Helvetica, sans-serif}
.Estilo3 {
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #000000;
}
</style>

<head>


</head>

 
<?


$b = "IVA ".$nro_laboratorio.".xls";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$b");


$band_deb = 1;
$band_acred = 1;

$band = 1;
$bande = 1;
$bande1 = 1;
$bande2=1;
$banderin = 1;
$parcial_a = "";
$total_excedente ="";
$importe = "";


$tot_ex = "";
$total_iva = "";
$total_a_cuenta = "";


if ($base == 10){
include ("../../../conexiones/config.inc.php");
}



$liquidacion = "liquidacion";


$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";

$result5 = $db_bq->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio = " (".$nro_laboratorio.") ". $nombre_laboratorio;
	
$sql6 = "SELECT * FROM `afip` WHERE  `nro_laboratorio` = $nro_laboratorio";
$result6 = $db_bq->Execute($sql6);
$sit_iva=ucwords($result6->fields["sit_iva"]);



	?>

<!-- 4524100 hotel -->

<table width="800" border="0" bgcolor="#FFFFFF">
  <tr bgcolor="#C9FADF">
    <td colspan="2" bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo11">ASOCIACION BIOQUIMICA DE MENDOZA</div>      <div align="center"><span class="Estilo11"><span class="Estilo11"></span></span></div></td>
  </tr>
  <tr bgcolor="#C9FADF">
    <td colspan="2" bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo13 Estilo11">PLANILLA TOTAL DE EXENTOS Y GRAVADOS CON IVA </div></td>
  </tr>
  <tr>
    <td width="499" height="20" bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo23">
      <div align="left" class="Estilo26">Cuenta: <?echo $nombre_laboratorio;?>      </div>
    </div></td>
    <td width="150" bgcolor="#FFFFFF" scope="col"><div align="center"><span class="Estilo13">Periodo: <?echo $periodo_liq;?> - 20<?echo $anio_liquidacion_liq;?> </span></div></td>
  </tr>
  <tr>
    <td height="20" colspan="2" bgcolor="#FFFFFF" scope="col"><HR noshade></td>
  </tr>
</table>
  <!--DWLayoutTable-->
  <tr bgcolor="#FFFFFF" class="Estilo7">
    <td colspan="11"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="10"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>

	<table width="800" border="0" bgcolor="#FFFFFF">
	  <!--DWLayoutTable-->


<?if ($sit_iva == "1"){?>
<tr bgcolor="#FFFFFF" class="Estilo12">
  <td width="173"><div align="center" class="Estilo2">O.Social</div></td>
  <td width="81"><div align="center"><span class="Estilo2">Liq.</span></div></td>
  <td width="80"><div align="center"><span class="Estilo7">%</span></div></td>
  <td width="76"><div align="center" class="Estilo2">Pago</div></td>
  <td width="78"><div align="center" class="Estilo2">Factura.</div></td>
  <td width="43"><div align="center" class="Estilo2">Fec. Fact </div></td>
  <td width="54"><div align="center" class="Estilo2">Exento</div></td>
  <td width="50"><div align="center"><span class="Estilo2">Gravado </span></div></td>
  <td width="43"><div align="center" class="Estilo2">IVA</div></td>
   <td width="80"><div align="center" class="Estilo2">Importe</div></td>
  </tr>

<?}else{
?><tr bgcolor="#FFFFFF" class="Estilo12">
  <td width="173"><div align="center" class="Estilo2">O.Social</div></td>
  <td width="81"><div align="center"><span class="Estilo2">Liq.</span></div></td>
  <td width="80"><div align="center"><span class="Estilo7">%</span></div></td>
  <td width="76"><div align="center" class="Estilo2">Pago</div></td>
  <td width="78"><div align="center" class="Estilo2">Factura.</div></td>
  <td width="43"><div align="center" class="Estilo2">Fec. Fact </div></td>
  <td width="54"><div align="center" class="Estilo2"></div></td>
  <td width="50"><div align="center"><span class="Estilo2">Imp. Original</span></div></td>
  <td width="43"><div align="center" class="Estilo2">IVA</div></td>
   <td width="80"><div align="center" class="Estilo2">Importe</div></td>
  </tr>

<?

}
 $sql2 = "SELECT * FROM $liquidacion WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion_liq' and periodo like '$periodo_liq' and operacion = 200";
// order by nro_laboratorio, nro_liquidacion, nro_factura, operacion ";

$result2 = $db_liq->Execute($sql2);



//trae las matriculas......................................................
if (!$result2) die("fallo".$db_liq->ErrorMsg());
  while (!$result2->EOF) {

$operacion=strtoupper($result2->fields["operacion"]); //1580
$importe=strtoupper($result2->fields["importe"]); //1580
$nro_factura=strtoupper($result2->fields["nro_factura"]); //1580
$motivo=strtoupper($result2->fields["motivo"]); //1580
$cod_operacion= $result2->fields["cod_operacion"];
$ajuste= $result2->fields["motivo"];
$tipo_ajuste= $result2->fields["tipo_pago"];
$nro_os=$result2->fields["nro_os"];
$tipo_pago=$result2->fields["tipo_pago"];
$acumulado_mensual=$result2->fields["acumulado_mensual"];

$fecha=$result2->fields["fecha"];
$porcentaje=$result2->fields["porcentaje"];
$bruto=$result2->fields["bruto"];
$transaccion =$result2->fields["tipo_pago"];
$fecha_movimiento=$result2->fields["fecha_movimiento"];

$importe_original=$result2->fields["importe"];
$dto_liq=$result2->fields["bruto"];
$pago_caja=$result2->fields["acumulado_mensual"];

$nro_liquidacion=$result2->fields["nro_liquidacion"];
$periodo_liquidacion=$result2->fields["periodo"];
$anio_liquidacion=$result2->fields["anio"];


$saldo_deuda=$result2->fields["saldo_deuda"];
$importe_liq=$result2->fields["importe"];
$nro_factu=strtoupper($result2->fields["nro_factura"]); //1580

$dia_1 = substr($fecha,8,2);
$mes_2 = substr($fecha,5,2);
$anio_3 = substr($fecha,0,4);
 $fecha = $dia_1."-".$mes_2."-".$anio_3;

$dia_6 = substr($fecha_movimiento,8,2);
$mes_6 = substr($fecha_movimiento,5,2);
$anio_6 = substr($fecha_movimiento,0,4);
$fecha_movimiento = $dia_6."-".$mes_6."-".$anio_6;





$ex_capita = "";
$a_cuenta = "";

$sql1="select * from factura where nro_factura = '$nro_factura' and nro_os = $nro_os"; //4
$result1 = $db_fa->Execute($sql1);

$nro_os=strtoupper($result1->fields["nro_os"]); // 2617
$fecha_pago_fact=strtoupper($result1->fields["fecha_pago_fact"]); // 2617
$fecha_original=strtoupper($result1->fields["fecha"]); // 2617

$dia2 = substr($fecha_original,8,2);
$mes2 = substr($fecha_original,5,2);
$anio2 = substr($fecha_original,0,4);
$fecha_original_fact = $dia2."-".$mes2."-".$anio2;


$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;



if ($fecha_pago_fact == "-/0-00/0"){
$sql12="select * from factura where nro_os like '$nro_os' and nro_factura = $nro_factura";
$result12 = $db_fa->Execute($sql12);
$fecha_pago_fact=strtoupper($result12->fields["fecha"]);
$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;
}
elseif ($fecha_pago_fact == "--"){
$sql12="select * from factura where nro_os like '$nro_os' and nro_factura = $nro_factura";
$result12 = $db_fa->Execute($sql12);
$fecha_pago_fact=strtoupper($result12->fields["fecha"]);
$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;
}
elseif ($fecha_pago_fact == ""){
$sql12="select * from factura where nro_os like '$nro_os' and nro_factura = $nro_factura";

$result12 = $db_fa->Execute($sql12);
$fecha_pago_fact=strtoupper($result12->fields["fecha"]);
$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;
}



$sql123="select *  from composicion where nro_os like '$nro_os' and nro_factura = $nro_factura and nro_laboratorio = $nro_laboratorio";
$result123 = $db_liq->Execute($sql123);

$iva=$result123->fields["iva"];
$neto_gravado=$result123->fields["neto_gravado"];


if ($sit_iva == 1){
$exento=$result123->fields["exento"];
}else
	  {
$exento=$result123->fields["exento"];
	  }

$tipo_iva=$result123->fields["tipo_iva"];

if ($iva > 0) {
$marca = "*";
}else{
$marca = "";
}

/*echo "<br>";
echo "**** ".$bruto_iva = $bruto_iva + $iva;
echo " orig ".$importe_original;
echo "<br>";
*/

if ($importe_original != 0){

if ($importe_original != $bruto_iva){

$porcentaje = $bruto * 100 / $importe_original;

$iva_porc = round(($iva * $porcentaje / 100),2);
$iva_porc1 = round(($iva * $porcentaje / 100),2);
$neto_porc = round(($neto_gravado * $porcentaje / 100),2);
$exento_porc = round(($exento * $porcentaje / 100),2);
}else{
$iva_porc = round(($iva * $porcentaje / 100),2);
$neto_porc = round(($neto_gravado * $porcentaje / 100),2);
$exento_porc = round(($exento * $porcentaje / 100),2);
}


}

if ($sit_iva == 1){
$iva_porc = $iva_porc;
}else{
$iva_porc = $iva;
$porcentaje = 100;

}


if (($iva > 0.00) and ($neto_gravado == 0.00) and ($exento == 0.00)){
	$exento = $importe;
	}





if ($marca == "*"){
/*$total_iva = $total_iva + $iva;
$total_neto_gravado = $total_neto_gravado + $neto_gravado;
$total_exento = $total_exento + $exento;

$total_iva = ($total_iva * $porcentaje / 100);
$total_neto_gravado = ($total_neto_gravado * $porcentaje / 100);
$total_exento = ($total_exento * $porcentaje / 100);*/
}



$sql12="select * from datos_os where nro_os like '$nro_os'";
$result12 = $db_os->Execute($sql12);
$sigla=strtoupper($result12->fields["sigla"]);
$sigla = substr($sigla,0,7);

if ($tipo_pago != "PARCIAL A CUENTA"){
$ex_capita = $importe - $bruto;
}

if ($tipo_pago == "PARCIAL A CUENTA"){
$tipo_pago = "PARC.A/CTA";
$parcial_a = $importe - $bruto;
$a_cuenta = $importe - $bruto;
$ex_capita = "";
$total_a_cuenta = $total_a_cuenta + $a_cuenta;
}

if (($tipo_pago == "COMPLETA") AND (($bruto + $iva) < $importe)){
$ex_capita = "";
$a_cuenta = $importe - $bruto;
$total_a_cuenta = $total_a_cuenta + $a_cuenta;
}


if ($marca == "*"){
$total_ng = $total_ng + $neto_porc;
$total_exe = $total_exe + $exento_porc;
$total_iva = $total_iva + $iva_porc;
$total_total = $total_total + $bruto;
}else{
$total_ng1 = $total_ng1 + $neto_porc;
$total_exe1 = $total_exe1 + $exento_porc;
$total_iva1= $total_iva1 + $iva_porc;
$total_total1 = $total_total1 + $bruto;
}



if ($iva_porc == 0.00){
$iva_porc = "-";
}else{
$iva_porc = number_format($iva_porc,2);
}


if ($sit_iva == "1"){


?>

<tr class="Estilo7">
    <td class="Estilo7"><span class="Estilo7"><?echo $sigla." (".$nro_os.")";?></span></td>
    <td class="Estilo7"><div align="center"><?echo $nro_liquidacion;?>-<?echo $periodo_liquidacion;?>/<?echo $anio_liquidacion;?></div></td>
    <td class="Estilo7"><div align="center"><?echo number_format($porcentaje,2);?></div></td>
    <td class="Estilo7"><div align="center">COMPLETA
        </div>
      <div align="center"></div>
    <div align="center" class="Estilo11"></div></td>
    <td><div align="center"><span class="Estilo7"><?echo $nro_factura;?> <?echo $marca;?></span></div></td>
    <td><span class="Estilo7"><?echo $fecha_original_fact;?></span></td>
    <td><div align="right" class="Estilo2" > <?echo number_format($exento_porc,2);?>  </div></td>
    <td><div align="right"><span class="Estilo2"><?echo number_format($neto_porc,2);?></span></div></td>
    <td><div align="right" class="Estilo2"> <?echo $iva_porc;?> </div></td>
     <td><div align="right" class="Estilo2"><?echo number_format($bruto,2);?> </div></td>
  </tr>


<?


}else{
?>

<tr class="Estilo7">
    <td class="Estilo7"><span class="Estilo7"><?echo $sigla." (".$nro_os.")";?></span></td>
    <td class="Estilo7"><div align="center"><?echo $nro_liquidacion;?>-<?echo $periodo_liquidacion;?>/<?echo $anio_liquidacion;?></div></td>
    <td class="Estilo7"><div align="center"><?echo number_format($porcentaje,2);?></div></td>
    <td class="Estilo7"><div align="center">COMPLETA
        </div>
      <div align="center"></div>
    <div align="center" class="Estilo11"></div></td>
    <td><div align="center"><span class="Estilo7"><?echo $nro_factura;?> <?echo $marca;?></span></div></td>
    <td><span class="Estilo7"><?echo $fecha_original_fact;?></span></td>
    <td><div align="right" class="Estilo2" > <? number_format($exento_porc,2);?>  </div></td>
    <td><div align="right"><span class="Estilo2"><? echo number_format($importe_original,2);?></span></div></td>
    <td><div align="right" class="Estilo2"> -<?echo $iva_porc;?> </div></td>
     <td><div align="right" class="Estilo2"><?echo number_format($bruto,2);?> </div></td>
  </tr>


<?


}


//}

$result2->MoveNext();
  }

$ng = $ng + $total_ng + $total_ng1;
$ex = $ex + $total_exe + $total_total1;
$iv = $iv + $total_iva + $total_iva1;
$to = $to + $total_total + $total_total1;

$total_facA = $total_ng + $total_iva;

$to_exentoA = $total_exe + $total_exe1;

if ($sit_iva == 1){
?><tr class="Estilo7">
  <td colspan="5" class="Estilo7">&nbsp;</td>
  <td class="Estilo7">&nbsp;</td>
  <td colspan="4"><hr noshade></td>
  </tr>
  <tr class="Estilo7">
  <td colspan="6" class="Estilo7"><div align="right"><span class="Estilo13 Estilo11"><span class="Estilo25">FACTURAS LIQUIDADAS CON IVA</span></span></div></td>
  <td><div align="right" class="Estilo2" > <?echo number_format($total_exe,2);?> </div></td>
  <td><div align="right"><span class="Estilo2"><?echo number_format($total_ng,2);?></span></div></td>
  <td><div align="right" class="Estilo2"> <?echo number_format($total_iva,2);?> </div></td>
  <td><div align="right" class="Estilo2"><?echo number_format($total_total,2);?> </div></td>
</tr>
  <tr>
     <td colspan="6" valign="top"><div align="right"><span class="Estilo13 Estilo11"><span class="Estilo25">FACTURAS LIQUIDADAS SIN IVA </span></span></div></td>
     <td valign="top" bgcolor="#FFFFFF" class="Estilo7"><div align="right" class="Estilo2"><?echo number_format($total_total1,2);?></div></td>
     <td valign="top" bgcolor="#FFFFFF" class="Estilo7"><div align="right"><span class="Estilo2">-</span></div></td>
     <td valign="top" bgcolor="#FFFFFF" class="Estilo7"><div align="right">-</div></td>
     <td valign="top" bgcolor="#FFFFFF" class="Estilo7"><div align="right" class="Estilo2"><?echo number_format($total_total1,2);?></div></td>
   </tr>

<?}
?>


   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td colspan="4" valign="top" bgcolor="#FFFFFF" class="Estilo7"><hr noshade></td>
     </tr>
<?if ($sit_iva == 1){?>
<tr>
     <td colspan="6" valign="top"><div align="right"><span class="Estilo13 Estilo11"><span class="Estilo25">SUBTOTAL</span></span></div></td>
     <td valign="top" bgcolor="#FFFFFF" class="Estilo7"><div align="right" class="Estilo2" >       <?echo number_format($ex,2);?> </div></td>
     <td valign="top" bgcolor="#FFFFFF" class="Estilo7"><div align="right"><span class="Estilo2"><?echo number_format($ng,2);?></span></div></td>
     <td valign="top" bgcolor="#FFFFFF" class="Estilo7"><div align="right" class="Estilo2"> <?echo number_format($iv,2);?> </div></td>
     <td valign="top" bgcolor="#FFFFFF" class="Estilo7"><div align="right" class="Estilo2"><?echo number_format($to,2);?> </div></td>
     </tr>
<?}else{?>
<tr>
     <td colspan="6" valign="top"><div align="right"><span class="Estilo13 Estilo11"><span class="Estilo25">SUBTOTAL</span></span></div></td>
     <td valign="top" bgcolor="#FFFFFF" class="Estilo7"><div align="right" class="Estilo2" >       <? number_format($ex,2);?> </div></td>
     <td valign="top" bgcolor="#FFFFFF" class="Estilo7"><div align="right"><span class="Estilo2"><? number_format($ng,2);?></span></div></td>
     <td valign="top" bgcolor="#FFFFFF" class="Estilo7"><div align="right" class="Estilo2"> <?echo number_format($iv,2);?> </div></td>
     <td valign="top" bgcolor="#FFFFFF" class="Estilo7"><div align="right" class="Estilo2"><?echo number_format($to,2);?> </div></td>
     </tr>

<?}?>
 </table>


<?  $sql5 = "SELECT sum(importe) as debitos FROM $liquidacion WHERE  (`nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion_liq' and periodo like '$periodo_liq' and operacion = 400 and tipo_pago = 'AJ_NEGATIVO') or ( `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion' and periodo like '$periodo_liq' and operacion = 600 and tipo_pago = 'AJ_NEGATIVO') ";
$result5 = $db_liq->Execute($sql5);

$debitos=$result5->fields["debitos"];

$sql5 = "SELECT sum(importe) as creditos FROM $liquidacion WHERE  (`nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion_liq' and periodo like '$periodo_liq' and operacion = 400 and tipo_pago = 'AJ_POSITIVO') or ( `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion_liq' and periodo like '$periodo_liq' and operacion = 600 and tipo_pago = 'AJ_POSITIVO') ";
$result5 = $db_liq->Execute($sql5);

$creditos=$result5->fields["creditos"];

$tot_mes = $to - $debitos + $creditos;

?>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="444"><div align="right" class="Estilo12"><strong>- DEBITOS REALIZADOS POR OBRA SOCIAL </strong></div></td>
    <td width="356"><div align="right" class="Estilo12">-<?echo number_format($debitos,2);?></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo12"><strong>+ CREDITOS <strong>REALIZADOS POR OBRA SOCIAL</strong></strong></div></td>
    <td><div align="right"><span class="Estilo11 Estilo26"><span class="Estilo2 Estilo11"><?echo number_format($creditos,2);?></span></span></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><hr noshade></td>
  </tr>
  <tr>
    <td><div align="right"><span class="Estilo13 Estilo11"><span class="Estilo25">TOTAL DEL MES </span></span></div></td>
    <td><div align="right"><span class="Estilo3"><?echo number_format($tot_mes,2);?></span></div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><em>*** El detalle de los d&eacute;bitos y/o cr&eacute;ditos se encuentran en las liquidaciones correspondientes de cada per&iacute;odo *** </em></div></td>
  </tr>
</table>
 <table width="800" border="1">
   <tr bgcolor="#E1E1E1">
     <td><div align="center" class="Estilo12">Detalle a facturar </div></td>
     <td colspan="4"><div align="center" class="Estilo12">Importes</div></td>
   </tr>


 <?


 switch ($sit_iva){
	 case "1":{


		 $total_exento_a = $to - $total_iva - $total_ng - $debitos + $creditos;
	 ?> <tr>
     <td><div align="center"></div></td>
     <td><div align="center"><span class="Estilo12">Gravado</span></div></td>
     <td><div align="center"><span class="Estilo12">Exento</span></div></td>
     <td><div align="center"><span class="Estilo12">IVA</span></div></td>
     <td><div align="center"><span class="Estilo12">Total</span></div></td>
   </tr>
   <tr>
     <td width="310"><span class="Estilo12">Servicios afiliados Voluntarios </span></td>
     <td width="97"><div align="right" class="Estilo12"><?echo number_format($total_ng,2);?></div></td>
     <td width="128"><div align="right"><span class="Estilo12"><?echo number_format($total_exento_a,2);?></span></div></td>

     <td width="143"><div align="right" class="Estilo12"><?echo number_format($total_iva,2);?></div></td>
     <td width="88"><div align="right" class="Estilo12"><span class="Estilo11 Estilo26"><span class="Estilo3"><?echo number_format($tot_mes,2);?></span></span></div></td>
   </tr>
   <?
	 break;
	 }

case "3":{

$tot = $to - $debitos + $creditos;
?> <tr>
     <td><span class="Estilo12">Servicios Prestados</span></td>
     <td colspan="4"><div align="center"></div>       <div align="right" class="Estilo12"><?echo number_format($tot,2);?></div></td>
     </tr>
<?
}

 }

$total_ng = "";
$total_exe = "";
$total_iva = "";
$total_total = "";

$total_ng1 = "";
$total_exe1 = "";
$total_iva1 = "";
$total_total1 = "";

$ng = "";
$ex = "";
$iv = "";
$to = "";


 ?>
 
 </table> 

 <style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
 <table width="800" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <td><div align="center"></div></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td><div align="center">RESUMEN DEL IMPORTE BRUTO LIQUIDACIONES </div></td>
   </tr>
 </table>
 <table width="800" border="1" cellpadding="0" cellspacing="0">
 <tr>


<?


$anio_liquidacion_anterior = $anio_liquidacion - 1;
$periodo = $periodo + 1;

if ($periodo == 13){$periodo = "01";
$anio_liquidacion_anterior = $anio_liquidacion;


}


$tipo= $_REQUEST['tipo'];


$periodo = str_pad("$periodo", 2, '0', STR_PAD);
$desde = "01-".$periodo."-20".$anio_liquidacion_anterior;
$hasta=  "01-".$periodo."-20".$anio_liquidacion;



$dia = substr($desde,0,2);
$mes_inicial= substr($desde,3,2);
$mes_empezar = $mes_inicial;
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
<td><div align="center"><strong><?echo $uno;?>  </strong>  <strong>/  <?echo $anio;?></strong></div></td>
<?

$dos = $uno + 1;
if ($dos == 13){$dos = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?echo $dos;?> /  <?echo $anio;?></strong></div></td>
<?

$tres = $dos+ 1;
if ($tres== 13){$tres= 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?echo $tres;?> /  <?echo $anio;?></strong></div></td>
<?

$cuatro = $tres+ 1;
if ($cuatro == 13){$cuatro = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?echo $cuatro;?> /  <?echo $anio;?></strong></div></td>
<?

$cinco = $cuatro + 1;
if ($cinco== 13){$cinco = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?echo $cinco;?> /  <?echo $anio;?></strong></div></td>
<?
$seis = $cinco + 1;

if ($seis == 13){$seis = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?echo $seis;?> /  <?echo $anio;?></strong></div></td>
<?

$siete = $seis + 1;
if ($siete == 13){$siete = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?echo $siete;?> /  <?echo $anio;?></strong></div></td>
<?

$ocho = $siete+ 1;
if ($ocho == 13){$ocho = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?echo $ocho;?> /  <?echo $anio;?></strong></div></td>
<?

$nueve = $ocho + 1;
if ($nueve == 13){$nueve = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?echo $nueve;?> /  <?echo $anio;?></strong></div></td>
<?

$diez = $nueve+ 1;
if ($diez == 13){$diez = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?echo $diez;?> /  <?echo $anio;?></strong></div></td>

<?

$once= $diez+ 1;
if ($once == 13){$once = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?echo $once;?> /  <?echo $anio;?></strong></div></td>
<?

$doce = $once+ 1;
if ($doce == 13){$doce = 1;$anio = $anio + 1;}
	?>
<td><div align="center"><strong><?echo $doce;?> /  <?echo $anio;?></strong></div></td>
<?







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

  <?
	
	



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
?><td><div align="right"><?echo $importe;?></div></td><?
}
else
	  {
?><td><div align="center">&nbsp;</div></td><?
	  }
$result10->MoveNext(); //mueve registro matricula
 
 }


$tot = $total_bioq;
?>
<tr>

<td height="50" colspan="15" bgcolor="#E4E4E4"><div align="right">TOTAL ACUMULADO DURANTE LOS ULTIMOS 12 MESES 
  <?
if ($total_bioq > 0){echo number_format($total_bioq,2);$total_bioq = "";}else{$total_bioq = "&nbsp;";}?></div></td>
  </tr><?


IF ($sit_iva == 3){
if (($tot > 120000) and ($tot < 200000)){
$leyenda = "DEBE REALIZAR FACTURA ELECTRONICA";
include ("../../../alertas/alerta_800.php");
}elseif($tot < 120000){
$leyenda ='DEBE REALIZAR FACTURA "C" O RECIBO "C"';
include ("../../../alertas/alerta_800.php");
}elseif($tot > 200000){
$leyenda ='DEBE REALIZAR FACTURA "C" O RECIBO "C"';
include ("../../../alertas/alerta_800.php");
$leyenda ="HA SUPERADO EL MAXIMO ($200000) DE MONOTRIBUTISTA. REVISE SU SITUACION AFIP";
include ("../../../alertas/alerta_800.php");
}
}

IF ($sit_iva == 1){
$leyenda ='DEBE REALIZAR FACTURA "A" O RECIBO "A"';
include ("../../../alertas/alerta_800.php");
}
?>
</table>

<?
$importe= "";
$total_bioq = "";
$uno= "";
$dos= "";
$tres= "";
$cuatro= "";
$cinco= "";
$seis= "";
$siete= "";
$ocho= "";
$nueve= "";
$diez= "";
$once= "";
$doce= "";
$tot = "";
$to= "";
$debitos= "";
$creditos= "";
$exento_porc= "";
$neto_porc= "";
$iva_porc= "";
$bruto= "";
$ng= "";
$total_ng= "";
$total_ng1= "";
$ex= "";
$total_exe= "";
$total_exe1= "";
$iv= "";
$total_iva= "";
$total_iva1 = "";
$total_total = "";
$total_total1= "";
$total_facA = "";
$total_ng = "";
$total_iva = "";
$to_exentoA = "";
$total_exe = "";
$total_exe1= ""; 
$total_exe= "";
$total_iva= "";
$total_total= "";
$total_exe1= "";
$total_total1= "";
$ex= "";
$ng= "";
$iv= "";
$ex_capita = "";
$importe= "";
$parcial_a = "";
$importe = "";
$bruto = "";
$a_cuenta = "";
$total_a_cuenta = "";
$neto_porc = "";
$exento_porc = "";
$iva_porc = "";
$bruto_iva= "";

$periodo = $periodo - 1;
$desde = "01-".$periodo."-20".$anio_liquidacion_anterior;
$hasta=  "01-".$periodo."-20".$anio_liquidacion;

?>

<style type="text/css">
<!--
.Estilo2 {font-size: 10px}
.Estilo3 {color: #FFFFFF; font-size: 10px; }
.Estilo6 {font-family: Arial, Helvetica, sans-serif}
.Estilo7 {font-size: 10px; font-family: Arial, Helvetica, sans-serif; }
.Estilo8 {color: #FFFFFF; font-size: 10px; font-family: Arial, Helvetica, sans-serif; }
.Estilo9 {color: #000000}
.Estilo10 {font-weight: bold}
-->
H1.SaltoDePagina
{
PAGE-BREAK-BEFORE: always
}

.Estilo11 {font-size: 12px}
.Estilo12 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo13 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.Estilo14 {
	font-size: 12px;
	color: #000000;
	font-weight: bold;
}
.Estilo19 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 12px; }
.Estilo21 {font-size: 14px; font-family: Arial, Helvetica, sans-serif; }
.Estilo4 {font-size: 14px}
.Estilo22 {
	font-size: 14px;
	font-weight: bold;
}
.Estilo23 {
	font-size: 18px;
	font-weight: bold;
	font-style: italic;
}
.Estilo24 {
	font-size: 16px;
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo25 {font-size: 10px; font-family: Arial, Helvetica, sans-serif; color: #000000; }
</style>



<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">
<?
$band_deb = 1;
$band_acred = 1;

$band = 1;
$bande = 1;
$bande1 = 1;
$bande2=1;

include ("../../../conexiones/config.inc.php");

//$sql20 = "SELECT * FROM `liquidacion` WHERE  operacion = 200 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = 3 group by nro_laboratorio";


SWITCH ($radiobutton){
case "1":{
$sql20 = "SELECT * FROM `liquidacion` WHERE  operacion = 200 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = 2 and nro_laboratorio between '1' and '300' group by nro_laboratorio";
break;
}
case "2":{
$sql20 = "SELECT * FROM `liquidacion` WHERE  operacion = 200 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = 2 and nro_laboratorio between '301' and '600' group by nro_laboratorio";
break;
}
case "3":{
$sql20 = "SELECT * FROM `liquidacion` WHERE  operacion = 200 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = 2 and nro_laboratorio between '601' and '900' group by nro_laboratorio";
break;
}
case "4":{
$sql20 = "SELECT * FROM `liquidacion` WHERE  operacion = 200 and periodo like '$periodo' and `anio` like '$anio_liquidacion' and nro_liquidacion = 2 and nro_laboratorio between '901' and '9000' group by nro_laboratorio";
break;
}
}


$result20 = $db_liq->Execute($sql20);

if (!$result20) die("fallo".$db_liq->ErrorMsg());
  while (!$result20->EOF) {


$pasada = 1;

$nro_lab = $nro_laboratorio;
$nro_laboratorio=strtoupper($result20->fields["nro_laboratorio"]); 
$nro_liquidacion=strtoupper($result20->fields["nro_liquidacion"]);




$anio1 = $anio_liquidacion;


$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";

$result5 = $db_bq->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio = " (".$nro_laboratorio.") ". $nombre_laboratorio;
	
	?>

<!-- 4524100 hotel -->


 
<?



 $sql2 = "SELECT * FROM `liquidacion` WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion' and periodo like '$periodo' and nro_liquidacion = $nro_liquidacion and operacion = 2000 order by operacion";
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


$importe_original=$result2->fields["importe"];
$dto_liq=$result2->fields["bruto"];
$pago_caja=$result2->fields["acumulado_mensual"];



$saldo_deuda=$result2->fields["saldo_deuda"];
$importe_liq=$result2->fields["importe"];
$nro_factu=strtoupper($result2->fields["nro_factura"]); //1580

$dia_1 = substr($fecha,8,2);
$mes_2 = substr($fecha,5,2);
$anio_3 = substr($fecha,0,4);
 $fecha = $dia_1."-".$mes_2."-".$anio_3;


switch ($operacion){



	case "2000":{


if ($pasada == 1){
	

$sql12="select sum(saldo_deuda) as saldo_total from liquidacion where `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion' and periodo like '$periodo' and nro_liquidacion = $nro_liquidacion and operacion = 2000 order by operacion, motivo";
$result12 = $db_liq->Execute($sql12);
$saldo_total=strtoupper($result12->fields["saldo_total"]);

?>


<table width="641" border="0" bgcolor="#FFFFFF">
  <tr bgcolor="#C9FADF">
    <td bgcolor="#FFFFFF" scope="col"><div align="center">ASOCIACION BIOQUIMICA DE MENDOZA</div></td>
    <td width="118" rowspan="3" bgcolor="#FFFFFF" scope="col"><div align="center"><img src="../../../imagenes/logo.gif" width="118" height="74"></div></td>
  </tr>
  <tr bgcolor="#C9FADF">
    <td width="513" bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo13">ACTUALIZACION DE CUENTA CORRIENTE POR LIQUIDACION </div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo23">Cuenta: <?echo $nombre_laboratorio;?>      </div></td>
  </tr>
</table>


<table width="641" border="0">
  <!--DWLayoutTable-->
 <tr bgcolor="#FFFFFF" class="Estilo7">
    <td colspan="9"><div align="right" class="Estilo24">Liquidacion N&ordm;: <?echo $nro_liquidacion;?> - Periodo: <?echo $periodo;?> - 20<?echo $anio_liquidacion;?> </div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="8"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  
  <table width="641" border="0">
<tr>
  <td colspan="10" scope="col"><hr noshade></td>
</tr>
<tr>
  <td colspan="10" bordercolor="#000000" bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo6">
    <div align="center"><strong>LIQUIDACION SIN ACREDITACION</strong></div>
  </div></td>
</tr>
<tr>
  <td colspan="10" scope="col"><hr noshade></td>
</tr></table>


	<table width="641" border="0">

<tr bgcolor="#FFFFFF" class="Estilo6">
  <td colspan="10" scope="col"><div align="center" class="Estilo12">ESTADO DE CTA CTE POR OPERACIONES ADEUDADAS A LA ASOCIACION BIOQUIMICA DE MENDOZA</div></td>
</tr>
	
<tr class="Estilo6 Estilo4 Estilo9">
  <td colspan="11" bgcolor="#FFFFFF" class="Estilo6 Estilo4 Estilo9"  scope="col"><CENTER><STRONG>SR/SRES. <?echo $nombre_laboratorio;?> al día <?echo $fecha_hoy=date("d/m/Y");?> <BR>REGISTRA UNA DEUDA CON LA ASOCIACION DE: $  <?echo NUMBER_FORMAT($saldo_total,2);?></STRONG></CENTER></td>
</tr>

<tr bgcolor="#FFFFFF" class="Estilo8">
  <td width="42" class="Estilo5 Estilo9" scope="col">&nbsp;</td>
  <td class="Estilo5 Estilo9" scope="col">&nbsp;</td>
  <td class="Estilo5 Estilo9" scope="col">&nbsp;</td>
  <td class="Estilo5" scope="col">&nbsp;</td>
  <td width="50" class="Estilo5" scope="col">&nbsp;</td>
  <td width="59" class="Estilo5" scope="col">&nbsp;</td>
  <td width="64" class="Estilo5" scope="col">&nbsp;</td>
  <td colspan="2" class="Estilo5 Estilo9" scope="col">&nbsp;</td>
  <td class="Estilo5" scope="col">&nbsp;</td>
</tr>
<tr bgcolor="#FFFFFF" class="Estilo8">
  <td colspan="10" class="Estilo5 Estilo9" scope="col"><div align="center"><STRONG>DETALLE DE LA DEUDA </STRONG></div></td>
  </tr>
<tr bgcolor="#E6E6E6" class="Estilo8">
  <td class="Estilo5 Estilo9" scope="col">Fecha</td>
  <td width="181" class="Estilo5 Estilo9" scope="col">Operacion</td>
  <td width="35" class="Estilo5 Estilo9" scope="col">Comp.</td>
  <td width="54" class="Estilo5" scope="col"><div align="center" class="Estilo9">Fec. Orig</div></td>
  <td class="Estilo5" scope="col"><div align="center" class="Estilo9">Importe</div></td>
  <td class="Estilo5" scope="col"><div align="center" class="Estilo9">Dto x Liq</div>    </td>
  <td class="Estilo5" scope="col"><div align="center" class="Estilo9">Fec. Caja</div></td>
  <td colspan="2" class="Estilo5 Estilo9" scope="col">Pago Caja </td>
  <td width="68" class="Estilo5" scope="col"><div align="center" class="Estilo9">Saldo Deudor</div></td>
</tr>
</table>

<?
	$pasada = 2;}

$sql1="select * from ajustes where cod_ajuste = $ajuste and tipo_ajuste = '$tipo_ajuste'"; //4
$result1 = $db_cont->Execute($sql1);

$motivo=strtoupper($result1->fields["ajuste"]); // 2617
$motivo = substr($motivo,0,29);

?>
	<table width="641" border="0">
      
      <tr bgcolor="#FFFFFF" class="Estilo8">
        <td width="42" class="Estilo5" scope="col"><span class="Estilo9"><?echo $fecha;?></span></td>
        <td width="184" class="Estilo5" scope="col"><span class="Estilo9"><?echo $motivo;?></span></td>
        <td width="36" class="Estilo5" scope="col"><span class="Estilo9"><?echo $nro_factu;?></span></td>
        <td width="53" class="Estilo5" scope="col"><div align="center" class="Estilo9"><?echo $fecha;?></div></td>
        <td width="50" class="Estilo5" scope="col"><div align="center" class="Estilo9"><? echo $importe;?>
</div></td>
        <td width="60" class="Estilo5" scope="col"><div align="center" class="Estilo9"><? echo $dto_liq;?>
        </div></td>
        <td width="62" class="Estilo5" scope="col"><div align="center" class="Estilo9"><?echo $fecha_movimiento;?></div></td>
        <td colspan="2" class="Estilo5 Estilo9" scope="col"><div align="center"><span class="Estilo9"><? echo $pago;?></span></div></td>
        <td width="64" class="Estilo5" scope="col"><div align="rigth" class="Estilo9">
          <div align="right"><?echo $saldo_deuda;?></div>
        </div></td>
      </tr>
 
	<?$saldo_total = $saldo_total + $saldo_deuda;

		
	break;}//cierra el caso 2000 deuda

}//cierra el bucle operacion

?>   </table><?
$result2->MoveNext();
  }


?>
    <?

if ($nro_lab != $nro_laboratorio){
	$total = $total_neto_gravado + $total_iva + $total_exento;?>
<H1 class=SaltoDePagina> </H1>
	  <?
}
  $result20->MoveNext();


	}
?>

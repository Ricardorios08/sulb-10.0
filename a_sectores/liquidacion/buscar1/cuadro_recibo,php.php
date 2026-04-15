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
$sql20 = "SELECT * FROM `liquidacion` WHERE  operacion = 200 and periodo like '$periodo' and `anio` like '$anio_liquidacion'  group by nro_laboratorio";
$result20 = $db_liq->Execute($sql20);

if (!$result20) die("fallo".$db_liq->ErrorMsg());
  while (!$result20->EOF) {




$nro_lab = $nro_laboratorio;
$nro_laboratorio=strtoupper($result20->fields["nro_laboratorio"]); //1580





$anio1 = $anio_liquidacion;


$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";

$result5 = $db_bq->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio = " (".$nro_laboratorio.") ". $nombre_laboratorio;
	
	?>

<!-- 4524100 hotel -->

<table width="641" border="0" bgcolor="#FFFFFF">
  <tr bgcolor="#C9FADF">
    <td width="637" bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo13">ACTUALIZACION DE CUENTA CORRIENTE POR LIQUIDACION </div></td>
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
 
<?



 $sql2 = "SELECT * FROM `liquidacion` WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion' and periodo like '$periodo' and nro_liquidacion = $nro_liquidacion";
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





$dia_1 = substr($fecha,8,2);
$mes_2 = substr($fecha,5,2);
$anio_3 = substr($fecha,0,4);
 $fecha = $dia_1."-".$mes_2."-".$anio_3;


switch ($operacion){
	case "100":{


?>
<tr>
    <td colspan="8"><div align="right"><span class="Estilo19">SALDO DE FACTURAS ADEUDADAS ANTERIOR A LA LIQUIDACION: $ <?ECHO  number_format($importe,2);?></span>
      </div>      <div align="right" class="Estilo21"><div align="center" class="Estilo6"></div>
    </div></td>
  </tr>
<tr>
  <td colspan="8"><HR noshade></td>
  </tr>
<tr bgcolor="#FFFFFF" class="Estilo8">
  <td colspan="8"><div align="left"><span class="Estilo14">FACTURAS PAGADAS A LA FECHA</span></div></td>
</tr>
<tr bgcolor="#FFFFFF" class="Estilo12">
  <td width="50"><div align="center" class="Estilo2">Fec. Mov </div></td>
  <td width="201"><div align="center" class="Estilo2">O.Social</div></td>
  <td width="76"><div align="center" class="Estilo2">Saldo</div></td>
  <td width="76"><div align="center" class="Estilo2">Comp.</div></td>
  <td width="58"><div align="center" class="Estilo2">Fec. Fact </div></td>
  <td width="59"><div align="center" class="Estilo2">Imp. Orig</div></td>
  <td width="56"><div align="center" class="Estilo2">Exc Capita</div></td>
   <td width="60"><div align="center" class="Estilo2">Imp. Pag.</div></td>
  </tr>

<?
	$saldo_cta_cte = $importe;
	break;
	}

case "200":{


$sql1="select * from factura where nro_factura = '$nro_factura' and nro_os = $nro_os"; //4
$result1 = $db_fa->Execute($sql1);

$nro_os=strtoupper($result1->fields["nro_os"]); // 2617
$fecha_pago_fact=strtoupper($result1->fields["fecha_pago_fact"]); // 2617

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

include ("../../../conexiones/config_liq.php");
 $sql12="select * from composicion where nro_os like '$nro_os' and nro_factura = $nro_factura";
$result12 = $db_liq->Execute($sql12);
echo $iva=$result12->fields["iva"];
echo $neto_gravado=$result12->fields["neto_gravado"];
echo $exento=$result12->fields["exento"];
echo "--".$nro_factura;
echo "<br>";

include ("../../../conexiones/config_os.php");
$sql12="select * from datos_os where nro_os like '$nro_os'";
$result12 = $db_os->Execute($sql12);
$sigla=strtoupper($result12->fields["sigla"]);

$ex_capita = $importe - $bruto;
?>
<tr class="Estilo7">
    <td class="Estilo7"><span class="Estilo2"><?echo $fecha_pago_fact;?></span></td>
    <td class="Estilo7"><span class="Estilo7"><?echo $sigla." (".$nro_os.")";?> - <?echo $porcentaje;?> %</span></td>
    <td class="Estilo7"><div align="center"><?echo $tipo_pago;?>
        </div>
      <div align="center"></div>
    <div align="center" class="Estilo11"></div></td>
    <td><div align="center"><span class="Estilo7"><?echo $nro_factura;?></span></div></td>
    <td><span class="Estilo7"><?echo $fecha;?></span></td>
    <td><div align="right" class="Estilo2" > <?echo number_format($importe,2);?>  </div></td>
    <td><div align="right" class="Estilo2"> -<?echo $ex_capita;?> </div></td>
     <td><div align="right" class="Estilo2"><?echo number_format($bruto,2);?> </div></td>
  </tr>
<?
break;
}

case "300":{

//$saldo_cta_cte = $saldo_cta_cte - $bruto;

?>
<tr><td colspan="4" scope="col">&nbsp;</td>
  <td colspan="4" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo7">
  <td colspan="7" class="Estilo7" scope="col"><div align="right" class="Estilo2"></div>    <div align="right"><span class="Estilo2">Total Facturas Pagadas a liquidar: </span></div>    <div align="right"></div>    <div align="right"></div>    <div align="right" class="Estilo6">
        <div align="right"></div>
    </div></td>
  <td><div align="right"><span class="Estilo6"><?ECHO number_format($bruto,2);?></span></div></td>
  <?

$brut = $bruto;
break;
}

case "390":{

//if ($band_deb == 1){
?>
<tr class="Estilo7">
  <td colspan="8" class="Estilo19" scope="col"><HR noshade></td>
<tr class="Estilo7">
  <td colspan="8" class="Estilo19" scope="col"><div align="right">SALDO ACTUALIZADO DE FACTURAS ACREEDITADAS PENDIENTES DE PAGO: $ <?ECHO number_format($importe,2);?></div></td>
  <tr class="Estilo7">
  <td colspan="8" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
</table>


<table width="641" border="0">
  <tr bgcolor="#FFFFFF">
    <td colspan="9" scope="col"><div align="center" class="Estilo12">
      <div align="left"><strong>AJUSTES SOBRE FACTURAS PAGADAS (DEBITOS O CREDITOS)</strong></div>
    </div></td>
  </tr>
  <tr bgcolor="#FFFFFF" class="Estilo8">
    <td width="55" scope="col"><div align="center" class="Estilo3 Estilo4 Estilo9"><span class="Estilo5  Estilo2">Fec. Mov. </span></div></td>
    <td width="93" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">O. Social </span></div></td>
    <td width="43" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">Comp.</span></div></td>
    <td width="56" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">Fec. Orig.</span></div></td>
    <td width="195" scope="col"><div align="center" class="Estilo5 Estilo9">Motivo</div></td>
    <td width="52" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo7"><span class="Estilo5">Debitos</span></span></div></td>
    <td width="48" scope="col"><div align="center" class="Estilo5 Estilo9">Cr&eacute;dito</div></td>
    <td width="65" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">Neto</span></div></td>
  </tr>
  <tr class="Estilo7">
    <td colspan="6" scope="col"><span class="Estilo2">BRUTO PAGADO </span></td>
    <td scope="col"><div align="center"></div></td>
    <td scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($brut,2);?></span></div></td>
  </tr></table>


<?
$band_deb = 2;
//}

$saldo_debitos = $brut;
break;

}


case "400":{

 $sql1="select * from ajustes where cod_ajuste = $ajuste and tipo_ajuste = '$tipo_ajuste'"; //4
$result1 = $db_cont->Execute($sql1);

$motivo=strtoupper($result1->fields["ajuste"]); // 2617
$motivo=substr($motivo,0,33);


?>
<table width="641" border="0">
  <tr class="Estilo7">
    <td width="53" scope="col"><span class="Estilo2"><?ECHO $fecha;?></span></td>
    <td width="95" scope="col"><span class="Estilo2"><?ECHO $sigla;?></span></td>
    <td width="47" scope="col"><div align="center"><span class="Estilo2"><?ECHO $nro_factura;?></span></div></td>
    <td width="56" scope="col"><div align="center"><span class="Estilo2"><?ECHO $fecha;?></span></div></td>
    <td width="192" scope="col"><div align="left"><span class="Estilo2"><?ECHO $motivo;?></span></div></td>


<?	


switch ($tipo_pago){

case "AJ_POSITIVO":{

			
			$saldo_debitos = $saldo_debitos + $importe;
?> <td width="52" scope="col"><div align="center"><span class="Estilo2"> - </span></div></td>
    <td width="49" scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($importe,2);?></span></div></td>
<td width="63" scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($saldo_debitos,2);?></span></div></td>
  </tr>
<?
		break;}

case "AJ_NEGATIVO"://novedades al debito
		{
		
			$saldo_debitos = $saldo_debitos - $importe;

?>  <td scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($importe,2);?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo2"> - </span></div></td>
<td scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($saldo_debitos,2);?></span></div></td>
  </tr>
<?	


		break;}
}



    

	
	?>

  



<?


break;

}

case "500":{
?>
	<tr class="Estilo7">
  <td colspan="5" scope="col">&nbsp;</td>
  <td colspan="3" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo7">
  <td colspan="5" scope="col"><div align="right" class="Estilo2">Sub-Total </div></td>
  <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($importe,2);?></span></div></td>
  <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($bruto,2);?></span></div></td>
  <td class="Estilo2" scope="col"><div align="right" class="Estilo6">
    <div align="right"><span class="Estilo2"><?ECHO number_format($acumulado_mensual,2);?></span></div>
  </div></td>
</tr><?
$saldo_debitos = $acumulado_mensual;	
?>
<tr>
  <td colspan="8" scope="col"><hr noshade></td>
</tr><?
	break;
?></TABLE>
<?
}

case "600":
	{

	//if ($bande == 1){

?>

<table width="641" border="0">
  <tr bgcolor="#FFFFFF">
    <td colspan="8" scope="col"><div align="center" class="Estilo12">
      <div align="left"><strong>AJUSTES SOBRE FACTURAS ANTERIORES</strong></div>
    </div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="8" scope="col"><hr noshade></td>
  </tr>
  <tr bgcolor="#FFFFFF" class="Estilo8">
    <td width="56" scope="col"><div align="center" class="Estilo3 Estilo4 Estilo9"><span class="Estilo5  Estilo2">Fec. Mov. </span></div></td>
    <td width="149" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">O. Social </span></div></td>
    <td width="71" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">Comp.</span></div></td>
    <td width="56" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">Fec. Orig.</span></div></td>
    <td width="250" scope="col"><div align="center" class="Estilo5 Estilo9">Motivo</div></td>
    
	<td width="40" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">Debitos</span></div></td>
    <td width="40" scope="col"><div align="center" class="Estilo5 Estilo9">Cr&eacute;dito</div></td>
    
	<td width="65" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">Neto</span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF" class="Estilo8">
    <td colspan="8" scope="col"><HR noshade></td>
  </tr>

  <tr class="Estilo7">
    <td colspan="6" scope="col"><span class="Estilo2">NETO DE AJUSTES </span></td>
    <td class="Estilo2" scope="col"><div align="center"></div></td>
    <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($saldo_debitos,2);?></span></div></td>
  </tr>
<!--   </TABLE> -->
<?$saldo= $saldo_debitos;
	  $bande = 2;
//	}

	
 $sql1="select * from ajustes where cod_ajuste = $ajuste and tipo_ajuste = '$tipo_ajuste'"; //4
$result1 = $db_cont->Execute($sql1);

$motivo=strtoupper($result1->fields["ajuste"]); // 2617


$sql1="select fecha from factura where nro_factura like '$nro_factura'";
$result1 = $db_fa->Execute($sql1);
$fecha_original=$result1->fields["fecha"];


$sql1="select sigla from datos_os where nro_os like '$nro_os'";
$result1 = $db_os->Execute($sql1);
$sigla=strtoupper($result1->fields["sigla"]);


	?>
 <tr class="Estilo7">
    <td scope="col"><span class="Estilo2"><?ECHO $fecha;?></span></td>
    <td scope="col"><span class="Estilo2"><?ECHO $sigla;?></span></td>
    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO $nro_factura;?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo2"><?ECHO $fecha;?></span></div></td>
    <td scope="col"><div align="left"><span class="Estilo2"><?ECHO $motivo;?></span></div></td>


<?
   switch ($tipo_pago){

case "AJ_POSITIVO":{

			
			$saldo = $saldo + $importe;
			$total_credito = $total_credito + $importe;
?> <td scope="col"><div align="center"><span class="Estilo2"> - </span></div></td>
    <td scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($importe,2);?></span></div></td>
<td scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($saldo,2);?></span></div></td>
  </tr>
<?
		break;}

case "AJ_NEGATIVO"://novedades al debito
		{
		
			$saldo = $saldo - $importe;
			$total_debito = $total_debito + $importe;
?>  <td scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($importe,2);?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo2"> - </span></div></td>
<td scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($saldo,2);?></span></div></td>
  </tr>
<?	


		break;}
}

  



$total_debitos_pen = $total_de + $importe;
	break;
	}

	case "700":{
?>
	<tr class="Estilo7">
  <td colspan="5" scope="col">&nbsp;</td>
  <td colspan="3" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo7">
  <td colspan="5" scope="col"><div align="right" class="Estilo2">Sub-Total </div></td>
  <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($total_debito,2);?></span></div></td>
  <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($total_credito,2);?></span></div></td>
  <td class="Estilo2" scope="col"><div align="right" class="Estilo6">
    <div align="right"><span class="Estilo2"><?ECHO number_format($saldo,2);?></span></div>
  </div></td>
</tr>
<tr>
  <td colspan="8" scope="col"><hr noshade></td>
</tr></table><?
	$saldo_retenciones = $saldo;
	break;
	?><?
}

case "800":{

	switch ($motivo) {
	case "10": {

//if ($bande1 == 1){
?>




<table width="641" border="0">
  <!--DWLayoutTable-->
  <tr bgcolor="#FFFFFF">
    <td colspan="5" scope="col"><hr noshade></td>
  </tr>
  <tr bgcolor="#000099" class="Estilo8">
    <td bgcolor="#FFFFFF" scope="col"><span class="Estilo12&gt; &lt;div align= Estilo9 Estilo11"><strong>RETENCIONES</strong></span></td>
    <td bgcolor="#FFFFFF" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#FFFFFF" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#FFFFFF" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#FFFFFF" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bgcolor="#000099" class="Estilo8">
    <td bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo28 Estilo9">
      <div align="center" class="Estilo12>
        <div align="left"></div>
      </div>
    </div>      <div align="center" class="Estilo2 Estilo5 Estilo6 Estilo8 Estilo28 Estilo9"></div></td>
    <td bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo8 Estilo28 Estilo9">Base</span></span></div></td>
    <td width="101" bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo8 Estilo28 Estilo9">Porc./Cuota DGI </div></td>
    <td width="93" bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo2 Estilo5 Estilo6 Estilo8 Estilo28 Estilo9">Importe</span></div></td>
    <td width="87" bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo9 Estilo28">Neto Retenc.</span></div>      
    <div align="center" class="Estilo8 Estilo28"></div>    </div></td>
  </tr>
  <tr class="Estilo7">
    <td height="21" colspan="4" class="Estilo7" scope="col">SUJETO A RETENCIONES
    <div align="center"></div></td>
    <td scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($importe,2);?> </span></div></td>
</tr></TABLE>
<?
$saldo_retenciones_adm = $importe;
$base_impuesto = $importe;
	$bande1=2;

	//}
	break;
	}


case "11": {
$base_cos = $importe;
break;
}

case "20": {

$saldo_retenciones_adm = $base_impuesto - $importe;
$total_importe = $total_importe + $importe;

?>  <table width="641" border="0">
<tr class="Estilo7">
    <td width="250" height="20" class="Estilo2" scope="col"><div align="right"><span class="Estilo7">Gastos Administrativos:</span></div>
    <div align="center" class="Estilo10"></div></td>
    <td width="84" class="Estilo2" scope="col"><div align="center" class="Estilo10"><span class="Estilo7"><?ECHO number_format($base_cos,2);?></span></div></td>
    <td width="105" class="Estilo2" scope="col"><div align="left"><span class="Estilo7"><?ECHO number_format($porcentaje,2)." %";?>  </span></div></td>
    <td width="94" class="Estilo2" scope="col"><div align="right"><?


	ECHO number_format($importe,2);?>    
    </div>
    <td width="86" class="Estilo2" scope="col"><div align="right">
    <div align="right"><?ECHO number_format($saldo_retenciones_adm,2);?></div>
</TABLE>
    <?
		break;}

		case "30": {
$saldo_retenciones_adm = 	$saldo_retenciones_adm - $importe;
$total_importe = $total_importe + $importe;
if ($importe > 0){
?>  

  <table width="641" border="0">
  <tr class="Estilo7">
    <td width="250" height="20" class="Estilo2" scope="col"><div align="right"><span class="Estilo7">DGI Retención: </span> </div>
    <div align="center" class="Estilo10"></div></td>
    <td width="84" class="Estilo2" scope="col"><div align="center" class="Estilo10"><span class="Estilo7"><?ECHO number_format($bruto,2);?></span></div></td>
    <td width="107" class="Estilo2" scope="col"><div align="left"><span class="Estilo7"><?ECHO number_format($porcentaje,2)."%";?> + <?ECHO number_format($nro_factura,2);?></span></div></td>
    <td width="93" valign="top" class="Estilo2" scope="col">      <div align="right"><?
	ECHO number_format($importe,2);?>    
    </div>
    <td width="85" class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($saldo_retenciones_adm,2);?></span> </div></table>
<?}
	
 
		break;
	}



case "40": {

$saldo_retenciones_adm = $saldo_retenciones_adm - $importe;
$total_importe = $total_importe + $importe;
if ($importe > 0){
	?>  
 <table width="641" border="0">
 <tr class="Estilo7">
    <td width="250" height="20" class="Estilo2" scope="col"><div align="right"><span class="Estilo7">DGR Retención: </span> </div>
    <div align="center" class="Estilo10"></div></td>
    <td width="84" class="Estilo2" scope="col"><div align="center" class="Estilo10"><span class="Estilo10"><?ECHO number_format($bruto,2);?></span></div></td>
    <td width="107" class="Estilo2" scope="col"><div align="left"><span class="Estilo7"><?ECHO number_format($porcentaje,2)." %";?>  </span></div></td>
    <td width="94" valign="top" class="Estilo2" scope="col"><div align="right"><?
	ECHO number_format($importe,2);?>    
    </div>
    <td width="84" class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?ECHO number_format($saldo_retenciones_adm,2);?></span> </div></table>
<?
}	
		break;
	}


}
	break;
?>	
<?
}//cierra motivo en 800 retenciones

case "900":{
?>

<table width="641" border="0">
<tr class="Estilo7">
  <td width="250" class="Estilo2" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
  <td colspan="3" class="Estilo2" scope="col"><hr noshade></td>
</tr>
<tr class="Estilo7"><td class="Estilo2" scope="col"><div align="right" class="Estilo2">Sub -Total descontando las Retenciones:</div></td>
  <td width="164" class="Estilo2" scope="col">&nbsp;</td>
  <td width="77" class="Estilo2" scope="col"><div align="right"><span class="Estilo7"><?ECHO number_format($total_importe,2);?>
  </span></div></td>
  <td width="132" scope="col"><div align="right" class="Estilo6">
    <div align="right"><span class="Estilo7">  <? ECHO number_format($importe,2);?>
    </span></div>
  </div></td>
</tr>

<tr class="Estilo2">
  <td colspan="4" class="Estilo2" scope="col"><hr noshade></td>
</tr>
</table>




<?
//if ($band_acred ==1){

	
?>	

<style type="text/css">
<!--
.Estilo28 {color: #000000}
-->
</style>
<table width="641" border="0">
  <tr bgcolor="#FFFFFF">
    <td colspan="10" scope="col"><div align="center" class="Estilo12">
      <div align="left"><strong>ACREEDITACIONES Y DESCUENTOS</strong></div>
    </div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="10" scope="col"><hr noshade></td>
  </tr>
  <tr bgcolor="#FFFFFF" class="Estilo8">
    <td width="71" class="Estilo5" scope="col"><div align="center" class="Estilo4 Estilo3 Estilo28 Estilo9"><span class="Estilo5  Estilo2">Fec. Mov. </span></div></td>
    <td colspan="3" class="Estilo5" scope="col"><div align="center" class="Estilo5 Estilo28 Estilo9"><span class="Estilo5">Motivo</span></div></td>
    <td width="74" class="Estilo5" scope="col"><div align="center" class="Estilo5 Estilo28 Estilo9"><span class="Estilo5">Comp.</span></div></td>
  <!--   <td width="59" class="Estilo5" scope="col"><div align="center" class="Estilo5">Fec. Orig<span class="Estilo7 ">.</span></div></td> -->
    <td width="88" class="Estilo5" scope="col"><div align="center" class="Estilo5 Estilo28 Estilo9"><span class="Estilo5">Debitos</span></div></td>
    <td width="93" class="Estilo5" scope="col"><div align="center" class="Estilo5 Estilo28 Estilo9">Cr&eacute;dito</div></td>
    <td colspan="2" class="Estilo5" scope="col"><div align="center" class="Estilo5 Estilo28 Estilo9"><span class="Estilo5">Neto</span></div></td>
  </tr>
  

 <tr bgcolor="#FFFFFF" class="Estilo8">
    <td class="Estilo5" scope="col"><span class="Estilo2"><span class="Estilo25">SUB - TOTAL NETO DE RETENCIONES </span></span></td>
    <td colspan="3" class="Estilo5" scope="col">&nbsp;</td>
    <td class="Estilo5" scope="col">&nbsp;</td>
    <td class="Estilo5" scope="col">&nbsp;</td>
    <td class="Estilo5" scope="col">&nbsp;</td>
    <td colspan="2" class="Estilo5" scope="col"><span class="Estilo7"><?ECHO number_format($importe,2);?></span></td>
  </tr></table>
<?
$saldo_novedades = $importe;
  $band_acred = 2;
//}

break;
} //cierra el caso 900


case "1000": // NOVEDADES
	{

IF ($transaccion == 'TR_POSITIVA'){
	$transaccion = 'TR_POSITIVO';
}


 $sql1="select * from ajustes where cod_ajuste = '$ajuste' and tipo_ajuste like '$transaccion'"; //4
$result1 = $db_cont->Execute($sql1);

$motivo=strtoupper($result1->fields["abreviatura"]); // 2617

?><table width="641" border="0">
  <tr>
    <td width="70" class="Estilo2" scope="col"><span class="Estilo7"><?ECHO $fecha;?></span></td>
    <td colspan="3" class="Estilo2" scope="col"><span class="Estilo7"><?ECHO $motivo;?></span></td>
    <td width="73" class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?ECHO $nro_factura;?></span></div></td>
    <!-- <td class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?ECHO $fecha;?></span></div></td> -->


<?	switch ($tipo_pago){

case "TR_POSITIVA":{
				$saldo_novedades = $saldo_novedades + $importe;
?><td width="92" class="Estilo7" scope="col"><div align="right"><span class="Estilo7">  
        <? echo number_format($importe,2);?>
</span></div></td>
<td width="73" class="Estilo7" scope="col"><div align="right"><span class="Estilo7"><? number_format($importe,2);?></span></div></td>
<td width="73" scope="col"><div align="right"><span class="Estilo7"><? echo number_format($saldo_novedades,2);?></span></div></td>
  </tr>
<?
		break;}

case "TR_NEGATIVO"://novedades al debito
		{
			$saldo_novedades = $saldo_novedades - $importe;
?><td width="92" class="Estilo7" scope="col"><div align="right"><span class="Estilo7">  
        <? echo number_format($importe,2);?>
</span></div></td>
<td width="73" class="Estilo7" scope="col"><div align="right"><span class="Estilo7">- <? number_format($importe,2);?></span></div></td>
<td width="73" scope="col"><div align="right"><span class="Estilo7"> <? echo number_format($saldo_novedades,2);?></span></div></td>
  </tr></table>
<?	


		break;}
}




break;
	}

	case "1100": // acreeditaciones y descuentos
	{

 $sql_ajuste = "SELECT ajuste FROM `ajustes` WHERE cod_ajuste = $ajuste and `tipo_ajuste` = '$transaccion'";
$result_ajuste = $db_cont->Execute($sql_ajuste);

$motivo= STRTOUPPER($result_ajuste->fields["ajuste"]);


?><table width="641" border="0">

  <tr>
    <td width="70" class="Estilo2" scope="col"><span class="Estilo7"><?ECHO $fecha;?></span></td>
    <td colspan="3" class="Estilo2" scope="col"><span class="Estilo7"><?ECHO $motivo;?></span></td>
    <td width="73" class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?ECHO $nro_factura;?></span></div></td>
    <!-- <td class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?ECHO $fecha;?></span></div></td> -->


<?	switch ($tipo_pago){

case "TR_POSITIVA":{
				$saldo_novedades = $saldo_novedades + $importe;
?><td width="92" class="Estilo7" scope="col"><div align="right"><span class="Estilo7">  
        <? echo number_format($importe,2);?>
</span></div></td>
<td width="73" class="Estilo7" scope="col"><div align="right"><span class="Estilo7"><? number_format($importe,2);?></span></div></td>
<td width="73" scope="col"><div align="right"><span class="Estilo7"><? echo number_format($saldo_novedades,2);?></span></div></td>
  </tr>
<?
		break;}

case "TR_NEGATIVO"://novedades al debito
		{
			$saldo_novedades = $saldo_novedades - $importe;
?><td width="92" class="Estilo7" scope="col"><div align="right"><span class="Estilo7">  
        <? echo number_format($importe,2);?>
</span></div></td>
<td width="73" class="Estilo7" scope="col"><div align="right"><span class="Estilo7">- <? number_format($importe,2);?></span></div></td>
<td width="73" scope="col"><div align="right"><span class="Estilo7"> <? echo number_format($saldo_novedades,2);?></span></div></td>
  </tr></table>
<?	


		break;}
}


?></table><?
break;
	}



	case "1200":{

		IF ($saldo_novedades == 0){
?>
<table width="641" border="0">
<tr>
  <td colspan="10" scope="col"><hr noshade></td>
</tr>
<tr>
  <td colspan="10" bordercolor="#000000" bgcolor="#F7A4B3" scope="col"><div align="center" class="Estilo6">
    <div align="center"><strong>LIQUIDACION SIN ACREDITACION</strong></div>
  </div></td>
</tr>
<tr>
  <td colspan="10" scope="col"><hr noshade></td>
</tr></table>
<?
		}
		else{
	include ("../../../conexiones/config.inc.php");
 $sql_facturante = "SELECT * FROM `facturante` WHERE `nro_laboratorio` = '$nro_laboratorio'";
$result_facturante = $db_bq->Execute($sql_facturante);

$banco= $result_facturante->fields["banco"];
$nro_cuenta= $result_facturante->fields["nro_cuenta"];
$cuenta= $result_facturante->fields["cuenta"];
$sucursal = substr($nro_cuenta,0,3);
$nro_cuenta = substr($nro_cuenta,4,6);

?>

<table width="641" border="0">
<tr class="Estilo2">
  <td colspan="10" scope="col">&nbsp;</td>
  </tr>
<tr class="Estilo2">
  <td colspan="10" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo7">
  <td colspan="9" scope="col"><div align="right" class="Estilo22">IMPORTE ACREEDITADO<span class="Estilo6"> $<?ECHO number_format($saldo_novedades,2);?></span></div>    </strong></td>
</tr></table>



<?
		}
		
		break;
	}
}//cierra el bucle operacion

$result2->MoveNext();
  }


?>










<?


if ($nro_lab != $nro_laboratorio){
	$total = $total_neto_gravado + $total_iva + $total_exento;?>

<table width="641" height="120" border="1" cellpadding="1" cellspacing="0">

<tr bgcolor="#CCCCCC" class="Estilo2">
  <td height="38" colspan="2" class="Estilo2"  scope="col"><div align="center" class="Estilo6 Estilo4 Estilo9"><strong>RECIBO</strong></div></td>
</tr>
<tr class="Estilo2">
  <td colspan="2" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right" class="Estilo6"></div>    
    <div align="left"><span class="Estilo6"><STRONG>BRUTO SUJETO A RETENCIONES <?echo number_format($bruto_sujeto_a,2);?></STRONG></span></div></td>
  </tr>
<tr class="Estilo2">
  <td width="529" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right" class="Estilo6"> EXENTO </div></td>
  <td width="102" bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right"><span class="Estilo23"><STRONG><span class="Estilo6"><span class="Estilo12">&nbsp;&nbsp;<?echo number_format($total_exento,2);?></span></span></STRONG></span></div></td>
</tr>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right" class="Estilo6">NETO GRAVADO</div></td>
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right"><span class="Estilo23"><STRONG><span class="Estilo6"><span class="Estilo12">&nbsp;&nbsp;<?echo number_format($total_neto_gravado,2);?></span></span></STRONG></span></div></td>
</tr>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right"><span class="Estilo6">IVA</span></div></td>
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right"><span class="Estilo23"><STRONG>&nbsp;<span class="Estilo12">&nbsp;<strong><?echo number_format($total_iva,2);?></strong></span></STRONG></span></div></td>
</tr>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col">&nbsp;</td>
  <td bgcolor="#CCCCCC"   scope="col"><div align="right"></div></td>
</tr>
<tr class="Estilo2">
  <td bgcolor="#FFFFFF" class="Estilo2"  scope="col"><div align="right" class="Estilo12"><strong>TOTAL</strong></div></td>
  <td bgcolor="#FFFFFF"   scope="col"><div align="right"><span class="Estilo12">&nbsp;&nbsp;<?echo number_format($total,2);?></STRONG></span></div></td>
</tr>
</table>
	  <H1 class=SaltoDePagina> </H1><?
}

  $result20->MoveNext();


	}
?>
s

<style type="text/css">

H1.SaltoDePagina
{
PAGE-BREAK-AFTER: always
}

<!--
.Estilo2 {font-size: 10px}
.Estilo3 {color: #FFFFFF; font-size: 10px; }
.Estilo6 {font-family: Arial, Helvetica, sans-serif}
.Estilo7 {font-size: 10px; font-family: Arial, Helvetica, sans-serif; }
.Estilo8 {color: #FFFFFF; font-size: 10px; font-family: Arial, Helvetica, sans-serif; }
.Estilo9 {color: #000000}
.Estilo10 {font-weight: bold}
-->

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
.Estilo49 {font-size: 11px}
.Estilo29 {color: #000000; font-weight: bold; }
</style>

<head>


</head>


 <!-- <body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">  -->
<?php 



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
include_once ("../../../conexiones/config.inc.php");

$sql = "SELECT * from observaciones";
$result = $db->Execute($sql);
$leyenda=$result->fields["observaciones"];


if (($periodo == 06) And ($anio_liquidacion == 2010)){
$liquidacion = "liquidacion_junio2010";
}else
{
$liquidacion = "liquidacion";
}



$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";

$result5 = $db->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);

	
$sql6 = "SELECT * FROM `afip` WHERE  `nro_laboratorio` = $nro_laboratorio";
$result6 = $db->Execute($sql6);
$sit_iva=ucwords($result6->fields["sit_iva"]);

switch ($sit_iva){
	case "1":{$ti_iva = "RI";BREAK;}
	case "3":{$ti_iva = "MON";BREAK;}
	case "4":{$ti_iva = "EXE";BREAK;}
	}
	

$nombre_laboratorio = " (".$nro_laboratorio.") ". $nombre_laboratorio." (".$ti_iva.")";


	switch ($periodo){
case "01":{$periodo_liq = "ENERO";break;}
case "02":{$periodo_liq = "FEBRERO";break;}
case "03":{$periodo_liq = "MARZO";break;}
case "04":{$periodo_liq = "ABRIL";break;}
case "05":{$periodo_liq = "MAYO";break;}
case "06":{$periodo_liq = "JUNIO";break;}
case "07":{$periodo_liq = "JULIO";break;}
case "08":{$periodo_liq = "AGOSTO";break;}
case "09":{$periodo_liq = "SETIEMBRE";break;}
case "10":{$periodo_liq = "OCTUBRE";break;}
case "11":{$periodo_liq = "NOVIEMBRE";break;}
case "12":{$periodo_liq = "DICIEMBRE";break;}


}
	
	?>


<!-- 4524100 hotel -->

<table width="641" border="0" bgcolor="#FFFFFF">
  <tr bgcolor="#C9FADF">
    <td bgcolor="#FFFFFF" scope="col"><div align="center">ASOCIACION BIOQUIMICA DE MENDOZA</div></td>
    <td width="118" rowspan="3" bgcolor="#FFFFFF" scope="col"><div align="center"><img src="../../../imagenes/logo.gif" width="118" height="74"></div></td>
  </tr>
  <tr bgcolor="#C9FADF">
    <td width="513" bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo13">ACTUALIZACION DE CUENTA CORRIENTE POR LIQUIDACION </div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo23">Cuenta: <?php echo $nombre_laboratorio;?>      </div></td>
  </tr>
</table>


<table width="641" border="0">
  <!--DWLayoutTable-->
 <tr bgcolor="#FFFFFF" class="Estilo7">
    <td colspan="11"><div align="right" class="Estilo24">Liquidacion N&ordm;: <?php echo $nro_liquidacion;?> / <?php echo $periodo_liq;?> - 20<?php echo $anio_liquidacion;?> </div></td>
 </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="10"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>

<?php 



echo $sql2 = "SELECT * FROM $liquidacion WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion' and periodo like '$periodo' and nro_liquidacion = $nro_liquidacion ";
// order by nro_laboratorio, nro_liquidacion, nro_factura, operacion ";

$result2 = $db->Execute($sql2);



//trae las matriculas......................................................
if (!$result2) die("fallo".$db->ErrorMsg());
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



switch ($operacion){
	case "100":{

IF (($periodo <= 8) and ($nro_liquidacion < 2) and ($anio == 10)){
$importe = "";
}
?>
<tr>
  <td colspan="10"><div align="right"><span class="Estilo19">SALDO INICIAL DE FACTURAS ADEUDADAS POR OBRA SOCIAL AL 
      <?php   echo $fecha;?>:
      $<?php   echo number_format($importe,2);?></span>
      </div>      
    <div align="right" class="Estilo21"><div align="center" class="Estilo6"></div>
    </div></td>
 </tr>
 <tr>
    <td colspan="10"> <div align="center"><?php   echo $leyenda;?>
    </div></td>
 </tr>
 
<tr>
  <td colspan="10"><HR noshade></td>
 </tr>

<?php 
	$saldo_cta_cte = $importe;
	break;
	}

case "200":{

if ($pagadas == ""){
	$pagadas = 1;


	?><table width="643" border="0" bgcolor="#FFFFFF">
<tr bgcolor="#FFFFFF" class="Estilo8">
  <td colspan="11"><div align="left"><span class="Estilo14">FACTURAS LIQUIDADAS</span></div></td>
</tr>
<tr bgcolor="#FFFFFF" class="Estilo12">
  <td width="44"><div align="center" class="Estilo2">Fec. Cob </div></td>
  <td width="94"><div align="center" class="Estilo2">O.Social</div></td>
  <td width="55"><div align="center"><span class="Estilo2">Periodo</span></div></td>
  <td width="26"><div align="center"><span class="Estilo7">%</span></div></td>
  <td width="58"><div align="center" class="Estilo2">Pago</div></td>
  <td width="64"><div align="center" class="Estilo2">Factura.</div></td>
  <td width="56"><div align="center" class="Estilo2">Fec. Fact </div></td>
  <td width="57"><div align="center" class="Estilo2">Imp. Orig</div></td>
  <td width="44"><div align="center"><span class="Estilo2">Saldo</span></div></td>
  <td width="60"><div align="center" class="Estilo2">Ex Cap/IVA</div></td>
   <td width="39"><div align="center" class="Estilo2">Liq.</div></td>
  </tr>
<?php }

$ex_capita = "";
$a_cuenta = "";

$sql1="select * from factura where nro_factura = '$nro_factura' and nro_os = $nro_os"; //4
$result1 = $db->Execute($sql1);

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
$result12 = $db->Execute($sql12);
$fecha_pago_fact=strtoupper($result12->fields["fecha"]);
$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;
}
elseif ($fecha_pago_fact == "--"){
$sql12="select * from factura where nro_os like '$nro_os' and nro_factura = $nro_factura";
$result12 = $db->Execute($sql12);
$fecha_pago_fact=strtoupper($result12->fields["fecha"]);
$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;
}
elseif ($fecha_pago_fact == ""){
$sql12="select * from factura where nro_os like '$nro_os' and nro_factura = $nro_factura";

$result12 = $db->Execute($sql12);
$fecha_pago_fact=strtoupper($result12->fields["fecha"]);
$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;
}

/*include ("../../../conexiones/config_liq.php");
 $sql12="select * from composicion where nro_os like '$nro_os' and nro_factura = $nro_factura and nro_laboratorio = $nro_laboratorio";
$result12 = $db->Execute($sql12);
$iva=$result12->fields["iva"];
$neto_gravado=$result12->fields["neto_gravado"];
$exento=$result12->fields["exento"];

$iva_porc = ($iva * $porcentaje / 100);

if ($iva > 0){
 $sql5 = "INSERT INTO `iva_facturar` ( `nro_laboratorio` , `nro_liquidacion` , `periodo_liquidacion` , `anio_liquidacion` , `importe_original` , `iva` , `porcentaje` )  VALUES ('$nro_laboratorio'  , '$nro_liquidacion' , '$periodo' , '$anio_liquidacion' , '$iva' , '$iva_porc' , '$porcentaje' )";
$result5 = $db->Execute($sql5);
}
*/

 
$sql123="select *  from composicion where nro_os like '$nro_os' and nro_factura = $nro_factura and nro_laboratorio = $nro_laboratorio";
$result123 = $db->Execute($sql123);

$iva=$result123->fields["iva"];
$neto_gravado=$result123->fields["neto_gravado"];
$exento=$result123->fields["exento"];
$tipo_iva=$result123->fields["tipo_iva"];

if (($nro_factura == 8735) and ($nro_os == 5080)){
$iva = "";
}

if (($nro_factura == 8748) and ($nro_os == 4625)){
$iva = "";
}

if ($iva > 0) {
$marca = "*";
$tipo_iva;

$ex_capita = ($importe - $bruto);
$iva=$importe - $bruto;

$total_iva=$total_iva + $iva;

}else{
$marca = "";
$total_excedente = $total_excedente + $ex_capita;
}


/*
if (($iva > 0.00) and ($neto_gravado == 0.00) and ($exento == 0.00)){
	$exento = $importe;
	}

$total_iva = $total_iva + $iva;
$total_neto_gravado = $total_neto_gravado + $neto_gravado;
$total_exento = $total_exento + $exento;

$total_iva = ($total_iva * $porcentaje / 100);
$total_neto_gravado = ($total_neto_gravado * $porcentaje / 100);
$total_exento = ($total_exento * $porcentaje / 100);

*/



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


if ($tipo_iva != 1){
if (($tipo_pago == "COMPLETA") AND (($bruto + $iva) < $importe)){
$ex_capita = "";
$a_cuenta = $importe - $bruto;
$total_a_cuenta = $total_a_cuenta + $a_cuenta;
}
}

if ($tipo_iva == 1){

	$a = $bruto + $iva;
if (($tipo_pago == "COMPLETA") AND ($a = $importe)){
$ex_capita = "";
$a_cuenta = $importe - $bruto;
$total_a_cuenta = $total_a_cuenta + $a_cuenta;
}
}





$tot_importe = $tot_importe + $importe;


$tot_ex = $tot_ex + $ex_capita;


$a_cuenta;

if ($a_cuenta != 0.00){$a_cuenta = number_format($a_cuenta,2);}else{$a_cuenta = "-";}
if ($ex_capita != 0.00){$ex_capita = number_format($ex_capita,2);}else{$ex_capita = "";}

?>

<tr class="Estilo7">
    <td class="Estilo7"><span class="Estilo2"><?php echo $fecha_pago_fact;?></span></td>
    <td class="Estilo7"><span class="Estilo7"><?php echo $sigla." (".$nro_os.")";?></span></td>
    <td class="Estilo7"><div align="center"><?php echo $motivo;?></div></td>
    <td class="Estilo7"><div align="center"><?php echo $porcentaje;?></div></td>
    <td class="Estilo7"><div align="center"><?php echo $tipo_pago;?>
        </div>
      <div align="center"></div>
    <div align="center" class="Estilo11"></div></td>
    <td><div align="center"><span class="Estilo7"><?php echo $nro_factura;?> <?php echo $marca;?></span></div></td>
    <td><span class="Estilo7"><?php echo $fecha_original_fact;?></span></td>
    <td><div align="right" class="Estilo2" > <?php echo number_format($importe,2);?>  </div></td>
    <td><div align="right"><span class="Estilo2"><?php echo $a_cuenta;?></span></div></td>
    <td><div align="right" class="Estilo2"> -<?php echo $ex_capita;?> </div></td>
     <td><div align="right" class="Estilo2"><?php echo number_format($bruto,2);?> </div></td>
  </tr>
<?php 

break;
}

case "300":{


//$saldo_cta_cte = $saldo_cta_cte - $bruto;

?>


<tr><td colspan="6" scope="col">&nbsp;</td>
  <td colspan="5" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo7">
  <td colspan="7" class="Estilo7" scope="col"><div align="right" class="Estilo2"></div>    
  <div align="right"><span class="Estilo2 Estilo10">Total Facturas  liquidadas</span></div>    
  <div align="right"></div>    <div align="right"></div>    <div align="right" class="Estilo6">
        <div align="right"></div>
    </div></td>
  <td class="Estilo7" scope="col"><div align="right"><span class="Estilo13"><?php ECHO number_format($tot_importe,2);?></span></div></td>
  <td class="Estilo7" scope="col"><div align="right"><?php ECHO number_format($total_a_cuenta,2);?></div></td>
  <td class="Estilo7" scope="col"><div align="right"><span class="Estilo13"><?php ECHO number_format($tot_ex,2);?></span></div></td>
  <td><div align="right"><span class="Estilo13"><?php ECHO number_format($bruto,2);?></span></div></td>

  <?php 

$brut = $bruto;

break;
}

case "390":{

IF (($periodo <= 8) and ($nro_liquidacion < 2) and ($anio_liquidacion == 10)){
$importe = "";

}


//if ($band_deb == 1){


if ($sit_iva == 1){
	$total_iva = "";
}


$total_excedente = $tot_ex - $total_iva;
//$importe = $importe + $total_a_cuenta;


?>
<tr class="Estilo7">
  <td colspan="10" class="Estilo7" scope="col"><div align="right"><span class="Estilo2 Estilo10">Total Excedente Capita</span></div></td>
  <td><div align="right"><span class="Estilo2"><?php echo number_format($total_excedente,2);?></span></div></td>
<tr class="Estilo7">
  <td colspan="10" class="Estilo7" scope="col"><div align="right"><span class="Estilo2 Estilo10">IVA</span></div></td>
  <td><div align="right"><span class="Estilo2"><?php echo number_format($total_iva,2);?></span></div></td>
<!-- <tr class="Estilo7">
  <td colspan="10" class="Estilo7" scope="col"><div align="right"> A CUENTA </div></td>
  <td><div align="right"><span class="Estilo2"><?php echo number_format($total_a_cuenta,2);?></span></div></td> -->
<tr class="Estilo7">
  <td colspan="11" class="Estilo19" scope="col"><hr noshade></td>
<tr class="Estilo7">
  <td colspan="11" class="Estilo19" scope="col"><div align="right">SALDO ACTUALIZADO DE FACTURAS ADEUDADAS POR OBRA SOCIAL <?php  echo number_format($importe,2);?></div></td>
  <tr class="Estilo7">
  <td colspan="11" scope="col"><hr noshade></td>
</table>

<?php 
$band_deb = 2;
//}

$saldo_debitos = $brut;
break;

}


case "400":{

		if ($banderin == 1){
$banderin = 0;
			?>
	<table width="641" border="0">
  <tr bgcolor="#FFFFFF">
    <td colspan="9" scope="col"><div align="center" class="Estilo12">
      <div align="left"><strong>AJUSTES  (DEBITOS O CREDITOS) SOBRE FACTURAS LIQUIDADAS </strong></div>
    </div></td>
  </tr>
  <tr bgcolor="#FFFFFF" class="Estilo8">
    <td width="55" scope="col"><div align="center" class="Estilo3 Estilo4 Estilo9"><span class="Estilo5  Estilo2">Fec. Mov. </span></div></td>
    <td width="93" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">O. Social </span></div></td>
    <td width="44" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">Comp.</span></div></td>
    <td width="55" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">Fec. Orig.</span></div></td>
    <td width="195" scope="col"><div align="center" class="Estilo5 Estilo9">Motivo</div></td>
    <td width="52" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo7"><span class="Estilo5">Debitos</span></span></div></td>
    <td width="48" scope="col"><div align="center" class="Estilo5 Estilo9">Cr&eacute;dito</div></td>
    <td width="65" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">Neto</span></div></td>
  </tr>
  <!-- <tr class="Estilo7">
    <td colspan="6" scope="col"><span class="Estilo2">BRUTO PAGADO </span></td>
    <td scope="col"><div align="center"></div></td>
    <td scope="col"><div align="right"><span class="Estilo2"><?php ECHO number_format($brut,2);?></span></div></td>
  </tr> --></table>


  <?php 
}
  

	$sql12="select * from datos_os where nro_os like '$nro_os'";
$result12 = $db_os->Execute($sql12);
$sigla=strtoupper($result12->fields["sigla"]);
$sigla = substr($sigla,0,7);

 $sql1="select * from ajustes where cod_ajuste = $ajuste and tipo_ajuste = '$tipo_ajuste'"; //4
$result1 = $db->Execute($sql1);

$motivo=strtoupper($result1->fields["ajuste"]); // 2617
$motivo=substr($motivo,0,25);


?>
<table width="641" border="0">



<?php 	


switch ($tipo_pago){

case "AJ_POSITIVO":{

			
			$saldo_debitos = $saldo_debitos + $importe;
?>   <tr class="Estilo7">
    <td width="53" scope="col"><span class="Estilo2"><?php ECHO $fecha;?></span></td>
    <td width="97" scope="col"><span class="Estilo2"><?php ECHO $sigla;?></span></td>
    <td width="44" scope="col"><div align="center"><span class="Estilo2"><?php ECHO $nro_factura;?></span></div></td>
    <td width="54" scope="col"><div align="center"><span class="Estilo2"><?php ECHO $fecha;?></span></div></td>
    <td width="195" scope="col"><div align="left"><span class="Estilo2"><?php ECHO $motivo;?></span></div></td><td width="52" scope="col"><div align="right"><span class="Estilo2"> - </span></div></td>
    <td width="49" scope="col"><div align="right"><span class="Estilo2"><?php ECHO number_format($importe,2);?></span></div></td>
<td width="63" scope="col"><div align="right"><span class="Estilo2"><?php ECHO number_format($saldo_debitos,2);?></span></div></td>
  </tr>
<?php 
		break;}

case "AJ_NEGATIVO"://novedades al debito
		{
		
			$saldo_debitos = $saldo_debitos - $importe;

?>  

 <tr class="Estilo7">
    <td width="53" scope="col"><span class="Estilo2"><?php ECHO $fecha;?></span></td>
    <td width="97" scope="col"><span class="Estilo2"><?php ECHO $sigla;?></span></td>
    <td width="44" scope="col"><div align="center"><span class="Estilo2"><?php ECHO $nro_factura;?></span></div></td>
    <td width="54" scope="col"><div align="center"><span class="Estilo2"><?php ECHO $fecha;?></span></div></td>
    <td width="195" scope="col"><div align="left"><span class="Estilo2"><?php ECHO $motivo;?></span></div></td><td width="52" scope="col"><div align="right"><span class="Estilo2"> -<?php ECHO number_format($importe,2);?> </span></div></td>
    <td width="49" scope="col"><div align="right"><span class="Estilo2"></span></div></td>
<td width="63" scope="col"><div align="right"><span class="Estilo2"><?php ECHO number_format($saldo_debitos,2);?></span></div></td>
  </tr>
<?php 	


		break;}

}
		if ($saldo_debitos == 0){

include ("sin_acreeditacion.php");

}




    

	
	?>


  




<?php 


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
  <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2">-<?php ECHO number_format($importe,2);?></span></div></td>
  <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?php ECHO number_format($bruto,2);?></span></div></td>
  <td class="Estilo2" scope="col"><div align="right" class="Estilo6">
    <div align="right"><span class="Estilo2"><?php ECHO number_format($acumulado_mensual,2);?></span></div>
  </div></td>
</tr><?php 
$saldo_debitos = $acumulado_mensual;	
?>
<tr>
  <td colspan="8" scope="col"><hr noshade></td>
</tr><?php 
	break;
?></TABLE>
<?php 
}

case "600":

	{

	if ($bande == 1){

?>

 <table width="641" border="0">
  <tr bgcolor="#FFFFFF">
    <td colspan="8" scope="col"><div align="center" class="Estilo12">
      <div align="left"><strong>AJUSTES  (DEBITOS O CREDITOS) SOBRE FACTURAS DE LIQUIDACIONES ANTERIORES </strong></div>
    </div></td>
  </tr>
  <tr bgcolor="#FFFFFF" class="Estilo8">
    <td width="58" scope="col"><div align="center" class="Estilo3 Estilo4 Estilo9"><span class="Estilo5  Estilo2">Fec. Mov. </span></div></td>
    <td width="94" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">O. Social </span></div></td>
    <td width="48" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">Comp.</span></div></td>
    <td width="54" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">Fec. Orig.</span></div></td>
    <td width="189" scope="col"><div align="center" class="Estilo5 Estilo9">Motivo</div></td>
    
	<td width="53" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">Debitos</span></div></td>
    <td width="48" scope="col"><div align="center" class="Estilo5 Estilo9">Cr&eacute;dito</div></td>
    
	<td width="63" scope="col"><div align="center" class="Estilo5 Estilo9"><span class="Estilo5">Neto</span></div></td>
  </tr>

  <!-- <tr class="Estilo7">
    <td colspan="6" scope="col"><span class="Estilo2">NETO DE AJUSTES </span></td>
    <td class="Estilo2" scope="col"><div align="center"></div></td>
    <td class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?php ECHO number_format($saldo_debitos,2);?></span></div></td>
  </tr>  -->
</TABLE> 
<?php  $saldo= $saldo_debitos;

	  $bande = 2;
	}

	
 $sql1="select * from ajustes where cod_ajuste = $ajuste and tipo_ajuste = '$tipo_ajuste'"; //4
$result1 = $db->Execute($sql1);

$motivo=strtoupper($result1->fields["ajuste"]); // 2617
$motivo=substr($motivo,0,25);

$sql1="select fecha from factura where nro_factura like '$nro_factura'";
$result1 = $db->Execute($sql1);
$fecha_original=$result1->fields["fecha"];


$sql1="select sigla from datos_os where nro_os like '$nro_os'";
$result1 = $db_os->Execute($sql1);
$sigla=strtoupper($result1->fields["sigla"]);
$sigla = substr($sigla,0,7);

	?>
<table width="641" border="0">
  <!--DWLayoutTable-->



<?php 


   switch ($tipo_pago){

case "AJ_POSITIVO":{

			
			 $saldo = round($saldo + $importe,2);
			$total_credito = round($total_credito + $importe,2);
?> <tr class="Estilo7">
    <td width="60" scope="col"><span class="Estilo2"><?php ECHO $fecha_movimiento;?></span></td>
    <td width="94" scope="col"><span class="Estilo2"><?php ECHO $sigla;?></span></td>
    <td width="50" scope="col"><div align="center"><span class="Estilo2"><?php ECHO $nro_factura;?></span></div></td>
    <td width="54" scope="col"><div align="center"><span class="Estilo2"><?php ECHO $fecha;?></span></div></td>
    <td width="185" scope="col"><div align="left"><span class="Estilo2"><?php ECHO $motivo;?></span></div></td><td width="55" scope="col"><div align="right"><span class="Estilo2"> - </span></div></td>
    <td width="47" scope="col"><div align="right"><span class="Estilo2"><?php ECHO number_format($importe,2);?></span></div></td>
<td width="62" scope="col"><div align="right"><span class="Estilo2"><?php ECHO number_format($saldo,2);?></span></div></td>
  </tr>
<?php 
		break;}


case "AJ_NEGATIVO"://novedades al debito
		{
		
			 $saldo = round($saldo - $importe,2);
			$total_debito = round($total_debito + $importe,2);
?>  
<tr class="Estilo7">
    <td width="60" scope="col"><span class="Estilo2"><?php ECHO $fecha_movimiento;?></span></td>
    <td width="94" scope="col"><span class="Estilo2"><?php ECHO $sigla;?></span></td>
    <td width="50" scope="col"><div align="center"><span class="Estilo2"><?php ECHO $nro_factura;?></span></div></td>
    <td width="54" scope="col"><div align="center"><span class="Estilo2"><?php ECHO $fecha;?></span></div></td>
    <td width="185" scope="col"><div align="left"><span class="Estilo2"><?php ECHO $motivo;?></span></div></td><td width="55" scope="col"><div align="right"><span class="Estilo2"> -<?php ECHO number_format($importe,2);?></span></div></td>
    <td width="47" scope="col"><div align="right"><span class="Estilo2">-</span></div></td>
<td width="62" scope="col"><div align="right"><span class="Estilo2"><?php ECHO number_format($saldo,2);?></span></div></td>
  </tr>
<?php 	


		break;}
}

if ($saldo == 0){


	if ($saldo == 0){


include ("sin_acreeditacion.php");

}

}

  
?></table>
<?php 


$total_debitos_pen = $total_de + $importe;
	break;
	}

	case "700":{
?>
	<table width="641" border="0">
	<tr class="Estilo7">
  <td colspan="5" scope="col">&nbsp;</td>
  <td colspan="3" scope="col"><hr noshade></td>
  </tr>
<tr class="Estilo7">
  <td colspan="5" scope="col"><div align="right" class="Estilo2">Sub-Total </div></td>
  <td width="57" class="Estilo2" scope="col"><div align="right"><span class="Estilo2">-<?php ECHO number_format($total_debito,2);?></span></div></td>
  <td width="45" class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?php ECHO number_format($total_credito,2);?></span></div></td>
  <td width="62" class="Estilo2" scope="col"><div align="right" class="Estilo6">
    <div align="right"><span class="Estilo2"><?php ECHO number_format($saldo,2);?></span></div>
  </div></td>
</tr>
<tr>
  <td colspan="8" scope="col"><hr noshade></td>
</tr></table><?php 
	$saldo_retenciones = $saldo;
	break;
	?><?php 
}



case "800":{

	switch ($motivo) {
	case "10": {

if ($sit_iva == 1){
	if ($saldo_retenciones > 0){
$iva_facturado = $saldo_retenciones - $importe;
	}
}

//if ($bande1 == 1){
?>




<table width="641" border="0">
  <!--DWLayoutTable-->
   
<?php if ($sit_iva == 1){	?>
	<tr bgcolor="#000099" class="Estilo8">
    <td height="27" colspan="4" bgcolor="#FFFFFF" scope="col"><div align="right"><span class="Estilo25 Estilo10">IVA FACTURADO </span></div></td>
    <td bgcolor="#FFFFFF"  scope="col"><div align="right"><span class="Estilo29">-<?php ECHO number_format($iva_facturado,2);?></span></div></td>
  </tr>
<?php }?>


  <tr bgcolor="#000099" class="Estilo8">
    <td height="27" colspan="4" bgcolor="#FFFFFF" scope="col"><div align="right"><span class="Estilo25 Estilo10">SUJETO A RETENCIONES </span></div></td>
    <td bgcolor="#FFFFFF"  scope="col"><div align="right"><span class="Estilo29"><?php ECHO number_format($importe,2);?></span></div></td>
  </tr>
  <tr bgcolor="#000099" class="Estilo8">
    <td width="257" bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo28 Estilo9">
      <div align="center" class="Estilo12>
        <div align="left"></div>
      </div>
    </div>      <span class="Estilo12&gt; &lt;div align= Estilo9 Estilo11"><strong>RETENCIONES Y APORTES</strong></span>
    <div align="center" class="Estilo2 Estilo5 Estilo6 Estilo8 Estilo28 Estilo9"></div></td>
    <td width="81" bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo8 Estilo28 Estilo9">Base</span></span></div></td>
    <td width="96" bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo8 Estilo28 Estilo9">Porc./Cuota DGI </div></td>
    <td width="98" bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo2 Estilo5 Estilo6 Estilo8 Estilo28 Estilo9">Débito</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Crédito</div></td>
    <td width="87" bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo9 Estilo28">Neto Retenc.</span></div>      
    <div align="center" class="Estilo8 Estilo28"></div>    </div></td>
  </tr>
 </TABLE>
<?php 
$saldo_retenciones_adm = $importe;
$base_impuesto = $importe;
	$bande1=2;

	//}
$dgr_base = $importe;

	$base_sin_cos = $importe;
	break;
	}


case "11": {

$base_cos = $importe;
$dif_cose = $base_cos - $base_sin_cos;

?><table width="641" border="0">
<tr class="Estilo7">
    <td width="250" height="20" class="Estilo2" scope="col"><div align="right"><span class="Estilo7">Suma de Coseguros Percibidos:</span></div>
    <div align="center" class="Estilo10"></div></td>
    <td width="84" class="Estilo2" scope="col"><div align="center" class="Estilo10"><span class="Estilo7"><?php ECHO number_format($dif_cose,2);?></span></div></td>
    <td width="75" class="Estilo2" scope="col"><div align="left"><span class="Estilo7"> </span></div></td>
    <td width="124" class="Estilo2" scope="col"></div>
    <td width="86" class="Estilo2" scope="col"><div align="right">
    <div align="right"></div>
</TABLE>
<?php 
break;
}

case "20": {

$saldo_retenciones_adm = $base_impuesto - $importe;
$total_importe = $total_importe + $importe;

?>  <table width="641" border="0">
<tr class="Estilo7">
    <td width="249" height="20" class="Estilo2" scope="col"><div align="right"><span class="Estilo7">Aportes Administrativos:</span></div>
    <div align="center" class="Estilo10"></div></td>
    <td width="83" class="Estilo2" scope="col"><div align="center" class="Estilo10"><span class="Estilo7"><?php ECHO number_format($base_cos,2);?></span></div></td>
    <td width="73" class="Estilo2" scope="col"><div align="left"><span class="Estilo7"><?php ECHO number_format($porcentaje,2)." %";?>  </span></div></td>
    <td width="66" class="Estilo2" scope="col"><div align="right">-<?php 


	ECHO number_format($importe,2);?>    
    </div>
    <td width="55" class="Estilo2" scope="col">    
    <td width="89" class="Estilo2" scope="col"><div align="right">
    <div align="right"><?php ECHO number_format($saldo_retenciones_adm,2);?></div>
</TABLE>

<?php 
$saldo_retenciones_adm = round($saldo_retenciones_adm,2);
if ($saldo_retenciones_adm == 0){
include ("sin_acreeditacion.php");
}


		break;}

		case "30": {
	
$saldo_retenciones_adm = 	round($saldo_retenciones_adm - $importe,2);
$total_importe = round($total_importe + $importe,2);
if ($importe > 0){
?>  

  <table width="641" border="0">
  <tr class="Estilo7">
    <td width="249" height="20" class="Estilo2" scope="col"><div align="right"><span class="Estilo7">DGI Retención: </span> </div>
    <div align="center" class="Estilo10"></div></td>
    <td width="83" class="Estilo2" scope="col"><div align="center" class="Estilo10"><?php ECHO number_format($bruto,2);?></div></td>
    <td width="72" class="Estilo2" scope="col"><div align="left"><span class="Estilo10"><?php ECHO number_format($acumulado_mensual,2);?></span></div></td>
    <td width="68" valign="top" class="Estilo2" scope="col">      <div align="right">
      -<?php 
	ECHO number_format($importe,2);?>    
    </div>
    <td width="55" valign="top" class="Estilo2" scope="col">    
    <td width="88" class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?php ECHO number_format($saldo_retenciones_adm,2);?></span> </div></table>


<?php 
$saldo_retenciones_adm;


$saldo_retenciones_adm = round($saldo_retenciones_adm,2);
if ($saldo_retenciones_adm == 0){
include ("sin_acreeditacion.php");
}
}
	
 

		break;}



case "40": {

$saldo_retenciones_adm = $saldo_retenciones_adm - $importe;
$total_importe = $total_importe + $importe;
if ($importe > 0){
	?>  
 <table width="641" border="0">
 <tr class="Estilo7">
    <td width="249" height="20" class="Estilo2" scope="col"><div align="right"><span class="Estilo7">DGR Retención: </span> </div>
    <div align="center" class="Estilo10"></div></td>
    <td width="83" class="Estilo2" scope="col"><div align="center" class="Estilo10"><span class="Estilo10"><?php ECHO number_format($dgr_base,2);?></span></div></td>
    <td width="70" class="Estilo2" scope="col"><div align="left"><span class="Estilo7"><?php ECHO number_format($porcentaje,2)." %";?>  </span></div></td>
    <td width="69" valign="top" class="Estilo2" scope="col"><div align="right">-<?php 
	ECHO number_format($importe,2);?>    
    </div>
    <td width="57" valign="top" class="Estilo2" scope="col">    
    <td width="87" class="Estilo2" scope="col"><div align="right"><span class="Estilo2"><?php ECHO number_format($saldo_retenciones_adm,2);?></span> </div></table>
<?php 


$saldo_retenciones_adm = round($saldo_retenciones_adm,2);
if ($saldo_retenciones_adm == 0){
include ("sin_acreeditacion.php");
}


}	



		break;	}


}
	break;
?>	
<?php 
}//cierra motivo en 800 retenciones

case "900":{
$novedades = "";
$saldo_net_retenc = $importe - $iva_facturado;
?>



<table width="641" border="0">
  <!--DWLayoutTable-->
<tr class="Estilo7">
  <td height="22" colspan="3" valign="top" class="Estilo2" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
  <td colspan="7" valign="top" class="Estilo2" scope="col"><hr noshade></td>
 </tr>
<tr class="Estilo7">
  <td height="20" colspan="6" valign="top" class="Estilo2" scope="col"><div align="right">Sub -Total Neto Retenciones y Aportes</div></td>
  <td width="72" valign="top" class="Estilo2" scope="col"><div align="right">-<?php ECHO number_format($total_importe,2);?></div></td>
  <td width="54" valign="top" class="Estilo2" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
  <td width="87" colspan="2" valign="top" scope="col"><div align="right"><?php ECHO number_format($saldo_net_retenc,2);?></div></td>
</tr>

<?php  if ($sit_iva == 1){?>
<tr class="Estilo7">
  <td height="20" colspan="6" valign="top" class="Estilo2" scope="col"><div align="right">IVA Facturado </div></td>
  <td valign="top" class="Estilo2" scope="col"><div align="right"></div></td>
  <td valign="top" class="Estilo2" scope="col"><div align="right"><?php ECHO number_format($iva_facturado,2);?></div></td>
  <td colspan="2" valign="top" scope="col"><div align="right"></div></td>
</tr>
<?php }?>

<tr class="Estilo7"><td height="20" colspan="6" valign="top" class="Estilo2" scope="col"><div align="right" class="Estilo2">Total</div></td>
  <td valign="top" class="Estilo2" scope="col"><div align="right"><span class="Estilo7">
  </span></div></td>
  <td valign="top" class="Estilo2" scope="col"><!--DWLayoutEmptyCell-->&nbsp;</td>
  <td colspan="2" valign="top" scope="col"><div align="right" class="Estilo13">
        <div align="right"><span class="Estilo7">  <?php  ECHO number_format($importe,2);?>
        </span></div>
  </div></td>
</tr>

<tr class="Estilo2">
  <td height="22" colspan="10" valign="top" class="Estilo2" scope="col"><hr noshade></td>
 </tr>
</table>



<?php  
//if ($band_acred ==1){

	
?>	



 
<?php 
$saldo_novedades = $importe;
  $band_acred = 2;
//}

$saldo_novedades = round($saldo_novedades,2);
if ($saldo_novedades == 0){
include ("sin_acreeditacion.php");
}

break;


} //cierra el caso 900


case "1000":
case "1100":
	
// NOVEDADES
	{

if ($novedades == ""){
	$novedades = 1;
?>

<table>
 <tr bgcolor="#FFFFFF">
    <td height="17" colspan="10" scope="col"><div align="center" class="Estilo12">
      <div align="left"><strong>ACREEDITACIONES Y DESCUENTOS</strong></div>
    </div></td>
  </tr>
  <tr bgcolor="#FFFFFF" class="Estilo8">
    <td width="77" height="15" class="Estilo5" scope="col"><div align="center" class="Estilo4 Estilo3 Estilo28 Estilo9"><span class="Estilo5  Estilo2">Fec. Mov. </span></div></td>
    <td width="204" class="Estilo5" scope="col"><div align="center" class="Estilo5 Estilo28 Estilo9"><span class="Estilo5">Motivo</span></div></td>
    <td colspan="2" class="Estilo5" scope="col"><div align="center" class="Estilo5 Estilo28 Estilo9"><span class="Estilo5">Comp.</span></div></td>
  <!--   <td width="59" class="Estilo5" scope="col"><div align="center" class="Estilo5">Fec. Orig<span class="Estilo7 ">.</span></div></td> -->
    <td width="62" class="Estilo5" scope="col"><div align="center" class="Estilo5 Estilo28 Estilo9"><span class="Estilo5">Saldo Ade.</span></div></td>
    <td colspan="2" class="Estilo5" scope="col"><div align="center"><span class="Estilo5 Estilo28 Estilo9">Debitos</span></div></td>
    <td colspan="2" class="Estilo5" scope="col"><div align="center" class="Estilo5 Estilo28 Estilo9">Cr&eacute;dito</div></td>
    <td width="74" class="Estilo5" scope="col"><div align="center" class="Estilo5 Estilo28 Estilo9"><span class="Estilo5">Neto</span></div></td>
  </tr>
  

<!--  <tr bgcolor="#FFFFFF" class="Estilo8">
    <td height="20" colspan="2" class="Estilo5" scope="col"><span class="Estilo2"><span class="Estilo25">SUB - TOTAL NETO DE RETENCIONES </span></span></td>
    <td colspan="8" class="Estilo5 Estilo9" scope="col"><div align="right"><?php ECHO number_format($importe,2);?></div></td>
  </tr> -->
 <tr>
   <td height="3"></td>
   <td></td>
   <td width="32"></td>
   <td width="20"></td>
   <td></td>
   <td width="0"></td>
   <td width="63"></td>
   <td width="60"></td>
   <td width="7"></td>
   <td></td>
 </tr>
</TABLE>
<?php 
}

IF ($transaccion == 'TR_POSITIVA'){
	$transaccion = 'TR_POSITIVO';
}


 $sql1="select * from ajustes where cod_ajuste = '$ajuste' and tipo_ajuste like '$transaccion'"; //4
$result1 = $db->Execute($sql1);

$motivo=strtoupper($result1->fields["abreviatura"]); // 2617

?><table width="641" border="0">
  


<?php 	switch ($tipo_pago){

case "TR_POSITIVO":{
				$saldo_novedades = round($saldo_novedades + $importe,2);
					$total_pos = $total_pos + $importe;
?><tr>
    <td width="70" class="Estilo2" scope="col"><span class="Estilo7"><?php ECHO $fecha;?></span></td>
    <td colspan="3" class="Estilo2" scope="col"><span class="Estilo7"><?php ECHO $motivo;?></span></td>
    <td width="62" class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?php ECHO $nro_factura;?></span></div></td>
    <!-- <td class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?php ECHO $fecha;?></span></div></td> -->
	<td width="54" class="Estilo7" scope="col"><div align="right"><span class="Estilo7"><?php ECHO $saldo_deuda;?>  
    </span></div></td>
    <td width="70" class="Estilo7" scope="col"><div align="right">-</div></td>
    <td width="69" class="Estilo7" scope="col"><div align="right"><span class="Estilo7"><?php  echo number_format($importe,2);?></span></div></td>
<td width="73" scope="col"><div align="right"><span class="Estilo7"><?php  echo number_format($saldo_novedades,2);?></span></div></td>
  </tr>
<?php 
		break;}


case "TR_NEGATIVO"://novedades al debito
		{

				$total_neg = $total_neg + $importe;
			$saldo_novedades = round($saldo_novedades - $importe,2);
?>
<tr>
    <td width="70" class="Estilo2" scope="col"><span class="Estilo7"><?php ECHO $fecha;?></span></td>
    <td colspan="3" class="Estilo2" scope="col"><span class="Estilo7"><?php ECHO $motivo;?></span></td>
    <td width="62" class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?php ECHO $nro_factura;?></span></div></td>
    <!-- <td class="Estilo2" scope="col"><div align="center"><span class="Estilo7"><?php ECHO $fecha;?></span></div></td> -->
<td width="54" class="Estilo7" scope="col"><div align="right"><span class="Estilo7"><?php ECHO $saldo_deuda;?>  
</span></div></td>
<td width="70" class="Estilo7" scope="col"><div align="right">-<?php  echo number_format($importe,2);?></div></td>
<td width="69" class="Estilo7" scope="col"><div align="right"><span class="Estilo7">- </span></div></td>
<td width="73" scope="col"><div align="right"><span class="Estilo7"> <?php  echo number_format($saldo_novedades,2);?></span></div></td>
  </tr>
<?php 	

if (($saldo_novedades == 0) or ($saldo_novedades == 0.00)){
$opera = "1250"; // caratula deuda

include ("sin_acreeditacion.php");

}
?></TABLE>
<?php 
		break;}
}




break;
	}

	



	case "1200":{

if (($total_neg == 0.00) && ($total_pos == 0.00)){

?>
<table>
 <tr bgcolor="#FFFFFF">
    <td height="17" colspan="10" scope="col"><div align="center" class="Estilo12">
      <div align="left"><strong>ACREEDITACIONES Y DESCUENTOS</strong></div>
    </div></td>
  </tr>
  <tr bgcolor="#FFFFFF" class="Estilo8">
    <td width="77" height="15" class="Estilo5" scope="col"><div align="center" class="Estilo4 Estilo3 Estilo28 Estilo9"><span class="Estilo5  Estilo2">Fec. Mov. </span></div></td>
    <td width="204" class="Estilo5" scope="col"><div align="center" class="Estilo5 Estilo28 Estilo9"><span class="Estilo5">Motivo</span></div></td>
    <td colspan="2" class="Estilo5" scope="col"><div align="center" class="Estilo5 Estilo28 Estilo9"><span class="Estilo5">Comp.</span></div></td>
  <!--   <td width="59" class="Estilo5" scope="col"><div align="center" class="Estilo5">Fec. Orig<span class="Estilo7 ">.</span></div></td> -->
    <td width="62" class="Estilo5" scope="col"><div align="center" class="Estilo5 Estilo28 Estilo9"><span class="Estilo5">Saldo Ade.</span></div></td>
    <td colspan="2" class="Estilo5" scope="col"><div align="center"><span class="Estilo5 Estilo28 Estilo9">Debitos</span></div></td>
    <td colspan="2" class="Estilo5" scope="col"><div align="center" class="Estilo5 Estilo28 Estilo9">Cr&eacute;dito</div></td>
    <td width="74" class="Estilo5" scope="col"><div align="center" class="Estilo5 Estilo28 Estilo9"><span class="Estilo5">Neto</span></div></td>
  </tr></table>

<?php 

}
?>


<table width="641" border="0"><tr>
    <td width="385" class="Estilo2" scope="col"><div align="center"></div></td>
    <td colspan="3" class="Estilo7" scope="col"><div align="right"><span class="Estilo7">  
</span></div>      <div align="right">
    <hr noshade>
      </div><div align="right">
</div></td>
</tr>
  <tr>
    <td class="Estilo2" scope="col"><div align="left"><span class="Estilo5"><span class="Estilo25">SUB - TOTAL ACREEDITACIONES Y DESCUENTOS </span></span></div></td>
    <td width="96" class="Estilo7" scope="col"><div align="right">
      -<?php  ECHO number_format($total_neg,2);?>
    </div></td>
    <td width="69" class="Estilo7" scope="col"><div align="right">
      <?php ECHO  number_format($total_pos,2);?>
    </div></td>
    <td width="73" scope="col"><div align="right"><span class="Estilo49 Estilo7"><strong><?php  echo number_format($saldo_novedades,2);?></strong></span></div></td>
  </tr>
</table>
<?php 

		IF ($saldo_novedades > 0 ){
	 
 $sql_facturante = "SELECT * FROM `facturante` WHERE `nro_laboratorio` = '$nro_laboratorio'";
$result_facturante = $db->Execute($sql_facturante);

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
  <td colspan="9" scope="col"><div align="right" class="Estilo22">IMPORTE ACREEDITADO<span class="Estilo6"> $<?php ECHO number_format($saldo_novedades,2);?></span></div>    </strong></td>
</tr></table>


<?php $acree = 1;
		
		
	}else{

		
		?><table width="641" border="0">
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
</tr></table><?php 
	$acree = 1;}
break;
	}


	case "2000":{




	


$sql12="select sum(saldo_deuda) as saldo_total from $liquidacion where `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion' and periodo like '$periodo' and nro_liquidacion = $nro_liquidacion and operacion = 2000 order by operacion, motivo";
$result12 = $db->Execute($sql12);
$saldo_total=strtoupper($result12->fields["saldo_total"]);
$saldo_1=strtoupper($result12->fields["saldo_total"]);

if ($pasada == ""){
	$pasada = 1;
?>

<table width="641" border="0">

<tr bgcolor="#FFFFFF" class="Estilo6">
  <td colspan="9" scope="col"><div align="center" class="Estilo12">ESTADO DE CTA CTE POR OPERACIONES ADEUDADAS A LA ASOCIACION BIOQUIMICA DE MENDOZA</div></td>
</tr>
	
<tr class="Estilo6 Estilo4 Estilo9">
  <td colspan="10" bgcolor="#FFFFFF" class="Estilo6 Estilo4 Estilo9"  scope="col"><CENTER><STRONG>CUENTA: <?php echo $nombre_laboratorio;?>  <BR>
  <BR>
  </STRONG>
  </CENTER></td>
</tr>
<tr bgcolor="#FFFFFF" class="Estilo8">
  <td colspan="9" class="Estilo5 Estilo9" scope="col"><div align="center"><STRONG>DETALLE DE LA DEUDA </STRONG></div></td>
  </tr>
<tr bgcolor="#E6E6E6" class="Estilo8">
  <td class="Estilo5 Estilo9" scope="col">Fecha orig.</td>
  <td width="182" class="Estilo5 Estilo9" scope="col">Operacion</td>
  <td width="38" class="Estilo5 Estilo9" scope="col">Comp.</td>
  <td class="Estilo5" scope="col"><div align="center" class="Estilo9">Importe</div></td>
  <td class="Estilo5" scope="col"><div align="center" class="Estilo9">Dto x Liq</div>    </td>
  <td class="Estilo5" scope="col"><div align="center" class="Estilo9">Fec. Caja</div></td>
  <td colspan="2" class="Estilo5 Estilo9" scope="col">Pago Caja </td>
  <td width="70" class="Estilo5" scope="col"><div align="center" class="Estilo9">Saldo Deudor</div></td>
</tr>
</table>

<?php 
	$pasada = 2;}

$sql1="select * from ajustes where cod_ajuste = $ajuste and tipo_ajuste = '$tipo_ajuste'"; //4
$result1 = $db->Execute($sql1);

$motivo=strtoupper($result1->fields["ajuste"]); // 2617
$motivo = substr($motivo,0,18);

if ($fecha_movimiento == '00-00-0000'){$fecha_movimiento = "-";}
if ($acumulado_mensual == '0.00'){$acumulado_mensual = "-";}
?>
	
  <table width="641" border="0">    
      <tr bgcolor="#FFFFFF" class="Estilo8">
        <td width="54" class="Estilo5" scope="col"><span class="Estilo9"><?php echo $fecha;?></span></td>
        <td width="182" class="Estilo5" scope="col"><span class="Estilo9"><?php echo $motivo;?></span></td>
        <td width="38" class="Estilo5" scope="col"><span class="Estilo9"><?php echo $nro_factu;?></span></td>
        <td width="52" class="Estilo5" scope="col"><div align="center" class="Estilo9"><?php  echo $importe;?>
</div></td>
        <td width="63" class="Estilo5" scope="col"><div align="center" class="Estilo9"><?php  echo $dto_liq;?>
        </div></td>
        <td width="67" class="Estilo5" scope="col"><div align="center" class="Estilo9"><?php   $fecha_movimiento;?></div></td>
        <td colspan="2" class="Estilo5 Estilo9" scope="col"><div align="center"><span class="Estilo9"><?php  echo $acumulado_mensual;?></span></div></td>
        <td width="70" class="Estilo5" scope="col"><div align="rigth" class="Estilo9">
          <div align="right">-<?php echo $saldo_deuda;?></div>
        </div></td>
      </tr>
</table>

<?php 


		

	break;}//cierra el caso 2000 deuda



}//cierra el bucle operacion


$pasada = 1;
$result2->MoveNext();
  }


?>
    <?php 


if ($nro_lab != $nro_laboratorio){

	$total_importe = 0;
?></TABLE>
<?php 

if ($acree != 1){

	
	?><table width="641" border="0"><tr class="Estilo6 Estilo4 Estilo9">
  <td colspan="10" bgcolor="#FFFFFF" class="Estilo6 Estilo4 Estilo9"  scope="col">&nbsp;</td>
</tr>
    <tr class="Estilo6 Estilo4 Estilo9">
      <td colspan="9" bgcolor="#FFFFFF" class="Estilo6 Estilo4 Estilo9"  scope="col">&nbsp;</td>
      <td bgcolor="#FFFFFF" class="Estilo6 Estilo4 Estilo9"  scope="col"><hr noshade></td>
    </tr>
    <tr class="Estilo6 Estilo4 Estilo9">
      <td colspan="9" bgcolor="#FFFFFF" class="Estilo6 Estilo4 Estilo9"  scope="col"><div align="right"><strong>SALDO PENDIENTE DE PAGO : $ </strong></div></td>
      <td bgcolor="#FFFFFF" class="Estilo6 Estilo4 Estilo9"  scope="col"><div align="right"><strong>-<?php echo NUMBER_FORMAT($saldo_1,2);?></strong></div></td>
    </tr></table>

<?php }

	$total = $total_neto_gravado + $total_iva + $total_exento;
	$saldo_1 = "";
	?>

	  <?php 
}

 $total_excedente = "";
$total_credito = "";
$total_debito = "";
?>

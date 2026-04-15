<?php 



switch ($operacion){
	case "100":{

IF (($periodo <= 8) and ($nro_liquidacion < 2) and ($anio == 10)){
$importe = "";
}
 
$pdf->Cell(189,4,"SALDO INICIAL DE FACTURAS ADEUDADAS POR OBRA SOCIAL AL ".$fecha." $".$importe,0,5,'R');
$pdf->ln();
$pdf->SetFont("Arial","I",11);
$pdf->Cell(189,4,$leyenda,0,5,'C');
$pdf->ln();

	$saldo_cta_cte = $importe;
	break;
	}


case "200":{


$pdf->SetFont("Arial","",9);


if ($pagadas == ""){
	$pagadas = 1;


 

	
$pdf->Cell(189,4,"FACTURAS LIQUIDADAS",0,5,'C');
$pdf->ln();
$pdf->SetX(5);
$pdf->Cell(18,5,'Fec. Cob',1,0,'C'); 
$pdf->Cell(28,5,'O.Social',1,0,'C'); 
$pdf->Cell(15,5,'Periodo',1,0,'C'); 
$pdf->Cell(12,5,"%",1,0,'C'); 
$pdf->Cell(20,5,"Pago",1,0,'C'); 
$pdf->Cell(17,5,"Factura",1,0,'C'); 
$pdf->Cell(19,5,"Fec. Fact",1,0,'C'); 
$pdf->Cell(17,5,"Imp. Orig",1,0,'C'); 
$pdf->Cell(17,5,"Saldo",1,0,'C'); 
$pdf->Cell(17,5,'Ex Cap/IVA',1,0,'C');
$pdf->Cell(17,5,'Liq.',1,0,'C');
$pdf->ln();


	}

$ex_capita = "";
$a_cuenta = "";

/*
$sql1="select * from factura where nro_factura = '$nro_factura' and nro_os = $nro_os"; //4
$result1 = $db->Execute($sql1);

$nro_os=strtoupper($result1->fields["nro_os"]); // 2617
$fecha_pago_fact=strtoupper($result1->fields["fecha_pago_fact"]); // 2617
$fecha_original=strtoupper($result1->fields["fecha"]); // 2617
*/



$dia2 = substr($fecha_original,8,2);
$mes2 = substr($fecha_original,5,2);
$anio2 = substr($fecha_original,0,4);
$fecha_original_fact = $dia2."-".$mes2."-".$anio2;


$dia = substr($fecha_pago_fact,8,2);
$mes = substr($fecha_pago_fact,5,2);
$anio = substr($fecha_pago_fact,0,4);
$fecha_pago_fact = $dia."-".$mes."-".$anio;

/*

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


*/
/*include ("../../../conexiones/config_liq.php");
 $sql12="select * from composicion where nro_os like '$nro_os' and nro_factura = $nro_factura and nro_laboratorio = $nro_laboratorio";
$result12 = $db_liq->Execute($sql12);
$iva=$result12->fields["iva"];
$neto_gravado=$result12->fields["neto_gravado"];
$exento=$result12->fields["exento"];

$iva_porc = ($iva * $porcentaje / 100);

if ($iva > 0){
 $sql5 = "INSERT INTO `iva_facturar` ( `nro_laboratorio` , `nro_liquidacion` , `periodo_liquidacion` , `anio_liquidacion` , `importe_original` , `iva` , `porcentaje` )  VALUES ('$nro_laboratorio'  , '$nro_liquidacion' , '$periodo' , '$anio_liquidacion' , '$iva' , '$iva_porc' , '$porcentaje' )";
$result5 = $db_liq->Execute($sql5);
}
*/


 /*
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
*/

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

$pdf->SetX(5);
$pdf->Cell(18,5,$fecha_pago_fact,1,0,'c'); 
$pdf->Cell(28,5,$sigla." (".$nro_os.")",1,0,'L'); 

$pdf->Cell(15,5,$motivo,1,0,'C'); 

$pdf->Cell(12,5,$porcentaje,1,0,'C'); 
$pdf->Cell(20,5,$tipo_pago,1,0,'R'); 
$pdf->Cell(17,5,$nro_factura." ".$marca,1,0,'C'); 
$pdf->Cell(19,5,$fecha_original_fact,1,0,'c'); 

$pdf->Cell(17,5,number_format($importe,2),1,0,'R'); 
$pdf->Cell(17,5,number_format($a_cuenta,2),1,0,'R');  
$pdf->Cell(17,5,"-".$ex_capita,1,0,'R');
$pdf->Cell(17,5,number_format($bruto,2),1,0,'R'); 
$pdf->ln();
 

break;
}





case "300":{


//$saldo_cta_cte = $saldo_cta_cte - $bruto;
$pdf->ln();

 
$pdf->Cell(18,5,'',0,0,'L'); 
$pdf->Cell(28,5,'',0,0,'C'); 
$pdf->Cell(15,5,'',0,0,'C'); 

 
$pdf->Cell(65,5,'TOTAL FACTURAS LIQUIDADAS',0,0,'R'); 

$pdf->Cell(17,5,number_format($tot_importe,2),0,0,'R'); 
$pdf->Cell(17,5,number_format($total_a_cuenta,2),0,0,'R');  
$pdf->Cell(17,5,number_format($tot_ex,2),0,0,'R');
$pdf->Cell(17,5,number_format($bruto,2),0,0,'R'); 
$pdf->ln();



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

 


$pdf->Cell(18,5,'',0,0,'L'); 
$pdf->Cell(28,5,'',0,0,'C'); 
$pdf->Cell(15,5,'',0,0,'C'); 
$pdf->Cell(65,5,'TOTAL EXCEDENTE CAPITA',0,0,'R'); 
$pdf->Cell(17,5,'',0,0,'R'); 
$pdf->Cell(17,5,'',0,0,'R');  
$pdf->Cell(17,5,'',0,0,'R');
$pdf->Cell(17,5,number_format($total_excedente,2),0,0,'R'); 
$pdf->ln();


$pdf->Cell(18,5,'',0,0,'L'); 
$pdf->Cell(28,5,'',0,0,'C'); 
$pdf->Cell(15,5,'',0,0,'C'); 
$pdf->Cell(65,5,'IVA',0,0,'R'); 
$pdf->Cell(17,5,'',0,0,'R'); 
$pdf->Cell(17,5,'',0,0,'R');  
$pdf->Cell(17,5,'',0,0,'R');
$pdf->Cell(17,5,number_format($total_iva,2),0,0,'R'); 
$pdf->ln();



$pdf->ln();

$pdf->Cell(189,7,'SALDO ACTUALIZADO DE FACTURAS ADEUDADAS POR OBRA SOCIAL: $'.number_format($importe,2),1,5,'R');
$pdf->ln();
$pdf->ln();




$band_deb = 2;
//}

$saldo_debitos = $brut;
break;

}


case "400":{


		if ($banderin == 1){
$banderin = 0;


$pdf->Cell(189,4,'AJUSTES  (DEBITOS O CREDITOS) SOBRE FACTURAS LIQUIDADAS: '.number_format($importe,2),0,5,'C');
$pdf->ln();


$pdf->SetFont("Arial","",9);
 
$pdf->Cell(19,5,'Fec. Mov.',1,0,'C'); 
$pdf->Cell(25,5,'O.Social',1,0,'C'); 
$pdf->Cell(17,5,'Comp.',1,0,'C'); 
$pdf->Cell(19,5,"Fec. Orig.",1,0,'C'); 
$pdf->Cell(60,5,"Motivo",1,0,'C'); 
$pdf->Cell(17,5,"Debitos",1,0,'C'); 
$pdf->Cell(17,5,"Creditos",1,0,'C'); 
$pdf->Cell(17,5,"Neto",1,0,'C'); 
$pdf->ln();


}
  

	

switch ($tipo_pago){

case "AJ_POSITIVO":{

			
			$saldo_debitos = $saldo_debitos + $importe;
		$saldo_debitos = $saldo_debitos + $importe;
$pdf->Cell(19,5,$fecha,1,0,'C'); 
$pdf->Cell(25,5,$sigla,1,0,'L'); 
$pdf->Cell(17,5,$nro_factura,1,0,'C'); 
$pdf->Cell(19,5,$fecha,1,0,'C'); 
$pdf->Cell(60,5,$motivo,1,0,'L'); 
$pdf->Cell(17,5,' - ',1,0,'C'); 
$pdf->Cell(17,5,number_format($importe,2),1,0,'C'); 
$pdf->Cell(17,5,number_format($saldo_debitos,2),1,0,'C'); 
$pdf->ln();

		break;}

case "AJ_NEGATIVO"://novedades al debito
		{
		
			$saldo_debitos = $saldo_debitos - $importe;

$pdf->Cell(19,5,$fecha,1,0,'C'); 
$pdf->Cell(25,5,$sigla,1,0,'L'); 
$pdf->Cell(17,5,$nro_factura,1,0,'C'); 
$pdf->Cell(19,5,$fecha,1,0,'C'); 
$pdf->Cell(60,5,$motivo,1,0,'L'); 
$pdf->Cell(17,5, "-".number_format($importe,2),1,0,'C'); 
$pdf->Cell(17,5,'',1,0,'C'); 
$pdf->Cell(17,5,number_format($saldo_debitos,2),1,0,'C'); 
$pdf->ln();



		break;}

}
		if ($saldo_debitos == 0){

include ("sin_acreeditacion_pdf.php");

}





break;


}






case "500":{

$pdf->ln();
$pdf->Cell(19,5,'',0,0,'C'); 
$pdf->Cell(25,5,'',0,0,'C'); 
$pdf->Cell(17,5,'',0,0,'C'); 
$pdf->Cell(19,5,'',0,0,'C'); 
$pdf->Cell(60,5,'SUBTOTAL',0,0,'C'); 
$pdf->Cell(17,5,number_format($importe,2),0,0,'C'); 
$pdf->Cell(17,5,number_format($bruto,2),0,0,'C'); 
$pdf->Cell(17,5,number_format($acumulado_mensual,2),0,0,'C'); 
$pdf->ln();
$pdf->ln();

$saldo_debitos = $acumulado_mensual;	


}





case "600":

	{

	if ($bande == 1){


$pdf->Cell(189,4,'AJUSTES  (DEBITOS O CREDITOS) SOBRE FACTURAS DE LIQUIDACIONES ANTERIORES: '.number_format($importe,2),0,5,'C');
$pdf->ln();


$pdf->SetFont("Arial","",9);
 
$pdf->Cell(19,5,'Fec. Mov.',1,0,'C'); 
$pdf->Cell(25,5,'O.Social',1,0,'C'); 
$pdf->Cell(17,5,'Comp.',1,0,'C'); 
$pdf->Cell(19,5,"Fec. Orig.",1,0,'C'); 
$pdf->Cell(60,5,"Motivo",1,0,'C'); 
$pdf->Cell(17,5,"Debitos",1,0,'C'); 
$pdf->Cell(17,5,"Creditos",1,0,'C'); 
$pdf->Cell(17,5,"Neto",1,0,'C'); 
$pdf->ln();

  $saldo= $saldo_debitos;

	  $bande = 2;
	}

	
 



   switch ($tipo_pago){

case "AJ_POSITIVO":{

			
			 $saldo = round($saldo + $importe,2);
			$total_credito = round($total_credito + $importe,2);


			$pdf->Cell(19,5,$fecha_movimiento,1,0,'C'); 
$pdf->Cell(25,5,$sigla,1,0,'L'); 
$pdf->Cell(17,5,$nro_factura,1,0,'C'); 
$pdf->Cell(19,5,$fecha,1,0,'C'); 
$pdf->Cell(60,5,$motivo,1,0,'L'); 
$pdf->Cell(17,5,' - ',1,0,'C'); 
$pdf->Cell(17,5,number_format($importe,2),1,0,'C'); 
$pdf->Cell(17,5,number_format($saldo,2),1,0,'C'); 
$pdf->ln();



		break;}


case "AJ_NEGATIVO"://novedades al debito
		{
		
			 $saldo = round($saldo - $importe,2);
			$total_debito = round($total_debito + $importe,2);

$pdf->Cell(19,5,$fecha_movimiento,1,0,'C'); 
$pdf->Cell(25,5,$sigla,1,0,'L'); 
$pdf->Cell(17,5,$nro_factura,1,0,'C'); 
$pdf->Cell(19,5,$fecha,1,0,'C'); 
$pdf->Cell(60,5,$motivo,1,0,'L'); 
$pdf->Cell(17,5, "-".number_format($importe,2),1,0,'C'); 
$pdf->Cell(17,5,'',1,0,'C'); 
$pdf->Cell(17,5,number_format($saldo,2),1,0,'C'); 
$pdf->ln();




		break;}
}

if ($saldo == 0){


	if ($saldo == 0){


include ("sin_acreeditacion_pdf.php");

}

}

  


$total_debitos_pen = $total_de + $importe;
	break;
	}



case "700":{

	$pdf->ln();
$pdf->Cell(19,5,'',0,0,'C'); 
$pdf->Cell(25,5,'',0,0,'C'); 
$pdf->Cell(17,5,'',0,0,'C'); 
$pdf->Cell(19,5,'',0,0,'C'); 
$pdf->Cell(60,5,'SUBTOTAL',0,0,'C'); 
$pdf->Cell(17,5,number_format($total_debito,2),0,0,'C'); 
$pdf->Cell(17,5,number_format($total_credito,2),0,0,'C'); 
$pdf->Cell(17,5,number_format($saldo,2),0,0,'C'); 
$pdf->ln();
$pdf->ln();


 
	$saldo_retenciones = $saldo;
	break;
	 
}

case "800":{

	switch ($motivo) {
	case "10": {

if ($sit_iva == 1){
	if ($saldo_retenciones > 0){
$iva_facturado = $saldo_retenciones - $importe;
	}
}


	$pdf->Cell(189,4,'SUJETO A RETENCIONES: '.number_format($importe,2),0,5,'R');
$pdf->ln();

	$pdf->Cell(189,4,'RETENCIONES Y APORTES',0,5,'C');
$pdf->ln();


	 
$pdf->SetX(80);
$pdf->Cell(30,5,'Base',1,0,'C'); 
$pdf->Cell(30,5,'Porc./Cuota DGI',1,0,'C'); 
$pdf->Cell(30,5,'Importe Descontado',1,0,'C'); 
$pdf->Cell(30,5,'Neto Retención',1,0,'C'); 
$pdf->ln();
 



 
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

$pdf->SetX(10);
$pdf->Cell(60,5,'Suma de Coseguros Percibidos:',0,0,'R'); 
$pdf->SetX(80);
$pdf->Cell(30,5,number_format($dif_cose,2),1,0,'R'); 
$pdf->Cell(30,5,'',1,0,'R'); 
$pdf->Cell(30,5,'',1,0,'R'); 
$pdf->Cell(30,5,'',1,0,'R'); 
$pdf->ln();



 
break;
}

case "20": {

$saldo_retenciones_adm = $base_impuesto - $importe;
$total_importe = $total_importe + $importe;

$pdf->SetX(10); 
$pdf->Cell(60,5,'Aportes Administrativos:',0,0,'R'); 
$pdf->SetX(80);
$pdf->Cell(30,5,$base_cos,1,0,'R'); 
$pdf->Cell(30,5,$porcentaje." %",1,0,'R'); 
$pdf->Cell(30,5,"-".$importe,1,0,'R'); 
$pdf->Cell(30,5,$saldo_retenciones_adm,1,0,'R'); 
$pdf->ln();



$saldo_retenciones_adm = round($saldo_retenciones_adm,2);
if ($saldo_retenciones_adm == 0){
include ("sin_acreeditacion_pdf.php");
}


		break;}

		case "30": {
	
$saldo_retenciones_adm = 	round($saldo_retenciones_adm - $importe,2);
$total_importe = round($total_importe + $importe,2);


if ($importe > 0){


$pdf->SetX(10); 
$pdf->Cell(60,5,'DGI Retención:',0,0,'R');
$pdf->SetX(80);
$pdf->Cell(30,5,$bruto,1,0,'R'); 
$pdf->Cell(30,5,$acumulado_mensual." %",1,0,'R'); 
$pdf->Cell(30,5,"-".$importe,1,0,'R'); 
$pdf->Cell(30,5,$saldo_retenciones_adm,1,0,'R'); 
$pdf->ln();



 
 
$saldo_retenciones_adm;


$saldo_retenciones_adm = round($saldo_retenciones_adm,2);
if ($saldo_retenciones_adm == 0){
include ("sin_acreeditacion_pdf.php");
}
}
	
 

		break;}



case "40": {

$saldo_retenciones_adm = $saldo_retenciones_adm - $importe;
$total_importe = $total_importe + $importe;
if ($importe > 0){

$pdf->SetX(10); 
$pdf->Cell(60,5,'DGR Retención:',0,0,'R');
$pdf->SetX(80);
$pdf->Cell(30,5,$dgr_base,1,0,'R'); 
$pdf->Cell(30,5,$porcentaje." %",1,0,'R'); 
$pdf->Cell(30,5,"-".$importe,1,0,'R'); 
$pdf->Cell(30,5,$saldo_retenciones_adm,1,0,'R'); 
$pdf->ln();


 


$saldo_retenciones_adm = round($saldo_retenciones_adm,2);
if ($saldo_retenciones_adm == 0){
include ("sin_acreeditacion_pdf.php");
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


$pdf->ln();
$pdf->SetX(10); 
$pdf->Cell(60,5,'Sub -Total Neto Retenciones y Aportes',0,0,'C');
$pdf->SetX(87);
$pdf->Cell(30,5,'',0,0,'C'); 
$pdf->Cell(30,5,'',0,0,'C'); 
$pdf->Cell(30,5,$total_importe,0,0,'C'); 
$pdf->Cell(30,5,$importe,0,0,'C'); 
$pdf->ln();

$pdf->ln();

 
$saldo_novedades = $importe;
  $band_acred = 2;
//}

$saldo_novedades = round($saldo_novedades,2);
if ($saldo_novedades == 0){
include ("sin_acreeditacion_pdf.php");
}

break;


} //cierra el caso 900



case "1000":
case "1100":
	
// NOVEDADES
	{

if ($novedades == ""){
	$novedades = 1;

$pdf->ln();
		$pdf->Cell(189,4,'ACREEDITACIONES Y DESCUENTOS',0,5,'C');
$pdf->ln();


 
$pdf->Cell(19,5,'Fec. Mov.',1,0,'C'); 
$pdf->Cell(71,5,'Motivo',1,0,'C'); 
$pdf->Cell(20,5,'Comp.',1,0,'C'); 
$pdf->Cell(20,5,'Saldo Ade.',1,0,'C'); 

$pdf->Cell(20,5,'Debitos',1,0,'C'); 
$pdf->Cell(20,5,'Creditos',1,0,'C'); 
$pdf->Cell(20,5,'Neto',1,0,'C'); 
 
$pdf->ln();
 


}

IF ($transaccion == 'TR_POSITIVA'){
	$transaccion = 'TR_POSITIVO';
}



	switch ($tipo_pago){

case "TR_POSITIVO":{
				$saldo_novedades = round($saldo_novedades + $importe,2);
					$total_pos = $total_pos + $importe;


$pdf->Cell(19,5,$fecha,1,0,'C'); 
$pdf->Cell(71,5,$motivo,1,0,'L'); 
$pdf->Cell(20,5,$nro_factura,1,0,'C'); 
$pdf->Cell(20,5,$saldo_deuda,1,0,'R'); 

$pdf->Cell(20,5,'-',1,0,'C'); 
$pdf->Cell(20,5,$importe,1,0,'R'); 
$pdf->Cell(20,5,$saldo_novedades,1,0,'R'); 
 
$pdf->ln();



		break;}


case "TR_NEGATIVO"://novedades al debito
		{

				$total_neg = $total_neg + $importe;
			$saldo_novedades = round($saldo_novedades - $importe,2);


$pdf->Cell(19,5,$fecha,1,0,'C'); 
$pdf->Cell(71,5,$motivo,1,0,'L'); 
$pdf->Cell(20,5,$nro_factura,1,0,'C'); 
$pdf->Cell(20,5,$saldo_deuda,1,0,'R'); 
$pdf->Cell(20,5,$importe,1,0,'R'); 
$pdf->Cell(20,5,'-',1,0,'C'); 
$pdf->Cell(20,5,$saldo_novedades,1,0,'R'); 
 
$pdf->ln();



if (($saldo_novedades == 0) or ($saldo_novedades == 0.00)){
$opera = "1250"; // caratula deuda

include ("sin_acreeditacion_pdf.php");

}

		break;}
}




break;
	}





case "1200":{

if (($total_neg == 0.00) && ($total_pos == 0.00)){

$pdf->ln();
		$pdf->Cell(189,4,'ACREEDITACIONES Y DESCUENTOS',0,5,'C');
$pdf->ln();


 
$pdf->Cell(19,5,'Fec. Mov.',1,0,'C'); 
$pdf->Cell(71,5,'Motivo',1,0,'C'); 
$pdf->Cell(20,5,'Comp.',1,0,'C'); 
$pdf->Cell(20,5,'Saldo Ade.',1,0,'C'); 

$pdf->Cell(20,5,'Debitos',1,0,'C'); 
$pdf->Cell(20,5,'Creditos',1,0,'C'); 
$pdf->Cell(20,5,'Neto',1,0,'C'); 
 
$pdf->ln();


}

$pdf->ln();

$pdf->Cell(19,5,'',0,0,'C'); 
$pdf->Cell(111,5,'SUB - TOTAL ACREEDITACIONES Y DESCUENTOS',1,0,'L'); 
 
$pdf->Cell(20,5,$total_neg,1,0,'R'); 
$pdf->Cell(20,5,$total_pos,1,0,'C'); 
$pdf->Cell(20,5,$saldo_novedades,1,0,'R'); 



		IF ($saldo_novedades > 0 ){
	

$pdf->ln();
$pdf->ln();
$pdf->SetFont("Arial","B",14);
		$pdf->Cell(189,7,'IMPORTE ACREEDITADO: '.$saldo_novedades,1,5,'R');
$pdf->ln();



$acree = 1;
		
		
	}else{

	$pdf->ln();


$pdf->Cell(189,7,'LIQUIDACION SIN ACREDITACION, CON DEUDA',1,5,'R');
$pdf->ln();

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


	$pdf->Cell(189,7,'ESTADO DE CTA CTE POR OPERACIONES ADEUDADAS A LA ASOCIACION BIOQUIMICA DE MENDOZA',1,5,'R');

	$pdf->ln();

$pdf->SetFont("Arial","B",11);
$pdf->Cell(200,4,"Cuenta: ".$nombre_laboratorio,0,5,'L');

$pdf->ln();
$pdf->Cell(189,4,'DETALLE DE LA DEUDA',0,5,'R');
$pdf->ln();


$pdf->SetFont("Arial","",10);


$pdf->Cell(20,5,'Fec. Ori',1,0,'C'); 
$pdf->Cell(60,5,'Operacion',1,0,'C'); 
$pdf->Cell(17,5,'Comp.',1,0,'C'); 
$pdf->Cell(17,5,"Importe",1,0,'C'); 
$pdf->Cell(17,5,"Dto x Liq",1,0,'C'); 
$pdf->Cell(17,5,"Fec. Caja",1,0,'C'); 
$pdf->Cell(19,5,"Pago Caja",1,0,'C'); 
$pdf->Cell(17,5,"Saldo",1,0,'C'); 
 
$pdf->ln();




	$pasada = 2;}




if ($fecha_movimiento == '00-00-0000'){$fecha_movimiento = "-";}
if ($acumulado_mensual == '0.00'){$acumulado_mensual = "-";}




$pdf->Cell(20,5,$fecha,1,0,'C'); 
$pdf->Cell(60,5,$motivo,1,0,'C'); 
$pdf->Cell(17,5,$nro_factu,1,0,'C'); 
$pdf->Cell(17,5,$importe,1,0,'C'); 
$pdf->Cell(17,5,$dto_liq,1,0,'C'); 
$pdf->Cell(19,5,$fecha_movimiento,1,0,'C'); 
$pdf->Cell(17,5,$acumulado_mensual,1,0,'C'); 
$pdf->Cell(17,5,"-".$saldo_deuda,1,0,'C'); 
$pdf->ln();

 
		

	break;}//cierra el caso 2000 deuda



/////////////////////////////////////////////////
} //cierra caso


$pasada = 1;

$result2->MoveNext();
  }




if ($nro_lab != $nro_laboratorio){

	$total_importe = 0;
 

if ($acree != 1){
$pdf->SetFont("Arial","B",14);
$pdf->ln();
		$pdf->Cell(189,7,'SALDO PENDIENTE DE PAGO: $ '.$saldo_1,1,5,'R');
$pdf->ln();
	
	}

	$total = $total_neto_gravado + $total_iva + $total_exento;
	$saldo_1 = "";
	 
}

 $total_excedente = "";
$total_credito = "";
$total_debito = "";

	$pdf->Output();
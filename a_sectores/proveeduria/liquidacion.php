<?php

$band_deb = 1;
$band_acred = 1;


$band = 1;
$bande = 1;
$bande1 = 1;
$bande2=1;
$nro_laboratorio = $_REQUEST['nro_laboratorio'];
  $anio= $_REQUEST['anio'];
 $periodo= $_REQUEST['periodo'];
 $nro_liquidacion= $_REQUEST['nro_liquidacion'];
$que_ver= $_REQUEST['que_ver'];

$radiobutton= $_REQUEST['radiobutton'];


$anio_liquidacion = $_REQUEST['anio'];

$periodo_liq = $periodo;
$anio_liquidacion_liq = $anio_liquidacion;



$cuenta_ab=$_POST["cuenta_abm"];
for ($i=0;$i<count($cuenta_ab);$i++)    
{     
$cuenta_abm = $cuenta_ab[$i];    
}
  $nro_laboratorio = $cuenta_abm;


$contra=$_POST["contra"];

if ($contra != "321"){
$leyenda = "NO ESTA AUTORIZADO A REALIZAR ESTA CONSULTA";
include("../../alertas/campo_informacion2.php");
exit;
}


	include ("../../conexiones/config.inc.php");

require_once("../../nusoap/lib/nusoap.php");
$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes_descarga.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('variable1'=>$cuenta_abm , 'variable2'=>$periodo , 'variable3'=>$anio_liquidacion , 'variable4'=>$nro_liquidacion);


$response= $client->call('liquidacion', $param1);


   $sql = "TRUNCATE TABLE liquidacion_web";
 $result = $db->Execute($sql);


 $a = "INSERT INTO liquidacion_web (`nro_os`, `nro_laboratorio`, `nro_factura`, `nro_liquidacion`, `periodo`, `anio`, `operacion`, `importe`, `tipo_pago`, `motivo`, `fecha`, `porcentaje`, `bruto`, `acumulado_mensual`, `fecha_movimiento`, `saldo_deuda`, `cod_renglon`, `nombre_os`) VALUES ".$response.";";
$result = $db->Execute($a);

 require("../../drivers/fpdf/fpdf.php");


$band_deb = 1;
$band_acred = 1;

$band = 1;
$bande = "";
$bande1 = 1;
$bande2=1;
$banderin = 1;

$pdf=new FPDF();
$pdf->SetDisplayMode(90,'default');  
$pdf->SetFont("Arial","B",25);

$renglon1 = "ASOCIACION BIOQUIMICA DE MENDOZA";
$renglon2 = "LIQUIDACION MENSUAL";

$pdf->SetFont("Arial","",9);






$pdf->AddPage();

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
$tot_importe = "";
 



$liquidacion = "liquidacion_web";



/*
$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";

$result5 = $db->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio = " (".$nro_laboratorio.") ". $nombre_laboratorio;
	
$sql6 = "SELECT * FROM `afip` WHERE  `nro_laboratorio` = $nro_laboratorio";
$result6 = $db->Execute($sql6);
$sit_iva=ucwords($result6->fields["sit_iva"]);
*/

	
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
	
$sql2 = "SELECT * FROM $liquidacion WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion' and periodo like '$periodo' and nro_liquidacion = $nro_liquidacion ";
$result2 = $db->Execute($sql2);

$nombre_os=$result2->fields["nombre_os"];

	 $v = "logo_abm.jpg";

  $pdf->Image('../../imagenes/'.$v,170,5,25);

$pdf->SetFont("Arial","B",12);

	$emp = "ASOCIACION BIOQUIMICA DE MENDOZA";
$tit = "ACTUALIZACION DE CUENTA CORRIENTE POR LIQUIDACION";
$pdf->SetFont("Arial","",11);
$lab = $nombre_os;
$lab1 = "Liquidacion N° ".$nro_liquidacion." / ".$periodo_liq." - 20".$anio_liquidacion;

$pdf->Cell(200,4,$emp,0,5,'C');
 $pdf->Cell(200,4,$tit,0,5,'C');
$pdf->ln();

$pdf->SetFont("Arial","B",11);
$pdf->Cell(200,4,"Cuenta: ".$lab,0,5,'L');
//$pdf->Cell(200,4,"Cuenta: PRESTADOR DE PRUEBA",0,5,'L');

$pdf->Cell(189,4,$lab1,0,5,'R');

$pdf->ln();
$pdf->ln();
$pdf->SetFont("Arial","B",11);

$sql2 = "SELECT * FROM $liquidacion WHERE  `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion' and periodo like '$periodo' and nro_liquidacion = $nro_liquidacion ";
$result2 = $db->Execute($sql2);

//trae las matriculas......................................................
if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {


$nro_os = $result2->fields["nro_os"];
$nro_laboratorio = $result2->fields["nro_laboratorio"];
$nro_factura = $result2->fields["nro_factura"];
$nro_liquidacion = $result2->fields["nro_liquidacion"];
$periodo = $result2->fields["periodo"];
$anio = $result2->fields["anio"];
$operacion = $result2->fields["operacion"];
$importe = $result2->fields["importe"];
$tipo_pago = $result2->fields["tipo_pago"];
$motivo = $result2->fields["motivo"];
$fecha = $result2->fields["fecha"];
$porcentaje = $result2->fields["porcentaje"];
$bruto = $result2->fields["bruto"];
$acumulado_mensual = $result2->fields["acumulado_mensual"];
$fecha_movimiento = $result2->fields["fecha_movimiento"];
$saldo_deuda = $result2->fields["saldo_deuda"];
$cod_renglon = $result2->fields["cod_renglon"];
$nombre_os = $result2->fields["nombre_os"];


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



$pdf->SetX(5);
$pdf->Cell(18,5,$fecha_movimiento,1,0,'c'); 
$pdf->Cell(28,5,$nombre_os." (".$nro_os.")",1,0,'L'); 

$pdf->Cell(15,5,$motivo,1,0,'C'); 

$pdf->Cell(12,5,$porcentaje,1,0,'C'); 
$pdf->Cell(20,5,$tipo_pago,1,0,'R'); 
$pdf->Cell(17,5,$nro_factura." ".$marca,1,0,'C'); 
$pdf->Cell(19,5,$fecha,1,0,'c'); 

$pdf->Cell(17,5,number_format($importe,2),1,0,'R'); 
$pdf->Cell(17,5,number_format($a_cuenta,2),1,0,'R');  
$pdf->Cell(17,5,"-".$acumulado_mensual,1,0,'R');
$pdf->Cell(17,5,number_format($saldo_deuda,2),1,0,'R'); 
$pdf->ln();
 
$suma_facturas = $suma_facturas + $importe;
break;
}



case "300":{

 
$pdf->ln();

 
$pdf->Cell(18,5,'',0,0,'L'); 
$pdf->Cell(28,5,'',0,0,'C'); 
$pdf->Cell(15,5,'',0,0,'C'); 

 
$pdf->Cell(65,5,'TOTAL FACTURAS LIQUIDADAS',0,0,'R'); 

if ($total_a_cuenta > 0){
$total_a_cuenta = number_format($total_a_cuenta,2);
}

$pdf->Cell(17,5,number_format($suma_facturas,2),0,0,'R'); 
$pdf->Cell(17,5,$total_a_cuenta,0,0,'R');  
$pdf->Cell(17,5,number_format($bruto,2),0,0,'R');
$pdf->Cell(17,5,number_format($saldo_deuda,2),0,0,'R'); 
$pdf->ln();



$brut = $bruto;

break;
}


case "310":{

$pdf->Cell(18,5,'',0,0,'L'); 
$pdf->Cell(28,5,'',0,0,'C'); 
$pdf->Cell(15,5,'',0,0,'C'); 
$pdf->Cell(65,5,'TOTAL EXCEDENTE CAPITA',0,0,'R'); 
$pdf->Cell(17,5,'',0,0,'R'); 
$pdf->Cell(17,5,'',0,0,'R');  
$pdf->Cell(17,5,'',0,0,'R');
$pdf->Cell(17,5,number_format($importe,2),0,0,'R'); 
$pdf->ln();


$brut = $bruto;

break;
}


case "320":{

$pdf->Cell(18,5,'',0,0,'L'); 
$pdf->Cell(28,5,'',0,0,'C'); 
$pdf->Cell(15,5,'',0,0,'C'); 
$pdf->Cell(65,5,'IVA',0,0,'R'); 
$pdf->Cell(17,5,'',0,0,'R'); 
$pdf->Cell(17,5,'',0,0,'R');  
$pdf->Cell(17,5,'',0,0,'R');
$pdf->Cell(17,5,number_format($importe,2),0,0,'R'); 
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

$pdf->ln();

$pdf->Cell(189,7,'SALDO ACTUALIZADO DE FACTURAS ADEUDADAS POR OBRA SOCIAL: $'.number_format($importe,2),1,5,'R');
$pdf->ln();
$pdf->ln();
$band_deb = 2;


break;
}


///////////

case "400":{


		if ($banderin == 1){
$banderin = 0;


$pdf->Cell(189,4,'AJUSTES  (DEBITOS O CREDITOS) SOBRE FACTURAS LIQUIDADAS:',0,5,'C');
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

		
$pdf->Cell(19,5,$fecha,1,0,'C'); 
$pdf->Cell(25,5,$nombre_os,1,0,'L'); 
$pdf->Cell(17,5,$nro_factura,1,0,'C'); 
$pdf->Cell(19,5,$fecha,1,0,'C'); 
$pdf->Cell(60,5,$motivo,1,0,'L'); 
$pdf->Cell(17,5,' - ',1,0,'C'); 
$pdf->Cell(17,5,number_format($bruto,2),1,0,'C'); 
$pdf->Cell(17,5,number_format($saldo_deuda,2),1,0,'C'); 
$pdf->ln();

		break;}

case "AJ_NEGATIVO"://novedades al debito
		{
		
	

$pdf->Cell(19,5,$fecha,1,0,'C'); 
$pdf->Cell(25,5,$nombre_os,1,0,'L'); 
$pdf->Cell(17,5,$nro_factura,1,0,'C'); 
$pdf->Cell(19,5,$fecha,1,0,'C'); 
$pdf->Cell(60,5,$motivo,1,0,'L'); 
$pdf->Cell(17,5, "-".number_format($bruto,2),1,0,'C'); 
$pdf->Cell(17,5,'',1,0,'C'); 
$pdf->Cell(17,5,number_format($saldo_deuda,2),1,0,'C'); 
$pdf->ln();



		break;}

}
		if ($saldo_deuda == 0){

include ("sin_acreditacion_pdf.php");

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

$bande = 1;
}





case "600":

	{

if ($fecha_movimiento = "00-00-0000"){$fecha_movimiento = $fecha;}

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
$creditos = $creditos + $bruto;
			
$pdf->Cell(19,5,$fecha_movimiento,1,0,'C'); 
$pdf->Cell(25,5,$nombre_os,1,0,'L'); 
$pdf->Cell(17,5,$nro_factura,1,0,'C'); 
$pdf->Cell(19,5,$fecha,1,0,'C'); 
$pdf->Cell(60,5,$motivo,1,0,'L'); 
$pdf->Cell(17,5,' - ',1,0,'C'); 
$pdf->Cell(17,5,number_format($bruto,2),1,0,'C'); 
$pdf->Cell(17,5,number_format($saldo_deuda,2),1,0,'C'); 
$pdf->ln();



		break;}


case "AJ_NEGATIVO"://novedades al debito
		{
		
		
$debitos = $debitos + $importe;
$pdf->Cell(19,5,$fecha_movimiento,1,0,'C'); 
$pdf->Cell(25,5,$nombre_os,1,0,'L'); 
$pdf->Cell(17,5,$nro_factura,1,0,'C'); 
$pdf->Cell(19,5,$fecha,1,0,'C'); 
$pdf->Cell(60,5,$motivo,1,0,'L'); 
$pdf->Cell(17,5, "-".number_format($importe,2),1,0,'C'); 
$pdf->Cell(17,5,'',1,0,'C'); 
$pdf->Cell(17,5,number_format($saldo_deuda,2),1,0,'C'); 
$pdf->ln();




		break;}
}

if ($saldo_deuda == 0){


	if ($saldo_deuda == 0){


include ("sin_acreditacion_pdf.php");

}

}



  	break;
	}



case "700":{

	$pdf->ln();
$pdf->Cell(19,5,'',0,0,'C'); 
$pdf->Cell(25,5,'',0,0,'C'); 
$pdf->Cell(17,5,'',0,0,'C'); 
$pdf->Cell(19,5,'',0,0,'C'); 
$pdf->Cell(60,5,'SUBTOTAL',0,0,'C'); 
$pdf->Cell(17,5,number_format($debitos,2),0,0,'C'); 
$pdf->Cell(17,5,number_format($creditos,2),0,0,'C'); 
$pdf->Cell(17,5,number_format($acumulado_mensual,2),0,0,'C'); 
$pdf->ln();
$pdf->ln();


 

	break;
	 
}



case "800":{

	switch ($motivo) {
	case "10": {

 
$acumulado = $saldo_deuda;
	$pdf->Cell(189,4,'SUJETO A RETENCIONES: '.number_format($saldo_deuda,2),0,5,'R');
$pdf->ln();

	$pdf->Cell(189,4,'RETENCIONES Y APORTES',0,5,'C');
$pdf->ln();


	 
$pdf->SetX(80);
$pdf->Cell(30,5,'Base',1,0,'C'); 
$pdf->Cell(30,5,'Porc./Cuota DGI',1,0,'C'); 
$pdf->Cell(30,5,'Importe Descontado',1,0,'C'); 
$pdf->Cell(30,5,'Neto Retención',1,0,'C'); 
$pdf->ln();
 

	break;
	}


case "11": {



$pdf->SetX(10);
$pdf->Cell(60,5,'Suma de Coseguros Percibidos:',0,0,'R'); 
$pdf->SetX(80);
$pdf->Cell(30,5,number_format($importe,2),1,0,'R'); 
$pdf->Cell(30,5,'',1,0,'R'); 
$pdf->Cell(30,5,'',1,0,'R'); 
$pdf->Cell(30,5,'',1,0,'R'); 
$pdf->ln();



 
break;
}

case "20": {


 $acumulado = $acumulado - $bruto;
$pdf->SetX(10); 
$pdf->Cell(60,5,'Aportes Administrativos:',0,0,'R'); 
$pdf->SetX(80);
$pdf->Cell(30,5,$importe,1,0,'R'); 
$pdf->Cell(30,5,$porcentaje." %",1,0,'R'); 
$pdf->Cell(30,5,"-".$bruto,1,0,'R'); 
$pdf->Cell(30,5,$acumulado,1,0,'R'); 
$pdf->ln();



if ($acumulado == 0){
include ("sin_acreditacion_pdf.php");
}


		break;}

		case "30": {
	


if ($importe > 0){


$acumulado = $acumulado - $bruto;
$pdf->SetX(10); 
$pdf->Cell(60,5,'DGI Retención:',0,0,'R');
$pdf->SetX(80);
$pdf->Cell(30,5,$importe,1,0,'R'); 
$pdf->Cell(30,5,$porcentaje." %",1,0,'R'); 
$pdf->Cell(30,5,"-".$bruto,1,0,'R'); 
$pdf->Cell(30,5,$acumulado,1,0,'R'); 
$pdf->ln();




if ($acumulado == 0){
include ("sin_acreditacion_pdf.php");
}
}
	
 

		break;}



case "40": {


if ($importe > 0){

$acumulado = $acumulado - $bruto;


$pdf->SetX(10); 
$pdf->Cell(60,5,'DGR Retención:',0,0,'R');
$pdf->SetX(80);
$pdf->Cell(30,5,$importe,1,0,'R'); 
$pdf->Cell(30,5,$porcentaje." %",1,0,'R'); 
$pdf->Cell(30,5,"-".$bruto,1,0,'R'); 
$pdf->Cell(30,5,$acumulado,1,0,'R'); 
$pdf->ln();


 


if ($acumulado == 0){
include ("sin_acreditacion_pdf.php");
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
$pdf->Cell(30,5,$bruto,0,0,'C'); 
$pdf->Cell(30,5,$acumulado_mensual,0,0,'C'); 
$pdf->ln();

$pdf->ln();

 
$saldo_novedades = $acumulado_mensual;
  $band_acred = 2;
//}

$saldo_novedades = round($saldo_novedades,2);
if ($saldo_novedades == 0){
include ("sin_acreditacion_pdf.php");
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
$pdf->Cell(20,5,$importe,1,0,'R'); 

$pdf->Cell(20,5,'-',1,0,'C'); 
$pdf->Cell(20,5,$importe,1,0,'R'); 
$pdf->Cell(20,5,$saldo_deuda,1,0,'R'); 
 
$pdf->ln();



		break;}


case "TR_NEGATIVO"://novedades al debito
		{

				$total_neg = $total_neg + $importe;
			$saldo_novedades = round($saldo_novedades - $importe,2);


$pdf->Cell(19,5,$fecha,1,0,'C'); 
$pdf->Cell(71,5,$motivo,1,0,'L'); 
$pdf->Cell(20,5,$nro_factura,1,0,'C'); 
$pdf->Cell(20,5,$importe,1,0,'R'); 
$pdf->Cell(20,5,$bruto,1,0,'R'); 
$pdf->Cell(20,5,'-',1,0,'C'); 
$pdf->Cell(20,5,$saldo_deuda,1,0,'R'); 
 
$pdf->ln();



if (($saldo_deuda == 0) or ($saldo_deuda == 0.00)){
$ope = "1250"; // caratula deuda

$sql12="select * from liquidacion_web where `nro_laboratorio` = '$nro_laboratorio' AND `anio` like '$anio_liquidacion' and periodo like '$periodo' and nro_liquidacion = $nro_liquidacion and operacion = 2000 order by operacion, motivo";
$result12 = $db->Execute($sql12);
$ope=strtoupper($result12->fields["operacion"]);

if ($ope == ""){
$pdf->ln();

$pdf->Cell(189,7,'LIQUIDACION SIN ACREEDITACION',1,5,'R');

$acree = 2;

$pasada = "";
}else{

	$acree = 2;

$pdf->ln();
$pdf->ln();



$pdf->Cell(18,5,'',0,0,'L'); 
$pdf->Cell(28,5,'',0,0,'C'); 
$pdf->Cell(15,5,'',0,0,'C'); 
$pdf->Cell(65,5,'SUB - TOTAL ACREEDITACIONES Y DESCUENTOS',0,0,'R'); 
$pdf->Cell(17,5,'',0,0,'R'); 
$pdf->Cell(17,5,number_format($total_neg,2),0,0,'R');  
$pdf->Cell(17,5,number_format($total_pos,2),0,0,'R'); 
$pdf->Cell(17,5,number_format($saldo_novedades,2),0,0,'R'); 
$pdf->ln();


$pdf->Cell(189,7,'LIQUIDACION SIN ACREDITACION, CON DEUDA',1,5,'R');
$pdf->ln();


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


	$pasada = "";
}

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
$pdf->Cell(17,5,$nro_factura,1,0,'C'); 
$pdf->Cell(17,5,$importe,1,0,'C'); 
$pdf->Cell(17,5,$bruto,1,0,'C'); 
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


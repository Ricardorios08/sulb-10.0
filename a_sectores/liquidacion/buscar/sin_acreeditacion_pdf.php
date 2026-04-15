<?php 



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
$pdf->Cell(65,5,'SUB - TOTAL ACREEDssITACIONES Y DESCUENTOS',0,0,'R'); 
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
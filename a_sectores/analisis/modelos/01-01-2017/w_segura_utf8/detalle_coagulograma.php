<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_coagulograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
 $min=utf8_decode(strtoupper($result11->fields["min"]));
$seg=utf8_decode(strtoupper($result11->fields["seg"]));
$porcentaje=utf8_decode(strtoupper($result11->fields["porcentaje"]));
$ttpk_seg=utf8_decode(strtoupper($result11->fields["ttpk_seg"]));
$sangria=utf8_decode(strtoupper($result11->fields["sangria"]));

$plaquetas=utf8_decode(number_format($result11->fields["plaquetas"], 0, ',', '.'));

$observaciones =utf8_decode(strtoupper($result11->fields["observaciones"]));

 

$seg_coa=utf8_decode(strtoupper($result11->fields["seg_coa"]));
$seg_san=utf8_decode(strtoupper($result11->fields["seg_san"]));


include ("practica.php");

/*

$pdf->SetFont('Arial','',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46,46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array('','VALOR HALLADO',$referencia2,'VALOR REFERENCIAL'));
$pdf->ln();
$pdf->ln();
$pdf->Row(array('Tiempo de coagulación:',$min.' min' , '' ,'', 'de 6 a 15 min' ));
$pdf->ln();
$pdf->SetWidths(array(46,20,72));
$pdf->Row(array('Tiempo de protombina:',$seg.' seg', $porcentaje. ' %','','de 80 a 100 %'));
$pdf->ln();
$pdf->SetWidths(array(46,46,46));
$pdf->Row(array('TTPK:',$ttpk_seg.' seg.','' ,'','de 35 a 50 seg'));
$pdf->ln();
$pdf->Row(array('Tiempo de Sangría:',$sangria.' min' ,'','','Hasta 4 min'));
$pdf->ln();


*/







$tamanio = 10;

/*if ($seg > 0){
	$pdf->SetX(30);
	$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(45,5,"Tiempo de protrombina:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$seg,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"seg.",0);  
$pdf->ln();
}
*/
 
	$pdf->SetX(30);
	$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(50,5,"Tiempo de protrombina::",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,round($porcentaje,0),0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5," %",0);
 
	$pdf->SetX(100);
$pdf->Cell(50,5,"V.R: de 70 a 100 %",0);
$pdf->ln();
$pdf->ln();
 


if ($ttpk_seg > 0){
	$pdf->SetX(30);
	$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(50,5,"TTPK",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$ttpk_seg,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"seg",0);  
 
	$pdf->SetX(100);
$pdf->Cell(50,5,"V.R: de 35 a 43 seg",0);  
$pdf->ln();
$pdf->ln();
}


if ($sangria > 0){
	$pdf->SetX(30);
	$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(50,5,"Tiempo de Sangria",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$sangria,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"min",0); 
$pdf->Cell(10,5,$seg_san,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"seg",0); 
$pdf->ln();
	$pdf->SetX(30);
$pdf->Cell(50,5,"V.R: Hasta 4 min",0);  
$pdf->ln();
$pdf->ln();
}


if ($min > 0){
	$pdf->SetX(30);
		$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(50,5,"Tiempo de coagulación:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$min,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"min",0);  
$pdf->Cell(10,5,$seg_coa,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"seg",0);  
$pdf->ln();
	$pdf->SetX(30);
$pdf->Cell(50,5,"V.R: 5 a 11 min",0);  
$pdf->ln();
$pdf->ln();
}







if ($plaquetas != 0){
	$pdf->SetX(30);
	$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(50,5,"Plaquetas",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(15,5,$plaquetas,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"mm3",0);  
$pdf->ln();
$pdf->ln();
}

 


?>
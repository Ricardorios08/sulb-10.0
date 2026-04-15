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



 


include ("practica.php");
$tamanio = 11;



IF ($seg > 0){
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(50,5,"Tiempo de Protombina:",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$seg,0);
$pdf->Setx(100);
$pdf->Cell(10,5,"Seg.",0);
$pdf->ln();
$pdf->ln();
}


IF ($porcentaje > 0){
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(55,5,"Porcentaje de Protrombina:",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$porcentaje,0);
$pdf->Setx(100);
$pdf->Cell(10,5,"%",0);
$pdf->ln();
$pdf->Setx(120);
$pdf->Cell(40,5,'VR: ',0);
$pdf->ln();
}





IF ($ttpk_seg > 0){
$pdf->ln();
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(50,5,"TTPK: ",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$ttpk_seg,0);
$pdf->Setx(100);
$pdf->Cell(10,5,"Seg.",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->ln();
$pdf->Setx(120);
$pdf->Cell(20,5,'VR: de 30 a 40 seg.',0);  
$pdf->ln();
$pdf->ln();
$pdf->Setx(30);

}



if ($sangria > 0){
	$pdf->ln();
	$pdf->Setx(30);
	$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(50,5,"Tiempo de Sangría:",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$sangria,0);
$pdf->Setx(100);
$pdf->Cell(10,5,"min.",0);

$pdf->SetFont($letra,'',$tamanio);
$pdf->ln();
$pdf->Setx(120);
$pdf->Cell(20,5,'VR: Hasta 4 min.',0);  
$pdf->ln();
$pdf->ln();
}



if ($min > 0){ 
	$pdf->Setx(30);
	$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(55,5,"Tiempo de coagulación:",0);  


$pdf->SetFont($letra,'',$tamanio);

$pdf->Cell(10,5,$min,0);
$pdf->Setx(100);
$pdf->Cell(10,5,"min",0);

$pdf->ln();
$pdf->Setx(120);

$pdf->Cell(20,5,'VR: de 5 - 10 min.',0);  
$pdf->ln();
$pdf->ln();
$pdf->Setx(30);
}



if ($plaquetas > 0){
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(50,5,"Plaquetas:",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$plaquetas,0);
$pdf->Setx(100);
$pdf->Cell(10,5,"mm³.",0);


}


 
?>
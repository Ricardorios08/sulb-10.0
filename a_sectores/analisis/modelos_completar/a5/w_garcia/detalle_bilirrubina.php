<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_bilirrubina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$total=strtoupper($result11->fields["total"]);
$directa=strtoupper($result11->fields["directa"]);

$indirecta=strtoupper($result11->fields["indirecta"]);



$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',10);
$pdf->Cell(40,10,'BILIRRUBINA TOTAL, DIRECTA E INDIRECTA');
$pdf->SetFont('Arial','',10);
$pdf->ln();



 

 
$tamanio1 = 8;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(100,5,"BILIRRUBINA TOTAL",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$total,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"mg/dl",0);
$pdf->Cell(20,5," ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Ln(); 

if ($edad == 0){
$pdf->Cell(60,5,"R.N. hasta 12 mg%",0);     
}else{
$pdf->Cell(60,5,"Lim. sup ref.: 1.00 mg/dl",0);
}


$pdf->Ln(); 
$pdf->Ln(); 

$tamanio1 = 8;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(100,5,"BILIRRUBINA DIRECTA",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$directa,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"mg/dl",0);
$pdf->Cell(20,5," ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Ln(); 

if ($edad == 0){
$pdf->Cell(60,5,"R.N. hasta 2 mg%",0); 
}else{
$pdf->Cell(60,5,"Lim. sup ref.: 0.25 mg/dl",0); 
}

$pdf->Ln(); 
$pdf->Ln(); 

$tamanio1 = 8;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(100,5,"BILIRRUBINA INDIRECTA",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$indirecta,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"mg/dl",0);
$pdf->Cell(20,5," ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Ln(); 

if ($edad == 0){
$pdf->Cell(60,5,"",0);  
}else{
$pdf->Cell(60,5,"Lim. sup ref.: 0.75 mg/dl",0); 
}
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->Cell(60,5,"Observ: Bilirrubina directa, conjugada o postnepática. Bilirrubina indirecta libre o pre-hepática.",0);   



?>
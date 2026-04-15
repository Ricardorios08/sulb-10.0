<?php 
 

$pdf->SetFont('ARIAL','BI',12);
//$pdf->SetFillColor(4,71,166); azul oscuiro

//$pdf->SetFillColor(27,149,152);

//$pdf->SetTextColor(0);
//$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);
$pdf->SetFont('','B');
$pdf->SetX(30);
$pdf->Cell(160,5,$nombre_practica.$aa ,0,0,'C',true); 
//$pdf->SetFillColor(188,254,193);
//$pdf->SetTextColor(0);
$pdf->SetFont('');
$pdf->ln();



?>
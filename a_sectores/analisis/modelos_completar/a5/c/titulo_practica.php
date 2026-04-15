<?php 

$nombre_practica = substr($nombre_practica,0,20);



if ($con == 1){
$pdf->SetY($a);
$pdf->SetX(10);
$pdf->SetFont($letra,'',7);
$pdf->Cell(33,5,$nombre_practica,1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'C'); 
$con = 2;

}else{
	$pdf->SetX(53);
$pdf->SetFont($letra,'',7);
$pdf->Cell(33,5,$nombre_practica,1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'C');
	$con  = 1;

$a = $a + 5;
$pdf->SetY($a);

}
$contador = $contador + 1;

?>
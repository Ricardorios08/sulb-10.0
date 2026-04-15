<?php 

$pdf->SetFont($letra,'',7);
 $contador_1 = $contador_1 + 1;

//$nombre_practica = substr($nombre_practica,0,12);

if ($contador_1 == 1){
$pdf->SetX(10);
$pdf->Cell(70,5,$nombre_practica.": ");
}elseif ($contador_1 == 2){
$pdf->SetX(70);
$pdf->Cell(70,5,$nombre_practica.": ");

}elseif($contador_1 == 3){
$pdf->SetX(140);
 $pdf->Cell(70,5,$nombre_practica.": ");
$pdf->ln();
$contador = 1;
}

?>
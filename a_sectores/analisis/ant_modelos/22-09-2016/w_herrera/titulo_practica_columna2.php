<?php 
$pdf->SetX(155);


$pdf->SetFont($letra,'BU',11);

$pdf->Cell(100,5,$nombre_practica);
$pdf->ln(); // conta 1
$pdf->SetX(155);
$contador = $contador + 1;

$pdf->SetFont($letra,'',10);

if ($metodo != ""){

$pdf->SetFont($letra,'',8);
$pdf->Cell(50,5,'Método: '.$metodo);
$pdf->ln();
}else{


$pdf->SetFont($letra,'',8);
//$pdf->ln();

$contador = $contador + 2;
}


$contador = $contador + 1;
$pdf->SetFont($letra,'',10);
$pdf->SetX(155);
$pdf->Cell(30,5,"Resultado: ");
$pdf->SetX(35);

$pdf->SetFont($letra,'B',10);
$pdf->Cell(20,5,$valor." ".$unidad);

 


$contador = $contador + 1;

$pdf->ln();




?>
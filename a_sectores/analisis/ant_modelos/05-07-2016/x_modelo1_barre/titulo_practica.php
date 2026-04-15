<?php 
$pdf->SetX(30);

$letra = "ARIAL";

$pdf->SetFont($letra,'BU',12);
$contador = $contador + 1;

$pdf->Cell(100,5,$nombre_practica.$contador);
$pdf->ln(); // conta 1



$pdf->SetFont($letra,'',10);

if ($metodo != ""){
$pdf->SetX(30);
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


if (($nro_practica == 1040) and ($valor_876 < 4) and ($valor_174 > 0) and ($valor_1035 > 0) or ($modulo == 1040) and ($modulo < 4) and ($modulo > 0) and ($modulo > 0)){


  $valor_5 = round($valor_876 / 5,2);
 $valor = $valor_174 - ($valor_5 + $valor_1035);

 $relacion = round($valor_174 / $valor_1035,2);
$pdf->SetX(30);
$pdf->Cell(65,5,"Resultado: ".$valor." ".$unidad);
 
 $html = "<p>sdfs</p>";
$pdf->WriteHTML($html); 
$pdf->SetFont($letra,'B',10);

$pdf->Cell(65,5,$valor." ".$unidad);
$pdf->SetFont($letra,'',10);
$pdf->Cell(65,5,"(V. Deseado hasta 1.30 g/l)");
$contador = $contador + 1;
$pdf->ln();
$pdf->SetX(30);

$pdf->SetFont($letra,'B',10);
$pdf->Cell(65,5,"Relación Col. Total/HDL Colesterol ");
 $pdf->SetFont($letra,'',10);

$pdf->SetFont($letra,'B',10);
$pdf->Cell(65,5,$relacion);
$pdf->SetFont($letra,'',10);
$pdf->Cell(65,5,"(V. Deseado < 4.5)");



 
}
else{


$pdf->SetX(30);
$pdf->Cell(30,5,"Resultado: ");
$pdf->SetX(65);

$pdf->SetFont($letra,'B',10);
$pdf->Cell(20,5,$valor." ".$unidad);

}
 


$contador = $contador + 1;

$pdf->ln();
//$pdf->SetX(30);



?>
<?php 
$pdf->SetX(10);


$pdf->SetFont($letra,'BI',12);

$pdf->Cell(100,7,$nombre_practica);
$pdf->ln(); // conta 1

$contador = $contador + 1;

$pdf->SetFont($letra,'',10);

if ($metodo != ""){

$pdf->SetFont($letra,'',8);
$pdf->Cell(50,7,'Método: '.$metodo);
$pdf->ln();
}else{


$pdf->SetFont($letra,'',8);
//$pdf->ln();

$contador = $contador + 1;
}


$contador = $contador + 1;
$pdf->SetFont($letra,'',10);

$pdf->Cell(20,7,"Resultado: ");


$pdf->SetFont($letra,'B',10);


switch ($decimal){
	case "0":{
$pdf->Cell(35,7,$valor."  ".$unidad);
		break;}

	case "1":{
		$valor = round($valor);
$pdf->Cell(35,7,$valor."  ".$unidad);
		break;

	}
}





$pdf->SetX(60);
$pdf->Cell(20,7,$observaciones);






$contador = $contador + 1;

$pdf->ln();




?>
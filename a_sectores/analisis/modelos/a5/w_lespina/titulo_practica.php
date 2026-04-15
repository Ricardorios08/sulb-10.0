<?php 
$pdf->SetX(30);


$pdf->SetFont($letra,'BI',12);

$pdf->Cell(100,5,$nombre_practica);
$pdf->ln(); // conta 1



$pdf->SetFont($letra,'',10);

if ($metodo != ""){
$pdf->SetX(30);
$pdf->SetFont($letra,'',8);
$contador = $contador + 1;
$pdf->Cell(50,4,'Método: '.$metodo);
$pdf->ln();
}else{


$pdf->SetFont($letra,'',8);
//$pdf->ln();

$contador = $contador + 1;
}


$contador = $contador + 1;
$pdf->SetFont($letra,'',10);
$pdf->SetX(30);
$pdf->Cell(20,5,"Resultado: ");


$pdf->SetFont($letra,'B',10);


switch ($decimal){
	case "0":{
$pdf->Cell(35,5,$valor."  ".$unidad);
		break;}

	case "1":{
		$valor = round($valor);
$pdf->Cell(35,5,$valor."  ".$unidad);
		break;

	}
}





$pdf->SetX(100);
$pdf->Cell(20,5,$observaciones);






$contador = $contador + 1;

$pdf->ln();
$pdf->SetX(30);



?>
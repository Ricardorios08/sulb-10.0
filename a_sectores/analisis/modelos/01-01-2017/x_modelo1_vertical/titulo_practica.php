<?php 
$pdf->SetX(10);

$letra = "ARIAL";

$pdf->SetFont('ARIAL','BI',12);

$pdf->SetFillColor(255,200,100);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(255,255,255);
$pdf->SetLineWidth(0);
$pdf->SetFont('','B');

$pdf->Cell(130,5,$nombre_practica,1,0,'L',true); 

$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetLineWidth(255);

$pdf->ln(); // conta 1

$letra = "ARIAL";
$tamanio = "10";


$contador = $contador + 1;

$pdf->SetFont($letra,'',10);

if ($metodo != ""){

$pdf->SetFont($letra,'',8);
$pdf->Cell(50,5,'Método: '.$metodo);
$pdf->ln();
}else{


$pdf->SetFont($letra,'',8);
$pdf->ln();

$contador = $contador + 1;
}


$contador = $contador + 1;
$pdf->SetFont($letra,'',10);

$pdf->Cell(30,5,"Resultado: ");
$pdf->SetX(35);

$pdf->SetFont($letra,'B',10);


switch ($decimal){
	case "0":{
$pdf->Cell(20,5,$valor);
		break;}

	case "1":{
		$valor = round($valor);
$pdf->Cell(20,5,$valor);
		break;

	}
}




$pdf->SetX(46);
$pdf->Cell(20,5,$unidad);


$contador = $contador + 1;

$pdf->ln();

$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetLineWidth(255);

$tamanio = 10;
$letra = 'ARIAL';


?>
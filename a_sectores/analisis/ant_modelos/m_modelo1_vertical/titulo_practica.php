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


if ($nro_practica == 41200){
 

 $indice_homa = round($insulina_reservada * $glucemia_reservada / 405,2);

 
$pdf->SetFont($letra,'BI',12);

$pdf->Cell(40,5,"RESULTADO: ");
$pdf->Cell(20,5,$indice_homa);
$pdf->SetFont($letra,'',10);

$pdf->ln();
$pdf->Cell(60,5,"Interpretación:");
$pdf->ln();
$pdf->Cell(100,5,"Se considera indicativo de resistencia a la insulina si es:"); 	
$pdf->ln();
$pdf->SetX(10);
$pdf->Cell(100,5,"*	de 2 a 2,50 es indicativo de una leve resistencia a la insulina.");
$pdf->ln();
$pdf->SetX(10);
$pdf->Cell(100,5,"*	entre 2,50 y 3,00  es indicativo de una moderada resistencia a la insulina.");
$pdf->ln();
$pdf->SetX(10);
$pdf->Cell(100,5,"*	superior a 3,00 es indicativo de una apreciable resistencia a la insulina.");
$pdf->ln();
$contador = $contador + 6;

 }else{








$contador = $contador + 1;
$pdf->SetFont($letra,'',10);

$pdf->Cell(30,5,"Resultado: ");
$pdf->SetX(35);

$pdf->SetFont($letra,'B',10);


switch ($decimal){
	case "0":{
$pdf->Cell(20,5,$valor. " ".$unidad);
		break;}

	case "1":{
		$valor = round($valor);
$pdf->Cell(20,5,$valor). " ".$unidad;
		break;

	}
}



$contador = $contador + 1;

$pdf->ln();

$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetLineWidth(255);

$tamanio = 10;
$letra = 'ARIAL';
 }


?>
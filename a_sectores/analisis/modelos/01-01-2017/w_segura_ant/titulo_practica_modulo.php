<?php 

$valor = $valor1;
$pdf->SetX(30);
$pdf->ln();

$pdf->SetFont($letra,'BI',12);

//$pdf->Cell(100,5,$nombre_practica.": ");
//$nombre_practica = $nombre_practica.$contador;

if ($nro_practica == 9127){
switch ($decimal){
	case "0":{
		$pdf->SetX(30);
	$pdf->Cell(100,5,$nombre_practica);
	$pdf->ln();
		$pdf->SetX(30);
		$pdf->SetFont($letra,'',12);
	$pdf->Cell(100,5,$valor."  ".$unidad);
	if ($observaciones != ""){
	//	$pdf->ln();
//$pdf->Cell(100,5,$observaciones);
//$contador = $contador + 2;

	}else{
$contador = $contador + 1;
	}



		break;}

	case "1":{
		$valor = round($valor);
			$pdf->SetX(30);
	$pdf->Cell(100,5,$nombre_practica);
	$pdf->ln();
		$pdf->SetX(30);
	$pdf->SetFont($letra,'',12);
	$pdf->Cell(100,5,$valor."  ".$unidad);
	if ($observaciones != ""){
		//$pdf->ln();
//$pdf->Cell(100,5,$observaciones);
//$contador = $contador + 2;

	}else{
//$contador = $contador + 1;
	}
		break;

	}
}


}else{

switch ($decimal){
	case "0":{
		$pdf->SetX(30);
	$pdf->Cell(100,5,$nombre_practica.": ".$valor."  ".$unidad);
if ($observaciones != ""){
	//	$pdf->ln();
//$pdf->Cell(100,5,$observaciones);
//$contador = $contador + 2;

	}else{
$contador = $contador + 1;
	}
		break;}

	case "1":{
		$valor = round($valor);
		$pdf->SetX(30);
		$pdf->Cell(100,5,$nombre_practica.": ".$valor."  ".$unidad);
		if ($observaciones != ""){
	//	$pdf->ln();
//$pdf->Cell(100,5,$observaciones);
//$contador = $contador + 2;

	}else{
$contador = $contador + 1;
	}
		break;

	}
}


}





$pdf->ln(); // conta 1

$contador = $contador + 1;

$pdf->SetFont($letra,'',10);

if ($metodo != ""){
$pdf->SetX(30);
$pdf->SetFont($letra,'',8);
$pdf->Cell(50,5,'Método: '.$metodo);
$pdf->ln();
}else{


$pdf->SetFont($letra,'',8);
//$pdf->ln();

$contador = $contador + 1;
}


$contador = $contador + 1;



$pdf->SetFont($letra,'B',10);








$pdf->SetX(60);







$contador = $contador + 1;

//$pdf->ln();




?>
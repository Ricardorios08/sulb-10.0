<?php 
$pdf->SetX(10);


$pdf->SetFont($letra,'BI',12);

$pdf->Cell(100,5,$nombre_practica);
$pdf->ln(); // conta 1

//$contador = $contador + 1;

$pdf->SetFont($letra,'',10);

if ($metodo != ""){

$pdf->SetFont($letra,'',8);
$pdf->Cell(50,5,'Método: '.$metodo);
$pdf->ln();
}else{


$pdf->SetFont($letra,'',8);
 


}


$contador = $contador + 1;
$pdf->SetFont($letra,'',10);



if ($nro_practica == 771){

$pdf->Cell(30,5,"Tiempo: ");
$pdf->SetX(35);
$pdf->SetFont($letra,'B',10);
$pdf->Cell(10,5,$valor,0,0,'R');

$pdf->SetFont($letra,'',10);
$pdf->Cell(5,5,$unidad);

$contador = $contador + 1;

$pdf->ln();
$pdf->SetFont($letra,'',8);
$pdf->Cell(30,5,"Porcentaje: ");
$pdf->SetX(35);
$pdf->SetFont($letra,'B',10);
$pdf->Cell(10,5,$porcentaje,0,0,'R');
$pdf->SetFont($letra,'',10);
$pdf->Cell(5,5,'%');
$pdf->SetFont($letra,'',8);
$pdf->Cell(5,5,'V.R: 70 a 100 %');
$pdf->ln();

if ($rin > 0){
$contador = $contador + 1;
$pdf->ln();
$pdf->SetFont($letra,'',8);
$pdf->Cell(30,5,"Rin: ");
$pdf->SetX(35);
$pdf->SetFont($letra,'B',10);
$pdf->Cell(10,5,$rin,0,0,'R');
$pdf->SetFont($letra,'',8);

$contador = $contador + 1;
$pdf->ln();
$contador = $contador + 1;
}

}elseif ($nro_practica == 169){
$pdf->SetFont($letra,'',10);
$pdf->Cell(40,5,"Tiempo de Sangría: ");
 
$pdf->SetFont($letra,'B',10);
$pdf->Cell(10,5,$valor); 
$pdf->Cell(5,5,'min');
$contador = $contador + 1;
$pdf->ln();
$pdf->SetFont($letra,'',8);
$pdf->Cell(30,5,"V.R: 1 a 5 min  ");
$contador = $contador + 1;
$pdf->ln();
$contador = $contador + 1;
$pdf->ln();

list($precio_entero,$precio_decimal) = explode(".",$rin);
$precio_terminado = $precio_entero;


$pdf->SetFont($letra,'',10);
$pdf->Cell(40,5,"Tiempo de Coagulacion: ");
 
$pdf->SetFont($letra,'B',10);
$pdf->Cell(10,5,$precio_terminado); 
$pdf->Cell(5,5,'min');
$contador = $contador + 1;
$pdf->ln();
$pdf->SetFont($letra,'',8);
$pdf->Cell(30,5,"V.R: 5 a 15 min  ");
$contador = $contador + 1;
$pdf->ln();



}else{

$pdf->Cell(30,5,"Resultado: ");
$pdf->SetX(35);

if (($nro_practica == 7673) or ($nro_practica == 7672) or ($nro_practica == 7671) or ($nro_practica == 767)) {
$pdf->SetFont($letra,'B',10);
$pdf->Cell(50,5,$valor);

$pdf->SetX(100);
$pdf->Cell(20,5,$unidad);
//$contador = $contador + 1;

$pdf->ln();
}else{
$pdf->SetFont($letra,'B',10);
$pdf->Cell(50,5,$valor);

$pdf->SetX(50);
$pdf->Cell(20,5,$unidad);
//$contador = $contador + 1;

$pdf->ln();
}



}



switch ($nro_practica){


	case "771":{
 



break;
	}


case "":{





break;
}

}




?>
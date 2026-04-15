<?php 
$pdf->SetX(30);

$letra = "ARIAL";

$pdf->SetFont($letra,'BU',12);

//$pdf->Cell(100,5,$nombre_practica.$contador."**".$clase."gu".$clase_guardada.$e.$contador9);
$pdf->Cell(100,5,$nombre_practica);
$pdf->ln(); // conta 1
$contador = $contador + 1;


$pdf->SetFont($letra,'',10);

if ($metodo != ""){
$pdf->SetX(30);
$pdf->SetFont($letra,'',8);
$pdf->Cell(50,5,'Método: '.$metodo);
$pdf->ln();
$contador = $contador + 1;
}else{


$pdf->SetFont($letra,'',8);
//$pdf->ln();

//$contador = $contador + 2;
}


//$contador = $contador + 1;
$pdf->SetFont($letra,'',10);


if (($nro_practica == 1040) and ($valor_876 < 4) and ($valor_174 > 0) and ($valor_1035 > 0) or ($modulo == 1040) and ($modulo < 4) and ($modulo > 0) and ($modulo > 0)){


  $valor_5 = round($valor_876 / 5,2);
 //$valor = $valor_174 - ($valor_5 + $valor_1035);

 $relacion = round($valor_174 / $valor_1035,2);
$pdf->SetX(30);
$pdf->Cell(45,5,"Resultado: ");
 
 
$pdf->SetFont($letra,'B',10);

$pdf->Cell(25,5,$valor." ".$unidad);
$pdf->SetFont($letra,'',9);
$pdf->Cell(66,5,"Menor de 120 mg%");
$contador = $contador + 1;
$pdf->ln();
$pdf->SetX(30);

$pdf->SetFont($letra,'B',10);
$pdf->Cell(66,5,"Relación Col. Total/HDL");
 $pdf->SetFont($letra,'',10);
$pdf->SetX(75);
$pdf->SetFont($letra,'B',10);
$pdf->Cell(25,5,$relacion);
$pdf->SetFont($letra,'',9);





if ($sexo == "Femenino"){
	$pdf->Cell(65,5,"Hasta 4.94");
$indice = round($relacion / 4.4,2);
}elseif ($sexo == "Masculino"){
	$pdf->Cell(65,5,"Hasta 4.97");
$indice = round($relacion / 4.97,2);
}elseif ($sexo == ""){
$leyenda = "ESTE PACIENTE NO TIENE CARGADO EL SEXO EN LA FICHA, Y NO PUEDE SALIR EL INDICE SIN ESTE DATO";
include ("../../../alertas/campo_informacion2.php");
exit;
}
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'B',10);
$pdf->Cell(66,5,"Indice de riesgo para ECC:");
 $pdf->SetFont($letra,'',10);
$pdf->SetX(75);
$pdf->SetFont($letra,'B',10);
$pdf->Cell(25,5,$indice);
$pdf->SetFont($letra,'',9);
$pdf->Cell(65,5,"VR: Hasta 1");

$tipo_det = "Sin Valor Ref.";
//$contador = $contador + 1;




}else{


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
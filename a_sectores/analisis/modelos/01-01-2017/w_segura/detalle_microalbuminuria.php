<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_microalbuminuria where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=strtoupper($result11->fields["diuresis"]);
$valor_hallado=strtoupper($result11->fields["valor_hallado"]);
$valor_hallado2=strtoupper($result11->fields["valor_hallado2"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];



include ("practica.php");

$tamanio = 11;
if ($diuresis > 0){
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(17,5,"Diuresis: ",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$diuresis." l",0);
$pdf->SetFont($letra,'',$tamanio);
 $pdf->ln();

}

$pdf->ln(); 
$pdf->SetX(30);
$unidad = "ug/ml";
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(25,5,"V. Hallado: ",0);


$pdf->SetX(35);

if ($valor_hallado > 0){

	$pdf->SetX(55);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$valor_hallado,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$unidad,0);  
$pdf->ln();

$pdf->SetFont($letra,'',10);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(10,50, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

$pdf->SetX(60);
$pdf->Row(array("", ""));
}

$pdf->SetX(30);


if ($valor_hallado2 > 0){

$pdf->SetX(30);
$unidad = "mg/24hs";
 $pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5," ",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$valor_hallado2,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$unidad,0);  
$pdf->ln();
$pdf->ln();
$pdf->SetX(30);


$pdf->SetFont($letra,'',10);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(10,50, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

$pdf->SetX(60);
$pdf->Row(array("V.R ", "Hasta 30 mg/24 hs"));


}


IF ($observaciones != ""){
	$pdf->SetX(30);
$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 
}



?>
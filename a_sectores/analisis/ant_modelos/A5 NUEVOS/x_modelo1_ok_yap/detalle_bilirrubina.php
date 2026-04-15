<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_bilirrubina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$total=strtoupper($result11->fields["total"]);
$directa=strtoupper($result11->fields["directa"]);

$indirecta=strtoupper($result11->fields["indirecta"]);



$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];

$letra = "times";
include ("practica.php");
$letra = "Times";



if ($directa > 0){
$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"Conjugada",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$directa,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"mg/l",0);
$pdf->SetFont($letra,'',9);
 $pdf->Cell(60,5,"V.R. Hasta 4.00  mg/l",0); 
$pdf->Ln(); 
}


if ($indirecta > 0){
$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"No conjudada",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$indirecta,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"mg/dl ",0);

 $pdf->Cell(60,5,"",0); 
 $pdf->Ln(); 
}


if ($total > 0){
	$pdf->Ln();
	$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"TOTAL",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$total,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"mg/dl",0);
$pdf->SetFont($letra,'',9);
 $pdf->Cell(60,5,"V.R. Hasta 10.00 mg/l",0); 
$pdf->Ln(); 
}



?>
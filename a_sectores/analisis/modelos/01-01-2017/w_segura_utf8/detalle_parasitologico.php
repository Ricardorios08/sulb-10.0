<?php

//$pdf->AddPage();
//include ("enca_pdf.php");

$pdf->Ln();
 $sql11="select * from detalle_parasitologico where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$metodo_macro=utf8_decode($result11->fields["metodo_macro"]);
$resultado_macro=utf8_decode($result11->fields["resultado_macro"]);
$metodo_micro=utf8_decode($result11->fields["metodo_micro"]);

 $resultado_micro=utf8_decode($result11->fields["resultado_micro"]);
$resultado_micro1=utf8_decode($result11->fields["resultado_micro1"]);
$observaciones=utf8_decode($result11->fields["observaciones"]);



include ("practica.php"); 

$pdf->SetX(30);

 $tamanio = 10;

$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(50,5,"EXAMEN MACROSCOPICO",0);  
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$metodo_macro,0); 
$pdf->ln();
$pdf->SetX(30);
 
$pdf->Cell(90,5,$resultado_macro,0); 

$pdf->ln();
$pdf->SetX(30);

$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(50,5,"EXAMEN MICROSCOPICO",0);
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,$metodo_micro,0);     
$pdf->ln();
$pdf->SetX(30);
 
$pdf->Cell(50,5,$resultado_micro,0);  

$pdf->ln();
$pdf->SetX(30);

 
$pdf->Cell(40,5,$resultado_micro1,0);     
 

 





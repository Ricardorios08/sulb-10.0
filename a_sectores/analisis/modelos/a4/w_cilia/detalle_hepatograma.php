<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_hepatograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$aspartato=strtoupper($result11->fields["aspartato"]);
$alanina=strtoupper($result11->fields["alanina"]);

$fosfatasa=strtoupper($result11->fields["fosfatasa"]);
$total=strtoupper($result11->fields["total"]);

$directa=strtoupper($result11->fields["directa"]);
$indirecta=strtoupper($result11->fields["indirecta"]);


$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,5,'HEPATOGRAMA');
$pdf->SetFont('Arial','',11);
$pdf->ln();


$pdf->Cell(50,3,"",0);   

$pdf->ln();

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"AST - GOT",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$aspartato,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"UI/l ",0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(60,5,"V.R. Hasta 12 U/l",0); 
$pdf->Ln(); 

$pdf->SetFont('Arial','',10);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"ALT - GPT",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$alanina,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"UI/l ",0);

$pdf->SetFont('Arial','',9);
$pdf->Cell(60,5,"V.R. Hasta 12 U/l",0); 
$pdf->Ln(); 

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"FAL",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$fosfatasa,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"UI/l ",0);
$pdf->SetFont('Arial','',9);

$pdf->Cell(60,5,"V.R. Adultos hasta 68 - 240 U/l. Niños: hasta 100 - 400 U/l",0); 
$pdf->Ln(); 

$pdf->Ln(); 

if ($total > 0){
$pdf->Ln(); 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(80,5,"BILIRRUBINA",0); 
$pdf->SetFont('Arial','',11);
$pdf->Ln(); 



$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"TOTAL",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$total,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"mg/dl",0);
$pdf->SetFont('Arial','',9);
 $pdf->Cell(60,5,"V.R. Lim. sup ref.: 1.00  mg/dl",0); 
$pdf->Ln(); 
}

if ($directa > 0){

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"DIRECTA",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$directa,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"UI/l ",0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(60,5,"V.R. Lim. sup ref.: 0.25  mg/dl",0); 

}

if ($indirecta > 0){
$pdf->Ln(); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"INDIRECTA",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$indirecta,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"mg/dl ",0);

$pdf->Cell(60,5,"V.R. Lim. sup ref.: 0.75  mg/dl",0);
}




?>
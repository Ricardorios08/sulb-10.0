<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_hepatograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$aspartato=utf8_decode(strtoupper($result11->fields["aspartato"]));
$alanina=utf8_decode(strtoupper($result11->fields["alanina"]));

$fosfatasa=utf8_decode(strtoupper($result11->fields["fosfatasa"]));


$total=utf8_decode(strtoupper($result11->fields["total"]));

$directa=utf8_decode(strtoupper($result11->fields["directa"]));
$indirecta=utf8_decode(strtoupper($result11->fields["indirecta"]));


$observaciones =utf8_decode(strtoupper($result11->fields["observaciones"]));




include ("practica.php");
$tamanio = 10;
$pdf->Cell(50,3,"",0);   
$pdf->SetX(30);
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"AST - GOT",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$aspartato,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"UI/l ",0);
$pdf->SetFont('Arial','',9);
$pdf->SetX(100);
$pdf->Cell(60,5,"V.R. Hasta 34 U/l",0); 
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont('Arial','',10);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"ALT - GPT",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$alanina,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"UI/l ",0);

$pdf->SetFont('Arial','',9);
$pdf->SetX(100);
$pdf->Cell(60,5,"V.R. Hasta 55 U/l",0); 
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->SetX(30);

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"FAL",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$fosfatasa,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"UI/l ",0);
$pdf->SetFont('Arial','',9);
$pdf->SetX(100);
$pdf->Cell(60,5,"V.R. Adultos hasta 300 U/l. Niños: hasta 700 U/l",0); 
$pdf->Ln(); 

$pdf->Ln(); 
$pdf->SetX(30);

if ($total > 0){
$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont('Arial','BIU',12);
$pdf->Cell(80,5,"BILIRRUBINA",0); 
$pdf->SetFont('Arial','',10);
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->SetX(30);


$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"TOTAL",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$total,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"mg/dl",0);
$pdf->SetFont('Arial','',9);
$pdf->SetX(100);
 $pdf->Cell(60,5,"V.R. Lim. sup ref.: 1.00  mg/dl",0); 
$pdf->Ln(); 
$pdf->SetX(30);

}

if ($directa > 0){
$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"DIRECTA",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$directa,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"UI/l ",0);
$pdf->SetFont('Arial','',9);
$pdf->SetX(100);
$pdf->Cell(60,5,"V.R. Lim. sup ref.: 0.20  mg/dl",0); 
$pdf->Ln(); 
}

if ($indirecta > 0){
$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,5,"INDIRECTA",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$indirecta,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"mg/dl ",0);
$pdf->SetX(100);
$pdf->Cell(60,5,"V.R. Lim. sup ref.: 0.80  mg/dl",0);
}




?>
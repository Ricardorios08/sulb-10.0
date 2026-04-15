<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_bilirrubina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$total=utf8_decode(strtoupper($result11->fields["total"]));
$directa=utf8_decode(strtoupper($result11->fields["directa"]));

$indirecta=utf8_decode(strtoupper($result11->fields["indirecta"]));



$observaciones =utf8_decode(strtoupper($result11->fields["observaciones"]));



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=utf8_decode(strtoupper($result11->fields["practica"]));
$unidad=utf8_decode($result11->fields["unidad"]);
$metodo=utf8_decode($result11->fields["metodo"]);


include ("practica.php");

if ($directa > 0){

$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(30,5,"DIRECTA",0);     
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$directa,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"mg/dl",0);
$pdf->SetFont('Arial','',9);
$pdf->Setx(90);
$pdf->Cell(60,5,"V.R. Lim. sup ref.: 0.20  mg/dl",0); 
$pdf->Ln(); 
}



if ($indirecta > 0){
$pdf->Ln(); 
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(30,5,"INDIRECTA",0);     
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$indirecta,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"mg/dl ",0);
$pdf->Setx(90);
$pdf->Cell(60,5,"V.R. Lim. sup ref.: 0.80  mg/dl",0);
$pdf->Ln(); 
}
  

if ($total > 0){
	$pdf->Ln(); 
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(30,5,"TOTAL",0);     
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$total,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,5,"mg/dl",0);
$pdf->SetFont('Arial','',9);
$pdf->Setx(90);
 $pdf->Cell(60,5,"V.R. Lim. sup ref.: 1.00  mg/dl",0); 
$pdf->Ln(); 
}







?>
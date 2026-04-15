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


include ("practica.php");



if ($total > 0){
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,10,"TOTAL",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$total,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,10,"mg/dl",0);
$pdf->SetFont('Arial','',9);
 $pdf->Cell(60,10,"V.R. Lim. sup ref.: 1.00  mg/dl",0); 
$pdf->Ln(); 
}

if ($directa > 0){
$pdf->Ln(); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,10,"DIRECTA",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$directa,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,10,"mg/dl",0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(60,10,"V.R. Lim. sup ref.: 0.20  mg/dl",0); 
$pdf->Ln(); 
}

if ($indirecta > 0){
$pdf->Ln(); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(30,10,"INDIRECTA",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,10,$indirecta,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(15,10,"mg/dl ",0);

$pdf->Cell(60,10,"V.R. Lim. sup ref.: 0.80  mg/dl",0);
}
  



?>
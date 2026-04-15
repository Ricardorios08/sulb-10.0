<?php 
//$pdf->AddPage();

$pdf->Ln();

$sql11="select * from detalle_widal where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$flagelares=utf8_decode($result11->fields["flagelares"]);
$somatico=utf8_decode($result11->fields["somatico"]);
$paratyphi_a=utf8_decode($result11->fields["paratyphi_a"]);
$paratyphi_b=utf8_decode($result11->fields["paratyphi_b"]);
$observaciones=utf8_decode($result11->fields["observaciones"]);



 include ("practica.php");

$pdf->Setx(30);
 
$pdf->SetFont('Arial','BI',12);
$pdf->Cell(60,5,'REACCION DE WIDAL');

$pdf->ln();
$pdf->ln();
$pdf->Setx(30);
 
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(80,5,"RESULTADO:",0); 
 $pdf->ln();
 $pdf->ln();
$pdf->Setx(30);
 
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(60,5,"Ac. Flagelares (H): ",0);     
  $pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(30,5,$flagelares,0);

 $pdf->ln();
 $pdf->ln();

$pdf->Setx(30);
 
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(60,5,"Ac. Somáticos (O): ",0);     
  $pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(30,5,$somatico,0);
 $pdf->SetFont('Arial','',$tamanio);
 $pdf->ln();
 $pdf->ln();
$pdf->Setx(30);
 
 $pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(60,5,"Ac. Paratyphi A: ",0);     
  $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(30,5,$paratyphi_a,0);
 $pdf->SetFont('Arial','',$tamanio);
 $pdf->ln();
  $pdf->ln();
$pdf->Setx(30);
 
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(60,5,"Ac. Paratyphi B: ",0);     
  $pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(30,5,$paratyphi_b,0);
 $pdf->SetFont('Arial','',$tamanio);
 $pdf->ln();
 $pdf->ln();
  $pdf->ln();
$pdf->Setx(30);
 

 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(60,5,"Nota: ",0);     
  $pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(100,5,$observaciones,0);
 $pdf->SetFont('Arial','',$tamanio);

  

?>
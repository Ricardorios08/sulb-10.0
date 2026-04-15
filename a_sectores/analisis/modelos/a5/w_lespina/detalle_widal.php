<?php 
//$pdf->AddPage();

$pdf->Ln();$pdf->SetX(30);

$sql11="select * from detalle_widal where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$flagelares=$result11->fields["flagelares"];
$somatico=$result11->fields["somatico"];
$paratyphi_a=$result11->fields["paratyphi_a"];
$paratyphi_b=$result11->fields["paratyphi_b"];
$observaciones=$result11->fields["observaciones"];



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',10);
$pdf->Cell(60,5,'REACCION DE WIDAL');
$pdf->SetFont('Arial','',9);
$pdf->Ln();$pdf->SetX(30);
$pdf->Ln();$pdf->SetX(30);

 $pdf->SetFont('Arial','U',$tamanio);
$pdf->Cell(80,5,"RESULTADO:",0); 
 $pdf->Ln();$pdf->SetX(30);
 $pdf->Ln();$pdf->SetX(30);

 $pdf->SetFont('Arial','U',$tamanio);
$pdf->Cell(60,5,"Ac. Flagelares (H): ",0);     
  $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(30,5,$flagelares,0);
 $pdf->SetFont('Arial','',$tamanio);
 $pdf->Ln();$pdf->SetX(30);
 $pdf->Ln();$pdf->SetX(30);


 $pdf->SetFont('Arial','U',$tamanio);
$pdf->Cell(60,5,"Ac. Somáticos (O): ",0);     
  $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(30,5,$somatico,0);
 $pdf->SetFont('Arial','',$tamanio);
 $pdf->Ln();$pdf->SetX(30);
 $pdf->Ln();$pdf->SetX(30);

 $pdf->SetFont('Arial','U',$tamanio);
$pdf->Cell(60,5,"Ac. Paratyphi A: ",0);     
  $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(30,5,$paratyphi_a,0);
 $pdf->SetFont('Arial','',$tamanio);
 $pdf->Ln();$pdf->SetX(30);
  $pdf->Ln();$pdf->SetX(30);

 $pdf->SetFont('Arial','U',$tamanio);
$pdf->Cell(60,5,"Ac. Paratyphi B: ",0);     
  $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(30,5,$paratyphi_b,0);
 $pdf->SetFont('Arial','',$tamanio);
 $pdf->Ln();$pdf->SetX(30);
 $pdf->Ln();$pdf->SetX(30);
  $pdf->Ln();$pdf->SetX(30);


 $pdf->SetFont('Arial','U',$tamanio);
$pdf->Cell(60,5,"Nota: ",0);     
  $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(100,5,$observaciones,0);
 $pdf->SetFont('Arial','',$tamanio);

  

?>
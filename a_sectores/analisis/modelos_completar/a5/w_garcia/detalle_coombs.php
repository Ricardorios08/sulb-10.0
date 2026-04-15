<?php 
//$pdf->AddPage();

$pdf->Ln();

$sql11="select * from detalle_coombs1 where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$salino=$result11->fields["salino"];
$albuminoso=$result11->fields["albuminoso"];
$coombs=$result11->fields["coombs"];
 
$observaciones=$result11->fields["observaciones"];



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];




include ("practica.php");



$pdf->SetFont('Arial','',10);
$pdf->Cell(90,5,'DOSAJE DE AGLUTININAS ANTI RH EN MEDIO SALINO:');
$pdf->ln();
$pdf->SetFont('Arial','',9);
$pdf->Cell(30,5,"RESULTADO: ",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(80,5,$salino,0); 
$pdf->ln();
$pdf->ln();


$pdf->SetFont('Arial','',10);
$pdf->Cell(90,5,'DOSAJE DE AGLUTININAS ANTI RH EN MEDIO ALBUMINOSO:');
$pdf->ln();
$pdf->SetFont('Arial','',9);
$pdf->Cell(30,5,"RESULTADO: ",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(80,5,$albuminoso,0); 
$pdf->ln();
$pdf->ln();



$pdf->SetFont('Arial','',10);
$pdf->Cell(90,5,'TEST DE COOMBS INDIRECTO');
$pdf->ln();
$pdf->SetFont('Arial','',9);
$pdf->Cell(30,5,"RESULTADO: ",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(80,5,$coombs,0); 
$pdf->ln();
$pdf->ln();
 

 
 $pdf->SetFont('Arial','U',$tamanio);
$pdf->Cell(20,5,"Nota: ",0);     
  $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(100,5,$observaciones,0);
 $pdf->SetFont('Arial','',$tamanio);

  

?>
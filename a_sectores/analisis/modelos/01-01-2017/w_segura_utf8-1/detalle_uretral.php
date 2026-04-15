<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_uretral where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=utf8_decode($result11->fields["muestra"]);
$coloracion=utf8_decode($result11->fields["coloracion"]);
$cultivo=utf8_decode($result11->fields["cultivo"]);
$nota=utf8_decode($result11->fields["nota"]);
 
$cultivo1=utf8_decode($result11->fields["cultivo1"]);
$cultivo2=utf8_decode($result11->fields["cultivo2"]);

 
include ("practica.php");

$pdf->Ln();


$pdf->SetX(30);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,5,"Exámen en fresco:",0);  
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont('Arial','',10);
$pdf->write(5,$muestra); 
$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,5,"Coloración de Gram-Nicolle: ",0); 
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont('Arial','',10);
$pdf->write(5,$coloracion);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,5,"Cultivo: ",0); 
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont('Arial','',10);
$pdf->write(5,$cultivo);  
$pdf->SetFont('Arial','',$tamanio);


?>
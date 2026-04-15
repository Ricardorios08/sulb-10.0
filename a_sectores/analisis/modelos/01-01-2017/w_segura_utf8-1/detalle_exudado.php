<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_exudado where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=utf8_decode($result11->fields["muestra"]);
$coloracion=utf8_decode($result11->fields["coloracion"]);
$cultivo=utf8_decode($result11->fields["cultivo"]);

 
$cultivo1=utf8_decode($result11->fields["cultivo1"]);
$cultivo2=utf8_decode($result11->fields["cultivo2"]);

 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];

include ("practica.php");

$pdf->SetX(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(18,5,"EXUDADO",0);  

$pdf->SetFont('Arial','',$tamanio);
$pdf->write(5,$muestra);  

$pdf->ln();

$pdf->SetX(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Coloración de Gram-Nicolle: ",0); 
$pdf->SetFont('Arial','',$tamanio);
 $pdf->MultiCell(100, 5, $coloracion);
$pdf->SetFont('Arial','',$tamanio);

$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Cultivo: ",0); 
$pdf->SetFont('Arial','',$tamanio);
 $pdf->MultiCell(100, 5, $cultivo);
$pdf->SetFont('Arial','',$tamanio);






?>
<?php 

$pdf->Ln();$pdf->SetX(30);
 $sql11="select * from detalle_aglutininas where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$salino=strtoupper($result11->fields["salino"]);
$albuminoso=strtoupper($result11->fields["albuminoso"]);


$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


include ("practica.php");



$pdf->SetFont($letra,'',$tamanio); 
$pdf->Cell(50,5,"MEDIO SALINO:",0);     
$pdf->Ln();$pdf->SetX(30);
$pdf->Cell(30,5,"V. Hallado: ",0);  
$pdf->SetFont($letra,'B',$tamanio);  
$pdf->Cell(10,5,$salino,0); 
 $pdf->Ln();$pdf->SetX(30);
$pdf->Ln();$pdf->SetX(30);

$pdf->SetFont($letra,'',$tamanio); 
$pdf->Cell(50,5,"MEDIO ALBUMINOSO: ",0);     
$pdf->Ln();$pdf->SetX(30);
$pdf->Cell(30,5,"V. Hallado: ",0);  
$pdf->SetFont($letra,'B',$tamanio);  
$pdf->Cell(10,5,$salino,0); 
 $pdf->Ln();$pdf->SetX(30);
$pdf->Ln();$pdf->SetX(30);


?>
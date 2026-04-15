<?php 

$pdf->Ln();
 $sql11="select * from detalle_aglutininas where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$salino=utf8_decode(strtoupper($result11->fields["salino"]));
$albuminoso=utf8_decode(strtoupper($result11->fields["albuminoso"]));


$observaciones =utf8_decode(strtoupper($result11->fields["observaciones"]));



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=utf8_decode(strtoupper($result11->fields["practica"]));
$unidad=utf8_decode($result11->fields["unidad"]);


include ("practica.php");


$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio); 
$pdf->Cell(50,5,"MEDIO SALINO:",0);     
$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(30,5,"V. Hallado: ",0);  
$pdf->SetFont($letra,'',$tamanio);  
$pdf->Cell(10,5,$salino,0); 
 $pdf->ln();
$pdf->ln();
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio); 
$pdf->Cell(50,5,"MEDIO ALBUMINOSO: ",0);     
$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(30,5,"V. Hallado: ",0);  
$pdf->SetFont($letra,'',$tamanio);  
$pdf->Cell(10,5,$salino,0); 
 $pdf->ln();
$pdf->ln();


?>
<?php 
$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_aglutininas where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$salino=strtoupper($result11->fields["salino"]);
$albuminoso=strtoupper($result11->fields["albuminoso"]);


$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',10);
$pdf->Cell(40,10,'DETERMINACION DE TIT. DE AGLUTINAS ANTI Rh');
$pdf->ln();

$pdf->SetFont('Arial','',10);
$pdf->ln();

$pdf->ln();
$pdf->ln();

$pdf->Cell(50,5,"MEDIO SALINO......:",0);     
$pdf->Cell(50,5,$salino,0);  
$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->Cell(50,5,"MEDIO ALBUMINOSO......:",0);     
$pdf->Cell(50,5,$salino,0);  


?>
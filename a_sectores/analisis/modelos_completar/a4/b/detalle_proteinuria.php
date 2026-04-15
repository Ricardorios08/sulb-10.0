<?php 
$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_proteinura where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=strtoupper($result11->fields["diuresis"]);
$valor_hallado=strtoupper($result11->fields["valor_hallado"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',10);
$pdf->Cell(40,10,'PROTEINURIA EN ORINA DE 24 hs');
$pdf->SetFont('Arial','',10);
$pdf->ln();


$pdf->Cell(50,3,"TURBIDIMETRICO C/ CL. BENZETONIO",0);   

$pdf->ln();

$pdf->Cell(50,5,"Diuresis",0);     
$pdf->Cell(50,5,$diuresis,0);  
$pdf->Cell(50,5,"mg/24 Hs",0);  
$pdf->ln();

$pdf->Cell(50,5,"V. Hallado: ",0);     
$pdf->Cell(50,5,$valor_hallado,0);  
$pdf->Cell(50,5,"Orina ocasional: 10 - 140 mg/l
Orina 24 hs: < 300 mg/24 hs.
",0);  
$pdf->ln();


$pdf->ln();
$pdf->Ln();


$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 
?>
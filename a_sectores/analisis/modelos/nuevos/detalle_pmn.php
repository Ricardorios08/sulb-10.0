<?php 
//$pdf->AddPage();

$pdf->Ln();

  $sql11="select * from detalle_pmn where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$aspecto=$result11->fields["aspecto"];
$enfresco=$result11->fields["enfresco"];
$enfresco1=$result11->fields["enfresco1"];
$giemsa=$result11->fields["giemsa"];
$giemsa1=$result11->fields["giemsa1"];
$pmn=$result11->fields["pmn"];



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BI',10);
$pdf->Cell(40,10,' POLIMORFONUCLEARES EN MATERIA FECAL');
$pdf->SetFont('Arial','',16);
$pdf->ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(20,5,"Aspecto:",0);    
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,5,$aspecto,0);  
$pdf->SetFont('Arial','',10);

$pdf->ln();
$pdf->ln();
$pdf->Cell(50,5,"Observacion microscopica: ",0);  
$pdf->ln();
$pdf->ln();
$pdf->Cell(50,5,"En fresco: ",0);  
$pdf->ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(150,5,$enfresco,0);  

$pdf->ln();
$pdf->Cell(150,5,$enfresco1,0);  
$pdf->SetFont('Arial','',10);

$pdf->ln();
$pdf->ln();

$pdf->Cell(50,5,"Giemsa:",0);  
$pdf->ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(150,5,$giemsa,0);  
$pdf->Ln();
$pdf->Cell(150,5,$giemsa1,0); 
$pdf->SetFont('Arial','',10);

$pdf->ln();
$pdf->ln();
$pdf->Cell(50,5,"PMN: ",0);  
$pdf->ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(150,5,$pmn,0);  
$pdf->SetFont('Arial','',10);



?>
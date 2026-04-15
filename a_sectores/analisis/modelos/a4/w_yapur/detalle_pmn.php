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


$pdf->SetFont('Arial','BIU',10);
$pdf->Cell(40,10,' POLIMORFONUCLEARES EN MATERIA FECAL');
$pdf->SetFont('Arial','',10);
$pdf->ln();


$pdf->Cell(50,5,"Aspecto:",0);     
$pdf->Cell(50,5,$aspecto,0);  


$pdf->ln();

$pdf->Cell(50,5,"OBSERVACION MICROSCOPICA: ",0);  
$pdf->ln();
$pdf->ln();
$pdf->Cell(50,5,"EN FRESCO: ",0);  
$pdf->ln();

$pdf->Cell(150,5,$enfresco,0);  


$pdf->ln();
$pdf->Cell(150,5,$enfresco1,0);  


$pdf->ln();
$pdf->ln();

$pdf->Cell(50,5,"CON COLORACION DE GIEMSA:",0);  
$pdf->ln();

$pdf->Cell(150,5,$giemsa,0);  
$pdf->Ln();
$pdf->Cell(150,5,$giemsa1,0); 

$pdf->ln();
$pdf->ln();
$pdf->Cell(50,5,"POLIMORFONUCLEARES: ",0);  
$pdf->ln();
$pdf->Cell(150,5,$pmn,0);  




?>
<?php 
$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_calcio where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$natremia=strtoupper($result11->fields["natremia"]);
$kalemia=strtoupper($result11->fields["kalemia"]);
$cloremia =strtoupper($result11->fields["cloremia"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',12);
$pdf->Cell(40,10,'IONOGRAMA PLASMATICO');
$pdf->SetFont('Arial','',10);
$pdf->ln();




$pdf->Cell(50,5,"NATREMIA (Na)",0);     
$pdf->ln();
$pdf->Cell(50,5,"(Fotometría de llama)",0);     
$pdf->ln();
$pdf->Cell(50,5,"V. Hallado: ",0);     
$pdf->Cell(50,5,$natremia,0);  
$pdf->Cell(50,5,"mEq /l",0);  
$pdf->ln();
$pdf->Cell(50,5,"V. Referencial: 135 a 147 mEq/l",0);     
$pdf->ln();
$pdf->ln();


$pdf->Cell(50,5,"KALEMIA(Na)",0);     
$pdf->ln();
$pdf->Cell(50,5,"(Fotometría de llama)",0);     
$pdf->ln();
$pdf->Cell(50,5,"V. Hallado: ",0);     
$pdf->Cell(50,5,$kalemia,0);  
$pdf->Cell(50,5,"mEq /l",0);  
$pdf->ln();
$pdf->Cell(50,5,"V. Referencial: 3.6 a 5.5 mEq/l",0);     
$pdf->ln();
$pdf->ln();

$pdf->Cell(50,5,"CLOREMIA (Cl)",0);     
$pdf->ln();
$pdf->Cell(50,5,"(Método de Schales y Schales)",0);     
$pdf->ln();
$pdf->Cell(50,5,"V. Hallado: ",0);     
$pdf->Cell(50,5,$cloremia,0);  
$pdf->Cell(50,5,"mEq /l",0);  
$pdf->ln();
$pdf->Cell(50,5,"V. Referencial: 94 a 111 mEq/l",0);     



?>
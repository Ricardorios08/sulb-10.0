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


$pdf->SetFont('Arial','BIU',10);
$pdf->Cell(40,10,'IONOGRAMA PLASMATICO');
$pdf->SetFont('Arial','',10);
$pdf->ln();




$pdf->Cell(50,5,"SODIO (Na)",0);     
$pdf->ln();
$pdf->Cell(50,5,"Metodo Potenciometría Directa c/ISE.
",0);     
$pdf->ln();
$pdf->Cell(50,5,"V. Hallado: ",0);     
$pdf->Cell(50,5,$natremia,0);  
$pdf->Cell(50,5,"mEq /l",0);  
$pdf->ln();
$pdf->Cell(50,5,"V.N:  de 135 a 145 mEq/l.",0);     
$pdf->ln();
$pdf->ln();


$pdf->Cell(50,5,"POTASIO(Na)",0);     
$pdf->ln();
$pdf->Cell(50,5,"Metodo Potenciometría Directa c/ISE.
",0);     
$pdf->ln();
$pdf->Cell(50,5,"V. Hallado: ",0);     
$pdf->Cell(50,5,$kalemia,0);  
$pdf->Cell(50,5,"mEq /l",0);  
$pdf->ln();
$pdf->Cell(50,5,"V.N:  de 3,5 a 5,0 mEq/l.",0);     
$pdf->ln();
$pdf->ln();

$pdf->Cell(50,5,"CLORO (Cl)",0);     
$pdf->ln();
$pdf->Cell(50,5,"Metodo Potenciometría Directa c/ISE.",0);     
$pdf->ln();
$pdf->Cell(50,5,"V. Hallado: ",0);     
$pdf->Cell(50,5,$cloremia,0);  
$pdf->Cell(50,5,"mEq /l",0);  
$pdf->ln();
$pdf->Cell(50,5,"V.N:  de 98 a 110 mEq/l.",0);     



?>
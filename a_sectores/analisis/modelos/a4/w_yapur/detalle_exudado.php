<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_exudado where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=$result11->fields["muestra"];
$coloracion=$result11->fields["coloracion"];
$cultivo=$result11->fields["cultivo"];



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];

$tamanio = 11;
$pdf->SetFont('Arial','BI',$tamanio);
$pdf->Cell(40,10,$nombre_practica);
$tamanio = 10;
$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();





$pdf->Cell(50,5,"EXUDADO NASAL:",0);  

$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,$muestra,0);  

$pdf->ln();
$pdf->ln();
$pdf->Cell(50,5,"Coloración de Gram-Nicolle: ",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->write(5,$coloracion);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();

$pdf->ln();
$pdf->Cell(50,5,"Cultivo: ",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->write(5,$cultivo);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();




?>
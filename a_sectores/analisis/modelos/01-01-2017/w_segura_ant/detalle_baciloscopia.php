<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_baciloscopia where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=$result11->fields["muestra"];
$coloracion=$result11->fields["coloracion"];
$cultivo=$result11->fields["cultivo"];
$nota=$result11->fields["nota"];
 
$cultivo1=$result11->fields["cultivo1"];
$cultivo2=$result11->fields["cultivo2"];


 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];

INCLUDE ("practica.php");




$pdf->SetX(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Muestra:",0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->write(5,$muestra); 
$pdf->ln();


$pdf->SetX(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5," ",0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->write(5,$coloracion);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();

$pdf->SetX(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"",0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->write(5,$cultivo);  
$pdf->SetFont('Arial','',$tamanio);


?>
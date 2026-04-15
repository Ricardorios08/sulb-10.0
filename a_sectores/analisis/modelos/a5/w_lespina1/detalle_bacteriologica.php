<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_bacteriologico where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=strtoupper($result11->fields["muestra"]);
$color=strtoupper($result11->fields["color"]);
$aspecto=strtoupper($result11->fields["aspecto"]);
$obs_micro=strtoupper($result11->fields["obs_micro"]);
$nicolle=strtoupper($result11->fields["nicolle"]);
$cultivo=strtoupper($result11->fields["cultivo"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


include ("practica.php");


$pdf->Cell(50,5,"Muestra y obtención:",0);     
$pdf->Cell(50,5,$muestra,0);  

$pdf->ln();
$pdf->ln();
$pdf->Cell(50,5,"Color: ",0);     
$pdf->Cell(50,5,$color,0);  
$pdf->Cell(30,5,"Aspecto:",0);  
$pdf->Cell(50,5,$aspecto,0);  
$pdf->ln();
$pdf->ln();

$pdf->Cell(50,5,"OBSERVACION MICROSCOPICA:",0);  
$pdf->ln();
$pdf->ln();
$pdf->Cell(50,5,"EN FRESCO: ",0);  
$pdf->ln();

$pdf->Cell(150,5,$obs_micro,0);  


$pdf->ln();
$pdf->Cell(50,5,"CON COLORACION DE GRAM-NICOLLE:",0);  
$pdf->ln();
$pdf->ln();
$pdf->Cell(150,5,$nicolle,0);  


$pdf->Ln();
$pdf->ln();
$pdf->Cell(50,5,"CULTIVO E IDENTIFICACION",0);  
$pdf->ln();
$pdf->ln();
$pdf->Cell(150,5,$cultivo,0);  


$pdf->Ln();
$pdf->ln();

$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 
?>
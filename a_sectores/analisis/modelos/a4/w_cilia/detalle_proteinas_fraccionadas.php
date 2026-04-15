<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_proteinura where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$protidemia=strtoupper($result11->fields["diuresis"]);
$globulinas=strtoupper($result11->fields["valor_hallado"]);

$albumina=strtoupper($result11->fields["albumina"]);
$relacion_ag=strtoupper($result11->fields["relacion_ag"]);

$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',10);
$pdf->Cell(40,5,'PROTEINAS FRACCIONADAS');
$pdf->SetFont('Arial','',10);
$pdf->ln();


$pdf->Cell(50,3,"(Relación Albúmina/Globulina)",0);   

$pdf->ln();


$pdf->SetFont('Arial','',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46,46,46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array('PROTIDEMIA','','ALBUMINA'));
$pdf->Row(array('Valor Hallado: '.$protidemia.' g/dl','','Valor Hallado: '.$albumina.' g/dl'));
$pdf->Row(array('VN: 6.10 a 8.00 g/dl','','V.N: 3.60 a 4.9 g/dl'));





$pdf->Cell(50,5,"PROTIDEMIA",0);     
$pdf->Cell(50,5,$diuresis,0);  
$pdf->Cell(50,5,"l",0);  
$pdf->ln();

$pdf->Cell(50,5,"V. Hallado: ",0);     
$pdf->Cell(50,5,$valor_hallado,0);  
$pdf->Cell(50,5,"g/dl",0);  
$pdf->ln();
$pdf->Cell(50,5,"VN: 6.10 A 8.00 G/DL",0);  
$pdf->ln();


$pdf->ln();
$pdf->Ln();


$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 
?>
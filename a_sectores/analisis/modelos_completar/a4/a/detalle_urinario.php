<?php 
$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_iono_urinario where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$resultado=strtoupper($result11->fields["resultado"]);
$sodio=strtoupper($result11->fields["sodio"]);
$potasio=strtoupper($result11->fields["potasio"]);
$cloro=strtoupper($result11->fields["cloro"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',10);
$pdf->Cell(40,10,'IONOGRAMA URINARIO');
$pdf->SetFont('Arial','',10);
$pdf->ln();


$pdf->Cell(50,5,"Metodo Potenciometría directa.",0);     
$pdf->ln();


$pdf->Cell(50,5,"Diurésis remitida al laboratorio: ",0);     
$pdf->Cell(50,5,$resultado,0);  
$pdf->Cell(50,5,"nl",0);  
$pdf->ln();


$pdf->SetWidths(array(46,46,46,46, 46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row_i(array('SODIO (Na) Contiene',$sodio,'mmol/en la orina 24 hs.',''));
$pdf->Row_i(array('V.d R:','30 a 300','mmo/en laorina de 24 hs',''));
$pdf->ln();
$pdf->Row_i(array('POTASIO (K) Contiene',$potasio,'mmol/en la orina 24 hs.',''));
$pdf->Row_i(array('V.d R:','25 a 125','mmo/en laorina de 24 hs',''));
$pdf->ln();
$pdf->Row_i(array('CLORO (Cl) Contiene',$cloro,'mmol/en la orina 24 hs.',''));
$pdf->Row_i(array('V.d R:','110 a 250','mmo/en laorina de 24 hs',''));


 
?>
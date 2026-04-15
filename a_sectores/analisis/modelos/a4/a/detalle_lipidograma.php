<?php 
$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_lipidograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$suero=strtoupper($result11->fields["suero"]);
$quilomicrones=strtoupper($result11->fields["quilomicrones"]);
$beta=strtoupper($result11->fields["beta"]);
$prebeta=strtoupper($result11->fields["prebeta"]);
$alfa=strtoupper($result11->fields["alfa"]);

$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',10);
$pdf->Cell(40,10,'LIPIDOGRAMA ELECTROFORETICO');
$pdf->SetFont('Arial','',10);
$pdf->ln();


$pdf->Cell(50,3,"Soporte utilizado: gel de poliacrilamida",0);   


$pdf->ln();
$pdf->ln();
$pdf->Cell(50,3,"Resultado",0);   

$pdf->SetFont('Arial','',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array('Aspecto del Suero:',$suero));
$pdf->Row(array('Quilomicrones:',$quilomicrones));
$pdf->Row(array('Beta lipoproteínas (ldl col.):',$beta));
$pdf->Row(array('Prebeta lipoproteínas (VLDE col):',$prebeta));
$pdf->Row(array('Alfa lipoproteínas (HDL col):',$alfa));

$pdf->ln();
$pdf->ln();
$pdf->Cell(50,6,"Conclusión",0);
$pdf->Cell(60,6,$observaciones,0); 
?>
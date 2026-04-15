<?php 
$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_clearence where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$creatinemia=strtoupper($result11->fields["creatinemia"]);
$creatinuria=strtoupper($result11->fields["creatinuria"]);

$diuresis=strtoupper($result11->fields["diuresis"]);
$sup_corporal=strtoupper($result11->fields["sup_corporal"]);

$clearence=strtoupper($result11->fields["clearence"]);


$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',8);
$pdf->Cell(40,10,'CLEARENCE DE CREATININA ENDOGENA');
$pdf->SetFont('Arial','B',8);
$pdf->ln();


$pdf->Cell(50,3,"(Método Cinético)",0);   

$pdf->ln();


$pdf->SetFont('Arial','',7);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46,40));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

$pdf->Row(array('Creatinemia....:',$creatinemia,'mg/l'));
$pdf->Row(array('','Adulto Hombre: 7.00 a 13.00 mg/l'));
$pdf->Row(array('','Adulto Mujer: 6.00 a 11.00 mg/l'));
$pdf->Row(array('','Niños: 4.00 a 9.00 mg/l'));

$pdf->Row(array('Creatinuria....:',$creatinuria,'g/24 hs.'));
$pdf->Row(array('','V. de Ref: 0.90 a 1.50 g/24 hs'));

$pdf->Row(array('Diuresis:',$diuresis,'l'));
$pdf->Row(array('Superfice corporal corregida:',$sup_corporal,'m²'));

$pdf->Row(array('Clearence de creatininia:',$clearence,'ml/min por 1.73 m²'));
$pdf->Row(array('','V. de Ref: Hombre: 94.00 a 140.00 ml/min por 173 m²'));
$pdf->Row(array('','V. de Ref: Mujer: 72.00 a 110.00 ml/min por 173 m² cl'));






?>
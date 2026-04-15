<?php 
$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_coagulograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$min=strtoupper($result11->fields["min"]);
$seg=strtoupper($result11->fields["seg"]);
$porcentaje=strtoupper($result11->fields["porcentaje"]);
$ttpk_seg=strtoupper($result11->fields["ttpk_seg"]);

$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',$tamanio);
$pdf->Cell(40,10,'COAGULOGRAMA');
$pdf->SetFont('Arial','',8);
$pdf->ln();



$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46,46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array('','VALOR HALLADO',$referencia2,'VALOR REFERENCIAL'));
$pdf->ln();
$pdf->ln();
$pdf->Row(array('Tiempo de coagulación:',$min.' min',$seg.' seg','de 6 a 15 min'));
$pdf->ln();
$pdf->Row(array('Tiempo de protombina:',$porcentaje,'','de 80 a 100 %'));
$pdf->ln();
$pdf->Row(array('TTPK:',$ttpk_seg,'' ,'seg','de 35 a 50 seg'));

?>
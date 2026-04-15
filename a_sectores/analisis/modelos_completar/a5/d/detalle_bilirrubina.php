<?php 
$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_bilirrubina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$total=strtoupper($result11->fields["total"]);
$directa=strtoupper($result11->fields["directa"]);

$indirecta=strtoupper($result11->fields["indirecta"]);



$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',10);
$pdf->Cell(40,10,'BILIRRUBINA TOTAL, DIRECTA E INDIRECTA');
$pdf->SetFont('Arial','B',9);
$pdf->ln();


$pdf->Cell(50,3,"(Analitica Hepato-Biliar)",0);   

$pdf->ln();


$pdf->SetFont('Arial','',7);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,70,10,40));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);


$pdf->Row(array('Suero -','BILIRRUBINA TOTAL ',$total,'mg/dl'));
$pdf->Row(array('','Lim. sup ref.: 1.00 mg/dl','',''));

$pdf->Row(array('Suero -','BILIRRUBINA DIRECTA',$directa,'mg/dl'));
$pdf->Row(array('','Lim. sup ref.: 0.25 mg/dl','',''));

$pdf->Row(array('Suero -','BILIRRUBINA INDIRECTA ',$indirecta,'mg/dl'));
$pdf->Row(array('','Lim. sup ref.: 0.75 mg/dl','',''));


$pdf->Cell(50,5,"Observ: Bilirrubina directa, conjugada o postnepática. Bilirrubina indirecta libre o pre-hepática.",0);     


?>
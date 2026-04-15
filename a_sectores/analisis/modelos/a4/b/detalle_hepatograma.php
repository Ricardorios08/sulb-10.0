<?php 
$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_hepatograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$aspartato=strtoupper($result11->fields["aspartato"]);
$alanina=strtoupper($result11->fields["alanina"]);

$fosfatasa=strtoupper($result11->fields["fosfatasa"]);
$total=strtoupper($result11->fields["total"]);

$directa=strtoupper($result11->fields["directa"]);
$indirecta=strtoupper($result11->fields["indirecta"]);


$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',10);
$pdf->Cell(40,10,'HEPATOGRAMA');
$pdf->SetFont('Arial','',10);
$pdf->ln();


$pdf->Cell(50,3,"(Analitica Hepato-Biliar)",0);   

$pdf->ln();

$pdf->ln();
$pdf->ln();
$pdf->SetFont('Arial','',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(20,100,10,40));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array('Suero -','ASPASTATO AMINOTRANSFER.(ALT/ASAT/GOT)',$aspartato,'UI/l'));
$pdf->Row(array('','V.R. Hasta 12 U/l','',''));
 $pdf->ln();

$pdf->Row(array('Suero -','ALANINA AMINOTRASNFER.(ALT/ALAT/GPT)',$alanina,'UI/l'));
$pdf->Row(array('','V.R. Hasta 12 U/l','',''));
$pdf->ln();
$pdf->Row(array('Suero -','FOSFATASA ALCALINA(FAL) ',$fosfatasa,'UI/l'));
$pdf->Row(array('','V.R. Adultos 68 a 240 U/l. Niños: hasta 400 U/l.','',''));

/*$pdf->Row(array('Suero -','BILIRRUBINA TOTAL ',$total,'mg/dl'));
$pdf->Row(array('','Lim. sup ref.: 1.00 mg/dl','',''));

$pdf->Row(array('Suero -','BILIRRUBINA DIRECTA',$directa,'mg/dl'));
$pdf->Row(array('','Lim. sup ref.: 0.25 mg/dl','',''));

$pdf->Row(array('Suero -','BILIRRUBINA INDIRECTA ',$indirecta,'mg/dl'));
$pdf->Row(array('','Lim. sup ref.: 0.75 mg/dl','',''));


$pdf->Cell(50,5,"Nota: Bilirrubina directa, conjugada o post-hepática. Bilirrubina Indirecta, libre o pre-hepática",0);     
*/

?>
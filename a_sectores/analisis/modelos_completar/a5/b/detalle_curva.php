<?php 
$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_curva where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$basal=strtoupper($result11->fields["basal"]);
$a30=strtoupper($result11->fields["a30"]);

$a30=strtoupper($result11->fields["a30"]);
$a60=strtoupper($result11->fields["a60"]);
$a120=strtoupper($result11->fields["a120"]);
$a180=strtoupper($result11->fields["a180"]);
$basal_mg=strtoupper($result11->fields["basal_mg"]);
$a30mg=strtoupper($result11->fields["a30mg"]);
$a60mg=strtoupper($result11->fields["a60mg"]);
$a120mg=strtoupper($result11->fields["a120mg"]);
$a180mg=strtoupper($result11->fields["a180mg"]);



$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',12);
$pdf->Cell(40,10,'CURVA DE TORELANCIA ORL A LA GLUCOSA');
$pdf->SetFont('Arial','B',10);
$pdf->ln();


$pdf->Cell(50,3,"Metodo Enzimatico",0);   

$pdf->ln();

$pdf->Cell(50,5,"Dosis administrada: 75 g. de glucosa anhidra",0);     
$pdf->ln();


$pdf->SetFont('Arial','',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46,46,46, 46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array('Valores Hallados','Glucemia','Insulinemia',''));

$pdf->Row(array('Basal',$basal.' g/l',$basal_mg.' mg/dl'));
$pdf->Row(array('A los 30 min',$a30.' g/l',$a30mg.' mg/dl'));
$pdf->Row(array('A los 60 min',$a60.' g/l',$a60mg.' mg/dl'));
$pdf->Row(array('A los 120 min',$a120.' g/l',$a120mg.' mg/dl'));
$pdf->Row(array('A los 180 min',$a180.' g/l',$a180mg.' mg/dl'));


$pdf->ln();
$pdf->SetWidths(array(46,46,46,46, 46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array('VALORES REFERENCIALES','Basal','= 0.70 a 1.10'.' g/l'));
$pdf->Row(array('','A los 120 min','= inferior a 1.40'.' g/l'));
$pdf->Row(array('Emparazadas','Basal', '= inferior a 1.40'.' g/l'));
$pdf->Row(array('','A los 120 min', '= inferior a 1.40'.' g/l'));
$pdf->Row(array('NOTA:','A los 120 min','1.40 a 1.99 g/l','Tolerancia a la glucosa alterada'));
$pdf->Row(array(':','','Superior a 2.00 g/l','Diabetes mellitus'));


$pdf->Cell(50,5,"En embarazadas, valores superiores alos indicados sugieren Diabetes gestacional",0);     




?>
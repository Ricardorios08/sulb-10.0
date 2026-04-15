<?php 
$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_calcio where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=strtoupper($result11->fields["diuresis"]);
$valor_hallado=strtoupper($result11->fields["valor_hallado"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',10);
$pdf->Cell(40,10,'ORINA - CALCIO');
$pdf->SetFont('Arial','',10);
$pdf->ln();


$pdf->Cell(50,3,"Metodo o-cresolftaleina complexona",0);   

$pdf->ln();
$pdf->ln();
$pdf->ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(50,5,"Diuresis de 24 hs. ",0);     
$pdf->Cell(50,5,$diuresis." l",0);  

$pdf->ln();


$pdf->Cell(50,5,"V. Hallado: ",0);     
$pdf->Cell(50,5,$valor_hallado." mg/en 24 hs",0);  

$pdf->ln();


$pdf->ln();

$pdf->ln();

$pdf->ln();

$pdf->Cell(50,5,"Valores Referenciales: ",0);   
$pdf->ln();

$pdf->SetFont('Arial','',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46,46,46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);


$pdf->Row(array('Dieta poore en calcio: ','5.00 a 40.00','mg/24 hs',$referencia3));
$pdf->Row(array('Dieta media: ','50.00 a 150.00','mg/24 hs',$referencia3));
$pdf->Row(array('Dieta rica en calcio: ','100.00 a 300.00','mg/24 hs',$referencia3));


$pdf->ln();
$pdf->Ln();
$pdf->ln();


$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 
?>
<?php 
//$pdf->AddPage();

//905

$pdf->Ln();

 $sql11="select * from detalle_uricosuria where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=strtoupper($result11->fields["diuresis"]);
$valor_hallado=strtoupper($result11->fields["valor_hallado"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 
  $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$metodo=strtoupper($result11->fields["metodo"]);
$unidad=$result11->fields["unidad"];


$tamanio = 11;
$pdf->SetFont('Arial','BI',$tamanio);
$pdf->Cell(40,10,$nombre_practica);
$tamanio = 10;
$pdf->SetFont('Arial','','8');

$pdf->SetX(130);
$pdf->Cell(50,10,"Metodo o-cresolftaleina complexona.");
$pdf->ln();
$pdf->ln();
$pdf->SetFont($letra,'','10');
$pdf->Cell(35,10,"Diuresis de 24 hs.: ",0); 
$pdf->SetFont($letra,'B','10');
$pdf->Cell(12,10,$diuresis,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,10,"l.",0);  
$pdf->ln();
$pdf->SetFont($letra,'','9');



$pdf->ln();
$pdf->SetFont($letra,'','10');
$pdf->Cell(35,10,"V. Hallado: ",0); 
$pdf->SetFont($letra,'B','10');
$pdf->Cell(12,10,$valor_hallado,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,10,"mg/en 24 hs",0);  
$pdf->ln();
$pdf->SetFont($letra,'','9');




$pdf->ln();

$pdf->ln();

$pdf->ln();

$pdf->Cell(50,10,"Valores Referenciales: ",0);   
$pdf->ln();

$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46,46,46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);


$pdf->Row(array('Dieta pobre en calcio: ','5.0 a 40.0','mg/24 hs',$referencia3));
$pdf->Row(array('Dieta media: ','50.0 a 150.0','mg/24 hs',$referencia3));
$pdf->Row(array('Dieta rica en calcio: ','100.0 a 300.0','mg/24 hs',$referencia3));


$pdf->ln();
$pdf->Ln();
$pdf->ln();


$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 
?>
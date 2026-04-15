<?php 
$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_magnesio where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=strtoupper($result11->fields["diuresis"]);
$valor_hallado=strtoupper($result11->fields["valor_hallado"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',10);
$pdf->Cell(40,10,'DETERMINACION DE MAGNESIO');
$pdf->SetFont('Arial','',10);
$pdf->ln();


$pdf->Cell(50,3,"Electrofotométrico con calmagile",0);   

$pdf->ln();
$pdf->Cell(50,3,"Muestra: ORINA",0);   

$pdf->Cell(50,5,"Diuresis",0);     
$pdf->Cell(50,5,$diuresis,0);  
$pdf->Cell(50,5,"l",0);  
$pdf->ln();

$pdf->Cell(50,5,"Resultado: ",0);     
$pdf->Cell(50,5,$valor_hallado,0);  
$pdf->Cell(50,5,"mg//en 24 hs",0);  
$pdf->ln();



$pdf->SetFont('Arial','',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46,46,46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array('Valores referenciales',$referencia1,$referencia2,$referencia3));

$pdf->Row(array('','6.0 a 10.0 mEq/24 hs','',$referencia3));
$pdf->Row(array('','72.9 a 121.5 mg/24 hs','',$referencia3));



$pdf->ln();
$pdf->Ln();


$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 
?>
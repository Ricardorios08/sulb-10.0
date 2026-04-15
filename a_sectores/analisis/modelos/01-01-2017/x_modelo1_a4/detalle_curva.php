<?php 
//$pdf->AddPage();

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

$pdf->SetX(30);
$pdf->SetFont($letra,'BIU',10);
$pdf->Cell(40,10,'CURVA DE TOLERANCIA A LA GLUCOSA');
$pdf->SetFont($letra,'B',10);
$pdf->ln();

$pdf->SetX(30);
$pdf->Cell(50,3,"Metodo Enzimatico",0);   

$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(50,5,"Dosis administrada: 75 g. de glucosa anhidra",0);     
$pdf->ln();


$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46,46,46, 46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->SetX(30);
$pdf->Row(array('Valores Hallados','','',''));

 
$pdf->SetX(30);
$pdf->Cell(50,5,"Glucemia Basal",0);
  $pdf->SetFont($letra,'B',$tamanio);
  $pdf->Cell(15,5,number_format($basal,2)); 
  $pdf->SetFont($letra,'',$tamanio);

  $pdf->Cell(20,5,"g/l");

$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(50,5,"Glucemia a los 60 min",0);
  $pdf->SetFont($letra,'B',$tamanio);
  $pdf->Cell(15,5,number_format($a60,2)); 
  $pdf->SetFont($letra,'',$tamanio);
  
  $pdf->Cell(20,5,"g/l");


$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(50,5,"Glucemia a los 120 min",0);
  $pdf->SetFont($letra,'B',$tamanio);
  $pdf->Cell(15,5,number_format($a120,2)); 
  $pdf->SetFont($letra,'',$tamanio);
  
  $pdf->Cell(20,5,"g/l");


$pdf->ln();


$pdf->ln();
$pdf->SetX(30);
$pdf->SetWidths(array(46,46,46,46, 46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->SetX(30);
$pdf->Row(array('VALORES REFERENCIALES','Basal','= 0.70 a 1.10'.' g/l'));
$pdf->SetX(30);
$pdf->Row(array('','A los 120 min','= inferior a 1.40'.' g/l'));
$pdf->SetX(30);
$pdf->Row(array('Embarazadas','Basal', '= inferior a 1.40'.' g/l'));
$pdf->SetX(30);
$pdf->Row(array('','A los 120 min', '= inferior a 1.40'.' mg/dl'));
$pdf->SetX(30);
$pdf->Row(array('NOTA:','A los 120 min','1.40 a 1.99 g/l','Tolerancia a la glucosa alterada'));
$pdf->SetX(30);
$pdf->Row(array(':','','Superior a 2.00 g/l','Diabetes mellitus'));
$pdf->SetX(30);

$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(50,5,"En embarazadas, valores superiores alos indicados sugieren Diabetes gestacional",0);     




?>
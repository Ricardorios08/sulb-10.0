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


include ("practica.php");

 

$pdf->Cell(50,5,"Dosis administrada: 75 g. de glucosa anhidra",0);     
$pdf->ln();


$pdf->SetFont('Arial','',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46,46,46, 46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array('Valores Hallados','','',''));

 

$pdf->Cell(50,5,"Glucemia Basal",0);
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,$basal); 
  $pdf->SetFont('Arial','',$tamanio);

  $pdf->Cell(20,5,"mg/dl");

if ($a30 > 0){
$pdf->ln();
$pdf->Cell(50,5,"Glucemia a los 30 min",0);
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,number_format($a30,0)); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"mg/dl");
}

if ($a60 > 0){
$pdf->ln();
$pdf->Cell(50,5,"Glucemia a los 60 min",0);
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,number_format($a60,0)); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"mg/dl");
}

   $pdf->ln();
$pdf->Cell(50,5,"Glucemia a los 120 min",0);
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,$a120); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"mg/dl");


if ($a180 > 0){
$pdf->ln();
$pdf->Cell(50,5,"Glucemia a los 180 min",0);
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,number_format($a180,0)); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"mg/dl");
}













$pdf->ln();


$pdf->ln();
$pdf->SetWidths(array(46,46,46,46, 46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array('VALORES REFERENCIALES','Basal','= 70 a 110'.' mg/dl'));
$pdf->Row(array('','A los 120 min','= inferior a 140'.' mg/dl'));
$pdf->Row(array('Embarazadas','Basal', '= inferior a 100'.' mg/dl'));
$pdf->Row(array('','A los 120 min', '= inferior a 140'.' mg/dl'));
$pdf->Row(array('NOTA:','A los 120 min','140 a 199 mg/dl','Pre-diabetes'));
$pdf->Row(array(':','','Superior a 200 mg/dl','Diabetes mellitus'));

$pdf->ln();
$pdf->Cell(50,5,"En embarazadas, valores superiores alos indicados sugieren Diabetes gestacional",0);     

$pdf->Ln(); 
 
 


 $pdf->ln();
?>
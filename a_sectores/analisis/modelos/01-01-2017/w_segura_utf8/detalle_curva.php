<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_curva where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$basal=utf8_decode(strtoupper($result11->fields["basal"]));
$a30=utf8_decode(strtoupper($result11->fields["a30"]));

$a30=utf8_decode(strtoupper($result11->fields["a30"]));
$a60=utf8_decode(strtoupper($result11->fields["a60"]));
$a120=utf8_decode(strtoupper($result11->fields["a120"]));
$a180=utf8_decode(strtoupper($result11->fields["a180"]));
$basal_mg=utf8_decode(strtoupper($result11->fields["basal_mg"]));
$a30mg=utf8_decode(strtoupper($result11->fields["a30mg"]));
$a60mg=utf8_decode(strtoupper($result11->fields["a60mg"]));
$a120mg=utf8_decode(strtoupper($result11->fields["a120mg"]));
$a180mg=utf8_decode(strtoupper($result11->fields["a180mg"]));

$observaciones =utf8_decode(strtoupper($result11->fields["observaciones"]));


include ("practica.php");

$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(50,5,"Dosis administrada: 75 g. de glucosa anhidra en 375 cc de agua",0);     
$pdf->ln();


$pdf->SetFont('Arial','B',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46,46,46, 46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Setx(30);
$pdf->Row(array('Valores Hallados','','',''));

 $pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Glucemia Basal",0);
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(15,5,$basal); 
  $pdf->SetFont('Arial','',$tamanio);

  $pdf->Cell(20,5,"g/l");

$desde = number_format(0.70,2);
$hasta = number_format(1.10,2);
$unidad = "g/l";
$vr = "V.R: ".$columna1." ".$desde.' - '.$hasta.'  '.$unidad." ".$columna2;
$pdf->Cell(15,5,$vr); 



if ($a30 > 0){
$pdf->ln();
$pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Glucemia a los 30 min",0);
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(15,5,$a30); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"g/l");
}

if ($a60 > 0){
$pdf->ln();
$pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Glucemia a los 60 min",0);
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(15,5,$a60); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"g/l");
}

   $pdf->ln();
   $pdf->Setx(30);
    $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Glucemia a los 120 min",0);
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(15,5,$a120); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"g/l");


if ($a180 > 0){
$pdf->ln();
$pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Glucemia a los 180 min",0);
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(15,5,$a180); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"g/l");
}

$pdf->ln();
$pdf->ln();
 $pdf->ln();



/*
////////////////////////////// ORINA

if ($basal_mg != ''){

$pdf->SetFont($letra,'BI',12);
	$pdf->SetX(30);
	$pdf->Cell(100,5,"ORINA");
$pdf->ln();
$pdf->ln();




$pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Orina Basal",0);
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(20,5,$basal_mg); 
  $pdf->SetFont('Arial','',$tamanio);

  $pdf->Cell(20,5,"g/l");

//
  // $desde = number_format(2,2);
//$hasta = number_format(14.50,2);
//$unidad = "g/l ";
//$vr = "V.R: ".$columna1." ".$desde.' - '.$hasta.'  '.$unidad." ".$columna2;
//$pdf->Cell(15,5,$vr);
//


}

 



if ($a30mg > 0){
$pdf->ln();
$pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Orina a los 30 min",0);
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(20,5,$a30mg); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"g/l ");
}

if ($a60mg > 0){
$pdf->ln();
$pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Orina a los 60 min",0);
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(20,5,$a60mg); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"g/l ");
}


if ($a120mg > 0){
$pdf->ln();
$pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Orina a los 120 min",0);
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(20,5,$a120mg); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"g/l ");




}



if ($a180mg > 0){
$pdf->ln();
$pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Orina a los 180 min",0);
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(20,5,$a180mg); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"g/l ");
}






/*

*/


if ($basal_mg > 0){

$pdf->SetFont($letra,'BI',12);
	$pdf->SetX(30);
	$pdf->Cell(100,5,"INSULINA");
$pdf->ln();
$pdf->ln();




$pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Insulinemia Basal",0);
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(15,5,$basal_mg); 
  $pdf->SetFont('Arial','',$tamanio);

  $pdf->Cell(20,5,"uU/ml");

   $desde = number_format(2,2);
$hasta = number_format(14.50,2);
$unidad = "uU/ml ";
$vr = "V.R: ".$columna1." ".$desde.' - '.$hasta.'  '.$unidad." ".$columna2;
$pdf->Cell(15,5,$vr);

}

 



if ($a30mg > 0){
$pdf->ln();
$pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Insulinemia a los 30 min",0);
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(15,5,$a30mg); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"uU/ml ");
}

if ($a60mg > 0){
$pdf->ln();
$pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Insulinemia a los 60 min",0);
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(15,5,$a60mg); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"uU/ml ");
}


if ($a120mg > 0){
$pdf->ln();
$pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Insulinemia a los 120 min",0);
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(15,5,$a120mg); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"uU/ml ");




}



if ($a180mg > 0){
$pdf->ln();
$pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,"Insulinemia a los 180 min",0);
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(15,5,$a180mg); 
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"uU/ml ");
}

//*/

?>
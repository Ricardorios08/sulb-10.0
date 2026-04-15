<?php 
//$pdf->AddPage();

$pdf->Ln();

  $sql11="select * from detalle_iono where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$natremia=strtoupper($result11->fields["natremia"]);
$kalemia=strtoupper($result11->fields["kalemia"]);
$cloremia =strtoupper($result11->fields["cloremia"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


include ("practica.php");



$pdf->Cell(50,5,"SODIO (Na)",0);     
$pdf->ln();
$pdf->Cell(30,5,"V. Hallado: ",0);  
$pdf->SetFont($letra,'B',$tamanio);  
 
$pdf->Cell(10,5,$natremia,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"mmol/l",0);  
$pdf->ln();
  $pdf->SetFont($letra,'',9);
$pdf->Cell(60,5,"V.R:  de 135 a 145 mmol/l",0);     
$pdf->ln();
$pdf->ln();

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"POTASIO(K)",0);     
     
$pdf->ln();
$pdf->Cell(30,5,"V. Hallado: ",0);   
$pdf->SetFont($letra,'B',$tamanio);
 
$pdf->Cell(10,5,$kalemia,0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"mmol/l",0);  
$pdf->ln();
 $pdf->SetFont($letra,'',9); 
$pdf->Cell(60,5,"V.R:  de 3.5 a 5.3 mmol/l",0);     
$pdf->ln();
$pdf->ln();

if ($cloremia >  0){

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"CLORO (Cl)",0);     
$pdf->ln();




$pdf->Cell(30,5,"V. Hallado: ",0);  
$pdf->SetFont($letra,'B',$tamanio);

 
$pdf->Cell(10,5,$cloremia,0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"mmol/l",0);  
$pdf->ln();
$pdf->SetFont($letra,'',9);
 
$pdf->Cell(60,5,"V.R:  de 94 a 111 mmol/l",0);     
}




?>
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

$pdf->SetX(30);
$pdf->SetFont($letra,'BU',11);  
$pdf->Cell(50,5,"SODIO (Na)",0);     
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'',8);
$pdf->Cell(50,5,"Método: ISE",0);     
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'',10);
$pdf->Cell(30,5,"Resultado: ",0);  
$pdf->SetFont($letra,'B',$tamanio);  
$pdf->SetX(65);
$pdf->Cell(20,5,$natremia." mmol/l",0); 
$pdf->SetFont($letra,'',9);
$pdf->SetX(100);
$pdf->Cell(60,5,"(V.R:  de 135 a 148 mmol/l)",0);     
$pdf->ln();
$pdf->ln();

$pdf->SetX(30);
$pdf->SetFont($letra,'BU',11);  
$pdf->Cell(50,5,"POTASIO(K)",0);     
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'',8);
$pdf->Cell(50,5,"Método: ISE",0);     
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'',10);
$pdf->Cell(30,5,"Resultado: ",0);   
$pdf->SetFont($letra,'B',$tamanio);  
$pdf->SetX(65);
$pdf->Cell(20,5,$kalemia." mmol/l",0); 
$pdf->SetFont($letra,'',9);
$pdf->SetX(100);
$pdf->Cell(60,5,"(V.R:  de 3.7 a 5.3 mmol/l)",0);     
$pdf->ln();
$pdf->ln();
$pdf->SetX(30);

$pdf->SetX(30);
$pdf->SetFont($letra,'BU',11);  
$pdf->Cell(50,5,"CLORO (Cl)",0);     
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'',8);
$pdf->Cell(50,5,"Método: ISE)",0);     
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'',10);
$pdf->Cell(30,5,"Resultado: ",0);  
$pdf->SetFont($letra,'B',$tamanio);  
$pdf->SetX(65);
$pdf->Cell(20,5,$cloremia." mmol/l",0); 
$pdf->SetFont($letra,'',9);
$pdf->SetX(100);
$pdf->Cell(60,5,"(V.R:  de 98 a 109 mmol/l)",0);     
$pdf->ln();
$pdf->ln();
$pdf->SetX(30);

?>
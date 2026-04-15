<?php 
//$pdf->AddPage();

 

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

$tamanio = 9;
$pdf->SetFont('Arial','',$tamanio);


$pdf->Cell(50,5,"SODIO (Na)",0);     
$pdf->ln();
$pdf->Cell(50,5,"Método Potenciometría Directa c/ISE.",0);     
$pdf->ln();
$pdf->Cell(50,5,"V. Hallado: ",0);  
$pdf->SetFont($letra,'B',$tamanio);  
$pdf->Cell(40,5," ",0);
$pdf->Cell(10,5,$natremia,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"mEq /l",0);  
$pdf->ln();
$pdf->Cell(20,5," ",0);
$pdf->Cell(60,5,"V.N:  de 135 a 145 mEq/l.",0);     
$pdf->ln();
$pdf->ln();
$pdf->ln();


$pdf->Cell(50,5,"POTASIO (K)",0);     
$pdf->ln();
$pdf->Cell(50,5,"Metodo Potenciometría Directa c/ISE.
",0);     
$pdf->ln();
$pdf->Cell(50,5,"V. Hallado: ",0);   
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(40,5," ",0);
$pdf->Cell(10,5,$kalemia,0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"mEq /l",0);  
$pdf->ln();
$pdf->Cell(20,5," ",0);
$pdf->Cell(60,5,"V.N:  de 3,5 a 5,0 mEq/l.",0);     
$pdf->ln();
$pdf->ln();
$pdf->ln();

$pdf->Cell(50,5,"CLORO (Cl)",0);     
$pdf->ln();
$pdf->Cell(50,5,"Metodo Potenciometría Directa c/ISE.",0);     
$pdf->ln();



$pdf->Cell(50,5,"V. Hallado: ",0);  
$pdf->SetFont($letra,'B',$tamanio);

$pdf->Cell(40,5," ",0);
$pdf->Cell(10,5,$cloremia,0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"mEq /l",0);  
$pdf->ln();
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5," ",0);
$pdf->Cell(60,5,"V.N:  de 98 a 110 mEq/l.",0);     
$pdf->ln();
$pdf->ln();



?>
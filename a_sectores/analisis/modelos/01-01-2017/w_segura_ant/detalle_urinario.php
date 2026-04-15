<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_iono_urinario where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$resultado=strtoupper($result11->fields["resultado"]);
$sodio=strtoupper($result11->fields["sodio"]);
$potasio=strtoupper($result11->fields["potasio"]);
$cloro=strtoupper($result11->fields["cloro"]);
$observaciones =strtoupper($result11->fields["observaciones"]);


include ("practica.php");

  

$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio); 
$pdf->Cell(50,5,"Diurésis remitida al laboratorio",0);     
$pdf->ln();
$pdf->Cell(20,5,"V. Hallado: ",0);  
$pdf->SetFont($letra,'',$tamanio);  
$pdf->Cell(20,5,$resultado,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"ml",0); 
$pdf->ln();
$pdf->ln();

$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio); 
$pdf->Cell(50,5,"SODIO (Na)",0);     

$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(20,5,"V. Hallado: ",0);  
$pdf->SetFont($letra,'',$tamanio);  
$pdf->Cell(20,5,$sodio,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"mEql/24hs",0); 

$pdf->ln();
$pdf->SetX(60);
$pdf->Cell(60,5,"V.R:  de 30 a 300 mEq/24 hs.",0);     
$pdf->ln();

$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio); 
$pdf->Cell(50,5,"POTASIO (K)",0);     

$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(20,5,"V. Hallado: ",0);  
$pdf->SetFont($letra,'',$tamanio);  
$pdf->Cell(20,5,$potasio,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"mEq/24 hs.",0); 

$pdf->ln();
$pdf->SetX(60);

$pdf->Cell(60,5,"V.R:  de 23 a 125 mEq/24 hs.",0);     
$pdf->ln();


$pdf->ln();
$pdf->SetFont($letra,'B',$tamanio); 
$pdf->SetX(30);
$pdf->Cell(50,5,"CLORO (Cl)",0);     
$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(20,5,"V. Hallado: ",0);  
$pdf->SetFont($letra,'',$tamanio);  
$pdf->Cell(20,5,$cloro,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"mEql/24 hs.",0); 
$pdf->ln();
$pdf->SetX(60);


$pdf->Cell(60,5,"V.R:  de 110 a 250 mEq/24 hs.",0);     
$pdf->ln();
 
 

 

  


 
?>
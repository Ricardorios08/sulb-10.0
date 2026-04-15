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
$pdf->SetFont($letra,'',$tamanio); 
$pdf->Cell(50,10,"Diurésis remitida al laboratorio",0);     
$pdf->ln();
$pdf->Cell(20,10,"V. Hallado: ",0);  
$pdf->SetFont($letra,'B',$tamanio);  
$pdf->Cell(20,10,$resultado,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,10,"ml",0); 
$pdf->ln();
$pdf->ln();


$pdf->Cell(50,10,"SODIO (Na)",0);     
$pdf->ln();
$pdf->Cell(20,10,"V. Hallado: ",0);  
$pdf->SetFont($letra,'B',$tamanio);  
$pdf->Cell(20,10,$sodio,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,10,"mEql/24hs",0); 
$pdf->ln();
$pdf->SetFont($letra,'',9);
$pdf->Cell(60,10,"V.R:  de 30 a 300 mEq/24 hs.",0);     
$pdf->ln();
$pdf->ln();
$pdf->Cell(50,10,"POTASIO (K)",0);     
$pdf->ln();
$pdf->Cell(20,10,"V. Hallado: ",0);  
$pdf->SetFont($letra,'B',$tamanio);  
$pdf->Cell(20,10,$potasio,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,10,"mEq/24 hs.",0); 
$pdf->ln();
$pdf->SetFont($letra,'',9);
$pdf->Cell(60,10,"V.R:  de 23 a 125 mEq/24 hs.",0);     
$pdf->ln();
$pdf->ln();
$pdf->Cell(50,10,"CLORO (Cl)",0);     
$pdf->ln();
$pdf->Cell(20,10,"V. Hallado: ",0);  
$pdf->SetFont($letra,'B',$tamanio);  
$pdf->Cell(20,10,$cloro,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,10,"mEql/24 hs.",0); 
$pdf->ln();
$pdf->SetFont($letra,'',9);
$pdf->Cell(60,10,"V.R:  de 110 a 250 mEq/24 hs.",0);     
$pdf->ln();
 
 

 

  


 
?>
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

  
$tamanio1 = 8;
$pdf->SetX(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(100,5,"Diurésis remitida al laboratorio: ",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$resultado,0); 
$pdf->SetFont($letra,'',$tamanio);
if ($resultado == 0){
	$unidad = "lts.";
$pdf->Cell(10,5,$unidad,0);
}else
{
$unidad = "lts./24 hs.";
		
$pdf->Cell(10,5,$unidad,0);
}
$pdf->Ln(); 
$pdf->ln();
$pdf->SetX(30);

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(100,5,"SODIO (Na) Contiene ",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$sodio,0); 
$pdf->SetFont($letra,'',$tamanio);

if ($resultado == 0){
$pdf->Cell(10,5,'mmol/l',0);
$pdf->Ln(); 
$pdf->Cell(10,5,'',0);
$pdf->Ln(); 
$pdf->ln();
$pdf->SetX(30);
}else{
$pdf->Cell(10,5,'mmol/en orina 24 hs',0);
$pdf->Ln(); 
$pdf->Cell(10,5,'V.d R: 30 a 300 mmol/en orina de 24 hs',0);
$pdf->Ln(); 
$pdf->ln();
$pdf->SetX(30);
}


$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(100,5,"POTASIO (K) Contiene ",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$potasio,0); 
$pdf->SetFont($letra,'',$tamanio);
if ($resultado == 0){
$pdf->Cell(10,5,'mmol/l',0);
$pdf->Ln(); 
$pdf->SetX(30);
$pdf->Cell(10,5,'',0);
$pdf->Ln(); 
$pdf->ln();
$pdf->SetX(30);
}else{
$pdf->Cell(10,5,'mmol/en orina 24 hs.',0);
$pdf->Ln(); 
$pdf->SetX(30);
$pdf->Cell(10,5,'V.d R: 25 a 125 mmol/en orina de 24 hs',0);
$pdf->Ln(); 
$pdf->ln();
$pdf->SetX(30);
}



$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(100,5,"CLORO (Cl) Contiene ",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$cloro,0); 
$pdf->SetFont($letra,'',$tamanio);
if ($resultado == 0){
$pdf->Cell(10,5,'mmol/l',0);
$pdf->Ln(); 
$pdf->SetX(30);
$pdf->Cell(10,5,'',0);
$pdf->Ln(); 
$pdf->ln();
$pdf->SetX(30);
}else{
	$pdf->SetX(30);
$pdf->Cell(10,5,'mmol/en orina 24 hs.',0);
$pdf->Ln(); 
$pdf->Cell(10,5,'V.d R: 110 a 250 mmol/en orina de 24 hs',0);
$pdf->Ln(); 
$pdf->ln();
$pdf->SetX(30);
}
  


 
?>
<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_hepatograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$aspartato=strtoupper($result11->fields["aspartato"]);
$alanina=strtoupper($result11->fields["alanina"]);

$fosfatasa=strtoupper($result11->fields["fosfatasa"]);
$total=strtoupper($result11->fields["total"]);

$directa=strtoupper($result11->fields["directa"]);
$indirecta=strtoupper($result11->fields["indirecta"]);


$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


include ("practica.php");

  
$tamanio1 = 8;
if ($aspartato > 0){
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(100,5,"ASPASTATO AMINOTRANSFER.(ALT/ASAT/GOT)",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$aspartato,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"UI/l ",0);
$pdf->Cell(20,5," ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(60,5,"Método: Reitman Y Franklen",0);     
$pdf->Ln(); 
$pdf->Cell(20,5," ",0);
$pdf->Cell(60,5,"V.R. Hasta 12 U/l",0); 
$pdf->Ln(); 
$pdf->Ln(); 
}

if ($alanina > 0){
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(100,5,"ALANINA AMINOTRASNFER.(ALT/ALAT/GPT)",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$alanina,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"UI/l ",0);
$pdf->Cell(20,5," ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(60,5,"Método: Reitman Y Franklen",0);     
$pdf->Ln(); 
$pdf->Cell(20,5," ",0);
$pdf->Cell(60,5,"V.R. Hasta 12 U/l",0); 
$pdf->Ln(); 
$pdf->Ln(); 
}


if ($fosfatasa > 0){
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(100,5,"FOSFATASA ALCALINA(FAL)",0);     
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$fosfatasa,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"UI/l ",0);
$pdf->Cell(20,5," ",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(60,5,"Método: Colorimétrico",0);     
$pdf->Ln(); 
$pdf->Cell(20,5," ",0);
$pdf->Cell(60,5,"V.R. Adultos 68 a 240 U/l. Niños: hasta 400 U/l",0); 
}

/*$pdf->Row(array('Suero -','BILIRRUBINA TOTAL ',$total,'mg/dl'));
$pdf->Row(array('','Lim. sup ref.: 1.00 mg/dl','',''));

$pdf->Row(array('Suero -','BILIRRUBINA DIRECTA',$directa,'mg/dl'));
$pdf->Row(array('','Lim. sup ref.: 0.25 mg/dl','',''));

$pdf->Row(array('Suero -','BILIRRUBINA INDIRECTA ',$indirecta,'mg/dl'));
$pdf->Row(array('','Lim. sup ref.: 0.75 mg/dl','',''));


$pdf->Cell(50,5,"Nota: Bilirrubina directa, conjugada o post-hepática. Bilirrubina Indirecta, libre o pre-hepática",0);     
*/

?>
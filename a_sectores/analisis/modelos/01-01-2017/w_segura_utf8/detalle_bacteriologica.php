<?php 
//$pdf->AddPage();

$pdf->Ln();

   $sql11="select * from detalle_bacteriologico where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=utf8_decode(strtoupper($result11->fields["muestra"]);
$color=utf8_decode(strtoupper($result11->fields["color"]);
$aspecto=utf8_decode(strtoupper($result11->fields["aspecto"]);
$obs_micro=utf8_decode(strtoupper($result11->fields["obs_micro"]);
$nicolle=utf8_decode(strtoupper($result11->fields["nicolle"]);
$cultivo=utf8_decode(strtoupper($result11->fields["cultivo"]);
$observaciones =utf8_decode(strtoupper($result11->fields["observaciones"]);


include ("practica.php");

$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(50,5,"Muestra y obtención:",0);    
$pdf->ln();


$pdf->Setx(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,$muestra,0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->ln();
$pdf->ln();

/*
$pdf->Setx(30);
$pdf->Cell(50,5,"Color: ",0);     
$pdf->Cell(50,5,$color,0);  
$pdf->Cell(30,5,"Aspecto:",0);  
$pdf->Cell(50,5,$aspecto,0);  
$pdf->ln();
$pdf->ln();
*/

$pdf->Setx(30);
$pdf->Cell(50,5,"OBSERVACION MICROSCOPICA EN FRESCO:",0);  
$pdf->ln();

$pdf->Setx(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->write(5,$obs_micro);  
$pdf->SetFont($letra,'B',$tamanio);

$pdf->ln();
$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(50,5,"CON COLORACION DE GRAM-NICOLLE:",0);  
$pdf->ln();

$pdf->Setx(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->write(5,$nicolle);  
$pdf->SetFont($letra,'B',$tamanio);

$pdf->ln();
$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(50,5,"CULTIVO E IDENTIFICACION",0);  
$pdf->ln();

$pdf->Setx(30);
$pdf->SetFont($letra,'',$tamanio);
$pdf->write(5,$cultivo);  
$pdf->SetFont($letra,'B',$tamanio);


?>
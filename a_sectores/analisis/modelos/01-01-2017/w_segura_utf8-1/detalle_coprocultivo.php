<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_coprocultivo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$celulas_epiteliales=utf8_decode($result11->fields["celulas_epiteliales"]);
$leucocitos=utf8_decode($result11->fields["leucocitos"]);
$piocitos=utf8_decode($result11->fields["piocitos"]);
$hematies=utf8_decode($result11->fields["hematies"]);
$mucus=utf8_decode($result11->fields["mucus"]);
$mucus1=utf8_decode($result11->fields["mucus1"]);
$mucus2=utf8_decode($result11->fields["mucus2"]);
$nicolle=utf8_decode($result11->fields["nicolle"]);
$nicolle1=utf8_decode($result11->fields["nicolle1"]);
$nicolle2=utf8_decode($result11->fields["nicolle2"]);
$cultivo=utf8_decode($result11->fields["cultivo"]);
$cultivo1=utf8_decode($result11->fields["cultivo1"]);
$cultivo2=utf8_decode($result11->fields["cultivo2"]);


 
include ("practica.php");

$pdf->Setx(30);
$tamanio = 10;
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(55,5,"Exámen en fresco:",0);  
$pdf->ln();
$pdf->Setx(30);

$pdf->Cell(55,5,'Celulas Epiteliales',0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(55,5,$celulas_epiteliales,0); 
$pdf->ln();
$pdf->Setx(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(55,5,'Leucocitos',0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(55,5,$leucocitos,0); 


$pdf->ln();
$pdf->Setx(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(55,5,'Piocitos',0); 
$pdf->SetFont('Arial','',$tamanio);;
$pdf->Cell(55,5,$piocitos,0);

$pdf->ln();
$pdf->Setx(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(55,5,'Hematies',0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(55,5,$hematies,0);

$pdf->ln();
$pdf->Setx(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(55,5,'Mucus',0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(55,5,$mucus,0);


$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(55,5,'',0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(55,5,$mucus1,0);

$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(55,5,'',0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(55,5,$mucus2,0);

$pdf->ln();
$pdf->ln();
$pdf->Setx(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(55,5,'Coloración de Gramm Nicolle:',0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(55,5,$nicolle,0);

$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(55,5,'',0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(55,5,$nicolle1,0);

$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(55,5,'',0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(55,5,$nicolle2,0);

$pdf->ln();
$pdf->ln();
$pdf->Setx(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(55,5,'Cultivo',0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(55,5,$cultivo,0);
$pdf->Cell(55,5,$cultivo3,0);




$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(55,5,'',0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(55,5,$cultivo1,0);
$pdf->Cell(55,5,$cultivo4,0);

$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(55,5,'',0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(55,5,$cultivo2,0);
$pdf->Cell(55,5,$cultivo5,0);

?>
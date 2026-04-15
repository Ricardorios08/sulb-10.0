<?php 
//$pdf->AddPage();
//include ("enca_pdf.php");



$pdf->Ln();

 $sql11="select * from detalle_hemo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$hematies=number_format($result11->fields["hematies"],2);
$hemoglobina=number_format($result11->fields["hemoglobina"],2);
$hematocrito=number_format($result11->fields["hematocrito"],2);
$reticulocitos=number_format($result11->fields["reticulocitos"],2);
$plaquetas=number_format($result11->fields["plaquetas"],2);
$mcv=number_format($result11->fields["mcv"],2);
$mch=number_format($result11->fields["mch"],2);
$mchc=number_format($result11->fields["mchc"],2);

 $leucocitos=$result11->fields["leucocitos"];
$neutro_cayado=$result11->fields["neutro_cayado"];
$neutro_segmentado=$result11->fields["neutro_segmentado"];
$eosinofilos=$result11->fields["eosinofilos"];
$basofilos=$result11->fields["basofilos"];
$linfocitos=$result11->fields["linfocitos"];
$monocitos=$result11->fields["monocitos"];



$carac_plaquetas=strtoupper($result11->fields["carac_plaquetas"]);
$carac_leucocitos=strtoupper($result11->fields["carac_leucocitos"]);
$carac_hematies=strtoupper($result11->fields["carac_hematies"]);

$observaciones =strtoupper($result11->fields["observaciones"]);
$formula =strtoupper($result11->fields["formula"]);


 $absoluto_neutro_cayado = $leucocitos * $neutro_cayado/100;
$absoluto_neutro_segmentado= $leucocitos * $neutro_segmentado/100;
 $absoluto_eosinofilos= $leucocitos * $eosinofilos/100;
$absoluto_basofilos= $leucocitos * $basofilos/100;
$absoluto_linfocitos= $leucocitos * $linfocitos/100;
$absoluto_monocitos= $leucocitos * $monocitos/100;

$total_leucocitos = $neutro_cayado + $neutro_segmentado + $eosinofilos + $basofilos + $linfocitos + $monocitos;
$total_absoluto_leucocitos = $absoluto_neutro_cayado + $absoluto_neutro_segmentado + $absoluto_eosinofilos + $absoluto_basofilos + $absoluto_linfocitos + $absoluto_monocitos;


 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];

$pdf->SetY(50);
$pdf->Setx(10);
$pdf->SetFont($letra,'',7);
$pdf->Cell(33,5,$nombre_practica);
$pdf->SetFont($letra,'',7);
$pdf->ln();

$pdf->Setx(10);
 $pdf->Cell(33,5,"Hematies",1,0,'L');    
 $pdf->Cell(10,5,'',1,0,'C'); 
$pdf->Setx(53);
 $pdf->Cell(33,5,"Leucocito",1,0,'L'); 
 $pdf->Cell(10,5,'',1,0,'C'); 
$pdf->Ln();

$pdf->Setx(10);
 $pdf->Cell(33,5,"Hemoglobina",1,0,'L');  
 $pdf->Cell(10,5,'',1,0,'C'); 
$pdf->Setx(53);
 $pdf->Cell(33,5,"Hematocrito",1,0,'L');   
$pdf->Cell(10,5,'',1,0,'C');   
$pdf->Ln();

$pdf->Setx(10);
 $pdf->Cell(33,5,"Neutrófilos en cayado",1,0,'L'); 
 $pdf->Cell(10,5,'',1,0,'C'); 
$pdf->Setx(53);
 $pdf->Cell(33,5,"Plaquetas",1,0,'L');     
 $pdf->Cell(10,5,'',1,0,'C'); 
$pdf->Ln();

$pdf->Setx(10);
  $pdf->Cell(33,5,"Eosinofilos",1,0,'L'); 
  $pdf->Cell(10,5,'',1,0,'C'); 
 $pdf->Setx(53);
  $pdf->Cell(33,5,"MCV FL(M80-99,f91-99)",1,0,'L'); 
  $pdf->Cell(10,5,'',1,0,'C'); 
$pdf->Ln();

$pdf->Setx(10);
  $pdf->Cell(33,5,"Basófilos",1,0,'L'); 
  $pdf->Cell(10,5,'',1,0,'C'); 
$pdf->Setx(53);
  $pdf->Cell(33,5,"MCH)",1,0,'L');   
  $pdf->Cell(10,5,'',1,0,'C'); 
$pdf->Ln();

$pdf->Setx(10);
  $pdf->Cell(33,5,"Linfocitos",1,0,'L'); 
  $pdf->Cell(10,5,'',1,0,'C'); 
$pdf->Setx(53);
  $pdf->Cell(33,5,"MCHC g/d1 /MyF 30-35)",1,0,'L');   
  $pdf->Cell(10,5,'',1,0,'C'); 
$pdf->Ln();
$pdf->Setx(10);

  $pdf->Cell(33,5,"Monocitos",1,0,'L'); 
  $pdf->Cell(10,5,'',1,0,'C'); 
$pdf->Setx(53);
$pdf->Cell(33,5,"PLAQUETAS",1,0,'L');
$pdf->Cell(10,5,'',1,0,'C'); 

$pdf->Ln();
$pdf->Setx(10);
$pdf->Cell(33,5,"LEUCOCITOS",1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'C'); 
$pdf->Setx(53);
$pdf->Cell(33,5,"HEMATIES",1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'C'); 
$pdf->Ln();
$pdf->Setx(10);

$pdf->Cell(33,5,"OBSERVACIONES",1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'C'); 
$pdf->Setx(53);

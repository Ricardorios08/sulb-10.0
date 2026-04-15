<?php 
//$pdf->AddPage();

$pdf->Ln();

$sql11="select * from detalle_urocultivo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=utf8_decode($result11->fields["muestra"]);
$color=utf8_decode($result11->fields["color"]);
$aspecto=utf8_decode($result11->fields["aspecto"]);
$sedimento=utf8_decode($result11->fields["sedimento"]);
$reaccion=utf8_decode($result11->fields["reaccion"]);

$en_fresco=utf8_decode($result11->fields["en_fresco"]);
$en_fresco1=utf8_decode($result11->fields["en_fresco1"]);
$gramm=utf8_decode($result11->fields["gramm"]);
$cultivo=utf8_decode($result11->fields["cultivo"]);
$recuento=utf8_decode($result11->fields["recuento"]);

$sensible1=utf8_decode($result11->fields["sensible1"]);
$sensible2=utf8_decode($result11->fields["sensible2"]);
$sensible3=utf8_decode($result11->fields["sensible3"]);
$sensible4=utf8_decode($result11->fields["sensible4"]);
$sensible5=utf8_decode($result11->fields["sensible5"]);
$sensible6=utf8_decode($result11->fields["sensible6"]);

$med_sensible1=utf8_decode($result11->fields["med_sensible1"]);
$med_sensible2=utf8_decode($result11->fields["med_sensible2"]);
$med_sensible3=utf8_decode($result11->fields["med_sensible3"]);
$med_sensible4=utf8_decode($result11->fields["med_sensible4"]);
$med_sensible5=utf8_decode($result11->fields["med_sensible5"]);
$med_sensible6=utf8_decode($result11->fields["med_sensible6"]);

$resistente1=utf8_decode($result11->fields["resistente1"]);
$resistente2=utf8_decode($result11->fields["resistente2"]);
$resistente3=utf8_decode($result11->fields["resistente3"]);
$resistente4=utf8_decode($result11->fields["resistente4"]);
$resistente5=utf8_decode($result11->fields["resistente5"]);
$resistente6=utf8_decode($result11->fields["resistente6"]);
$observaciones=utf8_decode($result11->fields["observaciones"]);
$potencia=utf8_decode($result11->fields["potencia"]);
 $densidad=utf8_decode($result11->fields["densidad"]);

 include ("practica.php");



$tamanio = 10;


$pdf->ln();
$pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio); 
$pdf->Cell(15,5,"Color: ",0);     
  $pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$color,0);
 $pdf->SetFont('Arial','B',$tamanio);


  
$pdf->Cell(20,5,"Densidad:",0); 
  $pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$aspecto,0);  
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(10,5,"pH:",0); 
  $pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(30,5,$sedimento,0); 
 $pdf->SetFont('Arial','B',$tamanio);
//$pdf->Cell(20,5,"Reaccion:",0);  
 // $pdf->SetFont('Arial','',$tamanio);

//$pdf->Cell(30,5,$reaccion,0); 
 //$pdf->SetFont('Arial','B',$tamanio);
$pdf->ln();

$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(50,5,"Observación Microscópica:",0);  
$pdf->ln();
$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(15,5,"Directo: ",0);  
  $pdf->SetFont('Arial','',$tamanio);
 $pdf->MultiCell(150, 5, $en_fresco);
 $pdf->SetFont('Arial','B',$tamanio);

$pdf->ln();
$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(50,5,"Coloración de Gram-Nicolle:",0);  

  $pdf->SetFont('Arial','',$tamanio);
  $pdf->MultiCell(100, 5, $gramm);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->ln();
$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(70,5,"Cultivo:",0); 
 $pdf->SetFont('Arial','',$tamanio);
$pdf->ln();
$pdf->Setx(30);
 
 $pdf->MultiCell(100, 5, $cultivo);
 $pdf->SetFont('Arial','B',$tamanio);
 

$pdf->ln();
$pdf->Setx(30);
$pdf->Cell(50,5,"Recuento de Colonias:",0);  
  $pdf->SetFont('Arial','',$tamanio);

  $pdf->Setx(75);
$pdf->Cell(4,5,$recuento,0); 
$pdf->SetFont('Arial','',6);
$pdf->Cell(5,2,$potencia,0); 
 $pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(70,5,"U.F.C / ml.",0); 
$pdf->SetFont('Arial','',10);

$pdf->AddPage();

$pdf->ln();
$pdf->Setx(30);
$pdf->SetFont('Arial','BI',12);
$pdf->Cell(150,5,'ANTIBIOGRAMA',0,0,'L');
$pdf->ln();

$pdf->ln();
$pdf->SetFont('Arial','B',10);
$pdf->Setx(30);
$pdf->Cell(70,5,"SENSIBLE:",0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();


if ($sensible1 != ''){
$pdf->Setx(30);
$pdf->Cell(70,5,$sensible1,0); 
$pdf->ln();
}


if ($sensible2 != ''){
$pdf->Setx(30);
$pdf->Cell(70,5,$sensible2,0); 
$pdf->ln();
}

if ($sensible3 != ''){
$pdf->Setx(30);
$pdf->Cell(70,5,$sensible3,0); 
$pdf->ln();
}

if ($sensible4 != ''){
$pdf->Setx(30);
$pdf->Cell(70,5,$sensible4,0); 
$pdf->ln();
}

if ($sensible5 != ''){
$pdf->Setx(30);
$pdf->Cell(70,5,$sensible5,0); 
$pdf->ln();
}

if ($sensible6 != ''){
$pdf->Setx(30);
$pdf->Cell(70,5,$sensible6,0);
$pdf->ln();
}



$pdf->ln();
$pdf->Setx(30);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(70,5,"RESISTENTE:",0);  
$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();

if ($resistente1 != ''){
$pdf->Setx(30);
$pdf->Cell(70,5,$resistente1,0); 
$pdf->ln();
}

if ($resistente2 != ''){
$pdf->Setx(30);
$pdf->Cell(70,5,$resistente2,0); 
$pdf->ln();
}

if ($resistente3 != ''){
$pdf->Setx(30);
$pdf->Cell(70,5,$resistente3,0); 
$pdf->ln();
}
if ($resistente4 != ''){
$pdf->Setx(30);
$pdf->Cell(70,5,$resistente4,0); 
$pdf->ln();
}
if ($resistente5 != ''){
$pdf->Setx(30);
$pdf->Cell(70,5,$resistente5,0); 
$pdf->ln();
}
if ($resistente6 != ''){
$pdf->Setx(30);
$pdf->Cell(70,5,$resistente6,0); 
$pdf->ln();
$pdf->ln();
}


IF ($nota != ""){
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(20,6,"Nota:",0);
  $pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(150,6,$observaciones,0);
$pdf->SetFont('Arial','',10);
}


?>
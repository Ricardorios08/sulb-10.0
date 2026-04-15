<?php 
//$pdf->AddPage();
$tamanio = 10;
$pdf->Ln();

$sql11="select * from detalle_antibiograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$sensible1=$result11->fields["sensible1"];
$sensible2=$result11->fields["sensible2"];
$sensible3=$result11->fields["sensible3"];
$sensible4=$result11->fields["sensible4"];
$sensible5=$result11->fields["sensible5"];
$sensible6=$result11->fields["sensible6"];

$med_sensible1=$result11->fields["med_sensible1"];
$med_sensible2=$result11->fields["med_sensible2"];
$med_sensible3=$result11->fields["med_sensible3"];
$med_sensible4=$result11->fields["med_sensible4"];
$med_sensible5=$result11->fields["med_sensible5"];
$med_sensible6=$result11->fields["med_sensible6"];

$resistente1=$result11->fields["resistente1"];
$resistente2=$result11->fields["resistente2"];
$resistente3=$result11->fields["resistente3"];
$resistente4=$result11->fields["resistente4"];
$resistente5=$result11->fields["resistente5"];
$resistente6=$result11->fields["resistente6"];
$observaciones=$result11->fields["observaciones"];
$potencia=$result11->fields["potencia"];


 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];

include ("practica.php");

IF ($observaciones != ""){
$pdf->Setx(30);
 $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(20,6,"",0);
  $pdf->SetFont('Arial','',$tamanio);
$pdf->WRITE(5,$observaciones);
$pdf->SetFont('Arial','',10);
}


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
}


?>
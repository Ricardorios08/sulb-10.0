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

$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'BU',14);
$pdf->Cell(40,5,'ANTIBIOGRAMA');
$pdf->SetFont($letra,'b',10);
$pdf->ln();
$pdf->ln();

$pdf->SetX(30);
$pdf->Cell(70,5,"Sensible a:",0);  
$pdf->ln();

 

   $pdf->SetFont($letra,'',$tamanio);

 $sensible1;
$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(70,5,$sensible1,0); 

$pdf->Cell(70,5,$med_sensible1,0); 

$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(70,5,$sensible2,0); 
$pdf->Cell(70,5,$med_sensible2,0); 

$pdf->ln();
$pdf->SetX(30);

$pdf->Cell(70,5,$sensible3,0); 
$pdf->Cell(70,5,$med_sensible3,0); 

$pdf->ln();
$pdf->SetX(30);
 
$pdf->Cell(70,5,$sensible4,0); 
$pdf->Cell(70,5,$med_sensible4,0); 

$pdf->ln();
$pdf->SetX(30);

$pdf->Cell(70,5,$sensible5,0); 
$pdf->Cell(70,5,$med_sensible5,0); 

$pdf->ln();
$pdf->SetX(30);

$pdf->Cell(70,5,$sensible6,0); 
$pdf->Cell(70,5,$med_sensible6,0); 

$pdf->ln();
$pdf->ln();

$pdf->SetX(30);
$pdf->SetFont($letra,'b',10);
$pdf->Cell(70,5,"Resistente a:",0); 
$pdf->ln();

$pdf->SetFont($letra,'',10);
$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(70,5,$resistente1,0); 
$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(70,5,$resistente2,0); 
$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(70,5,$resistente3,0); 
$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(70,5,$resistente4,0); 
$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(70,5,$resistente5,0); 
$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(70,5,$resistente6,0); 



?>
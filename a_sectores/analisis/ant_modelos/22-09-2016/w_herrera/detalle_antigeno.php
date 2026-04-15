<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_antigeno where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$enzima=strtoupper($result11->fields["enzima"]);
$elisa=strtoupper($result11->fields["elisa"]);
$razon_porcentual=strtoupper($result11->fields["razon_porcentual"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];



 
$pdf->SetX(30);

$pdf->SetFont($letra,'BI',11);
$pdf->Cell(100,5,"ANTIGENO PROSTATICO ESPECIFICO TOTAL",0);     

$pdf->SetX(130);
$pdf->SetFont($letra,'',9);
$pdf->Cell(60,5,"Método: Quimioluminiscencia",0);     
$pdf->Ln(); 
$pdf->Ln(); 

$pdf->SetX(30);
$pdf->SetFont($letra,'',10);
$pdf->Cell(30,5,"Resultado: ");
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$enzima,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"ng/m ",0);
$pdf->Ln(); 


$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(35,30, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);


$columna1 = "50 a 59 años:";
$desde = "Hasta ";
$hasta = 3.90;
$unidad = "ng/ml";
$pdf->SetX(30);
$pdf->Row(array("V.R: ".$columna1, $desde." ".$hasta." ".$unidad ,  $columna2));

$columna1 = "60 a 69 años";
$desde = "Hasta ";
$hasta = 4.90;
$unidad = "ng/ml";
$pdf->SetX(30);
$pdf->Row(array("        ".$columna1, $desde." ".$hasta." ".$unidad ,  $columna2));

$columna1 = "70 a 79 años:";
$desde = "Hasta ";
$hasta = 7.70;
$unidad = "ng/ml";
$pdf->SetX(30);
$pdf->Row(array("        ".$columna1, $desde." ".$hasta." ".$unidad ,  $columna2));

////////////
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'BI',11);
$pdf->Cell(100,5,"ANTIGENO PROSTATICO ESPECIFICO LIBRE",0); 
$pdf->SetX(130);
$pdf->SetFont($letra,'',9);
$pdf->Cell(60,5,"Método: Quimioluminiscencia",0);     
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',10);
$pdf->Cell(30,5,"Resultado: ");
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$elisa,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"ng/ml ",0);

$pdf->Ln(); 
$pdf->SetX(30);
$pdf->SetFont($letra,'',10);
$pdf->Cell(30,5,"Razón Porcentual: ");
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$razon_porcentual,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,"% ",0);

$pdf->Ln(); 


$desde = 0.30;
$hasta = 1.40;
$unidad = "ng/ml";
$columna1 = "";
 

$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(35,30, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->SetX(30);
$pdf->Row(array("V.R: ".$columna1, $desde." - ".$hasta." ".$unidad ,  $columna2));




$pdf->Ln(); 

$pdf->Ln(); 


/////////////////////////////

if ($observaciones != ""){
 $pdf->SetX(30);
$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 
}


?>
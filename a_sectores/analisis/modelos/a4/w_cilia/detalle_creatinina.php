<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_clearence where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$creatinemia=strtoupper($result11->fields["creatinemia"]);
$creatinuria=strtoupper($result11->fields["creatinuria"]);

$diuresis=strtoupper($result11->fields["diuresis"]);
$sup_corporal=strtoupper($result11->fields["sup_corporal"]);

$clearence=strtoupper($result11->fields["clearence"]);

$volumen =strtoupper($result11->fields["volumen"]);
$observaciones =strtoupper($result11->fields["observaciones"]);


list($precio_entero,$precio_decimal) = explode(".",$creatinuria);
$creatinuria = $precio_entero.",".$precio_decimal;

list($precio_entero,$precio_decimal) = explode(".",$creatinemia);
$creatinemia = $precio_entero.",".$precio_decimal;

list($precio_entero,$precio_decimal) = explode(".",$diuresis);
$diuresis = $precio_entero.",".$precio_decimal;

list($precio_entero,$precio_decimal) = explode(".",$sup_corporal);
$sup_corporal = $precio_entero.",".$precio_decimal;

 include ("practica.php");

$tamanio = 9;




$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,"Creatinemia:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$creatinemia,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,"mg/dl",0);  
$pdf->ln();
$pdf->ln();
 


$pdf->Cell(20,5,"Creatinuria:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$creatinuria,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,"g/l.",0);  
$pdf->ln();
 
$pdf->ln();

$pdf->Cell(20,5,"Diuresis:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$diuresis,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,"lts.",0);  
$pdf->ln();
$pdf->ln();

if ($sup_corporal > 0){
$pdf->Cell(50,5,"Superfice corporal corregida:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(15,5,$sup_corporal,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"'m²",0);  
$pdf->ln();
$pdf->ln();
}

$pdf->Cell(30,5,"Volumen minuto:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$volumen,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,"ml/min.",0);  
$pdf->ln();
$pdf->ln();


$pdf->Cell(40,5,"Clearence de creatininia",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$clearence,0);
$pdf->SetFont($letra,'',$tamanio);


if ($sup_corporal > 0){
$pdf->Cell(20,5,"ml/min por 1.73 m²",0);  
}else{
$pdf->Cell(20,5,"ml/min",0);  
}

 
$pdf->ln();
$pdf->ln();
?>
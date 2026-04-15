<?php 
 $contador;



$pdf->Ln();

 $sql11="select * from detalle_clearence where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$creatinemia=utf8_decode(strtoupper($result11->fields["creatinemia"]));
$creatinuria=utf8_decode(strtoupper($result11->fields["creatinuria"]));

$diuresis=utf8_decode(strtoupper($result11->fields["diuresis"]));
$sup_corporal=utf8_decode(strtoupper($result11->fields["sup_corporal"]));

$clearence=utf8_decode(strtoupper($result11->fields["clearence"]));


$observaciones =utf8_decode(strtoupper($result11->fields["observaciones"]));


list($precio_entero,$precio_decimal) = explode(".",$creatinuria);
$creatinuria = $precio_entero.",".$precio_decimal;

list($precio_entero,$precio_decimal) = explode(".",$creatinemia);
$creatinemia = $precio_entero.",".$precio_decimal;

list($precio_entero,$precio_decimal) = explode(".",$diuresis);
$diuresis = $precio_entero.",".$precio_decimal;

list($precio_entero,$precio_decimal) = explode(".",$sup_corporal);
$sup_corporal = $precio_entero.",".$precio_decimal;

 include ("practica.php");

$tamanio = 10;


$pdf->Setx(30);

$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(30,5,"Creatinemia:",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$creatinemia." mg/l",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->ln();
 $pdf->Setx(70);
$pdf->Cell(20,5,"VR: 8 - 14 mg/l",0);  
$pdf->ln();
$pdf->ln();
 $pdf->Setx(30);

$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(30,5,"Creatinuria:",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$creatinuria." g/24hs",0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->ln();
 $pdf->Setx(70);
$pdf->Cell(20,5,"VR: 0.9 - 1.5 g/24hs",0);  
$pdf->ln();
 
$pdf->ln();
$pdf->Setx(30);

$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(30,5,"Diuresis:",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$diuresis." lts",0);
$pdf->SetFont($letra,'',$tamanio);
 
$pdf->ln();
$pdf->ln();
$pdf->Setx(30);


if ($sup_corporal > 0){
	$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(55,5,"Superfice corporal corregida:",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(12,5,$sup_corporal." m²" ,0);
$pdf->SetFont($letra,'',$tamanio);
 
$pdf->ln();
$pdf->ln();

}


/*
$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(30,5,"Volumen minuto:",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$volumen,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,"ml/min.",0);  
$pdf->ln();
$pdf->ln();
*/


$pdf->Setx(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(45,5,"Clearence de creatininia: ",0);  
$pdf->SetFont($letra,'',$tamanio);

$pdf->SetFont($letra,'',$tamanio);

if ($sup_corporal > 0){
	$pdf->Cell(20,5,$clearence." ml/min",0);
$pdf->ln();
$pdf->Setx(70);
$pdf->Cell(20,5,"VR: 80 - 140 ml/min",0);  
}else{

$pdf->Cell(20,5,$clearence." ml/min",0);  
$pdf->ln();
$pdf->Setx(70);
$pdf->Cell(20,5,"VR: 80 - 140 ml/min",0);  

}

 
$pdf->ln();
 


$pdf->ln();
?>
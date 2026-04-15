<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_proteinura where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=utf8_decode(strtoupper($result11->fields["diuresis"]));
$valor_hallado=utf8_decode(strtoupper($result11->fields["valor_hallado"]));
$observaciones =utf8_decode(strtoupper($result11->fields["observaciones"]));

list($precio_entero,$precio_decimal) = explode(".",$diuresis));
$diuresis = $precio_entero.",".$precio_decimal;

list($precio_entero,$precio_decimal) = explode(".",$valor_hallado);
$valor_hallado = $precio_entero.",".$precio_decimal;

 


include ("practica.php");

   
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);

$pdf->Cell(17,5,"Diuresis: ",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$diuresis,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,"ml",0);  
$pdf->ln();
$pdf->ln();
$pdf->SetX(30);
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(20,5,"V. Hallado: ",0);  
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$valor_hallado,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,$unidad,0);  
$pdf->ln();
$pdf->ln();
$pdf->SetX(30);

$sql11="select * from convenio_referencia where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

if ($desde == 0.00){
$desde = "Hasta ";
}else{
$desde = $desde." - ";
}
 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(90));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->SetX(60);
$pdf->Row(array("V.R ".$columna1." ".$desde.' '.$hasta." ".$unidad." ".$columna2));
$pdf->ln();




 



$pdf->ln();
$pdf->Ln();

IF ($observaciones != ""){
	$pdf->SetX(30);
$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 
}



?>
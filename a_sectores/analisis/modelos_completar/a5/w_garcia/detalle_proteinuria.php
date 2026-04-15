<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_proteinura where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=strtoupper($result11->fields["diuresis"]);
$valor_hallado=strtoupper($result11->fields["valor_hallado"]);
$observaciones =strtoupper($result11->fields["observaciones"]);

list($precio_entero,$precio_decimal) = explode(".",$diuresis);
$diuresis = $precio_entero.",".$precio_decimal;

list($precio_entero,$precio_decimal) = explode(".",$valor_hallado);
$valor_hallado = $precio_entero.",".$precio_decimal;


 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];

include ("practica.php");

  
$tamanio1 = 8;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"Diurésis ",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$diuresis,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,'lts.',0);
$pdf->Ln(); 
$pdf->ln();

$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"V. Hallado: ",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$valor_hallado,0); 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,'g/24 hs',0);
$pdf->Ln(); 
$pdf->Cell(10,5,'',0);
$pdf->Ln(); 
$pdf->ln();
/*$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 

  */

$pdf->ln();
 
?>
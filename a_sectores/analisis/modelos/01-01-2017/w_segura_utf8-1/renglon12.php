<?php
  if (($renglon12_4 != '') || ($valor12 != '') || ($renglon12_2 != '')){
switch ($renglon12_4){
case "1":{
	//$pdf->Cell(80,5,$renglon12." ".$valor12." ".$renglon12_2,0,0,L);
	 $pdf->SetX(37);$pdf->Cell(45,5,$renglon12,0,0,C);
	 $pdf->SetFont($letra,'B',10);
	$pdf->Cell(45,5,$valor12." ".$renglon12_2,0,0,L,false);$pdf->SetFont($letra,'',10);
	break;}
case "4":{ $pdf->SetFont($letra,$renglon_tipo_letra_12,9);$pdf->Cell(80,5,$renglon12." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon12,0,0,'C',false);include("cambiar_color_normal.php");break;}
case "6":{$pdf->Cell(80,5,$renglon12." ".$valor12." ".$renglon12_2,0,0,L);break;}
}

 $pdf->SetFont($letra,$renglon_tipo_letra_12,9);
$pdf->Cell(80,5,$renglon12_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
}
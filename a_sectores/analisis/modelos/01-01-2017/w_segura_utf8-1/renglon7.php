<?php
  if (($renglon7_4 != '') || ($valor7 != '') || ($renglon7_2 != '')){
switch ($renglon7_4){
case "1":{
	//$pdf->Cell(80,5,$renglon7." ".$valor7." ".$renglon7_2,0,0,L);
	 $pdf->SetX(37);$pdf->Cell(45,5,$renglon7,0,0,C);
	 $pdf->SetFont($letra,'B',10);
	$pdf->Cell(45,5,$valor7." ".$renglon7_2,0,0,L,TRUE);$pdf->SetFont($letra,'',10);
break;}
case "4":{ $pdf->SetFont($letra,$renglon_tipo_letra_7,9);$pdf->Cell(80,5,$renglon7." ".'',0,0,L);break;}
case "5":{include("cambiar_color.php");$pdf->Cell(160,5,$renglon7,0,0,'C',true);include("cambiar_color_normal.php");break;}
case "6":{$pdf->Cell(80,5,$renglon7." ".$valor7." ".$renglon7_2,0,0,L);break;}
}

 $pdf->SetFont($letra,$renglon_tipo_letra_7,9);
$pdf->Cell(80,5,$renglon7_3);
 $pdf->SetFont($letra,'',10);
$pdf->ln(); 
$pdf->SetX(30);
}
<?php
switch ($renglon13_4){
case "1":{$pdf->Cell(80,6,$renglon13." ".$valor13." ".$renglon13_2,0,0,L);break;}
case "4":{$pdf->Cell(80,6,$renglon13." ".'',0,0,L);break;}
}
$pdf->Cell(80,6,$renglon13_3);
$pdf->ln(); 
$pdf->SetX(30);
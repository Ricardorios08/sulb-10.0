<?php
switch ($renglon8_4){
case "1":{$pdf->Cell(80,6,$renglon8." ".$valor8." ".$renglon8_2,0,0,L);break;}
case "4":{$pdf->Cell(80,6,$renglon8." ".'',0,0,L);break;}
}
$pdf->Cell(80,6,$renglon8_3);
$pdf->ln(); 
$pdf->SetX(30);
<?php
switch ($renglon15_4){
case "1":{$pdf->Cell(80,6,$renglon15." ".$valor15." ".$renglon15_2,0,0,L);break;}
case "4":{$pdf->Cell(80,6,$renglon15." ".'',0,0,L);break;}
}
$pdf->Cell(80,6,$renglon15_3);
$pdf->ln(); 
$pdf->SetX(30);
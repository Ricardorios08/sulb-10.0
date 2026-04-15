<?php
switch ($renglon1_4){
case "1":{$pdf->Cell(80,6,$renglon1." ".$valor1." ".$renglon1_2,0,0,L);break;}
case "4":{$pdf->Cell(80,6,$renglon1." ".'',0,0,L);break;}
}
$pdf->Cell(80,6,$renglon1_3);
$pdf->ln(); 
$pdf->SetX(30);

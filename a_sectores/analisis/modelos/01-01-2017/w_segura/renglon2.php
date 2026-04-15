<?php
switch ($renglon2_4){
case "1":{$pdf->Cell(80,6,$renglon2." ".$valor2." ".$renglon2_2,0,0,L);break;}
case "4":{$pdf->Cell(80,6,$renglon2." ".'',0,0,L);break;}
}
$pdf->Cell(80,6,$renglon2_3);
$pdf->ln(); 
$pdf->SetX(30);

<?php
switch ($renglon12_4){
case "1":{$pdf->Cell(80,6,$renglon12." ".$valor12." ".$renglon12_2,0,0,L);break;}
case "4":{$pdf->Cell(80,6,$renglon12." ".'',0,0,L);break;}
}
$pdf->Cell(80,6,$renglon12_3);
$pdf->ln(); 
$pdf->SetX(30);

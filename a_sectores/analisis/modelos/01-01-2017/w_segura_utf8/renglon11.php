<?php
switch ($renglon11_4){
case "1":{$pdf->Cell(80,6,$renglon11." ".$valor11." ".$renglon11_2,0,0,L);break;}
case "4":{$pdf->Cell(80,6,$renglon11." ".'',0,0,L);break;}
}
$pdf->Cell(80,6,$renglon11_3);
$pdf->ln(); 
$pdf->SetX(30);
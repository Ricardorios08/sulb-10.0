<?php
switch ($renglon5_4){
case "1":{$pdf->Cell(80,6,$renglon5." ".$valor5." ".$renglon5_2,0,0,L);break;}
case "4":{$pdf->Cell(80,6,$renglon5." ".'',0,0,L);break;}
}
$pdf->Cell(80,6,$renglon5_3);
$pdf->ln(); 
$pdf->SetX(30);
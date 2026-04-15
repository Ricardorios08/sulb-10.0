<?php
switch ($renglon6_4){
case "1":{$pdf->Cell(80,6,$renglon6." ".$valor6." ".$renglon6_2,0,0,L);break;}
case "4":{$pdf->Cell(80,6,$renglon6." ".'',0,0,L);break;}
}
$pdf->Cell(80,6,$renglon6_3);
$pdf->ln(); 
$pdf->SetX(30);
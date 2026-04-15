<?php
switch ($renglon4_4){
case "1":{$pdf->Cell(80,6,$renglon4." ".$valor4." ".$renglon4_2,0,0,L);break;}
case "4":{$pdf->Cell(80,6,$renglon4." ".'',0,0,L);break;}
}
$pdf->Cell(80,6,$renglon4_3);
$pdf->ln(); 
$pdf->SetX(30);
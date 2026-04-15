<?php
switch ($renglon10_4){
case "1":{$pdf->Cell(80,6,$renglon10." ".$valor10." ".$renglon10_2,0,0,L);break;}
case "4":{$pdf->Cell(80,6,$renglon10." ".'',0,0,L);break;}
}
$pdf->Cell(80,6,$renglon10_3);
$pdf->ln(); 
$pdf->SetX(30);
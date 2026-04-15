<?php
	switch ($renglon3_4){
case "1":{$pdf->Cell(80,6,$renglon3." ".$valor3." ".$renglon3_2,0,0,L);break;}
case "4":{$pdf->Cell(80,6,$renglon3." ".'',0,0,L);break;}
}
$pdf->Cell(80,6,$renglon3_3);
$pdf->ln(); 
$pdf->SetX(30);

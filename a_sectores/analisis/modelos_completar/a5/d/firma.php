<?php 

$pdf->AddPage();
$pdf->SetY(50);
$pdf->SetX(50);
$pdf->SetFont('TIMES','BI',16);


$dia1 = SUBSTR($fecha_grabacion,8,2);
$mes1 = SUBSTR($fecha_grabacion,5,2);
$anio1 = SUBSTR($fecha_grabacion,0,4);

//$fecha_grabacion = $dia1."/".$mes1."/".$anio1;

switch ($mes1){
case "01":{$periodo = "Enero";BREAK;}
case "02":{$periodo = "Febrero";BREAK;}
case "03":{$periodo = "Marzo";BREAK;}
case "04":{$periodo = "Abril";BREAK;}
case "05":{$periodo = "Mayo";BREAK;}
case "06":{$periodo = "Junio";BREAK;}
case "07":{$periodo = "Julio";BREAK;}
case "08":{$periodo = "Agosto";BREAK;}
case "09":{$periodo = "Septiembre";BREAK;}
case "10":{$periodo = "Octubre";BREAK;}
case "11":{$periodo = "Noviembre";BREAK;}
case "12":{$periodo = "Diciembre";BREAK;}


}

$pdf->SetX(60);
$pdf->SetY(100);
$pdf->Cell(50,5,'Mendoza, '.$dia1. ' de '.$periodo. ' de '.$anio1);
//$pdf->Image('../../../logos/5x3 freixas.jpg',80,15,50);

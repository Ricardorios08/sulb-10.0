<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_proteino where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$albumina=strtoupper($result11->fields["albumina"]);
$alfa1=strtoupper($result11->fields["alfa1"]);
$alfa2=strtoupper($result11->fields["alfa2"]);
$beta=strtoupper($result11->fields["beta"]);
$beta2=strtoupper($result11->fields["beta2"]);
$gamma=strtoupper($result11->fields["gamma"]);
$relacion_ag=strtoupper($result11->fields["relacion_ag"]);
$proteinas_totales=strtoupper($result11->fields["proteinas_totales"]);
$observaciones =$result11->fields["observaciones"];
$observaciones1 =$result11->fields["observaciones1"];
$globulina =strtoupper($result11->fields["globulina"]);

$uni_albumina =strtoupper($result11->fields["uni_albumina"]);
$uni_globulina =strtoupper($result11->fields["uni_globulina"]);
$uni_alfa1 =strtoupper($result11->fields["uni_alfa1"]);
$uni_alfa2 =strtoupper($result11->fields["uni_alfa2"]);
$uni_beta =strtoupper($result11->fields["uni_beta"]);
$uni_gamma =strtoupper($result11->fields["uni_gamma"]);
$uni_relacion_ag =strtoupper($result11->fields["uni_relacion_ag"]);
$uni_totales =strtoupper($result11->fields["uni_totales"]);

 
$globulina = $alfa1 + $alfa2 + $beta + $beta2 + $gamma;


include ("practica.php");


$tamanio = 9;



 

$unidad = "g/dl "; 
$vr = "V.R: 6.6 ".$unidad." - 8.0 ".$unidad; 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,10,"PROTEINAS TOTALES",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,10,$proteinas_totales,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,10,$unidad,0); 
$pdf->Cell(45,10,$vr,0);



$pdf->ln();
$pdf->ln();



$unidad = "g/dl ";
$vr = "V.R: 3.39 ".$unidad." - 4.63 ".$unidad; 
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,10,"Albumina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,10,$albumina,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,10,$unidad,0); 
$pdf->Cell(45,10,$vr,0);


$pdf->ln();


$unidad = "g/dl ";
$vr = "";
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,10,"Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,10,$globulina,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,10,$unidad,0); 
$pdf->Cell(45,10,$vr,0);

$pdf->ln();

$unidad = "g/dl ";
$vr = "V.R: 0.18 ".$unidad." - 0.44".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,10,"Alfa 1 Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,10,$alfa1,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,10,$unidad,0); 
$pdf->Cell(45,10,$vr,0);
$pdf->ln();


$unidad = "g/dl ";
$vr = "V.R: 0.50 ".$unidad." - 0.95".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,10,"Alfa 2 Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,10,$alfa2,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,10,$unidad,0); 
$pdf->Cell(45,10,$vr,0);

$pdf->ln();


$unidad = "g/dl ";
$vr = "V.R: 0.32 ".$unidad." - 0.54".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,10,"Beta 1 Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,10,$beta,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,10,$unidad,0); 
$pdf->Cell(45,10,$vr,0);

$pdf->ln();

$unidad = "g/dl ";
$vr = "V.R: 0.20 ".$unidad." - 0.46".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,10,"Beta 2 Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,10,$beta2,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,10,$unidad,0); 
$pdf->Cell(45,10,$vr,0);
$pdf->ln();


$unidad = "g/dl ";
$vr = "V.R: 0.61 ".$unidad." - 1.66".$unidad;
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,10,"Gamma Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,10,$gamma,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,10,$unidad,0); 
$pdf->Cell(45,10,$vr,0);

$pdf->ln();
 
 
$unidad = "";
$vr = "";
$todo = $unidad.$vr.$unidad;
$res = round(($albumina / $globulina),2);
 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,10,"Relacion A/G",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,10,$res,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,10,$unidad,0); 
$pdf->SetX(100);
$pdf->Cell(50,10,$vr,0);  
$pdf->ln();


 





/////////////////////////////

$pdf->Ln();

$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Ln();
 
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(60,6,$observaciones,0);
$pdf->Ln();
$pdf->Cell(60,6,$observaciones1,0);

?>
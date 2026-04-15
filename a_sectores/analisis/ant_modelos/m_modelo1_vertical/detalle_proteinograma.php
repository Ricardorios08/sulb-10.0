<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_proteino where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$proteinas_totales=strtoupper($result11->fields["proteinas_totales"]);
 $albumina=strtoupper($result11->fields["albumina"]);
$alfa1=strtoupper($result11->fields["alfa1"]);
$alfa2=strtoupper($result11->fields["alfa2"]);
$beta=strtoupper($result11->fields["beta"]);
$gamma=strtoupper($result11->fields["gamma"]);




$globulina = $alfa1 + $alfa2 + $beta + $gamma;
//$albumina = $proteinas_totales - $globulina;
$relacion = round(($albumina / $globulina),2);



$prote = $albumina + $globulina;
$prote = str_pad($prote, 2, "0", STR_PAD_LEFT); 
if ($prote != $proteinas_totales){
	ECHO $prote;
	echo "-";
	echo $proteinas_totales;

	$leyenda = "NO COINCIDEN DATOS DE PROTEINAS TOTALES";
include ("../../../alertas/campo_informacion2.php");
exit;

}

include ("practica.php");


$tamanio = 10;
$letra = 'ARIAL';



 $pdf->ln();

$unidad = "g/l "; 
$vr = "V.R: 60.00 - 80.00 "; 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"PROTEINAS TOTALES",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$proteinas_totales,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(35,5,$vr,0);
$pdf->Cell(10,5,$unidad,0); 



$pdf->ln();





 


$unidad = "g/l ";
$vr = "V.R: 33.90 - 46.30 "; 
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Albumina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$albumina,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(35,5,$vr,0);
$pdf->Cell(10,5,$unidad,0); 



$pdf->ln();



$res_gl_g =round(($globulina * $proteinas_totales) / 100,2);
$res_porc_g = $globulina;

$unidad = "g/l ";
$vr = "V.R: 23.80 – 33.60";
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$globulina,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(35,5,$vr,0);
$pdf->Cell(10,5,$unidad,0); 


$pdf->ln();





//////


$res_gl =round(($alfa1 * $proteinas_totales) / 100,2);
$res_porc = $alfa1;

$unidad = "g/l ";
$vr = "V.R: 1.80 - 4.40 ";
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Alfa 1 Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$alfa1,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(35,5,$vr,0);
$pdf->Cell(10,5,$unidad,0); 


$pdf->ln();



$res_gl =round(($alfa2 * $proteinas_totales) / 100,2);
$res_porc = $alfa2;

$unidad = "g/l ";
$vr = "V.R: 5.00 - 9.50";
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Alfa 2 Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$alfa2,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(35,5,$vr,0);
$pdf->Cell(10,5,$unidad,0); 

$pdf->ln();



$res_gl =round(($beta * $proteinas_totales) / 100,2);
$res_porc = $beta;

$unidad = "g/l ";
$vr = "V.R: 5.20 - 10.00 ";
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Beta Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$beta,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(35,5,$vr,0);
$pdf->Cell(10,5,$unidad,0); 

$pdf->ln();



$res_gl =round(($gamma * $proteinas_totales) / 100,2);
$res_porc = $gamma;

$unidad = "g/l ";
$vr = "V.R: 6.10 - 16.60 ";
$todo = $unidad.$vr.$unidad;
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Gamma Globulina",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$gamma,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->Cell(35,5,$vr,0);
$pdf->Cell(10,5,$unidad,0); 


$pdf->ln();


  
 
$unidad = "";
$vr = "V.R: 1.20 - 2.20";
$todo = $unidad.$vr.$unidad;
$res = round(($res_gl_a / $res_porc_g),2);
 
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(40,5,"Relacion A/G",0);     
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(12,5,$relacion,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(10,5,$unidad,0); 
$pdf->SetX(72);
$pdf->Cell(50,5,$vr,0);  
$pdf->ln();



/////////////////////////////

$pdf->Ln();
$pdf->Ln();

$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Ln();
 
 $pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(60,6,$observaciones,0);
$pdf->Ln();
$pdf->Cell(60,6,$observaciones1,0);

?>
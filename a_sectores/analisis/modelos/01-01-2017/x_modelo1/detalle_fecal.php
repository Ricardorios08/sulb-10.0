<?php 
//$pdf->AddPage();
$letra = "ARIAL";
$pdf->Ln();

 $sql11="select * from detalle_fecal_373 where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$consistencia =$result11->fields["consistencia"];
$forma=$result11->fields["forma"];
$externo=$result11->fields["externo"];
$interno=$result11->fields["interno"];
$mucus=$result11->fields["mucus"];
$mucoides=$result11->fields["mucoides"];
$mucomembranas=$result11->fields["mucomembranas"];
$pus=$result11->fields["pus"];
$sangre=$result11->fields["sangre"];
$conjuntivo=$result11->fields["conjuntivo"];
$carne=$result11->fields["carne"];
$feculentos=$result11->fields["feculentos"];
$grasos=$result11->fields["grasos"];
$otros=$result11->fields["otros"];
$bien_digeridas=$result11->fields["bien_digeridas"];
$mal_digeridas=$result11->fields["mal_digeridas"];
$acumulos=$result11->fields["acumulos"];
$libre=$result11->fields["libre"];
$grasas=$result11->fields["grasas"];
$acidos=$result11->fields["acidos"];
$jabones=$result11->fields["jabones"];
$almidon_incluido=$result11->fields["almidon_incluido"];
$almidon_amorfo=$result11->fields["almidon_amorfo"];
$almidon_crudo=$result11->fields["almidon_crudo"];
$celulosa_digestible=$result11->fields["celulosa_digestible"];
$celulosa_indigestible=$result11->fields["celulosa_indigestible"];
$cristales=$result11->fields["cristales"];
$moco=$result11->fields["moco"];
$pus_int=$result11->fields["pus_int"];
$sangre_int=$result11->fields["sangre_int"];
$reaccion=$result11->fields["reaccion"];
$bilirubina=$result11->fields["bilirubina"];
$estercobilina=$result11->fields["estercobilina"];
$acidos_organicos=$result11->fields["acidos_organicos"];
$amoniaco=$result11->fields["amoniaco"];
$mucina=$result11->fields["mucina"];
$proteinas=$result11->fields["proteinas"];
$albumosas=$result11->fields["albumosas"];
$flora=$result11->fields["flora"];
$criterio=$result11->fields["criterio"];
$peptonas=$result11->fields["peptonas"];

include ("practica.php");




$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(45,5,"Examen Exterior",0); 
 
$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Consistencia:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$consistencia,0);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Forma:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$forma,0);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Color Externo:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$externo,0);


$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Color Interno:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$interno,0);
$pdf->SetFont($letra,'',$tamanio);


$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(65,5,"Exámen Macroscópico. Residuos intestinales",0); 

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Mucus Amorfo:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$mucus,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Agregados mucoides:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$mucoides,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Mucomembranas:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$mucomembranas,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Pus en materia fecal:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$pus,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Sangre:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$sangre,0);
$pdf->SetFont($letra,'',$tamanio);



$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(65,5,"Exámen Macroscópico. Residuos alimenticios",0); 

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Tejido conjuntivo:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$conjuntivo,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Carne:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$carne,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Feculentos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$feculentos,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Residuos grasos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$grasos,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Otros residuos vegetales:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$otros,0);
$pdf->SetFont($letra,'',$tamanio);



$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(65,5,"Exámen Macroscópico. Restos de origen animal",0); 

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Fibras bien digeridas:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$bien_digeridas,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Fibras mal digeridas:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$mal_digeridas,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Acúmulos de fibras:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$acumulos,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Tej conjuntivo libre:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$libre,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Grasas neutras:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$grasas,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Acidos grasos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$acidos,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Jabones:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$jabones,0);
$pdf->SetFont($letra,'',$tamanio);



$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(65,5,"Exámen Macroscópico. Restos de origen vegetal",0); 

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Almidon incluido:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$almidon_incluido,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Almidon amorfo:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$almidon_amorfo,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Almidon crudo:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$almidon_crudo,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Celulosa digestible:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$celulosa_digestible,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Celulosa indigestible:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$celulosa_indigestible,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Cristales:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$cristales,0);
$pdf->SetFont($letra,'',$tamanio);



$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(65,5,"Exámen Macroscópico. Residuos intestinales",0); 

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Moco:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$moco,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Pus en materia fecal:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$pus_int,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Sangre:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$sangre_int,0);
$pdf->SetFont($letra,'',$tamanio);


$pdf->AddPage();
$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(65,5,"Exámen Quimico Fecal",0); 

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Reacción de la materia fecal:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$reaccion,0);
$pdf->SetFont($letra,'',$tamanio);


$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Bilirubina:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$bilirubina,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Estercobilina:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$estercobilina,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Acidos organicos totales:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$acidos_organicos." ml %",0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Amoníaco y derivados:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$amoniaco." ml %",0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Mucina:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$mucina,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Proteínas:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$proteinas,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Albumosas:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$albumosas,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Peptonas:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$peptonas,0);
$pdf->SetFont($letra,'',$tamanio);


$pdf->ln();
$pdf->SetX(30);
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(65,5,"Exámen Bacterioscópico",0); 

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Flora iodófila:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$flora,0);
$pdf->SetFont($letra,'',$tamanio);

$pdf->ln();
$pdf->SetX(50);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(65,5,"Criterio global de la flora:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$criterio,0);
$pdf->SetFont($letra,'',$tamanio);


?>
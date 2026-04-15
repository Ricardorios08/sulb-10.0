<?php 
//$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_espermo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$volumen=$result11->fields["volumen"];
$aspecto=$result11->fields["aspecto"];
$viscocidad=$result11->fields["viscocidad"];
$reaccion=$result11->fields["reaccion"];
$ph=$result11->fields["ph"];
$licuacion=$result11->fields["licuacion"];
$directo=$result11->fields["directo"];
$citomorfologico=$result11->fields["citomorfologico"];
$espermios_ml=$result11->fields["espermios_ml"];
$espermios_vol_eyaculado=$result11->fields["espermios_vol_eyaculado"]; 
$espermios_ovales=$result11->fields["espermios_ovales"];
$megaloespermas=$result11->fields["megaloespermas"];
$piriformes=$result11->fields["piriformes"];
$microespermas=$result11->fields["microespermas"];
$celulas_duplicadas=$result11->fields["celulas_duplicadas"];
$amorfo=$result11->fields["amorfo"];
$leucocitos=$result11->fields["leucocitos"];
$piocitos=$result11->fields["piocitos"];
$celulas_planas=$result11->fields["celulas_planas"];
$conglomerado_espermios=$result11->fields["conglomerado_espermios"]; 
$motilidad=$result11->fields["motilidad"];
$formas_moviles=$result11->fields["formas_moviles"];
$formas_inmoviles=$result11->fields["formas_inmoviles"];
$tipo_movilidad=$result11->fields["tipo_movilidad"];
$desplazamiento_rapido=$result11->fields["desplazamiento_rapido"];
$desplazamiento_lento=$result11->fields["desplazamiento_lento"];
$desplazamiento_muy_lento=$result11->fields["desplazamiento_muy_lento"];
$eosina_negativa=$result11->fields["eosina_negativa"];
$eosina_positiva=$result11->fields["eosina_positiva"];
$metileno=$result11->fields["metileno"]; 
$fructosa=$result11->fields["fructosa"];
$citrico=$result11->fields["citrico"];

$ascorbico=$result11->fields["ascorbico"];
$ascorbicos_analogos=$result11->fields["ascorbicos_analogos"];
$analogos=$result11->fields["analogos"];
$real=$result11->fields["real"];
$fosfatasa=$result11->fields["fosfatasa"];
$glicerilfosforilcolina=$result11->fields["glicerilfosforilcolina"];
$otros_elementos=$result11->fields["otros_elementos"];



include ("practica.php");




$pdf->SetFont($letra,'BIU',$tamanio);
$pdf->Cell(80,5,"EXAMEN FISICO",0);  
$pdf->ln();
$pdf->SetFont($letra,'',$tamanio);


$pdf->Cell(100,5,"Volumen:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$volumen,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"mL",0);  
$pdf->ln();

$pdf->Cell(100,5,"Aspecto:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$aspecto,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(100,5,"Viscocidad:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$viscocidad,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(100,5,"Reaccion:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$reaccion,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(100,5,"pH:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$ph,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(100,5,"Velocidad de licuación:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$licuacion,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();
$pdf->ln();

$pdf->SetFont($letra,'BIU',$tamanio);
$pdf->Cell(80,5,"EXAMEN MICROSCÓPICO",0);  
$pdf->ln();
$pdf->SetFont($letra,'',$tamanio);

$pdf->Cell(100,5,"Examen Directo:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$directo,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(100,5,"Examen Citomorfologico:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$citomorfologico,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(100,5,"Espermios por mL:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$espermios,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(100,5,"Espermios en el volumen eyaculado:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$espermios_vol_eyaculado,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(100,5,"Espermios ovales (normales):",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$espermios_ovales,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();

$pdf->Cell(100,5,"Megaloespermas (gigantes):",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$megaloespermas,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();

$pdf->Cell(100,5,"Piriformes:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$priformes,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();

$pdf->Cell(100,5,"Microespermas:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$microespermas,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();

$pdf->Cell(100,5,"Celulas duplicadas:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$celulas_duplicadas,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();

$pdf->Cell(100,5,"Grupo amorfo:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$amorfo,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();

$pdf->Cell(100,5,"Otros elementos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$otros_elementos,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(100,5,"Leucocitos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$leucocitos,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(100,5,"Piocitos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$piocitos,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(100,5,"Celulas planas:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$celulas_planas,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(100,5,"Conglomerados de espermios:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$conglomerado_espermios,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();
$pdf->ln();

$pdf->AddPage();
$contador = 20;


$pdf->SetFont($letra,'BIU',$tamanio);
$pdf->Cell(80,5,"EXAMEN DE LA DINAMICA ESPERMATICA:",0);  
$pdf->ln();
$pdf->SetFont($letra,'',$tamanio);


$pdf->Cell(100,5,"Motilidad:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$motilidad,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(100,5,"Formas moviles:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$formas_moviles,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();

$pdf->Cell(100,5,"Formas inmóviles:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$formas_inmoviles,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();

$pdf->Cell(100,5,"Tipo de movilidad:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$tipo_movilidad,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(100,5,"Desplazamiento rápido:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$desplazamiento_rapido,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();

$pdf->Cell(100,5,"Desplazamiento lento:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$desplazamiento_lento,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();

$pdf->Cell(100,5,"Desplazamiento muy lento:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$desplazamiento_muy_lento,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();

$pdf->Cell(100,5,"Inmoviles: Grado 0 eosina(-):",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$eosina_negativa,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();

$pdf->Cell(100,5,"             Necrosados eosina (+):",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$eosina_positiva,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(50,5,"%",0);  
$pdf->ln();
$pdf->ln();


$pdf->SetFont($letra,'BIU',$tamanio);
$pdf->Cell(80,5,"EXAMEN QUIMICO DEL PLASMA SEMINAL:",0);  
$pdf->ln();
$pdf->SetFont($letra,'',$tamanio);
 

$pdf->Cell(100,5,"Prueba de reducción del azul de metileno:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$metileno,0);
$pdf->SetFont($letra,'',$tamanio);
 
$pdf->ln();

$pdf->Cell(100,5,"Fructosa:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$fructosa,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,'mg% (255.0 - 275.0 mg%)',0); 
 
$pdf->ln();

$pdf->Cell(100,5,"Acido cítrico:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$citrico,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,'mg% (410.0 - 440.0 mg%)',0); 

$pdf->ln();

$pdf->Cell(100,5,"Acido ascórbico:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$ascorbicos,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,'mg% (  5.0 -  20.0 mg%)',0);

$pdf->ln();

$pdf->Cell(100,5,"Acido ascórbico +  análogos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$ascorbicos_analogos,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,'mg% (  8.0 -  27.0 mg%)',0);

$pdf->ln();

$pdf->Cell(100,5,"Compuestos análogos:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$analogos,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,'mg% (  2.4 -  10.0 mg%)',0);
 
$pdf->ln();

$pdf->Cell(100,5,"Acido ascórbico real:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$real,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,'mg% (  2.7 -  20.0 mg%)',0);

$pdf->ln();

$pdf->Cell(100,5,"Fosfatasa ácida:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$fosfatasa,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,'UI/ml (  400.0 - 740.0 UI/ml)',0);   
$pdf->ln();

$pdf->Cell(100,5,"Glicerilfosforilcolina:",0);  
$pdf->SetFont($letra,'B',$tamanio);
$pdf->Cell(10,5,$glicerilfosforilcolina,0);
$pdf->SetFont($letra,'',$tamanio);
$pdf->Cell(20,5,'mg% (  40.0 -  90.0 mg%)',0);
$pdf->ln();


 
 

 


?>
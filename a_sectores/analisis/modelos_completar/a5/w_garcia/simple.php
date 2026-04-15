<?php 





$dia = substr($desde,8,2);
$mes= substr($desde,5,2);
$anio = substr($desde,0,4);
$desde1 = $dia."/".$mes."/".$anio;

$dia = substr($hasta,8,2);
$mes= substr($hasta,5,2);
$anio = substr($hasta,0,4);
$hasta1 = $dia."/".$mes."/".$anio;



  $sql="select * from pacientes where nro_paciente = $nro_paciente";
$result2 = $db->Execute($sql);

$nro_paciente=$result2->fields["nro_paciente"];
$nombre1=$result2->fields["nombre"];
$nro_os=$result2->fields["nro_os"];
$nro_afiliado=$result2->fields["nro_afiliado"];
$apellido=$result->fields["apellido"];

 $nombre_completo = $apellido." ".$nombre1;
$nombre_completo = substr($nombre_completo,0,40);


$nro_paciente=$result2->fields["nro_paciente"];
$nombre=$result2->fields["nombre"];
$apellido=$result2->fields["apellido"];
 $fecha_nacimiento=$result2->fields["fecha_nacimiento"];
 $sexo=$result2->fields["sexo"];


 list($Y,$m,$d) = explode("-",$fecha_nacimiento);
 $edad = ( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );





$pdf->SetFont($letra,'B',11);
$pdf->Cell(60,5,$nombre_completo,0);

$pdf->SetFont($letra,'',11);



$pdf->Cell(15,5,"Nº: ",0);
$pdf->SetFont($letra,'B',11);
$pdf->Cell(60,5,$nro_paciente. " (".$edad.")",0);

if ($desde == $hasta){
 
$pdf->SetFont($letra,'B',11);
$pdf->Cell(20,5,$desde1,0);
$pdf->SetFont($letra,'',11);
}else{
	$pdf->SetFont($letra,'',11);
$pdf->Cell(125,"Desde: ",0);
$pdf->SetFont($letra,'B',11);
$pdf->Cell(20,5,$desde1,0);
$pdf->SetFont($letra,'',11);
$pdf->Cell(12,5,"Hasta: ",0);
$pdf->SetFont($letra,'B',11);
$pdf->Cell(20,5,$hasta1,0);
$pdf->SetFont($letra,'',11);
}





$pdf->Ln();
 
 $sql2="select * from detalle join convenio_practica on (detalle.nro_practica = convenio_practica.cod_practica) where detalle.cod_grabacion = $cod_grabacion and imprimir = 1 GROUP BY detalle.nro_practica order by cod_operacion";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo".$db->ErrorMsg());
 while (!$result2->EOF) {

  $contad  = $contad  + 1;

$result2->MoveNext();

	}


 $sql2="select * from detalle join convenio_practica on (detalle.nro_practica = convenio_practica.cod_practica) where detalle.cod_grabacion = $cod_grabacion and imprimir = 1 GROUP BY detalle.nro_practica order by cod_operacion";
$result2 = $db->Execute($sql2);



if (!$result2) die("fallo".$db->ErrorMsg());
 while (!$result2->EOF) {

$clase_guardada = $clase;

$nro_os=strtoupper($result2->fields["nro_os"]);
$nro_paciente=strtoupper($result2->fields["nro_paciente"]);
$periodo=strtoupper($result2->fields["periodo"]);
$marca=strtoupper($result2->fields["marca"]);
$lote=strtoupper($result2->fields["lote"]);
$cod_operacion=strtoupper($result2->fields["cod_operacion"]);
$año=strtoupper($result2->fields["ano"]);
$nro_afiliado=$result2->fields["nro_afiliado"];
$nro_orden=$result2->fields["nro_orden"];
$autorizacion=strtoupper($result2->fields["autorizacion"]);
$operador=strtoupper($result2->fields["operador"]);
$cod_grabacion=strtoupper($result2->fields["cod_grabacion"]);
$fecha_grabacion=strtoupper($result2->fields["fecha_grabacion"]);
$fecha=strtoupper($result2->fields["fecha"]);
$matricula=strtoupper($result2->fields["matricula"]);
$prescriptor=strtoupper($result2->fields["medico"]);
$confirmada=strtoupper($result2->fields["confirmada"]);
$nro_practica=strtoupper($result2->fields["nro_practica"]);
$medico=strtoupper($result2->fields["medico"]);
$clase=strtoupper($result2->fields["clase"]);
$nro_ref=strtoupper($result2->fields["nro_ref"]);
$enter=strtoupper($result2->fields["enter"]);

 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result111 = $db->Execute($sql11);
$nombre_practica=strtoupper($result111->fields["practica"]);


 $contador_1 = $contador_1 + 1;

$nombre_practica = substr($nombre_practica,0,12);

if ($contador_1 == 1){
$pdf->SetX(10);
$pdf->Cell(70,5,$nombre_practica.": ");
}elseif ($contador_1 == 2){
$pdf->SetX(70);
$pdf->Cell(70,5,$nombre_practica.": ");

}elseif($contador_1 == 3){
$pdf->SetX(140);
 $pdf->Cell(70,5,$nombre_practica.": ");
$pdf->ln();
$pdf->ln();
$pdf->SetX(10);

$contador_1 = 0;
}







$result2->MoveNext();

	}


	IF ($contad == 1){
$pdf->ln(37);
}elseif ($contad == 2){
$pdf->ln(36);
}elseif ($contad == 3){
$pdf->ln(35);
}elseif ($contad == 4){
$pdf->ln(34);
}elseif ($contad == 5){
$pdf->ln(33);
}elseif ($contad == 6){
$pdf->ln(32);
}elseif ($contad == 7){
$pdf->ln(31);
}elseif ($contad == 8){
$pdf->ln(30);
}elseif ($contad == 9){
$pdf->ln(29);
}elseif ($contad == 10){
$pdf->ln(28);
}elseif ($contad == 11){
$pdf->ln(27);
}elseif ($contad == 12){
$pdf->ln(26);
}elseif ($contad == 13){
$pdf->ln(25);
}elseif ($contad == 14){
$pdf->ln(24);
}elseif ($contad == 15){
$pdf->ln(23);

}elseif ($contad == 16){
$pdf->ln(22);
}elseif ($contad == 17){
$pdf->ln(21);
}elseif ($contad == 18){
$pdf->ln(20);
}elseif ($contad == 19){
$pdf->ln(19);
}elseif ($contad == 20){
$pdf->ln(18);
}elseif ($contad == 21){
$pdf->ln(17);
}elseif ($contad == 22){
$pdf->ln(16);
}elseif ($contad == 23){
$pdf->ln(15);
}elseif ($contad == 24){
$pdf->ln(14);
}elseif ($contad == 25){
$pdf->ln(13);
}elseif ($contad == 26){
$pdf->ln(12);
}elseif ($contad == 27){
$pdf->ln(11);
}elseif ($contad == 28){
$pdf->ln(10);
}elseif ($contad == 29){
$pdf->ln(9);
}elseif ($contad == 30){
$pdf->ln(8);
}


$contad = 0;
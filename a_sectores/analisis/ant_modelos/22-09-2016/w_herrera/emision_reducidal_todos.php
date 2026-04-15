<?php

$sql = "SELECT * FROM archivos";
$result = $db->Execute($sql);
$id=$result->fields["id"];


$sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);
$no=$result->fields["nombre"];


$domicilio = $direccion." - ".$localidad." - ".$telefono;
$sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);

$nro_paciente=$result->fields["nro_paciente"];
$nombre1=strtoupper($result->fields["nombre"]);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];
$apellido=strtoupper($result->fields["apellido"]);

 $nombre_completo = $apellido." ".$nombre1;
$nombre_completo = substr($nombre_completo,0,40);


$nro_paciente=$result->fields["nro_paciente"];
$nombre=$result->fields["nombre"];
$apellido=$result->fields["apellido"];
 $fecha_nacimiento=$result->fields["fecha_nacimiento"];
 $sexo=$result->fields["sexo"];
 
	  

IF ($fecha_nacimiento == "0000-00-00"){
$edad = "SIN CARGAR";
}ELSE{
$edad = calculaEdad($fecha_nacimiento);
}



$sql1="select * from datos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$nombre_os=strtoupper($result1->fields["sigla"]);

/*$dia = substr($fecha_grabacion,8,2);
$mes= substr($fecha_grabacion,5,2);
$anio = substr($fecha_grabacion,0,4);

echo $fecha_mostrar = $dia."/".$mes."/".$anio;
*/



$sql2="select * from ordenes where cod_grabacion = $cod_grabacion";
$result2 = $db->Execute($sql2);

 $nombre_medico=strtoupper($result2->fields["nombre_medico"]);





$pdf->setPaciente($nombre_medico);
$pdf->setFecha($fecha_mostrar);
$pdf->setNombre($nombre_completo);


$pdf->setObra($nombre_os);

$pdf->setAfiliado($nro_afiliado);




$pdf->setRenglon($ren1);
$pdf->setRenglon2($ren2);

if ($caratula == "SI"){

$pdf->AddPage();


$v = "blanco.jpg";
$pdf->SetY(20);
  $pdf->Image('../../../../../logos/'.$v,10,2,220);




  $pdf->Image('../../../../../logos/logo_bailen.jpg',65,12,80);
//$pdf->SetFont($letra,'B',20);
//$pdf->Cell(190,10,'LABORATORIO DE ANALISIS CLINICOS',0,1,'C');


//$pdf->Cell(190,10,'PROSALUD',0,1,'C');

$pdf->SetFont($letra,'B',12);
$pdf->Ln();

$pdf->SetY(35);
$pdf->Cell(190,10,$nombre_laboratorio,0,1,'C');

$nombre = substr($nombre,0,22);

$nombre_medico = substr($nombre_medico,0,22);




$pdf->Ln();
$pdf->Ln();

 $pdf->line(10,62,200,62);

$pdf->SetFont('ARIAL','',12);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(30,100));

srand(microtime()*1000000);
$paciente = $nombre_completo." (".$nro_paciente.")";





$pdf->SetX(25);
$pdf->SetFont('ARIAL','',12);
$pdf->Cell(50,5,"Paciente: ",0);
$pdf->SetX(70);
$pdf->SetFont('ARIAL','B',12);
$pdf->Cell(60,5,$paciente,0);
$pdf->SetFont('ARIAL','',12);
$pdf->Ln();

$pdf->SetX(25);
$pdf->SetFont('ARIAL','',12);
$pdf->Cell(50,5,"Fecha: ",0);
$pdf->SetX(70);
$pdf->SetFont('ARIAL','B',12);
$pdf->Cell(60,5,$fecha_mostrar,0);
$pdf->SetFont('ARIAL','',12);
$pdf->Ln();


$pdf->SetX(25);
$pdf->SetFont('ARIAL','',12);
$pdf->Cell(50,5,"Médico: ",0);
$pdf->SetX(70);
$pdf->SetFont('ARIAL','B',12);
$pdf->Cell(60,5,$nombre_medico,0);
$pdf->SetFont('ARIAL','',12);
$pdf->Ln();


 





 $pdf->line(10,87,200,87);


 

/*
$pdf->SetFont('Arial','',9);
$pdf->Cell(190,5,$domicilio,0,1,'C');
$pdf->Ln();
$pdf->Cell(190,5,$mail,0,1,'C');
*/
}



#echo $pdftest->getPaciente();
//for($i=1;$i<=40;$i++)
//    $pdftest->Cell(0,10,'Printing line number '.$i,0,1);


//$pdf=new PDF('L','mm',$hoja); 

$pdf->SetFont($letra,'',11);
//$contador = 1;
include ("simple.php");
//$contador = 1;
//include ("modulos.php");

//include ("complejos.php");





/// fin

if ($firma == "SI"){
include ("firma.php");
}









// 428-7755
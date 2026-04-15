<?php 




 $sql2="select * from ordenes join detalle on (ordenes.cod_grabacion = detalle.cod_grabacion) where ordenes.nro_paciente = $nro_paciente and ordenes.cod_grabacion = $cod_grabacion and clase = 0 order by cod_operacion";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo".$db->ErrorMsg());
 while (!$result2->EOF) {


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


$conta_comun = $conta_comun + 1;



IF (($conta_comun == 1) or ($conta_comun == 0)){
//$pdf->AddPage();
//include ("enca_pdf.php");

//$pdf->ln();
$pdf->SetX(10);

}


//$pdf->Cell(50,5,'conta: '.$conta_comun);

$sql11="select * from detalle_referencia where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$valor=$result11->fields["valor"];
$referencia=$result11->fields["referencia"];
$referencia1=$result11->fields["referencia1"];
$referencia2=$result11->fields["referencia2"];
$referencia3=$result11->fields["referencia3"];


$observaciones=strtoupper($result11->fields["observaciones"]);




 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);
$nombre_practica=strtoupper($result11->fields["practica"]);
 
$unidad=$result11->fields["unidad"];

$salto=$result11->fields["salto"];

if ($salto == 1){
//$pdf->AddPage();
//$pdf->SetX(10);
}

$metodo=$result11->fields["metodo"];
//$metodo = nl2br( stripslashes( htmlentities($metodo)));

$det = substr($nombre_practica,0,22);

$tipo_det=$result11->fields["tipo_det"];




 

SWITCH ($tipo_det){

case "Desde-Hasta": {

if ($contador > 14){
$pdf->AddPage();
	include ("titulo_practica.php");
	$contador = 0;
}else{
	include ("titulo_practica.php");
}


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(20,23, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array($columna1, $desde.' - '.$hasta , $unidad,  $columna2));
$pdf->ln();

$contador = $contador + 1;


breaK;}


case "Sin Valor Ref.": {

	if ($contador > 14){
$pdf->AddPage();
	include ("titulo_practica.php");
	$contador = 0;
}else{
	include ("titulo_practica.php");
}


//$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and tipo like '$sexo'";
$sql11="select * from convenio_referencia where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

$contador = $contador + 1;
breaK;}


case "Libre": {


//$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and tipo like '$sexo'";


//$pdf->AddPage();


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);

if (!$result11) die("fallo".$db->ErrorMsg());
 while (!$result11->EOF) {


$contador = $contador + 1;



$result11->MoveNext();


 }


/*
$pdf->SetX(160);
$pdf->Cell(20,5,$contador); 
*/


if ($contador > 14){
$pdf->AddPage();
	include ("titulo_practica.php");
	$contador = 0;
}else{
	include ("titulo_practica.php");
	
}


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica order by cod_operacion";
$result11 = $db->Execute($sql11);

if (!$result11) die("fallo".$db->ErrorMsg());
 while (!$result11->EOF) {


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

if ($desde == 0.00){
	$desde = " < ";
}
else{
$desde = $desde. "  ";
}

if ($hasta == 0.00){
$desde = " > ".$desde;
$hasta = "";
}




$pdf->SetX(10); 
$pdf->SetFont($letra,'',9);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(40,23, 30));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array($columna1, $desde.'  '.$hasta , $unidad,  $columna2));


$result11->MoveNext();


 }


$pdf->ln();





breaK;}



CASE "Años":{

if ($contador > 14){
$pdf->AddPage();
	include ("titulo_practica.php");
	$contador = 0;
}else{
	include ("titulo_practica.php");
}


  $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $edad between anio_d and anio_h";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
 $hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

 

$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(30,40,20,40));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);


if ($desde == '0.00'){
$borrar = 1;
$desde = "Hasta: ";

if ($anio_h > 97){
$pdf->Row(array($columna1,$columna2, '> '.$anio_d. "Años" ,$hasta." ".$unidad));
}else{


	if ($borrar == 1){  
$pdf->Row(array($columna1,$columna2, 'Años: '.$anio_d."-".$anio_h ,$desde.' '.$hasta." ".$unidad));
	}else{
$pdf->Row(array($columna1,$columna2, 'Años: '.$anio_d."-".$anio_h ,$desde.' - '.$hasta." ".$unidad));
	}



}


}

$pdf->ln();



break;}

CASE "Años Sexo":{

if ($contador > 14){
$pdf->AddPage();
	include ("titulo_practica.php");
	$contador = 0;
}else{
	include ("titulo_practica.php");
}



  $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $edad between anio_d and anio_h and tipo like '$sexo'";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];


$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(30,40,40,40));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array($columna1,$columna2, 'Años: '.number_format($anio_d)."-".number_format($anio_h) ,$desde.' - '.$hasta." ".$unidad));
$pdf->ln();

break;}



CASE "Valores":{

if ($contador > 14){
$pdf->AddPage();
	include ("titulo_practica.php");
	$contador = 0;
}else{
	include ("titulo_practica.php");
}


   $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $valor between desde and hasta";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];


 

$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(70,40,60));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

 
$pdf->Row(array($columna1,$columna2, $desde.' - '.$hasta." ".$unidad));


$pdf->ln();
break;}



CASE "Valores Hasta":{

if ($contador > 13){
$pdf->AddPage();
	include ("titulo_practica.php");
	$contador = 0;
}else{
	include ("titulo_practica.php");
}

$pdf->SetX(160);
$pdf->Cell(20,5,$contador); 


$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $valor between desde and hasta";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];



if ($desde == ""){
   $sql11="select * from convenio_referencia where cod_practica =  $nro_practica order by desde desc limit 1";
$result11 = $db->Execute($sql11);


$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];
}


$pdf->SetX(10);
$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(70,40,60));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

if ($hasta == '0.00'){
	$hasta = "";
}

if ($desde== '0.00'){
	$desde = "";
}


 if (($desde != '') and ($hasta != '')){
$pdf->Row(array($columna1,$columna2, $desde.' - '.$hasta." ".$unidad));
 }
 elseif (($desde == '') and ($hasta != '')){
$pdf->Row(array($columna1,$columna2, ' < de '.$hasta." ".$unidad));
 } 
 elseif (($desde != '') and ($hasta == '')){
$pdf->Row(array($columna1,$columna2, ' > de: '.$desde." ".$unidad));
 }

$pdf->ln();

break;}



CASE "Valores Sexo":{

if ($contador > 14){
$pdf->AddPage();
	include ("titulo_practica.php");
	$contador = 0;
}else{
	include ("titulo_practica.php");
}


  $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and tipo like '$sexo'";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];



 

$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(70,40,60));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

 
$pdf->Row(array($columna1,$columna2, $desde.' - '.$hasta." ".$unidad));

$pdf->ln();

break;}





}







if ($conta_comun == 5){
//$pdf->AddPage();
$conta_comun = 0;
}


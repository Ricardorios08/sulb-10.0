<?php
$nro_paciente;
require('../../../drivers/fpdf/fpdf.php');
require('../../../drivers/fpdf/mc_table.php');
include("../../../conexiones/config.inc.php");
include("../../../funciones/funciones.php");

 function CalculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}

$con = 1;
$sql="select * from informe";
$result = $db->Execute($sql);
$caratula=strtoupper($result->fields["caratula"]);
$hoja=strtoupper($result->fields["hoja"]);
$firma=strtoupper($result->fields["firma"]);
$letra = "ARIAL";



$sql="select * from datos_principales";
$result = $db->Execute($sql);
$nombre_laboratorio=strtoupper($result->fields["nombre_laboratorio"]);
$direccion=strtoupper($result->fields["direccion"]);
$localidad=strtoupper($result->fields["localidad"]);
$telefono=strtoupper($result->fields["telefono"]);
$mail=$result->fields["mail"];


$ren1 = $direccion." ".$localidad." ".$telefono;
$ren2 = $mail;


class PDF2 extends FPDF
{

    var $nroPac;
//Page header
function Header()
{
    //Logo

	$a = "5x3 freixas.jpg";
	$a = "prosalud.jpg";

$this->SetY(3);
//  $this->Image('../../../logos/'.$a,170,2,40);
//$this->SetTextColor(50,60,100); 
    //times bold 15
$this->SetFont($letra,'',9);




 
$this->setx(10);
$this->Cell(40,5,'Paciente: '.$this->getNombre());

$this->ln();
$this->Cell(40,5,'Nº Protocolo: '.$this->getPaciente());

$this->ln();
$this->Cell(40,5,'Fecha: '.$this->getFecha());

$this->line(10,20,80,20);
 


$this->Sety(25);
$this->Setx(150);

}

function Footer()
{
	

/*
$this->SetY(-25);
  

    //Select times italic 8
    $this->Ln();
    $this->SetFont($letra,'I',12);
    //Print centered page number

  $this->Cell(0,5,$this->getRenglon(),0,0,'C');
$this->Ln();
    $this->Cell(0,5,$this->getRenglon2(),0,0,'C');

$this->Ln();
    $this->Cell(0,5,$this->PageNo(),0,0,'C');
*/

}


function setPaciente($nropac) {
    $this->nroPac = $nropac;
}

function getPaciente() {
    return $this->nroPac;
}


function setFecha($nrofec) {
    $this->nroFec = $nrofec;
}

function getFecha() {
    return $this->nroFec;
}

function setNombre($nom) {
    $this->nroNom = $nom;
}

function getNombre() {
    return $this->nroNom;
}

function setRenglon($ren) {
    $this->nroRen= $ren;
}

function getRenglon() {
    return $this->nroRen;
}






function setRenglon2($ren2) {
    $this->nroRen2= $ren2;
}

function getRenglon2() {
    return $this->nroRen2;
}



function setAfiliado($afi) {
    $this->nroAfi= $afi;
}

function getAfiliado() {
    return $this->nroAfi;
}


function setObra($obr) {
    $this->nroObra= $obr;
}

function getObra() {
    return $this->nroObr;
}








 



var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
//		$this->Rect($x,$y,$w,$h);
		//Print the text
		$this->MultiCell($w,5,$data[$i],0,$a);
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}


function Row_i($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
//		$this->Rect($x,$y,$w,$h);
		//Print the text
		$this->MultiCell($w,5,$data[$i],0,$a);
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}



function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

}

$pdf=new PDF2('L','mm',array(148,105));
$pdf->SetDisplayMode(real,'default'); 




//$pdftest=new PDF2();
$pdf->AliasNbPages();
//$pdf->AddPage();
$pdf->SetFont($letra,'',12);

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
$nombre=strtoupper($result->fields["nombre"]);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];
$apellido=strtoupper($result->fields["apellido"]);

$nombre = $apellido." ".$nombre;
$nombre = substr($nombre,0,22);


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


$nombre = strtoupper($apellido.", ".$nombre);
$sql2="select * from ordenes where cod_grabacion = $cod_grabacion";
$result2 = $db->Execute($sql2);

 $nombre_medico=strtoupper($result2->fields["nombre_medico"]);





$pdf->setPaciente($cod_grabacion);
$pdf->setFecha($fecha_mostrar);
$pdf->setNombre($nombre);


$pdf->setObra($nombre_os);

$pdf->setAfiliado($nro_afiliado);




$pdf->setRenglon($ren1);
$pdf->setRenglon2($ren2);

if ($caratula == "SI1"){

$pdf->AddPage();


$v = "blanco.jpg";
$pdf->SetY(20);
  $pdf->Image('../../../logos/'.$v,10,2,220);


$pdf->Ln();
$pdf->Ln();


$pdf->SetFont($letra,'B',20);
$pdf->Cell(190,10,'LABORATORIO DE ANALISIS CLINICOS',0,1,'C');


$pdf->Cell(190,10,'PROSALUD',0,1,'C');

$pdf->SetFont($letra,'B',12);


$pdf->Cell(190,10,$nombre_laboratorio,0,1,'C');

$nombre = substr($nombre,0,22);

$nombre_medico = substr($nombre_medico,0,22);


$pdf->Ln();

 $pdf->line(10,67,200,67);

$pdf->SetFont('Courier','',12);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(30,60,30,60));

srand(microtime()*1000000);
$pdf->Row(array('Paciente: ',$nombre,"Doctor: ",$nombre_medico));
$pdf->Row(array('Fecha: ',$fecha_mostrar,"Protocolo: ",$cod_grabacion));
$pdf->Row(array('O. Social: ',$nombre_os,"Afiliado: ",$nro_afiliado));

 $pdf->line(10,87,200,87);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial','',9);
$pdf->Cell(190,5,$domicilio,0,1,'C');
$pdf->Ln();
$pdf->Cell(190,5,$mail,0,1,'C');

}

$pdf->AddPage();

#echo $pdftest->getPaciente();
for($i=1;$i<=40;$i++)
//    $pdftest->Cell(0,10,'Printing line number '.$i,0,1);


//$pdf=new PDF('L','mm',$hoja); 

$pdf->SetY(20);
$pdf->SetX(10);
$pdf->Cell(33,5,'',1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'l'); 

$pdf->Cell(33,5,'',1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'l');





$pdf->SetY(25);
$pdf->SetX(10);
$pdf->Cell(33,5,'',1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'l'); 

$pdf->Cell(33,5,'',1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'l');

$pdf->SetY(30);
$pdf->SetX(10);
$pdf->Cell(33,5,'',1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'l'); 

$pdf->Cell(33,5,'',1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'l');

$pdf->SetY(35);
$pdf->SetX(10);
$pdf->Cell(33,5,'',1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'l'); 

$pdf->Cell(33,5,'',1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'l');

$pdf->SetY(40);
$pdf->SetX(10);
$pdf->Cell(33,5,'',1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'l'); 

$pdf->Cell(33,5,'',1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'l');

$pdf->SetY(45);
$pdf->SetX(10);
$pdf->Cell(33,5,'',1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'l'); 

$pdf->Cell(33,5,'',1,0,'L'); 
$pdf->Cell(10,5,'',1,0,'l');

$a = 20;


 $sql2="select * from ordenes join detalle on (ordenes.cod_grabacion = detalle.cod_grabacion) where ordenes.nro_paciente = $nro_paciente and ordenes.cod_grabacion = $cod_grabacion order by cod_operacion";
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


if ($nro_practica == 711){


$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_orina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$valor=strtoupper($result11->fields["valor"]);
$referencia=strtoupper($result11->fields["referencia"]);


$densidad=strtoupper($result11->fields["densidad"]);
$color=strtoupper($result11->fields["color"]);
$aspecto=strtoupper($result11->fields["aspecto"]);
$sedimento=strtoupper($result11->fields["sedimento"]);
$reaccion=strtoupper($result11->fields["reaccion"]);
$proteinas=strtoupper($result11->fields["proteinas"]);
$glucosa=strtoupper($result11->fields["glucosa"]);
$biliares=strtoupper($result11->fields["biliares"]);
$cetonicos=strtoupper($result11->fields["cetonicos"]);
$hemoglobina=strtoupper($result11->fields["hemoglobina"]);
$epiteliales=strtoupper($result11->fields["epiteliales"]);
$leucocito=strtoupper($result11->fields["piocitos"]);
$piocitos=strtoupper($result11->fields["piocitos"]);
$hematies=strtoupper($result11->fields["hematies"]);
$cilindros=strtoupper($result11->fields["cilindros"]);
$mucus=strtoupper($result11->fields["mucus"]);
$uratos=strtoupper($result11->fields["uratos"]);
$observaciones_orina =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont($letra,'BIU',10);
$pdf->Cell(40,10,$nombre_practica);
$pdf->SetFont($letra,'',10);
$pdf->ln();


$pdf->Cell(50,5,"EXAMEN FISICO",0);     
$pdf->Cell(50,5,"NORMAL",0);
$pdf->Cell(40,5,"EXAMINADA",0); 
$pdf->Cell(50,5,"EXAMEN QUIMICO",0);

$pdf->Ln();
 $pdf->line(10,50,200,50);

$pdf->Cell(50,5,"Densidad a 15* ",0);     
$pdf->Cell(50,5,"1015-1025",0);
$pdf->Cell(40,5,$densidad,0); 
$pdf->Cell(20,5,"Proteinas",0);
$pdf->Cell(60,5,$proteinas,0);     
$pdf->Ln(); 

$pdf->Cell(50,5,"Color",0);     
$pdf->Cell(50,5,"Am Ambar ",0);
$pdf->Cell(40,5,$color,0); 
$pdf->Cell(20,5,"Glucosa",0);
$pdf->Cell(60,5,$glucosa,0);     
$pdf->Ln(); 

$pdf->Cell(50,5,"Aspecto",0);     
$pdf->Cell(50,5,"Limpido",0);
$pdf->Cell(40,5,$aspecto,0); 
$pdf->Cell(20,5,"Pig. Biliares",0);
$pdf->Cell(60,5,$biliares,0);     
$pdf->Ln(); 

$pdf->Cell(50,5,"Sedimento",0);     
$pdf->Cell(50,5,"Escaso",0);
$pdf->Cell(40,5,$sedimento,0); 
$pdf->Cell(20,5,"Proteinas",0);
$pdf->Cell(60,5,$cetonicos,0);     
$pdf->Ln(); 

$pdf->Cell(50,5,"Reacción",0);     
$pdf->Cell(50,5,"Acida",0);
$pdf->Cell(40,5,$reaccion,0); 
$pdf->Cell(20,5,"Proteinas",0);
$pdf->Cell(60,5,$hemoglobina,0);     
$pdf->Ln(); 

$pdf->Cell(0,10,"EXAMEN MICROSCOPICO DEL SEDIMENTO",0,0,'C');
$pdf->Ln(); 
$pdf->line(10,83,200,83);

$pdf->Cell(50,5,"CELULAS EPITELIALES",0); 
$pdf->Cell(40,5,$epiteliales,0);

$pdf->Ln(); 
$pdf->Cell(50,5,"LEUCOCITOS",0); 
$pdf->Cell(40,5,$leucocito,0);

$pdf->Ln(); 
$pdf->Cell(50,5,"PIOCITOS (pl. de pus) ",0); 
$pdf->Cell(40,5,$piocitos,0);

$pdf->Ln(); 
$pdf->Cell(50,5,"HEMATIES",0); 
$pdf->Cell(40,5,$hematies,0);

$pdf->Ln(); 
$pdf->Cell(50,5,"CILINDROS",0); 
$pdf->Cell(40,5,$cilindros,0);

$pdf->Ln(); 
$pdf->Cell(50,5,"ESTRIAS DE MUCUS ",0); 
$pdf->Cell(40,5,$mucus,0);

$pdf->Ln(); 
$pdf->Cell(50,5,"URATOS AMORFOS",0); 
$pdf->Cell(40,5,$uratos,0);


$pdf->Ln(); 
$pdf->Cell(50,5,"OBSERVACIONES",0);
$pdf->Cell(50,5,$observaciones_orina,0);     


}elseif ($nro_practica == 736){

	$pdf->AddPage();
//include ("enca_pdf.php");

$pdf->Ln();
 $sql11="select * from detalle_fecal where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$metodo_macro=strtoupper($result11->fields["metodo_macro"]);
$macroscopico=strtoupper($result11->fields["macroscopico"]);
$metodo_micro=strtoupper($result11->fields["metodo_micro"]);
$microscopico=strtoupper($result11->fields["microscopico"]);
$observaciones_fecal=strtoupper($result11->fields["observaciones"]);


 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];

$pdf->SetFont($letra,'BIU',10);
$pdf->Cell(40,10,$nombre_practica);
$pdf->SetFont($letra,'',10);
$pdf->ln();

$pdf->Cell(50,5,"EXAMEN MACROSCOPICO",0);     
$pdf->Cell(40,5,"METODO: ".$metodo_macro,0); 
$pdf->ln();

$pdf->SetX(60);
$pdf->Cell(90,5,"RESULTADO: ".$macroscopico,0); 

$pdf->ln();



$pdf->Cell(50,5,"EXAMEN MICROSCOPICO",0);
$pdf->Cell(40,5,"METODO: ".$metodo_micro,0);     
$pdf->ln();

$pdf->SetX(60);
$pdf->Cell(50,5,"RESULTADO: ".$microscopico,0);  

$pdf->ln();
$pdf->ln();

$pdf->Cell(50,5,"OBSERVACIONES",0);
$pdf->Cell(60,5,$observaciones_fecal,0);     
$pdf->ln();




}elseif ($nro_practica == 475){
include ("detalle_hemograma.php");
}elseif ($nro_practica == 764){
include ("detalle_proteinograma.php");
}elseif ($nro_practica == 413){
include ("detalle_curva.php");
}elseif ($nro_practica == 110){
include ("detalle_bilirrubina.php");
}elseif ($nro_practica == 13){
include ("detalle_aglutininas.php");
}elseif ($nro_practica == 546){
include ("detalle_ionograma.php");
}elseif ($nro_practica == 193){
include ("detalle_creatinina.php");
}elseif ($nro_practica == 481){
include ("detalle_hepatograma.php");
}elseif ($nro_practica == 2734){
include ("detalle_antigeno.php");
}elseif ($nro_practica == 136){
include ("detalle_calcio.php");
}elseif ($nro_practica == 363){
include ("detalle_orina.php");
}elseif ($nro_practica == 654){
include ("detalle_magnesio.php");
}elseif ($nro_practica == 767){
include ("detalle_proteinuria.php");
}elseif ($nro_practica == 35){
include ("detalle_antibiograma.php");
}elseif ($nro_practica == 105){
include ("detalle_bacteriologica.php");
}elseif ($nro_practica == 547){
include ("detalle_urinario.php");
}elseif ($nro_practica == 171){
include ("detalle_coagulograma.php");
}elseif ($nro_practica == 615){
include ("detalle_lipidograma.php");
 


///////////////// practicas normales
	}else{






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



include ("titulo_practica.php");
 








if ($conta_comun == 5){
//$pdf->AddPage();
$conta_comun = 0;
}

}


$result2->MoveNext();

	}



/// fin

if ($firma == "SI"){
include ("firma.php");
}





$pdf->Output();


// 428-7755
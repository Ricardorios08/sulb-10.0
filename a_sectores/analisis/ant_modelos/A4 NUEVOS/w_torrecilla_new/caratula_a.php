<?php
$nro_paciente;
require('../../../drivers/fpdf/fpdf.php');
require('../../../drivers/fpdf/mc_table.php');
include("../../../conexiones/config.inc.php");

   function fecha_argentina($input)
    {

$di = substr($input,8,2);
$me = substr($input,5,2);
$an = substr($input,0,4);

$fecha_terminada = $di."/".$me."/".$an;

return $fecha_terminada;

	}



 function CalculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}


$usuario= $_REQUEST['usuario'];
 
 $sql="select * from informe";
$result = $db->Execute($sql);
$caratula=strtoupper($result->fields["caratula"]);
$hoja=strtoupper($result->fields["hoja"]);
$firma=strtoupper($result->fields["firma"]);
 $modelo=strtoupper($result->fields["modelo"]);
$letra = "Times";


$sql="select * from datos_principales";
$result = $db->Execute($sql);

$nombre_laboratorio=strtoupper($result->fields["nombre_laboratorio"]);
$direccion=strtoupper($result->fields["direccion"]);
$localidad=strtoupper($result->fields["localidad"]);
$telefono=strtoupper($result->fields["telefono"]);
$mail=$result->fields["mail"];
$renglon1=$result->fields["renglon1"];
$renglon2=$result->fields["nombre_laboratorio"];
$renglon3=$result->fields["renglon3"];
$renglon4 = $direccion." - ".$localidad." - ".$telefono;
$renglon5 = $mail;

$renglon1_b=$result->fields["renglon1_b"];
$renglon2_b=$result->fields["renglon2_b"];
$renglon3_b=$result->fields["renglon3_b"];
$domicilio_b=$result->fields["domicilio_b"];
$localidad_b=$result->fields["localidad_b"];
$telefono_b=$result->fields["telefono_b"];
$mail_b=$result->fields["mail_b"];

$renglon1_c=$result->fields["renglon1_c"];
$renglon2_c=$result->fields["renglon2_c"];
$renglon3_c=$result->fields["renglon3_c"];
$domicilio_c=$result->fields["domicilio_c"];
$localidad_c=$result->fields["localidad_c"];
$telefono_c=$result->fields["telefono_c"];
$mail_c=$result->fields["mail_c"];

$renglon1_d=$result->fields["renglon1_d"];
$renglon2_d=$result->fields["renglon2_d"];
$renglon3_d=$result->fields["renglon3_d"];
$domicilio_d=$result->fields["domicilio_d"];
$localidad_d=$result->fields["localidad_d"];
$telefono_d=$result->fields["telefono_d"];
$mail_d=$result->fields["mail_d"];


switch ($modelo){
	case "A":{
$renglon1=$renglon1;
$renglon2=$nombre_laboratorio;
$renglon3=$renglon3;
$renglon4 = $direccion." - ".$localidad." - ".$telefono;
$renglon5 = $mail;

$nombre_fichero = '../../../prueba/logo_a.jpg';
if (file_exists($nombre_fichero)) {
$logo_seleccionado = "../../../prueba/logo_a.jpg";
} else {
$logo_seleccionado = "../../../logos/blanco.jpg";
}
break;
	}

	case "B":{
$renglon1=$renglon1_b;
$renglon2=$renglon2_b;
$renglon3=$renglon3_b;
$renglon4 = $domicilio_b." - ".$localidad_b." - ".$telefono_b;
$renglon5 = $mail_b;
$nombre_fichero = '../../../prueba/logo_b.jpg';
if (file_exists($nombre_fichero)) {
$logo_seleccionado = "../../../prueba/logo_b.jpg";
} else {
$logo_seleccionado = "../../../logos/blanco.jpg";
}
break;
	}

	case "C":{
$renglon1=$renglon1_c;
$renglon2=$renglon2_c;
$renglon3=$renglon3_c;
$renglon4 = $domicilio_c." - ".$localidad_c." - ".$telefono_c;
$renglon5 = $mail_c;
$nombre_fichero = '../../../prueba/logo_c.jpg';
if (file_exists($nombre_fichero)) {
$logo_seleccionado = "../../../prueba/logo_c.jpg";
} else {
$logo_seleccionado = "../../../logos/blanco.jpg";
}
break;
	}

	case "D":{
$renglon1=$renglon1_d;
$renglon2=$renglon2_d;
$renglon3=$renglon3_d;
$renglon4 = $domicilio_d." - ".$localidad_d." - ".$telefono_d;
$renglon5 = $mail_d;
$nombre_fichero = '../../../prueba/logo_d.jpg';
if (file_exists($nombre_fichero)) {
$logo_seleccionado = "../../../prueba/logo_d.jpg";
} else {
$logo_seleccionado = "../../../logos/blanco.jpg";
}
break;
	}

}





class PDF2 extends FPDF
{

    var $nroPac;
//Page header
function Header()
{
    //Logo

	$a = "5x3 freixas.jpg";
	$a = "prosalud.jpg";

  $this->SetFont('Arial','I',8);


$this->SetY(3);
//  $this->Image('../../../logos/'.$a,170,2,40);
//$this->SetTextColor(50,60,100); 
    //times bold 15
$this->SetFont($letra,'',9);





$this->setY(12);
$this->setx(10);
$this->Cell(40,5,'Paciente: '.$this->getNombre());
$this->setx(100);
$this->Cell(40,5,'Nº Protocolo: '.$this->getPaciente());
$this->setx(170);
$this->Cell(40,5,'Fecha: '.$this->getFecha());

$this->line(10,20,200,20);



$this->Sety(25);
$this->Setx(150);

}



function Footer()
{
	
$this->SetY(-25);
  

    //Select times italic 8
    $this->Ln();
    $this->SetFont('arial','',10);
    //Print centered page number


$ren1 = "";
$ren2 = "";


  $this->Cell(0,5,$ren1,0,0,'C');
$this->Ln();
$this->Cell(0,5,$ren2,0,0,'C');

/*
  $this->Cell(0,5,$ren4,0,0,'C');
$this->Ln();
$this->Cell(0,5,$ren2,0,0,'C');
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

//Instanciation of inherited class
$pdf=new PDF2('L','mm',$hoja); 
$pdf->SetDisplayMode(100,'default'); 

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
$nombre1=strtoupper($result->fields["nombre"]);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];
$apellido=strtoupper($result->fields["apellido"]);



 $nombre_completo1 = $apellido." ".$nombre1;

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





$pdf->setPaciente($cod_grabacion);
$pdf->setFecha($fecha_mostrar);
$pdf->setNombre($nombre_completo1);


$pdf->setObra($nombre_os);

$pdf->setAfiliado($nro_afiliado);


$pdf->setRenglon($ren1);
$pdf->setRenglon2($ren2);

$caratula = "SI";
if ($caratula == "SI"){

$pdf->AddPage();


$v = "blanco.jpg";
$pdf->SetY(20);
  $pdf->Image('../../../logos/'.$v,10,2,220);






$pdf->SetY(10);
  //$pdf->Image($logo_seleccionado,10,20,40);



/*
$pdf->SetFont('Times','B',14);
$pdf->Cell(200,5,$renglon1,0,1,'C');

$pdf->SetFont('Times','B',14);
$pdf->Cell(200,5,$renglon2,0,1,'C');
$pdf->SetFont('Times','B',14);
$pdf->Cell(200,5,$renglon3,0,1,'C');
*/


//$pdf->ln();$pdf->ln();

$pdf->SetFont('ARIAL','B',14);





$nombre = substr($nombre,0,22);

$nombre_medico = substr($nombre_medico,0,22);


//$pdf->Ln();
//$pdf->Ln();
//$pdf->Ln();
//$pdf->Ln();
 //$pdf->line(10,64,200,64);


$pdf->SetFont('ARIAL','BI',16);
$pdf->SETX(30);$pdf->Cell(30,8,"Paciente: ");$pdf->SETX(60);$pdf->Cell(50,8,$nombre_completo1,0,0,l);;$pdf->Ln();
$pdf->SETX(30);$pdf->Cell(30,8,"Fecha: ");$pdf->SETX(60);$pdf->Cell(50,8,$fecha_mostrar,0,0,l);$pdf->Ln();
$pdf->SETX(30);$pdf->SetFont('ARIAL','I',12);
$pdf->Ln();
$pdf->SETX(30);$pdf->Cell(30,5,"Doctor: ");$pdf->SETX(60);$pdf->Cell(50,5,$nombre_medico,0,0,l);$pdf->Ln();
$pdf->SETX(30);$pdf->Cell(30,5,"Protocolo: ");$pdf->SETX(60);$pdf->Cell(50,5,$cod_grabacion,0,0,l);$pdf->Ln();
$pdf->SETX(30);$pdf->Cell(30,5,"O. Social: ");$pdf->SETX(60);$pdf->Cell(50,5,$nombre_os,0,0,l);$pdf->Ln();



$pdf->Ln();/*

$pdf->SetFont('ARIAL','B',12);
$pdf->Cell(190,5,$renglon4,0,1,'C');


$pdf->SetFont('ARIAL','B',12);
$pdf->Cell(190,5,$renglon5,0,1,'C');
*/

}

//$pdf->AddPage();




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





$pdf->Output();


// 428-7755
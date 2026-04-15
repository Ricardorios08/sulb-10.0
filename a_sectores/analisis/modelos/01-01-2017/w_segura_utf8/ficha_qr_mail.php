<?php
$nro_paciente;
require('../../../drivers/fpdf/fpdf.php');
require('../../../drivers/fpdf/mc_table.php');
include("../../../conexiones/config.inc.php");


//qr
$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

//html PNG location prefix
$PNG_WEB_DIR = 'temp/';

include "../../../drivers/phpqrcode/qrlib.php";    

//ofcourse we need rights to create temp dir
if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);

$filename = $PNG_TEMP_DIR.'test.png';

$matrixPointSize = 10;
$errorCorrectionLevel = 'L';




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
 $sql="select * from informe where id = 3";
$result = $db->Execute($sql);
$caratula=strtoupper($result->fields["caratula"]);
$hoja=strtoupper($result->fields["hoja"]);
$firma=strtoupper($result->fields["firma"]);
$letra = "ARIAL";


$sql="select * from datos_principales  where id = 3";
$result = $db->Execute($sql);
$nombre_laboratorio=strtoupper($result->fields["nombre_laboratorio"]);
$direccion=strtoupper($result->fields["direccion"]);
$localidad=strtoupper($result->fields["localidad"]);
$telefono=strtoupper($result->fields["telefono"]);
$mail=$result->fields["mail"];
$renglon1=strtoupper($result->fields["renglon1"]);
$renglon2=strtoupper($result->fields["nombre_laboratorio"]);
$renglon3=strtoupper($result->fields["renglon3"]);
 $renglon4 = $direccion." - ".$localidad." - ".$telefono;
 $renglon5 = $mail;




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



$this->SetFont($letra,'',12);

$this->setY(8);
$this->setx(10);
$this->Cell(40,5,'Paciente: '.$this->getNombre());
$this->setx(100);
$this->Cell(40,5,'Nº Protocolo: '.$this->getPaciente());
$this->setx(163);
$this->Cell(40,5,'Fecha: '.$this->getFecha());


$this->line(10,15,200,15);

$this->setY(18);
$this->setx(30);


}


function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print centered page number
  $this->SetX(10);
	    $this->Cell(200,5,"Av. Libertad 637 - (frente Banco Santander) Villa Nueva - Gllen - Mendoza - TEL FIJO: (0261)3951370 - CEL. (0261)5097706",0,0,'C');
 
		 $this->ln();
  $this->Cell(200,5,"bqcasegura@gmail.com",0,0,'C');
		$this->line(10,130,200,130);


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
$pdf=new PDF2('l','mm',$hoja); 
$pdf->SetDisplayMode(80,'default'); 

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

$leer="http://www.laboratoriosegura.com.ar/laboratorio.6.0/a_sectores/medicos/index.php?usuario1="."$nro_documento";
$filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
QRcode::png($leer, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 



$domicilio = $direccion." - ".$localidad." - ".$telefono;
  $sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);

$nro_paciente=utf8_decode($result->fields["nro_paciente"]);
$nombre1=utf8_decode(strtoupper($result->fields["nombre"]));
$nro_os=utf8_decode($result->fields["nro_os"]);
$nro_afiliado=utf8_decode($result->fields["nro_afiliado"]);
$apellido=utf8_decode(strtoupper($result->fields["apellido"]));



 $nombre_completo1 = $apellido." ".$nombre1;

$nro_paciente=utf8_decode($result->fields["nro_paciente"]);
$nombre=utf8_decode($result->fields["nombre"]);
$apellido=utf8_decode($result->fields["apellido"]);
 $fecha_nacimiento=utf8_decode($result->fields["fecha_nacimiento"]);
 $sexo=utf8_decode($result->fields["sexo"]);
 
 	  

IF ($fecha_nacimiento == "0000-00-00"){
$edad = "SIN CARGAR";
}ELSE{
$edad = calculaEdad($fecha_nacimiento);
}



$sql1="select * from datos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$nombre_os=utf8_decode(strtoupper($result1->fields["sigla"]));
/*$dia = substr($fecha_grabacion,8,2);
$mes= substr($fecha_grabacion,5,2);
$anio = substr($fecha_grabacion,0,4);

echo $fecha_mostrar = $dia."/".$mes."/".$anio;
*/





$pdf->setPaciente($cod_grabacion);
$pdf->setFecha($fecha_realizacion);
$pdf->setNombre($nombre_completo1);


$pdf->setObra($nombre_os);

$pdf->setAfiliado($nro_afiliado);




$pdf->setRenglon($ren1);
$pdf->setRenglon2($ren2);

 

$pdf->AddPage();



$v = "blanco2.jpg";
$pdf->SetY(20);
$pdf->Image('../../../logos/'.$v,10,2,190);


/*$va = "micro.jpg";
$pdf->SetY(20);
  $pdf->Image('../../../logos/'.$va,10,13,30);*/

$pdf->SetY(10);
$pdf->Cell(200,5,'Bioquímica: Sandra Segura',0,0,'C');
$pdf->ln();
$pdf->Cell(200,5,'Matricula: 1459',0,0,'C');
//$pdf->ln();
//$pdf->Cell(185,5,'Av. Libertad 637 - Villa Nueva - Gllen - Mendoza - TEL: (0261) 4211081 - CEL. (0261) 5097706',0,0,'C');

$pdf->SetFont('ARIAL','B',22);
$pdf->SetY(35);
 
$pdf->Cell(200,10,'DESCARGA TUS RESULTADOS ',0,0,'C');
$pdf->ln();
 

$pdf->line(10,30,200,30);

$pdf->SetFont('arial','B',12);

define('SECTION',chr(400));
$a = SECTION;
/*

$pdf->SetY(50);
 $pdf->SetX(30);

$pdf->Cell(50,6,$a.' QUÍMICA CLÍNICA');
$pdf->ln(); $pdf->SetX(30);

$pdf->Cell(50,6,$a.' MARCADORES TUMORALES');
$pdf->ln(); $pdf->SetX(30);
$pdf->Cell(50,6,$a.' DOSAJES HORMONALES');
$pdf->ln(); $pdf->SetX(30);
$pdf->Cell(50,6,$a.' INMUNOLOGIA');
$pdf->ln(); $pdf->SetX(30);
$pdf->Cell(50,6,$a.' BACTERIOLOGIA');


$pdf->SetY(55);
 $pdf->SetX(130);
$pdf->SetFont('times','B',22);
$pdf->Cell(50,6,'Sandra B. Segura');

$pdf->SetY(63);
 $pdf->SetX(145);
$pdf->SetFont('ARIAL','',12);
$pdf->Cell(50,6,'BIOQUIMICA');
$pdf->SetY(68);
 $pdf->SetX(148);
 $pdf->SetFont('ARIAL','',12);
$pdf->Cell(50,6,'Mat. 1459');
*/


$nombre = substr($nombre,0,22);
$nombre_medico = substr($nombre_medico,0,22);



$pdf->SetFont('arial','',10);

$pdf->ln();


$pdf->SetY(50);

$pdf->ln();


$pdf->SetX(20);
$pdf->Cell(50,5,'Estimado/a: '.$nombre_completo1);
$pdf->ln();

$pdf->SetFont('arial','B',10);
 $pdf->Cell(50,5,' Acceso WEB');
$pdf->SetFont('arial','',10);

 $pdf->ln();

 $pdf->Cell(50,5,' Ingrese a la página www.laboratoriosegura.com en el sector de Descargar tus informes');

  $pdf->ln();

   $pdf->Cell(50,5,' ingresando tu Documento y la contraseña "laboratorio"');

  $pdf->ln();


   $pdf->ln();

 $pdf->SetFont('arial','B',10);
 $pdf->Cell(50,5,' Acceso QR');

 $pdf->ln();
$pdf->SetFont('arial','',10);
  $pdf->Cell(50,5,'Utilice un lector QR en su celular');

  $pdf->ln();

 $v = $PNG_WEB_DIR.basename($filename);

$v = "test37698d59e694490fc5dfadf917d15171.png"

$pdf->Cell(50,5,'Estimado/a: '.$v);
 
 
 
$pdf->SetFont($letra,'',11);
 



$pdf->Output();



<?php
$nro_paciente;
require('../../../drivers/fpdf/fpdf.php');
require('../../../drivers/fpdf/mc_table.php');
require('../../../drivers/fpdf/rounded_rect.php');
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


$ren1 = $direccion." ".$localidad." ".$telefono;
$ren2 = $mail;


class PDF2 extends FPDF
{


function RoundedRect($x, $y, $w, $h, $r, $style = '')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' || $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
        $xc = $x+$w-$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));

        $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
        $xc = $x+$w-$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
        $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
        $xc = $x+$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
        $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
        $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }


    var $nroPac;
//Page header
function Header()
{
    //Logo

	$a = "HP.jpg";


$this->SetY(3);
 $this->Image('../../../logos/'.$a,45,2.50,30);
//$this->SetTextColor(255,255,255); 
    //times bold 15
$this->SetFont($letra,'',9);



$this->SetLineWidth(0.0);
$this->SetFillColor(255);
$this->RoundedRect(10, 32, 190, 17, 4.5, 'DF');

$this->SetFont('Times', 'B', 18);
$this->Cell(210,5,'CLINICA DEL PILAR',0,0,C);
$this->setY(15);

$this->SetFont('Times','B',16);
$this->Cell(210,5,'Centro Médico Más',0,0,C);
$this->setY(25);

$this->SetFont('Times','BI',14);
$this->Cell(210,5,'Servicio de Análisis Clínicos',0,0,C);


$this->SetFont('Times','BI',14);

//$this->setY(15);
//$this->setx(10);

//$this->Cell(200,5,'Dr. Barrera Martín',0,0,C);

//$this->setY(20);
//$/this->setx(10);
//$this->SetFont('Times','',12);
//$this->Cell(200,5,'Bioquímico',0,0,C);



$this->setY(25);
$this->setx(10);
$this->SetFont('Times','',10);
$this->Cell(200,5,'',0,0,C);
	
	$this->SetFont('ARIAL','',12);

$this->setY(35);
$this->setx(15);

$a = substr($this->getNombre(),0,24);
$this->Cell(40,5,'Apellido y Nombre: '.$a);

$this->setx(120);
$this->Cell(40,5,'DNI: '.$this->getDni());

$this->setx(155);
$this->Cell(40,5,'Fecha: '.$this->getFecha());



$this->setY(40);
$this->setx(15);

$this->Cell(40,5,'Medico: '.$this->getObra());
$this->setx(120);
$this->Cell(40,5,'O.S: '.$this->getInstitucion());
$this->setx(155);

$this->Cell(40,5,'Nº: '.$this->getPaciente());







$this->Sety(55);
$this->Setx(150);

}

function Footer()
{
	


$this->SetY(-30);

    //Select times italic 8
    $this->Ln();
    $this->SetFont('Times','',12);
    //Print centered page number


$ren1 = "";
$ren2 = "";


  $this->Cell(0,5,$this->getRenglon(),0,0,'C');
$this->Ln();
    $this->Cell(0,5,$this->getRenglon2(),0,0,'C');

$this->Ln();
    $this->Cell(0,5,$this->PageNo(),0,0,'C');

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




function setDni($nrodni) {
    $this->nroDni = $nrodni;
}

function getDni() {
    return $this->nroDni;
}





function setNombre($nom) {
    $this->nroNom = $nom;
}

function getNombre() {
    return $this->nroNom;
}



function setInstitucion($ins) {
    $this->nroIns = $ins;
}

function getInstitucion() {
    return $this->nroIns;
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
    return $this->nroObra;
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
$hoja = "A4";
//Instanciation of inherited class
$pdf=new PDF2('P','mm',$hoja); 
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


$domicilio = $direccion." - ".$localidad." - ".$telefono;
  $sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);

$nro_paciente=$result->fields["nro_paciente"];
$nombre1=strtoupper($result->fields["nombre"]);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];
$apellido=strtoupper($result->fields["apellido"]);
$documento=strtoupper($result->fields["nro_documento"]);


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

$pdf->setDni($documento);



$pdf->setNombre($nombre_completo1);
$pdf->setInstitucion($nombre_os);

$pdf->setObra($nombre_medico);



$pdf->setAfiliado($nro_afiliado);


$ren1 = "San Martín 1867 - Godoy Cruz - Mendoza ";
$ren2 = "Tel.: 424-2054 / Cel: 155-099399";


$pdf->setRenglon($ren1);
$pdf->setRenglon2($ren2);

$caratula = "NO";
if ($caratula == "SI"){

$pdf->AddPage();


$v = "blanco.jpg";
$pdf->SetY(20);
  $pdf->Image('../../../logos/'.$v,10,2,220);




//

$pdf->SetFont($letra,'B',20);
$pdf->Cell(190,10,'LABORATORIO DE BIOQUIMICA CLINICA',0,1,'C');


$pdf->Cell(190,10,'DR. BARRERA MARTIN',0,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(190,5,"",0,1,'C');


$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(200,5,"* ANALISIS CLINICOS  * BACTERILOGICOS  * HORMONAS",0,0,C);
$pdf->Ln();
$pdf->Cell(200,5,"* MONITOREO DE DROGAS  * ALTA COMPLEJIDAD",0,0,C);
$pdf->Ln();


// 

$pdf->Sety(45);
$pdf->SetFont($letra,'B',14);


$pdf->Cell(190,10,"",0,1,'C');

$nombre = substr($nombre,0,22);

$nombre_medico = substr($nombre_medico,0,22);


$pdf->Ln();

 $pdf->line(10,64,200,64);

$pdf->SetFont('arial','B',12);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(30,60,30,60));

srand(microtime()*1000000);
$pdf->Row(array('Paciente: ',$nombre_completo1,"Doctor: ",$nombre_medico));
$pdf->Row(array('Fecha: ',$fecha_mostrar,"Protocolo: ",$cod_grabacion));
$pdf->Row(array('O. Social: ',$nombre_os,"Afiliado: ",$nro_afiliado));

 $pdf->line(10,82,200,82);

$pdf->Ln();
$pdf->Ln();

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(200,5,"",0,0,C);

$pdf->Ln();
$pdf->Cell(200,5,"",0,0,C);
 
 
 
 /*
$pdf->SetFont('Arial','B',9);
$pdf->Cell(100,5,"* CLINICA MONTES");
$pdf->SetFont('Arial','',9);

$pdf->SetX(120);
$pdf->Cell(100,5,"- ANALISIS CLINICOS DE ALTA COMPLEJIDAD");


$pdf->Ln();
$pdf->Cell(100,5,"Montecaseros 1447 - Ciudad - Mendoza");

$pdf->Ln();
$pdf->Cell(100,5,"Tel: (0261) 420-3139");
$pdf->SetX(120);
$pdf->Cell(100,5,"- ENDOCRINOLOGIA");


$pdf->Ln();

$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,5,"* FLORIDA SALUD");
$pdf->SetFont('Arial','',9);
$pdf->SetX(120);
$pdf->Cell(100,5,"- BACTERIOLOGIA");


$pdf->Ln();
$pdf->Cell(190,5,"Esq. Cabildo y C.Godoy Cruz 6115 - Bº Santa Ana - Guaymallén");

 $pdf->Ln();

$pdf->Cell(190,5,"Tel: (0261) 426-9191");
$pdf->SetX(120);
$pdf->Cell(100,5,"- INMUNOLOGIA");
*/
// $pdf->Ln();

//$pdf->Cell(190,5,"www.bioquimicosmendoza.com.ar",0,1,'C');

}




#echo $pdftest->getPaciente();m.a
//for($i=1;$i<=40;$i++)
//    $pdftest->Cell(0,10,'Printing line number '.$i,0,1);


//$pdf=new PDF('L','mm',$hoja); 

$pdf->SetFont($letra,'',11);
//$contador = 1;
include ("simple_a4.php");
//$contador = 1;
//include ("modulos.php");

//include ("complejos.php");





/// fin

if ($firma == "SI"){
include ("firma.php");
}





$pdf->Output();


// 428-7755
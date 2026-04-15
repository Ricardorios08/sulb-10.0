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



$this->SetY(3);
//  $this->Image('../../../logos/'.$a,170,2,40);
$this->SetTextColor(50,60,100); 
    //times bold 15
$this->SetFont($letra,'',9);



$this->SetLineWidth(0.0);
$this->SetFillColor(240);
$this->RoundedRect(10, 5, 190, 17, 4.5, 'DF');

$this->setY(10);
$this->setx(10);

$this->SetFont('Times', 'B', 16);
$this->Cell(200,5,'REQUISITOS OBRAS SOCIALES',0,0,C);

$this->setY(30);
$this->setx(10);
}

function Footer()
{
	


$this->SetY(-30);

    //Select times italic 8
    $this->Ln();
    $this->SetFont('Times','',10);
    //Print centered page number



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
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
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
$pdf=new PDF2('P','mm','A4'); 
$pdf->SetDisplayMode(80,'default'); 

//$pdftest=new PDF2();
$pdf->AliasNbPages();
//$pdf->AddPage();
$pdf->SetFont('Times','',12);


$nro_os = $_REQUEST['nro_os'];

 $sql1="select * from datos_os where nro_os = $nro_os order by sigla";
$result1 = $db->Execute($sql1);

  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


$pdf->AddPage();

 $denominacion=strtoupper($result1->fields["denominacion"]);
  $sigla=strtoupper($result1->fields["sigla"]);
   $nro_os=strtoupper($result1->fields["nro_os"]);


$pdf->SetTextColor(15,15,15);

$pdf->SetFont('ARIAL','',12);

$pdf->Cell(190,5,"Denominacion: ".$denominacion,0,1,'L');
$pdf->Ln();
$pdf->Cell(190,5,"Sigla: ".$sigla." (".$nro_os.")",0,1,'L');
$pdf->Ln();

$pdf->SetTextColor(194,8,8);
$pdf->Cell(200,5,'CONVENIO CON ABM',0,1,'L');
$pdf->SetTextColor(15,15,15);
 $sql="select * from arancel_migrado where nro_os = $nro_os";
$result = $db->Execute($sql);
   $uh=$result->fields["uh"];
   $uh_especiales=$result->fields["uh_especiales"];
   $uh_alta=$result->fields["uh_alta"];

$pdf->SetFont('Arial','',12);



$pdf->Cell(50,5,"PMO: ");
$pdf->Cell(50,5,$uh);
$pdf->Ln();
$pdf->Cell(50,5,"Baja Frecuencia: ");
$pdf->Cell(50,5,$uh_especiales);
$pdf->Ln();
$pdf->Cell(50,5,"Alta Frecuencia: ");
$pdf->Cell(50,5,$uh_alta);




$pdf->Ln();
$pdf->Ln();

$sql="select * from requisitos_os where nro_os = $nro_os";
$result = $db->Execute($sql);
  $requisitos=$result->fields["requisitos"];
  $planes=$result->fields["planes"];

$pdf->SetTextColor(194,8,8);
$pdf->Cell(200,5,'REQUISITOS ABM',0,1,'L');
$pdf->SetTextColor(15,15,15);

$pdf->write(5,$requisitos);
$pdf->Ln();
$pdf->Ln();
$pdf->write(5,$planes);
$pdf->Ln();

$pdf->SetTextColor(194,8,8);
$pdf->Cell(200,5,'PLANES',0,1,'L');
$pdf->SetTextColor(15,15,15);

$sql3="select * from planes_os where nro_os = $nro_os";
$result3 = $db->Execute($sql3);
   if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
	  
	  $nombre_plan=$result3->fields["nombre_plan"];
  	  $reducido_plan=$result3->fields["reducido_plan"];

if ($nombre_plan == "TODOS"){
$pdf->write(5,"PARA TODOS LOS PLANES ".$texto,0);
}ELSE{
$pdf->write(5,$nombre_plan." ".$texto,0);
}
$pdf->Ln();
$result3->MoveNext();
	}


$sql3="select * from planes_os where nro_os = $nro_os";
$result3 = $db->Execute($sql3);
   if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
	  
	  $nombre_plan=$result3->fields["nombre_plan"];
  	  $reducido_plan=$result3->fields["reducido_plan"];
 $texto=$result3->fields["texto"];

  $comunes=$result3->fields["comunes"];
  $especiales=$result3->fields["especiales"];
  $alta=$result3->fields["alta"];
$coseguro=$result3->fields["coseguro"];





$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetTextColor(194,8,8);
$pdf->Cell(200,5,'AUTORIZACION DE PRACTICAS PLAN.'.$nombre_plan,0,1,'L');
$pdf->SetTextColor(15,15,15);

$pdf->SetFont('Arial','',12);

$pdf->Cell(50,5,"PMO: ");
$pdf->Cell(50,5,$comunes);
$pdf->Ln();
$pdf->Cell(50,5,"Baja Frecuencia: ");
$pdf->Cell(50,5,$especiales);
$pdf->Ln();
$pdf->Cell(50,5,"Alta Frecuencia: ");
$pdf->Cell(50,5,$alta);

$pdf->Ln();
$pdf->Ln();
$pdf->SetTextColor(194,8,8);

$pdf->Cell(200,5,'COSEGURO PLAN: '.$nombre_plan,0,1,'L');
$pdf->SetTextColor(15,15,15);

$pdf->Cell(50,5,"¿Cobrar coseguro? ");
$pdf->Cell(50,5,$coseguro);
$pdf->Ln();



$result3->MoveNext();
	}

$sql4="select * from a_practicas_rechazadas where nro_os = $nro_os and tipo = 'R' order by cod_practica";
$result4 = $db->Execute($sql4);
  $cod_practica=$result4->fields["cod_practica"];

  if ($cod_practica != ''){

$pdf->Ln();
$pdf->SetTextColor(194,8,8);
$pdf->Cell(200,5,'ANEXO PRACTICAS NO INCLUIDAS EN CONVENIO',0,1,'L');
$pdf->SetTextColor(15,15,15);
$pdf->Ln();

$sql3="select * from a_practicas_rechazadas where nro_os = $nro_os and tipo = 'R' order by cod_practica";
$result3 = $db->Execute($sql3);
   if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
	  
	  $cod_practica=$result3->fields["cod_practica"];

$sql="select * from convenio_practica where cod_practica = $cod_practica";
$result = $db->Execute($sql);
  $practica=$result->fields["practica"];
    $plan=$result3->fields["plan"];


$pdf->Cell(20,5,$cod_practica,0);
$pdf->Cell(120,5,substr($practica,0,45),0);
$pdf->Cell(30,5,$plan,0);

$pdf->Ln();

$result3->MoveNext();
	}

  }



$sql31="select * from a_practicas_rechazadas where nro_os = $nro_os and tipo = 'A' order by cod_practica";
$result31 = $db->Execute($sql31);

 $cod_practica11=$result31->fields["cod_practica"];

IF ($cod_practica11 != ""){



$pdf->Ln();
$pdf->SetTextColor(194,8,8);
$pdf->Cell(200,5,'ANEXO PRACTICAS QUE REQUIEREN AUTORIZACION',0,1,'L');
$pdf->SetTextColor(15,15,15);
$pdf->Ln();

$sql3="select * from a_practicas_rechazadas where nro_os = $nro_os and tipo = 'A' order by cod_practica";
$result3 = $db->Execute($sql3);
   if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
	  
	  $cod_practica=$result3->fields["cod_practica"];
	    $plan=$result3->fields["plan"];

$sql="select * from convenio_practica where cod_practica = $cod_practica";
$result = $db->Execute($sql);
  $practica=$result->fields["practica"];



$pdf->Cell(20,5,$cod_practica,0);
$pdf->Cell(120,5,substr($practica,0,45),0);
$pdf->Cell(30,5,$plan,0);
$pdf->Ln();

$result3->MoveNext();
	}


}



	$result1->MoveNext();
	}







$pdf->Output();




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

$tamanio = 9;

$usuario= $_REQUEST['usuario'];
$sql="select * from informe where id = $usuario";
$result = $db->Execute($sql);
$caratula=strtoupper($result->fields["caratula"]);
$hoja=strtoupper($result->fields["hoja"]);
$firma=strtoupper($result->fields["firma"]);

$sql="select * from datos_principales  id = $usuario";
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
	$a = "sistema.png";

$this->SetY(45);
  //$this->Image('../../../logos/'.$a,150,2,40);
//$this->SetTextColor(50,60,100); 
    //Arial bold 15
$this->SetFont('Arial','',8);

$this->Cell(40,5,'Apellido y Nombre: ');
$this->SetFont('Arial','B',10);
$this->Cell(40,5,$this->getNombre());
$this->SetFont('Arial','',8);

$this->ln();
$this->ln();
$this->Cell(40,5,'Solicitado por: ');
$this->SetFont('Arial','B',10);
$this->Cell(40,5,$this->getMedico());
$this->SetFont('Arial','',8);
$this->ln();
$this->ln();
$this->Cell(40,5,'Fecha:');
$this->SetFont('Arial','B',10);
$this->Cell(40,5,$this->getFecha());
$this->SetFont('Arial','',8);


$this->ln();
$this->ln();
$this->Cell(40,5,'Nº: ');
$this->SetFont('Arial','B',10);
$this->Cell(40,5,$this->getPaciente());
$this->SetFont('Arial','',8);
$this->ln();
//$this->line(10,45,200,45);
$this->line(10,80,200,80);
}

function Footer()
{
	


$this->SetY(-25);
  

    //Select Arial italic 8
    $this->Ln();
    $this->SetFont('Arial','I',8);
    //Print centered page number

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



function setMedico($med) {
    $this->nromed= $med;
}

function getMedico() {
    return $this->nromed;
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
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'R';
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
$pdf=new PDF2('P','mm',$hoja); 
$pdf->SetDisplayMode(real,'default'); 

//$pdftest=new PDF2();
$pdf->AliasNbPages();
//$pdf->AddPage();
$pdf->SetFont('Times','',12);

$sql = "SELECT * FROM archivos";
$result = $db->Execute($sql);
$id=$result->fields["id"];


$sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);
$nombre=$result->fields["nombre"];

$sql="select * from ordenes where cod_grabacion = $cod_grabacion";
$result = $db->Execute($sql);
$nombre_medico=$result->fields["nombre_medico"];

$domicilio = $direccion." - ".$localidad." - ".$telefono;
$sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);

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


$nombre = $apellido." ".$nombre;

$nro_os=$result->fields["nro_os"];
$nro_documento=$result->fields["nro_documento"];

$sql1="select * from datos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$nombre_os=strtoupper($result1->fields["sigla"]);


$fecha_mostrar;


$pdf->setPaciente($nro_paciente);
$pdf->setFecha($fecha_mostrar);
$pdf->setNombre($nombre);

$pdf->setRenglon($ren1);
$pdf->setRenglon2($ren2);
$pdf->setMedico($nombre_medico);



if ($caratula == "SI"){

$pdf->AddPage();


$v = "blanco.jpg";
$pdf->SetY(20);
  $pdf->Image('../../../logos/'.$v,10,2,58);


$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial','B',14);
$pdf->Cell(190,10,'LABORATORIO DE ANALISIS',1,1,'');


$pdf->Cell(190,10,'CLINICOS Y BACTERIOLOGICOS',1,1,'');

$pdf->SetFont('Arial','',12);
$pdf->Ln();



$pdf->Cell(40,5,'Apellido y Nombre: '.$nombre);
$pdf->ln();

$pdf->Cell(40,5,'Nº Protocolo: '.$cod_grabacion);
$pdf->ln();
 
$pdf->Cell(40,5,'Fecha: '.$fecha_mostrar);

$pdf->ln();
$pdf->Cell(40,5,'Solicitado por: '.$nombre_medico);

$pdf->Sety(25);
$pdf->Setx(150);
$pdf->ln();
}


#echo $pdftest->getPaciente();
for($i=1;$i<=40;$i++)
//    $pdftest->Cell(0,10,'Printing line number '.$i,0,1);


//$pdf=new PDF('L','mm',$hoja); 





$sql2="select * from ordenes join detalle on (ordenes.cod_grabacion = detalle.cod_grabacion) where ordenes.nro_paciente = $nro_paciente and ordenes.cod_grabacion = $cod_grabacion";
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
$medico=strtoupper($result2->fields["medico"]);
$confirmada=strtoupper($result2->fields["confirmada"]);
$nro_practica=strtoupper($result2->fields["nro_practica"]);



if ($nro_practica == 711){


$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_orina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$valor=$result11->fields["valor"];
$referencia=strtoupper($result11->fields["referencia"]);


$densidad= $result11->fields["densidad"];
$color= $result11->fields["color"];
$aspecto= $result11->fields["aspecto"];
$sedimento= $result11->fields["sedimento"];
$reaccion= $result11->fields["reaccion"];
$proteinas= $result11->fields["proteinas"];
$glucosa= $result11->fields["glucosa"];
$biliares= $result11->fields["biliares"];
$cetonicos= $result11->fields["cetonicos"];
$hemoglobina= $result11->fields["hemoglobina"];
$epiteliales= $result11->fields["epiteliales"];

$leucocito= $result11->fields["leucocito"];
$piocitos=$result11->fields["piocitos"];
$hematies=$result11->fields["hematies"];
$cilindros=$result11->fields["cilindros"];
$mucus=$result11->fields["mucus"];
$uratos=$result11->fields["uratos"];
$observaciones_orina =$result11->fields["observaciones"];
$nitritos = $result11->fields["nitritos"];


 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',10);
$pdf->Cell(40,10,$nombre_practica);
$pdf->SetFont('Arial','U',$tamanio);
$pdf->ln();


$pdf->Cell(50,5,"EXAMEN FISICO",0);     
//$pdf->Cell(50,5,"NORMAL",0);
$pdf->Cell(40,5,"EXAMINADA",0); 
$pdf->Cell(50,5,"EXAMEN QUIMICO",0);
$pdf->SetFont('Arial','',$tamanio);
$pdf->Ln();
$pdf->Ln(); 
// $pdf->line(10,50,200,50);

$pdf->Cell(50,5,"Densidad: ",0);     
//$pdf->Cell(50,5,"1015-1025",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(40,5,$densidad,0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(40,5,"Proteinas: ",0);

if ($proteinas == "NO CONTIENE"){$pdf->SetFont('Arial','',$tamanio);}ELSE{$pdf->SetFont('Arial','B',$tamanio);}
$pdf->Cell(60,5,$proteinas,0);   
$pdf->SetFont('Arial','',$tamanio);
$pdf->Ln(); 
$pdf->Ln();



$pdf->Cell(50,5,"Color: ",0);     
//$pdf->Cell(50,5,"Am Ambar ",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(40,5,$color,0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(40,5,"Glucosa: ",0);
if ($glucosa == "NO CONTIENE"){$pdf->SetFont('Arial','',$tamanio);}ELSE{$pdf->SetFont('Arial','B',$tamanio);}
$pdf->Cell(60,5,$glucosa,0);     
$pdf->Ln(); 
$pdf->Ln();

$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,"Aspecto: ",0);     
//$pdf->Cell(50,5,"Limpido",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(40,5,$aspecto,0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(40,5,"Pig. Biliares: ",0);
if ($biliares == "NO CONTIENE"){$pdf->SetFont('Arial','',$tamanio);}ELSE{$pdf->SetFont('Arial','B',$tamanio);}
$pdf->Cell(60,5,$biliares,0);     
$pdf->Ln(); 
$pdf->Ln();

$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,"Sedimento: ",0);     
//$pdf->Cell(50,5,"Escaso",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(40,5,$sedimento,0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(40,5,"Cuerpos cetónicos: ",0);
if ($cetonicos == "NO CONTIENE"){$pdf->SetFont('Arial','',$tamanio);}ELSE{$pdf->SetFont('Arial','B',$tamanio);}
$pdf->Cell(60,5,$cetonicos,0);     
$pdf->Ln(); 
$pdf->Ln();

$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,"Reacción: ",0);     
//$pdf->Cell(50,5,"Acida",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(40,5,$reaccion,0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(40,5,"Hemoglobina: ",0);
if ($hemoglobina == "NO CONTIENE"){$pdf->SetFont('Arial','',$tamanio);}ELSE{$pdf->SetFont('Arial','B',$tamanio);}

$pdf->Cell(60,5,$hemoglobina,0);     
$pdf->Ln();
$pdf->Ln();


$pdf->Cell(50,5,"",0);     

$pdf->Cell(40,5,'',0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(40,5,"Nitritos: ",0);
if ($nitritos == "NO CONTIENE"){$pdf->SetFont('Arial','',$tamanio);}ELSE{$pdf->SetFont('Arial','B',$tamanio);}
$pdf->Cell(60,5,$nitritos,0);     
$pdf->Ln();

$pdf->Ln();

$pdf->Ln();
$pdf->SetFont('Arial','BIU',$tamanio);
$pdf->Cell(0,5,"EXAMEN MICROSCOPICO DEL SEDIMENTO",0,0,'C');
$pdf->Ln(); 
$pdf->SetFont('Arial','',8);
$pdf->Cell(0,10,"(Aumento de 400 x)",0,0,'C');
$pdf->Ln(); 

//$pdf->line(10,135,200,135);

$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,"Celulas Epiteliales",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(40,5,$epiteliales,0);
$pdf->Ln(); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Ln(); 
$pdf->Cell(50,5,"Leucocitos",0); 
$pdf->SetFont('Arial','B',$tamanio);
 
$pdf->Cell(50,5,$leucocito,0);
$pdf->SetFont('Arial','',$tamanio);
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->Cell(50,5,"Piocitos (pl. de pus) ",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(40,5,$piocitos,0);
$pdf->SetFont('Arial','',$tamanio);
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->Cell(50,5,"Hematíes",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(40,5,$hematies,0);
$pdf->SetFont('Arial','',$tamanio);
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->Cell(50,5,"Cilindros",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(40,5,$cilindros,0);
$pdf->SetFont('Arial','',$tamanio);
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->Cell(50,5,"Mucus ",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(40,5,$mucus,0);
$pdf->SetFont('Arial','',$tamanio);
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->Cell(50,5,"Cristales",0); 
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(40,5,$uratos,0);
$pdf->SetFont('Arial','',$tamanio);
$pdf->Ln(); 
$pdf->Ln(); 

$pdf->Ln(); 
$pdf->Cell(50,5,"Observaciones",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(50,5,$observaciones_orina,0);  
$pdf->SetFont('Arial','',$tamanio);


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

$pdf->SetFont('Arial','BIU',$tamanio);
$pdf->Cell(40,10,$nombre_practica);
$pdf->SetFont('Arial','',$tamanio);
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


$pdf->AddPage();
//include ("enca_pdf.php");



$pdf->Ln();

 $sql11="select * from detalle_hemo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$hematies=number_format($result11->fields["hematies"]);
$hemoglobina=number_format($result11->fields["hemoglobina"],2);
$hematocrito=number_format($result11->fields["hematocrito"],2);
$reticulocitos=number_format($result11->fields["reticulocitos"],2);
$plaquetas=number_format($result11->fields["plaquetas"],2);
$mcv=number_format($result11->fields["mcv"],2);
$mch=number_format($result11->fields["mch"],2);
$mchc=number_format($result11->fields["mchc"],2);

 $leucocitos=$result11->fields["leucocitos"];
$neutro_cayado=$result11->fields["neutro_cayado"];
$neutro_segmentado=$result11->fields["neutro_segmentado"];
$eosinofilos=$result11->fields["eosinofilos"];
$basofilos=$result11->fields["basofilos"];
$linfocitos=$result11->fields["linfocitos"];
$monocitos=$result11->fields["monocitos"];



$carac_plaquetas=$result11->fields["carac_plaquetas"];
$carac_leucocitos=$result11->fields["carac_leucocitos"];
$carac_hematies=$result11->fields["carac_hematies"];
$carac_hematies2=$result11->fields["carac_hematies2"];


$observaciones =$result11->fields["observaciones"];
$formula =strtoupper($result11->fields["formula"]);


 $absoluto_neutro_cayado = $leucocitos * $neutro_cayado/100;
$absoluto_neutro_segmentado= $leucocitos * $neutro_segmentado/100;
 $absoluto_eosinofilos= $leucocitos * $eosinofilos/100;
$absoluto_basofilos= $leucocitos * $basofilos/100;
$absoluto_linfocitos= $leucocitos * $linfocitos/100;
$absoluto_monocitos= $leucocitos * $monocitos/100;

$total_leucocitos = $neutro_cayado + $neutro_segmentado + $eosinofilos + $basofilos + $linfocitos + $monocitos;
$total_absoluto_leucocitos = $absoluto_neutro_cayado + $absoluto_neutro_segmentado + $absoluto_eosinofilos + $absoluto_basofilos + $absoluto_linfocitos + $absoluto_monocitos;


 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',$tamanio);
$pdf->Cell(40,10,$nombre_practica);
$pdf->SetFont('Arial','B',$tamanio);

$pdf->Ln();
$pdf->SetX(120);
  $pdf->Cell(50,5,"FORMULA LEUCOCITARIA CADA 100 LEUCOCITOS",0);
  $pdf->Ln(); //Esto hace un cambio de línea 

$pdf->SetX(145);
$pdf->Cell(40,10,"V. RELATIVO");

if ($formula == "SI"){
	
$pdf->SetX(175);
$pdf->Cell(40,10,"V. ABSOLUTO");
}
  $pdf->ln();
$pdf->SetFont('Arial','B',9);

$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();

  $pdf->Cell(50,5,"Hematíes",0);   
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,$hematies,0); 
 $pdf->SetFont('Arial','',$tamanio);
  $pdf->Cell(20,5," x mm³",0); 



  $pdf->Cell(50,5,"Neutrófilos en cayado",0);
$pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(20,5,number_format($neutro_cayado,0));
 $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(160);
  $pdf->Cell(20,5,"%");
  
    if ($formula == "SI"){
$pdf->SetX(185);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,number_format($absoluto_neutro_segmentado));
$pdf->SetFont('Arial','',$tamanio);
$pdf->SetX(195);
$pdf->Cell(60,5,"x mm³");
}
 
  $pdf->Ln(); //Esto hace un cambio de línea 
  $pdf->ln();
  /////////////////////////////
  $pdf->Cell(50,5,"Hemoglobina",0);   
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,$hemoglobina,0);  
  $pdf->SetFont('Arial','',$tamanio);
 $pdf->Cell(20,5,"gr %",0); 


$pdf->Cell(50,5,"Neutrófilos segmentado",0);
  $pdf->SetFont('Arial','B',$tamanio);

  $pdf->Cell(20,5,number_format($neutro_segmentado,0)); 
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(160);
  $pdf->Cell(20,5,"%");

if ($formula == "SI"){
$pdf->SetX(185);
  $pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,number_format($absoluto_neutro_cayado));
$pdf->SetX(195);
  $pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(20,5,"x mm³");
}


  $pdf->ln();
    $pdf->ln();




  /////////////////////////////
  $pdf->Cell(50,5,"Hematocrito",0);  
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,$hematocrito,0);   
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5,"%",0); 
  

$pdf->Cell(50,5,"Eosinofilos",0);
      
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(60,5,number_format($eosinofilos,0));    
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(160);
  $pdf->Cell(60,5,"%");
  

   if ($formula == "SI"){
	   
$pdf->SetX(185);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,number_format($absoluto_eosinofilos));
$pdf->SetFont('Arial','',$tamanio);
$pdf->SetX(195);
$pdf->Cell(60,5,"x mm³");
}





  $pdf->Ln(); //Esto hace un cambio de línea 
  $pdf->ln();

    $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(50,5,"Leucocitos",0);


    $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,number_format($leucocitos),0);  

 $pdf->SetFont('Arial','',$tamanio);
	$pdf->Cell(20,5," x mm³",0); 
  
$pdf->Cell(50,5,"Basófilos",0);
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,number_format($basofilos,0));  
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(160);
  $pdf->Cell(20,5,"%");
     if ($formula == "SI"){
$pdf->SetX(185);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,number_format($absoluto_basofilos));
$pdf->SetFont('Arial','',$tamanio);
$pdf->SetX(195);
$pdf->Cell(60,5,"x mm³");
}




  $pdf->Ln(); //Esto hace un cambio de línea 
  $pdf->ln();
  /////////////////////////////
  $pdf->Cell(50,5,"Reticulocitos",0);   
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,$reticulocitos,0); 
  $pdf->SetFont('Arial','',$tamanio);
      $pdf->Cell(20,5," x mm³",0); 
  
$pdf->Cell(50,5,"Linfocitos",0);
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,number_format($linfocitos,0)); 
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(160);
  $pdf->Cell(20,5,"%");

     if ($formula == "SI"){
$pdf->SetX(185);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,number_format($absoluto_linfocitos));
$pdf->SetFont('Arial','',$tamanio);
$pdf->SetX(195);
$pdf->Cell(60,5,"x mm³");
}


  $pdf->Ln(); //Esto hace un cambio de línea 
  $pdf->ln();
  /////////////////////////////
  $pdf->Cell(50,5,"Plaquetas",0); 
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,$plaquetas,0);   
  $pdf->SetFont('Arial','',$tamanio);
   $pdf->Cell(20,5," x mm³",0);
  
$pdf->Cell(50,5,"Monocitos",0);
  $pdf->SetFont('Arial','B',$tamanio);
  $pdf->Cell(15,5,number_format($monocitos,0)); 
  $pdf->SetFont('Arial','',$tamanio);
  $pdf->SetX(160);
  $pdf->Cell(20,5,"%");


if ($formula == "SI"){
$pdf->SetX(185);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,number_format($absoluto_monocitos));
$pdf->SetFont('Arial','',$tamanio);
$pdf->SetX(195);
$pdf->Cell(60,5,"x mm³");
}


 
  

$pdf->Cell(50,5,"",0);     
$pdf->Cell(40,5,"",0);

  

if ($formula == "SI"){
//  $pdf->line(100,85,203,85);
  $pdf->Ln(); 
  }else{
  //$pdf->line(100,85,170,85);
  $pdf->Ln(); 
	  }
  /////////////////////////////

  $pdf->ln();


/*$pdf->SetX(145);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,$total_leucocitos);
$pdf->SetFont('Arial','',$tamanio);
$pdf->SetX(160);
$pdf->Cell(20,5,"%");


if ($formula == "SI"){
$pdf->SetX(185);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,5,number_format($total_absoluto_leucocitos));
$pdf->SetFont('Arial','',$tamanio);
$pdf->SetX(195);
$pdf->Cell(60,5,"x mm³");
}
*/
  $pdf->ln();

  $pdf->Ln(); //Esto hace un cambio de línea 
  $pdf->ln();
$pdf->SetFont('Arial','BU',$tamanio);
$pdf->Cell(50,6,"Características: ",0);
  $pdf->ln();

  $pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,6,"Plaquetas",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,6,$carac_plaquetas,0); 
$pdf->SetFont('Arial','',$tamanio);


$pdf->ln();
$pdf->Ln();

$pdf->Cell(50,6,"Leucocitos",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,6,$carac_leucocitos,0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Ln();
$pdf->ln();
$pdf->Cell(50,6,"Hematíes",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,6,$carac_hematies,0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Ln();
$pdf->Cell(50,6,"",0);
$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(60,6,$carac_hematies2,0); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
 //$pdf->line(10,112,200,112);
//$pdf->Cell(50,6,"OBSERVACIONES",0);

//$pdf->Cell(60,6,$observaciones,0); 

}elseif ($nro_practica == 764){
	
include ("detalle_proteinograma.php");
$pdf->AddPage();
$pdf->ln();
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
 $conta = $conta + 1;


IF (($conta_comun == 1) or ($conta_comun == 0)){
$pdf->AddPage();
//include ("enca_pdf.php");

$pdf->ln();


}

if ($conta == 10){
$pdf->AddPage();
$pdf->ln();
$conta = 0;
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

$metodo=$result11->fields["metodo"];
//$metodo = nl2br( stripslashes( htmlentities($metodo)));

$det = substr($nombre_practica,0,22);

$tipo_det=$result11->fields["tipo_det"];


SWITCH ($tipo_det){


case "Desde-Hasta": {
//$sql11="select * from convenio_referencia where cod_practica =  $nro_practica and tipo like '$sexo'";
$sql11="select * from convenio_referencia where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$det.": ",0);     

 
  

$pdf->SetFont('Arial','B',11);
$pdf->Cell(40,5,$valor." ".$unidad,0); 
$pdf->SetFont('Arial','I',$tamanio);
 
 IF ($metodo == ""){
$pdf->Cell(20,5,$metodo,0);
 }else{
$pdf->Cell(20,5,"Método: ".$metodo,0);
 }

$pdf->Ln(); 



 

$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(70,40,60));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array($columna1,$columna2, $desde.' - '.$hasta." ".$unidad));


breaK;}


case "Sin Valor Ref.": {
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

$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$det.": ",0);     

 
  

$pdf->SetFont('Arial','B',$tamanio);
$pdf->Cell(10,5,$valor); 
$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(10,5,$unidad,0); 

 
 IF ($metodo == ""){
$pdf->Cell(20,5,$metodo,0);
 }else{
$pdf->Cell(20,5,"Método: ".$metodo,0);
 }

$pdf->Ln(); 



 


breaK;}



CASE "Años":{
 $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $edad between anio_d and anio_h";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
 $hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$det.": ",0);     

 
  

$pdf->SetFont('Arial','B',11);
$pdf->Cell(40,5,$valor." ".$unidad,0); 
$pdf->SetFont('Arial','',$tamanio);
 
 IF ($metodo == ""){
$pdf->Cell(20,5,$metodo,0);
 }else{
$pdf->Cell(20,5,"Método: ".$metodo,0);
 }


$pdf->Ln(); 



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





break;}

CASE "Años Sexo":{
 $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $edad between anio_d and anio_h and tipo like '$sexo'";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$det.": ",0);     

 
  

$pdf->SetFont('Arial','B',11);
$pdf->Cell(40,5,$valor." ".$unidad,0); 
$pdf->SetFont('Arial','',$tamanio);
 
 IF ($metodo == ""){
$pdf->Cell(20,5,$metodo,0);
 }else{
$pdf->Cell(20,5,"Método: ".$metodo,0);
 }


$pdf->Ln(); 



$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(30,40,20,40));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array($columna1,$columna2, 'Años: '.$anio_d."-".$anio_h ,$desde.' - '.$hasta." ".$unidad));


break;}



CASE "Valores":{


  $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and $valor between desde and hasta";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=$result11->fields["columna1"];
$columna2=$result11->fields["columna2"];

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$det.": ",0);     

 
  

$pdf->SetFont('Arial','B',11);
$pdf->Cell(40,5,$valor." ".$unidad,0); 
$pdf->SetFont('Arial','I',$tamanio);

 IF ($metodo == ""){
$pdf->Cell(20,5,$metodo,0);
 }else{
$pdf->Cell(20,5,"Método: ".$metodo,0);
 }


$pdf->Ln(); 



 

$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(70,40,60));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

 
$pdf->Row(array($columna1,$columna2, $desde.' - '.$hasta." ".$unidad));



break;}

CASE "Valores Hasta":{


 




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


$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$det.": ",0);     

 
  

$pdf->SetFont('Arial','B',11);
$pdf->Cell(40,5,$valor." ".$unidad,0); 
$pdf->SetFont('Arial','I',$tamanio);
 
 IF ($metodo == ""){
$pdf->Cell(20,5,$metodo,0);
 }else{
$pdf->Cell(20,5,"Método: ".$metodo,0);
 }


$pdf->Ln(); 



 

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



break;}



CASE "Valores Sexo":{


  $sql11="select * from convenio_referencia where cod_practica =  $nro_practica and tipo like '$sexo'";
$result11 = $db->Execute($sql11);


$tipo=strtoupper($result11->fields["tipo"]);

 
$desde=$result11->fields["desde"];
$hasta=$result11->fields["hasta"];
$columna1=strtoupper($result11->fields["columna1"]);
$columna2=strtoupper($result11->fields["columna2"]);

$anio_d=$result11->fields["anio_d"];
$anio_h=$result11->fields["anio_h"];

$pdf->SetFont('Arial','',$tamanio);
$pdf->Cell(50,5,$det.": ",0);     

 
  

$pdf->SetFont('Arial','B',11);
$pdf->Cell(40,5,$valor." ".$unidad,0); 
$pdf->SetFont('Arial','I',$tamanio);
 
 IF ($metodo == ""){
$pdf->Cell(20,5,$metodo,0);
 }else{
$pdf->Cell(20,5,"Método: ".$metodo,0);
 }


$pdf->Ln(); 



 

$pdf->SetFont('Arial','',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(70,40,60));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);

 
$pdf->Row(array($columna1,$columna2, $desde.' - '.$hasta." ".$unidad));



break;}









}






$pdf->Ln(); 




}


$result2->MoveNext();

	}



/// fin

if ($firma == "SI"){
include ("firma.php");
}





$pdf->Output();


// 428-7755

 
 
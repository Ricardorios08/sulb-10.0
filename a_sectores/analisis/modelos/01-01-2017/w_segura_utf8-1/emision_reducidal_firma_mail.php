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
$this->Cell(40,5,'Protocolo: '.$this->getPaciente());
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



$sql2="select * from ordenes where cod_grabacion = $cod_grabacion";
$result2 = $db->Execute($sql2);

 $nombre_medico=utf8_decode(strtoupper($result2->fields["nombre_medico"]));
 $fecha_realizacion=strtoupper($result2->fields["fecha_realizacion"]);

$dia1 = substr($fecha_realizacion,8,2);
$mes1 = substr($fecha_realizacion,5,2);
$anio1 = substr($fecha_realizacion,0,4);

$fecha_realizacion = $dia1."/".$mes1."/".$anio1;

$pdf->setPaciente($cod_grabacion);
$pdf->setFecha($fecha_realizacion);
$pdf->setNombre($nombre_completo1);


$pdf->setObra($nombre_os);

$pdf->setAfiliado($nro_afiliado);




$pdf->setRenglon($ren1);
$pdf->setRenglon2($ren2);

if ($caratula == "SI"){

$pdf->AddPage();



$v = "blanco2.jpg";
$pdf->SetY(20);
$pdf->Image('../../../logos/'.$v,10,2,190);


/*$va = "micro.jpg";
$pdf->SetY(20);
  $pdf->Image('../../../logos/'.$va,10,13,30);*/

$pdf->SetY(10);
$a = utf8_decode('Bioquimica: Sandra Segura');
$pdf->Cell(200,5,$a,0,0,'C');
$pdf->ln();
$a = utf8_decode();
$pdf->Cell(200,5,'Matricula: 1459',0,0,'C');
//$pdf->ln();
//$pdf->Cell(185,5,'Av. Libertad 637 - Villa Nueva - Gllen - Mendoza - TEL: (0261) 4211081 - CEL. (0261) 5097706',0,0,'C');

$pdf->SetFont('ARIAL','B',22);
$pdf->SetY(35);
 
$pdf->Cell(200,10,'LABORATORIO',0,0,'C');
$pdf->ln();
$a = utf8_decode('De Análisis Clínicos');
$pdf->Cell(200,10,$a,0,0,'C');

$pdf->line(10,30,200,30);

$pdf->SetFont('arial','B',12);

define('SECTION',chr(400));
$a = SECTION;
/*

$pdf->SetY(50);
 $pdf->SetX(30);

$pdf->Cell(50,6,$a.' QU�MICA CL�NICA');
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



$pdf->SetFont('arial','B',12);

$pdf->ln();


$pdf->SetY(100);



$pdf->SetX(20);
$pdf->Cell(50,5,'Paciente: '.$nombre_completo1);
$pdf->ln();

$pdf->SetX(20);
$pdf->Cell(50,5,'Solicitado pr Dr/a: '.$nombre_medico);

 $pdf->SetX(160);
$pdf->Cell(50,5,'Fecha: '.$fecha_realizacion);
$pdf->ln();
//$pdf->AddPage();
$pdf->setY(18);
$pdf->setx(30);

$pdf->AddPage();
}






$pdf->SetFont($letra,'',11);
//$contador = 1;
include ("simple_firma.php");
//$contador = 1;
//include ("modulos.php");

//include ("complejos.php");





/// fin

if ($firma == "SI"){
include ("firma.php");
}





unlink('informe_generado.pdf'); 

// $pdf->Output("informe_generado.pdf");

$pdf->Output('F', 'informe_generado.pdf');
 getcwd() . "\n";



 
   $sql2="select * from ordenes where cod_grabacion = $cod_grabacion";
$result2 = $db->Execute($sql2);


$validada=strtoupper($result2->fields["validada"]); 
 $validada_por=strtoupper($result2->fields["validada_por"]); 

if ($validada_por == ''){
echo "<h3>Debe estar validado para enviar por mail </H3>";
?><a href="../../analisis/emision_mod.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&usuario=<?php print("$usuario");?>">Volver</a>
<?php 
exit;
}


   $sql2="select * from pacientes_mail where nro_paciente = $nro_paciente";
$result2 = $db->Execute($sql2);
 $Email=$result2->fields["mail"]; 



if ($Email == ''){
echo "<h3>Debe tener un mail cargado para poder enviar resultados</H3>";
/*echo "<a href='../emision_mod.php?nro_paciente=print($nro_paciente)&&cod_grabacion=print($cod_grabacion);?>&&fecha_grabacion=print($fecha_grabacion')&&usuario=print('$usuario')'>Volver a la orden</a>";*/


?><a href="../../analisis/emision_mod.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&usuario=<?php print("$usuario");?>">Volver</a>
<?php 
exit;
}




  $nombre_completo1 = $apellido." ".$nombre1;


    //Capturar datos del formulario en variables
    
    
    $Mensaje = "Fecha de realización: ".$fecha_mostrar;

	//$Email = "rios.05@gmail.com";
    $archivo_fijo="informe_generado.pdf"; // aca va el archivo adjuntar  pdf 
    //----encabezado--------
    $laboratorio="Informe de Laboratorio Segura";
    $asunto=utf8_decode("Resultado Laboratorio Segura - NO-REPLY - (No contestar)");
    $mail_lab="informes@laboratoriosegura.com";
    //------------------------------
	$dir1 = "Av. Libertad 637 - (frente Banco Santander) Villa Nueva - Gllen - Mendoza";
	$dir2 = "TEL FIJO: (0261)3951370 - CEL. (0261)5097706  | bqcasegura@gmail.com";

    require("../../../drivers/archivosmail/class.phpmailer.php");
    $mail = new PHPMailer();

    $mail->From     = $mail_lab;
    $mail->FromName = $laboratorio;
    //*****Direcci�n a la que llegaran los mensajes*****

	$mail->AddAddress($Email);
	$Email1 = "bios.segura@gmail.com";
	$mail->AddCC($Email1);

   
    // Aqu� van los datos que apareceran en el correo que se envia
    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "$asunto";
    $mail->Body     =  "Estimado/a: $nombre_completo1 \n<br/>"." le adjuntamos informe N° $cod_grabacion \n<br /><br />".
    "$Mensaje \n<br /><br /> Agradecemos  su confianza. <br /> Muchas Gracias - Laboratorio Segura<br /> Bioq. Sandra Segura <br /><br />	$dir1 <br />$dir2 	";


$mail->isSMTP(); // Usar SMTP
$mail->Host = 'smtp.hostinger.com'; // Servidor SMTP
$mail->SMTPAuth = true; // Habilitar autenticación SMTP
$mail->Username = 'no-reply@laboratoriosegura.com.ar'; // Tu correo electrónico
$mail->Password = 'S0p0rt3s2021#'; // Tu contraseña
$mail->SMTPSecure = 'ssl'; // Habilitar cifrado SSL
$mail->Port = 465; // Puerto SMTP


$mail->setFrom('no-reply@laboratoriosegura.com.ar', 'Laboratorio Segura'); // Remitente
$mail->addAddress('bqcasegura@gmail.com'); // Destinatario
$mail->addReplyTo('no-reply@laboratoriosegura.com.ar', 'Laboratorio Segura'); // Dirección de respuesta
$mail->ConfirmReadingTo = 'bios.segura@gmail.com'; // Confirmación de lectura

$mail->AddAttachment($archivo_fijo); // Adjuntar archivo


 
	 /*
	 $mail->IsSMTP(); 
    $mail->Host = "https://mail.yahoo.com"; //Servidor de Salida.
    $mail->SMTPAuth = true; 
    $mail->Username = "laboratoriobellsar@yahoo.com.ar"; //Correo Electr�nico
    $mail->Password = "Rivadavia412"; //Contrase�a
*/


    if ($mail->Send()) {
      $a = "ENVIADO";

	  
	    $sql2="select * from ordenes_mail where cod_grabacion = $cod_grabacion";
$result2 = $db->Execute($sql2);


$cod_grabacion_mail=$result2->fields["cod_grabacion"]; 
 $cantidad=$result2->fields["cantidad"]+1; 



if ($cod_grabacion_mail == ""){
 $sql = "INSERT INTO ordenes_mail (`cod_grabacion`, `enviado`, `cantidad`) VALUES ('$cod_grabacion', 'SI', '1')";
 $result = $db->Execute($sql);
}else{
    $sql = "UPDATE ordenes_mail SET  `cantidad` = '$cantidad' WHERE cod_grabacion= $cod_grabacion";
 $result = $db->Execute($sql);
}

echo "<h3> MAIL ENVIADO A ".$Email."</h3>";

echo "<h5> Asunto: ".$asunto."</h5>";


echo "<h5> Estimado/a: $nombre_completo1 \n<br/>"." le adjuntamos informe N� $cod_grabacion \n<br /><br />".
    "$Mensaje \n<br /><br /> Agradecemos  su confianza. <br /> Muchas Gracias - Laboratorio Segura<br /> Bioq. Sandra Segura <br /><br />	$dir1 <br />$dir2	";

echo "<br>";
echo "<br>";

?><a href="../../analisis/emision_mod.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&usuario=<?php print("$usuario");?>">Volver a la orden</a>
<?php 

	}else{
        echo "<script>alert('Error al enviar el formulario');</script>";
	}




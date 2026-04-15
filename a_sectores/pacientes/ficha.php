	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script language="javascript">
function on_load()
{
document.getElementById("nro_paciente").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "nro_paciente":
				document.getElementById("nro_afiliado").focus();
				break;
				case "nro_afiliado":
				document.getElementById("nombre").focus();
				break;
				case "nombre":
				document.getElementById("nro_documento").focus();
				break;
				case "nro_documento":
				document.getElementById("nro_os").focus();
				break;
				case "nro_os":
				document.getElementById("domicilio").focus();
				break;

				case "domicilio":
				document.getElementById("telefono").focus();
				break;
				case "telefono":
				document.getElementById("celular").focus();
				break;
				case "celular":
				document.getElementById("dia").focus();
				break;
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("anio").focus();
				break;
				case "anio":
				document.getElementById("GUARDAR").focus();
				break;

				


				
		}
		return false;
	}
	return true;
}


</script>



<style type="text/css">
<!--
body {
	background-image: url(../../imagenes/ficha11.jpg);
	background-repeat: no-repeat;
}
.style2 {font-size: 12px; }
-->
</style>

<!-- <body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();"> -->

<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close(); cerrar()"> 
<?php 

 function CalculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}


//qr
$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

//html PNG location prefix
$PNG_WEB_DIR = 'temp/';

include "../../drivers/phpqrcode/qrlib.php";    

//ofcourse we need rights to create temp dir
if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);

$filename = $PNG_TEMP_DIR.'test.png';

$matrixPointSize = 10;
$errorCorrectionLevel = 'L';




include ("../../conexiones/config.inc.php");

$nro_paciente = $_REQUEST['nro_paciente'];


$sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);

$nro_paciente=$result->fields["nro_paciente"];
$nro_afiliado=$result->fields["nro_afiliado"];
$nombre=$result->fields["nombre"];
$apellido=$result->fields["apellido"];


$tipo_doc=$result->fields["tipo_doc"];
$nro_documento=$result->fields["nro_documento"];


$leer="http://www.laboratoriosegura.com.ar/laboratorio.6.0/a_sectores/medicos/index.php?usuario1="."$nro_documento";
$filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
QRcode::png($leer, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 


$nro_os=$result->fields["nro_os"];
$domicilio=$result->fields["domicilio"];
$localidad=$result->fields["localidad"];
$telefono=$result->fields["telefono"];
$celular=$result->fields["celular"];
$sexo=$result->fields["sexo"];
$fecha_nacimiento=$result->fields["fecha_nacimiento"];

$dia = substr($fecha_nacimiento,8,2);
$mes= substr($fecha_nacimiento,5,2);
$anio = substr($fecha_nacimiento,0,4);

	IF ($fecha_nacimiento == "0000-00-00"){
$edad = "SIN CARGAR";
}ELSE{
$edad = calculaEdad($fecha_nacimiento);
}

 $sql1="select * from datos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$denominacion=strtoupper($result1->fields["denominacion"]);



?>



<br>
<div class="container" style="border: 1px solid rgba(0, 0, 0, 0)!important">

<center>
<h4>DESCARGA TUS RESULTADOS</h4> <table>
<tr>
  <td width="162" rowspan="3"><h4 align="center"></h4>    </td>
  <td height="20%" colspan="2"><div align="center">Estimado/a <?php echo $apellido;?> <?php echo $nombre;?> </div></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td height="20%" colspan="2"><p class="style2"> Ingrese a la página www.laboratoriosegura.com en el sector de Descargar tus informes ingresando tu Documento y la contraseña "laboratorio"  </p></td>
	<td width="172"><div align="center"> <h5 align="center">Acceso WEB</h5>
	</div></td>
</tr>
<tr>
  <td width="443" height="80%">  <p class="style2"> Utilice un lector QR en su celular</p>
    <p class="style2">Fecha Impresion: <?php echo date("d-m-Y");?></p></td>
	<td width="209"><div align="center" class="style2"><?php echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" width="120" height="120"/>';?></div></td>
	<td><h5 align="center">&nbsp;Acceso Celular</h5>    </td>
</tr>
<tr>
  <td height="80%" colspan="4"><div align="center">Gracias por confiar tu salud en nuestro Laboratorio.</div></td>
</tr>
<tr>
  <td height="80%" colspan="4"><div align="center"> Atte. Bioq. Sandra Segura</div></td>
</tr>
<tr>
  <td height="80%" colspan="4">&nbsp;</td>
</tr>
<tr>
  <td height="80%" colspan="4"><div align="center"> Av. Libertad 637 - (frente Banco Santander) Villa Nueva - Gllen - MendozaÚ</div></td>
</tr>
<tr>
  <td height="80%" colspan="4"><div align="center">    TEL FIJO: (0261)3951370 - CEL. (0261)5097706</div></td>
  </tr>
</table>

 
 <p>&nbsp;</p>

<p>&nbsp;</p>

<!-- 

<div class="card text-center" style="border: 1px solid rgba(0, 0, 0, 0)!important">
<h1>Acceso al Informe por WEB</h1>

<p> Ingrese a la página wwww.marianalespina.com en el sector de Descargar tus informes ingresando tu Documento y la contraseña "laboratorio" y podrá ver sus resultados  </p>





<br>
  
  <h1>Acceso al Informe por Celular </h1>
  <p>Utilice un lector QR en su celular y lo derivará a todos los informes validados por el profesional</p>
  <div class="card-body">
    <h5 class="card-title"></h5>
    
   <?php echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" width="180" height="180"/>';?></p>
   
</div>
</div>
 -->



<!-- 


<form action="modificar_paciente.php" method="post">
<table width="766" height="436" border="0">
     
    <tr bordercolor="#FFFFFF">
      <td height="29" colspan="3"><div align="left">
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <p>&nbsp;</p>
                <p><strong>FICHA  PACIENTE </strong></p>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </div></td>
  </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td width="306" height="29">
      <div align="right"> N&ordm; PACIENTE </div></td>
      <td width="145"> &nbsp;</td>
      <td width="301"><div align="left">
      <?php echo $nro_paciente;?>     </div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="29">
      <div align="right">N&ordm; AFILIADO </div></td>
      <td> &nbsp;</td>
      <td>        <?php echo $nro_afiliado;?>    </td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">APELLIDO Y NOMBRE </div></td>
      <td>&nbsp;</td>
      <td>        <?php echo $nombre;?></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">TIPO DOCUMENTO</div></td>
      <td>&nbsp;</td>
      <td>                <?php echo $tipo_doc;?></td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">N&ordm; DOCUMENTO</div></td>
      <td>&nbsp;</td>
      <td>
  <?php echo $nro_documento;?></td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">OBRA SOCIAL </div></td>
      <td>&nbsp;</td>
      <td><?php echo $denominacion;?> (<?php echo $nro_os;?>)  </td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">DOMICILIO</div></td>
      <td>&nbsp;</td>
      <td><?php echo $domicilio;?></td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">LOCALIDAD</div></td>
      <td>&nbsp;</td>
      <td><?php echo $localidad;?><font size="2">&nbsp;      </td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">TEL. FIJO </div></td>
      <td>&nbsp;</td>
      <td><strong>
   <?php echo $telefono;?>   </strong></td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">EDAD</div></td>
      <td>&nbsp;</td>
      <td><?php echo $edad;?> </td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">FECHA NACIMIENTO</div></td>
      <td>&nbsp;</td>
      <td><?php echo $dia;?> / <?php echo $mes;?> / <?php echo $anio;?></td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right">SEXO</div></td>
      <td>&nbsp;</td>
      <td>        <?php echo $sexo;?> </td>
    <tr bordercolor="#FFFFFF">
      <td height="29"><div align="right"></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
</table>
 -->
 <?php 

include ("../../../conexiones/config.inc.php");
$a = $_GET['id'];
$sql="select * from datos_os where nro_os like '$a'";
$result = $db->Execute($sql);

  
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$nro_os=strtoupper($result->fields["nro_os"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$sigla=strtoupper($result->fields["sigla"]);
$inscripcion=strtoupper($result->fields["inscripcion"]);
$cuit=strtoupper($result->fields["cuit"]);
$domicilio_l=strtoupper($result->fields["domicilio_l"]);
$cod_area_l=strtoupper($result->fields["cod_area_l"]);
$telefono_l=strtoupper($result->fields["telefono_l"]);
$telefax_l=strtoupper($result->fields["telefax_l"]);
$email_l=strtoupper($result->fields["email_l"]);

$domicilio_n=strtoupper($result->fields["domicilio_n"]);
$cod_area_n=strtoupper($result->fields["cod_area_n"]);
$telefono_n=strtoupper($result->fields["telefono_n"]);
$telefax_n=strtoupper($result->fields["telefax_n"]);
$email_n=$result->fields["email_n"];

$nro_prestador=strtoupper($result->fields["nro_prestador"]);
$contacto=strtoupper($result->fields["contacto"]);
$nivel=strtoupper($result->fields["nivel"]);
$cargo=strtoupper($result->fields["cargo"]);

switch ($inscripcion){
	case "1":{
$inscripcion = "RESPONSABLE INSCRIPTO";
BREAK;
	}

case "2":{
$inscripcion = "RESPONSABLE NO INSCRIPTO";
BREAK;
	}

	case "3":{
$inscripcion = "MONOTRIBUTISTA";
BREAK;
	}

	case "4":{
$inscripcion = "EXENTO";
BREAK;
	}

}

?>

<link href="file:///C|/utiles/EasyPHP1-7/www/bioquimica/provisorios/RICKY.css" rel="stylesheet" type="text/css">


<style type="text/css">
<!--
.Estilo5 {color: #000000}
.Estilo8 {
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo9 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo13 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.Estilo15 {
	color: #000000;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo20 {color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.Estilo21 {font-family: Arial, Helvetica, sans-serif}
.Estilo22 {font-size: 14px}
-->
</style>
<div align="center"><font size="3"></strong></legend> </font> </div>
<table width="537" border="0">
  <tr bgcolor="#FFFFFF">
    <td height="33" bordercolor="#FFFFFF"><div align="center" class="Estilo9">FICHA OBRA SOCIAL </div></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="33" bordercolor="#FFFFFF"><div align="center" class="Estilo5">
      <div align="center" class="Estilo8">
        <div align="left">Obra Social N&ordm;: <?php print("$nro_os");?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sigla:<?php print("$sigla");?></div>
        </div>
    </div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="33" bordercolor="#FFFFFF"><span class="Estilo8">Nombre: <?php print("$denominacion");?></span></td>
  </tr>
  <tr bgcolor="#EEEEEE">
    <td bordercolor="#FFFFFF" bgcolor="#FFFFFF"><hr noshade></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td bordercolor="#FFFFFF"><div align="left" class="Estilo5 Estilo21"><span class="Estilo22">Tipo de IVA: <strong><?php print("$inscripcion");?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td bordercolor="#FFFFFF"><span class="Estilo5 Estilo21"><span class="Estilo22">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CUIT: <strong><?php print("$cuit");?></strong></span></span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td bordercolor="#FFFFFF"><div align="right" class="Estilo5">
      <hr noshade>
    </div>    </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td bordercolor="#FFFFFF"><div align="right" class="Estilo5">
      <div align="center" class="Estilo13">DOMICILIO<span class="Estilo15"> NACIONAL</span></div>
    </div>      
    </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td bordercolor="#FFFFFF"><span class="Estilo20">Direccion: <?php print("$domicilio_n");?></span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td bordercolor="#FFFFFF"><span class="Estilo20">&nbsp;Telefono: <?php print("$telefono_n");?></span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td bordercolor="#FFFFFF"><span class="Estilo20">&nbsp;&nbsp;Tele-fax: <?php print("$telefax_n");?></span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td bordercolor="#FFFFFF"><span class="Estilo20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;email: <?php print("$email_n");?></span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td bordercolor="#FFFFFF"><hr noshade></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td bordercolor="#FFFFFF"><div align="center"><span class="Estilo13">DOMICILIO<span class="Estilo15"> NACIONAL</span></span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td bordercolor="#FFFFFF"><div align="right" class="Estilo20">
      <div align="left">Domicilio: <span class="Estilo5"><?php print("$domicilio_l");?></span></div>
    </div>      
      </td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="24" bordercolor="#FFFFFF"><div align="right" class="Estilo20">
      <div align="left">&nbsp;Telefono: <span class="Estilo5"><?php print("$telefono_l");?></span> </div>
    </div>      
      <div align="left" class="Estilo20"> </div>    <div align="center" class="Estilo20"></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="24" bordercolor="#FFFFFF"><div align="right" class="Estilo20"> </div>      
      <span class="Estilo20">&nbsp;&nbsp;Tele-fax: <?php print("$telefax_l");?></span></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td bordercolor="#FFFFFF"><div align="right" class="Estilo20">
      <div align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;email: <span class="Estilo5"><?php print("$email_l");?></span></div>
    </div>      
      </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td bordercolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="21" bordercolor="#FFFFFF"><hr noshade></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="21" bordercolor="#FFFFFF"><div align="center" class="Estilo5"><span class="Estilo13">PRESTADOR</span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="21" bordercolor="#FFFFFF"><span class="Estilo20">Contacto: <?php print("$contacto");?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N&ordm; Prestador: <?php print("$nro_prestador");?></span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="21" bordercolor="#FFFFFF"><span class="Estilo20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nivel: <?php print("$nivel");?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cargo: <?php print("$cargo");?></span></td>
  </tr>
<input type="button" name="imprimir" value="Imprimir" onclick="window.print();"> 
</table>


<?php 
$result->MoveNext();
	}
?>
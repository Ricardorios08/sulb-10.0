<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Grabación de Ordenes Inexistente</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">





<style type="text/css">
<!--
.Estilo1 {font-family: Arial, Helvetica, sans-serif}
.Estilo4 {font-size: 12px}
.Estilo6 {color: #FFFFFF}
.Estilo8 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; }
.Estilo9 {color: #000000}
.Estilo10 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; }
-->
</style>

<script language="javascript">
function on_load()
{
document.getElementById("afiliado").focus();
}



function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
							
				
				case "nro_orden":
				document.getElementById("afiliado").focus();
				break;
				
				case "afiliado":
				document.getElementById("prescriptor").focus();
				break;

				case "prescriptor":
				document.getElementById("fecha_orden").focus();
				break;
					
				case "fecha_orden":
				document.getElementById("autorizacion").focus();
				break;

				case "autorizacion":
				document.getElementById("coseguro").focus();
				break;

				case "coseguro":
				document.getElementById("OK").focus();
				break;

				case "nro_practica":
				document.getElementById("SI").focus();
				break;


				
		}
		return false;
	}
	return true;
}


</script>

</head>


<?php 
$nro_os = $_REQUEST['nro_os'];
$nro_laboratorio = $_REQUEST['nro_laboratorio'];
$periodo= $_REQUEST['periodo'];
$nro_orden= $_REQUEST['nro_orden'];
$afiliado= $_REQUEST['afiliado'];
$prescriptor= $_REQUEST['prescriptor'];
$fecha_orden= $_REQUEST['fecha_orden'];
$autorizacion= $_REQUEST['autorizacion'];
$coseguro= $_REQUEST['coseguro'];

include ("../../../conexiones/config_os.php");
$sql="select * from datos_os where nro_os = '$nro_os'";
$result = $db->Execute($sql);
$sigla=strtoupper($result->fields["sigla"]);

include ("../../../conexiones/config.inc.php");
$sql12="select * from datos_laboratorio where nro_laboratorio = '$nro_laboratorio'";
$result12 = $db->Execute($sql12);
$nombre_laboratorio=strtoupper($result12->fields["nombre_laboratorio"]);

switch ($periodo)
	{
		case "1":{$mes= "ENERO";}break;
		case "2":{$mes= "FEBRERO";}break;
		case "3":{$mes= "MARZO";}break;
		case "4":{$mes= "ABRIL";}break;
		case "5":{$mes= "MAYO";}break;
		case "6":{$mes= "JUNIO";}break;
		case "7":{$mes= "JULIO";}break;
		case "8":{$mes= "AGOSTO";}break;
		case "9":{$mes= "SETIEMBRE";}break;
		case "10":{$mes= "OCTUBRE";}break;
		case "11":{$mes= "NOVIEMBRE";}break;
		case "12":{$mes= "DICIEMBRE";}break;
				}


?>


<BODY onload = "on_load()">
<FORM name="form" ACTION="<?php php echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">

<table width="103%" cellpadding="3" cellspacing="0">
 <tr bgcolor="#CCFFCC" >
   <td colspan="3" bgcolor="#E6E6E6" class="left" ><div align="center"><strong>GRABACION DE ORDENES pagina 2 </strong></div></td>
   </tr>
 <tr bgcolor="#000099" class="Estilo4" >
   <td class="left" ><div align="center" class="Estilo8">
     <div align="left">Obra Social </div>
   </div></td>
   <td class="left" ><div align="center" class="Estilo8">
     <div align="left">Laboratorio / Cuenta </div>
   </div></td>
   <td class="Estilo4" ><div align="center" class="Estilo8">
     <div align="left">Mes</div>
   </div></td>
 </tr>
 <tr bgcolor="#CCFFCC" >
 <td width="22%" class="left" >
   <span class="Estilo4">
   <input type="text" size="4" name="nro_os" value="<?php echo $nro_os;?>"> 
   <?php echo$sigla;?></span></td>
  <td width="51%" class="left" >
<input type="text" size="4" name="nro_laboratorio" value="<?php echo $nro_laboratorio;?>">
 <span class="Estilo4"><?php echo $nombre_laboratorio;?>
</span></td>
  <td width="27%" class="Estilo4" >
<input type="text" size="1" name="periodo" onkeypress="return verif_caracter(this,event)" class="text" value="<?php echo $periodo;?>" id="periodo">

 <?php echo $mes;?>
</td>
 </tr>
 </table>
<table width="103%" cellpadding="5" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bgcolor="#E1F2EF" >
    <td width="322" class="left" >
      <div align="center" class="Estilo1 Estilo4 Estilo9">
        <div align="center">
          <label >N&ordm; Orden</label>
        </div>
    </div></td>
    <td width="82" class="left" ><div align="center" class="Estilo10">
        <div align="center">Nº Afiliado</div>
    </div></td>
    <td width="82" class="left" ><div align="center" class="Estilo10">
        <div align="center">Prescriptor</div>
    </div></td>
    <td width="58" class="left" ><div align="center" class="Estilo10">
        <div align="center">Fecha Orden</div>
    </div></td>
    <td width="37" class="left" ><div align="center" class="Estilo10">
        <div align="center">Autoriz.</div>
    </div></td>
    <td width="53" class="left" ><div align="center" class="Estilo10">
        <div align="center">Coseguro</div>
    </div></td>
    <td width="51" class="left Estilo1 Estilo4 Estilo6" ><div align="center" class="Estilo9">Practicas</div></td>
  </tr>
 
  <tr >
    <td class="left" ><div align="center"><span class="right">
        <input type="text" size="5" name="nro_orden"   id="nro_orden" value = "<?php echo $nro_orden;?>" onKeyPress="return verif_caracter(this,event)">
    </span></div></td>

	
    <td class="left" ><div align="center"><span class="right">
        <input type="text" size="14" name="afiliado"   id="afiliado" onKeyPress="return verif_caracter(this,event)">
    </span></div></td>
    <td class="left" ><div align="center"><span class="right">
        <input type="text" size="14" name="prescriptor"  value = "<?php echo $prescriptor;?>" id="prescriptor" onKeyPress="return verif_caracter(this,event)">
    </span></div></td>
    <td class="left" ><div align="center"><span class="right">
        <input type="text" size="10" name="fecha_orden"  value = "<?php echo $fecha_orden;?>" id="fecha_orden" onKeyPress="return verif_caracter(this,event)">
    </span></div></td>
    <td class="left" ><div align="center"><span class="right">
        <input type="text" size="6" name="autorizacion" class="text" value = "<?php echo $autorizacion;?>" id="autorizacion" onKeyPress="return verif_caracter(this,event)">
    </span></div></td>
    <td class="left" ><div align="center"><span class="right">
        <input type="text" size="5" name="coseguro"  value = "<?php echo $coseguro;?>" id="coseguro" onKeyPress="return verif_caracter(this,event)">
    </span></div></td>
    <td class="left" ><div align="center"><span class="right"><span class="Estilo4"><span class="right Estilo6">
    <input type="submit" name="GUARDAR" value="OK"> 
    </span></span>
      
  <!--  <input type="hidden" name="nro_os" value="<?php echo $nro_os;?>" > -->
        <!--   <input type="hidden" name="periodo" value="<?php echo $periodo;?>">  -->
    </span></div></td>
  </tr>
 



  <tr>

	<td height="28" colspan="7" valign="top" bgcolor="#C9FADF" class="Estilo4" > Afiliado: INEXISTENTE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </td>
</table>



</table>


</BODY>
</HTML>




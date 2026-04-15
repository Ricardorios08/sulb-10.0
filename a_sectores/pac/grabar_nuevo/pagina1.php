<?php  

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Grabación de Ordenes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Estilo1 {font-family: Arial, Helvetica, sans-serif}
.Estilo4 {font-size: 12px}
.Estilo6 {color: #FFFFFF}
.Estilo14 {color: #000099}
.Estilo11 {	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo17 {color: #000000; font-family: Arial, Helvetica, sans-serif; }
.Estilo18 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo19 {font-weight: bold}
-->
</style>






</head>


<?php 

$nro_os = $_REQUEST['nro_os'];
$nro_paciente = $_REQUEST['nro_paciente'];
$periodo= $_REQUEST['periodo'];
$primera_vez= $_REQUEST['primera_vez'];




 $anio= $_REQUEST['anio'];
 $anio_actual = date("y");
if (strlen($anio_actual) == 1){
$anio_actual = "0".$anio_actual;
}

$anio;
$anio_real = date("y");
$periodo_actual= date("m");

if ($anio > $anio_real){
$leyenda = "AÑO NO VALIDO";
include ("../../../alertas/campo_informacion2.php");
exit;
}

/*if ($periodo > $periodo_actual){
$leyenda = "MES INVALIDO";
include ("../../../alertas/campo_informacion2.php");
exit;
}
*/

if (($periodo < 1) or ($periodo > 12)){
$leyenda = "Periodo no valido";
include ("../../../alertas/campo_informacion2.php");
exit;
}
$lote= $_REQUEST['lote'];
$operador= $_REQUEST['operador'];

if (($operador < 100) or ($operador > 500)){
$leyenda = "Operador Inválido";
include ("../../../alertas/campo_informacion2.php");
exit;
}

include ("../../../conexiones/config.inc.php");
 $sql8="select * from grabadas_temp where operador = $operador";
$result8 = $db->Execute($sql8);
$cod_gra=strtoupper($result8->fields["cod_grabacion"]);

$sql = "DELETE FROM detalle_temp where cod_grabacion = $cod_gra";
$result = $db->Execute($sql);

$sql = "DELETE FROM grabadas_temp where operador like '$operador'";
$result = $db->Execute($sql);

 $sql22 = "SELECT * FROM `periodos_cerrados` WHERE nro_os = $nro_os and  periodo = $periodo AND anio = $anio and lote = '$lote'";
$result22 = $db->Execute($sql22);
 $facturado=strtoupper($result22->fields["facturado"]);

if ($facturado == "SI"){
$leyenda = "Ese Periodo de esa obra social con ese lote ya esta facturada";
include ("../../../alertas/campo_informacion2.php");
exit;

}

$result = $db->Close($sql);
include ("convenio.php");
if ($control_afiliados =="SI"){
	 $control_afiliados;
include ("../../grabacion/grabar/pagina1.php");
exit;
}



 if (($requiere_automatico == "SI") and ($requiere_autorizacion == "NO")) {?>

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
							
				
				case "afiliado":
				document.getElementById("prescriptor").focus();
				break;
				
				case "prescriptor":
				document.getElementById("tipo_afiliado").focus();
				break;

				case "tipo_afiliado":
				document.getElementById("dia").focus();
				break;

								
		
				case "dia":
				document.getElementById("mes").focus();
				break;

								case "mes":
				document.getElementById("coseguro").focus();
				break;
				
				case "autorizacion":
				document.getElementById("coseguro").focus();
				break;
				
				case "coseguro":
				document.getElementById("OK").focus();
				break;

								case "mes":
				document.getElementById("autorizacion").focus();
				break;				

			case "autorizacion":
				document.getElementById("OK").focus();
				break;
		}
		return false;
	}
	return true;
}


</script>

<?php 
}
elseif (($requiere_automatico == "SI") and ($requiere_autorizacion == "SI")){

	?>

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
							
				
				case "afiliado":
				document.getElementById("prescriptor").focus();
				break;
				
				case "prescriptor":
				document.getElementById("tipo_afiliado").focus();
				break;

				case "tipo_afiliado":
				document.getElementById("dia").focus();
				break;

								
		
				case "dia":
				document.getElementById("mes").focus();
				break;

								case "mes":
				document.getElementById("autorizacion").focus();
				break;
				
				case "autorizacion":
				document.getElementById("OK").focus();
				break;
				

				

			
		}
		return false;
	}
	return true;
}


</script>
<?php }
elseif (($requiere_automatico == "NO") and ($requiere_autorizacion == "SI")){?>

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
							
				
				case "afiliado":
				document.getElementById("prescriptor").focus();
				break;
				
				case "prescriptor":
				document.getElementById("tipo_afiliado").focus();
				break;

				case "tipo_afiliado":
				document.getElementById("nro_orden").focus();
				break;

				case "nro_orden":
				document.getElementById("dia").focus();
				break;
				
									case "prescriptor":
				document.getElementById("dia").focus();
				break;

				case "dia":
				document.getElementById("mes").focus();
				break;

								case "mes":
				document.getElementById("coseguro").focus();
				break;

				case "mes":
				document.getElementById("autorizacion").focus();
				break;

				case "coseguro":
				document.getElementById("OK").focus();
				break;

								case "mes":
				document.getElementById("OK").focus();
				break;

			
		}
		return false;
	}
	return true;
}


</script>
<?php }
elseif (($requiere_automatico == "NO") and ($requiere_autorizacion == "NO")){?>

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
							
				
				case "afiliado":
				document.getElementById("prescriptor").focus();
				break;
				
				case "prescriptor":
				document.getElementById("tipo_afiliado").focus();
				break;

				case "tipo_afiliado":
				document.getElementById("nro_orden").focus();
				break;

				case "nro_orden":
				document.getElementById("dia").focus();
				break;
				
									case "prescriptor":
				document.getElementById("dia").focus();
				break;

				case "dia":
				document.getElementById("mes").focus();
				break;


								case "mes":
				document.getElementById("dia_r").focus();
				break;

				case "dia_r":
				document.getElementById("mes_r").focus();
				break;


								case "mes_r":
				document.getElementById("coseguro").focus();
				break;

				case "mes_r":
				document.getElementById("autorizacion").focus();
				break;

				case "coseguro":
				document.getElementById("OK").focus();
				break;

								case "mes_r":
				document.getElementById("OK").focus();
				break;

			
		}
		return false;
	}
	return true;
}


</script>


<?php 

}


if (($nro_paciente == "") or ($nro_os == "") or ($periodo == "")) {
$leyenda = "No puede dejar campos vacios";
include ("../../../alertas/campo_vacio.php");

exit;
}

include ("../../../conexiones/config.inc.php");
echo $sql="select * from datos_os where nro_os = $nro_os";
$result = $db->Execute($sql);
$sigla=strtoupper($result->fields["sigla"]);

if ($sigla == ""){
$leyenda = "No existe Obra Social, Por Favor Ingrese Otra";
include ("../../../alertas/campo_vacio.php");
exit;
}



$sql12="select * from pacientes where nro_paciente = $nro_paciente";
$result12 = $db->Execute($sql12);
$nombre_laboratorio=strtoupper($result12->fields["nombre"]);

$sql="select * from usuarios where id = $operador";
$result = $db->Execute($sql);
$nombre_operador=strtoupper($result->fields["usuario"]);



if ($nombre_laboratorio == ""){
$leyenda = "Ese Laboratorio No existe, Por Favor Ingrese Otro";
include ("../../../alertas/campo_vacio.php");
exit;
}

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


<FORM name="form" ACTION="pagina_encabezado1.php" METHOD = "POST">

<table width="750" cellpadding="3" cellspacing="0">
 <tr bgcolor="#000099" >
   <td colspan="2" class="left" ><div align="center"><span class="left Estilo6"><span class="Estilo1"><strong><span class="Estilo14"><span class="Estilo6"><strong>GRABACION DE ORDENES</strong></span></span></strong></span></span></div></td>
   </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td width="33%" bgcolor="#C4D7E6" class="left" ><div align="right"><span class="left Estilo6"><span class="Estilo17">Operador: </span></span></div></td>
   <td width="67%" class="left" ><span class="left Estilo6"><span class="Estilo17"><strong><?php echo $operador." - ".$nombre_operador;?></strong></span></span></td>
 </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td bgcolor="#C4D7E6" class="left" ><div align="right"><span class="left Estilo6"><span class="Estilo17">Nombre Lote:</span></span></div></td>
   <td class="left" ><span class="left Estilo6"><span class="Estilo17"><strong>"<?php echo $lote;?>&quot;</strong></span></span></td>
 </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td bgcolor="#C4D7E6" class="left" ><div align="center" class="Estilo17">
     <div align="right">Obra Social : <span class="Estilo11">
     </span></div>
   </div>     <div align="center" class="Estilo17">
       <div align="right"><span class="Estilo1"></span></div>
   </div>   <div align="center" class="Estilo17">
       <div align="right"><span class="left  Estilo1"></span></div>
   </div></td>
   <td class="left" ><span class="Estilo11">
     <input type="hidden" size="4" name="nro_os" value="<?php echo $nro_os;?>">
     <?php echo$sigla;?> - <?php echo $nro_os;?></span></td>
 </tr> <input type="hidden"  name="primera_vez" value="<?php echo $primera_vez;?>">
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td bgcolor="#C4D7E6" class="left" ><div align="right"><span class="Estilo1">Paciente: <strong>
   </strong></span></div></td>
   <td class="left" ><span class="Estilo1"><strong>
     <input type="hidden" size="4" name="nro_laboratorio" value="<?php echo $nro_paciente;?>">
     <?php echo $nombre_laboratorio;?> <?php echo $nro_paciente;?> </strong></span></td>
 </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td bgcolor="#C4D7E6" class="left" ><div align="right"><span class="left  Estilo1">Mes: <strong>
   </strong></span></div></td>
      <td class="left" ><span class="left  Estilo1"><strong>
        <input type="hidden" size="1" name="periodo" onKeyPress="return verif_caracter(this,event)" class="text" value="<?php echo $periodo;?>" id="periodo2">
        <input name="lote" type="hidden" value="<?php echo $lote;?>">
        <?php echo $mes;?> <?php echo $periodo;?></strong></span></td>
      <input name="anio" type="hidden" value="<?php echo $anio;?>">
	     <input name="operador" type="hidden" value="<?php echo $operador;?>">
   </tr>
 </table>
<table width="750" cellpadding="1" cellspacing="0">
 <tr>
   <td colspan="2" bgcolor="#E6E6E6" class="left Estilo22" ><hr></td>
  </tr>
 <tr>
   <td width="30%" bgcolor="#F8C8A5" ><div align="right" class="Estilo25 Estilo26 Estilo1 Estilo4">Matricula Medico</div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="afiliado" type="text" id="afiliado" onKeyPress="return verif_caracter(this,event)"   value="" size="14" maxlength="14">
</span></td>
  </tr>
 <tr>
   <td bgcolor="#F8C8A5" ><div align="right" class="Estilo27 Estilo1 Estilo4">Nombre Medico :</div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="prescriptor" type="text" id="prescriptor" onKeyPress="return verif_caracter(this,event)" value="" size="6" maxlength="6">
   </span>     <div align="center"><span class="Estilo1 Estilo4 right"><strong>  </strong></span></div></td>
   </tr>
 
 <tr>
 <?php 
 $requiere_automatico;
 if ($requiere_automatico != "SI"){?>
   <td bgcolor="#F8C8A5" ><div align="right" class="Estilo18"><span class="Estilo19 Estilo20 Estilo23"><span class="right">N&ordm; Orden:</span></span></div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="nro_orden" type="text"  id="nro_orden" onKeyPress="return verif_caracter(this,event)" size="14" maxlength="12" >
   </span></td>
   </tr>
 <?php }?>
 <tr>
   <td bgcolor="#F8C8A5" ><div align="right" class="Estilo27 Estilo1 Estilo4">Fecha Practica: </div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input type="text" size="2" name="dia"  value="" id="dia" onKeyPress="return verif_caracter(this,event)" maxlength="2">
    /
    <input type="text" size="2" name="mes"  value="" id="mes" onKeyPress="return verif_caracter(this,event)" maxlength="2">
    / 20
    <input type="text" size="2" name="anio_o" value= "<?php echo $anio;?>"  id="anio" onKeyPress="return verif_caracter(this,event)" maxlength="2" >
   </span></td>
   </tr>
 <tr>
   <td bgcolor="#F8C8A5" ><div align="right"><span class="Estilo27 Estilo1 Estilo4">Fecha Realizaci&oacute;n</span></div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input type="text" size="2" name="dia_r"  value="" id="dia_r" onKeyPress="return verif_caracter(this,event)" maxlength="2">
/
<input type="text" size="2" name="mes_r"  value="" id="mes_r" onKeyPress="return verif_caracter(this,event)" maxlength="2">
/ 20
<input type="text" size="2" name="anio_o_r" value= "<?php echo $anio;?>"  id="anio_o" onKeyPress="return verif_caracter(this,event)" maxlength="2" >
   </span></td>
   </tr>

 <tr bgcolor="#FF0000">
   <td bgcolor="#000099" >&nbsp;</td>
   <td bgcolor="#000099" class="left" ><span class="right">
     <input type="submit" name="Alta" value="SIGUIENTE" id = "Alta2">
   </span></td>
 </tr>
</table>




</form>
</body>





</html>
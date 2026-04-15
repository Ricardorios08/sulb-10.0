<?php 
$nro_os = $_REQUEST['nro_os'];
include ("convenio.php");
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
-->
</style>

<?php 

echo "Pagina ggfecha";
$nro_laboratorio = $_REQUEST['nro_laboratorio'];
$periodo= $_REQUEST['periodo'];
$anio= $_REQUEST['anio'];
$operador= $_REQUEST['operador'];
$lote= $_REQUEST['lote'];
$coseguro= $_REQUEST['coseguro'];
$afiliado=$_REQUEST['afiliado'];
$prescriptor=$_REQUEST['prescriptor'];
$tipo_afiliado=$_REQUEST['tipo_afiliado'];

include ("control_medicos_varios.php");

if (($nro_laboratorio == "") or ($nro_os == "") or ($periodo == "")) {
$leyenda = "No puede dejar campos vacios";
include ("../../../alertas/campo_vacio.php");

exit;
}

include ("../../../conexiones/config_os.php");
$sql="select * from datos_os where nro_os = '$nro_os'";
$result = $db->Execute($sql);
$sigla=strtoupper($result->fields["sigla"]);

include ("../../../conexiones/config.inc.php");
$sql12="select * from datos_laboratorio where nro_laboratorio = '$nro_laboratorio'";
$result12 = $db->Execute($sql12);
$nombre_laboratorio=strtoupper($result12->fields["nombre_laboratorio"]);

$sql="select * from usuarios where id = '$operador'";
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


if ($requiere_automatico != "SI"){?>
<script language="javascript">
function on_load()
{
document.getElementById("nro_orden").focus();
}
</script>
<?php }else{?>
<script language="javascript">
function on_load()
{
document.getElementById("dia").focus();
}
</script>
<?php }?>

<script language="javascript">
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
				document.getElementById("nro_orden").focus();
				break;

				
				case "nro_orden":
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

				case "coseguro":
				document.getElementById("OK").focus();
				break;

				case "coseguro":
				document.getElementById("OK").focus();
				break;
				
		}
		return false;
	}
	return true;
}


</script>

</head>


<?php 



?>

<BODY onload = "on_load()">

<?php 

 $requiere_coseguro;
 $requiere_autorizacion;

	if (($requiere_coseguro == "NO") && ($requiere_autorizacion == "NO")){
?><FORM name="form" ACTION="pagina_encabezado1.php" METHOD = "POST"><?php }
elseif 	(($requiere_coseguro == "SI") && ($requiere_autorizacion == "NO")) { ?>
<FORM name="form" ACTION="pagina_demas.php" METHOD = "POST">
<?php }elseif 	(($requiere_coseguro == "NO") && ($requiere_autorizacion == "SI")){?>
<FORM name="form" ACTION="pagina_demas1.php" METHOD = "POST">
<?php }

$anio_actual = date("y");?>
<table width="103%" cellpadding="3" cellspacing="0">
 <tr bgcolor="#000099" >
   <td class="left" ><div align="center"><span class="left Estilo6"><span class="Estilo1"><strong><span class="Estilo14"><span class="Estilo6"><strong>GRABACION DE ORDENES</strong></span></span></strong></span> </span></div></td>
   </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td class="left" ><span class="left Estilo6"><span class="Estilo17">Nombre: <strong><?php echo $operador." - ".$nombre_operador;?></strong></span></span></td>
 </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td class="left" ><span class="left Estilo6"><span class="Estilo17">Nombre Lote:<strong>"<?php echo $lote;?>&quot;</strong></span></span></td>
 </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td class="left" ><div align="center" class="Estilo17">
     <div align="left">Obra Social : <span class="Estilo11">
     <input type="hidden" size="4" name="nro_os" value="<?php echo $nro_os;?>">
     <?php echo$sigla;?> - <?php echo $nro_os;?></span></div>
   </div>     <div align="center" class="Estilo17">
       <div align="left"><span class="Estilo1"></span></div>
     </div>   <div align="center" class="Estilo17">
       <div align="right"><span class="left  Estilo1"></span></div>
   </div></td>
   </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td class="left" ><span class="Estilo1">Laboratorio: <strong>
   <input type="hidden" size="4" name="nro_laboratorio" value="<?php echo $nro_laboratorio;?>">
   <?php echo $nombre_laboratorio;?> <?php echo $nro_laboratorio;?> </strong></span></td>
   </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td class="left" ><span class="left  Estilo1">Mes: <strong>
   <input type="hidden" size="1" name="periodo" onKeyPress="return verif_caracter(this,event)" class="text" value="<?php echo $periodo;?>" id="periodo22">
   <input name="lote" type="hidden" value="<?php echo $lote;?>">
   <?php echo $mes;?> <?php echo $periodo;?></strong></span></td>
      <input name="anio" type="hidden" value="<?php echo $anio;?>">
       <input name="operador" type="hidden" value="<?php echo $operador;?>">
          <input name="coseguro" type="hidden" value="<?php echo $coseguro;?>">
		  	<input name="tipo_afiliado" type="hidden" value="<?php echo $tipo_afiliado;?>">
   </tr>
 </table>




<style type="text/css">
<!--
.Estilo19 {color: #FFFFFF}
.Estilo20 {font-family: Arial, Helvetica, sans-serif}
.Estilo22 {color: #E6E6E6}
.Estilo23 {
	font-size: 12px;
	color: #000000;
}
.Estilo25 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo26 {color: #000000}
.Estilo27 {color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>
<table width="103%" cellpadding="1" cellspacing="0">
 <tr>
   <td colspan="2" bgcolor="#E6E6E6" class="left Estilo22" ><hr noshade></td>
  </tr>
 <tr>
   <td width="20%" bgcolor="#E6E6E6" ><div align="right" class="Estilo25 Estilo26">Nº Afiliado:</div></td>
   <td width="80%" bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="afiliado" type="text" id="afiliado" value="<?php echo $afiliado;?>" onKeyPress="return verif_caracter(this,event)"   size="14" maxlength="14">
  <?php echo $tipo_afiliado;?> </span></td>
  </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo27">Prescriptor:</div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="prescriptor" type="text" id="prescriptor" value="<?php echo $prescriptor;?>" onKeyPress="return verif_caracter(this,event)"  size="6" maxlength="6">
     <?php echo $nombre_prescriptor;?> </span></td>
  </tr>
 
 <?php  if ($requiere_automatico != "SI"){?>
<?php  if ($nro_os == 2315){?>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right"><span class="Estilo19 Estilo20 Estilo23"><span class="right">N&ordm; Orden:</span></span></div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="nro_orden" type="text"  id="nro_orden" onKeyPress="return verif_caracter(this,event)" size="14" maxlength="12" >
   </span></td>
 </tr>
<?php 
 }else{?>

 <tr>
   <td bgcolor="#E6E6E6" ><div align="right"><span class="Estilo19 Estilo20 Estilo23"><span class="right">N&ordm; Orden:</span></span></div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="nro_orden" type="text"  id="nro_orden" onKeyPress="return verif_caracter(this,event)" size="14" maxlength="8" >
   </span></td>
 </tr>
<?php }}?>

 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo27">Fecha Practica: </div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input type="text" size="2" name="dia"  value="" id="dia" onKeyPress="return verif_caracter(this,event)" maxlength="2">
     /
     <input type="text" size="2" name="mes"  value="" id="mes" onKeyPress="return verif_caracter(this,event)" maxlength="2">
     /
     20
     <input type="text" size="2" name="anio_o" value= "<?php echo $anio_actual;?>"  id="anio" onKeyPress="return verif_caracter(this,event)" maxlength="2" >
     <input type="submit" name="Alta" value="FECHA" id = "Alta">
</span></td>
  </tr>
</table>






</form>
</body>





</html>
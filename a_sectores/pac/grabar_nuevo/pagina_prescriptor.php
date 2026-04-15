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

<script language="javascript">
function on_load()
{
document.getElementById("prescriptor").focus();
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
				document.getElementById("dia").focus();
				break;
					
				case "dia":
				document.getElementById("mes").focus();
				break;

								case "mes":
				document.getElementById("anio").focus();
				break;

								case "anio":
				document.getElementById("autorizacion").focus();
				break;

				case "autorizacion":
				document.getElementById("coseguro").focus();
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
$nro_os = $_REQUEST['nro_os'];
include ("convenio.php");


$nro_laboratorio = $_REQUEST['nro_laboratorio'];
$periodo= $_REQUEST['periodo'];
$anio= $_REQUEST['anio'];
$afiliado=$_REQUEST['afiliado'];

if ($control_afiliados == "SI"){
include ("contro_afiliados_varios.php");
}



/*
if (($control_afiliados == "NO") && ($nombre_afiliado == "")) {
	$nombre_afiliado = "AFILIADO INEXISTENTE";
}
*/




$lote= $_REQUEST['lote'];
$operador= $_REQUEST['operador'];


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


?>

<BODY onload = "on_load()">
<FORM name="form" ACTION="pagina_fecha.php" METHOD = "POST">

<table width="103%" cellpadding="3" cellspacing="0">
 <tr bgcolor="#000099" >
   <td class="left" ><div align="center"><span class="left Estilo6"><span class="Estilo1"><strong><span class="Estilo14"><span class="Estilo6"><strong>GRABACION DE ORDENES</strong></span></span></strong></span> </span></div></td>
   </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td class="left" ><span class="left Estilo6"><span class="Estilo17">Operador: <strong><?php echo $operador." - ".$nombre_operador;?></strong></span></span></td>
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



<table width="103%" cellpadding="1" cellspacing="0">
 <tr>
   <td colspan="2" bgcolor="#E6E6E6" class="left Estilo22" ><hr noshade></td>
  </tr>
 <tr>
   <td width="20%" bgcolor="#E6E6E6" ><div align="right" class="Estilo25 Estilo26">Nº Afiliado:</div></td>
   <td width="80%" bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="afiliado" type="text" id="afiliado" value="<?php echo $afiliado;?>"onKeyPress="return verif_caracter(this,event)"  size="14" maxlength="14">
<?php echo $tipo_afiliado;?>   </span></td>
  </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo27">Prescriptor:</div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="prescriptor" type="text" id="prescriptor" onKeyPress="return verif_caracter(this,event)" value="" size="6" maxlength="6">
     <input type="submit" name="Alta" value="PRESCRIPTOR" id = "Alta">
</span></td>
  </tr>
</table>





</form>
</body>





</html>
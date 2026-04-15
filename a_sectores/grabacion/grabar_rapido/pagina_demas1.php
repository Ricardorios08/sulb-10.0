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
document.getElementById("autorizacion").focus();
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
				document.getElementById("nro_orden").focus();
				break;

				case "nro_orden":
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

echo "Pagina Demas 1";
$nro_os = $_REQUEST['nro_os'];
include ("convenio.php");
$nro_laboratorio = $_REQUEST['nro_laboratorio'];
$periodo= $_REQUEST['periodo'];
$anio= $_REQUEST['anio'];
$coseguro= $_REQUEST["coseguro"];
$lote= $_REQUEST['lote'];


$afiliado=$_REQUEST['afiliado'];
$prescriptor=$_REQUEST['prescriptor'];
$nro_orden=$_REQUEST['nro_orden'];




$operador= $_REQUEST['operador'];
$dia= $_REQUEST['dia'];
$mes= $_REQUEST['mes'];
$anio_o= $_REQUEST['anio_o'];
$tipo_afiliado=$_REQUEST['tipo_afiliado'];
$fecha_orden= $dia.$mes.$anio_o;

if ($fecha_orden == ""){

	$dia = date("d");
	$mes= date("m");
	$anio_o = date("y");
$fecha_orden= $dia.$mes.$anio_o;
}


if (($dia < 1) or ($dia > 31)){
$leyenda = "Dia no valido";
include ("../../../alertas/campo_vacio.php");
exit;
}

if (($mes < 1) or ($mes > 12)){
$leyenda = "Mes no valido";
include ("../../../alertas/campo_vacio.php");
exit;
}

$anio_actual = date($anio);

if ($anio_o < $anio_actual){
$leyenda = "Año no valido";
include ("../../../alertas/campo_vacio.php");
exit;
}







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
		case "1":{$mes1= "ENERO";}break;
		case "2":{$mes1= "FEBRERO";}break;
		case "3":{$mes1= "MARZO";}break;
		case "4":{$mes1= "ABRIL";}break;
		case "5":{$mes1= "MAYO";}break;
		case "6":{$mes1= "JUNIO";}break;
		case "7":{$mes1= "JULIO";}break;
		case "8":{$mes1= "AGOSTO";}break;
		case "9":{$mes1= "SETIEMBRE";}break;
		case "10":{$mes1= "OCTUBRE";}break;
		case "11":{$mes1= "NOVIEMBRE";}break;
		case "12":{$mes1= "DICIEMBRE";}break;
				}

if ($nro_orden == ""){
include ("../../../conexiones/config_gb.php");
$sql = "SELECT nro_orden FROM `ordenes` WHERE (nro_orden != 0) && periodo = $periodo AND ano = $anio AND nro_os = $nro_os AND operador = $operador and nro_orden like '$operador%' ORDER BY nro_orden DESC";
$result = $db->Execute($sql);


$nro_orde=strtoupper($result->fields["nro_orden"]);

if ($nro_orde == ""){
$nro_orden = $operador."00001";
}
else
	{
$nro_orden = $nro_orde +1;
	}

}


?>

<BODY onload = "on_load()">
<FORM name="form" ACTION="pagina_encabezado1.php" METHOD = "POST">

<table width="103%" cellpadding="3" cellspacing="0">
 <tr bgcolor="#000099" >
   <td class="left" ><div align="center"><span class="left Estilo6"><span class="Estilo1"><strong><span class="Estilo14"><span class="Estilo6"><strong>GRABACION DE ORDENES</strong></span></span></strong></span> </span></div></td>
   </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td class="left" ><span class="left Estilo6"><span class="Estilo17">Operdor: <strong><?php echo $operador." - ".$nombre_operador;?></strong></span></span></td>
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
   <?php echo $mes1;?> <?php echo $periodo;?></strong></span></td>
      <input name="anio" type="hidden" value="<?php echo $anio;?>">
	   <input name="operador" type="hidden" value="<?php echo $operador;?>">
<input name="coseguro" type="hidden" value="<?php echo $coseguro;?>">
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
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right"><span class="Estilo19 Estilo20 Estilo23"><span class="right">N&ordm; Orden:</span></span></div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="nro_orden" type="text"  id="nro_orden" value="<?php echo $nro_orden;?>" onKeyPress="return verif_caracter(this,event)" size="14" maxlength="8" >
   </span></td>
 </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo27">Fecha Practica: </div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input type="text" size="2" name="dia"  value="<?php echo $dia;?> id="dia" onKeyPress="return verif_caracter(this,event)" maxlength="2">
     /
     <input type="text" size="2" name="mes"  value="<?php echo $mes;?> id="mes" onKeyPress="return verif_caracter(this,event)" maxlength="2">
     /
     20
     <input type="text" size="2" name="anio_o"  value="<?php echo $anio_o;?> id="anio" onKeyPress="return verif_caracter(this,event)" maxlength="2">
   </span></td>
  </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo27">Autorizaci&oacute;n:</div>    </td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="autorizacion" type="text" id="autorizacion" onKeyPress="return verif_caracter(this,event)"  value="" size="8" maxlength="8">
   </span></td>
  </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo27">Coseguro: </div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
<?php   if ($nro_os == 3764){?>
     <input type="text" size="5" name="coseguro" id="coseguro" value = "<?php echo $coseguro;?>" 	 onKeyPress="return verif_caracter(this,event)" disabled>
<?php }else{?>
     <input type="text" size="5" name="coseguro" id="coseguro" value = "<?php echo $coseguro;?>" 	 onKeyPress="return verif_caracter(this,event)">
	 <?php }?>

	 <input name="tipo_afiliado" type="hidden" value="<?php echo $tipo_afiliado;?>">
     <input type="submit" name="Alta" value="SIGUIENTE" id = "Alta">
</span></td>
  </tr>
</table>






</form>
</body>





</html>
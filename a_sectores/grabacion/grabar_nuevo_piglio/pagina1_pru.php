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
-->
</style>






</head>


<?php 
//echo "Pagina 1";
$nro_os = $_REQUEST['nro_os'];
$nro_laboratorio = $_REQUEST['nro_laboratorio'];
$periodo= $_REQUEST['periodo'];
$anio= $_REQUEST['anio'];
$anio_actual = date("y") - 1;
if (strlen($anio_actual) == 1){
$anio_actual = "0".$anio_actual;
}


$lote= $_REQUEST['lote'];
$operador= $_REQUEST['operador'];

include ("../../../conexiones/config.inc.php");
$sql8="select * from grabadas_temp where operador = $operador";
$result8 = $db_gb->Execute($sql8);
$cod_gra=strtoupper($result8->fields["cod_grabacion"]);

$sql = "DELETE FROM detalle_temp where cod_grabacion like '$cod_gra'";
$result = $db_gb->Execute($sql);

$sql = "DELETE FROM grabadas_temp where operador like '$operador'";
$result = $db_gb->Execute($sql);


include ("convenio.php");
if ($control_afiliados =="SI"){
	 $control_afiliados;
include ("../../grabacion/grabar/pagina1.php");
exit;
}



 if ($requiere_automatico == "SI"){?>

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
				document.getElementById("dia").focus();
				break;

								
		
				case "dia":
				document.getElementById("mes").focus();
				break;

								case "mes":
				document.getElementById("autorizacion").focus();
				break;


			
			
		}
		return false;
	}
	return true;
}


</script>

<?php 
}
else{?>

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



if (($nro_laboratorio == "") or ($nro_os == "") or ($periodo == "")) {
$leyenda = "No puede dejar campos vacios";
include ("../../../alertas/campo_vacio.php");

exit;
}


$sql="select * from datos_os where nro_os = $nro_os";
$result = $db_os->Execute($sql);
$sigla=strtoupper($result->fields["sigla"]);

if ($sigla == ""){
$leyenda = "No existe Obra Social, Por Favor Ingrese Otra";
include ("../../../alertas/campo_vacio.php");
exit;
}



$sql12="select * from datos_laboratorio where nro_laboratorio = $nro_laboratorio";
$result12 = $db_bq->Execute($sql12);
$nombre_laboratorio=strtoupper($result12->fields["nombre_laboratorio"]);

$sql="select * from usuarios where id = $operador";
$result = $db_bq->Execute($sql);
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

<table width="650" cellpadding="3" cellspacing="0">
 <tr bgcolor="#000099" >
   <td colspan="2" class="left" ><div align="center"><span class="left Estilo6"><span class="Estilo1"><strong><span class="Estilo14"><span class="Estilo6"><strong>GRABACION DE ORDENES</strong></span></span></strong></span> </span></div></td>
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
 </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td bgcolor="#C4D7E6" class="left" ><div align="right"><span class="Estilo1">Laboratorio: <strong>
   </strong></span></div></td>
   <td class="left" ><span class="Estilo1"><strong>
     <input type="hidden" size="4" name="nro_laboratorio" value="<?php echo $nro_laboratorio;?>">
     <?php echo $nombre_laboratorio;?> <?php echo $nro_laboratorio;?> </strong></span></td>
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
<table width="650" cellpadding="1" cellspacing="0">
 <tr>
   <td colspan="2" bgcolor="#E6E6E6" class="left Estilo22" ><hr></td>
  </tr>
 <tr>
   <td width="33%" bgcolor="#F8C8A5" ><div align="right" class="Estilo25 Estilo26 Estilo1 Estilo4">Nº Afiliado:</div></td>
   <td width="67%" bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="afiliado" type="text" id="afiliado" onKeyPress="return verif_caracter(this,event)"   value="" size="14" maxlength="14">
</span></td>
  </tr>
 <tr>
   <td bgcolor="#F8C8A5" ><div align="right" class="Estilo27 Estilo1 Estilo4">Prescriptor:</div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="prescriptor" type="text" id="prescriptor" onKeyPress="return verif_caracter(this,event)" value="" size="6" maxlength="6">
   </span></td>
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
    <input type="text" size="2" name="anio_o" value= "<?php echo $anio_actual;?>"  id="anio" onKeyPress="return verif_caracter(this,event)" maxlength="2" >
   </span></td>
 </tr>

 <?php 

if 	($requiere_autorizacion == "SI"){?>
 <tr>
   <td bgcolor="#F8C8A5" ><div align="right" class="Estilo27">Autorizaci&oacute;n:</div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="autorizacion" type="text" id="autorizacion"  size="8" maxlength="8">
   </span></td>
 </tr>
 <?php }
if 	($requiere_coseguro == "SI"){?>
 <tr>
   <td bgcolor="#F8C8A5" ><div align="right" class="Estilo27">Coseguro: </div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <?php   if ($nro_os == 3764){?>
     <input type="text" size="5" name="coseguro" id="coseguro" value = "<?php echo $coseguro;?>" 	 onKeyPress="return verif_caracter(this,event)" disabled>
     <?php }else{?>
     <input type="text" size="5" name="coseguro" id="coseguro" value = "<?php echo $coseguro;?>" 	 onKeyPress="return verif_caracter(this,event)">
     <?php }}?>
	 
     <input name="tipo_afiliado" type="hidden" value="<?php echo $tipo_afiliado;?>">
   </span></td>
 </tr>
 <tr bgcolor="#FF0000">
   <td colspan="2" bgcolor="#E6E6E6" ><hr></td>
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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Grabación de Ordenes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script language="javascript">
function on_load()
{
document.getElementById("operador").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
							case "operador":
				document.getElementById("lote").focus();
				break;
				
				case "lote":
				document.getElementById("periodo").focus();
				break;
				
				case "periodo":
				document.getElementById("anio").focus();
				break;
				
				case "anio":
				document.getElementById("nro_os").focus();
				break;

				case "nro_os":
				document.getElementById("nro_laboratorio").focus();
				break;

				case "nro_laboratorio":
				document.getElementById("OK").focus();
				break;
					
								
		}
		return false;
	}
	return true;
}


</script>



<style type="text/css">
<!--
.Estilo1 {color: #000000}
.Estilo26 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
}
.Estilo27 {font-family: Arial, Helvetica, sans-serif}
.Estilo28 {
	color: #FF0000;
	font-family: Arial, Helvetica, sans-serif;
	font-style: italic;
	font-size: 12px;
}
.Estilo29 {font-size: 12px}
.Estilo30 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo31 {
	font-size: 12px;
	color: #FF0000;
	font-style: italic;
}
.Estilo32 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>

<?php $mes_anterior = date("m");
$anio = date("y");

if ($mes_anterior == 01){
$mes_anterior = 12;

$anio = $anio - 1;
if (strlen($anio) == 1){
$anio = "0".$anio;
}
}
else{

$mes_anterior = $mes_anterior - 1;
if (strlen($mes_anterior) == 1){
$mes_anterior= "0".$mes_anterior;
}
}

include ("../../../conexiones/config_gb.php");
$sql = "TRUNCATE TABLE detalle_temp";
//mysql_query($sql);

 $sql = "TRUNCATE TABLE grabadas_temp";
//mysql_query($sql);


?>

<BODY onload = "on_load()" onsubmit="document.getElementById('Espere').style .visibility='visible'">

<FORM name="form" ACTION="pagina1_pru.php" METHOD = "POST">
<table width="103%" cellpadding="2" cellspacing="0">
 <tr bgcolor="#000099" >
   <td height="28" colspan="2" class="left" ><div align="center" class="Estilo1 Estilo26">GRABACION DE ORDENES </div></td>
   <td width="30%" bgcolor="#FF0000" class="left" ><div align="center"><span class="Estilo27 Estilo32">OPERADORES</span></div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td bgcolor="#C4D7E6" class="left" ><div align="right" class="Estilo30">Operador</div></td>
   <td class="left" ><input type="text" size="5" name="operador" class="text" value="" id="operador" onKeyPress="return verif_caracter(this,event)" tabindex = "2"></td>
   <td width="30%" bgcolor="#F8C8A5" class="left" ><div align="center">106. ESTHER</div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td width="32%" bgcolor="#C4D7E6" class="left" ><div align="right" class="Estilo27 Estilo29"><span class="Estilo1">Nom</span>bre de Archivo o Lote:</div></td>
   <td width="38%" class="left" ><span class="Estilo5">
   <input type="text" size="25" name="lote" id="lote" onKeyPress="return verif_caracter(this,event)" tabindex = "1" maxlength="20">
   <span class="Estilo28">* (Opcional) </span></span></td>
   <td width="30%" valign="top" bgcolor="#F8C8A5" class="left" ><div align="center">107. JOHANA</div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td bgcolor="#C4D7E6" class="left" >       <div align="center" class="Estilo5 Estilo27 Estilo29">
         <div align="right">Periodo:         </div>
      </div></td>
   <td class="left" ><input type="text" size="2" name="periodo" id="periodo" value = "<?php echo $mes_anterior;?>" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
     <span class="Estilo27"><span class="Estilo29">A&ntilde;o</span>:</span>     <input type="text" size="2" name="anio" id="anio" value = "<?php echo $anio;?>" onKeyPress="return verif_caracter(this,event)" tabindex = "1"></td>
   <td width="30%" valign="top" bgcolor="#F8C8A5" class="left" ><div align="center">108. YESICA</div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td bgcolor="#C4D7E6" class="left" ><div align="right" class="Estilo30">O. Social:
      </div></td>
   <td class="left" ><input type="text" size="5" name="nro_os" class="text" value="" id="nro_os" onKeyPress="return verif_caracter(this,event)" tabindex = "2"></td>
   <td width="30%" valign="top" bgcolor="#F8C8A5" class="left" ><div align="center">109.CARLOS</div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td bgcolor="#C4D7E6" class="left" ><div align="right" class="Estilo30">Nº Laboratorio:</div></td>
   <td class="left" >
     <input type="text" size="5" name="nro_laboratorio" id = "nro_laboratorio" class="text" tabindex = "3" onKeyPress="return verif_caracter(this,event)">
     <span class="right">
     <input type="submit" name="Alta" value="OK" id = "Alta" tabindex = "4">
     </span></td>
   <td width="30%" valign="top" bgcolor="#F8C8A5" class="left" ><div align="center">110. GICO</div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td bgcolor="#C4D7E6" class="left" >&nbsp;</td>
   <td class="left" >&nbsp;</td>
   <td valign="top" bgcolor="#F8C8A5" class="left" ><div align="center">116. MARINA </div></td>
 </tr>
 <tr bgcolor="#FFFFFF" >
   <td height="40" colspan="3" class="left" ><div align="center"><span class="Estilo31">* Cuando en alguna Obra Social exista alg&uacute;n tipo de separaci&oacute;n ingrese nombre o lote.<em>ej: Andar-Visitar se graba en archivos o lotes separados. O en los casos de Lotes con IVA o Sin IVA. </em></span> </div></td>
   </tr>
  </TABLE>
</form>

<?php //include ("buscar_lotes.php");?>




</body>



<?php //include ("buscar_orden.php");?>



</html>




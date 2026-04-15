<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script language="javascript">
function on_load()
{
document.getElementById("nro_laboratorio").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
							
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
.Estilo25 {color: #FF0000}
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
-->
</style>
</head>

<?php $mes_anterior = date("m");
$lote = $_REQUEST['lote'];
$nro_os= $_REQUEST['nro_os'];
$nro_laboratorio= $_REQUEST['nro_laboratorio'];
$periodo= $_REQUEST['periodo'];
$anio = $_REQUEST['anio_o'];
 $operador= $_REQUEST['operador'];

/*
$ano = date("y") - 1;
if (strlen($ano) == 1){
$ano = "0".$ano;
}*/
?>


<BODY onload = "on_load()">

<FORM name="form" ACTION="pagina1.php" METHOD = "POST">
<table width="103%" cellpadding="2" cellspacing="0">
 <tr bgcolor="#000099" >
   <td colspan="3" class="left" ><div align="center" class="Estilo1 Estilo26">GRABACION DE ORDENES </div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td class="left" ><div align="right"><span class="Estilo27 Estilo29"><span class="Estilo1">Operador</span></span></div></td>
   <td class="left" ><input type="text" size="5" name="operador" class="text"  value = "<?php echo $operador;?>" id="nro_os3" onKeyPress="return verif_caracter(this,event)" tabindex = "2"></td>
   <td width="31%" rowspan="5" valign="top" class="left" ><div align="justify"><span class="Estilo31">* Cuando en alguna Obra Social exista alg&uacute;n tipo de separaci&oacute;n ingrese nombre o lote.<em>ej: Andar-Visitar se graba en archivos o lotes separados. O en los casos de Lotes con IVA o Sin IVA. </em></span></div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td width="32%" class="left" ><div align="right" class="Estilo27 Estilo29"><span class="Estilo1">Nom</span>bre de Archivo o Lote:</div></td>
   <td width="37%" class="left" ><span class="Estilo5">
   <input type="text" size="25" name="lote" id="lote" onKeyPress="return verif_caracter(this,event)" tabindex = "1" value = "<?php echo $lote;?>" maxlength="20">
   <span class="Estilo28">* (Opcional) </span></span></td>
   </tr>
 <tr bgcolor="#E1F2EF" >
   <td class="left" >       <div align="center" class="Estilo5 Estilo27 Estilo29">
         <div align="right">Periodo:         </div>
      </div></td>
   <td class="left" ><input type="text" size="2" name="periodo" id="periodo" value = "<?php echo $periodo;?>" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
     <span class="Estilo27"><span class="Estilo29">A&ntilde;o</span>:</span>     <input type="text" size="2" name="anio" id="anio" value = "<?php echo $anio;?>" onKeyPress="return verif_caracter(this,event)" tabindex = "1"></td>
   </tr>
 <tr bgcolor="#E1F2EF" >
   <td class="left" ><div align="right" class="Estilo30">O. Social:
      </div></td>
   <td class="left" ><input type="text" size="5" name="nro_os" class="text"  value = "<?php echo $nro_os;?>" id="nro_os" onKeyPress="return verif_caracter(this,event)" tabindex = "2"></td>
   </tr>
 <tr bgcolor="#E1F2EF" >
   <td class="left" ><div align="right" class="Estilo30">Nº Laboratorio:</div></td>
   <td class="left" >
     <input type="text" size="5" name="nro_laboratorio" id = "nro_laboratorio" class="text" tabindex = "3" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $nro_laboratorio;?>">
     <span class="right">
     <input type="submit" name="Alta" value="OK" id = "Alta" tabindex = "4">
     </span></td>
   </tr>
  </TABLE>
</form>





</body>



<?php //include ("buscar_orden.php");?>



</html>


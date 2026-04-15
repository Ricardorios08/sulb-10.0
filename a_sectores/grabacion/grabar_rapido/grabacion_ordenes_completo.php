<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Grabación de Ordenes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<style type="text/css">
<!--
.Estilo33 {
	font-size: 24px;
	font-family: "Trebuchet MS";
}
-->
</style>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../../css/fondo.css" rel="stylesheet" type="text/css" />
<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function on_load()
{
document.getElementById("nombre_medico").focus();
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
				document.getElementById("nro_paciente").focus();
				break;

				case "nro_paciente":
				document.getElementById("medico").focus();
				break;

				case "medico":
				document.getElementById("nombre_medico").focus();
				break;

				case "nombre_medico":
				document.getElementById("dia4").focus();
				break;
				
				case "dia4":
				document.getElementById("mes4").focus();
				break;

				case "mes4":
				document.getElementById("anio_o4").focus();
				break;

				case "anio_o4":
				document.getElementById("dia_r4").focus();
				break;

				case "dia_r4":
				document.getElementById("mes_r4").focus();
				break;

				case "mes_r4":
				document.getElementById("anio_o_r4").focus();
				break;

				case "anio_o_r4":
				document.getElementById("diagnostico").focus();
				break;

				case "diagnostico":
				document.getElementById("motivo").focus();
				break;

				case "motivo":
				document.getElementById("observaciones").focus();
				break;

				case "observaciones":
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
.Estilo3 {font-size: 12px; font-family: "Trebuchet MS";}
-->
</style>
</head>



<?php 

include ("../../../conexiones/config.inc.php");




//$sql="select * from ordenes order by cod_grabacion desc";
//$result = $db->Execute($sql);

//$nro_protocolo=$result->fields["cod_grabacion"] + 1;


$mes_anterior = date("m");
$anio = date("y");

if ($mes_anterior == 01){
$mes_anterior = "01";

if (strlen($anio) == 1){
$anio = "0".$anio;
}
}
else{

$mes_anterior = $mes_anterior;


if (strlen($mes_anterior) == 1){
$mes_anterior= "0".$mes_anterior;
}
}
if ($band != 1){
$nro_paciente= $_REQUEST['nro_paciente'];
}

$mes = date("m");
$dia= date("d");





 $sql = "REPAIR TABLE grabadas_temp";// where nro_laboratorio = $nro_paciente";
$result = $db->Execute($sql);

 $sql = "REPAIR TABLE detalle_temp";// where nro_laboratorio = $nro_paciente";
$result = $db->Execute($sql);



 $sql = "DELETE FROM  grabadas_temp";// where nro_laboratorio = $nro_paciente";
$result = $db->Execute($sql);

 $sql = "DELETE FROM  detalle_temp";// where nro_laboratorio = $nro_paciente";
$result = $db->Execute($sql);



//4264188
?>

<BODY onload = "on_load()" onsubmit="document.getElementById('Espere').style .visibility='visible'">

<FORM name="form" ACTION="pagina_completa_reducida.php" METHOD = "POST">
<table width="850" cellpadding="2" cellspacing="0">
 <tr >
   <td height="28" colspan="3" class="left" ><div align="center" class="Estilo1 Estilo26"><img src="../../../imagenes/analisis.jpg" width="846" height="35"></div></td>
   </tr>
 <tr >
   <td class="left" ><div align="right" class="Estilo30">Operador</div></td>
   <td class="left" ><input type="text" size="5" name="operador" class="text" value="100" id="operador" onKeyPress="return verif_caracter(this,event)" tabindex = "1"></td>
   <td width="33%" rowspan="2" class="left" ><div align="center">PROTOCOLO</div></td>
 </tr>
 <tr >
   <td width="23%" class="left" ><div align="right" class="Estilo27 Estilo29">Nombre Archivo o Lote:</div></td>
   <td width="44%" class="left" ><span class="Estilo5">
   <input type="text" size="25" name="lote" id="lote" onKeyPress="return verif_caracter(this,event)" tabindex = "2" maxlength="20">
   <span class="Estilo28">* (Opcional) </span></span></td>
   </tr>
 <tr >
   <td class="left" >       <div align="center" class="Estilo5 Estilo27 Estilo29">
         <div align="right">Periodo:         </div>
      </div></td>
   <td class="left" ><input name="periodo" type="text" id="periodo" tabindex = "3" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $mes_anterior;?>" size="2" maxlength="2">
     <span class="Estilo27"><span class="Estilo29">A&ntilde;o</span>:</span>     <input name="anio" type="text" id="anio" tabindex = "4" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $anio;?>" size="2" maxlength="2"></td>
   <td rowspan="2" class="left" ><div align="center" class="Estilo33"><?php echo $nro_protocolo;?></div></td>
 </tr>
 <tr >
   <td class="left" ><div align="right" class="Estilo30">O. Social:
      </div></td>
   <td class="left" ><input type="text" size="5" name="nro_os" class="text" value="<?php echo $nro_os;?>" id="nro_os" onKeyPress="return verif_caracter(this,event)" tabindex = "5"> <?php echo $sigla;?></td>
   </tr>
 <tr >
   <td class="left" ><div align="right" class="Estilo30">Nº Paciente:</div></td>
   <td colspan="2" class="left" >
     <input name="nro_paciente" type="text" class="text" id = "nro_paciente" tabindex = "6" onKeyPress="return verif_caracter(this,event)" value="<?php echo $nro_paciente;?>" size="5">

     <span class="right  Estilo3"> <?php echo $nombre;?>  N°Afil.: <?php echo $nro_afiliado;?>  <input name="nro_afiliado" type="hidden" class="text" id = "nro_afiliado" value="<?php echo $nro_afiliado;?>"> </span></td>
   </tr>
 <tr >
   <td class="left" ><div align="right"><span class="Estilo30">Matricula Medico</span></div></td>
   <td colspan="2" class="left" ><span class="right">
     <input type="text" size="5" name="medico" class="text" value="" id="medico" onKeyPress="return verif_caracter(this,event)" tabindex = "7">
     </span></td>
 </tr>
 <tr >
   <td class="left" ><div align="right"><span class="Estilo30">Nombre Medico</span></div></td>
   <td colspan="2" class="left" ><span class="right">
     <input name="nombre_medico" type="text" id="nombre_medico" onKeyPress="return verif_caracter(this,event)" value="" size="20" maxlength="20" tabindex = "8">
   </span></td>
 </tr>
 <tr class="Estilo30" >
   <td class="left" ><div align="right">Fecha Pr&aacute;ctica</div></td>
   <td colspan="2" class="left" ><span class="right">
     <input type="text" size="2" name="dia"  value= "<?php echo $dia;?>"  id="dia4" onKeyPress="return verif_caracter(this,event)" maxlength="2" tabindex = "9">
/
<input type="text" size="2" name="mes"  value= "<?php echo $mes;?>"  id="mes4" onKeyPress="return verif_caracter(this,event)" maxlength="2" tabindex = "10">
/ 20
<input type="text" size="2" name="anio_o" value= "<?php echo $anio;?>"  id="anio_o4" onKeyPress="return verif_caracter(this,event)" maxlength="2" tabindex = "11">
   </span></td>
 </tr>
 <tr class="Estilo30" >
   <td class="left" ><div align="right">Fecha Realizaci&oacute;n</div></td>
   <td colspan="2" class="left" ><span class="right">
     <input type="text" size="2" name="dia_r"  value= "<?php echo $dia;?>"  id="dia_r4" onKeyPress="return verif_caracter(this,event)" maxlength="2" tabindex = "12">
/
<input type="text" size="2" name="mes_r"  value= "<?php echo $mes;?>"  id="mes_r4" onKeyPress="return verif_caracter(this,event)" maxlength="2" tabindex = "13">
/ 20
<input type="text" size="2" name="anio_o_r" value= "<?php echo $anio;?>"  id="anio_o_r4" onKeyPress="return verif_caracter(this,event)" maxlength="2" tabindex = "14">
   </span></td>
 </tr>
 <tr class="Estilo30" >
   <td class="left" ><div align="right">Diagnostico</div></td>
   <td colspan="2" class="left" ><span class="right">
     <input name="diagnostico" type="text" id="diagnostico" onKeyPress="return verif_caracter(this,event)" value="" size="80" maxlength="120" tabindex = "15">
   </span></td>
 </tr>
 <tr class="Estilo30" >
   <td class="left" ><div align="right">Motivo</div></td>
   <td colspan="2" class="left" ><span class="right">
     <input name="motivo" type="text" id="motivo" onKeyPress="return verif_caracter(this,event)" value="" size="80" maxlength="120" tabindex = "16">
   </span></td>
 </tr>
 <tr class="Estilo30" >
   <td class="left" ><div align="right">Observaciones</div></td>
   <td colspan="2" class="left" ><span class="right">
     <input name="observaciones" type="text" id="observaciones" onKeyPress="return verif_caracter(this,event)" value="" size="80" maxlength="120" tabindex = "17"> 

     <input name="banda_gris" type="hidden"  value="1"> 


   </span></td>
 </tr>
 <tr >
   <td bgcolor="#C0C0C0" class="left" >&nbsp;</td>
   <td colspan="2" bgcolor="#C0C0C0" class="left" ><span class="right">
     <input type="submit" name="Alta" value="OK" id = "Alta3" tabindex = "18">
     <input type="hidden" name="primera_vez" value="SI" >
   </span></td>
 </tr>
  </TABLE>
</form>


</body>







</html>




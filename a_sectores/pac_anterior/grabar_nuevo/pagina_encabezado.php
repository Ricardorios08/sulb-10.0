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
.Estilo8 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; }
.Estilo9 {color: #000000}
.Estilo11 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo14 {color: #000099}
.Estilo15 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; }
.Estilo17 {font-size: 12px; font-weight: bold; }
-->
</style>

<script language="javascript">
function on_load()
{
document.getElementById("nro_practica").focus();
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
				document.getElementById("fecha_orden").focus();
				break;
					
					case "nro_orden":
				document.getElementById("afiliado").focus();
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
echo "Pagina encabezado";
$cod_grabacion = $_REQUEST['cod_grabacion'];
 $periodo = $_REQUEST['periodo'];
$anio = $_REQUEST['anio_o'];

if (strlen($periodo == 1)){
	echo $periodo = "0".$periodo;
}

include ("../../../conexiones/config_gb.php");
$sql="select * from ordenes where cod_grabacion like '$cod_grabacion' and periodo = $periodo and ano = $anio";
$result = $db->Execute($sql);

$nro_os=strtoupper($result->fields["nro_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$nro_laboratorio=strtoupper($result->fields["nro_laboratorio"]);
$nombre_laboratorio=strtoupper($result->fields["nombre_laboratorio"]);
$nro_afiliado=strtoupper($result->fields["nro_afiliado"]);
$nombre_afiliado=strtoupper($result->fields["nombre_afiliado"]);
$nro_orden=strtoupper($result->fields["nro_orden"]);
$fecha=strtoupper($result->fields["fecha"]);
$medico=strtoupper($result->fields["medico"]);
$nombre_medico=strtoupper($result->fields["nombre_medico"]);
$coseguro=strtoupper($result->fields["coseguro"]);
$autorizacion=strtoupper($result->fields["autorizacion"]);
$confirmada=strtoupper($result->fields["confirmada"]);
$lote=strtoupper($result->fields["lote"]);
$operador=strtoupper($result->fields["operador"]);
$nombre_operador=strtoupper($result->fields["nombre_operador"]);



$dia= substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio_o= substr($fecha,2,2);

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

$cod_grabacion1=$nro_os.$nro_laboratorio.$nro_orden.$mes.$año;
include ("../../../conexiones/config_gb.php");
$sql = "INSERT INTO `grabadas_temp` ( `cod_grabacion` , `periodo` , `ano` , `nro_os` , `sigla` , `nro_laboratorio` , `nombre_laboratorio` ,`matricula` , `nro_afiliado` , `nombre_afiliado` ,`nro_orden` , `fecha` ,`medico`  ,`nombre_medico` , `coseguro` , `autorizacion` , `fecha_fac` , `nro_fac` , `confirmada` , `marca` , `lote` , `operador` , `nombre_operador` ) VALUES ( '$cod_grabacion1' , '$periodo' , '$anio_o' , '$nro_os' , '$sigla' , '$nro_laboratorio' , '$nombre_laboratorio' , '$matricula' , '$afiliado' , '$nombre_afiliado', '$nro_orden' , '$fecha_orde' , '$prescriptor' , '$nombre_prescriptor' , '$coseguro' , '$autorizacion' , '' , '' , 7 , '' , '$lote' , '$operador' , '$nombre_operador')";
//mysql_query($sql);

include ("../../../conexiones/close.php");
?>
<BODY onload = "on_load()">
<FORM name="form" ACTION="pagina_completa.php" METHOD = "POST">

<table width="103%" cellpadding="3" cellspacing="0" BORDER = "0">
 <tr bgcolor="#000099" >
   <td colspan="3" class="left Estilo6" ><div align="center"> </div>     
     <span class="Estilo1">Nombre Lote:"<strong><?php echo $lote;?>
     <input name="lote" type="hidden" value="<?php echo $lote;?>">"
     </strong></span><span class="Estilo14"> ________________________ <span class="Estilo6"><strong>GRABACION DE ORDENES</strong></span></span></strong>     <div align="center" class="Estilo6"><span class="Estilo1"></span></div></td>
   </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td width="31%" class="left" ><div align="center" class="Estilo8 Estilo9">
     <div align="left">Obra Social : <span class="Estilo11">
           <input type="hidden" size="4" name="nro_os" value="<?php echo $nro_os;?>">
           <?php echo$sigla;?> - <?php echo $nro_os;?></span></div>
   </div>     <div align="center" class="Estilo8 Estilo9"></div>   <div align="center" class="Estilo8 Estilo9">
      </div></td>
   <td width="39%" class="left" ><span class="Estilo1">Laboratorio: 
       <strong>
       <input type="hidden" size="4" name="nro_laboratorio" value="<?php echo $nro_laboratorio;?>">
       <?php echo $nombre_laboratorio;?> <?php echo $nro_laboratorio;?> </strong></span></td>
   <td width="30%" class="left" ><div align="left" class="Estilo9">Periodo:          <strong>
             <input type="hidden" size="1" name="periodo" onKeyPress="return verif_caracter(this,event)" class="text" value="<?php echo $periodo;?>" id="periodo">
          <?php echo $mes1;?> <?php echo $anio;?> </strong></div></td>
 </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td class="left Estilo1" >N&ordm; Orden: <strong><?php echo $nro_orden;?>
       <input name="nro_orden" type="hidden"   id="nro_orden" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $nro_orden;?>" size="9" maxlength="8">
   </strong></td>
   <td class="left Estilo1" >Afiliado: <span class="right"><span class="Estilo17"><?php echo $nombre_afiliado;?>
         <input name="afiliado" type="hidden"   id="afiliado" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $afiliado;?>" size="9" maxlength="8">
</span></span></td>
   <td class="left" ><div align="right" class="Estilo1">
     <div align="left">Prescriptor: <span class="right"><strong><?php echo $nombre_prescriptor ;?>
            <input name="prescriptor" type="hidden"   id="prescriptor" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $prescriptor;?>" size="9" maxlength="8">
     </strong></span></div>
   </div></td>
 </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td class="left Estilo1" >Fecha de Orden: <strong><?php echo $fecha_orden;?>
       <input type="hidden" size="10" name="fecha_orden"  value = "<?php echo $fecha_orden;?>" 
	   id="fecha_orden" onKeyPress="return verif_caracter(this,event)" maxlength = "6">
<input type="hidden" size="10" name="actualiza"  value = "<?php echo $actualiza;?>">
	   <strong>
       <input type="hidden" size="10" name="dia"  value = "<?php echo $dia;?>" id="dia" onKeyPress="return verif_caracter(this,event)" maxlength = "6">
      </strong> <strong>
      <input type="hidden" size="10" name="mes"  value = "<?php echo $mes;?>" id="mes" onKeyPress="return verif_caracter(this,event)" maxlength = "6">
      </strong></strong><strong>
      <input type="hidden" size="10" name="anio_o"  value = "<?php echo $anio_o;?>" id="anio" onKeyPress="return verif_caracter(this,event)" maxlength = "6">
      </strong></td>
   <td class="left Estilo1" >Autoriz:.<span class="right"><strong> <?php echo $autorizacion;?>
         <input name="autorizacion" type="hidden" class="text" id="autorizacion" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $autorizacion;?>" size="6" maxlength="6">
   </strong></span></td>
   <td class="left" ><div align="center" class="Estilo15">
     <div align="left">Coseguro: <strong><?php echo $coseguro;?>
            <input type="hidden" size="5" name="coseguro"  value = "<?php echo $coseguro;?>" id="coseguro3" onKeyPress="return verif_caracter(this,event)">
<input type="hidden" size="5" name="periodo"  value = "<?php echo $periodo;?>" id="periodo" onKeyPress="return verif_caracter(this,event)">
<input type="hidden" size="5" name="operador"  value = "<?php echo $operador;?>" id="periodo" onKeyPress="return verif_caracter(this,event)">
     </strong></div>
   </div></td>
 </tr>
 </table>
<table width="103%" height="44" border="0
" cellpadding="5" cellspacing="0">
  <!--DWLayoutTable-->
 <tr valign="middle" bgcolor="#E6E6E6" >
   <td width="24%" valign="middle" class="Estilo4" ><div align="center"><span class="Estilo6"><span class="Estilo9 Estilo1">Practica</span>:
          <input type="text" size="5" name="nro_practica" id="nro_practica" tabindex = "26">
     </span> <span class="right Estilo6">
     <input type="submit" name="Alta" value="SI" id="SI">
   </span></div></td>
   <td height="44" class="Estilo4" ><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><span class="left"><span class="left Estilo1"><span class="right"><span class="right Estilo6">
   
</span></span></span></span></font></div></td>
  </table>
</form>


<table width="1050" border="0">
  <tr bgcolor="#C4D7E6">
    <td width="89"><div align="center" class="Estilo18 Estilo1 Estilo4">ITEM</div></td>
    <td width="179"><div align="center" class="Estilo18 Estilo1 Estilo4">NRO PRACTICA</div></td>
    <td width="768"><div align="center" class="Estilo4"><span class="Estilo1">PRACTICA</span></div></td>
  </tr>
</table>

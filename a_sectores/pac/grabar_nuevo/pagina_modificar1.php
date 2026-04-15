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
.Estilo32 {color: #000000}
.Estilo33 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>

<style type="text/css">
<!--
.Estilo19 {color: #FFFFFF}
.Estilo20 {font-family: Arial, Helvetica, sans-serif}
.Estilo23 {
	font-size: 12px;
	color: #000000;
}
.Estilo25 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo26 {color: #000000}
.Estilo27 {color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>

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
				document.getElementById("nro_os").focus();
				break;

				case "nro_os":
				document.getElementById("nro_laboratorio").focus();
				break;

				case "nro_laboratorio":
				document.getElementById("periodo").focus();
				break;

				case "periodo":
				document.getElementById("anio").focus();
				break;
				
				case "anio":
				document.getElementById("afiliado").focus();
				break;
				
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
				document.getElementById("anio_o").focus();
				break;
					
								case "anio_o":
				document.getElementById("autorizacion").focus();
				break;

				case "autorizacion":
				document.getElementById("coseguro").focus();
				break;

				case "coseguro":
				document.getElementById("practica").focus();
				break;
				
				case "practica":
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

$cod_grabacion = $_REQUEST['cod_grabacion'];
 $periodo = $_REQUEST['periodo'];
$periodo = trim($periodo);
$anio = $_REQUEST['anio'];
$agregar = $_REQUEST['agregar'];



if (strlen($periodo) == 1){
 $periodo = "0".$periodo;
}



$nro_os= $_REQUEST['nro_os'];
$sigla= $_REQUEST['sigla'];
$nro_laboratorio= $_REQUEST['nro_laboratorio'];

$afiliado= $_REQUEST['afiliado'];
$prescriptor= $_REQUEST['prescriptor'];
$nro_orden= $_REQUEST['nro_orden'];

$dia= $_REQUEST['dia'];
$mes= $_REQUEST['mes'];
$anio_o= $_REQUEST['anio_o'];

$fecha_a= $anio_o.$mes.$dia;
$medico= $_REQUEST['medico'];;
$coseguro= $_REQUEST['coseguro'];
$autorizacion= $_REQUEST['autorizacion'];
$lote= $_REQUEST['lote'];
$operador= $_REQUEST['operador'];
$marca= $_REQUEST['marca'];



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

include ("../../../conexiones/config_gb.php");

$sql4="select nro_laboratorio from ordenes where cod_grabacion like '$cod_grabacion'";
$result4 = $db->Execute($sql4);
 $nro_laboratorio_anterior=strtoupper($result4->fields["nro_laboratorio"]);

$sql1 = "DELETE from ordenes where cod_grabacion like '$cod_grabacion'";
mysql_query($sql1);
 $sql = "INSERT INTO `ordenes` ( `cod_grabacion` , `periodo` , `ano` , `nro_os` , `nro_laboratorio` ,`matricula` , `nro_afiliado` ,`nro_orden` , `fecha` ,`medico` , `coseguro` , `autorizacion` , `fecha_fac` , `nro_fac` , `confirmada` , `marca` , `lote` , `operador` ) VALUES ( '$cod_grabacion' , '$periodo' , '$anio' , '$nro_os' , '$nro_laboratorio' , '$matricula' , '$afiliado' , '$nro_orden' , '$fecha_a' , '$prescriptor' ,'$coseguro' , '$autorizacion' , '' , '' , 7 , '$marca' , '$lote' , '$operador')";
mysql_query($sql);

$sql = "UPDATE `detalle` SET `nro_laboratorio` = '$nro_laboratorio' , `periodo` = '$periodo' , `ano` = '$anio' , `nro_orden` = '$nro_orden' , `lote` = '$lote' , `nro_os` = '$nro_os' ,  `marca` = '$marca' WHERE cod_grabacion like '$cod_grabacion'";
mysql_query($sql);


$nro_practica= $_REQUEST['practica'];
if ($nro_practica != ""){

include ("../../../conexiones/config_pr.php");
$sql8="select practica from convenio_practica where cod_practica = '$nro_practica' and nro_os = $nro_os";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);

if ($practica == ""){
$leyenda = "PRACTICA INEXISTENTE EN ESTE NOMENCLADOR";
include ("../../../alertas/campo_informacion.php");
}
ELSE
	{

include ("../../../conexiones/config_gb.php");
 $sql ="INSERT INTO `detalle` ( `cod_grabacion` , `nro_os` , `nro_laboratorio` , `nro_orden` , `nro_practica` , `valor` , `periodo` , `ano` , `nro_factura` , `confirmada` , `cod_operacion` , `marca` , `lote`, `operador`  ) VALUES ('$cod_grabacion' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '$valor' ,'$periodo' , '$anio' , '$nro_factura' , '7' , '' , '$marca' , '$lote' , '$operador')";
mysql_query($sql);
}
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


?>

<BODY onload = "on_load()">
<FORM name="form" ACTION="pagina_modificar1.php" METHOD = "POST">

<table width="103%" cellpadding="3" cellspacing="0">
 <tr bgcolor="#000099" >
   <td class="left" ><div align="center"><span class="left Estilo6"><span class="Estilo1"><strong><span class="Estilo14"><span class="Estilo6"><strong>GRABACION DE ORDENES</strong></span></span></strong></span> </span></div></td>
  </tr>





<table width="101%" cellpadding="1" cellspacing="0">
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo33">Operador</div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="operador" type="text" id="operador" value="<?php echo $operador;?>" onKeyPress="return verif_caracter(this,event)"  size="6" maxlength="6">
     <?php echo $nombre_operador;?> </span></td>
   <td width="58%" rowspan="11" valign="top" bgcolor="#E1F2EF" class="left" ><table width="599" border="0">
  <tr bgcolor="#C4D7E6">
    <td colspan="3">Agregar Practica: <span class="right">
      <input name="practica" type="text" id="practica" onKeyPress="return verif_caracter(this,event)"  size="3">
      <input type="submit" name="Alta2" value="OK" id = "OK">
    </span></td>
    </tr>
  <tr bgcolor="#C4D7E6">
    <td width="75"><div align="center" class="Estilo18 Estilo4 Estilo20">ITEM</div></td>
    <td width="122" valign="top"><div align="center" class="Estilo18 Estilo4 Estilo20">NRO PRACTICA</div></td>
    <td width="450"><div align="center" class="Estilo4"><span class="Estilo1">PRACTICA</span></div></td>
  </tr>
  <?php 
include ("../../../conexiones/config_gb.php");
$sql10="select * from detalle where cod_grabacion like '$cod_grabacion'";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo".$db->ErrorMsg());
 while (!$result10->EOF) {

$cod_grabacion=strtoupper($result10->fields["cod_grabacion"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
$nro_practica=strtoupper($result10->fields["nro_practica"]);

include ("../../../conexiones/config_pr.php");
 $sql11="select * from convenio_practica where nro_os like '$nro_os' and cod_practica = $nro_practica";
$result11 = $db->Execute($sql11);
$practica=strtoupper($result11->fields["practica"]);


$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
$cantidad = $cantidad + 1;

$practica = $practica;


?>
<tr bgcolor="#E0EDF3">
    <td><div align="center" class="Estilo18"><?php echo $cantidad;?></div></td>
    <td valign="top"><div align="center" class="Estilo18"><?php echo $nro_practica;?></div></td>
    <td><a href="borra_practica_modif.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>&&periodo=<?php print("$periodo");?>&&anio_o=<?php print("$anio");?>&&agregar=SI" target = "central" class="Estilo18" ><?php echo $practica;?></a></td>
  </tr>
<?php 

$result10->MoveNext();

	}

	?></table></td>
 </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo33"><span class="left"><span class="left  Estilo6"><span class="Estilo32">Nombre Lote</span></span></span></div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="lote2" type="text" id="lote" value="<?php echo $lote;?>" onKeyPress="return verif_caracter(this,event)"   size="20">
   </span></td>
   </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo33">Obra Social :</div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="nro_os" type="text" id="nro_os" value="<?php echo $nro_os;?>" onKeyPress="return verif_caracter(this,event)"  size="6" maxlength="6">
     <?php echo $sigla;?> </span></td>
   </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo33"><span class="left">Laboratorio:</span></div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="nro_laboratorio" type="text" id="nro_laboratorio" value="<?php echo $nro_laboratorio;?>" onKeyPress="return verif_caracter(this,event)"  size="6" maxlength="6">
     <?php echo $nombre_laboratorio;?> </span></td>
   </tr>
      <input name="marca" type="hidden"  value="<?php echo $marca;?>">

 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo33"><span class="left">periodo</span></div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="periodo" type="text" id="periodo" value="<?php echo $periodo;?>" onKeyPress="return verif_caracter(this,event)"  size="2" maxlength="2">
     <span class="Estilo33"> 20</span>     
     <input name="anio" type="text" id="anio" value="<?php echo $anio;?>" onKeyPress="return verif_caracter(this,event)"  size="2" maxlength="2">
</span></td>
   </tr>
 <tr>
   <td width="9%" bgcolor="#E6E6E6" ><div align="right" class="Estilo25 Estilo26 Estilo1 Estilo4">Nº Afiliado:</div></td>
   <td width="33%" bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="afiliado" type="text" id="afiliado" value="<?php echo $afiliado;?>" onKeyPress="return verif_caracter(this,event)"   size="14" maxlength="14">
  <?php echo $nombre_afiliado;?> </span></td>
   </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo27 Estilo1 Estilo4">Prescriptor:</div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="prescriptor" type="text" id="prescriptor" value="<?php echo $prescriptor;?>" onKeyPress="return verif_caracter(this,event)"  size="6" maxlength="6">
     <?php echo $nombre_prescriptor;?> </span></td>
   </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo33"><span class="Estilo19 Estilo20 Estilo23"><span class="right">N&ordm; Orden:</span></span></div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="nro_orden" type="text"  id="nro_orden" value="<?php echo $nro_orden;?>" onKeyPress="return verif_caracter(this,event)" size="12" maxlength="12" >
   </span></td>
   </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo27 Estilo1 Estilo4">Fecha Practica: </div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input type="text" size="2" name="dia"  value="<?php echo $dia;?>" id="dia" onKeyPress="return verif_caracter(this,event)" maxlength="2">
     /
     <input type="text" size="2" name="mes"  value="<?php echo $mes;?>" id="mes" onKeyPress="return verif_caracter(this,event)" maxlength="2">
     /
     20
     <input type="text" size="2" name="anio_o"  value="<?php echo $anio_o;?>" id="anio_o" onKeyPress="return verif_caracter(this,event)" maxlength="2">
   </span></td>
   </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo27 Estilo1 Estilo4">Autorizaci&oacute;n:</div>    </td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="autorizacion" type="text" id="autorizacion" onKeyPress="return verif_caracter(this,event)"  value="<?php echo $autorizacion;?>" size="8" maxlength="8">
   </span></td>
   </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo27 Estilo1 Estilo4">Coseguro: </div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="coseguro" type="text" id="coseguro" onKeyPress="return verif_caracter(this,event)" value="<?php echo $coseguro;?>" size="5">
	      
     <input type="submit" name="Alta" value="SIGUIENTE" id = "Alta">
</span></td>
   </tr>
</table>







</form>
</body>





</html>
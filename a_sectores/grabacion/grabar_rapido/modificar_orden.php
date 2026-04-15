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
.Estilo13 {color: #E1F2EF}
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
include ("../../../LAUTARO/FUNCIONES.PHP");
$nro_os = $_REQUEST['nro_os'];
include ("convenio.php");
$nro_laboratorio = $_REQUEST['nro_laboratorio'];
$periodo= $_REQUEST['periodo'];
$anio= $_REQUEST['anio'];

$nro_orden= trim($_REQUEST['nro_orden']);
$nro_orden = ceros_nro_orden($nro_orden); 



$afiliado=$_REQUEST['afiliado'];
$prescriptor=$_REQUEST['prescriptor'];


include ("../../../conexiones/config_os.php");
$sql2 = "SELECT * FROM `afiliados_pami` WHERE nro_os = $nro_os and nro_afiliado = $afiliado";
$result2 = $db->Execute($sql2);
$nombre_afiliado=strtoupper($result2->fields["nombre"]);


if (($control_afiliados == "SI") && ($nombre_afiliado == "")) {
$leyenda = "No Existe ese Afiliado";
include ("../../../alertas/campo_vacio.php");
exit;
}

if (($control_afiliados == "NO") && ($nombre_afiliado == "")) {
$nombre_afiliado = "AFILIADO INEXISTENTE";
}


//---------------------------------------------------------------------
$sql3 = "SELECT * FROM `prescriptor` WHERE nro_os = $nro_os and matricula = $prescriptor";
$result3 = $db->Execute($sql3);
$nombre_prescriptor=strtoupper($result3->fields["nombre"]);


if (($control_prescriptor == "SI") && ($nombre_prescriptor == "")) {
$leyenda = "No Existe ese Prescriptor";
include ("../../../alertas/campo_vacio.php");
exit;
}

if (($control_prescriptor == "NO") && ($nombre_prescriptor == "")) {
	$nombre_prescriptor = "PRESCRIPTOR INEXISTENTE";
}

$afiliado= trim($_REQUEST['afiliado']);
$afiliado= ceros_nro_afiliado($afiliado);
$prescriptor= trim($_REQUEST['prescriptor']);

$dia= trim($_REQUEST['dia']);
$mes= trim($_REQUEST['mes']);
$anio_o= trim($_REQUEST['anio_o']);

$fecha_orden= $dia.$mes.$anio_o;
$autorizacion= $_REQUEST['autorizacion'];
$coseguro= $_REQUEST['coseguro'];
$lote= $_REQUEST['lote'];
$nro_orden = $nro_orden;


if ($nro_orden == ""){

include ("../../../conexiones/config_gb.php");
$sql = "SELECT * FROM `ordenes` WHERE nro_orden < 1000 && nro_orden != 0 && periodo = $mes AND ano = $anio AND nro_os = $nro_os ORDER BY nro_orden DESC";
$result = $db->Execute($sql);

$nro_ord=strtoupper($result->fields["nro_orden"]);

if ($nro_ord == ""){
 $nro_orden = $periodo.$anio."1";
}
else
	{
$nro_orden = $periodo.$anio.$nro_ord + 1;
	}

$nro_orden = ceros_nro_orden($nro_orden);
}


//include ("comprobar_fechas.php");

//include ("convenio.php");


if ($prescriptor_1 == "SI"){
include ("../../../conexiones/config_os.php");
$sql4="select * from prescriptor where nro_os = $nro_os and matricula = $prescriptor group by matricula";
$result4 = $db->Execute($sql4);
$nombre_pres=strtoupper($result4->fields["nombre"]);

if ($nombre_pres == ""){
$prescriptor = "";
$leyenda = "INEXISTENTE";
include ("prescriptor_inexistente.php");
exit;
}
}


if ($afiliados_1 == "SI"){
if ($nro_os == 5073){
$sql3="select * from afiliados_pami where nro_afiliado like '$afiliado'";
}
$result3 = $db->Execute($sql3);
$nombre=strtoupper($result3->fields["nombre"]);

if ($nombre == ""){
$LEYENDA1 = "INEXISTENTE";
include ("afiliado_inexistente.php");
exit;
}
}


include ("../../../conexiones/config_os.php");
$sql="select * from datos_os where nro_os = '$nro_os'";
$result = $db->Execute($sql);
$sigla=strtoupper($result->fields["sigla"]);

include ("../../../conexiones/config.inc.php");
$sql12="select * from datos_laboratorio where nro_laboratorio = '$nro_laboratorio'";
$result12 = $db->Execute($sql12);
$nombre_laboratorio=strtoupper($result12->fields["nombre_laboratorio"]);

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
<FORM name="form" ACTION="<?php php echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">

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
   <td width="30%" class="left" ><div align="left"><span class="left Estilo1"><span class="Estilo13"><span class="Estilo9">Periodo:          <strong>
             <input type="hidden" size="1" name="periodo" onKeyPress="return verif_caracter(this,event)" class="text" value="<?php echo $periodo;?>" id="periodo">
          <?php echo $mes1;?> <?php echo $anio;?></strong></span></span></span></div></td>
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
       <input type="hidden" size="10" name="fecha_orden"  value = "<?php echo $fecha_orden;?>" id="fecha_orden" onKeyPress="return verif_caracter(this,event)" maxlength = "6">
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
   <td width="7%" height="44" valign="middle" class="Estilo4" ><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Item </font></div></td>
   <td width="4%" valign="middle" class="Estilo4" ><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nº </font></div></td>
   <td width="5%" height="44" class="Estilo4" ><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Pr&aacute;ctica <span class="left"><span class="left Estilo1"><span class="right"><span class="right Estilo6"> </span></span></span></span></font></td>
   <td height="44" class="Estilo4" ><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><span class="left"><span class="left Estilo1"><span class="right"><span class="right Estilo6">
   
<a href="orden.php?$band_mes=1&&cod_grabacion=<?php print("$cod_grabacion1");?>&&nro_practica=<?php print("$nro_practi");?>&&cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&autorizacion=<?php print("$autorizacion");?>&&nro_orden=<?php print("$nro_orden");?>&&nro_laboratorio=<?php print("$nro_laboratorio");?>&&afiliado=<?php print("$nro_afiliado");?>&&prescriptor=<?php print("$medico");?>&&fecha_orden=<?php print("$fecha_orden");?>&&&coseguro=<?php print("$coseguro");?>&&nro_os=<?php print("$nro_os");?>&&anio_o=<?php print("$anio_o");?>&&anio=<?php print("$anio");?>&nro_os=<?php print("$nro_os");?>&&lote=<?php print("$lote");?>" tabindex = "28" title = "Presione aqui para ingresar una nueva orden"><img src="../../../imagenes/CDR/ORDEN.PNG" alt="Cambiar Orden" border = "0"> </a>


<a href="cuenta.php?cod_grabacion=<?php print("$cod_grabacion1");?>&&nro_practica=<?php print("$nro_practi");?>&&cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&&autorizacion=<?php print("$autorizacion");?>&&nro_orden=<?php print("$nro_orden");?>&&nro_laboratorio=<?php print("$nro_laboratorio");?>&&afiliado=<?php print("$nro_afiliado");?>&&prescriptor=<?php print("$medico");?>&&fecha_orden=<?php print("$fecha_orden");?>&&coseguro=<?php print("$coseguro");?>&&nro_os=<?php print("$nro_os");?>&&anio_o=<?php print("$anio_o");?>&&anio=<?php print("$anio");?>&&nro_os=<?php print("$nro_os");?>&&lote=<?php print("$lote");?>" tabindex = "29" title = "Presione aqui para ingresar una nueva cuenta"><img src="../../../imagenes/cdr/cuenta.png" alt="Cambiar Cuenta" border = "0"> </a>


<a href="obra.php?cod_grabacion=<?php print("$cod_grabacion1");?>&&nro_practica=<?php print("$nro_practi");?> &&cod_operacion=<?php print("$cod_operacion");?>&&periodo=<?php print("$periodo");?>&&autorizacion=<?php print("$autorizacion");?>&&nro_orden=<?php print("$nro_orden");?>&&nro_laboratorio=<?php print("$nro_laboratorio");?>&&afiliado=<?php print("$nro_afiliado");?>&&prescriptor=<?php print("$medico");?>&&fecha_orden=<?php print("$fecha_orden");?>&&coseguro=<?php print("$coseguro");?>&&nro_os=<?php print("$nro_os");?>&&anio_o=<?php print("$anio_o");?>&&anio=<?php print("$anio");?>&nro_os=<?php print("$nro_os");?> &&lote=<?php print("$lote");?>" tabindex ="30" title = "Presione aqui para ingresar una nueva obra social"><img src="../../../imagenes/cdr/obra.png" alt="Cambiar Ob Soc" border = "0"> </a>


<a href="borrar_orden.php?cod_grabacion=<?php print("$cod_grabacion1");?>		  &nro_practica=<?php print("$nro_practi");?> &cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&autorizacion=<?php print("$autorizacion");?> 
 &nro_orden=<?php print("$nro_orden");?>
 &nro_laboratorio=<?php print("$nro_laboratorio");?>
 &afiliado=<?php print("$nro_afiliado");?>
 &prescriptor=<?php print("$medico");?>
 &fecha_orden=<?php print("$fecha_orden");?>
 &coseguro=<?php print("$coseguro");?>
&nro_os=<?php print("$nro_os");?>
&&anio_o=<?php print("$anio_o");?>&anio=<?php print("$anio");?>&nro_os=<?php print("$nro_os");?>
" tabindex ="30" title = "Presione aqui para Borrar la Orden Completa"><img src="../../../imagenes/botones/btn_borrartodo.gif" alt="Cambiar Orden" border = "0"></a>

</span></span></span></span></font></div></td>
  </table>
</form>
<?php 	
	if ($actualizar_practicas =="SI"){

	include ("actualizar_practicas.php");

		$actualizar_practicas =="NO";

}

	if(isset($_REQUEST['Alta'])) {
	
	switch ($_REQUEST['Alta'])
	{
		
case "SI":
				{




$nro_os=$_REQUEST["nro_os"];
 $nro_laboratorio=trim($_REQUEST["nro_laboratorio"]);

 $lote=$_REQUEST["lote"];

 $nro_afiliado=$_REQUEST["afiliado"];


$nro_orden=trim($_REQUEST["nro_orden"]);



$dia=$_REQUEST["dia"];
$mes=$_REQUEST["mes"];
$anio_o=$_REQUEST["anio_o"];

$fecha = $dia.$mes.$anio_o;
//$fecha=$_REQUEST["fecha_orden"];

/*$anio2= substr($fecha,4,2);
$dia2= substr($fecha,0,2);
$mes2 = substr($fecha,2,2);
$fecha_a = $anio2.$mes2.$dia2;
*/
 $fecha_a = $anio_o.$mes.$dia;
$medico=$_REQUEST["prescriptor"];
 $coseguro=$_REQUEST["coseguro"];
 $autorizacion=$_REQUEST["autorizacion"];
 $año = date("y");
$cod_grabacion=$nro_os.$matricula.$nro_orden;
 $nro_practica=$_REQUEST["nro_practica"];
$mes=$_POST["periodo"];

if (strlen($mes) == 1){
	$mes = "0".$mes;
}

?>				
<!-- if ($nro_orden == ""){
	$leyenda = "No puede quedar el campo Nº Orden Vacio";
	include ("../../../alertas/campo_vacio.php");
	exit;
}
 -->
<?php 

if ($autorizacion == ""){
$autorizacion = $nro_orden;
}
$cod_grabacion1=$nro_os.$nro_laboratorio.$nro_orden.$mes.$año;
$cod_grabacion1 = trim($cod_grabacion1, " ");



include ("../../../conexiones/config_gb.php");
$sql = "INSERT INTO `historial_ordenes` ( `cod_grabacion` , `periodo` , `ano` , `nro_os` , `nro_laboratorio` ,`matricula` , `nro_afiliado` ,`nro_orden` , `fecha` ,`medico` , `coseguro` , `autorizacion` , `fecha_fac` , `nro_fac` , `confirmada` ) VALUES ( '$cod_grabacion1' , '$mes' , '$año' , '$nro_os' , '$nro_laboratorio' , '$matricula' , '$nro_afiliado' , '$nro_orden' , '$fecha_a' , '$medico' ,'$coseguro' , '$autorizacion' , '' , '' , 7 )";
mysql_query($sql);

$sql = "INSERT INTO `ordenes` ( `cod_grabacion` , `periodo` , `ano` , `nro_os` , `nro_laboratorio` ,`matricula` , `nro_afiliado` ,`nro_orden` , `fecha` ,`medico` , `coseguro` , `autorizacion` , `fecha_fac` , `nro_fac` , `confirmada` , `marca` , `lote` ) VALUES ( '$cod_grabacion1' , '$mes' , '$año' , '$nro_os' , '$nro_laboratorio' , '$matricula' , '$nro_afiliado' , '$nro_orden' , '$fecha_a' , '$medico' ,'$coseguro' , '$autorizacion' , '' , '' , 7 , '' , '$lote')";
mysql_query($sql);


include ("../../../conexiones/config_pr.php");
$sql8="select practica from convenio_practica where cod_practica = '$nro_practica' and nro_os = $nro_os";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);


if ($practica == ""){

	include ("actualizar_practicas.php");
//	$leyenda = "Practica Inexistente";
//	include ("../../../alertas/campo_vacio.php");
//	exit;
	}
	else





	include ("../../../conexiones/config_gb.php");					{
$sql ="INSERT INTO `historial_detalle` ( `cod_grabacion` , `nro_os` , `nro_laboratorio` , `nro_orden` , `nro_practica` , `valor` , `periodo` , `ano` , `nro_factura` , `confirmada` , `cod_operacion` ) VALUES 
('$cod_grabacion1' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '$valor' ,'$mes' , '$año' , '$nro_factura' , '7' , '')";
mysql_query($sql);

echo $sql ="INSERT INTO `detalle` ( `cod_grabacion` , `nro_os` , `nro_laboratorio` , `nro_orden` , `nro_practica` , `valor` , `periodo` , `ano` , `nro_factura` , `confirmada` , `cod_operacion` , `marca` , `lote`  ) VALUES ('$cod_grabacion1' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '$valor' ,'$mes' , '$año' , '$nro_factura' , '7' , '' , '' , '$lote')";
mysql_query($sql);

if ($bandera != 1){
	
//	echo "<hr noshade>";?>
 <table width="103%" height="25" border="0"> 
<?php }

	include ("../../../conexiones/config_gb.php");	
$sql7="select ordenes_grabadas.detalle.cod_operacion, ordenes_grabadas.detalle.nro_practica, practicas.convenio_practica.practica from ordenes_grabadas.detalle INNER JOIN practicas.convenio_practica ON ordenes_grabadas.detalle.nro_practica = practicas.convenio_practica.cod_practica WHERE practicas.convenio_practica.nro_os = $nro_os AND ordenes_grabadas.detalle.cod_grabacion = '$cod_grabacion1' order by ordenes_grabadas.detalle.cod_operacion desc";
$result7 = $db->Execute($sql7);





if (!$result7) die("fallo".$db->ErrorMsg());

 while (!$result7->EOF) {
$cod_operacion=$result7->fields["cod_operacion"];
$nro_practi=ucwords($result7->fields["nro_practica"]);
$practica=ucwords($result7->fields["practica"]);

$cantidad = $cantidad + 1;
$practica = substr($practica,0,30);

?>  

<tr align="center" bordercolor="#FFFFFF" bgcolor="#006699">
  <td width="313" height="21" bgcolor="#E1F2EF" scope="col"><div align="right"><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif"><?php echo $cantidad;?></font></div></td>
    <td width="49" bgcolor="#E1F2EF" scope="col"><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif"><a href="borra.php?cod_grabacion=<?php print("$cod_grabacion1");?>		  &nro_practica=<?php print("$nro_practi");?> &cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&autorizacion=<?php print("$autorizacion");?> 
 &nro_orden=<?php print("$nro_orden");?>
 &nro_laboratorio=<?php print("$nro_laboratorio");?>
 &afiliado=<?php print("$nro_afiliado");?>
 &prescriptor=<?php print("$medico");?>
 &fecha_orden=<?php print("$fecha_orden");?>
 &coseguro=<?php print("$coseguro");?>
&autorizacion=<?php print("$autorizacion");?>
&&anio_o=<?php print("$anio_o");?>&anio=<?php print("$anio");?>&nro_os=<?php print("$nro_os");?>

" title = "Presione aqui para borrar la practica (<?php echo $nro_practi;?>) <?php echo $practica;?> "> <?php echo $nro_practi;?></a></font></td>


<td width="643" bgcolor="#E1F2EF" scope="col"><div align="left"><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif">  
  <?php echo $practica;?>
  <input type = "hidden" name = "cod_operacio" id="cod_operacio" size = "10"  value ="<?php echo $cod_operacio;?>">
</font></div></td>




<?php 


//mandar dos variables en vez de una cod_grabacion mas nro_practica
$result7->MoveNext();

	}


}
				}
break;
}

}

?>

</table> 


<!-- </BODY>
</HTML> -->




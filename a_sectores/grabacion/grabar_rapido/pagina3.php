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
.Estilo10 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; }
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
							
				
				case "nro_orden":
				document.getElementById("afiliado").focus();
				break;
				
				case "afiliado":
				document.getElementById("prescriptor").focus();
				break;

				case "prescriptor":
				document.getElementById("fecha_orden").focus();
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
echo "Pagina 3";
$nro_os = $_REQUEST['nro_os'];
$nro_laboratorio = $_REQUEST['nro_laboratorio'];
$periodo= $_REQUEST['periodo'];
$nro_orden= $_REQUEST['nro_orden'];
$afiliado= $_REQUEST['afiliado'];
$afiliado= trim($afiliado);
$prescriptor= $_REQUEST['prescriptor'];
$fecha_orden= $_REQUEST['fecha_orden'];
$autorizacion= $_REQUEST['autorizacion'];
$coseguro= $_REQUEST['coseguro'];

include ("comprobar_fechas.php");

include ("../../../conexiones/config_os.php");
$sql4="select * from prescriptor where nro_os = $nro_os and matricula = $prescriptor";
$result4 = $db->Execute($sql4);
$nombre_pres=strtoupper($result4->fields["nombre"]);

if ($nombre_pres == ""){
$prescriptor = "";
}




if ($nro_os == 5073){
$sql3="select * from afiliados_pami where nro_afiliado like '$afiliado'";
}
$result3 = $db->Execute($sql3);
$nombre=strtoupper($result3->fields["nombre"]);
if ($nombre == ""){
$afiliados = "";
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
<FORM name="form" ACTION="<?php php echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">

<table width="103%" cellpadding="3" cellspacing="0">
 <tr bgcolor="#CCFFCC" >
   <td colspan="3" bgcolor="#E6E6E6" class="left" ><div align="center"><strong>GRABACION DE ORDENES pagina 3 </strong></div></td>
   </tr>
 <tr bgcolor="#000099" class="Estilo4" >
   <td class="left" ><div align="center" class="Estilo8">
     <div align="left">Obra Social </div>
   </div></td>
   <td class="left" ><div align="center" class="Estilo8">
     <div align="left">Laboratorio / Cuenta </div>
   </div></td>
   <td class="Estilo4" ><div align="center" class="Estilo8">
     <div align="left">Mes</div>
   </div></td>
 </tr>
 <tr bgcolor="#CCFFCC" >
 <td width="22%" class="left" >
   <span class="Estilo4">
   <input type="text" size="4" name="nro_os" value="<?php echo $nro_os;?>"> 
   <?php echo$sigla;?></span></td>
  <td width="51%" class="left" >
<input type="text" size="4" name="nro_laboratorio" value="<?php echo $nro_laboratorio;?>">
 <span class="Estilo4"><?php echo $nombre_laboratorio;?>
</span></td>
  <td width="27%" class="Estilo4" >
<input type="text" size="1" name="periodo" onkeypress="return verif_caracter(this,event)" class="text" value="<?php echo $periodo;?>" id="periodo">

 <?php echo $mes;?>
</td>
 </tr>
 </table>
<table width="103%" cellpadding="5" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bgcolor="#E1F2EF" >
    <td width="322" class="left" >
      <div align="center" class="Estilo1 Estilo4 Estilo9">
        <div align="center">
          <label >N&ordm; Orden</label>
        </div>
    </div></td>
    <td width="82" class="left" ><div align="center" class="Estilo10">
        <div align="center">Nº Afiliado</div>
    </div></td>
    <td width="82" class="left" ><div align="center" class="Estilo10">
        <div align="center">Prescriptor</div>
    </div></td>
    <td width="58" class="left" ><div align="center" class="Estilo10">
        <div align="center">Fecha Orden</div>
    </div></td>
    <td width="37" class="left" ><div align="center" class="Estilo10">
        <div align="center">Autoriz.</div>
    </div></td>
    <td width="53" class="left" ><div align="center" class="Estilo10">
        <div align="center">Coseguro</div>
    </div></td>
    <td width="51" class="left Estilo1 Estilo4 Estilo6" ><div align="center" class="Estilo9">Practicas</div></td>
  </tr>
  <tr >
    <td class="left" ><div align="center"><span class="right">
        <input type="text" size="5" name="nro_orden"   id="nro_orden" value = "<?php echo $nro_orden;?>" onKeyPress="return verif_caracter(this,event)">
    </span></div></td>

	
    <td class="left" ><div align="center"><span class="right">
        <input type="text" size="14" name="afiliado"  value = "<?php echo $afiliado;?>" id="afiliado" onKeyPress="return verif_caracter(this,event)">
    </span></div></td>
    <td class="left" ><div align="center"><span class="right">
        <input type="text" size="14" name="prescriptor"  value = "<?php echo $prescriptor;?>" id="prescriptor" onKeyPress="return verif_caracter(this,event)">
    </span></div></td>
    <td class="left" ><div align="center"><span class="right">
        <input type="text" size="10" name="fecha_orden"  value = "<?php echo $fecha_orden;?>" id="fecha_orden" onKeyPress="return verif_caracter(this,event)" maxlength = "6">
    </span></div></td>
    <td class="left" ><div align="center"><span class="right">
        <input type="text" size="6" name="autorizacion" value = "<?php echo $autorizacion;?>" id="autorizacion" onKeyPress="return verif_caracter(this,event)">
    </span></div></td>
    <td class="left" ><div align="center"><span class="right">
        <input type="text" size="5" name="coseguro"  value = "<?php echo $coseguro;?>" id="coseguro" onKeyPress="return verif_caracter(this,event)">
    </span></div></td>
    <td class="left" ><div align="center"><span class="right"><span class="Estilo4"><span class="right Estilo6">
      <!-- <input type="submit" name="GUARDAR" value="OK"> -->
    </span></span>
      
  <!--  <input type="hidden" name="nro_os" value="<?php echo $nro_os;?>" > -->
        <!--   <input type="hidden" name="periodo" value="<?php echo $periodo;?>">  -->
    </span></div></td>
  </tr>
 



  <tr>

	<td height="28" colspan="7" valign="top" bgcolor="#C9FADF" class="Estilo4" > Afiliado: <?php echo $nombre;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Prescriptor: <?php echo $nombre_pres;?> </td>
</table>




<table width="103%" cellpadding="5" cellspacing="0">
  <!--DWLayoutTable-->
 <tr bgcolor="#E1F2EF" >
<td width="41%" height="28" valign="top" bgcolor="#E6E6E6" class="Estilo4" >
<span class="Estilo6"><span class="Estilo9">Ingrese Practica</span>
<input type="text" size="5" name="nro_practica" id="nro_practica" tabindex = "26">
   </span>
       <span class="right Estilo6">
     <input type="submit" name="Alta" value="SI" ID="SI">
      </span><span class="right">     </span></td>
    <td width="20%" height="28" valign="top" bgcolor="#E6E6E6" class="Estilo4" ><div align="center"><span class="right Estilo6">
      <a href="borra.php?cod_grabacion=<?php print("$cod_grabacion1");?>		  &nro_practica=<?php print("$nro_practi");?> &cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&autorizacion=<?php print("$autorizacion");?> 
 &nro_orden=<?php print("$nro_orden");?>
 &nro_laboratorio=<?php print("$nro_laboratorio");?>
 &afiliado=<?php print("$nro_afiliado");?>
 &prescriptor=<?php print("$medico");?>
 &fecha_orden=<?php print("$fecha_orden");?>
 &coseguro=<?php print("$coseguro");?>
&autorizacion=<?php print("$autorizacion");?>
&anio=<?php print("$anio");?>&nro_os=<?php print("$nro_os");?>

" title = "Presione aqui para borrar la practica (<?php echo $nro_practi;?>) <?php echo $practica;?> "> </a></span></div>      <div align="center"><span class="right Estilo6">
	  
	<a href="orden.php?cod_grabacion=<?php print("$cod_grabacion1");?>		  &nro_practica=<?php print("$nro_practi");?> &cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&autorizacion=<?php print("$autorizacion");?> 
 &nro_orden=<?php print("$nro_orden");?>
 &nro_laboratorio=<?php print("$nro_laboratorio");?>
 &afiliado=<?php print("$nro_afiliado");?>
 &prescriptor=<?php print("$medico");?>
 &fecha_orden=<?php print("$fecha_orden");?>
 &coseguro=<?php print("$coseguro");?>
&autorizacion=<?php print("$autorizacion");?>
&anio=<?php print("$anio");?>&nro_os=<?php print("$nro_os");?>

" tabindex = "27" title = "Presione aqui para ingresar una nueva orden">CAMBIAR ORDEN </a></span></div></td>
    <td width="19%" valign="top" bgcolor="#E6E6E6" class="Estilo4" ><div align="center"><span class="right Estilo6">
	
	<a href="cuenta.php?cod_grabacion=<?php print("$cod_grabacion1");?>		  &nro_practica=<?php print("$nro_practi");?> &cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&autorizacion=<?php print("$autorizacion");?> 
 &nro_orden=<?php print("$nro_orden");?>
 &nro_laboratorio=<?php print("$nro_laboratorio");?>
 &afiliado=<?php print("$nro_afiliado");?>
 &prescriptor=<?php print("$medico");?>
 &fecha_orden=<?php print("$fecha_orden");?>
 &coseguro=<?php print("$coseguro");?>
&nro_os=<?php print("$nro_os");?>
&anio=<?php print("$anio");?>&nro_os=<?php print("$nro_os");?>

" tabindex = "28" title = "Presione aqui para ingresar una nueva cuenta">CAMBIAR CUENTA </a></span></div></td>
    <td width="20%" valign="top" bgcolor="#E6E6E6" class="Estilo4" ><div align="center"><span class="right Estilo6">
	
	<a href="obra.php?cod_grabacion=<?php print("$cod_grabacion1");?>		  &nro_practica=<?php print("$nro_practi");?> &cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&autorizacion=<?php print("$autorizacion");?> 
 &nro_orden=<?php print("$nro_orden");?>
 &nro_laboratorio=<?php print("$nro_laboratorio");?>
 &afiliado=<?php print("$nro_afiliado");?>
 &prescriptor=<?php print("$medico");?>
 &fecha_orden=<?php print("$fecha_orden");?>
 &coseguro=<?php print("$coseguro");?>
&autorizacion=<?php print("$autorizacion");?>
&anio=<?php print("$anio");?>&nro_os=<?php print("$nro_os");?>

" tabindex = "29" title = "Presione aqui para ingresar una nueva obra social">CAMBIAR OBRA S.</a></span></div></td>
 
 <td width="20%" valign="top" bgcolor="#E6E6E6" class="Estilo4" ><div align="center"><span class="right Estilo6">
	
	<a href="borrar_orden.php?cod_grabacion=<?php print("$cod_grabacion1");?>		  &nro_practica=<?php print("$nro_practi");?> &cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&autorizacion=<?php print("$autorizacion");?> 
 &nro_orden=<?php print("$nro_orden");?>
 &nro_laboratorio=<?php print("$nro_laboratorio");?>
 &afiliado=<?php print("$nro_afiliado");?>
 &prescriptor=<?php print("$medico");?>
 &fecha_orden=<?php print("$fecha_orden");?>
 &coseguro=<?php print("$coseguro");?>
&nro_os=<?php print("$nro_os");?>
&anio=<?php print("$anio");?>&nro_os=<?php print("$nro_os");?>

" tabindex ="30" title = "Presione aqui para Borrar la Orden Completa">BORRAR ORDEN</a></span></div></td>
 
 </table>

</form>

<?php 

/*if ($actualizar_practicas =="SI"){
include ("actualizar_practicas.php");
		$actualizar_practicas =="NO";
$titulos = "no";
		

}
*/

//include ("actualizar_practicas.php");


if(isset($_REQUEST['Alta'])) {
	
	switch ($_REQUEST['Alta'])
	{
		
case "SI":
				{


$nro_os=$_REQUEST["nro_os"];
 $nro_laboratorio=$_REQUEST["nro_laboratorio"];
$nro_laboratorio = trim($nro_laboratorio);

 $nro_afiliado=$_REQUEST["afiliado"];
 $nro_orden=$_REQUEST["nro_orden"];
$nro_orden = trim($nro_orden);

 $fecha=$_REQUEST["fecha_orden"];
 $medico=$_REQUEST["prescriptor"];
 $coseguro=$_REQUEST["coseguro"];
 $autorizacion=$_REQUEST["autorizacion"];
 $año = date("y");
 $cod_grabacion=$nro_os.$matricula.$nro_orden;
$nro_practica=$_REQUEST["nro_practica"];
$mes=$_POST["periodo"];
$cod_grabacion1=$nro_os.$nro_laboratorio.$nro_orden.$mes.$año;






include ("../../../conexiones/config_gb.php");
$sql = "INSERT INTO `historial_ordenes` ( `cod_grabacion` , `periodo` , `ano` , `nro_os` , `nro_laboratorio` ,`matricula` , `nro_afiliado` ,`nro_orden` , `fecha` ,`medico` , `coseguro` , `autorizacion` , `fecha_fac` , `nro_fac` , `confirmada` ) VALUES ( '$cod_grabacion1' , '$mes' , '$año' , '$nro_os' , '$nro_laboratorio' , '$matricula' , '$nro_afiliado' , '$nro_orden' , '$fecha_a' , '$medico' ,'$coseguro' , '$autorizacion' , '' , '' , 7 )";
mysql_query($sql);

$sql = "INSERT INTO `ordenes` ( `cod_grabacion` , `periodo` , `ano` , `nro_os` , `nro_laboratorio` ,`matricula` , `nro_afiliado` ,`nro_orden` , `fecha` ,`medico` , `coseguro` , `autorizacion` , `fecha_fac` , `nro_fac` , `confirmada` ) VALUES ( '$cod_grabacion1' , '$mes' , '$año' , '$nro_os' , '$nro_laboratorio' , '$matricula' , '$nro_afiliado' , '$nro_orden' , '$fecha_a' , '$medico' ,'$coseguro' , '$autorizacion' , '' , '' , 7 )";
mysql_query($sql);


include ("../../../conexiones/config_pr.php");
$sql8="select * from convenio_practica where cod_practica = '$nro_practica' and nro_os = $nro_os";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);


if ($practica == ""){
	echo "Practica Inexistente";
	}
	else
include ("../../../conexiones/config_gb.php");					{
$sql ="INSERT INTO `historial_detalle` ( `cod_grabacion` , `nro_os` , `nro_laboratorio` , `nro_orden` , `nro_practica` , `valor` , `periodo` , `ano` , `nro_factura` , `confirmada` , `cod_operacion` ) VALUES 
('$cod_grabacion1' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '$valor' ,'$mes' , '$año' , '$nro_factura' , '7' , '')";
mysql_query($sql);

$sql ="INSERT INTO `detalle` ( `cod_grabacion` , `nro_os` , `nro_laboratorio` , `nro_orden` , `nro_practica` , `valor` , `periodo` , `ano` , `nro_factura` , `confirmada` , `cod_operacion` ) VALUES 
('$cod_grabacion1' , '$nro_os' , '$nro_laboratorio' , '$nro_orden' , '$nro_practica' , '$valor' ,'$mes' , '$año' , '$nro_factura' , '7' , '')";
mysql_query($sql);
					


?>	  <table width="103%" height="53" border="0">
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFD988">
    <td width="38" height="21" scope="col"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Item </font></td>
    <td width="38" scope="col"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nº </font></div></td>
    
	<!-- <td width="24" scope="col"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td> -->

    <td width="360" scope="col"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Descripci&oacute;n de la Pr&aacute;ctica </font></div></td>
 
	
    </tr>

<?php 
	include ("../../../conexiones/config_gb.php");	
$sql7="select * from detalle where cod_grabacion = '$cod_grabacion1' order by cod_operacion desc";
$result7 = $db->Execute($sql7);

if (!$result7) die("fallo".$db->ErrorMsg());

 while (!$result7->EOF) {
$cod_operacion=$result7->fields["cod_operacion"];
$nro_practi=ucwords($result7->fields["nro_practica"]);

$cantidad = $cantidad + 1;

include ("../../../conexiones/config_pr.php");
$sql8="select * from convenio_practica where cod_practica = '$nro_practi' and nro_os = $nro_os";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);

$practica = substr($practica,0,30);

?>  

<tr align="center" bordercolor="#FFFFFF" bgcolor="#006699">
    <td height="26" bgcolor="#FFFFFF" scope="col"><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif"><?php echo $cantidad;?></font></td>
    <td bgcolor="#FFFFFF" scope="col"><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif"><a href="borra.php?cod_grabacion=<?php print("$cod_grabacion1");?>		  &nro_practica=<?php print("$nro_practi");?> &cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&autorizacion=<?php print("$autorizacion");?> 
 &nro_orden=<?php print("$nro_orden");?>
 &nro_laboratorio=<?php print("$nro_laboratorio");?>
 &afiliado=<?php print("$nro_afiliado");?>
 &prescriptor=<?php print("$medico");?>
 &fecha_orden=<?php print("$fecha_orden");?>
 &coseguro=<?php print("$coseguro");?>
&autorizacion=<?php print("$autorizacion");?>
&anio=<?php print("$anio");?>&nro_os=<?php print("$nro_os");?>

" title = "Presione aqui para borrar la practica (<?php echo $nro_practi;?>) <?php echo $practica;?> "> <?php echo $nro_practi;?></a></font></td>


<td bgcolor="#FFFFFF" scope="col"><div align="left"><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif">  
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


</BODY>
</HTML>

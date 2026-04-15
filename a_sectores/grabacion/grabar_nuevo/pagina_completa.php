<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Grabación de Ordenes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">




<link href="../../../css/fondo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo1 {font-family: Arial, Helvetica, sans-serif}
.Estilo6 {color: #FFFFFF}
.Estilo8 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; }
.Estilo9 {color: #000000}
.Estilo18 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
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



$cod_grabacion=$_REQUEST['cod_grabacion'];
$operador=$_REQUEST['operador'];

include ("../../../conexiones/config.inc.php");
 $sql="select * from grabadas_temp where operador = $operador";
$result = $db->Execute($sql);

$periodo=strtoupper($result->fields["periodo"]);
$ano=strtoupper($result->fields["ano"]);
$nro_os=strtoupper($result->fields["nro_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$nro_laboratorio=strtoupper($result->fields["nro_laboratorio"]);
$nombre_laboratorio=strtoupper($result->fields["nombre_laboratorio"]);
$nro_afiliado=strtoupper($result->fields["nro_afiliado"]);
$nombre_afiliado=strtoupper($result->fields["nombre_afiliado"]);
$nro_orden=strtoupper($result->fields["nro_orden"]);
$fecha=strtoupper($result->fields["fecha"]);
$fecha_realizacion=strtoupper($result->fields["fecha_realizacion"]);
$medico=strtoupper($result->fields["medico"]);
$nombre_medico=strtoupper($result->fields["nombre_medico"]);
$coseguro=strtoupper($result->fields["coseguro"]);
$autorizacion=strtoupper($result->fields["autorizacion"]);
$confirmada=strtoupper($result->fields["confirmada"]);
$lote=strtoupper($result->fields["lote"]);
$operador=strtoupper($result->fields["operador"]);
$nombre_operador=strtoupper($result->fields["nombre_operador"]);

$tipo_afiliado=$_REQUEST['tipo_afiliado'];

$nro_practica=$_REQUEST['nro_practica'];



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
<FORM name="form" ACTION="pagina_completa.php" METHOD = "POST">

<table width="850" cellpadding="3" cellspacing="0" BORDER = "0">
 <tr bgcolor="#000099" >
   <td colspan="3"  ><div align="center"><span class="Estilo8"> ANALISIS SOLICITADO - Ingreso de Prácticas</span></div></td>
   </tr>
 <tr bgcolor="#E1F2EF"  >
   <td width="31%"  >Obra Social: 

      <?php echo$sigla;?> - <?php echo $nro_os;?></td>
   <td width="39%"  >Paciente: 
    
      
       <?php echo $nombre_laboratorio;?> <?php echo $nro_laboratorio;?> </td>
   <td width="30%">Periodo:       
             
          <?php echo $mes1;?> <?php echo $anio;?> </strong></div></td>
 </tr>
 <tr bgcolor="#E1F2EF" >
   <td>N&ordm; Orden: <?php echo $nro_orden;?>
   
</td>
   <td>Fec  Orden: <?php echo $fecha_orden;?> </td>
   <td > Fec. Rea: <?php echo $fecha_realizacion;?> </td>
 </tr>
 <tr bgcolor="#E1F2EF"   >
   <td>Medico:<?php echo $medico;?> <span class="Estilo19"><?php echo $nombre_medico;?>  </td>
   <td>
     Nombre Lote:"<strong><?php echo $lote;?>
               
      " </td>
   <td >&nbsp;</td>
 </tr>
 <tr bgcolor="#D2CCF9" >
   <td>475 = HEMOGRAMA </td>
   <td  >&nbsp;</td>
   <td >&nbsp;</td>
 </tr>
 <tr bgcolor="#D2CCF9" >
   <td >471 = HEMOGLOBINA </td>
   <td >&nbsp;</td>
   <td >&nbsp;</td>
 </tr>
 <tr bgcolor="#D2CCF9"  >
   <td >711 = ORINA </td>
   <td  >&nbsp;</td>
   <td  >&nbsp;</td>
 </tr>
 <tr bgcolor="#D2CCF9"  >
   <td >736 = MATERIA FECAL</td>
   <td  >&nbsp;</td>
   <td >&nbsp;</td>
 </tr>
 </table>


<table width="850" height="44" border="0
" cellpadding="5" cellspacing="0">
  <!--DWLayoutTable-->
 <tr valign="middle" bgcolor="#E6E6E6" >
   <td width="47%" valign="middle"  >Practica:
          <input type="text" size="5" name="nro_practica" id="nro_practica" tabindex = "26">      <span class="right Estilo6">
     <span class="Estilo9">
     <input type="submit" name="Alta" value="SI" id="SI">
     <input name="tipo" type="radio" value="1" checked>
    Practicas 
     <input name="tipo" type="radio" value="2">
        M&oacute;dulos</span></td>
   <td width="53%" height="44"  >
<a href="guardar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&nro_practica=<?php print("$nro_practi");?>&&cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&&autorizacion=<?php print("$autorizacion");?>&&nro_orden=<?php print("$nro_orden");?>&&nro_laboratorio=<?php print("$nro_laboratorio");?>&&afiliado=<?php print("$nro_afiliado");?>&&prescriptor=<?php print("$medico");?>&&fecha_orden=<?php print("$fecha_orden");?>&&coseguro=<?php print("$coseguro");?>&&nro_os=<?php print("$nro_os");?>&&anio_o=<?php print("$anio_o");?>&&anio=<?php print("$anio");?>&&nro_os=<?php print("$nro_os");?>&&lote=<?php print("$lote");?>&&operador=<?php print("$operador");?>" tabindex = "28" title = "Presione aqui para ingresar una nueva orden"><img src="../../../imagenes/CDR/ORDEN.png" alt="Cambiar Orden" border = "0"> </a><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><span class="left"><span class="left Estilo1"><span class="right"><span class="right Estilo6">
   
<a href="cuenta.php?cod_grabacion=<?php print("$cod_grabacion");?>&&nro_practica=<?php print("$nro_practi");?>&&cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&&autorizacion=<?php print("$autorizacion");?>&&nro_orden=<?php print("$nro_orden");?>&&nro_laboratorio=<?php print("$nro_laboratorio");?>&&afiliado=<?php print("$nro_afiliado");?>&&prescriptor=<?php print("$medico");?>&&fecha_orden=<?php print("$fecha_orden");?>&&coseguro=<?php print("$coseguro");?>&&nro_os=<?php print("$nro_os");?>&&anio_o=<?php print("$anio_o");?>&&anio=<?php print("$anio");?>&&nro_os=<?php print("$nro_os");?>&&lote=<?php print("$lote");?>&&operador=<?php print("$operador");?>" tabindex = "29" title = "Presione aqui para ingresar una nueva cuenta"> </a>
 
<a href="obra.php?cod_grabacion=<?php print("$cod_grabacion");?>&&nro_practica=<?php print("$nro_practi");?> &&cod_operacion=<?php print("$cod_operacion");?>&&periodo=<?php print("$periodo");?>&&autorizacion=<?php print("$autorizacion");?>&&nro_orden=<?php print("$nro_orden");?>&&nro_laboratorio=<?php print("$nro_laboratorio");?>&&afiliado=<?php print("$nro_afiliado");?>&&prescriptor=<?php print("$medico");?>&&fecha_orden=<?php print("$fecha_orden");?>&&coseguro=<?php print("$coseguro");?>&&nro_os=<?php print("$nro_os");?>&&anio_o=<?php print("$anio_o");?>&&anio=<?php print("$anio");?>&nro_os=<?php print("$nro_os");?> &&lote=<?php print("$lote");?>&&operador=<?php print("$operador");?>" tabindex ="30" title = "Presione aqui para ingresar una nueva obra social"> </a>

 <a href="borrar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&nro_practica=<?php print("$nro_practi");?>&cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&autorizacion=<?php print("$autorizacion");?>&nro_orden=<?php print("$nro_orden");?>&nro_laboratorio=<?php print("$nro_laboratorio");?>&afiliado=<?php print("$nro_afiliado");?>&prescriptor=<?php print("$medico");?>&fecha_orden=<?php print("$fecha_orden");?>&coseguro=<?php print("$coseguro");?>&nro_os=<?php print("$nro_os");?>&&anio_o=<?php print("$anio_o");?>&anio=<?php print("$anio");?>&nro_os=<?php print("$nro_os");?>&&operador=<?php print("$operador");?>" tabindex ="30" title = "Presione aqui para Borrar la Orden Completa"><img src="../../../imagenes/botones/btn_borrartodo.gif" alt="Cambiar Orden" border = "0"></a> </span></span></span></span></font></td>



<input type="hidden" size="4" name="nro_os" value="<?php echo $nro_os;?>">
<input type="hidden" size="4" name="nro_laboratorio" value="<?php echo $nro_laboratorio;?>">
<input type="hidden" size="1" name="periodo" onKeyPress="return verif_caracter(this,event)" class="text" value="<?php echo $periodo;?>" id="periodo">
<input name="nro_orden" type="hidden"   id="nro_orden" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $nro_orden;?>" size="9" maxlength="8">
<input name="afiliado" type="hidden"   id="afiliado"  value = "<?php echo $nro_afiliado;?>" size="9" maxlength="8">
<input name="autorizacion" type="hidden" class="text" id="autorizacion"  value = "<?php echo $autorizacion;?>" size="6" maxlength="6">
<input name="prescriptor" type="hidden"   id="prescriptor"  value = "<?php echo $medico;?>" size="9" maxlength="8">
<input name="lote" type="hidden" value="<?php echo $lote;?>">
<input type="hidden" size="10" name="fecha_orden"  value = "<?php echo $fecha_orden;?>" id="fecha_orden" onKeyPress="return verif_caracter(this,event)" maxlength = "6">
<input type="hidden" size="10" name="actualiza"  value = "<?php echo $actualiza;?>">
<input type="hidden" size="10" name="dia"  value = "<?php echo $dia;?>" id="dia4" onKeyPress="return verif_caracter(this,event)" maxlength = "6">
<input type="hidden" size="10" name="mes"  value = "<?php echo $mes;?>" id="mes4" onKeyPress="return verif_caracter(this,event)" maxlength = "6">			
<input type="hidden" size="10" name="anio_o"  value = "<?php echo $ano;?>" id="anio_o4" onKeyPress="return verif_caracter(this,event)" maxlength = "6">
<input type="hidden" size="5" name="coseguro"  value = "<?php echo $coseguro;?>" id="coseguro3" onKeyPress="return verif_caracter(this,event)">
<input type="hidden" size="5" name="borra"  value = "NO">
<input type="hidden" size="5" name="operador"  value = "<?php echo $operador;?>">
<input type="hidden" size="5" name="tipo_afiliado"  value = "<?php echo $tipo_afiliado;?>">
<input type="hidden" size="5" name="cod_grabacion"  value = "<?php echo $cod_grabacion;?>">
  </table>
</form>

<table width="850" border="1" cellpadding="1" cellspacing="0">
  <tr bgcolor="#C4D7E6">
    <td width="50">ITEM</td>
    <td width="100">NRO PRACTICA</div></td>
    <td width="600">PRACTICA</td>
	 <td width="50">BORRAR</td>
  </tr>
  


<?php 

$tipo = $_REQUEST['tipo'];

switch ($tipo){
	case "1":{
if ($borra != "SI"){
$sql8="select practica from convenio_practica where cod_practica = '$nro_practica' and nro_os = 4975 order by rand()";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);

if ($practica != ""){

	
$sql ="INSERT INTO `detalle_temp` ( `cod_grabacion` ,  `nro_practica` , `practica` , `cod_operacion` , `operador` , `nro_laboratorio` ) VALUES ('$operador' ,  '$nro_practica' , '$practica' , '' , '$operador' , '$nro_laboratorio')";
		mysql_query($sql);
}
else{

?><script language="JavaScript" type="text/javascript">
alert("PRACTICA INEXISTENTE");
</script><?php 


//$leyenda = "Practica Inexistente";
//include ("../../../alertas/campo_vacio.php");
exit;
}
}
break;}

case "2":{
 $sql10="select * from deta_modulo where cod_modulo = $nro_practica";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {

$cod_practica=strtoupper($result10->fields["cod_practica"]);

$sql8="select practica from convenio_practica where cod_practica = '$cod_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);

$sql99 ="INSERT INTO `detalle_temp` ( `cod_grabacion` ,  `nro_practica` , `practica` , `cod_operacion` , `operador` , `nro_laboratorio` ) VALUES ('$operador' ,  '$cod_practica' , '$practica' , '' , '$operador' , '$nro_laboratorio')";
mysql_query($sql99);

$result10->MoveNext();

}

break;
}

}





$sql10="select * from detalle_temp where cod_grabacion = $operador and operador = $operador order by cod_operacion";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {

$cod_grabacion2=strtoupper($result10->fields["cod_grabacion"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
$nro_practica=strtoupper($result10->fields["nro_practica"]);
$practica=strtoupper($result10->fields["practica"]);
$operador=strtoupper($result10->fields["operador"]);

$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
$cantidad = $cantidad + 1;

$practica = substr($practica,0,30);


?>

    <tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">

    <td><div align="center" class="Estilo18"><?php echo $cantidad;?></div></td>
    <td><div align="center" class="Estilo18"><?php echo $nro_practica;?></div></td>
    <td><div class="Estilo18"><a href="borra_practica.php?operador=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>" target = "central" class="Estilo18" > <?php echo $practica;?></a>
	
	
	
	</div></td>
	<td><div align="center"><a href="borra_practica.php?operador=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>" target = "central" class="Estilo18" >  <IMG SRC="../../../imagenes/office//1047.ico" alt="Imprimir" border = "0"></a></div></td>
  </tr>
<?php 

$result10->MoveNext();

	}

	?></table>

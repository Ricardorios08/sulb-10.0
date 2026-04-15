<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Grabación de Ordenes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">




<link href="../../../css/fondo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo6 {color: #FFFFFF}
.Estilo9 {color: #000000}
.Estilo3 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo10 {font-size: 12px}
.Estilo12 {color: #000000; font-weight: bold; }
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
include ("../../../conexiones/config.inc.php");
include ("../../../funciones/funciones.php");

 $banda_gris=$_REQUEST['banda_gris'];
 $nro_afiliado=$_REQUEST['nro_afiliado'];

if ($banda_gris == 1){
include ("primera_vez.php");
$banda_gris= "";
}

$cod_grabacion=$_REQUEST['cod_grabacion'];
$operador=$_REQUEST['operador'];
$cod_practica=$_REQUEST['cod_practica'];
$sel=$_REQUEST['sel'];



echo $sql="select * from grabadas_temp";
$result = $db->Execute($sql);

$periodo=strtoupper($result->fields["periodo"]);
$cod_grabacion=strtoupper($result->fields["cod_grabacion"]);

$ano=strtoupper($result->fields["ano"]);
$nro_os=strtoupper($result->fields["nro_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$nro_laboratorio=strtoupper($result->fields["nro_laboratorio"]);
$nombre_laboratorio=strtoupper($result->fields["nombre_laboratorio"]);
$nombre_afiliado=strtoupper($result->fields["nombre_afiliado"]);
$nro_orden=strtoupper($result->fields["nro_orden"]);
$fecha=strtoupper($result->fields["fecha"]);
$fecha_orden=strtoupper($result->fields["fecha"]);
$nro_afiliado=strtoupper($result->fields["nro_afiliado"]);
$fecha1 = fecha_argentina($fecha_orden);
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
$nro_practica_buscar=$_REQUEST['nro_practica_buscar'];



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

if (($sel == 'mod') and ($cod_practica != "")) {
  $sql99 = "UPDATE grabadas_temp SET `modulo` = '$cod_practica' WHERE cod_grabacion = $cod_grabacion";
mysql_query($sql99);


echo  $sql10="select * from deta_modulo where cod_modulo = $cod_practica order by cod_operacion";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {

$cod_practica=strtoupper($result10->fields["cod_practica"]);

echo $sql8="select practica from convenio_practica where cod_practica = '$cod_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);

$sql99 ="INSERT INTO `detalle_temp` ( `cod_grabacion` ,  `nro_practica` , `practica` , `cod_operacion` , `operador` , `nro_laboratorio` ) VALUES ('$operador' ,  '$cod_practica' , '$practica' , '' , '$operador' , '$nro_laboratorio')";
mysql_query($sql99);




$result10->MoveNext();

}

$cod_practica = "";
}
elseif ($cod_practica != ""){
echo $sql8="select practica from convenio_practica where cod_practica = '$cod_practica' and nro_os = 4975";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);


$sql ="INSERT INTO `detalle_temp` ( `cod_grabacion` ,  `nro_practica` , `practica` , `cod_operacion` , `operador` , `nro_laboratorio` ) VALUES ('$operador' ,  '$cod_practica' , '$practica' , '' , '$operador' , '$nro_laboratorio')";
mysql_query($sql);

$cod_practica = "";
}


echo $sql8="select cod_grabacion from ordenes order by cod_grabacion desc LIMIT 1";
$result8 = $db->Execute($sql8);
$cod_gr=strtoupper($result8->fields["cod_grabacion"]) + 1;


?>
<BODY onload = "on_load()">
<FORM ACTION="pagina_completa_reducida.php" METHOD = "POST" name="form" class="Estilo3">

<table width="850" cellpadding="3" cellspacing="0" BORDER = "0">
  <!--DWLayoutTable-->
 <tr bgcolor="#000099" >
   <td colspan="4" bgcolor="#CCCCCC"  ><div align="center"><span class="Estilo12"> ANALISIS SOLICITADO DEL PACIENTE: </span> <strong><?php echo $nombre_laboratorio;?> <?php echo $nro_laboratorio;?></strong></div>
     <div align="right"></div></td>
   </tr>
 <tr bgcolor="#E1F2EF"  >
   <td width="257" bgcolor="#CCCCCC"  ><div align="center">
     <div align="left">Obra Social: <?php echo$sigla;?> - <?php echo $nro_os;?></div>
   </div></td>
   <td colspan="2" bgcolor="#CCCCCC"  ><div align="center">Fecha  Orden: <?php echo $fecha1;?> </div></td>
   <td width="249" bgcolor="#CCCCCC"><div align="center">N&ordm; Protocolo: <?php echo $cod_gr;?></div></td>
 </tr>
 
 
 <tr bgcolor="#D2CCF9" >
   <td colspan="4" bgcolor="#FFFF99"><div align="center"><span class="Estilo10"> 475 = HEMOGRAMA 471 = HEMOGLOBINA 711 = ORINA 736 = MATERIA FECAL</span></div></td>
   </tr>
 
 <tr>
   <td height="0"></td>
   <td></td>
   <td width="188"></td>
   <td></td>
 </tr>
 <tr>
   <td height="7"></td>
   <td width="132"></td>
   <td></td>
   <td></td>
 </tr>
 </table>


<table width="850" border="0" cellpadding="5" cellspacing="0">
 
  <?php
      

      if ($sel == "mod"){?>


  <tr valign="middle" bgcolor="#E6E6E6" >
    <td width="36%" valign="middle"  ><span class="Estilo9">
      <input name="tipo" type="radio" value="1" >
Practicas
<input name="tipo" type="radio" value="2" checked>
M&oacute;dulos </span></td>

<?php }else{?>
  <tr valign="middle" bgcolor="#E6E6E6" >
    <td width="36%" valign="middle"  ><span class="Estilo9">
      <input name="tipo" type="radio" value="1" checked>
Practicas
<input name="tipo" type="radio" value="2">
M&oacute;dulos </span></td>


<?php }?>



    <td width="40%" valign="middle"  ><div align="center"></div></td>
    <td width="24%" rowspan="3"  >
      <div align="center"><a href="../../pacientes/guardar_orden_reducido.php?cod_grabacion=<?php print("$cod_grabacion");?>&&nro_practica=<?php print("$nro_practi");?>&&cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&&autorizacion=<?php print("$autorizacion");?>&&nro_orden=<?php print("$nro_orden");?>&&nro_laboratorio=<?php print("$nro_laboratorio");?>&&afiliado=<?php print("$nro_afiliado");?>&&prescriptor=<?php print("$medico");?>&&fecha_orden=<?php print("$fecha_orden");?>&&coseguro=<?php print("$coseguro");?>&&nro_os=<?php print("$nro_os");?>&&anio_o=<?php print("$anio_o");?>&&anio=<?php print("$anio");?>&&nro_os=<?php print("$nro_os");?>&&lote=<?php print("$lote");?>&&operador=<?php print("$operador");?>" tabindex = "28" title = "Presione aqui para ingresar una nueva orden"><img src="../../../imagenes/CDR/orden.png" alt="Cambiar Orden" border = "0"> </a>
      
      
     <!--  <font color="#000000"><span class="left"><span class="left "><span class="right"><span class="right Estilo6"> <a href="borrar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&nro_practica=<?php print("$nro_practi");?>&cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&autorizacion=<?php print("$autorizacion");?>&nro_orden=<?php print("$nro_orden");?>&nro_laboratorio=<?php print("$nro_laboratorio");?>&afiliado=<?php print("$nro_afiliado");?>&prescriptor=<?php print("$medico");?>&fecha_orden=<?php print("$fecha_orden");?>&coseguro=<?php print("$coseguro");?>&nro_os=<?php print("$nro_os");?>&&anio_o=<?php print("$anio_o");?>&anio=<?php print("$anio");?>&nro_os=<?php print("$nro_os");?>&&operador=<?php print("$operador");?>" tabindex ="30" title = "Presione aqui para Borrar la Orden Completa"><img src="../../../imagenes/CDR/borrar.png" alt="Cambiar Orden" border = "0"></a> </span></span></span></span></font></div> -->      </td>
  <tr valign="middle" bgcolor="#E6E6E6" >
    <td valign="middle"  >Buscar Modulo:
      <input type="text" size="20" name="nro_practica_buscar" id="nro_practica2" value = "<?php echo $nro_practica_buscar;?>" tabindex = "26"></td>
    <td valign="middle"  >&nbsp;</td>
  <tr valign="middle" bgcolor="#E6E6E6" >
   <td valign="middle"  >Practica:
          <input type="text" size="20" name="nro_practica" id="nro_practica" tabindex = "26" value = "<?php echo $cod_practica;?>">      <span class="right Estilo6">
     <span class="Estilo9">
     <input type="submit" name="Alta" value="SI" id="SI">
     </span></td>
   <td valign="middle"  ><div align="center"><span class="Estilo9">
       <!-- <input type="submit" name="tipo" value="PRACTICAS"> -->
       <input type="submit" name="tipo" value="VALIDAR ABM">
       <input type="submit" name="tipo" value="MODULOS">
<input type="submit" name="tipo" value="VER ORDEN">
   </span></div></td>
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




  <table width="850" border="1" cellpadding="1" cellspacing="0">
  <tr bgcolor="#C4D7E6">
    <td width="50"><span class="Estilo3">ITEM</span></td>
    <td width="100"><span class="Estilo3">NRO PRACTICA
      
    </span></td>
    <td width="600"><span class="Estilo3">PRACTICA</span></td>
	 <td width="50"><span class="Estilo3">BORRAR</span></td>
  </tr>



</form>


<?php

$tipo = $_REQUEST['tipo'];

switch ($tipo){
	
	
	case "1":{


if(is_numeric($nro_practica)) {

if ($borra != "SI"){
echo $sql8="select practica from convenio_practica where cod_practica = '$nro_practica' and nro_os = 4975 order by rand()";
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


    }
    else {

        INCLUDE ("buscar_practica.php");
    }
  



break;}

case "2":{

	?>

  
<?php

 $cod_grabacion = $_REQUEST['cod_grabacion'];
 $sql99 = "UPDATE grabadas_temp SET `modulo` = '$nro_practica' WHERE cod_grabacion = $cod_grabacion";
mysql_query($sql99);


 echo $sql10="select * from deta_modulo where cod_modulo = $nro_practica";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {

$cod_practica=strtoupper($result10->fields["cod_practica"]);

echo $sql8="select practica from convenio_practica where cod_practica = '$cod_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);

$sql99 ="INSERT INTO `detalle_temp` ( `cod_grabacion` ,  `nro_practica` , `practica` , `cod_operacion` , `operador` , `nro_laboratorio` ) VALUES ('$operador' ,  '$cod_practica' , '$practica' , '' , '$operador' , '$nro_laboratorio')";
mysql_query($sql99);




$result10->MoveNext();

}

break;
}

case "PRACTICAS":{

INCLUDE ("buscar_practica.php");
BREAK;
}

case "MODULOS":{


INCLUDE ("buscar_modulo.php");
EXIT;
BREAK;
}

case "VALIDAR ABM":{

require_once("../../../nusoap/lib/nusoap.php");

echo $sql10="select * from grabadas_temp";
$result10 = $db->Execute($sql10);
echo $nro_os=strtoupper($result10->fields["nro_os"]);

 $nro_practica;
 
$wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_ordenes.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl');  
$param1=array('sql'=>$nro_practica , 'apellido'=>$nro_os);
$response= $client->call('practicas', $param1);

$resultado = $response;

if ($resultado != ""){
?>

<table width="850" border="2" cellspacing="0">
  <tr>
    <th height="61" bgcolor="#B8B8B8" scope="col">PRACTICA NO AUTORIZADA POR ASOCIACION BIOQUIMICA DE MENDOZA </th>
  </tr>
  <tr>
    <th height="61" bgcolor="#EDEDED" scope="col"><span class="Estilo12 Estilo1"><?php echo $resultado;?></span></th>
  </tr>
  <tr>
    <th height="61" bgcolor="#EDEDED" scope="col"> <input name="button" type="button" id ="boton" onClick="history.back()" onKeyPress="history.back()" value="Presione ENTER O CLICK para volver al menu anterior"></th>
  </tr>
</table>

<?php

	EXIT;
}



EXIT;
BREAK;
}

case "VER ORDEN":{


echo $sql10="select * from detalle_temp  order by cod_operacion";
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

    <td><div align="center" class="Estilo3"><?php echo $cantidad;?></div></td>
    <td><div align="center" class="Estilo3"><?php echo $nro_practica;?></div></td>
    <td><div class="Estilo3"><a href="borra_practica.php?operador=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>" target = "central" > <?php echo $practica;?></a>
	
	
	
	</div></td>
	<td><div align="center" class="Estilo3"><a href="borra_practica.php?operador=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>" target = "central" >  <IMG SRC="../../../imagenes/office//1047.ico" alt="Imprimir" border = "0"></a></div></td>
  </tr>
<?php 

$result10->MoveNext();

	}

	?></table><?php 
EXIT;
BREAK;
}

}



//INCLUDE ("ver_detalle.php");


echo $sql10="select * from detalle_temp  order by cod_operacion";
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

    <td><div align="center" class="Estilo3"><?php echo $cantidad;?></div></td>
    <td><div align="center" class="Estilo3"><?php echo $nro_practica;?></div></td>
    <td><div class="Estilo3"><a href="borra_practica.php?operador=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>" target = "central" > <?php echo $practica;?></a>
	
	
	
	</div></td>
	<td><div align="center" class="Estilo3"><a href="borra_practica.php?operador=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>" target = "central" >  <IMG SRC="../../../imagenes/office//1047.ico" alt="Imprimir" border = "0"></a></div></td>
  </tr>
<?php 

$result10->MoveNext();

	}

	?></table>

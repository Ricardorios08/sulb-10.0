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

include ("../../../conexiones/config_gb.php");
 $sql="select * from grabadas_temp";
$result = $db->Execute($sql);
$cod_grabacion=strtoupper($result->fields["cod_grabacion"]);
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
$medico=strtoupper($result->fields["medico"]);
$nombre_medico=strtoupper($result->fields["nombre_medico"]);
$coseguro=strtoupper($result->fields["coseguro"]);
$autorizacion=strtoupper($result->fields["autorizacion"]);
$confirmada=strtoupper($result->fields["confirmada"]);
$lote=strtoupper($result->fields["lote"]);
$operador=strtoupper($result->fields["operador"]);
$nombre_operador=strtoupper($result->fields["nombre_operador"]);



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

<table width="103%" cellpadding="3" cellspacing="0" BORDER = "0">
 <tr bgcolor="#000099" >
   <td colspan="3" class="left Estilo6" ><div align="center"> </div>     
     <span class="Estilo1"> Lote:<strong><?php echo $lote;?>
     <input name="lote" type="hidden" value="<?php echo $lote;?>">
     </strong></span><span class="Estilo14"> ________________________ <span class="Estilo6"><strong>GRABACION DE ORDENES</strong></span></span></strong>  <span class="Estilo14">________________________</span> <span class="Estilo11">Operador: <?php echo $nombre_operador;?></span> <div align="center" class="Estilo6"><span class="Estilo1"></span></div></td>
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
          <?php echo $mes1;?> <?php echo $ano;?> </strong></div></td>
 </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td class="left Estilo1" >N&ordm; Orden: <strong><?php echo $nro_orden;?>
       <input name="nro_orden" type="hidden"   id="nro_orden" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $nro_orden;?>" size="9" maxlength="8">
   </strong></td>
   <td class="left Estilo1" >Afiliado: <span class="right"><span class="Estilo17"><?php echo $nombre_afiliado;?>
         <input name="afiliado" type="hidden"   id="afiliado" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $nro_afiliado;?>" size="9" maxlength="8">
</span></span></td>
   <td class="left" ><div align="right" class="Estilo1">
     <div align="left">Prescriptor: <span class="right"><strong><?php echo $nombre_medico ;?>
            <input name="prescriptor" type="hidden"   id="prescriptor" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $medico;?>" size="9" maxlength="8">
     </strong></span></div>
   </div></td>
 </tr>
 <tr bgcolor="#E1F2EF" class="Estilo4" >
   <td class="left Estilo1" >Fecha de Orden: <strong><?php echo $fecha;?>
       <input type="hidden" size="10" name="fecha_orden"  value = "<?php echo $fecha_orden;?>" 
	   id="fecha_orden" onKeyPress="return verif_caracter(this,event)" maxlength = "6">
<input type="hidden" size="10" name="actualiza"  value = "<?php echo $actualiza;?>">
	   <strong>
       <input type="hidden" size="10" name="dia"  value = "<?php echo $dia;?>" id="dia" onKeyPress="return verif_caracter(this,event)" maxlength = "6">
      </strong> <strong>
      <input type="hidden" size="10" name="mes"  value = "<?php echo $mes;?>" id="mes" onKeyPress="return verif_caracter(this,event)" maxlength = "6">
      </strong></strong><strong>
      <input type="hidden" size="10" name="anio_o"  value = "<?php echo $ano;?>" id="anio" onKeyPress="return verif_caracter(this,event)" maxlength = "6">
      </strong></td>
   <td class="left Estilo1" >Autoriz:.<span class="right"><strong> <?php echo $autorizacion;?>
         <input name="autorizacion" type="hidden" class="text" id="autorizacion" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $autorizacion;?>" size="6" maxlength="6">
   </strong></span></td>
   <td class="left" ><div align="center" class="Estilo15">
     <div align="left">Coseguro: <strong><?php echo $coseguro;?>
            <input type="hidden" size="5" name="coseguro"  value = "<?php echo $coseguro;?>" id="coseguro3" onKeyPress="return verif_caracter(this,event)">
<input type="hidden" size="5" name="borra"  value = "NO">

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
   <td height="44" class="Estilo4" ><div align="center"><a href="guardar_orden.php" tabindex = "28" title = "Presione aqui para ingresar una nueva orden"><img src="../../../imagenes/CDR/ORDEN.PNG" alt="Cambiar Orden" border = "0"> </a>

</td>
  </table>
</form>

<table width="1050" border="0">
  <tr bgcolor="#C4D7E6">
    <td width="89"><div align="center" class="Estilo18">ITEM</div></td>
    <td width="179"><div align="center" class="Estilo18">NRO PRACTICA</div></td>
    <td width="768"><div align="center" class="Estilo4"><span class="Estilo1">PRACTICA</span></div></td>
  </tr>
  


<?php 
if ($borra != "SI"){
include ("../../../conexiones/config_pr.php");
$sql8="select practica from convenio_practica where cod_practica = '$nro_practica' and nro_os = $nro_os order by rand()";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);

if ($practica != ""){
	include ("../../../conexiones/config_gb.php");
	
	$sql ="INSERT INTO `detalle_temp` ( `cod_grabacion` ,  `nro_practica` , `practica` , `cod_operacion` ) VALUES ('$cod_grabacion' ,  '$nro_practica' , '$practica' , '' )";
		mysql_query($sql);
}
else{

$leyenda = "Practica Inexistente";
include ("../../../alertas/campo_vacio.php");
exit;
}

}
include ("../../../conexiones/config_gb.php");
$sql10="select * from detalle_temp";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo".$db->ErrorMsg());
 while (!$result10->EOF) {

$cod_grabacion=strtoupper($result10->fields["cod_grabacion"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
$nro_practica=strtoupper($result10->fields["nro_practica"]);
$practica=strtoupper($result10->fields["practica"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
$cantidad = $cantidad + 1;

$practica = substr($practica,0,30);


?>
<tr bgcolor="#E0EDF3">
    <td><div align="center" class="Estilo18"><?php echo $cantidad;?></div></td>
    <td><div align="center" class="Estilo18"><?php echo $nro_practica;?></div></td>
    <td><a href="borra_practica.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>" target = "central" class="Estilo18" ><?php echo $practica;?></a></td>
  </tr>
<?php 

$result10->MoveNext();

	}

	?></table>

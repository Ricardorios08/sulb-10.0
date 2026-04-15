<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Grabación de Ordenes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">



<link href="../../menus.css" rel="stylesheet" type="text/css" />
<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />
 
<style type="text/css">
<!--
.Estilo6 {color: #FFFFFF}
.Estilo9 {color: #000000}
.Estilo3 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo12 {color: #000000; font-weight: bold; }
.Estilo13 {color: #FF0000}
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
$tipo_operador = $_REQUEST['tipo_operador'];
$tipo_operador;



if ($banda_gris == 1){

include ("primera_vez.php");

$banda_gris= "";
}



$cod_grabacion=$_REQUEST['cod_grabacion'];
$operador=$_REQUEST['operador'];
$cod_practica=$_REQUEST['cod_practica'];
$sel=$_REQUEST['sel'];


$sql="select * from grabadas_temp";
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


$sql="select * from arancel where nro_os = $nro_os";
$result = $db->Execute($sql);
$uh=$result->fields["uh"];
$uh_especiales=$result->fields["uh_especiales"];
$uh_alta=$result->fields["uh_alta"];



  $sql12="select * from pacientes where nro_paciente = $nro_laboratorio";
$result12 = $db->Execute($sql12);
$nombre_laboratorio=strtoupper($result12->fields["nombre"]);
$coseguro=strtoupper($result12->fields["coseguro"]);
$plan=strtoupper($result12->fields["plan"]);
$activo=strtoupper($result12->fields["activo"]);
$ultima_fecha=strtoupper($result12->fields["ultima_fecha"]);


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


 $sql10="select * from deta_modulo where cod_modulo = $cod_practica order by cod_operacion";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {

$cod_practica=strtoupper($result10->fields["cod_practica"]);

$sql8="select * from convenio_practica where cod_practica = '$cod_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);
$categoria=strtoupper($result8->fields["categoria"]);
$honorarios=strtoupper($result8->fields["honorarios"]);

  $sql99 ="INSERT INTO `detalle_temp` ( `cod_grabacion` ,  `nro_practica` , `practica` , `cod_operacion` , `operador` , `nro_laboratorio` , `honorarios` , `categoria` ) VALUES ('$operador' ,  '$cod_practica' , '$practica' , '' , '$operador' , '$nro_laboratorio' , '$honorarios' , '$categoria')";
mysql_query($sql99);




$result10->MoveNext();

}

$cod_practica = "";
}
elseif ($cod_practica != ""){
 $sql8="select * from convenio_practica where cod_practica = '$cod_practica' and nro_os = 4975";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);
$categoria=strtoupper($result8->fields["categoria"]);
$honorarios=strtoupper($result8->fields["honorarios"]);


$sql ="INSERT INTO `detalle_temp` ( `cod_grabacion` ,  `nro_practica` , `practica` , `cod_operacion` , `operador` , `nro_laboratorio` , `honorarios` , `categoria` ) VALUES ('$operador' ,  '$cod_practica' , '$practica' , '' , '$operador' , '$nro_laboratorio' , '$honorarios' , '$categoria')";
mysql_query($sql);

$cod_practica = "";
}


$sql8="select cod_grabacion from ordenes order by cod_grabacion desc";
$result8 = $db->Execute($sql8);
$cod_gr=strtoupper($result8->fields["cod_grabacion"]) + 1;



$sql="select * from requisitos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql);
$requisitos=$result1->fields["requisitos"];
$version=$result1->fields["version"];
$suspendido=$result1->fields["suspendido"];
$vigencia=$result1->fields["vigencia"];


 $dia = substr($vigencia,8,2);
 $mes = substr($vigencia,5,2);
 $anio = substr($vigencia,0,4);

 $vigencia = $dia."/".$mes."/".$anio;



$comunes=$result1->fields["comunes"];
$especiales=$result1->fields["alta"];
$alta=$result1->fields["alta"];
$planes=$result1->fields["planes"];
$diagnostico=$result1->fields["diagnostico"];








?>
<BODY onload = "on_load()">
<FORM ACTION="pagina_completa_reducida.php" METHOD = "POST" name="form" class="Estilo3">

<table width="850" cellpadding="3" cellspacing="0" BORDER = "0">
  <!--DWLayoutTable-->
 <tr bgcolor="#E6E6E6" >
   <td colspan="3" bgcolor="#CCCCCC"  ><div align="left"><span class="Estilo12">  PACIENTE: </span> <strong><?php echo $nombre_laboratorio;?> <?php echo $nro_laboratorio;?></strong></div>
   <div align="right"></div></td>
   <td bgcolor="#CCCCCC"  ><div align="center">N&ordm; Protocolo: <?php echo $cod_gr;?></div></td>
 </tr>
 <tr bgcolor="#E1F2EF"  >
   <td colspan="3" bgcolor="#CCCCCC"  ><div align="center">
     <div align="left">Obra Social: <?php echo $sigla;?> - <?php echo $nro_os;?> Valor NBU: Comunes: <?php echo $uh;?> Especiales: <?php echo $uh_especiales;?> Alta: <?php echo $uh_alta;?></div>
   </div>     <div align="center"></div></td>
   <td width="252" bgcolor="#CCCCCC"><div align="center">Fecha  Orden: <?php echo $fecha1;?> </div></td>
 </tr>
 <tr bgcolor="#E1F2EF"  >
   <td colspan="4" bgcolor="#CCCCCC"  >Respuesta O.S: <?php echo $activo;?> * Ultima Verificación: <?php echo $ultima_fecha;?> * Coseguro: <?php echo $coseguro;?> </td>
    
 </tr>
 
 
 <tr bgcolor="#D2CCF9" >
   <td  colspan="4" bgcolor="#D8F1FA"><div align="center"> 
   
   <?php  if ($requisitos != ""){?>
       <table width="800" border="0" cellpadding="0" cellspacing="0">
            
    
          
            <tr>
              <td colspan="2" bgcolor="#D8F1FA" style="padding: 10px;"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $requisitos;?></font></td>
     
            </tr>
</table>


<?php  include ("plan.php");?>



    <?php } ?>
	
	</div></td>
   </tr>
 
 <tr>
   <td width="257" height="0"></td>
   <td width="132"></td>
   <td width="185"></td>
   <td></td>
 </tr>
 </table>


<table width="850" border="0" cellpadding="5" cellspacing="0">
  <!--DWLayoutTable-->
 
  <?php
      

      if ($sel == "mod"){?>


  <tr valign="middle" bgcolor="#E6E6E6" >
    <td valign="middle"  ><span class="Estilo9">
      <input name="tipo" type="radio" value="1" >
Practicas
<input name="tipo" type="radio" value="2" checked>
M&oacute;dulos </span></td>

    <!-- <td width="563" valign="middle"  ><div align="center"><a href="../../pacientes/guardar_orden_reducido.php?cod_grabacion=<?php print("$cod_grabacion");?>&&nro_practica=<?php print("$nro_practi");?>&&cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&&autorizacion=<?php print("$autorizacion");?>&&nro_orden=<?php print("$nro_orden");?>&&nro_laboratorio=<?php print("$nro_laboratorio");?>&&afiliado=<?php print("$nro_afiliado");?>&&prescriptor=<?php print("$medico");?>&&fecha_orden=<?php print("$fecha_orden");?>&&coseguro=<?php print("$coseguro");?>&&nro_os=<?php print("$nro_os");?>&&anio_o=<?php print("$anio_o");?>&&anio=<?php print("$anio");?>&&nro_os=<?php print("$nro_os");?>&&lote=<?php print("$lote");?>&&operador=<?php print("$operador");?>&&tipo_operador=<?php print("$tipo_operador");?>" tabindex = "28" title = "Presione aqui para ingresar una nueva orden"><img src="../../../imagenes/CDR/bt_guarda.jpg" alt="Cambiar Orden"  border = "0"></a></div></td> -->
    <?php }else{?>
  <tr valign="middle" bgcolor="#E6E6E6" >
    <td width="267" valign="middle"  ><span class="Estilo9">
      <input name="tipo" type="radio" value="1" checked>
Practicas
<input name="tipo" type="radio" value="2">
M&oacute;dulos </span></td>


<?php }?>



    <td valign="middle"  ><div align="center">
	
	<!-- <a href="../../pacientes/guardar_orden_reducido.php?cod_grabacion=<?php print("$cod_grabacion");?>&&nro_practica=<?php print("$nro_practi");?>&&cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&&autorizacion=<?php print("$autorizacion");?>&&nro_orden=<?php print("$nro_orden");?>&&nro_laboratorio=<?php print("$nro_laboratorio");?>&&afiliado=<?php print("$nro_afiliado");?>&&prescriptor=<?php print("$medico");?>&&fecha_orden=<?php print("$fecha_orden");?>&&coseguro=<?php print("$coseguro");?>&&nro_os=<?php print("$nro_os");?>&&anio_o=<?php print("$anio_o");?>&&anio=<?php print("$anio");?>&&nro_os=<?php print("$nro_os");?>&&lote=<?php print("$lote");?>&&operador=<?php print("$operador");?>" tabindex = "28" title = "Presione aqui para ingresar una nueva orden"></a> -->
	
	
	<a href="../../pacientes/guardar_orden_reducido.php?cod_grabacion=<?php print("$cod_grabacion");?>&&nro_practica=<?php print("$nro_practi");?>&&cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&&autorizacion=<?php print("$autorizacion");?>&&nro_orden=<?php print("$nro_orden");?>&&nro_laboratorio=<?php print("$nro_laboratorio");?>&&afiliado=<?php print("$nro_afiliado");?>&&prescriptor=<?php print("$medico");?>&&fecha_orden=<?php print("$fecha_orden");?>&&coseguro=<?php print("$coseguro");?>&&nro_os=<?php print("$nro_os");?>&&anio_o=<?php print("$anio_o");?>&&anio=<?php print("$anio");?>&&nro_os=<?php print("$nro_os");?>&&lote=<?php print("$lote");?>&&operador=<?php print("$operador");?>&&tipo_operador=<?php print("$tipo_operador");?>" tabindex = "28" title = "Presione aqui para ingresar una nueva orden"><img src="../../../imagenes/CDR/bt_guarda.jpg" alt="Cambiar Orden"  border = "0"></a>
	</div>
      <div align="center">      <!--  <font color="#000000"><span class="left"><span class="left "><span class="right"><span class="right Estilo6"> <a href="borrar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&nro_practica=<?php print("$nro_practi");?>&cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&autorizacion=<?php print("$autorizacion");?>&nro_orden=<?php print("$nro_orden");?>&nro_laboratorio=<?php print("$nro_laboratorio");?>&afiliado=<?php print("$nro_afiliado");?>&prescriptor=<?php print("$medico");?>&fecha_orden=<?php print("$fecha_orden");?>&coseguro=<?php print("$coseguro");?>&nro_os=<?php print("$nro_os");?>&&anio_o=<?php print("$anio_o");?>&anio=<?php print("$anio");?>&nro_os=<?php print("$nro_os");?>&&operador=<?php print("$operador");?>" tabindex ="30" title = "Presione aqui para Borrar la Orden Completa"><img src="../../../imagenes/CDR/borrar.png" alt="Cambiar Orden" border = "0"></a> </span></span></span></span></font></div> -->      </td>
    <tr valign="middle" bgcolor="#E6E6E6" >
   <td valign="middle"  >Practica:
          <input type="text" size="20" name="nro_practica" id="nro_practica" tabindex = "26" value = "<?php echo $cod_practica;?>">      <span class="right Estilo6">
     <span class="Estilo9">


     <input type="submit" name="Alta" value="SI" id="SI">
     </span></td>
   <td valign="middle"  ><div align="center"><span class="Estilo9">
       <!-- <input type="submit" name="tipo" value="PRACTICAS"> -->
   </span><a href="../../pacientes/guardar_orden_reducido.php?cod_grabacion=<?php print("$cod_grabacion");?>&&nro_practica=<?php print("$nro_practi");?>&&cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&&autorizacion=<?php print("$autorizacion");?>&&nro_orden=<?php print("$nro_orden");?>&&nro_laboratorio=<?php print("$nro_laboratorio");?>&&afiliado=<?php print("$nro_afiliado");?>&&prescriptor=<?php print("$medico");?>&&fecha_orden=<?php print("$fecha_orden");?>&&coseguro=<?php print("$coseguro");?>&&nro_os=<?php print("$nro_os");?>&&anio_o=<?php print("$anio_o");?>&&anio=<?php print("$anio");?>&&nro_os=<?php print("$nro_os");?>&&lote=<?php print("$lote");?>&&operador=<?php print("$operador");?>&&tipo_operador=<?php print("$tipo_operador");?>" tabindex = "28" title = "Presione aqui para ingresar una nueva orden"></a>
   <input name="tipo" type="submit" class="Estilo6" style="background:url(../../../imagenes/CDR/aorden.png)" value="  VER ORDEN " width="96" height="42">
   <input name="tipo" type="submit" class="Estilo6" style="background:url(../../../imagenes/CDR/aorden.png)" value="   MODULOS  " width="96" height="42">
   <!-- <input name="tipo" type="submit" class="Estilo6" style="background:url(../../../imagenes/CDR/aorden.png)" value="PRACTICA ABM" width="96" height="42"> -->
   <input name="tipo" type="submit" class="Estilo6" style="background:url(../../../imagenes/CDR/aorden.png)" value="  ORDEN ABM " width="96" height="42">
<input name="tipo" type="submit" class="Estilo6" style="background:url(../../../imagenes/CDR/aorden.png)" value="CASOS" width="96" height="42">
   <input name="tipo" type="submit" class="Estilo6" style="background:url(../../../imagenes/CDR/aorden.png)" value="AUTORIZACIONES" width="96" height="42">

   </div></td>
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
	   <input type="hidden" name="tipo_operador" value= "<?php echo $tipo_operador;?>" >
  </table>




  <table width="850" border="1" cellpadding="1" cellspacing="0">
  <tr bgcolor="#C4D7E6">
    <td width="40"><span class="Estilo3">ITEM</span></td>
    <td width="40"><span class="Estilo3">NRO</span></td>


    <td width="400"><span class="Estilo3">PRACTICA</span></td>
	 <td width="300"><CENTER><span class="Estilo3">MENSAJE ABM</span></CENTER></td>
	  <td width="40"><CENTER><span class="Estilo3">CAT</span></CENTER></td>
  <td width="45"><CENTER><span class="Estilo3">COS</span></CENTER></td>
	    <td width="35"><CENTER><span class="Estilo3">U.B.</span></CENTER></td>
	<td width="60"><CENTER><span class="Estilo3"><center>VALOR</center></span></CENTER></td>

	 <td width="50"></CENTER><span class="Estilo3">BORRAR</span></CENTER></td>
  </tr>



</form>


<?php

$tipo = $_REQUEST['tipo'];
$nro_os = $_REQUEST['nro_os'];

 $sql="select * from grabadas_temp";
$result = $db->Execute($sql);
 $nro_os=strtoupper($result->fields["nro_os"]);


 $sql="select * from arancel where nro_os = $nro_os";
$result = $db->Execute($sql);
$uh=$result->fields["uh"];
$uh_especiales=$result->fields["uh_especiales"];
$uh_alta=$result->fields["uh_alta"];


switch ($tipo){
	
	
	case "1":{


if(is_numeric($nro_practica)) {

if ($borra != "SI"){
  $sql8="select * from convenio_practica where cod_practica = '$nro_practica' and nro_os = 4975 order by rand()";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);
$categoria=strtoupper($result8->fields["categoria"]);
$honorarios=strtoupper($result8->fields["honorarios"]);




if ($practica != ""){

 /*
 
 $sql8="select * from `detalle_temp` where nro_practica = '$nro_practica'";
$result8 = $db->Execute($sql8);
$cod_pract=$result8->fields["nro_practica"];

if ($cod_pract != ""){
$leyenda = "YA INGRESO ESA PRACTICA";
include ("../../../alertas/campo_informacion2.php");
exit;
}
*/


$sql ="INSERT INTO `detalle_temp` ( `cod_grabacion` ,  `nro_practica` , `practica` , `cod_operacion` , `operador` , `nro_laboratorio` , `honorarios` , `categoria` ) VALUES ('$operador' ,  '$nro_practica' , '$practica' , '' , '$operador' , '$nro_laboratorio' , '$honorarios' , '$categoria')";
		mysql_query($sql);



include ("casos.php");


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

  $sql="select * from grabadas_temp";
$result = $db->Execute($sql);
 $nro_os=strtoupper($result->fields["nro_os"]);


 $sql99 = "UPDATE grabadas_temp SET `modulo` = '$nro_practica' WHERE cod_grabacion = $cod_grabacion";
mysql_query($sql99);


 $sql10="select * from deta_modulo where cod_modulo = $nro_practica";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {

$cod_practica=strtoupper($result10->fields["cod_practica"]);

$sql8="select practica from convenio_practica where cod_practica = '$nro_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);
$categoria=strtoupper($result8->fields["categoria"]);
$honorarios=strtoupper($result8->fields["honorarios"]);


$sql99 ="INSERT INTO `detalle_temp` ( `cod_grabacion` ,  `nro_practica` , `practica` , `cod_operacion` , `operador` , `nro_laboratorio` , `honorarios` , `categoria` ) VALUES ('$operador' ,  '$cod_practica' , '$practica' , '' , '$operador' , '$nro_laboratorio' , '$honorarios' , '$categoria')";
mysql_query($sql99);




$result10->MoveNext();

}

break;
}

case "PRACTICAS":{

INCLUDE ("buscar_practica.php");
BREAK;
}

case "AUTORIZACIONES":{

INCLUDE ("buscar_practica_autorizaciones.php");
BREAK;
}

case "CASOS":{

INCLUDE ("buscar_casos.php");
BREAK;
}





case "   MODULOS  ":{


INCLUDE ("buscar_modulo.php");
EXIT;
BREAK;
}

case "PRACTICA ABM":{

require_once("../../../nusoap/lib/nusoap.php");

  $sql10="select * from grabadas_temp";
$result10 = $db->Execute($sql10);

 $nro_os=strtoupper($result10->fields["nro_os"]);

 $nro_practica;
 

$wsdl='http://sistemadeordenes.com.ar/sulb/nusoap/lib/servicio_ordenes.php?wsdl';
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

case "VER ORDÑÑÑENGFGGF":{

$nro_os = $_REQUEST['nro_os'];

$sql10="select * from detalle_temp  order by cod_operacion";
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


$honorarios=strtoupper($result10->fields["honorarios"]);
$categoria=strtoupper($result10->fields["categoria"]);

switch ($categoria){
	case "1":{$valor = $honorarios * $uh;$categori = "COM";break;}
	case "2":{$valor = $honorarios * $uh_especiales;$categori = "ESP";break;}
	case "3":{$valor = $honorarios * $uh_alta;$categori = "ALT";break;}
}

  $sql8="select * from a_practicas_rechazadas where cod_practica = '$nro_practica' and nro_os = $nro_os and plan = '$plan'";
$result8 = $db->Execute($sql8);
$cod_practi=$result8->fields["cod_practica"];
$motivo=$result8->fields["motivo"];
$fecha4=$result8->fields["fecha"];

$dia4 = substr($fecha4,8,2);
$mes4 = substr($fecha4,5,2);
$anio4 = substr($fecha4,0,4);
$fecha4 = $dia4."/".$mes4."/".$anio4;

IF ($cod_practi != ""){
 $sql8="select * from a_practicas_rechazadas where cod_practica = '$nro_practica' and nro_os = $nro_os";
$result8 = $db->Execute($sql8);
$cod_practi=$result8->fields["cod_practica"];
$motivo=$result8->fields["motivo"];
$fecha4=$result8->fields["fecha"];

}


if ($cod_practi != ""){
$motivo1 = "RECHAZA PRACTICA N° ".$cod_practica."  ".$nombre_practica." de la Obra Social: ".$sigla." (".$nro_os.") MOTIVO: ".$motivo." FECHA INHIBICION: (".$fecha4.")";
$autorizar = "AUTORICE PRACTICA O SERA DEBITADA";
}else
	 {
$autorizar = "";
	 }



  /* $sql8="select * from planes_os where nro_os = $nro_os and nombre_plan = 'TODOS'";
$result8 = $db->Execute($sql8);

 $nombre_plan=$result8->fields["nombre_plan"];
  $comunes=$result8->fields["comunes"];
$especiales=$result8->fields["especiales"];
 $alta=$result8->fields["alta"];
*/
if (($comunes1 == "SI") and ($categoria == 1)){$autorizar = "AUTORICE PRACTICA O SERA DEBITADA";}
if (($especiales1== "SI") and ($categoria == 2)){$autorizar = "AUTORICE PRACTICA O SERA DEBITADA";}
if (($alta1== "SI")and ($categoria == 3)){$autorizar = "AUTORICE PRACTICA O SERA DEBITADA";}

//coseguro


   /*if (($nro_os == 5185) or ($nro_os == 5340) or ($nro_os == 3526)){ // medimas - medicus - diba nabal

if ($honorarios <= 10){
	$coseguro = 8;
   }else{
	   $coseguro = 30;
   }
   }
*/
//fin coseguro

$total_coseguro = $total_coseguro + $coseguro;
$total1 = $total1 + $valor;

?>

    <tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">

    <td><div align="center" class="Estilo3"><?php echo $cantidad;?></div></td>
    <td><div align="center" class="Estilo3"><?php echo $nro_practica;?></div></td>
    <td><div class="Estilo3"><a href="borra_practica.php?operador=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>&&nro_os=<?php print("$nro_os");?>" target = "central" > <?php echo $practica;?></a> </div> </td>
	 <td><BLINK><div align="center" class="Estilo3"><?PHP echo $autorizar;?></div></BLINK></td>
	
	
<td><div align="center" class="Estilo3"><?php echo $categori;?></div></td>	
<td><div align="center" class="Estilo3">$ <?php echo $coseguro;?></div></td>
<td><div align="center" class="Estilo3"><?php echo $honorarios;?></div></td>
	<td><div align="right" class="Estilo3">$<?php echo number_format($valor,2);?></div></td>
	<td><div align="center" class="Estilo3"><a href="borra_practica.php?operador=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>&&nro_os=<?php print("$nro_os");?>" target = "central" >  <IMG SRC="../../../imagenes/office//1047.ico" alt="Imprimir" border = "0"></a></div></td>
  </tr>
<?php 

$autorizar = "";

$result10->MoveNext();

	}


	?>
		 <tr bordercolor="#ccffff" bgcolor="#ccffff" style="cursor:hand" >
    <td></td>
    <td></td>
	<td></td>
	<td></td>
	

    <td>TOTAL</td>
	
	
	
		<td><div align="center" class="Estilo3">$<?php echo $total_coseguro;?></div></td>
	<td></td>
	<td><div align="center" class="Estilo3">$<?php echo number_format($total,2);?></div></td>
	<td><div align="center" class="Estilo3"></div></td>



	</table><?php 
EXIT;
BREAK;
}

}



//INCLUDE ("ver_detalle.php");


/////////////////////////////////////// VER ORDEN //////////////////////////////////////////////////////////////

   $sql8="select * from planes_os where nro_os = $nro_os and nombre_plan = 'TODOS'";
$result8 = $db->Execute($sql8);

 $nombre_plan=$result8->fields["nombre_plan"];
  $comunes1=$result8->fields["comunes"];
$especiales1=$result8->fields["especiales"];
 $alta1=$result8->fields["alta"];


$sql10="select * from detalle_temp    order by cod_operacion";
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


$honorarios=strtoupper($result10->fields["honorarios"]);
 $categoria=strtoupper($result10->fields["categoria"]);

switch ($categoria){
	case "1":{$valor = $honorarios * $uh;$categori = "COM";break;}
	case "2":{$valor = $honorarios * $uh_especiales;$categori = "ESP";break;}
	case "3":{$valor = $honorarios * $uh_alta;$categori = "ALT";break;}
}

IF (($nro_os == 5080) OR ($nro_os == 4975) OR ($nro_os == 4940)){
$sql8="select * from a_practicas_rechazadas where cod_practica = '$nro_practica' and nro_os = $nro_os and plan = '$plan'";
$result8 = $db->Execute($sql8);
$cod_practi=$result8->fields["cod_practica"];
$motivo=$result8->fields["motivo"];
$fecha4=$result8->fields["fecha"];
 $tipo=$result8->fields["tipo"];
}else{
 $sql8="select * from a_practicas_rechazadas where cod_practica = '$nro_practica' and nro_os = $nro_os";
$result8 = $db->Execute($sql8);
$cod_practi=$result8->fields["cod_practica"];
$motivo=$result8->fields["motivo"];
$fecha4=$result8->fields["fecha"];
$tipo=$result8->fields["tipo"];
}


$dia4 = substr($fecha4,8,2);
$mes4 = substr($fecha4,5,2);
$anio4 = substr($fecha4,0,4);
$fecha4 = $dia4."/".$mes4."/".$anio4;


if ($cod_practi != ""){
$motivo1 = "RECHAZA PRACTICA N° ".$cod_practica."  ".$nombre_practica." de la Obra Social: ".$sigla." (".$nro_os.") MOTIVO: ".$motivo." FECHA INHIBICION: (".$fecha4.")";
$autorizar = "AUTORICE PRACTICA O SERA DEBITADAa";
}else
	 {
$autorizar = "";
	 }




 

if (($comunes1 == "SI") and ($categoria == 1)){$autorizar = "AUTORICE PRACTICA O SERA DEBITADA";}
if (($especiales1== "SI") and ($categoria == 2)){$autorizar = "AUTORICE PRACTICA O SERA DEBITADA";}
if (($alta1== "SI")and ($categoria == 3)){$autorizar = "AUTORICE PRACTICA O SERA DEBITADA";}


if ($nro_os == 1041){
if ($tipo == "A"){$autorizar = $motivo;}
}else{
if ($tipo == "A"){$autorizar = "AUTORIZAR";}
}

if ($tipo == "R"){$autorizar = "RECHAZADA";}
if ($tipo == "E"){$autorizar = "EXCLUIDA";}

if ($categoria == 0){
 $autorizar = "PRACTICA PROPIA LABORATORIO";
}

//coseguro


  /* if (($nro_os == 5185) or ($nro_os == 5340) or ($nro_os == 3526)){ // medimas - medicus - diba nabal

if ($honorarios <= 10){
	$coseguro = 8;
   }else{
	   $coseguro = 30;
   }
   }
*/

$total_coseguro = $total_coseguro + $coseguro;
//fin coseguro


$total = $total + $valor;


?>

    <tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">

    <td><div align="center" class="Estilo3"><?php echo $cantidad;?></div></td>
    <td><div align="center" class="Estilo3"><?php echo $nro_practica;?></div></td>
    <td><div class="Estilo3"><a href="borra_practica.php?operador=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>&&nro_os=<?php print("$nro_os");?>" target = "central" > <?php echo $practica;?></a> </div></td>
	 <td><div align="center" class="Estilo3"><span class="Estilo13"><BLINK><strong><?PHP echo $autorizar;?></strong></BLINK></span></div></td>
	
	
<td><div align="center" class="Estilo3"><?php echo $categori;?></div></td>	
<td><div align="center" class="Estilo3">$ <?php echo $coseguro;?></div></td>	

<td><div align="center" class="Estilo3"><?php echo $honorarios;?></div></td>
	<td><div align="right" class="Estilo3">$<?php echo number_format($valor,2);?></div></td>
	<td><div align="center" class="Estilo3"><a href="borra_practica.php?operador=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>&&nro_os=<?php print("$nro_os");?>" target = "central" >  <IMG SRC="../../../imagenes/office//1047.ico" alt="Imprimir" border = "0"></a></div></td>
  </tr>
<?php 

$autorizar = "";
$result10->MoveNext();

	}

	?> <tr bordercolor="#ccffff" bgcolor="#ccffff" style="cursor:hand" >

    <td></td>
    <td></td>
	<td></td>
	<td></td>
	

    <td>TOTAL</td>
	
	
	
		<td><div align="center" class="Estilo3">$<?php echo $total_coseguro;?></div></td>
	<td></td>
	<td><div align="center" class="Estilo3">$<?php echo number_format($total,2);?></div></td>
	<td><div align="center" class="Estilo3"></div></td>
  </tr>



	</table>

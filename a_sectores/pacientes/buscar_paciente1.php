<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>LISTADO DE PACIENTES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
.Estilo1 {font-size: 10px}
.Estilo2 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo3 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>



</head>





<table width="750" border="0">
  <!--DWLayoutTable-->


<?php include("../../../conexiones/config.inc.php");
$palabra = $_REQUEST['palabra'];
$band = 1;
if ($palabra != ""){
$sql="select * from pacientes where nombre like '%$palabra%' or nro_paciente like '%$palabra%'  or nro_documento like '%$palabra%' or  nro_afiliado like '%$palabra%'  order by nombre";
}else{
$sql="select * from pacientes order by nombre";
}	
$result = $db->Execute($sql);


 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
 $nro_paciente=$result->fields["nro_paciente"];
 $nombre=strtoupper($result->fields["nombre"]);
 $nro_os=$result->fields["nro_os"];

$sql1="select * from datos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$sigla=strtoupper($result1->fields["sigla"]);






?>
  <tr bgcolor="#FFFF99">
    <td height="34" colspan="11"><div align="center"><strong>DATOS PERSONALES</strong></div></td>
  </tr>
  <tr>
    <td height="20" colspan="5"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong>NOMBRE Y APELLIDO DEL PACIENTE </strong></font></div></td>
    <td height="20" colspan="3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><span class="Estilo1">OBRA SOCIAL: </span></font></div></td>
    <td width="55"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"></font><font size="1" face="Arial, Helvetica, sans-serif">MODIFICAR</font></div></td>
    <td width="46"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><span class="Estilo1">ELIMNAR</span></font></div></td>
    <td width="56"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><span class="Estilo1">FICHA</span></font></div></td>
  </tr>
  <tr>
    <td height="34" colspan="5" valign="middle"><div align="center"><a href="../../grabacion/grabar_nuevo\grabacion_ordenes.php?nro_paciente=<?php print("$nro_paciente");?>&&nro_os=<?php print("$nro_os");?>"> </a>      <span class="Estilo3"><font face="Arial, Helvetica, sans-serif"><?php echo $nombre;?> (<?php echo $nro_paciente;?>)</font></span></div></td>
    <td height="34" colspan="3" valign="middle"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><span class="Estilo1"><?php echo $sigla;?>  <?php echo $nro_os;?></span></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="modificar.php?nro_paciente=<?php print("$nro_paciente");?>" target = "central"><img src="../../../imagenes/office//027.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="borra_todo.php?nro_paciente=<?php print("$nro_paciente");?>" onClick="return confirm('&iquest;Est&aacute; seguro de Borrar el paciente con toda su historia Clinica?');"><img src="../../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="ficha.php?nro_paciente=<?php print("$nro_paciente");?>"><img src="../../../imagenes/office//005.ico" alt="Ficha" border = "0"></a></font></div></td>
  </tr>
 

 <?php 


$ordenes = "ordenes";
$detalle = "detalle";

$sql2="select * from $ordenes where nro_paciente = $nro_paciente order by fecha_grabacion";
$result2 = $db->Execute($sql2);

 if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {

$nro_os=strtoupper($result2->fields["nro_os"]);
$nro_paciente=strtoupper($result2->fields["nro_paciente"]);
$periodo=strtoupper($result2->fields["periodo"]);
$marca=strtoupper($result2->fields["marca"]);
$lote=strtoupper($result2->fields["lote"]);
$cod_operacion=strtoupper($result2->fields["cod_operacion"]);



$año=strtoupper($result2->fields["ano"]);
$nro_afiliado=$result2->fields["nro_afiliado"];
$nro_orden=$result2->fields["nro_orden"];
$autorizacion=strtoupper($result2->fields["autorizacion"]);
$operador=strtoupper($result2->fields["operador"]);


$cod_grabacion=strtoupper($result2->fields["cod_grabacion"]);

$fecha_grabacion=strtoupper($result2->fields["fecha_grabacion"]);

$dia = substr($fecha_grabacion,8,2);
$mes= substr($fecha_grabacion,5,2);
$anio = substr($fecha_grabacion,0,4);
$fecha_grabacion = $dia."-".$mes."-".$anio;


$fecha=strtoupper($result2->fields["fecha"]);


$dia = substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio = substr($fecha,0,4);
$fecha = $dia."-".$mes."-".$anio;



$matricula=strtoupper($result2->fields["matricula"]);
$prescriptor=strtoupper($result2->fields["medico"]);
$confirmada=strtoupper($result2->fields["confirmada"]);

 
 if ($band == 1){
 $band = 2;
 ?>
 <tr>
   <td height="29" colspan="11"><div align="center"><a href="../../grabacion/grabar_nuevo\grabacion_ordenes.php?nro_paciente=<?php print("$nro_paciente");?>&&nro_os=<?php print("$nro_os");?>" class="Estilo2">INGRESAR NUEVA RECETA MEDICA</a></div></td>
  </tr>
 <tr bgcolor="#FFFF99">
   <td height="32" colspan="11"><div align="center"><strong>HISTORIA CLINICA </strong></div></td>
  </tr>
 <tr>
    <td width="34">&nbsp;</td>
    <td colspan="2" bgcolor="#FFFF99"><div align="center">Protocolo </div></td>
    <td width="67" bgcolor="#FFFF99"><div align="center"> Solicitada</div></td>
    <td colspan="2" bgcolor="#FFFF99"><div align="center"> Análisis</div></td>
    <td colspan="2" bgcolor="#FFFF99"><div align="center">Pr&aacute;cticas Solicitadas </div>      <div align="center"></div></td>
    <td bgcolor="#FFFF99"><span class="Estilo1">COMPLETAR</span></td>
    <td bgcolor="#FFFF99"><span class="Estilo1">BORRAR</span></td>
    <td bgcolor="#FFFF99"><div align="center" class="Estilo1">INFORME</div></td>
  </tr>
  <?php }?>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center"><?php echo $cod_grabacion;?></div></td>
    <td><div align="center"><?php echo $fecha_grabacion;?></div></td>
    <td colspan="2"><div align="center"><?php echo $fecha;?></div></td>
    <td colspan="2"><?php include ("practicas.php");?>      <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="../emision\emision_mod.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"><img src="../../../imagenes/office//011.ico" alt="Ficha" border = "0"></a></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="borra_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('¿Está seguro de Borrar la orden y sus RESULTADOS?');"><IMG SRC="../../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="../emision/emision.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"><img src="../../../imagenes/office//005.ico" alt="Informe" border = "0"></a></font></div></td>
  </tr>
<?php 

$result2->MoveNext();
		}

$result->MoveNext();
		}
  
  ?>
  <tr>
    <td colspan="11"><HR noshade></td>
  </tr>
  <tr>
    <td colspan="11"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td colspan="11">TOTAL DE PACIENTES: <?php echo $cont;?></td>
  </tr>
  <tr>
    <td></td>
    <td width="41"></td>
    <td width="58"></td>
    <td></td>
    <td width="74"></td>
    <td width="20"></td>
    <td width="188"></td>
    <td width="65"></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>


</body>
</html>

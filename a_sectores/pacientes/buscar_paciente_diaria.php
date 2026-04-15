<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>LISTADO DE PACIENTES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

 <link href="../../menus.css" rel="stylesheet" type="text/css" />
<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />
 <link href="../../css/css/bootstrap.min.css" rel="stylesheet" type="text/css" />


<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
.Estilo35 {color: #FFFFFF}
.Estilo36 {font-size: 12px}
.Estilo28 {font-size: 10px}
.Estilo29 {color: #FFFFFF; font-size: 10px; }
-->
</style>



</head>
<table width="805" border="1" cellspacing="0">
  <!--DWLayoutTable-->

  <tr bgcolor="#CECECE">
    <td height="27" colspan="17" valign="top"><div align="center">Planilla de Trabajo desde: <?php echo $desde_m;?> Hasta: <?php echo $hasta_m;?></div></td>
  </tr>
  <tr bgcolor="#CECECE">

   <td valign="top" bgcolor="#EDEDED"><div align="center" class="Estilo36"><font face="Arial, Helvetica, sans-serif"><a href="../analisis/modelos/a5/sobres-caratula/emision_todos.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>&&desde=<?php print("$desde");?>&&hasta=<?php print("$hasta");?>"></a></font></div>     <div align="center" class="Estilo36"><font face="Arial, Helvetica, sans-serif"><a href="modelos/a5/informes_todos/emision_todos.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>&&desde=<?php print("$desde");?>&&hasta=<?php print("$hasta");?>"></a></font></div></td>
   <td valign="top" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
   <td valign="top" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
   <td valign="top" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
   <td valign="top" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
   <td colspan="3" valign="top" bgcolor="#EDEDED"><div align="center"><font face="Arial, Helvetica, sans-serif">
   
   
   
   <a href="../analisis/modelos/a5/informes_todos/emision_completos.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>&&desde=<?php print("$desde");?>&&hasta=<?php print("$hasta");?>">COMPLETOS</a>
   
   
   </font></div></td>
   <td colspan="5" valign="top" bgcolor="#EDEDED"><CENTER>
   
   <font size="2" face="Arial, Helvetica, sans-serif">
       <a href="../analisis/planilla_vertical/a5/planilla/emision_todos.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>&&desde=<?php print("$desde");?>&&hasta=<?php print("$hasta");?>"> VERTICAL</a>		</font><font face="Arial, Helvetica, sans-serif">
      </font></div></CENTER></td>

   
   
   <td colspan="6" valign="top" bgcolor="#EDEDED"><CENTER>
<font size="2" face="Arial, Helvetica, sans-serif">
   
   <a href="../analisis/modelos_completar/a5/w_garcia/emision_todos.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>&&desde=<?php print("$desde");?>&&hasta=<?php print("$hasta");?>"> DIARIA</a>   </font></div></CENTER></td>
  </tr>



 <tr >
   <td width="24" bgcolor="#666666"><div align="center" class="Estilo35"><span class="Estilo35">-</span></div></td>
   <td width="36" bgcolor="#666666"><div align="center" class="Estilo35"><span class="Estilo35">OSDE</span></div></td>
   <td width="31" bgcolor="#666666"><div align="center"><span class="Estilo35">Proto</span></div></td>
   <td width="34" bgcolor="#666666"><div align="center" class="Estilo35">Fecha</div></td>
   <td width="200" bgcolor="#666666"><div align="center" class="Estilo35">Paciente</div></td>
    <td width="29" bgcolor="#666666"><div align="center" class="Estilo35">Edad</div></td>
    <td width="85" bgcolor="#666666"><div align="center" class="Estilo35 Estilo35">
      <div align="center"> Solicitadas </div>
    </div>      <div align="center" class="Estilo27 Estilo35"></div></td>
	    <td width="26" bgcolor="#666666"><div align="center" class="Estilo35"><span class="Estilo26">TOT.</span></div></td>
		 <td width="28" bgcolor="#666666"><div align="center" class="Estilo35"><span class="Estilo26">ACU.</span></div></td>
    <td width="26" bgcolor="#666666"><div align="center" class="Estilo35"><span class="Estilo26">EST.</span></div></td>
    <td width="35" bgcolor="#666666"><div align="center"><span class="Estilo35"><span class="Estilo26">COMP</span></span></div></td>
    <td width="32" bgcolor="#666666"><div align="center" class="Estilo28 Estilo35"><span class="Estilo26">DERIV</span></div></td>
    <!-- <td width="43" bgcolor="#666666"><div align="center" class="Estilo28 Estilo35"><span class="Estilo26">BORRAR</span></div></td> -->
    <td width="32" bgcolor="#666666"><div align="center" class="Estilo29 Estilo35">
      <div align="center">INF.</div>
    </div></td>
    <td width="48" bgcolor="#666666"><div align="center" class="Estilo35"><span class="Estilo26">ANULAR</span></div></td>
    <td width="32" bgcolor="#666666"><div align="center"><span class="Estilo26 Estilo35">AUT.</span></div></td>
    <td width="30" bgcolor="#666666"><!--DWLayoutEmptyCell-->&nbsp;</td>
 </tr>



<?php 

$porcentaje1 = 50;
$porcentaje2 = 50;


$ordenes = "ordenes";
$detalle = "detalle";

 include("../../conexiones/config.inc.php");


    $sql2="select * from $ordenes where fecha between '$desde' and '$hasta' order by cod_grabacion";
$result20 = $db->Execute($sql2);

 if (!$result20) die("fallo".$db->ErrorMsg());
  while (!$result20->EOF) {

$cod_grabacion=strtoupper($result20->fields["cod_grabacion"]);
$nro_os=strtoupper($result20->fields["nro_os"]);
$nro_paciente=strtoupper($result20->fields["nro_paciente"]);
include ("practicas_valor.php");

$result20->MoveNext();
		}

    $sql2="select * from $ordenes where fecha between '$desde' and '$hasta' order by cod_grabacion";
$result20 = $db->Execute($sql2);

 if (!$result20) die("fallo".$db->ErrorMsg());
  while (!$result20->EOF) {

$nro_os=strtoupper($result20->fields["nro_os"]);
$nro_paciente=strtoupper($result20->fields["nro_paciente"]);
$periodo=strtoupper($result20->fields["periodo"]);
$marca=strtoupper($result20->fields["marca"]);
$lote=strtoupper($result20->fields["lote"]);
$cod_operacion=strtoupper($result20->fields["cod_operacion"]);
$modulo=strtoupper($result20->fields["modulo"]);
$autorizacion=strtoupper($result20->fields["autorizacion"]);


$año=strtoupper($result20->fields["ano"]);
$nro_afiliado=$result20->fields["nro_afiliado"];
$nro_orden=$result20->fields["nro_orden"];

$autorizacion=strtoupper($result20->fields["autorizacion"]);
$autorizacion_ws=strtoupper($result20->fields["autorizacion_ws"]);



$operador=strtoupper($result20->fields["operador"]);


$cod_grabacion=strtoupper($result20->fields["cod_grabacion"]);

$fecha_grabacion=strtoupper($result20->fields["fecha"]);

$dia = substr($fecha_grabacion,8,2);
$mes= substr($fecha_grabacion,5,2);
$anio = substr($fecha_grabacion,0,4);
$fecha_grabacion = $dia."-".$mes."-".$anio;


$fecha=strtoupper($result20->fields["fecha"]);


$dia = substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio = substr($fecha,0,4);
$fecha = $dia."-".$mes."-".$anio;



$matricula=strtoupper($result20->fields["matricula"]);
$prescriptor=strtoupper($result20->fields["medico"]);
$confirmada=strtoupper($result20->fields["confirmada"]);

 $sql="select * from pacientes where nro_paciente = $nro_paciente";
 $result = $db->Execute($sql);

 	
 $nro_paciente=$result->fields["nro_paciente"];
 $nombre=strtoupper($result->fields["nombre"]);
  $apellido=strtoupper($result->fields["apellido"]);

 $nro_os=$result->fields["nro_os"];
 $nro_documento=$result->fields["nro_documento"];

 $fecha_nacimiento=$result->fields["fecha_nacimiento"];



  $sql="select * from datos_os where nro_os = $nro_os";
 $result = $db->Execute($sql);

 $sigla=$result->fields["sigla"];



 if ($autorizacion == 0){
$autorizacion = "S/A";
}
 

IF ($fecha_nacimiento == "0000-00-00"){
$edad = "S/C";
}ELSE{
$edad = calculaEdad($fecha_nacimiento);
}

$nombre_completo = $apellido." ".$nombre;

$nombre_completo = substr($nombre_completo,0,20);

 $cant = $cant + 1;



 if ($autorizacion_ws > 0){?>

 <tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">
   <td bgcolor="#E0EDF3"><div align="center" class="Estilo28"><?php echo $autorizacion;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center" class="Estilo28"><a href="reimprimir.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><?php echo $autorizacion_ws;?></a></div></td>
   <td bgcolor="#E0EDF3"><div align="center" class="Estilo28"><?php echo $cod_grabacion;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center" class="Estilo28"><?php echo $fecha_grabacion;?></div></td>
   <td bgcolor="#E0EDF3"><a href="buscar_paciente.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&usuario=<?php print("$usuario");?>" class="Estilo36"><?php echo $nombre_completo;?> <?php echo $nro_paciente;?></a></td>
    <td bgcolor="#E0EDF3"><div align="center">
      <div align="center"><?php echo $edad;?></div>
    </div></td>
    <td bgcolor="#E0EDF3"><?php include ("../analisis/practicas.php");?>
      <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"></font></div></td>
    	<td bgcolor="#E0EDF3"><div align="center"><?php echo $total_orden;$total_orden = "";?></div></td>
		   	<td bgcolor="#E0EDF3"><div align="center"><?php echo $total_acumulado;?></div></td>
	<td bgcolor="#E0EDF3"><div ><?php echo $estado;?></div></td>
	<td bgcolor="#E0EDF3"><font size="4" align="center" face="Arial, Helvetica, sans-serif"><a href="../analisis/emision_mod.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?> " ><div align="center"><span class="glyphicon glyphicon-th-list"></span></div></a></font></td>
	<td bgcolor="#E0EDF3"><a href="../analisis/practicas_imp.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"><div align="center"><font size="4"><span class="glyphicon glyphicon-share-alt"></span></div></a></font></div></td>



    <!-- <td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="borra_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('¿Está seguro de Borrar la orden y sus RESULTADOS?');"><div align="center"><font size="4"><span class="glyphicon glyphicon-trash"></span></div></a></font></div></td> -->
    
	<td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="../analisis/modelos/elegir_modelos.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><div align="center"><font size="4"><span class="glyphicon glyphicon-search"></span></div></a></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="anular_osde.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><div align="center"><font size="4"><span class="glyphicon glyphicon-remove-circle"></span></div></a></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"></font><font size="1" face="Arial, Helvetica, sans-serif"><a href="autorizar_osde.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><div align="center"><font size="4"><span class="glyphicon glyphicon-text-background"></span></div></a></font></div></td>
    <td><div align="center"><?php echo $sigla;?></div></td>
 </tr>
<?php 
 }else{
?>
<tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">
   <td bgcolor="#E0EDF3"><div align="center" class="Estilo28"><?php echo $autorizacion;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center" class="Estilo28"><?php echo $autorizacion_ws;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center" class="Estilo28"><?php echo $cod_grabacion;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center" class="Estilo28"><?php echo $fecha_grabacion;?></div></td>
   <td bgcolor="#E0EDF3"><a href="buscar_paciente.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&usuario=<?php print("$usuario");?>" class="Estilo36"><?php echo $nombre_completo;?> <?php echo $nro_paciente;?></a><a href="buscar_paciente.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>" class="Estilo28"></a></td>
    <td bgcolor="#E0EDF3"><div align="center">
      <div align="center"><?php echo $edad;?></div>
    </div></td>
    <td bgcolor="#E0EDF3"><?php include ("../analisis/practicas.php");?>
      <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"></font></div></td>
    	<td bgcolor="#E0EDF3"><div align="center"><?php echo $total_orden;$total_orden = "";?></div></td>
		   	<td bgcolor="#E0EDF3"><div align="center"><?php echo $total_acumulado;?></div></td>
	<td bgcolor="#E0EDF3"><div align="center"><?php echo $estado;?></div></td>
	<td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="../analisis/emision_mod.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"><div align="center"><font size="4"><span class="glyphicon glyphicon-th-list"></span></div></a></font></div></td>
	<td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="../analisis/practicas_imp.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"><div align="center"><font size="4"><span class="glyphicon glyphicon-share-alt"></span></div></a></font></div></td>



    <!-- <td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="borra_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('¿Está seguro de Borrar la orden y sus RESULTADOS?');"><div align="center"><font size="4"><span class="glyphicon glyphicon-trash"></span></div></a></font></div></td> -->
    
	<td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="../analisis/modelos/elegir_modelos.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><div align="center"><font size="4"><span class="glyphicon glyphicon-search"></span></div></a></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="anular_osde.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><div align="center"><font size="4"><span class="glyphicon glyphicon-remove-circle"></span></div></a></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="autorizar_osde.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><div align="center"><font size="4"><span class="glyphicon glyphicon-text-background"></span></div></a></font></div></td>
    <td><div align="center"><?php echo $sigla;?></div></td>
</tr>



<?php
	}
$calcular1 = $total_acumulado * $porcentaje1 /100;
$calcular2 = $total_acumulado * $porcentaje2 /100;


 
$result20->MoveNext();
		}


?></table>



 <table width="829" border="0" cellpadding="0">
   <tr>
     <td colspan="2">&nbsp;</td>
   </tr>
   <tr>
     <td width="686">Cantidad de Pacientes: <?php echo $cant;?></td>
     <td width="137"><div align="right"><?php echo $total_orden1;?></div></td>
   </tr>

      <tr>
     <td colspan="2">&nbsp;</td>
   </tr>
   <tr>
     <td width="686"><div align="right">Porcentaje: <?php echo $porcentaje1;?> % :</div></td>
     <td width="137"><div align="right"><?php echo $calcular1;?></div></td>
   </tr>
      <tr>
     <td width="686"><div align="right">Porcentaje: <?php echo $porcentaje2;?> % :</div></td>
     <td width="137"><div align="right"><?php echo $calcular2;?></div></td>
   </tr>

</table>

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
.Estilo35 {color: #FFFFFF}
-->
</style>



</head>
<table width="850" border="1" cellspacing="0">
  <!--DWLayoutTable-->

  <tr bgcolor="#CECECE">
    <td colspan="13" valign="top"><div align="center">Planilla de Trabajo desde: <?php echo $desde_m;?> Hasta: <?php echo $hasta_m;?></div></td>
  </tr>
  <tr bgcolor="#CECECE">

   <td colspan="7" valign="top"><div align="center"></div></td>
   <td colspan="3" valign="top"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="modelos/a5/w_silva/emision_todos.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>&&desde=<?php print("$desde");?>&&hasta=<?php print("$hasta");?>">INFORMES TODOS</a></font></div></td>
   <td colspan="3" valign="top"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="modelos/a5/w_silva/emision_todos.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>&&desde=<?php print("$desde");?>&&hasta=<?php print("$hasta");?>">PLANILLA DIARIA</a></font></div></td>
  </tr>
 <tr >
   <td width="25" bgcolor="#666666"><div align="center"><span class="Estilo35">ABM</span></div></td>
   <td width="54" bgcolor="#666666"><div align="center"><span class="Estilo35">OSDE</span></div></td>
   <td width="54" bgcolor="#666666"><span class="Estilo35">Protocolo</span></td>
   <td width="43" bgcolor="#666666"><div align="center" class="Estilo35">Fecha</div></td>
   <td width="272" bgcolor="#666666"><div align="center" class="Estilo35">Paciente</div></td>
    <td width="63" bgcolor="#666666"><div align="center" class="Estilo35">Edad</div></td>
    <td width="100" bgcolor="#666666"><div align="center" class="Estilo27 Estilo35">
      <div align="center"> Solicitadas </div>
    </div>      <div align="center" class="Estilo27 Estilo35"></div></td>
    <td width="38" bgcolor="#666666"><div align="center" class="Estilo35"><span class="Estilo26">COMP.</span></div></td>
    <td width="36" bgcolor="#666666"><div align="center" class="Estilo28 Estilo35"><span class="Estilo26">DERIV</span></div></td>
    <td width="51" bgcolor="#666666"><div align="center" class="Estilo28 Estilo35"><span class="Estilo26">BORRAR</span></div></td>
    <td width="32" bgcolor="#666666"><div align="center" class="Estilo29 Estilo35">
      <div align="center">INF.</div>
    </div></td>
    <td width="54" bgcolor="#666666"><div align="center" class="Estilo35"><span class="Estilo26">ANULAR</span></div></td>
    <td width="32" bgcolor="#666666"><div align="center"><span class="Estilo26 Estilo35">AUT.</span></div></td>
 </tr>



<?php 
$ordenes = "ordenes";
$detalle = "detalle";

 include("../../conexiones/config.inc.php");


   echo  $sql2="select * from $ordenes where fecha between '$desde' and '$hasta' order by cod_grabacion";
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

$clase=strtoupper($result20->fields["clase"]);

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

echo "--".$clase;


 $sql="select * from detalle where cod_grabacion = $cod_grabacion";
 $result = $db->Execute($sql);
	
	 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

 $cod_practica=$result->fields["cod_practica"];
  $clase=$result->fields["clase"];

if ($clase == 0){
 $sql="select * from detalle_referencia where cod_grabacion = $cod_grabacion and cod_practica = $cod_practica";
 $result2 = $db->Execute($sql);
 $valor=$result2->fields["clase"];
if ($valor > 0) or ($valor != "") and $valor != 0.00){
$estado = 1;

}

}
else
	  {

	  }




$result->MoveNext();
		}

echo "estado".$estado;
 }
 ?>
 <tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">
   <td bgcolor="#E0EDF3"><div align="center"><?php echo $autorizacion;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center"><?php echo $autorizacion_ws;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center"><?php echo $cod_grabacion;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center"><?php echo $fecha_grabacion;?></div></td>
   <td bgcolor="#E0EDF3"><a href="buscar_paciente.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"><?php echo $nombre_completo;?> <?php echo $nro_paciente;?></a></td>
    <td bgcolor="#E0EDF3"><div align="center">
      <div align="center"><?php echo $edad;?></div>
    </div></td>
    <td bgcolor="#E0EDF3"><?php include ("practicas.php");?>
      <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"></font></div></td>
    
	<td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="emision_mod.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"><img src="../../imagenes/office//011.ico" alt="Ficha" border = "0"></a></font></div></td>
	<td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="practicas_imp.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"><img src="../../imagenes/office//011.ico" alt="Ficha" border = "0"></a></font></div></td>



    <td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="borra_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('¿Está seguro de Borrar la orden y sus RESULTADOS?');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></font></div></td>
    
	<td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="modelos/elegir_modelos.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><img src="../../imagenes/office//005.ico" alt="Informe" border = "0"></a></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="anular_osde.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><img src="../../imagenes/office//951.ico" alt="Informe" border = "0"></a></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="autorizar1.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>&&desde=<?php print("$desde");?>&&hasta=<?php print("$hasta");?>"></a></font><font size="1" face="Arial, Helvetica, sans-serif"><a href="autorizar_osde.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><img src="../../imagenes/office//951.ico" alt="Informe" border = "0"></a></font></div></td>
 </tr>
<?php 


$result20->MoveNext();
		}

?></table>

 <table width="850" border="0" cellpadding="0">
   <tr>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>Cantidad de Pacientes: <?php echo $cant;?></td>
   </tr>
 </table>

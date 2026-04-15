<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>LISTADO DE PACIENTES OSDE</title>
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
    <td colspan="8" valign="top"><div align="center">Plaanilla de Trabajo OSDE. Desde: <?php echo $desde_m;?> Hasta: <?php echo $hasta_m;?></div></td>
  </tr>
  
 <tr >
   <td width="28" bgcolor="#666666"><div align="center"><span class="Estilo35">ABM</span></div></td>
   <td width="57" bgcolor="#666666"><div align="center"><span class="Estilo35">OSDE</span></div></td>
   <td width="60" bgcolor="#666666"><div align="center"><span class="Estilo35">Protocolo</span></div></td>
   <td width="47" bgcolor="#666666"><div align="center" class="Estilo35">Fecha</div></td>
   <td width="262" bgcolor="#666666"><div align="center" class="Estilo35">Paciente</div></td>
    <td bgcolor="#666666"><div align="center" class="Estilo35">Solicitadas </div>
      <div align="center" class="Estilo27 Estilo35">
        <div align="center"></div>
      </div>      <div align="center" class="Estilo27 Estilo35"></div></td>
    <td width="44" bgcolor="#666666"><div align="center" class="Estilo29 Estilo35">
      <div align="center"><span class="Estilo26">ANULAR</span></div>
    </div></td>
    <td width="38" bgcolor="#666666"><div align="center"><span class="Estilo26 Estilo35">AUT.</span></div></td>
 </tr>



<?php 
$ordenes = "ordenes";
$detalle = "detalle";

 include("../../conexiones/config.inc.php");


    $sql2="select * from $ordenes where fecha between '$desde' and '$hasta' and nro_os = 1041 order by cod_grabacion";
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
$autorizacion_ws=strtoupper($result20->fields["autorizacion_ws"]);

$año=strtoupper($result20->fields["ano"]);
$nro_afiliado=$result20->fields["nro_afiliado"];
$nro_orden=$result20->fields["nro_orden"];
$autorizacion=strtoupper($result20->fields["autorizacion"]);
$operador=strtoupper($result20->fields["operador"]);
$autorizacion=strtoupper($result20->fields["autorizacion"]);
$autorizacion_ws=strtoupper($result20->fields["autorizacion_ws"]);

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
 ?>

 <?php
   if ($autorizacion_ws > 0){?>

 <tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">
   <td bgcolor="#E0EDF3"><div align="center"><?php echo $autorizacion;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center"><a href="reimprimir.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><?php echo $autorizacion_ws;?></a></div></td>
   <td bgcolor="#E0EDF3"><div align="center"><?php echo $cod_grabacion;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center"><?php echo $fecha_grabacion;?></div></td>
   <td bgcolor="#E0EDF3"><a href="buscar_paciente_validar.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"><?php echo $nombre_completo;?> <?php echo $nro_paciente;?></a></td>
    <td bgcolor="#E0EDF3"><div align="center">
      <div align="center">
        <?php include ("practicas.php");?>
      </div>
    </div>
      <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"></font></div>
    <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="emision_mod.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"></a></font></div>      <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="borra_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('¿Está seguro de Borrar la orden y sus RESULTADOS?');"></a></font><font size="1" face="Arial, Helvetica, sans-serif"><a href="modelos/elegir_modelos.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"></a></font></div></td>
    <td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="anular_osde.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><img src="../../imagenes/office//951.ico" alt="Informe" border = "0"></a></font></div></td>
    <td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="autorizar1.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>&&desde=<?php print("$desde");?>&&hasta=<?php print("$hasta");?>"></a></font><font size="1" face="Arial, Helvetica, sans-serif"><a href="autorizar_osde.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><img src="../../imagenes/office//951.ico" alt="Informe" border = "0"></a></font></div></td>
 </tr>
<?php 
 
}else{
?>

 <tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">
   <td bgcolor="#E0EDF3"><div align="center"><?php echo $autorizacion;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center"><?php echo $autorizacion_ws;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center"><?php echo $cod_grabacion;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center"><?php echo $fecha_grabacion;?></div></td>
   <td bgcolor="#E0EDF3"><a href="buscar_paciente_validar.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"><?php echo $nombre_completo;?> <?php echo $nro_paciente;?></a></td>
    <td bgcolor="#E0EDF3"><div align="center">
      <div align="center">
        <?php include ("practicas.php");?>
      </div>
    </div>
      <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"></font></div>
    <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="emision_mod.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"></a></font></div>      <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="borra_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('¿Está seguro de Borrar la orden y sus RESULTADOS?');"></a></font><font size="1" face="Arial, Helvetica, sans-serif"><a href="modelos/elegir_modelos.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"></a></font></div></td>
    <td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="anular_osde.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><img src="../../imagenes/office//951.ico" alt="Informe" border = "0"></a></font></div></td>
    <td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="autorizar1.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>&&desde=<?php print("$desde");?>&&hasta=<?php print("$hasta");?>"></a></font><font size="1" face="Arial, Helvetica, sans-serif"><a href="autorizar_osde.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><img src="../../imagenes/office//951.ico" alt="Informe" border = "0"></a></font></div></td>
 </tr>

 <?php }


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

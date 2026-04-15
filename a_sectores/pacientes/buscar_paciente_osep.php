<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>LISTADO DE PACIENTES OSDE</title>
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
-->
</style>



</head>

<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">  


<?php  $tipo_operador = $_REQUEST['tipo_operador'];?>
<table width="840" border="1" cellspacing="0">
  <!--DWLayoutTable-->

  <tr bgcolor="#CECECE">
    <td colspan="7" valign="top"><div align="center">Planilla de Trabajo OSEP. Desde: <?php echo $desde_m;?> Hasta: <?php echo $hasta_m;?></div></td>
  </tr>
  
 <tr >
 
   <td width="72" bgcolor="#666666"><div align="center"><span class="Estilo35">Protocolo</span></div></td>
   <td width="55" bgcolor="#666666"><div align="center" class="Estilo35">Fecha</div></td>
   <td width="80" bgcolor="#666666"><div align="center" class="Estilo35">N&deg; Afiliado </div></td>
    <td colspan="2" bgcolor="#666666"><div align="center"><span class="Estilo35">Paciente</span></div></td>
    <td width="291" bgcolor="#666666"><div align="center" class="Estilo27 Estilo35">
      <div align="center"> Solicitadas </div>
    </div>      <div align="center" class="Estilo27 Estilo35"></div></td>
    <td width="37" bgcolor="#666666"><!--DWLayoutEmptyCell-->&nbsp;</td>
 </tr>



<?php 
$ordenes = "ordenes";
$detalle = "detalle";

 include("../../conexiones/config.inc.php");


    $sql2="select * from $ordenes where fecha between '$desde' and '$hasta' and nro_os = 2616 order by cod_grabacion";
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

$cuit_osde=strtoupper($result20->fields["cuit_osde"]);

 $sql="select * from datos_osde where cuit = $cuit_osde";
 $result = $db->Execute($sql);

 	
 $cuenta_abm=$result->fields["cuenta_abm"];

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
     <tr><td bgcolor="#E0EDF3"><div align="center"><?php echo $cod_grabacion;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center"></a><?php echo $fecha_grabacion;?></div></td>

   <td bgcolor="#E0EDF3"><div align="center"><?php echo $nro_afiliado;?></div></td>
   <td width="31" bgcolor="#E0EDF3"><div align="center"><a href="buscar_paciente.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"><?php echo $nro_paciente;?></a></div></td>
   <td width="244" bgcolor="#E0EDF3"><a href="buscar_paciente.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"><?php echo $nombre_completo;?></a></td>
   <td bgcolor="#E0EDF3"><a href="buscar_paciente.php?palabra=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"> </a>
     <?php include ("practicas.php");?></td>
    <td bgcolor="#E0EDF3"><!--DWLayoutEmptyCell-->&nbsp;</td>
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

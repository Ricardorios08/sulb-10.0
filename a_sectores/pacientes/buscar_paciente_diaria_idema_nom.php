<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>LISTADO DE PACIENTES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../css/fondo_iddema.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
.Estilo35 {color: #FFFFFF}
body {
	background-color: #DDE6E6;
}
.Estilo5 {
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
</head>


<table width="829" border="1" align="center" cellspacing="0">
 <tr >
   <td width="62" bgcolor="#666666"><span class="Estilo35">Protocolo</span></td>
   <td width="76" bgcolor="#666666"><div align="center" class="Estilo35">Fecha</div></td>
   <td width="354" bgcolor="#666666"><div align="center" class="Estilo35">Paciente</div></td>
    <td width="34" bgcolor="#666666"><div align="center" class="Estilo35">Edad</div></td>
    <td width="205" bgcolor="#666666"><div align="center" class="Estilo27 Estilo35">
      <div align="center"> Solicitadas </div>
    </div>      <div align="center" class="Estilo27 Estilo35"></div></td>
    <td width="72" bgcolor="#666666"><div align="center" class="Estilo29 Estilo35">
      <div align="center">INF.</div>
    </div></td>
  </tr>


<?php 
$ordenes = "ordenes";
$detalle = "detalle";

 include("../../conexiones/config.inc.php");

//     $sql2="select * from $ordenes where nro_paciente like '$nro_paciente' and lote = '$user' order by cod_grabacion";
	  $sql2="select * from $ordenes where nro_paciente like '$nro_paciente'  order by cod_grabacion";
$result20 = $db->Execute($sql2);

 if (!$result20) die("falloff".$db->ErrorMsg());
  while (!$result20->EOF) {

$nro_os=strtoupper($result20->fields["nro_os"]);
//$nro_paciente=strtoupper($result20->fields["nro_paciente"]);
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
 $result30 = $db->Execute($sql);

 	
// $nro_paciente=$result30->fields["nro_paciente"];
 $nombre=strtoupper($result30->fields["nombre"]);
  $apellido=strtoupper($result30->fields["apellido"]);

 $nro_os=$result30->fields["nro_os"];
 $nro_documento=$result30->fields["nro_documento"];

 $fecha_nacimiento=$result30->fields["fecha_nacimiento"];

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
 <tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">
   <td bgcolor="#E0EDF3"><div align="center"><?php echo $cod_grabacion;?></div></td>
   <td bgcolor="#E0EDF3"><div align="center"><?php echo $fecha_grabacion;?></div></td>
   <td bgcolor="#E0EDF3"> <?php echo $nombre_completo;?> <?php echo $nro_paciente;?> </td>
    <td bgcolor="#E0EDF3"><div align="center">
      <div align="center"><?php echo $edad;?></div>
    </div></td>
    <td bgcolor="#E0EDF3"><?php include ("practicas.php");?>
      <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"></font></div></td>
    
	<td bgcolor="#E0EDF3"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="../analisis/modelos/elegir_modelos_idema.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>&&modulo=<?php print("$modulo");?>&&usuario=<?php print("$usuario");?>"><img src="../../imagenes/office//005.ico" alt="Informe" border = "0"></a></font></div></td>
  </tr>
<?php 

 
$result20->MoveNext();
		}


?></table>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>LISTADO DE PACIENTES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../../css/fondo_idfema.css" rel="stylesheet" type="text/css" />


<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
.Estilo2 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo25 {color: #FFFFFF}
.Estilo26 {font-size: 10px; color: #FFFFFF; }
.Estilo27 {color: #FFFFFF; font-family: "Trebuchet MS"; }
.Estilo28 {font-family: "Trebuchet MS"}
.Estilo29 {font-size: 10px; color: #FFFFFF; font-family: "Trebuchet MS"; }
.Estilo31 {
	font-family: "Trebuchet MS";
	font-size: 24px;
	font-weight: bold;
}
.Estilo32 {font-size: 24px}
.Estilo40 {font-family: "Trebuchet MS"; font-size: 14px; font-weight: bold; }
.Estilo30 {font-size: 16px}
.Estilo41 {
	font-family: "Trebuchet MS";
	font-size: 16px;
	font-weight: bold;
	color: #0000FF;
}
.Estilo5 {	font-size: 16px;
	font-weight: bold;
}
-->
</style>
</head>









<?php 


 function CalculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}

include("../../conexiones/config.inc.php");

if ($bande_nuevo != 1){
  $palabra = $_REQUEST['palabra'];
 $usuario = $_REQUEST['usuario'];

}

$band = 1;

 $nro_os = $_REQUEST['nro_os'];
   $submit = $_REQUEST['ok'];
   
if ($submit == "PRO"){
include ("buscar_paciente_protocolo.php");
exit;
}

list($ape,$nom) = explode("+",$palabra);

     $ape; // Imprime 12
     $nom; // Imprime 01
  





 $sql="select * from datos_orden where id = $usuario";
$result = $db->Execute($sql);

$orden=strtoupper($result->fields["orden"]);

$palabra;
if ($palabra == ""){
include ("seleccionar_planilla_idema.php");
exit;
}else{

?> <table width="850" border="0" align="center" cellspacing="0">
<tr>
    <td valign="middle" bgcolor="#B8B8B8"><div align="center">PACIENTE</div></td>
    <td valign="middle" bgcolor="#B8B8B8"><div align="center">OBRA SOCIAL</div></td>
    <td colspan="-2" valign="middle" bgcolor="#B8B8B8"><div align="center">N° AFILIADO</div></td>
    <td bgcolor="#B8B8B8"><div align="center">DOCUMENTO</div></td>

  </tr>

  <?php

if (is_numeric($palabra) == false){

if (($ape != "") and ($nom != "")){
  $sql="select * from pacientes where  nombre like '$nom%' and  apellido like '$ape%' order by nombre";
}elseif (($ape != "") and ($nom == "")){
   $sql="select * from pacientes where  apellido like '$ape%' or nombre like '$ape%' order by nombre";
}elseif (($ape == "") and ($nom != "")){
  $sql="select * from pacientes where  nombre like '%$nom%' order by nombre";
}

}else{

    $sql="select * from pacientes where nro_paciente like '$palabra' or nro_afiliado like '$palabra' or nro_documento like '$palabra'";
}
}
	
$result = $db->Execute($sql);

 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
 $nro_paciente=$result->fields["nro_paciente"];
 $nombre=strtoupper($result->fields["nombre"]);
  $apellido=strtoupper($result->fields["apellido"]);

 $nro_os=$result->fields["nro_os"];
 $nro_documento=$result->fields["nro_documento"];

 $fecha_nacimiento=$result->fields["fecha_nacimiento"];

 $nro_afiliado=$result->fields["nro_afiliado"];
 $ultima_fecha=$result->fields["ultima_fecha"];
 
 $dia = substr($ultima_fecha,8,2);
 $mes = substr($ultima_fecha,5,2);
 $anio = substr($ultima_fecha,0,4);

 $ultima_fecha = $dia."/".$mes."/".$anio;


 $tipo_afiliado=$result->fields["tipo_afiliado"];
  $coseguro=$result->fields["coseguro"];
   $plan=$result->fields["plan"];
   $activo=$result->fields["activo"];

	 if ($tipo_afiliado == "0"){
$tp_afiliado = "NO GRAVADO (OBLIGATORIO) EXENTO";
}elseif ($tipo_afiliado == 1){
$tp_afiliado = "GRAVADO (VOLUNTARIO) CON IVA";
}
 

IF ($fecha_nacimiento == "0000-00-00"){
$edad = "SIN CARGAR";
}ELSE{
$edad = calculaEdad($fecha_nacimiento);
}

 $sql1="select * from datos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
 $sigla=strtoupper($result1->fields["sigla"]);
$webservice=strtoupper($result1->fields["webservice"]);


 
?>
<table width="850" border="0" align="center" cellspacing="0">
<tr>
    <td width="339" valign="middle" bgcolor="#EDEDED"><div align="left"><a href="../grabacion/grabar_nuevo\grabacion_ordenes.php?nro_paciente=<?php print("$nro_paciente");?>&&nro_os=<?php print("$nro_os");?>&&usuario=<?php print("$usuario");?>"> </a><span class="Estilo40"><?php echo $apellido;?> <?php echo $nombre;?> (<?php echo $nro_paciente;?>)</span></div></td>
    <td width="223" valign="middle" bgcolor="#EDEDED"><div align="center"><span class="Estilo40"><?php echo $sigla;?>(<?php echo $nro_os;?>)</span></div></td>
    <td width="73" colspan="-2" valign="middle" bgcolor="#EDEDED"><div align="center"><span class="Estilo40"><?php echo $nro_afiliado;?></span></div></td>
    <td width="121" bgcolor="#EDEDED"><div align="center"><span class="Estilo40"><?php echo $nro_documento;?></span></div></td>
</tr>
</table>

<?PHP 
	include ("buscar_paciente_diaria_idema_nom.php");


$result->MoveNext();
		}

		?>

</table>
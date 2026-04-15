<style type="text/css">
<!--
.Estilo3 {font-family: "Trebuchet MS"; font-size: 12; }
.Estilo4 {font-size: 12}
-->
</style>

<?php 

$hoy=date("d/m/y");
$nro_paciente= $_REQUEST['nro_paciente'];
$nro_os= $_REQUEST['nro_os'];
$cod_grabacion= $_REQUEST['cod_grabacion'];
$fecha_grabacion= $_REQUEST['fecha_grabacion'];
include("../../../conexiones/config.inc.php");

$sql = "SELECT * FROM archivos";
$result = $db->Execute($sql);
$id=$result->fields["id"];


$sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);
$nombre=$result->fields["nombre"];

$sql="select * from datos_principales";
$result = $db->Execute($sql);
$nombre_laboratorio=strtoupper($result->fields["nombre_laboratorio"]);
$direccion=strtoupper($result->fields["direccion"]);
$localidad=strtoupper($result->fields["localidad"]);
$telefono=strtoupper($result->fields["telefono"]);
$mail=$result->fields["mail"];

$domicilio = $direccion." - ".$localidad." - ".$telefono;
$sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);

$nro_paciente=$result->fields["nro_paciente"];
$nombre=strtoupper($result->fields["nombre"]);
$nro_os=$result->fields["nro_os"];
$nro_documento=$result->fields["nro_documento"];

$sql1="select * from datos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$nombre_os=strtoupper($result1->fields["sigla"]);

$sql="select * from informe";
$result = $db->Execute($sql);
$caratula=strtoupper($result->fields["caratula"]);
$hoja=strtoupper($result->fields["hoja"]);
$firma=strtoupper($result->fields["firma"]);

?>

<table width="850" border="0">
  <tr>
    <td colspan="4"><div align="center" class="Estilo3">RECIBO</div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo3">LABORATORIO</div></td>
    <td><span class="Estilo4"></span></td>
    <td><span class="Estilo3"><?php echo $nombre_laboratorio;?></span></td>
    <td><span class="Estilo4"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo4"></span></td>
    <td><span class="Estilo4"></span></td>
    <td><span class="Estilo4"></span></td>
    <td><span class="Estilo4"></span></td>
  </tr>
  <tr>
    <td colspan="4"><hr align="center" noshade></td>
  </tr>
  <tr>
    <td width="183"><span class="Estilo4"></span></td>
    <td width="21"><span class="Estilo4"></span></td>
    <td width="542"><div align="right" class="Estilo3">Fecha:</div></td>
    <td width="86"><div align="center" class="Estilo3"><?php echo $fecha_grabacion;?></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo3">Sr:</div></td>
    <td><span class="Estilo4"></span></td>
    <td><span class="Estilo3"><?php echo $nombre;?></span></td>
    <td><span class="Estilo4"></span></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo3">Direcci&oacute;n</div></td>
    <td><span class="Estilo4"></span></td>
    <td><span class="Estilo3"><?php echo $domicilio;?></span></td>
    <td><span class="Estilo4"></span></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo3">Protocolo</div></td>
    <td><span class="Estilo4"></span></td>
    <td><span class="Estilo3"><?php echo $cod_grabacion;?></span></td>
    <td><span class="Estilo4"></span></td>
  </tr>
  <tr>
    <td colspan="4"><hr align="center" noshade></td>
  </tr>
  
  <tr>
    <td colspan="4"><div align="center"><span class="Estilo3">DESCRIPCION</span></div></td>
  </tr>
  <tr>
    <td><span class="Estilo4"></span></td>
    <td><span class="Estilo4"></span></td>
    <td><span class="Estilo4"></span></td>
    <td><span class="Estilo4"></span></td>
  </tr>
  <tr>
    <td colspan="4"><hr align="center"></td>
  </tr>
  <tr>
    <td><span class="Estilo4"></span></td>
    <td><span class="Estilo4"></span></td>
    <td><div align="right" class="Estilo3">TOTAL</div></td>
    <td><span class="Estilo4"></span></td>
  </tr>
</table>


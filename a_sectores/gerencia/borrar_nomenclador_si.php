<?php include ("../../conexiones/config_pr.php");
$nro_os = $_REQUEST['nro_os'];

$sql= "DELETE FROM `convenio_practica` WHERE nro_os = $nro_os";
mysql_query($sql);
?>

<style type="text/css">
<!--
.Estilo5 {color: #FFFFFF}
.Estilo6 {color: #FF0000}
-->
</style>

<table width="365" border="1">
  <tr>
    <th height="44" bgcolor="#000099" scope="col"><span class="Estilo5"> OBRA SOCIAL (<?php ECHO $nro_os;?>)</span></th>
  </tr>
  <tr>
    <td bgcolor="#C1F2FF"><div align="center" class="Estilo6">SE HAN ELIMINADOS LOS VALORES DE LAS PRACTICAS..CARGUELOS NUEVAMENTE..</div></td>
  </tr>
</table>

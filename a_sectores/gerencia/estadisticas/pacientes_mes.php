<style type="text/css">
<!--
.Estilo17 {font-family: "Trebuchet MS"}
.Estilo23 {font-size: 12px; }
.Estilo24 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>

<?PHP
$anio = date("Y");
$ano = date("y");

?>
<table width="850" border="0">
  <tr>
    <td colspan="13" class="Estilo17"><div align="center" class="Estilo23">RESUMES DEL LABORATORIO POR MES DEL A&Ntilde;O:
      <?php echo $anio;?>
    </div></td>
  </tr>


<?php 
include ("../../../conexiones/config.inc.php");



//SELECT count(cod_grabacion) FROM `ordenes` WHERE `fecha_grabacion` between  '2012-02-01' and '2012-02-31'  / cantidad de ordenes

include ("limpiar_variables.php");
$titulo = "CANTIDAD DE PACIENTES";
include ("por_pacientes.php");;
include ("tabla.php");

include ("limpiar_variables.php");
$titulo = "ORDENES GRABADAS";
include ("por_ordenes.php");
include ("tabla.php");

include ("limpiar_variables.php");
$titulo = "ORDENES FACTURADAS";
include ("por_facturadas.php");;
include ("tabla.php");

include ("limpiar_variables.php");
$titulo = "VALOR ORDENES FACTURADAS";
include ("por_valor.php");;
include ("tabla.php");






?>





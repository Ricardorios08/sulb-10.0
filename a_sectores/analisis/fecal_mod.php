<style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>

<?php 
include("../../conexiones/config.inc.php");
$cod_grabacion = $_REQUEST['cod_grabacion'];
$nro_practica= $_REQUEST['nro_practica'];
 $nro_paciente= $_REQUEST['nro_paciente'];


 $sql11="select * from detalle_fecal where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$metodo_macro=strtoupper($result11->fields["metodo_macro"]);
$macroscopico=strtoupper($result11->fields["macroscopico"]);
$metodo_micro=strtoupper($result11->fields["metodo_micro"]);
$microscopico=strtoupper($result11->fields["microscopico"]);
$observaciones=strtoupper($result11->fields["observaciones"]);


 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);



?>

<FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">


<table width="846" border="0">
  <tr>
    <td><hr noshade></td>
  </tr>
  <tr>
    <td><span class="Estilo1">Determinacion: <?php echo $nro_practica;?> - <?php echo $nombre_practica;?></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><strong>EXAMEN MACROSCOPICO:      </strong></div></td>
  </tr>
  <tr>
    <td>
      <div align="right"><em><strong>METODO</strong></em>
        <input name="metodo_macro" type="text" id="metodo_macro" value="<?php echo $metodo_macro;?>" size="120" maxlength="120">
    </div></td>
  </tr>
  <tr>
    <td>    
      <div align="right"><em><strong>RESULTADO</strong></em>
        <input name="macroscopico" type="text" id="macroscopico" value="<?php echo $macroscopico;?>" size="120" maxlength="120">
    </div></td>
  </tr>
  <tr>
    <td><div align="center"><strong>EXAMEN MICROSCOPICO: </strong></div></td>
  </tr>
  <tr>
    <td>    <div align="right"><em><strong>METODO</strong></em>          <input name="metodo_micro" type="text" id="metodo_micro" value="<?php echo $metodo_micro;?>" size="120" maxlength="120">
    </div></td>
  </tr>
  <tr>
    <td><div align="right"><em><strong>RESULTADO</strong></em>          <input name="microscopico" type="text" id="microscopico" value="<?php echo $microscopico;?>" size="120" maxlength="120">
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">
      <em><strong>OBSERVACIONES</strong></em>: 
        <input name="observaciones" type="text" id="observaciones" value="<?php echo $observaciones;?>" size="120" maxlength="120">
    </div></td>
  </tr>
  <tr>
    <td><div align="center">

<input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
<input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
	  <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">

<input type="submit" name="Submit" value="GUARDAR DATOS"></div></td>
  </tr>
</table>

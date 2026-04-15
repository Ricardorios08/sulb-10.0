<?php 
include ("../../../conexiones/config.inc.php");


$sql="select * from a_practicas_rechazadas where nro_os = $nro_os order by cod_practica ";
$result = $db->Execute($sql);


?>
<link href="../../../drivers/css/titulos.css" rel="stylesheet" type="text/css">


<style type="text/css">
<!--
.Estilo14 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
<table width="825" border="1" cellpadding="0" cellspacing="0" id="pract">
<!--DWLayoutTable-->

<tr bordercolor="#0066FF" bgcolor="#0033FF">
  <td height="31" colspan="4" bgcolor="#FFFF00"><div align="center">PRACTICAS QUE REQUIEREN AUTORIZACION </div></td>
  <tr bordercolor="#0066FF" bgcolor="#0033FF"> 

<td width="79" bgcolor="#B8B8B8"><div align="center" class="Estilo14">Cod</div></td>
  <td width="438" bgcolor="#B8B8B8"><div align="center" class="Estilo14">Practica</div></td>
    <td width="260" bgcolor="#B8B8B8"><div align="center" class="Estilo14">Motivo</div></td>
    <td width="38" bgcolor="#B8B8B8"><div align="center" class="Estilo14">Tipo</div></td>
  	

	
	<?php 

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_practica=$result->fields["cod_practica"];
$nro_os=$result->fields["nro_os"];
$motivo=$result->fields["motivo"];
$fecha=$result->fields["fecha"];
$tipo=$result->fields["tipo"];


$sql8="select practica from convenio_practica where cod_practica = '$cod_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);

?>  <tr>
    <td bgcolor="#FFFFFF"><div align="center"><?php echo $cod_practica;?></div></td>
    <td bgcolor="#FFFFFF"><?php echo $practica;?></td>
    <td bgcolor="#FFFFFF"><?php echo $motivo;?></td>
    <td bgcolor="#FFFFFF"><div align="center"><?php echo $tipo;?></div></td>


<?php 
$result->MoveNext();
	}

?>

</table>

<?php exit;?>

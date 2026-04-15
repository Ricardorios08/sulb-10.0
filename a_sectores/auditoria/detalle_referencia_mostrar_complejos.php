<style type="text/css">
<!--
.Estilo42 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo43 {font-family: "Trebuchet MS"}
-->
</style>

<?php
	$sql10="select * from convenio_referencia where cod_practica = $cod_practica ORDER BY anio_d, anio_h";
$result10 = $db->Execute($sql10);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);

?>


	<table width="810" border="0" cellspacing="0">
  
  <tr align="center" bordercolor="#FFFFFF">
    <td colspan="3" bgcolor="#F0F0F0"><div align="left" class="Estilo42">Tipo de Informe impreso: <span class="Estilo3"><strong><?php echo $tipo_det;?></strong></span></div></td>
    <td colspan="3" bgcolor="#F0F0F0"><span class="Estilo43"><a href="../modificar_referencia.php?cod_practica=<?php print("$cod_practica");?>" target = "central"><img src="../../../imagenes/office//005.ico" alt="Ficha" border = "0"><a> Modificar Valores de referencia </span></td>
    </tr>

	  <tr align="center" bordercolor="#FFFFFF">
    <td colspan="3" bgcolor="#F0F0F0"><div align="left" class="Estilo42">Método: <span class="Estilo3"><strong><?php echo $metodo;?></strong></span></div></td>
    <td colspan="3" bgcolor="#F0F0F0"><span class="Estilo43"></span></td>
    </tr>
		  <tr align="center" bordercolor="#FFFFFF">
    <td colspan="3" bgcolor="#F0F0F0"><div align="left" class="Estilo42">Unidad:  <span class="Estilo3"><strong><?php echo $unidad;?> </strong></span></div></td>
    <td colspan="3" bgcolor="#F0F0F0"><span class="Estilo43"><a href="../complejos/modificar_complejo.php?cod_practica=<?php print("$cod_practica");?>" target = "central"><img src="../../../imagenes/office//009.ico" alt="Ficha" border = "0"><a> Modificar Practicas compuestas </span></td>
    </tr>

		  <tr align="center" bordercolor="#FFFFFF">
    <td colspan="3" bgcolor="#F0F0F0"><div align="left" class="Estilo42">Clase:  <span class="Estilo3"><strong><?php echo $clase;?> </strong></span></div></td>
    <td colspan="3" bgcolor="#F0F0F0">&nbsp;</td>
    </tr>


<?php if ($cod_operacion > 0){?>
  <tr align="center" bordercolor="#FFFFFF">
    <td width="210" bgcolor="#B8B8B8"><div align="center" class="Estilo42"><span class="Estilo3">Titulo Col 1 </span></div></td>
 <td width="98" bgcolor="#B8B8B8"><div align="center" class="Estilo42"><span class="Estilo3">VN Desde</span></div></td>
    <td width="73" bgcolor="#B8B8B8"><div align="center" class="Estilo42"><span class="Estilo3">VN Hasta</span></div></td>
    <td width="241" bgcolor="#B8B8B8"><div align="center" class="Estilo42"><span class="Estilo3">Titulo Col 2 </span></div></td>
    <td width="88" bgcolor="#B8B8B8"><div align="center" class="Estilo42"><span class="Estilo3">A&ntilde;os Desde</span></div></td>
    <td width="92" bgcolor="#B8B8B8"><div align="center" class="Estilo42"><span class="Estilo3">A&ntilde;os Hasta</span></div></td>
    </tr>
 

<?php }

include ("../../conexiones/config.inc.php");


	$sql10="select * from convenio_referencia where cod_practica = $cod_practica ORDER BY anio_d, anio_h";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {

$tipo=strtoupper($result10->fields["tipo"]);
$desde=strtoupper($result10->fields["desde"]);
$hasta=strtoupper($result10->fields["hasta"]);
$columna1=$result10->fields["columna1"];
$columna2=$result10->fields["columna2"];
$anio_d=strtoupper($result10->fields["anio_d"]);
$anio_h=strtoupper($result10->fields["anio_h"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);


?> <tr align="center" bordercolor="#FFFFFF">
    <td bgcolor="#EDEDED"><div align="center"><span class="Estilo3"><?php echo $columna1;?></span></div></td>
    <td bgcolor="#EDEDED"><span class="Estilo3"><?php echo $desde;?></span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3"><?php echo $hasta;?></span></td>
	
    <td bgcolor="#EDEDED"><span class="Estilo3"><?php echo $columna2;?></span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3"><?php echo $anio_d;?></span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3"><?php echo $anio_h;?></span></td>

    </tr>

<?php 
  $result10->MoveNext();

	}
?>
</table>
<br>
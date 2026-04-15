<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo2 {font-size: 12px}
.Estilo3 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
	<table width="850" border="0" cellspacing="0">
  <tr align="center" bordercolor="#FFFFFF">
    <td width="66" rowspan="2" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2">N&deg;</span></td>
    <td width="66" rowspan="2" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2">Tipo</span></td>
    <td colspan="3" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2">Valores Normales </span></td>
    <td bgcolor="#B8B8B8">&nbsp;</td>
    <td colspan="4" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2">A&ntilde;os</span></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td width="94" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2">Columna 1 </span></td>
    <td width="94" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2">Desde</span></td>
    <td width="76" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2">Hasta</span></td>
    <td width="133" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2">Columna 2 </span></td>
    <td width="90" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2">Desde</span></td>
    <td width="85" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2">Hasta</span></td>
    <td bgcolor="#B8B8B8"><span class="Estilo3">MOD</span></td>
    <td bgcolor="#B8B8B8"><span class="Estilo3">BOR</span></td>
  </tr>
 

<?php 

include ("../../../conexiones/config.inc.php");


	$sql10="select * from convenio_referencia where cod_practica = $cod_practica ORDER BY nro_ref, anio_d, anio_h";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {

$nro_re = $nro_ref;



$tipo=strtoupper($result10->fields["tipo"]);
$desde=strtoupper($result10->fields["desde"]);
$hasta=strtoupper($result10->fields["hasta"]);
$columna1=$result10->fields["columna1"];
$columna2=$result10->fields["columna2"];
$anio_d=strtoupper($result10->fields["anio_d"]);
$anio_h=strtoupper($result10->fields["anio_h"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
$nro_ref=strtoupper($result10->fields["nro_ref"]);

if ($nro_ref != $nro_re){
	?> 
  
<tr>

 
 
  <td height="22" colspan="8" valign="top"   bgcolor="#FFFF66">     <span class="Estilo27 Estilo15">  Valor de Referencia: <?php echo $nro_ref;?></span> <span class="Estilo27 Estilo15"> </span> 
     <?php 
}



?> <tr align="center" bordercolor="#FFFFFF">
    <td bgcolor="#EDEDED"><div align="center"><span class="Estilo3"><?php echo $nro_ref;?></span></div></td>

    <td bgcolor="#EDEDED"><span class="Estilo3"><?php echo $tipo;?></span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3"><?php echo $columna1;?></span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3">
      <?php echo $desde;?>
    </span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3">
      <?php echo $hasta;?>
    </span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3"><?php echo $columna2;?></span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3">
   <?php echo $anio_d;?>
    </span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3">
     <?php echo $anio_h;?>
    </span></td>
    <td width="46" bgcolor="#EDEDED"><a href="modificar_referencia.php?cod_practica=<?php print("$cod_practica");?>&&cod_operacion=<?php print("$cod_operacion");?>&&mod=SI" target = "central" onClick="return confirm('&iquest;Est&aacute; seguro de modificar la practica del nomenclador NBU?');"><img src="../../imagenes/office//005.ico" alt="Ficha" border = "0"></a></td>
    <td width="37" bgcolor="#EDEDED"><a href="modificar_referencia.php?cod_practica=<?php print("$cod_practica");?>&&cod_operacion=<?php print("$cod_operacion");?>&&borrar=SI" target = "central" onClick="return confirm('&iquest;Est&aacute; seguro de Borrar la practica del nomenclador NBU?');"><img src="../../imagenes/office//007.ico" alt="Ficha" border = "0"></a></td>
</tr>

<?php 
  $result10->MoveNext();

	}
?>
</table>

<style type="text/css">
<!--
.Estilo1 {
	color: #FFFFCC;
	font-size: 12px;
}
.Estilo13 {
	font-family: "Trebuchet MS";
	font-size: 12px;
	color: #000000;
}
.Estilo17 {color: #FFFFFF}
.Estilo32 {
	color: #000000;
	font-weight: bold;
}
.Estilo26 {font-size: 12px}
.Estilo28 {font-family: Arial, Helvetica, sans-serif}
.Estilo31 {color: #0000FF; font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo38 {color: #000000; font-family: "Trebuchet MS"; font-weight: bold; font-size: 12px; }
.Estilo39 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>

<?php $hoy=date("d/m/y");?>
<table width="850" border="0">
  <tr bgcolor="#000099">
    <td " colspan="12" bgcolor="#CCCCCC" scope="col"><div align="right"><span class="Estilo13">Listado de Ordenes para Facturar. Emitido el: <?php echo $hoy;?></span></div></td>
  </tr>
    

<?php 




/*
$sql2="select * from datos_os where nro_os like '$busca'";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);
*/

include ("../../conexiones/config.inc.php");

$sql="select * from ordenes where periodo = $mes and ano = $anio and confirmada = 7 group by nro_os, lote";
$result = $db->Execute($sql);

?>    


<tr bgcolor="#000099">
<td width="85" bgcolor="#CCCCCC" scope="row"><div align="center"><span class="Estilo38">Per&iacute;odo</span>
      </th>
</div>
<td width="228" bgcolor="#CCCCCC" scope="row"><div align="center" class="Estilo1 Estilo13"><strong>Obra Social</strong></div>      
<td width="72" bgcolor="#CCCCCC"><div align="center"><span class="Estilo38 Estilo17 Estilo26">Lote</span></div></td>
<td width="95" bgcolor="#CCCCCC"><div align="center" class="Estilo38 Estilo17 Estilo26">Cant. Ordenes</div></td>
<td width="64" bgcolor="#CCCCCC"><div align="center"><span class="Estilo38">Comunes</span></div></td>
<td width="66" bgcolor="#CCCCCC"><div align="center" class="Estilo38">Especiales</div></td>
<td width="37" bgcolor="#CCCCCC"><div align="center"><span class="Estilo38">Alta</span></div></td>
<td width="37" bgcolor="#CCCCCC"><div align="center" class="Estilo38">Estado</div></td>
<td width="78" bgcolor="#CCCCCC"><div align="center" class="Estilo38">Facturar</div></td>
  </tr>

<?php 


 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

 $nro_os=strtoupper($result->fields["nro_os"]);

$periodo=strtoupper($result->fields["periodo"]);
$lote=strtoupper($result->fields["lote"]);
$confirmada=strtoupper($result->fields["confirmada"]);


$sql2="select * from datos_os where nro_os like '$nro_os'";
$result2 = $db->Execute($sql2);
$nombre_os=strtoupper($result2->fields["sigla"]);



switch ($confirmada){
	case "7":{$estado = "PENDIENTE";BREAK;}
	case "10":{$estado = "FACTURADO";BREAK;}
}


$sql2="select count(cod_grabacion) as cantidad_ordenes from ordenes where periodo = $mes and ano = $anio and confirmada = 7 and nro_os = $nro_os and lote = '$lote'";
$result2 = $db->Execute($sql2);
$cantidad_ordenes=$result2->fields["cantidad_ordenes"];

 $sql="select * from arancel where nro_os = $nro_os";
$result2 = $db->Execute($sql);
 
$nbu_comunes=$result2->fields["uh"];
$nbu_especiales=ucwords($result2->fields["uh_especiales"]);
$nbu_alta=ucwords($result2->fields["uh_alta"]);




?>  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC" style="cursor:hand" onMouseOver="this.style.background='#FFFF99'; this.style.color='blue'" onMouseOut="this.style.background='#E8DCFC'; this.style.color='black'">
  <td bgcolor="#E6E6E6" scope="row"><div align="center"><span class="Estilo26"><span class="Estilo28"><?php echo $mes;?>/<?php echo $anio;?></span></span></div>
  <td bgcolor="#E6E6E6"><span class="Estilo26"><?php echo $nro_os;?> - <?php echo $nombre_os;?></span>
  <td bgcolor="#E6E6E6" scope="row">  <div align="center"><span class="Estilo26"><?php echo $lote;?></span></div>
  <td bgcolor="#E6E6E6" scope="row"><div align="center"><span class="Estilo26"><?php echo $cantidad_ordenes;?></span></div>
  <td bgcolor="#E6E6E6"><div align="center"><span class="Estilo39"><?php echo $nbu_comunes;?></span></div>
<td bgcolor="#E6E6E6"><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $nbu_especiales;?></span></div>
<td bgcolor="#E6E6E6"><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $nbu_alta;?></span></div>
<td bgcolor="#E6E6E6"><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $estado;?></span></div>
<td bgcolor="#E6E6E6"><div align="center" class="Estilo31">

<a href="../facturacion/pre_facturar_ordenes_laser.php?$nro_os=<?php print("$nro_os");?>&&mes=<?php print("$mes");?>&&anio=<?php print("$anio");?>&&lote=<?php print("$lote");?>&&nro_os1=<?php print("$nro_os");?>" tabindex = "28" title = "Presione aqui para FACTURAR"><img src="../../imagenes/office//295.ico" alt="FACTURAR" border = "0">


<!-- <a href="../facturacion/pre_facturar_ordenes.php?$nro_os=<?php print("$nro_os");?>&&mes=<?php print("$mes");?>&&anio=<?php print("$anio");?>&&lote=<?php print("$lote");?>&&nro_os1=<?php print("$nro_os");?>" tabindex = "28" title = "Presione aqui para FACTURAR"><img src="../../imagenes/office//295.ico" alt="FACTURAR" border = "0"> </a>




<a href="../facturacion/pre_facturar_ordenes_pdf.php?$nro_os=<?php print("$nro_os");?>&&mes=<?php print("$mes");?>&&anio=<?php print("$anio");?>&&lote=<?php print("$lote");?>&&nro_os1=<?php print("$nro_os");?>" tabindex = "28" title = "Presione aqui para FACTURAR"><img src="../../imagenes/office//295.ico" alt="FACTURAR" border = "0"></a></div> -->


</tr>




<?php 


	$cont = $cont + $cantidad_ordenes;
$result->MoveNext();
	} ?>
<tr bgcolor="#E6E6E6">


  <td colspan="12" bgcolor="#CCCCCC" scope="row"><div align="center"><span class="Estilo32">Cantidad de Ordenes: <?php echo $cont;?></span></div>  </tr>
</table>
<div align="center"></div>

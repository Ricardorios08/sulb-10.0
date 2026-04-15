<?php 

$sql2 = "SELECT * FROM `detalle` WHERE  `cod_grabacion` like '$cod_grabacion' order by rand()";
$result2 = $db->Execute($sql2);
echo $cod_graba=$result2->fields["cod_grabacion"];

if ($cod_graba == ""){
$fecha=strtoupper($result->fields["fecha"]);
$matricula=strtoupper($result->fields["matricula"]);
$prescriptor=strtoupper($result->fields["medico"]);
$confirmada=strtoupper($result->fields["confirmada"]);

$dia = substr($fecha,8,2);
$mes = substr($fecha,5,2);
$anio_o = substr($fecha,0,4);

include ("../../conexiones/config.inc.php");

$sql1 = "select * from datos_laboratorio where nro_laboratorio = '$nro_laboratorio'";
$result1 = $db->Execute($sql1);
$nombre=substr($result1->fields["nombre_laboratorio"],0,17);
$nombre = strtoupper($nombre);

$renglon = $renglon + 1;
if ($band== 1){
?><tr bgcolor="#FFFFFF"><?php 
	$band=2;
}
else
	  {
?><tr bgcolor="#E8DCFC">	  <?php 
$band=1;
}
?>

<td class="Estilo26"><div align="center"><span class="Estilo28"><?php echo $renglon;?></span> </div>   
<?php if ($mostrar_lab != 1){?>
    <th scope="row">      <span class="Estilo30"><?php echo $nro_laboratorio;?></span>
    <td> 
	  <span class="Estilo30">
	  <?php echo $nombre;?> 
      </span>	  <div align="left" class="Estilo30"></div>
      <span class="Estilo26">
      <?php }?>
	
<?php 
	
if (($busca == "5073") or ($busca == "3764")) {

		if ($confirmada == 1){
?><td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $autorizacion;?></span> </div>	  <span class="Estilo26"><?php 
		}

		else{

?></span><td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $nro_orden;?></span> </div><?php 

		}



}

else{

		?></span><td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $nro_orden;?></span> </div><?php 

}



?>
	
	
<td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $lote;?></span> </div>
<td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $marca;?></span> </div>


    <td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $nro_afiliado;?></span>
</div>
    <td><div align="center" class="Estilo26"><span class="Estilo28"><?php echo $fecha;?></span>
    </div>
    <td><div align="center" class="Estilo31"><a href="detalle.php?id=<?php print("$cod_grabacion");?>&bande_2=1&confirmada=<?php print("$confirmada");?>&nro_laboratorio=<?php print("$nro_laboratorio");?>&nombre_laboratorio=<?php print("$nombre_laboratorio");?>"><IMG SRC="../../imagenes/office//137.ico" alt="Imprimir" border = "0"></a></div>

		<span class="Estilo26">
		<?php if (($buscador == 4) OR ($buscador == 7)){?>
        </span>
    <td><div align="center" class="Estilo31"><a href="grabar/pagina_modificar.php?$band_mes=1&&cod_grabacion=<?php print("$cod_grabacion");?>&periodo=<?php print("$periodo");?>&&anio_o=<?php print("$año");?>" tabindex = "28" title = "Presione aqui para ingresar una nueva orden"><img src="../../imagenes/office//295.ico" alt="Modificar" border = "0"> </a></div>
    <td><div align="center" class="Estilo31">
		
		<a href="eliminar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&bande_2=1&confirmada=<?php print("$confirmada");?>&nro_laboratorio=<?php print("$nro_laboratorio");?>&nombre_laboratorio=<?php print("$nombre_laboratorio");?>" onclick="return confirm('¿Está seguro de Borrar esta orden?');"><IMG SRC="../../imagenes/office//1047.ico" alt="Imprimir" border = "0"></a></div>
	  <span class="Estilo26">
	  <?php }?>
	
	  </span></td>
</tr>




<?php 
	$cont = $cont + 1;
$result->MoveNext();
	} ?>
<tr bgcolor="#E6E6E6">

		<?php if ($buscador == 4){?>
  <td colspan="12" scope="row"><div align="center"><span class="Estilo32">Cantidad de Ordenes: <?php echo $cont;?></span></div>  </tr>
<?php }else{?>
  <td colspan="12" scope="row"><div align="center"><span class="Estilo32">Cantidad de Ordenes: <?php echo $cont;?></span></div>  </tr>
<?php }?>
</table>
<div align="center"></div>
<?php }?>
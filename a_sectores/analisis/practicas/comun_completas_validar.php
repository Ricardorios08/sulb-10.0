<style type="text/css">
<!--
.Estilo3 {font-size: 10px}
-->
</style>
 

<?php

$sql11="select * from detalle_referencia where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
$valor=$result11->fields["valor"];
$cod_operacion=$result11->fields["cod_operacion"];





if ($valor != ''){
$estado = "COMPLETA";
$sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}else{
 $sql11="UPDATE `detalle` SET  `completo`='0' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}



$pasar = $valor.";".$cod_grabacion;
$conta = $conta +1;
$tab = $tab + 1;
$nombre_practica = substr($nombre_practica,0,38);

?> <!-- <table width="830" border="1" cellspacing="0" bgcolor="#FFFFFF"> -->
<tr>
     <td width="94" bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden_validar.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden_validar.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

     <td width="710" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> 

<?php echo $nombre_practica;?> <?php if ($nro_os == 5080){?> N° Formulario: 
	<input style="-moz-appearance: -moz-win-browsertabbar-toolbox;"  type="text" name="<?php echo aut.$cod_operacion10;?>" id = "<?php echo $tab;?>" value = "<?php echo $cod_autorizacion;?>" onKeyPress="return verif_caracter(this,event)" size="8" > 
		<?php }?>
		
		</td>
     <td width="32" bgcolor="#FFFFCC"><div align="center"><a href="borra_practica_validar.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onClick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><img src="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     </tr>
<?php 


//cod_operacion.$cod_operacion;
$estado = "";



?>
 
 <!-- </table> -->

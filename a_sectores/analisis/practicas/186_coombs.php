<?PHP

$sql11="select * from detalle_coombs where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$salino=$result11->fields["salino"];
$albuminoso=$result11->fields["albuminoso"];
$coombs=$result11->fields["coombs"];
$observaciones=$result11->fields["observaciones"];
 

 
if ($salino != ''){
	$estado = "COMPLETA";
	 $sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}else{
	 $sql11="UPDATE `detalle` SET  `completo`='0' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica and nro_practica = $nro_practica";
	$result11 = $db->Execute($sql11);
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_coombs.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
<?php echo $nombre_practica;?></a></td>
     <td bgcolor="#FFFFFF">&nbsp;</td>
     <td bgcolor="#FFFFFF"><div align="center">
       <?php if ($enter == 1){?>
       <input type="checkbox" name="<?php echo enter.$cod_operacion1;?>"  checked>
       <?php }else{?>
       <input type="checkbox" name="<?php echo enter.$cod_operacion1;?>"  >
       <?php }?>
</div></td>
     <td bgcolor="#FFFFCC"><div align="center">
       <?php if ($imprimir == 1){?>
       <input type="checkbox" name="<?php echo imprimir.$cod_operacion1;?>"  checked>
       <?php }else{?>
       <input type="checkbox" name="<?php echo imprimir.$cod_operacion1;?>"  >
       <?php }?>
     </div></td>
 
  <td width="14" bgcolor="#FFFFFF">
       <div align="center">
         <?php if ($facturar == 0){?>
         <input type="checkbox" name="<?php echo facturar.$cod_operacion1;?>"  checked>
         <?php }else{?>
         <input type="checkbox" name="<?php echo facturar.$cod_operacion1;?>"  >       
         <?php }?>    
       </div></td>

	 
	 <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     
	 <?php if ($nro_os == 5080){?>
 <td width="275" bgcolor="#FFFFFF"> 
	<input style="-moz-appearance: -moz-win-browsertabbar-toolbox;"  type="text" name="<?php echo aut.$cod_operacion10;?>" id = "<?php echo $tab;?>" value = "<?php echo $cod_autorizacion;?>" onKeyPress="return verif_caracter(this,event)" size="8" >  </td>
<?php }?>

	 <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 

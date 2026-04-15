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

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="normal_mod.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
<?php echo $nombre_practica;?></a></td>
     <td bgcolor="#FFFFFF"><div align="center">
     
      
     <input type="text" name="<?php echo valor.$cod_operacion;?>" id = "<?php echo $tab;?>" value = "<?php echo $valor;?>" onKeyPress="return verif_caracter(this,event)" size="8" > <?php echo $unidad;?>
    </div></td>
     <td bgcolor="#FFFFFF"><div align="center">
       <?php if ($enter == 1){?>
       <input type="checkbox" name="<?php echo enter.$cod_operacion1;?>"  checked>
       <?php }else{?>
       <input type="checkbox" name="<?php echo enter.$cod_operacion1;?>"  >
       <?php }?>
</div></td>
     <td bgcolor="#FFFFCC">   <div align="center">
  <?php if ($imprimir == 1){?>
  <input type="checkbox" name="<?php echo imprimir.$cod_operacion1;?>"  checked>
  <?php }else{?>
  <input type="checkbox" name="<?php echo imprimir.$cod_operacion1;?>"  >
  <?php }?>
    </div></td>
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('¿Está seguro de Borrar la Práctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 


//cod_operacion.$cod_operacion;
$estado = "";
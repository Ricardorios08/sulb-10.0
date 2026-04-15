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

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

     <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="normal_mod.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
<?php echo $nombre_practica;?></a> </td>




     <td width="136" bgcolor="#FFFFFF">
     
      
       <div align="left">
         <input style="-moz-appearance: -moz-win-browsertabbar-toolbox;"  type="text" name="<?php echo valor.$cod_operacion;?>" id = "<?php echo $tab;?>" value = "<?php echo $valor;?>" onKeyPress="return verif_caracter(this,event)" size="8" > 
    <?php echo $unidad;?>       </div></td>
     <td width="96" bgcolor="#FFFFFF">
       
       <div align="center">
         <?php if ($enter == 1){?>
         <input type="checkbox" name="<?php echo enter.$cod_operacion1;?>"  checked>
         <?php }else{?>
         <input type="checkbox" name="<?php echo enter.$cod_operacion1;?>"  >
         <?php }?>


       <a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('¿Está seguro de Borrar la Práctica? <?php echo $practica;?>');"></a></div></td>
    
	 	 


	 <td width="14" bgcolor="#FFFFFF">
       <div align="center">
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




     <td width="25" bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onClick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><img src="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>


<?php if ($nro_os == 5080){?>
 <td width="275" bgcolor="#FFFFFF"> 
	<input style="-moz-appearance: -moz-win-browsertabbar-toolbox;"  type="text" name="<?php echo aut.$cod_operacion10;?>" id = "<?php echo $tab;?>" value = "<?php echo $cod_autorizacion;?>" onKeyPress="return verif_caracter(this,event)" size="8" >  </td>
<?php }?>

     <td width="26" bgcolor="#FFFFCC"><?php echo $estado;?></td>


     <td width="77" bgcolor="#FFFFCC">
       <div align="left">
         <?php include ("historial.php")?>
         </div></td></tr>
<?php 


//cod_operacion.$cod_operacion;
$estado = "";



?>
 
 
<?PHP

 $sql1="SELECT * FROM detalle_complejos where cod_grabacion = $cod_grabacion AND nro_practica = $nro_practica";
$result13 = $db->Execute($sql1);

$valor1=$result13->fields["valor1"];
$valor2=$result13->fields["valor2"];
$valor3=$result13->fields["valor3"];
$valor4=$result13->fields["valor4"];
$valor5=$result13->fields["valor5"];
$valor6=$result13->fields["valor6"];
$valor7=$result13->fields["valor7"];
$valor8=$result13->fields["valor8"];
$valor9=$result13->fields["valor9"];
$valor10=$result13->fields["valor10"];
$valor11=$result13->fields["valor11"];
$valor12=$result13->fields["valor12"];
$valor13=$result13->fields["valor13"];
$valor14=$result13->fields["valor14"];
$valor15=$result13->fields["valor15"];
$valor16=$result13->fields["valor16"];


$valor17=$result13->fields["valor17"];
$valor18=$result13->fields["valor18"];
$valor19=$result13->fields["valor19"];
$valor20=$result13->fields["valor20"];
$valor21=$result13->fields["valor21"];
$valor22=$result13->fields["valor22"];
$valor23=$result13->fields["valor23"];
$valor24=$result13->fields["valor24"];
$valor25=$result13->fields["valor25"];
$valor26=$result13->fields["valor26"];
$valor27=$result13->fields["valor27"];
$valor28=$result13->fields["valor28"];
$valor29=$result13->fields["valor29"];
$valor30=$result13->fields["valor30"];

$suma = $valor1 + $valor2 + $valor3 + $valor4 + $valor5 + $valor6 + $valor7 + $valor8+ $valor9 + $valor10 + $valor11 + $valor12 + $valor13 + $valor14 + $valor15 + $valor16;

if ($suma > 0){

	$estado = "COMPLETA";
	 $sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}
else{
	 $sql11="UPDATE `detalle` SET  `completo`='0' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


}

if (($valor1 != '') or ($valor2 != '') or ($valor3 != '') or ($valor4 != '') or ($valor5 != '') or ($valor6 != '') or ($valor7 != '') or ($valor8 != '') or ($valor9 != '') or ($valor10 != '') or ($valor11 != '') or ($valor12 != '') or ($valor13 != '') or ($valor14 != '') or ($valor15 != '') or ($valor16 != '')){

	$estado = "COMPLETA";
	 $sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}
else{
	 $sql11="UPDATE `detalle` SET  `completo`='0' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


}




 /*
if ($muestra != ''){
	$estado = "COMPLETA";
	 $sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}
else{
	 $sql11="UPDATE `detalle` SET  `completo`='0' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}*/





?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_complejo.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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


     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica_complejo.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
    
	 <?php if ($nro_os == 5080){?>
 <td width="275" bgcolor="#FFFFFF"> 
	<input style="-moz-appearance: -moz-win-browsertabbar-toolbox;"  type="text" name="<?php echo aut.$cod_operacion10;?>" id = "<?php echo $tab;?>" value = "<?php echo $cod_autorizacion;?>" onKeyPress="return verif_caracter(this,event)" size="8" >  </td>
<?php }?>

	 <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>

   <td width="77" bgcolor="#FFFFCC">
       <div align="left">
         <?php include ("historial.php")?>
         </div></td></tr>
<?php 

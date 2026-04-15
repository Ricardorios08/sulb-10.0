<?php

$sql11="select * from detalle_hemo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$hematies=strtoupper($result11->fields["hematies"]); if ($hematies == "0.00"){$hematies = "";}
$hemoglobina=strtoupper($result11->fields["hemoglobina"]); if ($hemoglobina == "0.00"){$hemoglobina = "";}
$hematocrito=strtoupper($result11->fields["hematocrito"]); if ($hematocrito == "0.00"){$hematocrito = "";}
$reticulocitos=strtoupper($result11->fields["reticulocitos"]); if ($reticulocitos == "0.00"){$reticulocitos = "";}
$plaquetas=strtoupper($result11->fields["plaquetas"]); if ($plaquetas == "0.00"){$plaquetas = "";}
$mcv=strtoupper($result11->fields["mcv"]); if ($mcv == "0.00"){$mcv = "";}
$mch=strtoupper($result11->fields["mch"]); if ($mch == "0.00"){$mch = "";}
$mchc=strtoupper($result11->fields["mchc"]); if ($mchc == "0.00"){$mchc = "";}
$leucocitos=$result11->fields["leucocitos"]; if ($leucocitos == "0.00"){$leucocitos = "";}
$neutro_cayado=$result11->fields["neutro_cayado"]; if ($neutro_cayado == "0.00"){$neutro_cayado = "";}
$neutro_segmentado=$result11->fields["neutro_segmentado"]; if ($neutro_segmentado == "0.00"){$neutro_segmentado = "";}
$eosinofilos=$result11->fields["eosinofilos"]; if ($eosinofilos == "0.00"){$eosinofilos = "";}
$basofilos=$result11->fields["basofilos"]; if ($basofilos == "0.00"){$basofilos = "";}
$linfocitos=$result11->fields["linfocitos"]; if ($linfocitos == "0.00"){$linfocitos = "";}
$monocitos=$result11->fields["monocitos"]; if ($monocitos == "0.00"){$monocitos = "";}


 $total_leucocitos = $neutro_cayado + $neutro_segmentado + $eosinofilos + $basofilos + $linfocitos + $monocitos;

if ($total_leucocitos != 100){
$formula = "NO COINCIDE FORM. LEUCO.";
$estado = "CORREGIR";	
$sql11="UPDATE `detalle` SET  `completo`='0' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
}ELSE{
$estado = "COMPLETA";
 $sql11="UPDATE `detalle` SET  `completo`='1' WHERE `cod_grabacion` = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
$formula = "";
}




?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="hemo_mod.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
<?php echo $nombre_practica;?></a>




</td>
     <td bgcolor="#FFFFFF"><div align="center"><?php echo $formula;?></div></td>
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

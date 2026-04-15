<script language="javascript">

function on_load()
{
document.getElementById("1").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "1":
				document.getElementById("2").focus();
				break;
				case "2":
				document.getElementById("3").focus();
				break;
				case "3":
				document.getElementById("4").focus();
				break;
				case "4":
				document.getElementById("5").focus();
				break;
				case "5":
				document.getElementById("6").focus();
				break;

				case "6":
				document.getElementById("7").focus();
				break;

				case "7":
				document.getElementById("8").focus();
				break;


				case "8":
				document.getElementById("9").focus();
				break;
				case "9":
				document.getElementById("10").focus();
				break;
				case "10":
				document.getElementById("11").focus();
				break;
				case "11":
				document.getElementById("12").focus();
				break;

				case "12":
				document.getElementById("13").focus();
				break;
				case "13":
				document.getElementById("14").focus();
				break;
				case "14":
				document.getElementById("15").focus();
				break;
				case "15":
				document.getElementById("16").focus();
				break;


				case "17":
				document.getElementById("GUARDAR").focus();
				break;

				


				
		}
		return false;
	}
	return true;
}



</script>


<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.Estilo2 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
<form action="guardar_todos.php" method="post">


<BODY onload = "on_load()">

<table width="850" border="1" cellspacing="0">
  <!--DWLayoutTable-->
   <tr bgcolor="#C5C5C5">
     <td width="81"><div align="center" class="Estilo2">
       <div align="center">ORDENAR</div>
     </div></td>
     <td colspan="2"><div align="center" class="Estilo2">
       <div align="center">PRACTICA</div>
     </div></td>
     <td><div align="center"><span class="Estilo2">Enter</span></div></td>
     <td width="78"><div align="center" class="Estilo2">
       <div align="center">Imprimir</div>
     </div></td>
     <td width="40"><div align="center" class="Estilo2">
       <div align="center">Borrar</div>
     </div></td>
     <td width="72"><div align="center" class="Estilo2">
       <div align="center">ESTADO</div>
     </div></td>
   </tr>


 <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>"> 
 <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>"> 

 <?php 

 //VIENE DE EMISION_MOD.PHP
 
  $sql10="select * from detalle where cod_grabacion = $cod_grabacion order by orden, cod_operacion";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo".$db->ErrorMsg());
 while (!$result10->EOF) {

$nro_practica=strtoupper($result10->fields["nro_practica"]);
$imprimir=strtoupper($result10->fields["imprimir"]);
$enter=strtoupper($result10->fields["enter"]);
$cod_operacion1=strtoupper($result10->fields["cod_operacion"]);
$cod_grabacion1=strtoupper($result10->fields["cod_grabacion"]);
$orden =strtoupper($result10->fields["orden"]);


$sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);
$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];
$clase=$result11->fields["clase"];


if ($nro_practica == 711){


 $sql11="select * from detalle_orina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$densidad=strtoupper($result11->fields["densidad"]);



if ($densidad > 0){
	$estado = "OK";
}

  ?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	 <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>
		 
		 
		
     <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="orina_mod.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
<?php echo $nombre_practica;?></a></td>
     <td width="230" bgcolor="#FFFFFF">&nbsp;</td>
     <td width="44" bgcolor="#FFFFFF"><div align="center">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 


$estado = "";


}elseif ($nro_practica == 475){

 $sql11="select * from detalle_hemo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


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
}ELSE{
	$estado = "COMPLETA";
	$formula = "";
}




?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="hemo_mod.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
<?php echo $nombre_practica;?></a></td>
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 

$estado = "";


}elseif ($nro_practica == 764){


  $sql11="select * from detalle_hemoglobina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$albumina=strtoupper($result11->fields["albumina"]);

if ($albumina > 0){
	$estado = "OK";
}



 ?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="electro_mod.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 


$estado = "";

}elseif ($nro_practica == 911){


  $sql11="select * from detalle_urocultivo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=strtoupper($result11->fields["muestra"]);

if ($muestra > 0){
	$estado = "OK";
}



?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_urocultivo.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 


$estado = "";

}elseif ($nro_practica == 953){


  $sql11="select * from detalle_widal where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$flagelares=$result11->fields["flagelares"];
$somatico=$result11->fields["somatico"];
$paratyphi_a=$result11->fields["paratyphi_a"];
$paratyphi_B=$result11->fields["paratyphi_b"];



if ($flagelares > 0){
	$estado = "OK";
}



?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_widal.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 


$estado = "";

 
}elseif ($nro_practica == 186){


  $sql11="select * from detalle_widal where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$salino=$result11->fields["salino"];
$albuminoso=$result11->fields["albuminoso"];
$coombs=$result11->fields["coombs"];
$observaciones=$result11->fields["paratyphi_b"];



if ($flagelares > 0){
	$estado = "OK";
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 


$estado = "";

}elseif ($nro_practica == 413){

 $sql11="select * from detalle_curva where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$basal=strtoupper($result11->fields["basal"]);
if ($basal > 0){
	$estado = "COMPLETA";
}

$sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);
$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_curva.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 


}elseif ($nro_practica == 110){

	 $sql11="select * from detalle_bilirrubina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);



$total=strtoupper($result11->fields["total"]);
$directa=strtoupper($result11->fields["directa"]);

$indirecta=strtoupper($result11->fields["indirecta"]);

 
if ($total > 0){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_bilirrubina.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 

 
}elseif ($nro_practica == 13){

 $sql11="select * from detalle_aglutininas where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);



$salino=strtoupper($result11->fields["salino"]);
$albuminoso=strtoupper($result11->fields["albuminoso"]);



 
if ($salino > 0){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_aglutininas.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 


}elseif ($nro_practica == 546){

 $sql11="select * from detalle_iono where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$natremia=strtoupper($result11->fields["natremia"]);
$kalemia=strtoupper($result11->fields["kalemia"]);
$cloremia =strtoupper($result11->fields["cloremia"]);



 
if ($natremia > 0){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_iono.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 






}elseif ($nro_practica == 193){

 $sql11="select * from detalle_clearence where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$creatinemia=strtoupper($result11->fields["creatinemia"]);
$creatinuria=strtoupper($result11->fields["creatinuria"]);

$diuresis=strtoupper($result11->fields["diuresis"]);
$sup_corporal=strtoupper($result11->fields["sup_corporal"]);

$clearence=strtoupper($result11->fields["clearence"]);




 
if ($creatinemia > 0){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_creatinina.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 



}elseif ($nro_practica == 481){

 $sql11="select * from detalle_hepatograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$aspartato=strtoupper($result11->fields["aspartato"]);
$alanina=strtoupper($result11->fields["alanina"]);

$fosfatasa=strtoupper($result11->fields["fosfatasa"]);
$total=strtoupper($result11->fields["total"]);

$directa=strtoupper($result11->fields["directa"]);
$indirecta=strtoupper($result11->fields["indirecta"]);


$observaciones =strtoupper($result11->fields["observaciones"]);



 
if ($aspartato > 0){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_hepato.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 

}elseif ($nro_practica == 2734){

 $sql11="select * from detalle_antigeno where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$enzima=strtoupper($result11->fields["enzima"]);
$elisa=strtoupper($result11->fields["elisa"]);
$razon_porcentual=strtoupper($result11->fields["razon_porcentual"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 
if ($enzima > 0){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_antigeno.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 



}elseif ($nro_practica == 136){

 $sql11="select * from detalle_calcio where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=strtoupper($result11->fields["diuresis"]);
$valor_hallado=strtoupper($result11->fields["valor_hallado"]);


 
if ($valor_hallado > 0){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_calcio.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 



}elseif ($nro_practica == 363){

 $sql11="select * from detalle_fosforo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=strtoupper($result11->fields["diuresis"]);
$valor_hallado=strtoupper($result11->fields["valor_hallado"]);


 
if ($valor_hallado > 0){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_orina.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 


}elseif ($nro_practica == 654){

 $sql11="select * from detalle_magnesio where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=strtoupper($result11->fields["diuresis"]);
$valor_hallado=strtoupper($result11->fields["valor_hallado"]);


 
if ($valor_hallado > 0){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_magnesio.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 
 
}elseif ($nro_practica == 767){
 $sql11="select * from detalle_proteinura where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=strtoupper($result11->fields["diuresis"]);
$valor_hallado=strtoupper($result11->fields["valor_hallado"]);


 
if ($valor_hallado > 0){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_proteinuria.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 
}elseif ($nro_practica == 35){

  $sql11="select * from detalle_antibiograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);



$sensible1=strtoupper($result11->fields["sensible1"]);
 

 
if ($sensible1 != ''){
	$estado = "COMPLETA";
}

 
 

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_antibiograma.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 


}elseif ($nro_practica == 105){

$sql11="select * from detalle_bacteriologico where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=strtoupper($result11->fields["muestra"]);
$color=strtoupper($result11->fields["color"]);
$aspecto=strtoupper($result11->fields["aspecto"]);
$obs_micro=strtoupper($result11->fields["obs_micro"]);
$nicolle=strtoupper($result11->fields["nicolle"]);
$cultivo=strtoupper($result11->fields["cultivo"]);
 

 
if ($muestra != ''){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_bacteriologico.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 


}elseif ($nro_practica == 931){

$sql11="select * from detalle_vaginal where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=$result11->fields["muestra"];
$celulas_epiteliales=$result11->fields["celulas_epiteliales"];
$leucocitos=$result11->fields["leucocitos"];
$piocitos=$result11->fields["piocitos"];
$elementos_hongos=$result11->fields["elementos_hongos"];
$trichomonas_vaginalis=$result11->fields["trichomonas_vaginalis"];
$test_aminas=$result11->fields["test_aminas"];
$coloracion=$result11->fields["coloracion"];
$cultivo=$result11->fields["cultivo"];
 

 
if ($muestra != ''){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_vaginal.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 

}elseif ($nro_practica == 309){

$sql11="select * from detalle_exudado where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=$result11->fields["muestra"];
$coloracion=$result11->fields["coloracion"];
$cultivo=$result11->fields["cultivo"];
 

 
if ($muestra != ''){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_exudado.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 

}elseif ($nro_practica == 903){

$sql11="select * from detalle_uretral where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$muestra=$result11->fields["muestra"];
$coloracion=$result11->fields["coloracion"];
$cultivo=$result11->fields["cultivo"];
 $nota=$result11->fields["nota"];

 
if ($muestra != ''){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_uretral.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 

}elseif ($nro_practica == 547){


 $sql11="select * from detalle_iono_urinario where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$resultado=strtoupper($result11->fields["resultado"]);
$sodio=strtoupper($result11->fields["sodio"]);
$potasio=strtoupper($result11->fields["potasio"]);
$cloro=strtoupper($result11->fields["cloro"]);

$observaciones =strtoupper($result11->fields["observaciones"]);
 

 
if ($muestra != ''){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_urinario.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 


}elseif ($nro_practica == 171){

 $sql11="select * from detalle_coagulograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$min=strtoupper($result11->fields["min"]);
$seg=strtoupper($result11->fields["seg"]);
$porcentaje=strtoupper($result11->fields["porcentaje"]);
$ttpk_seg=strtoupper($result11->fields["ttpk_seg"]);
 

 
if ($muestra != ''){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_coagulograma.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 

}elseif ($nro_practica == 736){

 $sql11="select * from detalle_parasitologico where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$metodo_macro=strtoupper($result11->fields["metodo_macro"]);
$resultado_macro=strtoupper($result11->fields["resultado_macro"]);
$metodo_micro=strtoupper($result11->fields["metodo_micro"]);

 $resultado_micro=strtoupper($result11->fields["resultado_micro"]);
$resultado_micro1=strtoupper($result11->fields["resultado_micro1"]);
$observaciones=strtoupper($result11->fields["observaciones"]);
 
 
if ($muestra != ''){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_parasitologico.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 

}elseif ($nro_practica == 615){
 
 $sql11="select * from detalle_lipidograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$suero=strtoupper($result11->fields["suero"]);
$quilomicrones=strtoupper($result11->fields["quilomicrones"]);
$beta=strtoupper($result11->fields["beta"]);
$prebeta=strtoupper($result11->fields["prebeta"]);
$alfa=strtoupper($result11->fields["alfa"]);;
 

 
if ($suero != ''){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_lipidograma.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 
 
	  }elseif ($nro_practica == 408){
 
 $sql11="select * from detalle_pmn where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$aspecto=$result11->fields["aspecto"];
$enfresco=$result11->fields["enfresco"];
$enfresco1=$result11->fields["enfresco1"];
$giemsa=$result11->fields["giemsa"];
$giemsa1=$result11->fields["giemsa1"];
$pmn=$result11->fields["pmn"];
 
 

 
if ($suero != ''){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_pmn.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 

}else{


if ($clase == 2){

 $sql11="select * from detalle_coagulograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$min=strtoupper($result11->fields["min"]);
$seg=strtoupper($result11->fields["seg"]);
$porcentaje=strtoupper($result11->fields["porcentaje"]);
$ttpk_seg=strtoupper($result11->fields["ttpk_seg"]);
 

 
if ($muestra != ''){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>


      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_modulo.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 



}elseif ($nro_practica == 905){

 $sql11="select * from detalle_uricosuria where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=strtoupper($result11->fields["diuresis"]);
$valor_hallado=strtoupper($result11->fields["valor_hallado"]);


 
if ($valor_hallado > 0){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_uricosuria.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 



}elseif ($nro_practica == 4858){

 $sql11="select * from detalle_espermo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$diuresis=strtoupper($result11->fields["diuresis"]);
$valor_hallado=strtoupper($result11->fields["valor_hallado"]);


 
if ($valor_hallado > 0){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_espermo.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 





}elseif ($nro_practica == 298){

 $sql11="select * from detalle_espermograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$color=$result11->fields["color"];
$grumos=$result11->fields["grumos"];
$viscocidad=$result11->fields["viscocidad"];
$volumen=$result11->fields["volumen"];
$ph=$result11->fields["ph"];

$espermatozoides=$result11->fields["espermatozoides"];
$celulas=$result11->fields["celulas"];
$leucocitos=$result11->fields["leucocitos"];
$piocitos=$result11->fields["piocitos"];
$hematies=$result11->fields["hematies"]; 

$grado_a=$result11->fields["grado_a"];
$grado_b=$result11->fields["grado_b"];
$grado_c=$result11->fields["grado_c"];
$grado_d=$result11->fields["grado_d"];

$normales=$result11->fields["normales"];
$anomalias_cabeza=$result11->fields["anomalias_cabeza"];
$anomalias_segmento=$result11->fields["anomalias_segmentado"];
$anomalias_cola=$result11->fields["anomalias_cola"];


 
if ($valor_hallado > 0){
	$estado = "COMPLETA";
}

?> <tr>
     <td bgcolor="#FFFFFF"><div align="center"><a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=arriba"><IMG SRC="../../imagenes/office//094.ico" alt="Borrar" border = "0"></a>
	 	  <a href="cambiar_orden.php?cod_grabacion=<?php print("$cod_grabacion");?>&&cod_operacion=<?php print("$cod_operacion1");?>&&orden=<?php print("$orden");?>&&orientacion=abajo"><IMG SRC="../../imagenes/office//093.ico" alt="Borrar" border = "0"></a>
		 </div></td>

      <td width="275" bgcolor="#FFFFFF"> <?php echo $nro_practica;?> -  <a href="mod_espermograma_chico.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
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
     <td bgcolor="#FFFFCC"><div align="center"><a href="borra_practica.php?cod_operacion=<?php print("$cod_operacion1");?>&&cod_grabacion=<?php print("$cod_grabacion");?>" onclick="return confirm('&iquest;Est&aacute; seguro de Borrar la Pr&aacute;ctica? <?php echo $practica;?>');"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     <td bgcolor="#FFFFCC"><div align="center"><?php echo $estado;?>
  </div></td>
   </tr>
<?php 

}
else{


 $sql11="select * from detalle_referencia where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);
$valor=$result11->fields["valor"];
$cod_operacion=$result11->fields["cod_operacion"];

if ($valor > 0){
	$estado = "COMPLETA";
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

}



/*if ($nro_practica == 711){
include ("orina_mod.php"); // falta poco
}elseif ($nro_practica == 736){
include ("fecal_mod.php");
}elseif ($nro_practica == 475){
include ("hemo_mod.php"); // falta poco
}elseif ($nro_practica == 471){
include ("electro_mod.php");
}else{
include ("normal_mod.php"); // listo
}*/


}

	
$result10->MoveNext();

	}


?>
<tr><td colspan="7" valign="top" bgcolor="#C5C5C5"><form>
      <div align="center">
        <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR">
    </div>
</table>

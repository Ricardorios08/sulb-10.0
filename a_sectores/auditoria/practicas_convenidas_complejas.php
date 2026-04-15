
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo40 {
	font-size: 16px;
	font-weight: bold;
}
body {
	 
}
-->
</style>

<table width="810" border="0" cellspacing="0">
<!--DWLayoutTable-->
<?php 
include ("../../conexiones/config.inc.php");



$modalidad = 1;

$buscar_por;

if ($palabra == ""){

	if ($buscar_por == 0){
$sql1="select * from convenio_practica  where clase = 0 order by cod_practica asc";
	}elseif ($buscar_por == 1){
$sql1="select * from convenio_practica  where clase = 1 order by cod_practica asc";
	}elseif ($buscar_por == 2){
$sql1="select * from convenio_practica  where clase = 2 order by cod_practica asc";
	}elseif ($buscar_por == 3){
$sql1="select * from convenio_practica  where clase = 4 order by cod_practica asc";	
	}elseif ($buscar_por == 4){
$sql1="select * from convenio_practica  order by cod_practica asc";
	}



}else{
 $sql1="select * from convenio_practica  where  (cod_practica like '$palabra') order by cod_practica asc";
}
	
	$result = $db->Execute($sql1);

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
	
$cod_practica=strtoupper($result->fields["cod_practica"]);
$practica=strtoupper($result->fields["practica"]);
$categoria=strtoupper($result->fields["categoria"]);
$honorarios=$result->fields["honorarios"];
$gastos=$result->fields["gastos"];
$toma=$result->fields["toma"];
$urgencia=$result->fields["urgencia"];
$material_descartable=$result->fields["material_descartable"];
$valor=$result->fields["valor"];
$metodo=$result->fields["metodo"];
$tipo_det=$result->fields["tipo_det"];
$metodo=$result->fields["metodo"];
$unidad=$result->fields["unidad"];
$clase=$result->fields["clase"];


//echo nl2br( stripslashes( htmlentities($referencia=$result->fields["referencia"])));
 //$referencia=$result->fields["referencia"];

switch ($categoria){
	case "1":{$categoria = "COM.";
	BREAK;}
	Case "2":{$categoria = "ESP.";BREAK;}
	case "3":{$categoria = "ALTA.";BREAK;}
}

switch ($clase){
	case "0":{$clase = "0. Simple";	BREAK;}
	Case "1":{$clase = "1. Compleja";BREAK;}
	case "2":{$clase = "2. Modulo";BREAK;}
	case "3":{$clase = "3. Texto";BREAK;}
	case "4":{$clase = "4. Compuesto";BREAK;}
}

if ($cod_practica > 9999){
$mensaje = " * * * PRACTICA PROPIA EXCLUIDA DEL NBU 2012 * * *";
}else{
$mensaje = "";
}


?>



<tr bordercolor="#FFFFFF"> 
<td width="59" bgcolor="#B8B8B8"><div align="center" class="Estilo40"><?php print("$cod_practica");?></div></td>
<td colspan="3" bgcolor="#B8B8B8"><div align="left"><?php print("$practica");?>  <?php print("$mensaje");?></div></td>
<td colspan="2" bgcolor="#B8B8B8"><div align="center"><?php print("$categoria");?> </div></td>
<td width="65" bgcolor="#B8B8B8"><div align="center"><?php print("$honorarios");?></div></td>

<?php 
	


$valor = round(($honorarios * $variable),2);
?>
<td width="60" bgcolor="#B8B8B8"><div align="right"><?php echo number_format($valor,2);?></div></td>

<!-- <td width="54" bgcolor="#B8B8B8"><a href="modificar.php?cod_practica=<?php print("$cod_practica");?>" target = "central">
  <div align="center"><img src="../../imagenes/office//005.ico" alt="Ficha" border = "0">  </div>
  <div align="center"></div></td>

<td width="40" bgcolor="#B8B8B8"><div align="right"><a href="borra_practica.php?cod_practica=<?php print("$cod_practica");?>" target = "central" onClick="return confirm('¿Está seguro de Borrar la practica del nomenclador NBU?');"><img src="../../imagenes/office//007.ico" alt="Ficha" border = "0"></a>
</div>
  <div align="center"></div></td>
</tr>
<tr bordercolor="#FFFFFF">
  <td height="20" colspan="10" bgcolor="#F0F0F0"><div align="left"><strong>Metodo: <?php echo nl2br( stripslashes( htmlentities($metodo=$result->fields["metodo"])));?> </tr>
 <tr bordercolor="#FFFFFF">
   <td colspan="2" valign="top" bgcolor="#BBDDFF"><div align="center">Ref 1 </div></td>
   <td valign="top" bgcolor="#BBDDFF"><div align="center">Ref 2</div></td>
   <td colspan="2" valign="top" bgcolor="#BBDDFF"><div align="center">Ref 3 </div></td>
   <td colspan="3" valign="top" bgcolor="#BBDDFF"> <div align="center">Ref 4 </div></td>
 </tr>
 <tr bordercolor="#FFFFFF">
  <td colspan="2" valign="top"><div align="right"><?php echo nl2br( stripslashes( htmlentities($referencia=$result->fields["referencia"])));?>
  </div></td>
  <td width="216" valign="top"><div align="right"><?php echo nl2br( stripslashes( htmlentities($referencia1=$result->fields["referencia1"])));?></div></td>
  <td colspan="2" valign="top"><div align="right"><?php echo nl2br( stripslashes( htmlentities($referencia2=$result->fields["referencia2"])));?></div></td>
  <td colspan="3" valign="top"><div align="right"><?php echo nl2br( stripslashes( htmlentities($referencia3=$result->fields["referencia3"])));?></div></td>
</tr>  -->
<tr bordercolor="#FFFFFF">
  <td colspan="8"><?php include ("detalle_referencia_mostrar_complejos.php");?></td>
</tr>
<tr>
  <td></td>
  <td width="97"></td>
  <td></td>
  <td width="96"></td>
  <td width="106"></td>
  <td width="1"></td>
  <td></td>
  <td></td>
  </tr>

 


<?php 
$result->MoveNext();
	}

$valor_final = 0;
$valor_toma = 0;

?>
</table>

</body>
</html>

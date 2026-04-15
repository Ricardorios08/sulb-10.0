
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

<table width="816" border="1" cellspacing="0">
<!--DWLayoutTable-->
<?php 

$palabra=$_REQUEST["palabra"];
$variable=$_REQUEST["variable"];
$buscar_por=$_REQUEST["buscar_por"];


include ("../../conexiones/config.inc.php");

$sql="select * from arancel where nro_os = $variable";
$result = $db->Execute($sql);
 
$modalidad=ucwords($result->fields["modalidad"]);
$vuh=ucwords($result->fields["uh"]);
$vug=ucwords($result->fields["ug"]);

$modalidad_especiales=ucwords($result->fields["modalidad_especiales"]);
$vuh_especiales=ucwords($result->fields["uh_especiales"]);
$vug_especiales=ucwords($result->fields["ug_especiales"]);

$modalidad_alta=ucwords($result->fields["modalidad_alta"]);
$vuh_alta=ucwords($result->fields["uh_alta"]);
$vug_alta=ucwords($result->fields["ug_alta"]);


$vuh1=ucwords($result->fields["uh"]);
$vug1=ucwords($result->fields["ug"]);





$modalidad = 1;

$buscar_por;

if ($palabra == ""){

	if ($buscar_por == 0){
$sql1="select * from convenio_practica_factura  where nro_os = $variable and  categoria = 0 order by cod_practica asc";
	}elseif ($buscar_por == 1){
$sql1="select * from convenio_practica_factura  where nro_os = $variable and categoria = 1 order by cod_practica asc";
	}elseif ($buscar_por == 2){
 $sql1="select * from convenio_practica_factura  where nro_os = $variable and categoria = 2 order by cod_practica asc";
	}elseif ($buscar_por == 4){
 $sql1="select * from convenio_practica_factura where nro_os = $variable  order by cod_practica asc";
	}



}else{
 $sql1="select * from convenio_practica_factura  where  (cod_practica like '%$palabra' and nro_os = $variable) or (practica like '%$palabra%' and nro_os = $variable) order by cod_practica asc";
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


/*
switch ($categoria){
	case "1":{$categoria = "COM.";$valor = $honorarios * $vuh;
	BREAK;}
	Case "2":{$categoria = "ESP.";$valor = $honorarios * $vuh_especiales;BREAK;}
	case "3":{$categoria = "ALTA.";$valor = $honorarios * $vuh_alta;BREAK;}
}
*/





?>



<tr bordercolor="#FFFFFF"> 
<td width="59" bgcolor="#F0F0F0"><div align="center" class="Estilo40"><?php print("$cod_practica");?></div></td>
<td colspan="3" bgcolor="#F0F0F0"><div align="left"><?php print("$practica");?> <a href="modificar_referencia.php?cod_practica=<?php print("$cod_practica");?>" target = "central"><a></div></td>
<td colspan="2" bgcolor="#F0F0F0"><div align="center"><a href="modificar_referencia_factura.php?cod_practica=<?php print("$cod_practica");?>&&nro_os=<?php print("$variable");?>" target = "central"><img src="../../imagenes/office//009.ico" alt="Ficha" border = "0"><a></div></td>
<td width="65" bgcolor="#F0F0F0"><div align="center"></div></td>

<?php 
	



?>
<td width="60" bgcolor="#F0F0F0"><div align="right"><?php echo number_format($valor,2);?></div></td>



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


<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo3 {color: #FFFFFF}
body {
	 
}
-->
</style>

<!-- <table width="828" border="0">
<tr bordercolor="#0066FF">
<td colspan="5"><div align="center"><img src="../../imagenes/modulos_1.jpg" width="800" height="35"></div></td>
</tr>
 <tr bgcolor="#333333"> 
<td width="130"><div align="center" class="Estilo3"><font size="2" face="Arial, Helvetica, sans-serif">COD </font></div></td>
<td width="321" valign="top"><div align="center" class="Estilo3"><font size="2" face="Arial, Helvetica, sans-serif">NOMBRE DEL MODULO</font></div></td>
<td width="162" valign="top"><div align="center" class="Estilo3"><font size="2" face="Arial, Helvetica, sans-serif">CATEGORIA</font></div></td>
<td width="77" valign="top"><div align="center" class="Estilo3"><font face="Arial, Helvetica, sans-serif"><font size="2">MODIFICAR </font></font></div></td>
<td width="102" valign="top"><div align="center" class="Estilo3"><font face="Arial, Helvetica, sans-serif"><font size="2">ELIMINAR </font></font></div></td>
</TABLE> -->


<table width="828" border="1" cellspacing="0">

<?php 

$palabra=$_REQUEST["palabra"];

include ("../../conexiones/config.inc.php");

if ($palabra == ""){
$sql1="select * from modulo  order by cod_modulo asc";
}else{
$sql1="select * from modulo  where  cod_modulo like '$palabra' or nombre_modulo like '$palabra' order by cod_modulo asc";
}
	
	$result = $db->Execute($sql1);

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
	
$cod_modulo=strtoupper($result->fields["cod_modulo"]);
$nombre_modulo=strtoupper($result->fields["nombre_modulo"]);
$categoria=strtoupper($result->fields["categoria"]);


/*$sql11="select * from metodo  where cod_metodo = $categoria ";
$result1 = $db->Execute($sql11);
$categoria=strtoupper($result1->fields["categoria"]);
*/
?>


 
<tr bordercolor="#FFFFFF"> 
<td width="131" bgcolor="#F0F0F0"><div align="center"><?php print("$cod_modulo");?></div></td>
<td width="328" bgcolor="#F0F0F0"><div align="left"><?php print("$nombre_modulo");?></div></td>
<td width="163" bgcolor="#F0F0F0"><div align="center"><?php print("$categoria");?></div></td>
<td width="80" bgcolor="#F0F0F0"><a href="modificar_modulo.php?cod_modulo=<?php print("$cod_modulo");?>" target = "central">
  <div align="center"><IMG SRC="../../imagenes/office//005.ico" alt="Ficha" border = "0"></div></td>

<td width="104" bgcolor="#F0F0F0"><div align="center"><a href="borra_modulo.php?cod_modulo=<?php print("$cod_modulo");?>" target = "central" onClick="return confirm('¿Está seguro de Borrar la practica del MODULO?');"><IMG SRC="../../imagenes/office//007.ico" alt="Ficha" border = "0"></a></font></div></td>
</tr>





<?php 
$sql10="select * from deta_modulo where cod_modulo = $cod_modulo";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {


$cod_practica=strtoupper($result10->fields["cod_practica"]);

$sql8="select practica from convenio_practica where cod_practica = '$cod_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);

$cantidad = $cantidad + 1;

?>


    <tr bordercolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">

    <td bgcolor="#F0F0F0"><div align="center" class="Estilo18"></div></td>
    <td width="328" valign="top" bgcolor="#F0F0F0"><div align="center" class="Estilo18"><?php echo $cod_practica;?></div></td>
    <td colspan="4" valign="top" bgcolor="#F0F0F0"><div class="Estilo18"> <?php echo $practica;?>
	    
	
	    
	</div></td>
  </tr>
    <tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">
     
   
<?php 


$result10->MoveNext();

	}

 
$result->MoveNext();
	}


?>
</table>

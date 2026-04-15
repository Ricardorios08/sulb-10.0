<table width="850" border="0" cellspacing="0">
<tr bordercolor="#0066FF">
<td colspan="4"><div align="center"></div></td>
</tr>
 <tr bgcolor="#333333"> 
<td width="32" bgcolor="#CCCCCC"><div align="center" class="Estilo3"><font size="2" face="Arial, Helvetica, sans-serif">COD </font></div></td>
<td colspan="2" bgcolor="#CCCCCC"><div align="center" class="Estilo3"><font size="2" face="Arial, Helvetica, sans-serif">NOMBRE DEL MODULO</font></div></td>
<td width="239" bgcolor="#CCCCCC"><div align="center" class="Estilo3"><font size="2" face="Arial, Helvetica, sans-serif">CATEGORIA</font></div></td>

<?php 



if ($nro_practica_buscar == ""){
$sql1="select * from modulo  order by cod_modulo asc";
}else{
 $sql1="select * from modulo  where  cod_modulo like '$nro_practica_buscar' or nombre_modulo like '%$nro_practica_buscar%' order by cod_modulo asc";
}
	
$result = $db->Execute($sql1);

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
	
$cod_modulo=strtoupper($result->fields["cod_modulo"]);
$nombre_modulo=strtoupper($result->fields["nombre_modulo"]);
$categoria=strtoupper($result->fields["categoria"]);


$sql11="select * from metodo  where cod_metodo = $categoria ";
$result1 = $db->Execute($sql11);
$categoria=strtoupper($result1->fields["categoria"]);

?>
<tr bordercolor="#0066FF">
  <td colspan="4" bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
<tr bordercolor="#FFFFFF"> 
<td bgcolor="#E6E6E6"><div align="center"><?php print("$cod_modulo");?></div></td>




<td colspan="2" bgcolor="#E6E6E6"><div align="left">

<a href="pagina_completa_reducida.php?cod_practica=<?php print("$cod_modulo");?>&&sel=mod"> <?php print("$nombre_modulo");?></a>

</div></td>



<td bgcolor="#E6E6E6"><div align="center"><?php print("$categoria");?></div></td>
</tr>





<?php 
$sql10="select * from deta_modulo where cod_modulo = $cod_modulo order by cod_operacion";
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

    <td bgcolor="#E6E6E6"><div align="center" class="Estilo18"></div></td>
    <td width="141" valign="top" bgcolor="#E6E6E6"><div align="center" class="Estilo18"><?php echo $cod_practica;?></div></td>
    <td colspan="2" valign="top" bgcolor="#E6E6E6"><div class="Estilo18"> <?php echo $practica;?>
	    
	
	    
	</div></td>
  </tr>
    
<?php 


$result10->MoveNext();

	}

?> <td colspan="4" bgcolor="#E6E6E6"><HR noshade></td><?php 
$result->MoveNext();
	}


?>
</table>

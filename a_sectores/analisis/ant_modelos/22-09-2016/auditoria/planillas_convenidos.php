
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
body {
	background-image: url(../../imagenes/presentacion/fondo6.jpg);
}
.Estilo4 {font-size: 18px}
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


<table width="700" border="0" cellpadding="0" cellspacing="0">
<!--DWLayoutTable-->

<?php 

$palabra=$_REQUEST["palabra"];

include ("../../conexiones/config.inc.php");

if ($palabra == ""){
$sql1="select * from planillas  order by cod_modulo asc";
}else{
$sql1="select * from planillas  where  cod_modulo like '$palabra' or nombre_modulo like '$palabra' order by cod_modulo asc";
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
<td colspan="2" bgcolor="#FFFF99"><div align="center"></div>  
<div align="left"></div>
<div align="left" class="Estilo4"><?php print("$cod_modulo");?> - <?php print("$nombre_modulo");?></div>
<a href="modificar_modulo.php?cod_modulo=<?php print("$cod_modulo");?>" target = "central">
  <div align="center"></div></td>
<td width="50" bgcolor="#FFFF99"></td>
<td width="58" bgcolor="#FFFF99"><div align="center"><a href="borra_planilla.php?cod_modulo=<?php print("$cod_modulo");?>" target = "central" onClick="return confirm('¿Está seguro de Borrar la practica del MODULO?');"><IMG SRC="../../imagenes/office//095.ico" alt="Ficha" border = "0"></a></font></div></td>
</tr>





<?php 
$sql10="select * from deta_planillas where cod_modulo = $cod_modulo";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {


$cod_practica=strtoupper($result10->fields["cod_practica"]);

$sql8="select practica from convenio_practica where cod_practica = '$cod_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);
$practica = substr($practica,0,35);
$cantidad = $cantidad + 1;

?>


    <tr bordercolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">

    <td width="325" valign="top" bgcolor="#FFFFFF"><div align="left">
      <?php echo $cod_practica;?> <?php echo $practica;?> <a href="planillas/agregar_columna.php?cod_modulo=<?php print("$cod_modulo");?>&&cod_practica=<?php print("$cod_practica");?>&&practica=<?php print("$practica");?>" target = "central" > <img src="../../imagenes/office//100.ico" alt="Ficha" border = "0"></a>
      <div class="Estilo18">      </div>      <div align="center"></div></td>
    <td colspan="3" valign="top" bgcolor="#FFFFFF"><div align="center">
      <table width="400" border="1" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr  style="cursor:hand" onMouseOver="this.style.background='#FFFFFF'; this.style.color='BLACK'" onMouseOut="this.style.background=''; this.style.color='black'">
          <?php 



$sql100="select * from deta_planillas_ver where cod_modulo = $cod_modulo and cod_practica = $cod_practica";
$result100 = $db->Execute($sql100);

if (!$result100) die("fall222o".$db->ErrorMsg());
 while (!$result100->EOF) {


$cod_practica=strtoupper($result100->fields["cod_practica"]);
$cod_operacion=strtoupper($result100->fields["cod_operacion"]);
$nombre_columna=strtoupper($result100->fields["nombre_columna"]);



?>
          <td><div align="left">
              <?php echo $nombre_columna;?><a href="borra_columna.php?palabra=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&cod_modulo1=<?php print("$cod_modulo");?>&&bandera=<?php print("$bandera");?>&&categoria=<?php print("$categoria");?>&&nombre=<?php print("$nombre");?>" target = "central" class="Estilo18" ><img src="../../imagenes/office//095.ico" alt="Imprimir" border = "0"></a> </td>
          <?php 

$result100->MoveNext();

	}

?>
        </tr>
      </table>
    </div></td>
    </tr>
   
	
	<tr>
	  <td></td>
	  <td width="267"></td>
	  <td></td>
	  <td></td>
  </tr>


<?php 


$result10->MoveNext();

	}

 
$result->MoveNext();
	}


?>
</table>

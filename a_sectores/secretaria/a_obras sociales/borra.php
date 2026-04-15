<table width="800" border="0">
<?php 
global $a;
global $telefono;
global $B;

include ("../../../conexiones/config.inc.php");
$a = $_GET['id'];
$SQL="Delete From datos_os where nro_os = $a";
$db->Execute($SQL);



global $buscador_rapido;



include ("../../../conexiones/config.inc.php");

$B = 1;


if ($palabra == ""){
 $sql="select * from datos_os order by nro_os, localidad_n, denominacion";
} else {
 $sql="select * from datos_os where sigla like '$palabra%' or nro_os like '$palabra%' or denominacion like '%$palabra%' order by localidad_n, denominacion, nro_os";
}
	
$result = $db->Execute($sql);

   if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {
$id=strtoupper($result->fields["nro_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$telefono=strtoupper($result->fields["telefono_n"]);

if (strlen($telefono) == 7){
$telefono = "4".$telefono;
}

if (strlen($telefono) == 6){
$telefono = "4".$telefono;
}
 if ($telefono == 0){$telefono = "-";}



?><tr>
<td width="20"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php print("$id");?></font></div></td>
    <td width="168"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php print("$sigla");?></font></div></td>
    <td width="446"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php print("$denominacion");?></font></div></td>

	<td width="54"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="../../gerencia/ingresar_convenios.php?nro_os=<?php print("$id");?>&&sigla=<?php print("$sigla");?>" target  ="central"><IMG SRC="../../../imagenes/office//035.ico" alt="Ficha" border = "0"></a></font></div></td>
	<td width="54"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="modificar.php?id=<?php print("$id");?>" target  ="central"><IMG SRC="../../../imagenes/office//027.ico" alt="Ficha" border = "0" ></a></font></div></td>
	<td width="49"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="borra.php?id=<?php print("$id");?>" target  ="central"><IMG SRC="../../../imagenes/office//1047.ico" alt="Ficha" border = "0" onclick="return confirm('¿Está seguro de Borrar?');"></a></font></div></td>
	<td width="32"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="ficha.php?id=<?php print("$id");?>" target  ="central"><IMG SRC="../../../imagenes/office//005.ico" alt="Ficha" border = "0" ></a></font></div></td>
</tr>

<?php 
	$cont = $cont + 1;
	$result->MoveNext();
	}

?> <tr bordercolor="#FFFFCC">
  <td colspan="7">Cantidad de Obras Sociales: <?php echo $cont;?></td>
  </tr>
</table>

 





 

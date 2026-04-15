<style type="text/css">
<!--
.Estilo13 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14;
	color: #FFFFFF;
}
.Estilo30 {font-size: 14px}
.Estilo31 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #FFFFFF; }
.Estilo32 {font-family: Arial, Helvetica, sans-serif}
.Estilo33 {font-size: 14}
.Estilo34 {color: #FF0000}
.Estilo35 {font-size: 14; color: #FF0000; }
.Estilo36 {color: #0000CC}
.Estilo38 {font-size: 14; color: #0000CC; }
.Estilo40 {font-family: Arial, Helvetica, sans-serif; color: #0000CC; }
-->
</style>
<?php 
global $mostrar_color;
$mostrar_color = 0;
$anio = date("y");
$mes= date("m") - 1;

include ("../../../conexiones/config_gb.php");
$sql="select * from ordenes where periodo = $mes and ano = $anio  group by lote"; 
$result = $db->Execute($sql);

 


?>

<table width="103%" border="0">
  <tr bgcolor="#000099">

    <td width="39%" height="20" scope="row"><div align="center" class="Estilo13 Estilo30">
      <div align="center">NOMBRE LOTE </div>
    </div>      </td>
    <td width="49%"><div align="center" class="Estilo31 Estilo33">
      <div align="center">OBRA SOCIAL</div>
    </div></td>
	<td width="49%"><div align="center" class="Estilo13">
	  <div align="center">PERIODO</div>
	</div></td>

  </tr>
  
<?php 

if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$lote=strtoupper($result->fields["lote"]);
$nro_os=strtoupper($result->fields["nro_os"]);
if ($lote == ""){
$nombre_lote = "ORDENES GRABADAS SIN LOTE";
}else
	  {
	$nombre_lote = $lote;
	  }

include ("../../../conexiones/config_os.php");
$sql2="select * from datos_os where nro_os like '$nro_os'";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);

?>

<?php if ($lote == ""){?>
<tr bgcolor="#FFFFFF">
    <td height="20" scope="row"><div align="center" class="Estilo33 Estilo36">
      <div align="left"><span class="Estilo32"><?php echo $nombre_lote;?></span></div>
    </div></td>
    <td><div align="center" class="Estilo38"><span class="Estilo32"><?php echo $nro_os." - ".$sigla;?></span></div></td>
    <td><div align="center" class="Estilo40"><?php echo $mes." - ".$anio;?></div></td>
  </tr>
<?php }else{?>
<tr bgcolor="#FFFFFF">
  <td height="20" scope="row"><div align="center" class="Estilo33 Estilo34">
    <div align="left"><span class="Estilo32"><?php echo $nombre_lote;?></span></div>
  </div></td>
  <td><div align="center" class="Estilo35"><span class="Estilo32"><?php echo $nro_os." - ".$sigla;?></span></div></td>
  <td><div align="center" class="Estilo35"><span class="Estilo32"><?php echo $mes." - ".$anio;?></span></div></td>
</tr>
<?php }


$result->MoveNext();

} ?>

</table>

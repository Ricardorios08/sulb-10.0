include ("../../../conexiones/config_or.php");		
 $sql = "SELECT * FROM `detalle`  WHERE  `nro_os` = $nro_os AND `mes` = $mes AND `anio`  LIKE '20$anio' ORDER BY nro_recibo";
$result = $db->Execute($sql);

if (!$result) die("fallo".$db->ErrorMsg());
 while (!$result->EOF) {

 $nro_recibo=$result->fields["nro_recibo"];

include ("../../../conexiones/config_or.php");		
 $sql32= "select * from recibos where nro_recibo like '$nro_recibo'";
$result32 = $db->Execute($sql32);

 $nro_laboratorio=$result32->fields["nro_laboratorio"];
//echo "<br>";


include ("../../../conexiones/config_gb.php");		
$sql1 = "SELECT nro_laboratorio FROM `ordenes`  WHERE  `nro_laboratorio` = $nro_laboratorio AND `periodo` = $mes AND `ano`  LIKE '$anio' AND confirmada = 7 GROUP BY nro_laboratorio ORDER BY nro_laboratorio";
$result2 = $db->Execute($sql1);

$nro_lab_grab=$result2->fields["nro_laboratorio"];




if ($nro_laboratorio != $nro_lab_grab){
	include ("../../../conexiones/config.inc.php");
 $sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";
$result5 = $db->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio." (".$nro_laboratorio.")";
?><tr bgcolor="#E8DCFC">
    <td height="23" colspan="8"><?php echo "Falta grabar el Laboratorio ".$nro_laboratorio. " - ".$nombre_laboratorio;?></td>
  </tr><?php 

$result->MoveNext(); // sdsd
}
else {
$result->MoveNext(); // sdsd
 }
<?php 
include ("../../conexiones/config_gb.php");
$sql7="select * from detalle where cod_grabacion = '$cod_grabacion'";
$result7 = $db->Execute($sql7);

if (!$result7) die("fallo".$db->ErrorMsg());

 while (!$result7->EOF) {

$nro_practi=ucwords($result7->fields["nro_practica"]);

include ("../../conexiones/config_pr.php");
$sql8="select * from practica where cod_practica = '$nro_practi'";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);

//$practica = substr($practica,0,15);


if ($B == 1) {

?>
  <tr bgcolor="#FFFFFF">
    <?php 

			}


?>
    <td><div align="center"><font size="-1"><?php print $nro_practi;?></font></div></td>
    <td><div align="left"> <font size="-1"><?php print $practica;?></font></div></td>
    <td><div align="center"><font size="-1">

		<input name="nro_practica_borrar" type="hidden" value=<?php echo $nro_practi;?>>
		<input name="Alta" type="submit" value="SI" id ="Borra" size = "10" ></font></div></td>
  </tr>
  <?php 
//mandar dos variables en vez de una cod_grabacion mas nro_practica
$result7->MoveNext();

	}


<?php

include ("../../../conexiones/config.inc.php");
$sql="select * from planes_os where nro_os like '$palabra%'";
$result10 = $db->Execute($sql);
$nro_plan=strtoupper($result10->fields["nro_plan"]);

if ($nro_plan != ""){

?>
<table width="800" border="1" cellpadding="0" cellspacing="0">
 <tr>
    <td colspan="8" bgcolor="#FF6600"><div align="center"><font face="Trebuchet MS"><strong>PLANES</strong></font></div></td>
  </tr>
  <tr>
    <td width="21%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"> PLAN </font></div>      <div align="center"></div></td>
    <td width="8%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">COSEGURO</font></div></td>
    <td width="9%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">AUT. COM</font></div></td>
    <td width="9%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">AUT. ESP</font></div></td>
    <td width="9%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">AUT. ALT</font></div></td>
    <td width="4%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">PMO</font></div></td>
    <td width="48%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">TEXTO</font></div></td>
  </tr>



  <?php


 $sql="select * from planes_os where nro_os like '$palabra%'";
$result10 = $db->Execute($sql);

   if (!$result10) die("fallo".$db->ErrorMsg());
  while (!$result10->EOF) {
$nro_os=strtoupper($result10->fields["nro_os"]);




$cod_operacion=$result10->fields["cod_operacion"];
$nro_plan=$result10->fields["nro_plan"];
$nombre_plan=$result10->fields["nombre_plan"];
$reducido_plan=$result10->fields["reducido_plan"];
$coseguro=$result10->fields["coseguro"];
$comunes=$result10->fields["comunes"];
$especiales=$result10->fields["especiales"];
$alta=$result10->fields["alta"];
$pmo=$result10->fields["pmo"];
$texto=$result10->fields["texto"];


?>

  <tr>
    <td bgcolor="#FFFF66"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $nro_plan;?> - <?php echo $nombre_plan;?> - <?php echo $reducido_plan;?></font>      <div align="center"><font color="#000000" size="2" face="Trebuchet MS"></font></div>      <div align="center"><font color="#000000" size="2" face="Trebuchet MS"></font></div></td>
    <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $coseguro;?></font></div></td>
    <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $comunes;?></font></div></td>
    <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $especiales;?></font></div></td>
    <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $alta;?></font></div></td>
    <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $pmo;?></font></div></td>
    <td bgcolor="#FFFF66"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $texto;?></font></td>
  </tr>
  



<?php 


	$result10->MoveNext();
	}



  ?>
</table>

<?php }?>



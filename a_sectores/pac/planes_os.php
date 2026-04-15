<?php

$sql="select * from planes_os where nro_os like '$nro_os'";
$result = $db->Execute($sql);
$nro_plan=strtoupper($result->fields["nro_plan"]);

if ($nro_plan != ""){

?>
<table width="850" border="1" cellpadding="0" cellspacing="0">
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
if ($plan == ""){
 $sql="select * from planes_os where nro_os like '$nro_os'";
  }
  else
	{
 $sql="select * from planes_os where nro_os like '$nro_os' and nro_plan = '$plan' OR nombre_plan = '$plan'";
	}


$result = $db->Execute($sql);

   if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {
$nro_os=strtoupper($result->fields["nro_os"]);




$cod_operacion=$result->fields["cod_operacion"];
$nro_plan=$result->fields["nro_plan"];
$nombre_plan=$result->fields["nombre_plan"];
$reducido_plan=$result->fields["reducido_plan"];
$coseguro=$result->fields["coseguro"];
$comunes=$result->fields["comunes"];
$especiales=$result->fields["especiales"];
$alta=$result->fields["alta"];
$pmo=$result->fields["pmo"];
$texto=$result->fields["texto"];


?>

  <tr>
    <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $nombre_plan;?></font></div>
    <div align="center"><font color="#000000" size="2" face="Trebuchet MS"></font></div>      <div align="center"><font color="#000000" size="2" face="Trebuchet MS"></font></div></td>
    <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $coseguro;?></font></div></td>
    <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $comunes;?></font></div></td>
    <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $especiales;?></font></div></td>
    <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $alta;?></font></div></td>
    <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $pmo;?></font></div></td>
    <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $texto;?></font></div></td>
  </tr>
  



<?php 


	$result->MoveNext();
	}



  ?>
</table>

<?php }?>



<?php

  $sql12="select * from pacientes where nro_paciente = $nro_laboratorio";
$result812 = $db->Execute($sql12);
$nombre_laboratorio=strtoupper($result812->fields["nombre"]);
$coseguro=strtoupper($result812->fields["coseguro"]);
 $plan=strtoupper($result812->fields["plan"]);

if ($nro_os == 1041){
$plan = substr($plan,1,10);
}


 $sql="select * from planes_os where nro_os like '$nro_os'";
$result8 = $db->Execute($sql);
$nro_plan=strtoupper($result8->fields["nro_plan"]);
$nombre_plan=$result8->fields["nombre_plan"];
$reducido_plan=$result8->fields["reducido_plan"];



?>
<table width="850" border="1" cellpadding="0" cellspacing="0">
 <tr>
    <td colspan="8" bgcolor="#FF6600"><div align="center"><font face="Trebuchet MS"><strong>PLAN: <?php echo $nombre_plan;?> </strong></font></div></td>
  </tr>

</table>





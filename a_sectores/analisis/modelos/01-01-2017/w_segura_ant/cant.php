<?php
 $sql1="SELECT * FROM convenio_practica_complejo where cod_practica = $nro_practica";
$result13 = $db->Execute($sql1);
$cant_renglones=$result13->fields["cantidad_renglones"];

?>
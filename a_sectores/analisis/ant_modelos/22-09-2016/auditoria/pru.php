<?php  include ("../../conexiones/config_os.php");
echo $sql="select * from convenio_practica where cod_practica = 998 and nro_os = 2175";
$result1 = $db->Execute($sq1);
echo "sfds".$ho_998=$result->fields["honorarios"];

echo $ga_998=$result->fields["gastos"];
echo $va_998=$result->fields["valor"];

?>
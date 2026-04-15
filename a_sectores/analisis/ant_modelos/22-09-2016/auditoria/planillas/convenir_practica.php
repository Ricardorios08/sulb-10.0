<?php 

include ("../../../conexiones/config_os.php");

$nro_os=$_POST["nro_os"];
$cod_practica=$_POST["cod_practica"];

?>



<?php 
$sql="select * from datos_os where nro_os = $nro_os";
$result = $db->Execute($sql);

$sigla=strtoupper($result->fields["sigla"]);

$sql1="select * from arancel where nro_os = $nro_os";
$result1 = $db->Execute($sql1);

$modalidad=$result1->fields["modalidad"];



//------------------------------------------------------------------------
switch ($modalidad)
				{
		case "1": //honorarios
				{
//										ECHO "DFDDSFSFSFDSFDFDSFSDFSDFSDF";
				include ("../convenidas/honorarios.php");
		break;
				}

//------------------------------------------------------------------------
				
		case "2": //gastos y honorarios
				{
//					ECHO "DFDDSFSFSFDSFD";
				include ("../convenidas/gastos_honorarios.php");
		break;
				}

//------------------------------------------------------------------------
				
		case "3": //valor
				{

echo "dsf";
	include ("../convenidas/valor.php");


		break;
				}
				}
//------------------------------------------------------------------------
<?php 
if ($buscar_por == 5){
		include ("practicas_convenidas_modif.php");
exit;
	}
?>
<a href="..//auditoria/imprimir.php?nro_os=<?php print("$nro_os");?>&&buscar_por=5&&a_imp=SI"><IMG SRC="../../imagenes/botones//btn_imprimir.gif" alt="Imprimir" border = "0"></a>
<a href="..//auditoria/imprimir.php?nro_os=<?php print("$nro_os");?>&&buscar_por=5&&a_imp=NO"><IMG SRC="../../imagenes/botones//btn_exportar.gif" alt="Exportar" border = "0"></a>
<br>

<?php 

include ("../../conexiones/config_os.php");
?>
<font color="#FF0000"><strong>
Nro_os:  
<font color="#000000">
<?php 
echo $nro_os;
?>
</strong></font>
<br>
<font color="#FF0000"><strong>
Nombre de OS: 
</strong></font>
<font color="#000000"><strong>
<?php 
	
include ("../facturacion/convenio.php");

$buscar_por = "1";
$nro_os = $nro_os;

	$sql1="select * from datos_os  where  nro_os like '$nro_os'";
	$result = $db->Execute($sql1);


$sigla =strtoupper($result->fields["sigla"]);
echo $sigla;
echo "<br>";
echo "Unidad de Gastos: (".$vug1.") = ".number_format($vug,3);
echo "<br>";
echo "Unidad de Bioquimicos: (".$vuh1.") = ".number_format($vuh,3);

include ("../../conexiones/config_pr.php");




switch ($buscar_por){
	case "1": //comunes
	{
include ("caso1.php");
break;
	}

	case "2":{//practicas especiales
include ("caso1.php");
break;
		break;
	}

	case "3": {//alta complejidad
	include ("caso3.php");
break;
		break;
	}

	case "4": //todas
	{
	include ("caso4.php");
break;
		break;
	}

	case "5": //todas
	{
	include ("caso5.php");
break;
		break;
	}

}


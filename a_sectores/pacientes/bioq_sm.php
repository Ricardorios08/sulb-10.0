<?php  include("adodb.inc.php");
 $db = NewADOConnection('mysql');
 $db->Connect("localhost", "$menu", "$auxiliar", "bioquimica");

$B = 1;
$palabra=$_POST["busca"];
$busqueda = "BIOQUIMICO";

switch ($busqueda)
	{

	case "BIOQUIMICO":
		{
				if ($palabra==""){
$sql="select * from datos_personales order by matricula asc ";
				}
				else
			{
$sql="select * from datos_personales where apellido like '%$palabra%' or  matricula like '%$palabra%'  order by matricula asc ";
			}
	break;
		}

			
	case "VITALICIO":
		{
		if ($palabra==""){
$sql="select * from datos_personales where vitalicio = 'SI'";
		}
		else

			{
		$sql="select * from datos_personales where vitalicio = 'SI' and matricula like '%$palabra%' or vitalicio = 'SI' and apellido like '%$palabra%' or vitalicio = 'SI' and nombre like '%$palabra%' or vitalicio = 'SI' and telefono like '%$palabra%' order by localidad asc ";
			}
	

	break;
		}
	}

	$result = $db->Execute($sql);


?>
<table width="600" border="0">
  <tr bgcolor="#C1F2FF">
    <td colspan="3"><div align="center"><font size="+3"><font color="#000000" size="+1" face="Arial, Helvetica, sans-serif"><em>LISTADO DE BIOQUIMICOS</em> </font></font></div></td>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td width="45"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">MATRIC,</font></div></td>
    <td width="434"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">NOMBRE BIOQUIMICO </font></div></td>
    <td width="99"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">TELEFONO</font></div></td>
  </tr>


<?php 

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
 $id=$result->fields["matricula"];

	$sql1="select * from datos_estudio where matricula = '$id'";
	$result1 = $db->Execute($sql1);

$matricula=$result1->fields["matricula"];


$apellido=strtoupper($result->fields["apellido"]);
$nombre=strtoupper($result->fields["nombre"]);

$domicilio=strtoupper($result->fields["domicilio"]); 
$nro_domicilio=$result->fields["nro_domicilio"];
$localidad=strtoupper($result->fields["localidad"]);
$telefono=$result->fields["telefono"];


?>


  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$id");?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$apellido"."  ");?><?php print("$nombre");?></font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$telefono");?></font></div></td>
  </tr>


<?php 


	

$result->MoveNext();
	}

?>
</table>

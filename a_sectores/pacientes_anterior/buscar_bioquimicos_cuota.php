<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">
<?php 

include("adodb.inc.php");
 $db = NewADOConnection('mysql');
 $db->Connect("localhost", "root", "", "bioquimica");


global $buscador_rapido;
$buscador_rapido=$_POST["buscador_rapido"];

 


$B = 1;
$palabra=$_POST["busca"];
$busqueda = "BIOQUIMICO";


				if ($palabra==""){
$sql="select * from datos_personales where matricula < 90000 order by matricula asc ";
				}
				else
			{
$sql="select * from datos_personales where apellido like '%$palabra%' or  matricula like '%$palabra%'  and matricula < 90000 order by matricula asc ";
			}
	
				


	$result = $db->Execute($sql);


?>
<table width="750" border="1" cellpadding="1" cellspacing="0">
  <tr bgcolor="#000099">
    <td colspan="8"><div align="center"><font size="+3"><font color="#FFFFFF" size="+1" face="Arial, Helvetica, sans-serif"><em>LISTADO DE BIOQUIMICOS PARA DESCONTAR CUOTA SOCIAL</em> </font></font></div></td>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td width="8%"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">MATRIC</font></div></td>
    <td width="46%"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">NOMBRE BIOQUIMICO </font></div></td>
    <td width="18%"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">FACTURANTE</font></div></td>
    <td width="11%"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">A DESCONTAR </font></div></td>
    <td width="9%"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">ESTADO</font></div></td>

    <td width="8%"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">MODIFICAR</font></div></td>

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
$estado=strtoupper($result->fields["estado"]);
$facturante=$result->fields["facturante"];
$cuenta_descontar_cuota=$result->fields["cuenta_descontar_cuota"];


/*if ($cuenta_descontar_cuota == 0){
echo $sql3 = "UPDATE `datos_personales` SET `cuenta_descontar_cuota` = '$id' WHERE `matricula` = '$id'";
	$result3 = $db->Execute($sql3);
	echo "<br>";
}
*/
/*if ($estado == ""){
echo $sql3 = "UPDATE `datos_personales` SET `estado` = 'ACTIVO' WHERE `matricula` = '$id'";
	$result3 = $db->Execute($sql3);
	echo "<br>";
}*/


	$sql2="select * from facturante where nro_laboratorio = '$id'";
	$result2 = $db->Execute($sql2);

$facturante=$result2->fields["facturante"];

$sql2="select * from datos_laboratorio where nro_laboratorio = '$id'";
	$result2 = $db->Execute($sql2);

$nro_laboratorio=$result2->fields["nro_laboratorio"];

if ($nro_laboratorio == ""){
	$facturante = "SIN CUENTA ABM";
}



if ($telefono == 0){
$telefono = "-";
}
if ($estado == ""){
$estado = "-";
}

?>

  
  
  
  <tr>
       <td><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$id");?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$apellido"." ");?><?php print("$nombre");?></font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$facturante");?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cuenta_descontar_cuota");?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$estado");?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="a_bioquimicos\modificar.php?id=<?php print("$id");?>" target = "central"><IMG SRC="../../imagenes/office//027.ico" alt="Modificar" border = "0"></a></font></div></td>

  </tr>

<?php 


	

$result->MoveNext();
	}

?>
</table>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">


<?php 
//global $buscador_rapido;
$buscador_rapido=$_POST["buscador_rapido"];
echo $buscador_rapido;
 include("adodb.inc.php");
 $db = NewADOConnection('mysql');
 $db->Connect("localhost", "root", "", "bioquimica");

$B = 1;
$palabra=$_POST["busca"];

$sql="select * from datos_personales where apellido like '%$palabra%' or nombre like '%$palabra%' or matricula like '%$palabra%' or telefono like '%$palabra%' order by apellido asc ";

	$result = $db->Execute($sql);
?>
<table width="83%" height="58" border="0">
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="11"><div align="center"><strong><font color="#FFFFCC">LISTADO DE BIOQUIMICOS </font></strong></div></td>
  </tr>
  <tr bordercolor="#FFFFCC" bgcolor="#993300"> 
<?php 

switch ($buscador_rapido)
{
	case "1"://mostrar sin modificar
	{ 
		?>
	<td width="5%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">MATRICULA</font></strong></font></div></td>
    <td width="11%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">APELLIDO</font></strong></font></div></td>
    <td width="10%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">NOMBRE</font></strong></font></div></td>
    
    <td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">TELEFONO</font></strong></font></div></td>
  	
<?php 




	break;
}


	case "2": //mostrar con modificar
	{
		?>   
<td width="5%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">MATRICULA</font></strong></font></div></td>
<td width="11%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">APELLIDO</font></strong></font></div></td>
<td width="10%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">NOMBRE</font></strong></font></div></td>
<td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">TELEFONO</font></strong></font></div></td>
<td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">MODIFICAR </font></strong></font></div></td>
<td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">ELIMINAR </font></strong></font></div></td>
<td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">FICHA </font></strong></font></div></td>
</tr>	
<?php 


	break;
}	

}
 
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

	if ($B == 1) {

?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"><?php 
$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?><tr bordercolor="#FFFFCC" bgcolor="#FFFFCC"> <?php 

			}





switch ($buscador_rapido)
{
	case "2": //mostrar sin modificar
	{
		?>
     <td><font size="2"><?php print("$id");?></font></td>
	 <td><font size="2"><?php print("$apellido");?></font></td>
     <td><font size="2"><?php print("$nombre");?></font></td>

    
    <td><font size="2"><?php print("$telefono");?></font></td>
	    <td><div align="center"><font size="2"><a href="modificar.php?id=<?php print("$id");?>" target = "central">[Modificar]</div></td>
		<td><div align="center"><font size="2">
		
		<a href="borra.php?id=<?php print("$id");?>">[Eliminar]</a>
		</font></div></td><td><div align="center"><font size="2">
		<a href="ficha.php?id=<?php print("$id");?>">[Ficha]</div></td>

  </tr>
	  
    

  <?php 



break;
}


case "1":
	  {
	?>
	<td><font size="2"><?php print("$id");?></font></td>
	<td><font size="2"><?php print("$apellido");?></font></td>
    <td><font size="2"><?php print("$nombre");?></font></td>
    
    
    <td><font size="2"><?php print("$telefono");?></font></td>
	  
  </tr>
	  
	<?php 

	break;
	  }
	  }

$result->MoveNext();
	}

?>
</table>

</body>


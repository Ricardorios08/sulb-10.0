<?php 
$buscador_rapido;
include ("../conexiones/config_pr.php");
$hoy = date("d-m-y");
?>
<font color="#FF0000"><strong>
</strong></font>
<table width="500" border="0">
  <tr>
    <td bgcolor="#E8DCFC" scope="col"><div align="center"><font face="Arial, Helvetica, sans-serif">Comparaci&oacute;n de una practica en todas las obras Sociales. <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr>
    <td width="344" bgcolor="#E6E6E6" scope="col"><div align="left"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif">N&ordm;<strong>
        <font color="#00CC00">
        <font color="#FF0000">
        <?php 
echo $palabra;
?>
        </font></font><font color="#FF0000"> </font></strong>-  Practica: </font> <font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"> <strong>
        <?php 


	$sql1="select * from convenio_practica  where cod_practica like '$palabra' order by cod_practica asc";
	$result = $db->Execute($sql1);


$practica =$result->fields["practica"];
echo $practica;


include ("../conexiones/config_pr.php");



?> 
      </strong></font></div></td>
  </tr>
</table>
<font color="#FF0000"><strong>
</strong></font>
<table width="83%" height="58" border="0">
  <tr bordercolor="#0066FF" bgcolor="#E1F2EF"> 

    <td width="75%"><div align="center"><font color="#333333" face="Arial, Helvetica, sans-serif"><font size="2">Obra Social</font></font></div></td>
    <td width="25%"><div align="center"><font color="#333333" face="Arial, Helvetica, sans-serif"><font size="2">Valor</font></font></div></td>
	
<?php if ($buscador_rapido =! 2){?>
  </tr>
  
  <?php 
}

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

include ("../conexiones/config_pr.php");
	




$toma=$result->fields["toma"];
$urgencia=$result->fields["urgencia"];
$material_descartable=$result->fields["material_descartable"];

$autorizar=$result->fields["autorizada"];
$nro_os=$result->fields["nro_os"];


$categoria=strtoupper($result->fields["categoria"]);


$honorarios=$result->fields["honorarios"];
$gastos=$result->fields["gastos"];
$valor=$result->fields["valor"];



include ("../conexiones/config_os.php");
$sql3="select * from datos_os  where nro_os = '$nro_os'";
$result3 = $db->Execute($sql3);
$sigla=$result3->fields["sigla"];
$denominacion=$result3->fields["denominacion"];





	if ($B == 1) {

?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"><?php 
$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?><tr bordercolor="#FFFFCC" bgcolor="#E6E6E6"> <?php 

			}

?>

    <td><div align="left"><font size="2">(<?php print("$nro_os");?>) - </font><font size="2"><?php print("$denominacion");?></font></div>      </td>
    <td><div align="center"><font color="#0000FF" size="2"><strong><?php echo $valor;?></strong></font></div></td>
    

    <?php 


	   



$result->MoveNext();
	}

?>
</table>
  
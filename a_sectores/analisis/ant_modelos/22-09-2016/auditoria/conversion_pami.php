<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">
<?php 

include ("../conexiones/config.inc.php");





$sql="select * from conv_pami  order by nro_practica_damsu";
$result = $db_fa->Execute($sql);

?>


<table width="665" height="194" border="0">
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22" colspan="3"><div align="center">ASOCIACION BIOQUIMICA DE MENDOZA </div></td>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22" colspan="3"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">TABLA DE CONVERSION ABM - NBU</font></strong> </div></td>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22" colspan="3"><hr noshade></td>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF"> 

    <td width="72%" height="22"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">PRACTICA</font></div></td>
    <td width="16%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">ACTUAL</font></div></td>
	<td width="12%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">NBU</font></div></td>
	  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22"><hr noshade></td>
    <td><hr noshade></td>
    <td><hr noshade></td>

<?php 
  if (!$result) die("fallo".$db_fa->ErrorMsg());
  while (!$result->EOF) {

$cont1 = $cont1 + 1;	
$cod_practica=strtoupper($result->fields["nro_practica_damsu"]);
$cod_interno=strtoupper($result->fields["codigo_interno"]);


$sql1="select * from convenio_practica  where nro_os = 99996 and cod_practica = $cod_practica";
$result1 = $db_pr->Execute($sql1);
$practica=$result1->fields["practica"];

if ($practica == ""){
	$practica = "*** PRACTICA INEXISTENTE EN NOMENCLADOR ACTUAL ***";
}

?>
  
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22"><div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$practica");?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$cod_practica");?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><?php print("$cod_interno");?></font></div></td>  <?php 
	

$cont = $cont + 1;

IF ($cont1 == 36){
?><tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22" colspan="3"><div align="center">ASOCIACION BIOQUIMICA DE MENDOZA </div></td>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22" colspan="3"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">TABLA DE CONVERSION ABM - NBU</font></strong> </div></td>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22" colspan="3"><hr noshade></td>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF"> 

    <td width="72%" height="22"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">PRACTICA</font></div></td>
    <td width="16%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">ACTUAL</font></div></td>
	<td width="12%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">NBU</font></div></td>
	  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22"><hr noshade></td>
    <td><hr noshade></td>
    <td><hr noshade></td><?php 
		$cont1 = 0;
}

$result->MoveNext();
	}

?>

  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22"><hr noshade></td>
    <td><hr noshade></td>
    <td><hr noshade></td>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td height="22" colspan="3"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>TOTAL DE PRACTICAS A CONVERTIR: <?php print("$cont");?></strong></font></div></td>
</table>

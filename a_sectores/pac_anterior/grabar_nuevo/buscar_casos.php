<?php 
include ("../../../conexiones/config.inc.php");


$sql="select * from casos order by cod_caso";
$result = $db->Execute($sql);


?>
<link href="../../../drivers/css/titulos.css" rel="stylesheet" type="text/css">


<style type="text/css">
<!--
.Estilo14 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
<table width="825" border="1" cellpadding="0" cellspacing="0" id="pract">
<!--DWLayoutTable-->

<tr bordercolor="#0066FF" bgcolor="#0033FF">
  <td height="31" colspan="4" bgcolor="#FFFF00"><div align="center">CASOS ABM </div></td>
  <tr bordercolor="#0066FF" bgcolor="#0033FF"> 

 	

	
	<?php 




  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {


$pra = $practica1;


 $cod_caso=$result->fields["cod_caso"];
$practica1=$result->fields["practica1"];
$practica11=$result->fields["practica1"];
$practica2=$result->fields["practica2"];
$nombre_practica1=$result->fields["nombre1"];
$nombre_practica2=$result->fields["nombre2"];


 if ($pra == $practica1){
 $practica11 = "";
 $nombre_practica1 = "";
 
 }

  if ($pra != $practica1){?>
 <tr bordercolor="#0066FF" bgcolor="#0033FF"> 

<td width="70" bgcolor="#B8B8B8"><div align="center" class="Estilo14">Cod</div></td>
  <td width="430" bgcolor="#B8B8B8"><div align="center" class="Estilo14">Si carga practica</div></td>
    <td width="70" bgcolor="#B8B8B8"><div align="center" class="Estilo14">Cod.</div></td>
    <td width="430" bgcolor="#B8B8B8"><div align="center" class="Estilo14">No puede cargar practica</div></td>
<?php
  }

?>  <tr>
    <td bgcolor="#FFFFFF"><div align="center"><?php echo $practica11;?></div></td>
    <td bgcolor="#FFFFFF"><?php echo $nombre_practica1;?></td>
    <td bgcolor="#FFFFFF"><div align="center"><?php echo $practica2;?></div></td>
    <td bgcolor="#FFFFFF"><div align="left"><?php echo $nombre_practica2;?></div></td>


<?php 





$result->MoveNext();
	}

?>



</table>

<?php exit;?>




<script language="javascript">
function on_load()
{
document.getElementById("mega").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "mega":
				document.getElementById("manlab").focus();
				break;
				
				


				
		}
		return false;
	}
	return true;
}


</script>

<style type="text/css">
<!--
.Estilo25 {font-family: "Trebuchet MS"}
-->
</style>
<BODY onload = "on_load()">

<?php 

include ("../../conexiones/config.inc.php");


$cod_operacion = $_REQUEST['cod_operacion'];




$sql="select * from tabla_conversion where cod_operacion = $cod_operacion";
$result = $db->Execute($sql);
	
 $nbu=$result->fields["nbu"];
 $mega=strtoupper($result->fields["mega"]);
  $manlab=strtoupper($result->fields["manlab"]);
    $cod_operacion=strtoupper($result->fields["cod_operacion"]);

 $sql11="select * from convenio_practica where cod_practica =  $nbu";
$result11 = $db->Execute($sql11);
$nombre_practica=strtoupper($result11->fields["practica"]);

?>

<form action="modificar.php" method="post">
<table width="850" border="0" cellspacing="0">
    <!--DWLayoutTable-->
    
    <tr align="center" bordercolor="#FFFFFF">
      <td height="24" colspan="3" bgcolor="#999999"><font color="#000000" face="Arial, Helvetica, sans-serif">MODIFICAR CONVERSION </font></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td width="362" height="24" bgcolor="#EDEDED">
        <div align="right" class="Estilo25">
          <div align="center"><font color="#000000" size="2">NBU</font>          </div>
      </div></td>
      <td colspan="2" bgcolor="#EDEDED"><div align="left">
          <font color="#000000" size="2">
      <?php echo $nbu;?> - <?php echo $nombre_practica;?>      </font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED">
      <div align="center"><font color="#000000" size="2">MEGA</font></div></td>
      <td colspan="2" bgcolor="#EDEDED"><font color="#000000" size="2">
        <input name="mega" type="text" id="mega" onKeyPress="return verif_caracter(this,event)" size="10" maxlength="8" value = "<?php echo $mega;?>">
      </font></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#EDEDED"><div align="right" class="Estilo25">
        <div align="center"><font color="#000000" size="2">MANLAB</font></div>
      </div></td>
      <td colspan="2" bgcolor="#EDEDED"><font color="#000000" size="2">
        <input name="manlab" type="text" id="manlab"   size="10" maxlength="8" value = "<?php echo $manlab;?>">
		     <input name="cod_operacion" type="hidden" id="manlab"   size="10" maxlength="8" value = "<?php echo $cod_operacion;?>">
        <input type="Submit" name="Submit" id ="GUARDAR" value="MODIFICAR">
      </font></td>
  </tr>
    

  <tr>
    <td height="2"></td>
    <td width="0"></td>
    <td width="482"></td>
  </tr>  
</table>
</FORM>
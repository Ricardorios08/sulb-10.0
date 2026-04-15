<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />


<script language="javascript">
function on_load()
{
document.getElementById("nbu").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "nbu":
				document.getElementById("mega").focus();
				break;
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


<form action="guardar.php" method="post">
<table width="800" border="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td height="37" colspan="3"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">AGREGAR CONVERSION </font></div></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td width="224" height="24">
        <div align="right" class="Estilo25">
          <div align="center"><font color="#000000" size="2">NBU</font>          </div>
      </div></td>
      <td colspan="2"><div align="left">
          <font color="#000000" size="2">
          <input name="nbu" type="text" id="nbu" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" value = "<?php echo $nbu;?>">
      </font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24">
        <div align="center"><font color="#000000" size="2">MEGA</font></div></td>
      <td colspan="2"><font color="#000000" size="2">
        <input name="mega" type="text" id="mega" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" value = "<?php echo $mega;?>">
      </font></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24"><div align="right" class="Estilo25">
        <div align="center"><font color="#000000" size="2">MANLAB</font></div>
      </div></td>
      <td colspan="2"><font color="#000000" size="2">
        <input name="manlab" type="text" id="manlab"   size="8" maxlength="8" value = "<?php echo $manlab;?>">
      </font></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" colspan="3"><input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR CONVERSION"></td>
    </tr>

  <tr>
    <td height="2"></td>
    <td width="88"></td>
    <td width="482"></td>
  </tr>  
</table>
</FORM>
<script language="javascript">
function on_load()
{
document.getElementById("matricula").focus();
}

function on_load1()
{
document.getElementById("compania").focus();
}

function pagina2()
{
document.getElementById("matricula").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "matricula":
				document.getElementById("compania").focus();
				
				break;
				case "compania":
				document.getElementById("vigencia").focus();
				break;
				case "vigencia":
				document.getElementById("vencimiento").focus();
				break;
				
				
				



				
		}
		return false;
	}
	return true;
}


</script>

<?php 
	if ($matricula != ""){
?><BODY onload = "on_load1()"><?php }
else{
?><BODY onload = "on_load()"><?php }?>

<form action="guardar_seguro.php" method="post">
<table width="103%" border="0">
    <!--DWLayoutTable-->
    <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td height="29" colspan="2" align="center"><div align="center"><font color="#FFFFCC" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000000">SEGURO MALA PRAXIS</font>      </strong></font></div>        </td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td width="29%">
        <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">1. MATRICULA</font></div></td>
      <td width="71%">
          <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
        <?php if ($matricula != ""){
?> <input type="text" name="matricula" id="matricula" onKeyPress="return verif_caracter(this,event)" size = "15" value = "<?php echo $matricula;?>">
<?php }else{
?> <input type="text" name="matricula" id="matricula" onKeyPress="return verif_caracter(this,event)" size = "15"><?php }?>
          </font></div></td>
  </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="24">
        <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">2. Compa&ntilde;ia </font></div></td>
      <td>        <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
        <input type="text" name="compania" id="compania"  size="25"onKeyPress="return verif_caracter(this,event)">      
      </font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="24"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">3. Vigencia</font></div></td>
      <td>        <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
        <input type="text" name="vigencia" id="vigencia" size="10"onKeyPress="return verif_caracter(this,event)">      
      </font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="24"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">4. Vencimiento </font></div></td>
      <td>         <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
        <input type="text" name="vencimiento"  id="vencimiento"  size="10" onKeyPress="return verif_caracter(this,event)">
      </font></div></td>
    </tr>
    <input type="hidden" name="bandera" value = "<?php echo $bandera;?>">
	 <input type="hidden" name="facturante" value = "<?php echo $facturante;?>">


    <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
      <td height="24" colspan="2" bgcolor="#E6E6E6"><div align="center"><font color="#FFFFCC" size="2" face="Arial, Helvetica, sans-serif"><strong>
          <input type="Submit" name="Submit342" value="GUARDAR SEGURO MALA PRAXIS" target = "arriba">
      </strong></font></div></td>
    </tr>
</table>




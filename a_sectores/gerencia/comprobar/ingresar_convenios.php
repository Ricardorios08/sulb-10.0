<script language="javascript">


function on_load()
{
document.getElementById("nro_os").focus();
}



</script>

<BODY onload = "on_load()">

<form action="convenios.php" method="post">
  <table width="58%"  border="0">
    <tr bgcolor="#003399">
      <td height="35" colspan="4"><div align="center"><font color="#FFFFFF"><strong>CONVENIO PARA OBRAS SOCIALES </strong></font></div></td>
    </tr>
    <tr bgcolor="#E6E6E6">
      <td width="135"><div align="right"><font color="#000099"><strong> OBRA SOCIAL: </strong> </font>
          <font color="#000099">          </font><font color="#000099">
          </font></div></td>
      <td colspan="2"><div align="center"><font color="#000099">
          <input type="text" name="nro_os" id="nro_os"  size = "6" tabindex="1" onKeyPress="return verif_caracter(this,event)">
        </font><font color="#000099">
      </font></div></td>
      <td width="142"><div align="center"><font color="#000099">
          <input type="Submit" name="Submit" value="Aceptar" target = "arriba" >
      </font></div></td>
    </tr>
  </table>
  <font color="#000099">  </font>
</form>

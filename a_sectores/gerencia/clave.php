<BODY background="../../IMAGENES/IZQUIERDA.PNG">
<script LANGUAGE="JavaScript">
function multicarga(documento1,documento2)
{
parent.izquierda.location.href=documento1;
parent.central.location.href=documento2;
}
</script>

<FORM ACTION="confirmar_clave.php" method="post" TARGET = "izquierda">

  <div align="left"><font size="1"> </font>
  </div>
  <table width="14%" height="108" border="0">
    <tr bgcolor="#F2FACB">
      <td height="25" colspan="2" valign="bottom" bgcolor="#000099"><div align="center"><font size="1"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif">INGRESE LA CONTRASE&Ntilde;A PARA PODER REALIZAR ESTA OPERACION </font></font></div></td>
    </tr>
    <tr bgcolor="#E1F2EF">
      <td height="25" valign="bottom" bgcolor="#E1F2EF"><div align="right" class="Estilo15 Estilo17">
        <div align="center"><strong><font size="1"><font color="#FF0000" face="Arial, Helvetica, sans-serif"><span class="Estilo4">USUARIO</span></font></font></strong></div>
      </div></td>
      <td valign="bottom"><font size="1">
        <input type="text" name="usuario" size = "5">
      </font></td>
    </tr>
    <tr bgcolor="#E1F2EF">
      <td width="28%" height="24"><div align="right" class="Estilo18">
        <div align="center"><font size="1"><font color="#FF0000" face="Arial, Helvetica, sans-serif"><strong><span class="Estilo16">CONTRASE&Ntilde;A</span></strong></font></font></div>
      </div></td>
      <td width="30%">
        <div align="left">
          <font size="1">
          <input type="password" name="password" size = "5">
      </font></div></td>
    </tr>
    <tr bgcolor="#E6E6E6">
      <td height="24" colspan="2">
        <div align="center">
          <input type="Submit" name="bLogin" value="Aceptar">
      </div></td>
    </tr>
  </table>
  <table width="140" border="0">
    <tr>
      <td width="140" bgcolor="#000099"><div align="center"><font color="#FFFFFF"><strong>IR A....</strong></font> </div></td>
    </tr>
 <!--    <tr>
      <td><div align="center"><A HREF="javascript:multicarga('../../validar/admin.php', '../../validar/cuadros.htm')">Principal</A></div></td>
    </tr> -->
    <tr>
      <td>
        <div align="center"><font color="#0000FF"><a href="../../index.html" target ="_top".>Salir</a></font></div></td>
    </tr>
  </table>
</form>
</body>
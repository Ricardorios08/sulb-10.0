<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />
<script language="javascript">


function on_load()
{
document.getElementById("nro_os").focus();
}



</script>

<style type="text/css">
<!--
.Estilo25 {
	color: #000000;
	font-weight: bold;
}
-->
</style>
<BODY onload = "on_load()">


<?php 
$nro_os = $_REQUEST['nro_os'];
$sigla= $_REQUEST['sigla'];
?>
<form action="convenios.php" method="post">
  <table width="850"  border="0">
    <tr>
      <td height="35" colspan="2"><div align="center"><font color="#FFFFFF"><strong><img src="../../imagenes/convenio.jpg" width="846" height="35"></strong></font></div></td>
    </tr>
    <tr>
      <td width="414"><div align="right"><span class="Estilo25"> OBRA SOCIAL:  </span>
          <font color="#000099">          </font><font color="#000099">
          </font></div></td>
      <td width="428"><div align="left"><font color="#000099">
          <input type="text" name="nro_os" id="nro_os"  size = "6" tabindex="1" value = "<?php echo $nro_os?>" onKeyPress="return verif_caracter(this,event)">
          <?php echo $sigla;?>  <input type="Submit" name="Submit" value="Aceptar" target = "arriba" > 
</font><font color="#000099">
        </font></div>        <div align="center"><font color="#000099">
      </font></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">Ingrese el n&uacute;mero asignado de la obra social para cambiar las unidades bioquimicas. </div></td>
    </tr>
  </table>
  <font color="#000099">  </font>
</form>

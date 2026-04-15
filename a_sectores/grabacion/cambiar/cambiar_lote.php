<script language="javascript">
function on_load()

{
document.getElementById("nro_os").focus();
}



</script>

<style type="text/css">
<!--
.Estilo3 {font-family: Arial, Helvetica, sans-serif}
.Estilo4 {font-size: 10px}
.Estilo10 {
	color: #009900;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo32 {color: #FFFFFF}
.Estilo33 {font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; }
.Estilo35 {font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; font-weight: bold; }
.Estilo36 {
	color: #FF0000;
	font-style: italic;
	font-size: 12px;
}
.Estilo38 {color: #FF0000; font-style: italic; font-family: "Times New Roman", Times, serif; }
.Estilo39 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo40 {font-size: 12px}
-->
</style>


<BODY onload = "on_load ()" >
<form action ="lote.php" method="post">
  <div align="left"></div>
  <table width="103%" border="0">
    <tr bgcolor="#000099">
      <td height="29" colspan="2"><div align="center"><span class="Estilo35">CAMBIAR LOTE DE ORDENES</span><br>
      </div></td>
    </tr>
    <tr bgcolor="#DAFAFC" >
      <td bgcolor="#000099" class="Estilo3"><div align="right"><span class="Estilo3 Estilo10 Estilo32">A&ntilde;o</span></div></td>
      <td bgcolor="#E1F2EF" class="Estilo4"><span class="Estilo3">
        <input name="anio" type="text" id="anio" size ="4">
      </span></td>
    </tr>

    <tr bgcolor="#DAFAFC" >
      <td bgcolor="#000099" class="Estilo3"><div align="right"><span class="Estilo3 Estilo10 Estilo32">Mes</span></div></td>
      <td bgcolor="#E1F2EF" class="Estilo4"><span class="Estilo3">
        <input name="mes" type="text" id="anio2" size ="4">
      </span></td>
    </tr>
    <tr bgcolor="#DAFAFC" >
      <td bgcolor="#000099" class="Estilo3"><div align="right" class="Estilo32" >N&ordm; Obra Social </div></td>
      <td bgcolor="#E1F2EF" class="Estilo4"><input name="nro_os" type="text" id="nro_os"  size ="6"></td>
    </tr>
    <tr bgcolor="#DAFAFC" >
      <td width="276" bgcolor="#000099"><div align="right" class="Estilo33">Lote Actual </div></td>
      <td bgcolor="#E1F2EF" class="Estilo4"><span class="Estilo3">
        <input type="text" name="lote" id= "nro_laboratorio" size ="6">
      </span></td>
    </tr>
		    <tr bgcolor="#DAFAFC">
    <td bgcolor="#000099"><div align="right" class="Estilo14 Estilo3 Estilo32">Lote a cambiar : </div></td>
    <td bgcolor="#E1F2EF">      <span class="Estilo4"><span class="Estilo3">
      <input type="text" name="lote_nuevo" id= "nro_laboratorio_nuevo" size ="6">
      <input name="boton" type="submit" value="Cambiar">
      </span></span></td>
  </tr>
  </table>
</form>



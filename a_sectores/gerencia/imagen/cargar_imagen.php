<style type="text/css">
<!--
.Estilo8 {font-family: Arial, Helvetica, sans-serif}
.Estilo9 {
	font-size: 12px;
	font-family: "Trebuchet MS";
}
-->
</style>
<form action="subir.php" method="POST" enctype="multipart/form-data">
	<label for="imagen"></label>

<table width="850" border="0" cellpadding="0">
  <tr>
    <td height="42" bgcolor="#FFFF99"><div align="center"><span class="Estilo9">DIMENSIONES DEL LOGO: Ancho 564 Px X Alto 382 Px </span> </div></td>
    <td bgcolor="#FFFF99"><div align="center"><span class="Estilo9">DIMENSIONES DE LA FIRMA: Ancho 370 Px X Alto 546 Px</span> </div></td>
  </tr>
  
  <tr>
    <td bgcolor="#ECE4BB"><div align="center" class="Estilo8">A</div></td>
    <td bgcolor="#DECEC7"><div align="center" class="Estilo8">B</div></td>
  </tr>
  <tr>
    <td width="495" bgcolor="#ECE4BB"><span class="Estilo8">LOGO
        <label for="imagen"></label>
      <input type="file" name="imagen" id="imagen" />
    </span></td>
    <td width="495" bgcolor="#DECEC7"><span class="Estilo8">LOGO
        <label for="imagen"></label>
      <input type="file" name="imagen_b" id="imagen_b" />
    </span></td>
  </tr>
  <tr>
    <td bgcolor="#ECE4BB"><span class="Estilo8">FIRMA  
        <label for="label"></label>
      <input type="file" name="firma" id="label" />
    </span></td>
    <td bgcolor="#DECEC7"><span class="Estilo8">FIRMA
        <label for="label"></label>
      <input type="file" name="firma_b" id="label" />
    </span></td>
  </tr>
  <tr>
    <td bgcolor="#FCD6EA"><div align="center" class="Estilo8">C</div></td>
    <td bgcolor="#CCEDCB"><div align="center" class="Estilo8">D</div></td>
  </tr>
  <tr>
    <td bgcolor="#FCD6EA"><span class="Estilo8">LOGO
        <label for="label2"></label>
      <input type="file" name="imagen_c" id="label2" />
    </span></td>
    <td bgcolor="#CCEDCB"><span class="Estilo8">LOGO
        <label for="label3"></label>
      <input type="file" name="imagen_d" id="label3" />
    </span></td>
  </tr>
  <tr>
    <td bgcolor="#FCD6EA"><span class="Estilo8">FIRMA
        <label for="label4"></label>
      <input type="file" name="firma_c" id="label4" />
    </span></td>
    <td bgcolor="#CCEDCB"><span class="Estilo8">FIRMA
        <label for="label5"></label>
      <input type="file" name="firma_d" id="label5" />
      <input name="subir" type="submit" id="subir" value="Subir"/>
    </span></td>
  </tr>
</table>
</form>
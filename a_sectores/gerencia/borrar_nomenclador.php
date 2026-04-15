<style type="text/css">
<!--
.Estilo2 {	color: #FFFFFF;
	font-weight: bold;
}
.Estilo3 {
	color: #006633;
	font-weight: bold;
}
.Estilo4 {color: #FF0000}
.Estilo5 {color: #000000}
-->
</style>
<form action ="borrar_nomenclador_si.php" method="post">
<table width="397" border="1">
  <tr bgcolor="#993300">
    <td height="38" bgcolor="#000099"><div align="center"><span class="Estilo2">BORRAR NOMENCLADOR DE: </span></div></td>
    </tr>
  <tr bgcolor="#FFFF99">
    <td bgcolor="#C1F2FF"><div align="center" class="Estilo3"><span class="Estilo5">OBRA SOCIAL</span>      
      <input type="text" name="nro_os" id= "nro_os" size ="10">
      <input type="submit" name="enviar" value = "ACEPTAR" onClick='alert("¿ESTA SEGURO DE BORRAR LOS VALORES DE LAS PRACTICAS?")'>
    </div></td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF"><div align="center" class="Estilo4">Ingrese el n&uacute;mero de la Obra Social de la cual se van a BORRAR los valores de las practicas. </div></td>
    </tr>
</table>

</form>

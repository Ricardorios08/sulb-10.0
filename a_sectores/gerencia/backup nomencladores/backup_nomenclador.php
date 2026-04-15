
<style type="text/css">
<!--
.Estilo5 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo6 {font-family: Arial, Helvetica, sans-serif}
-->
</style>

<?php $hoy = date("Ymd");
 $fecha_backup = date("d/m/y");
?>


<form action ="buscar_datos.php" method="post">
<table width="538" height="169" border="0">
  <tr bgcolor="#993300">
    <td width="532" height="31" bgcolor="#000099"><div align="center" class="Estilo5">BACKUP DE NOMENCLADORES</div></td>
    </tr>
  <tr>
    <td height="24" bgcolor="#E1F2EF"><span class="Estilo6">Fecha del Backup:</span>      <?php echo $fecha_backup;?></td>
  </tr>
  <tr>
    <td height="24" bgcolor="#E1F2EF"><div align="left"><span class="Estilo6">N&ordm; Obra Social: </span>
      <input type="text" name="nro_os" id= "nro_os" size ="6">
      </div>      <div align="center">      </div></td>
    </tr>
  <tr>
    <td height="24" bgcolor="#E1F2EF"><span class="Estilo6">Periodo:
      </span>      <input type="text" name="periodo" id= "periodo" size ="6">
      <span class="Estilo6"> A&ntilde;o: </span>      <input type="text" name="anio" id= "anio" size ="6"></td>
    </tr>
  <tr>
    <td height="26" bgcolor="#E1F2EF"><span class="Estilo6">Nombre del arancel: 
      <input type="text" name="nombre_arancel" id= "nombre_arancel" size ="20">
    </span></td>
  </tr>
  <tr>
    <td height="26" bgcolor="#E1F2EF"><span class="Estilo6">Observaciones</span>:      <input type="text" name="detalle" id= "detalle" size ="50">
	<input type="hidden" name="hoy" value = "<?php echo $hoy;?>">
      <input type="submit" name="enviar" value = "ACEPTAR"></td>
    </tr>
</table>

</form>

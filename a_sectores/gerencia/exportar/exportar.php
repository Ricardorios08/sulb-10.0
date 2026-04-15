<style type="text/css">
<!--
.Estilo1 {
	font-family: "Trebuchet MS";
	font-size: 12px;
}
.Estilo2 {
	font-family: "Trebuchet MS";
	color: #FFFFFF;
}
.Estilo7 {font-family: "Trebuchet MS"}
-->
</style>

<?php

$dia = date("d");
$mes = date("m");
$anio = date("y");


?>
     <form action="ex.php" method="post"  target ="central">
   <table width="850" border="0"   >
    
    <tr bgcolor="#C4D7E6">
      <td height="36" colspan="2" bgcolor="#666666"><div align="center"><span class="Estilo7 Estilo2">EXPORTAR ARCHIVOS </span></div></td>
    </tr>
    
    <tr bgcolor="#C4D7E6">
      <td width="406" height="21" bgcolor="#FFFFCC"><div align="right"><span class="Estilo1">DESDE </span></div></td>
      <td width="434" height="21" bgcolor="#FFFFCC"><input name="dia" type="text" id="dia" value="<?php echo $dia;?>" size="2" maxlength="2">
        /
        <input name="mes" type="text" id="mes" value="<?php echo $mes;?>" size="2" maxlength="2">
        /20
        <input name="anio" type="text" id="anio" value="<?php echo $anio;?>" size="2" maxlength="2"></td>
    </tr>
    <tr bgcolor="#C4D7E6">
      <td height="21" bgcolor="#FFFFCC"><div align="right"><span class="Estilo1">HASTA </span></div></td>
      <td height="21" bgcolor="#FFFFCC"><input name="dia_h" type="text" id="dia_h" value="<?php echo $dia;?>" size="2" maxlength="2">
        /
        <input name="mes_h" type="text" id="mes_h" value="<?php echo $mes;?>" size="2" maxlength="2">
        /20
        <input name="anio_h" type="text" id="anio_h" value="<?php echo $anio;?>" size="2" maxlength="2"></td>
    </tr>
    


	 <tr bgcolor="#C4D7E6">
	   <td height="36" colspan="2" bgcolor="#666666"><div align="center">
	     <INPUT type="submit" name="submit" value="Exportar">
       </div></td>
     </tr>
  </table>
   </form>








 






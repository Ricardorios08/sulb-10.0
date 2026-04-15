<style type="text/css">
<!--
.Estilo1 {
	font-family: "Trebuchet MS";
	font-size: 12px;
}
.Estilo3 {
	font-family: "Trebuchet MS";
	font-size: 18px;
	color: #FFFFFF;
}
.Estilo4 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-style: italic;
	font-size: 12px;
}
.Estilo6 {color: #FFFFFF}
.Estilo10 {font-family: "Trebuchet MS"; color: #FFFFFF; font-size: 36px; }
.Estilo12 {font-family: "Trebuchet MS"; color: #FFFFFF; font-size: 24px; }
.Estilo13 {font-family: "Trebuchet MS"; color: #FFFFFF; font-size: 30px; }
.Estilo14 {
	font-family: "Trebuchet MS";
	font-weight: bold;
}
-->
</style>

<?php

$dia = date("d");
$mes = date("m");
$anio = date("y");

?>
   <FORM enctype="multipart/form-data" method="post" action="excel/a.php" target = "central2">
   <table width="100%" border="0" align="center" cellspacing="0"   >
     <!--DWLayoutTable-->
    <tr bgcolor="#C4D7E6">
      <td colspan="4" valign="middle" bordercolor="#000000" bgcolor="#241B16"><p align="center" class="Estilo13"><span class="Estilo12">INGRESAR ARCHIVO CM200/CM250</span></p>        </td>
     </tr>
    <tr bgcolor="#C4D7E6">
      <td colspan="4" bgcolor="#666666"><div align="center"></div></td>
    </tr>
    <tr bgcolor="#C4D7E6">
      <td width="473" bgcolor="#CCCCCC"><div align="right"><span class="Estilo1">TIPO DE ARCHIVO </span></div></td>
      <td colspan="3" valign="top" bgcolor="#FFFFCC"><label>
        <input name="tipo" type="radio" value="1" checked="checked" />
        <span class="Estilo1">RES</span></label></td>
     </tr>
    <tr bgcolor="#C4D7E6">
      <td bgcolor="#CCCCCC"><div align="right"><span class="Estilo1">INGRESE ARCHIVO:</span></div></td>
      <td colspan="3" bgcolor="#FFFFCC"><input type="file" name="archivo" size="30"></td>
     </tr>


    
	 <tr bgcolor="#C4D7E6">
	   <td colspan="4" bgcolor="#666666"><div align="center">
	   <INPUT type="submit" name="submit" value="SUBIR ARCHIVO">
       </div></td>
     </tr>

	 
	 

  </table>

 </form>






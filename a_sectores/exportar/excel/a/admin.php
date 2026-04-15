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
   <FORM enctype="multipart/form-data" method="post" action="a.php">
   <table width="850" border="0"   >
    
    <tr bgcolor="#C4D7E6">
      <td height="36" colspan="2" bgcolor="#666666"><div align="center"><span class="Estilo7 Estilo2">CARGAR ARCHIVOS  </span></div></td>
    </tr>
    <tr bgcolor="#C4D7E6">
      <td width="406" height="36" bgcolor="#FFFFCC"><div align="right"><span class="Estilo1">INGRESE ARCHIVO EXPEL</span></div></td>
      <td width="434" bgcolor="#FFFFCC"><input type="file" name="archivo" size="30"></td>
    </tr>
    <tr bgcolor="#C4D7E6">
      <td height="21" bgcolor="#FFFFCC"><div align="right"><span class="Estilo1">PERIODO</span></div></td>
      <td height="21" bgcolor="#FFFFCC"><label>
        <input name="mes" type="text" id="mes" size="2" maxlength="2" value="<?php echo $mes;?>" >
      </label></td>
    </tr>
    <tr bgcolor="#C4D7E6">
      <td height="21" bgcolor="#FFFFCC"><div align="right"><span class="Estilo1">A&Ntilde;O</span></div></td>
      <td height="21" bgcolor="#FFFFCC"><input name="anio" type="text" id="anio" size="2" maxlength="2" value="<?php echo $anio;?>" ></td>
    </tr>
    <tr bgcolor="#C4D7E6">
      <td height="21" bgcolor="#FFFFCC"><div align="right"><span class="Estilo1">FECHA DE ORDEN </span></div></td>
      <td height="21" bgcolor="#FFFFCC"><input name="dia_orden" type="text" id="dia_orden" value="<?php echo $dia;?>" size="2" maxlength="2">
        /
        <input name="mes_orden" type="text" id="mes_orden" value="<?php echo $mes;?>" size="2" maxlength="2">
        /20
        <input name="anio_orden" type="text" id="anio_orden" value="<?php echo $anio;?>" size="2" maxlength="2"></td>
    </tr>
    <tr bgcolor="#C4D7E6">
      <td height="21" bgcolor="#FFFFCC"><div align="right"><span class="Estilo1">MODULO</span></div></td>
      <td height="21" bgcolor="#FFFFCC"><?php
	  
	  include("../../../../conexiones/config.inc.php");

$sql = "SELECT * FROM modulo order by cod_modulo";
$result = $db->Execute($sql);
echo "<select name=modulo[] size=1 id =modulo onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod_modulo=$result->fields["cod_modulo"];

/*$sql1 = "SELECT * FROM deta_modulo where cod_modulo = $cod_modulo";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
while (!$result1->EOF) {

$cod_practica=$result1->fields["cod_practica"];
$prac = $prac." ".$cod_practica;
$result1->MoveNext();
	}*/

$nombre_modulo=strtoupper($result->fields["nombre_modulo"]);
$nombre_modulo = str_pad($nombre_modulo, 20); 

echo"<option value=$cod_modulo>$nombre_modulo ($cod_modulo) </option> ";
$result->MoveNext();
	}
echo"</select>";
?> </td>
    </tr>
    <tr bgcolor="#C4D7E6">
      <td height="21" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr bgcolor="#C4D7E6">
      <td height="21" colspan="2" bgcolor="#B8B8B8"><div align="center" class="Estilo1">FORMATO DE ARCHIVO EXCEL - CON EXTENSION CSV  </div></td>
     </tr>
    
    <tr bgcolor="#C4D7E6">
      <td height="21" colspan="2" bgcolor="#FFFFCC"><table width="59%" border="0" align="center" cellpadding="0">
        <tr>
          <td bgcolor="#F0F0F0"><div align="center" class="Estilo7">Cuit</div></td>
          <td bgcolor="#F0F0F0"><div align="center" class="Estilo7">Paciente</div></td>
          <td bgcolor="#F0F0F0"> <div align="center" class="Estilo7">Empresa</div></td>
          <td bgcolor="#F0F0F0"><div align="center" class="Estilo7">Modulo</div></td>
          <td bgcolor="#F0F0F0"> <div align="center" class="Estilo7">Sexo</div></td>
        </tr>
        <tr>
          <td><div align="center" class="Estilo7">2028172981</div></td>
          <td><div align="center" class="Estilo7">JUAN PEREZ </div></td>
          <td><div align="center" class="Estilo7">SULB</div></td>
          <td><div align="center" class="Estilo7">7</div></td>
          <td><div align="center" class="Estilo7">M</div></td>
        </tr>
      </table></td>
     </tr>
   

	 <tr bgcolor="#C4D7E6">
	   <td height="36" colspan="2" bgcolor="#666666"><div align="center">
	     <INPUT type="submit" name="submit" value="Subir archivo">
       </div></td>
     </tr>
  </table>
   </form>








 






<style type="text/css">
<!--
.Estilo19 {color: #FFFFFF}
.Estilo20 {font-family: Arial, Helvetica, sans-serif}
.Estilo22 {color: #E6E6E6}
.Estilo23 {
	font-size: 12px;
	color: #000000;
}
.Estilo25 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo26 {color: #000000}
.Estilo27 {color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>
<table width="103%" cellpadding="1" cellspacing="0">
 <tr>
   <td colspan="2" bgcolor="#E6E6E6" class="left Estilo22" ><hr noshade></td>
  </tr>
 <tr>
   <td width="20%" bgcolor="#E6E6E6" ><div align="right" class="Estilo19 Estilo20 Estilo23"><span class="right">
       <label >N&ordm; Orden:</label>
 </span></div></td>
   <td width="80%" bgcolor="#E1F2EF" class="left" ><div align="left"><span class="right">
       <input name="nro_orden" type="text"  id="nro_orden" onKeyPress="return verif_caracter(this,event)" size="8" maxlength="8" >
   </span></div></td>
  </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo25 Estilo26">Nº Afiliado:</div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="afiliado" type="text" id="afiliado" onKeyPress="return verif_caracter(this,event)"   value="" size="14" maxlength="14">
   </span></td>
  </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo27">Prescriptor:</div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="prescriptor" type="text" id="prescriptor" onKeyPress="return verif_caracter(this,event)" value="" size="6" maxlength="6">
   </span></td>
  </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo27">Fecha Practica: </div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input type="text" size="2" name="dia"  value="" id="dia" onKeyPress="return verif_caracter(this,event)" maxlength="2">
     /
     <input type="text" size="2" name="mes"  value="" id="mes" onKeyPress="return verif_caracter(this,event)" maxlength="2">
     /
     20
     <input type="text" size="2" name="anio_o"  value="" id="anio" onKeyPress="return verif_caracter(this,event)" maxlength="2">
   </span></td>
  </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo27">Autorizaci&oacute;n:</div>    </td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input name="autorizacion" type="text" id="autorizacion" onKeyPress="return verif_caracter(this,event)"  value="" size="8" maxlength="8">
   </span></td>
  </tr>
 <tr>
   <td bgcolor="#E6E6E6" ><div align="right" class="Estilo27">Coseguro: </div></td>
   <td bgcolor="#E1F2EF" class="left" ><span class="right">
     <input type="text" size="5" name="coseguro" id="coseguro" onKeyPress="return verif_caracter(this,event)">
     <input type="submit" name="Alta" value="SIGUIENTE" id = "Alta3">
</span></td>
  </tr>
</table>

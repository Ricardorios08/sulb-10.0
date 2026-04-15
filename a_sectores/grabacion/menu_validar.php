<script type="text/javascript">
function ocultamenu(){
  var menu = document.getElementById("Atributos");
  menu.style.display = "none";
}
function despliega(){
  var menu = document.getElementById("Atributos");
    if(menu.style.display == "none"){
      menu.style.display = "block";
    }
    else{
      menu.style.display = "none";
    }
}
</script>


<BODY background="../../IMAGENES/IZQUIERDA.PNG" onload ="ocultamenu()">
<script LANGUAGE="JavaScript">
function multicarga(documento1,documento2)
{
parent.izquierda.location.href=documento1;
parent.central.location.href=documento2;
}
</script>
<form action="buscar_grabadas.php" method="post"  target ="central">

    <table width="147" border="0">
      <tr bgcolor="#990033">
        <td width="141" height="29" bgcolor="#000099"><div align="center"><font color="#FFFFFF"><strong> VALIDACIONES</strong></font></div></td>
      </tr>
      <tr>
        <td height="25"><div align="center"><a href="../../a_sectores/auditoria/validadas.php" target = "central" >Validar Obra Social</a></div></td>
      </tr>
      <tr>
        <td><div align="center"><a href="../../a_sectores/grabacion/estadisticas/laboratorios_faltantes.php" target = "central" >Laborat. Faltantes </a></div></td>
      </tr><tr>
        <td><div align="center"><a href="../../a_sectores/facturacion/ordenes_sin_facturar.php" target = "izquierda"  ><font color="#0000CC">Ordenes sin Facturar</font></a></div></td>
      </tr>
      <tr>
       <td><div align="center"><a href="../../a_sectores/auditoria/ficha_validada.php" target = "central" >Imp. Ficha Valid.</a></div></td>
      </tr><tr bgcolor="#993300">
        <td bgcolor="#000099"><div align="center"><font color="#FFFFFF"><strong>BUSCAR</strong></font></div></td>
      </tr>
      <tr>
        <td><div align="center"><font color="#0000FF"> <font size="2"></font>
                  <select name="buscador[]" id="select"onkeypress="return verif_caracter(this,event)">
                    <!--   <option value = "1">ORDENES </option> -->
                    <option value = "3">GRABADAS</option>
                    <option value = "5">OPERADOR</option>
                    <option value = "6">LOTE</option>
                    <option value = "2">CONFIRMADAS</option>
                    <option value = "4">MODIFICAR</option>
                  </select>
        </font></div></td>
      </tr>
      <tr>
        <td><div align="center"><font color="#0000FF" face="Arial, Helvetica, sans-serif"><font size="2">A&ntilde;o 20 </font>
                  <input type="text" name="anio" size = "2" value = "<?php echo $anio;?>">
        </font></div></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#0000FF" face="Arial, Helvetica, sans-serif"> <font size="2">Periodo: </font>
                  <select name="mes[]" id="select4" onkeypress="return verif_caracter(this,event)">
                    <option value = "13">TODOS</option>
                    <option value = "01" selected>ENE</option>
                    <option value = "02">FEB</option>
                    <option value = "03">MAR</option>
                    <option value = "04">ABR</option>
                    <option value = "05">MAY</option>
                    <option value = "06">JUN</option>
                    <option value = "07">JUL</option>
                    <option value = "08">AGO</option>
                    <option value = "09">SET</option>
                    <option value = "10">OCT</option>
                    <option value = "11">NOV</option>
                    <option value = "12">DIC</option>
                  </select>
        </font></div></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#0000FF" face="Arial, Helvetica, sans-serif"> <font size="2">N&ordm; Obra </font>
                  <input type="busca" name="busca" size = "4">
        </font></div></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#0000FF" face="Arial, Helvetica, sans-serif"><font size="2">Lab.</font>
                  <input type="laboratorio" name="laboratorio" size = "4">
        </font></div></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#0000FF" face="Arial, Helvetica, sans-serif"><font size="2">Orden</font>
                  <input name="nro_orden" type="text" id="nro_orden" size = "8">
        </font></div></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#0000FF" face="Arial, Helvetica, sans-serif"><font size="2">Lote</font>
                  <input name="lote" type="text" id="lote" size = "8">
        </font></div></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#0000FF" face="Arial, Helvetica, sans-serif"><font size="2">Operador</font>
                  <input name="operador" type="text" id="operador" size = "4">
        </font></div></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#0000FF" face="Arial, Helvetica, sans-serif"> <font size="2">Orden</font>
                  <select name="ordenar[]" id="ordenar"onkeypress="return verif_caracter(this,event)">
                    <option value = "nro_orden">N&ordm; ORD </option>
                    <option value = "nro_laboratorio">N&ordm; LAB </option>
                    <option value = "nro_afiliado">N&ordm; AFI</option>
                    <option value = "fecha">FECHA</option>
                    <option value = "marca, nro_laboratorio, nro_orden">MARCA</option>
                    <option value = "lote, nro_laboratorio, nro_orden ">LOTE</option>
                    <option value = "cod_grabacion">GRAB</option>
                    <option value = "nro_laboratorio, nro_orden, marca">fact</option>
                  </select>
        </font></div></td>
      </tr>
      <tr>
        <td><div align="center">
            <input type="submit" size = "10" value = "Buscar">
        </div></td>
      </tr>
      <tr bgcolor="#993300">
        <td bgcolor="#000099"><div align="center"><font color="#FFFFFF"><strong>IR A....</strong></font> </div></td>
      </tr>
	  <tr>
        <td><div align="center"><A ONCLICK ="history.back()"><font color="#0000CC">Atras</font></A><font color="#0000CC"></font></div></td>
      </tr>
      <tr>
        <td><div align="center"><A HREF="javascript:multicarga('../../validar/admin.php', '../../validar/cuadros.htm')">Principal</A><font color="#0000FF"></font></div></td>
      </tr>
      <tr>
        <td><div align="center"><font color="#0000FF"><a href="../../index.html" target ="_top".>Salir</a></font></div></td>
      </tr>
    </table>
</FORM>	
</body>


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

<?php $anio = date("y");?>
<script LANGUAGE="JavaScript">
function multicarga(documento1,documento2)
{
parent.izquierda.location.href=documento1;
parent.central.location.href=documento2;
}

function multicarg(documento1,documento2)
{
parent.izquierda.location.href=documento1;
parent.central.location.href=documento2;
}
</script>
<form action="buscar_grabadas.php" method="post"  target ="central">

    <table width="140" border="0">
      <tr bgcolor="#990033">
        <td width="126" height="29" bgcolor="#000099"><div align="center"><font color="#FFFFFF"><strong>PAMI</strong></font></div></td>
      </tr>
      <tr>
      
      </tr>
         <tr>
        <td><div align="left"><a href="javascript:multicarg('../../a_sectores/grabacion/menu_pami.php', '../../a_sectores/grabacion/control pami/mes_a_confirmar_pru.php')">1. Control PAMI</a><font color="#0000FF"></font></div></td>
      </tr>
      <tr>
       <td><div align="left"><a href="../../a_sectores/grabacion/cerrar/periodo.php" target = "central" > 2. Cerrar Per&iacute;odo</a></div></td>
      </tr>
	 <!--  <tr>
         <td><div align="LEFT"><a href="../../a_sectores/grabacion/control pami/mes_a_confirmar_pru.php" target = "central" >Control PAMI</a></div></td>
      </tr> -->


      <tr>
        <td><div align="left"><a href="../../a_sectores/grabacion/estadistica_grabacion.php" target = "izquierda" >3. Estadisticas</a></div></td>
      </tr>
      <tr>
        <td><div align="left"><a href="../../a_sectores/grabacion/comprobar/afiliados.php" target = "central" >4. Buscar Afiliados </a></div></td>
      </tr>
      <tr>
        <td><div align="left"><a href="../../a_sectores/grabacion/comprobar/prescriptores.php" target = "central" >5. Buscar M&eacute;dicos</a></div></td>
      </tr>
      <tr>
        <!-- <td><div align="center"><a href="../../a_sectores/grabacion/control pami/cambiar_matricula.php" target = "central" >Cambiar Matricula </a></div></td>-->
      </tr>
      <tr>
       <!-- <td><div align="center"><a href="../../a_sectores/grabacion/control pami/importar/importar_tablas.php" target = "central" >Ingresar TXT </a></div></td>
      </tr>
      <tr>
        <td><div align="center"><a href="../../a_sectores/grabacion/control pami/importar/borrar_periodo.php" target = "central" >Borrar Periodo</a></div></td>
      </tr>

      <tr>
        <td><div align="center">
          <font color="#FF0000" size="2">TXT reducido delimitado con comas y comillas. </font>
          </div></td>
      </tr>	   --> 
      <tr bgcolor="#993300">
        <td bgcolor="#000099"><div align="center"><font color="#FFFFFF"><strong>BUSCAR</strong></font></div></td>
      </tr>
      <tr>
        <td><div align="center"><font color="#0000FF">
            <font size="2"></font>
            <select name="buscador[]" id="select"onkeypress="return verif_caracter(this,event)">
              <option value = "1">ORDENES </option>
              <option value = "2">CONFIRMADAS</option>
          </select>
        </font></div></td>
      </tr>

      <tr>
        <td><font color="#0000FF"><font size="2">Periodo</font><font color="#0000FF">
          <input name="anio" type="text" id="anio" value="<?php echo $anio;?>" size = "2" maxlength="2">
        </font></font></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#0000FF">
                <font size="2">Periodo:
                </font>
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
        <td><div align="right"><font color="#0000FF">
            <font size="2">N&ordm; Obra </font>
            <input name="busca" type="busca" value="5073" size = "8">    
      </font></div></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#0000FF"><font size="2">Lab.</font>
              <input type="laboratorio" name="laboratorio" size = "8">
        </font></div></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#0000FF"><font size="2">Orden</font>
              <input name="nro_orden" type="text" id="nro_orden" size = "8">
        </font></div></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#0000FF">
            <font size="2">Por</font>
            <select name="ordenar[]" id="ordenar"onkeypress="return verif_caracter(this,event)">
              <option value = "nro_orden">Nº ORD </option>
			<option value = "nro_laboratorio">Nº LAB </option>
              <option value = "nro_afiliado">Nº AFI</option>
              <option value = "fecha">FECHA</option>
                <option value = "marca, nro_orden">MARCA</option>
                <option value = "lote, nro_orden">LOTE</option>
				<option value = "cod_operacion">GRAB</option>


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
        <td><div align="center"><A HREF ="grabacion.php"><font color="#0000CC">Atras</font></A><font color="#0000CC"></font></div></td>
      </tr>
      <tr>
        <td><div align="center"><A HREF ="../../validar/grabacion.php" target = "central"><font color="#0000CC">Menu</A><font color="#0000FF"></font></div></td>
      </tr>
      <tr>
        <td><div align="center"><font color="#0000FF"><a href="../../index.html" target ="_top".>Salir</a></font></div></td>
      </tr>
    </table>
</FORM>	
</body>


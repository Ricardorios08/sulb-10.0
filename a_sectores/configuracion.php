<?php 
 $usuario = $_REQUEST['usuario'];
?>
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
<FORM name="form" ACTION="buscar_convenios.php" METHOD = "POST" target ="central">

  <table width="140" border="0">
    <tr>
      <th width="140" bgcolor="#000099" scope="col"><font color="#FFFFFF"><strong>CONFIGURACION</strong></font></th>
    </tr>
    <tr>
      <td><div align="left"><a href="../../a_sectores/gerencia/ingresar_convenios.php" target = "central" title="Ingrese un nuevo convenio o modifique alguno" ><font color="#0000FF">Convenio</font></a></div></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#0000FF"><a href="../../a_sectores/gerencia/menu_convertir.php" target = "central" title = "Convertir practicas de un nomenclador a otro">Convertir </a> NM </font></div></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#0000FF"><a href="../../a_sectores/gerencia/backup nomencladores/backup_nomenclador.php" target = "central" title = "Backup de nomenclador">Backup</a> NM </font></div></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#0000FF"><a href="../../a_sectores/gerencia/borrar_nomenclador.php" target = "central" title = "Borra un nomenclador">Borrar</a> NM</font></div></td>
    </tr>
    <tr>
      <td><font color="#0000FF"><a href="../../a_sectores/gerencia/comprobar/ingresar_convenios.php" target = "central" title = "Borra un nomenclador">Comprobar</a> NM</font></td>
    </tr>
    <tr>
      <td><font color="#0000FF"><a href="../../lautaro/importar_nomenclador.php" target = "central" title="Modifica las practicas en orden secuencial">Importar NN </a></font></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#0000FF"><a href="../../a_sectores/auditoria/convenidas/convenir.php" target = "central" title="Modifica las practicas en orden secuencial">Definir Pr&aacute;ctica </a></font></div></td>
    </tr>
	    <tr>
      <td><div align="left"><font color="#0000FF"><a href="../../a_sectores/auditoria/convenidas/agregar_practica.php" target = "central" title="Agrega una practica al nomenclador" accesskey="a">Agregar Pr&aacute;ctica </a></font></div></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#0000FF"><a href="../../a_sectores/gerencia/modificar_practicas.php?usuario=<?php print("$usuario");?>" target = "izquierda" title="Agrega una practica al nomenclador" accesskey="a">Modificar Pr&aacute;ctica </a></font></div></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#0000FF"><a href="../../a_sectores/estadistica/grabadores.php" target = "central" title="Ver grafico grabadores por mes" accesskey="a">Ver Grabadores</a></font></div></td>
    </tr>
    <tr>
      <td><font color="#0000FF"><a href="../../a_sectores/grabacion/cargar_padron.php" target = "central" title="Cargar Patron" accesskey="a">Cargar Padrón</a></font></td>
    </tr>
    <tr>
      <td><font color="#0000FF"><a href="../../a_sectores/gerencia/estadisticas/estadistica.php" target = "izquierda" title="Estadisticas" accesskey="a">Estadisticas</a></font></td>
    </tr>
    <tr>
      <td bgcolor="#000099"><div align="center"><font color="#FFFFFF"><strong>BUSCAR</strong></font></div></td>
    </tr>
    <tr>
      <td><div align="center"><font color="#0000FF">Convenio: OS </font></div></td>
    </tr>
    <tr>
      <td><div align="center">
        <select name="buscador_rapido[]" id="buscador_rapido" onkeypress="return verif_caracter(this,event)">
            <option value = "8">Modificar </option>
			<option value = "2">Vigencia</option>
            <option value = "3">Arancel</option>
            <option value = "4">Tratamiento</option>
            <option value = "5">Criterios</option>
            <option value = "6">Opciones </option>
            <option value = "7">Capitacion </option>
			<option value = "9">Todos</option>
			<option value = "10">Impr. Completo</option>
			<option value = "11">Impr. Reducido</option>


			

          </select>
      </div></td>
    </tr>
    <tr>
      <td><div align="center">
          <input type = "text" name = "busca" size ="8">
          
          <input type = "submit" name = "buscar" value = "OK">
      </div></td>
    </tr>
    <tr>
      <td> <div align="center">
      </div></td>
    </tr>
    <tr>
      <td bgcolor="#000099"><div align="center"><font color="#FFFFFF"><strong>IR A....</strong></font> </div></td>
    </tr>
  <!--   <tr>
      <td><div align="center"><A HREF="javascript:multicarga('../../validar/admin.php', '../../validar/cuadros.htm')">Principal</A></div></td>
    </tr> -->
    <tr>
      <td> <div align="center"><font color="#0000FF"><a href="../../index.html" target ="_top".>Salir</a></font></div></td>
    </tr>
  </table>
</form>
</body>

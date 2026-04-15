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

<link href="file:///C|/Archivos%20de%20programa/DIEZ.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo5 {font-size: 12px}
.Estilo6 {color: #0000FF}
.Estilo21 {color: #FFFFFF}
.Estilo13 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo14 {color: #000099}
.Estilo15 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #000099; }
.Estilo22 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo30 {
	font-size: 16px;
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo31 {color: #0000CC}
-->
</style>
<BODY background="../../IMAGENES/IZQUIERDA.PNG" onload ="ocultamenu()">
<script LANGUAGE="JavaScript">
function multicarga(documento1,documento2)
{
parent.izquierda.location.href=documento1;
parent.central.location.href=documento2;
}
</script>
<table width="156" border="0">
  <!--DWLayoutTable-->
      <tr bgcolor="#000099">
        <td colspan="2"><div align="center" class="Estilo30">NOMENCLADOR</div></td>
  </tr>
      <tr>
        <td colspan="2"><div align="left"><a href="auditoria/practicas/practicas.php" target = "central" title="Agrega una practica, al diccionario de practicas detallando tipo de practica" ><font color="#0000FF">1. Practica (Diccionario)</font></a></div></td>
      </tr>
      <tr>
        <td colspan="2"><span class="Estilo31">2. Atributos</span></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"><span class="Estilo14"><a href="auditoria/atributos/especialidad/especialidad.php" target = "central" title="Carga nuevos tipos de especialidades"> a)  Especialidad</a></span></div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"><span class="Estilo14"><a href="auditoria/atributos/metodo/metodo.php" target = "central" title="Carga nuevos tipos de Metodos">b).  M&eacute;todo</a></span></div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"><span class="Estilo14"><a href="auditoria/atributos/muestra/muestra.php" target = "central" title="Carga nuevos tipos de Muestras">c)  Muestra</a></span></div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"><span class="Estilo14"><a href="auditoria/atributos/material/material.php" target = "central" title="Carga nuevos tipos de Materiales">d) Material</a></span></div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="left"><span class="Estilo14"><a href="auditoria/atributos/buscar_atributos.php" target = "izquierda" >3. Ver Atributos</a></span></div></td>
      </tr>
      <tr bgcolor="#000099">
        <td colspan="2"><div align="center" class="Estilo22">CONVENIO PRACTICA </div></td>
      </tr>
      <tr >
        <td height="21" colspan="2"><div align="center"><span class="Estilo14"><a href="auditoria/convenidas/agregar_practica.php" target = "central" title="Agrega una practica al nomenclador" accesskey="a">Agregar Pr&aacute;ctica </a></span></div></td>
      </tr>
      <tr >
        <td height="21" colspan="2">&nbsp;</td>
      </tr>
      <tr bgcolor="#000099">
        <td colspan="2"><div align="center" class="Estilo13 Estilo21"><strong>BUSCAR PRACTICAS </strong> </div></td>
      </tr>

<form action="auditoria/buscar_convenida.php" method="post"  target ="central">
      <tr bordercolor="#FFFFFF">
        <td width="61"><div align="right" class="Estilo13 Estilo14">Practica:</div></td>
        <td width="85"><input name = "busca" type = "text" size = "5"></td>
		<input type = "hidden" name = "buscador_rapido" value = "2">
      </tr>
      <tr bordercolor="#FFFFFF">
        <td><div align="right" class="Estilo15">O. Social:</div></td>
        <td><input name = "nro_os" type = "text" size = "5">
        <span class="Estilo5">        </span></td>
      </tr>
      <tr bordercolor="#FFFFFF">
        <td colspan="2" class="Estilo5 Estilo6"><div align="right"></div>          
          <div align="center"><span class="Estilo13 Estilo14">Por:</span>
            <select name="buscar_por[]" class="Estilo6" id="buscar_por" onkeypress="return verif_caracter(this,event)">
                    <option value="4">Todas</option>
                    <option value="1">Comunes</option>
                    <option value ="2">Especiales</option>
                    <option value ="3">Complejidad.</option>
                    <option value ="5">Modificar</option>
    
    
            </select>
          <span class="Estilo5">          </span></div></td>
      </tr>
      <tr bordercolor="#FFFFFF">
        <td colspan="2" class="Estilo5 Estilo6"><div align="center"><span class="Estilo5">

			<input type = "hidden" name = "usuario" value = "<?php echo $usuario;?>">
			<input type = "submit" name = "buscar" value = "BUSCAR" >
        </span></div></td>
      </tr>
</form>

</table>
	

</body>


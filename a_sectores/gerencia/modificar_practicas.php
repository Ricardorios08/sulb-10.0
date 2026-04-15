<?php 
echo $usuario = $_REQUEST['usuario'];
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
.Estilo23 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
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

    <table width="140" border="0">
      <tr bgcolor="#000099">
        <td height="22" colspan="2"><div align="center" class="Estilo23">Modificar Practicas  </div></td>
      </tr>

<form action="../../a_sectores/auditoria/buscar_convenida.php" method="post"  target ="central">
      <tr bordercolor="#FFFFFF">
        <td width="72"><div align="right" class="Estilo5"><font color="#0000FF">Practica:</font></div></td>
        <td width="68"><input name = "busca" type = "text" size = "6"></td>
		<input type = "hidden" name = "buscador_rapido" value = "2">
      </tr>
      <tr bordercolor="#FFFFFF">
        <td><div align="right" class="Estilo5"><font color="#0000FF">Obra Social:</font></div></td>
        <td><input name = "nro_os" type = "text" size = "6"></td>
      </tr>
      <tr bordercolor="#FFFFFF">
        <td colspan="2" class="Estilo5 Estilo6"><div align="right"></div>          
          <div align="center">
            <select name="buscar_por[]" id="buscar_por" onkeypress="return verif_caracter(this,event)">
                    <option value ="5">Modif. Practicas</option>
					<option value="4">Todas</option>
                    <option value="1">Comunes</option>
                    <option value ="2">Pract Especiales</option>
                    <option value ="3">Alta Complejidad</option>
              
    
    
            </select>
          </div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center" class="Estilo5">
		  <input type = "hidden" name = "usuario" value = "<?php echo $usuario;?>" >
          <input type = "submit" name = "buscar" value = "BUSCAR" >
        </div></td>
      </tr>
</form>
<form action="debitos/buscar_detalle.php" method="post"  target ="central">
</FORM>
      <tr bgcolor="#000099">
        <td colspan="2"><div align="center" class="Estilo21"><strong>IR A....</strong> </div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"><A HREF="javascript:multicarga('../../a_sectores/gerencia/gerencia.php', '../../validar/cuadros.htm')">Atras</A></div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"><A HREF="javascript:multicarga('../../validar/admin.php', '../../validar/cuadros.htm')">Principal</A>
</div>
		
		
		</td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"><font color="#0000FF"><a href="../../index.html" target ="_top".>Salir</a></font></div></td>
      </tr>
</table>
	

</body>


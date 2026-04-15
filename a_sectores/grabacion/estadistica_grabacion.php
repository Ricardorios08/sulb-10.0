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

    <table width="140" border="0">
      <tr bgcolor="#990033">
        <td width="126" height="29" bgcolor="#000099"><div align="right"><font color="#FFFFFF"><strong>ESTADISTICAS</strong></font></div></td>
      </tr>
      <tr>
      
      </tr>

      <tr>
        <td><div align="center"><a href="../../a_sectores/estadistica/confirmadas.php" target = "central" >PAMI</a></div></td>
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
      
      <tr>
        <td><div align="center"><a href="../../a_sectores/estadistica/ordenes/recepcionadas.php" target = "central" >RECEPCION</a></div></td>
      </tr>
      <tr>
        <td><div align="center"><a href="../../a_sectores/estadistica/ordenes_os/grabadas.php" target = "central" >GRABADAS</a></div></td>
      </tr>
	  <tr>
        <td><div align="center"><a href="../../a_sectores/estadistica/ordenes_os/facturadas.php" target = "central" >FACTURADAS</a></div></td>
      </tr>
	  <tr>
	    <td><div align="center"><a href="../../a_sectores/grabacion/comprobar/afiliados_cimesa.php" target = "central" >AF. CIMESA</a></div></td>
      </tr>
      <tr bgcolor="#993300">
        <td bgcolor="#000099"><div align="center"><font color="#FFFFFF"><strong>IR A....</strong></font> </div></td>
      </tr>
      <tr>
        <td><div align="center"><A HREF="grabacion.php" target= "izquierda">Atras</A><font color="#0000FF"></font></div></td>
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


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


<BODY background="../../../IMAGENES/IZQUIERDA.PNG" onload ="ocultamenu()">
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

<?php $anio = date("y")?>
<form action="buscar_grabadas.php" method="post"  target ="central">

    <table width="140" border="0">
      <tr bgcolor="#990033">
        <td width="126" height="29" bgcolor="#000099"><div align="center"><font color="#FFFFFF"><strong>GRABACION</strong></font> </div></td>
      </tr>
<tr><td> <font color="#0000FF">
<div align="left"><a href="../..//grabacion/cambiar/cambiar.php" target = "central" >1. Cambiar Lab.</a></div></td></tr>
<tr>
  <td><a href="../..//grabacion/cambiar/cambiar_os.php" target = "central" >2. Cambiar Os. </a></td>
</tr>
<tr>
  <td><a href="../..//grabacion/cambiar/cambiar_periodo.php" target = "central" >3. Cambiar Periodo </a></td>
</tr>
<tr>
  <td><a href="../..//grabacion/cambiar/cambiar_lote.php" target = "central" >4. Cambiar Lote </a></td>
</tr>

      <tr bgcolor="#993300">
        <td bgcolor="#000099"><div align="center"><font color="#FFFFFF"><strong>IR A....</strong></font> </div></td>
      </tr>
    <tr>
        <td><div align="center"><a href="../../../validar/grabacion.php" target ="central">Menu</a><font color="#0000FF"></font></div></td>
      </tr> 
      <tr>

        <td><div align="center"><font color="#0000FF"><a href="../../../index.html" target ="_top".>Salir</a></font></div></td>
      </tr>
    </table>
</FORM>	
</body>


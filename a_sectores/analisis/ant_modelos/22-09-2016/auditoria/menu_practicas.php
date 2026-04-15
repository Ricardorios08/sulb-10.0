<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>

<style type="text/css">
<!--
.Estilo3 {
	font-family: "Trebuchet MS";
	color: #FFFFFF;
}
-->
</style>
<link href="../../menus.css" rel="stylesheet" type="text/css" />
<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo13 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo6 {color: #0000FF}
.Estilo14 {font-family: "Trebuchet MS"}
.Estilo16 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo5 {font-size: 12px}
-->
</style>


<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","../validacion/getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>


</head>

<body>
<table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">PRACTICAS</div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
			<ul>
			 			  
			<li><a href="../../a_sectores/auditoria/convenidas/agregar_practica.php" target = "central">1. Agregar Práctica</a></li>
			<li><a href="../../a_sectores/auditoria/antibiotico/agregar_practica.php" target = "central">2. Agregar Antibiótico</a></li>
			<li><a href="../../a_sectores/auditoria/antibiotico/agregar_rast.php" target = "central">3. Agregar Alergeno</a></li>
			<!-- <li><a href="../../a_sectores/auditoria/ayuda/abreviaturas.php" target = "central">3. Ver Abreviaturas</a></li> -->
			
			
			
			
		  </ul>
		</ul>
</div>
  
<form action="buscar_convenida.php" method="post"  target ="central">

<table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">BUSCAR</div></td>
  </tr>
 

  <tr>
    <td><div align="center">
      <input name = "busca" type = "text" size = "21" />
    </div></td>
  </tr>
  <tr>
    <td><span class="Estilo16">Unidad Bq</span>
      <input name = "variable" type = "text" size = "5" class="ctxt" /></td>
  </tr>
  <tr>
    <td>
      <select name="buscar_por[]" id="buscar_por" class="titulo2" onkeypress="return verif_caracter(this,event)">
        <option value="4">Todas</option>
        <option value="0">Simple</option>
        <option value ="1">Complejas</option>
        <option value="2">Modulos</option>
		     <option value="3">Compuestas</option>

      
            </select></td>
  </tr>
  <tr>
    <td><div align="center"><span class="Estilo5">
      <input type = "hidden" name = "usuario" value = "<?php echo $usuario;?>" />
      <input type = "submit" name = "buscar" value = "BUSCAR" class="ctxt">
    </span></div></td>
  </tr>
</table>
</form>





















<!-- 

<form action="buscar_convenida_nomenclador.php" method="post"  target ="central">



<table width="152"  border="0">
  <tr bgcolor="#990033"> </tr>
  
  <tr>
    <td bgcolor="#666666"><div align="center" class="Estilo3">FACTURACION </div></td>
  </tr>
  <tr>
    <td><div align="left" class="Estilo16">
      <input name="radiobutton" type="radio" value="1" checked="checked" />
      NOMENCLADORES</span></div></td>
  </tr>


  <tr>
    <td><div align="center">
      <input name = "busca" type = "text" size = "21" />
    </div></td>
  </tr>
  <tr>
    <td><span class="Estilo16">N° OS</span>
      <input name = "variable" type = "text" size = "5" /></td>
  </tr>
  <tr>
    <td><span class="Estilo13 Estilo14">Por:</span>
      <select name="buscar_por[]" id="buscar_por" onkeypress="return verif_caracter(this,event)">
        <option value="4">Todas</option>
        <option value="0">Simple</option>
        <option value ="1">Complejas</option>
        <option value="2">Modulos</option>

      
            </select></td>
  </tr>
  <tr>
    <td><div align="center"><span class="Estilo5">
      <input type = "hidden" name = "usuario" value = "<?php echo $usuario;?>" />
      <input type = "submit" name = "buscar" value = "BUSCAR">
    </span></div></td>
  </tr>
</table>
</form> -->


</body>
</html>

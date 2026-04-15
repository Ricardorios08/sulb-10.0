<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><?php 
include ("../../../conexiones/config.inc.php");
global $nro_os;


$sql1="select * from datos_personales ORDER BY apellido";
$result1 = $db->Execute($sql1);



  include ("../../../conexiones/config.inc.php");
$sql2="select * from practica where cod_practica = $cod_practica";
$result2 = $db->Execute($sql2);

 if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {

$practica=$result2->fields["practica"];
$cod_practica=$result2->fields["cod_practica"];
	

if ($cod_practica == "") {

$cod_practica = $prueba + 1;
if ($practica =="") {
 $practica = "No existe esa práctica";
}
}
else
	  {

 $sql5="select * from practica where cod_practica = $cod_practica";
$result5 = $db->Execute($sql5);
$practica=$result5->fields["practica"];
 $cod_practica=$result5->fields["cod_practica"];
 

}


$result2->MoveNext();
	}




  include ("../../../conexiones/config_os.php");
$sql3="select * from incremento where nro_os = $nro_os";
$result3 = $db->Execute($sql3);

$material_descartable=$result3->fields["material_descartable"];
$toma_muestra=$result3->fields["toma_muestra"];
$acto_bioquimico=$result3->fields["acto_bioquimico"];


   ?>

  <script language="javascript">
function on_load()
{
document.getElementById("equivalencia").focus();
}

</script>
<BODY onload = "on_load ()">


<form action="guardar_honorarios.php" method="post">
<table width="557" border="0">
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#993300"> 
    <td colspan="4"><strong><font color="#FFFFCC">CONVENIO DE LAS PRACTICAS </font></strong> </td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#FFFF99"><div align="right"><font color="#006633"><strong>Obra Social</strong></font></div></td>
    <td colspan="3"><div align="left">      
	 <input type="text" value ="<?php print("$nro_os");?>" name="nro_os" size ="10">
     <input type="text" value =<?php print("$sigla");?> name="sigla" >
    </div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#FFFF99"><div align="right"><font color="#006633"><strong>Codigo de Practica</strong></font></div></td>
    <td colspan="3"><div align="left">
      <input type="text" value ="<?php print("$cod_practica");?>" name="cod_practica" size ="5">
      <input type="text" value ="<?php print("$practica");?>" name="practica" size ="40">
    </div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#FFFF99"><div align="right"><font color="#006633"><strong>Codigo de Equivalencia</strong></font></div></td>
    <td colspan="3"><div align="left">
        <input type="text" name="equivalencia" size ="5" id="equivalencia" >
    </div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td width="173" bgcolor="#FFFF99"><div align="right"><font color="#006633"><strong>Categoria</strong></font></div></td>
    <td width="224" colspan="3"><div align="left">        
      <select name="categoria[]" id="categoria" onKeyPress="return verif_caracter(this,event)">
          <option value="1">COMUNES </option>
          <option value ="2">PRACTICAS ESPECIALES</option>
          <option value ="3">ALTA COMPLEJIDAD</option>
        </select>
</div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#FFFF99"><div align="right"><font color="#006633"><strong>Honorarios</strong></font></div></td>
    <td colspan="3"><div align="left"> 
        <input type="text" name="honorarios" size ="10" id="valor" >
      </div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#FFFF99"><div align="right"><font color="#006633"><strong>Material Descartable</strong></font></div></td>
    <td>      
<!-- aca iria desde el convenio ver si lleva material descartable -->
	<input type="radio" name="material_descartable" value="SI" >
      SI 
      <input type="radio" name="material_descartable" value="NO" checked="TRUE">
    NO</td>
    <td><div align="right"><font color="#006633"><strong>Urgencia</strong></font></div></td>
    <td><input type="radio" name="urgencia" value="SI" >
SI
  <input type="radio" name="urgencia" value="NO" checked="TRUE">
NO</td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#FFFF99"><div align="right"><font color="#006633"><strong>Toma y Muestra</strong></font></div></td>
    <td>      <input type="radio" name="toma" value="SI" >
      SI 
      <input type="radio" name="toma" value="NO" checked="TRUE">
    NO</td>
    <td><div align="right"><font color="#006633"><strong>Autorizaci&oacute;n</strong></font></div></td>
    <td><input type="radio" name="autorizada" value="SI" >
SI
  <input type="radio" name="autorizada" value="NO"checked="TRUE">
NO</td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF"> 
    <td colspan="4" bgcolor="#FFFFFF"><input name="submit" type="submit"  value="Siguiente"></td>
  </tr>
</table>
<!-- onClick="javascript:alert('¿Esta Seguro?')" -->


<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
</body>
</html>

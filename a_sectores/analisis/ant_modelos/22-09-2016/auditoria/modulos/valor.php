<?php 
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


<form action="guardar_valor.php" method="post">
<table width="556" border="0">
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#993300"> 
    <td colspan="4"><strong><font color="#FFFFCC">CONVENIO DE LAS PRACTICAS </font></strong> </td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong>Obra Social:  </strong></font></div></td>
    <td colspan="3"><div align="left">      
	 <input type="text" value ="<?php print("$nro_os");?>" name="nro_os" size ="5">
     <input type="text" value =<?php print("$sigla");?> name="sigla" >
    </div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong>Codigo de Practica: </strong></font></div></td>
    <td colspan="3"><div align="left">
      <input type="text" value ="<?php print("$cod_practica");?>" name="cod_practica" size = "5">
      <input type="text" value ="<?php print("$practica");?>" name="practica" size = "40" >
    </div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#FFFF99"><font color="#006633"><strong>Codigo de Equivalencia</strong></font></td>
    <td colspan="3"><div align="left">
      <input type="text" name="equivalencia" size ="5" id="equivalencia" >
    </div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td width="169" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong>Categoria</strong></font></div></td>
    <td colspan="3"><div align="left">        
      <select name="categoria[]" id="categoria" onKeyPress="return verif_caracter(this,event)">
       <option value="1">COMUNES </option>
          <option value ="2">PRACTICAS ESPECIALES</option>
          <option value ="3">ALTA COMPLEJIDAD</option>
        </select>
</div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong>Valor</strong></font></div></td>
    <td colspan="3"><div align="left"> 
        <input type="text" name="valor" size ="10" id="valor" >
      </div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong>Material Descartable</strong></font></div></td>
    <td width="117" bgcolor="#FFFFCC">      
<!-- aca iria desde el convenio ver si lleva material descartable -->
	<div align="left">
        <input type="radio" name="material_descartable" value="SI" >
      SI 
      <input type="radio" name="material_descartable" value="NO" checked="TRUE">
    NO</div></td>
    <td width="127" bgcolor="#FFFFCC"><font color="#006633"><strong>Urgencia</strong></font></td>
    <td width="127" bgcolor="#FFFFCC"><input type="radio" name="urgencia" value="SI" >
SI
  <input type="radio" name="urgencia" value="NO" checked="TRUE">
NO</td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong>Toma y Muestra</strong></font></div></td>
    <td>      <div align="left">
        <input type="radio" name="toma" value="SI" >
      SI 
      <input type="radio" name="toma" value="NO" checked="TRUE">
    NO</div></td>
    <td><font color="#006633"><strong>Autorizaci&oacute;n</strong></font></td>
    <td><input type="radio" name="autorizada" value="SI" >
SI
  <input type="radio" name="autorizada" value="NO"checked="TRUE">
NO</td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF"> 
    <td height="28" colspan="4" bgcolor="#FFFFFF"><input name="submit" type="submit"  value="Siguiente"></td>
  </tr>
</table>
<!-- onClick="javascript:alert('¿Esta Seguro?')" -->


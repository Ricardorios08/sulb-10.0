<?php 
global $mostrar;

$nro_os= $_REQUEST['nro_os'];
$nro_os_nu= $_REQUEST['nro_os_nu'];

include ("../../conexiones/config.inc.php");

$sql6="select * from arancel where nro_os like '$nro_os'";
$result6 = $db->Execute($sql6);
$modalidad=ucwords($result6->fields["modalidad"]);


$sql2="select * from arancel where nro_os like '$nro_os_nu'";
$result2 = $db->Execute($sql2);
$modalidad_nu=ucwords($result2->fields["modalidad"]);


$sql="select * from datos_os where nro_os like '$nro_os'";
$result = $db->Execute($sql);
$sigla=$result->fields["sigla"];

 $sql1="select * from datos_os where nro_os like '$nro_os_nu'";
$result1 = $db->Execute($sql1);
 $sigla_nu=ucwords($result1->fields["sigla"]);


switch ($modalidad)
	{
	case "1":
		{
	$mostrar = "Honorarios";
	break;
	}

case "2":
		{
	$mostrar = "Gastos y Honorarios";
	break;
	}
	
	case "3":
		{
	$mostrar = "Valor";
	break;
	}
		}

switch ($modalidad_nu)
	{
	case "1":
		{
	$mostrar_nu = "Honorarios";
	break;
	}

case "2":
		{
	$mostrar_nu = "Gastos y Honorarios";
	break;
	}
	
	case "3":
		{
	$mostrar_nu = "Valor";
	break;
	}
	
		
	}

	//4511151
?>
<style type="text/css">
<!--
.Estilo2 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo7 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo8 {
	color: #000000;
	font-weight: bold;
}
-->
</style>


<form action ="convertir.php" method="post">
<table width="562" border="0">
  <tr bgcolor="#000099">
    <td height="33" colspan="4"><div align="center"><span class="Estilo2">CONVERSOR DE PRACTICAS </span></div></td>
    </tr>
  <tr>
    <td colspan="2" bgcolor="#E8DCFC"><div align="center" class="Estilo8">OBRA SOCIAL </div></td>
    <td width="184" colspan="2" bgcolor="#E1F2EF"><div align="center" class="Estilo8">MODALIDAD</div></td>
    </tr>
  <tr>
    <td width="119" bgcolor="#E8DCFC"><div align="right">DE:</div></td>
    <td width="196" bgcolor="#E8DCFC"><input type="text" name="sigla" id= "sigla" size ="20" value = <?php echo $sigla;?>>
      <?php echo $nro_os;?></td>
    <td colspan="2" bgcolor="#E1F2EF"><div align="center"><?php echo $mostrar;?>
          <input type="hidden" name="nro_os" id= "nro_os" size ="20" value = <?php echo $nro_os;?>>
    </div></td>
    </tr>
  <tr>
    <td bgcolor="#E8DCFC"><div align="right">A:</div></td>
    <td bgcolor="#E8DCFC"><input type="text" name="nueva_os" id= "nueva_os2" size ="20" value = <?php echo $sigla_nu;?>>
      <?php echo $nro_os_nu;?></td>
    <td colspan="2" bgcolor="#E1F2EF"><div align="center"><?php echo $mostrar_nu;?>
          <input type="hidden" name="nro_os_nu" id= "nro_os_nu" size ="20" value = <?php echo $nro_os_nu;?>>
    </div></td>
    </tr>
  <tr bgcolor="#000099">
    <td colspan="4"><div align="center" class="Estilo2"> OPCIONES</div></td>
    </tr>
  <tr>
    <td colspan="2" bgcolor="#E8DCFC"><div align="right">Encontrar la Base </div></td>
    <td colspan="2" bgcolor="#E1F2EF"><select name="encontrar_base[]" id="select4" value= "Ninguna">
      <option value="NO">NO</option>
      <option value="SI">SI</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#E8DCFC"><div align="right">Tipo de Practicas Afectadas</div></td>
    <td colspan="2" bgcolor="#E1F2EF"><select name="afectadas[]" id="select3" value= "Ninguna">
      <option value="1">Todas</option>
      <option value ="2">Solo Comunes</option>
	  <option value ="3">Solo Especiales</option>
	  <option value ="4">Solo Alta. Complejidad</option>
	  <option value ="5">Especiales y Alta</option>
	  
	  
	  
	  
    </select></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#E8DCFC"><div align="right">Sumar / Restar </div></td>
    <td colspan="2" bgcolor="#E1F2EF"><select name="suma_resta[]" id="select" value= "Ninguna">
      <option value="1">Ninguna    </option>
      <option value="2">Sumar </option>
      <option value ="3">Restar</option>
    </select></td>
    </tr>
  <tr>
    <td colspan="2" bgcolor="#E8DCFC"><div align="right">Porcentaje / Valor </div></td>
    <td colspan="2" bgcolor="#E1F2EF"><select name="porcentaje_valor[]" id="select2" value= "NInguna">
      <option value="1">Ninguna</option>
      <option value="2">Porcentaje</option>
      <option value ="3">Valor</option>
    </select></td>
    </tr>
  <tr>
    <td colspan="2" bgcolor="#E8DCFC"><div align="right">N&uacute;mero</div></td>
    <td colspan="2" bgcolor="#E1F2EF"><input type="text" name="importe" id= "importe" size ="5"></td>
    </tr>
  <tr>
    <td colspan="2" bgcolor="#E8DCFC"><div align="right">Encontrar Base </div></td>
    <td colspan="2" bgcolor="#E1F2EF"><input name="base" type="text" id= "base" size ="5"></td>
  </tr>
  <tr bgcolor="#000099">
    <td colspan="4"><div align="center"><span class="Estilo7">CONVERTIR DESDE UNIDAD DE GASTOS Y HONORARIOS A VALOR </span></div></td>
    </tr>
  <tr bgcolor="#E8DCFC">
    <td colspan="4"><div align="center">

      <input type="radio" name="condicion_2" value="SI">
  SI
    <input type="radio" name="condicion_2" value="NO" checked="TRUE">
  NO</div></td>
    </tr>
  <tr bgcolor="#E6E6E6">
    <td colspan="4"><div align="center">
      <input type="submit" name="enviar" value ="CONVERTIR">
    </div></td>
  </tr>
</table>
</form>

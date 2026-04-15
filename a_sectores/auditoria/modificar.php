<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />
<?php 
include ("../../conexiones/config.inc.php");
?>

<script language="javascript">
function on_load()
{
document.getElementById("nro_os").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "nro_os":
				document.getElementById("cod_practica").focus();
				break;

								case "cod_practica":
				document.getElementById("practica").focus();
				break;

								case "practica":
				document.getElementById("cod_equivalencia").focus();
				break;

								case "cod_equivalencia":
				document.getElementById("categoria").focus();
				break;

								case "categoria":
				document.getElementById("valor").focus();
				break;

				case "valor":
				document.getElementById("gastos").focus();
				break;

				case "gastos":
				document.getElementById("honorarios").focus();
				break;

								case "honorarios":
				document.getElementById("material_descartable_si").focus();
				break;

								case "material_descartable_si":
				document.getElementById("material_descartable_no").focus();
				break;

												case "material_descartable_no":
				document.getElementById("toma_si").focus();
				break;

								case "toma_si":
				document.getElementById("toma_no").focus();
				break;

								case "toma_no":
				document.getElementById("autorizada_si").focus();
				break;

								case "autorizada_si":
				document.getElementById("autorizada_no").focus();
				break;

								case "autorizada_no":
				document.getElementById("urgencia_si").focus();
				break;

								case "urgencia_si":
				document.getElementById("urgencia_no").focus();
				break;

											case "urgencia_no":
				document.getElementById("guardar").focus();
				break;


				

				
		}
		return false;
	}
	return true;
}






</script>

<?php 
$cod_practica = $_REQUEST['cod_practica'];
include ("variables.php");
?>

<BODY onload = "on_load ()">
<FORM name="form" ACTION="guardar_modificacion.php" METHOD = "POST">
<table width="850" border="0">
  <!--DWLayoutTable-->
  <tr align="center">
    <td colspan="4"><strong><img src="../../imagenes/nbu.jpg" width="846" height="35"></strong></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td width="130" height="24"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Codigo</font></div></td>
    <td width="79" valign="top"><div align="left">
      <input type="text"  name="cod_practica" size = "10" id="cod_practica" onKeyPress="return verif_caracter(this,event)" value="<?php echo $cod_practica;?>">
    </div></td>
    <td width="173" valign="top"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nombre </font></div></td>
    <td valign="top"><div align="left">
      <input type="text"  name="practica" size = "40" id="practica2" onKeyPress="return verif_caracter(this,event)" value="<?php echo $practica;?>">
    </div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Unidades: </font></div></td>
    <td colspan="3"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
        
		
		 <?php 
$sql = "SELECT * FROM unidades order by nombre_unidad";
$result = $db->Execute($sql);
echo "<select name=unidades[] size=1 id =nro_os onKeyPress='return verif_caracter(this,event)'>";

?><option value selected= "<?php "$unidad";?>"> <?php print("$unidad");?></option>
		 <?php 
echo"<option value=''>Seleccione Unidad</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod_unidad=$result->fields["nro_os"];
$unidad=$result->fields["unidad"];
$nombre_unidad=$result->fields["nombre_unidad"];

echo"<option value=$unidad>$unidad</option>";
$result->MoveNext();
	}
echo"</select>";
?> Nueva Unidad:




    </font>
        <input type="text"  name="nueva_unidad" size = "10" id="nueva_unidad" onKeyPress="return verif_caracter(this,event)">
    </div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Unidades Bioquimicas</font></td>
    <td colspan="2"><div align="left">
      <input  name="honorarios" type="text" id="honorarios" onKeyPress="return verif_caracter(this,event)" value="<?php echo $honorarios;?>" size = "10">
    </div></td>
    <td><div align="left">x 
        <input  name="por" type="text" id="por" onKeyPress="return verif_caracter(this,event)" value="<?php echo $por;?>" size = "10">
    </div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Categoria</font></div></td>
    <td colspan="2"><div align="left">
      <select name="categoria[]" id="categoria[]">
        <option value selected= "<?php "$categoria";?>"> <?php print("$nombre_categoria");?></option>
        <option value="1">1. Comunes</option>
        <option value="2">2. Especiales (NN)</option>
        <option value="3">3. Alta Complejidad</option>
      </select>
    </div></td>
    <td width="453"><div align="right"></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Metodo</font></div></td>
    <td colspan="3"><div align="left">
      <textarea name="metodo" rows="2" cols="80"><?php echo $metodo;?></textarea>
    </div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td colspan="4">Modelo de Referencia aconsejado dos renglones por columna y hasta que se llegue al margen izquierdo respectivamente. </td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td><div align="left">
      <p align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Referencia</font></p>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Columna 1 y 2 </font></p>
    </div></td>
    <td colspan="3">
      <div align="center">
  
	  <textarea name="referencia" class=estilotextarea2 cols="24" rows="10" id="referencia"><?php echo $referencia;?></textarea> 
      <textarea name="referencia1" class=estilotextarea2  cols="24" rows="10"id="referencia1"><?php echo $referencia1;?></textarea>
      </div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td><p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Referencia</font></p>
    <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Columna 3 y 4 </font></p></td>
    <td colspan="3"><div align="center">
      <textarea name="referencia2" class=estilotextarea2 cols="24" rows="10" id="referencia2"><?php echo $referencia2;?></textarea>
      <textarea name="referencia3" class=estilotextarea2 cols="24" rows="10" id="referencia3"><?php echo $referencia3;?></textarea>
    </div></td>
  </tr>
  <?php if ($salto == 0){?>
  <tr align="center">
    <td><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr align="center">
    <td>Salto de pagina </td>
    <td colspan="2"><div align="left">
      <input name="salto" type="radio" value="1">
      SI
      <input name="salto" type="radio" value="0" checked>
      NO</div></td>
  </tr>
  <?php }else{?>
  <tr align="center">
    <td>Salto de pagina </td>
    <td colspan="2"><div align="left">
      <input name="salto" type="radio" value="1" checked>
      SI
      <input name="salto" type="radio" value="0" >
      NO</div></td>
  </tr>
  <?php }?>
  <tr align="center" bordercolor="#FFFFFF">
    <td>&nbsp;</td>
    <td colspan="3"><input name="Alta2" type="submit"  value="Guardar Modificaci&oacute;n" id ="Alta"></td>
  </tr>
</table>


  








 




















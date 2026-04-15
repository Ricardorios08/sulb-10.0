<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />
<?php 
include ("../../../conexiones/config.inc.php");
?>

<script language="javascript">
function on_load()
{
document.getElementById("cod_practica").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "columna1":
				document.getElementById("desde").focus();
				break;

								case "desde":
				document.getElementById("hasta").focus();
				break;

								case "hasta":
				document.getElementById("columna2").focus();
				break;

								case "columna2":
				document.getElementById("anio_d").focus();
				break;

								case "anio_d":
				document.getElementById("anio_h").focus();
				break;

				case "anio_h":
				document.getElementById("OK").focus();
				break;

				


				

				
		}
		return false;
	}
	return true;
}






</script>

<?php 


include ("../../../conexiones/config.inc.php");

$sql1="select * from convenio_practica  order by cod_practica desc ";
$result = $db->Execute($sql1);

$cod_practica=$result->fields["cod_practica"] +1;


?>

<style type="text/css">
<!--
.Estilo3 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo5 {font-family: "Trebuchet MS"; font-size: 12px; color: #FFFFFF; }
body {
	background-image: url(../../../imagenes/presentacion/fondo6.jpg);
}
-->
</style>
<BODY onload = "on_load ()">

<FORM name="form" ACTION="guardar_modificacion_ref.php" METHOD = "POST">
  <table width="850" border="0" cellspacing="0" bgcolor="#EDEDED">
  <!--DWLayoutTable-->
  <tr align="center">
    <td colspan="4"><strong><img src="../../../imagenes/nbu.jpg" width="846" height="35"></strong></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td width="94" height="24" bgcolor="#C0C0C0"><div align="center" class="Estilo3">
      <div align="right"><font color="#000000">Codigo</font>:</div>
    </div></td>
    <td colspan="3" valign="top"><div align="left" class="Estilo3">
      <input type="text"  name="cod_practica" size = "10" id="cod_practica" onKeyPress="return verif_caracter(this,event)" value="<?php echo $cod_practica;?>">
      <font color="#000000">Nombre</font>:
      <input type="text"  name="practica" size = "70" id="practica2" onKeyPress="return verif_caracter(this,event)" value="<?php echo $practica;?>">
U. Bioq:
<input  name="honorarios" type="text" id="honorarios" onKeyPress="return verif_caracter(this,event)" value="<?php echo $honorarios;?>" size = "10">
    </div></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td bgcolor="#C0C0C0"> <div align="center" class="Estilo3">
      <div align="right"><font color="#000000">Unidades: </font></div>
    </div></td>
    <td width="109"><div align="left" class="Estilo3"><font color="#000000">
        
		
		 <?php 
$sql = "SELECT * FROM unidades order by nombre_unidad";
$result = $db->Execute($sql);
echo "<select name=unidades[] size=1 id =nro_os onKeyPress='return verif_caracter(this,event)'>";

?>
		 <option value selected= "<?php "$unidad";?>"> <?php print("$unidad");?></option>
		 <?php 
echo"<option value='seleccione'>Seleccione Unidad</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod_unidad=$result->fields["nro_os"];
$unidad=$result->fields["unidad"];
$nombre_unidad=$result->fields["nombre_unidad"];

echo"<option value=$unidad>$unidad</option>";
$result->MoveNext();
	}
echo"</select>";
?>
    </font></div></td>
    <td width="86"><div align="right"><span class="Estilo3"><font color="#000000">Nueva</font></span></div></td>
    <td width="553"><div align="left"><span class="Estilo3">
      <input type="text"  name="nueva_unidad" size = "10" id="nueva_unidad" onKeyPress="return verif_caracter(this,event)">
      Categoria
      <select name="categoria[]" id="categoria[]">
        <option value selected= "<?php "$categoria";?>"> <?php print("$nombre_categoria");?></option>
        <option value="1">1. Comunes</option>
        <option value="2">2. Especiales (NN)</option>
        <option value="3">3. Alta Complejidad</option>
      </select>
      <font color="#000000">Valor</font></span><span class="Estilo3">
      <input  name="valor" type="text" id="valor" onKeyPress="return verif_caracter(this,event)" value="<?php echo $valor;?>" size = "10">
      </span></div></td>
  </tr>
  

  <tr align="center" bordercolor="#FFFFFF">
    <td bgcolor="#C0C0C0"><div align="center" class="Estilo3">
      <div align="right"><font color="#000000"> Metodo</font>:</div>
    </div></td>
    <td colspan="3"><div align="left" class="Estilo3"><font color="#000000">
      <?php 
$sql = "SELECT * FROM metodos order by metodo";
$result = $db->Execute($sql);
echo "<select name=metodo[] size=1 id =nro_os onKeyPress='return verif_caracter(this,event)'>";

?>
      <option value selected= "<?php "$metodo";?>"> <?php print("$metodo");?></option>
      <?php 
echo"<option value='seleccione'>Seleccione Metodo</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod_metodo=$result->fields["cod_metodo"];
$metodo=$result->fields["metodo"];

echo"<option value='$metodo'>$metodo</option>";
$result->MoveNext();
	}
echo"</select>";
?>
    </font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td bgcolor="#C0C0C0"><div align="right"><span class="Estilo3"><font color="#000000">Nuevo Metodo:</font></span></div></td>
    <td colspan="3"><div align="left"><span class="Estilo3">
      <input name="nuevo_metodo" type="text"  size="80">
    </span></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td bgcolor="#C0C0C0"><div align="right"><span class="Estilo3"><font color="#000000">Opciones:</font></span></div></td>
    <td colspan="3"><div align="left"><span class="Estilo3">
      Clase:
      <select name="clase[]" id="select2">
         <option value selected= "<?php "$clase";?>"> <?php print("$nombre_clase");?></option>

        <option value="0">0. Simple</option>
        <option value="1">1. Compleja</option>
		<option value="2">2. Módulo</option>
		<option value="3">3. Texto</option>
          </select>
    Tipo Ref.
    <select name="tipo_det[]" id="tipo_det[]">
      <option value selected= "<?php "$tipo_det";?>"> <?php print("$tipo_det");?></option>
      <option value="Libre">Libre</option>
      <option value="Sexo+Libre">Sexo Libre</option>
      <option value="Desde-Hasta">Desde-Hasta</option>
      <option value="Des-Has+Sexo">Desde-Hasta+Sexo</option>
      <option value="Des-Has+años">Desde-Hasta+Años</option>
      <!-- <option value="Des-Has+Sexo+Años">Desde-Hasta+Sexo+Años</option> -->
      <option value="Hasta+Sexo">Hasta+Sexo</option>
      <!-- <option value="Hasta">Hasta</option> -->
      <!-- <option value="Mayor">Mayor</option> -->
      <option value="Sexo+Des-Has">Sexo+Des-Has</option>
      <option value="Sin Valor Ref.">Sin Valor Ref.</option>
      <option value="Años">Años</option>
      <option value="Años Sexo">Años Sexo</option>
      <option value="Valores">Valores</option>
      <option value="Valores Hasta">Valores Hasta</option>
      <option value="Valores Sexo">Valores Sexo</option>
    </select>
    </span><font color="#000000" class="Estilo3">Derivacion: 
    <?php if ($deriva == 1){?>
    <input name="deriva" type="checkbox" id="deriva" value="1" checked>
    <?php }else{?>
    <input name="deriva" type="checkbox" id="deriva" value="1">
    <?php }?>
    <?php 
$sql = "SELECT * FROM lab_realizacion order by nro_lab";
$result = $db->Execute($sql);
echo "<select name=lab_realizacion[] size=1 id =nro_os onKeyPress='return verif_caracter(this,event)'>";

?>
    <option value selected= "<?php "$nro_lab";?>"> <?php print("$nombre_lab");?></option>
    <?php 
echo"<option value=''>Seleccione Laboratorio</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$nro_lab=$result->fields["nro_lab"];
$nombre=strtoupper($result->fields["nombre"]);
echo"<option value=$nro_lab>$nombre ($nro_lab)</option>";
$result->MoveNext();
 
	}
echo"</select>";
?>
</font></div></td>
  </tr>

  <?php if ($decimal == 0){?>
  <tr align="center" bordercolor="#FFFFFF">
    <td bgcolor="#C0C0C0"><div align="right"><span class="Estilo3"><font color="#000000">Tipo N&deg; </font>:</span></div></td>
    
	<td colspan="3">
      <div align="left"><span class="Estilo3">
        <input name="decimal" type="radio" value="0" checked>
        DECIMALES (147.50) 
        <input name="decimal" type="radio" value="1">
		ENTERO 147
              </span></div></td>
  </tr>
  <?php }else{?>
  <tr align="center" bordercolor="#FFFFFF">
    <td bgcolor="#C0C0C0"><div align="right"><span class="Estilo3"><font color="#000000">Tipo N&deg; </font>:</span></div></td>
    
	<td colspan="3">
      <div align="left"><span class="Estilo3">
        <input name="decimal" type="radio" value="0" >
        DECIMALES (147.50) 
        <input name="decimal" type="radio" value="1" checked>
		ENTERO 147
              </span></div></td>
  </tr>
  <?php }?>


 
  
  <tr align="center" bordercolor="#FFFFFF">
    <td bgcolor="#C0C0C0"><div align="right"><span class="Estilo3">M&oacute;dulo: </span></div></td>
    <td colspan="3"><div align="left"><span class="Estilo3">
      <input  name="modulo1" type="text" id="modulo1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $modulo1;?>" size = "6">
    </span>-<span class="Estilo3">
    <input  name="modulo2" type="text" id="modulo2" onKeyPress="return verif_caracter(this,event)" value="<?php echo $modulo2;?>" size = "6">
    </span>-<span class="Estilo3">
    <input  name="modulo3" type="text" id="modulo3" onKeyPress="return verif_caracter(this,event)" value="<?php echo $modulo3;?>" size = "6">
    </span>-<span class="Estilo3">
    <input  name="modulo4" type="text" id="modulo4" onKeyPress="return verif_caracter(this,event)" value="<?php echo $modulo4;?>" size = "6">
    </span>-<span class="Estilo3">
    <input  name="modulo5" type="text" id="modulo5" onKeyPress="return verif_caracter(this,event)" value="<?php echo $modulo5;?>" size = "6">
    </span>-<span class="Estilo3">
    <input  name="modulo6" type="text" id="modulo6" onKeyPress="return verif_caracter(this,event)" value="<?php echo $modulo6;?>" size = "6">
    </span>-<span class="Estilo3">
    <input  name="modulo7" type="text" id="modulo7" onKeyPress="return verif_caracter(this,event)" value="<?php echo $modulo7;?>" size = "6">
    </span>-<span class="Estilo3">
    <input  name="modulo8" type="text" id="modulo8" onKeyPress="return verif_caracter(this,event)" value="<?php echo $modulo8;?>" size = "6">
    </span>-<span class="Estilo3">
    <input  name="modulo9" type="text" id="modulo9" onKeyPress="return verif_caracter(this,event)" value="<?php echo $modulo9;?>" size = "6">
    </span>-<span class="Estilo3">
    <input  name="modulo10" type="text" id="modulo10" onKeyPress="return verif_caracter(this,event)" value="<?php echo $modulo10;?>" size = "6">
    </span>-<span class="Estilo3">
    <input  name="modulo11" type="text" id="modulo11" onKeyPress="return verif_caracter(this,event)" value="<?php echo $modulo11;?>" size = "6">
    </span>-<span class="Estilo3">
    <input  name="modulo12" type="text" id="modulo12" onKeyPress="return verif_caracter(this,event)" value="<?php echo $modulo12;?>" size = "6">
    </span>-<span class="Estilo3">
    <input  name="modulo13" type="text" id="modulo13" onKeyPress="return verif_caracter(this,event)" value="<?php echo $modulo13;?>" size = "6">
    <input name="Alta" type="submit"  value="Guardar" id ="Alta">
    </span></div></td>
  </tr>
  
  
 
  <tr align="center" bordercolor="#FFFFFF">
    <td colspan="4" bgcolor="#333333"><span class="Estilo5">Agregar Valor de Referencia </span></td>
  </tr>
</table>

  <table width="850" border="0" cellspacing="0">
  <tr align="center" bordercolor="#FFFFFF">
    <td width="49" rowspan="2" bgcolor="#C0C0C0"><span class="Estilo3">N&deg;</span></td>
    <td width="49" rowspan="2" bgcolor="#C0C0C0"><span class="Estilo3">Tipo</span></td>
    <td colspan="3" bgcolor="#C0C0C0"><span class="Estilo3">Valores Normales </span></td>
    <td bgcolor="#C0C0C0"><span class="Estilo3">Titulos</span></td>
    <td colspan="3" bgcolor="#C0C0C0"><span class="Estilo3">A&ntilde;os</span></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td width="104" bgcolor="#C0C0C0"><span class="Estilo3">Col 1 </span></td>
    <td width="130" bgcolor="#C0C0C0"><span class="Estilo3">Desde</span></td>
    <td width="179" bgcolor="#C0C0C0"><span class="Estilo3">Hasta</span></td>
    <td width="136" bgcolor="#C0C0C0"><span class="Estilo3">Col 2 </span></td>
    <td width="116" bgcolor="#C0C0C0"><span class="Estilo3">Desde</span></td>
    <td width="114" bgcolor="#C0C0C0"><span class="Estilo3">Hasta</span></td>
    <td width="64" bgcolor="#C0C0C0">&nbsp;</td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td bgcolor="#EDEDED"><div align="center"><span class="Estilo3">
      <select name="nro_ref[]" id="nro_ref">
	     <optgroup label="SEL.">
        <option value="<?php echo $nro_ref;?>"><?php echo $nro_ref;?></option>
        <option value="0">0</option>
		<option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
     
          </select>
    </span></div></td>
    <td bgcolor="#EDEDED"><div align="center"><span class="Estilo3">
      <select name="tipo[]" id="select">
        <optgroup label="SELECCIONADA">
        <option value="<?php echo $tipo;?>"><?php echo $tipo;?></option>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
      </select>
    </span></div></td>
    <td bgcolor="#EDEDED"><span class="Estilo3">
      <input  name="columna1" type="text" id="columna1" value="<?php echo $columna1;?>" onKeyPress="return verif_caracter(this,event)" size = "15" maxlength="15"  >
    </span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3">
      <input type="text"  name="desde" size = "10" id="desde" value="<?php echo $desde;?>" onKeyPress="return verif_caracter(this,event)">
    </span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3">
      <input type="text"  name="hasta" size = "10" id="hasta" value="<?php echo $hasta;?>" onKeyPress="return verif_caracter(this,event)">
    </span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3">
      <input  name="columna2" type="text" id="columna2" value="<?php echo $columna2;?>" onKeyPress="return verif_caracter(this,event)" size = "15" maxlength="20">
    </span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3">
      <input type="text"  name="anio_d" size = "10" id="anio_d" value="<?php echo $anio_d;?>" onKeyPress="return verif_caracter(this,event)">
    </span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3">
      <input type="text"  name="anio_h" size = "10" id="anio_h" value="<?php echo $anio_h;?>" onKeyPress="return verif_caracter(this,event)">
    </span></td>
    <td bgcolor="#EDEDED"><label>
      <input type="submit" name="Alta" id = "OK" value="OK">
    </label></td>
  </tr>
</table>

</form>

<?php include ("detalle_referencia.php");?>

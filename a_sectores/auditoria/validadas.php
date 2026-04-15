<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Estilo12 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo11 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
-->


</style>
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
				

				case "mes":
				document.getElementById("anio").focus();
				break;
				
				case "anio":
				document.getElementById("nro_os").focus();
				break;

				case "nro_os":
				document.getElementById("Alta").focus();
				break;

				
				break;
		}
		return false;
	}
	return true;
}



</script>

</head>

<body  onload = "on_load ()" background="../../../IMAGENES/botones/barra/fondo.gif">


<FORM name="form" ACTION="menu_validadas.php" METHOD = "POST">
<?php $primera = 1;
 $anio_actual = date("y");
?>

	<table width="103%" border="0">
          <tr bgcolor="#000099">
            <th width="100%" scope="col"><span class="Estilo12">VALIDACION DE ORDENES: <?php echo $hoy=date("d/m/y");?></span></th>
          </tr>
      <tr bgcolor="#E6E6E6">
        <td><div align="left"><span class="Estilo11"> Seleccione Mes:
                  <select name="mes[]" id="select2" onkeypress="return verif_caracter(this,event)">
                    <option value = "01">ENERO</option>
                    <option value = "02">FEBRERO</option>
                    <option value = "03">MARZO</option>
                    <option value = "04">ABRIL</option>
                    <option value = "05">MAYO</option>
                    <option value = "06">JUNIO</option>
                    <option value = "07">JULIO</option>
                    <option value = "08">AGOSTO</option>
                    <option value = "09">SETIEMBRE</option>
                    <option value = "10">OCTUBRE</option>
                    <option value = "11">NOVIEMBRE</option>
                    <option value = "12">DICIEMBRE</option>
                  </select>
&nbsp;&nbsp;&nbsp;&nbsp;Año:
  <input name="anio" type="text" id="anio" value="<?php echo $anio_actual;?>" size="5" onkeypress="return verif_caracter(this,event)">
&nbsp;&nbsp;&nbsp;&nbsp;Obra Social:
  <input name="nro_os" type="text" id="nro_os" size="5" onkeypress="return verif_caracter(this,event)">
&nbsp;&nbsp;&nbsp;&nbsp;  <select name="descarga[]" id="descarga" onkeypress="return verif_caracter(this,event)">
            <option value = "01">PANTALLA</option>
            <option value = "02">IMPRESORA</option>
            <option value = "03">EXCEL</option>
            
 
    </select>
    <input name="primera" type="hidden" value="2">
        </span></div></td>
      </tr>
      <tr bgcolor="#E6E6E6">
        <td><div align="center" class="Estilo11">
          <div align="left">Nombre de Lote:
            <input name="lote" type="text" id="lote2" size="36" onKeyPress="return verif_caracter(this,event)">
&nbsp;&nbsp;&nbsp;&nbsp;Marca:
<select name="marca[]" id="marca[]" onkeypress="return verif_caracter(this,event)">
              <option value = "">NINGUNO</option>
              <option value = "con_iva">CON IVA</option>
              <option value = "sin_iva">SIN IVA</option>
            </select>
            <input name="Alta" type="submit" value="OK" id ="Alta" size = "10" >
          </div>
        </div></td>
      </tr>
  </table>
</form>

</html>

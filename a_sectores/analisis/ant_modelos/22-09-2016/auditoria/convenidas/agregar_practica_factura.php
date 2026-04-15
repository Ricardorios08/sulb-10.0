<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />
<?php 
include ("../../conexiones/config.inc.php");
?>

<script language="javascript">
function on_load()
{
document.getElementById("columna1").focus();
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
if ($band != 1){
$cod_practica = $_REQUEST['cod_practica'];
}

$sql1="select * from convenio_practica  order by cod_practica asc ";
$result = $db->Execute($sql1);

$cod_practica=$result->fields["cod_practica"] +1;


 $borrar = $_REQUEST['borrar'];
  $mod = $_REQUEST['mod'];

  $nro_os = $_REQUEST['nro_os'];

include ("../../conexiones/config.inc.php");

$sql="select * from datos_os where nro_os like '$nro_os'";
$result = $db->Execute($sql);
  
 $sigla=ucwords($result->fields["sigla"]);
 $domicilio_l=ucwords($result->fields["domicilio_l"]);
 $denominacion=ucwords($result->fields["denominacion"]);
 $cuit=ucwords($result->fields["cuit"]);



 $sql1="SELECT * FROM convenio_practica_factura where cod_practica = $cod_practica and nro_os = $nro_os";
$result1 = $db->Execute($sql1);



$nro_os=$result1->fields["nro_os"];
$cod_equivalencia=$result1->fields["cod_equivalencia"]; 
$categoria=$result1->fields["categoria"]; 	
$honorarios=$result1->fields["honorarios"]; 	
$gastos=$result1->fields["gastos"]; 
$valor=$result1->fields["valor"]; 	
$practica=$result1->fields["practica"]; 	
$metodo=$result1->fields["metodo"]; 
$referencia=$result1->fields["referencia"];
$referencia1=$result1->fields["referencia1"];
$referencia2=$result1->fields["referencia2"];
$referencia3=$result1->fields["referencia3"];
 $unidad=$result1->fields["unidad"];
 $por=$result1->fields["por"];
 $clase=$result1->fields["clase"];
$salto=$result1->fields["salto"];
$decimal=$result1->fields["decimal"];

 $tipo_det=$result1->fields["tipo_det"];

  $lab_derivacion=$result1->fields["lab_derivacion"];
  $deriva=$result1->fields["deriva"];

  
switch($categoria){
	case "1":{$nombre_categoria = "1. Comunes";break;}
	case "2":{$nombre_categoria = "2. Especiales (NN)";break;}
	case "3":{$nombre_categoria = "3. Alta Complejidad";break;}
}


?>

<style type="text/css">
<!--
.Estilo3 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
<BODY onload = "on_load ()">

<FORM name="form" ACTION="guardar_modificacion_factura.php" METHOD = "POST">
  <table width="850" border="0" cellspacing="0" bgcolor="#EDEDED">
  <!--DWLayoutTable-->
  <tr align="center">
    <td colspan="2"><strong><img src="../../imagenes/nbu.jpg" width="846" height="35"></strong></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"><div align="right" class="Estilo3"><font color="#000000">N&deg; Obra Social</font></div></td>
    <td valign="top"><div align="left"><span class="Estilo3">
      <input type="text"  name="nro_os" size = "10" id="nro_os" onKeyPress="return verif_caracter(this,event)" value="<?php echo $nro_os;?>">
    </span><?php echo $sigla;?> - <?php echo $denominacion;?></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td width="169" height="24" bgcolor="#C0C0C0"><div align="center" class="Estilo3">
      <div align="right"><font color="#000000">Codigo</font>:</div>
    </div></td>
    <td width="677" valign="top"><div align="left" class="Estilo3">
      <input type="text"  name="cod_practica" size = "10" id="cod_practica" onKeyPress="return verif_caracter(this,event)" value="<?php echo $cod_practica;?>">
    </div></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"><div align="right"><span class="Estilo3"><font color="#000000">Nombre</font></span></div></td>
    <td valign="top"><div align="left"><span class="Estilo3">
      <input type="text"  name="practica" size = "70" id="practica2" onKeyPress="return verif_caracter(this,event)" value="<?php echo $practica;?>">
    </span></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"><div align="right"><span class="Estilo3">U. Bioq:</span></div></td>
    <td valign="top"><div align="left"><span class="Estilo3">
      <input  name="honorarios" type="text" id="honorarios" onKeyPress="return verif_caracter(this,event)" value="<?php echo $honorarios;?>" size = "10">
    </span></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"><div align="right"><span class="Estilo3">Valor:</span></div></td>
    <td valign="top"><div align="left"><span class="Estilo3">
      <input  name="valor" type="text" id="valor" onKeyPress="return verif_caracter(this,event)" value="<?php echo $valor;?>" size = "10">
    </span></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td bgcolor="#C0C0C0"> <div align="center" class="Estilo3">
      <div align="right">Categoria</div>
    </div></td>
    <td><div align="left" class="Estilo3">
      <select name="categoria[]" id="categoria[]">
        <option value selected= "<?php "$categoria";?>"> <?php print("$nombre_categoria");?></option>
        <option value="1">1. Comunes</option>
        <option value="2">2. Especiales (NN)</option>
        <option value="3">3. Alta Complejidad</option>
      </select>
    </div>
      <div align="right"></div>      <div align="left"></div></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td colspan="2" bgcolor="#C0C0C0"><span class="Estilo3">
      <input name="Alta" type="submit"  value="Guardar" id ="Alta">
    </span></td>
    </tr>
  

  <?php if ($decimal == 0){?>
  
  <?php }else{?>
  
  <?php }?>
</table>

</form>


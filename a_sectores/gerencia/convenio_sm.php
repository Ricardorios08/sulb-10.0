<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo25 {
	color: #000000;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<?php 
$bande_variables = 1;
include ("variables_convenio.php");

?>
<script language="javascript">


function on_load()
{
document.getElementById("tipo").focus();
}



function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "tipo":
				document.getElementById("dia").focus();
				
				break;
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("año").focus();
				break;
				case "año":
				document.getElementById("dia_2").focus();
				break;

				case "dia_2":
				document.getElementById("mes_2").focus();
				break;
				case "mes_2":
				document.getElementById("año_2").focus();
				break;
				case "año_2":
				document.getElementById("modalidad").focus();
				break;





				case "modalidad":
				document.getElementById("ug").focus();
				break;
				case "ug":
				document.getElementById("uh").focus();
				break;
				case "uh":
				document.getElementById("material_descartable").focus();
				break;
				case "material_descartable":
				document.getElementById("toma_muestra").focus();
				break;
				case "toma_muestra":
				document.getElementById("separacion").focus();
				break;
												
				case "separacion":
				document.getElementById("coseguro").focus();
				break;

				case "coseguro":
				document.getElementById("valor_porcentaje").focus();
				break;
				case "valor_porcentaje":
				document.getElementById("gastos").focus();
				break;
				case "gastos":
				document.getElementById("honorarios").focus();
				break;
				case "honorarios":
				document.getElementById("post_factura").focus();
				break;
				case "post_factura":
				document.getElementById("prorrateo").focus();
				break;
				case "prorrateo":
				document.getElementById("cuota").focus();
				break;
				case "cuota":
				document.getElementById("porcentaje").focus();
				break;
				case "porcentaje":
				document.getElementById("porcentaje_cuota").focus();
				break;
				case "porcentaje_cuota":
				document.getElementById("dia_3").focus();
				break;
				case "dia_3":
				document.getElementById("mes_3").focus();
				break;
				case "mes_3":
				document.getElementById("año_3").focus();
				break;
				case "año_3":
				document.getElementById("antiguedad").focus();
				break;
				case "antiguedad":
				document.getElementById("interes").focus();
				break;
				
				case "interes":
				document.getElementById("plan").focus();
				break;
						



				
		}
		return false;
	}
	return true;
}


</script>


<BODY onload = "on_load()">

<form action="guardar_convenios.php" method="post">
  <table width="750"  border="0">
    <tr>
      <td height="35" colspan="4"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><img src="../../imagenes/convenio.jpg" width="846" height="35"></font></div></td>
    </tr>
    <tr>
      <td width="388"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">OBRA SOCIAL</font></div></td>
      <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $sigla." (".$nro_os.")"." - ".$denominacion;?></font></td>
    </tr>
	<input type="hidden" name="nro_os" value = "<?php echo $nro_os;?>">
    <tr>
      <td colspan="4"><div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">ARANCEL PRACTICAS COMUNES </font></strong></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Modalidad</font></div></td>
      <td width="453" colspan="2"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
        </font><font color="#000000" face="Arial, Helvetica, sans-serif">
	    
	  </font>	 <font face="Arial, Helvetica, sans-serif">
	    
	  </font>      </div>        <select name="modalidad[]" tabindex="9"id="modalidad"onkeypress="return verif_caracter(this,event)"><optgroup label="Opcion Seleccionada">
	    <div align="left">
	      <option value selected= "<?php "$modalidad";?>"> <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php print("$modalida");?></font></option>
        </div>
        </optgroup>
	     <optgroup label="Cambiar por:">
	     <div align="left">
	       <option value = "1"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">NBU </font></option>
           <option value = "2"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">U.Bioquimicos/U.Gastos</font></option>
           <option value = "3"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Valor </font></option>
          </div>
	     </optgroup>
      </select>      </td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Unidad de Gastos </font></div></td>
      <td colspan="2"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
          <input type="text" name="ug" tabindex="10"id="ug"  size = "10" onKeyPress="return verif_caracter(this,event)" value ="<?php echo $ug;?>"> 
        </font></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Unidad de Bioquimicos</font></div></td>
      <td colspan="2"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
          <input type="text" name="uh" id="uh"  tabindex="11"size = "10" onKeyPress="return verif_caracter(this,event)" value ="<?php echo $uh;?>">
  NBU      </font></div></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center" class="Estilo25"><font size="2" face="Arial, Helvetica, sans-serif">ARANCEL PRACTICAS ESPECIALES </font></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Modalidad</font></div></td>
      <td colspan="2"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
        </font><font color="#000000" face="Arial, Helvetica, sans-serif">
          </font>        <font face="Arial, Helvetica, sans-serif">
            
          </font>      </div>        <select name="modalidad_especiales[]" tabindex="9"id="modalidad"onkeypress="return verif_caracter(this,event)"><optgroup label="Opcion Seleccionada">
          <div align="left">
            <option value selected= "<?php "$modalidad_especiales";?>"> <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php print("$modalida_especiales");?></font></option>
  

          </div>
        </optgroup>
          <optgroup label="Cambiar por:">
          <div align="left">
            <option value = "1"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">NBU </font></option>
            <option value = "2"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">U.Bioquimicos/U.Gastos</font></option>
            <option value = "3"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Valor </font></option>
          </div>
          </optgroup>
      </select>      </td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Unidad de Gastos </font></div></td>
      <td colspan="2"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
          <input type="text" name="ug_especiales" tabindex="10"id="ug"  size = "10" onKeyPress="return verif_caracter(this,event)" value ="<?php echo $ug_especiales;?>">
      </font></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Unidad de Bioquimicos</font></div></td>
      <td colspan="2"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
          <input type="text" name="uh_especiales" id="uh"  tabindex="11"size = "10" onKeyPress="return verif_caracter(this,event)" value ="<?php echo $uh_especiales;?>">
      NBU </font></div></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">ARANCEL ALTA COMPLEJIDAD</font></strong></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Modalidad</font></div></td>
      <td colspan="2"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
        </font><font color="#000000" face="Arial, Helvetica, sans-serif">
          </font>        <font face="Arial, Helvetica, sans-serif">
            
          </font>      </div>        <select name="modalidad_alta[]" tabindex="9"id="modalidad"onkeypress="return verif_caracter(this,event)"><optgroup label="Opcion Seleccionada">
          <div align="left">
            <option value selected= "<?php "$modalidad_alta";?>"> <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php print("$modalida_alta");?></font></option>
          </div>
        </optgroup>
          <optgroup label="Cambiar por:">
          <div align="left">
            <option value = "1"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">NBU </font></option>
            <option value = "2"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">U.Bioquimicos/U.Gastos</font></option>
            <option value = "3"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Valor </font></option>
          </div>
          </optgroup>
      </select>      </td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Unidad de Gastos </font></div></td>
      <td colspan="2"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
          <input type="text" name="ug_alta" tabindex="10"id="ug"  size = "10" onKeyPress="return verif_caracter(this,event)" value ="<?php echo $ug_alta;?>">
      </font></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Unidad de Bioquimicos</font></div></td>
      <td colspan="2"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
          <input type="text" name="uh_alta" id="uh"  tabindex="11"size = "10" onKeyPress="return verif_caracter(this,event)" value ="<?php echo $uh_alta;?>">
      NBU </font></div></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>TRATAMIENTO </strong></font></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Mat. Desc.</font><font size="2" face="Arial, Helvetica, sans-serif"> 677 </font></div></td>
      <td colspan="2"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
          </font><font face="Arial, Helvetica, sans-serif">		</font>      </div>        <select name="material_descartable[]" tabindex="12"id="material_descartable"onkeypress="return verif_caracter(this,event)"><optgroup label="Opcion seleccionada:">
		  <div align="left">
		    <option value selected= "<?php "$material_descartable";?>"> 
  		    <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php print("$mat");?></font></option>
	      </div>
        </optgroup>
    <optgroup label="Cambiar por:">
          <div align="left">
            <option value = "1"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">NO</font></option>
            <option value = "2"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Practica</font></option>
            <option value = "3"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Orden </font></option>
          </div>
    </optgroup>
      </select>      </td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Toma-Muestra</font><font size="2" face="Arial, Helvetica, sans-serif">. 998 </font></div></td>
      <td colspan="2"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
          </font><font face="Arial, Helvetica, sans-serif">      </font>      </div>        <select name="toma_muestra[]" tabindex="13"id="toma_muestra"onkeypress="return verif_caracter(this,event)"><optgroup label="Opcion seleccionada:">
		  <div align="left">
		    <option value selected= "<?php "$toma_muestra";?>"> <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php print("$tom");?></font></option>
          </div>
        </optgroup>
  <optgroup label="Cambiar por:">
	      <div align="left">
	        <option value = "1"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">NO</font></option>
            <option value = "2"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Practica</font></option>
            <option value = "3"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Orden </font></option>
          </div>
  </optgroup>
      </select>      </td>
    </tr>

<tr>
<td colspan="2"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Acto Bioquimico</font><font size="2" face="Arial, Helvetica, sans-serif">. 001 </font></div></td>
<td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
  <div align="left"><font color="#000000">
  
          <?php php

 if ($acto_bioquimico == ""){
	 $acto_bioquimico = "NO";
 }
	  switch ($acto_bioquimico) {


			  case "SI": {?>
				    <input type="radio" name="acto_bioquimico" tabindex="23"value="SI" checked="TRUE">
				    SI
				    <input type="radio" name="acto_bioquimico" tabindex="24"value="NO" >
			      NO</font></div></td>	
<?php 
				  break;   }

				  case "NO":{
										  ?>
				  <input type="radio" name="acto_bioquimico" tabindex="23"value="SI" >
				  SI
				  <input type="radio" name="acto_bioquimico" tabindex="24"value="NO" checked="TRUE">
				  NO<?php 
			  break;
			  }





			  }	    ?>
</tr>
    <tr>
      <td colspan="2"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">IVA</font></div></td>
      <td colspan="2"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
          <input type="text"tabindex="17"name="iva" id="iva"  size = "8" onKeyPress="return verif_caracter(this,event)"value = "<?php echo $iva;?>">
  %      </font></div></td>
    </tr>

	<?php 
		if ($dia_3 == "//"){
		$dia_3 = "";}
		if ($mes_3 == "//"){
		$mes_3 = "";}
		if ($año_3 == "//"){
		$año_3 = "";	   }
	
	?>
    <tr>
      <td colspan="4"><div align="center"><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">Presione el bot&oacute;n despu&eacute;s de llenar los datos del convenio</font></div></td>
    </tr>

    <tr>
      <td colspan="4"><div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">
          <input type="Submit" name="Submit" value="Guardar Modificación" target = "arriba" >
      </font></div></td>
    </tr>
  </table>
  <font color="#000099">  </font>
</form>
</html>

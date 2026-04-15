<?php 
include ("variables_convenio.php");

?>
<form action="modificar_convenios.php" method="post">
<table width="674" border="0" bgcolor="#FFFFCC">
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td height="21" colspan="3" bgcolor="#993300"><div align="center"><strong><font color="#FFFFCC">CONVENIOS</font></strong></div></td>
      <td height="21" colspan="4" bgcolor="#993300"><div align="center"><strong><font color="#FFFFCC">CAPITACION</font></strong></div></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td width="149" bordercolor="#FFFFCC" bgcolor="#FFFFCC"><div align="right">Obra 
          Social</div></td>
      <td colspan="2" bordercolor="#FFFFCC" bgcolor="#FFFFCC"> <div align="left"> 
          <input type="text" name="nro_os" id="nro_os"  size = "10" value = <?php echo "$a";?> tabindex="1" onKeyPress="return verif_caracter(this,event)">
        </div></td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"><div align="right">Prorrateo</div></td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"><div align="left"> 
          <input type="text" name="prorrateo" id="prorrateo"  tabindex="9" value ="<?php echo "$prorrateo";?>" size = "8" onKeyPress="return verif_caracter(this,event)">
        </div></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bordercolor="#FFFFCC" bgcolor="#FFFFCC"><div align="right">Fecha de 
          Inicio</div></td>
      <td colspan="2" bordercolor="#FFFFCC" bgcolor="#FFFFCC"> <input type="text" name="fecha_inicio"  id="fecha_inicio"  size = "10" value = "<?php echo "$inicio";?>" tabindex="2" onKeyPress="return verif_caracter(this,event)" >
      </td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"><div align="right">Cuota</div></td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"> <input type="text" name="cuota" tabindex="10"id="cuota"  size = "8" value = "<?php echo "$cuota";?>" onKeyPress="return verif_caracter(this,event)"> 
      </td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td height="23" bordercolor="#FFFFCC" bgcolor="#FFFFCC"><div align="right">Fecha 
          de Fin</div></td>
      <td colspan="2" bordercolor="#FFFFCC" bgcolor="#FFFFCC"> <input type="text" name="fecha_fin" tabindex="5" id="fecha_fin"  size = "10" value = "<?php echo "$fin";?>" onKeyPress="return verif_caracter(this,event)"> </td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"><div align="right">%</div></td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"><input type="text" name="porcentaje" tabindex="11"id="porcentaje"  size = "8" value = "<?php echo "$porcentaje";?>" onKeyPress="return verif_caracter(this,event)"></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td height="23" bordercolor="#FFFFCC" bgcolor="#FFFFCC"><div align="right">Tipo 
        </div></td>
      <td colspan="2" bordercolor="#FFFFCC" bgcolor="#FFFFCC"> 
	  
<?php 
SWITCH ($tipo)
{
case "1":
{
$tipo = "Permanente";
break;
}

case "2":
{
$tipo = "Renovable";
break;
}

}



?>
	  <select name="tipo[]" tabindex="8" id="tipo" onkeypress="return verif_caracter(this,event)">
      <option value selected= "<?php "$tipo";?>"> <?php print("$tipo");?></option>
	  <option value = "1">Permanente </option>
      <option value = "2">Renovable</option>
      </select> 
		

		</td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"><div align="right">% Cuota </div></td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"> <input type="text" name="porcentaje_cuota" tabindex="12"id="porcentaje_cuota"  size = "8" value = "<?php echo "$porcentaje_cuota";?>"  onKeyPress="return verif_caracter(this,event)"> 
      </td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#993300"> 
      <td height="21" colspan="3"><div align="center"><font color="#FFFFCC"><strong>ARANCEL</strong> 
          </font></div></td>
      <td height="21" colspan="4"><div align="center"><font color="#FFFFCC"><strong>FORMAS 
          DE PAGO</strong></font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bordercolor="#FFFFCC" bgcolor="#FFFFCC"><div align="right">Modalidad 
        </div></td>
      <td colspan="2" bordercolor="#FFFFCC" bgcolor="#FFFFCC">
	  

	    <?php 
SWITCH ($modalidad)
{
case "1":
{
$modalidad = "Honorarios";

break;
}

case "2":
{
$modalidad = "Gastos y Honorarios";
break;
}

case "3":
{
$modalidad = "Valor";
break;
}
}



?>
		
	


	  
	  <select name="modalidad[]" tabindex="13" id="modalidad"onkeypress="return verif_caracter(this,event)" >

	 <option value = "<?php "$modalidad";?>"> <?php print("$modalidad");?></option>
          <option value = "1">Honorarios </option>
		  <option value = "2">Gastos y Honorarios</option>
          <option value = "3">Valor </option>
        </select> </td>	


      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"><div align="right">Vencimiento 
        </div></td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"> <input type="text" name="vencimiento" id="vencimiento"  tabindex="16"size = "10"  value = "<?php echo "$vencimiento";?>" onKeyPress="return verif_caracter(this,event)">
      </td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bordercolor="#FFFFCC" bgcolor="#FFFFCC"> <div align="right">Unidad de 
          Gastos</div></td>
      <td colspan="2" bordercolor="#FFFFCC" bgcolor="#FFFFCC"> <input type="text" name="ug" tabindex="14"id="ug"  size = "10"  value = "<?php echo "$ug";?>"onKeyPress="return verif_caracter(this,event)"> 
      </td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"> <div align="right">Antiguedad 
        </div></td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"> <input type="text" tabindex="19"name="antiguedad" id="antiguedad"  size = "8" value = "<?php echo "$antiguedad";?>" onKeyPress="return verif_caracter(this,event)"> 
      </td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bordercolor="#FFFFCC" bgcolor="#FFFFCC"> <div align="right">Unidad de 
          Honorarios</div></td>
      <td colspan="2" bordercolor="#FFFFCC" bgcolor="#FFFFCC"> <input type="text" name="uh" id="uh"  tabindex="15"size = "10" value = "<?php echo "$uh";?>" onKeyPress="return verif_caracter(this,event)"> 
      </td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"><div align="right">Interes </div></td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"> <input type="text" tabindex="20"name="interes" id="interes"  size = "8" value = "<?php echo "$interes";?>" onKeyPress="return verif_caracter(this,event)"> 
      </td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td colspan="3" bordercolor="#FFFFCC" bgcolor="#FFFFCC">&nbsp;</td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"><div align="right">Plan </div></td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"> <input type="text" tabindex="21"name="plan" id="plan"  size = "8" value = "<?php echo "$plan";?>" onKeyPress="return verif_caracter(this,event)"> 
      </td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#993300"> 
      <td colspan="7"><div align="center"><font color="#FFFFCC"><strong>TRATAMIENTO</strong> 
          </font></div>
        <div align="center"><font color="#FFFFCC"></font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bordercolor="#FFFFCC"><div align="center"><font color="#000000">Material Descartable</font></div></td>
      <td width="102" bordercolor="#FFFFCC"><div align="center"><font color="#000000"> 
          
		  <?php 
SWITCH ($material_descartable)
{
case "1":
{
$material_descartable = "NO";
break;
}

case "2":
{
$material_descartable = "Practica";
break;
}

case "3":
{
$material_descartable = "Orden";
break;
}
}



?>
		  

		  <select name="material_descartable[]" tabindex="22"id="material"onkeypress="return verif_caracter(this,event)">

		  <option value selected= "<?php "$material_descartable";?>"> <?php print("$material_descartable");?></option>
            <option value = "1">NO</option>
            <option value = "2">Practica</option>
            <option value = "3">Orden </option>
          </select>
          </font><font color="#000000"> 
        </font></div></td>
      <td colspan="2" bordercolor="#FFFFCC"><div align="center"><font color="#000000">Toma y Muestra
      </font></div></td>
      <td width="112" bordercolor="#FFFFCC"><div align="center"><font color="#000000">

		  
		  	  <?php 
SWITCH ($toma_muestra)
{
case "1":
{
$toma_muestra = "NO";
break;
}

case "2":
{
$toma_muestra = "Practica";
break;
}

case "3":
{
$toma_muestra = "Orden";
break;
}
}



?>
		  
		  
		  
		  
		  
		  <select name="toma_muestra[]" tabindex="25"id="toma"onkeypress="return verif_caracter(this,event)">
       		  <option value selected= "<?php "$toma_muestra";?>"> <?php print("$toma_muestra");?></option>
			<option value = "1">NO</option>
            <option value = "2">Practica</option>
            <option value = "3">Orden </option>
          </select>
      </font></div></td>
      <td width="96" bordercolor="#FFFFCC"><div align="center">Acto Bioquimico</div></td>
      <td width="102" bordercolor="#FFFFCC"><div align="center">

	  		   <?php php
	  switch ($acto_bioquimico) {
			  case "SI": {?>
				  <input type="radio" name="acto_bioquimico" tabindex="23"value="SI" checked="TRUE">SI
				  <input type="radio" name="acto_bioquimico" tabindex="24"value="NO" >
				  NO</div></td>	<?php 
				  break;   }

				  case "NO":{?>
				  <input type="radio" name="acto_bioquimico" tabindex="23"value="SI" >
				  SI
				  <input type="radio" name="acto_bioquimico" tabindex="24"value="NO" checked="TRUE">
				  NO</div></td>
				 <?php 
			  break;
			  }
			  }	    ?>

  



    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td colspan="3" bordercolor="#FFFFCC" bgcolor="#993300"><div align="center"><strong><font color="#FFFFCC">OPCIONES</font></strong></div></td>
      <td colspan="4" bordercolor="#FFFF99" bgcolor="#993300"><div align="center"><font color="#FFFFCC"><strong>CRITERIOS</strong></font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bordercolor="#FFFFCC"><div align="right">Control Efector</div></td>
      <td colspan="2" bordercolor="#FFFFCC">
	  
	  		   <?php php
	  switch ($efector) {
			  case "SI": { ?>
				  <input type="radio" name="efector" value="SI"tabindex="26" checked="TRUE">
			        SI 
			       <input type="radio" name="efector" value="NO" tabindex="27">
			        NO </td><?php 
				  break;   }

				case "NO":{?>
			  <input type="radio" name="efector" value="SI"tabindex="26" >
		        SI 
				<input type="radio" name="efector" value="NO" tabindex="27"checked="TRUE">
		        NO </td>
			 <?php 
			  break;	  
			  }
			  } 
			  ?>
		  

	  



      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"><div align="right">Separacion</div></td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99">
	  
	  		  	  <?php 
SWITCH ($separacion)
{
case "1":
{
$separacion = "IVA";
break;
}

case "2":
{
$separacion = "SIN IVA";
break;
}

case "3":
{
$separacion = "PLAN";
break;
}
}


?>
		  
		
	  
	  <select name="separacion[]" tabindex="35"id="separacion"onkeypress="return verif_caracter(this,event)">
          
       		  <option value selected= "<?php "$separacion";?>"> <?php print("$separacion");?></option>
		  <option value = "1">IVA</option>
          <option value = "2">SIN IVA </option>
          <option value = "3">PLAN</option>
        </select> </td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bordercolor="#FFFFCC"><div align="right">Control Prescriptor</div></td>
      <td colspan="2" bordercolor="#FFFFCC">
	  

	  		   <?php php
	  switch ($prescriptor) {
			  case "SI": { ?>
	  <input type="radio" tabindex="28"name="prescriptor" value="SI" checked="TRUE">    SI 
        <input type="radio" name="prescriptor" tabindex="29"value="NO" > NO </td><?php 
			  break;   }

			case "NO":{?>
	
	  <input type="radio" tabindex="28"name="prescriptor" value="SI" >    SI 
        <input type="radio" name="prescriptor" tabindex="29"value="NO" checked="TRUE"> NO </td>   <?php 
			  break;	  }
							  }  ?>



      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"><div align="right">Coseguro</div></td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99">
	  
	  <?php 
SWITCH ($coseguro)
{
case "1":
{
$coseguro = "Valor por practica $";
break;
}

case "2":
{
$coseguro = "Valor por Orden $";
break;
}

case "3":
{
$coseguro = "Porcentaje por Practica %";
break;
}

case "3":
{
$coseguro = "Porcentaje por Orden %";
break;
}

}


       		
?>
		  
	  
	  <select name="coseguro" tabindex="36"id="coseguro"onkeypress="return verif_caracter(this,event)">
		  <option value selected= "<?php "$coseguro";?>"> <?php print("$coseguro");?></option>
		  <option value = "1">Valor por practica $</option>
          <option value = "2" selected>Valor por Orden $</option>
          <option value = "3" selected>Porcentaje por Practica %</option>
          <option value = "4" selected>Porcentaje por Orden %</option>
        </select></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bordercolor="#FFFFCC"><div align="right">Control Afiliados </div></td>
      <td colspan="2" bordercolor="#FFFFCC">
	  
      
		  
		   <?php php
	  switch ($afiliado) {
			  case "SI": { ?>
					  <input type="radio" tabindex="30"name="control_afiliados" value="SI" checked="TRUE">
        SI 
        <input type="radio" name="control_afiliados" tabindex="31"value="NO" >
        NO</td><?php 
			  break;   }

			case "NO":{?>
	
				  	  <input type="radio" tabindex="30"name="control_afiliados" value="SI" >
        SI 
        <input type="radio" name="control_afiliados" tabindex="31"value="NO" checked="TRUE">
        NO</td>   <?php 
			  break;	  }
							  }  ?>
		  
	  

	  
	  <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"><div align="right">Valor o Porcentaje 
        </div></td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"> <input type="text"tabindex="37"name="valor_porcentaje" id="importe_coseguro"  size = "8" value = "<?php echo "$valor_porcentaje";?>" onKeyPress="return verif_caracter(this,event)"> 
      </td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bordercolor="#FFFFCC"><div align="right">Imprimir Detalle</div></td>
      <td colspan="2" bordercolor="#FFFFCC">
	  
	  
		   <?php php
	  switch ($detalle) {
			  case "SI": { ?>
	  <input type="radio" tabindex="32"name="detalle" value="SI" checked="TRUE">
        SI 
        <input type="radio" name="detalle" tabindex="33"value="NO">
        NO</td>
<?php 
			  break;   }

			case "NO":{?>
	
				 	  <input type="radio" tabindex="32"name="detalle" value="SI" >
        SI 
        <input type="radio" name="detalle" tabindex="33"value="NO" checked="TRUE">
        NO</td>
  <?php 
			  break;	  }
							  }  ?>
		  
  
	  <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"><div align="right">Porcentaje 
          Gastos </div></td>

      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"> <input type="text" tabindex="37"name="gastos" id="gastos"  size = "8" value = "<?php echo "$gastos";?>" onKeyPress="return verif_caracter(this,event)"></td>

    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bordercolor="#FFFFCC"><div align="right">Inf. post Factura </div></td>
      <td colspan="2" bordercolor="#FFFFCC">
	  
	    <?php 
SWITCH ($post_factura)
{
case "1":
{
$post_factura = "Diskette";
break;
}

case "2":
{
$post_factura = "CD";
break;
}

case "3":
{
$post_factura = "Correo";
break;
}


}


       		
?>
	  <select name="post_factura[]" tabindex="34"id="post_factura"onkeypress="return verif_caracter(this,event)">
		  <option value selected= "<?php "$post_factura";?>"> <?php print("$post_factura");?></option>
		  <option value = "1">Diskette </option>
          <option value = "2">CD</option>
          <option value = "3">Correo</option>
        </select> </td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"><div align="right">Porcentaje 
          Honorarios </div></td>
      <td colspan="2" bordercolor="#FFFF99" bgcolor="#FFFF99"> <input type="text" tabindex="38"name="honorarios" id="honorarios"  size = "8" value = "<?php echo "$honorarios";?>"  onKeyPress="return verif_caracter(this,event)"> 
      </td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bordercolor="#FFFFCC" bgcolor="#FFFFCC">&nbsp;</td>
      <td colspan="2" bordercolor="#FFFFCC" bgcolor="#FFFFCC">&nbsp;</td>
      <td colspan="4" bordercolor="#FFFF99" bgcolor="#FFFF99"><div align="center"> 
          
		   <?php php
	  switch ($operacion) {
			  case "SUMA": { ?>
				  <input type="radio" name="operacion" tabindex="39"value="SUMA" checked="TRUE">
		          SUMA 
				  <input type="radio" name="operacion" tabindex="40"value="RESTA" >
		          RESTA</div></td><?php 
			  break;   }


			case "RESTA":{?>
	
				  <input type="radio" name="operacion" tabindex="39"value="SUMA" >
		          SUMA 
				  <input type="radio" name="operacion" tabindex="40"value="RESTA" checked="TRUE">
		          RESTA</div></td>   <?php 
			  break;	  }

				  			case "NO":{?>
	
				  <input type="radio" name="operacion" tabindex="39"value="SI" >
		          SUMA 
				  <input type="radio" name="operacion" tabindex="40"value="NO">
		          RESTA</div></td>   <?php 
			  break;	  }
						
							  }  ?>
		  
		  
		  
		  
		  
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
      <td colspan="7"><div align="center"> 
          <input type="button" name="Submit22" value="NUEVO" target = "arriba">
          <input type="RESET" name="Submit2" value="LIMPIAR" target = "arriba">
          <input type="Submit" name="Submit" value="GUARDAR" target = "arriba">
        </div></td>
    </tr>
  </table>
  <div align="center"></div>
  <div align="center"></div>
  <br>

  </form>
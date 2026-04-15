<script language="javascript">
function on_load()
{
document.getElementById("densidad").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "densidad":
				document.getElementById("leucocitos").focus();
				break;


				case "leucocitos":
				document.getElementById("piocitos").focus();
				break;

				case "piocitos":
				document.getElementById("hematies").focus();
				break;

				case "hematies":
				document.getElementById("cilindros").focus();
				break;


	case "cilindros":
				document.getElementById("amorfos").focus();
				break;
		 
	case "amorfos":
				document.getElementById("observaciones").focus();
				break;

		}
		return false;
	}
	return true;
}


</script>

<style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>

<H1 class=SaltoDePagina> 

<BODY onload = "on_load()">

<FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">


<?php 
include("../../conexiones/config.inc.php");
$cod_grabacion = $_REQUEST['cod_grabacion'];
$nro_practica= $_REQUEST['nro_practica'];
 $nro_paciente= $_REQUEST['nro_paciente'];


 $sql11="select * from detalle_orina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$valor=strtoupper($result11->fields["valor"]);
$referencia=strtoupper($result11->fields["referencia"]);


$densidad= $result11->fields["densidad"];
$color= $result11->fields["color"];
$aspecto= $result11->fields["aspecto"];
$sedimento= $result11->fields["sedimento"];
$reaccion= $result11->fields["reaccion"];
$proteinas= $result11->fields["proteinas"];
$glucosa= $result11->fields["glucosa"];
$biliares= $result11->fields["biliares"];
$cetonicos= $result11->fields["cetonicos"];
$hemoglobina= $result11->fields["hemoglobina"];
$epiteliales= $result11->fields["epiteliales"];
$leucocito= $result11->fields["leucocito"];
$piocitos= $result11->fields["piocitos"];
$hematies= $result11->fields["hematies"];
$cilindros= $result11->fields["cilindros"];
$mucus= $result11->fields["mucus"];
$uratos= $result11->fields["uratos"];

$nitritos= $result11->fields["nitritos"];

$observaciones = $result11->fields["observaciones"];
$otros= $result11->fields["otros"];
$ph= $result11->fields["ph"];

 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);



?>
<table width="650" border="0">
        <tr>
          <td><hr noshade></td>
        </tr>
        <tr>
          <td><span class="Estilo1">Determinacion: <?php echo $nro_practica;?> - <?php echo $nombre_practica;?></span></td>
        </tr>
</table>
      <table width="650" border="0">
        <tr>
          <td colspan="4"><hr noshade></td>
        </tr>
        <tr>
          <td width="145"><div align="center">EXAMEN FISICO </div></td>
          <td width="143"><div align="center">Examinada</div></td>
          <td colspan="2"><div align="center">EXAMEN QUIMICO </div></td>
        </tr>
        <tr>
          <td colspan="4"><hr noshade></td>
        </tr>
        <tr>
          <td>Densidad a 15* </td>
          <td><div align="left">
            <input name="densidad" type="text" id="densidad" value="<?php echo $densidad;?>" size="15" onKeyPress="return verif_caracter(this,event)">
          </div></td>
          <td width="125">Proteinas</td>
          <td width="99">            <input name="proteinas" type="text" id="proteinas" value="<?php echo $proteinas;?>" size="15">              
          <div align="left"></div></td></tr>
        <tr>
          <td>Color</td>
          <td>
            <div align="left">
              <select name="color[]" id="color[]">
			  <optgroup label="SELECCIONADA"> </optgroup> <option value="<?php echo $color;?>" selected><?php echo $color;?></option>    </optgroup>
			
                <option value="Amarillo">Amarillo</option>
                <option value="Amarillo Ambar">Amarillo Ambar</option>
				<option value="Amarillo Ambar Oscuro">Amarillo Ambar Oscuro</option>
                <option value="Amarillo Claro">Amarillo Claro</option>
                <option value="Amarillo Rojizo">Amarillo Rojizo</option>
                <option value="Amarillo Pardo">Amarillo Pardo</option>
                <option value="Amarillo Verdoso">Amarillo Verdoso</option>
<option value="Azul">Azul</option>
              </select>
            </div></td>
          <td>Glucosa</td>
          <td>            <input name="glucosa" type="text" id="glucosa" value="<?php echo $glucosa;?>" size="15">              
          <div align="left"></div></td></tr>
        <tr>
          <td>Aspecto</td>
          <td>
            <div align="left">
              <select name="aspecto[]" id="aspecto[]">
<optgroup label="SELECCIONADA"> </optgroup> <option value="<?php echo $aspecto;?>" selected><?php echo $aspecto;?></option>   </optgroup>
                <option value="L&iacute;mpido" >L&iacute;mpido</option>
                <option value="Lig. Opalescente">Lig. Opalescente</option>
                <option value="Opalescente">Opalescente</option>
                <option value="Turbio">Turbio</option>
              </select>
            </div></td>
          <td>Pigmentos Biliares </td>
          <td>            <input name="biliares" type="text" id="biliares" value="<?php echo $biliares;?>" size="15">              
          <div align="left"></div></td></tr>
        <tr>
          <td>Sedimento</td>
          <td>
            <div align="left">
              <select name="sedimento[]" id="select">
<optgroup label="SELECCIONADA"> </optgroup> <option value="<?php echo $sedimento;?>" selected><?php echo $sedimento;?></option>  
                <option value="Escaso" >Escaso</option>
                <option value="Regular">Regular</option>
                <option value="Abundante">Abundante</option>
              </select>
            </div></td>
          <td>Cuerpos Cetonicos </td>
          <td>            <input name="cetonicos" type="text" id="cetonicos" value="<?php echo $cetonicos;?>" size="15">              
          <div align="left"></div></td></tr>
        <tr>
          <td>Reacci&oacute;n</td>
          <td>
            <div align="left">
              <select name="reaccion[]" id="reaccion[]">
	<optgroup label="SELECCIONADA"> </optgroup> <option value="<?php echo $reaccion;?>" selected><?php echo $reaccion;?></option>  
                <option value="Acida" >Acida</option>
                <option value="Neutra">Neutra</option>
                <option value="Alcalina">Alcalina</option>
              </select>
            </div></td>
          <td>Hemoglobina</td>
          <td>            <input name="hemoglobina" type="text" id="hemoglobina" value="<?php echo $hemoglobina;?>" size="15">              
          <div align="left"></div></td></tr>
        <tr>
          <td>pH</td>
          <td><input name="ph" type="text" id="ph" value="<?php echo $ph;?>" size="15" onKeyPress="return verif_caracter(this,event)"></td>
          <td>Urobilinogeno</td>
          <td><input name="nitritos" type="text" id="nitritos" value="<?php echo $nitritos;?>" size="15"></td>
        </tr>
  </table>
      <table width="650" border="0">
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">EXAMEN MICROSCOPICO DEL SEDIMENTO </div></td>
        </tr>
        <tr>
          <td colspan="2"><hr noshade></td>
        </tr>
        <tr>
          <td width="215">CELULAS EPITELIALES </td>
          <td width="425"><select name="epiteliales[]" id="epiteliales[]">
		 <optgroup label="SELECCIONADA"> </optgroup> <option value="<?php echo $epiteliales;?>" selected><?php echo $epiteliales;?></option> 
            <option value="Muy Escasas">Muy Escasas</option>
            <option value="Escasas">Escasas</option>
            <option value="Regular">Regular</option>
                     <option value="Abundantes">Abundantes</option>
                    </select></td>
        </tr>
        <tr>
          <td>LEUCOCITOS</td>
          <td>          <input name="leucocito" type="text" id="leucocitos" value="<?php echo $leucocito;?>" size="50" onKeyPress="return verif_caracter(this,event)"></td>
        </tr>
        <tr>
          <td>PIOCITOS (pl. de pus) </td>
          <td>          <input name="piocitos" type="text" id="piocitos" value="<?php echo $piocitos;?>" size="50" onKeyPress="return verif_caracter(this,event)"></td>
        </tr>
        <tr>
          <td>HEMATIES</td>
          <td>          <input name="hematies" type="text" id="hematies" value="<?php echo $hematies;?>" onKeyPress="return verif_caracter(this,event)"size="50"></td>
        </tr>
        <tr>
          <td>CILINDROS</td>
          <td>          <input name="cilindros" type="text" id="cilindros" value="<?php echo $cilindros;?>" onKeyPress="return verif_caracter(this,event)" size="50"></td>
        </tr>
        <tr>
          <td>MUCUS</td>
          <td><select name="mucus[]" id="mucus[]">
			<optgroup label="SELECCIONADA"> </optgroup> <option value="<?php echo $mucus;?>" selected><?php echo $mucus;?></option> 
              
			  <option value="No Contiene">No contiene</option>
			  <option value="Escaso">Escaso</option>
              <option value="Regular">Regular</option>
              <option value="Abundante">Abundante</option>
                        </select></td>
        </tr>
        <tr>
          <td>CRISTALES</td>
          <td>          <input name="uratos" type="text" id="amorfos" value="<?php echo $uratos;?>" onKeyPress="return verif_caracter(this,event)" size="50"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td colspan="2">OTROS 
          <input name="otros" type="text" id="observaciones" value="<?php echo $otros;?>" size="60"></td>
        </tr>

        <tr>
          <td colspan="2">OBSERVACIONES: 
          <input name="observaciones" type="text" id="observaciones" value="<?php echo $observaciones;?>" size="60"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center"> 	
		  <input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
        <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
			  <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">
		
		
		<input type="submit" name="Submit" value="GUARDAR DATOS"></div></td>
  </tr></table>

</body>
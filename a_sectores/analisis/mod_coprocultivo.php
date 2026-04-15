<script language="javascript">
function on_load()
{
document.getElementById("celulas_epiteliales").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "celulas_epiteliales":
				document.getElementById("leucocitos").focus();
				break;
				case "leucocitos":
				document.getElementById("piocitos").focus();
				break;
				case "piocitos":
				document.getElementById("hematies").focus();
				break;

				
				case "hematies":
				document.getElementById("mucus").focus();
				break;
				case "mucus":
				document.getElementById("mucus1").focus();
				break;
				case "mucus1":
				document.getElementById("mucus2").focus();
				break;				

				case "mucus2":
				document.getElementById("nicolle").focus();
				break;
				case "nicolle":
				document.getElementById("nicolle1").focus();
				break;

				case "nicolle1":
				document.getElementById("nicolle2").focus();
				break;

				case "nicolle2":
				document.getElementById("cultivo").focus();
				break;

				case "cultivo":
				document.getElementById("cultivo1").focus();
				break;

				case "cultivo1":
				document.getElementById("cultivo2").focus();
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

<?php 
include("../../conexiones/config.inc.php");
$cod_grabacion = $_REQUEST['cod_grabacion'];
$nro_practica= $_REQUEST['nro_practica'];
 $nro_paciente= $_REQUEST['nro_paciente'];


 $sql11="select * from `detalle_coprocultivo` where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 
$celulas_epiteliales=$result11->fields["celulas_epiteliales"];
$leucocitos=$result11->fields["leucocitos"];
$piocitos=$result11->fields["piocitos"];
$hematies=$result11->fields["hematies"];
$mucus=$result11->fields["mucus"];
$mucus1=$result11->fields["mucus1"];
$mucus2=$result11->fields["mucus2"];
$nicolle=$result11->fields["nicolle"];
$nicolle1=$result11->fields["nicolle1"];
$nicolle2=$result11->fields["nicolle2"];
$cultivo=$result11->fields["cultivo"];
$cultivo1=$result11->fields["cultivo1"];
$cultivo2=$result11->fields["cultivo2"];


$sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);

$nombre_practica=strtoupper($result11->fields["practica"]);



?>
<BODY onload = "on_load()">
<FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">

<H1 class=SaltoDePagina> 
<table width="750" border="0">
        <tr>
          <td width="1480" colspan="2" bgcolor="#EDEDED"><div align="center"><span class="Estilo1">BACTERIOLOGICO</span></div></td>
        </tr>
</table>
      <table width="750" border="0">
        <tr>
          <td colspan="2"><div align="right">Celulas Epiteliales</div></td>
          <td width="531" colspan="2"><input name="celulas_epiteliales" type="text" id="celulas_epiteliales"   tabindex = "1" value="<?php echo $celulas_epiteliales;?>" onKeyPress="return verif_caracter(this,event)" size="80"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="right">Leucocitos</div></td>
          <td colspan="2"><input name="leucocitos" type="text" id="leucocitos"   tabindex = "1" value="<?php echo $leucocitos;?>" onKeyPress="return verif_caracter(this,event)" size="80"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="right">Piocitos</div></td>
          <td colspan="2"><input name="piocitos" type="text" id="piocitos"   tabindex = "1" value="<?php echo $piocitos;?>" onKeyPress="return verif_caracter(this,event)" size="80"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="right">Hematies</div></td>
          <td colspan="2"><input name="hematies" type="text" id="hematies"   tabindex = "1" value="<?php echo $hematies;?>" onKeyPress="return verif_caracter(this,event)" size="80"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="right">Mucus</div></td>
          <td colspan="2"><input name="mucus" type="text" id="mucus"   tabindex = "1" value="<?php echo $mucus;?>" onKeyPress="return verif_caracter(this,event)" size="80"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="right">Texto 1 </div></td>
          <td colspan="2"><input name="mucus1" type="text" id="mucus1"   tabindex = "1" value="<?php echo $mucus1;?>" onKeyPress="return verif_caracter(this,event)" size="80"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="right">Texto 2</div></td>
          <td colspan="2"><input name="mucus2" type="text" id="mucus2"   tabindex = "1" value="<?php echo $mucus2;?>" onKeyPress="return verif_caracter(this,event)" size="80"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="right">Coloracion de Gram-Nicolle </div></td>
          <td colspan="2">
              <div align="left">
<input name="nicolle" type="text" id="nicolle"  onKeyPress="return verif_caracter(this,event)"  tabindex = "1" value="<?php echo $nicolle;?>" size="80">                
.            </div>            
              <div align="center"></div></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="2"><input name="nicolle1" type="text" id="nicolle1"  onKeyPress="return verif_caracter(this,event)"  tabindex = "1" value="<?php echo $nicolle1;?>" size="80"></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="2"><input name="nicolle2" type="text" id="nicolle2"  onKeyPress="return verif_caracter(this,event)"  tabindex = "1" value="<?php echo $nicolle2;?>" size="80"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="right">Cultivo</div></td>
          <td colspan="2"><input name="cultivo" type="text" id="cultivo"  onKeyPress="return verif_caracter(this,event)" tabindex = "1" value="<?php echo $cultivo;?>" size="80"></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="2"><input name="cultivo1" type="text" id="cultivo1"  onKeyPress="return verif_caracter(this,event)" tabindex = "1" value="<?php echo $cultivo1;?>" size="80"></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="2"><input name="cultivo2" type="text" id="cultivo2"  tabindex = "1" value="<?php echo $cultivo2;?>" size="80"></td>
        </tr>
      </table>
  <table width="750" border="0">
        
        <tr>
          <td bgcolor="#EDEDED"><div align="center">
            <input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
            <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
            <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">
            <input type="submit" name="Submit" value="GUARDAR">
          </div></td>
  </tr></table>

</form>
      
    

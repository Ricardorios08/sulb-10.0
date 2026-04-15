<script language="javascript">
function on_load()
{
document.getElementById("suero").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "suero":
				document.getElementById("quilomicrones").focus();
				break;
				case "quilomicrones":
				document.getElementById("beta").focus();
				break;
				case "beta":
				document.getElementById("prebeta").focus();
				break;
				case "prebeta":
				document.getElementById("alfa").focus();
				break;
				case "alfa":
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

<?php 
include("../../conexiones/config.inc.php");
$cod_grabacion = $_REQUEST['cod_grabacion'];
$nro_practica= $_REQUEST['nro_practica'];
 $nro_paciente= $_REQUEST['nro_paciente'];

 $sql11="select * from detalle_lipidograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$suero=strtoupper($result11->fields["suero"]);
$quilomicrones=strtoupper($result11->fields["quilomicrones"]);
$beta=strtoupper($result11->fields["beta"]);
$prebeta=strtoupper($result11->fields["prebeta"]);
$alfa=strtoupper($result11->fields["alfa"]);

$observaciones =strtoupper($result11->fields["observaciones"]);




 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);



?>
<BODY onload = "on_load()">
<FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">

<H1 class=SaltoDePagina> 
<table width="750" border="0">
        <tr>
          <td width="740" colspan="2"><hr noshade></td>
        </tr>
        <tr>
          <td colspan="2"><span class="Estilo1">LIPIDOGRAMA ELECTROFORETICO </span></td>
        </tr>
        <tr>
          <td colspan="2">Soporte utilizado: gel de poliacrilamida </td>
        </tr>
</table>
      <table width="750" border="0">
        <tr>
          <td colspan="3"><hr noshade></td>
        </tr>
        
        <tr>
          <td><div align="center">Resultado:</div></td>
          <td width="289">&nbsp;</td>
          <td width="200">&nbsp;</td>
        </tr>
        <tr>
          <td width="247"><div align="right">Aspecto del suero: </div></td>
          <td colspan="2">
            <div align="left">
              <input name="suero" type="text" id="suero" value="<?php echo $suero;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            </div>            <div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="right">Quilomicrones</div></td>
          <td colspan="2"><div align="left">
              <input name="quilomicrones" type="text" id="quilomicrones" value="<?php echo $quilomicrones;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            </div>
              <div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="right">Beta lipoproteinas /ldl col.)  </div></td>
          <td colspan="2"><div align="left">
              <input name="beta" type="text" id="beta" value="<?php echo $beta;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            </div>
              <div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="right">Prebeta liproteinas (VLDE col)  </div></td>
          <td colspan="2"><div align="left">
              <input name="prebeta" type="text" id="prebeta" value="<?php echo $prebeta;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            </div>
              <div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="right">Alfa lipoproteinas (HDL col.) </div></td>
          <td colspan="2"><div align="left">
              <input name="alfa" type="text" id="alfa" value="<?php echo $alfa;?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            </div>
              <div align="center"></div></td>
        </tr>
        <tr>
          <td colspan="3"><div align="center">Conclusi&oacute;n: </div></td>
        </tr>
        <tr>
          <td colspan="3"><div align="center">
            <input name="observaciones" type="text" id="observaciones" tabindex = "1"   value="<?php echo $observaciones;?>" size="120" maxlength="120">
          </div></td>
        </tr>
      </table>
      <table width="750" border="0">
        
<tr>
          <td><hr noshade></td>
        </tr>
        
        <tr>
          <td><div align="center">
            <input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
            <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
            <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">
            <input type="submit" name="Submit" value="GUARDAR">
          </div></td>
  </tr></table>

</form>
      
    

   <div align="center"></div>

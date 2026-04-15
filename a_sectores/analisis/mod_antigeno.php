<script language="javascript">
function on_load()
{
document.getElementById("enzima").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "enzima":
				document.getElementById("elisa").focus();
				break;

				case "elisa":
				document.getElementById("razon_porcentual").focus();
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



 $sql11="select * from detalle_antigeno where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$enzima=strtoupper($result11->fields["enzima"]);
$elisa=strtoupper($result11->fields["elisa"]);
$razon_porcentual=strtoupper($result11->fields["razon_porcentual"]);
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
          <td><hr noshade></td>
        </tr>
        <tr>
          <td><span class="Estilo1">ANTIGENO PROSTATICO ESPECIFICO </span></td>
        </tr>
</table>
      <table width="750" border="0">
        <tr>
          <td colspan="4"><hr noshade></td>
        </tr>
        <tr>
          <td colspan="4"><div align="left">Met. Enzimainmunoensayo </div></td>
        </tr>
        
        <tr>
          <td colspan="4"><hr noshade></td>
        </tr>
        
        <tr>
          <td width="199">Resultado</td>
          <td width="189"><input name="enzima" type="text" id="enzima" value="<?php echo $enzima?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1"> 
            ng/ml</td>
          <td width="145">&nbsp;</td>
          <td width="199">&nbsp;</td>
        </tr>
        
        
        <tr>
          <td colspan="4"><div align="center">Valores referenciales </div></td>
        </tr>
        <tr>
          <td colspan="2">40 a 49 a&ntilde;os: 0.02 a 2.50 ng/ml </td>
          <td colspan="2">60 a 69 a&ntilde;os: 0.002 a 5.40 ng/ml </td>
        </tr>
        <tr>
          <td colspan="2">50 a 99 a&ntilde;os: 0.00 a 3.50 ng/ml </td>
          <td colspan="2">70 a 79 a&ntilde;os: 0.002 a 6.30 ng/ml </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"><span class="Estilo1">ANTIGENO PROSTATICO ESPECIFICO LIBRE </span></td>
        </tr>
        <tr>
          <td>Met. Elisa </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Resultado</td>
          <td><input name="elisa" type="text" id="elisa" value="<?php echo $elisa?>" size="8" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            ng/ml</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Razon porcentual: </td>
          <td><input name="razon_porcentual" type="text" id="razon_porcentual" value="<?php echo $razon_porcentual?>" size="8"  tabindex = "1">
            ng/ml</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"><div align="center">Valores referenciales </div></td>
        </tr>
        <tr>
          <td colspan="2">Con PSA TOTAL: 3-4 ng/ml </td>
          <td colspan="2">Con PSA TOTAL: 4.1 - 10.0 ng/ml</td>
        </tr>
        <tr>
          <td colspan="2">Raz&oacute;n Valor de Corte: </td>
          <td colspan="2">Raz&oacute;n Valor de Corte </td>
        </tr>
        <tr>
          <td colspan="2">Inferior al 10% del PSA TOTAL </td>
          <td colspan="2">Inferior al 26% del PSA TOTAL</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
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

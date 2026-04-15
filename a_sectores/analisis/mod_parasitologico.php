<script language="javascript">
function on_load()
{
document.getElementById("metodo_macro").focus();
document.getElementById("metodo_macro").select();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "metodo_macro":
				document.getElementById("resultado_macro").focus();
				document.getElementById("resultado_macro").select();
				break;
				case "resultado_macro":
				document.getElementById("metodo_micro").focus();
				document.getElementById("metodo_micro").select();
				break;
				case "metodo_micro":
				document.getElementById("resultado_micro").focus();
				document.getElementById("resultado_micro").select();
				break;
				case "resultado_micro":
				document.getElementById("resultado_micro1").focus();
				document.getElementById("resultado_micro1").select();
				break;


				case "resultado_micro1":
				document.getElementById("observaciones").focus();
				document.getElementById("observaciones").select();
				break;
				 
				
				


				
		}
		return false;
	}
	return true;
}


</script>

<style type="text/css">
<!--
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



 $sql11="select * from detalle_parasitologico where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$metodo_macro=$result11->fields["metodo_macro"];
$resultado_macro=$result11->fields["resultado_macro"];

$metodo_micro=$result11->fields["metodo_micro"];
$resultado_micro=$result11->fields["resultado_micro"];
$resultado_micro1=$result11->fields["resultado_micro1"];
$observaciones=$result11->fields["observaciones"];
 




 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);



?>
<BODY onload = "on_load()">
<FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">

<H1 class=SaltoDePagina>
<table width="750" border="0">
        
        
        
        <tr>
          <td colspan="4" bgcolor="#B8B8B8"> <div align="center"><strong>PARASITOLOGICO SERIADO </strong></div></td>
        </tr>
        <tr>
          <td width="200"><div align="center">EXAMEN MACROSCOPICO </div></td>
          <td width="534" colspan="3"><input name="metodo_macro" type="text" id="metodo_macro" value="<?php echo $metodo_macro;?>" size="80" onKeyPress="return verif_caracter(this,event)" tabindex = "1">            <div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center"> </div></td>
          <td colspan="3"><input name="resultado_macro" type="text" id="resultado_macro" value="<?php echo $resultado_macro;?>" size="80" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
              <div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center">EXAMEN MICROSCOPICO </div></td>
          <td colspan="3"><input name="metodo_micro" type="text" id="metodo_micro" value="<?php echo $metodo_micro;?>" size="80" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
              <div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center">  </div></td>
          <td colspan="3"><input name="resultado_micro" type="text" id="resultado_micro" value="<?php echo $resultado_micro;?>" size="80" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
              <div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center"></div></td>
          <td colspan="3"><input name="resultado_micro1" type="text" id="resultado_micro1" value="<?php echo $resultado_micro1;?>" size="80" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
              <div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center">OBSERVACIONES</div></td>
          <td colspan="3"><input name="observaciones" type="text" id="observaciones" value="<?php echo $observaciones;?>" size="80" onKeyPress="return verif_caracter(this,event)" tabindex = "1"></td>
        </tr>
  </table>
      <table width="750" border="0">
        
        <tr>
          <td><hr noshade></td>
        </tr>
        
        <tr>
          <td bgcolor="#B8B8B8"><div align="center">
            <input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
            <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
            <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">
            <input type="submit" name="Submit" value="GUARDAR">
          </div></td>
  </tr></table>

</form>
      
    



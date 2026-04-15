


<script language="javascript">
function on_load()
{
document.getElementById("nro_afiliado").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "nro_paciente":
				document.getElementById("nro_afiliado").focus();
				break;
				case "nro_afiliado":
				document.getElementById("apellido").focus();
				break;
					case "apellido":
				document.getElementById("nombre").focus();
				break;

				case "nombre":
				document.getElementById("nro_documento").focus();
				break;
				case "nro_documento":
				document.getElementById("nro_os").focus();
				break;
				case "nro_os":
				document.getElementById("domicilio").focus();
				break;

				case "domicilio":
				document.getElementById("telefono").focus();
				break;
				case "telefono":
				document.getElementById("celular").focus();
				break;
				case "celular":
				document.getElementById("dia").focus();
				break;
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("anio").focus();
				break;
				case "anio":
				document.getElementById("GUARDAR").focus();
				break;

				


				
		}
		return false;
	}
	return true;
}


function reemplazar(cadena,id)
{
var cadena = cadena.replace(/\W/g,"_");
document.getElementById(id).value=cadena;
}


</script>
<style type="text/css">
<!--
.Estilo25 {font-family: "Trebuchet MS"}
.Estilo26 {
	font-family: "Trebuchet MS";
	font-size: 18px;
	font-weight: bold;
	color: #FFFFFF;
}


.styled-select select {
   background: transparent;
   width: 268px;
   padding: 5px;
   font-size: 16px;
   line-height: 1;
   border: 0;
   border-radius: 0;
   height: 34px;
   -webkit-appearance: none;
   }
body {
	background-color: #FFFFFF;
}
.Estilo22 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo23 {font-size: 14px}
.Estilo24 {font-family: "Trebuchet MS"; font-size: 14px; }

-->
</style>
<BODY onload = "on_load()">

<?php 

$apellido = strtoupper($_REQUEST['nombre']);


if(is_numeric($nombre)) {
$nro_documento = $nombre;
$nombre = "";
}ELSE
{
$apellido = $apellido;
$nro_documento = "";


}
include ("../../conexiones/config.inc.php");
$sql="select * from pacientes ORDER BY nro_paciente DESC";
$result = $db->Execute($sql);

$nro_paciente=($result->fields["nro_paciente"] + 1);

?>
<form action="comparar_tablas.php" method="post">
<table width="850" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
    <td height="37" colspan="3" bgcolor="#666666"><div align="center" class="Estilo26">COMPARAR BASE (SOLO PARA ABM - SULB) </div></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td width="423" height="24" bgcolor="#B8B8B8">
      <div align="right" class="Estilo25">
        <div align="right"><font size="2">NOMBRE BASE 1 </font></div>
    </div></td>
    <td colspan="2" bgcolor="#F0F0F0"><font color="#000000" size="2">
      <input name="base1" type="text" id="base1"onKeyPress="return verif_caracter(this,event)"  size="14">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td height="24" bgcolor="#B8B8B8"><div align="right"><font size="2" class="Estilo25">NOMBRE BASE 2 </font></div></td>
    <td colspan="2" bgcolor="#F0F0F0"><font color="#000000" size="2">
      <input name="base2" type="text" id="base2"onKeyPress="return verif_caracter(this,event)"  size="14">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td height="24" bgcolor="#B8B8B8"><div align="right"><font size="2" class="Estilo25">Contrase&ntilde;a seguridad </font></div></td>
    <td colspan="2" bgcolor="#F0F0F0"><font color="#000000" size="2">
      <input name="contra1" type="password" id="contra"onKeyPress="return verif_caracter(this,event)"  size="14">
    </font></td>
  </tr>
  
  <tr bordercolor="#FFFFFF">
    <td height="26" colspan="3" valign="top" bgcolor="#666666"><div align="center">
        <input type="Submit" name="Submit" id ="GUARDAR" value="COMPARAR">
    </div></td>
  <tr>
    <td height="0"></td>
    <td width="106"></td>
    <td width="315"></td>
  </tr>
</table>



<?php 

 

$hoy = date("d-m-Y");
$mes = date("m");
$anio_actual = date ("y");

switch ($mes)
	{
		case "1":{$periodo= "ENE";}break;
		case "2":{$periodo= "FEB";}break;
		case "3":{$periodo= "MAR";}break;
		case "4":{$periodo= "ABR";}break;
		case "5":{$periodo= "MAY";}break;
		case "6":{$periodo= "JUN";}break;
		case "7":{$periodo= "JUL";}break;
		case "8":{$periodo= "AGO";}break;
		case "9":{$periodo= "SET";}break;
		case "10":{$periodo="OCT";}break;
		case "11":{$periodo="NOV";}break;
		case "12":{$periodo="DIC";}break;
				}



?>
<table width="849" border="0">
  <tr>
    <td colspan="2" bgcolor="#FFFF99"><div align="center"><strong>BASES DE LA PC </strong></div></td>
  </tr>
  <tr>
   
    
      <?php 
	
	
	include ("../../conexiones/config.inc.php");
	
	$cont = 0;
	 $sql = $sql = "SHOW DATABASES\n";
$result1 = $db->Execute($sql);

if (!$result1) die("fallo".$db->ErrorMsg());
while (!$result1->EOF) {

	

  $tabla=$result1->fields["Database"];


if (($tabla != 'information_schema') and ($tabla != 'performance_schema') and ($tabla != 'phpmyadmin') and ($tabla != 'mysql')){
$cont = $cont +1;
$conta = $conta +1;
?>
 <td width="120" valign="top"><div align="center" class="Estilo22"><?php echo $cont;?></div></td>
<td width="719" valign="top"><span class="Estilo24"><?php echo $tabla;?></span></td>

  
  <?php if ($conta == 4){$conta = 0;?>
  </tr>

<?php }

}

$result1->MoveNext();
	}?>
   

</table>

 

	



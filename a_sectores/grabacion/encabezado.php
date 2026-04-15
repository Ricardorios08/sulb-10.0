	<?php 
global $band_mes;
global $mes_grabacion;
$nro_os = 5073;

$B = 1;

$mes12;

if ($bandera_borrar != 2){

$me=$_POST["mes_actual"];
for ($i=0;$i<count($me);$i++)    
{     
$mes_actual= $me[$i];    
}
$bandera_borrar = 1;
}

$mes_pru = $mes;

$actual_mes = date("m");
$mes_actual;
switch ($actual_mes)
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

$po=$_POST["por"];
for ($i=0;$i<count($me);$i++)    
{     
$por= $po[$i];    
}

switch ($por)
	{
		case "1":{$por= "CODIGO DE AUTORIZACION";}break;
		case "2":{$por= "NUMERO DE ORDEN";}break;
		case "3":{$por= "NUMERO DE AFILIADO";}break;
				}



$nro_laboratorio = $_REQUEST['nro_laboratorio'];
$nro_afiliado = $_REQUEST['nro_afiliado'];


include ("../../../conexiones/config_os.php");

$sql="select * from datos_os where nro_os = '$nro_os'";
$result = $db->Execute($sql);
$sigla=strtoupper($result->fields["sigla"]);

?>
<script>
function on_load2()
{
document.getElementById("mes_actual").focus();
document.getElementById("mes_actual").style.backgroundColor = "#CCFFCC";
}

function on_load()
{
document.getElementById("palabra").focus();
document.getElementById("palabra").style.backgroundColor = "#FFFF66";
}



function on_os()
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

				case "mes_actual":
				document.getElementById("palabra").focus();
document.getElementById("mes_actual").style.backgroundColor = "#FFFFFF";
document.getElementById("palabra").style.backgroundColor = "#CCFFCC";
				break;

				case "palabra":
document.getElementById("palabra").style.backgroundColor = "#FFFFFF";
				document.getElementById("buscar").focus();
				break;

				case "buscar":
				document.getElementById("confirmada").focus();
				break;

				

				
		}
		return false;
	}
	return true;
}











</script>


<html>
<BODY onload = "on_load ()">
<FORM name="form" ACTION="<?php php echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">
<table width="583" border="0">
  <tr bgcolor="#00CC99">
    <td bgcolor="#FF0000"><div align="center"><font color="#FFFFFF" size="4"><strong>CONTROL PAMI</strong></font></div></td>
  </tr>
  <tr>
    <td height="28"><div align="center"><strong><font color="#009966" size="2">MES: <?php ECHO $periodo." - ";?>


 <input name = "mes_actual" type = "text" id="mes_actual" onKeyPress="return verif_caracter(this,event)" value="<?php php if (isset($_REQUEST['mes_actual'])) echo $_REQUEST['mes_actual'];?>" size = "4"> 


      BUSCAR POR AUTORIZACION: </font></strong>
        <input name = "palabra" type = "text" id="palabra" onKeyPress="return verif_caracter(this,event)" value="<?php echo $autorizacion;?>" size = "10">

	<!-- <input type = "hidden" name = "mes_pru" value="<?php ECHO $mes_pru;?>"> -->
        <font color="#FFFFFF">
      
		<input name="Alta" type="submit" value="BUSCAR" id ="buscar" size = "10" onKeyPress="return verif_caracter(this,event)">
        </font></div>      <div align="center"><font color="#FFFFFF">
          <strong><font color="#000000" size="2">
          </font></strong>
    </font></div></td>
    </tr>
</table>


<div align="left"></div>
</FORM>
<?php include ("../../../conexiones/config.inc.php");
$a = $_GET['id'];

	
$sql="select * from datos_estudio where matricula like '$a'";
$result = $db->Execute($sql);

$titulo=$result->fields["titulo"];
$universidad=$result->fields["universidad"];
$fecha_egresado=$result->fields["fecha_egresado"];
$asoc_origen=$result->fields["asoc_origen"];
$docente=$result->fields["docente"];

?>

<script language="javascript">
function on_load()
{
document.getElementById("matricula").focus();
}

function pagina2()
{
document.getElementById("matricula").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "matricula":
				document.getElementById("compania").focus();
				
				break;
				case "compania":
				document.getElementById("vigencia").focus();
				break;
				case "vigencia":
				document.getElementById("vencimiento").focus();
				break;
				
				
				



				
		}
		return false;
	}
	return true;
}


</script>

<BODY onload = "on_load()">
<form action="guardar_seguro.php" method="post">
<table width="339" border="0">
    <!--DWLayoutTable-->
    <tr align="center" bordercolor="#FFFFFF" bgcolor="#993300">
      <td height="29" align="center"><div align="center"><font color="#FFFFCC"><strong>SEGURO MALA PRAXIS 
        
      </strong></font> </div></td>
      <td height="29"><font color="#FFFFCC"><strong>
        <input type="Submit" name="Submit342" value="GUARDAR" target = "arriba">
      </strong></font></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC">
      <td width="235" bgcolor="#FFFF99">
             <div align="left"><font color="#000000">1. MATRICULA</font></div></td>
      <td width="94" bgcolor="#FFFFCC">
          <div align="center"><font color="#000000" size="2">
          <input type="text" name="matricula" id="matricula" onKeyPress="return verif_caracter(this,event)" size="15" >
          </font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#EEEEEE">
      <td height="24" bgcolor="#FFFF99">
        <div align="left"><font color="#000000">2. Compa&ntilde;ia </font></div></td>
      <td bgcolor="#FFFFCC">        <div align="center"><font color="#000000" size="2">
        <input type="text" name="compania" id="compania"  size="15"onKeyPress="return verif_caracter(this,event)">      
      </font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
      <td height="24" bgcolor="#FFFF99"><div align="left"><font color="#000000">3. Vigencia</font></div></td>
      <td bgcolor="#FFFFCC">        <div align="center"><font color="#000000" size="2">
        <input type="text" name="vigencia" id="vigencia" size="15"onKeyPress="return verif_caracter(this,event)">      
      </font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24" bgcolor="#FFFF99"><div align="left"><font color="#000000">4. Vencimiento </font></div></td>
      <td bgcolor="#FFFFCC">         <div align="center"><font color="#000000" size="2">
        <input type="text" name="vencimiento"  id="vencimiento"  size="15" onKeyPress="return verif_caracter(this,event)">
      </font></div></td>
    </tr>
</table>








<script language="javascript">
function on_load()
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
				case "nro_os":
				document.getElementById("cod_practica").focus();
				break;

								case "cod_practica":
				document.getElementById("practica").focus();
				break;

								case "practica":
				document.getElementById("cod_equivalencia").focus();
				break;

								case "cod_equivalencia":
				document.getElementById("categoria").focus();
				break;

								case "categoria":
				document.getElementById("valor").focus();
				break;

				case "valor":
				document.getElementById("gastos").focus();
				break;

				case "gastos":
				document.getElementById("honorarios").focus();
				break;

								case "honorarios":
				document.getElementById("material_descartable_si").focus();
				break;

								case "material_descartable_si":
				document.getElementById("material_descartable_no").focus();
				break;

												case "material_descartable_no":
				document.getElementById("toma_si").focus();
				break;

								case "toma_si":
				document.getElementById("toma_no").focus();
				break;

								case "toma_no":
				document.getElementById("autorizada_si").focus();
				break;

								case "autorizada_si":
				document.getElementById("autorizada_no").focus();
				break;

								case "autorizada_no":
				document.getElementById("urgencia_si").focus();
				break;

								case "urgencia_si":
				document.getElementById("urgencia_no").focus();
				break;

											case "urgencia_no":
				document.getElementById("guardar").focus();
				break;


				

				
		}
		return false;
	}
	return true;
}






</script>


<BODY background="../../../imagenes/presentacion/fondo6.jpg" onload = "on_load ()">

<form action="guardar_alergeno.php" method="post">
<table width="850" border="0">
  <!--DWLayoutTable-->
  <tr align="center">
    <td height="37" colspan="2" bgcolor="#B8B8B8"><strong> NUEVO ALERGENO </strong></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#B8B8B8"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nombre Alergeno 
      
    </font>      
      <div align="left"></div></td>
    <td bgcolor="#EDEDED"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
      <input type="text"  name="rast" size = "80" id="rast" onKeyPress="return verif_caracter(this,event)">
      <input name="Alta" type="submit"  value="Guardar" id ="Alta">
    </font></div></td>
  </tr>
</table>


  
<?php 
include ("ver_alergeno.php");



?>
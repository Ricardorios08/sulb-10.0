<link href="../css/fondo.css" rel="stylesheet" type="text/css" />
<link href="../../css/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<script language="javascript">
function on_load()
{
document.getElementById("boton").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				

				case "nro_laboratorio":
				document.getElementById("matricula").focus();
				break;
				
				case "matricula":
				document.getElementById("participacion").focus();
				break;

				
				break;
		}
		return false;
	}
	return true;
}



</script>

<style type="text/css">
<!--
.Estilo4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo9 {color: #000000}
.Estilo25 {font-size: 16px}
-->
</style>
<BODY onload = "on_load ()">

<div class="alert alert-danger" role="alert"><?php echo $leyenda;?></div>
   <button type="button" id="myButton" data-loading-text="Loading..." class="btn btn-primary" autocomplete="off" onClick="history.back()" onKeyPress="history.back()">
 Presione ENTER o CLICK para volver
</button>

<!-- <table width="850" border="0" cellspacing="0">
  <tr>
    <th height="36" bgcolor="#B8B8B8" scope="col">&nbsp;</th>
    <th height="36" bgcolor="#B8B8B8" scope="col"><span class="Estilo1 Estilo4">
      <input class="alert alert-danger" name="button" type="button" id ="boton" onClick="history.back()" onKeyPress="history.back()" value="Presione ENTER para volver">
    </span></th>
  </tr>
</table> -->


<!-- <table width="850" border="0" cellspacing="0">
  <tr>
    <th width="58" height="40" bgcolor="#EDEDED" scope="col"><span class="Estilo1 Estilo4 Estilo9"><blink></blink></span><span class="Estilo1 Estilo4 Estilo9"><blink><img src="../../imagenes/alerta.gif" width="46" height="41" alt="alerta"></blink></span></th>
    <th width="782" bgcolor="#EDEDED" scope="col"><span class="Estilo1 Estilo4 Estilo9"><span class="Estilo25" bgcolor="#000000"><?php echo $leyenda;?></span></span></th>
  </tr>
  <tr>
    <th height="36" bgcolor="#B8B8B8" scope="col">&nbsp;</th>
    <th height="36" bgcolor="#B8B8B8" scope="col"><span class="Estilo1 Estilo4">
      <input name="button" type="button" id ="boton" onClick="history.back()" onKeyPress="history.back()" value="Presione ENTER para volver">
    </span></th>
  </tr>
</table> -->
<link href="../../../css/fondjjo.css" rel="stylesheet" type="text/css" />

<script language="javascript">
function on_load()
{
document.getElementById("nro_paciente").focus();
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


</script>

<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo2 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
<BODY onload = "on_load()">

<?php 
include ("../../../conexiones/config.inc.php");

$usuario = $_REQUEST['usuario'];

 
$sql="select * from informe where id = $usuario";
 
$result = $db->Execute($sql);

$caratula=strtoupper($result->fields["caratula"]);
$hoja=strtoupper($result->fields["hoja"]);
$firma=strtoupper($result->fields["firma"]);
$modelo=strtoupper($result->fields["modelo"]);


?>
<form action="guardar.php" method="post">
<table width="850" border="0">
    <!--DWLayoutTable-->
    <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td height="26" colspan="2"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><img src="../../../imagenes/datos_informe.jpg" width="846" height="35"></font></div></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td width="403" height="24">
      <div align="right" class="Estilo1"><font color="#000000" size="2"><font color="#000000">Desea Imprimir la Caratula </font>  </font></div></td>
      <td width="439">
	  
<?php  if ($caratula == "SI"){?>
<div align="left" class="Estilo2"><input name="caratula" type="radio" value="SI" checked>SI
<input name="caratula" type="radio" value="NO">NO</div>
<?php }else{?>
<div align="left" class="Estilo2"><input name="caratula" type="radio" value="SI">SI
<input name="caratula" type="radio" value="NO" checked>NO</div>
<?php }?>	  </td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24">
      <div align="right" class="Estilo1"><font color="#000000" size="2">Tipo de Papel </font></div></td>
      <td>      
	  
	  
	  <?php  if ($hoja == "A5"){?>
<div align="left" class="Estilo2"><input name="hoja" type="radio" value="A5" checked> MEDIA HOJA A4
<input name="hoja" type="radio" value="A4">HOJA COMPLETA A4</div>
<?php }else{?>
<div align="left" class="Estilo2"><input name="hoja" type="radio" value="A5" > MEDIA HOJA A4
<input name="hoja" type="radio" value="A4" checked>HOJA COMPLETA A4</div>
<?php }?>	  </td>
	  	  <tr bordercolor="#FFFFFF">
      <td height="24">
      <div align="right" class="Estilo1"><font color="#000000" size="2">Modelos de estudios predeterminados </font></div></td>
      <td>   
	  <?php switch ($modelo){

		  case "A":{?>
	    <div align="left" class="Estilo2"><input name="modelo" type="radio" value="A" checked> A  
		    <input name="modelo" type="radio" value="B" />
B 
<input name="modelo" type="radio" value="C" />
C 
<input name="modelo" type="radio" value="D" />
D </div>
	    <div align="left" class="Estilo2"></div>
		  <div align="left" class="Estilo2"></div>
		  <div align="left" class="Estilo2"></div><?php break;}


		  case "B":{?>
		  <div align="left" class="Estilo2"><input name="modelo" type="radio" value="A"> A  
		    <input name="modelo" type="radio" value="B" checked />
B 
<input name="modelo" type="radio" value="C" />
C 
<input name="modelo" type="radio" value="D" />
D</div>
		  <div align="left" class="Estilo2"></div>
		  <div align="left" class="Estilo2"></div>
		  <div align="left" class="Estilo2"></div><?php break;}

		  case "C":{?>
		  <div align="left" class="Estilo2"><input name="modelo" type="radio" value="A"> A  
		    <input name="modelo" type="radio" value="B" />
B 
<input name="modelo" type="radio" value="C" checked />
C 
<input name="modelo" type="radio" value="D" />
D </div>
		  <div align="left" class="Estilo2"></div>
		  <div align="left" class="Estilo2"></div>
		  <div align="left" class="Estilo2"></div><?php break;}

		  case "D":{?>
		  <div align="left" class="Estilo2"><input name="modelo" type="radio" value="A"> A  
		    <input name="modelo" type="radio" value="B" />
B 
<input name="modelo" type="radio" value="C" />
C 
<input name="modelo" type="radio" value="D" checked />
D </div>
		  <div align="left" class="Estilo2"></div>
		  <div align="left" class="Estilo2"></div>
		  <div align="left" class="Estilo2"></div><?php break;}





 case "":{?>
		  <div align="left" class="Estilo2"><input name="modelo" type="radio" value="A"> A  
		    <input name="modelo" type="radio" value="B" checked />
B 
<input name="modelo" type="radio" value="C" />
C 
<input name="modelo" type="radio" value="D" />
D</div>
		  <div align="left" class="Estilo2"></div>
		  <div align="left" class="Estilo2"></div>
		  <div align="left" class="Estilo2"></div><?php break;}

		  case "C":{?>
		  <div align="left" class="Estilo2"><input name="modelo" type="radio" value="A"> A  
		    <input name="modelo" type="radio" value="B" />
B 
<input name="modelo" type="radio" value="C" checked />
C 
<input name="modelo" type="radio" value="D" />
D </div>
		  <div align="left" class="Estilo2"></div>
		  <div align="left" class="Estilo2"></div>
		  <div align="left" class="Estilo2"></div><?php break;}

		  case "D":{?>
		  <div align="left" class="Estilo2"><input name="modelo" type="radio" value="A"> A  
		    <input name="modelo" type="radio" value="B" />
B 
<input name="modelo" type="radio" value="C" />
C 
<input name="modelo" type="radio" value="D" checked />
D </div>
		  <div align="left" class="Estilo2"></div>
		  <div align="left" class="Estilo2"></div>
		  <div align="left" class="Estilo2"></div><?php break;}










	  }?>	  </td>
  </tr>


  </tr>
    <tr bordercolor="#FFFFFF">
      <td height="24"><div align="right" class="Estilo1"><font color="#000000" size="2">Desea Imprimir el final con Fecha y Firma </font></div></td>
      <td>
	  
	  
	  

	  <?php  if ($firma == "SI"){?>
<div align="left" class="Estilo2"><input name="firma" type="radio" value="SI" checked>SI
<input name="firma" type="radio" value="NO">NO</div>
<?php }else{?>
<div align="left" class="Estilo2"><input name="firma" type="radio" value="SI">SI
<input name="firma" type="radio" value="NO" checked>NO</div>
<?php }?>	  </td>
	  <tr bordercolor="#FFFFFF">

      <td height="26" colspan="2"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"></font>        
	  <input type="hidden" name="usuario"  value="<?php echo $usuario;?>">
	  <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR">
      </div></td>
</table>

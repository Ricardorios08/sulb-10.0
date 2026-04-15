<script language="javascript">

function on_load()
{
document.getElementById("1").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "1":
				document.getElementById("2").focus();
				break;
				case "2":
				document.getElementById("3").focus();
				break;
				case "3":
				document.getElementById("4").focus();
				break;
				case "4":
				document.getElementById("5").focus();
				break;
				case "5":
				document.getElementById("6").focus();
				break;

				case "6":
				document.getElementById("7").focus();
				break;

				case "7":
				document.getElementById("8").focus();
				break;


				case "8":
				document.getElementById("9").focus();
				break;
				case "9":
				document.getElementById("10").focus();
				break;
				case "10":
				document.getElementById("11").focus();
				break;
				case "11":
				document.getElementById("12").focus();
				break;

				case "12":
				document.getElementById("13").focus();
				break;
				case "13":
				document.getElementById("14").focus();
				break;
				case "14":
				document.getElementById("15").focus();
				break;
				case "15":
				document.getElementById("16").focus();
				break;


				case "17":
				document.getElementById("GUARDAR").focus();
				break;

				


				
		}
		return false;
	}
	return true;
}



</script>


<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.Estilo2 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
<form action="guardar_todos.php" method="post">


<BODY onload = "on_load()">

<table width="850" border="1" cellspacing="0" bgcolor="#FFFFFF">
  <!--DWLayoutTable-->
   <tr bgcolor="#C5C5C5">
     <td width="50" height="22"><div align="center" class="Estilo2">
       <div align="center">ORDE</div>
     </div></td>
     <td width="600"><div align="center" class="Estilo2">
       <div align="center">PRACTICA</div>
     </div></td>
	      <td width="100"><div align="center" class="Estilo2">
       <div align="center">RESULTADO</div>
     </div></td>
     <td width="10"><div align="center"><span class="Estilo2">Ent</span></div></td>
     <td width="10"><div align="center" class="Estilo2">
       <div align="center">Imp</div>
     </div></td>
	      <td width="10"><div align="center" class="Estilo2">
       <div align="center">Fac</div>
     </div></td>
     <td width="10"><div align="center" class="Estilo2">
       <div align="center">Bor</div>
     </div></td>
     <td width="51"><div align="center" class="Estilo2">
       <div align="center">ESTADO</div>
     </div></td>
	  <td width="30"><div align="center" class="Estilo2">
       <div align="center"><a href="grafico.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
 HISTORIAL</a></div>
     </div></td>
   </tr>


 <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>"> 
 <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>"> 

 <?php 

 //VIENE DE EMISION_MOD.PHP
 
  $sql10="select * from detalle where cod_grabacion = $cod_grabacion order by orden, cod_operacion";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo".$db->ErrorMsg());
 while (!$result10->EOF) {

 $nro_practica=strtoupper($result10->fields["nro_practica"]);
$imprimir=strtoupper($result10->fields["imprimir"]);
$enter=strtoupper($result10->fields["enter"]);
$cod_operacion1=strtoupper($result10->fields["cod_operacion"]);
$cod_grabacion1=strtoupper($result10->fields["cod_grabacion"]);
$orden =strtoupper($result10->fields["orden"]);
$facturar =strtoupper($result10->fields["facturar"]);

$sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);
$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];
$clase=$result11->fields["clase"];

include ("practicas_imp.php");


	
$result10->MoveNext();

	}


?>
<tr>
  <td height="31" colspan="9" valign="top" bgcolor="#C5C5C5">
      
      <form>
      <div align="center">
        <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR">
        </div>
    </table>



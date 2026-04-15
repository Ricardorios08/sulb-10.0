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

<table width="200" border="1" cellspacing="0">
 

 <?php 

 //VIENE DE EMISION_MOD.PHP
 
    $sql12="select * from detalle_referencia where nro_paciente = $nro_paciente and  nro_practica = $nro_practica and cod_grabacion != '$cod_grabacion'  ";
$result12 = $db->Execute($sql12);

if (!$result12) die("fallo".$db->ErrorMsg());
 while (!$result12->EOF) {

 $valor=strtoupper($result12->fields["valor"]);
 $cod_g=strtoupper($result12->fields["cod_grabacion"]);

  $sql11="select * from detalle where cod_grabacion = $cod_g";
$result11 = $db->Execute($sql11);
 $fec=strtoupper($result11->fields["fecha"]);

$dia_fec = substr($fec,8,2);
$mes_fec = substr($fec,5,2);
$anio_fec = substr($fec,0,4);
$fec = $dia_fec."/".$mes_fec."/".$anio_fec;
	?>
	<tr>
     <td bgcolor="#FFFFFF"><div align="left"><?php echo  $fec.": ";?>
	<strong>	<?php echo $valor." ".$unidad;?>	 </strong>


     <?php



$result12->MoveNext();

	}


?>
 </div></td>
</table>

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


<?php $hoy=date("d/m/y");
  
if ($banderin != 1){
$nro_paciente= $_REQUEST['nro_paciente'];
$nro_os= $_REQUEST['nro_os'];
$cod_grabacion= $_REQUEST['cod_grabacion'];
$fecha_grabacion= $_REQUEST['fecha_grabacion'];
}

 $cod_grabacion;

include ("encabezado.php");
 

?><a href="emision/emision_pdf.php?nro_paciente=<?php print("$nro_paciente");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&fecha_grabacion=<?php print("$fecha_grabacion");?>"></a>



<form action="guardar_mega.php" method="post">


<BODY onload = "on_load()">

<table width="846" border="1" cellspacing="0">
  <!--DWLayoutTable-->
   <tr bgcolor="#C5C5C5">
     <td width="384"><div align="center">PRACTICA</div></td>
     <td width="403"><div align="center">Derivacion Mega </div></td>
     <td width="45"><div align="center">Imp</div></td>
   </tr>


 <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>"> 
 <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>"> 

 <?php 

 
 
    $sql10="select * from detalle where cod_grabacion = $cod_grabacion order by prioridad, nro_practica";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo".$db->ErrorMsg());
 while (!$result10->EOF) {

$nro_practica=strtoupper($result10->fields["nro_practica"]);
$deriva=strtoupper($result10->fields["deriva"]);
$imprimir=strtoupper($result10->fields["imprimir"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
$cod_mega=strtoupper($result10->fields["cod_mega"]);
 $nro_lab=strtoupper($result10->fields["nro_lab"]);

$sql7 = "SELECT * FROM lab_realizacion where  nro_lab = $nro_lab";
$result7 = $db->Execute($sql7);
$lab_realizacion=strtoupper($result7->fields["nombre"]);


$sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);
$nombre_practica=strtoupper($result11->fields["practica"]);



$pasar = $valor.";".$cod_grabacion;
$conta = $conta +1;
$tab = $tab + 1;

  ?> <tr>
     <td bgcolor="#FFFFFF"><div align="left"><a href="normal_mod.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>">
       <?php echo $nro_practica;?></a><a href="normal_mod.php?nro_practica=<?php print("$nro_practica");?>&&cod_grabacion=<?php print("$cod_grabacion");?>&&nro_paciente=<?php print("$nro_paciente");?>"> - <?php echo $nombre_practica;?></a></div></td>

     <td bgcolor="#FFFFFF"> 
       <div align="center">

<?php if ($deriva == 1){
?>  <input type="checkbox" name="<?php echo nro_practica.$cod_operacion;?>"  checked>
<input name="<?php echo cod_mega.$cod_operacion;?>" type="text" id = "<?php echo $tab;?>" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $cod_mega;?>" size="12" maxlength="11" > 

<?php 
$sql = "SELECT * FROM lab_realizacion order by nro_lab";
$result = $db->Execute($sql);
 ?><select name="<?php echo nro_lab.$cod_operacion;?>[]" size='1' id ='nro_os' onKeyPress='return verif_caracter(this,event)'>
 
 <optgroup label="SELECCIONADA">        
		     <option value="<?php echo $nro_lab;?>"><?php echo $lab_realizacion;?> (<?php echo $nro_lab;?>)</option>
                 <?php
echo"<option value=''>Seleccione DERIVACION</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$nro_lab=$result->fields["nro_lab"];
$nombre=strtoupper($result->fields["nombre"]);
echo"<option value=$nro_lab>$nombre ($nro_lab)</option>";
$result->MoveNext();
	}
echo"</select>";
?> 
<?php 
}else{

?>   
<input type="checkbox" name="<?php echo nro_practica.$cod_operacion;?>"  >
<input name="<?php echo cod_mega.$cod_operacion;?>" type="text" id = "<?php echo $tab;?>" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $cod_mega;?>" size="12" maxlength="11" > 
<?php 
$sql = "SELECT * FROM lab_realizacion order by nro_lab";
$result = $db->Execute($sql);
 ?><select name="<?php echo nro_lab.$cod_operacion;?>[]" size='1' id ='nro_os' onKeyPress='return verif_caracter(this,event)'>
 
 <optgroup label="SELECCIONADA">        
		     <option value="<?php echo $nro_lab;?>"><?php echo $lab_realizacion;?> (<?php echo $nro_lab;?>)</option>
                 <?php
echo"<option value=''>Seleccione DERIVACION</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$nro_lab=$result->fields["nro_lab"];
$nombre=strtoupper($result->fields["nombre"]);
echo"<option value=$nro_lab>$nombre ($nro_lab)</option>";
$result->MoveNext();
	}
echo"</select>";
?> 
<?php 

}

?>
       </div></td>
     <td bgcolor="#FFFFFF"><div align="center">
      <?php if ($imprimir == 1){?>
<input type="checkbox" name="<?php echo imprimir.$cod_operacion;?>"  checked>
<?php }else{?>
<input type="checkbox" name="<?php echo imprimir.$cod_operacion;?>"  >
<?php }?>
     </div></td>
     </tr>
<?php 


//cod_operacion.$cod_operacion;
$estado = "";




	
$result10->MoveNext();

	}


?>
<tr><td colspan="3" valign="top" bgcolor="#C5C5C5"><form>
      <div align="center">
        <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR">
    </div>
</table>

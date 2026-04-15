<!-- <link href="../../css/fondo.css" rel="stylesheet" type="text/css" /> -->
<script language="javascript">
function on_load()
{
document.getElementById("valor").focus();
}



function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
							
				
				
				
				case "valor":
				document.getElementById("observaciones").focus();
				break;

				

				
		}
		return false;
	}
	return true;
}


</script>

<style type="text/css">
<!--
.Estilo13 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo14 {
	font-size: 14px;
	font-family: "Trebuchet MS";
	font-weight: bold;
}
.Estilo15 {font-family: "Trebuchet MS"}
.Estilo25 {font-size: 12}
.Estilo27 {font-size: 12px}
-->
</style>
<BODY onload = "on_load()">
<?php 

include("../../conexiones/config.inc.php");

$cod_grabacion = $_REQUEST['cod_grabacion'];
$nro_practica= $_REQUEST['nro_practica'];
 $nro_paciente= $_REQUEST['nro_paciente'];

//include ("encabezado1.php");

 $sql11="select * from detalle_referencia where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$valor=$result11->fields["valor"];
$referencia=$result11->fields["referencia"];
$referencia1=$result11->fields["referencia1"];
$referencia2=$result11->fields["referencia2"];
$referencia3=$result11->fields["referencia3"];

$sql11="select * from convenio_referencia where  cod_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$nro_ref=$result11->fields["nro_ref"];


$observaciones=strtoupper($result11->fields["observaciones"]);

if ($valor == 0){
$sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);
$nombre_practica=strtoupper($result11->fields["practica"]);
$metodo=$result11->fields["metodo"];
$unidad=$result11->fields["unidad"];

nl2br( stripslashes( htmlentities($referencia=$result11->fields["referencia"])));
nl2br( stripslashes( htmlentities($referencia1=$result11->fields["referencia1"])));
nl2br( stripslashes( htmlentities($referencia2=$result11->fields["referencia2"])));
nl2br( stripslashes( htmlentities($referencia3=$result11->fields["referencia3"])));



 nl2br( stripslashes( htmlentities($metodo=$result11->fields["metodo"])));
}else{
$sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);
$nombre_practica=strtoupper($result11->fields["practica"]);
 nl2br( stripslashes( htmlentities($metodo=$result11->fields["metodo"])));
}


?><FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">
<table width="850" border="0" cellspacing="0">
  
  <tr>
    <td colspan="2" bgcolor="#B8B8B8"><div align="left"><span class="Estilo1 Estilo14"><?php echo $nro_practica;?> - <?php echo $nombre_practica;?></span></div></td>
  </tr>
  <tr>
    <td width="135" bgcolor="#EDEDED"><span class="Estilo13">Metodo: </span></td>
    <td width="571" bgcolor="#EDEDED"><span class="Estilo13"><?php echo $metodo;?></span></td>
  </tr>
  <tr>
    <td bgcolor="#EDEDED"><span class="Estilo13">Valor Hallado: </span></td>
    <td bgcolor="#EDEDED"><span class="Estilo13">
      <input name="valor" type="text" id="valor" value="<?php echo $valor;?>" size="70"  onKeyPress="return verif_caracter(this,event)"> 
      <input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
        <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
		  <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>"> 
		  </span></td>
  </tr>
  <tr>
    <td bgcolor="#EDEDED"><span class="Estilo13">Unidad:</span></td>
    <td bgcolor="#EDEDED"><span class="Estilo13"><?php echo $unidad;?></span></td>
  </tr>
  <tr>
    <td bgcolor="#EDEDED"><span class="Estilo13">Nota:</span></td>
    <td bgcolor="#EDEDED"><input name="observaciones3" type="text" id="observaciones" value="<?php echo $observaciones;?>" size="80"></td>
  </tr>
  <tr>
    <td bgcolor="#EDEDED"><span class="Estilo13">Valor de Referencia: </span></td>
    <td bgcolor="#EDEDED"><select name="nro_ref[]" id="nro_ref">
	     <optgroup label="SEL.">
        <option value="<?php echo $nro_ref;?>"><?php echo $nro_ref;?></option>
        <option value="0">0</option>
		<option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
     
            </select></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center">
      <input type="submit" name="Submit"  value="GUARDAR MODIFICACION">
    </div></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#EDEDED">&nbsp;</td>
  </tr>
  <!-- <tr>
    <td valign="top">Valor de Referencia: </td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" valign="top"><div align="center">
    

	  <textarea name="referencia" class=estilotextarea2 cols="24" rows="10" id = "referencia"><?php echo $referencia;?></textarea> 
      <textarea name="referencia1" class=estilotextarea2  cols="24" rows="10" id = "referencia1"><?php echo $referencia1;?></textarea>
    </div></td>
  </tr>
  <tr>
    <td colspan="3" valign="top"><div align="center">
	 

	  <textarea name="referencia2" class=estilotextarea2 cols="24" rows="10" id = "referencia2"><?php echo $referencia2;?></textarea> 
      <textarea name="referencia3" class=estilotextarea2  cols="24" rows="10" id = "referencia3"><?php echo $referencia3;?></textarea>
    </div></td>
  </tr>
  <tr>
    <td>Observaciones: </td>
    <td colspan="2"><input name="observaciones3" type="text" id="observaciones" value="<?php echo $observaciones;?>" size="80">
        <input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
        <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
		  <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">    </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#D4D0C8"><div align="center">
        <input type="submit" name="Submit" value="GUARDAR MODIFICACION">
    </div></td>
  </tr> -->
</table>



	<table width="850" border="0" cellspacing="0">
	  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF">
    <td colspan="2" rowspan="2" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2 Estilo15 Estilo25"> </span><span class="Estilo3 Estilo1 Estilo2 Estilo15 Estilo25"> </span></td>
    <td colspan="3" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2 Estilo15 Estilo25">Valores Normales </span></td>
    <td width="151" bgcolor="#B8B8B8"><span class="Estilo25"></span></td>
    <td colspan="2" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2 Estilo15 Estilo25">A&ntilde;os</span></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td width="107" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2 Estilo15 Estilo25">Columna 1 </span></td>
    <td width="107" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2 Estilo15 Estilo25">Desde</span></td>
    <td width="86" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2 Estilo15 Estilo25">Hasta</span></td>
    <td bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2 Estilo15 Estilo25">Columna 2 </span></td>
    <td width="102" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2 Estilo15 Estilo25">Desde</span></td>
    <td width="101" bgcolor="#B8B8B8"><span class="Estilo3 Estilo1 Estilo2 Estilo15 Estilo25">Hasta</span></td>
    </tr>
 
<?php
$sql10="select * from convenio_referencia where cod_practica = $nro_practica ORDER BY nro_ref, anio_d, anio_h";
$result10 = $db->Execute($sql10);

$nro_ref1=strtoupper($result10->fields["nro_ref"]);

?>
 <tr>

 
 
  <td height="22" colspan="8" valign="top"   bgcolor="#FFFF66">     <span class="Estilo27 Estilo15">  Valor de Referencia: <?php echo $nro_ref1;?></span> <span class="Estilo27 Estilo15"> </span> 

<?php 

 


	$sql10="select * from convenio_referencia where cod_practica = $nro_practica ORDER BY nro_ref, anio_d, anio_h";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {


$nro_re = $nro_ref;

$tipo=strtoupper($result10->fields["tipo"]);
$desde=strtoupper($result10->fields["desde"]);
$hasta=strtoupper($result10->fields["hasta"]);
$columna1=$result10->fields["columna1"];
$columna2=$result10->fields["columna2"];
$anio_d=strtoupper($result10->fields["anio_d"]);
$anio_h=strtoupper($result10->fields["anio_h"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
$nro_ref=strtoupper($result10->fields["nro_ref"]);


if ($nro_ref != $nro_re){
	?> 
 <tr>
   <td height="22" colspan="8" valign="top"   bgcolor="#FFFFFF"> 
 <tr>

 
 
  <td height="22" colspan="8" valign="top"   bgcolor="#FFFF66">     <span class="Estilo27 Estilo15">  Valor de Referencia: <?php echo $nro_ref;?></span> <span class="Estilo27 Estilo15"> </span> 
     <?php 
}


?> 
    <tr align="center" bordercolor="#FFFFFF">
    <td width="90" bgcolor="#EDEDED"><div align="center" class="Estilo25"><span class="Estilo3"> </span></div></td>

    <td width="90" bgcolor="#EDEDED"><span class="Estilo3 Estilo25"><?php echo $tipo;?></span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3 Estilo25"><?php echo $columna1;?></span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3 Estilo25">
      <?php echo $desde;?>
    </span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3 Estilo25">
      <?php echo $hasta;?>
    </span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3 Estilo25"><?php echo $columna2;?></span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3 Estilo25">
   <?php echo $anio_d;?>
    </span></td>
    <td bgcolor="#EDEDED"><span class="Estilo3 Estilo25">
     <?php echo $anio_h;?>
    </span></td>
    </tr>

<?php 
  $result10->MoveNext();

	}
?>
</table>




</body>
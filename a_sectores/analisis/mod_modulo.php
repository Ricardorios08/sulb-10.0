


<style type="text/css">
<!--
.Estilo8 {font-family: "Trebuchet MS"; font-size: 12; }
.Estilo11 {
	font-family: "Trebuchet MS";
	font-size: 12;
	font-weight: bold;
	font-style: italic;
}
.Estilo12 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
<style type="text/css">
<!--
.Estilo13 {
	font-family: "Trebuchet MS";
	font-size: 12px;
}
.Estilo15 {font-family: "Trebuchet MS"}
.Estilo16 {font-size: 12px}
-->
</style>



<script language="javascript">
function on_load()
{
document.getElementById("modulo1").focus();
document.getElementById("modulo1").select();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "modulo1":
				document.getElementById("modulo2").focus();
				document.getElementById("modulo2").select();
				break;
				case "modulo2":
				document.getElementById("modulo3").focus();
				document.getElementById("modulo3").select();
				break;
					case "modulo3":
				document.getElementById("modulo4").focus();
				document.getElementById("modulo4").select();
				break;

				case "modulo4":
				document.getElementById("modulo5").focus();
				document.getElementById("modulo5").select();
				break;
				case "modulo5":
				document.getElementById("modulo6").focus();
				document.getElementById("modulo6").select();
				break;
				case "modulo6":
				document.getElementById("modulo7").focus();
				document.getElementById("modulo7").select();
				break;

				case "modulo7":
				document.getElementById("modulo8").focus();
				document.getElementById("modulo8").select();
				break;
				case "modulo8":
				document.getElementById("modulo9").focus();
				document.getElementById("modulo9").select();
				break;
				case "modulo9":
				document.getElementById("modulo10").focus();
				document.getElementById("modulo10").select();
				break;
				case "modulo10":
				document.getElementById("modulo11").focus();
				document.getElementById("modulo11").select();

				break;
				case "modulo11":
				document.getElementById("modulo12").focus();
				document.getElementById("modulo12").select();
				break;
				case "modulo12":
				document.getElementById("modulo13").focus();
				document.getElementById("modulo13").select();
				break;
				 

				


				
		}
		return false;
	}
	return true;
}


</script>



<BODY onload = "on_load()">


<form action="guardar_modulo.php" method="post">
<table width="850" border="0" cellspacing="0">
  <!--DWLayoutTable-->

   
   
   
   
 <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>"> 
 <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>"> 
   

   <?php 

   include("../../conexiones/config.inc.php");

 $cod_grabacion= $_REQUEST['cod_grabacion'];
 $nro_practica= $_REQUEST['nro_practica'];

 $sql="select * from convenio_practica where cod_practica = $nro_practica";
$result = $db->Execute($sql);
$practica=$result->fields["practica"];


echo  $sql10="select * from detalle_modulo where cod_grabacion = $cod_grabacion";
$result10 = $db->Execute($sql10);


$res1=$result10->fields["modulo1"];
$res2=$result10->fields["modulo2"];
$res3=$result10->fields["modulo3"];
$res4=$result10->fields["modulo4"];
$res5=$result10->fields["modulo5"];
$res6=$result10->fields["modulo6"];
$res7=$result10->fields["modulo7"];
$res8=$result10->fields["modulo8"];
$res9=$result10->fields["modulo9"];
$res10=$result10->fields["modulo10"];
$res11=$result10->fields["modulo11"];
$res12=$result10->fields["modulo12"];
$res13=$result10->fields["modulo13"];

 


/*

$modulo2=$result->fields["modulo2"];
$modulo3=$result->fields["modulo3"];
$modulo4=$result->fields["modulo4"];
$modulo5=$result->fields["modulo5"];
$modulo6=$result->fields["modulo6"];
$modulo7=$result->fields["modulo7"];
$modulo8=$result->fields["modulo8"];
$modulo9=$result->fields["modulo9"];
$modulo10=$result->fields["modulo10"];
$modulo11=$result->fields["modulo11"];
$modulo11=$result->fields["modulo12"];
$modulo13=$result->fields["modulo13"];

*/
 ?>
   <tr bgcolor="#C5C5C5">
     <td colspan="2" bgcolor="#A6A6E1"><span class="Estilo11"><?php echo $practica;?></span></td>
   </tr>

<?php 


  $cont = 2;
 for($i=1;$i<=13;$i=$i+1){

	  $sql="select * from convenio_practica_modulo where cod_practica = $nro_practica";
$result = $db->Execute($sql);

 $cont = $cont + 1;

 $modulo=$result->fields[$i];



 $sql="select * from convenio_practica where cod_practica = $modulo";
$result = $db->Execute($sql);
$practica=$result->fields["practica"];
$metodo=$result->fields["metodo"];
$unidad=$result->fields["unidad"];

switch ($i){
case "1":{$res = $res1;break;}
case "2":{$res = $res2;break;}
case "3":{$res = $res3;break;}
case "4":{$res = $res4;break;}
case "5":{$res = $res5;break;}
case "6":{$res = $res6;break;}
case "7":{$res = $res7;break;}
case "8":{$res = $res8;break;}
case "9":{$res = $res9;break;}
case "10":{$res = $res10;break;}
case "11":{$res = $res11;break;}
case "12":{$res = $res12;break;}
case "13":{$res = $res13;break;}
}


  if ($modulo > 0){

	?>
 
  <tr bgcolor="#C5C5C5">

<td height="22" colspan="2" bgcolor="#CECECE"><div align="left"><span class="Estilo12"><?php echo $modulo;?> - <?php echo $practica;?></span></div>  </td>
</tr>
<tr bgcolor="#C5C5C5">
  <td height="24" bgcolor="#CECECE"><div align="right"><span class="Estilo12 Estilo16 Estilo15">R&eacute;sultado:</span></div></td>
  <td height="24" bgcolor="#CECECE"><span class="Estilo8">
    <textarea name="modulo<?php echo $i;?>" cols="100" id="modulo<?php echo $i;?>" onKeyPress="return verif_caracter(this,event)"><?php echo $res;?></textarea>

	<input  name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">


    <?php echo $unidad;?></span></td>
  </tr>
<tr bgcolor="#C5C5C5">
  <td height="20" bgcolor="#CECECE"><div align="right"><span class="Estilo13">M&eacute;tod<span class="Estilo15">o</span>: </span></div></td>
  <td height="20" bgcolor="#CECECE"><span class="Estilo13"><?php echo $metodo;?></span></td>
</tr>
<tr bgcolor="#C5C5C5">
  <td width="139" height="20" bgcolor="#CECECE"><div align="right"><span class="Estilo12 Estilo15 Estilo16">VR: </span></div></td>
  <td bgcolor="#CECECE"><span class="Estilo12"><?php echo $vr;?></span></td>
  </tr>


<?php }


 }

	

?>

<tr bgcolor="#C5C5C5">
  <td height="20" colspan="2" bgcolor="#CECECE"><div align="center">
    <label>
    <input type="submit" name="Submit" value="Guardar">
    </label>
  </div></td>
  </tr>
</table>

</form>

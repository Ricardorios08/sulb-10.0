<link href="../../../css/fondo.css" rel="stylesheet" type="text/css" />
<?php 
include ("../../../conexiones/config.inc.php");
?>

<script language="javascript">
function on_load()
{
document.getElementById("columna1").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "columna1":
				document.getElementById("desde").focus();
				break;

								case "desde":
				document.getElementById("hasta").focus();
				break;

								case "hasta":
				document.getElementById("columna2").focus();
				break;

								case "columna2":
				document.getElementById("anio_d").focus();
				break;

								case "anio_d":
				document.getElementById("anio_h").focus();
				break;

				case "anio_h":
				document.getElementById("OK").focus();
				break;

				


				

				
		}
		return false;
	}
	return true;
}






</script>

<?php 
include ("variables.php");
?>

<style type="text/css">
<!--
.Estilo3 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
<BODY onload = "on_load ()">

<FORM name="form" ACTION="guardar_modificacion_complejo.php" METHOD = "POST">
  <table border="0" cellspacing="0" bgcolor="#EDEDED">
  <!--DWLayoutTable-->
  <tr align="center">
    <td colspan="5"><strong><img src="../../../imagenes/nbu.jpg" width="846" height="35"></strong></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" colspan="5" bgcolor="#C0C0C0"><div align="left" class="Estilo3"><?php echo $cod_practica;?> - <?php echo $practica;?></div></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top">TEXTO</td>
    <td valign="top">RESULTADO</td>
    <td valign="top">UNIDAD</td>
    <td valign="top">TEXTO</td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 1 </td>
    <td valign="top"><div align="left"><input name="renglon1" type="text" id="renglon1" value="<?php echo $renglon1;?>" size="35"></div></td>
 
	
<?php 
switch ($renglon1_4){

case "":{?>
<td valign="top">

<input name="resultado1" type="radio" value="1">Ent.
<input name="resultado1" type="radio" value="2">Dec. 
<input name="resultado1" type="radio" value="3">Texto 
<input name="resultado1" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado1" type="radio" value="1"checked>Ent.
<input name="resultado1" type="radio" value="2">Dec. 
<input name="resultado1" type="radio" value="3">Texto 
<input name="resultado1" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado1" type="radio" value="1">Ent.
<input name="resultado1" type="radio" value="2"checked>Dec. 
<input name="resultado1" type="radio" value="3">Texto 
<input name="resultado1" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado1" type="radio" value="1">Ent.
<input name="resultado1" type="radio" value="2">Dec. 
<input name="resultado1" type="radio" value="3"checked>Texto 
<input name="resultado1" type="radio" value="4" >Vacio</td>
<?php break;}

case "4":{?>
<td valign="top">

<input name="resultado1" type="radio" value="1">Ent.
<input name="resultado1" type="radio" value="2">Dec. 
<input name="resultado1" type="radio" value="3">Texto 
<input name="resultado1" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>

    <td valign="top"><input name="renglon1_2" type="text" id="renglon1_2" value="<?php echo $renglon1_2;?>" size="8"></td>
    <td valign="top"><input name="renglon1_3" type="text" id="renglon1_3" value="<?php echo $renglon1_3;?>" size="20"></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 2 </td>
    <td valign="top"><div align="left"><input name="renglon2" type="text" id="renglon2" value="<?php echo $renglon2;?>" size="35"></div></td>
  
<?php 
switch ($renglon2_4){

case "":{?>
<td valign="top">

<input name="resultado2" type="radio" value="1">Ent.
<input name="resultado2" type="radio" value="2">Dec. 
<input name="resultado2" type="radio" value="3">Texto 
<input name="resultado2" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado2" type="radio" value="1"checked>Ent.
<input name="resultado2" type="radio" value="2">Dec. 
<input name="resultado2" type="radio" value="3">Texto 
<input name="resultado2" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado2" type="radio" value="1">Ent.
<input name="resultado2" type="radio" value="2"checked>Dec. 
<input name="resultado2" type="radio" value="3">Texto 
<input name="resultado2" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado2" type="radio" value="1">Ent.
<input name="resultado2" type="radio" value="2">Dec. 
<input name="resultado2" type="radio" value="3"checked>Texto 
<input name="resultado2" type="radio" value="4" >Vacio</td>
<?php break;}

case "4":{?>
<td valign="top">

<input name="resultado2" type="radio" value="1">Ent.
<input name="resultado2" type="radio" value="2">Dec. 
<input name="resultado2" type="radio" value="3">Texto 
<input name="resultado2" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>



    <td valign="top"><input name="renglon2_2" type="text" id="renglon2_2" value="<?php echo $renglon2_2;?>" size="8"></td>
    <td valign="top"><input name="renglon2_3" type="text" id="renglon2_3" value="<?php echo $renglon2_3;?>" size="20"></td>
    </tr>
 
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 3 </td>
    <td valign="top"><div align="left">
      <input name="renglon3" type="text" id="renglon3" value="<?php echo $renglon3;?>" size="35">
    </div></td>
   
<?php 
switch ($renglon3_4){

case "":{?>
<td valign="top">

<input name="resultado3" type="radio" value="1">Ent.
<input name="resultado3" type="radio" value="2">Dec. 
<input name="resultado3" type="radio" value="3">Texto 
<input name="resultado3" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado3" type="radio" value="1"checked>Ent.
<input name="resultado3" type="radio" value="2">Dec. 
<input name="resultado3" type="radio" value="3">Texto 
<input name="resultado3" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado3" type="radio" value="1">Ent.
<input name="resultado3" type="radio" value="2"checked>Dec. 
<input name="resultado3" type="radio" value="3">Texto 
<input name="resultado3" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado3" type="radio" value="1">Ent.
<input name="resultado3" type="radio" value="2">Dec. 
<input name="resultado3" type="radio" value="3"checked>Texto 
<input name="resultado3" type="radio" value="4" >Vacio</td>
<?php break;}

case "4":{?>
<td valign="top">

<input name="resultado3" type="radio" value="1">Ent.
<input name="resultado3" type="radio" value="2">Dec. 
<input name="resultado3" type="radio" value="3">Texto 
<input name="resultado3" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>


    <td valign="top"><input name="renglon3_2" type="text" id="renglon3_2" value="<?php echo $renglon3_2;?>" size="8"></td>
    <td valign="top"><input name="renglon3_3" type="text" id="renglon3_3" value="<?php echo $renglon3_3;?>" size="20"></td>
    </tr>
  
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0">4</td>
    <td valign="top"><div align="left">
      <input name="renglon4" type="text" id="renglon4" value="<?php echo $renglon4;?>" size="35">
    </div></td>
  <?php 
switch ($renglon4_4){

case "":{?>
<td valign="top">

<input name="resultado4" type="radio" value="1">Ent.
<input name="resultado4" type="radio" value="2">Dec. 
<input name="resultado4" type="radio" value="3">Texto 
<input name="resultado4" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado4" type="radio" value="1" checked>Ent.
<input name="resultado4" type="radio" value="2">Dec. 
<input name="resultado4" type="radio" value="3">Texto 
<input name="resultado4" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado4" type="radio" value="1">Ent.
<input name="resultado4" type="radio" value="2"checked>Dec. 
<input name="resultado4" type="radio" value="3">Texto 
<input name="resultado4" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado4" type="radio" value="1">Ent.
<input name="resultado4" type="radio" value="2">Dec. 
<input name="resultado4" type="radio" value="3"checked>Texto 
<input name="resultado4" type="radio" value="4" >Vacio</td>
<?php break;}

case "4":{?>
<td valign="top">

<input name="resultado4" type="radio" value="1">Ent.
<input name="resultado4" type="radio" value="2">Dec. 
<input name="resultado4" type="radio" value="3">Texto 
<input name="resultado4" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>
    <td valign="top"><input name="renglon4_2" type="text" id="renglon4_2" value="<?php echo $renglon4_2;?>" size="8"></td>
    <td valign="top"><input name="renglon4_3" type="text" id="renglon4_3" value="<?php echo $renglon4_3;?>" size="20"></td>
    </tr>

<tr align="center" bordercolor="#FFFFFF">
  <td height="24" bgcolor="#C0C0C0"> 5 </td>
  <td valign="top"><div align="left">
    <input name="renglon5" type="text" id="renglon5" value="<?php echo $renglon5;?>" size="35">
  </div></td>
 
<?php 
switch ($renglon5_4){

case "":{?>
<td valign="top">

<input name="resultado5" type="radio" value="1">Ent.
<input name="resultado5" type="radio" value="2">Dec. 
<input name="resultado5" type="radio" value="3">Texto 
<input name="resultado5" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado5" type="radio" value="1"checked>Ent.
<input name="resultado5" type="radio" value="2">Dec. 
<input name="resultado5" type="radio" value="3">Texto 
<input name="resultado5" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado5" type="radio" value="1">Ent.
<input name="resultado5" type="radio" value="2"checked>Dec. 
<input name="resultado5" type="radio" value="3">Texto 
<input name="resultado5" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado5" type="radio" value="1">Ent.
<input name="resultado5" type="radio" value="2">Dec. 
<input name="resultado5" type="radio" value="3"checked>Texto 
<input name="resultado5" type="radio" value="4" >Vacio</td>
<?php break;}

case "4":{?>
<td valign="top">

<input name="resultado5" type="radio" value="1">Ent.
<input name="resultado5" type="radio" value="2">Dec. 
<input name="resultado5" type="radio" value="3">Texto 
<input name="resultado5" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>

  <td valign="top"><input name="renglon5_2" type="text" id="renglon5_2" value="<?php echo $renglon5_2;?>" size="8"></td>
  <td valign="top"><input name="renglon5_3" type="text" id="renglon5_3" value="<?php echo $renglon5_3;?>" size="20"></td>
  </tr>
<tr align="center" bordercolor="#FFFFFF">
  <td height="24" bgcolor="#C0C0C0"> 6 </td>
  <td valign="top"><div align="left">
    <input name="renglon6" type="text" id="renglon6" value="<?php echo $renglon6;?>" size="35">
  </div></td>

<?php 
switch ($renglon6_4){

case "":{?>
<td valign="top">

<input name="resultado6" type="radio" value="1">Ent.
<input name="resultado6" type="radio" value="2">Dec. 
<input name="resultado6" type="radio" value="3">Texto 
<input name="resultado6" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado6" type="radio" value="1"checked>Ent.
<input name="resultado6" type="radio" value="2">Dec. 
<input name="resultado6" type="radio" value="3">Texto 
<input name="resultado6" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado6" type="radio" value="1">Ent.
<input name="resultado6" type="radio" value="2"checked>Dec. 
<input name="resultado6" type="radio" value="3">Texto 
<input name="resultado6" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado6" type="radio" value="1">Ent.
<input name="resultado6" type="radio" value="2">Dec. 
<input name="resultado6" type="radio" value="3"checked>Texto 
<input name="resultado6" type="radio" value="4" >Vacio</td>
<?php break;}

case "4":{?>
<td valign="top">

<input name="resultado6" type="radio" value="1">Ent.
<input name="resultado6" type="radio" value="2">Dec. 
<input name="resultado6" type="radio" value="3">Texto 
<input name="resultado6" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>

  <td valign="top"><input name="renglon6_2" type="text" id="renglon6_2" value="<?php echo $renglon6_2;?>" size="8"></td>
  <td valign="top"><input name="renglon6_3" type="text" id="renglon6_3" value="<?php echo $renglon6_3;?>" size="20"></td>
  </tr>
<tr align="center" bordercolor="#FFFFFF">
  <td height="24" bgcolor="#C0C0C0"> 7 </td>
  <td valign="top"><div align="left">
    <input name="renglon7" type="text" id="renglon7" value="<?php echo $renglon7;?>" size="35">
  </div></td>

<?php 
switch ($renglon7_4){

case "":{?>
<td valign="top">

<input name="resultado7" type="radio" value="1">Ent.
<input name="resultado7" type="radio" value="2">Dec. 
<input name="resultado7" type="radio" value="3">Texto 
<input name="resultado7" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado7" type="radio" value="1"checked>Ent.
<input name="resultado7" type="radio" value="2">Dec. 
<input name="resultado7" type="radio" value="3">Texto 
<input name="resultado7" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado7" type="radio" value="1">Ent.
<input name="resultado7" type="radio" value="2"checked>Dec. 
<input name="resultado7" type="radio" value="3">Texto 
<input name="resultado7" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado7" type="radio" value="1">Ent.
<input name="resultado7" type="radio" value="2">Dec. 
<input name="resultado7" type="radio" value="3"checked>Texto 
<input name="resultado7" type="radio" value="4" >Vacio</td>
<?php break;}

case "4":{?>
<td valign="top">

<input name="resultado7" type="radio" value="1">Ent.
<input name="resultado7" type="radio" value="2">Dec. 
<input name="resultado7" type="radio" value="3">Texto 
<input name="resultado7" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>

  <td valign="top"><input name="renglon7_2" type="text" id="renglon7_2" value="<?php echo $renglon7_2;?>" size="8"></td>
  <td valign="top"><input name="renglon7_3" type="text" id="renglon7_3" value="<?php echo $renglon7_3;?>" size="20"></td>
  </tr>
<tr align="center" bordercolor="#FFFFFF">
  <td height="24" bgcolor="#C0C0C0"> 8 </td>
  <td valign="top"><div align="left">
    <input name="renglon8" type="text" id="renglon8" value="<?php echo $renglon8;?>" size="35">
  </div></td>

<?php 
switch ($renglon8_4){

case "":{?>
<td valign="top">

<input name="resultado8" type="radio" value="1">Ent.
<input name="resultado8" type="radio" value="2">Dec. 
<input name="resultado8" type="radio" value="3">Texto 
<input name="resultado8" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado8" type="radio" value="1"checked>Ent.
<input name="resultado8" type="radio" value="2">Dec. 
<input name="resultado8" type="radio" value="3">Texto 
<input name="resultado8" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado8" type="radio" value="1">Ent.
<input name="resultado8" type="radio" value="2"checked>Dec. 
<input name="resultado8" type="radio" value="3">Texto 
<input name="resultado8" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado8" type="radio" value="1">Ent.
<input name="resultado8" type="radio" value="2">Dec. 
<input name="resultado8" type="radio" value="3"checked>Texto 
<input name="resultado8" type="radio" value="4" >Vacio</td>
<?php break;}

case "4":{?>
<td valign="top">

<input name="resultado8" type="radio" value="1">Ent.
<input name="resultado8" type="radio" value="2">Dec. 
<input name="resultado8" type="radio" value="3">Texto 
<input name="resultado8" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>

  <td valign="top"><input name="renglon8_2" type="text" id="renglon8_2" value="<?php echo $renglon8_2;?>" size="8"></td>
  <td valign="top"><input name="renglon8_3" type="text" id="renglon8_3" value="<?php echo $renglon8_3;?>" size="20"></td>
  </tr>
  
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 9 </td>
    <td valign="top"><div align="left">
      <input name="renglon9" type="text" id="renglon9" value="<?php echo $renglon9;?>" size="35">
    </div></td>

<?php 
switch ($renglon9_4){

case "":{?>
<td valign="top">

<input name="resultado9" type="radio" value="1">Ent.
<input name="resultado9" type="radio" value="2">Dec. 
<input name="resultado9" type="radio" value="3">Texto 
<input name="resultado9" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado9" type="radio" value="1"checked>Ent.
<input name="resultado9" type="radio" value="2">Dec. 
<input name="resultado9" type="radio" value="3">Texto 
<input name="resultado9" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado9" type="radio" value="1">Ent.
<input name="resultado9" type="radio" value="2"checked>Dec. 
<input name="resultado9" type="radio" value="3">Texto 
<input name="resultado9" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado9" type="radio" value="1">Ent.
<input name="resultado9" type="radio" value="2">Dec. 
<input name="resultado9" type="radio" value="3"checked>Texto 
<input name="resultado9" type="radio" value="4" >Vacio</td>
<?php break;}

case "4":{?>
<td valign="top">

<input name="resultado9" type="radio" value="1">Ent.
<input name="resultado9" type="radio" value="2">Dec. 
<input name="resultado9" type="radio" value="3">Texto 
<input name="resultado9" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>

    <td valign="top"><input name="renglon9_2" type="text" id="renglon9_2" value="<?php echo $renglon9_2;?>" size="8"></td>
    <td valign="top"><input name="renglon9_3" type="text" id="renglon9_3" value="<?php echo $renglon9_3;?>" size="20"></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 10 </td>
    <td valign="top"><div align="left">
      <input name="renglon10" type="text" id="renglon10" value="<?php echo $renglon10;?>" size="35">
    </div></td>
   
<?php 
switch ($renglon10_4){

case "":{?>
<td valign="top">

<input name="resultado10" type="radio" value="1">Ent.
<input name="resultado10" type="radio" value="2">Dec. 
<input name="resultado10" type="radio" value="3">Texto 
<input name="resultado10" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado10" type="radio" value="1"checked>Ent.
<input name="resultado10" type="radio" value="2">Dec. 
<input name="resultado10" type="radio" value="3">Texto 
<input name="resultado10" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado10" type="radio" value="1">Ent.
<input name="resultado10" type="radio" value="2"checked>Dec. 
<input name="resultado10" type="radio" value="3">Texto 
<input name="resultado10" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado10" type="radio" value="1">Ent.
<input name="resultado10" type="radio" value="2">Dec. 
<input name="resultado10" type="radio" value="3"checked>Texto 
<input name="resultado10" type="radio" value="4" >Vacio</td>
<?php break;}

case "4":{?>
<td valign="top">

<input name="resultado10" type="radio" value="1">Ent.
<input name="resultado10" type="radio" value="2">Dec. 
<input name="resultado10" type="radio" value="3">Texto 
<input name="resultado10" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>

    <td valign="top"><input name="renglon10_2" type="text" id="renglon10_2" value="<?php echo $renglon10_2;?>" size="8"></td>
    <td valign="top"><input name="renglon10_3" type="text" id="renglon10_3" value="<?php echo $renglon10_3;?>" size="20"></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 11 </td>
    <td valign="top"><div align="left">
      <input name="renglon11" type="text" id="renglon11" value="<?php echo $renglon11;?>" size="35">
    </div></td>
    
<?php 
switch ($renglon11_4){

case "":{?>
<td valign="top">

<input name="resultado11" type="radio" value="1">Ent.
<input name="resultado11" type="radio" value="2">Dec. 
<input name="resultado11" type="radio" value="3">Texto 
<input name="resultado11" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado11" type="radio" value="1"checked>Ent.
<input name="resultado11" type="radio" value="2">Dec. 
<input name="resultado11" type="radio" value="3">Texto 
<input name="resultado11" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado11" type="radio" value="1">Ent.
<input name="resultado11" type="radio" value="2"checked>Dec. 
<input name="resultado11" type="radio" value="3">Texto 
<input name="resultado11" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado11" type="radio" value="1">Ent.
<input name="resultado11" type="radio" value="2">Dec. 
<input name="resultado11" type="radio" value="3"checked>Texto 
<input name="resultado11" type="radio" value="4" >Vacio</td>
<?php break;}

case "4":{?>
<td valign="top">

<input name="resultado11" type="radio" value="1">Ent.
<input name="resultado11" type="radio" value="2">Dec. 
<input name="resultado11" type="radio" value="3">Texto 
<input name="resultado11" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>


    <td valign="top"><input name="renglon11_2" type="text" id="renglon11_2" value="<?php echo $renglon11_2;?>" size="8"></td>
    <td valign="top"><input name="renglon11_3" type="text" id="renglon11_3" value="<?php echo $renglon11_3;?>" size="20"></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 12 </td>
    <td valign="top"><div align="left">
      <input name="renglon12" type="text" id="renglon12" value="<?php echo $renglon12;?>" size="35">
    </div></td>
   
<?php 
switch ($renglon12_4){

case "":{?>
<td valign="top">

<input name="resultado12" type="radio" value="1">Ent.
<input name="resultado12" type="radio" value="2">Dec. 
<input name="resultado12" type="radio" value="3">Texto 
<input name="resultado12" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado12" type="radio" value="1"checked>Ent.
<input name="resultado12" type="radio" value="2">Dec. 
<input name="resultado12" type="radio" value="3">Texto 
<input name="resultado12" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado12" type="radio" value="1">Ent.
<input name="resultado12" type="radio" value="2"checked>Dec. 
<input name="resultado12" type="radio" value="3">Texto 
<input name="resultado12" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado12" type="radio" value="1">Ent.
<input name="resultado12" type="radio" value="2">Dec. 
<input name="resultado12" type="radio" value="3"checked>Texto 
<input name="resultado12" type="radio" value="4" >Vacio</td>
<?php break;}

case "4":{?>
<td valign="top">

<input name="resultado12" type="radio" value="1">Ent.
<input name="resultado12" type="radio" value="2">Dec. 
<input name="resultado12" type="radio" value="3">Texto 
<input name="resultado12" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>


    <td valign="top"><input name="renglon12_2" type="text" id="renglon12_2" value="<?php echo $renglon12_2;?>" size="8"></td>
    <td valign="top"><input name="renglon12_3" type="text" id="renglon12_3" value="<?php echo $renglon12_3;?>" size="20"></td>
    </tr>
  
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 13 </td>
    <td valign="top"><div align="left">
      <input name="renglon13" type="text" id="renglon13" value="<?php echo $renglon13;?>" size="35">
    </div></td>
<?php 
switch ($renglon13_4){

case "":{?>
<td valign="top">

<input name="resultado13" type="radio" value="1">Ent.
<input name="resultado13" type="radio" value="2">Dec. 
<input name="resultado13" type="radio" value="3">Texto 
<input name="resultado13" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado13" type="radio" value="1"checked>Ent.
<input name="resultado13" type="radio" value="2">Dec. 
<input name="resultado13" type="radio" value="3">Texto 
<input name="resultado13" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado13" type="radio" value="1">Ent.
<input name="resultado13" type="radio" value="2"checked>Dec. 
<input name="resultado13" type="radio" value="3">Texto 
<input name="resultado13" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado13" type="radio" value="1">Ent.
<input name="resultado13" type="radio" value="2">Dec. 
<input name="resultado13" type="radio" value="3"checked>Texto 
<input name="resultado13" type="radio" value="4" >Vacio</td>
<?php break;}

case "4":{?>
<td valign="top">

<input name="resultado13" type="radio" value="1">Ent.
<input name="resultado13" type="radio" value="2">Dec. 
<input name="resultado13" type="radio" value="3">Texto 
<input name="resultado13" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>
    <td valign="top"><input name="renglon13_2" type="text" id="renglon13_2" value="<?php echo $renglon13_2;?>" size="8"></td>
    <td valign="top"><input name="renglon13_3" type="text" id="renglon13_3" value="<?php echo $renglon13_3;?>" size="20"></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 14 </td>
    <td valign="top"><div align="left">
      <input name="renglon14" type="text" id="renglon14" value="<?php echo $renglon14;?>" size="35">
    </div></td>
<?php 
switch ($renglon14_4){

case "":{?>
<td valign="top">

<input name="resultado14" type="radio" value="1">Ent.
<input name="resultado14" type="radio" value="2">Dec. 
<input name="resultado14" type="radio" value="3">Texto 
<input name="resultado14" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado14" type="radio" value="1"checked>Ent.
<input name="resultado14" type="radio" value="2">Dec. 
<input name="resultado14" type="radio" value="3">Texto 
<input name="resultado14" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado14" type="radio" value="1">Ent.
<input name="resultado14" type="radio" value="2"checked>Dec. 
<input name="resultado14" type="radio" value="3">Texto 
<input name="resultado14" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado14" type="radio" value="1">Ent.
<input name="resultado14" type="radio" value="2">Dec. 
<input name="resultado14" type="radio" value="3"checked>Texto 
<input name="resultado14" type="radio" value="4" >Vacio</td>
<?php break;}

case "4":{?>
<td valign="top">

<input name="resultado14" type="radio" value="1">Ent.
<input name="resultado14" type="radio" value="2">Dec. 
<input name="resultado14" type="radio" value="3">Texto 
<input name="resultado14" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>
    <td valign="top"><input name="renglon14_2" type="text" id="renglon14_2" value="<?php echo $renglon14_2;?>" size="8"></td>
    <td valign="top"><input name="renglon14_3" type="text" id="renglon14_3" value="<?php echo $renglon14_3;?>" size="20"></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 15 </td>
    <td valign="top"><div align="left">
      <input name="renglon15" type="text" id="renglon15" value="<?php echo $renglon15;?>" size="35">
    </div></td>
<?php 
switch ($renglon15_4){

case "":{?>
<td valign="top">

<input name="resultado15" type="radio" value="1">Ent.
<input name="resultado15" type="radio" value="2">Dec. 
<input name="resultado15" type="radio" value="3">Texto 
<input name="resultado15" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado15" type="radio" value="1"checked>Ent.
<input name="resultado15" type="radio" value="2">Dec. 
<input name="resultado15" type="radio" value="3">Texto 
<input name="resultado15" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado15" type="radio" value="1">Ent.
<input name="resultado15" type="radio" value="2"checked>Dec. 
<input name="resultado15" type="radio" value="3">Texto 
<input name="resultado15" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado15" type="radio" value="1">Ent.
<input name="resultado15" type="radio" value="2">Dec. 
<input name="resultado15" type="radio" value="3"checked>Texto 
<input name="resultado15" type="radio" value="4" >Vacio</td>
<?php break;}


case "4":{?>
<td valign="top">

<input name="resultado15" type="radio" value="1">Ent.
<input name="resultado15" type="radio" value="2">Dec. 
<input name="resultado15" type="radio" value="3">Texto 
<input name="resultado15" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>
    <td valign="top"><input name="renglon15_2" type="text" id="renglon15_2" value="<?php echo $renglon15_2;?>" size="8"></td>
    <td valign="top"><input name="renglon15_3" type="text" id="renglon15_3" value="<?php echo $renglon15_3;?>" size="20"></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"> 16 </td>
    <td valign="top"><div align="left">
      <input name="renglon16" type="text" id="renglon16" value="<?php echo $renglon16;?>" size="35">
    </div></td>
<?php 
switch ($renglon16_4){

case "":{?>
<td valign="top">

<input name="resultado16" type="radio" value="1">Ent.
<input name="resultado16" type="radio" value="2">Dec. 
<input name="resultado16" type="radio" value="3">Texto 
<input name="resultado16" type="radio" value="4" checked>Vacio</td>
<?php break;}


case "1":{?>
<td valign="top">

<input name="resultado16" type="radio" value="1"checked>Ent.
<input name="resultado16" type="radio" value="2">Dec. 
<input name="resultado16" type="radio" value="3">Texto 
<input name="resultado16" type="radio" value="4" >Vacio</td>
<?php break;}

case "2":{?>
<td valign="top">

<input name="resultado16" type="radio" value="1">Ent.
<input name="resultado16" type="radio" value="2"checked>Dec. 
<input name="resultado16" type="radio" value="3">Texto 
<input name="resultado16" type="radio" value="4" >Vacio</td>
<?php break;}


case "3":{?>
<td valign="top">

<input name="resultado16" type="radio" value="1">Ent.
<input name="resultado16" type="radio" value="2">Dec. 
<input name="resultado16" type="radio" value="3"checked>Texto 
<input name="resultado16" type="radio" value="4" >Vacio</td>
<?php break;}

case "4":{?>
<td valign="top">

<input name="resultado16" type="radio" value="1">Ent.
<input name="resultado16" type="radio" value="2">Dec. 
<input name="resultado16" type="radio" value="3">Texto 
<input name="resultado16" type="radio" value="4" checked>Vacio</td>
<?php break;}

	}

?>
    <td valign="top"><input name="renglon16_2" type="text" id="renglon16_2" value="<?php echo $renglon16_2;?>" size="8"></td>
    <td valign="top"><input name="renglon16_3" type="text" id="renglon16_3" value="<?php echo $renglon16_3;?>" size="20"></td>
    </tr>
  
  
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" colspan="5" bgcolor="#C0C0C0">
	  <input type="hidden" name="cod_practica" value="<?php echo $cod_practica;?>">
      <input type="submit" name="Submit" value="OK">    </td>
    </tr>
</table>

</form>


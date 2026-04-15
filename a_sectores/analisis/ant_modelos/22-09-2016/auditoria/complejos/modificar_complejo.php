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
.Estilo47 {font-family: "Trebuchet MS"; font-size: 16px; }
-->
</style>
<BODY onload = "on_load ()">

<FORM name="form" ACTION="guardar_modificacion_complejo.php" METHOD = "POST">
  <table border="1" cellpadding="0" cellspacing="0" bgcolor="#EDEDED">
  <!--DWLayoutTable-->
  <tr align="center">
    <td colspan="5"><strong><img src="../../../imagenes/nbu.jpg" width="846" height="35"></strong></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" colspan="5" bgcolor="#EDEDED"><span class="Estilo47"><?php echo $cod_practica;?> - <?php echo $practica;?></span></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" colspan="5" bgcolor="#EDEDED"><div align="left"><span class="Estilo3">CANT DE RENGLONES: 
          </span>
      <input name="cantidad_renglones" type="text" id="cantidad_renglones" value="<?php echo $cantidad_renglones;?>">
    </div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#C0C0C0"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top" bgcolor="#C0C0C0"><span class="Estilo3">TEXTO</span></td>
    <td valign="top" bgcolor="#C0C0C0"><span class="Estilo3">RESULTADO</span></td>
    <td valign="top" bgcolor="#C0C0C0"><span class="Estilo3">UNIDAD</span></td>
    <td valign="top" bgcolor="#C0C0C0"><span class="Estilo3">TEXTO</span></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 1 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3"><input name="renglon1" type="text" id="renglon1" value="<?php echo $renglon1;?>" size="35">
      
      Visible
      <input type="checkbox" name="visible_1" value="<?php echo $visible_1;?>">
      
    Mostrar s/ Res.
    <input type="checkbox" name="mostrar_1" value="<?php echo $mostrar_1;?>">
    </div></td>
 
	
<?php 
switch ($renglon1_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
<input name="resultado1" type="radio" value="1">
Ent.
<input name="resultado1" type="radio" value="4" checked>
Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado1" type="radio" value="1"checked>
  Ent.
  <input name="resultado1" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado1" type="radio" value="1">
  Ent.
  <input name="resultado1" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado1" type="radio" value="1">
  Ent.
Vacio</span></td>
<?php break;}

case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado1" type="radio" value="1">
  Ent.
  <input name="resultado1" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>

    <td valign="top" bgcolor="#EDEDED"><input name="renglon1_2" type="text" id="renglon1_2" value="<?php echo $renglon1_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon1_3" type="text" id="renglon1_3" value="<?php echo $renglon1_3;?>" size="20"></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 2 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3"><input name="renglon2" type="text" id="renglon2" value="<?php echo $renglon2;?>" size="35"></div></td>
  
<?php 
switch ($renglon2_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado2" type="radio" value="1">
  Ent.
  <input name="resultado2" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado2" type="radio" value="1"checked>
  Ent.
  <input name="resultado2" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado2" type="radio" value="1">
  Ent.
  <input name="resultado2" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado2" type="radio" value="1">
  Ent.
  <input name="resultado2" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado2" type="radio" value="1">
  Ent.
  <input name="resultado2" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>



    <td valign="top" bgcolor="#EDEDED"><input name="renglon2_2" type="text" id="renglon2_2" value="<?php echo $renglon2_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon2_3" type="text" id="renglon2_3" value="<?php echo $renglon2_3;?>" size="20"></td>
    </tr>
 
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 3 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
      <input name="renglon3" type="text" id="renglon3" value="<?php echo $renglon3;?>" size="35">
    </div></td>
   
<?php 
switch ($renglon3_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado3" type="radio" value="1">
  Ent.
  <input name="resultado3" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado3" type="radio" value="1"checked>
  Ent.
  <input name="resultado3" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado3" type="radio" value="1">
  Ent.
  <input name="resultado3" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado3" type="radio" value="1">
  Ent.
  <input name="resultado3" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado3" type="radio" value="1">
  Ent.
  <input name="resultado3" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>


    <td valign="top" bgcolor="#EDEDED"><input name="renglon3_2" type="text" id="renglon3_2" value="<?php echo $renglon3_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon3_3" type="text" id="renglon3_3" value="<?php echo $renglon3_3;?>" size="20"></td>
    </tr>
  
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3">4</span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
      <input name="renglon4" type="text" id="renglon4" value="<?php echo $renglon4;?>" size="35">
    </div></td>
  <?php 
switch ($renglon4_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado4" type="radio" value="1">
  Ent.
  <input name="resultado4" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado4" type="radio" value="1" checked>
  Ent.
  <input name="resultado4" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado4" type="radio" value="1">
  Ent.
  <input name="resultado4" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado4" type="radio" value="1">
  Ent.
  <input name="resultado4" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado4" type="radio" value="1">
  Ent.
  <input name="resultado4" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon4_2" type="text" id="renglon4_2" value="<?php echo $renglon4_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon4_3" type="text" id="renglon4_3" value="<?php echo $renglon4_3;?>" size="20"></td>
    </tr>

<tr align="center" bordercolor="#FFFFFF">
  <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 5 </span></td>
  <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
    <input name="renglon5" type="text" id="renglon5" value="<?php echo $renglon5;?>" size="35">
  </div></td>
 
<?php 
switch ($renglon5_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado5" type="radio" value="1">
  Ent.
  <input name="resultado5" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado5" type="radio" value="1"checked>
  Ent.
  <input name="resultado5" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado5" type="radio" value="1">
  Ent.
  <input name="resultado5" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado5" type="radio" value="1">
  Ent.
  <input name="resultado5" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado5" type="radio" value="1">
  Ent.
  <input name="resultado5" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>

  <td valign="top" bgcolor="#EDEDED"><input name="renglon5_2" type="text" id="renglon5_2" value="<?php echo $renglon5_2;?>" size="8"></td>
  <td valign="top" bgcolor="#EDEDED"><input name="renglon5_3" type="text" id="renglon5_3" value="<?php echo $renglon5_3;?>" size="20"></td>
  </tr>
<tr align="center" bordercolor="#FFFFFF">
  <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 6 </span></td>
  <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
    <input name="renglon6" type="text" id="renglon6" value="<?php echo $renglon6;?>" size="35">
  </div></td>

<?php 
switch ($renglon6_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado6" type="radio" value="1">
  Ent.
  <input name="resultado6" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado6" type="radio" value="1"checked>
  Ent.
  <input name="resultado6" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado6" type="radio" value="1">
  Ent.
  <input name="resultado6" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado6" type="radio" value="1">
  Ent.
  <input name="resultado6" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado6" type="radio" value="1">
  Ent.
  <input name="resultado6" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>

  <td valign="top" bgcolor="#EDEDED"><input name="renglon6_2" type="text" id="renglon6_2" value="<?php echo $renglon6_2;?>" size="8"></td>
  <td valign="top" bgcolor="#EDEDED"><input name="renglon6_3" type="text" id="renglon6_3" value="<?php echo $renglon6_3;?>" size="20"></td>
  </tr>
<tr align="center" bordercolor="#FFFFFF">
  <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 7 </span></td>
  <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
    <input name="renglon7" type="text" id="renglon7" value="<?php echo $renglon7;?>" size="35">
  </div></td>

<?php 
switch ($renglon7_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado7" type="radio" value="1">
  Ent.
  <input name="resultado7" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado7" type="radio" value="1"checked>
  Ent.
  <input name="resultado7" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado7" type="radio" value="1">
  Ent.
  <input name="resultado7" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado7" type="radio" value="1">
  Ent.
  <input name="resultado7" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado7" type="radio" value="1">
  Ent.
  <input name="resultado7" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>

  <td valign="top" bgcolor="#EDEDED"><input name="renglon7_2" type="text" id="renglon7_2" value="<?php echo $renglon7_2;?>" size="8"></td>
  <td valign="top" bgcolor="#EDEDED"><input name="renglon7_3" type="text" id="renglon7_3" value="<?php echo $renglon7_3;?>" size="20"></td>
  </tr>
<tr align="center" bordercolor="#FFFFFF">
  <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 8 </span></td>
  <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
    <input name="renglon8" type="text" id="renglon8" value="<?php echo $renglon8;?>" size="35">
  </div></td>

<?php 
switch ($renglon8_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado8" type="radio" value="1">
  Ent.
  <input name="resultado8" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado8" type="radio" value="1"checked>
  Ent.
  <input name="resultado8" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado8" type="radio" value="1">
  Ent.
  <input name="resultado8" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado8" type="radio" value="1">
  Ent.
  <input name="resultado8" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado8" type="radio" value="1">
  Ent.

  <input name="resultado8" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>

  <td valign="top" bgcolor="#EDEDED"><input name="renglon8_2" type="text" id="renglon8_2" value="<?php echo $renglon8_2;?>" size="8"></td>
  <td valign="top" bgcolor="#EDEDED"><input name="renglon8_3" type="text" id="renglon8_3" value="<?php echo $renglon8_3;?>" size="20"></td>
  </tr>
  
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 9 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
      <input name="renglon9" type="text" id="renglon9" value="<?php echo $renglon9;?>" size="35">
    </div></td>

<?php 
switch ($renglon9_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado9" type="radio" value="1">
  Ent.
  <input name="resultado9" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado9" type="radio" value="1"checked>
  Ent.
  <input name="resultado9" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado9" type="radio" value="1">
  Ent.
  <input name="resultado9" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado9" type="radio" value="1">
  Ent.
  <input name="resultado9" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado9" type="radio" value="1">
  Ent.
  <input name="resultado9" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>

    <td valign="top" bgcolor="#EDEDED"><input name="renglon9_2" type="text" id="renglon9_2" value="<?php echo $renglon9_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon9_3" type="text" id="renglon9_3" value="<?php echo $renglon9_3;?>" size="20"></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 10 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
      <input name="renglon10" type="text" id="renglon10" value="<?php echo $renglon10;?>" size="35">
    </div></td>
   
<?php 
switch ($renglon10_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado10" type="radio" value="1">
  Ent.
  <input name="resultado10" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado10" type="radio" value="1"checked>
  Ent.
  <input name="resultado10" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado10" type="radio" value="1">
  Ent.
  <input name="resultado10" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado10" type="radio" value="1">
  Ent.
  <input name="resultado10" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado10" type="radio" value="1">
  Ent.
  <input name="resultado10" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>

    <td valign="top" bgcolor="#EDEDED"><input name="renglon10_2" type="text" id="renglon10_2" value="<?php echo $renglon10_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon10_3" type="text" id="renglon10_3" value="<?php echo $renglon10_3;?>" size="20"></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 11 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
      <input name="renglon11" type="text" id="renglon11" value="<?php echo $renglon11;?>" size="35">
    </div></td>
    
<?php 
switch ($renglon11_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado11" type="radio" value="1">
  Ent.
  <input name="resultado11" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado11" type="radio" value="1"checked>
  Ent.
  <input name="resultado11" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado11" type="radio" value="1">
  Ent.
  <input name="resultado11" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado11" type="radio" value="1">
  Ent.
  <input name="resultado11" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado11" type="radio" value="1">
  Ent.
  <input name="resultado11" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>


    <td valign="top" bgcolor="#EDEDED"><input name="renglon11_2" type="text" id="renglon11_2" value="<?php echo $renglon11_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon11_3" type="text" id="renglon11_3" value="<?php echo $renglon11_3;?>" size="20"></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 12 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
      <input name="renglon12" type="text" id="renglon12" value="<?php echo $renglon12;?>" size="35">
    </div></td>
   
<?php 
switch ($renglon12_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado12" type="radio" value="1">
  Ent.
  <input name="resultado12" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado12" type="radio" value="1"checked>
  Ent.
  <input name="resultado12" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado12" type="radio" value="1">
  Ent.
  <input name="resultado12" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado12" type="radio" value="1">
  Ent.
  <input name="resultado12" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado12" type="radio" value="1">
  Ent.
  <input name="resultado12" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>


    <td valign="top" bgcolor="#EDEDED"><input name="renglon12_2" type="text" id="renglon12_2" value="<?php echo $renglon12_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon12_3" type="text" id="renglon12_3" value="<?php echo $renglon12_3;?>" size="20"></td>
    </tr>
  
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 13 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
      <input name="renglon13" type="text" id="renglon13" value="<?php echo $renglon13;?>" size="35">
    </div></td>
<?php 
switch ($renglon13_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado13" type="radio" value="1">
  Ent.
  <input name="resultado13" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado13" type="radio" value="1"checked>
  Ent.
  <input name="resultado13" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado13" type="radio" value="1">
  Ent.
  <input name="resultado13" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado13" type="radio" value="1">
  Ent.
  <input name="resultado13" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado13" type="radio" value="1">
  Ent.
  <input name="resultado13" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon13_2" type="text" id="renglon13_2" value="<?php echo $renglon13_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon13_3" type="text" id="renglon13_3" value="<?php echo $renglon13_3;?>" size="20"></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 14 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
      <input name="renglon14" type="text" id="renglon14" value="<?php echo $renglon14;?>" size="35">
    </div></td>
<?php 
switch ($renglon14_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado14" type="radio" value="1">
  Ent.
  <input name="resultado14" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado14" type="radio" value="1"checked>
  Ent.
  <input name="resultado14" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado14" type="radio" value="1">
  Ent.
  <input name="resultado14" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado14" type="radio" value="1">
  Ent.
  <input name="resultado14" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado14" type="radio" value="1">
  Ent.
  <input name="resultado14" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon14_2" type="text" id="renglon14_2" value="<?php echo $renglon14_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon14_3" type="text" id="renglon14_3" value="<?php echo $renglon14_3;?>" size="20"></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 15 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
      <input name="renglon15" type="text" id="renglon15" value="<?php echo $renglon15;?>" size="35">
    </div></td>
<?php 
switch ($renglon15_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado15" type="radio" value="1">
  Ent.
  <input name="resultado15" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado15" type="radio" value="1"checked>
  Ent.
  <input name="resultado15" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado15" type="radio" value="1">
  Ent.
  <input name="resultado15" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado15" type="radio" value="1">
  Ent.
  <input name="resultado15" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado15" type="radio" value="1">
  Ent.
  <input name="resultado15" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon15_2" type="text" id="renglon15_2" value="<?php echo $renglon15_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon15_3" type="text" id="renglon15_3" value="<?php echo $renglon15_3;?>" size="20"></td>
    </tr>
  
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 16 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
      <input name="renglon16" type="text" id="renglon16" value="<?php echo $renglon16;?>" size="35">
    </div></td>
<?php 
switch ($renglon16_4){

case "":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado16" type="radio" value="1">
  Ent.
  <input name="resultado16" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}


case "1":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado16" type="radio" value="1"checked>
  Ent.
  <input name="resultado16" type="radio" value="4" >
  Vacio</span></td>
<?php break;}

case "2":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado16" type="radio" value="1">
  Ent.
  <input name="resultado16" type="radio" value="4" >
  Vacio</span></td>
<?php break;}


case "3":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
<input name="resultado16" type="radio" value="1">
Ent.
<input name="resultado16" type="radio" value="4" >
Vacio</span></td>
<?php break;}

case "4":{?>
<td valign="top" bgcolor="#EDEDED">

  <span class="Estilo3">
  <input name="resultado16" type="radio" value="1">
  Ent.
  <input name="resultado16" type="radio" value="4" checked>
  Vacio</span></td>
<?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon16_2" type="text" id="renglon16_2" value="<?php echo $renglon16_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon16_3" type="text" id="renglon16_3" value="<?php echo $renglon16_3;?>" size="20"></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top" bgcolor="#EDEDED">SEGUNDA HOJA (NO HABILITADO) </td>
    <td valign="top" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 17 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
        <input name="renglon17" type="text" id="renglon17" value="<?php echo $renglon17;?>" size="35">
    </div></td>
    <?php 
switch ($renglon17_4){

case "":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado17" type="radio" value="1">
      Ent.
      <input name="resultado17" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}


case "1":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado17" type="radio" value="1"checked>
      Ent.
      <input name="resultado17" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}

case "2":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado17" type="radio" value="1">
      Ent.
      <input name="resultado17" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}


case "3":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
    <input name="resultado17" type="radio" value="1">
    Ent.
    <input name="resultado17" type="radio" value="4" >
    Vacio</span></td>
    <?php break;}

case "4":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado17" type="radio" value="1">
      Ent.
      <input name="resultado17" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon17_2" type="text" id="renglon17_2" value="<?php echo $renglon17_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon17_3" type="text" id="renglon17_3" value="<?php echo $renglon17_3;?>" size="20"></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 18 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
        <input name="renglon18" type="text" id="renglon16" value="<?php echo $renglon18;?>" size="35">
    </div></td>
    <?php 
switch ($renglon18_4){

case "":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado18" type="radio" value="1">
      Ent.
      <input name="resultado18" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}


case "1":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado18" type="radio" value="1"checked>
      Ent.
      <input name="resultado18" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}

case "2":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado18" type="radio" value="1">
      Ent.
      <input name="resultado18" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}


case "3":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
    <input name="resultado18" type="radio" value="1">
    Ent.
    <input name="resultado18" type="radio" value="4" >
    Vacio</span></td>
    <?php break;}

case "4":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado18" type="radio" value="1">
      Ent.
      <input name="resultado18" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon18_2" type="text" id="renglon18_2" value="<?php echo $renglon18_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon18_3" type="text" id="renglon18_3" value="<?php echo $renglon18_3;?>" size="20"></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 19 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
        <input name="renglon19" type="text" id="renglon16" value="<?php echo $renglon19;?>" size="35">
    </div></td>
    <?php 
switch ($renglon19_4){

case "":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado19" type="radio" value="1">
      Ent.
      <input name="resultado19" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}


case "1":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado19" type="radio" value="1"checked>
      Ent.
      <input name="resultado19" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}

case "2":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado19" type="radio" value="1">
      Ent.
      <input name="resultado19" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}


case "3":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
    <input name="resultado19" type="radio" value="1">
    Ent.
    <input name="resultado19" type="radio" value="4" >
    Vacio</span></td>
    <?php break;}

case "4":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado19" type="radio" value="1">
      Ent.
      <input name="resultado19" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon19_2" type="text" id="renglon19_2" value="<?php echo $renglon19_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon19_3" type="text" id="renglon19_3" value="<?php echo $renglon19_3;?>" size="20"></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 20 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
        <input name="renglon20" type="text" id="renglon16" value="<?php echo $renglon20;?>" size="35">
    </div></td>
    <?php 
switch ($renglon20_4){

case "":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado20" type="radio" value="1">
      Ent.
      <input name="resultado20" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}


case "1":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado20" type="radio" value="1"checked>
      Ent.
      <input name="resultado20" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}

case "2":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado20" type="radio" value="1">
      Ent.
      <input name="resultado20" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}


case "3":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
    <input name="resultado20" type="radio" value="1">
    Ent.
    <input name="resultado20" type="radio" value="4" >
    Vacio</span></td>
    <?php break;}

case "4":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado20" type="radio" value="1">
      Ent.
      <input name="resultado20" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon20_2" type="text" id="renglon20_2" value="<?php echo $renglon20_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon20_3" type="text" id="renglon20_3" value="<?php echo $renglon20_3;?>" size="20"></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 21 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
        <input name="renglon21" type="text" id="renglon16" value="<?php echo $renglon21;?>" size="35">
    </div></td>
    <?php 
switch ($renglon21_4){

case "":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado21" type="radio" value="1">
      Ent.
      <input name="resultado21" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}


case "1":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado21" type="radio" value="1"checked>
      Ent.
      <input name="resultado21" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}

case "2":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado21" type="radio" value="1">
      Ent.
      <input name="resultado21" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}


case "3":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
    <input name="resultado21" type="radio" value="1">
    Ent.
    <input name="resultado21" type="radio" value="4" >
    Vacio</span></td>
    <?php break;}

case "4":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado21" type="radio" value="1">
      Ent.
      <input name="resultado21" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon21_2" type="text" id="renglon21_2" value="<?php echo $renglon21_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon21_3" type="text" id="renglon21_3" value="<?php echo $renglon21_3;?>" size="20"></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 22 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
        <input name="renglon22" type="text" id="renglon16" value="<?php echo $renglon22;?>" size="35">
    </div></td>
    <?php 
switch ($renglon22_4){

case "":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado22" type="radio" value="1">
      Ent.
      <input name="resultado22" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}


case "1":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado22" type="radio" value="1"checked>
      Ent.
      <input name="resultado22" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}

case "2":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado22" type="radio" value="1">
      Ent.
      <input name="resultado22" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}


case "3":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
    <input name="resultado22" type="radio" value="1">
    Ent.
    <input name="resultado22" type="radio" value="4" >
    Vacio</span></td>
    <?php break;}

case "4":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado22" type="radio" value="1">
      Ent.
      <input name="resultado22" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon22_2" type="text" id="renglon22_2" value="<?php echo $renglon22_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon22_3" type="text" id="renglon22_3" value="<?php echo $renglon22_3;?>" size="20"></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 23 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
        <input name="renglon23" type="text" id="renglon23" value="<?php echo $renglon23;?>" size="35">
    </div></td>
    <?php 
switch ($renglon23_4){

case "":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado23" type="radio" value="1">
      Ent.
      <input name="resultado23" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}


case "1":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado23" type="radio" value="1"checked>
      Ent.
      <input name="resultado23" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}

case "2":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado23" type="radio" value="1">
      Ent.
      <input name="resultado23" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}


case "3":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
    <input name="resultado23" type="radio" value="1">
    Ent.
    <input name="resultado23" type="radio" value="4" >
    Vacio</span></td>
    <?php break;}

case "4":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado23" type="radio" value="1">
      Ent.
      <input name="resultado23" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon23_2" type="text" id="renglon23_2" value="<?php echo $renglon23_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon23_3" type="text" id="renglon23_3" value="<?php echo $renglon23_3;?>" size="20"></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 24 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
        <input name="renglon24" type="text" id="renglon24" value="<?php echo $renglon24;?>" size="35">
    </div></td>
    <?php 
switch ($renglon24_4){

case "":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado24" type="radio" value="1">
      Ent.
      <input name="resultado24" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}


case "1":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado24" type="radio" value="1"checked>
      Ent.
      <input name="resultado24" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}

case "2":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado24" type="radio" value="1">
      Ent.
      <input name="resultado24" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}


case "3":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
    <input name="resultado24" type="radio" value="1">
    Ent.
    <input name="resultado24" type="radio" value="4" >
    Vacio</span></td>
    <?php break;}

case "4":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado24" type="radio" value="1">
      Ent.
      <input name="resultado24" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon24_2" type="text" id="renglon24_2" value="<?php echo $renglon24_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon24_3" type="text" id="renglon24_3" value="<?php echo $renglon24_3;?>" size="20"></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 25 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
        <input name="renglon25" type="text" id="renglon16" value="<?php echo $renglon25;?>" size="35">
    </div></td>
    <?php 
switch ($renglon25_4){

case "":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado25" type="radio" value="1">
      Ent.
      <input name="resultado25" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}


case "1":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado25" type="radio" value="1"checked>
      Ent.
      <input name="resultado25" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}

case "2":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado25" type="radio" value="1">
      Ent.
      <input name="resultado25" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}


case "3":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
    <input name="resultado25" type="radio" value="1">
    Ent.
    <input name="resultado25" type="radio" value="4" >
    Vacio</span></td>
    <?php break;}

case "4":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado25" type="radio" value="1">
      Ent.
      <input name="resultado25" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon25_2" type="text" id="renglon25_2" value="<?php echo $renglon25_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon25_3" type="text" id="renglon25_3" value="<?php echo $renglon25_3;?>" size="20"></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 26 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
        <input name="renglon26" type="text" id="renglon26" value="<?php echo $renglon26;?>" size="35">
    </div></td>
    <?php 
switch ($renglon26_4){

case "":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado26" type="radio" value="1">
      Ent.
      <input name="resultado26" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}


case "1":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado26" type="radio" value="1"checked>
      Ent.
      <input name="resultado26" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}

case "2":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado26" type="radio" value="1">
      Ent.
      <input name="resultado26" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}


case "3":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
    <input name="resultado26" type="radio" value="1">
    Ent.
    <input name="resultado26" type="radio" value="4" >
    Vacio</span></td>
    <?php break;}

case "4":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado26" type="radio" value="1">
      Ent.
      <input name="resultado26" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon26_2" type="text" id="renglon26_2" value="<?php echo $renglon26_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon26_3" type="text" id="renglon26_3" value="<?php echo $renglon26_3;?>" size="20"></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 27 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
        <input name="renglon27" type="text" id="renglon27" value="<?php echo $renglon27;?>" size="35">
    </div></td>
    <?php 
switch ($renglon27_4){

case "":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado27" type="radio" value="1">
      Ent.
      <input name="resultado27" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}


case "1":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado27" type="radio" value="1"checked>
      Ent.
      <input name="resultado27" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}

case "2":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado27" type="radio" value="1">
      Ent.
      <input name="resultado27" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}


case "3":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
    <input name="resultado27" type="radio" value="1">
    Ent.
    <input name="resultado27" type="radio" value="4" >
    Vacio</span></td>
    <?php break;}

case "4":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado27" type="radio" value="1">
      Ent.
      <input name="resultado27" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon27_2" type="text" id="renglon27_2" value="<?php echo $renglon27_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon27_3" type="text" id="renglon27_3" value="<?php echo $renglon27_3;?>" size="20"></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 28 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
        <input name="renglon28" type="text" id="renglon28" value="<?php echo $renglon28;?>" size="35">
    </div></td>
    <?php 
switch ($renglon28_4){

case "":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado28" type="radio" value="1">
      Ent.
      <input name="resultado28" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}


case "1":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado28" type="radio" value="1"checked>
      Ent.
      <input name="resultado28" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}

case "2":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado28" type="radio" value="1">
      Ent.
      <input name="resultado28" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}


case "3":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
    <input name="resultado28" type="radio" value="1">
    Ent.
    <input name="resultado28" type="radio" value="4" >
    Vacio</span></td>
    <?php break;}

case "4":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado28" type="radio" value="1">
      Ent.
      <input name="resultado28" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon28_2" type="text" id="renglon28_2" value="<?php echo $renglon28_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon28_3" type="text" id="renglon28_3" value="<?php echo $renglon28_3;?>" size="20"></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 29 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
        <input name="renglon29" type="text" id="renglon29" value="<?php echo $renglon29;?>" size="35">
    </div></td>
    <?php 
switch ($renglon29_4){

case "":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado29" type="radio" value="1">
      Ent.
      <input name="resultado29" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}


case "1":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado29" type="radio" value="1"checked>
      Ent.
      <input name="resultado29" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}

case "2":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado29" type="radio" value="1">
      Ent.
      <input name="resultado29" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}


case "3":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
    <input name="resultado29" type="radio" value="1">
    Ent.
    <input name="resultado29" type="radio" value="4" >
    Vacio</span></td>
    <?php break;}

case "4":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado29" type="radio" value="1">
      Ent.
      <input name="resultado29" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon29_2" type="text" id="renglon29_2" value="<?php echo $renglon29_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon29_3" type="text" id="renglon29_3" value="<?php echo $renglon29_3;?>" size="20"></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td height="24" bgcolor="#EDEDED"><span class="Estilo3"> 30 </span></td>
    <td valign="top" bgcolor="#EDEDED"><div align="left" class="Estilo3">
        <input name="renglon30" type="text" id="renglon30" value="<?php echo $renglon30;?>" size="35">
    </div></td>
    <?php 
switch ($renglon30_4){

case "":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado30" type="radio" value="1">
      Ent.
      <input name="resultado30" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}


case "1":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado30" type="radio" value="1"checked>
      Ent.
      <input name="resultado30" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}

case "2":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado30" type="radio" value="1">
      Ent.
      <input name="resultado30" type="radio" value="4" >
      Vacio</span></td>
    <?php break;}


case "3":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
    <input name="resultado30" type="radio" value="1">
    Ent.
    <input name="resultado30" type="radio" value="4" >
    Vacio</span></td>
    <?php break;}

case "4":{?>
    <td valign="top" bgcolor="#EDEDED">
      <span class="Estilo3">
      <input name="resultado30" type="radio" value="1">
      Ent.
      <input name="resultado30" type="radio" value="4" checked>
      Vacio</span></td>
    <?php break;}

	}

?>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon30_2" type="text" id="renglon30_2" value="<?php echo $renglon30_2;?>" size="8"></td>
    <td valign="top" bgcolor="#EDEDED"><input name="renglon30_3" type="text" id="renglon30_3" value="<?php echo $renglon30_3;?>" size="20"></td>
  </tr>

   <tr align="center" bordercolor="#FFFFFF">
    <td height="24" colspan="5" bgcolor="#C0C0C0">
	  <input type="hidden" name="cod_practica" value="<?php echo $cod_practica;?>">
      <input type="submit" name="Submit" value="OK">    </td>
    </tr>
</table>

</table>

</form>


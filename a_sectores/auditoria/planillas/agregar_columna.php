<link href="../../../css/fondo.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.Estilo25 {font-family: "Trebuchet MS"}
.Estilo26 {color: #FFFFFF}
.Estilo27 {color: #FFFFFF; font-family: "Trebuchet MS"; }
.Estilo31 {font-size: 12px}
.Estilo32 {
	font-family: "Trebuchet MS";
	font-size: 12px;
	color: #FFFFFF;
}
.Estilo38 {color: #000000}
-->
</style>

<script language="javascript">
function on_load()
{
document.getElementById("columna").focus();
}
</script>

<script language="javascript">
function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "cod_modulo":
				document.getElementById("practica").focus();
				break;

								case "practica":
				document.getElementById("categoria").focus();
				break;

								case "categoria":
				document.getElementById("cod_practica2").focus();
				break;
		
		}
		return false;
	}
	return true;
}
</script>


<?php 
include ("../../../conexiones/config.inc.php");


$cod_modulo= $_REQUEST['cod_modulo'];
$cod_practica= $_REQUEST['cod_practica'];
$practica= $_REQUEST['practica'];
	

$sql10="select * from planillas where cod_modulo = $cod_modulo";
$result10 = $db->Execute($sql10);
$nombre_modulo=strtoupper($result10->fields["nombre_modulo"]);

?>


<BODY onload = "on_load ()">

<FORM name="form" ACTION="<?php  echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">



<table width="850" border="0" cellspacing="0">
 <tr align="center" bordercolor="#FFFFFF"> 
    <td colspan="3"><strong><img src="../../../imagenes/agregar_columna.jpg" width="846" height="35"></strong></td>
  </tr>

  <tr align="center" >
    <td width="134" bordercolor="#FFFFFF" bgcolor="#B8B8B8"><div align="right" class="Estilo25"><font color="#000000" size="2">Codigo</font></div></td> 
    <td width="437" bgcolor="#F0F0F0"><div align="left">
      <?php echo $cod_modulo;?> - <?php echo $nombre_modulo;?>
    </div></td>
    <td width="273" bgcolor="#F0F0F0">&nbsp;</td>
  </tr>
  <tr align="center" >
    <td bordercolor="#FFFFFF" bgcolor="#B8B8B8"><div align="right" class="Estilo25"><font color="#000000" size="2"><font color="#000000">Practica</font> </font></div></td>
    <td bgcolor="#F0F0F0"><div align="left">
   <?php echo $practica;?>
    </div></td>
    <td width="273" rowspan="2" bordercolor="#FFFFFF" bgcolor="#F0F0F0"><a href="guardar_modulo.php?cod_modulo11=<?php print("$cod_modulo");?>" target = "central" class="Estilo18" ></a><a href="guardar_modulo.php?cod_modulo=<?php print("$cod_modulo");?>" target = "central" class="Estilo18" ></a></td>
  </tr>



  <tr align="center" > 
    <td bgcolor="#B8B8B8"><div align="right" class="Estilo27 Estilo38"><font size="2">Nombre columna </font></div></td>
    <td bgcolor="#F0F0F0">
      <div align="left" class="Estilo26">
        <input type="text"  name="columna" size = "5" id="columna" value="">
		<input type="hidden"  name="cod_practica" size = "5" id="columna" value="<?php echo $cod_practica;?>">
<input type="hidden"  name="practica" size = "5" id="columna" value="<?php echo $practica;?>">
<input type="hidden"  name="cod_modulo" size = "5" id="columna" value="<?php echo $cod_modulo;?>">
<input type="hidden"  name="cod_practica" size = "5" id="columna" value="<?php echo $cod_practica;?>">
        <input name="Alta" type="submit"  value="Guardar Columna" id ="Alta">
		<input name="Alta" type="submit"  value="Ver Practica" id ="Alta">
    </div></td>
  </tr>
</table>

<table width="848" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#C4D7E6">
  <td width="44" bgcolor="#666666"><div align="center" class="Estilo18 Estilo25 Estilo31 Estilo26"></div></td>
    <td width="90" bgcolor="#666666"><div align="center" class="Estilo18 Estilo25 Estilo31 Estilo26">COLUMNA</div></td>
    <td width="557" bgcolor="#666666"><div align="center" class="Estilo32"></div></td>
    <td width="139" bgcolor="#666666"><div align="center" class="Estilo4 Estilo26"><span class="Estilo1 Estilo25 Estilo31"><span class="Estilo25">BORRAR</span></span></div></td>
</tr>
</table>




<?php 
  
		if(isset($_REQUEST['Alta'])) {
	
	switch ($_REQUEST['Alta'])
	{
		case "Guardar Columna":
				{
		
include ("../../../conexiones/config.inc.php");


$cod_modulo=$_POST["cod_modulo"];
$cod_practica=$_POST["cod_practica"];
$columna=$_POST["columna"];

if ($columna != ""){

 $sql = "INSERT INTO deta_planillas_ver (`cod_modulo`, `cod_practica`, `nombre_columna` , `cod_operacion`) VALUES ('$cod_modulo', '$cod_practica', '$columna', '')";
$result = $db->Execute($sql);

				}


?> <table width="848" border="0" cellpadding="0" cellspacing="0">

<?php 
include ("../../../conexiones/config.inc.php");


$cod_modulo=$_POST["cod_modulo"];
$cod_practica=$_POST["cod_practica"];
$practica=$_POST["practica"];//110
$categoria=$_POST["categoria"];


$sql10="select * from deta_planillas_ver where cod_modulo = $cod_modulo and cod_practica = $cod_practica";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {


$cod_practica=strtoupper($result10->fields["cod_practica"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
$nombre_columna=strtoupper($result10->fields["nombre_columna"]);



?>
  <td width="45"></font>
    <tr  style="cursor:hand" onMouseOver="this.style.background='#FFFFFF'; this.style.color='BLACK'" onMouseOut="this.style.background=''; this.style.color='black'">

    <td bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#EDEDED"></div>
      <?php echo $nombre_columna;?></td>
  <td width="135" bgcolor="#EDEDED"><div align="center"><a href="agregar_practica.php?palabra=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&cod_modulo1=<?php print("$cod_modulo");?>&&bandera=<?php print("$bandera");?>&&categoria=<?php print("$categoria");?>&&nombre=<?php print("$nombre");?>" target = "central" class="Estilo18" >  <IMG SRC="../../../imagenes/office//1047.ico" alt="Imprimir" border = "0"></a></div></td>
  </tr>
<?php 

$result10->MoveNext();

	}

?></table>


<?php
break;
				}




case "Ver Practica":
				{

		
?> <table width="848" border="0" cellpadding="0" cellspacing="0">

<?php 
include ("../../../conexiones/config.inc.php");


$cod_modulo=$_POST["cod_modulo"];
$cod_practica=$_POST["cod_practica"];
$practica=$_POST["practica"];//110
$categoria=$_POST["categoria"];


$sql10="select * from deta_planillas_ver where cod_modulo = $cod_modulo and cod_practica = $cod_practica";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {


$cod_practica=strtoupper($result10->fields["cod_practica"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);
$nombre_columna=strtoupper($result10->fields["nombre_columna"]);



?>
  <td width="45"></font>
    <tr  style="cursor:hand" onMouseOver="this.style.background='#FFFFFF'; this.style.color='BLACK'" onMouseOut="this.style.background=''; this.style.color='black'">

    <td bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#EDEDED"></div>
      <?php echo $nombre_columna;?></td>
  <td width="135" bgcolor="#EDEDED"><div align="center"><a href="agregar_practica.php?palabra=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&cod_modulo1=<?php print("$cod_modulo");?>&&bandera=<?php print("$bandera");?>&&categoria=<?php print("$categoria");?>&&nombre=<?php print("$nombre");?>" target = "central" class="Estilo18" >  <IMG SRC="../../../imagenes/office//1047.ico" alt="Imprimir" border = "0"></a></div></td>
  </tr>
<?php 

$result10->MoveNext();

	}

?></table>
<?php 

			break;
				}
		
	
 }
  }


 ?>
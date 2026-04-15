<link href="../../../css/fondo.css" rel="stylesheet" type="text/css" />

<?php 
include ("../../../conexiones/config.inc.php");
global $nro_os;

$palabra = $_GET['palabra'];
$operador= $_GET['operador'];
$cod_modulo= $_REQUEST['cod_modulo1'];
$bandera= $_REQUEST['bandera'];

$categoria= $_REQUEST['categoria'];
$nombre= $_REQUEST['nombre'];
$cod_operacion= $_REQUEST['cod_operacion'];

if ($palabra == "poner lo que quieras"){

	
$sql1="select * from planillas  order by cod_modulo desc";
$result = $db->Execute($sql1);
 $cod_modulo=$result->fields["cod_modulo"] + 1;


?>

<script language="javascript">
function on_load()
{
document.getElementById("cod_modulo").focus();
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


}


else{
?>
<script language="javascript">
function on_load()
{
document.getElementById("cod_practica2").focus();
}
</script>



<?php 
}




?>



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
<BODY onload = "on_load ()">
<FORM name="form" ACTION="<?php  echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">
<table width="850" border="0" cellspacing="0">
  <tr align="center" bordercolor="#FFFFFF"> 
    <td colspan="3"><strong><img src="../../../imagenes/agregar_planilla.jpg" width="846" height="35"></strong></td>
  </tr>
  

  <?php   if ($bandera != "1"){?>

<?php   if ($palabra == "poner lo que quieras"){?>
  <tr align="center" bordercolor="#FFFFFF"> 
    <td width="134" bgcolor="#B8B8B8"><div align="right" class="Estilo25"><font color="#000000" size="2">Codigo</font></div></td>
    <td bgcolor="#F0F0F0"><div align="left">
      <input type="text"  name="cod_modulo" size = "5" id="cod_modulo" onKeyPress="return verif_caracter(this,event)" value="<?php echo $cod_modulo;?>">
    </div></td>
    <td width="272" rowspan="5" bgcolor="#F0F0F0"><a href="guardar_modulo.php?cod_modulo11=<?php print("$cod_modulo");?>" target = "central" class="Estilo18" ><img src="../../../imagenes/bt_modulo.png" alt="Guardar Modulo" border = "0"></a></td>
    <?php }ELSE{?>
  <tr align="center" bordercolor="#FFFFFF"> 
    <td width="134" bgcolor="#B8B8B8"><div align="right" class="Estilo25"><font color="#000000" size="2">Codigo</font></div></td>
    <td bgcolor="#F0F0F0"><div align="left">
      <input type="text"  name="cod_modulo" size = "5" id="cod_modulo" onKeyPress="return verif_caracter(this,event)" value="<?php if (isset($_REQUEST['cod_modulo'])) echo $_REQUEST['cod_modulo'];?>">
    </div></td>
	<?php }?>
  </tr>
  <tr align="center" bordercolor="#FFFFFF">
    <td bgcolor="#B8B8B8"><div align="right" class="Estilo25"><font color="#000000" size="2">Nombre </font></div></td>
    <td width="438" bordercolor="#FFFFFF" bgcolor="#F0F0F0"><div align="left">
      <input type="text"  name="practica" size = "40" id="practica" onKeyPress="return verif_caracter(this,event)" value="<?php if (isset($_REQUEST['practica'])) echo $_REQUEST['practica'];?>">
    </div></td>
  </tr>

  <tr align="center" bordercolor="#FFFFFF"> 
    <td align="right" bgcolor="#B8B8B8">     <div align="right" class="Estilo25"><font size="2">Categoria</font></div></td>
    <td align="center" bgcolor="#F0F0F0">        
      <div align="left">
        <input type="text"  name="categoria" size = "40" id="categoria" onKeyPress="return verif_caracter(this,event)" value="<?php if (isset($_REQUEST['categoria'])) echo $_REQUEST['categoria'];?>">
</div></td>
  </tr>
  <tr align="center" > 
    <td bgcolor="#B8B8B8"><div align="right" class="Estilo27 Estilo38"><font size="2">N&ordm; Practica</font></div></td>
    <td bgcolor="#F0F0F0">
      <div align="left" class="Estilo26">
        <input type="text"  name="cod_practica2" size = "5" id="cod_practica2" value="">
        <input name="Alta" type="submit"  value="Guardar Practica" id ="Alta">
		<input name="Alta" type="submit"  value="Ver Practica" id ="Alta">
    </div></td>
  </tr>
</table>
<table width="848" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#C4D7E6">
  <td width="44" bgcolor="#666666"><div align="center" class="Estilo18 Estilo25 Estilo31 Estilo26">ITEM</div></td>
    <td width="90" bgcolor="#666666"><div align="center" class="Estilo18 Estilo25 Estilo31 Estilo26">Nº PRACTICA</div></td>
    <td width="557" bgcolor="#666666"><div align="center" class="Estilo32">PRACTICA</div></td>
    <td width="139" bgcolor="#666666"><div align="center" class="Estilo4 Estilo26"><span class="Estilo1 Estilo25 Estilo31"><span class="Estilo25">BORRAR</span></span></div></td>
</tr>

</table>


<?php }else{?>
<table width="850" border="0" cellspacing="0">
  <tr align="center" >
    <td width="134" bordercolor="#FFFFFF" bgcolor="#B8B8B8"><div align="right" class="Estilo25"><font color="#000000" size="2">Codigo</font></div></td> 
    <td width="437" bgcolor="#F0F0F0"><div align="left">
      <input type="text"  name="cod_modulo" size = "5" id="cod_modulo" onKeyPress="return verif_caracter(this,event)" value="<?php echo $cod_modulo;?>">
    </div></td>
    <td width="273" bgcolor="#F0F0F0">&nbsp;</td>
  </tr>
  <tr align="center" >
    <td bordercolor="#FFFFFF" bgcolor="#B8B8B8"><div align="right" class="Estilo25"><font color="#000000" size="2">Nombre </font></div></td>
    <td bgcolor="#F0F0F0"><div align="left">
      <input type="text"  name="practica" size = "40" id="practica" onKeyPress="return verif_caracter(this,event)" value="<?php echo $nombre;?>">
    </div></td>
    <td width="272" rowspan="3" bordercolor="#FFFFFF" bgcolor="#F0F0F0"><a href="guardar_modulo.php?cod_modulo11=<?php print("$cod_modulo");?>" target = "central" class="Estilo18" ><img src="../../../imagenes/bt_modulo.png" alt="Guardar Modulo" border = "0"></a><a href="guardar_modulo.php?cod_modulo=<?php print("$cod_modulo");?>" target = "central" class="Estilo18" ></a></td>
  </tr>

  <tr align="center" >
    <td align="right" bordercolor="#FFFFFF" bgcolor="#B8B8B8"><div align="right" class="Estilo25"><font size="2">Categoria</font></div></td> 
    <td align="center" bgcolor="#F0F0F0">        
      <div align="left">
        <input type="text"  name="categoria" size = "40" id="categoria" onKeyPress="return verif_caracter(this,event)" value="<?php echo $categoria;?>">
</div></td>
  </tr>

  
  <tr align="center" > 
    <td bgcolor="#B8B8B8"><div align="right" class="Estilo27 Estilo38"><font size="2">N&ordm; Practica</font></div></td>
    <td bgcolor="#F0F0F0">
      <div align="left" class="Estilo26">
        <input type="text"  name="cod_practica2" size = "5" id="cod_practica2" value="">
        <input name="Alta" type="submit"  value="Guardar Practica" id ="Alta">
		<input name="Alta" type="submit"  value="Ver Practica" id ="Alta">
    </div></td>
  </tr>
</table>

<table width="848" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#C4D7E6">
  <td width="44" bgcolor="#666666"><div align="center" class="Estilo18 Estilo25 Estilo31 Estilo26">ITEM</div></td>
    <td width="90" bgcolor="#666666"><div align="center" class="Estilo18 Estilo25 Estilo31 Estilo26">Nº PRACTICA</div></td>
    <td width="557" bgcolor="#666666"><div align="center" class="Estilo32">PRACTICA</div></td>
    <td width="139" bgcolor="#666666"><div align="center" class="Estilo4 Estilo26"><span class="Estilo1 Estilo25 Estilo31"><span class="Estilo25">BORRAR</span></span></div></td>
</tr>
</table>

<table width="848" border="0" cellpadding="0" cellspacing="0">
<?php 

$sql10="DELETE from deta_planillas where cod_operacion = $cod_operacion";
$result10 = $db->Execute($sql10);	

$sql10="select * from deta_planillas where cod_modulo = $cod_modulo";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {


$cod_practica=strtoupper($result10->fields["cod_practica"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);


$sql8="select practica from convenio_practica where cod_practica = '$cod_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);


$cantidad = $cantidad + 1;

$practica = substr($practica,0,30);
$bandera = 1;

?>
  
 <tr style="cursor:hand" onMouseOver="this.style.background='#FFFFFF'; this.style.color='BLACK'" onMouseOut="this.style.background=''; this.style.color='black'">

    <td width="46" bgcolor="#EDEDED"><div align="center" class="Estilo18"><?php echo $cantidad;?></div></td>
    <td width="90" bgcolor="#EDEDED"><div align="center" class="Estilo18"><?php echo $cod_practica;?></div></td>
    <td width="573" bgcolor="#EDEDED"><div align="center" class="Estilo18"> 
      <div align="left"><?php echo $practica;?></div>
    </div>
    </a></div></td>
	<td width="139" bgcolor="#EDEDED"><div align="center"><a href="agregar_practica.php?palabra=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&cod_modulo1=<?php print("$cod_modulo");?>&&bandera=<?php print("$bandera");?>&&categoria=<?php print("$categoria");?>&&nombre=<?php print("$nombre");?>" target = "central" class="Estilo18" >  <IMG SRC="../../../imagenes/office//1047.ico" alt="Imprimir" border = "0"></a></div></td>
  </tr>

<?php 

$result10->MoveNext();

	}


}


?>  </table><?php 
  
		if(isset($_REQUEST['Alta'])) {
	
	switch ($_REQUEST['Alta'])
	{
		case "Guardar Practica":
				{
		
include ("../../../conexiones/config.inc.php");

?> <table width="848" border="0" cellpadding="0" cellspacing="0"> <?php 
$cod_modulo=$_POST["cod_modulo"];
$cod_practica2=$_POST["cod_practica2"];
$practica=$_POST["practica"];//110
$categoria=$_POST["categoria"];

$nombre = $practica;
$sql10="select * from planillas where cod_modulo = $cod_modulo";
$result10 = $db->Execute($sql10);
$cod_mod=strtoupper($result10->fields["cod_modulo"]);

$sql8="select practica from convenio_practica where cod_practica = '$cod_practica2' ";
$result8 = $db->Execute($sql8);
$practicas=strtoupper($result8->fields["practica"]);

if ($practicas == ""){
$leyenda = "PRACTICA INEXISTENTE EN NBU";
include ("../../../alertas/campo_informacion.php");
exit;
}
if ($cod_mod == ""){
$sql = "INSERT INTO planillas (`cod_modulo`, `nombre_modulo`, `categoria`) VALUES ('$cod_modulo', '$practica', '$categoria')";
$result = $db->Execute($sql);
}else{
$sql = "UPDATE planillas SET `nombre_modulo` = '$practica', `categoria` = '$categoria' WHERE cod_modulo = $cod_modulo LIMIT 1";
$result = $db->Execute($sql);
					}

$sql = "INSERT INTO deta_planillas (`cod_modulo`, `cod_practica`, `a`, `b`, `c`) VALUES ('$cod_modulo', '$cod_practica2', '', '', '')";
$result = $db->Execute($sql);


$sql10="select * from deta_planillas where cod_modulo = $cod_modulo";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {


$cod_practica=strtoupper($result10->fields["cod_practica"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);


$sql8="select practica from convenio_practica where cod_practica = '$cod_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);


$cantidad = $cantidad + 1;

$practica = substr($practica,0,30);
$bandera = 1;

?>
  <td width="45" bgcolor="#EDEDED"></font>
    <tr  style="cursor:hand" onMouseOver="this.style.background='#FFFFFF'; this.style.color='BLACK'" onMouseOut="this.style.background=''; this.style.color='black'">

    <td bgcolor="#EDEDED"><div align="center" class="Estilo18"><?php echo $cantidad;?></div></td>
    <td width="90" bgcolor="#EDEDED"><div align="center" class="Estilo18"><?php echo $cod_practica;?></div></td>
   <td width="573" bgcolor="#EDEDED"><div align="center" class="Estilo18"> 
     <div align="left"><?php echo $practica;?></div>
   </div>
     </a></div></td>
	<td width="138" bgcolor="#EDEDED"><div align="center"><a href="agregar_practica.php?palabra=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&cod_modulo1=<?php print("$cod_modulo");?>&&bandera=<?php print("$bandera");?>&&categoria=<?php print("$categoria");?>&&nombre=<?php print("$nombre");?>" target = "central" class="Estilo18" >  <IMG SRC="../../../imagenes/office//1047.ico" alt="Imprimir" border = "0"></a></div></td>
  </tr>
<?php 

$result10->MoveNext();

	}

?></table><?php 
			break;
				}




case "Ver Practica":
				{

		
?> <table width="848" border="0" cellpadding="0" cellspacing="0"> <?php 
include ("../../../conexiones/config.inc.php");


$cod_modulo=$_POST["cod_modulo"];
$cod_practica2=$_POST["cod_practica2"];
$practica=$_POST["practica"];//110
$categoria=$_POST["categoria"];

$nombre = $practica;
$sql10="select * from planillas where cod_modulo = $cod_modulo";
$result10 = $db->Execute($sql10);
$cod_mod=strtoupper($result10->fields["cod_modulo"]);

$sql8="select practica from convenio_practica where cod_practica = '$cod_practica2' ";
$result8 = $db->Execute($sql8);
$practicas=strtoupper($result8->fields["practica"]);


$sql10="select * from deta_planillas where cod_modulo = $cod_modulo";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {


$cod_practica=strtoupper($result10->fields["cod_practica"]);
$cod_operacion=strtoupper($result10->fields["cod_operacion"]);


$sql8="select practica from convenio_practica where cod_practica = '$cod_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);


$cantidad = $cantidad + 1;

$practica = substr($practica,0,30);
$bandera = 1;

?>
  <td width="45"></font>
  
    <tr  style="cursor:hand" onMouseOver="this.style.background='#FFFFFF'; this.style.color='BLACK'" onMouseOut="this.style.background=''; this.style.color='black'">

    <td bgcolor="#EDEDED"><div align="center" class="Estilo18"><?php echo $cantidad;?></div></td>
    <td width="90" bgcolor="#EDEDED"><div align="center" class="Estilo18"><?php echo $cod_practica;?></div></td>
  <td width="573" bgcolor="#EDEDED"><div align="center" class="Estilo18"> 
    <div align="left"><?php echo $practica;?></div>
  </div>
    </a></div></td>
	<td width="135" bgcolor="#EDEDED"><div align="center"><a href="agregar_practica.php?palabra=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&cod_modulo1=<?php print("$cod_modulo");?>&&bandera=<?php print("$bandera");?>&&categoria=<?php print("$categoria");?>&&nombre=<?php print("$nombre");?>" target = "central" class="Estilo18" >  <IMG SRC="../../../imagenes/office//1047.ico" alt="Imprimir" border = "0"></a></div></td>
  </tr>
<?php 

$result10->MoveNext();

	}

?></table><?php 

			break;
				}
		
	
 }
  }


 ?>

<?php 
include ("../../../conexiones/config.inc.php");
global $nro_os;

 $palabra = $_GET['palabra'];

if ($palabra = "poner lo que quieras"){

	
$sql1="select * from modulo  order by cod_modulo desc";
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



<BODY onload = "on_load ()">
<FORM name="form" ACTION="<?php php echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">
<table width="750" border="0">
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#000099"> 
    <td height="34" colspan="2"><strong><font color="#FFFFFF">MODULOS </font></strong></td>
  </tr>
  

<?php   if ($palabra = "poner lo que quieras"){?>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td width="120" bgcolor="#C1F2FF"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Codigo</font></div></td>
    <td width="620" bgcolor="#DAFAFC"><div align="left">
      <input type="text"  name="cod_modulo" size = "5" id="cod_modulo" onkeypress="return verif_caracter(this,event)" value="<?php echo $cod_modulo;?>">
    </div></td>
<?php }ELSE{?>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td width="120" bgcolor="#C1F2FF"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Codigo</font></div></td>
    <td width="620" bgcolor="#DAFAFC"><div align="left">
      <input type="text"  name="cod_modulo" size = "5" id="cod_modulo" onkeypress="return verif_caracter(this,event)" value="<?php php if (isset($_REQUEST['cod_modulo'])) echo $_REQUEST['cod_modulo'];?>">
    </div></td>
	<?php }?>



  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#C1F2FF"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nombre </font></div></td>
    <td bgcolor="#DAFAFC"><div align="left">
      <input type="text"  name="practica" size = "40" id="practica" onkeypress="return verif_caracter(this,event)" value="<?php php if (isset($_REQUEST['practica'])) echo $_REQUEST['practica'];?>">
    </div></td>
  </tr>

  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td align="right" bgcolor="#C1F2FF">     <div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Categoria</font></div></td>
    <td align="center" bgcolor="#DAFAFC">        
      <div align="left">

	   <?php 
 $sql = "SELECT * FROM metodo order by metodo";
$result = $db->Execute($sql);
echo "<select name=categoria[] size=1 id =categoria onKeyPress='return verif_caracter(this,event)'>";
echo"<option value='<?php php if (isset($_REQUEST['practica'])) echo $_REQUEST['practica'];?>'"'>Seleccione Categoria</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
 $cod_categoria=$result->fields["cod_metodo"];
$categoria=strtoupper($result->fields["metodo"]);
$descripcion=strtoupper($result->fields["descripcion"]);


$cod = $documento;
echo"<option value=$cod_categoria>$categoria </option>";
$result->MoveNext();
	}
echo"</select>";
?>


       
</div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td height="28"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">N&ordm; Practica</font></div></td>
    <td height="28">
      <div align="left">
        <input type="text"  name="cod_practica2" size = "5" id="cod_practica2" value="">
        <input name="Alta" type="submit"  value="Guardar Practica" id ="Alta">
    </div></td>
  </tr>
</table>

<table width="750" border="1" cellpadding="1" cellspacing="0">
<tr bgcolor="#C4D7E6">
  <td width="50"><div align="center" class="Estilo18"><font size="2" face="Arial, Helvetica, sans-serif">ITEM</font></div></td>
    <td width="100"><div align="center" class="Estilo18"><font size="2" face="Arial, Helvetica, sans-serif">NRO PRACTICA</font></div></td>
    <td width="600"><div align="center" class="Estilo4"><font size="2" face="Arial, Helvetica, sans-serif"><span class="Estilo1">PRACTICA</span></font></div></td>
	 <td width="50"><div align="center" class="Estilo4"><font size="2" face="Arial, Helvetica, sans-serif"><span class="Estilo1">BORRAR</span></font></div></td>
  </tr>

  <font size="2" face="Arial, Helvetica, sans-serif">
  <?php 
		if(isset($_REQUEST['Alta'])) {
	
	switch ($_REQUEST['Alta'])
	{
		case "Guardar Practica":
				{
		
include ("../../../conexiones/config.inc.php");


$cod_modulo=$_POST["cod_modulo"];
$cod_practica2=$_POST["cod_practica2"];
$practica=$_POST["practica"];//110



$categori=$_REQUEST["categoria"];
	for ($i=0;$i<count($categori);$i++)    
	{     
	$categoria = $categori[$i];    
	}




 $sql10="select * from modulo where cod_modulo = $cod_modulo";
$result10 = $db->Execute($sql10);
$cod_mod=strtoupper($result10->fields["cod_modulo"]);

if ($cod_mod == ""){
$sql = "INSERT INTO modulo (`cod_modulo`, `nombre_modulo`, `categoria`) VALUES ('$cod_modulo', '$practica', '$categoria')";
$result = $db->Execute($sql);
}else{
$sql = "UPDATE modulo SET `nombre_modulo` = '$practica', `categoria` = '$categoria' WHERE cod_modulo = $cod_modulo LIMIT 1";
$result = $db->Execute($sql);
					}

$sql = "INSERT INTO deta_modulo (`cod_modulo`, `cod_practica`, `a`, `b`, `c`) VALUES ('$cod_modulo', '$cod_practica2', '', '', '')";
$result = $db->Execute($sql);


$sql10="select * from deta_modulo where cod_modulo = $cod_modulo";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {


$cod_practica=strtoupper($result10->fields["cod_practica"]);


$sql8="select practica from convenio_practica where cod_practica = '$cod_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);

$cantidad = $cantidad + 1;

$practica = substr($practica,0,30);


?>
  </font>
  
    <tr bordercolor="#E0EDF3" bgcolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">

    <td><div align="center" class="Estilo18"><?php echo $cantidad;?></div></td>
    <td><div align="center" class="Estilo18"><?php echo $cod_practica;?></div></td>
    <td><div class="Estilo18"><a href="borra_practica.php?operador=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>" target = "central" class="Estilo18" > <?php echo $practica;?></a>
	
	
	
	</div></td>
	<td><div align="center"><a href="borra_practica.php?operador=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&nro_practica=<?php print("$nro_practica");?>" target = "central" class="Estilo18" >  <IMG SRC="../../../imagenes/office//1047.ico" alt="Imprimir" border = "0"></a></div></td>
  </tr>
<?php 

$result10->MoveNext();

	}



			break;
				}

		
	}
 }
 ?>

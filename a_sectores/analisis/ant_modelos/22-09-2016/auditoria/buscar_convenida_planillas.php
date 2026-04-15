<!-- <link href="../../css/fondo.css" rel="stylesheet" type="text/css" /> -->
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo1 {color: #FFFFFF}
body {
 
}

-->
</style>


<?php
$B = 1;

$palabra=$_POST["busca"];
$nro_os=$_POST["nro_os"];
 $buscador_rapido=$_POST["buscador_rapido"];
$usuario=$_POST["usuario"];

$buscar_po=$_POST["buscar_por"];
	for ($i=0;$i<count($buscar_po);$i++)    
	{     
 $buscar_por = $buscar_po[$i];    
	}


$variable=$_POST["variable"];

$radiobutton=$_POST["radiobutton"];

//include ("../../a_sectores/auditoria/practicas/buscar_practicas.php");
$radiobutton = 2;

switch ($radiobutton){
case "1":{
	
	?> <table width="828" border="0">
<tr bordercolor="#0066FF" bgcolor="#E8DCFC">
<td colspan="14"><div align="center"><img src="../../imagenes/nbu1.jpg" width="830" height="35"></div></td>
</tr>
<tr bordercolor="#0066FF" bgcolor="#333333"> 
<td width="6%"><div align="center" class="Estilo1"><font size="2" face="Arial, Helvetica, sans-serif">Nº </font></div></td>
<td width="52%"><div align="center" class="Estilo1"><font size="2" face="Arial, Helvetica, sans-serif">PRACTICA</font></div></td>
<td width="8%"><div align="center" class="Estilo1"><font size="2" face="Arial, Helvetica, sans-serif">TIPO</font></div></td>
<td width="10%"><div align="center" class="Estilo1"><font size="2" face="Arial, Helvetica, sans-serif">UNIDADES</font></div></td>
<td width="9%"><div align="center" class="Estilo1"><font size="2" face="Arial, Helvetica, sans-serif">TOTAL</font></div></td>


</table>

<iframe src="practicas_convenidas.php?palabra=<?php print("$palabra");?>&&variable=<?php print("$variable");?>&&buscar_por=<?php print("$buscar_por");?>" width="750" height = "400"  frameborder="0"> </iframe>
<?php
break;	}



case "2":{		
	
	?>
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo3 {color: #FFFFFF}
-->
</style>

<body>

<table width="800" border="0">
  <!--DWLayoutTable-->
<tr bordercolor="#0066FF">
<td colspan="4"><div align="center"><img src="../../imagenes/agregar_planilla.jpg" width="800" height="35"></div></td>
</tr>
</TABLE>
 

 <table width="800" border="0" cellpadding="0" cellspacing="0">
<!--DWLayoutTable-->

<?php 

$palabra=$_REQUEST["palabra"];

include ("../../conexiones/config.inc.php");

if ($palabra == ""){
$sql1="select * from planillas  order by cod_modulo asc";
}else{
$sql1="select * from planillas  where  cod_modulo like '$palabra' or nombre_modulo like '$palabra' order by cod_modulo asc";
}
	
	$result = $db->Execute($sql1);

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
	
$cod_modulo=strtoupper($result->fields["cod_modulo"]);
$nombre_modulo=strtoupper($result->fields["nombre_modulo"]);
$categoria=strtoupper($result->fields["categoria"]);


/*$sql11="select * from metodo  where cod_metodo = $categoria ";
$result1 = $db->Execute($sql11);
$categoria=strtoupper($result1->fields["categoria"]);
*/
?>


 
<tr bordercolor="#FFFFFF"> 
<td colspan="2" bgcolor="#FFFF99"><div align="center"></div>  
<div align="left"></div>
<div align="left" class="Estilo4"><?php print("$cod_modulo");?> - <?php print("$nombre_modulo");?></div>
<a href="modificar_modulo.php?cod_modulo=<?php print("$cod_modulo");?>" target = "central">
  <div align="center"></div></td>
<td width="50" bgcolor="#FFFF99"></td>
<td width="58" bgcolor="#FFFF99"><div align="center"><a href="borra_planilla.php?cod_modulo=<?php print("$cod_modulo");?>" target = "central" onClick="return confirm('¿Está seguro de Borrar la practica del MODULO?');"><IMG SRC="../../imagenes/office//095.ico" alt="Ficha" border = "0"></a></font></div></td>
</tr>





<?php 
$sql10="select * from deta_planillas where cod_modulo = $cod_modulo";
$result10 = $db->Execute($sql10);

if (!$result10) die("fall222o".$db->ErrorMsg());
 while (!$result10->EOF) {


$cod_practica=strtoupper($result10->fields["cod_practica"]);

$sql8="select practica from convenio_practica where cod_practica = '$cod_practica' ";
$result8 = $db->Execute($sql8);
$practica=strtoupper($result8->fields["practica"]);
$practica = substr($practica,0,35);
$cantidad = $cantidad + 1;

?>


    <tr bordercolor="#E0EDF3" style="cursor:hand" onMouseOver="this.style.background='#E1E1E1'; this.style.color='blue'" onMouseOut="this.style.background='#E0EDF3'; this.style.color='black'">

    <td width="325" valign="top" bgcolor="#FFFFFF"><div align="left">
      <?php echo $cod_practica;?> <?php echo $practica;?> <a href="planillas/agregar_columna.php?cod_modulo=<?php print("$cod_modulo");?>&&cod_practica=<?php print("$cod_practica");?>&&practica=<?php print("$practica");?>" target = "central" > <img src="../../imagenes/office//100.ico" alt="Ficha" border = "0"></a>
      <div class="Estilo18">      </div>      <div align="center"></div></td>
    <td colspan="3" valign="top" bgcolor="#FFFFFF"><div align="center">
      <table width="400" border="1" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr  style="cursor:hand" onMouseOver="this.style.background='#FFFFFF'; this.style.color='BLACK'" onMouseOut="this.style.background=''; this.style.color='black'">
          <?php 



$sql100="select * from deta_planillas_ver where cod_modulo = $cod_modulo and cod_practica = $cod_practica";
$result100 = $db->Execute($sql100);

if (!$result100) die("fall222o".$db->ErrorMsg());
 while (!$result100->EOF) {


$cod_practica=strtoupper($result100->fields["cod_practica"]);
$cod_operacion=strtoupper($result100->fields["cod_operacion"]);
$nombre_columna=strtoupper($result100->fields["nombre_columna"]);



?>
          <td><div align="left">
              <?php echo $nombre_columna;?><a href="borra_columna.php?palabra=<?php print("$operador");?>&&cod_operacion=<?php print("$cod_operacion");?>&&cod_modulo1=<?php print("$cod_modulo");?>&&bandera=<?php print("$bandera");?>&&categoria=<?php print("$categoria");?>&&nombre=<?php print("$nombre");?>" target = "central" class="Estilo18" ><img src="../../imagenes/office//095.ico" alt="Imprimir" border = "0"></a> </td>
          <?php 

$result100->MoveNext();

	}

?>
        </tr>
      </table>
    </div></td>
    </tr>
   
	
	<tr>
	  <td></td>
	  <td width="267"></td>
	  <td></td>
	  <td></td>
  </tr>


<?php 


$result10->MoveNext();

	}

 
$result->MoveNext();
	}


?>
</table>

<?php
break;	}
}
		//include ("practicas_convenidas_os.php");
	



?>

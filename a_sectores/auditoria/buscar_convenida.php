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

$radiobutton=1;

//include ("../../a_sectores/auditoria/practicas/buscar_practicas.php");

switch ($radiobutton){
case "1":{
	
	?> <table width="850" border="0">
 
<tr bordercolor="#0066FF" bgcolor="#333333"> 
<td width="6%"><div align="center" class="Estilo1"><font size="2" face="Arial, Helvetica, sans-serif">Nº </font></div></td>
<td width="52%"><div align="center" class="Estilo1"><font size="2" face="Arial, Helvetica, sans-serif">PRACTICA</font></div></td>
<td width="8%"><div align="center" class="Estilo1"><font size="2" face="Arial, Helvetica, sans-serif">TIPO</font></div></td>
<td width="10%"><div align="center" class="Estilo1"><font size="2" face="Arial, Helvetica, sans-serif">UNIDADES</font></div></td>
<td width="9%"><div align="center" class="Estilo1"><font size="2" face="Arial, Helvetica, sans-serif">TOTAL</font></div></td>


</table>

<iframe src="practicas_convenidas.php?palabra=<?php print("$palabra");?>&&variable=<?php print("$variable");?>&&buscar_por=<?php print("$buscar_por");?>" width="850" height = "400"  frameborder="0"> </iframe>
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

<table width="850" border="0">
  <!--DWLayoutTable-->
<tr bordercolor="#0066FF">
<td colspan="5"><div align="center"><img src="../../imagenes/modulos_1.jpg" width="842" height="35"></div></td>
</tr>
 <tr bgcolor="#333333"> 
<td width="130"><div align="center" class="Estilo3"><font size="2" face="Arial, Helvetica, sans-serif">COD </font></div></td>
<td width="321" valign="top"><div align="center" class="Estilo3"><font size="2" face="Arial, Helvetica, sans-serif">NOMBRE DEL MODULO</font></div></td>
<td width="162" valign="top"><div align="center" class="Estilo3"><font size="2" face="Arial, Helvetica, sans-serif">CATEGORIA</font></div></td>


<td width="77" valign="top"><div align="center" class="Estilo3"><font face="Arial, Helvetica, sans-serif"><font size="2">MODIFICAR </font></font></div></td>
<td width="102" valign="top"><div align="center" class="Estilo3"><font face="Arial, Helvetica, sans-serif"><font size="2">ELIMINAR </font></font></div></td>
</TABLE>

<iframe src="modulos_convenidos.php?palabra=<?php print("$palabra");?>" width="850" height = "300"  frameborder="0"> </iframe>
<?php
break;	}
}
		//include ("practicas_convenidas_os.php");
	



?>

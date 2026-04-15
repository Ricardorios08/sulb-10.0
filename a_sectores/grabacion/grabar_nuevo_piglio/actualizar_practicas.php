<?php /* $nro_os=$_REQUEST["nro_os"];
 $nro_laboratorio=$_REQUEST["nro_laboratorio"];
$nro_laboratorio = trim($nro_laboratorio);

 
 $nro_orden=$_REQUEST["nro_orden"];
$nro_orden = trim($nro_orden);

 $fecha=$_REQUEST["fecha_orden"];
 $medico=$_REQUEST["prescriptor"];
 $coseguro=$_REQUEST["coseguro"];
 $autorizacion=$_REQUEST["autorizacion"];
 $año = date("y");
 $cod_grabacion=$nro_os.$matricula.$nro_orden;
$nro_practica=$_REQUEST["nro_practica"];
$mes=$_POST["periodo"];


*/
//$cod_grabacion1=$nro_os.$nro_laboratorio.$nro_orden.$mes.$año;				

$nro_afiliado=$_REQUEST["afiliado"];
 $medico=$_REQUEST["prescriptor"];

?>	  <table width="103%" height="25" border="0"> 
      
	<!-- <td width="24" scope="col"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td> -->  

<?php 
	include ("../../../conexiones/config_gb.php");	
 $sql7="select ordenes_grabadas.detalle.cod_operacion, ordenes_grabadas.detalle.nro_practica, practicas.convenio_practica.practica from ordenes_grabadas.detalle INNER JOIN practicas.convenio_practica ON ordenes_grabadas.detalle.nro_practica = practicas.convenio_practica.cod_practica WHERE practicas.convenio_practica.nro_os = $nro_os AND ordenes_grabadas.detalle.cod_grabacion = '$cod_grabacion1' order by ordenes_grabadas.detalle.cod_operacion desc";
$result7 = $db->Execute($sql7);





if (!$result7) die("fallo".$db->ErrorMsg());

 while (!$result7->EOF) {
$cod_operacion=$result7->fields["cod_operacion"];
$nro_practi=ucwords($result7->fields["nro_practica"]);
$practica=ucwords($result7->fields["practica"]);

$cantidad = $cantidad + 1;
$practica = substr($practica,0,30);


?>  

<tr align="center" bordercolor="#FFFFFF" bgcolor="#006699">
  <td width="313" height="21" bgcolor="#E1F2EF" scope="col"><div align="right"><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif"><?php echo $cantidad;?></font></div></td>
    <td width="49" bgcolor="#E1F2EF" scope="col"><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif"><a href="borra.php?cod_grabacion=<?php print("$cod_grabacion1");?>		  &nro_practica=<?php print("$nro_practi");?> &cod_operacion=<?php print("$cod_operacion");?>&periodo=<?php print("$periodo");?>&autorizacion=<?php print("$autorizacion");?> 
 &nro_orden=<?php print("$nro_orden");?>
 &nro_laboratorio=<?php print("$nro_laboratorio");?>
 &afiliado=<?php print("$nro_afiliado");?>
 &prescriptor=<?php print("$medico");?>
 &fecha_orden=<?php print("$fecha_orden");?>
 &coseguro=<?php print("$coseguro");?>
&autorizacion=<?php print("$autorizacion");?>
&anio=<?php print("$anio");?>&nro_os=<?php print("$nro_os");?>

" title = "Presione aqui para borrar la practica (<?php echo $nro_practi;?>) <?php echo $practica;?> "> <?php echo $nro_practi;?></a></font></td>


<td width="643" bgcolor="#E1F2EF" scope="col"><div align="left"><font color="#FF0000" size="1" face="Arial, Helvetica, sans-serif">  
  <?php echo $practica;?>
  <input type = "hidden" name = "cod_operacio" id="cod_operacio" size = "10"  value ="<?php echo $cod_operacio;?>">
</font></div></td>




<?php 


//mandar dos variables en vez de una cod_grabacion mas nro_practica
$result7->MoveNext();

	}
	
?>


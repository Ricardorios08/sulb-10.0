<?php $hoy=date("d/m/y");?>
<form action="buscar_grabadas.php" method="post"  target ="central">
<table width="103%" border="0">
  <tr>
    <th bgcolor="#FFFFFF" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th bgcolor="#000099" scope="col"><div align="center"><font color="#FFFFFF">BUSCADOR DE ORDENES </font></div></th>
  </tr>
  <tr>
    <td width="100%" bgcolor="#E8DCFC" scope="col"><div align="left"><font color="#009966" size="2"><font color="#000000" face="Arial, Helvetica, sans-serif">
  Buscar<select name="buscador[]" id="select"onkeypress="return verif_caracter(this,event)">
                    <option value = "3">GRABADAS</option>
                    <option value = "2">S/CONFIR</option>
                    <option value = "1">CONFIRMADAS</option>
		                
          </select>
    </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Periodo</font><font color="#000000" face="Arial, Helvetica, sans-serif">
        </font><font color="#0000FF">
        <select name="mes1[]" id="select2" onkeypress="return verif_caracter(this,event)">
          <option value = "13">TODOS</option>
          <option value = "01" selected>ENE</option>
          <option value = "02">FEB</option>
          <option value = "03">MAR</option>
          <option value = "04">ABR</option>
          <option value = "05">MAY</option>
          <option value = "06">JUN</option>
          <option value = "07">JUL</option>
          <option value = "08">AGO</option>
          <option value = "09">SET</option>
          <option value = "10">OCT</option>
          <option value = "11">NOV</option>
          <option value = "12">DIC</option>
        </select>
        </font><font color="#000000" face="Arial, Helvetica, sans-serif">Obra Social </font></font>          <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 
		  <input type="text" size="3" name="nro_os1" id = "nro_os1" class="text" tabindex = "3" onKeyPress="return verif_caracter(this,event)">
        
		  </font><font color="#0000FF">
		  
		  </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> Laboratorio
		  <input type="text" size="3" name="laboratorio1" id = "busca" class="text" tabindex = "3" onKeyPress="return verif_caracter(this,event)">
          </font><font color="#000000"><strong>       

          <input name="submit" type="submit" value = "OK" size = "10">
           </strong></font><strong>        </strong> </div></td>
  </tr>
</table>
</FORM>







<table width="103%" border="0">
  <tr bgcolor="#000099">

  </tr>
    
<?php php
$busca = $_REQUEST['busca'];
$nro_laboratorio= $_REQUEST['laboratorio'];


$me=$_POST["mes"];
for ($i=0;$i<count($me);$i++)    
{     
$mes= $me[$i];    
}

$buscado=$_POST["buscador"];
for ($i=0;$i<count($buscado);$i++)    
{     
$buscador= $buscado[$i];    
}

$busca;
 $mes;


include ("../../../conexiones/config_os.php");
$sql2="select * from datos_os where nro_os like '$busca'";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);



?>

<tr bgcolor="#E6E6E6">

<?php 
include ("../../../conexiones/config_gb.php");


 //$sql="select * from historial_ordenes where periodo = $mes_anterior and confirmada = 8 order by nro_laboratorio, fecha desc";

  $sql="select * from ordenes where periodo = $mes_anterior and confirmada = 7 order by nro_laboratorio, fecha desc";
$result = $db->Execute($sql);

$año=strtoupper($result->fields["ano"]);

?>    <td scope="row"><div align="left"><span class="Estilo23">Periodo: <span class="Estilo24"><span class="Estilo25"><?php echo $mes_anterior;?></span></span> Año: <span class="Estilo27"><?php echo $año;?></span>        <span class="Estilo25">
    <?php 
$nro_lab = 2;
?>
</span></span></div></td>
<td scope="row">&nbsp;</td>
<td scope="row">&nbsp;</td>
<td scope="row">&nbsp;</td>
<td scope="row">&nbsp;</td>
<td scope="row">&nbsp;</td>
</tr>
</table>

<table width="103%" border="0">
  <tr bgcolor="#000099">
<?php  if ($mostrar_lab != 1){?>
    <th scope="row"><div align="center" class="Estilo1 Estilo13"><strong>N&ordm;</strong></div>      </th>
    <td width="32%"><div align="center" class="Estilo16 Estilo17">Laboratorio</div></td>
	<?php }?>
    <td width="12%"><div align="center" class="Estilo19"> Autorización </div></td>
    <td width="12%"><div align="center" class="Estilo19"> Orden </div></td>
    <td width="14%"><div align="center" class="Estilo19">Afiliado </div></td>
    <td width="12%"><div align="center" class="Estilo19">Fecha</div></td>
    <td width="9%"><div align="center" class="Estilo19">O. Social </div></td>
    <td width="9%"><div align="center"><span class="Estilo19">Detalle</span></div></td>
  </tr>
<?php 

if ($mostrar_lab == 1){
	
include ("../../conexiones/config.inc.php");
$sql1 = "select * from datos_laboratorio where nro_laboratorio = '$nro_laboratorio'";
$result1 = $db->Execute($sql1);
$nombre=substr($result1->fields["nombre_laboratorio"],0,28);
?>


<tr bgcolor="#E6E6E6">
  <th colspan="8" scope="row"> <?php echo $nombre;?> </tr>
<tr bgcolor="#E8DCFC">
<?php }



 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$nro_os=strtoupper($result->fields["nro_os"]);
$nro_laboratorio=strtoupper($result->fields["nro_laboratorio"]);
$periodo=strtoupper($result->fields["periodo"]);
$año=strtoupper($result->fields["ano"]);
$nro_afiliado=strtoupper($result->fields["nro_afiliado"]);
$nro_orden=strtoupper($result->fields["nro_orden"]);
$autorizacion=strtoupper($result->fields["autorizacion"]);

$cod_grabacion=strtoupper($result->fields["cod_grabacion"]);

$fecha=strtoupper($result->fields["fecha"]);
$matricula=strtoupper($result->fields["matricula"]);
$confirmada=strtoupper($result->fields["confirmada"]);


include ("../../../conexiones/config.inc.php");

$sql1 = "select * from datos_laboratorio where nro_laboratorio = '$nro_laboratorio'";
$result1 = $db->Execute($sql1);
$nombre=substr($result1->fields["nombre_laboratorio"],0,28);



if ($band== 1){
?><tr bgcolor="#FFFFFF"><?php 
	$band=2;
}
else
	  {
?><tr bgcolor="#E8DCFC">	  <?php 
$band=1;
}
?>


<?php if ($mostrar_lab != 1){?>
    <th scope="row">      <span class="Estilo22"><?php echo $nro_laboratorio;?></span>
    <td> 
	<span class="Estilo22">
	<?php echo $nombre;?> 
      </span>	<div align="left" class="Estilo22"></div>
<?php }?>
	
	<td><div align="center"><span class="Estilo22"><?php echo $autorizacion;?></span> </div>
	<td><div align="center"><span class="Estilo22"><?php echo $nro_orden;?></span> </div>
    <td><div align="center"><span class="Estilo22"><?php echo $nro_afiliado;?></span>
    </div>
    <td><div align="center"><span class="Estilo22"><?php echo $fecha;?></span>
    </div>
    <td><div align="center" class="Estilo2"><span class="Estilo22"><?php echo $nro_os;?></span></div>
	

	
	
	</td>
    <td><div align="center"><span class="Estilo2"><a href="detalle.php?id=<?php print("$cod_grabacion");?>&bande_2=1&confirmada=<?php print("$confirmada");?>&nro_laboratorio=<?php print("$nro_laboratorio");?>&nombre_laboratorio=<?php print("$nombre_laboratorio");?>">[+]</a></span></div></td>
</tr>




<?php 
	$cont = $cont + 1;


$result->MoveNext();
	} ?>
<tr bgcolor="#E6E6E6">
  <td colspan="8" scope="row"><div align="center"><span class="Estilo32">Cantidad de Ordenes: <?php echo $cont;?></span></div>  </tr>

</table>
<div align="center"></div>
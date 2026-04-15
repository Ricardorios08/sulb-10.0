

<script language="javascript">
function on_load()

{
document.getElementById("nro_factura").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				

					case "nro_factura":
				document.getElementById("nro_os").focus();
				break;
				
				case "nro_os":
				document.getElementById("lote").focus();
				break;

				case "lote":
				document.getElementById("leyenda").focus();
				break;

				
		}
		return false;
	}
	return true;
}



</script>



<style type="text/css">
<!--
.Estilo3 {font-family: Arial, Helvetica, sans-serif}
.Estilo4 {font-size: 10px}
.Estilo32 {
	color: #FFFFFF;
	font-family: "Trebuchet MS";
	font-size: 12px;
}
.Estilo39 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo9 {
	color: #000000;
	font-size: 12;
	font-weight: bold;
}
.Estilo41 {color: #000000}
.Estilo43 {font-family: Arial, Helvetica, sans-serif; color: #000000; }
.Estilo44 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #000000; }
.Estilo45 {font-weight: bold; font-size: 12;}
.Estilo49 {font-size: 12px; font-family: "Trebuchet MS"; color: #000000; }
.Estilo50 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo51 {font-size: 12px}
.Estilo52 {font-family: "Trebuchet MS"}
.Estilo54 {font-family: "Trebuchet MS"; font-size: 18px; }
-->
</style>


<?php 
include ("../../conexiones/config.inc.php");

$sql="select * from factura order by nro_factura desc";
$result = $db->Execute($sql);

$nro_factura=($result->fields["nro_factura"] + 1);



$nro_os = $_REQUEST['nro_os1'];
$lote= $_REQUEST['lote'];
$mes_fact= $_REQUEST['mes'];
$año= $_REQUEST['anio'];
$anio_a_fact= $_REQUEST['anio'];
$año = $anio_a_fact;
$periodo= $mes." - ".$anio;


$mes = date("m");

switch ($mes_fact)
	{
		case "1":{$periodo= "ENE";}break;
		case "2":{$periodo= "FEB";}break;
		case "3":{$periodo= "MAR";}break;
		case "4":{$periodo= "ABR";}break;
		case "5":{$periodo= "MAY";}break;
		case "6":{$periodo= "JUN";}break;
		case "7":{$periodo= "JUL";}break;
		case "8":{$periodo= "AGO";}break;
		case "9":{$periodo= "SET";}break;
		case "10":{$periodo="OCT";}break;
		case "11":{$periodo="NOV";}break;
		case "12":{$periodo="DIC";}break;
				}


$dia_actual = date("d");
$mes_actual = date("m");
$anio_actual = date("y");

?>


<BODY onload = "on_load ()" >

<form action ="menu_facturar_laser.php" method="post">


  <div align="left"></div>
  <table width="850" border="0" cellspacing="0">
    <tr>
      <td colspan="4" bgcolor="#C0C0C0"><div align="center" class="Estilo41"><span class="Estilo54">FACTURACION OBRAS SOCIALES Y/O EMPRESAS </span><br>
      </div></td>
    </tr>
    <tr >
      <td bgcolor="#EDEDED" class="Estilo3"><div align="right" class="Estilo50">Fecha Factura:&nbsp;</div></td>
      <td class="Estilo43">&nbsp;</td>
      <td class="Estilo44"><input name="dia_actual" type="text" id = "dia_actual" value="<?php echo $dia_actual;?>"  size ="2" maxlength="2">
        /
          <input name="mes_actual" type="text" id = "mes_actual" value="<?php echo $mes_actual;?>"  size ="2" maxlength="2">
          /20
      <input name="anio_actual" type="text" id = "anio_actual" value="<?php echo $anio_actual;?>"  size ="2" maxlength="2"></td>
      <td class="Estilo39"><div align="center" class="Estilo41"><span class="Estilo39">PRO-FORMA</span> </div></td>
    </tr>
    <tr >
      <td bgcolor="#EDEDED" class="Estilo3"><div align="right" class="Estilo3 Estilo43 Estilo32">Ingrese Mes Ordenes Grabadas</div></td>
      <td class="Estilo43">&nbsp;</td>
      <td width="276" class="Estilo4">
	  
		<input type="text" name="mes" value= "<?php echo $mes_fact;?>" size ="4"> 

/

		<input type="text" name="anio_a_fact" value= "<?php echo $anio_a_fact;?>" size ="4"> 
      </span></td>
      <td width="308" class="Estilo39"><div align="center" class="Estilo41"><span class="Estilo3"><span class="Estilo45">
        <input name="pro_forma" type="radio" value="SI" checked>
SI
<input name="pro_forma" type="radio" value="NO">
NO</span> </span></div></td>
    </tr>
    
    <tr >
      <td bgcolor="#EDEDED" class="Estilo3"><div align="right" class="Estilo49" >Ingrese N&ordm; Factura:&nbsp;</div></td>
      <td class="Estilo43">&nbsp;</td>
      <td class="Estilo4"><input name="nro_factura" type="text" value = "<?php echo $nro_factura;?>" id = "nro_factura" onKeyPress="return verif_caracter(this,event)"  size ="6"></td>
    <td class="Estilo4"><div align="center" class="Estilo3"><span class="Estilo9"><span class="Estilo41"></span>
      </span></div></td>
    </tr>
    <tr >
      <td width="250" bgcolor="#EDEDED"><div align="right" class="Estilo49">Ingrese  obra social:&nbsp;</div></td>
      <td width="16"><span class="Estilo41"></span></td>
      <td class="Estilo4"><span class="Estilo43">
        <input type="text" name="nro_os" id= "nro_os" size ="3" value = "<?php echo $nro_os;?>" onKeyPress="return verif_caracter(this,event)">
        <input type="hidden" name="facturar" value = "SI">
      </span></td>
    <td class="Estilo4"><div align="center" class="Estilo44"><strong>SI ESTA TODO CORRECTO </strong></div></td>
    </tr>
		    <tr>
		      <td bgcolor="#EDEDED"><div align="right" class="Estilo14 Estilo41 Estilo52 Estilo51">Lote:&nbsp;</div></td>
		      <td><span class="Estilo41"></span></td>
		      <td><div align="left" class="Estilo41"><span class="Estilo3">
                <input type="text" name="lote" value = "<?php echo $lote;?>" id= "lote" size ="28" onKeyPress="return verif_caracter(this,event)"> 
              </span></div></td>
    <td rowspan="2"><div align="center" class="Estilo41">
      </div>      <div align="center" class="Estilo41"></div></td>
    </tr>
	    <tr>
	      <td bgcolor="#EDEDED"><div align="right" class="Estilo50">Leyenda:&nbsp;</div></td>
		      <td><span class="Estilo41"></span></td>
		      <td><span class="Estilo4"><span class="Estilo43">
		        <input name="leyenda" type="text" id= "leyenda" size ="40" maxlength="40">
	      </span></span></td>
    </tr>
	    <tr>
	      <td colspan="4" bgcolor="#C0C0C0"><div align="center" class="Estilo50">FACTURAR POR FECHA </div></td>
    </tr>
	    <tr>
	      <td bgcolor="#EDEDED"><div align="right">
	        <div align="right" class="Estilo50">DESCUENTO</div>
	      </div></td>
	      <td>&nbsp;</td>
	      <td><span class="Estilo49">
	        <input name="descuento" type="text" id = "descuento" value="<?php echo $descuento;?>"  size ="2" maxlength="2">
	      </span><span class="Estilo50">% EJ: 5% </span></td>
	      <td rowspan="3"><div align="center" class="Estilo50">
	        <input name="boton" type="submit" value="Facturar Ordenes">
          </div></td>
    </tr>
	    <tr>
	      <td bgcolor="#EDEDED"><div align="right" class="Estilo50">DESDE</div></td>
	      <td><span class="Estilo51"></span></td>
	      <td><span class="Estilo49">
	        <input name="dia_desde" type="text" id = "dia_desde" value="01"  size ="2" maxlength="2">
/
<input name="mes_desde" type="text" id = "mes_desde" value="<?php echo $mes_fact;?>"  size ="2" maxlength="2">
/20
<input name="anio_desde" type="text" id = "anio_desde" value="<?php echo $anio_actual;?>"  size ="2" maxlength="2">
	      </span></td>
    </tr>
	    <tr>
	      <td bgcolor="#EDEDED"><div align="right" class="Estilo50">HASTA</div></td>
	      <td><span class="Estilo51"></span></td>
	      <td><span class="Estilo49">
	        <input name="dia_hasta" type="text" id = "dia_hasta" value="31"  size ="2" maxlength="2">
/
<input name="mes_hasta" type="text" id = "mes_hasta" value="<?php echo $mes_fact;?>"  size ="2" maxlength="2">
/20
<input name="anio_hasta" type="text" id = "anio_hasta" value="<?php echo $anio_actual;?>"  size ="2" maxlength="2">
          </span></td>
    </tr>
  </table>
</form>

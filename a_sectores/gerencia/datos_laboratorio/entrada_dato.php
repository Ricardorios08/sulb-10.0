<link href="../../../css/fondo.css" rel="stylesheet" type="text/css" />

<script language="javascript">
function on_load()
{
document.getElementById("nro_paciente").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "nro_paciente":
				document.getElementById("nro_afiliado").focus();
				break;
				case "nro_afiliado":
				document.getElementById("nombre").focus();
				break;
				case "nombre":
				document.getElementById("nro_documento").focus();
				break;
				case "nro_documento":
				document.getElementById("nro_os").focus();
				break;
				case "nro_os":
				document.getElementById("domicilio").focus();
				break;

				case "domicilio":
				document.getElementById("telefono").focus();
				break;
				case "telefono":
				document.getElementById("celular").focus();
				break;
				case "celular":
				document.getElementById("dia").focus();
				break;
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("anio").focus();
				break;
				case "anio":
				document.getElementById("GUARDAR").focus();
				break;

				


				
		}
		return false;
	}
	return true;
}


</script>

<style type="text/css">
<!--
.Estilo3 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo8 {font-size: 18px; font-weight: bold; }
-->
</style>
<BODY onload = "on_load()">

<?php 
include ("../../../conexiones/config.inc.php");

$usuario = $_REQUEST['usuario'];

 $sql="select * from datos_principales";
 
$result = $db->Execute($sql);


$celular=$result->fields["celular"];
$mail=$result->fields["mail"];
$terminal=$result->fields["terminal"];


$renglon1=$result->fields["renglon1"];
$renglon3=$result->fields["renglon3"];
$nombre_laboratorio=$result->fields["nombre_laboratorio"];
$direccion=$result->fields["direccion"];
$matricula=$result->fields["matricula"];
$telefono=$result->fields["telefono"];
$localidad=$result->fields["localidad"];


 $renglon1_b=$result->fields["renglon1_b"];
$renglon2_b=$result->fields["renglon2_b"];
$renglon3_b=$result->fields["renglon3_b"];
$domicilio_b=$result->fields["domicilio_b"];
$localidad_b=$result->fields["localidad_b"];
$telefono_b=$result->fields["telefono_b"];
$mail_b=$result->fields["mail_b"];

$renglon1_c=$result->fields["renglon1_c"];
$renglon2_c=$result->fields["renglon2_c"];
$renglon3_c=$result->fields["renglon3_c"];
$domicilio_c=$result->fields["domicilio_c"];
$localidad_c=$result->fields["localidad_c"];
$telefono_c=$result->fields["telefono_c"];
$mail_c=$result->fields["mail_c"];

$renglon1_d=$result->fields["renglon1_d"];
$renglon2_d=$result->fields["renglon2_d"];
$renglon3_d=$result->fields["renglon3_d"];
$domicilio_d=$result->fields["domicilio_d"];
$localidad_d=$result->fields["localidad_d"];
$telefono_d=$result->fields["telefono_d"];
$mail_d=$result->fields["mail_d"];




$cuit=strtoupper($result->fields["cuit"]);
$ingresos_brutos=strtoupper($result->fields["ingresos_brutos"]);
$comercio=strtoupper($result->fields["comercio"]);
$inicio_actividad=strtoupper($result->fields["inicio_actividad"]);

$dia= substr($inicio_actividad,8,2);
$mes = substr($inicio_actividad,5,2);
$anio = substr($inicio_actividad,0,4);




?>
<form action="guardar.php" method="post">
<table width="850" border="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td colspan="4"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><img src="../../../imagenes/laboratorio_1.jpg" width="846" height="35"></font></div></td>
    </tr>
    <tr align="center" bordercolor="#FFFFFF">
      <td colspan="4" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">CUENTA ABM </font><font color="#000000" size="2">
        <input name="matricula" type="text" id="matricula"onKeyPress="return verif_caracter(this,event)" value="<?php echo $matricula;?>"  size="6" maxlength="6">
        </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">CUIT</font>      <font size="2">
        <input name="cuit" type="text"  id="cuit" onKeyPress="return verif_caracter(this,event)" value="<?php echo $cuit;?>" size="50" maxlength="50">
        </font><font size="2" face="Arial, Helvetica, sans-serif">SUCURSAL</font><font size="2">
        <input name="terminal2" type="text"  id="terminal2" onKeyPress="return verif_caracter(this,event)" value="<?php echo $terminal;?>" size="10" maxlength="10">
        </font>
        <input type="Submit" name="Submit2" id ="Submit" value="GUARDAR">
      </div>
      <div align="left"></div></td>
  </tr>
    
    <tr bordercolor="#FFFFFF">
      <td colspan="2" bgcolor="#FFFFCC"><div align="center" class="Estilo8">A</div></td>
      <td width="404" colspan="2" bgcolor="#CCEDCB"><div align="center" class="Estilo8">B</div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td width="151" bgcolor="#FFFFCC"><div align="right" class="Estilo3">
        <div align="right">Renglon 1 </div>
      </div></td>
      <td width="325" bgcolor="#FFFFCC"><font color="#000000" size="2">
        <input name="renglon1" type="text" id="renglon1" onKeyPress="return verif_caracter(this,event)" size="50" maxlength="50" value = "<?php echo $renglon1;?>">
      </font></td>
      <td width="325" bgcolor="#CCEDCB"><font color="#000000" size="2">
        <input name="renglon1_b" type="text" id="renglon1_b" onKeyPress="return verif_caracter(this,event)" size="50" maxlength="50" value = "<?php echo $renglon1_b;?>">
      </font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#FFFFCC"><div align="center" class="Estilo3">
        <div align="right">Renglon 2        </div>
      </div>
        <div align="right" class="Estilo3"></div></td>
      <td bgcolor="#FFFFCC"><font color="#000000" size="2">
        <input name="nombre_laboratorio" type="text" id="nombre_laboratorio" onKeyPress="return verif_caracter(this,event)" size="50" maxlength="50" value = "<?php echo $nombre_laboratorio;?>">
      </font></td>
      <td bgcolor="#CCEDCB"><font color="#000000" size="2">
        <input name="renglon2_b" type="text" id="renglon2_b" onKeyPress="return verif_caracter(this,event)" size="50" maxlength="50" value = "<?php echo $renglon2_b;?>">
      </font></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#FFFFCC"><div align="center" class="Estilo3">
        <div align="right">Renglon 3 </div>
      </div></td>
      <td bgcolor="#FFFFCC"><font color="#000000" size="2">
        <input name="renglon3" type="text" id="renglon3" onKeyPress="return verif_caracter(this,event)" size="50" maxlength="50" value = "<?php echo $renglon3;?>">
      </font></td>
      <td bgcolor="#CCEDCB"><font color="#000000" size="2">
        <input name="renglon3_b" type="text" id="renglon3_b" onKeyPress="return verif_caracter(this,event)" size="50" maxlength="50" value = "<?php echo $renglon3_b;?>">
      </font></td>
    </tr>
    
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#FFFFCC"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">DOMICILIO</font></div></td>
      <td bgcolor="#FFFFCC"><font color="#000000" size="2">
        <input name="direccion" type="text" id="direccion"onKeyPress="return verif_caracter(this,event)" value="<?php echo $direccion;?>" size="50" maxlength="50">
      </font></td>
      <td bgcolor="#CCEDCB"><font color="#000000" size="2">
        <input name="domicilio_b" type="text" id="domicilio_b"onKeyPress="return verif_caracter(this,event)" value="<?php echo $domicilio_b;?>" size="50" maxlength="50">
      </font></td>
  </tr>
    <tr bordercolor="#FFFFFF">
      <td bgcolor="#FFFFCC"><div align="right">
        <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">LOCALIDAD</font></div>
      </div></td>
      <td bgcolor="#FFFFCC"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2">
        <input name="localidad" type="text" id="localidad" onKeyPress="return verif_caracter(this,event)" value="<?php echo $localidad;?>"  size="20" maxlength="20">
</font></strong></font></strong></td>
      <td bgcolor="#CCEDCB"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2">
        <input name="localidad_b" type="text" id="localidad_b" onKeyPress="return verif_caracter(this,event)" value="<?php echo $localidad_b;?>"  size="20" maxlength="20">
      </font></strong></font></strong></td>
  <tr bordercolor="#FFFFFF">
      <td bgcolor="#FFFFCC"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">TELEFONO</font></div></td>
      <td bgcolor="#FFFFCC"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2">
        <input name="telefono" type="text" id="telefono"onKeyPress="return verif_caracter(this,event)" value="<?php echo $telefono;?>"  size="20" maxlength="20">
      </font></strong></font></strong></td>
      <td bgcolor="#CCEDCB"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2">
        <input name="telefono_b" type="text" id="telefono_b"onKeyPress="return verif_caracter(this,event)" value="<?php echo $telefono_b;?>"  size="20" maxlength="20">
      </font></strong></font></strong></td>
  <tr bordercolor="#FFFFFF">
      <td bgcolor="#FFFFCC"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">MAIL</font></div></td>
      <td bgcolor="#FFFFCC"><font size="2">
        <input name="mail" type="text"  id="mail" onKeyPress="return verif_caracter(this,event)" value="<?php echo $mail;?>" size="50" maxlength="50">
      </font></td>
      <td bgcolor="#CCEDCB"><font size="2">
        <input name="mail_b" type="text"  id="mail_b" onKeyPress="return verif_caracter(this,event)" value="<?php echo $mail_b;?>" size="50" maxlength="50">
      </font></td>
  <tr bordercolor="#FFFFFF">
    <td colspan="2" bgcolor="#FCD6EA"><div align="center" class="Estilo8">C</div></td>
    <td colspan="2" bgcolor="#DECEC7"><div align="center" class="Estilo8">D</div></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td bgcolor="#FCD6EA"><div align="right" class="Estilo3">
        <div align="right">Renglon 1 </div>
    </div></td>
    <td bgcolor="#FCD6EA"><font color="#000000" size="2">
      <input name="renglon1_c" type="text" id="renglon1_c" onKeyPress="return verif_caracter(this,event)" size="50" maxlength="50" value = "<?php echo $renglon1_c;?>">
    </font></td>
    <td bgcolor="#DECEC7"><font color="#000000" size="2">
      <input name="renglon1_d" type="text" id="renglon1_d" onKeyPress="return verif_caracter(this,event)" size="50" maxlength="50" value = "<?php echo $renglon1_d;?>">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td bgcolor="#FCD6EA"><div align="center" class="Estilo3">
        <div align="right">Renglon 2 </div>
    </div>
        <div align="right" class="Estilo3"></div></td>
    <td bgcolor="#FCD6EA"><font color="#000000" size="2">
      <input name="renglon2_c" type="text" id="renglon2_c" onKeyPress="return verif_caracter(this,event)" size="50" maxlength="50" value = "<?php echo $renglon2_c;?>">
    </font></td>
    <td bgcolor="#DECEC7"><font color="#000000" size="2">
      <input name="renglon2_d" type="text" id="renglon2_d" onKeyPress="return verif_caracter(this,event)" size="50" maxlength="50" value = "<?php echo $renglon2_d;?>">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td bgcolor="#FCD6EA"><div align="center" class="Estilo3">
        <div align="right">Renglon 3 </div>
    </div></td>
    <td bgcolor="#FCD6EA"><font color="#000000" size="2">
      <input name="renglon3_c" type="text" id="renglon3_c" onKeyPress="return verif_caracter(this,event)" size="50" maxlength="50" value = "<?php echo $renglon3_c;?>">
    </font></td>
    <td bgcolor="#DECEC7"><font color="#000000" size="2">
      <input name="renglon3_d" type="text" id="renglon3_d" onKeyPress="return verif_caracter(this,event)" size="50" maxlength="50" value = "<?php echo $renglon3_d;?>">
    </font></td>
  </tr>
  
  <tr bordercolor="#FFFFFF">
    <td bgcolor="#FCD6EA"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">DOMICILIO</font></div></td>
    <td bgcolor="#FCD6EA"><font color="#000000" size="2">
      <input name="domicilio_c" type="text" id="domicilio_c"onKeyPress="return verif_caracter(this,event)" value="<?php echo $domicilio_c;?>" size="50" maxlength="50">
    </font></td>
    <td bgcolor="#DECEC7"><font color="#000000" size="2">
      <input name="domicilio_d" type="text" id="domicilio_d"onKeyPress="return verif_caracter(this,event)" value="<?php echo $domicilio_d;?>" size="50" maxlength="50">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td bgcolor="#FCD6EA"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">LOCALIDAD</font></div></td>
    <td bgcolor="#FCD6EA"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2">
      <input name="localidad_c" type="text" id="localidad_c" onKeyPress="return verif_caracter(this,event)" value="<?php echo $localidad_c;?>"  size="20" maxlength="20">
    </font></strong></font></strong></td>
    <td bgcolor="#DECEC7"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2">
      <input name="localidad_d" type="text" id="localidad_d" onKeyPress="return verif_caracter(this,event)" value="<?php echo $localidad_d;?>"  size="20" maxlength="20">
    </font></strong></font></strong></td>
  <tr bordercolor="#FFFFFF">
    <td bgcolor="#FCD6EA"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">TELEFONO</font></div></td>
    <td bgcolor="#FCD6EA"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2">
      <input name="telefono_c" type="text" id="telefono_c"onKeyPress="return verif_caracter(this,event)" value="<?php echo $telefono_c;?>"  size="20" maxlength="20">
    </font></strong></font></strong></td>
    <td bgcolor="#DECEC7"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2">
      <input name="telefono_d" type="text" id="telefono_d"onKeyPress="return verif_caracter(this,event)" value="<?php echo $telefono_d;?>"  size="20" maxlength="20">
    </font></strong></font></strong></td>
  <tr bordercolor="#FFFFFF">
    <td bgcolor="#FCD6EA"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">MAIL</font></div></td>
    <td bgcolor="#FCD6EA"><font size="2">
      <input name="mail_c" type="text"  id="mail_c" onKeyPress="return verif_caracter(this,event)" value="<?php echo $mail_c;?>" size="50" maxlength="50">
    </font></td>
    <td bgcolor="#DECEC7"><font size="2">
      <input name="mail_d" type="text"  id="mail_d" onKeyPress="return verif_caracter(this,event)" value="<?php echo $mail_d;?>" size="50" maxlength="50">
    </font></td>
  <tr bordercolor="#FFFFFF">
      <td colspan="4" bgcolor="#F0F0F0"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"></font>      
	  
	
	  	<input type = "hidden" name = "usuario" value="<?php echo $usuario;?>">


	  <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR">
      </div></td>
</table>

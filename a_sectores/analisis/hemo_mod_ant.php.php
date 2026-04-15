<script language="javascript">
function on_load()
{
document.getElementById("hematies").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "hematies":
				document.getElementById("hemoglobina").focus();
				break;
				case "hemoglobina":
				document.getElementById("hematocrito").focus();
				break;
				case "hematocrito":
				document.getElementById("leucocitos").focus();
				break;
				
				case "leucocitos":
				document.getElementById("neutro_cayado").focus();
				break;
				case "neutro_cayado":
				document.getElementById("neutro_segmentado").focus();
				break;
				case "neutro_segmentado":
				document.getElementById("eosinofilos").focus();
				break;

				case "eosinofilos":
				document.getElementById("basofilos").focus();
				break;
				case "basofilos":
				document.getElementById("linfocitos").focus();
				break;
				case "linfocitos":
				document.getElementById("monocitos").focus();
				break;
				case "monocitos":
				document.getElementById("carac_plaquetas").focus();
				break;
				case "carac_plaquetas":
				document.getElementById("carac_leucocitos").focus();
				break;
				case "carac_leucocitos":
				document.getElementById("carac_hematies").focus();
				break;
				case "carac_hematies":
				document.getElementById("observaciones").focus();
				break;
				


				
		}
		return false;
	}
	return true;
}


</script>



<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.Estilo4 {font-size: 16px; }
body {
	background-color: #FFFFFF;
}
-->
</style>
<BODY onload = "on_load()">
<FORM name="form" ACTION="guardar_normal.php" METHOD = "POST">


<?php 




include("../../conexiones/config.inc.php");
$cod_grabacion = $_REQUEST['cod_grabacion'];
$nro_practica= $_REQUEST['nro_practica'];
 $nro_paciente= $_REQUEST['nro_paciente'];

//include ("encabezado1.php");

 $sql11="select * from detalle_hemo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$hematies=strtoupper($result11->fields["hematies"]); if ($hematies == "0.00"){$hematies = "";}
$hemoglobina=strtoupper($result11->fields["hemoglobina"]); if ($hemoglobina == "0.00"){$hemoglobina = "";}
$hematocrito=strtoupper($result11->fields["hematocrito"]); if ($hematocrito == "0.00"){$hematocrito = "";}
$reticulocitos=strtoupper($result11->fields["reticulocitos"]); if ($reticulocitos == "0.00"){$reticulocitos = "";}
$plaquetas=strtoupper($result11->fields["plaquetas"]); if ($plaquetas == "0.00"){$plaquetas = "";}
$mcv=strtoupper($result11->fields["mcv"]); if ($mcv == "0.00"){$mcv = "";}
$mch=strtoupper($result11->fields["mch"]); if ($mch == "0.00"){$mch = "";}
$mchc=strtoupper($result11->fields["mchc"]); if ($mchc == "0.00"){$mchc = "";}
$leucocitos=$result11->fields["leucocitos"]; if ($leucocitos == "0.00"){$leucocitos = "";}
$neutro_cayado=$result11->fields["neutro_cayado"]; if ($neutro_cayado == "0.00"){$neutro_cayado = "";}
$neutro_segmentado=$result11->fields["neutro_segmentado"]; if ($neutro_segmentado == "0.00"){$neutro_segmentado = "";}
$eosinofilos=$result11->fields["eosinofilos"]; if ($eosinofilos == "0.00"){$eosinofilos = "";}
$basofilos=$result11->fields["basofilos"]; if ($basofilos == "0.00"){$basofilos = "";}
$linfocitos=$result11->fields["linfocitos"]; if ($linfocitos == "0.00"){$linfocitos = "";}
$monocitos=$result11->fields["monocitos"]; if ($monocitos == "0.00"){$monocitos = "";}




$total_leucocitos = $neutro_cayado + $neutro_segmentado + $eosinofilos + $basofilos + $linfocitos + $monocitos;

 $absoluto_neutro_cayado = $leucocitos * $neutro_cayado/100;
$absoluto_neutro_segmentado= $leucocitos * $neutro_segmentado/100;
$absoluto_eosinofilos= $leucocitos * $eosinofilos/100;
$absoluto_basofilos= $leucocitos * $basofilos/100;
$absoluto_linfocitos= $leucocitos * $linfocitos/100;
$absoluto_monocitos= $leucocitos * $monocitos/100;


$total_absoluto_leucocitos = $absoluto_neutro_cayado + $absoluto_neutro_segmentado + $absoluto_eosinofilos + $absoluto_basofilos + $absoluto_linfocitos + $absoluto_monocitos;



$carac_plaquetas=$result11->fields["carac_plaquetas"];
$carac_leucocitos=$result11->fields["carac_leucocitos"];
$carac_hematies=$result11->fields["carac_hematies"];
$carac_hematies2=$result11->fields["carac_hematies2"];
$observaciones =$result11->fields["observaciones"];
$formula =$result11->fields["formula"];


 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);





if ($formula == "NO"){
?><table width="850" border="0" cellspacing="0" bgcolor="#FFFFFF">
        
        <tr>
          <td><div align="center">&iquest;Desea Realizar la Formula Leucoitario absoluta en el informe final?
            SI
            <input name="formula" type="radio" value="si"> 
            NO
            <input name="formula" type="radio" value="no" checked>
          </div></td>
        </tr>
        <tr>
          <td><span class="Estilo1">Determinacion: <?php echo $nro_practica;?> - <?php echo $nombre_practica;?></span></td>
        </tr>
</table>
<?php
}else{
?><table width="850" border="0" cellspacing="0" bgcolor="#FFFFFF">
        
        <tr>
          <td><div align="center">&iquest;Desea Realizar la Formula Leucoitario absoluta en el informe final?
            SI
            <input name="formula" type="radio" value="si"checked> 
            NO
            <input name="formula" type="radio" value="no" >
          </div></td>
        </tr>
        <tr>
          <td><span class="Estilo1">Determinacion: <?php echo $nro_practica;?> - <?php echo $nombre_practica;?></span></td>
        </tr>
</table>
<?php

}

?>

      <table width="850" border="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td colspan="6"><hr noshade></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="3"><div align="center">VALOR</div></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="center">RELATIVO</div></td>
          <td colspan="2"><div align="center">ABSOLUTO</div></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">SERIE ROJA </div>            <div align="center"></div></td>
          <td colspan="4"><div align="center">SERIE BLANCA </div>            </td>
        </tr>
        <tr>
          <td colspan="6"><hr noshade></td>
        </tr>
        <tr>
          <td width="185">Hematies</td>
          <td width="154"><div align="center"><input name="hematies1" type="text" id="hematies" value="<?php  echo $hematies;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
            </div></td>
          <td width="260">Leucocitos</td>
          <td colspan="3">            <input name="leucocitos1" type="text" id="leucocitos" value="<?php  echo $leucocitos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "9">              
          <div align="left"></div></td></tr>
        <tr>
          <td>Hemoglobina</td>
          <td><div align="center">            <input name="hemoglobina" type="text" id="hemoglobina" value="<?php  echo $hemoglobina;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "2">
          </div></td>
          <td colspan="4"><div align="center">FORMULA LEUCOCITARIA 
          CADA 100 LEUCOCITOS </div></td>
        </tr>
        <tr>
          <td>Hematocrito</td>
          <td><div align="center">            <input name="hematocrito" type="text" id="hematocrito" value="<?php  echo $hematocrito;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "3">
          </div></td>
          <td>Neutr&oacute;filos en cayado </td>
          <td width="119">            <div align="center">
            <input name="neutro_cayado" type="text" id="neutro_cayado" value="<?php  echo $neutro_cayado;?>" size="6" onKeyPress="return verif_caracter(this,event)" tabindex = "10">              
          %
            </div></td>
          <td width="54"><div align="center"><?php  echo $absoluto_neutro_cayado;?>
          </div></td>
          <td width="54"><div align="center">mm&sup3;</div></td>
        </tr>
        <tr>
          <td>Reticulocitos</td>
          <td><div align="center">            <input name="reticulocitos" type="text" id="reticulocitos" value="<?php  echo $reticulocitos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "4">
          </div></td>
          <td>Neutr&oacute;filos segmentado</td>
          <td>            <div align="center">
            <input name="neutro_segmentado" type="text" id="neutro_segmentado" value="<?php  echo $neutro_segmentado;?>" size="6" onKeyPress="return verif_caracter(this,event)" tabindex = "11">              
          %
            </div></td>
          <td><div align="center">
            <?php  echo $absoluto_neutro_segmentado;?>
          </div></td>
          <td><div align="center">mm&sup3;</div></td>
        </tr>
        <tr>
          <td>Plaquetas</td>
          <td><div align="center">            <input name="plaquetas" type="text" id="plaquetas" value="<?php  echo $plaquetas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "5">
          </div></td>
          <td>Eosinofilos</td>
          <td>            <div align="center">
            <input name="eosinofilos" type="text" id="eosinofilos" value="<?php  echo $eosinofilos;?>" size="6" onKeyPress="return verif_caracter(this,event)" tabindex = "12">              
          %
            </div></td>
          <td><div align="center">
            <?php  echo $absoluto_eosinofilos;?>
          </div></td>
          <td><div align="center">mm&sup3;</div></td>
        </tr>
        <tr>
          <td>MCV fl (M80-99.F91-99) </td>
          <td><div align="center">            <input name="mcv" type="text" id="mcv" value="<?php  echo $mcv;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "6">
          </div></td>
          <td>Bas&oacute;filos</td>
          <td>          <div align="center">
            <input name="basofilos" type="text" id="basofilos" value="<?php  echo $basofilos;?>" size="6" onKeyPress="return verif_caracter(this,event)" tabindex = "13">
            %</div></td>
          <td><div align="center">
            <?php  echo $absoluto_basofilos;?>
          </div></td>
          <td><div align="center">mm&sup3;</div></td>
        </tr>
        <tr>
          <td>MCH pg(MyF 27-31) </td>
          <td><div align="center">            <input name="mch" type="text" id="mch" value="<?php  echo $mch;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "7">
          </div></td>
          <td>Linfocitos</td>
          <td>          <div align="center">
            <input name="linfocitos" type="text" id="linfocitos" value="<?php  echo $linfocitos;?>" size="6" onKeyPress="return verif_caracter(this,event)" tabindex = "14">
            %</div></td>
          <td><div align="center">
            <?php  echo $absoluto_linfocitos;?>
          </div></td>
          <td><div align="center">mm&sup3;</div></td>
        </tr>
        <tr>
          <td>MCHC g/d1 /MyF 30-35) </td>
          <td><div align="center">            <input name="mchc" type="text" id="mchc" value="<?php   echo $mchc;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "8">
          </div></td>
          <td>Monocitos</td>
          <td>          <div align="center">
            <input name="monocitos" type="text" id="monocitos" value="<?php  echo $monocitos;?>" size="6" onKeyPress="return verif_caracter(this,event)" tabindex = "15">
            %</div></td>
          <td><div align="center">
            <?php  echo $absoluto_monocitos;?>
          </div></td>
          <td><div align="center">mm&sup3;</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="3"><HR></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td> &nbsp;&nbsp;&nbsp;<?php echo $total_leucocitos;?> %</td>
          <td><div align="center">
            <?php  echo $total_absoluto_leucocitos;?>
          </div></td>
          <td><div align="center"> mm&sup3;</div></td>
        </tr>
</table>

<?php if ($total_leucocitos != 100){

?><table width="850" border="0" cellspacing="0" bgcolor="#FFFFFF">
            <tr>
          <td><div align="center">
            <div align="center"><span class="Estilo4"></span></div>
            <span class="Estilo4"><blink>
            <div align="center"><b><font color="#ff0000">NO COINCIDE EL TOTAL DEL RECUENTO DE LEUCOCITOS DEBE SUMAR 100</font></b></div>
            </blink></span>
            <div align="center"><span class="Estilo4">            </span></div></td>
        </tr>
       
</table><?php
}
?>

<table width="850" border="0" cellspacing="0" bgcolor="#FFFFFF">
        
        <tr>
          <td colspan="2"><div align="center">CARACTERES MORFOLOGICOS</div></td>
        </tr>
        <tr>
          <td colspan="2"><hr noshade></td>
        </tr>
        <tr>
          <td width="148">PLAQUETAS</td>
          <td width="731">          <input name="carac_plaquetas" type="text" id="carac_plaquetas" value="<?php   echo $carac_plaquetas;?>" size="100" maxlength="120" onKeyPress="return verif_caracter(this,event)" tabindex = "16"></td>
        </tr>
        <tr>
          <td>LEUCOCITOS</td>
          <td>          <input name="carac_leucocitos" type="text" id="carac_leucocitos" tabindex = "17" onKeyPress="return verif_caracter(this,event)" value="<?php  echo $carac_leucocitos;?>" size="100" maxlength="120"></td>
        </tr>
        <tr>
          <td>HEMATIES</td>
          <td>          <input name="carac_hematies" type="text" id="carac_hematies" value="<?php  echo $carac_hematies;?>" size="100" maxlength="120" onKeyPress="return verif_caracter(this,event)" tabindex = "18"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="carac_hematies2" type="text" id="carac_hematies2" value="<?php  echo $carac_hematies2;?>" size="100" maxlength="120" onKeyPress="return verif_caracter(this,event)" tabindex = "18"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>

          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">OBSERVACIONES:          
          <input name="observaciones" type="text" id="observaciones" value="<?php  echo $observaciones;?>" size="110" maxlength="120" tabindex = "19"></td>
        </tr>
  <tr>
    <td colspan="2"><div align="center">
        
		<input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
        <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
			  <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">
		<input type="submit" name="Submit" value="GUARDAR DATOS">
    </div></td>
</tr></table>

       
</body>
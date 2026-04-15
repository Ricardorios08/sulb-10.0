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
					document.getElementById("neutro_cayado").select();
				document.getElementById("neutro_cayado").focus();
				
				break;
				case "neutro_cayado":
				document.getElementById("neutro_segmentado").focus();
				document.getElementById("neutro_segmentado").select();




				break;
				case "neutro_segmentado":
							document.getElementById("eosinofilos").select();
				document.getElementById("eosinofilos").focus();
				break;

				case "eosinofilos":
				document.getElementById("basofilos").focus();
						document.getElementById("basofilos").select();
				break;
				case "basofilos":
				document.getElementById("linfocitos").focus();
						document.getElementById("linfocitos").select();
				break;
				case "linfocitos":
				document.getElementById("monocitos").focus();
						document.getElementById("monocitos").select();
				break;
				case "monocitos":
				document.getElementById("calcul").focus();
						document.getElementById("calcul").select();
				break;

				case "carac_plaquetas":
				document.getElementById("carac_leucocitos").focus();
						document.getElementById("carac_leucocitos").select();
				break;
				case "carac_leucocitos":
				document.getElementById("carac_hematies").focus();
						document.getElementById("carac_hematies").select();
				break;
				case "carac_hematies":
				document.getElementById("observaciones").focus();
						document.getElementById("observaciones").select();
				break;
				


				
		}
		return false;
	}
	return true;
}

function calcula2(operacion){ 




    var operando1 = document.calc.neutro_cayado.value 
    var operando2 = document.calc.neutro_segmentado.value  
	var operando3 = document.calc.eosinofilos.value  
    var operando4 = document.calc.basofilos.value 
    var operando5 = document.calc.linfocitos.value  
	var operando6 = document.calc.monocitos.value  

    var result = eval(operando1 + operando2 + operando3 + operando4 + operando5 + operando6) 
  
    document.calc.iva.value = result


		



} 



function calcula(operacion){ 




    var operando1 = document.calc.neutro_cayado.value 
    var operando2 = document.calc.neutro_segmentado.value  
	var operando3 = document.calc.eosinofilos.value  
    var operando4 = document.calc.basofilos.value    
    var operando5 = document.calc.linfocitos.value  
	var operando6 = document.calc.monocitos.value  
	var operando7 = document.calc.leucocitos1.value  


var total_neutro = parseInt(operando7) * parseInt(operando1) / 100
var absoluto_neutro_segmentado = parseInt(operando7) * parseInt(operando2) / 100
var absoluto_eosinofilos = parseInt(operando7) * parseInt(operando3) / 100
var absoluto_basofilos = parseInt(operando7) * parseInt(operando4) / 100
var absoluto_linfocitos = parseInt(operando7) * parseInt(operando5) / 100
var absoluto_monocitos = parseInt(operando7) * parseInt(operando6) / 100

 
if(operando1==''){
	operando1 = 0
	total_neutro = ''
}

if(operando2==''){
	operando2 = 0
	absoluto_neutro_segmentado = ''
}

if(operando3==''){
	operando3 = 0
	absoluto_eosinofilos = ''
}

if(operando4==''){
	operando4 = 0
	absoluto_basofilos = ''
}

if(operando5==''){
	operando5 = 0
	absoluto_linfocitos = ''
}

if(operando6==''){
	operando6 = 0
	absoluto_monocitos = ''
}



    var result = parseInt(operando1) + parseInt(operando2) + parseInt(operando3) + parseInt(operando4) + parseInt(operando6) + parseInt(operando5) 


    document.calc.iva.value = result

		 document.calc.total_neutro.value = total_neutro
		 document.calc.absoluto_neutro_segmentado.value = absoluto_neutro_segmentado
		 document.calc.absoluto_eosinofilos.value = absoluto_eosinofilos
		 document.calc.absoluto_basofilos.value = absoluto_basofilos
		 document.calc.absoluto_linfocitos.value = absoluto_linfocitos
		 document.calc.absoluto_monocitos.value = absoluto_monocitos

document.getElementById("carac_plaquetas").focus();

 


if(result!=100)

{

alert('La formula leucocitaria no coincide');
document.getElementById("leucocitos").focus();
}


} 

function neutro_ca(operacion){ 
var operando1 = document.calc.neutro_cayado.value 
var operando7 = document.calc.leucocitos1.value  
var total_neutro = parseInt(operando7) * parseInt(operando1) / 100
document.calc.total_neutro.value = total_neutro
document.getElementById("neutro_segmentado").focus();
} 




</script>



 

<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
.Estilo9 {font-family: "Trebuchet MS"; font-size: 12; }
.Estilo12 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo15 {font-size: 12px}
.Estilo16 {font-family: "Trebuchet MS"}
.Estilo23 {
	font-weight: bold;
	font-size: 16px;
}
-->
</style>
<BODY onload = "on_load()">
<FORM name="calc" ACTION="guardar_normal.php" METHOD = "POST">


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
$plaquetas=$result11->fields["plaquetas"]; if ($plaquetas == "0.00"){$plaquetas = "";}
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
          <td height="32" bgcolor="#999999"><div align="center" class="Estilo23"><span class="Estilo1 Estilo16"><?php echo $nombre_practica;?></span></div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
            <div align="right">&iquest;Desea Realizar la Formula Leucoitario absoluta en el informe final?
            SI
              <input name="formula" type="radio" value="si"> 
            NO
            <input name="formula" type="radio" value="no" checked>
            </div>
          </div></td>
        </tr>
        
</table>
<?php
}else{
?><table width="850" border="0" cellspacing="0" bgcolor="#FFFFFF">
        
        <tr>
          <td bgcolor="#999999"><span class="Estilo1 Estilo9 Estilo15"><?php echo $nombre_practica;?></span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
            <div align="right">&iquest;Desea Realizar la Formula Leucoitario absoluta en el informe final?
            SI
              <input name="formula" type="radio" value="si"checked> 
            NO
            <input name="formula" type="radio" value="no" >
            </div>
          </div></td>
        </tr>
        
</table>
<?php

}

?>

      <table width="850" border="0" cellspacing="0" bgcolor="#FFFFFF">
        
        <tr>
          <td colspan="2" bgcolor="#999999"><div align="center" class="Estilo12">SERIE ROJA </div>            
          <div align="center" class="Estilo12"></div></td>
          <td bgcolor="#999999"><div align="center" class="Estilo12">SERIE BLANCA </div>            </td>
          <td bgcolor="#999999"><div align="center"><span class="Estilo12">RELATIVO</span></div></td>
          <td colspan="2" bgcolor="#999999"><div align="center"><span class="Estilo12">ABSOLUTO</span></div></td>
        </tr>
        
        <tr>
          <td width="187" bgcolor="#EDEDED"><span class="Estilo12">Hematies</span></td>
          <td width="195" bgcolor="#EDEDED"><div align="center" class="Estilo12"><input name="hematies1" type="text" id="hematies" value="<?php  echo $hematies;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
          </div></td>
          <td width="145" bgcolor="#EDEDED"><div align="right"><span class="Estilo12">Leucocitos</span></div></td>
          <td colspan="3" bgcolor="#EDEDED">            <span class="Estilo12">
          <input name="leucocitos1" type="text" id="leucocitos" value="<?php  echo $leucocitos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "9">              
          </span>
          <div align="left" class="Estilo12"></div></td></tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Hemoglobina</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            <input name="hemoglobina" type="text" id="hemoglobina" value="<?php  echo $hemoglobina;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "2">
          </div></td>
          <td colspan="4" bgcolor="#EDEDED"><div align="center" class="Estilo12">
            <div align="right">FORMULA LEUCOCITARIA 
          CADA 100 LEUCOCITOS </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Hematocrito</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            <input name="hematocrito" type="text" id="hematocrito" value="<?php  echo $hematocrito;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "3">
          </div></td>
          <td bgcolor="#EDEDED"><div align="right"><span class="Estilo12">Neutr&oacute;filos en cayado </span></div></td>
          <td width="136" bgcolor="#EDEDED">            <div align="center" class="Estilo12">
            <input name="neutro_cayado" type="text" id="neutro_cayado" value="<?php  echo $neutro_cayado;?>" size="6" onKeyPress="return verif_caracter(this,event)" tabindex = "10">              
          %
          </div></td>
          <td width="117" bgcolor="#EDEDED"><div align="center" class="Estilo12">
            <input name="total_neutro" type="text" id="total_neutro" value = "<?php echo $absoluto_neutro_cayado;?>" size="4" onKeyPress="return verif_caracter(this,event)">
          </div></td>
          <td width="58" bgcolor="#EDEDED"><div align="center" class="Estilo12">mm&sup3;</div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Reticulocitos</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            <input name="reticulocitos" type="text" id="reticulocitos" value="<?php  echo $reticulocitos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "4">
          </div></td>
          <td bgcolor="#EDEDED"><div align="right"><span class="Estilo12">Neutr&oacute;filos segmentado</span></div></td>
          <td bgcolor="#EDEDED">            <div align="center" class="Estilo12">
            <input name="neutro_segmentado" type="text" id="neutro_segmentado" value="<?php  echo $neutro_segmentado;?>" size="6" onKeyPress="return verif_caracter(this,event)" tabindex = "11">              
          %
          </div></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
            <input name="absoluto_neutro_segmentado" type="text" id="total_neutro2" value = "<?php echo $absoluto_neutro_segmentado;?>" size="4" onKeyPress="return verif_caracter(this,event)">
          </div></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">mm&sup3;</div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Plaquetas</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            <input name="plaquetas" type="text" id="plaquetas" value="<?php  echo $plaquetas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "5">
          </div></td>
          <td bgcolor="#EDEDED"><div align="right"><span class="Estilo12">Eosinofilos</span></div></td>
          <td bgcolor="#EDEDED">            <div align="center" class="Estilo12">
            <input name="eosinofilos" type="text" id="eosinofilos" value="<?php  echo $eosinofilos;?>" size="6" onKeyPress="return verif_caracter(this,event)" tabindex = "12">              
          %
          </div></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
            <input name="absoluto_eosinofilos" type="text" id="total_neutro3" value = "<?php echo $absoluto_eosinofilos;?>" size="4" onKeyPress="return verif_caracter(this,event)">
          </div></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">mm&sup3;</div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">MCV fl (M80-99.F91-99) </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            <input name="mcv" type="text" id="mcv" value="<?php  echo $mcv;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "6">
          </div></td>
          <td bgcolor="#EDEDED"><div align="right"><span class="Estilo12">Bas&oacute;filos</span></div></td>
          <td bgcolor="#EDEDED">          <div align="center" class="Estilo12">
            <input name="basofilos" type="text" id="basofilos" value="<?php  echo $basofilos;?>" size="6" onKeyPress="return verif_caracter(this,event)" tabindex = "13">
          %</div></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
            <input name="absoluto_basofilos" type="text" id="absoluto_basofilos" value = "<?php echo $absoluto_basofilos;?>" size="4" onKeyPress="return verif_caracter(this,event)">
          </div></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">mm&sup3;</div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">MCH pg(MyF 27-31) </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            <input name="mch" type="text" id="mch" value="<?php  echo $mch;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "7">
          </div></td>
          <td bgcolor="#EDEDED"><div align="right"><span class="Estilo12">Linfocitos</span></div></td>
          <td bgcolor="#EDEDED">          <div align="center" class="Estilo12">
            <input name="linfocitos" type="text" id="linfocitos" value="<?php  echo $linfocitos;?>" size="6" onKeyPress="return verif_caracter(this,event)" tabindex = "14">
          %</div></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
            <input name="absoluto_linfocitos" type="text" id="absoluto_linfocitos" value = "<?php echo $absoluto_linfocitos;?>" size="4" onKeyPress="return verif_caracter(this,event)">
          </div></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">mm&sup3;</div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">MCHC g/d1 /MyF 30-35) </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            <input name="mchc" type="text" id="mchc" value="<?php   echo $mchc;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "8">
          </div></td>
          <td bgcolor="#EDEDED"><div align="right"><span class="Estilo12">Monocitos</span></div></td>
          <td bgcolor="#EDEDED">          <div align="center" class="Estilo12">
            <input name="monocitos" type="text" id="monocitos" value="<?php  echo $monocitos;?>" size="6" onKeyPress="return verif_caracter(this,event)" tabindex = "15">
          %</div></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
            <input name="absoluto_monocitos" type="text" id="absoluto_monocitos" value = "<?php echo $absoluto_monocitos;?>" size="4" onKeyPress="return verif_caracter(this,event)">
          </div></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">mm&sup3;</div></td>
        </tr>
        
        
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
            <input name="iva" type="text" id="iva" value = "<?php echo $total_leucocitos;?>" size="4" onKeyPress="return verif_caracter(this,event)">
          %</div></td>
          <td colspan="2" bgcolor="#EDEDED"><div align="center" class="Estilo12">
            <input type="Button" name="Input" id ="calcul" value="CHEQUEA" onClick="calcula('=')" onKeyPress="calcula('=')">
          </div></td>
        </tr>
</table>



<table width="850" border="0" cellspacing="0" bgcolor="#FFFFFF">
        
        <tr>
          <td colspan="2" bgcolor="#999999"><div align="center">CARACTERES MORFOLOGICOS</div></td>
        </tr>
        <tr>
          <td colspan="2"><hr noshade></td>
        </tr>
        <tr>
          <td width="148" bgcolor="#EDEDED"><span class="Estilo12">PLAQUETAS</span></td>
          <td width="731" bgcolor="#EDEDED">          <input name="carac_plaquetas" type="text" id="carac_plaquetas" tabindex = "16" onKeyPress="return verif_caracter(this,event)" value="<?php   echo $carac_plaquetas;?>" size="100" maxlength="120"></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">LEUCOCITOS</span></td>
          <td bgcolor="#EDEDED">          <input name="carac_leucocitos" type="text" id="carac_leucocitos" tabindex = "17" onKeyPress="return verif_caracter(this,event)" value="<?php  echo $carac_leucocitos;?>" size="100" maxlength="120"></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">HEMATIES</span></td>
          <td bgcolor="#EDEDED">          <input name="carac_hematies" type="text" id="carac_hematies" tabindex = "18" onKeyPress="return verif_caracter(this,event)" value="<?php  echo $carac_hematies;?>" size="100" maxlength="120"></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo15"></span></td>
          <td bgcolor="#EDEDED"><input name="carac_hematies2" type="text" id="carac_hematies2" tabindex = "18" onKeyPress="return verif_caracter(this,event)" value="<?php  echo $carac_hematies2;?>" size="100" maxlength="120"></td>
        </tr>
        
	 


        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">OBSERVACIONES:          
          
          </span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="observaciones" type="text" id="observaciones" value="<?php  echo $observaciones;?>" size="110" maxlength="120" tabindex = "19">
          </span></td>
        </tr>
  <tr>
    <td colspan="2" bgcolor="#999999"><div align="center">
        
		<input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
        <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
			  <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">
		<input type="submit" name="Submit" value="GUARDAR DATOS">
    </div></td>
</tr></table>

       
</body>
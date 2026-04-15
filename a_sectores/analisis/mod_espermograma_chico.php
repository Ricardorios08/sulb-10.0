<script language="javascript">
function on_load()
{
document.getElementById("color").focus();
document.getElementById("color").select();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
			
				case "color":
				document.getElementById("grumos").focus();
				document.getElementById("grumos").select();
				break;
				case "grumos":
				document.getElementById("viscocidad").focus();
				document.getElementById("viscocidad").select();
				break;
				case "viscocidad":
				document.getElementById("volumen").focus();
				document.getElementById("volumen").select();
				break;
				case "volumen":
				document.getElementById("ph").focus();
				document.getElementById("ph").select();
				break;
				case "ph":
				document.getElementById("espermatozoides").focus();
				document.getElementById("espermatozoides").select();			
				break;
				case "espermatozoides":
				document.getElementById("celulas").focus();
				document.getElementById("celulas").select();
				break;
				case "celulas":
				document.getElementById("leucocitos").focus();
				document.getElementById("leucocitos").select();
				break;
				case "leucocitos":
				document.getElementById("piocitos").focus();
				document.getElementById("piocitos").select();
				break;
				case "piocitos":
				document.getElementById("hematies").focus();
				document.getElementById("hematies").select();
				break;
				case "hematies":
				document.getElementById("nro_espermatozoides").focus();
				document.getElementById("nro_espermatozoides").select();
				break;

				case "nro_espermatozoides":
				document.getElementById("grado_a").focus();
				document.getElementById("grado_a").select();
				break;


				case "grado_a":
				document.getElementById("grado_b").focus();
				document.getElementById("grado_b").select();
				break;
				case "grado_b":
				document.getElementById("grado_c").focus();
				document.getElementById("grado_c").select();
				break;
				case "grado_c":
				document.getElementById("grado_d").focus();
				document.getElementById("grado_d").select();
				break;
				case "grado_d":
				document.getElementById("normales").focus();
				document.getElementById("normales").select();
				break;
				case "normales":
				document.getElementById("anomalias_cabeza").focus();
				document.getElementById("anomalias_cabeza").select();
				break;
				case "anomalias_cabeza":
				document.getElementById("anomalias_segmento").focus();
				document.getElementById("anomalias_segmento").select();

				break;
				case "anomalias_segmento":
				document.getElementById("anomalias_cola").focus();
				document.getElementById("anomalias_cola").select();
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

 $sql11="select * from detalle_espermograma where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$color=$result11->fields["color"];
$grumos=$result11->fields["grumos"];
$viscocidad=$result11->fields["viscocidad"];
$volumen=$result11->fields["volumen"];
$ph=$result11->fields["ph"];

$espermatozoides=$result11->fields["espermatozoides"];
$celulas=$result11->fields["celulas"];
$leucocitos=$result11->fields["leucocitos"];
$piocitos=$result11->fields["piocitos"];
$hematies=$result11->fields["hematies"]; 

$nro_espermatozoides=$result11->fields["nro_espermatozoides"]; 

$grado_a=$result11->fields["grado_a"];
$grado_b=$result11->fields["grado_b"];
$grado_c=$result11->fields["grado_c"];
$grado_d=$result11->fields["grado_d"];

$normales=$result11->fields["normales"];
$anomalias_cabeza=$result11->fields["anomalias_cabeza"];
$anomalias_segmento=$result11->fields["anomalias_segmentado"];
$anomalias_cola=$result11->fields["anomalias_cola"];



 $sql11="select * from practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);





if ($formula == "NO"){
?>
<?php
}else{
?>
<table width="850" border="0" cellspacing="0" bgcolor="#FFFFFF">
        
        <tr>
          <td bgcolor="#999999"><span class="Estilo1 Estilo9 Estilo15"><?php echo $nombre_practica;?></span></td>
        </tr>
</table>
<?php

}

?>

      <table width="848" border="0" cellspacing="0" bgcolor="#FFFFFF">
        
        <tr>
          <td colspan="2" bgcolor="#999999"><div align="center" class="Estilo12">EXAMEN MACROSCOPICO </div>            
          <div align="center" class="Estilo12"></div></td>
        </tr>
        
        <tr>
          <td width="357" bgcolor="#EDEDED"><span class="Estilo12">Color</span></td>
          <td width="487" bgcolor="#EDEDED"><input name="color" type="text" id="color" value="<?php  echo $color;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "4"></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Grumos</span></td>
          <td bgcolor="#EDEDED"><input name="grumos" type="text" id="grumos" value="<?php  echo $grumos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "4"></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Viscocidad </span></td>
          <td bgcolor="#EDEDED"><input name="viscocidad" type="text" id="viscocidad" value="<?php  echo $viscocidad;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "3"></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Volumen</span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="volumen" type="text" id="volumen" value="<?php  echo $volumen;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">pH</span></td>
          <td bgcolor="#EDEDED"><input name="ph" type="text" id="ph" value="<?php  echo $ph;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "2"></td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#999999"><div align="center"><span class="Estilo12">EXAMEN MICROSCOPICO (Por campo de 400 X) </span></div></td>
          </tr>
        
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Espermatozoides</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            
            <div align="left">
              <input name="espermatozoides" type="text" id="espermatozoides" value="<?php  echo $espermatozoides;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "4">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">C&eacute;lulas</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            
            <div align="left">
              <input name="celulas" type="text" id="celulas" value="<?php  echo $celulas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "5">
            </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Leucocitos</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            
            <div align="left">
              <input name="leucocitos" type="text" id="leucocitos" value="<?php  echo $leucocitos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "6">
            </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Piocitos</span></td>
          <td bgcolor="#EDEDED"><input name="piocitos" type="text" id="piocitos" value="<?php  echo $piocitos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "6"></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Hematies</span></td>
          <td bgcolor="#EDEDED"><input name="hematies" type="text" id="hematies" value="<?php  echo $hematies;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "6"></td>
        </tr>
        
        <tr>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">NUMERO DE MILLONES DE ESPERMATOZOIDES POR ml.: </span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="nro_espermatozoides" type="text" id="nro_espermatozoides" value="<?php  echo $nro_espermatozoides;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "7">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        
        <tr>
          <td bgcolor="#B8B8B8"><span class="Estilo12">MOTILIDAD</span></td>
          <td bgcolor="#B8B8B8"><div align="center" class="Estilo12">
              <div align="left"></div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Grado a: </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="grado_a" type="text" id="grado_a" value="<?php  echo $grado_a;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "9">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Grado b:</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="grado_b" type="text" id="grado_b" value="<?php  echo $grado_b;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "10">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Grado c:</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="grado_c" type="text" id="grado_c" value="<?php  echo $grado_c;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "11">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Grado d:</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="grado_d" type="text" id="grado_d" value="<?php  echo $grado_d;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "12">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#999999"><span class="Estilo12">FORMULA ESPERMATICA</span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Normales</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="normales" type="text" id="normales" value="<?php  echo $normales;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "14">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Anomalias de cabeza </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="anomalias_cabeza" type="text" id="anomalias_cabeza" value="<?php  echo $anomalias_cabeza;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "15">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Anomalias de seg. intermedio </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="anomalias_segmento" type="text" id="anomalias_segmento" value="<?php  echo $anomalias_segmento;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "16">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Anomalias de cola </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="anomalias_cola" type="text" id="anomalias_cola" value="<?php  echo $anomalias_cola;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "17">
              </div>
          </div></td>
        </tr>
        
        <tr>
          <td colspan="2" bgcolor="#999999"><div align="center">
            <input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
            <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
            <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">
            <input type="submit" name="Submit" value="GUARDAR DATOS">
          </div></td>
        </tr>
</table>



</body>
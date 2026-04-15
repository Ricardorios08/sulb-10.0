<script language="javascript">
function on_load()
{
document.getElementById("volumen").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				
				case "volumen":
				document.getElementById("aspecto").focus();
				break;
				case "aspecto":
				document.getElementById("viscocidad").focus();
				break;
				case "viscocidad":
				document.getElementById("reaccion").focus();
				break;
				case "reaccion":
				document.getElementById("ph").focus();
				break;
				case "ph":
				document.getElementById("licuacion").focus();
				break;
				case "licuacion":
				document.getElementById("directo").focus();
				break;
				case "directo":
				document.getElementById("citomorfologico").focus();
				break;
				case "citomorfologico":
				document.getElementById("espermios_ml").focus();
				break;
				case "espermios_ml":
				document.getElementById("espermios_vol_eyaculado").focus();
				break;
				case "espermios_vol_eyaculado":
				document.getElementById("espermios_ovales").focus();
				break;

				case "espermios_ovales":
				document.getElementById("megaloespermas").focus();
				break;
				case "megaloespermas":
				document.getElementById("piriformes").focus();
				break;
				case "piriformes":
				document.getElementById("microespermas").focus();
				break;
				case "microespermas":
				document.getElementById("celulas_duplicadas").focus();
				break;
				case "celulas_duplicadas":
				document.getElementById("amorfo").focus();
				break;
				case "amorfo":
				document.getElementById("otros_elementos").focus();
				break;
				case "otros_elementos":
				document.getElementById("leucocitos").focus();
				break;
				case "leucocitos":
				document.getElementById("piocitos").focus();
				break;
				case "piocitos":
				document.getElementById("celulas_planas").focus();
				break;
				case "celulas_planas":
				document.getElementById("conglomerado_espermios").focus();
				break;

				case "conglomerado_espermios":
				document.getElementById("motilidad").focus();
				break;
				case "motilidad":
				document.getElementById("formas_moviles").focus();
				break;
				case "formas_moviles":
				document.getElementById("formas_inmoviles").focus();
				break;
				case "formas_inmoviles":
				document.getElementById("tipo_movilidad").focus();
				break;
				case "tipo_movilidad":
				document.getElementById("desplazamiento_rapido").focus();
				break;
				case "desplazamiento_rapido":
				document.getElementById("desplazamiento_lento").focus();
				break;
				case "desplazamiento_lento":
				document.getElementById("desplazamiento_muy_lento").focus();
				break;
				case "desplazamiento_muy_lento":
				document.getElementById("eosina_negativa").focus();
				break;
				case "eosina_negativa":
				document.getElementById("eosina_positiva").focus();
				break;
				case "eosina_positiva":
				document.getElementById("metileno").focus();
				break;

				case "metileno":
				document.getElementById("fructosa").focus();
				break;
				case "fructosa":
				document.getElementById("citrico").focus();
				break;
				case "citrico":
				document.getElementById("ascorbico").focus();
				break;
				case "ascorbico":
				document.getElementById("ascorbicos_analogos").focus();
				break;
				case "ascorbicos_analogos":
				document.getElementById("analogos").focus();
				break;
				case "analogos":
				document.getElementById("real").focus();
				break;
				case "real":
				document.getElementById("fosfatasa").focus();
				break;
				case "fosfatasa":
				document.getElementById("glicerilfosforilcolina").focus();
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

 $sql11="select * from detalle_espermo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$volumen=$result11->fields["volumen"];
$aspecto=$result11->fields["aspecto"];
$viscocidad=$result11->fields["viscocidad"];
$reaccion=$result11->fields["reaccion"];
$ph=$result11->fields["ph"];
$licuacion=$result11->fields["licuacion"];
$directo=$result11->fields["directo"];
$citomorfologico=$result11->fields["citomorfologico"];
$espermios_ml=$result11->fields["espermios_ml"];
$espermios_vol_eyaculado=$result11->fields["espermios_vol_eyaculado"]; 
$espermios_ovales=$result11->fields["espermios_ovales"];
$megaloespermas=$result11->fields["megaloespermas"];
$piriformes=$result11->fields["piriformes"];
$microespermas=$result11->fields["microespermas"];
$celulas_duplicadas=$result11->fields["celulas_duplicadas"];
$amorfo=$result11->fields["amorfo"];
$leucocitos=$result11->fields["leucocitos"];
$piocitos=$result11->fields["piocitos"];
$celulas_planas=$result11->fields["celulas_planas"];
$conglomerado_espermios=$result11->fields["conglomerado_espermios"]; 
$motilidad=$result11->fields["motilidad"];
$formas_moviles=$result11->fields["formas_moviles"];
$formas_inmoviles=$result11->fields["formas_inmoviles"];
$tipo_movilidad=$result11->fields["tipo_movilidad"];
$desplazamiento_rapido=$result11->fields["desplazamiento_rapido"];
$desplazamiento_lento=$result11->fields["desplazamiento_lento"];
$desplazamiento_muy_lento=$result11->fields["desplazamiento_muy_lento"];
$eosina_negativa=$result11->fields["eosina_negativa"];
$eosina_positiva=$result11->fields["eosina_positiva"];
$metileno=$result11->fields["metileno"]; 
$fructosa=$result11->fields["fructosa"];
$citrico=$result11->fields["citrico"];

$ascorbico=$result11->fields["ascorbico"];
$ascorbicos_analogos=$result11->fields["ascorbicos_analogos"];
$analogos=$result11->fields["analogos"];
$real=$result11->fields["real"];
$fosfatasa=$result11->fields["fosfatasa"];
$glicerilfosforilcolina=$result11->fields["glicerilfosforilcolina"];
$otros_elementos=$result11->fields["otros_elementos"];



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
              <input name="espermatozoides" type="text" id="espermatozoides" value="<?php  echo $reaccion;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "4">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">C&eacute;lulas</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            
            <div align="left">
              <input name="ph" type="text" id="ph" value="<?php  echo $ph;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "5">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Leucocitos</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            
            <div align="left">
              <input name="licuacion" type="text" id="licuacion" value="<?php  echo $licuacion;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "6">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Piocitos</span></td>
          <td bgcolor="#EDEDED"><input name="licuacion2" type="text" id="licuacion2" value="<?php  echo $licuacion;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "6"></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Hematies</span></td>
          <td bgcolor="#EDEDED"><input name="licuacion3" type="text" id="licuacion3" value="<?php  echo $licuacion;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "6"></td>
        </tr>
        
        <tr>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">NUMERO DE MILLONES DE ESPERMATOZOIDES POR ml.: </span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="directo" type="text" id="directo" value="<?php  echo $directo;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "7">
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
                <input name="espermios_ml" type="text" id="espermios_ml" value="<?php  echo $espermios_ml;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "9">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Grado b:</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="espermios_vol_eyaculado" type="text" id="espermios_vol_eyaculado" value="<?php  echo $espermios_vol_eyaculado;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "10">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Grado c:</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="espermios_ovales" type="text" id="espermios_ovales" value="<?php  echo $espermios_ovales;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "11">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Grado d:</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="megaloespermas" type="text" id="megaloespermas" value="<?php  echo $megaloespermas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "12">
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
                <input name="microespermas" type="text" id="microespermas" value="<?php  echo $microespermas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "14">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Anomalias de cabeza </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="celulas_duplicadas" type="text" id="celulas_duplicadas" value="<?php  echo $celulas_duplicadas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "15">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Anomalias de seg. intermedio </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="amorfo" type="text" id="amorfo" value="<?php  echo $amorfo;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "16">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Anomalias de cola </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="otros_elementos" type="text" id="otros_elementos" value="<?php  echo $otros_elementos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "17">
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
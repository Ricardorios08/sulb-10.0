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
          <td colspan="2" bgcolor="#999999"><div align="center" class="Estilo12">EXAMEN FISICO </div>            
          <div align="center" class="Estilo12"></div></td>
        </tr>
        
        <tr>
          <td width="357" bgcolor="#EDEDED"><span class="Estilo12">Volumen</span></td>
          <td width="487" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="volumen" type="text" id="volumen" value="<?php  echo $volumen;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
          </span></td>
          </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Aspecto</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            
            <div align="left">
              <input name="aspecto" type="text" id="aspecto" value="<?php  echo $aspecto;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "2">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Viscocidad</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            
            <div align="left">
              <input name="viscocidad" type="text" id="viscocidad" value="<?php  echo $viscocidad;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "3">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Reacci&oacute;n</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            
            <div align="left">
              <input name="reaccion" type="text" id="reaccion" value="<?php  echo $reaccion;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "4">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">pH</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            
            <div align="left">
              <input name="ph" type="text" id="ph" value="<?php  echo $ph;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "5">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Velocidad de licuaci&oacute;n</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">            
            <div align="left">
              <input name="licuacion" type="text" id="licuacion" value="<?php  echo $licuacion;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "6">
              </div>
          </div></td>
        </tr>
        
        <tr>
          <td colspan="2" bgcolor="#999999"><div align="center"><span class="Estilo12">EXAMEN MICROSCOPICO </span></div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">EXAMEN DIRECTO </span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="directo" type="text" id="directo" value="<?php  echo $directo;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "7">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">EXAMEN CITOMORFOLOGICO </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="citomorfologico" type="text" id="citomorfologico" value="<?php  echo $citomorfologico;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "8">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Espermios po mL </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="espermios_ml" type="text" id="espermios_ml" value="<?php  echo $espermios_ml;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "9">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Espermios en el volumen eyaculado </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="espermios_vol_eyaculado" type="text" id="espermios_vol_eyaculado" value="<?php  echo $espermios_vol_eyaculado;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "10">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Espermios ovales (normales) </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="espermios_ovales" type="text" id="espermios_ovales" value="<?php  echo $espermios_ovales;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "11">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Megaloespermas (gigante) </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="megaloespermas" type="text" id="megaloespermas" value="<?php  echo $megaloespermas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "12">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Piriformes</span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="piriformes" type="text" id="piriformes" value="<?php  echo $piriformes;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "13">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Microespermas</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="microespermas" type="text" id="microespermas" value="<?php  echo $microespermas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "14">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Celulas duplicadas </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="celulas_duplicadas" type="text" id="celulas_duplicadas" value="<?php  echo $celulas_duplicadas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "15">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Grupo amorfo </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="amorfo" type="text" id="amorfo" value="<?php  echo $amorfo;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "16">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Otros elementos</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="otros_elementos" type="text" id="otros_elementos" value="<?php  echo $otros_elementos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "17">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Leucocitos</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="leucocitos" type="text" id="leucocitos" value="<?php  echo $leucocitos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "18">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Piocitos</span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="piocitos" type="text" id="piocitos" value="<?php  echo $piocitos;?>" size="30" onKeyPress="return verif_caracter(this,event)" tabindex = "19">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Celulas planas </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="celulas_planas" type="text" id="celulas_planas" value="<?php  echo $celulas_planas;?>" size="30" onKeyPress="return verif_caracter(this,event)" tabindex = "20">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Conglomerados de espermios </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="conglomerado_espermios" type="text" id="conglomerado_espermios" value="<?php  echo $conglomerado_espermios;?>" size="30" onKeyPress="return verif_caracter(this,event)" tabindex = "21">
              </div>
          </div></td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#999999"><div align="center"><span class="Estilo12">EXAMEN DE LA DINAMICA ESPERMATICA </span></div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Motilidad</span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="motilidad" type="text" id="motilidad" value="<?php  echo $motilidad;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "22">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Formas m&oacute;viles </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="formas_moviles" type="text" id="formas_moviles" value="<?php  echo $formas_moviles;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "23">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Formas inmoviles </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="formas_inmoviles" type="text" id="formas_inmoviles" value="<?php  echo $formas_inmoviles;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "24">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Tipo de movilidad</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="tipo_movilidad" type="text" id="tipo_movilidad" value="<?php  echo $tipo_movilidad;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "25">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Desplazamiento r&aacute;pido </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="desplazamiento_rapido" type="text" id="desplazamiento_rapido" value="<?php  echo $desplazamiento_rapido;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "26">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Desplazamiento lento</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="desplazamiento_lento" type="text" id="desplazamiento_lento" value="<?php  echo $desplazamiento_lento;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "27">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Desplazamiento muy lento</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="desplazamiento_muy_lento" type="text" id="desplazamiento_muy_lento" value="<?php  echo $desplazamiento_muy_lento;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "28">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Inm&oacute;viles: Grado 0 eosina (-)</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="eosina_negativa" type="text" id="eosina_negativa" value="<?php  echo $eosina_negativa;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "29">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12"> Necrosados eosina (+)</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="eosina_positiva" type="text" id="eosina_positiva" value="<?php  echo $eosina_positiva;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "30">
              </div>
          </div></td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#999999"><div align="center"><span class="Estilo12">EXAMEN QUIMICO DEL PLASMA SEMINAL </span></div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Prueba de reducci&oacute;n del azul de metileno </span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="metileno" type="text" id="metileno" value="<?php  echo $metileno;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "31">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Fructosa</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="fructosa" type="text" id="fructosa" value="<?php  echo $fructosa;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "32">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Acido citrico </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="citrico" type="text" id="citrico" value="<?php  echo $citrico;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "33">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Acido asc&oacute;rbico</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="ascorbico" type="text" id="ascorbico" value="<?php  echo $ascorbico;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "34">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Acido asc&oacute;rbico + analogos </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="ascorbicos_analogos" type="text" id="ascorbicos_analogos" value="<?php  echo $ascorbicos_analogos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "35">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Compuestos analogos</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="analogos" type="text" id="analogos" value="<?php  echo $analogos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "36">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Acido asc&oacute;rbico</span> real </td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="real" type="text" id="real" value="<?php  echo $real;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "37">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Fosfatasa &aacute;cida </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="fosfatasa" type="text" id="fosfatasa" value="<?php  echo $fosfatasa;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "38">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12"> Glicerilfosforilcolina </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="glicerilfosforilcolina" type="text" id="glicerilfosforilcolina" value="<?php  echo $glicerilfosforilcolina;?>" size="20"   tabindex = "39">
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
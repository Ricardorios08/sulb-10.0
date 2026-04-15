<script language="javascript">
function on_load()
{
document.getElementById("consistencia").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{




				case "consistencia":
				document.getElementById("forma").focus();
				break;
				case "forma":
				document.getElementById("externo").focus();
				break;
				case "externo":
				document.getElementById("interno").focus();
				break;
				case "interno":
				document.getElementById("mucus").focus();
				break;
				case "mucus":
				document.getElementById("mucoides").focus();
				break;
				case "mucoides":
				document.getElementById("mucomembranas").focus();
				break;
				case "mucomembranas":
				document.getElementById("pus").focus();
				break;
				case "pus":
				document.getElementById("sangre").focus();
				break;
				case "sangre":
				document.getElementById("conjuntivo").focus();
				break;
				case "conjuntivo":
				document.getElementById("carne").focus();
				break;

				case "carne":
				document.getElementById("feculentos").focus();
				break;
				case "feculentos":
				document.getElementById("grasos").focus();
				break;
				case "grasos":
				document.getElementById("otros").focus();
				break;
				case "otros":
				document.getElementById("bien_digeridas").focus();
				break;
				case "bien_digeridas":
				document.getElementById("mal_digeridas").focus();
				break;
				case "mal_digeridas":
				document.getElementById("acumulos").focus();
				break;
				case "acumulos":
				document.getElementById("libre").focus();
				break;
				case "libre":
				document.getElementById("grasas").focus();
				break;
				case "grasas":
				document.getElementById("acidos").focus();
				break;
				case "acidos":
				document.getElementById("jabones").focus();
				break;

				case "jabones":
				document.getElementById("almidon_incluido").focus();
				break;
				case "almidon_incluido":
				document.getElementById("almidon_amorfo").focus();
				break;
				case "almidon_amorfo":
				document.getElementById("almidon_crudo").focus();
				break;
				case "almidon_crudo":
				document.getElementById("celulosa_digestible").focus();
				break;
				case "celulosa_digestible":
				document.getElementById("celulosa_indigestible").focus();
				break;
				case "celulosa_indigestible":
				document.getElementById("cristales").focus();
				break;
				case "cristales":
				document.getElementById("moco").focus();
				break;
				case "moco":
				document.getElementById("pus_int").focus();
				break;

				

				case "pus_int":
				document.getElementById("sangre_int").focus();
				break;
				case "sangre_int":
				document.getElementById("bilirubina").focus();
				break;

				case "bilirubina":
				document.getElementById("estercobilina").focus();
				break;
				case "estercobilina":
				document.getElementById("acidos_organicos").focus();
				break;
				case "acidos_organicos":
				document.getElementById("amoniaco").focus();
				break;
				case "amoniaco":
				document.getElementById("mucina").focus();
				break;
				case "mucina":
				document.getElementById("proteinas").focus();
				break;
				case "proteinas":
				document.getElementById("albumosas").focus();
				break;
				case "albumosas":
				document.getElementById("peptonas").focus();
				break;
				case "peptonas":
				document.getElementById("flora").focus();
				break;
					case "flora":
				document.getElementById("criterio").focus();
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

 $sql11="select * from detalle_fecal_373 where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

$consistencia =$result11->fields["consistencia"];
$forma=$result11->fields["forma"];
$externo=$result11->fields["externo"];
$interno=$result11->fields["interno"];
$mucus=$result11->fields["mucus"];
$mucoides=$result11->fields["mucoides"];
$mucomembranas=$result11->fields["mucomembranas"];
$pus=$result11->fields["pus"];
$sangre=$result11->fields["sangre"];
$conjuntivo=$result11->fields["conjuntivo"];
$carne=$result11->fields["carne"];
$feculentos=$result11->fields["feculentos"];
$grasos=$result11->fields["grasos"];
$otros=$result11->fields["otros"];
$bien_digeridas=$result11->fields["bien_digeridas"];
$mal_digeridas=$result11->fields["mal_digeridas"];
$acumulos=$result11->fields["acumulos"];
$libre=$result11->fields["libre"];
$grasas=$result11->fields["grasas"];
$acidos=$result11->fields["acidos"];
$jabones=$result11->fields["jabones"];
$almidon_incluido=$result11->fields["almidon_incluido"];
$almidon_amorfo=$result11->fields["almidon_amorfo"];
$almidon_crudo=$result11->fields["almidon_crudo"];
$celulosa_digestible=$result11->fields["celulosa_digestible"];
$celulosa_indigestible=$result11->fields["celulosa_indigestible"];
$cristales=$result11->fields["cristales"];
$moco=$result11->fields["moco"];
$pus_int=$result11->fields["pus_int"];
$sangre_int=$result11->fields["sangre_int"];
$reaccion=$result11->fields["reaccion"];
$bilirubina=$result11->fields["bilirubina"];
$estercobilina=$result11->fields["estercobilina"];
$acidos_organicos=$result11->fields["acidos_organicos"];
$amoniaco=$result11->fields["amoniaco"];
$mucina=$result11->fields["mucina"];
$proteinas=$result11->fields["proteinas"];
$albumosas=$result11->fields["albumosas"];
$peptonas=$result11->fields["peptonas"];
$flora=$result11->fields["flora"];
$criterio=$result11->fields["criterio"];

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
          <td colspan="4" bgcolor="#999999"><div align="center" class="Estilo12">
            <div align="left">EXAMEN EXTERIOR </div>
          </div>            
            <div align="center" class="Estilo12"></div></td>
        </tr>
        <tr>
          <td width="357" bgcolor="#EDEDED"><span class="Estilo12">Consistencia</span></td>
          <td width="243" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="consistencia" type="text" id="consistencia" value="<?php  echo $consistencia;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
          </span></td>
          <td width="122" bgcolor="#EDEDED">&nbsp;</td>
          <td width="122" bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Forma</span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="forma" type="text" id="forma" value="<?php  echo $forma;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "2">
          </span></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Color Externo </span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="externo" type="text" id="externo" value="<?php  echo $externo;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "3">
          </span></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Color Interno </span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="interno" type="text" id="interno" value="<?php  echo $interno;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "4">
          </span></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr bgcolor="#999999">
          <td colspan="4"><span class="Estilo12">EXAMEN MACROSCOPICO RESIDUOS INTESTINALES </span><span class="Estilo12">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Mucus Amorfos </span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="mucus" type="text" id="mucus" value="<?php  echo $mucus;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "5">
          </span></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Agregados mucoides </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="mucoides" type="text" id="mucoides" value="<?php  echo $mucoides;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "6">
              </div>
          </div></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Mucomembranas </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="mucomembranas" type="text" id="mucomembranas" value="<?php  echo $mucomembranas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "7">
              </div>
          </div></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Pus en materia fecal </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="pus" type="text" id="pus" value="<?php  echo $pus;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "8">
              </div>
          </div></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Sangre</span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="sangre" type="text" id="sangre" value="<?php  echo $sangre;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "9">
          </span></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        

        <tr>
          <td colspan="4" bgcolor="#999999"><div align="left"><span class="Estilo12">EXAMEN MACROSCOPICO REISUDIOS ALIMENTICIOS </span></div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Tejido conjuntvo </span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="conjuntivo" type="text" id="conjuntivo" value="<?php  echo $conjuntivo;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "10">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Carne</span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="carne" type="text" id="carne" value="<?php  echo $carne;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "11">
              </div>
          </div></td>
        </tr>
        
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Feculentos</span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="feculentos" type="text" id="feculentos" value="<?php  echo $feculentos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "12">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Residuos Grasos </span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="grasos" type="text" id="grasos" value="<?php  echo $grasos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "13">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Otros residuos vegetales </span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="otros" type="text" id="otros" value="<?php  echo $otros;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "14">
          </span></td>
        </tr>
        
        <tr>
          <td colspan="4" bgcolor="#999999"><span class="Estilo12">RESTOS DE ORIGEN ANIMAL </span>            <div align="center" class="Estilo12">
              <div align="left">              </div>
            </div></td>
        </tr>
        
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Fibras bien digeridas  </span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="bien_digeridas" type="text" id="bien_digeridas" value="<?php  echo $bien_digeridas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "15">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Fibras mal digeridas </span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="mal_digeridas" type="text" id="mal_digeridas" value="<?php  echo $mal_digeridas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "16">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Ac&uacute;mulos de fibras </span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="acumulos" type="text" id="acumulos" value="<?php  echo $acumulos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "17">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Tej conjuntivo libre </span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="libre" type="text" id="libre" value="<?php  echo $libre;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "18">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Grasas neutras </span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="grasas" type="text" id="grasas" value="<?php  echo $grasas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "19">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Acidos grasos </span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="acidos" type="text" id="acidos" value="<?php  echo $acidos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "20">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Jabones</span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="jabones" type="text" id="jabones" value="<?php  echo $jabones;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "21">
              </div>
          </div></td>
        </tr>
        
        <tr>
          <td colspan="4" bgcolor="#999999"><span class="Estilo12">RESTOS DE ORIGEN VEGETAL </span>
              <div align="center" class="Estilo12">
                <div align="left"> </div>
              </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Almidon incluido:</span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="almidon_incluido" type="text" id="almidon_incluido" value="<?php  echo $almidon_incluido;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "22">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Almidon amorfo:</span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="almidon_amorfo" type="text" id="almidon_amorfo" value="<?php  echo $almidon_amorfo;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "23">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Almidon crudo:</span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="almidon_crudo" type="text" id="almidon_crudo" value="<?php  echo $almidon_crudo;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "24">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Celulosa digestible:</span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="celulosa_digestible" type="text" id="celulosa_digestible" value="<?php  echo $celulosa_digestible;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "25">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Celulosa indigestible:</span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="celulosa_indigestible" type="text" id="celulosa_indigestible" value="<?php  echo $celulosa_indigestible;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "26">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Cristales:</span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="cristales" type="text" id="cristales" value="<?php  echo $cristales;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "27">
              </div>
          </div></td>
        </tr>
        <tr>
          <td colspan="4" bgcolor="#999999"><span class="Estilo12">RESIDUOS INTESTINALES </span>
              <div align="center" class="Estilo12">
                <div align="left"> </div>
              </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Moco</span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="moco" type="text" id="moco" value="<?php  echo $moco;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "28">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Pus en materia fecal </span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="pus_int" type="text" id="pus_int" value="<?php  echo $pus_int;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "29">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Sangre</span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="sangre_int" type="text" id="sangre_int" value="<?php  echo $sangre_int;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "30">
          </span></td>
        </tr>
        <tr>
          <td colspan="4" bgcolor="#999999"><span class="Estilo12">QUIMICO FECAL </span>
              <div align="center" class="Estilo12">
                <div align="left"> </div>
              </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Reacci&oacute;n de la mat fecal </span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="reaccion" type="text" id="reaccion" value="<?php  echo $reaccion;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "31">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Bilirubina</span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="bilirubina" type="text" id="bilirubina" value="<?php  echo $bilirubina;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "32">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Estercobilina</span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="estercobilina" type="text" id="estercobilina" value="<?php  echo $estercobilina;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "33">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Acidos organicos totales </span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="acidos_organicos" type="text" id="acidos_organicos" value="<?php  echo $acidos_organicos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "34">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Amon&iacute;aco y derivados:</span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="amoniaco" type="text" id="amoniaco" value="<?php  echo $amoniaco;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "35">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Mucina</span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="mucina" type="text" id="mucina" value="<?php  echo $mucina;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "36">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Prote&iacute;nas</span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="proteinas" type="text" id="proteinas" value="<?php  echo $proteinas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "37">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Albumosas</span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="albumosas" type="text" id="albumosas" value="<?php  echo $albumosas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "38">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Peptonas</span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="peptonas" type="text" id="peptonas" value="<?php  echo $peptonas;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "39">
          </span></td>
        </tr>
        <tr>
          <td colspan="4" bgcolor="#999999"><span class="Estilo12">BACTERIOLOGICO</span>
              <div align="center" class="Estilo12">
                <div align="left"> </div>
              </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Flora iod&oacute;fila:</span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="flora" type="text" id="flora" value="<?php  echo $flora;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "40">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Criterio global de la flora:</span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="criterio" type="text" id="criterio" value="<?php  echo $criterio;?>" size="20" tabindex = "41">
          </span></td>
        </tr>
        
        
        <tr>
          <td colspan="4" bgcolor="#999999"><div align="center">
            <input name="cod_practica" type="hidden"  value="<?php echo $nro_practica;?>">
            <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>">
            <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>">
            <input type="submit" name="Submit" value="GUARDAR DATOS">
          </div></td>
        </tr>
</table>



</body>
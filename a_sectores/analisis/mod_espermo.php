<script language="javascript">
function on_load()
{
document.getElementById("abstinencia").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				
$abstinencia=$result11->fields[""];
$recoleccion=$result11->fields[""];
$eyaculacion=$result11->fields[""];
$ambiente=$result11->fields[""];
$volumen=$result11->fields[""];
$licuacion=$result11->fields[""];
$aspecto=$result11->fields[""];
$viscocidad=$result11->fields[""];
$coloracion=$result11->fields[""];
$ph=$result11->fields[""];
$mm3=$result11->fields[""];
$ml=$result11->fields[""];
$desplazamiento_rapido=$result11->fields[""];
$desplazamiento_lento=$result11->fields[""];
$no_progresiva=$result11->fields[""];
$inmoviles=$result11->fields[""];
$inmoviles_vivos=$result11->fields[""];
$inmoviles_muertos=$result11->fields[""];
$otros_elementos=$result11->fields[""];
$normales=$result11->fields[""];
$anormales=$result11->fields[""];
$fructuosa=$result11->fields[""];
$citrico=$result11->fields["citrico"];



				case "abstinencia":
				document.getElementById("recoleccion").focus();
				break;
				case "recoleccion":
				document.getElementById("eyaculacion").focus();
				break;
				case "eyaculacion":
				document.getElementById("ambiente").focus();
				break;
				case "ambiente":
				document.getElementById("volumen").focus();
				break;
				case "volumen":
				document.getElementById("licuacion").focus();
				break;
				case "licuacion":
				document.getElementById("aspecto").focus();
				break;
				case "aspecto":
				document.getElementById("viscocidad").focus();
				break;
				case "viscocidad":
				document.getElementById("coloracion").focus();
				break;
				case "coloracion":
				document.getElementById("ph").focus();
				break;
				case "ph":
				document.getElementById("mm3").focus();
				break;

				case "mm3":
				document.getElementById("ml").focus();
				break;
				case "ml":
				document.getElementById("desplazamiento_rapido").focus();
				break;
				case "desplazamiento_rapido":
				document.getElementById("desplazamiento_lento").focus();
				break;
				case "desplazamiento_lento":
				document.getElementById("no_progresiva").focus();
				break;
				case "no_progresiva":
				document.getElementById("inmoviles").focus();
				break;
				case "inmoviles":
				document.getElementById("inmoviles_vivos").focus();
				break;
				case "inmoviles_vivos":
				document.getElementById("inmoviles_muertos").focus();
				break;
				case "inmoviles_muertos":
				document.getElementById("otros_elementos").focus();
				break;
				case "otros_elementos":
				document.getElementById("normales").focus();
				break;
				case "normales":
				document.getElementById("anormales").focus();
				break;

				case "anormales":
				document.getElementById("fructuosa").focus();
				break;
				case "fructuosa":
				document.getElementById("citrico").focus();
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

 $sql11="select * from detalle_espermo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);

 $abstinencia=$result11->fields["abstinencia"];
$recoleccion=$result11->fields["recoleccion"];
$eyaculacion=$result11->fields["eyaculacion"];
$ambiente=$result11->fields["ambiente"];
$volumen=$result11->fields["volumen"];
$licuacion=$result11->fields["licuacion"];
$aspecto=$result11->fields["aspecto"];
$viscocidad=$result11->fields["viscocidad"];
$coloracion=$result11->fields["coloracion"];
$ph=$result11->fields["ph"];
$mm3=$result11->fields["mm3"];
$ml=$result11->fields["ml"];
$desplazamiento_rapido=$result11->fields["desplazamiento_rapido"];
$desplazamiento_lento=$result11->fields["desplazamiento_lento"];
$no_progresiva=$result11->fields["no_progresiva"];
$inmoviles=$result11->fields["inmoviles"];
$inmoviles_vivos=$result11->fields["inmoviles_vivos"];
$inmoviles_muertos=$result11->fields["inmoviles_muertos"];
$otros_elementos=$result11->fields["otros_elementos"];
$normales=$result11->fields["normales"];
$anormales=$result11->fields["anormales"];
$fructuosa=$result11->fields["fructuosa"];
$citrico=$result11->fields["citrico"];


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
            <div align="left">DATOS</div>
          </div>            
            <div align="center" class="Estilo12"></div></td>
        </tr>
        <tr>
          <td width="357" bgcolor="#EDEDED"><span class="Estilo12">Abstinencia previa:</span></td>
          <td width="243" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="abstinencia" type="text" id="abstinencia" value="<?php  echo $abstinencia;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "1">
          </span></td>
          <td width="122" bgcolor="#EDEDED">&nbsp;</td>
          <td width="122" bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">M&eacute;todo de recolecci&oacute;n: </span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="recoleccion" type="text" id="recoleccion" value="<?php  echo $recoleccion;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "2">
          </span></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Hora de eyaculaci&oacute;n </span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="eyaculacion" type="text" id="eyaculacion" value="<?php  echo $eyaculacion;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "3">
          </span></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Temperatura ambiente: </span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="ambiente" type="text" id="ambiente" value="<?php  echo $ambiente;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "4">
          </span></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr bgcolor="#999999">
          <td colspan="4"><span class="Estilo12">EXAMEN FISICO </span><span class="Estilo12">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Volumen</span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="volumen" type="text" id="volumen" value="<?php  echo $volumen;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "5">
          </span></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Tiempo de licuaci&oacute;n</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="licuacion" type="text" id="licuacion" value="<?php  echo $licuacion;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "6">
              </div>
          </div></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Aspecto del esperma </span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="aspecto" type="text" id="aspecto" value="<?php  echo $aspecto;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "7">
              </div>
          </div></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Viscocidad</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="viscocidad" type="text" id="viscocidad" value="<?php  echo $viscocidad;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "8">
              </div>
          </div></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Coloraci&oacute;n</span></td>
          <td bgcolor="#EDEDED"><span class="Estilo12">
            <input name="coloracion" type="text" id="coloracion" value="<?php  echo $coloracion;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "9">
          </span></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">pH</span></td>
          <td bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="ph" type="text" id="ph" value="<?php  echo $ph;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "10">
              </div>
          </div></td>
          <td bgcolor="#EDEDED">&nbsp;</td>
          <td bgcolor="#EDEDED">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="4" bgcolor="#999999"><div align="left"><span class="Estilo12">EXAMEN MICROSCOPICO </span></div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Por mm3 </span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="mm3" type="text" id="mm3" value="<?php  echo $mm3;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "11">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">En el total de ml:</span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="ml" type="text" id="ml" value="<?php  echo $ml;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "12">
              </div>
          </div></td>
        </tr>
        <tr>
          <td colspan="4" bgcolor="#999999"><span class="Estilo12">VIAVILIDAD POST-LICUACION </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Mov. traslativos  r&aacute;pidos</span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="desplazamiento_rapido" type="text" id="desplazamiento_rapido" value="<?php  echo $desplazamiento_rapido;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "13">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Mov. traslativos lentos</span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="desplazamiento_lento" type="text" id="desplazamiento_lento" value="<?php  echo $desplazamiento_lento;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "14">
              </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Mov. no progresiva (in situ) </span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="no_progresiva" type="text" id="no_progresiva" value="<?php  echo $no_progresiva;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "15">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Inmoviles</span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="inmoviles" type="text" id="inmoviles" value="<?php  echo $inmoviles;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "16">
          </span></td>
        </tr>
        <tr>
          <td colspan="4" bgcolor="#999999"><span class="Estilo12">TEST DE LA EOSINA </span>            <div align="center" class="Estilo12">
              <div align="left">              </div>
            </div></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Inmoviles vivos </span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="inmoviles_vivos" type="text" id="inmoviles_vivos" value="<?php  echo $inmoviles_vivos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "17">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Inmoviles muertos </span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="inmoviles_muertos" type="text" id="inmoviles_muertos" value="<?php  echo $inmoviles_muertos;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "18">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Otros elementos del esperma: </span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <textarea name="otros_elementos" cols="60" rows="4" id="otros_elementos" tabindex="19" onKeyPress="return verif_caracter(this,event)"><?php  echo $otros_elementos;?>
            </textarea>
          </span></td>
        </tr>
        <tr>
          <td colspan="4" bgcolor="#B8B8B8"><span class="Estilo12">EXAMEN FISICO QUIMICO </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Formas Normales </span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="normales" type="text" id="normales" value="<?php  echo $normales;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "20">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Formas Anormales </span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="anormales" type="text" id="anormales" value="<?php  echo $anormales;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "21">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Dosaje de fructuosa </span></td>
          <td colspan="3" bgcolor="#EDEDED"><span class="Estilo12">
            <input name="fructuosa" type="text" id="fructuosa" value="<?php  echo $fructuosa;?>" size="20" onKeyPress="return verif_caracter(this,event)" tabindex = "22">
          </span></td>
        </tr>
        <tr>
          <td bgcolor="#EDEDED"><span class="Estilo12">Dosaje de Acido Citrico </span></td>
          <td colspan="3" bgcolor="#EDEDED"><div align="center" class="Estilo12">
              <div align="left">
                <input name="citrico" type="text" id="citrico" value="<?php  echo $citrico;?>" size="20"  tabindex = "23">
              </div>
          </div></td>
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
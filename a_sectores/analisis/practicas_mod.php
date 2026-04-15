<script language="javascript">

function on_load()
{
document.getElementById("1").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "1":
				document.getElementById("2").focus();
				break;
				case "2":
				document.getElementById("3").focus();
				break;
				case "3":
				document.getElementById("4").focus();
				break;
				case "4":
				document.getElementById("5").focus();
				break;
				case "5":
				document.getElementById("6").focus();
				break;

				case "6":
				document.getElementById("7").focus();
				break;

				case "7":
				document.getElementById("8").focus();
				break;


				case "8":
				document.getElementById("9").focus();
				break;
				case "9":
				document.getElementById("10").focus();
				break;
				case "10":
				document.getElementById("11").focus();
				break;
				case "11":
				document.getElementById("12").focus();
				break;

				case "12":
				document.getElementById("13").focus();
				break;
				case "13":
				document.getElementById("14").focus();
				break;
				case "14":
				document.getElementById("15").focus();
				break;
				case "15":
				document.getElementById("16").focus();
				break;


				case "17":
				document.getElementById("GUARDAR").focus();
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
.Estilo2 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
<form action="guardar_todos.php" method="post">


<BODY onload = "on_load()">

<table width="850" border="1" cellspacing="0">
  <!--DWLayoutTable-->
   <tr bgcolor="#C5C5C5">
     <td width="81"><div align="center" class="Estilo2">
       <div align="center">ORDENAR</div>
     </div></td>
     <td colspan="2"><div align="center" class="Estilo2">
       <div align="center">PRACTICA</div>
     </div></td>
     <td><div align="center"><span class="Estilo2">Enter</span></div></td>
     <td width="78"><div align="center" class="Estilo2">
       <div align="center">Imprimir</div>
     </div></td>
     <td width="40"><div align="center" class="Estilo2">
       <div align="center">Borrar</div>
     </div></td>
     <td width="72"><div align="center" class="Estilo2">
       <div align="center">ESTADO</div>
     </div></td>
   </tr>


 <input name="cod_grabacion" type="hidden"  value="<?php echo $cod_grabacion;?>"> 
 <input name="nro_paciente" type="hidden"  value="<?php echo $nro_paciente;?>"> 

 <?php 

 //VIENE DE EMISION_MOD.PHP
 
  $sql10="select * from detalle where cod_grabacion = $cod_grabacion order by orden, cod_operacion";
$result10 = $db->Execute($sql10);

if (!$result10) die("fallo".$db->ErrorMsg());
 while (!$result10->EOF) {

 $nro_practica=strtoupper($result10->fields["nro_practica"]);
$imprimir=strtoupper($result10->fields["imprimir"]);
$enter=strtoupper($result10->fields["enter"]);
$cod_operacion1=strtoupper($result10->fields["cod_operacion"]);
$cod_grabacion1=strtoupper($result10->fields["cod_grabacion"]);
$orden =strtoupper($result10->fields["orden"]);


$sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);
$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];
$clase=$result11->fields["clase"];

if ($clase == 4){

include ("complejos1.php");

}else{

if ($nro_practica == 711){include ("practicas/711_orina.php");
}elseif ($nro_practica == 475){include ("practicas/475_hemo.php");
}elseif ($nro_practica == 764){include ("practicas/764_hemoglobina1.php");
}elseif ($nro_practica == 911){include ("practicas/911_urocultivo.php");
}elseif ($nro_practica == 953){include ("practicas/953_widal.php");
}elseif ($nro_practica == 186){include ("practicas/186_coombs.php");
}elseif ($nro_practica == 413){include ("practicas/413_curva.php");
}elseif ($nro_practica == 110){include ("practicas/110_bilirubina.php");
}elseif ($nro_practica == 13){include  ("practicas/13_aglutininas.php");
//}elseif ($nro_practica == 546){include ("practicas/546_iono.php");
}elseif ($nro_practica == 193){include ("practicas/193_clearence.php");
}elseif ($nro_practica == 481){include ("practicas/481_hepatograma.php");
}elseif ($nro_practica == 2734){include ("practicas/2734_antigeno.php");
}elseif ($nro_practica == 136){include ("practicas/136_calcio.php");
}elseif ($nro_practica == 363){include ("practicas/363_fosforo.php");
}elseif ($nro_practica == 654){include ("practicas/654_magnesio.php");
}elseif ($nro_practica == 767){include ("practicas/767_proteinuria.php");
}elseif ($nro_practica == 35){include ("practicas/35_antibiograma.php");
}elseif ($nro_practica == 105){include ("practicas/105_bacteriologico.php");
}elseif ($nro_practica == 931){include ("practicas/931_vaginal.php");
}elseif ($nro_practica == 309){include ("practicas/309_exudado.php");
}elseif ($nro_practica == 903){include ("practicas/903_uretral.php");
}elseif ($nro_practica == 547){include ("practicas/547_iono_urinario.php");//
}elseif ($nro_practica == 171){include ("practicas/171_coagulograma.php");
}elseif ($nro_practica == 736){include ("practicas/736_parasitologico.php");
}elseif ($nro_practica == 615){include ("practicas/615_lipidograma.php");
}elseif ($nro_practica == 408){include ("practicas/408_pmn.php");
}elseif ($nro_practica == 905){include ("practicas/905_uricosuria.php");
}elseif ($nro_practica == 4858){include ("practicas/4858_espermo.php");
}elseif ($nro_practica == 298){include ("practicas/298_espermo_chico.php");
}elseif ($nro_practica == 187){include ("practicas/187_coprocultivo.php");
}else{
include ("practicas/comun.php");
}

}


	
$result10->MoveNext();

	}


?>
<tr><td colspan="7" valign="top" bgcolor="#C5C5C5"><form>
      <div align="center">
        <input type="Submit" name="Submit" id ="GUARDAR" value="GUARDAR">
    </div>
</table>

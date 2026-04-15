<table width="800" border="1" cellspacing="0">

  <?php
include ("../../../conexiones/config.inc.php");
$palabra=$_REQUEST["palabra"];

$requisito=$_REQUEST["requisito"];


if ($palabra == ""){
 $sql="select * from datos_os order by nro_os, localidad_n, denominacion";
} else {
 $sql="select * from datos_os where sigla like '$palabra%' or nro_os like '$palabra%' or denominacion like '%$palabra%' order by localidad_n, denominacion, nro_os";
}
	
$result = $db->Execute($sql);

   if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {
$id=strtoupper($result->fields["nro_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$telefono=strtoupper($result->fields["telefono_n"]);

if ($requisito == 1){
 $sql1="select * from requisitos_os where nro_os = $id";
$result1 = $db->Execute($sql1);


$requisitos=$result1->fields["requisitos"];
$version=$result1->fields["version"];
$suspendido=$result1->fields["suspendido"];
$vigencia=$result1->fields["vigencia"];


 $dia = substr($vigencia,8,2);
 $mes = substr($vigencia,5,2);
 $anio = substr($vigencia,0,4);

 $vigencia = $dia."/".$mes."/".$anio;



$comunes=$result1->fields["comunes"];
$especiales=$result1->fields["alta"];
$alta=$result1->fields["alta"];
$planes=$result1->fields["planes"];
$diagnostico=$result1->fields["diagnostico"];
$info_planes=$result1->fields["info_planes"];
$planes_rechazados=$result1->fields["planes_rechazados"];
$motivo_rechazo=$result1->fields["motivo_rechazo"];

}


if (strlen($telefono) == 7){
$telefono = "4".$telefono;
}

if (strlen($telefono) == 6){
$telefono = "4".$telefono;
}
 if ($telefono == 0){$telefono = "-";}



?>
  <tr>
    <td width="29" bgcolor="#EDEDED"><div align="left"><font color="#000000" size="2" face="Trebuchet MS"><a href="informe_pdf_individual.php?nro_os=<?php print("$id");?>" target  ="central"><?php print("$id");?></a></font></div></td>
    <td width="227" bgcolor="#EDEDED"><div align="left"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$sigla");?></font></div></td>
    <td width="429" valign="middle" bgcolor="#EDEDED"><div align="left"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$denominacion");?></font></div></td>
    <td width="137" valign="top" bgcolor="#EDEDED"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><a href="ficha.php?id=<?php print("$id");?>" target  ="central"><img src="../../../imagenes/office//005.ico" alt="Ficha" border = "0" ></a></font></div></td>
  </tr>
  <tr><td colspan="5" bgcolor="#EDEDED">
  
  <?php  if ($requisitos != ""){?>
          <table width="800" border="1" cellpadding="0" cellspacing="0">
            
            <tr>
              <td colspan="8" bgcolor="#FF6600"><div align="center"><font face="Trebuchet MS"><strong>REQUISITOS</strong></font></div></td>
            </tr>
            <tr>
              <td colspan="2" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">INFORMACION</font></div></td>
              <td width="6%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">VERSION</font></div></td>
              <td width="10%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">VIGENCIA</font></div></td>
              <td width="10%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">COMUNES</font></div></td>
              <td width="11%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">ESPECIALES</font></div></td>
              <td width="8%" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">ALTA</font></div></td>
            </tr>
            <tr>
              <td colspan="2" bgcolor="#FFFF66"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $requisitos;?></font></td>
              <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $version;?></font></div></td>
              <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $vigencia;?></font></div></td>
              <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $comunes;?></font></div></td>
              <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $especiales;?></font></div></td>
              <td bgcolor="#FFFF66"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $alta;?></font></div></td>
            </tr>
          </table>

<?php include ("planes_os.php");?>



    <?php } ?>
  </td>
  </tr>
  <?php 
	$cont = $cont + 1;
	$result->MoveNext();
	}

?>
  <tr bordercolor="#FFFFCC">
    <td colspan="5" bgcolor="#B8B8B8"><font size="2" face="Trebuchet MS">Cantidad de Obras Sociales: <?php echo $cont;?></font></td>
  </tr>
  
</table>

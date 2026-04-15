<table width="728" border="1">
  <?php php 
include("../../conexiones/config.inc.php");

 $archivo = "PAMI_ORDENES.TXT";
 $carpeta = "c:/informes/PAMI/BIOSOFT/";

 if (file_exists($carpeta.$archivo) == true){
unlink ($carpeta.$archivo);
 }


	$a = "MEDIFE.TXT";
	
if (is_uploaded_file($HTTP_POST_FILES['archivo']['tmp_name'])) {
      copy($HTTP_POST_FILES['archivo']['tmp_name'], $a);
      $subio = true;
	 $archiv = $HTTP_POST_FILES['archivo']['tmp_name'];
include("../../conexiones/config.inc.php");
$sql = "TRUNCATE TABLE afiliados_medife";
mysql_query($sql);



 $lines = file('PAMI_ORDENES.TXT');
  
  ?>
  
  
  <?php php 
  foreach ($lines as $line_num => $line) {
         
      $datos = explode(",", $line);

echo $sql2 = "INSERT INTO `pami_ordenes` ( `codbioq` , `nroautored` , `nroafi` , `codpres` , `cantidad` , `matpresc` , `fecpresc` , `fecrea` , `fecauto` , `codseg` , `cod_diag` )  VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]' , '$datos[7]' , '$datos[8]', '$datos[9]' , '$datos[10]')";
 
$result2 = $db_os->Execute($sql2);
$cont = $cont +1;


       } //fin foreach

    }

 $archiv = $HTTP_POST_FILES['archivo']['tmp_name'];
if($subio) {
   
	?><tr>
    <td bgcolor="#C4D7E6"> <div align="center"><span class="Estilo5"><?php php echo "El archivo fue cargado con exito. ";?></span></div></td>
	    <td bgcolor="#C4D7E6"> <div align="center"><span class="Estilo5"><?php php echo "SE CARGARON ".$cont." REGISTROS";?></span></div></td>
  </tr><?php php 
} else {
    ?><!-- <tr>
    <td bgcolor="#C4D7E6">  <div align="center"><span class="Estilo5"><?php php echo "El archivo no cumple con las reglas establecidas";?></span></div></td>
  </tr> --><?php php 

}







$row = 1;





 



//echo $sql = "LOAD DATA INFILE '$archiv' REPLACE INTO TABLE `cuota` FIELDS TERMINATED BY ';'";
?>

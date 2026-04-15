<table width="728" border="1">
  <?php 
include("../../conexiones/config.inc.php");
 // NO FUNCIONA TODAVIA 12-11-2010


 $archivo = "CIMESA.TXT";
 $carpeta = "c:/informes/PADRONES/";

 if (file_exists($carpeta.$archivo) == true){
unlink ($carpeta.$archivo);
 }


	$a = "CIMESA.TXT";


	
if (is_uploaded_file($HTTP_POST_FILES['archiv1']['tmp_name'])) {
      copy($HTTP_POST_FILES['archiv1']['tmp_name'], $a);
      $subio = true;
	 $archiv = $HTTP_POST_FILES['archiv1']['tmp_name'];



EXIT;


include("../../conexiones/config.inc.php");
$sql = "TRUNCATE TABLE afiliados_cimesa";
mysql_query($sql);


echo $sql = "LOAD DATA INFILE '$archiv' INTO TABLE `afiliados_cimesa` FIELDS TERMINATED BY ''";
$result = $db_os->Execute($sql);





 $lines = file('CIMESA.TXT');
  
  ?>
  
  
  <?php 
  foreach ($lines as $line_num => $line) {
         
     ECHO  $datos = explode(" ", $line);

	 ECHO "<BR>";
/*              
echo $datos[0];
echo $datos[1];
echo $datos[2];
echo $datos[3];
echo $datos[4];
echo $datos[5];
echo $datos[6];
echo $datos[7];
echo $datos[8];
echo $datos[9];
echo $datos[10];
echo $datos[11];

*/

echo  $sql2 = "INSERT INTO `afiliados_cimesa` ( `nro_afiliado` , `espacio` , `condicion` , `espacio1` , `plan` )VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]')";
$result2 = $db_os->Execute($sql2);


$cont = $cont +1;


       } //fin foreach

    }

 $archiv = $HTTP_POST_FILES['archiv1']['tmp_name'];
if($subio) {
   
	?><tr>
    <td bgcolor="#C4D7E6"> <div align="center"><span class="Estilo5"><?php echo "El archivo fue cargado con exito. ";?></span></div></td>
	    <td bgcolor="#C4D7E6"> <div align="center"><span class="Estilo5"><?php echo "SE CARGARON ".$cont." REGISTROS";?></span></div></td>
  </tr><?php 
} else {
    ?><!-- <tr>
    <td bgcolor="#C4D7E6">  <div align="center"><span class="Estilo5"><?php echo "El archivo no cumple con las reglas establecidas";?></span></div></td>
  </tr> --><?php 

}







$row = 1;





 



//echo $sql = "LOAD DATA INFILE '$archiv' REPLACE INTO TABLE `cuota` FIELDS TERMINATED BY ';'";
?>

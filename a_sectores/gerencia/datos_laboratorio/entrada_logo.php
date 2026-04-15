<html>
<head>
<title>Upload File To MySQL Database</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.box {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
    border: 1px solid #000000;
}
-->
</style>

<link href="../../../css/fondo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php 
if(isset($_POST['upload']))
{
        $fileName = $_FILES['userfile']['name'];
        $tmpName  = $_FILES['userfile']['tmp_name'];
        $fileSize = $_FILES['userfile']['size'];
        $fileType = $_FILES['userfile']['type'];
        
        $fp = fopen($tmpName, 'r');
        $content = fread($fp, $fileSize);
        $content = addslashes($content);
        fclose($fp);
        
        if(!get_magic_quotes_gpc())
        {
            $fileName = addslashes($fileName);
        }
        

$bdservidor = "localhost";
$bdunombre = "root";
$bdpass = "";
$bdnombre = "laboratorio";


        $connection=mysql_connect("$bdservidor","$bdunombre","$bdpass")
or die("Error conectando a la base de datos");
$db=mysql_select_db("$bdnombre",$connection)
or die ("Error seleccionando la base de datos");
        
        $query = "INSERT INTO upload (name, size, type, content ) ".
                 "VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

        mysql_query($query) or die('Error, query failed');                    
        
        
        echo "<br>File $fileName uploaded<br>";
}        
?>
<table width="750" border="0">
  <tr>
    <td><img src="../../../imagenes/a&#241;adir.jpg" width="846" height="35"></td>
  </tr>
  <tr>
    <td><div align="center">INSERTE LOGO DE </div>      <div align="center">MEDIDAS 5 X 3 CM</div></td>
  </tr>
</table>
<form action="" method="post" enctype="multipart/form-data" name="uploadform">
  <table width="850" border="0" class="box">
    <tr> 
      <td><div align="center">
          <input type="hidden"
name="MAX_FILE_SIZE" value="2000000">
          <input name="userfile"
type="file" class="box" id="userfile">        
          <input name="upload" type="submit" class="box" id="upload" value="Subir">
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>

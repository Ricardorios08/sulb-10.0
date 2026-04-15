<?php 
if(isset($_GET['id']))
{
  $bdservidor = "localhost";
$bdunombre = "root";
$bdpass = "";
$bdnombre = "laboratorio";


    $connection=mysql_connect("$bdservidor","$bdunombre","$bdpass")
or die("Error conectando a la base de datos");
$db=mysql_select_db("$bdnombre",$connection)
or die ("Error seleccionando la base de datos");

    $id      = $_GET['id'];
    $query   = "SELECT name, type, size, content FROM upload WHERE id = '$id'";
    $result  = mysql_query($query) or die('Error, query failed');
    list($name, $type, $size, $content) = mysql_fetch_array($result);

    header("Content-Disposition: attachment; filename=$name");
    header("Content-length: $size");
    header("Content-type: $type");
    echo $content;

    exit;
}

?>
<html>
<head>
<title>Download File From MySQL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php 
$bdservidor = "localhost";
$bdunombre = "root";
$bdpass = "";
$bdnombre = "laboratorio";



$connection=mysql_connect("$bdservidor","$bdunombre","$bdpass")
or die("Error conectando a la base de datos");
$db=mysql_select_db("$bdnombre",$connection)
or die ("Error seleccionando la base de datos");

$query  = "SELECT id, name FROM upload";
$result = mysql_query($query) or die('Error, query failed');
if(mysql_num_rows($result) == 0)
{
    echo "Database is empty <br>";
} 
else
{
    while(list($id, $name) = mysql_fetch_array($result))
    {


?>

    <a href="download.php?id=<?php =$id;?>"><?php =$name;?></a> <br>
<?php         
    }
}
?>




</body>
</html>


 <!DOCTYPE html>
<html>
<head>

<link href="../../menus.css" rel="stylesheet" type="text/css" />
<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />


<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>


<table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">PRACTICAS</div></td>
  </tr>
</table>

<form action="../validacion/buscar_convenida_validacion.php" method="post"  target ="central">



   <?php 
   include("../../conexiones/config.inc.php");

$sql = "SELECT * FROM datos_os where nro_os > 999 order by  sigla, nro_os";
$result = $db->Execute($sql);

echo "<div class='styled-select'>";
echo "<select name=nro_os[] size=1 id =nro_os class ='titulo2' onchange='showUser(this.value)'>";
echo"<option value=''>Seleccione OBRA </option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$nro_os=$result->fields["nro_os"];
$sigla=strtoupper($result->fields["sigla"]);
echo"<option value=$nro_os>$sigla ($nro_os)</option>";
$result->MoveNext();
	}
echo"</select>";
echo"</div>";
?>

<br>


<div id="txtHint"><b></b></div>


<!-- </form> -->
</body>
</html>

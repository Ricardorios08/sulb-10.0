 <!DOCTYPE html>
<html>
<head>
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

<form>



   <?php 
   include("../../conexiones/config.inc.php");

$sql = "SELECT * FROM datos_os where activa = 1 order by  sigla, nro_os";
$result = $db->Execute($sql);

echo "<div class='styled-select'>";
echo "<select name=users size=1 id =nro_os onchange='showUser(this.value)'>";
echo"<option value=''>Seleccione OBRA SOCIAL</option>";

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


</form>
<br>
<div id="txtHint"><b>Person info will be listed here.</b></div>

</body>
</html>

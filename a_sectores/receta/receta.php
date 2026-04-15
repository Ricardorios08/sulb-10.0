<html>
<head>
<script>
function on_load()
{
document.getElementById("apellido").focus();
}



function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}


document.onkeypress = keyPress;

function keyPress(e){
  var x = e || window.event;
  var key = (x.keyCode || x.which);
    if(key == 13 || key == 3){
     //  myFunc1();
     document.yourFormName.submit();
    }
    }



</script>

</head>

<BODY onload = "on_load()">

<form action="guardar_receta.php" method="post">
<input type="text" size="30" onkeyup="showResult(this.value)">
<div id="livesearch"></div>
</form>

</body>
</html> 
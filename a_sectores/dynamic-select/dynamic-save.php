<?php

// Dynamic Select Save
// (c) 2009 Denis Sureau - Xul.fr

if(strpos($_POST, "<")) die("Hacking!");

$counter = 0;
$f = fopen("dynamic-select.txt", "w");
while($url = $_POST["tab".strval($counter) ])
{
    fputs($f, $url."<br>");
    $counter ++;
    if(counter > 96) break;   // something wrong
}
fclose($f);

?>

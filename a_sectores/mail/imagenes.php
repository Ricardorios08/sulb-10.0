<?php

$dir=c:\utiles;
$dr=@opendir($dir);
$i = 0;
$images = array();

while ($file = readdir($dr)) {
$images[$i] = $file;
$i = $i+1;
}

sort($images);
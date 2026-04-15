<?php 
#http://www.lawebdelprogramador.com
$imagen_anchura=460;
$imagen_altura=80;
$fuente_tamano=5;

#crea la imagen
$img=imageCreate($imagen_anchura,$imagen_altura);
#definimos el color negro
$negro=imagecolorallocate($img,0,0,0);
#definimos el color blanco
$blanco=imagecolorallocate($img,255,255,255);

$cadena="http://www.lawebdelprogramador.com";
$pos_vertical=30;
#dibujamos unos rectangulos
$string=imagerectangle($img,2,2,$imagen_anchura-2,$imagen_altura-2,$blanco);
$string=imagerectangle($img,5,5,$imagen_anchura-5,$imagen_altura-5,$blanco);
$string=imagerectangle($img,8,8,$imagen_anchura-8,$imagen_altura-8,$blanco);
#debujamos el texto
$string=imagestring($img,$fuente_tamano,($imagen_anchura-(strlen($cadena)*imagefontwidth($fuente_tamano)))/2,$pos_vertical,$cadena,$blanco);
#mostramos la imagen
echo imagegif($img);
#destruimos la imagen
imagedestroy($img);
?>

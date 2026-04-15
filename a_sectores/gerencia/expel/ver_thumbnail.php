<?php

// OJO, sólo funciona con imagnes en formato JPEG ...

if(isset($_GET['id'])) {

    $conexion=mysql_connect("localhost","root","") or die ("no se ha podido conectar a la BD");
    mysql_select_db("laboratorio") or die ("no se ha podido seleccionar la BD");
    $sql = "SELECT archivo_binario,archivo_tipo,archivo_nombre FROM archivos WHERE id='".$_GET['id']."'";
    $consulta = mysql_query($sql,$conexion);
    $imagen = mysql_result($consulta,0,"archivo_binario");

    // Envio cabeceras al navegador .. se indica que lo "que vá" es una imagen de formato MIME JPEG
    Header ("Content-type: image/jpeg");

    // Generar el thumbnail:

    // Se crea la imagen desde el campo binario de la BD
    $img = imagecreatefromstring($imagen);

    // Tamaño del Thumbanil (de la imagen a generar ..)
    $picsize = 123;
    
    // Se obtienen los datos del ancho y alto de la imagen.
    $new_w = imagesx($img);
    $new_h = imagesy($img);

    // Se calcula la relación alto/ancho
    $aspect_ratio = $new_h / $new_w;
    
    // Se ajusta al nuevo tamaño
    $new_w = $picsize;
    $new_h = abs($new_w * $aspect_ratio);

    // Se crea la mascara de la imagen nueva
    $dst_img = imagecreate($new_w,$new_h);

    // Se copia y reajusta el nuevo tamaño en la nueva imagen.
    imagecopyresized($dst_img,$img,0,0,0,0,$new_w,$new_h,imagesx($img),imagesy($img));

    // Se entrega al buffer de salida (navegador en este caso) la imagen en formato JPEG
    // El tercer parámetro (100) indica la calidad de la imagen: en porcentaje relación calidad/peso imagen.
    imagejpeg($dst_img,'',100);
}

?> 
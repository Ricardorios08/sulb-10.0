<?php 
include("createzip.php");
 
//Esta funcion recursiva para generar la estructura de un directorio en
//un arreglo 
function fun_dir($dir,&$A,$path=0)
{ $d = dir($dir);
  $path=$path?$path:$dir;
  while($df=$d->read()) 
  { if($df=="." || $df=="..")continue;
    if(is_file($d->path.$df))
     { $A[str_replace($path,"",$d->path.$df)]=file_get_contents($d->path.$df);
     }
    else 
     { $A[str_replace($path,"",$d->path.$df)."/"]=""; 
       fun_dir($d->path.$df."/",$A,$path); 
     }
  } $d->close();   
}
 
$cont=array();
fun_dir("img/",$cont);
$cont["generado.txt"]="Zip generado".date("Y-m-d H:i:s");
$data=createzip($cont);
 
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
header("Content-Description: File Transfer"); 
header("Content-Type: application/force-download"); 
header("Content-Length: " . strlen($data)); 
header("Content-Disposition: attachment; filename=demozip.zip"); 
echo $data;
 
?>
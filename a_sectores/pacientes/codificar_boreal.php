<?php
   
$dia= date("d");
$mes = date("m");
$anio = date("Y");

 $hoy = $anio*10000+$mes*100+$dia;

$cadena = "b*o*r*e*a*l*0*1";
$array = explode("*", $cadena);

 $n0 = mi_caracter($array[0]); // a
 $n1 = mi_caracter($array[1]); // b
 $n2 = mi_caracter($array[2]); // b
 $n3 = mi_caracter($array[3]); // b
 $n4 = mi_caracter($array[4]); // b
 $n5 = mi_caracter($array[5]); // b
 $n6 = mi_caracter($array[6]); // b
 $n7 = mi_caracter($array[7]); // b
 $n8 = mi_caracter($array[8]); // b
 $n9 = mi_caracter($array[9]); // b
 $n10 = mi_caracter($array[10]); // b
 $n11 = mi_caracter($array[11]); // b
 $n12 = mi_caracter($array[12]); // b
 $n13 = mi_caracter($array[13]); // b
 $n14 = mi_caracter($array[14]); // b
 $n15 = mi_caracter($array[15]); // b


$contra = $n0.$n1.$n2.$n3.$n4.$n5.$n6.$n7.$n8.$n9.$n10.$n11.$n12.$n13.$n14.$n15;

$terminada =  $hoy + $contra;

$contra_boreal =number_format($terminada,0,'','');

function mi_caracter($caracter){

$caracter1 = $caracter;

switch ($caracter1){
case "A":{$caracter = 21;break;}
case "B":{$caracter = 22;break;}
case "C":{$caracter = 23;break;}
case "a":{$caracter = 25;break;}
case "b":{$caracter = 26;break;}
case "c":{$caracter = 27;break;}
case "D":{$caracter = 31;break;}
case "E":{$caracter = 32;break;}
case "F":{$caracter = 33;break;}
case "d":{$caracter = 35;break;}
case "e":{$caracter = 36;break;}
case "f":{$caracter = 37;break;}
case "G":{$caracter = 41;break;}
case "H":{$caracter = 42;break;}
case "I":{$caracter = 43;break;}
case "g":{$caracter = 45;break;}
case "h":{$caracter = 46;break;}
case "i":{$caracter = 47;break;}
case "J":{$caracter = 51;break;}
case "K":{$caracter = 52;break;}
case "L":{$caracter = 53;break;}
case "j":{$caracter = 55;break;}
case "k":{$caracter = 56;break;}
case "l":{$caracter = 57;break;}
case "M":{$caracter = 61;break;}
case "N":{$caracter = 62;break;}
case "O":{$caracter = 63;break;}
case "m":{$caracter = 65;break;}
case "n":{$caracter = 66;break;}
case "o":{$caracter = 67;break;}
case "P":{$caracter = 71;break;}
case "Q":{$caracter = 72;break;}
case "R":{$caracter = 73;break;}
case "S":{$caracter = 74;break;}
case "p":{$caracter = 75;break;}
case "q":{$caracter = 76;break;}
case "r":{$caracter = 77;break;}
case "s":{$caracter = 78;break;}
case "T":{$caracter = 81;break;}
case "U":{$caracter = 82;break;}
case "V":{$caracter = 83;break;}
case "t":{$caracter = 85;break;}
case "u":{$caracter = 86;break;}
case "v":{$caracter = 87;break;}
case "W":{$caracter = 91;break;}
case "X":{$caracter = 92;break;}
case "Y":{$caracter = 93;break;}
case "Z":{$caracter = 94;break;}
case "w":{$caracter = 95;break;}
case "x":{$caracter = 96;break;}
case "y":{$caracter = 97;break;}
case "z":{$caracter = 98;break;}
case "0":{$caracter = '00';break;}
case "1":{$caracter = 10;break;}
case "2":{$caracter = 20;break;}
case "3":{$caracter = 30;break;}
case "4":{$caracter = 40;break;}
case "5":{$caracter = 50;break;}
case "6":{$caracter = 60;break;}
case "7":{$caracter = 70;break;}
case "8":{$caracter = 80;break;}
case "9":{$caracter = 90;break;}
}


 RETURN $caracter;
}

$caracter = mi_caracter($a);



/*
echo $letra01 = mi_caracter($letra_no[0]); // b
echo $letra02 = mi_caracter($letra_no[1]); // o
echo $letra03 = mi_caracter($letra_no[2]); // r
echo $letra04 = mi_caracter($letra_no[3]); // e
echo $letra05 = mi_caracter($letra_no[4]); // a
echo $letra06 = mi_caracter($letra_no[5]); // l
echo $letra07 = mi_caracter($letra_no[6]); // 0
echo $letra08 = mi_caracter($letra_no[7]); // 1

*/



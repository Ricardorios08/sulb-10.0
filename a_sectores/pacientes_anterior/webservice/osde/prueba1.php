<?PHP
$strRequest = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>
<methodCall>
<methodName>obtenerPorcentajes</methodName>
<params>
<param><value><string>10050410</string></value></param>
<param><value><string>20503214</string></value></param>
<param><value><string>20205032143</string></value></param>
<param><value><string>RODOLFO HUGO PORRAS MIRAVAL</string></value></param>
<param><value><string>WASHINGTON 6444</string></value></param>
<param><value><string>24/09/1968</string></value></param>
</params>
</methodCall>";

$url = "https://aplicaciones.decidir.com/decidir-ar-svi/JavaXmlRpcServer";

$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1) ;
curl_setopt($ch, CURLOPT_POSTFIELDS, $strRequest);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_VERBOSE, 1);

$result = curl_exec($ch);
curl_close($ch);

echo $result;
?> 
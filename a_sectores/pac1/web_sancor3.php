  <?php
 echo "OSPE"; 
echo "<br>";
  $client = new SoapClient('http://wsospeonline.gmssa.com.ar/wsoPadronSAN.asmx?wsdl');
  var_dump($client->__getFunctions());


echo "<br>";
echo "<br>";

   echo "SANCOR";
   echo "<br>";
  $client = new SoapClient('http://x.esancorsalud.com.ar/apawe_ssa.aspx?wsdl');
  var_dump($client->__getFunctions());


echo "<br>";
echo "<br>";

   echo "SANCOR";
   echo "<br>";
  $client = new SoapClient("http://x.esancorsalud.com.ar/apawe_ssa.aspx?wsdl", array('trace' => 1));
$result = $client->SomeFunction();
echo "REQUEST:\n" . $client->__getLastRequest() . "\n";

echo "Otro de SANCOR";
echo "<br>";
  $client = new SoapClient('http://x.esancorsalud.com.ar/apawe_ssa.aspx?wsdl');
  var_dump($client->__getTypes());


  ?>
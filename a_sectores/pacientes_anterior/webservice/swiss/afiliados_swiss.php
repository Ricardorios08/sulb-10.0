 <?php

<?php
$client = new SoapClient("https://canalws.traditum.com/WebService_IA.asmx?wsdl");
$something =  $client->HelloWorld(array());
echo $something->HelloWorldResult;
die();





echo "aca";
?> 
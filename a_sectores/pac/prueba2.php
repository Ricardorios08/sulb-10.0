
<?php
include('lib/nusoap.php');

$soapClient = new SoapClient('http://server.biosoft-online.net:40080/pamimendoza/PamiMendozaAfiliadoConsulta.asmx?WSDL');
       echo '<B>RESPUESTA DE LA CONEXIÓN</B><br>' ;
    print_r($soapClient);

// para obtener las funciones disponibles en el servicio web
    $functions = $soapClient->__getFunctions();
    print_r($functions);  


?>




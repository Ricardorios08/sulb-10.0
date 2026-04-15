<?php
$xml = "<Traditum>
	<Mensaje>
		<Canal>TRIA</Canal>                            
		<SitioEmisor>TRIACMS01</SitioEmisor>          
		<Empresa>BOREAL</Empresa>
		<Receptor>
			<Nombre>BOREAL</Nombre>
			<ID>222023</ID>
			<Tipo>IIN</Tipo>                       
		</Receptor>
		<FechaMsg>
			<Year>9</Year>
			<Mes>12</Mes>
			<Dia>9</Dia>
			<Hora>14</Hora>
			<Minutos>17</Minutos>
			<Seg>55</Seg>
			<Mil>0</Mil>
			<OffSet>0</OffSet>
		</FechaMsg>
		<MsgTipo>                                        
			<Tipo>ZQA</Tipo>
			<Evento>Z02</Evento>                     
			<Estructura>ZQA_Z02</Estructura>     
		</MsgTipo>
		<MsgIdControl>09050616450012345678</MsgIdControl>
		<MsgEntorno>D</MsgEntorno>                       
	</Mensaje>
	<Prestador>
		<PrestadorId>30543364610</PrestadorId>           
		<PrestadorNombre></PrestadorNombre>              
		<PrestadorTipoIdent>CU</PrestadorTipoIdent>     
		<PrestadorProv/>
		<EfectorId>0</EfectorId>
		<EfectorNombre/>
		<EfectorTipoIdent/>
		<EfectorProv/>
		<PrescriptorId>0</PrescriptorId>
		<PrescriptorNombre/>
		<PrescriptorTipoIdent/>
		<PrescriptorProv/>
	</Prestador>
	<Afiliado>
		<AfiliadoNroCredencial>27210045</AfiliadoNroCredencial>  
		<AfiliadoGf>1</AfiliadoGf>                              
		<TipoIdentificador>DU</TipoIdentificador>               
		<AfiliadoNombre></AfiliadoNombre>
		<AfiliadoIVAId/>
		<AfiliadoIVADes/>
		<AfiliadoPlanCod></AfiliadoPlanCod>
		<AfiliadoPlanDes/>
	</Afiliado>
	<Admision>A</Admision>
	<Autorizacion>
		<AutCod></AutCod>
		<AutEstadoId></AutEstadoId>
		<AutObs></AutObs>
		<AutCodAnulacion>0</AutCodAnulacion>
	</Autorizacion>
	<Practicas>
		<Practica>
			<LineaNro>1</LineaNro>
			<SeccionId>1</SeccionId>
			<PracticaId>130102</PracticaId>
			<PracticaItem>5</PracticaItem>
			<PracticaCantSol>4</PracticaCantSol>
			<PracticaCantAprob></PracticaCantAprob>
			<PracticaDes>Nombre de Practica 2</PracticaDes>
			<PracticaCoseguro></PracticaCoseguro>
			<PracticaIdEstado></PracticaIdEstado>
			<PracticaObs></PracticaObs>
			<PracticaPreAutorizacion></PracticaPreAutorizacion>
		</Practica>
		<Practica>
			<LineaNro>2</LineaNro>
			<SeccionId>1</SeccionId>
			<PracticaId>420101</PracticaId>
			<PracticaItem>3</PracticaItem>
			<PracticaCantSol>1</PracticaCantSol>
			<PracticaCantAprob></PracticaCantAprob>
			<PracticaDes>Nombre de Practica 2</PracticaDes>
			<PracticaCoseguro></PracticaCoseguro>
			<PracticaIdEstado></PracticaIdEstado>
			<PracticaObs></PracticaObs>
			<PracticaPreAutorizacion></PracticaPreAutorizacion>
		</Practica>
	</Practicas>
</Traditum>";

try{
header ("Content-Type:text/xml");
require_once('lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);
	
$oSoapClient = new soapclient('http://borealtuc.dyndns.org:8080/Traditum/servlet/atraditum?wsdl');
$aParametros = array("Ingresoxml" => "<?xml version='1.0' encoding='iso-8859-1'?>".$xml);

$result=$oSoapClient->Execute($aParametros);
echo $result->Egresoxml;

}catch(Exception $e){
echo($e);
}
?>
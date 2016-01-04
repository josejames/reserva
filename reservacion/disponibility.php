<?php

$text = "";

//credentials

$hotelId = 14;
$user = "ARPLATA";
$pass = "ArrPo2015";

/*$hotelId = 2;
$user = "demo1014";
$pass = "test1014";*/

//url
$url_web_server = "http://www.hotelero.com.mx:18005/HoteleroWSG/SisHotelReservarWSG.asmx?WSDL";
$url_location = "http://www.hotelero.com.mx:18005/HoteleroWSG/SisHotelReservarWSG.asmx";


try{

//Soap client
$client = new SoapClient($url_web_server, array(
										   'trace'=>true,
								           'exceptions'=>true,
								           'features'=>SOAP_SINGLE_ELEMENT_ARRAYS,
								           'location' => $url_location,
								           'Usuario' => $user, 
								           'Password' => $pass
								        )
        );

//var_dump($client->__getFunctions());


	$message = json_decode($_REQUEST['info'],true);
//var_dump($message);

	$d1 = new DateTime($message['inDate']);
	$d1 = $d1 -> format("c");
	$d2 = new DateTime($message['outDate']);
	$d2 = $d2 -> format("c");

	$GetDisponibilidad = array('HotelID' => $hotelId,
							 'Usuario' => $user,
							 'Password' => $pass,
							  'oReq' => array('FechaEntrada' => $d1,
												'FechaSalida' => $d2,
												'ClaseHabitacion' => intval($message['roomClass']),
												'NumHabs' => 1,
												'Personas' => intval($message['numPersons']),
												'Ninos1' => intval($message['numKids'])
								)
						);


	//var_dump($GetDisponibilidad);
	$result = $client->__soapCall('GetDisponibilidad', array('parameter' => $GetDisponibilidad));
	//$result = $client->__soapCall('GetDisponibilidad', array('fdf' => 2 ,'HotelID' => 2, 'Usuario' => $message['user'], 'Password' => $message['pass'], 'oReq' => $oReq  ) );
	
	
	//To show the request and the response;
	//echo "REQUEST:\n" . $client->__getLastRequest() . "\n\n";
		//echo "REQUEST:\n" . htmlentities($client->__getLastRequest()) . "\n";
	//echo "Response:\n" . $client->__getLastResponse() . "\n\n";
	//var_dump($result);

	
		//This works
	$error = $result -> GetDisponibilidadResult -> ConError;
	$disponibles = $result -> GetDisponibilidadResult -> Disponibles;

	if($error == true){
		//something happend
		$msgError = $result -> GetDisponibilidadResult -> MsgError; //get the message error
		echo "Ocurrio un problema ".$msgError;
	}
	else if($disponibles == false){//the soap request went all good, but theres no disponibility

		echo "No existe disponibilidad para las fechas seleccionadas";

	}
	else if($disponibles == true){
		$tarifa = $result -> GetDisponibilidadResult -> Tarifa;
		$tarifaTotal = $result -> GetDisponibilidadResult -> TotalTarifa;
		//echo or return the values
		echo $tarifa." ".$tarifaTotal;
	}

} catch (SoapFault $fault) {
	echo "Error ".$fault->faultcode." ".$fault->faultstring;
    	//trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
}//end catch

?>
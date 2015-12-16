<?php

$text = "";

//url
$url_web_server = "http://www.hotelero.com.mx:18005/HoteleroWSG/SisHotelReservarWSG.asmx?WSDL";
$url_location = "http://www.hotelero.com.mx:18005/HoteleroWSG/SisHotelReservarWSG.asmx";

//Soap client
$client = new SoapClient($url_web_server, array(
										   'trace'=>true,
								           'exceptions'=>true,
								           'features'=>SOAP_SINGLE_ELEMENT_ARRAYS,
								           'location' => $url_location,
								           'Usuario' => "demo1014", 
								           'Password' => "test1014"
								        )
        );

//var_dump($client->__getFunctions());


	$message = json_decode($_REQUEST['info'],true);
//var_dump($message);

	$d1 = new DateTime($message['inDate']);
	$d1 = $d1 -> format("c");
	$d2 = new DateTime($message['outDate']);
	$d2 = $d2 -> format("c");

	$GetDisponibilidad = array('HotelID' => 2,
							 'Usuario' => $message['user'], 
							 'Password' => $message['pass'],
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
	else if($disponibles == false){//the soap request went all good

		echo "No existe disponibilidad para las fechas seleccionadas";

	}
	else if($disponibles == true){
		$tarifa = $result -> GetDisponibilidadResult -> Tarifa;
		$tarifaTotal = $result -> GetDisponibilidadResult -> TotalTarifa;
		//echo or return the values
		echo $tarifa." ".$tarifaTotal;
	}

	/*$result = objToArray($result);

	echo $result;

	function objToArray($obj=false)  {
    if (is_object($obj))
        $obj= get_object_vars($obj);
    if (is_array($obj)) {
        return array_map(__FUNCTION__, $obj);
    } else {
        return $obj;
    }
    
	}*/



	//http://stackoverflow.com/questions/3780543/how-to-pass-an-array-into-a-php-soapclient-call
	//http://stackoverflow.com/questions/21597364/how-are-date-and-datetime-supposed-to-be-serialized-soap-xml-messages
	// use SOAP::DateTime; my $soap_datetime = ConvertDate($arbitrary_date);
	//http://osarogabriel.blogspot.mx/2014/03/a-complete-php-soap-client-example.html
	//http://stackoverflow.com/questions/13175803/soap-error-missing-parameter-despite-given-arguments
?>
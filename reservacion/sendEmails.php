<?php


//get the data
	$message = json_decode($_REQUEST['info'],true);

//$para      = 'nobody@example.com';
$para      = $message['userEmail'];
$titulo    = 'Reservacion Arroyo de la plata';
$mensaje   = 'Hola desde PHP '.$message['userName'];
$cabeceras = 'From: webmaster@arroyoplata.com' . "\r\n" .
    'Reply-To: webmaster@arroyoplata.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$result = true;
//$result = mail($para, $titulo, $mensaje, $cabeceras);

if ($result == true) {
	echo "Mensaje Enviado";
}
else{
	echo "Error: Mensaje no enviado";
}

?>
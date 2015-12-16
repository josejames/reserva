<html>


	<head>
		<title>Reservaciones</title>

		<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
		<script type="text/javascript" src="js/reservation.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.11.4/jquery-ui.js"></script>


		<!--jqueryUI-->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


		<!-- Date Pickers-->
		<script type="text/javascript">
			$(function() {
	    		$( "#enterDate" ).datepicker();
	    		$( "#departDate").datepicker();
	  		});
		</script>

		<style type="text/css">
			.rcorners2 {
			    border-radius: 25px;
			    border: 2px solid #73AD21;
			    padding: 20px; 
			    width: 400px;
			    /*height: 150px; */
			}
		</style>



	</head>


<body>

<div id="reservationForm" class="rcorners2">

	<h3>Datos de la reservaci&oacute;n</h3>

	<form action="#">

		<p>Arraving Date:
			<input type="text" id="enterDate" />
		</p>

		<p>Departing Date:
			<input type="text" id="departDate"/>
		</p>

		<p>
			Clase de habitaci&oacute;n
			<select id="roomClass">
				<option value="1">STANDARD                      
				<option value="2">SUITE                         
				<option value="3">SUITE KING SIZE               
				<option value="4">STANDARD KING SIZE            
				<option value="5">JR,. SUITE
			</select>
		</p>

		<p>
			N&uacute;mero de Personas
			<input type="text" id="numPersons"/>
		</p>

		<p>
			N&uacute;mero de Ni&ntilde;os
			<input type="text" id="numKids"/>
		</p>

		<p>
			<input type="button" value="Chekar" onclick="getData()">
		</p>

		<div id="message">

		</div>

		
		<div id="continueDiv">
			<p>
				<input type="submit" id="continue" onclick="test()" value="Continuar?" style="display: none;"/>
			</p>

		</div>

	</form>
</div>

</body>


</html>
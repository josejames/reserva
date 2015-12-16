<html>

	<head>
		<title>Reservaciones</title>

		<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
		<script type="text/javascript" src="js/reservation.js"></script>
	
		<style type="text/css">
			.rcorners2 {
			    border-radius: 25px;
			    border: 2px solid #73AD21;
			    padding: 0px 20px; 
			    width: 400px;
			    /*height: 150px; */
			}
		</style>
	</head>


	<body>
			<?php
				if(isset($_REQUEST['resultado'])){
					$tarifa = $_REQUEST['Tarifa'];
					echo "La tarifa es = ".$tarifa;
				}

				if(isset($_POST['x'])){
					$x = $_POST['x'];
					echo "La tarifa es = ".$x;
				}

			?>


	<!-- Reservation form -->
	<div id="reservationForm">
		<fieldset class="rcorners2">
			<legend>Datos de la Reservaci&oacute;n</legend>

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
					<label>N&uacute;mero de Personas</label>
					<input type="text" id="numPersons" maxlength="2" size="2"/>

					<label>N&uacute;mero de Ni&ntilde;os</label>
					<input type="text" id="numKids" maxlength="2" size="2"/>
				</p>


				<div id="message">

				</div>
			</form>
		</fieldset>
	</div>



	<!-- Personal data form -->

	<div id="personalDataForm" >
	
	<fieldset class="rcorners2">
	<legend>Datos Generales</legend>

	<form action="#">

		<p>Nombre:
			<input type="text" id="name" />
		</p>

		<p>Empresa:
			<input type="text" id="company"/>
		</p>

		<p>Cargo:
			<input type="text" id="position"/>
		</p>

		<p>Direcci&oacute;n:
			<input type="text" id="address"/>
		</p>

		<p>Ciudad:
			<input type="text" id="city"/>
		</p>

		<p>
			Estado
			<select id="estate">
				<option value="001">AGUASCALIENTES                          
				<option value="002">BAJA CALIFORNIA NORTE                   
				<option value="003">BAJA CALIFORNIA SUR                     
				<option value="004">CAMPECHE                                
				<option value="007">CHIAPAS                                 
				<option value="008">CHIHUAHUA                               
				<option value="005">COAHUILA                                
				<option value="006">COLIMA                                  
				<option value="009">DISTRITO FEDERAL                        
				<option value="010">DURANGO                                 
				<option value="011">GUANAJUATO                              
				<option value="012">GUERRERO                                
				<option value="013">HIDALGO                                 
				<option value="014">JALISCO                                 
				<option value="015">MEXICO                                  
				<option value="016">MICHOACAN                               
				<option value="017">MORELOS                                 
				<option value="018">NAYARIT                                 
				<option value="019">NUEVO LEON                              
				<option value="020">OAXACA                                  
				<option value="021">PUEBLA                                  
				<option value="022">QUERETARO                               
				<option value="023">QUINTANAROO                             
				<option value="024">SAN LUIS POTOSI                         
				<option value="025">SINALOA                                 
				<option value="026">SONORA                                  
				<option value="027">TABASCO                                 
				<option value="028">TAMAULIPAS                              
				<option value="029">TLAXCALA                                
				<option value="030">VERACRUZ                                
				<option value="031">YUCATAN                                 
				<option value="032">ZACATECAS   
			</select>
		</p>

		<p>
			C&oacute;digo Postal
			<input type="text" id="postecode"/>
		</p>

		<p>
			Tel&eacute;fono
			<input type="text" id="phone"/>
		</p>
		<p>
			Email
			<input type="text" id="email"/>
		</p>


		<div id="message">

		</div>

		<p>
			<input type="submit" value="Submit" onclick="#">
		</p>
	</form>
	</fieldset>
</div>



	</body>

</html>
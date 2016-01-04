$(document).ready(function(){
	jQuery('.numbersOnly').keyup(function () { 
    	this.value = this.value.replace(/[^0-9\.]/g,'');
	});
});


//AJAX

/********************************************************/
/* Function pass data throw pages with post             */
/*                                                      */
/********************************************************/
$.extend(
{
    redirectPost: function(location, args)
    {
        var form = '';
        $.each( args, function( key, value ) {
            form += '<input type="hidden" name="'+key+'" value="'+value+'">';
        });
        $('<form action="'+location+'" method="POST">'+form+'</form>').appendTo('body').submit();
    }
});

/********************************************************/
/* Function to retrieve the data from the in-out        */
/* date form                                            */
/********************************************************/
function getData() {

	var result = verifyData();

	if(result){
	//the data
	var data = {
			numRooms : $("#numRooms").val(),
			inDate : $("#enterDate").val(),
			outDate : $("#departDate").val(),
			roomClass : $("#roomClass").val(),
			numPersons : $("#numPersons").val(),
			numKids : $("#numKids").val()
	}
	//alert("Hola");
	var message="info="+
	         escape(JSON.stringify(data))

	//the Ajax call
	$.post("reservacion/disponibility.php",message,
	        statusDisponibility);
	}
	else{
		$("#message").html("Debes Completar todos los campos :)");
	}
	
}

function statusDisponibility(resultado) {

	    if (resultado.indexOf("Ocurrio") == 0) {
	    	$("#continue").hide();
			alert(resultado);
			//$("#message").html(resultado);//display the error
		} 		 
		else if (resultado.indexOf("No existe") == 0){
			$("#continue").hide();
			alert(resultado);
			 //$("#message").html(resultado);
		}else if(resultado.indexOf("Error") == 0){
			$("#continue").hide();
			alert(resultado);
		}else{
			var s = resultado.split(" ");
			alert("Encontramos habitaciones disponibles!");
			$("#continue").show();
			$("#message").html("");
			$("#message").html("Tarifa por noche = "+s[0]+" Tarifa total = "+s[1]);
			
		}
    
}//end function statusDisponibility

function sendEmail(){

	alert("Seras redireccionado a nuestra pagina de contacto");

	var url = "http://computeczacatecas.com/contacto-3/"; 
	$(location).attr('href',url);

	//
	/*var data = {

		userName : $("#userName").val(),
		userEmail : $("#userEmail").val(),
		userPhone : $("#userPhone").val(),
			inDate : $("#enterDate").val(),
			outDate : $("#departDate").val(),
			roomClass : $("#roomClass").val(),
			numPersons : $("#numPersons").val(),
			numKids : $("#numKids").val()
	}
	//alert("Hola");
	var message="info="+
	         escape(JSON.stringify(data))

	//the Ajax call
	$.post("reservacion/sendEmails.php",message,
	        statusSend);*/
	
}

function statusSend(resultado){
	alert(resultado);
	//$("#message").html(resultado);
}

/********************************************************/
/* Function to verify the data from the reservation     */
/* form                                                 */
/********************************************************/
 function verifyData(){

 	var inDate = $("#enterDate").val();
 	var outDate = $("#departDate").val();
 	var numPersons = $("#numPersons").val();
 	var numKids = $("#numRooms").val();
 	var numKids = $("#numKids").val();

 	if(!inDate){
 		return false;
 	}
 	if(!outDate){
 		return false;
 	}
 	if(!numPersons){
 		return false;
 	}
 	if(!numRooms){
 		return false;
 	}
 	if(!numKids){
 		return false;
 	}


 	return true;
 }
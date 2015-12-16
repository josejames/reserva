/********************************************************/
/* Function to retrieve the data from the in-out        */
/* date form                                            */
/********************************************************/
//AJAX

// jquery extend function
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


function getData() {
	//var campo = document.getElementById("");

	//the data
	var data = {
		user : "demo1014",
		pass : "test1014",
		
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

function statusDisponibility(resultado) {	    
	    if (resultado.indexOf("problema")==1) {
			 //alert(resultado);
			 $("#message").html(resultado);//display the error
		} 		 
		else if (resultado.indexOf("No existe")==1){
			//alert(resultado);
			 $("#message").html(resultado);
		}else{
			var s = resultado.split(" ");

			$("#continue").show();
			$("#message").html("");
			$("#message").html("Tarifa = "+s[0]+" Tarifa total "+s[1]);
			//$.get( "test.php", { data: resultado, time: "2pm" } );
			//var redirect = 'personal_data.php?id=2';
			//$.redirectPost(redirect, {x: 'example', y: 'abc'});
			//$(location).attr('href', 'personal_data.php?'+resultado);
			//jQuery(location).attr('href', 'personal_data.php?'+resultado);
		}
    
}//end function statusDisponibility

function test(){
	alert("Continuar really?");
}
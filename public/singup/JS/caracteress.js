// var form = document.getElementById("form-tweet");
$(document).ready(function(){

	// function contarcaracteres(){
	//  const btn = document.getElementById("tweet-postL");
	// 	var total=140;

		
	// 		var valor=document.getElementById('contador');
	// 		var respuesta=document.getElementById('res');
	// 		var cantidad=valor.value.length;
	// 		document.getElementById('res').innerHTML = cantidad + '/' + (total - cantidad) ;
	// 		if(cantidad>total){
	// 			respuesta.style.color = "red";
	// 			btn.setAttribute('disabled', true);
	// 			return false;
				
	// 		}
	// 		else {
	// 			respuesta.style.color = "black";
	// 			btn.setAttribute('disabled', false);
	// 			return true;
	// 		}
		
		
	// }
	$('#field').keyup(function () {
        countChar(this);
    });
				function countChar(val) {
					
			var len = val.value.length;
			if (len >= 140) {
				val.value = val.value.substring(0, 140);
			} else {
				
				$('#charNum').text(140 - len);
			}
			};


		
		
		// 	$('#tweetpostL').click(function(evt){

		// 	evt.preventDefault();
    
        
		// 	 console.log('test');
		// 	//  var datos=$('#form-tweet').serialize();
		// 	 var formData = new FormData(this.form);

		// console.log(datos);
			// $.ajax({
			// 	type:"POST",
			// 	url:"../../app/controller/post.php",
			// 	data:formData,
			// 	processData: false,
       		// 	contentType: false,
			// 	success: function (reponse){
			// 		if(reponse){
			// 			console.log(reponse);
			// 			alert("tweet sucess")
			// 		}
			// 		else{
			// 			alert("Error tweet")
			// 		}
					
			// 	}
			// });
		   
			// return false;
			
		
		
	}); 


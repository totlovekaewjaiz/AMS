function blockScreen() {
	$('#screen').css(
		{
			'display': 'block', 
			opacity: 0.7, 
			'width':$(document).width(),
			'height':$(document).height()
		}
	);  
}
			
function unblockScreen() {
	$('#screen').css('display', 'none');
}

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

$(function() {
	
	$(".stringAndNumber").keypress(function(event){     
		var ew = event.which;     
		if(ew == 32)         
			return true;     
		if(48 <= ew && ew <= 57)         
			return true;     
		if(65 <= ew && ew <= 90)         
			return true;     
		if(97 <= ew && ew <= 122)         
			return true;     
		return false; 
	}); 

	$(".numberOnly").keypress(function(event){     
		var ew = event.which;     
		if(ew == 32)         
			return true;     
		if(48 <= ew && ew <= 57)         
			return true;       
		return false; 
	}); 

	$(".stringOnly").keypress(function(event){     
		var ew = event.which;     
		if(ew == 32)         
			return true;     
		if(65 <= ew && ew <= 90)         
			return true;     
		if(97 <= ew && ew <= 122)         
			return true;        
		return false; 
	});

	$( "input[type=button],input[type=submit], a, button" ).button();
});



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

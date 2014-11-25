<div class="ui-widget-header title">Disconnected</div>
<div class = "LogoutPopupContent">
<div style = "height:40px;">
<?
	echo $Message;
?>
</div>
<input type='button' value='OK' class = "button" onclick = "logout();"/>
</div>
<script>
	$("#popup").css({
		"width" : "300px",
		"height" : "130px",
		"position" : "absolute",  
		"top": "0px",
		"left": "0px",
		"right": "0px",
		"z-index" : "150",
		"margin-top" : "150px",
		"margin-left" : "auto",
		"margin-right" : "auto"
	});
	
	$(function() {
		$("#popup").draggable();		
		$( "input[type=button],input[type=submit], a, button" ).button();
		blockScreen();
	});
</script>
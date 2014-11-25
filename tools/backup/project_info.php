<style>
textarea {
    resize: none;
}

.ConfigContent div {
	font-weight:bold;
	color:#777777;
	margin-bottom:5px;
}


#ImageSrc {
	width:60px;
	height:60px;
}

#image_storage {
	width:100%;
	height:200px;
	background-color:#FFFFFF;
	border: solid 1px;
	display:none;
	overflow:auto;
}

.icon {
	width:50px;
	height:50px;
	margin:5px;
	cursor:pointer;
}

.icon:hover {
	width:50px;
	height:50px;
	margin:5px;
	cursor:pointer;
	background-color:#0000FF;
}

</style>
<script>
	
	$(function() {	
		$( "input[type=button],input[type=submit], a, button" ).button();
		$("#Start").datepicker();
		$("#End").datepicker();
	});
	
	function cancel() {
		showLoadingPopup();
		loadMenu('<? echo $_SESSION["menu_code"]; ?>');
	}
	
	function save() {
		showLoadingPopup();
		$.post("../ajax/project.php",
			$('#form').serialize()
		, 
		function(data){
			loadMenu('<? echo $_SESSION["menu_code"]; ?>');
		});
	}
	
	function showSelectIcon() {
		$("#image_storage").toggle();
	}
	
	function select( imagePath ) {
		$("#image_storage").hide();
		$("#ImageSrc").attr("src", imagePath);
		$("#ImagePath").val(imagePath);
	}

</script>

<div class = "ConfigContent" style = "padding:10px;">
	<form id = "form">
	<input type = "hidden" id = "action" name = "action" value = "Save" >
	<input type = "hidden" id = "id" name = "id" value = "<? echo $ProjectID; ?>" >	
	
	<div>Project name</div>
	<div><input type = "text" id = "ProjectName" name = "ProjectName" value = "<? echo $ProjectInfo->ProjectName; ?>"  style = "width:200px;" class = "ui-corner-all"></div>	
	<div>Project Description</div>
	<div>
	<textarea id = "ProjectDescription" name = "ProjectDescription"  style = "width:200px;height:120px;" class = "ui-corner-all" resizeable ><? echo $ProjectInfo->ProjectDescription; ?></textarea>
	</div>
	<div>Start Date</div>
	<div><input type = "text" id = "Start" name = "Start" value = "<? echo $ProjectInfo->Start; ?>"  style = "width:200px;" class = "ui-corner-all"></div>	
	<div>End Date</div>
	<div><input type = "text" id = "End" name = "End" value = "<? echo $ProjectInfo->End; ?>"  style = "width:200px;" class = "ui-corner-all"></div>	
	<div>
	<div>Status</div>
	<div>
	<select id = "CurrentStatus" name = "CurrentStatus" class = "ui-corner-all" style = "width:200px;">
	<option value = "1">Check Price</option>
	<option value = "2">Accept Job</option>
	<option value = "3">Close</option>
	<option value = "4">Reject</option>
	</select>
	</div>	
	<?
		if(!empty($ProjectInfo->CurrentStatus)) {
			?>
			<script>$("#CurrentStatus").val("<? echo $ProjectInfo->CurrentStatus; ?>");</script>
			<?
		}
	?>
	<div>
	<input type = "button" value = "Save" class = "button" onclick = "save()">
	<input type = "button" value = "Cancel"  class = "button" onclick = "cancel()">
	</div>
	</form>
</div>

<script>
	$(function() {	
		$( "input[type=button],input[type=submit], a, button" ).button();
		closePopup();		
	});
	
	$(".button").css({
		"width":"100px",
		"font-size":"10px"
	});
</script>

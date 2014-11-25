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
	});
	
	function cancel() {
		showLoadingPopup();
		loadMenu('<? echo $_SESSION["menu_code"]; ?>');
	}
	
	function save() {
		showLoadingPopup();
		$.post("../ajax/project_material.php",
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
	<input type = "hidden" id = "id" name = "id" value = "<? echo $MaterialID; ?>" >	
	
	<div>Material name</div>
	<div><input type = "text" id = "MaterialName" name = "MaterialName" value = "<? echo $MaterialInfo->MaterialName; ?>"  style = "width:200px;" class = "ui-corner-all"></div>		
	<div>Material type</div>
	<div>
	<select id = "MaterialType" name = "MaterialType" class = "ui-corner-all" style = "width:200px;">
	<option value = "Tile">Tile</option>	
	<option value = "Finish">Finish</option>
	<option value = "Ceil">Ceil</option>
	</select>
	</div>
	<script>$("#MaterialType").val("<? echo $MaterialInfo->MaterialType; ?>");</script>
	<div>Material Width</div>
	<div><input type = "text" id = "MaterialWidth" name = "MaterialWidth" value = "<? echo $MaterialInfo->MaterialWidth; ?>"  style = "width:200px;" class = "ui-corner-all"></div>		
	<div>Material Height</div>
	<div><input type = "text" id = "MaterialHeight" name = "MaterialHeight" value = "<? echo $MaterialInfo->MaterialHeight; ?>"  style = "width:200px;" class = "ui-corner-all"></div>		
	<div>Material Long</div>
	<div><input type = "text" id = "MaterialLong" name = "MaterialLong" value = "<? echo $MaterialInfo->MaterialLong; ?>"  style = "width:200px;" class = "ui-corner-all"></div>		
	<div>Project</div>
	<div>
	<?
		for($i =0;$i < count($ProjectArray);$i++) {
			?>
			<div><input type = "checkBox" id = "Project_<? echo $ProjectArray[$i]->id; ?>" name = "ProjectList[]" value = "<? echo $ProjectArray[$i]->id; ?>"> <? echo $ProjectArray[$i]->ProjectName;?></div>			
			<?
		}
	?>
	</div>
	<?	
	
		for($i =0;$i < count($MaterialInfo->ProjectList);$i++) {
			?>
			<script>$("#Project_<? echo $MaterialInfo->ProjectList[$i]; ?>").attr("checked" , "checked");</script>
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

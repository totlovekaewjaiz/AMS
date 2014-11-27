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
		loadMenu('<?php echo $_SESSION["menu_code"]; ?>');
	}
	
	function save() {
		showLoadingPopup();
		$.post("../ajax/project_material.php",
			$('#form').serialize()
		, 
		function(data){
			loadMenu('<?php echo $_SESSION["menu_code"]; ?>');
		});
	}
	
</script>

<div class = "ConfigContent" style = "padding:10px;">
	<form id = "form">
	<input type = "hidden" id = "action" name = "action" value = "Save" >
	<input type = "hidden" id = "id" name = "id" value = "<?php echo $ProjectID; ?>" >	
	
	<table border = '1' style = "border-collapse:collapse;width:80%">
	
	<?php
		for($i =0;$i < count($AllData); $i++) {
			?>
			<tr>
			<td><input type = "checkbox" id = "Material_<?php echo $AllData[$i]->id ?>" name = "MaterialList[]" value = "<?php echo $AllData[$i]->id ?>"></td>
			<td><?php echo $AllData[$i]->MaterialCode ?></td>
			<td><?php echo $AllData[$i]->MaterialName ?></td>
			</tr>
			<?php
		}
	?>
	
	</table>
	
	<?php
		foreach($ProjectInfo->MaterialList as $index => $value) {
			?>
			<script>$("#Material_<?php echo $value; ?>").attr("checked" , true);</script>
			<?php
		}
	?>
	
	<div>&nbsp;</div>
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

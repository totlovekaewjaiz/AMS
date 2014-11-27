<?php require_once("../config/constant.php"); ?>
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
	
	function cancel() {
		showLoadingPopup();
		loadMenu('<?php echo $_SESSION["menu_code"]; ?>');
	}
	
	function save() {
		showLoadingPopup();
		$.post("../ajax/material.php",
			$('#form').serialize()
		, 
		function(data){
			loadMenu('<?php echo $_SESSION["menu_code"]; ?>');
		});
	}
	
	function drop() {
		showLoadingPopup();
		$("#action").val("Delete");
		$.post("../ajax/material.php",
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
	<input type = "hidden" id = "id" name = "id" value = "<?php   echo $MaterialInfo->id; ?>" >	
	
	<div>รหัสวัสดุ</div>
	<div><input type = "text" id = "MaterialCode" name = "MaterialCode" value = "<?php   echo $MaterialInfo->MaterialCode; ?>"  style = "width:200px;" class = "ui-corner-all"></div>			
	<div>ชื่อวัสดุ</div>
	<div><input type = "text" id = "MaterialName" name = "MaterialName" value = "<?php   echo $MaterialInfo->MaterialName; ?>"  style = "width:200px;" class = "ui-corner-all"></div>			
	<div>ประเภทวัสดุ</div>
	<div><select name="MaterialType" style="width:200px;" class = "ui-corner-all">
		<?php
			    $query = "SELECT * FROM material_type";
			    
			    $result = mysql_query($query);

			    while($datas = mysql_fetch_array($result)){
			    	if($MaterialInfo->MaterialType == $datas["type_id"]){
			    		echo '<option value="'.$datas["type_id"].'" selected="selected"> '.$datas["type_name"].'</option>';
			    	}else{
			    		echo '<option value="'.$datas["type_id"].'"> '.$datas["type_name"].'</option>';
			    	}

			    }
		?>
	</select></div>
	<div>กว้าง</div>
	<div><input type = "text" id = "MaterialWidth" name = "MaterialWidth" value = "<?php  echo $MaterialInfo->MaterialWidth; ?>"  style = "width:200px;" class = "ui-corner-all"></div>		
	<div>ยาว</div>
	<div><input type = "text" id = "MaterialHeight" name = "MaterialHeight" value = "<?php  echo $MaterialInfo->MaterialHeight; ?>"  style = "width:200px;" class = "ui-corner-all"></div>		
	<div>ราคา</div>
	<div><input type = "text" id = "MaterialPrice" name = "MaterialPrice" value = "<?php  echo $MaterialInfo->MaterialPrice; ?>"  style = "width:200px;" class = "ui-corner-all"></div>	

	
	<div>
	<input type = "button" value = "Save" class = "button" onclick = "save()">
	<?php
		if(!empty($MaterialID)){
	?>
			<input type = "button" value = "Delete" class = "button" onclick = "drop()">
	<?php
		}
	?>
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

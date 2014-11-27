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
		loadMenu('<?php echo $_SESSION["menu_code"]; ?>');
	}
	
	function save() {
		showLoadingPopup();
		$.post("../ajax/user_account.php",
			$('#form').serialize()
		, 
		function(data){
			loadMenu('<?php echo $_SESSION["menu_code"]; ?>');
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
	
	<?php
		if(empty($Username)) {
			?>
			<div>Username</div>
			<div><input type = "text" id = "Username" name = "Username" value = "<?php echo $AccountInfo->Username;  ?>"  style = "width:200px;" class = "ui-corner-all"></div>	
			<?php
		} else {
			?>
			<div>Username</div>
			<div><input type = "hidden" id = "Username" name = "Username" value = "<?php echo $Username;  ?>" ><?php echo $Username;  ?></div>	
			<?php
		}
	
	?>
	
	
	<div>รหัสผ่าน</div>
	<div><input type = "text" id = "Password" name = "Password" value = ""  style = "width:200px;" class = "ui-corner-all"></div>
	
	<div>ชื่อ</div>
	<div><input type = "text" id = "Firstname" name = "Firstname" value = "<?php  echo $AccountInfo->Firstname;?>"  style = "width:200px;" class = "ui-corner-all"></div>
	
	<div>นามสกุล</div>
	<div><input type = "text" id = "Lastname" name = "Lastname" value = "<?php echo $AccountInfo->Lastname; ?>"  style = "width:200px;" class = "ui-corner-all"></div>
	
	<div>ความสามารถในการเข้าถึงข้อมูล</div>
	<div>
	<?php
		$Menu = $Loader->loadAllMenu();
	
		for($i =0;$i < count($Menu);$i++) {
			$MenuSelected = false;
			for($j = 0; $j < count($AccountInfo->MenuList); $j++ ) {			
				if($AccountInfo->MenuList[$j]["MenuID"] == $Menu[$i]["id"]) { 
					$MenuSelected = true;
				} 
			}
			
			if($MenuSelected) { 
				?>
				<div><input type = "checkbox" id = "Menu_<?php echo $Menu[$i]["id"]; ?>" name = "MenuList[]" value = "<?php echo $Menu[$i]["id"]; ?>" checked > <?php echo $Menu[$i]["MenuName"]; ?></div>
				<?php
			} else {
				?>
				<div><input type = "checkbox" id = "Menu_<?php echo $Menu[$i]["id"]; ?>" name = "MenuList[]" value = "<?php echo $Menu[$i]["id"]; ?>" > <?php echo $Menu[$i]["MenuName"]; ?></div>
				<?php
			}
		}
	?>	
	</div>
	
	<div>
	<input type = "button" value = "สร้างผู้ใช้งาน" class = "button" onclick = "save()">
	<input type = "button" value = "ยกเลิก"  class = "button" onclick = "cancel()">
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

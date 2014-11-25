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
	<input type = "hidden" id = "id" name = "id" value = "<?  ?>" >	
	
	<div>Username</div>
	<div><input type = "text" id = "ProjectName" name = "ProjectName" value = "<?  ?>"  style = "width:200px;" class = "ui-corner-all"></div>	
	
	<div>รหัสผ่าน</div>
	<div><input type = "text" id = "ProjectName" name = "ProjectName" value = "<?  ?>"  style = "width:200px;" class = "ui-corner-all"></div>
	
	<div>ชื่อ</div>
	<div><input type = "text" id = "ProjectName" name = "ProjectName" value = "<?  ?>"  style = "width:200px;" class = "ui-corner-all"></div>
	
	<div>นามสกุล</div>
	<div><input type = "text" id = "ProjectName" name = "ProjectName" value = "<?  ?>"  style = "width:200px;" class = "ui-corner-all"></div>
	
	<div>อีเมลล์</div>
	<div><input type = "text" id = "ProjectName" name = "ProjectName" value = "<?  ?>"  style = "width:200px;" class = "ui-corner-all"></div>
	
	<div>เบอร์โทรศัพท์</div>
	<div><input type = "text" id = "ProjectName" name = "ProjectName" value = "<?  ?>"  style = "width:200px;" class = "ui-corner-all"></div>
	
	<div>ความสามารถในการเข้าถึงข้อมูล</div>
	<div>
	<div><input type = "checkbox" > โครงการ</div>
	<div><input type = "checkbox" > วัสดุที่ใช้</div>
	<div><input type = "checkbox" > วัสดุในโครงการ</div>
	<div><input type = "checkbox" > รายการค่าใช้จ่ายในโครงการ</div>
	<div><input type = "checkbox" > งานในโครงการ</div>
	<div><input type = "checkbox" > งานรื้อถอน </div>
	<div><input type = "checkbox" > งานพื้น</div>
	<div><input type = "checkbox" > งานผนังโครงสร้าง</div>
	<div><input type = "checkbox" > งานผนังตกแต่ง</div>
	<div><input type = "checkbox" > งานฝ้าเพดาน</div>
	<div><input type = "checkbox" > งานประตู</div>
	<div><input type = "checkbox" > แสดง</div>
	<div><input type = "checkbox" > ผู้ใช้งาน</div>
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

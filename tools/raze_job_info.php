<style>
	th {
		background-color:#CCCCCC;
	}
	
	tr {
		font-family:arial;
		font-size:10px;
		font-weight:bold;
		cursor:pointer;
	}
	
	tr:hover {
		background-color:#EEEEFF;
	}
	
	.tableRow {
		background-color:#FFEEFF
	}
	
	table{ 
		margin-top:10px;
	}
	
</style>	
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
		loadMenu('<?php echo $_SESSION["menu_code"]; ?>');
	}
	
	function addTable() {
		var CurrentData = $("#tableCntent").html();
		CurrentData+= 
		"<tr>" +
		"<td><input type = 'text' style = 'width:100px;' value = ''></td>" + 
		"<td><input type = 'text' style = 'width:100px;' value = ''></td>" +
		"<td><input type = 'text' style = 'width:100px;' value = ''></td>" +
		"</tr>";
		
		
		$("#tableCntent").html(CurrentData);
	}

</script>

<div class = "ConfigContent" style = "padding:10px;">
	<form id = "form">
	<input type = "hidden" id = "action" name = "action" value = "Save" >
	<input type = "hidden" id = "id" name = "id" value = "<?php  ?>" >	
	
	<div>อาคารพญาไทยพลาซ่า</div>
	<div>งานรื้อถอน</div>
	
	<div>
	<input type = "button" value = "เพิ่มรายการ" class = "button" onclick = "addTable()">
	</div>
	<div>&nbsp;</div>
	<table border = '1' style = "border-collapse:collapse;width:80%" id = "tableCntent" >
	<tr>
	<th>รายการงาน</th>
	<th>จำนวน</th>
	<th>ค่าแรง</th>
	</tr>
	<div >
	<tr>
	<td><input type = "text" style = "width:100px;" value = "รื้อถอนประตู"></td>
	<td><input type = "text" style = "width:100px;" value = "1"></td>
	<td><input type = "text" style = "width:100px;" value = "20000"></td>
	</tr>
	</div>
	</table>
	<div>&nbsp;</div>
	<div>
	<input type = "button" value = "บันทึก" class = "button" onclick = "save()">
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

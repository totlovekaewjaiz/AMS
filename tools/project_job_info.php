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
		$.post("../ajax/project_job.php",
			$('#form').serialize()
		, 
		function(data){
			loadMenu('<?php echo $_SESSION["menu_code"]; ?>');
		});
	}
	
	function drop() {
		$("#action").val("delete");
		showLoadingPopup();
		$.post("../ajax/project_job.php",
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
	<input type = "hidden" id = "id" name = "id" value = "<?php echo $JobID; ?>" >	
	
	<div>โครงการ</div>
	<div>
	<select id = "ProjectID" name = "ProjectID">
	<?php
		$AllData = $Loader->loadAllProject();
		for($i =0; $i < count($AllData); $i++) {
			?>
			<option value = "<?php echo $AllData[$i]->id;?>"><?php echo $AllData[$i]->ProjectName;?></option>
			<?php
		}

	?>
	</select>
	<script>$("#ProjectID").val("<?php echo $JobInfo->ProjectID; ?>");</script>
	</div>
	
	<div>ประเภทงาน</div>
	<div>
	<select id = "JobType" name = "JobType">
	<option value = "1">งานรื้อถอน</option>
	<option value = "2">งานพื้น</option>
	<option value = "3">งานฝ้าเพดาน</option>
	<option value = "4">งานผนังโครงสร้าง</option>
	<option value = "5">งานผนังตกแต่ง</option>
	<option value = "6">งานประตู</option>
	</select>
	</div>
	<script>$("#JobType").val("<?php echo $JobInfo->JobType; ?>");</script>
	<div>รหัสงาน</div>
	<div><input type = "text" id = "JobName" name = "JobName" value = "<?php  echo $JobInfo->JobName; ?>"  style = "width:200px;" class = "ui-corner-all"></div>			
	<div>รายการ</div>
	<div>
	<textarea style = "width:300px;height:100px;" id = "JobDescription" name = "JobDescription"><?php  echo $JobInfo->JobDescription; ?></textarea>
	</div>		
		
	
	
	<div>
	<input type = "button" value = "Save" class = "button" onclick = "save()">
	<?php
		if(!empty($JobID)) {
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

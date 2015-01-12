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
		$("#action").val("Save");
		$.post("../ajax/floor_job.php",
			$('#form').serialize()
		, 
		function(data){
			$("#imageResult").html(data);
			loadMenu('<?php echo $_SESSION["menu_code"]; ?>');
		});
	}
	
	function showImage() {
		$("#imageResult").html("");
		$("#action").val("getImageInfo");
		$.post("../ajax/floor_job.php",
			$('#form').serialize()
		, 
		function(data){	
			var success 	= data.split('Net Total material = ');
			var str			= success[1];
			var numberStr   = (str.length)-6;
			var	result 		= str.substr(0,numberStr);
			$('#ReserveValue').val(result);
			$("#imageResult").html(data);
		});
	}	
	
	function loadObjectDetailInfo() {
		$.post("../ajax/floor_job.php",
			{
				"action" : "loadObjectDetailInfo",
				"NumObject" : $("#ObjectWall").val()
			}
		, 
		function(data){		
			$("#ObjectDetail").html(data);
		});
	}
	
	function LoadProjectMaterial( projectID , materialSelect) {
		$.post("../ajax/floor_job.php",
			{
				"action" : "LoadProjectMaterial",
				"ProjectID" : projectID , 
				"materialSelect" : materialSelect 
			}
		, 
		function(data){		
			$("#Material").html(data);
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
<?php 
	/*echo '<pre>';
	print_r($FloorInfo);
	echo '</pre>';*/
?>
<div class = "ConfigContent" style = "padding:10px;">
	<form id = "form">
	<input type = "hidden" id = "action" name = "action" value = "getImageInfo" >
	<input type = "hidden" id = "JobID" name = "JobID" value = "<?php echo $JobID; ?>" >	
	<input type = "hidden" id = "JobType" name = "JobType" value = "1" >	
	<input type = "hidden" id = "FloorID" name = "FloorID" value = "<?php echo $FloorInfo->FloorID; ?>" >	


	<div style = "width:30%;height:auto;float:left;">
	<div>Project</div>
	<div>
	<select id = "ProjectID" name = "ProjectID" class = "ui-corner-all" style = "width:200px;" onchange = "LoadProjectMaterial( this.value , '')">
	<option value = "">Select Project</option>
	<?php
		for($i =0;$i < count($ProjectArray);$i++) {
			?>
			<option value = "<?php echo $ProjectArray[$i]->id;?>"><?php echo $ProjectArray[$i]->ProjectName;?></option>
			<?php
		}
	?>
	</select>
	</div>
	
	<div>Job name</div>
	<div><input type = "text" id = "JobName" name = "JobName" value = "<?php echo $JobInfo->JobName; ?>"  style = "width:200px;" class = "ui-corner-all"></div>		
	
	<div>Width</div>
	<div><input type = "text" id = "widthEstimate" name = "widthEstimate" value = "<?php echo $FloorInfo->widthEstimate; ?>"  style = "width:200px;" class = "ui-corner-all"  ></div>		
	
	<div>Long</div>
	<div><input type = "text" id = "longEstimate" name = "longEstimate" value = "<?php echo $FloorInfo->longEstimate; ?> "  style = "width:200px;" class = "ui-corner-all"  ></div>
	
	<div>Start Point X</div>
	<div><input type = "text" id = "StartPointX" name = "StartPointX" value = " <?php echo $FloorInfo->StartPointX; ?>"  style = "width:200px;" class = "ui-corner-all"  ></div>	
	
	<div>Start Point Y</div>
	<div><input type = "text" id = "StartPointY" name = "StartPointY" value = "<?php echo $FloorInfo->StartPointY; ?>"  style = "width:200px;" class = "ui-corner-all"  ></div>	
	
	<div>Material</div>
	<div>
	<select id = "MaterialID" name = "MaterialID" class = "ui-corner-all" style = "width:200px;">
	<option value = "">Select Material</option>
	<?php	
		$AllData = $Loader->loadAllMaterial();
		for($i =0;$i < count($AllData); $i++) {
			if($AllData[$i]->id == $FloorInfo->MaterialID){
			?>
			<option value  = "<?php echo $AllData[$i]->id ?>" selected="selected" ><?php echo $AllData[$i]->MaterialName ?></option>
			<?php
			}else{
			?>
				<option value  = "<?php echo $AllData[$i]->id ?>" ><?php echo $AllData[$i]->MaterialName ?></option>
			<?php 
			}
			?>
			
			<?php
		}
	?>
	</select>
	</div>
	
	<div>ObjectWall</div>
	<div><input type = "text" id = "ObjectWall" name = "ObjectWall" value = "<?php echo $FloorInfo->ObjectWall; ?>"  style = "width:200px;" class = "ui-corner-all" onblur = "loadObjectDetailInfo()"></div>	
	
	<div id = "ObjectDetail">
	
	</div>
	<div>Reserve ( % )</div>
	<div><input type="input" style = "width:200px;" class = "ui-corner-all" name="ReservePercent" id="ReservePercent" value="<?php echo $FloorInfo->ReservePercent; ?>"/></div>
	<div>Reserve ( Value )</div>
	<div><input type="input" style = "width:200px;" class = "ui-corner-all" name="ReserveValue" id="ReserveValue" value="<?php echo $FloorInfo->ReserveValue; ?>"/></div>
	</div>
	<div style = "width:70%;height:500px;float:left;overflow:auto;">
	<div id = "imageResult">
	<?php 
	if($FloorInfo->FloorID){
		include_once('ShowImg.php');
	}
	?>
	</div>
	</div>
	
	<div>
	<input type = "button" value = "Preview" class = "button" onclick = "showImage()">
	<input type = "button" value = "Save" class = "button" onclick = "save()">
	<input type = "button" value = "Cancel"  class = "button" onclick = "cancel()">
	</div>
	
	</form>
</div>

<script>
	$(function() {	
		$( "input[type=button],input[type=submit], a, button" ).button();
		<?php
			if(!empty($JobInfo->ProjectID)) {
				?>
				$("#ProjectID").val("<?php echo $JobInfo->ProjectID; ?>");
				<?php
				if(!empty($JobInfo->FloorJobList["Material"])) {
					?>
					LoadProjectMaterial( "<?php echo $JobInfo->ProjectID; ?>" , "<?php echo $JobInfo->FloorJobList["Material"]; ?>");
					<?php
				}
			}
		?>		
		closePopup();		
	});
	
	$(".button").css({
		"width":"100px",
		"font-size":"10px"
	});
</script>


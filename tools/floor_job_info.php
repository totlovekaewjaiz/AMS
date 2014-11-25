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
		$("#action").val("saveJobInfo");
		$.post("../ajax/floor_job.php",
			$('#form').serialize()
		, 
		function(data){
			$("#imageResult").html(data);
			loadMenu('<? echo $_SESSION["menu_code"]; ?>');
		});
	}
	
	function showImage() {
		$("#imageResult").html("");
		$("#action").val("getImageInfo");
		$.post("../ajax/floor_job.php",
			$('#form').serialize()
		, 
		function(data){		
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

<div class = "ConfigContent" style = "padding:10px;">
	
	<form id = "form">
	<input type = "hidden" id = "action" name = "action" value = "getImageInfo" >
	<input type = "hidden" id = "id" name = "id" value = "<? echo $JobID; ?>" >	
	<input type = "hidden" id = "JobType" name = "JobType" value = "1" >	
	
	<div style = "width:30%;height:auto;float:left;">
	<div>Project</div>
	<div>
	<select id = "ProjectID" name = "ProjectID" class = "ui-corner-all" style = "width:200px;" onchange = "LoadProjectMaterial( this.value , '')">
	<option value = "">Select Project</option>
	<?
		for($i =0;$i < count($ProjectArray);$i++) {
			?>
			<option value = "<? echo $ProjectArray[$i]->id;?>"><? echo $ProjectArray[$i]->ProjectName;?></option>
			<?
		}
	?>
	</select>
	</div>
	
	<div>Job name</div>
	<div><input type = "text" id = "JobName" name = "JobName" value = "<? echo $JobInfo->JobName; ?>"  style = "width:200px;" class = "ui-corner-all"></div>		
	
	<div>Width</div>
	<div><input type = "text" id = "Width" name = "Width" value = " "  style = "width:200px;" class = "ui-corner-all"  ></div>		
	
	<div>Long</div>
	<div><input type = "text" id = "Long" name = "Long" value = " "  style = "width:200px;" class = "ui-corner-all"  ></div>
	
	<div>Start Point X</div>
	<div><input type = "text" id = "StartX" name = "StartX" value = " "  style = "width:200px;" class = "ui-corner-all"  ></div>	
	
	<div>Start Point Y</div>
	<div><input type = "text" id = "StartY" name = "StartY" value = ""  style = "width:200px;" class = "ui-corner-all"  ></div>	
	
	<div>Material</div>
	<div>
	<select id = "Material" name = "Material" class = "ui-corner-all" style = "width:200px;">
	<option value = "">Select Material</option>
	<?	
		$AllData = $Loader->loadAllMaterial();
		for($i =0;$i < count($AllData); $i++) {
			?>
			<option value  = "<? echo $AllData[$i]->id ?>" ><? echo $AllData[$i]->MaterialName ?></option>
			<?
		}
	?>
	</select>
	</div>
	
	<div>ObjectWall</div>
	<div><input type = "text" id = "ObjectWall" name = "ObjectWall" value = ""  style = "width:200px;" class = "ui-corner-all" onblur = "loadObjectDetailInfo()"></div>	
	
	<div id = "ObjectDetail">
	
	</div>
	
	
	</div>
	<div style = "width:70%;height:500px;float:left;overflow:auto;">
	<div id = "imageResult">
	
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
		<?
			if(!empty($JobInfo->ProjectID)) {
				?>
				$("#ProjectID").val("<? echo $JobInfo->ProjectID; ?>");
				<?
				if(!empty($JobInfo->FloorJobList["Material"])) {
					?>
					LoadProjectMaterial( "<? echo $JobInfo->ProjectID; ?>" , "<? echo $JobInfo->FloorJobList["Material"]; ?>");
					<?
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

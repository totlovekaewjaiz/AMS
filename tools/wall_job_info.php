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
		//showLoadingPopup();
		if(checkHeight()) {
			$("#action").val("Save");
			$.post("../ajax/wall_job.php",
				$('#form').serialize()
			, 
			function(data){
				//$("#result").html(data);
				loadMenu('<? echo $_SESSION["menu_code"]; ?>');
			});
		} else {
			alert("All Slot Height not Equal Wall Height");
		}
	}	
	
	function LoadNumwallInfo( NumWall ) {
		$.post("../ajax/wall_job.php",
			{
				"action" : "LoadNumwallInfo",
				"NumWall" : NumWall
			}
		, 
		function(data){		
			$("#WallInfo").html(data);
		});
	}
	
	function loadSlotInfo( WallSlot ) {
		$.post("../ajax/wall_job.php",
			{
				"action" : "LoadNumSlotInfo",
				"WallSlot" : WallSlot , 
				"ProjectID" : $('#ProjectID').val()
			}
		, 
		function(data){					
			$("#SlotInfo").html(data);
		});
	}
	
	function setAllHeight(Slot) {
		$('.slotHeight').val( $("#Height_" + Slot ).val() );
	}

	function setAllMaterial(Slot) {
		$('.finishInfo').val( $("#Finish_" + Slot ).val() );
	}
	
	function checkHeight() {
		var AllHight = 0;
		
		for( i = 0; i < $('#Slot').val(); i ++ ) {
			AllHight+= parseInt($("#Height_" + i ).val());
		}
		
		if(AllHight != $('#Height').val() ) {
			return false;
		} else {
			return true;
		}
	}
	
</script>

<div class = "ConfigContent" style = "padding:10px;">
	<div id = "result"></div>
	<form id = "form">
	<input type = "hidden" id = "action" name = "action" value = "getImageInfo" >
	<input type = "hidden" id = "id" name = "id" value = "<? echo $JobID; ?>" >	
	<input type = "hidden" id = "JobType" name = "JobType" value = "2" >	
	
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
		
	<hr/>
	<div style = "border:solid;1px;padding:3px;margin:3px;">
	<div>Height</div>
	<div>
	<input class = "wallHeight" type = "text" id = "Height" name = "Height" value = "<? echo $JobInfo->WallJobList["Height"]; ?>"  style = "width:200px;" class = "ui-corner-all"  >	
	</div>		
			
	<div>Width</div>
	<div>
	<input class = "wallWidth" type = "text" id = "Width" name = "Width" value = "<? echo $JobInfo->WallJobList["Width"]; ?>"  style = "width:200px;" class = "ui-corner-all"  >	
	</div>
			
	<div>Num Slot</div>
	<div>
	<input class = "numSlot" type = "text" id = "Slot" name = "Slot" value = "<? echo $JobInfo->WallJobList["Slot"]; ?>"  style = "width:200px;" class = "ui-corner-all"  onchange = "loadSlotInfo( this.value );" >	
	</div>	
		
	<div id = "SlotInfo">
	<?
		$MaterialArray = $Loader->loadAllProjectMaterial($JobInfo->ProjectID );
		$MaterialType = "Finish";
		
		if(!empty($JobInfo->WallJobList["Slot"])) {
			for($i =0;$i < $JobInfo->WallJobList["Slot"] ;$i++) {
				?>
				<hr/>
				<div style = "text-align:center">Slot <? echo $i; ?></div>
				<hr/>
				<div>Height</div>
				<div>
				<input class = "slotHeight" type = "text" id = "Height_<? echo $i; ?>" name = "SlotHeight[]" value = "<? echo $JobInfo->WallJobList["slotHeight"][$i]; ?>"  style = "width:200px;" class = "ui-corner-all"  >
				<input type = "button"  onclick = "setAllHeight('<? echo $i; ?>');" value = "All" > 
				</div>					
				
				<div id = "AreaInfo_<? echo $i; ?>" ></div>
				
				<div>Material</div>
				<div>
				<select class = "finishInfo" id = "Finish_<? echo $i; ?>" name = "SlotFinish[]" style = "width:200px;" >
				<?
					
					
					for($j = 0;$j < count($MaterialArray);$j++) {
						if( $MaterialArray[$j]->MaterialType == $MaterialType) {
						
							if($MaterialArray[$j]->id == $JobInfo->WallJobList["SlotFinish"][$i]) {
								?>
								<option value = "<? echo $MaterialArray[$j]->id;?>" selected ><? echo $MaterialArray[$j]->MaterialName;?></option>
								<?
							} else {
								?>
								<option value = "<? echo $MaterialArray[$j]->id;?>"><? echo $MaterialArray[$j]->MaterialName;?></option>
								<?
							}
						}
					}
				
				?>			
				</select>
				<input type = "button"  onclick = "setAllMaterial('<? echo $i; ?>');" value = "All"> 
				</div>					
				<?			
			}
		}
	?>	
	</div>
	</div>
	
	
	
	<div class = "buttonMenu">
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
			}
		?>
		closePopup();		
	});
	
	$(".button").css({
		"width":"100px",
		"font-size":"10px"
	});
</script>

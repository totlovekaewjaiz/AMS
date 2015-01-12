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
		//showLoadingPopup();
		//if(checkHeight()) {
			$("#action").val("Save1");
			$.post("../ajax/wall_job.php",
				$('#form').serialize()
			, 
			function(data){
				//$("#result").html(data);
				loadMenu('<?php echo $_SESSION["menu_code"]; ?>');
			});
		// } else {
		// 	alert("All Slot Height not Equal Wall Height");
		// }
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
	<input type = "hidden" id = "JobID" name = "JobID" value = "<?php echo $JobID; ?>" >	
	<input type = "hidden" id = "JobType" name = "JobType" value = "5" >	
	<input type = "hidden" id = "WallID" name = "WallID" value = "<?php echo $WallInfo->WallID; ?>" >
	
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
		
	<hr/>
	<div style = "border:solid;1px;padding:3px;margin:3px;">
	<div>Height</div>
	<div>
	<input class = "wallHeight" type = "text" id = "Height" name = "Height" value = "<?php echo $WallInfo->Height; //$JobInfo->WallJobList["Height"]; ?>"  style = "width:200px;" class = "ui-corner-all"  >	
	</div>		
			
	<div>Width</div>
	<div>
	<input class = "wallWidth" type = "text" id = "Width" name = "Width" value = "<?php echo $WallInfo->Width; //$JobInfo->WallJobList["Width"]; ?>"  style = "width:200px;" class = "ui-corner-all"  >	
	</div>
			
	<div>Num Slot</div>
	<div>
	<input class = "numSlot" type = "text" id = "Slot" name = "Slot" value = "<?php echo $WallInfo->Slot; //$JobInfo->WallJobList["Slot"]; ?>"  style = "width:200px;" class = "ui-corner-all"  onchange = "loadSlotInfo( this.value );" >	
	</div>	
		
	<!--<div id = "SlotInfo">
	<?php
		$MaterialArray = $Loader->loadAllProjectMaterial($JobInfo->ProjectID );
		$MaterialType = "Finish";
		
		if(!empty($JobInfo->WallJobList["Slot"])) {
			for($i =0;$i < $JobInfo->WallJobList["Slot"] ;$i++) {
				?>
				<hr/>
				<div style = "text-align:center">Slot <?php echo $i; ?></div>
				<hr/>
				<div>Height</div>
				<div>
				<input class = "slotHeight" type = "text" id = "Height_<?php echo $i; ?>" name = "SlotHeight[]" value = "<?php echo $JobInfo->WallJobList["slotHeight"][$i]; ?>"  style = "width:200px;" class = "ui-corner-all"  >
				<input type = "button"  onclick = "setAllHeight('<?php echo $i; ?>');" value = "All" > 
				</div>					
				
				<div id = "AreaInfo_<?php echo $i; ?>" ></div>
				
				<div>Material</div>
				<div>
				<select class = "finishInfo" id = "Finish_<?php echo $i; ?>" name = "SlotFinish[]" style = "width:200px;" >
				<?php
					
					
					for($j = 0;$j < count($MaterialArray);$j++) {
						if( $MaterialArray[$j]->MaterialType == $MaterialType) {
						
							if($MaterialArray[$j]->id == $JobInfo->WallJobList["SlotFinish"][$i]) {
								?>
								<option value = "<?php echo $MaterialArray[$j]->id;?>" selected ><?php echo $MaterialArray[$j]->MaterialName;?></option>
								<?php
							} else {
								?>
								<option value = "<?php echo $MaterialArray[$j]->id;?>"><?php echo $MaterialArray[$j]->MaterialName;?></option>
								<?php
							}
						}
					}
				
				?>			
				</select>
				<input type = "button"  onclick = "setAllMaterial('<?php echo $i; ?>');" value = "All"> 
				</div>					
				<?php			
			}
		}
	?>	
	</div>
	</div>
	-->
	
	
	<div class = "buttonMenu">
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
			}
		?>
		closePopup();		
	});
	
	$(".button").css({
		"width":"100px",
		"font-size":"10px"
	});
</script>

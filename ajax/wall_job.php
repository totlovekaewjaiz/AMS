<?
	require_once("../config/constant.php");
	require_once("../library/login_check.php");

	$action = $_POST["action"];

	if($action == "changePage") {
		
		$JobID = $_POST["id"];
		$JobInfo = new Job($JobID , $db);
		$ProjectArray = $Loader->loadAllActiveProject();
		
		include("../tools/wall_job_info.php");
	}
	
	if($action == "Save") {
		
		$id = $_POST["id"];
		$ProjectID = $_POST["ProjectID"];
		$JobName = $_POST["JobName"];
		$JobType = $_POST["JobType"];
		$Height = $_POST["Height"];
		$Width = $_POST["Width"];
		$Slot = $_POST["Slot"];
		
		$SlotHeight = $_POST["SlotHeight"];
		$SlotFinish = $_POST["SlotFinish"];
		
		print_r($_POST);
		
		$Job = new Job( "" , $db);
		$Job->id = $id;
		$Job->ProjectID = $ProjectID;
		$Job->JobName = $JobName;
		$Job->JobType = $JobType;
		$Job->CreatedBy = $Account->Username;
		
		$Job->WallJobList["Height"] = $Height;
		$Job->WallJobList["Width"] = $Width;
		$Job->WallJobList["Slot"] = $Slot;
		$Job->WallJobList["SlotHeight"] = $SlotHeight;
		$Job->WallJobList["SlotFinish"] = $SlotFinish;
		
		$Job->saveWallJobInfo();
	}

	
	if($action == "LoadNumSlotInfo") {
		$Slot = $_POST["WallSlot"];		
		$ProjectID = $_POST["ProjectID"];
		$MaterialType = "Finish";
		$MaterialArray = $Loader->loadAllProjectMaterial($ProjectID );
		
		
		for($i =0;$i < $Slot;$i++) {
			?>
			<hr/>
			<div style = "text-align:center">Slot <? echo $i; ?></div>
			<hr/>
			<div>Height</div>
			<div>
			<input class = "slotHeight" type = "text" id = "Height_<? echo $i; ?>" name = "SlotHeight[]" value = ""  style = "width:200px;" class = "ui-corner-all"  >
			<input type = "button"  onclick = "setAllHeight('<? echo $i; ?>');" value = "All" > 
			</div>					
			
			<div id = "AreaInfo_<? echo $i; ?>" ></div>
			
			<div>Material</div>
			<div>
			<select class = "finishInfo" id = "Finish_<? echo $i; ?>" name = "SlotFinish[]" style = "width:200px;" >
			<?
				for($j = 0;$j < count($MaterialArray);$j++) {
					if( $MaterialArray[$j]->MaterialType == $MaterialType) {
						?>
						<option value = "<? echo $MaterialArray[$j]->id;?>"><? echo $MaterialArray[$j]->MaterialName;?></option>
						<?
					}
				}
			
			?>			
			</select>
			<input type = "button"  onclick = "setAllMaterial('<? echo $i; ?>');" value = "All"> 
			</div>			
			<script>
				$( "input[type=button],input[type=submit], a, button" ).button();
			</script>
			<?			
		}
	}
	
	if($action == "LoadFinishInfo") {
		$FinishType = $_POST["FinishType"];
		$SlotNum = $_POST["SlotNum"];
		$WallNum = $_POST["WallNum"];
		
		switch($FinishType) {
			case "1" :
				?>
				<div>Job type</div>
				<div>
				<select id = "FinishInfo_<? echo $SlotNum; ?>_<? echo $WallNum; ?>" name = "Finish[]">
				<option value = '1'>MDF</option>
				<option value = '2'>Structure</option>
				</select>
				</div>	
				<?
				break;
			case "2" :
				?>
				<div>Job type</div>
				<div>
				<select id = "FinishInfo_<? echo $SlotNum; ?>_<? echo $WallNum; ?>" name = "Finish[]">
				<option value = '1'>Frameless</option>
				<option value = '2'>Frame</option>
				</select>
				</div>	
				<?
				break;
		}
	}
?>

<?php
	require_once("../config/constant.php");
	require_once("../library/login_check.php");

	$action = $_POST["action"];

	if($action == "changePage") {
		
		$JobID = $_POST["JobID"];
		$JobInfo = new Job( $JobID ,$db );
		include("../tools/project_job_info.php");
	}
	
	if($action == "Save") {

		$JobInfo = new Job( "" , $db );
		
		foreach($_POST as $index => $value) {
			$JobInfo->$index = $value;
		}
		
		$JobInfo->CreatedBy = $Account->Username;
		
		$JobInfo->saveJobInfo();

	}
	
	if($action == "delete") {
		$JobInfo = new Job( $_POST["id"] , $db );
		$JobInfo->deleteJob();
	}
	
	if($action == "ceiling") {
		$ProjectID = $_POST['ProjectID'];
		$JobInfo = new Job($ProjectID  , $db);
		$ProjectArray = $Loader->loadAllActiveProject();
		include("../tools/ceil_job_info.php");
	}
	
	if($action == "floor") {
		$ProjectID = $_POST['ProjectID'];
		$JobInfo = new Job($ProjectID  , $db);
		$ProjectArray = $Loader->loadAllActiveProject();
		
		include("../tools/floor_job_info.php");
	}
	
	if($action == "wall") {
		$ProjectID = $_POST['ProjectID'];
		$JobInfo = new Job($ProjectID  , $db);
		$ProjectArray = $Loader->loadAllActiveProject();
		
		include("../tools/wall_job_info.php");
	}
	
	if($action == "loadDatatable") {
		$ProjectID = $_POST["ProjectID"];
		
		$AllData = $Loader->loadAllProjectJob( $ProjectID );
		
		?>
		<tr>
		<th style = "width:30px;">No</th>
		<th style = "width:150px;">ชื่อโครงการ</th>
		<th style = "width:80px;">ประเภทงาน</th>
		<th style = "width:50px;">รหัสงาน</th>
		<th style = "">รายการ</th>
		<th style = "width:80px;">เพิ่มโดย</th>
		<th style = "width:80px;">เพิ่มเมื่อ</th>
		<th style = "width:80px;">แก้ไขล่าสุดโดย</th>
		<th style = "width:80px;">แก้ไข่ล่าสุดเมื่อ</th>
		</tr>
		<?
		for($i =0; $i < count($AllData);$i++) {
			
			$No = $i + 1;
			if($i % 2 == 0) {
				?>
				<tr class = 'tableRow' onclick = "changePage( '<? echo $AllData[$i]->id; ?>' )">
				<?
			} else {
				?>
				<tr onclick = "changePage( '<? echo $AllData[$i]->id; ?>' )">
				<?
			}
			
			$ProjectInfo = new Project( $AllData[$i]->ProjectID , $db );
			
			?>
			<td class = "tableDataCenter"><? echo $No; ?></td>
			<td class = "Name"><? echo $ProjectInfo->ProjectName; ?></td>
			<td class = "tableDataCenter"><? 
				switch($AllData[$i]->JobType) {
					case "1" :
						echo "งานรื้อถอน";
						break;
					case "2" :
						echo "งานพื้น";
						break;
					case "3" :
						echo "งานฝ้าเพดาน";
						break;
					case "4" :
						echo "งานผนังโครงสร้าง";
						break;
					case "5" :
						echo "งานผนังตกแต่ง";
						break;
					case "6" :
						echo "งานประตู";
						break;
				}				
			?></td>
			<td class = "tableDataCenter"><? echo $AllData[$i]->JobName; ?></td>	
			<td class = "Name"><? echo $AllData[$i]->JobDescription; ?></td>			
			<td class = "tableDataCenter"><? echo $AllData[$i]->CreatedBy; ?></td>	
			<td class = "tableDataCenter"><? echo $AllData[$i]->CreatedDate; ?></td>
			<td class = "tableDataCenter"><? echo $AllData[$i]->UpdatedBy; ?></td>			
			<td class = "tableDataCenter"><? echo $AllData[$i]->UpdatedDate; ?></td>		
			</tr>
			<?
		}
	}
	
?>

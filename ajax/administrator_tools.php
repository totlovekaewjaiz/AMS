<?php
	require_once("../config/constant.php");
	require_once("../library/login_check.php");

	$action = $_POST["action"];

	if($action == "runclock") {
		date_default_timezone_set('Asia/Bangkok'); 
		echo date("H").":".date("i").":".date("s")." ".date("d")."/".date("m")."/".date("Y")." ";
	}	
	
	if($action == "logout") {
		$Account = new Account($db);
		$Account->logout();
		
		echo "../index.php";
	}
	
	if($action == "loadMenu") {
		
		$menu_code = $_POST["menu_code"];
		$_SESSION["menu_code"] = $menu_code;
		
		switch($menu_code) {
			case "Project" :
				$AllData = $Loader->loadAllProject();
				//include("../tools/project.php");
				include("../tools/project.php");
				break;
			case "Material" :
				$AllData = $Loader->loadAllMaterial();
				//include("../tools/project_material.php");
				include("../tools/material_spec.php");
				break;			
			case "MaterialProject" :
				$AllData = $Loader->loadAllProject();
				//include("../tools/project.php");
				include("../tools/project_material.php");
				break;
			case "MaterialPrice" :
				//$AllData = $Loader->loadAllProject();
				//include("../template/material_project.php");
				include("../template/project_material_price.php");
				break;
			case "JobProject" :
				$AllData = $Loader->loadAllProject();
				include("../tools/project_job.php");				
				break;
			case "RazeJob" :
				//$AllData = $Loader->loadAllProject();
				include("../template/raze_job.php");				
				break;
			case "MaterailEstimate" :
				//include("../tools/material_estimate.php");
				break;
			case "MaterailPrice" :
				//include("../tools/material_price.php");
				break;
			case "FloorJob" :
				//$AllData = $Loader->loadAllFloorJob ();
				//include("../tools/floor_job.php");
				include("../tools/floor_job.php");
				break;
			case "CeilJob" :
				//$AllData = $Loader->loadAllCeilJob ();
				//include("../tools/ceil_job.php");
				include("../tools/ceiling_job.php");
				break;
			case "WallStructureJob" :
				//$AllData = $Loader->loadAllWallJob ();
				//include("../tools/wall_job.php");
				include("../template/wall_structure_job.php");
				break;
			case "WallFinishingJob" :
				//$AllData = $Loader->loadAllWallJob ();
				//include("../tools/wall_job.php");
				include("../tools/wall_job.php");
				break;
			case "DoorJob" :
				//include("../tools/furniture_job.php");
				include("../template/door_job.php");
				break;
			case "UserAccount" :
				$AllData = $Loader->loadAllAccount();
				include("../tools/user_account.php");
				break;
			case "Report" :
				//include("../tools/boq_report.php");
				include("../template/project_boq.php");
				break;
			default :
				echo "<script>closePopup();</script>";
				break;
				
		}
	}
	
	if($action == "showLogoutPopup") {
		$Message = "Doyou sure to logout AMS System";
		include("../popup/logoutPopup.php");
	}
	
	if($action == "showDisconnectPopup") {
		$Message = "Doyou sure to logout AMS System";
		include("../popup/disconnectPopup.php");
	}
	
	if($action == "showLoadingPopup") {
		$Message = "Loading...";
		include("../popup/loadingPopup.php");
	}
?>

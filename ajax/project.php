<?php
	require_once("../config/constant.php");
	require_once("../library/login_check.php");

	$action = $_POST["action"];

	if($action == "changePage") {
		
		$ProjectID = $_POST["ProjectID"];
		$ProjectInfo = new Project( $ProjectID ,$db );
		include("../tools/project_info.php");
	}
	
	if($action == "Save") {

		$ProjectInfo = new Project( "" , $db );
		
		foreach($_POST as $index => $value) {
			$ProjectInfo->$index = $value;
		}
		
		$ProjectInfo->CreatedBy = $Account->Username;
		
		$ProjectInfo->saveProject();

	}
	
	if($action == "delete") {
		$ProjectInfo = new Project( $_POST["id"] , $db );
		$ProjectInfo->deleteProject();
	}
	
?>

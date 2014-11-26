<?php
	require_once("../config/constant.php");
	require_once("../library/login_check.php");

	$action = $_POST["action"];

	if($action == "changePage") {
		$MaterialID = $_POST["MaterialID"];
		$MaterialInfo = new Material( $MaterialID , $db );
		include("../tools/material_spec_info.php");
	}
	
	if($action == "Save") {
		
		
		$MaterialInfo = new Material( "" , $db );
		
		foreach($_POST as $index => $value) {
			$MaterialInfo->$index = $value;
		}
		
		$MaterialInfo->CreatedBy = $Account->Username;
		
		$MaterialInfo->saveMaterial();
		
	}
	
	if($action == "Delete") {
		
		$MaterialInfo = new Material( $_POST["id"] , $db );
		$MaterialInfo->deleteMaterial();
	}
	
?>

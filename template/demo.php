<?php
	
	require_once("../config/constant.php");
	require_once("../library/login_check.php");
	
	$action = $_POST["action"];
	
	$Filename = $action."_info.php";
	include($Filename);
	
?>
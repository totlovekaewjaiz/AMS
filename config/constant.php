<?php
	
	require("../config/database.php");
	require("../library/loader.php");
	
	require("../class/account.php");
	require("../class/job.php");
	require("../class/material.php");
	require("../class/project.php");
	require("../class/materialP.php");
	
	session_start();
	
	$db = new Database();
	$db->Connection();
	
	$Loader = new Loader($db);
		
?>
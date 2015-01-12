<?
	
	require("../config/database.php");
	require("../library/loader.php");
	
	require("../class/account.php");
	require("../class/job.php");
	require("../class/material.php");
	require("../class/project.php");
	require("../class/materialP.php");
	require("../class/floor.php");
	require("../class/ceil.php");
	require("../class/wall.php");


	session_start();
	
	$db = new Database();
	$db->Connection();
	
	$Loader = new Loader($db);
		
?>
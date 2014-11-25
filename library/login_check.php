<?
	$db = new Database();
	$db->Connection();
	
	$Account = new Account($db);
	
	$Account->Username = $_SESSION['username'];
	
	if(!$Account->checkAccountLogin()) {
		header("Location: ../login/");	
	} 
?>
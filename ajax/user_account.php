<?
	require_once("../config/constant.php");
	require_once("../library/login_check.php");

	$action = $_POST["action"];

	if($action == "changePage") {
		$Username = $_POST["Username"];
		
		$AccountInfo = new Account( $db );
		$AccountInfo->Username = $Username;
		$AccountInfo->loadAccountInfo();
		
		include("../tools/user_account_info.php");
	}
	
	if($action == "Save") {

		$AccountInfo = new Account( $db );
		$AccountInfo->Username = $_POST["Username"];
		$AccountInfo->loadAccountInfo();
		
		foreach($_POST as $index => $value) {
			$AccountInfo->$index = $value;
		}
		
		
		
		if(empty($AccountInfo->id)) {
			$AccountInfo->CreatedBy = $Account->Username;
			$AccountInfo->createAccount();
		} else {
			$AccountInfo->UpdatedBy = $Account->Username;
			$AccountInfo->updateAccount();
		}

	}
	
?>

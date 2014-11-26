<?php	
	require_once("../config/constant.php");
	
	$_SESSION["menu_code"] = "";
	
	if($_POST) {
		
		$db = new Database();
		$db->Connection();
		
		$Account = new Account($db);

		$Account->Username = $_POST['username'];
		$Account->Password = $_POST['password'];

		
		if($Account->AccountLogin()) {
			$_SESSION['authenticated'] = true;
			$_SESSION['username'] = $Account->Username;
			
			//$Account->AccountLoginSuccess();
						
			header('Location:../tools/administrator_tools.php');
			
		} else {
			$Message = "Error: that username and password combination does not match";
			//$Account->AccountLoginFailed($Message);			
			
		}
		
	}
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Yoohui AMS</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link   href="../css/login.css" rel="stylesheet" type="text/css" />
<link   href="../css/south-street/jquery-ui-1.8.17.custom.css" type="text/css"  rel="stylesheet" />

<script src="../js/jquery-1.7.1.min.js"  type="text/javascript" ></script>
<script src="../js/jquery-ui-1.8.17.custom.min.js"  type="text/javascript" ></script>
<script src="../js/common.js"  type="text/javascript" ></script>

<script>
	$(function() {
		$("#loginPopup").draggable();		
		$( "input[type=button],input[type=submit], a, button" ).button();
		
	});
	  
	function hideError() {
		location.reload(true);
		$("#errorPopup").hide();
		unblockScreen();
	}
	  
	function login() {
		$("#errorPopup").show();
		$("#MessageContent").html("<div style = 'text-align:center;margin-top:40px;'>Please Wait...</div>");
	}
</script>
</head>
<body>
<div id = "content" >
<div id = "screen"></div>

<div id = "loginPopup" class="ui-widget-content ui-corner-all">
<div class="ui-widget-header title">Login</div>
<div class = "PopupContent">
<form method='post'>
<div><div class = "Label" >Username </div><div><input type='text' name='username' id = "username" class = "ui-corner-all" /></div></div>
<div><div class = "Label" >Password </div><div><input type='password' name='password' class = "ui-corner-all" /></div></div>
<div><div class = "ButtonLayout" >
<input type='submit' value='Login' class = "button" onclick = "blockScreen();login();"/>
</div></div>
</form>
</div>
</div>

<?php
	if(!empty($Message)) {
		?>		
		<div id = "errorPopup" class="ui-widget-content ui-corner-all">
		<div class="ui-widget-header title">Login Failed</div>
		<div class = "ErrorPopupContent">
		<div style = "height:80px;" id = "MessageContent">
		<?php
			echo $Message;
		?>
		</div>
		<input type='button' value='Close' class = "button" onclick = "hideError();"/>
		</div>
		</div>
		<script>blockScreen();$("#errorPopup").show();</script>
		<?php
	} else {
		?>
		
		<div id = "errorPopup" class="ui-widget-content ui-corner-all" style = "display:none;">
		<div class="ui-widget-header title">Login</div>
		<div class = "ErrorPopupContent">
		<div style = "height:80px;" id = "MessageContent">
		
		</div>
		</div>
		</div>
		<?php
	}
?>

<div class = "footer">

</div>

</div>
</body>
</html>

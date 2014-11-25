<?php	
	require_once("../config/constant.php");
	require_once("../library/login_check.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Yoohui AMS</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link   href="../css/main.css" rel="stylesheet" type="text/css" />
<link   href="../css/south-street/jquery-ui-1.8.17.custom.css" type="text/css"  rel="stylesheet" />

<script src="../js/jquery-1.7.1.min.js"  type="text/javascript" ></script>
<script src="../js/jquery-ui-1.8.17.custom.min.js"  type="text/javascript" ></script>
<script src="../js/common.js"  type="text/javascript" ></script>

<script>
	
	function runclock() {
		$.post("../ajax/administrator_tools.php",
				"action=" + "runclock" 
		, 
		function(data){
			$("#AdminClock").html(data);
			window.setTimeout("runclock()",1000);
		});
	}
	
	function showLogoutPopup(){
		blockScreen();
		$.post("../ajax/administrator_tools.php",
				"action=" + "showLogoutPopup" 
		, 
		function(data){
			$("#popup").html(data);
			if ($("#screen").is(":visible")) {
				$("#popup").show();
			}
		});
	}
	
	function showLoadingPopup(){
		blockScreen();
		$('#LoadingPopup').show();
	}
	
	function closePopup(){
		unblockScreen();
		$('#popup').hide();
		$('#LoadingPopup').hide();
	}
	
	function logout() {
		$.post("../ajax/administrator_tools.php",
				"action=" + "logout" 
		, 
		function(data){
			window.location = data;
		});
	}

	function loadMenu( menu_code) {
		showLoadingPopup();
		$.post("../ajax/administrator_tools.php",
				{ 
					"action": "loadMenu", 
					"menu_code" : menu_code 	
				}
		, 
		function(data){
			$("#menu_content").html(data);
			$(".right_menu").css({
				"background-color" : "#FFFFFF"
			});
		});
	}	
</script>
</head>
<body>
<div id = "screen"></div>
<div id = "popup"></div>

<div id = "content" >

<div id = "main_tools">
<div id = "AdminUsername" ><? echo $Account->Username; ?></div>
<div><img src = "../resource/icon/logout.png" class = "logout" onclick = "showLogoutPopup()" ></div>
<div id = "AdminClock"></div>
</div>

<div class = "left_menu">

<?
	$Menu = $Loader->loadAllMenu();
	
	for($i =0;$i < count($Menu);$i++) {
		
		for($j = 0; $j < count($Account->MenuList); $j++ ) {
			if($Account->MenuList[$j]["MenuID"] == $Menu[$i]["id"]) { 
				?>
				<div class = "menu"><div class = "MenuLabel" onclick = "loadMenu( '<? echo $Menu[$i]["MenuCode"]; ?>');"><? echo $Menu[$i]["MenuName"]; ?></div></div>
				<?
			}
		}
	}

?>
</div>

<div class = "right_menu">
<div id = "menu_content">
</div>
</div>


<div class = "footer">
</div>

</div>

<div class = "ui-widget-content ui-corner-all Popup" id = "LoadingPopup" >
<div class="ui-widget-header title">Loading</div>
<div class = "LoadingPopupContent">
<div style = "height:40px;">
Loadiing
</div>
</div>
</div>
<script>
	$("#LoadingPopup").css({
		"width" : "300px",
		"height" : "130px",
		"position" : "absolute",  
		"top": "0px",
		"left": "0px",
		"right": "0px",
		"z-index" : "150",
		"margin-top" : "150px",
		"margin-left" : "auto",
		"margin-right" : "auto",
		"display" : "none"
	});
	
	$(function() {
		$("#LoadingPopup").draggable();				
	});
</script>

<script>
runclock();
</script>
<?

if(!empty($_SESSION["menu_code"])){
	?>
	<script>loadMenu('<? echo $_SESSION["menu_code"]; ?>')</script>
	<?
}

?>
</body>
</html>
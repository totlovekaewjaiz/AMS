<style>
	th {
		background-color:#CCCCCC;
	}
	
	tr {
		font-family:arial;
		font-size:10px;
		font-weight:bold;
		cursor:pointer;
	}
	
	tr:hover {
		background-color:#EEEEFF;
	}
	
	.tableRow {
		background-color:#FFEEFF
	}
	
	table{ 
		margin-top:10px;
	}
	
</style>	
<style>
textarea {
    resize: none;
}

.ConfigContent div {
	font-weight:bold;
	color:#777777;
	margin-bottom:5px;
}


#ImageSrc {
	width:60px;
	height:60px;
}

#image_storage {
	width:100%;
	height:200px;
	background-color:#FFFFFF;
	border: solid 1px;
	display:none;
	overflow:auto;
}

.icon {
	width:50px;
	height:50px;
	margin:5px;
	cursor:pointer;
}

.icon:hover {
	width:50px;
	height:50px;
	margin:5px;
	cursor:pointer;
	background-color:#0000FF;
}

</style>
<script>
	
	$(function() {	
		$( "input[type=button],input[type=submit], a, button" ).button();		
	});
	
	function cancel() {
		showLoadingPopup();
		loadMenu('<?php echo $_SESSION["menu_code"]; ?>');
	}
	
	function save() {
		showLoadingPopup();
		loadMenu('<?php echo $_SESSION["menu_code"]; ?>');
	}
	
	function showSelectIcon() {
		$("#image_storage").toggle();
	}
	
	function select( imagePath ) {
		$("#image_storage").hide();
		$("#ImageSrc").attr("src", imagePath);
		$("#ImagePath").val(imagePath);
	}

</script>

<div class = "ConfigContent" style = "padding:10px;">
	<form id = "form">
	<input type = "hidden" id = "action" name = "action" value = "Save" >
<<<<<<< HEAD
	<input type = "hidden" id = "id" name = "id" value = "<? echo $Project->id; ?>" >	

=======
	<input type = "hidden" id = "id" name = "id" value = "<?php echo $MaterialID; ?>" >	
		
>>>>>>> 93b88a5c3417f823f031048038938d979cf6ae13
	<table border = '1' style = "border-collapse:collapse;width:80%">
		<tr>
		<th>รหัสวัสดุ</th>
		<th>รายการวัสดุ</th>
		<th>พื้นที่</th>
		<th>จำนวนวัสดุที่ใช้</th>
		<th>ราคา</th>
		</tr>
<?

	if(count($Project) > 0 ) {
		
		for($i = 0; $i < count($Project->MaterialID); $i++) {

				$query = "SELECT * FROM material WHERE id = ".$Project->MaterialID[$i];			  
			    $result = mysql_query($query);
			    while($datas = mysql_fetch_array($result)){			 
			
					$sql = "SELECT * FROM material_type WHERE type_id = ".$datas["MaterialType"];
					$result1 = mysql_query($sql);
					$datas1 = mysql_fetch_array($result1);

					$MaterialType = $datas1["type_name"];



?>
			<tr>
				<td><? echo $datas["MaterialCode"] ?></td>
				<td>
				<div style = "height:20px;"><? echo $datas["MaterialName"] ?></div>
				<div style = "padding-left:20px;height:20px;"><? echo  $MaterialType;?></div>
				</td>
				<td style = "text-align:center;">
				<div style = "height:20px;"><? echo $datas["MaterialWidth"] ?></div>
				<div style = "height:20px;"><? echo $datas["MaterialHeight"] ?></div>
				</td>
				<td style = "text-align:center;">
				<div style = "height:20px;">456</div>
				<div style = "height:20px;">456</div>
				</td>
				<td><input type = "textbox" style = "width:100px;"></td>
			</tr>
	<?
		}
	}
		?>
		<tr>
	<td></td>
	<td>
	<div style = "height:20px;">ค่าแรง</div>
	<div style = "padding-left:20px;height:20px;">รื้อถอนประตู</div>
	<div style = "padding-left:20px;height:20px;">ปูพื้นไวนิล</div>
	<div style = "padding-left:20px;height:20px;">ฝ้าโครงเคร่าเหล็ก</div>
	<div style = "padding-left:20px;height:20px;">ปูพรม</div>
	</td>
	<td></td>
	<td></td>
	<td>
	<div style = "height:20px;">60000</div>
	<div><input type = "textbox" style = "width:100px;" value=  "20000"></div>
	<div><input type = "textbox" style = "width:100px;" value=  "20000"></div>
	<div><input type = "textbox" style = "width:100px;" value=  "20000"></div>
	</td>
	</tr>
	<?
		
	}
?>





	</table>
	
	<div>&nbsp;</div>
	<div>
	<input type = "button" value = "Save" class = "button" onclick = "save()">
	<input type = "button" value = "Cancel"  class = "button" onclick = "cancel()">
	</div>
	</form>
</div>

<script>
	$(function() {	
		$( "input[type=button],input[type=submit], a, button" ).button();
		closePopup();		
	});
	
	$(".button").css({
		"width":"100px",
		"font-size":"10px"
	});
</script>

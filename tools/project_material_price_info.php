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

		var ProjectID = $('#ProjectID').val();

		showLoadingPopup();
		$.post("../ajax/project.php",
			$('#form').serialize()
		, 
		function(data){
		//	$("#menu_content").html(data);
			loadMenu('<?php echo $_SESSION["menu_code"]; ?>');
		});


		
		
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
<!--
	<input type = "hidden" id = "lop3;" name = "id" value = "<? echo $Project->id; ?>" >	

-->
	<input type = "hidden" id = "id" name = "id" value = "<?php echo $MaterialInfo->id; ?>" >
	<input type = "hidden" id = "ProjectName" name = "ProjectName" value = "<?php echo $ProjectInfo->ProjectName; ?>" >
	<input type = "hidden" id = "ProjectDescription" name = "ProjectDescription" value = "<?php echo $ProjectInfo->ProjectDescription; ?>" >
	<input type = "hidden" id = "Start" name = "Start" value = "<?php echo $ProjectInfo->Start; ?>" >
	<input type = "hidden" id = "End" name = "End" value = "<?php echo $ProjectInfo->End; ?>" >
	<input type = "hidden" id = "Status" name = "Status" value = "<?php echo $ProjectInfo->Status; ?>" >

	<table border = '1' style = "border-collapse:collapse;width:80%">
		<tr>
		<th>รหัสวัสดุ</th>
		<th>รายการวัสดุ</th>
		<th>พื้นที่</th>
		<th>จำนวนวัสดุที่ใช้</th>
		<th>ราคา</th>
		</tr>
<?
	if(count($MaterialInfo) > 0 ) {
		
		for($i = 0; $i < count($MaterialInfo->MaterialID); $i++) {

				$query = "SELECT * FROM material WHERE id = ".$MaterialInfo->MaterialID[$i];			  
			    $result = mysql_query($query);
			    while($datas = mysql_fetch_array($result)){			 
			
					$sql = "SELECT * FROM material_type WHERE type_id = ".$datas["MaterialType"];
					$result1 = mysql_query($sql);
					$datas1 = mysql_fetch_array($result1);

					$MaterialType = $datas1["type_name"];

   
			
			
			$query1 = "SELECT * FROM work_floor WHERE MaterialID = ".$datas["id"];
			$query2 = "SELECT * FROM work_ceil WHERE MaterialID = ".$datas["id"];
			$query3 = "SELECT * FROM work_wall WHERE MaterialID = ".$datas["id"];

			if($query1){
				$result2 = mysql_query($query1);
				$datas2 = mysql_fetch_array($result2);
			}
			
			if($query2){
				$result3 = mysql_query($query2);
				$datas3 = mysql_fetch_array($result3);
			}

			if($query3){
				$result4 = mysql_query($query3);
				$datas4 = mysql_fetch_array($result4);
			}

?>

	<tr>
				<td><? echo $datas["MaterialCode"] ?></td>
				<td>
				<div style = "height:20px;"><? echo $datas["MaterialName"] ?></div>
				<div style = "padding-left:20px;height:20px;"><? echo  $MaterialType;?></div>
				</td>
				<td style = "text-align:center;">
				<div style = "height:20px;"><?php echo $datas3["widthEstimate"];?>
											<?php echo $datas2["widthEstimate"];?>
											<?php echo $datas4["Width"];?>
				</div>
				<div style = "height:20px;"><? echo $datas2["longEstimate"]; ?><? echo $datas3["longEstimate"]; ?><? echo $datas4["Height"]; ?></div>
				</td>
				<td style = "text-align:center;">
				<div style = "height:20px;"></div>
				<div style = "height:20px;"><? echo $datas2['ReserveValue']; ?><? echo $datas3['ReserveValue']; ?><? echo $datas4['Slot']; ?></div>
				</td>
				<td><div style = "height:20px;"></div></td>
			</tr>
<?php
	
		}
	}
		?>
		<tr>
	<td></td>
	<td>
	<div style = "height:20px;">ค่าแรง</div>
	<textarea cols=30 rows=5 name="wageDesc" id="wageDesc"><?php echo $ProjectInfo->wageDesc; ?></textarea>
	</td>
	<td></td>
	<td></td>
	<td>
	<div><input type = "textbox" style = "width:100px;" value="<? echo $ProjectInfo->wagePrice; ?>" name="wagePrice" id="wagePrice"></div>
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

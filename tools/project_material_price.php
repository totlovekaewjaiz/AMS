
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
	
	.Name {
		text-align:left;
		padding-left:10px;
		font-weight:bold;
		vertical-align:text-center;
	}
	
	.tableData {
		text-align:left;
		padding-left:10px;
		vertical-align:text-center;
	}
	
	.tableDataCenter {
		text-align:center;
		vertical-align:text-center;
	}
	
	.addButton {
		width:100%;
		right:50px;
	}

	.button {
		font-size:10px;
		margin:10px;
	}
	
	.noAbility {
		font-weight:bold;
		color :red;
		text-align:center;
	}
	
</style>
<script>

	/*function changePage( id ) {
		showLoadingPopup();
		$.post("../template/demo.php",
				{ 
					"action": "project_material_price",
					"ProjectID" : id
				}
		, 
		function(data){
			$("#menu_content").html(data);
		});
	}*/

	function changePage( id ) {
		showLoadingPopup();
			$.post("../ajax/project_material_price.php",
				{ 
					"action": "changePage",
					"ProjectID" : id
				}
		, 
		function(data){
			$("#menu_content").html(data);
		});
	}
	
	$(function() {	
		$( "input[type=button],input[type=submit], a, button" ).button();
		closePopup();
	});
</script>

<div>
<?php
	$AllData = $Loader->loadAllProjectMaterial1();

	?>
<table border = '1' style = "border-collapse:collapse;width:100%">
	<tr>
<th style = "width:30px;">No</th>
<th style = "width:80px;">ชื่อโครงการ</th>
<th style = "width:80px;">วันเริ่มต้น</th>
<th style = "width:80px;">วันสิ้นสุด</th>
<th style = "width:80px;">เพิ่มโดย</th>
<th style = "width:80px;">เพิ่มเมื่อ</th>
<th style = "width:80px;">แก้ไขล่าสุดโดย</th>
<th style = "width:80px;">แก้ไข่ล่าสุดเมื่อ</th>
</tr>
<?php 
		if(count($AllData) > 0 ) {
		
		for($i = 0; $i < count($AllData); $i++) {
			$No = $i + 1;
		//	echo "<script>alert('".$AllData[$i]->id. "')</script>";
			if($i % 2 == 0) {
				?>
				<tr class = 'tableRow' onclick = "changePage('<? echo $AllData[$i]->id ?>')" >
				<?
			} else {
				?>
				<tr onclick = "changePage('<? echo $AllData[$i]->id ?>')">
				<?
			}
?>


	<td class = "tableDataCenter"><? echo $No; ?></td>
	<td class = "tableDataCenter"><? echo $AllData[$i]->ProjectName; ?></td>	
	<td class = "tableDataCenter"><? echo $AllData[$i]->Start; ?></td>			
	<td class = "tableDataCenter"><? echo $AllData[$i]->End; ?></td>
	<td class = "tableDataCenter"><? echo $AllData[$i]->CreatedBy; ?></td>	
	<td class = "tableDataCenter"><? echo $AllData[$i]->CreatedDate; ?></td>
	<td class = "tableDataCenter"><? echo $AllData[$i]->UpdatedBy; ?> </td>			
	<td class = "tableDataCenter"><? echo $AllData[$i]->UpdatedDate; ?></td>		
</tr>
<?php

				}
	} else {
		?>
		<tr class = 'tableRow'>
		<td colspan = "7">No project found</td>
		</tr>
		<?
	}
			?>





</table>
</div>
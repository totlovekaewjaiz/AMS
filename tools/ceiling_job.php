
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

	function changePage( id ) {
		showLoadingPopup();
		$.post("../ajax/project_job.php",
				{ 
					"action": "ceiling",
					"JobID" : id
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
<table border = '1' style = "border-collapse:collapse;width:100%">
<tr>
<th style = "width:30px;">No</th>
<th style = "width:150px;">ชื่อโครงการ</th>
<th style = "width:50px;">รหัสงาน</th>
<th style = "">รายการ</th>
<th style = "width:50px;">พื้นที่</th>
<th style = "width:50px;">หน่วย</th>
<th style = "width:80px;">แก้ไขล่าสุดโดย</th>
<th style = "width:80px;">แก้ไข่ล่าสุดเมื่อ</th>
</tr>

<?php 
if(count($AllData) > 0 ) {
	for($i = 0; $i < count($AllData); $i++) {
			
			$No = $i + 1;
			
			if($i % 2 == 0) {
				?>
				<tr class = 'tableRow' onclick = "changePage('<?php echo $AllData[$i]['id']; ?>')" >
				<?php
			} else {
				?>
				<tr onclick = "changePage('<?php echo $AllData[$i]['id'];  ?>')">
				<?php
			}
			?>
	

			<td class = "tableDataCenter"><? echo $No; ?></td>
			<?php 
				$query = "SELECT * FROM project WHERE id = ".$AllData[$i]['ProjectID']."";
				$result = mysql_query($query);
				$datas = mysql_fetch_array($result);
			?>
			<td class = "tableDataCenter"><?php echo $datas["ProjectName"]; ?></td>	
			<td class = "tableDataCenter"><?php echo $AllData[$i]['JobName']; ?></td>	
			<td class = "tableDataCenter"><?php echo $AllData[$i]['JobDescription']; ?></td>	
			<td class = "tableDataCenter"><?php echo $i; ?></td>
			<td class = "tableDataCenter"><?php echo $i; ?></td>
			<td class = "tableDataCenter"><?php echo $AllData[$i]['UpdatedBy']; ?></td>
			<td class = "tableDataCenter"><?php echo $AllData[$i]['UpdatedDate']; ?></td>
</tr>
<?php
	}
} else{
	echo '<tr class = "tableRow"><td colspan = "8">No project found</td></tr>';
}

?>
</table>
</div>
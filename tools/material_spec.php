
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
		$.post("../ajax/material.php",
				{ 
					"action": "changePage",
					"MaterialID" : id
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

<div class = "addButton">
<input type='button' value='เพิ่มวัสดุ' class = "button" onclick = "changePage('');" />
</div>

<div>
<table border = '1' style = "border-collapse:collapse;width:100%">
<tr>
<th style = "width:30px;">No</th>
<th style = "width:80px;">รหัสวัสดุ</th>
<th style = "width:80px;">ชื่อวัสดุ</th>
<th style = "width:80px;">เพิ่มโดย</th>
<th style = "width:80px;">เพิ่มเมื่อ</th>
<th style = "width:80px;">แก้ไขล่าสุดโดย</th>
<th style = "width:80px;">แก้ไข่ล่าสุดเมื่อ</th>
</tr>

<?
	if(count($AllData) > 0 ) {
	
		for($i = 0; $i < count($AllData); $i++) {
			
			$No = $i + 1;
			
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
			<td class = "tableDataCenter"><? echo $AllData[$i]->MaterialCode; ?></td>	
			<td class = "tableDataCenter"><? echo $AllData[$i]->MaterialName; ?></td>			
			<td class = "tableDataCenter"><? echo $AllData[$i]->CreatedBy; ?></td>	
			<td class = "tableDataCenter"><? echo $AllData[$i]->CreatedDate; ?></td>
			<td class = "tableDataCenter"><? echo $AllData[$i]->UpdatedBy; ?></td>			
			<td class = "tableDataCenter"><? echo $AllData[$i]->UpdatedDate; ?></td>		
			</tr>
			<?
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
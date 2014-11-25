
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

	function changePage( Username ) {
		showLoadingPopup();
		$.post("../ajax/user_account.php",
				{ 
					"action": "changePage",
					"Username" : Username
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
<input type='button' value='สร้างผู้ใช้งาน' class = "button" onclick = "changePage('');" />
</div>

<div>
<table border = '1' style = "border-collapse:collapse;width:100%">
<tr>
<th style = "width:30px;">No</th>
<th style = "width:80px;">Username</th>
<th style = "width:80px;">ชื่อ</th>
<th style = "width:80px;">นามสกุล</th>
<th style = "width:80px;">เพิ่มโดย</th>
<th style = "width:80px;">เพิ่มเมื่อ</th>
<th style = "width:80px;">แก้ไขล่าสุดโดย</th>
<th style = "width:80px;">แก้ไขล่าสุดเมื่อ</th>
</tr>
<?
	if(count($AllData) == 0) {
		?>
		<tr>
		<td colspan = '12' class = "noAbility" >No Account Info</td>
		</tr>
		<?
	} else {
		for($i = 0;$i < count($AllData) ;$i++ ) {
			
			if($i%2 == 0) {
				/*onclick = "changePage( '<? echo $AllSpellArray[$i]->id; ?>' )"*/
				?>
				<tr class = "tableRow" onclick = "changePage( '<? echo $AllData[$i]->Username; ?>' )">
				<?
			} else {
				/*onclick = "changePage( '<? echo $AllSpellArray[$i]->id; ?>' )"*/
				?>
				<tr onclick = "changePage( '<? echo $AllData[$i]->Username; ?>' )">
				<?
			}
			
			$rowNo = $i + 1;
			
			?>
			<td class = "tableDataCenter"><? echo $rowNo;?></td>
			<td class = "tableDataCenter"><? echo $AllData[$i]->Username; ?></td>	
			<td class = "tableDataCenter"><? echo $AllData[$i]->Firstname; ?></td>			
			<td class = "tableDataCenter"><? echo $AllData[$i]->Lastname; ?></td>	
			<td class = "tableDataCenter"><? echo $AllData[$i]->CreatedBy; ?></td>			
			<td class = "tableDataCenter"><? echo $AllData[$i]->CreatedDate; ?></td>	
			<td class = "tableDataCenter"><? echo $AllData[$i]->UpdatedBy; ?></td>			
			<td class = "tableDataCenter"><? echo $AllData[$i]->UpdatedDate; ?></td>			
			</tr>
			<?
		}
	}
?>
</table>
</div>
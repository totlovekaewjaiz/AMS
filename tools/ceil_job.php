
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
		$.post("../ajax/ceil_job.php",
				{ 
					"action": "changePage",
					"id" : id
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
<input type='button' value='Add Job' class = "button" onclick = "changePage('');" />
</div>

<div>
<table border = '1' style = "border-collapse:collapse;width:100%">
<tr>
<th style = "width:30px;">No</th>
<th style = "width:80px;">Project Name</th>
<th style = "width:80px;">Jobname</th>
<th style = "width:80px;">Created by</th>
<th style = "width:80px;">Created date</th>
<th style = "width:80px;">Updated by</th>
<th style = "width:80px;">Updated date</th>
</tr>
<?
	if(count($AllData) == 0) {
		?>
		<tr>
		<td colspan = '7' class = "noAbility" >No Job Info</td>
		</tr>
		<?
	} else {
		for($i = 0;$i < count($AllData) ;$i++ ) {
			
			if($i%2 == 0) {
				/*onclick = "changePage( '<? echo $AllSpellArray[$i]->id; ?>' )"*/
				?>
				<tr class = "tableRow" onclick = "changePage( '<? echo $AllData[$i]["id"]; ?>' )">
				<?
			} else {
				/*onclick = "changePage( '<? echo $AllSpellArray[$i]->id; ?>' )"*/
				?>
				<tr onclick = "changePage( '<? echo $AllData[$i]["id"]; ?>' )">
				<?
			}
			
			$rowNo = $i + 1;
			
			?>
			<td class = "tableDataCenter"><? echo $rowNo;?></td>
			<td class = "tableDataCenter"><? echo $AllData[$i]["Project"]->ProjectName; ?></td>	
			<td class = "tableDataCenter"><? echo $AllData[$i]["JobName"] ; ?></td>	
			<td class = "tableDataCenter"><? echo $AllData[$i]["CreatedBy"]; ?></td>			
			<td class = "tableDataCenter"><? echo $AllData[$i]["CreatedDate"]; ?></td>	
			<td class = "tableDataCenter"><? echo $AllData[$i]["UpdatedBy"]; ?></td>			
			<td class = "tableDataCenter"><? echo $AllData[$i]["UpdatedDate"]; ?></td>	
			</tr>
			<?
		}
	}
?>
</table>
</div>
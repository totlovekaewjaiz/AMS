
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

	function loadMaterialInfo( ) { 
		$.post("../ajax/project_material_estimate.php",
				{ 
					"action": "loadMaterialInfo",
					"ProjectID" : $("#ProjectID").val()
				}
		, 
		function(data){
			$("#tableData").html(data);
		});
	}
	
	function loadMaterialEstimateInfo( MaterialID) { 
		$.post("../ajax/project_material_estimate.php",
				{ 
					"action": "loadMaterialEstimateInfo",
					"ProjectID" : $("#ProjectID").val() , 
					"MaterialID" :MaterialID 
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
<?
	$ProjectArray = $Loader->loadAllActiveProject();
?>
<div class = "addButton">
<select id = "ProjectID" onchange = "loadMaterialInfo()" >
<option value = "">Select Project</option>
<?
	for($i =0;$i < count($ProjectArray);$i++) {
		?>
		<option value = "<? echo $ProjectArray[$i]->id;?>"><? echo $ProjectArray[$i]->ProjectName;?></option>
		<?
	}
?>
</select>
</div>

<div id = "tableData">
<table border = '1' style = "border-collapse:collapse;width:100%">
<tr>
		<th style = "width:30px;">No</th>
		<th style = "width:80px;">Material Name</th>
		<th style = "width:80px;">Total</th>
		<th style = "width:80px;">Estimate Total</th>
		<th style = "width:80px;">Percent</th>
		<th style = "width:80px;">Updated by</th>
		<th style = "width:80px;">Updated date</th>
</tr>
<?
	if(count($AllProject) == 0) {
		?>
		<tr>
		<td colspan = '7' class = "noAbility" >No Material Info</td>
		</tr>
		<?
	} else {
		for($i = 0;$i < count($AllProject) ;$i++ ) {
			
			if($i%2 == 0) {
				/*onclick = "changePage( '<? echo $AllSpellArray[$i]->id; ?>' )"*/
				?>
				<tr class = "tableRow" >
				<?
			} else {
				/*onclick = "changePage( '<? echo $AllSpellArray[$i]->id; ?>' )"*/
				?>
				<tr>
				<?
			}
			
			$rowNo = $i + 1;
			
			?>
			<td class = "tableDataCenter"><? echo $rowNo;?></td>
			<td class = "tableDataCenter"></td>			
			</tr>
			<?
		}
	}
?>
</table>
</div>
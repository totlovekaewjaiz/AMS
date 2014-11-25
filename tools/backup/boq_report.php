
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
	
	function loadMaterialPrice( MaterialID) { 
		$.post("../ajax/project_material_price.php",
				{ 
					"action": "loadMaterialPrice",
					"ProjectID" : $("#ProjectID").val() , 
					"MaterialID" :MaterialID 
				}
		, 
		function(data){
			$("#menu_content").html(data);
		});
	}
	
	function loadMaterialInfo( ) { 
		$.post("../ajax/project_material_price.php",
				{ 
					"action": "loadMaterialInfo",
					"ProjectID" : $("#ProjectID").val()
				}
		, 
		function(data){
			//$("#tableData").html(data);
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
		<th style = "width:80px;">Price / Unit</th>
		<th style = "width:80px;">Total</th>
		<th style = "width:80px;">Estimate Total</th>
		<th style = "width:80px;">Total Price</th>
		<th style = "width:80px;">Estimate Price</th>
</tr>
<tr class = "tableRow">
<td>1</td>
<td>Basic Tile</td>
<td>50</td>
<td>456</td>
<td>480</td>
<td>22800</td>
<td>24000</td>
</tr>
<tr>
<td>2</td>
<td>Large Tile</td>
<td>80</td>
<td>367</td>
<td>390</td>
<td>29360</td>
<td>31200</td>
</tr>
<tr class = "tableRow">
<td>3</td>
<td>Custom Tile</td>
<td>60</td>
<td>800</td>
<td>900</td>
<td>45000</td>
<td>46000</td>
</tr>
<tr>
<td>4</td>
<td>Laminate Tile</td>
<td>325</td>
<td>40</td>
<td>45</td>
<td>13000</td>
<td>14625</td>
</tr>
<tr class = "tableRow">
<td>5</td>
<td>Grass</td>
<td>300</td>
<td>50</td>
<td>56</td>
<td>15000</td>
<td>16800</td>
</tr>
<tr>
<td>6</td>
<td>Wage</td>
<td></td>
<td></td>
<td></td>
<td>24000</td>
<td>24000</td>
</tr>
<tr class = "tableRow" style = 'color:red'>
<td>7</td>
<td>Basic Tile 10 * 10</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr style = 'color:red'>
<td>8</td>
<td>ฝ้ามาตรฐาน</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td colspan = '5'> Total</td>
<td>149160</td>
<td>156625</td>
</tr>
<!--
<?
	if(count($AllProject) == 0) {
		?>
		<tr>
		<td colspan = '9' class = "noAbility" >No Material Info</td>
		</tr>
		<?
	} else {
		for($i = 0;$i < count($AllProject) ;$i++ ) {
			
			if($i%2 == 0) {
				/*onclick = "changePage( '<? echo $AllSpellArray[$i]->id; ?>' )"*/
				?>
				<tr class = "tableRow" onclick = "changePage( '<? echo $AllProject[$i]->id; ?>' )">
				<?
			} else {
				/*onclick = "changePage( '<? echo $AllSpellArray[$i]->id; ?>' )"*/
				?>
				<tr onclick = "changePage( '<? echo $AllProject[$i]->id; ?>' )">
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
-->
</table>

<div class = "addButton">
<input type='button' value='Export' class = "button" onclick = "changePage('');" />
</div>
</div>
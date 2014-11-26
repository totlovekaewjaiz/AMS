
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
					"action": "changePage",
					"JobID" : id
				}
		, 
		function(data){
			$("#menu_content").html(data);
		});
	}
	
	$(function() {	
		$( "input[type=button],input[type=submit], a, button" ).button();
		loadDatatable();
		closePopup();
	});
	
	function loadDatatable() {
		showLoadingPopup();
		$.post("../ajax/project_job.php",
				{ 
					"action": "loadDatatable",
					"ProjectID" : $("#ProjectID").val()
				}
		, 
		function(data){
			closePopup();
			$("#datatable").html(data);
		});
	}
	
</script>

<div class = "addButton">
<input type='button' value='เพิ่มงาน' class = "button" onclick = "changePage('');" />
</div>

<div>
<select id = "ProjectID" style = "width:200px;" onchange = "loadDatatable()" >
<option value = "">All Project</option>
<?php
	for($i =0; $i < count($AllData); $i++) {
		?>
		<option value = "<?php echo $AllData[$i]->id;?>"><?php echo $AllData[$i]->ProjectName;?></option>
		<?php
	}
?>
</select>
</div>

<div>
<table border = '1' style = "border-collapse:collapse;width:100%" id = "datatable">

</table>

</div>
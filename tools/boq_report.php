
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
$(document).ready(function(){
	$('#printPDF').click(function(){
		window.open('../report.php');
	});
	$('#printExcel').click(function(){
		window.open('../exportExcel.php');
	});
});

	function changePage( id ) {
		var ProjectID = $('#ProjectName').val();
		var Date1 = $('#datepicker1').val();
		var Date2 = $('#datepicker2').val();

		$.post("../ajax/boq.php",
				{ 
					"action": "changePage",
					"ProjectID" : ProjectID,
					"Date1"	: Date1,
					"Date2" : Date2
				}
		, 
		function(data){
			//loadMenu('<?php echo $_SESSION["menu_code"]; ?>');
			$("#tt").html(data);
			//$("#menu_content").html(data);
		});
	}
	
	$(function() {	
		$( "input[type=button],input[type=submit], a, button" ).button();
		closePopup();
	});
	$(function() {
	    $( "#datepicker1" ).datepicker();
	    $( "#datepicker2" ).datepicker();
	});
 
</script>

<div>
	ชื่อโครงการ :
<select name="ProjectName" id="ProjectName">
	<option>--- Choose ---</option>
<?php
		for($i =0; $i < count($AllData); $i++) {
?>
			<option value = "<?php echo $AllData[$i]->id;?>"><?php echo $AllData[$i]->ProjectName;?></option>
<?php
		}

	?>
</select>

<p>
	วันที่เริ่ม: <input type="text" id="datepicker1"> 
	วันที่สิ้นสุด: <input type="text" id="datepicker2"> 
	<button class="button" onclick = "changePage()">ค้นหา</button>
</p>
</div>

<div>
<table border = '1' style = "border-collapse:collapse;width:100%" id="tt">
<tr>
<th style = "width:150px;">ชื่อโครงการ</th>
<th style = "width:80px;">ประเภทงาน</th>
<th style = "width:50px;">รหัสงาน</th>
<th style = "">รายการ</th>
<th style = "width:50px;">หน่วย</th>
<th style = "width:50px;">จำนวน</th>
<th style = "width:50px;">ราคาวัสดุ/หน่วย</th>
<th style = "width:50px;">รวม</th>

</tr>

</table>
</div>

<div class = "addButton">
	<input type='button' value='Print' class = "button" id="printPDF"/>
	<input type='button' value='Excel' class = "button" id="printExcel"/>
</div>
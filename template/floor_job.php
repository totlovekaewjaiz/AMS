
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
		$.post("../ajax/material_project.php",
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

<tr>
<td class = "tableDataCenter">1</td>
<td class = "Name">อาคารพญาไทยพลาซ่า</td>
<td class = "tableDataCenter">F-1</td>	
<td class = "Name">พื้น คสล  ปูพื้นไวนิล รหัส 906-5ของ WDT</td>			
<td class = "tableDataCenter">173</td>	
<td class = "tableDataCenter">ตรม</td>	
<td class = "tableDataCenter">Administrator</td>	
<td class = "tableDataCenter">2014-05-21 23:45:42</td>	
</tr>

<tr class = 'tableRow'>
<td class = "tableDataCenter">2</td>
<td class = "Name">อาคารพญาไทยพลาซ่า</td>				
<td class = "tableDataCenter">F-2</td>
<td class = "Name">พื้น คสล  ปูพรมขนาด 60 * 60  รหัส 909865</td>
<td class = "tableDataCenter">106</td>	
<td class = "tableDataCenter">ตรม</td>	
<td class = "tableDataCenter">Administrator</td>	
<td class = "tableDataCenter">2014-05-21 23:45:32</td>	
</tr>

</table>
</div>
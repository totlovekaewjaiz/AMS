
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
		$.post("../template/demo.php",
				{ 
					"action": "material_spec",
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

<tr class = 'tableRow'>
<td class = "tableDataCenter">1</td>
<td class = "tableDataCenter">909865</td>	
<td class = "tableDataCenter">พรมขนาด 60 * 60 ซม</td>			
<td class = "tableDataCenter">Administrator</td>	
<td class = "tableDataCenter">2014-05-21 23:45:32</td>
<td class = "tableDataCenter">Administrator</td>			
<td class = "tableDataCenter">2014-05-21 23:47:12</td>		
</tr>

<tr>
<td class = "tableDataCenter">2</td>
<td class = "tableDataCenter">906-5</td>	
<td class = "tableDataCenter">พื้นไวนิลของ WDT</td>			
<td class = "tableDataCenter">Administrator</td>	
<td class = "tableDataCenter">2014-05-21 23:45:42</td>
<td class = "tableDataCenter">Administrator</td>			
<td class = "tableDataCenter">2014-05-21 23:47:55</td>		
</tr>

			
</table>
</div>
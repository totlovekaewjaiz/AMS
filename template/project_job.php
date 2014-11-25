
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
					"action": "project_job",
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

<div class = "addButton">
<input type='button' value='เพิ่มงาน' class = "button" onclick = "changePage('');" />
</div>

<div>
<table border = '1' style = "border-collapse:collapse;width:100%" onclick = "changePage('');">
<tr>
<th style = "width:30px;">No</th>
<th style = "width:150px;">ชื่อโครงการ</th>
<th style = "width:80px;">ประเภทงาน</th>
<th style = "width:50px;">รหัสงาน</th>
<th style = "">รายการ</th>
<th style = "width:80px;">เพิ่มโดย</th>
<th style = "width:80px;">เพิ่มเมื่อ</th>
<th style = "width:80px;">แก้ไขล่าสุดโดย</th>
<th style = "width:80px;">แก้ไข่ล่าสุดเมื่อ</th>
</tr>

<tr class = 'tableRow'>
<td class = "tableDataCenter">1</td>
<td class = "Name">อาคารพญาไทยพลาซ่า</td>	
<td class = "tableDataCenter">งานรื้อถอน</td>			
<td class = "tableDataCenter"></td>
<td class = "Name">รื้อถอน พื้น  ฝ้า  ผนัง  ประตู  พร้อมขนย้าย</td>
<td class = "tableDataCenter">Administrator</td>	
<td class = "tableDataCenter">2014-05-21 23:45:32</td>
<td class = "tableDataCenter">Administrator</td>			
<td class = "tableDataCenter">2014-05-21 23:47:12</td>		
</tr>

<tr>
<td class = "tableDataCenter">2</td>
<td class = "Name">อาคารพญาไทยพลาซ่า</td>
<td class = "tableDataCenter">งานพื้น</td>
<td class = "tableDataCenter">F-1</td>	
<td class = "Name">พื้น คสล  ปูพื้นไวนิล รหัส 906-5ของ WDT</td>			
<td class = "tableDataCenter">Administrator</td>	
<td class = "tableDataCenter">2014-05-21 23:45:42</td>
<td class = "tableDataCenter">Administrator</td>			
<td class = "tableDataCenter">2014-05-21 23:47:55</td>		
</tr>

<tr class = 'tableRow'>
<td class = "tableDataCenter">3</td>
<td class = "Name">อาคารพญาไทยพลาซ่า</td>	
<td class = "tableDataCenter">งานพื้น</td>			
<td class = "tableDataCenter">F-2</td>
<td class = "Name">พื้น คสล  ปูพรมขนาด 60 * 60  รหัส 909865</td>
<td class = "tableDataCenter">Administrator</td>	
<td class = "tableDataCenter">2014-05-21 23:45:32</td>
<td class = "tableDataCenter">Administrator</td>			
<td class = "tableDataCenter">2014-05-21 23:47:12</td>		
</tr>

<tr>
<td class = "tableDataCenter">4</td>
<td class = "Name">อาคารพญาไทยพลาซ่า</td>
<td class = "tableDataCenter">งานฝ้าเพดาน</td>
<td class = "tableDataCenter">C-1</td>	
<td class = "Name">ฝ้าโครงเคร่าเหล็กชุบสังกะสีกรุยิปซั่มบอร์ดหนา 9 มม</td>			
<td class = "tableDataCenter">Administrator</td>	
<td class = "tableDataCenter">2014-05-21 23:45:42</td>
<td class = "tableDataCenter">Administrator</td>			
<td class = "tableDataCenter">2014-05-21 23:47:55</td>		
</tr>

<tr class = 'tableRow'>
<td class = "tableDataCenter">5</td>
<td class = "Name">อาคารพญาไทยพลาซ่า</td>	
<td class = "tableDataCenter">งานฝ้าเพดาน</td>			
<td class = "tableDataCenter">F-2</td>
<td class = "Name">Drop ฝ้าเพดานสูง 10 ซม</td>
<td class = "tableDataCenter">Administrator</td>	
<td class = "tableDataCenter">2014-05-21 23:45:32</td>
<td class = "tableDataCenter">Administrator</td>			
<td class = "tableDataCenter">2014-05-21 23:47:12</td>		
</tr>

<tr>
<td class = "tableDataCenter">6</td>
<td class = "Name">อาคารพญาไทยพลาซ่า</td>
<td class = "tableDataCenter">งานผนังโครงสร้าง</td>
<td class = "tableDataCenter">C-1</td>	
<td class = "Name">ผนังกระจกใสหนา 8 มม พร้อมกรอบอลูมิเนียมสีธรรมชาติขนาด 2 * 4 ของ ALLOY</td>			
<td class = "tableDataCenter">Administrator</td>	
<td class = "tableDataCenter">2014-05-21 23:45:42</td>
<td class = "tableDataCenter">Administrator</td>			
<td class = "tableDataCenter">2014-05-21 23:47:55</td>		
</tr>

<tr class = 'tableRow'>
<td class = "tableDataCenter">7</td>
<td class = "Name">อาคารพญาไทยพลาซ่า</td>	
<td class = "tableDataCenter">งานผนังโครงสร้าง</td>			
<td class = "tableDataCenter">F-2</td>
<td class = "Name">ฉาบปูผนังเดิมก่อนทาที</td>
<td class = "tableDataCenter">Administrator</td>	
<td class = "tableDataCenter">2014-05-21 23:45:32</td>
<td class = "tableDataCenter">Administrator</td>			
<td class = "tableDataCenter">2014-05-21 23:47:12</td>		
</tr>


<tr>
<td class = "tableDataCenter">8</td>
<td class = "Name">อาคารพญาไทยพลาซ่า</td>
<td class = "tableDataCenter">งานผนังตกแต่ง</td>
<td class = "tableDataCenter"></td>	
<td class = "Name">ทาสีผนังทั่วไป</td>			
<td class = "tableDataCenter">Administrator</td>	
<td class = "tableDataCenter">2014-05-21 23:45:42</td>
<td class = "tableDataCenter">Administrator</td>			
<td class = "tableDataCenter">2014-05-21 23:47:55</td>		
</tr>

<tr class = 'tableRow'>
<td class = "tableDataCenter">9</td>
<td class = "Name">อาคารพญาไทยพลาซ่า</td>	
<td class = "tableDataCenter">งานผนังตกแต่ง</td>			
<td class = "tableDataCenter"></td>
<td class = "Name">ผนังกรุกระเบื้องขนาด 300x300 มม</td>
<td class = "tableDataCenter">Administrator</td>	
<td class = "tableDataCenter">2014-05-21 23:45:32</td>
<td class = "tableDataCenter">Administrator</td>			
<td class = "tableDataCenter">2014-05-21 23:47:12</td>		
</tr>

</table>
</div>
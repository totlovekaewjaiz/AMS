<?php

$html = '<table border = "1" style = "border-collapse:collapse;width:100%">
<tr>
<th style = "width:30px;">No</th>
<th style = "width:150px;">ชื่อโครงการ</th>
<th style = "width:80px;">ประเภทงาน</th>
<th style = "width:50px;">รหัสงาน</th>
<th style = "">รายการ</th>
<th style = "width:50px;">หน่วย</th>
<th style = "width:50px;">จำนวน</th>
<th style = "">ราคาวัสดุ/หน่วย</th>
<th style = "">ค่าแรง/หน่วย</th>
<th style = "width:50px;">รวม</th>

</tr>

<tr class = "tableRow">
<td class = "tableDataCenter">1</td>
<td class = "Name">อาคารพญาไทยพลาซ่า</td>	
<td class = "tableDataCenter">งานรื้อถอน</td>			
<td class = "tableDataCenter"></td>
<td class = "Name">รื้อถอน พื้น  ฝ้า  ผนัง  ประตู  พร้อมขนย้าย</td>
<td class = "tableDataCenter">1</td>	
<td class = "tableDataCenter">งาน</td>
<td class = "tableDataCenter">-</td>			
<td class = "tableDataCenter">30,000</td>		
<td class = "tableDataCenter">30,000</td>
</tr>

<tr>
<td class = "tableDataCenter">2</td>
<td class = "Name">อาคารพญาไทยพลาซ่า</td>
<td class = "tableDataCenter">งานพื้น</td>
<td class = "tableDataCenter">F-1</td>	
<td class = "Name">พื้น คสล  ปูพื้นไวนิล รหัส 906-5ของ WDT</td>			
<td class = "tableDataCenter">173</td>	
<td class = "tableDataCenter">ตรม</td>
<td class = "tableDataCenter">30,000</td>			
<td class = "tableDataCenter">30,000</td>		
<td class = "tableDataCenter">60,000</td>	
</tr>

<tr class = "tableRow">
<td class = "tableDataCenter">3</td>
<td class = "Name">อาคารพญาไทยพลาซ่า</td>	
<td class = "tableDataCenter">งานพื้น</td>			
<td class = "tableDataCenter">F-2</td>
<td class = "Name">พื้น คสล  ปูพรมขนาด 60 * 60  รหัส 909865</td>
<td class = "tableDataCenter">106</td>	
<td class = "tableDataCenter">ตรม</td>
<td class = "tableDataCenter">30,000</td>			
<td class = "tableDataCenter">30,000</td>		
<td class = "tableDataCenter">60,000</td>	
</tr>

<tr>
<td class = "tableDataCenter">4</td>
<td class = "Name">อาคารพญาไทยพลาซ่า</td>
<td class = "tableDataCenter">งานฝ้าเพดาน</td>
<td class = "tableDataCenter">C-1</td>	
<td class = "Name">ฝ้าโครงเคร่าเหล็กชุบสังกะสีกรุยิปซั่มบอร์ดหนา 9 มม</td>			
<td class = "tableDataCenter">283</td>	
<td class = "tableDataCenter">ตรม</td>
<td class = "tableDataCenter">45,000</td>			
<td class = "tableDataCenter">45,000</td>		
<td class = "tableDataCenter">90,000</td>	
</tr>

<tr>
<td colspan = "9" class = "Name">รวม</td>
<td class = "tableDataCenter">240,000</td>	
</tr>

</table>';


//==============================================================
//==============================================================
//==============================================================

include("MPDF57/mpdf.php");



$pdf = new mPdf('th', 'A4-L', '0', 'THSaraban',8, 8, 10, 9, 9, 9,'L');
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($stylesheet, 1);
$pdf->WriteHTML($html, 2);
$pdf->Output();


//==============================================================
//==============================================================
//==============================================================


?>
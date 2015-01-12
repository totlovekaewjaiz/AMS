<?php


	
	require_once("../config/constant.php");
	require_once("../library/login_check.php");

	$ProjectID = $_POST['ProjectID'];
	$Date1 = $_POST['Date1'];
	$Date2 = $_POST['Date2'];

	$Date11 = date('Y-m-d',strtotime($Date1)).' 00:00:00';
	$Date22 = date('Y-m-d',strtotime($Date2)).' 00:00:00';

	$sum = 0;

	$query0 = "SELECT * FROM project WHERE id = ".$ProjectID."";	    
	$result0 = mysql_query($query0);
	$datas0 = mysql_fetch_array($result0);



if($ProjectID && $Date1 && $Date2){
	$_SESSION['ProjectID'] = $ProjectID;
	$_SESSION['Date1'] = $Date11;
	$_SESSION['Date2'] = $Date22;
$aa = '
	<tr>
		<th style = "width:150px;">ชื่อโครงการ</th>
		<th style = "width:80px;">ประเภทงาน</th>
		<th style = "width:50px;">รหัสงาน</th>
		<th style = "">รายการ</th>
		<th style = "width:50px;">หน่วย</th>
		<th style = "width:50px;">จำนวน</th>
		<th style = "width:50px;">ราคาวัสดุ/หน่วย</th>
		<th style = "width:50px;">รวม</th>
	</tr>';
		$query = "SELECT * FROM work_floor WHERE ProjectID = ".$ProjectID." AND UpdatedDate BETWEEN '".$Date11."' AND '".$Date22."'";	    
		$result = mysql_query($query);
		while($datas = mysql_fetch_array($result)){ 
			$query1 = "SELECT * FROM job WHERE id = ".$datas["JobID"]."";
			$result1 = mysql_query($query1);
			$datas1 = mysql_fetch_array($result1);

			$query2 = "SELECT * FROM material WHERE id = ".$datas["MaterialID"]."";
			$result2 = mysql_query($query2);
			$datas2 = mysql_fetch_array($result2);

			$query3 = "SELECT * FROM project WHERE id = ".$datas["ProjectID"]."";
			$result3 = mysql_query($query3);
			$datas3 = mysql_fetch_array($result3);

			$aa .='<tr class = "tableRow">
						<td class = "Name">'.$datas3["ProjectName"].'</td>	
						<td class = "tableDataCenter">งานพื้น</td>			
						<td class = "tableDataCenter">'.$datas["JobName"].'</td>
						<td class = "Name">'.$datas1["JobDescription"].'</td>
						<td class = "tableDataCenter"></td>	
						<td class = "TRight">'.number_format($datas["ReserveValue"],2,'.',',').'</td>
						<td class = "TRight">'.number_format($datas2["MaterialPrice"],2,'.',',').'</td>				
						<td class = "TRight">'.number_format($datas2["MaterialPrice"]*$datas["ReserveValue"],2,'.',',').'</td>
					</tr>';
			$sum += $datas2["MaterialPrice"]*$datas["ReserveValue"];
		}

		$queryWall = "SELECT * FROM work_wall WHERE ProjectID = ".$ProjectID." AND UpdatedDate BETWEEN '".$Date11."' AND '".$Date22."'";    
		$resultWall = mysql_query($queryWall);
		while($datasWall = mysql_fetch_array($resultWall)){
			$query1 = "SELECT * FROM job WHERE id = ".$datasWall["JobID"]."";
			$result1 = mysql_query($query1);
			$datas1 = mysql_fetch_array($result1);

			$query2 = "SELECT * FROM material WHERE id = ".$datasWall["MaterialID"]."";
			$result2 = mysql_query($query2);
			$datas2 = mysql_fetch_array($result2);

			$query3 = "SELECT * FROM project WHERE id = ".$datasWall["ProjectID"]."";
			$result3 = mysql_query($query3);
			$datas3 = mysql_fetch_array($result3);

			$aa .='<tr class = "tableRow">
						<td class = "Name">'.$datas3["ProjectName"].'</td>	
						<td class = "tableDataCenter">งานพื้น</td>			
						<td class = "tableDataCenter">'.$datasWall["JobName"].'</td>
						<td class = "Name">'.$datas1["JobDescription"].'</td>
						<td class = "tableDataCenter"></td>	
						<td class = "TRight">'.number_format($datasWall["Slot"],2,'.',',').'</td>
						<td class = "TRight">'.number_format($datas2["MaterialPrice"],2,'.',',').'</td>				
						<td class = "TRight">'.number_format($datas2["MaterialPrice"]*$datasWall["Slot"],2,'.',',').'</td>
					</tr>';
			$sum += $datas2["MaterialPrice"]*$datasWall["ReserveValue"];
		}

		$queryCeil = "SELECT * FROM work_ceil WHERE ProjectID = ".$ProjectID." AND UpdatedDate BETWEEN '".$Date11."' AND '".$Date22."'"; 
		$resultCeil = mysql_query($queryCeil);
		while($datasCeil = mysql_fetch_array($resultCeil)){
			$query1 = "SELECT * FROM job WHERE id = ".$datasCeil["JobID"]." ";
			$result1 = mysql_query($query1);
			$datas1 = mysql_fetch_array($result1);

			$query2 = "SELECT * FROM material WHERE id = ".$datasCeil["MaterialID"]."";
			$result2 = mysql_query($query2);
			$datas2 = mysql_fetch_array($result2);

			$query3 = "SELECT * FROM project WHERE id = ".$datasCeil["ProjectID"]."";
			$result3 = mysql_query($query3);
			$datas3 = mysql_fetch_array($result3);

			$aa .='<tr class = "tableRow">
						<td class = "Name">'.$datas3["ProjectName"].'</td>	
						<td class = "tableDataCenter">งานพื้น</td>			
						<td class = "tableDataCenter">'.$datasCeil["JobName"].'</td>
						<td class = "Name">'.$datas1["JobDescription"].'</td>
						<td class = "tableDataCenter"></td>	
						<td class = "TRight">'.number_format($datasCeil["ReserveValue"],2,'.',',').'</td>
						<td class = "TRight">'.number_format($datas2["MaterialPrice"],2,'.',',').'</td>			
						<td class = "TRight">'.number_format($datas2["MaterialPrice"]*$datasCeil["ReserveValue"],2,'.',',').'</td>
					</tr>';
			$sum += $datas2["MaterialPrice"]*$datasCeil["ReserveValue"];
		}

$aa .= '
	<tr>
		<td colspan =" 7 " style="text-align:right"> ( '.$datas0["wageDesc"].' ) &nbsp; ค่าแรง &nbsp;</td>
		<td class = "TRight">'.number_format($datas0["wagePrice"],2,'.',',').'</td>	
	</tr>
	<tr>
		<td colspan =" 7 " class = "Name"  style="text-align:right">รวม &nbsp;</td>
		<td class = "TRight">'.number_format($sum+$datas0["wagePrice"],2,'.',',').'</td>	
	</tr>';

echo $aa;

	}
?>

<style>
.TRight{
text-align:right;

}
</style>


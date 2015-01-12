<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
mysql_set_charset('utf8',$objConnect);
$objDB = mysql_select_db("ams_yoohui");
session_start();
$ProjectID  = $_SESSION["ProjectID"];
$Date11 	= $_SESSION["Date1"];
$Date22 	= $_SESSION["Date2"];


/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');


if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';



// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");


// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Item')
            ->setCellValue('B1', 'Description')
            ->setCellValue('C1', 'Unit')
            ->setCellValue('D1', 'QTY')
 			->setCellValue('E1', 'Materials Price / Unit')
           // ->setCellValue('F1', 'Material Price ')
            ->setCellValue('F1', 'Total');

$query1 = "SELECT * FROM work_floor WHERE ProjectID = '".$ProjectID."' AND UpdatedDate BETWEEN '".$Date11."' AND'".$Date22."'";
$result1 = mysql_query($query1) or die(mysql_error());
$count = 0;


$rowCount = 2; 
while($row = mysql_fetch_array($result1)){ 
	$query11 = "SELECT * FROM job WHERE id = ".$row["JobID"]."";
	$result11 = mysql_query($query11);
	$datas11 = mysql_fetch_array($result11);

	$query2 = "SELECT * FROM material WHERE id = ".$row["MaterialID"]."";
	$result2 = mysql_query($query2);
	$datas2 = mysql_fetch_array($result2);


	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['JobName']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $datas11["JobDescription"]); 
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, number_format($row["ReserveValue"],2,'.',',')); 
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, number_format($datas2["MaterialPrice"],2,'.',',')); 
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, number_format($datas2["MaterialPrice"]*$row["ReserveValue"],2,'.',',')); 
    $rowCount++; 
    $count++;
} 

$query2 = "SELECT * FROM work_wall WHERE ProjectID = '".$ProjectID."' AND UpdatedDate BETWEEN '".$Date11."' AND'".$Date22."'";
$result2 = mysql_query($query2) or die(mysql_error());

$rowCount1 = 2+$count;

while($row = mysql_fetch_array($result2)){ 
	$query11 = "SELECT * FROM job WHERE id = ".$row["JobID"]."";
	$result11 = mysql_query($query11);
	$datas11 = mysql_fetch_array($result11);

	$query2 = "SELECT * FROM material WHERE id = ".$row["MaterialID"]."";
	$result2 = mysql_query($query2);
	$datas2 = mysql_fetch_array($result2);


	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount1, $row['JobName']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount1, $datas11['JobDescription']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount1, number_format($row["Slot"],2,'.',',')); 
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount1, number_format($datas2["MaterialPrice"],2,'.',',')); 
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount1, number_format($datas2["MaterialPrice"]*$row["Slot"],2,'.',',')); 
    $rowCount1++; 
}

$query3 = "SELECT * FROM work_ceil WHERE ProjectID = '".$ProjectID."' AND UpdatedDate BETWEEN '".$Date11."' AND'".$Date22."'";
$result3 = mysql_query($query3) or die(mysql_error());

$rowCount2 = 3+$count; 

while($row = mysql_fetch_array($result3)){ 
	$query11 = "SELECT * FROM job WHERE id = ".$row["JobID"]."";
	$result11 = mysql_query($query11);
	$datas11 = mysql_fetch_array($result11);

	$query2 = "SELECT * FROM material WHERE id = ".$row["MaterialID"]."";
	$result2 = mysql_query($query2);
	$datas2 = mysql_fetch_array($result2);


	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount2, $row['JobName']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount2, $datas11['JobDescription']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount2, number_format($row["ReserveValue"],2,'.',',')); 
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount2, number_format($datas2["MaterialPrice"],2,'.',',')); 
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount2, number_format($datas2["MaterialPrice"]*$row["ReserveValue"],2,'.',',')); 
    $rowCount2++; 
}



$objPHPExcel->getActiveSheet()
  		  ->getColumnDimension('B')
  		  ->setWidth(50);

$objPHPExcel->getActiveSheet()
  		  ->getColumnDimension('E')
  		  ->setWidth(20);



// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8');
header('Content-Disposition: attachment;filename="BOQ.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>

<?php
	
	require_once("../config/constant.php");
	require_once("../library/login_check.php");
	
	$action = $_REQUEST["action"];
	
	if($action == "changePage") {
		
		$JobID = $_POST["id"];
		$JobInfo = new Job($JobID , $db);
		$ProjectArray = $Loader->loadAllActiveProject();


		
		include("../tools/floor_job_info.php");
	}
	
	if($action == "LoadProjectMaterial") {
		$ProjectID = $_POST["ProjectID"];
		$MaterialType = "Tile";
		$MaterialArray = $Loader->loadAllProjectMaterial($ProjectID , $MaterialType);
		
		
		for($i = 0;$i < count($MaterialArray);$i++) {
			if( $MaterialArray[$i]->MaterialType == $MaterialType) {
				?>
				<option value = "<? echo $MaterialArray[$i]->id;?>"><? echo $MaterialArray[$i]->MaterialName;?></option>
				<?
			}
		}
	}
	
	if($action == "loadObjectDetailInfo") {
		
		$NumObject = $_POST["NumObject"];
		for($i =0;$i < $NumObject ;$i++) {
			?>
			<div>Object Width</div>
			<div><input type = "text" name = "ObjectWidth[]" value = ""  style = "width:200px;" class = "ui-corner-all" ></div>		
			<div>Object Long</div>
			<div><input type = "text" name = "ObjectLong[]" value = ""  style = "width:200px;" class = "ui-corner-all" ></div>
			<div>Object Location X</div>
			<div><input type = "text" name = "ObjectX[]" value = ""  style = "width:200px;" class = "ui-corner-all" ></div>
			<div>Object Location Y</div>
			<div><input type = "text" name = "ObjectY[]" value = ""  style = "width:200px;" class = "ui-corner-all" ></div>
			<?
		}
	}

	if($action == "Save") {
		$FloorID    = $_POST['FloorID'];
		$JobID = $_POST["JobID"];	
		$ProjectID = $_POST['ProjectID'];
		$JobName = $_POST["JobName"];
		$widthEstimate = $_POST['widthEstimate'];
		$longEstimate = $_POST['longEstimate'];
		$StartPointX  = $_POST['StartPointX'];
		$StartPointY = $_POST['StartPointY'];
		$MaterialID = $_POST['MaterialID'];
		$ObjectWall = $_POST['ObjectWall'];
		$ReservePercent = $_POST['ReservePercent'];
		$ReserveValue = $_POST['ReserveValue'];
		$type = $_POST['JobType'];

		$Floor = new Floor( "" , $db);
		$Floor->FloorID = $FloorID;
		$Floor->JobID = $JobID;
		$Floor->ProjectID = $ProjectID;
		$Floor->JobName = $JobName;
		$Floor->widthEstimate = $widthEstimate;
		$Floor->longEstimate = $longEstimate;
		$Floor->StartPointX = $StartPointX;
		$Floor->StartPointY = $StartPointY;
		$Floor->MaterialID = $MaterialID;
		$Floor->ObjectWall = $ObjectWall;
		$Floor->ReservePercent = $ReservePercent;
		$Floor->ReserveValue = $ReserveValue;
		$Floor->CreatedBy = $Account->Username;

		$Floor->saveFloor();
	}
	
	
	if($action == "saveJobInfo") {
		$id = $_POST["id"];
		$ProjectID = $_POST["ProjectID"];
		$JobName = $_POST["JobName"];
		$JobType = $_POST["JobType"];
		$Material = $_POST["Material"];
		$Long = $_POST["Long"];
		$Width = $_POST["Width"];
		$StartX = $_POST["StartX"];
		$StartY = $_POST["StartY"];
		
		$ObjectWall = $_POST["ObjectWall"];
		$ObjectWidth = $_POST["ObjectWidth"];
		$ObjectLong = $_POST["ObjectLong"];
		$ObjectX = $_POST["ObjectX"];
		$ObjectY = $_POST["ObjectY"];
		
		$Job = new Job( "" , $db);
		$Job->id = $id;
		$Job->ProjectID = $ProjectID;
		$Job->JobName = $JobName;
		$Job->JobType = $JobType;
		$Job->CreatedBy = $Account->Username;
		
		$Job->FloorJobList["Material"] = $Material;
		$Job->FloorJobList["MaterialAmount"] = $MaterialAmount;
		$Job->FloorJobList["Long"] = $Long;
		$Job->FloorJobList["Width"] = $Width;
		$Job->FloorJobList["StartX"] = $StartX;
		$Job->FloorJobList["StartY"] = $StartY;
		$Job->FloorJobList["ObjectWall"] = $ObjectWall;
		$Job->FloorJobList["ObjectWidth"] = $ObjectWidth;
		$Job->FloorJobList["ObjectLong"] = $ObjectLong;
		$Job->FloorJobList["ObjectX"] = $ObjectX;
		$Job->FloorJobList["ObjectY"] = $ObjectY;
		
		
		//print_r($Job);
		$Job->saveJobInfo();
	}
	
	if($action == "getImageInfo") {
		
		$ShiftPointStart = 50;
		
		
		$ProjectID = $_POST["ProjectID"];
		$JobName = $_POST["JobName"];
		$Material = $_POST["MaterialID"];
		
		$Tile = new Material($Material , $db);
		$MaterialX = $Tile->MaterialWidth;
		$MaterialY = $Tile->MaterialHeight;
		
		$Long = $_POST["longEstimate"];
		$Width = $_POST["widthEstimate"];
		$StartX = $_POST["StartPointX"];
		$StartY = $_POST["StartPointY"];
		
		$ObjectWall = $_POST["ObjectWall"];
		$ObjectWidth = $_POST["ObjectWidth"];
		$ObjectLong = $_POST["ObjectLong"];
		$ObjectX = $_POST["ObjectX"];
		$ObjectY = $_POST["ObjectY"];
		
		
		$ImageArray[] = $ShiftPointStart;
		$ImageArray[] = $ShiftPointStart;
		
		$ImageArray[] = $ShiftPointStart;
		$ImageArray[] = $Long + $ShiftPointStart;
		
		$ImageArray[] = $Width + $ShiftPointStart;
		$ImageArray[] = $Long + $ShiftPointStart;
		
		$ImageArray[] = $Width + $ShiftPointStart;
		$ImageArray[] = $ShiftPointStart;
		
		$reserve  = $_POST['ReservePercent'];
		
		// Create a blank image
		$image = imagecreatetruecolor($Width + $ShiftPointStart + $ShiftPointStart , $Long + $ShiftPointStart + $ShiftPointStart);
		// Allocate a color for the polygon
		$red = imagecolorallocate($image, 255, 0, 0);
		$white = imagecolorallocate($image, 255, 255, 255);
		$black = imagecolorallocate($image, 0, 0, 0);
		$arial = '../font/arial.ttf';
		
		$point = ceil(count($ImageArray)/2);
		// Draw the polygon		
		imagefilledpolygon($image, $ImageArray, $point, $red);
		
		$ObjectStorage = array();
		
		for($i = 0;$i < $ObjectWall ;$i++) {
			$ObjectWallArray = array();
			
			$ObjectWallArray[] = $ObjectX[$i]+ $ShiftPointStart;
			$ObjectWallArray[] = $ObjectY[$i]+ $ShiftPointStart;
			
			$ObjectWallArray[] = $ObjectX[$i] + $ObjectWidth[$i]+ $ShiftPointStart;
			$ObjectWallArray[] = $ObjectY[$i] + $ShiftPointStart;
			
			$ObjectWallArray[] = $ObjectX[$i] + $ObjectWidth[$i] + $ShiftPointStart;
			$ObjectWallArray[] = $ObjectY[$i] + $ObjectLong[$i] + $ShiftPointStart;
			
			$ObjectWallArray[] = $ObjectX[$i] + $ShiftPointStart;
			$ObjectWallArray[] = $ObjectY[$i] + $ObjectLong[$i] + $ShiftPointStart;
			
			$ObjectStorage[$i]["StartX"] = $ObjectX[$i];
			$ObjectStorage[$i]["StartY"] = $ObjectY[$i];
			$ObjectStorage[$i]["Width"] = $ObjectWidth[$i];
			$ObjectStorage[$i]["Long"] = $ObjectLong[$i];
			
			//print_r($ObjectWallArray);
			imagefilledpolygon($image, $ObjectWallArray, $point, $white);
		}
		
		imagefill($image, 0, 0, $white);
		//$image = ImageFlip ( $image, 1 );
		
		$MaterialCount = 0;
		
		
		$PointX = $StartX + $ShiftPointStart;
		while($PointX < $Width + $ShiftPointStart +  $MaterialX) {		
			imageline( $image ,  $PointX,  0  ,  $PointX ,  $Long + $ShiftPointStart + $ShiftPointStart ,  $black );
			//imagettftext($image, 6, 0, $PointX + 2  , $Long + $ShiftPointStart  + 20, $black , $arial, $PointX);
			
			$PointY = $StartY + $ShiftPointStart;
			while($PointY < $Long + $ShiftPointStart +  $MaterialY) {		
				imageline( $image ,  $PointX ,  $PointY  ,  $PointX + $MaterialX ,  $PointY  ,  $black );				
				
				if($PointY <= $Long + $ShiftPointStart && $PointX < $Width + $ShiftPointStart ) {
					$MaterialCount++;
				}
				
				$PointY+= $MaterialY;	
				
				if($PointY == $Long + $ShiftPointStart +  $MaterialY && $PointX < $Width + $ShiftPointStart) {
					$MaterialCount--;
				}
			}
			
			$PointY = $StartY + $ShiftPointStart;
			while($PointY >  $ShiftPointStart -  $MaterialY) {		
				imageline( $image ,  $PointX ,  $PointY  ,  $PointX + $MaterialX ,  $PointY  ,  $black );
				
				if($PointY >= $ShiftPointStart && $PointX < $Width + $ShiftPointStart) {
					$MaterialCount++;
				}
				
				$PointY-= $MaterialY;
				
				if($PointY == $ShiftPointStart -  $MaterialY && $PointX < $Width + $ShiftPointStart) {
					$MaterialCount--;
				}				
			}				
			$PointX+= $MaterialX;			
		}
		
		
		$PointX = $StartX + $ShiftPointStart;
		while($PointX >  $ShiftPointStart -  $MaterialX) {		
			imageline( $image ,  $PointX,  0  ,  $PointX ,  $Long + $ShiftPointStart + $ShiftPointStart ,  $black );
			
			$PointY = $StartY + $ShiftPointStart;
			while($PointY < $Long + $ShiftPointStart +  $MaterialY) {		
				imageline( $image ,  $PointX ,  $PointY  ,  $PointX - $MaterialX ,  $PointY  ,  $black );								
				if($PointY <= $Long + $ShiftPointStart && $PointX > $ShiftPointStart ) {
					$MaterialCount++;
				}
				$PointY+= $MaterialY;	
				if($PointY == $Long + $ShiftPointStart +  $MaterialY && $PointX > $ShiftPointStart) {
					$MaterialCount--;
				}
			}			
			$PointY = $StartY + $ShiftPointStart;
			while($PointY >  $ShiftPointStart -  $MaterialY) {		
				imageline( $image ,  $PointX ,  $PointY  ,  $PointX - $MaterialX ,  $PointY  ,  $black );
				if($PointY >=  $ShiftPointStart && $PointX > $ShiftPointStart) {
					$MaterialCount++;
				}
				$PointY-= $MaterialY;
				if($PointY == $ShiftPointStart -  $MaterialY && $PointX > $ShiftPointStart) {
					$MaterialCount--;
				}
			}
			$PointX-= $MaterialX;
		}
		
				
		for($i = 0;$i < count($ObjectStorage) ;$i++) {			
			
			$StartObjX = ceil($ObjectStorage[$i]["StartX"] / $MaterialX);
			if($StartX > 0) {
				$PointX =  ($StartObjX * $MaterialX) + $StartX + $ShiftPointStart - $MaterialX;
			} else {
				$PointX =  ($StartObjX * $MaterialX) + $StartX + $ShiftPointStart;
			}
			
			while($PointX <= $ObjectStorage[$i]["StartX"] + $ObjectStorage[$i]["Width"] + $ShiftPointStart +  $MaterialX) {						
			
				$StartObjY = ceil($ObjectStorage[$i]["StartY"] / $MaterialY);
				if($StartY > 0) {
					$PointY = ($StartObjY * $MaterialY) + $StartY + $ShiftPointStart - $MaterialY;
				} else {
					$PointY = ($StartObjY * $MaterialY) + $StartY + $ShiftPointStart;
				}
				
				while($PointY < $ObjectStorage[$i]["StartY"] +  $ObjectStorage[$i]["Long"] + $ShiftPointStart +  $MaterialY) {								
					//echo "[ $PointX , $PointY ] ";										
					
					if(	
						$PointY + $MaterialY <= $ObjectStorage[$i]["StartY"] + $ObjectStorage[$i]["Long"] + $ShiftPointStart && 
						$PointX + $MaterialX <= $ObjectStorage[$i]["StartX"] +  $ObjectStorage[$i]["Width"] + $ShiftPointStart && 
						$PointY >= $ObjectStorage[$i]["StartY"] + $ShiftPointStart &&
						$PointX >= $ObjectStorage[$i]["StartX"] + $ShiftPointStart 
					) {												
						$MaterialCount--;
						//echo " Decrease Material 1";											
					} else 
					if( 
						$PointY + $MaterialY >= $ObjectStorage[$i]["StartY"] + $ShiftPointStart && 
						$PointX + $MaterialX >= $ObjectStorage[$i]["StartX"] + $ShiftPointStart &&
						$PointY <=  $ShiftPointStart &&
						$PointX <=  $ShiftPointStart 
					){
						$MaterialCount--;
						//echo " Decrease Material 2";	
					} else 
					if( 
						$PointY + $MaterialY >= $ObjectStorage[$i]["StartY"] + $ShiftPointStart && 
						$PointX + $MaterialX >= $ObjectStorage[$i]["StartX"] + $ShiftPointStart &&
						$PointY >  $ShiftPointStart &&
						$PointY + $MaterialY <=  $ObjectStorage[$i]["StartY"] + $ObjectStorage[$i]["Long"] + $ShiftPointStart &&
						$PointX <=  $ShiftPointStart 
					){
						$MaterialCount--;
						//echo " Decrease Material 3";	
					} else 
					if( 
						$PointY + $MaterialY >= $ObjectStorage[$i]["StartY"] + $ShiftPointStart && 
						$PointX + $MaterialX >= $ObjectStorage[$i]["StartX"] + $ShiftPointStart &&
						$PointY <=  $ShiftPointStart &&						
						$PointX >  $ShiftPointStart &&
						$PointX + $MaterialX <=  $ObjectStorage[$i]["StartX"] + $ObjectStorage[$i]["Width"] + $ShiftPointStart 
					){
						$MaterialCount--;
						//echo " Decrease Material 4";	
					} else 
					if(	
						$PointY < $ObjectStorage[$i]["StartY"] + $ObjectStorage[$i]["Long"] + $ShiftPointStart && 
						$PointX < $ObjectStorage[$i]["StartX"] +  $ObjectStorage[$i]["Width"] + $ShiftPointStart && 
						$PointY + $MaterialY > $ObjectStorage[$i]["StartY"] + $ObjectStorage[$i]["Long"] + $ShiftPointStart && 
						$PointX + $MaterialX > $ObjectStorage[$i]["StartX"] +  $ObjectStorage[$i]["Width"] + $ShiftPointStart &&
						$PointY + $MaterialY > $Long + $ShiftPointStart && 
						$PointX + $MaterialX > $Width + $ShiftPointStart &&
						$ObjectStorage[$i]["StartY"] + $ObjectStorage[$i]["Long"] == $Long &&
						$ObjectStorage[$i]["StartX"] + $ObjectStorage[$i]["Width"] == $Width 
					) {												
						$MaterialCount--;
						//echo " Decrease Material 5";											
					} else 
					if(	
						$PointY < $ObjectStorage[$i]["StartY"] + $ObjectStorage[$i]["Long"] + $ShiftPointStart && 
						$PointX >= $ObjectStorage[$i]["StartX"] + $ShiftPointStart && 
						$PointY + $MaterialY > $ObjectStorage[$i]["StartY"] + $ObjectStorage[$i]["Long"] + $ShiftPointStart &&
						$PointX + $MaterialX < $ObjectStorage[$i]["StartX"] +  $ObjectStorage[$i]["Width"] + $ShiftPointStart &&
						$PointY + $MaterialY > $Long + $ShiftPointStart &&
						$ObjectStorage[$i]["StartY"] + $ObjectStorage[$i]["Long"] == $Long 
					) {												
						$MaterialCount--;
						//echo " Decrease Material 6";											
					} else 
					if(	
						$PointY >= $ObjectStorage[$i]["StartY"] + $ShiftPointStart && 
						$PointX < $ObjectStorage[$i]["StartX"] +  $ObjectStorage[$i]["Width"] + $ShiftPointStart && 
						$PointY + $MaterialY < $ObjectStorage[$i]["StartY"] + $ObjectStorage[$i]["Long"] + $ShiftPointStart && 
						$PointX + $MaterialX > $ObjectStorage[$i]["StartX"] +  $ObjectStorage[$i]["Width"] + $ShiftPointStart &&
						$PointX + $MaterialX > $Width + $ShiftPointStart &&
						$ObjectStorage[$i]["StartX"] + $ObjectStorage[$i]["Width"] == $Width 
						
					) {												
						$MaterialCount--;
						//echo " Decrease Material 7";											
					}
					
					//echo "<br/>";
					
					$PointY+= $MaterialY;
				}
				
				$PointX+= $MaterialX;
			}			
		}
		
		$net = $MaterialCount+($reserve/100);
		$ceil = ceil($net);
		
		imagepng($image , "../resource/image/$JobName.png");
		imagedestroy($image);
		

		echo "<div><img src = '../resource/image/$JobName.png?".rand(0,32000)."' /></div>";
		echo "<input type = 'hidden' name = 'MaterialAmount' value = '$MaterialCount'>";
		echo "<div>Total material = $MaterialCount</div>";
		echo "<div>Reserve material = $net</div>";
		echo "<div>Net Total material = $ceil</div>";
	}
	
?>
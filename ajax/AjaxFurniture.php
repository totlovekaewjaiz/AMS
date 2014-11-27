<?php
	
	
	require("library.php");
	
	$action = $_REQUEST["action"];
	

		
	if($action == "getImageInfo") {
		
		
		$Height = $_POST["Height"];
		$Width = $_POST["Width"];
		$Depth = $_POST["Depth"];
		$Height1 = $_POST["Height1"];
		$Width1 = $_POST["Width1"];
		$Depth1 = $_POST["Depth1"];
		
		$numdoor = $_POST["numdoor"];
		
		$ImageArray = array();
		$pointArray = array();
		
		$ImageArray[] = 50;
		$ImageArray[] = 50;
		
		$pointArray[] = 0;
		$pointArray[] = 0;
		
		$ImageArray[] = 50;
		$ImageArray[] = $Height + 50;
		
		$pointArray[] = 0;
		$pointArray[] = $Height ;
		
		$ImageArray[] = $Width + 50;
		$ImageArray[] = $Height + 50;
		
		$pointArray[] = $Width;
		$pointArray[] = $Height ;
		
		$ImageArray[] = $Width + 50;
		$ImageArray[] = $Height1 + 50;
		
		$pointArray[] = $Width;
		$pointArray[] = $Height1 ;
		
		$ImageArray[] = $Width + $Width1 + 50;
		$ImageArray[] = $Height1 + 50;
		
		$pointArray[] = $Width + $Width1;
		$pointArray[] = $Height1 ;
		
		$ImageArray[] = $Width + $Width1 + 50;
		$ImageArray[] = 50;
		
		$pointArray[] = $Width + $Width1;
		$pointArray[] = 0 ;
		
		
		$pointArray[] = $pointArray[0];
		$pointArray[] = $pointArray[1];
		
		$RightValue = 0;
		$LeftValue = 0;
		for($i =0;$i < count($pointArray);$i++) {
			if($i%2 == 0) {
				if(!empty($pointArray[($i+3)])) {
					$RightValue+= $pointArray[$i] * $pointArray[($i+3)];
				}
			} else {
				if(!empty($pointArray[($i+1)])) {
					$LeftValue+= $pointArray[$i] * $pointArray[($i+1)];
				}
			}
		}
		
		$Summary = ($RightValue + $LeftValue)/2;
		
		// Create a blank image
		$image = imagecreatetruecolor($Width + $Width1  + 50 , $Height + $Height1 + 50);
		// Allocate a color for the polygon
		$red = imagecolorallocate($image, 255, 0, 0);
		$white = imagecolorallocate($image, 255, 255, 255);
		$black = imagecolorallocate($image, 0, 0, 0);
		$arial = 'arial.ttf';
		
		$point = ceil(count($ImageArray)/2);
		// Draw the polygon
		//imagepolygon($image, $ImageArray, $point ,$black);
		imagefilledpolygon($image, $ImageArray, $point, $red);
		imagefill($image, 0, 0, $white);
		
		if(!empty($Height1) && !empty($Width1) &&!empty($Depth1) ) {
			imageline( $image ,  $Width + 50 ,  50  ,  $Width + 50  , $Height + 50  ,  $black );
		}
		
		if($numdoor == 2) {
			imageline( $image ,  $Width  + 50,  50  ,  50 , floor($Height /2)  + 50 ,  $black );
			imageline( $image ,  50,  floor($Height /2)  + 50   ,  $Width  + 50 , $Height + 50  ,  $black );
			
			imageline( $image ,  $Width + 50,  50  , $Width + $Width1 + 50 , floor($Height /2)  + 50 ,  $black );
			imageline( $image ,  $Width + $Width1 + 50,  floor($Height /2)  + 50   ,  $Width  + 50 , $Height + 50  ,  $black );
		}
		
		if($numdoor == 4) {
			imageline( $image ,  floor(($Width)/2)  + 50,  50  ,  floor(($Width)/2)  + 50 , $Height + 50  ,  $black );
			
			imageline( $image ,  floor(($Width)/2)  + 50,  50  ,  50 , floor($Height /2)  + 50 ,  $black );
			imageline( $image ,  50,  floor($Height /2)  + 50   ,  floor(($Width)/2)  + 50 , $Height + 50  ,  $black );
			
			imageline( $image ,  floor(($Width)/2)  + 50,  50  , $Width + 50 , floor($Height /2)  + 50 ,  $black );
			imageline( $image ,  $Width + 50,  floor($Height /2)  + 50   ,  floor(($Width)/2)  + 50 , $Height + 50  ,  $black );
			
			imageline( $image ,  $Width + 50 + floor($Width1 / 2) ,  50  ,  $Width + 50 + floor($Width1 / 2)  , $Height1 + 50  ,  $black );
			
			
			imageline( $image ,  $Width + floor(($Width1)/2)  + 50,  50  ,  $Width + 50 , floor($Height1 /2)  + 50 ,  $black );
			imageline( $image ,  $Width + 50,  floor($Height1 /2)  + 50   ,  $Width + floor(($Width1)/2)  + 50 , $Height1 + 50  ,  $black );
			
			imageline( $image ,  $Width + floor(($Width1)/2)  + 50,  50  , $Width + $Width1 + 50 , floor($Height1 /2)  + 50 ,  $black );
			imageline( $image ,  $Width + $Width1 + 50,  floor($Height1 /2)  + 50   ,  $Width + floor(($Width1)/2)  + 50 , $Height1 + 50  ,  $black );
		}
		
		$image = ImageFlip ( $image, 1 );
		imagepng($image , "file.png");
		imagedestroy($image);
		
		
		echo "Front View <br/>";
		echo "<img src = 'file.png' />";
		echo "<br/>";
		echo "<br/>";
		echo "Font Area = $Summary cm * cm";
		echo "<hr/>";
		echo "<br/>";
		
		$ImageArray = array();
		$pointArray = array();
		
		$ImageArray[] = 50;
		$ImageArray[] = 50;
		
		$pointArray[] = 0;
		$pointArray[] = 0;
		
		$ImageArray[] = 50;
		$ImageArray[] = $Depth + 50;
		
		$pointArray[] = 0;
		$pointArray[] = $Depth;
		
		$ImageArray[] = $Width + 50;
		$ImageArray[] = $Depth + 50;
		
		$pointArray[] = $Width;
		$pointArray[] = $Depth;
		
		$ImageArray[] = $Width + 50;
		$ImageArray[] = $Depth1 + 50;
		
		$pointArray[] = $Width;
		$pointArray[] = $Depth1;
		
		$ImageArray[] = $Width + $Width1 + 50;
		$ImageArray[] = $Depth1 + 50;
		
		$pointArray[] = $Width + $Width1;
		$pointArray[] = $Depth1;
		
		$ImageArray[] = $Width + $Width1 + 50;
		$ImageArray[] = 50;
		
		$pointArray[] = $Width + $Width1;
		$pointArray[] = 0;
		
		
		$pointArray[] = $pointArray[0];
		$pointArray[] = $pointArray[1];
		
		$RightValue = 0;
		$LeftValue = 0;
		for($i =0;$i < count($pointArray);$i++) {
			if($i%2 == 0) {
				if(!empty($pointArray[($i+3)])) {
					$RightValue+= $pointArray[$i] * $pointArray[($i+3)];
				}
			} else {
				if(!empty($pointArray[($i+1)])) {
					$LeftValue+= $pointArray[$i] * $pointArray[($i+1)];
				}
			}
		}
		
		$Summary = ($RightValue + $LeftValue)/2;
		
		// Create a blank image
		$image = imagecreatetruecolor($Width + $Width1 + 50 , $Depth + $Depth1 + 50);
		// Allocate a color for the polygon
		$red = imagecolorallocate($image, 255, 0, 0);
		$white = imagecolorallocate($image, 255, 255, 255);
		$black = imagecolorallocate($image, 0, 0, 0);
		$arial = 'arial.ttf';
		
		$point = ceil(count($ImageArray)/2);
		// Draw the polygon
		//imagepolygon($image, $ImageArray, $point ,$black);
		imagefilledpolygon($image, $ImageArray, $point, $red);
		imagefill($image, 0, 0, $white);
		
		if(!empty($Height1) && !empty($Width1) &&!empty($Depth1) ) {
			imageline( $image ,  $Width + 50 ,  50  ,  $Width + 50  , $Depth + 50  ,  $black );
		}
		
		$image = ImageFlip ( $image, 1 );
		imagepng($image , "file1.png");
		imagedestroy($image);
		
		echo "Top View <br/>";
		echo "<img src = 'file1.png' />";
		echo "<br/>";
		echo "<br/>";
		echo "Top Area = $Summary cm * cm";
		echo "<hr/>";
		echo "<br/>";
		
		$ImageArray = array();
		$pointArray = array();
		
		$ImageArray[] = 50;
		$ImageArray[] = 50;
		
		$pointArray[] = 0;
		$pointArray[] = 0;
		
		$ImageArray[] = $Depth + 50;
		$ImageArray[] = 50;
		
		$pointArray[] = $Depth;
		$pointArray[] = 0;
		
		$ImageArray[] = $Depth + 50;
		$ImageArray[] = $Height + 50;
		
		$pointArray[] = $Depth;
		$pointArray[] = $Height;
		
		$ImageArray[] = 50;
		$ImageArray[] = $Height + 50;
		
		$pointArray[] = 0;
		$pointArray[] = $Height;
		
		$pointArray[] = $pointArray[0];
		$pointArray[] = $pointArray[1];
		
		$RightValue = 0;
		$LeftValue = 0;
		for($i =0;$i < count($pointArray);$i++) {
			if($i%2 == 0) {
				if(!empty($pointArray[($i+3)])) {
					$RightValue+= $pointArray[$i] * $pointArray[($i+3)];
				}
			} else {
				if(!empty($pointArray[($i+1)])) {
					$LeftValue+= $pointArray[$i] * $pointArray[($i+1)];
				}
			}
		}
		
		$Summary = ($RightValue + $LeftValue)/2;

		// Create a blank image
		$image = imagecreatetruecolor($Depth  + 50 , $Height + 50);
		// Allocate a color for the polygon
		$red = imagecolorallocate($image, 255, 0, 0);
		$white = imagecolorallocate($image, 255, 255, 255);
		$black = imagecolorallocate($image, 0, 0, 0);
		$arial = 'arial.ttf';
		
		$point = ceil(count($ImageArray)/2);
		// Draw the polygon
		//imagepolygon($image, $ImageArray, $point ,$black);
		imagefilledpolygon($image, $ImageArray, $point, $red);
		imagefill($image, 0, 0, $white);
		
		echo "Side View <br/>";
		
		imagepng($image , "file2.png");
		imagedestroy($image);
		
		echo "<div style = 'float:left;margin-right:20px;'>";
		echo "<img src = 'file2.png' />";
		echo "<br/>";
		echo "<br/>";
		echo "<div>Side1 Area = $Summary cm * cm</div>";
		echo "</div>";
		
		if(!empty($Height1) && !empty($Width1) &&!empty($Depth1) ) {
			$ImageArray = array();
			$pointArray = array();
			
			$ImageArray[] = 50;
			$ImageArray[] = 50;
			
			$pointArray[] = 0;
			$pointArray[] = 0;
		
			$ImageArray[] = $Depth1 + 50;
			$ImageArray[] = 50;
			
			$pointArray[] = $Depth1;
			$pointArray[] = 0;
			
			$ImageArray[] = $Depth1 + 50;
			$ImageArray[] = $Height1 + 50;
			
			$pointArray[] = $Depth1;
			$pointArray[] = $Height1;
			
			$ImageArray[] = 50;
			$ImageArray[] = $Height1 + 50;
			
			$pointArray[] = 0;
			$pointArray[] = $Height1;
			
			$pointArray[] = $pointArray[0];
			$pointArray[] = $pointArray[1];
			
			$RightValue = 0;
			$LeftValue = 0;
			for($i =0;$i < count($pointArray);$i++) {
				if($i%2 == 0) {
					if(!empty($pointArray[($i+3)])) {
						$RightValue+= $pointArray[$i] * $pointArray[($i+3)];
					}
				} else {
					if(!empty($pointArray[($i+1)])) {
						$LeftValue+= $pointArray[$i] * $pointArray[($i+1)];
					}
				}
			}
			
			$Summary = ($RightValue + $LeftValue)/2;

			// Create a blank image
			$image = imagecreatetruecolor($Depth1  + 50 , $Height1 + 50);
			// Allocate a color for the polygon
			$red = imagecolorallocate($image, 255, 0, 0);
			$white = imagecolorallocate($image, 255, 255, 255);
			$black = imagecolorallocate($image, 0, 0, 0);
			$arial = 'arial.ttf';
			
			$point = ceil(count($ImageArray)/2);
			// Draw the polygon
			//imagepolygon($image, $ImageArray, $point ,$black);
			imagefilledpolygon($image, $ImageArray, $point, $red);
			imagefill($image, 0, 0, $white);
			
			imagepng($image , "file3.png");
			imagedestroy($image);
			
				echo "<div style = 'float:left;margin-right:20px;'>";
				echo "<img src = 'file3.png' />";
				echo "<br/>";
				echo "<br/>";
				echo "<div>Side2 Area = $Summary cm * cm</div>";
				echo "</div>";
		}
		
		
		echo "<div style = 'clear:both'></div>";
		echo "<hr/>";
		echo "<br/>";
	}
	
	if($action == "getImageArea") {
		
		$DataPoint = $_POST["dataPoint"];
		$pointArray = array();
		
		foreach($DataPoint as $index => $point) {
			if($point != "") {
				$pointArray[] = $point;
			}
		}
		
		$pointArray[] = $pointArray[0];
		$pointArray[] = $pointArray[1];
		
		$RightValue = 0;
		$LeftValue = 0;
		for($i =0;$i < count($pointArray);$i++) {
			if($i%2 == 0) {
				if(!empty($pointArray[($i+3)])) {
					$RightValue+= $pointArray[$i] * $pointArray[($i+3)];
				}
			} else {
				if(!empty($pointArray[($i+1)])) {
					$LeftValue+= $pointArray[$i] * $pointArray[($i+1)];
				}
			}
		}
		
		$Summary = ($RightValue + $LeftValue)/2;
		
		$MX = 50;
		$MY = 50;
		
		$MaTcal = ceil($Summary/($MX * $MY));
		
		//echo "<div>Total area = $Summary</div>";
		//echo "<div>Material cal = $MaTcal</div>";
	}
?>
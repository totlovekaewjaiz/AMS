<?php

	class Floor {
	
		var $db;
		
		var $FloorID;
		var $JobID;
		var $ProjectID;
		var $JobName;
		var $widthEstimate;
		var $longEstimate;
		var $StartPointX;
		var $StartPointY;
		var $MaterialID;
		var $ObjectWall;
		var $ReservePercent;
		var $ReserveValue;

		var $CreatedBy;
		var $CreatedDate;
		var $UpdatedBy;
		var $UpdatedDate;

		function __construct( $JobID , $db ){
			$this->db = $db;
			$this->JobID = $JobID;
			$this->loadFloorInfo();
		}

		
		function loadFloorInfo() {
			
			$params = array();
			$sql = "SELECT * FROM work_floor WHERE JobID = ? ";
			$params["JobID"] = $this->JobID;
			
			$resultArray = $this->db->select ( $sql , $params );
			$result = $resultArray["datas"];
			$numrows = $resultArray["numrows"];
			
			$datas = mysql_fetch_array($result);
			
			$this->FloorID = $datas["FloorID"];
			$this->JobID = $datas["JobID"];
			$this->ProjectID = $datas["ProjectID"];
			$this->JobName = $datas["JobName"];
			$this->widthEstimate = $datas["widthEstimate"];
			$this->longEstimate = $datas["longEstimate"];
			$this->StartPointX = $datas["StartPointX"];
			$this->StartPointY = $datas["StartPointY"];
			$this->MaterialID = $datas["MaterialID"];
			$this->ObjectWall = $datas["ObjectWall"];
			$this->ReservePercent = $datas["ReservePercent"];
			$this->ReserveValue = $datas["ReserveValue"];
			
			$this->CreatedBy = $datas["CreatedBy"];
			$this->CreatedDate = $datas["CreatedDate"];
			$this->UpdatedBy = $datas["UpdatedBy"];
			$this->UpdatedDate = $datas["UpdatedDate"];
		}
		
		function saveFloor() {
			
			if(!empty($this->FloorID)) {
					
				$params = array();

				$sql = "UPDATE work_floor SET 
						projectID = ? , 
						JobID = ? ,
						JobName = ? , 
						widthEstimate = ? , 
						longEstimate = ? , 
						StartPointX = ? , 
						StartPointY = ? , 
						MaterialID = ? , 
						ObjectWall = ? , 
						ReservePercent = ? , 
						ReserveValue = ? , 
						UpdatedBy = ? ,
						UpdatedDate = NOW()
						WHERE FloorID = ?";
				

				$params["ProjectID"] = $this->ProjectID;
				$params["JobID"] 	= $this->JobID;
				$params["JobName"] 	= $this->JobName;
				$params["widthEstimate"] = $this->widthEstimate;
				$params["longEstimate"] = $this->longEstimate;
				$params["StartPointX"] = $this->StartPointX;
				$params["StartPointY"] = $this->StartPointY;
				$params["MaterialID"] = $this->MaterialID;
				$params["ObjectWall"] = $this->ObjectWall;
				$params["ReservePercent"] = $this->ReservePercent;
				$params["ReserveValue"] = $this->ReserveValue;
				$params["UpdatedBy"] = $this->CreatedBy;
				$params["FloorID"] = $this->FloorID;

				$this->db->execute ( $sql , $params );
	
			} else {
				$params = array();
				$sql = "INSERT INTO work_floor (FloorID , ProjectID , JobID , JobName , widthEstimate , longEstimate , StartPointX , StartPointY , MaterialID , ObjectWall , ReservePercent , ReserveValue , CreatedBy , CreatedDate , UpdatedBy , UpdatedDate)
						VALUES (NULL , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , NOW() , ? , NOW())";

				$params["ProjectID"] = $this->ProjectID;
				$params["JobID"] = $this->JobID;
				$params["JobName"] = $this->JobName;
				$params["widthEstimate"] = $this->widthEstimate;
				$params["longEstimate"] = $this->longEstimate;
				$params["StartPointX"] = $this->StartPointX;
				$params["StartPointY"] = $this->StartPointY;
				$params["MaterialID"] = $this->MaterialID;
				$params["ObjectWall"] = $this->ObjectWall;
				$params["ReservePercent"] = $this->ReservePercent;
				$params["ReserveValue"] = $this->ReserveValue;
				$params["CreatedBy"] = $this->CreatedBy;
				$params["UpdatedBy"] = $this->CreatedBy;
				
				$this->db->execute ( $sql , $params );
			}
					
		}
	
	}
	
?>

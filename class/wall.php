<?php

	class Wall {
	
		function __construct( $JobID , $db ){
			$this->db = $db;
			$this->JobID = $JobID;
			$this->loadWallInfo();
		}

		
		function loadWallInfo() {
			
			$params = array();
			$sql = "SELECT * FROM work_wall WHERE JobID = ? ";
			$params["JobID"] = $this->JobID;
			
			$resultArray = $this->db->select ( $sql , $params );
			$result = $resultArray["datas"];
			$numrows = $resultArray["numrows"];
			
			$datas = mysql_fetch_array($result);
			
			$this->WallID = $datas["WallID"];
			$this->JobID = $datas["JobID"];
			$this->ProjectID = $datas["ProjectID"];
			$this->JobName = $datas["JobName"];
			$this->Width = $datas["Width"];
			$this->Slot = $datas["Slot"];
			$this->Height = $datas["Height"];

			
			$this->CreatedBy = $datas["CreatedBy"];
			$this->CreatedDate = $datas["CreatedDate"];
			$this->UpdatedBy = $datas["UpdatedBy"];
			$this->UpdatedDate = $datas["UpdatedDate"];
		}
		
		function saveWall() {
			
			if(!empty($this->WallID)) {
					
				$params = array();

				$sql = "UPDATE work_wall SET 
						ProjectID = ? , 
						JobID = ? ,
						JobName = ? , 
						Height = ? , 
						Width = ? , 
						Slot = ? , 
						UpdatedBy = ? ,
						UpdatedDate = NOW()
						WHERE WallID = ?";
				

				$params["ProjectID"] = $this->ProjectID;
				$params["JobID"] 	= $this->JobID;
				$params["JobName"] 	= $this->JobName;
				$params["Height"] = $this->Height;
				$params["Width"] = $this->Width;
				$params["Slot"] = $this->Slot;
				$params["UpdatedBy"] = $this->CreatedBy;
				$params["WallID"] = $this->WallID;

				$this->db->execute ( $sql , $params );
	
			} else {
				$params = array();
			
				$sql = "INSERT INTO work_wall (WallID , ProjectID , JobID , JobName , Height , Width , Slot , CreatedBy , CreatedDate , UpdatedBy , UpdatedDate)
						VALUES (NULL , ? , ? , ? , ? , ? , ? , ? , NOW() , ? , NOW())";

				$params["ProjectID"] = $this->ProjectID;
				$params["JobID"] = $this->JobID;
				$params["JobName"] = $this->JobName;
				$params["Height"] = $this->Height;
				$params["Width"] = $this->Width;
				$params["Slot"] = $this->Slot;
				$params["CreatedBy"] = $this->CreatedBy;
				$params["UpdatedBy"] = $this->CreatedBy;
				
				$this->db->execute ( $sql , $params );
			}
					
		}
	
	}
	
?>

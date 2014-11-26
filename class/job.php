<?php
	class Job {
		var $db;
		
		var $id;
		var $ProjectID;
		var $JobType;
		var $JobName;
		var $JobDescription;
		var $CreatedBy;
		var $CreatedDate;
		var $UpdatedBy;
		var $UpdatedDate;
		var $Status;
		
		
		function __construct( $JobID , $db ){
			$this->db = $db;
			$this->id = $JobID;
			$this->loadJobInfo();
		}
		
		function loadJobInfo() {
			
			$params = array();
			$sql = "SELECT * FROM job WHERE id = ? ";
			$params["id"] = $this->id;
			$resultArray = $this->db->select ( $sql , $params );
			$result = $resultArray["datas"];
			$numrows = $resultArray["numrows"];
			
			$datas = mysql_fetch_array($result);
			
			$this->id = $datas["id"];
			$this->ProjectID = $datas["ProjectID"];
			$this->JobType = $datas["JobType"];
			$this->JobName = $datas["JobName"];
			$this->JobDescription = $datas["JobDescription"];
			
			$this->CreatedBy = $datas["CreatedBy"];
			$this->CreatedDate = $datas["CreatedDate"];
			$this->UpdatedBy = $datas["UpdatedBy"];
			$this->UpdatedDate = $datas["UpdatedDate"];
			
		}
		
		function deleteJob() {
			$sql = "UPDATE job SET Status = 'N' WHERE id = ? ";
			$params["id"] = $this->id;
			$this->db->execute ( $sql , $params );
		}
		
		function saveJobInfo() {
			
			if(!empty($this->id)) {
				
				$params = array();
				$sql = "UPDATE job SET 
						ProjectID = ? ,
						JobType = ? , 
						JobName = ? ,
						JobDescription = ? , 
						UpdatedBy = ?, 
						UpdatedDate = NOW() 
						WHERE id = ? 
						";
				$params["ProjectID"] = $this->ProjectID;
				$params["JobType"] = $this->JobType;
				$params["JobName"] = $this->JobName;
				$params["JobDescription"] = $this->JobDescription;
				$params["UpdatedBy"] = $this->CreatedBy;
				$params["id"] = $this->id;
				$this->db->execute ( $sql , $params );
			} else {
				$params = array();
				$sql = "INSERT INTO job (id , ProjectID , JobType , JobName , JobDescription , CreatedBy , CreatedDate , UpdatedBy , UpdatedDate , Status) 
						VALUES (NULL , ? , ? , ? , ? , ? , NOW() , ? , NOW() , 'Y')";
				$params["ProjectID"] = $this->ProjectID;
				$params["JobType"] = $this->JobType;
				$params["JobName"] = $this->JobName;
				$params["JobDescription"] = $this->JobDescription;
				$params["CreatedBy"] = $this->CreatedBy;
				$params["UpdatedBy"] = $this->CreatedBy;
				$this->db->execute ( $sql , $params );
				
				$params = array();
				$sql = "SELECT MAX(id) as JobID FROM job WHERE CreatedBy = ? ";
				$params["CreatedBy"] = $this->CreatedBy;
				$resultArray = $this->db->select ( $sql , $params );
				$result = $resultArray["datas"];
				$numrows = $resultArray["numrows"];
				
				$datas = mysql_fetch_array($result);
				
				$this->id = $datas["JobID"];
			}
			
			
			
		}			
	}
?>
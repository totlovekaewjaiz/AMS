<?php

	class Project {
	
		var $db;
		
		var $id;
		var $ProjectName;
		var $ProjectDescription;
		var $Start;
		var $End;
		var $CreatedBy;
		var $CreatedDate;
		var $UpdatedBy;
		var $UpdatedDate;
		var $Status;
		var $ProjectStatus;

		var $MaterialList = array();
		var $JobList = array();
		
		function __construct( $projectID , $db ){
			$this->db = $db;
			$this->id = $projectID;
			$this->loadProjectInfo();
		}
		
		
		function loadProjectInfo() {
			
			$params = array();
			$sql = "SELECT * FROM project WHERE id = ? ";
			$params["id"] = $this->id;
			$resultArray = $this->db->select ( $sql , $params );
			$result = $resultArray["datas"];
			$numrows = $resultArray["numrows"];
			
			$datas = mysql_fetch_array($result);
			
			$this->id = $datas["id"];
			$this->ProjectName = $datas["ProjectName"];
			$this->ProjectDescription = $datas["ProjectDescription"];
			$this->Start = $datas["Start"];
			$this->End = $datas["End"];
			$this->Status = $datas["Status"];
			$this->ProjectStatus = $datas["ProjectStatus"];
			
			$this->CreatedBy = $datas["CreatedBy"];
			$this->CreatedDate = $datas["CreatedDate"];
			$this->UpdatedBy = $datas["UpdatedBy"];
			$this->UpdatedDate = $datas["UpdatedDate"];
			
			$params = array();
			$sql = "SELECT * FROM project_material WHERE ProjectID = ? ";
			$params["id"] = $this->id;
			$resultArray = $this->db->select ( $sql , $params );
			$result = $resultArray["datas"];
			$numrows = $resultArray["numrows"];
			
			for($i =0;$i < $numrows;$i++) {
				$datas = mysql_fetch_array($result);
				
				$this->MaterialList[$i] = $datas["MaterialID"];
			}
		}
		
		function saveProject() {
			
			if(!empty($this->id)) {
				
				$params = array();
				
				$sql = "UPDATE project SET 
						ProjectName = ? , 
						ProjectDescription = ? , 
						`Start` = ? , 
						`End` = ? ,  
						UpdatedBy = ? ,
						Status = ? ,
						WHERE id = ? 
						";
				$params["ProjectName"] = $this->ProjectName;
				$params["ProjectDescription"] = $this->ProjectDescription;
				$params["Start"] = $this->Start;
				$params["End"] = $this->End;
				$params["UpdatedBy"] = $this->CreatedBy;
				$params["ProjectStatus"] = $this->ProjectStatus;
				$params["id"] = $this->id;
				
				
				$this->db->execute ( $sql , $params );
			} else {
				$params = array();
				$sql = "INSERT INTO project (id , ProjectName , ProjectDescription , `Start` , `End`  , CreatedBy , CreatedDate , UpdatedBy , UpdatedDate , Status)
						VALUES (NULL , ? , ? , ? , ? , ? , NOW() , ? , NOW() , 'Y')";
				$params["ProjectName"] = $this->ProjectName;
				$params["ProjectDescription"] = $this->ProjectDescription;
				$params["Start"] = $this->Start;
				$params["End"] = $this->End;
				$params["CreatedBy"] = $this->CreatedBy;
				$params["UpdatedBy"] = $this->CreatedBy;
				
				$this->db->execute ( $sql , $params );
			}
					
		}
		
		function deleteProject() {
			
			$sql = "UPDATE project SET Status = 'N' WHERE id = ? ";
			$params["id"] = $this->id;
				
			$this->db->execute ( $sql , $params );
		}
		
		function savePorjectMaterial() {
			
			$sql = "DELETE FROM project_material WHERE ProjectID = ? ";
			$params["id"] = $this->id;
				
			$this->db->execute ( $sql , $params );
			
			foreach($this->MaterialList as $index => $MaterialID) {
				$params = array();
				$sql = "INSERT INTO project_material (id , ProjectID , MaterialID , CreatedBy , CreatedDate , UpdatedBy , 	UpdatedDate )
						VALUES (NULL , ? , ? , ? , NOW() , ? , NOW())";
				$params["id"] = $this->id;
				$params["MaterialID"] = $MaterialID;
				$params["CreatedBy"] = $this->CreatedBy;
				$params["UpdatedBy"] = $this->CreatedBy;
				
				$this->db->execute ( $sql , $params );
			}
		}
	}
	
?>

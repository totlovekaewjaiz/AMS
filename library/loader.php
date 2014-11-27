v
	class Loader {
		
		var $db;
		
		function __construct( $db ){
			$this->db = $db;
		}
		
		function loadAllMenu() {
			$Array = array();
			$params = array();
			$sql = "SELECT * FROM  menu WHERE Status = 'Y' ";
			$resultArray = $this->db->select ( $sql , $params );
			$numrows = $resultArray["numrows"];
			$result = $resultArray["datas"];
			for($i =0;$i < $numrows ;$i++) {
				$datas = mysql_fetch_array($result);
				
				$Array[$i]["id"] = $datas["id"];
				$Array[$i]["MenuName"] = $datas["MenuName"];
				$Array[$i]["MenuCode"] = $datas["MenuCode"];
			}
			//======================
				
			return $Array;
		}
		
		function loadAllActiveProject() {
			$Array = array();
			$params = array();
			$sql = "SELECT * FROM  project WHERE Status = 'Y' ";
			$resultArray = $this->db->select ( $sql , $params );
			$numrows = $resultArray["numrows"];
			$result = $resultArray["datas"];
			for($i =0;$i < $numrows ;$i++) {
				$datas = mysql_fetch_array($result);
				
				$Array[$i] = new Project($datas["id"] , $this->db);
			}
			//======================
				
			return $Array;
		}
		
		function loadAllProject() {
			$Array = array();
			$params = array();
			$sql = "SELECT * FROM  project ";
			$resultArray = $this->db->select ( $sql , $params );
			$numrows = $resultArray["numrows"];
			$result = $resultArray["datas"];
			for($i =0;$i < $numrows ;$i++) {
				$datas = mysql_fetch_array($result);
				
				$Array[$i] = new Project($datas["id"] , $this->db);
			}
			//======================
				
			return $Array;
		}

		function loadAllProject1() {
			$Array = array();
			$params = array();
			$sql = "SELECT * FROM  project WHERE Status = 'Y'";
			$resultArray = $this->db->select ( $sql , $params );
			$numrows = $resultArray["numrows"];
			$result = $resultArray["datas"];
			for($i =0;$i < $numrows ;$i++) {
				$datas = mysql_fetch_array($result);
				
				$Array[$i] = new Project($datas["id"] , $this->db);
			}
			//======================
				
			return $Array;
		}
		
		function loadAllProjectJob( $ProjectID ) {
			$Array = array();
			$params = array();
			$sql = "SELECT * FROM job WHERE Status = 'Y'";
			
			if(!empty($ProjectID)) {
				$sql.= " AND ProjectID = ? ";
				$params["ProjectID"] = $ProjectID;
			}
			
			$resultArray = $this->db->select ( $sql , $params );
			$numrows = $resultArray["numrows"];
			$result = $resultArray["datas"];
			for($i =0;$i < $numrows ;$i++) {
				$datas = mysql_fetch_array($result);
				
				$Array[$i] = new Job($datas["id"] , $this->db);
			}
			//======================
				
			return $Array;
		}
		
		function loadAllMaterial() {
			$Array = array();
			$params = array();
			$sql = "SELECT * FROM  material WHERE Status = 'Y'";				
			$resultArray = $this->db->select ( $sql , $params );
			$numrows = $resultArray["numrows"];
			$result = $resultArray["datas"];
			for($i =0;$i < $numrows ;$i++) {
				$datas = mysql_fetch_array($result);
							
				$Array[$i] = new Material($datas["id"] , $this->db);
			}
			//======================
				
			return $Array;
		}
		
		function loadAllProjectMaterial( $ProjectID ) {
			$Array = array();
			$params = array();
			$sql = "SELECT * FROM  project_material WHERE ProjectID = ? ";
			$params["ProjectID"] = $ProjectID;			
			$resultArray = $this->db->select ( $sql , $params );
			$numrows = $resultArray["numrows"];
			$result = $resultArray["datas"];
			for($i =0;$i < $numrows ;$i++) {
				$datas = mysql_fetch_array($result);
				
				$Array[$i] = new Material($datas["MaterialID"] , $this->db);
			}
			//======================
				
			return $Array;
		}

		function loadAllProjectMaterial1( $ProjectID ) {
			$Array = array();
			$params = array();
			$sql = "SELECT * FROM  project_material 
					LEFT JOIN project ON  project_material.ProjectID = project.id 
					WHERE project.Status = 'Y' GROUP BY ProjectID";
			$params["ProjectID"] = $ProjectID;			
			$resultArray = $this->db->select ( $sql , $params );
			$numrows = $resultArray["numrows"];
			$result = $resultArray["datas"];
			for($i =0;$i < $numrows ;$i++) {
				$datas = mysql_fetch_array($result);
				
				$Array[$i] = new Project($datas["ProjectID"] , $this->db);
			}
			//======================
				
			return $Array;
		}
		
		function loadAllProjectMaterialTotal($ProjectID) {
			
			$TotalMaterial = array();
			
			$sql = "SELECT DISTINCT JobID FROM job_status LEFT JOIN
					job ON 	job_status.JobID = job.id 
					WHERE ProjectID = ? AND job_status.Status = 'Y' ORDER BY JobID ASC";
			$params["ProjectID"] = $ProjectID;			
			$resultArray = $this->db->select ( $sql , $params );
			$numrows = $resultArray["numrows"];
			$result = $resultArray["datas"];
			for($i =0;$i < $numrows ;$i++) {
				$datas = mysql_fetch_array($result);
				
				$params = array();
				$sql = "SELECT * FROM job_status LEFT JOIN 
						 job ON  job.id = JobID 
						WHERE (StatusValue = 'MaterialAmount' OR StatusValue = 'Material') AND job_status.Status = 'Y' AND JobID = ? ORDER BY  `StatusValue` ASC ";
				$params["JobID"] = $datas["JobID"];			
				$resultArray = $this->db->select ( $sql , $params );
				$numrowsX = $resultArray["numrows"];
				$resultX = $resultArray["datas"];
				
				$MaterialID = "";
				$MaterialAMount = 0;
				
				for($j =0;$j < $numrowsX ;$j++) {
					$datasX = mysql_fetch_array($resultX);
					
					
					if($datasX["JobType"] == 1 || $datasX["JobType"] == 3) {
						if($datasX["StatusValue"] == "Material") {
						
							$MaterialID = $datasX["AdditionValue"];						
						}
						
						if($datasX["StatusValue"] == "MaterialAmount") {
							$ResultArray[$MaterialID]+= $datasX["AdditionValue"];
						}
					}
					
					if($datasX["JobType"] == 2 ) {
						if($datasX["StatusValue"] == "Material") {
							$MaterialID = $datasX["AdditionValue"];
							$ResultArray[$MaterialID]+= $datasX["Width"] * $datasX["Height"];
						}
					}				
				}
				
				
			}
			
			return $ResultArray;
		}	
		
		function loadAllFloorJob () {
			$Array = array();
			$params = array();
			$sql = "SELECT * FROM  job WHERE Status = 'Y' AND JobType = '1' ORDER BY ProjectID ASC , UpdatedDate DESC";
			$resultArray = $this->db->select ( $sql , $params );
			$numrows = $resultArray["numrows"];
			$result = $resultArray["datas"];
			for($i =0;$i < $numrows ;$i++) {
				$datas = mysql_fetch_array($result);
				
				$Array[$i]["id"] = $datas["id"];
				$Array[$i]["JobName"] = $datas["JobName"];
				$Array[$i]["Project"]  = new Project($datas["ProjectID"] , $this->db);
				$Array[$i]["CreatedBy"] = $datas["CreatedBy"];
				$Array[$i]["CreatedDate"] = $datas["CreatedDate"];
				$Array[$i]["UpdatedBy"] = $datas["UpdatedBy"];
				$Array[$i]["UpdatedDate"] = $datas["UpdatedDate"];
			
			}
			//======================
				
			return $Array;
		}
		
		function loadAllWallJob () {
			$Array = array();
			$params = array();
			$sql = "SELECT * FROM  job WHERE Status = 'Y' AND JobType = '2' ORDER BY ProjectID ASC , UpdatedDate DESC";
			$resultArray = $this->db->select ( $sql , $params );
			$numrows = $resultArray["numrows"];
			$result = $resultArray["datas"];
			for($i =0;$i < $numrows ;$i++) {
				$datas = mysql_fetch_array($result);
				
				$Array[$i]["id"] = $datas["id"];
				$Array[$i]["JobName"] = $datas["JobName"];
				$Array[$i]["Project"]  = new Project($datas["ProjectID"] , $this->db);
				$Array[$i]["CreatedBy"] = $datas["CreatedBy"];
				$Array[$i]["CreatedDate"] = $datas["CreatedDate"];
				$Array[$i]["UpdatedBy"] = $datas["UpdatedBy"];
				$Array[$i]["UpdatedDate"] = $datas["UpdatedDate"];
			
			}
			//======================
				
			return $Array;
		}
		
		function loadAllCeilJob () {
			$Array = array();
			$params = array();
			$sql = "SELECT * FROM  job WHERE Status = 'Y' AND JobType = '3' ORDER BY ProjectID ASC , UpdatedDate DESC";
			$resultArray = $this->db->select ( $sql , $params );
			$numrows = $resultArray["numrows"];
			$result = $resultArray["datas"];
			for($i =0;$i < $numrows ;$i++) {
				$datas = mysql_fetch_array($result);
				
				$Array[$i]["id"] = $datas["id"];
				$Array[$i]["JobName"] = $datas["JobName"];
				$Array[$i]["Project"]  = new Project($datas["ProjectID"] , $this->db);
				$Array[$i]["CreatedBy"] = $datas["CreatedBy"];
				$Array[$i]["CreatedDate"] = $datas["CreatedDate"];
				$Array[$i]["UpdatedBy"] = $datas["UpdatedBy"];
				$Array[$i]["UpdatedDate"] = $datas["UpdatedDate"];
			
			}
			//======================
				
			return $Array;
		}
		
		
		function loadAllAccount() {
			$params = array();
			$Array = array();
			
			$sql = "SELECT * FROM account WHERE Username != 'Administrator' ";
			$resultArray = $this->db->select ( $sql , $params );
			$numrows = $resultArray["numrows"];
			$result = $resultArray["datas"];
			for($i =0;$i < $numrows ;$i++) {
				$datas = mysql_fetch_array($result);
				
				$Array[$i] = new Account($this->db);
				$Array[$i]->Username = $datas["Username"];
				$Array[$i]->loadAccountInfo();
				
			}
			
			return $Array;
		}
		
		function loadAllReport() {
			
			$sql = "SELECT * FROM project_job_material WHERE ProjectID = ? ";
		}
		
	}
?>

<?
	
	class ProjectMaterial {
		var $db;
		
		var $id;
		
		var $ProjectID;
		var $MaterialID;
		var $MaterialAmount;
		var $EstimateAmount;
		var $PricePerUnit;
		var $MaterialPrice;
		var $EstimateMaterialPrice;
		var $CreatedBy;
		var $CreatedDate;
		var $UpdatedBy;
		var $UpdatedDate;
		var $Status;
		
		function __construct( $db ){
			$this->db = $db;	
		}
		
		function loadProjectMaterial() {
			
			$sql = "SELECT * FROM project_job_material WHERE ProjectID = ? AND MaterialID = ? ";
			$params["ProjectID"] = $this->ProjectID;
			$params["MaterialID"] = $this->MaterialID;
			$result = $resultArray["datas"];
			$numrows = $resultArray["numrows"];
			
			$datas = mysql_fetch_array($result);
			
			$this->MaterialAmount = $datas["MaterialAmount"];
			$this->EstimateAmount = $datas["EstimateAmount"];
			$this->PricePerUnit = $datas["PricePerUnit"];
			$this->MaterialPrice = $datas["MaterialPrice"];
			$this->EstimateMaterialPrice = $datas["EstimateMaterialPrice"];
			$this->CreatedBy = $datas["CreatedBy"];
			$this->CreatedDate = $datas["CreatedDate"];
			$this->UpdatedBy = $datas["UpdatedBy"];
			$this->UpdatedDate = $datas["UpdatedDate"];
			
		}
		
		function saveEstimateMaterial() {
			
			if(empty($this->id)) {
				$sql = "INSERT INTO project_job_material 
						(id , ProjectID , MaterialID , MaterialAmount , EstimateAmount , PricePerUnit , MaterialPrice , EstimateMaterialPrice , CreatedBy , CreatedDate , UpdatedBy , UpdatedDate , Status) 
						VALUES (NULL , ? , ? , ? , ? , ? ,? ,? , ? , NOW()  , 'System' , NOW() , 'Y')";
				$params["ProjectID"] = $this->ProjectID;
				$params["MaterialID"] = $this->MaterialID;
				$params["MaterialAmount"] = $this->MaterialAmount;
				$params["EstimateAmount"] = $this->EstimateAmount;
				$params["PricePerUnit"] = $this->PricePerUnit;
				$params["MaterialPrice"] = $this->MaterialPrice;
				$params["EstimateMaterialPrice"] = $this->EstimateMaterialPrice;
				$params["CreatedBy"] = $this->CreatedBy;
				
				$this->db->execute ( $sql , $params );
			} else {
				$sql = "UPDATE project_job_material SET EstimateAmount = ? , CreatedBy = ? , CreatedDate = NOW()  WHERE id = ? ";
				$params["EstimateAmount"] = $this->EstimateAmount;
				$params["CreatedBy"] = $this->CreatedBy;
				$params["id"] = $this->id;
				$this->db->execute ( $sql , $params );
			}
			
		}
		
		function saveMaterailPrice() {
			
			$sql = "UPDATE project_job_material SET PricePerUnit = ? , MaterialPrice = ?  ,EstimateMaterialPrice = ? , UpdatedBy = ? , UpdatedDate = NOW()  WHERE id = ? ";
			$params["PricePerUnit"] = $this->PricePerUnit;
			$params["MaterialPrice"] = $this->MaterialPrice;
			$params["EstimateMaterialPrice"] = $this->EstimateMaterialPrice;
			$params["UpdatedBy"] = $this->UpdatedBy;
			$params["id"] = $this->id;
			$this->db->execute ( $sql , $params );
				
		}
	}
	
?>
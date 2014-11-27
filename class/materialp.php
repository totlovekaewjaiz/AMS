<?
	class MaterialP {
		var $db;
		
		var $id;
		
		var $MaterialID;

		function __construct( $ProjectID , $db ){
			$this->db = $db;
			$this->id = $ProjectID;
			$this->loadMaterialInfo();
		}
		
		function loadMaterialInfo() {
			

			
			$params = array();
			$sql = "SELECT * FROM project_material WHERE ProjectID = ? ";
			$params["id"] = $this->id;
			$resultArray = $this->db->select ( $sql , $params );
			$result = $resultArray["datas"];
			$numrows = $resultArray["numrows"];
			
			for($i =0;$i < $numrows;$i++) {
				$datas = mysql_fetch_array($result);
				$this->MaterialID[$i] = $datas["MaterialID"];
			}
		
		}
		
		function saveMaterial() {
			
			if(!empty($this->id)) {
				
				$params = array();
				
				$sql = "UPDATE material SET 
						MaterialCode = ? , 
						MaterialName = ?  , 
						MaterialWidth = ?  ,
						MaterialHeight = ?  ,
						MaterialType = ? ,
						MaterialPrice = ? ,
						UpdatedBy = ?  ,
						UpdatedDate = NOW() 
						WHERE id = ?
						";
				$params["MaterialCode"] = $this->MaterialCode;
				$params["MaterialName"] = $this->MaterialName;
				$params["MaterialWidth"] = $this->MaterialWidth;
				$params["MaterialHeight"] = $this->MaterialHeight;
				$params["MaterialType"] = $this->MaterialType;
				$params["MaterialPrice"] = $this->MaterialPrice;
				$params["UpdatedBy"] = $this->CreatedBy;
				$params["id"] = $this->id;
				
				$this->db->execute ( $sql , $params );
				
			} else {
			
				$params = array();
				
				$sql = "INSERT INTO material (id ,MaterialCode , MaterialName  , MaterialWidth , MaterialHeight, MaterialType , MaterialPrice , CreatedBy , CreatedDate , UpdatedBy , UpdatedDate )
						VALUES (NULL , ? , ? , ? , ? , ? , ?,? , NOW() , ? , NOW())";
				$params["MaterialCode"] = $this->MaterialCode;
				$params["MaterialName"] = $this->MaterialName;
				$params["MaterialWidth"] = $this->MaterialWidth;
				$params["MaterialHeight"] = $this->MaterialHeight;
				$params["MaterialType"] = $this->MaterialType;
				$params["MaterialPrice"] = $this->MaterialPrice;
				$params["CreatedBy"] = $this->CreatedBy;
				$params["UpdatedBy"] = $this->CreatedBy;
				
				$this->db->execute ( $sql , $params );
								
			}
			
		}
		
		function deleteMaterial() {
			
			$sql = "UPDATE material SET Status = 'N' WHERE id = ? ";
			$params["id"] = $this->id;
				
			$this->db->execute ( $sql , $params );
		}
				
	}
?>
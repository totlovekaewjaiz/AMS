<?
	class MaterialType {
		var $db;
		
		var $id;
		
		var $MaterialType_Name;
		
		var $ProjectList = array();
		
		function __construct( $MaterialID , $db ){
			$this->db = $db;
			$this->id = $MaterialID;
			$this->loadMaterialInfo();
		}
		
		function loadMaterialInfo() {
			
			$params = array();
			$sql = "SELECT * FROM material_type";
			$params["type_id"] = $this->id;
			$resultArray = $this->db->select ( $sql , $params );
			$result = $resultArray["datas"];
			$numrows = $resultArray["numrows"];
			
			$datas = mysql_fetch_array($result);
			
			$this->id = $datas["type_id"];
			$this->MaterialType_Name = $datas["type_name"];
			
		}		
	}
?>
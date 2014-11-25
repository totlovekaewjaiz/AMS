<?
	
	class Database {
	
		private static $conn;
		private static $config;
		private static $adodb;
		
		private static $db_config = array(
			'yoohui_ams' => array( "DB_HOST" => 'localhost', "DB_NAME" => 'ams_yoohui', "DB_USERNAME" => 'root', "DB_PASSWORD" => 'root')
		);
		
		public function Connection($database = 'yoohui_ams' ){
			if(!isset(self::$db_config[$database])){
				$database = 'yoohui_ams';
			}
			self::$config =  self::$db_config[$database];
			self::$conn = 	mysql_connect( self::$config["DB_HOST"], self::$config["DB_USERNAME"], self::$config["DB_PASSWORD"]) or die ("cannot connect db");
							mysql_select_db( self::$config["DB_NAME"], self::$conn) or die ("cannot select db");
			mysql_query("SET character_set_results=utf8");
			mysql_query("SET character_set_client=utf8");
			mysql_query("SET character_set_connection=utf8");
		}
		
		public function getConnection($database='yoohui_ams'){
			if(!isset(self::$db_config[$database])){
				$database = 'yoohui_ams';
			}
			self::$config =  self::$db_config[$database];
			self::$conn = 	mysql_connect( self::$config["DB_HOST"], self::$config["DB_USERNAME"], self::$config["DB_PASSWORD"]) or die ("cannot connect db");
							mysql_select_db( self::$config["DB_NAME"],  self::$conn) or die ("cannot select db");
			mysql_query("SET character_set_results=utf8");
			mysql_query("SET character_set_client=utf8");
			mysql_query("SET character_set_connection=utf8");
			
			return self::$conn;
		}
		
		public function sqlstatement ($sql , $params ) {
			foreach ($params as $index => $value ){
				$params[$index] = mysql_real_escape_string($value);
			}
		
			return vsprintf( str_replace("?","'%s'",$sql), $params );   
		}
		
		public function select ( $sql , $params ) {
			
			$sql = self::sqlstatement($sql, $params);
			$result = mysql_query($sql , self::$conn );
			$numrows   = mysql_num_rows($result);
			
			//echo $sql;
			
			$resultArray["numrows"] = $numrows;
			$resultArray["datas"] = $result;
			
			return $resultArray;
			
			//echo $sql."<br/><br/>";
		}
		
		public function execute ( $sql , $params ) {
			
			$sql = self::sqlstatement($sql, $params);
			mysql_query($sql , self::$conn);
			
			//echo $sql."<br/><br/>";
		}

	}
	
?>
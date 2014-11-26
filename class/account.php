<?php

	class Account {
	
		var $db;
		
		var $id;
		var $Username;
		var $Password;
		var $Firstname;
		var $Lastname;
		var $CreatedBy;
		var $CreatedDate;
		var $UpdatedBy;
		var $UpdatedDate;
		var $Status;
		
		var $MenuList = array();
		
		function __construct( $db ){
		
			$this->db = $db;	
		}
		
		function logout(){
			
			$_SESSION['username'] = "";
		}
	
		function checkAccountLogin() {
			$params = array();
			$sql = "SELECT * FROM account WHERE UPPER(Username) = UPPER(?) ";
			$params["username"] = $this->Username;
			$resultArray = $this->db->select ( $sql , $params );
			$numrows = $resultArray["numrows"];
			
			if($numrows == 1) {
				$this->loadAccountInfo();
				return true;
			} else {
				return false;
			}
		}	
		
		function AccountLogin() {
			
			$params = array();
			$sql = "SELECT * FROM account WHERE UPPER(Username) = UPPER(?) AND Password = ? AND Status = 'Y'";
			$params["username"] = $this->Username;
			$params["password"] = md5($this->Password);
			$resultArray = $this->db->select ( $sql , $params );
			$numrows = $resultArray["numrows"];
			
			if($numrows == 1) {
				$this->loadAccountInfo();
				return true;
			} else {
				return false;
			}
		}
		
		function loadAccountInfo() {
			
			$params = array();
			$sql = "SELECT * FROM account WHERE UPPER(Username) = UPPER(?) ";
			$params["username"] = $this->Username;
			$resultArray = $this->db->select ( $sql , $params );
			$result = $resultArray["datas"];
			$numrows = $resultArray["numrows"];
			
			$datas = mysql_fetch_array($result);
			
			$this->id = $datas["id"];
			$this->Username = $datas["Username"];
			$this->Firstname = $datas["Firstname"];
			$this->Lastname = $datas["Lastname"];
			$this->CreatedBy = $datas["CreatedBy"];
			$this->CreatedDate = $datas["CreatedDate"];
			$this->UpdatedBy = $datas["UpdatedBy"];
			$this->UpdatedDate = $datas["UpdatedDate"];
			
			$params = array();
			$sql = "SELECT * FROM account_status WHERE Username = ? AND StatusName = 'AccountMenu'";
			$params["Username"] = $this->Username;
			$resultArray = $this->db->select ( $sql , $params );
			$result = $resultArray["datas"];
			$numrows = $resultArray["numrows"];
			
			for($i = 0;$i < $numrows ;$i++ ) {
				$datas = mysql_fetch_array($result);
				
				$this->MenuList[$i]["MenuID"] = $datas["StatusValue"];
				$this->MenuList[$i]["MenuName"] = $datas["AdditionValue"];
			}
		}
		
		function createAccount() {
			
			$sql = "INSERT INTO account (id , Username , Password , Firstname , Lastname , CreatedBy,  CreatedDate , UpdatedBy , UpdatedDate , Status)
					VALUES (NULL , ? , ? , ? , ? , ? , NOW() , ? , NOW() , 'Y')";
			$params["Username"] = $this->Username;
			$params["Password"] = md5($this->Password);
			$params["Firstname"] = $this->Firstname;
			$params["Lastname"] = $this->Lastname;
			$params["CreatedBy"] = $this->CreatedBy;
			$params["UpdatedBy"] = $this->CreatedBy;
			
			$this->db->execute( $sql , $params );
			
			for($i = 0;$i < count($this->MenuList) ;$i++ ) {
				$params = array();
				$sql = "INSERT INTO account_status (id , Username , StatusName , StatusValue , AdditionValue)
						VALUES (NULL , ? , ? , ?  , '')";
				$params["Username"] = $this->Username;
				$params["StatusName"] = "AccountMenu";
				$params["StatusValue"] = $this->MenuList[$i];
				$this->db->execute ( $sql , $params );					
			}
		}
		
		function updateAccount() {
			
			$sql =  "UPDATE account SET Password = ? , Firstname = ? , Lastname = ? ,UpdatedBy = ? , UpdatedDate = NOW() WHERE Username = ? ";
			$params["Password"] = md5($this->Password);
			$params["Firstname"] = $this->Firstname;
			$params["Lastname"] = $this->Lastname;
			$params["UpdatedBy"] = $this->UpdatedBy;
			$params["Username"] = $this->Username;
			$this->db->execute ( $sql , $params );
			
			$params = array();
			$sql = "DELETE FROM account_status WHERE Username = ? ";
			$params["Username"] = $this->Username;
			$this->db->execute ( $sql , $params );	
			
			for($i = 0;$i < count($this->MenuList) ;$i++ ) {
				$params = array();
				$sql = "INSERT INTO account_status (id , Username , StatusName , StatusValue , AdditionValue)
						VALUES (NULL , ? , ? , ?  , '')";
				$params["Username"] = $this->Username;
				$params["StatusName"] = "AccountMenu";
				$params["StatusValue"] = $this->MenuList[$i];
				$this->db->execute ( $sql , $params );					
			}
		}
		
		function deleteAccount() {
			
			$sql = "DELETE from account WHERE Username = ? ";
			$params["Username"] = $this->Username;
			$this->db->execute ( $sql , $params );
			
			$params = array();
			$sql = "DELETE from account_status WHERE Username = ? ";
			$params["Username"] = $this->Username;
			$this->db->execute ( $sql , $params );
		}
		
	}
	
?>

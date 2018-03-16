<?php

class Login{
	public $username,$password,$successUrl,$failUrl,$table,$usernameFieldm,$passwordField,$connection;
	
	function checkLogin(){
		$sql ="SELECT * FROM $this->table WHERE $this->userField = '$this->username' AND $this->passwordField = '$this->password'";
		$this->connection->sql = $sql;
		$r = $this->connection->executeRow();
		
		if($r){
			$_SESSION['User'] = $r;
			header('location : $this->successUrl');
		}else{
			header('location : $this->failUrl');
		}
	}
}
?>
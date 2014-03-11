<?php

class Controller{

	public $db;

	public function load(){
	
		session_start();
		$this->db = Database::connect();
		if(!isset($_SESSION["valid_user"])){
			$this->logout();
		}
	}
	
	public function logout(){
		
		session_destroy();
		echo "<script>location='login';</script>";
	}
}
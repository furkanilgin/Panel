<?php

class Controller{

	public function load(){
	
		session_start();
		if(!isset($_SESSION["valid_user"])){
			$this->logout();
		}
	}
	
	public function logout(){
		
		session_destroy();
		echo "<script>location='login';</script>";
	}
}
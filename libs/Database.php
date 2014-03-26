<?php

class Database{

	public static function connect(){
	
		$db = new PDO('mysql:host=127.0.0.1;dbname=db_osmani;charset=utf8', 'root', '');
		$db->query("SET NAMES 'utf8'");
		$db->query("SET COLLATION_CONNECTION = 'utf8_bin'");
		
		return $db;
	}

}
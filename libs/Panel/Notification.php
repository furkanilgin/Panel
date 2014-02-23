<?php

class Notification{

	public static function info($message){
	
		echo "<script>notify('info', '".$message."');</script>";
	}
	public static function warning($message){
	
		echo "<script>notify('warning', '".$message."');</script>";
	}
	public static function error($message){
	
		echo "<script>notify('error', '".$message."');</script>";
	}
	public static function success($message){
	
		echo "<script>notify('success', '".$message."');</script>";
	}
}
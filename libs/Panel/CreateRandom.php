<?php

class CreateRandom{

	private static $randNumberList;
	
	public static function rand(){
		
		while(true){
			$isAlreadyGenerated = false;
			$newRandNumber = rand();
			if(isset(self::$randNumberList)){
				foreach(self::$randNumberList as $randNumber){
					if($randNumber == $newRandNumber){
						$isAlreadyGenerated = true;
					}
				}
			}
			if(!$isAlreadyGenerated){
				return $newRandNumber;
			}
		}
	}
}
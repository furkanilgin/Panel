<?php

class File{

	public $id;
	public $name;
	public $label;
	
	public function getHtml(){
	
		$html = '<input id="'.$this->id.'" name="'.$this->name.'" type="file" class="file_1" />';
		
		return $html;
	}
	
	public function getJS(){
	
	}
	
	public function upload($uploaddir){
	
		$uploadfile = '../../'.$uploaddir . basename($_FILES[$this->name]['name']);
		if (!move_uploaded_file($_FILES[$this->name]['tmp_name'], $uploadfile)) {
			Notification::error("Dosya kaydedilemedi!");
			
			return false;
		}
		
		return true;
	}
}
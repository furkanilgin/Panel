<?php

class File{

	public $id;
	public $name;
	public $label;
	public $required;
	
	public function getHtml(){
	
		$html = '<input id="'.$this->id.'" name="'.$this->name.'" type="file" class="file_1" />';
		
		return $html;
	}
	
	public function getJS(){
		
		if($this->required == "true"){
			$js = "$(document).ready(function(e){
						$('form').submit(function(){
							if($('#isSubmitted').val() == 'true'){
								if($('#".$this->id."').val() == ''){
									notify('error', 'Lütfen ".$this->label." alanını doldurunuz');
									$('#isSubmitted').val('false');
									return false;
								}
							}
							
						});
				   });";
		}
		
		return $js;
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
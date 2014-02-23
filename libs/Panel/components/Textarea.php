<?php

class Textarea{

	public $id;
	public $name;
	public $label;
	public $text;
	public $required;
	public $editor;

	public function getHtml(){
	
		if($this->editor == "yes"){
			$isEditor = "ckeditor";
		}
	
		$html = '<textarea id="'.$this->id.'" name="'.$this->name.'" rows="" cols="" class="form-textarea '.$isEditor.'">'.$this->text.'</textarea>';
		
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
}
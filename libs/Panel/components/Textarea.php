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
	
	}
}
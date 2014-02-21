<?php

class Input{

	public $id;
	public $name;
	public $label;
	public $text;
	public $property;

	public function getHtml(){
	
		$html = '<input id="'.$this->id.'" name="'.$this->name.'" type="text" class="inp-form" value="'.$this->text.'" />';
		
		return $html;
	}
	
	public function getJS(){
	
	}
}
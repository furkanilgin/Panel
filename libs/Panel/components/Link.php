<?php

class Link{

	public $id;
	public $name;
	public $href;
	public $text;
	public $label;

	public function getHtml(){
	
		$html = '<a id="'.$this->id.'" name="'.$this->name.'" href="'.$this->href.'" target="_blank">'.$this->text.'</a>';
		
		return $html;
	}
	
	public function getJS(){
		
	}
}
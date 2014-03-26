<?php

class OutputText{

	public $id;
	public $name;
	public $label;
	public $text;

	public function getHtml(){

		$html = '<span id="'.$this->id.'" name="'.$this->name.'">'.$this->text.'</span>';

		return $html;
	}
	
	public function getJS(){

	}
}
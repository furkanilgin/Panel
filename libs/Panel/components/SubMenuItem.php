<?php

class SubMenuItem{

	public $id;
	public $property;
	public $type;
	public $url;
	public $action;
	public $title;
	public $current;
	
	public function getHtml(){
	
		// current
		if($this->current == "yes"){
			$currentStatement = 'class="sub_show"';
		}
		else{
			$currentStatement = "";
		}
		
		$html = '<li '.$currentStatement.'><a href="?page='.$this->href.'">'.$this->title.'</a></li>';

		return $html;
	}
	
	public function getJS(){
	
	}
}
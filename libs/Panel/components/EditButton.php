<?php

class EditButton{

	public $title;

	public function getHtml(){
	
		$html = '<a href="javascript:void(0);" title="'.$this->title.'" class="icon-1 info-tooltip"></a>';
		
		return $html;
	}
	public function getJS(){
	
	}
}
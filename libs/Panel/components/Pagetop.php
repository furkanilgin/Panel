<?php

class Pagetop{

	public $logo;
	
	public function getHtml(){
	
		$html = '<div id="page-top-outer"><div id="page-top">';
		if(!empty($this->logo)){
			$html .= $this->logo->getHtml();
		}
		$html .= '</div></div>';
		
		return $html;
	}
	
	public function getJS(){
	
	}
}
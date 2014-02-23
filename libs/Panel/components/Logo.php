<?php

class Logo{

	public $href;
	public $src;
	public $height;
	public $width;
	public $top;
	
	public function getHtml(){
	
		$html = '<div id="logo" style="margin:'.$this->top.'px 0 0 15px"><a href="?page='.$this->href.'"><img src="'.$this->src.'" height="'.$this->height.'" width="'.$this->width.'" /></a></div>';
		
		return $html;
	}
}
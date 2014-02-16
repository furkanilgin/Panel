<?php

class Logo{

	public $url;
	public $src;
	public $height;
	public $width;
	public $top;
	
	public function getHtml(){
	
		$html = '<div id="logo" style="margin:'.$this->top.'px 0 0 15px"><a href="'.$this->url.'"><img src="'.$this->src.'" height="'.$this->height.'" width="'.$this->width.'" /></a></div>';
		
		return $html;
	}
}
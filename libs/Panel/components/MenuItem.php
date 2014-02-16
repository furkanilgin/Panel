<?php

class MenuItem{

	public $property;
	public $type;
	public $url;
	
	public function getHtml(){
	
		if($this->type == "account"){
			$html .= '<div class="nav-divider">&nbsp;</div>
					  <div class="showhide-account">
						<img src="./libs/panel/images/shared/nav/nav_myaccount.gif" onclick="location=\''.$this->url.'\';" width="93" height="14" />
					  </div>';
		}
		if($this->type == "logout"){
			$html .= '<div class="nav-divider">&nbsp;</div>
						<a href="" id="logout"><img src="./libs/panel/images/shared/nav/nav_logout.gif" />';
		}
		
		return $html;
	}
}
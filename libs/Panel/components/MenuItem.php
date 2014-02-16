<?php

class MenuItem{

	public $id;
	public $property;
	public $type;
	public $url;
	public $action;
	public $title;
	public $current;
	public $subMenuItemList;
	
	public function getHtml(){
	
		if($this->type == "account"){
			$html .= '<div class="nav-divider">&nbsp;</div>
					  <div class="showhide-account">
						<img id="'.$this->id.'" src="./libs/panel/images/shared/nav/nav_myaccount.gif" width="93" height="14" />
					  </div>';
		}
		else if($this->type == "logout"){
			$html .= '<div class="nav-divider">&nbsp;</div>
						<a id="'.$this->id.'"><img src="./libs/panel/images/shared/nav/nav_logout.gif" style="cursor:pointer;"/></a>';
		}
		else if($this->type == "default"){
			// href
			if(isset($this->href) && $this->href != ""){
				$hrefStatement = 'href="?page='.$this->href.'"';
			}
			else{
				$hrefStatement = 'href="javascript:void(0);"';
			}
			// current
			if($this->current == "yes"){
				$currentStatement = "current";
			}
			else{
				$currentStatement = "select";
			}
			
			$html .= '<ul class="'.$currentStatement.'"><li><a '.$hrefStatement.'><b>'.$this->title.'</b></a>';
			if(isset($this->subMenuItemList)){
				$html .= '<div class="select_sub show"><ul class="sub">';
				foreach($this->subMenuItemList as $subMenuItem){
					$html .= $subMenuItem->getHtml();
				}
				$html .= '</ul></div>';
			}
			$html .= '</li></ul>';
		}
		
		return $html;
	}
	
	public function getJS(){
	
		if(isset($this->action) && $this->action != ""){
			$js = "$(document).ready(function(){
					$('#".$this->id."').click(function(){
						$('form').append('<input id=\"action\" name=\"action\" type=\"hidden\" value=\"".$this->action."\"  />');
						$('form').submit();
						$('#action').remove();
					});
				});";
		}
		else if(isset($this->href) && $this->href != ""){
			$js = "$(document).ready(function(){
					$('#".$this->id."').click(function(){
						location = '?page=".$this->href."';
					});
				});";
		}
		
		return $js;
	}
}
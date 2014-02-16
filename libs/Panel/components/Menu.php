<?php

class Menu{

	public $property;
	public $menuItemList;
	
	public function getHtml(){

		$html = '<div class="nav-outer-repeat"><div class="nav-outer">';
		
		// account and logout buttons
		$rightMenuItemCount = 0;
		foreach($this->menuItemList as $menuItem){
			if($menuItem->type != "default"){
				$rightMenuItemCount++;
			}
		}
		
		$tmp_RightMenuItemCount = $rightMenuItemCount;
		if($tmp_RightMenuItemCount > 0){
			$html .= '<div id="nav-right">';
		}
		foreach($this->menuItemList as $menuItem){
			if($menuItem->type == "account" or $menuItem->type == "logout"){
				$html .= $menuItem->getHtml();
				$tmp_RightMenuItemCount--;
				if($tmp_RightMenuItemCount == 0){
					$html .= '</div>';
				}
			}
		}
		// default buttons
		$leftMenuItemCount = count($this->menuItemList) - $this->rightMenuItemCount;
		if($leftMenuItemCount > 0){
			$html .= '<div class="nav"><div class="table">';
		}
		
		foreach($this->menuItemList as $menuItem){
			if($menuItem->type == "default"){
				$html .= $menuItem->getHtml();
			}
		}
		
		if($leftMenuItemCount > 0){
			$html .= '</div></div>';
		}
		
		$html .= '</div></div>';
		
		return $html;
	}
	
	public function getJS(){
	
		foreach($this->menuItemList as $menuItem){
			$js .= $menuItem->getJS();
		}
		
		return $js;
	}
}
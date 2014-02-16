<?php

class Menu{

	public $property;
	public $menuItemList;
	public $rightMenuItemCount;
	
	public function getHtml(){

		$html = '<div class="nav-outer-repeat"><div class="nav-outer">';
		$tmp_RightMenuItemCount = $this->rightMenuItemCount--;;
		if($tmp_RightMenuItemCount > 0){
			$html .= '<div id="nav-right">';
		}
		foreach($this->menuItemList as $menuItem){
			$html .= $menuItem->getHtml();
			$tmp_RightMenuItemCount--;
			if($tmp_RightMenuItemCount == 0){
				$html .= '</div>';
			}
		}
		$html .= '</div></div>';
		
		return $html;
	}
	
	public function getJS(){
	
	}
}
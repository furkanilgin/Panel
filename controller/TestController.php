<?php

class TestController{

	public $test;

	public function load(){
		
		$this->test->p_Panel->panelItemList[3]->dataset = array(
			array(1, 2, 3),
			array(4, 5, 6)
		);
	}
	
	public function logoutClick(){
	
		//$this->test->m_Menu->menuItemList[3]->subMenuItemList[1]->title="Furkan";
		echo "logout clicked";
	}
}
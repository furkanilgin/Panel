<?php

class TestController{

	public $test;

	public function load(){
		
		$this->test->p_Panel->panelItemList[1]->dataset = array(
			array(1, './view/images/logo.png', 3),
			array(4, './view/images/logo2.png', 6)
		);
	}
	
	public function logoutClick(){
	
		//$this->test->m_Menu->menuItemList[3]->subMenuItemList[1]->title="Furkan";
		echo "logout clicked";
	}
}
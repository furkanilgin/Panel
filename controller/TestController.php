<?php

class TestController{

	public $test;

	public function load(){
		
		$this->test->p_Panel->panelItemList[4]->dataset = array(
			array(1, './view/images/logo.png', 3),
			array(4, './view/images/logo2.png', 6)
		);
		
		$this->test->p_Panel->panelItemList[1]->items = array("1" => "city1", "2" => "city2", "3" => "city3");
	}
	
	public function save(){
	
		$this->test->p_Panel->panelItemList[2]->upload("./upload/");
		//echo $_FILES["field3"]["name"];
	}
	
	public function selectChange(){
		
		echo $_POST["field2"];
	}
	
	public function logoutClick(){
		
		//$this->test->m_Menu->menuItemList[3]->subMenuItemList[1]->title="Furkan";
		echo "logout clicked";
	}
}
<?php

class Button{

	public $id;
	public $name;
	public $text;
	public $action;
	
	public function getHtml(){
		
		$html .= '<button id="'.$this->id.'" name="'.$this->name.'" type="button" class="form-submit" />';
		
		$js .= "<script>";
		$js .= "$('#".$this->id."').click(function(){";
		$js .= "$('form').append('<input id=\"action\" name=\"action\" type=\"hidden\" value=\"".$this->action."\"  />');";
		$js .= "$('form').submit();";
		$js .= "$('#action').remove();";
		$js .= "});";
		$js .= "</script>";

		return $html.$js;
	}
	
	public function getJS(){

	}
}
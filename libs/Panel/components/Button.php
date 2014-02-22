<?php

class Button{

	public $id;
	public $name;
	public $text;
	public $action;
	
	public function getHtml(){
		
		$html .= '<input type="button" id="'.$this->id.'" name="'.$this->name.'" class="form-submit" />';
		
		$js .= "<script>";
		$js .= "$('#".$this->id."').click(function(){";
		$js .= "$('form').append('<input id=\"action\" name=\"action\" type=\"hidden\" value=\"".$this->action."\"  />');";
		$js .= "$('#isSubmitted').val('true');";
		$js .= "$('form').submit();";
		$js .= "$('#action').remove();";
		$js .= "});";
		$js .= "</script>";

		return $html.$js;
	}
	
	public function getJS(){

	}
}
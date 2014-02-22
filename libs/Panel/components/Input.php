<?php

class Input{

	public $id;
	public $name;
	public $label;
	public $text;
	public $property;
	public $required;

	public function getHtml(){

		$html = '<input id="'.$this->id.'" name="'.$this->name.'" type="text" class="inp-form" value="'.$this->text.'" />';

		return $html;
	}
	
	public function getJS(){

		if($this->required == "true"){
			$js = "$(document).ready(function(e){
						$('form').submit(function(){
							if($('#isSubmitted').val() == 'true'){
								if($('#".$this->id."').val() == ''){
									notify('error', 'Lütfen ".$this->label." alanını doldurunuz');
									$('#isSubmitted').val('false');
									return false;
								}
							}
							
						});
				   });";
		}
		
		return $js;
	}
}
<?php

class Select{

	public $id;
	public $name;
	public $change;
	public $items;
	public $selectedItem;
	
	public function getHtml(){
		
		$html.= '<select id="'.$this->id.'" name="'.$this->name.'">';
		if(is_array($this->items)){
			foreach($this->items as $key => $value){
				$html.= '<option value="'.$key.'"';
				if($this->selectedItem == $key){ 
					$html .= "selected";
				}
				$html .= '>'.$value.'</option>';
			}
			
			if(!empty($this->change)){
				$js .= '<script>';
				$js .= '$(document).ready(function(){';
				$js .= "$('#".$this->id."_container li').click(function(){";
				$js .= "$('form').append('<input id=\"action\" name=\"action\" type=\"hidden\" value=\"".$this->change."\"  />');";
				$js .= "$('form').submit();";
				$js .= "$('#action').remove();";
				$js .= "});});";
				$js .= '</script>';
			}
		}
		else{
			throw new Exception("Select items must be array");
		}
		$html.= '</select>';

		return $html.$js;
	}
	
	public function getJS(){
	
	}
}
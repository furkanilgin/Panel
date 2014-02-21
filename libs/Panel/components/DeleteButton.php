<?php

class DeleteButton{

	public $id;
	public $title;
	public $action;

	public function getHtml(){
	
		$this->id = 'editButton_'.CreateRandom::rand();
		
		$html = '<a id="'.$this->id.'" href="javascript:void(0);" title="'.$this->title.'" class="icon-2 info-tooltip"></a>';
		
		$js .= "<script>";
		$js .= "$('#".$this->id."').click(function(){";
		$js .= "if(confirm('Bu kaydi silmek istediğinize emin misiniz?')){";
		$js .= "$('form').append('<input id=\"action\" name=\"action\" type=\"hidden\" value=\"".$this->action."\"  />');";
		$js .= "$('form').append('<input id=\"rowIndex\" name=\"rowIndex\" type=\"hidden\" value=\"'+ $('#".$this->id."').closest('tr').prevAll().length +'\"  />');";
		$js .= "$('form').submit();";
		$js .= "$('#action').remove();";
		$js .= "}});";
		$js .= "</script>";
		
		return $html.$js;
	}
	public function getJS(){
	
	}
}
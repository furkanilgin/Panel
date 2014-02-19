<?php

class Column{

	public $width;
	public $title;
	public $type;
	public $columnObjectList;

	public function getTitleColumnHtml(){
		
		$html = '<th width="'.$this->width.'" class="table-header-repeat line-left"><a href="javascript:void(0)">'.$this->title.'</a></th>';
		
		return $html;
	}
	
	public function getDataColumnHtml($data){
	
		$html = '<td>'.$data.'</td>';
		
		return $html;
	}

}
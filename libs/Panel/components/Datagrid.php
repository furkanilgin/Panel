<?php

class Datagrid{

	public $id;
	public $columnList;
	public $dataset;

	public function getHtml(){
		
		$html = '<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">';
		// title row
		if(isset($this->columnList)){
			$html .= '<tr>';
			foreach($this->columnList as $column){
				$html .= $column->getTitleColumnHtml();
			}
			$html .= '</tr>';
			
			if(isset($this->dataset)){
				$rowIndex = 0;
				foreach($this->dataset as $row){
					$html .= '<tr>';
					$columnIndex = 0;
					foreach($this->columnList as $column){
					
						if($column->type == "data"){
							$html .= $column->getDataColumnHtml($row[$columnIndex]);
						}
						else{
							$html .= '<td>';
							foreach($column->columnObjectList as $columnObject){
								$html .= $columnObject->getHtml();
								if(get_class($columnObject) == 'ImageLink'){
									
									$html .= $columnObject->getJS($this->dataset[$rowIndex][$columnIndex]);
								}
							}
							$html .= '</td>';
						}
						$columnIndex++;
					}
					$html .= '</tr>';
					$rowIndex++;
				}
			}
		}
		$html .= '</table>';
		return $html;
	}
	
	public function getJS(){
	
	}
}
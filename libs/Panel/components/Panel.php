<?php

class Panel{

	public $property;
	public $title;
	public $panelItemList;

	public function getHtml(){

		$html = '<div id="content-outer">
				<div id="content">
					<div id="page-heading">
						<h1>'.$this->title.'</h1>
					</div>
					<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
						<tr>
							<th rowspan="3" class="sized"><img src="./libs/panel/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
							<th class="topleft"></th>
							<td id="tbl-border-top">&nbsp;</td>
							<th class="topright"></th>
							<th rowspan="3" class="sized"><img src="./libs/panel/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
						</tr>
						<tr>
							<td id="tbl-border-left"></td>
							<td valign="top">
								<div id="content-table-inner">';
						
		if(isset($this->panelItemList)){
			
			$panelItemIndex = 0;
			$fieldIndex = 0;
			$datagridIndex = 0;
			foreach($this->panelItemList as $panelItem){
				if(get_class($panelItem) == 'Input' || get_class($panelItem) == 'Select' 
						|| get_class($panelItem) == 'File' || get_class($panelItem) == 'Button'){
					if($panelItemIndex == 0){
						$html .= '<table border="0" cellpadding="0" cellspacing="0"  id="id-form" style="margin-bottom:20px;">';
					}
					$html .= '<tr>';
					if(get_class($panelItem) == 'Button'){
						$html .= '<th>'.$panelItem->label.'</th>';
					}
					else{
						$html .= '<th>'.$panelItem->label.':</th>';
					}
					$html .= '<td>'.$panelItem->getHtml().'</td>
							</tr>';
					$fieldIndex++;
				}
				if(get_class($panelItem) == 'Datagrid'){
					if($panelItemIndex != 0){
						$html .= '</table>';
					}
					$html .= $panelItem->getHtml();
					$datagridIndex++;
					$panelItemIndex = -1; // start again after add datagrid
					$fieldIndex = 0;
				}	
				$panelItemIndex++;
			}
			if($fieldIndex > 0){
				$html .= '</table>';
			}
		}
								
		$html .= '</div>
							</td>
							<td id="tbl-border-right"></td>
						</tr>
						<tr>
							<th class="sized bottomleft"></th>
							<td id="tbl-border-bottom">&nbsp;</td>
							<th class="sized bottomright"></th>
						</tr>
					</table>
				</div>
			</div>';
		
		return $html;
	}
	
	public function getJS(){
		
		if(isset($this->panelItemList)){
			foreach($this->panelItemList as $panelItem){
				$js .= $panelItem->getJS();
			}
		}
		
		return $js;
	}
}
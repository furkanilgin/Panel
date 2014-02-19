<?php

class Panel{

	public $property;
	public $title;
	public $fieldList;

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
			
			$panelItemCount = 0;
			$fieldCount = 0;
			$datagridCount = 0;
			foreach($this->panelItemList as $panelItem){
				if(get_class($panelItem) == 'Field'){
					if($panelItemCount == 0){
						$html .= '<table border="0" cellpadding="0" cellspacing="0"  id="id-form" style="margin-bottom:20px;">';
					}
					$html .= '<tr>
							<th>'.$panelItem->title.':</th>
							<td>'.$panelItem->getHtml().'</td>
						</tr>';
					$fieldCount++;
				}
				if(get_class($panelItem) == 'Datagrid'){
					if($panelItemCount != 0){
						$html .= '</table>';
					}
					$html .= $panelItem->getHtml();
					$datagridCount++;
				}	
				$panelItemCount++;
			}
			if($fieldCount > 0 && $datagridCount == 0){
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
	
	}
}
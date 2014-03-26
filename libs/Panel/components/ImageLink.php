<?php
require_once("./CreateRandom.php");

class ImageLink{

	private $id;

	public function getHtml(){
		
		$this->id = 'imageLink_'.CreateRandom::rand();
		$html = '<img id="'.$this->id.'" src="./libs/Panel/icons/image.png" style="cursor: pointer;" height="20" />';
		
		return $html;
	}
	
	public function getJS($link){
		

		$js = "<script>
				$(document).ready(function(){";
				
		if(!empty($link)){
			$js .= "$('#".$this->id."').click(function(){
						window.open('".$link."');
					});";
		}
		else{
			$js .= "$('#".$this->id."').css('display', 'none');";
		}
				
		$js .= "});
				</script>";
		
		return $js;
	}
}
<?php

class File{

	public $id;
	public $name;
	public $label;
	public $required;
	public $filename;
	public $uploadAction;
	public $uploaddir;
	public $imageWidth;
	public $imageHeight;
	public $cropAction;
	public $deleteAction;
	
	public function getHtml(){
		
		$html = '<input id="'.$this->id.'" name="'.$this->name.'" type="file" class="file_1" />
				 <div id="'.$this->id.'_select" style="cursor:pointer; width: 78px; height: 29px; margin-left:80px; background-image: url(http://localhost/osmani/admin/libs/Panel/images/forms/upload_file.gif); display: inline; position: absolute; overflow: hidden; background-position: 100% 50%; background-repeat: no-repeat no-repeat;"></div>
				 <div id="file_name_display" style="height: 29px; margin-left:175px; margin-top:10px; display: inline; position: absolute;"></div>
				 <div id="image_crop_panel" style="position:absolute; z-index:502; display:none;">
					<img src="'.$this->uploaddir."/".$this->filename.'" />
				 </div>
				 <div id="fade"></div>';
		
		if($_POST["action"] == $this->uploadAction || 
				$_POST["action"] == $this->cropAction ||
					$_POST["action"] == $this->deleteAction){
			$js.= "
					<script>
						function showCoords(c)
						{
							$('#x1').val(c.x);
							$('#y1').val(c.y);
							$('#x2').val(c.x2);
							$('#y2').val(c.y2);
							$('#w').val(c.w);
							$('#h').val(c.h);
						};

						function cleanCoords(){
						
							$('#x1').val('');
							$('#y1').val('');
							$('#x2').val('');
							$('#y2').val('');
							$('#w').val('');
							$('#h').val('');
							
							$('form').append('<input id=\"action\" name=\"action\" type=\"hidden\" value=\"".$this->deleteAction."\"  />');
							$('form').submit();
							$('#action').remove();
						}
					</script>
					";
			
			if($_POST["action"] == $this->uploadAction){
				
				$_SESSION[$this->id]["filename"] = $this->filename;
				$_SESSION[$this->id]["uploaddir"] = $this->uploaddir;
			}
			else if($_POST["action"] == $this->cropAction or $_POST["action"] == $this->deleteAction){
			
				$this->filename = $_SESSION[$this->id]["filename"];
				$this->uploaddir = $_SESSION[$this->id]["uploaddir"];
			}
				
			if(!empty($this->cropAction)){ // if imagefile crop component
				
				if($_POST["action"] == $this->uploadAction){ // after upload

					if(!empty($this->uploaddir) && !empty($this->filename)){
						$imageSize = getimagesize("../../".$this->uploaddir."/".$this->filename);
					}
					
					if(is_array($imageSize)){ // if imagefile uploaded
						
						$js .= "<script>
									$(document).ready(function(){
										setTimeout(function(){
											$('#fade').css('display', 'block');
											$('#image_crop_panel').css({
												'top': ($(window).height()-$('#image_crop_panel').height())/2,
												'left': ($(window).width()-$('#image_crop_panel').width())/2,
												'display': ''
											});
											$('#image_crop_panel img').Jcrop({
												minSize: [".$this->imageWidth.",".$this->imageHeight."],
												maxSize: [".$this->imageWidth.",".$this->imageHeight."],
												onChange: showCoords,
												onSelect: showCoords
											});
										}, 500);
									});
									$(document).mouseup(function (e){
										var container = $('#image_crop_panel');
										if (!container.is(e.target) && container.has(e.target).length === 0){
											container.hide();
											$('#fade').css('display', 'none');
											cleanCoords();
										}
									});
									$(document).keyup(function(e) {
										if(e.keyCode == 13) {
											$('form').append('<input id=\"action\" name=\"action\" type=\"hidden\" value=\"".$this->cropAction."\"  />');
											$('form').submit();
											$('#action').remove();
										}
									});
								</script>";
					}
					else{ // instead of image another type of file uploaded
					
						Notification::error("Lütfen ".$this->label." alanına resim dosyası yükleyiniz");
						/*
					 
						$js.= "
							<script>
								$(document).ready(function(){

									var deleteButton = '<img src=\"libs/Panel/icons/Erase.png\" height=\"15\" width=\"15\"\
															style=\"cursor:pointer;\" onclick=\"cleanCoords();\" />';
									
									$('#file_name_display').html('".$_SESSION["tmp_".$this->id."_filename"]." ' + deleteButton);
								});
							</script>
						";
						*/
					}
				}
				
				if($_POST["action"] == $this->cropAction){ // after crop

				
					$imageSize = getimagesize("../../".$this->uploaddir."/".$this->filename);
					$imageWidth = $imageSize[0];
					$imageHeight = $imageSize[1];
				 
					$js.= "
						<script>
							$(document).ready(function(){
							
								var imageWidth = '".$_POST["w"]."';
								var imageHeight = '".$_POST["h"]."';
								
								if(imageWidth == ''){
									imageWidth = '".$imageWidth."';
								}
								if(imageHeight == ''){
									imageHeight = '".$imageHeight."';
								}

								var deleteButton = '<img src=\"libs/Panel/icons/Erase.png\" height=\"15\" width=\"15\"\
														style=\"cursor:pointer;\" onclick=\"cleanCoords();\" />';
														
								$('#file_name_display').html('".$this->filename." ' + imageWidth + 'x' + imageHeight + ' ' + deleteButton);
							});
						</script>
					";
				}
			}
			else{ // normal file component

				if($_POST["action"] == $this->uploadAction){ // after upload
				 
					$js.= "
						<script>
							$(document).ready(function(){
							
								var imageWidth = '".$_POST["w"]."';
								var imageHeight = '".$_POST["h"]."';
								
								if(imageWidth == ''){
									imageWidth = '".$imageWidth."';
								}
								if(imageHeight == ''){
									imageHeight = '".$imageHeight."';
								}

								var deleteButton = '<img src=\"libs/Panel/icons/Erase.png\" height=\"15\" width=\"15\"\
														style=\"cursor:pointer;\" onclick=\"cleanCoords();\" />';
								
								$('#file_name_display').html('".$this->filename." ' + imageWidth + 'x' + imageHeight + ' ' + deleteButton);
							});
						</script>
					";
				
				}
			
			}
		}	
		
		$js .= "<script>";
		$js .= "$('#".$this->id."_select').click(function(){";
		$js .= "$('form').append('<input id=\"action\" name=\"action\" type=\"hidden\" value=\"".$this->uploadAction."\"  />');";
		$js .= "$('form').submit();";
		$js .= "$('#action').remove();";
		$js .= "});";
		$js .= "</script>";
		
		return $html.$js;
	}
	
	public function getJS(){
		
		if($this->required == "true"){
			$js .= "$(document).ready(function(e){
						$('form').submit(function(){
							if($('#isSubmitted').val() == 'true'){
								if($('#file_name_display').html() == ''){
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
	
	public function upload(){
	
		$uploadfile = '../../'.$this->uploaddir."/".$this->filename;
		if (!move_uploaded_file($_FILES[$this->name]['tmp_name'], $uploadfile)) {
			Notification::error("Dosya kaydedilemedi!");
			
			return false;
		}
		
		return true;
	}
	
	public function crop(){
		
		if(!empty($_POST["w"])){
			
			$imagePath = '../../'.$this->uploaddir."/".$this->filename;
			$imgUtils = new ImageUtils();
			$imgUtils->open($imagePath);
			$imgUtils->crop($_POST["x1"],$_POST["y1"],$_POST["w"],$_POST["h"]);
			$croppedImagePath = str_replace(".jpg", "", $imagePath)."_cropped";
			$imgUtils->save($croppedImagePath, 'jpg');
			copy($croppedImagePath.".jpg", $imagePath);
			unlink($croppedImagePath.".jpg");
		}
	}
}
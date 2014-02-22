$(document).ready(function() {
	$('select').selectbox({ inputClass: "styledselect_form_1" });
	
	$("input[type=file]").filestyle({ 
		image: "libs/Panel/images/forms/upload_file.gif",
		imageheight : 29,
		imagewidth : 78,
		width : 300
	});
	
	CKEDITOR.replaceAll();
});$(document).ready(function(){
					$('#account').click(function(){
						location = '?page=account';
					});
				});$(document).ready(function(){
					$('#logout').click(function(){
						$('form').append('<input id="action" name="action" type="hidden" value="logoutClick();"  />');
						$('form').submit();
						$('#action').remove();
					});
				});$(document).ready(function(){
					$('#menu1').click(function(){
						location = '?page=page1';
					});
				});$(document).ready(function(e){
						$('form').submit(function(){
							if($('#isSubmitted').val() == 'true'){
								if($('#field1').val() == ''){
									notify('error', 'Lütfen Field 1 alanını doldurunuz');
									$('#isSubmitted').val('false');
									return false;
								}
							}
							
						});
				   });
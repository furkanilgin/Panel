$(document).ready(function() {
	$('select').selectbox({ inputClass: "styledselect_form_1" });
	
	$("input[type=file]").filestyle({ 
		image: "libs/Panel/images/forms/upload_file.gif",
		imageheight : 29,
		imagewidth : 78,
		width : 300
	});

	//CKEDITOR.replaceAll();
});$(document).ready(function(){
					$('#account').click(function(){
						location = '?page=account';
					});
				});$(document).ready(function(){
					$('#logout').click(function(){
						$('form').append('<input id="action" name="action" type="hidden" value="logout();"  />');
						$('form').submit();
						$('#action').remove();
					});
				});$(document).ready(function(){
					$('#hakkimizda').click(function(){
						location = '?page=hakkimizda';
					});
				});$(document).ready(function(){
					$('#hizmetlerimiz').click(function(){
						location = '?page=hizmetlerimiz';
					});
				});$(document).ready(function(){
					$('#blog').click(function(){
						location = '?page=blog';
					});
				});$(document).ready(function(){
					$('#iletisim').click(function(){
						location = '?page=iletisim';
					});
				});$(document).ready(function(){
					$('#insan_kaynaklari').click(function(){
						location = '?page=insan_kaynaklari';
					});
				});$(document).ready(function(){ $(document).attr('title', 'Osmani - Yönetim Paneli'); });
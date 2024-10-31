jQuery(document).ready(function($){
	var notecheck = "";
	$("#shortcode_holder").html('[noted cat="'+$("#sl_cate_up").val()+'" ]');
	$("#want_disp_all").change(function(){
		notecheck = $('input[type=checkbox]').prop('checked');
		if(notecheck){
			$("div#not_all_notes").slideUp();
			$("#shortcode_holder").html('[my_notes]');	
		}
		else{
			$("#shortcode_holder").html('[noted cat="'+$("#sl_cate_up").val()+'" ]');
			$("div#not_all_notes").slideDown();
		}
	});

	$("select#sl_cate_up").change(function(){
		$("#shortcode_holder").html('[noted cat="'+$(this).val()+'"]');
		if($("select#sl_order_up").val().length > 0){
			$("#shortcode_holder").html('[noted cat="'+$(this).val()+'" ]');
		}
	});


});
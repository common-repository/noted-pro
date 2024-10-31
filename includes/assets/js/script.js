/* ALL JS FOR FORNTEND NOTEPAD */

function printContent(data) {
  var html = data;
   
      var WindowObject = window.open("", "PrintWindow",
      "width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes");
      WindowObject.document.writeln(html);
      WindowObject.document.close();
      WindowObject.focus();
      WindowObject.print();
      WindowObject.close();
  }


jQuery(document).ready(function($){
initGrid();
$(".noted_pro_con").click(function(event){
    event.preventDefault();
    $("div#loading_note_pad").show();
    // We'll pass this variable to the PHP function example_ajax_request
    var datast = $(this).attr("data-id");
     
    // This does the ajax request
    $.ajax({
        url: ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
        data: {
            'action': 'printing_get_content_req',
            'termid' : datast
        },
        success:function(data) {
          $("div#loading_note_pad").hide();
          printContent(data);
        },
        error: function(errorThrown){
            console.log(errorThrown);
        }
    }); 

});

$(".noted_pro_conpid").click(function(event){
    event.preventDefault();
    $("div#loading_note_pad").show();
    // We'll pass this variable to the PHP function example_ajax_request
    var datast = $(this).attr("data-pid");
     
    // This does the ajax request
    $.ajax({
        url: ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
        data: {
            'action': 'printing_get_content_single',
            'postid' : datast
        },
        success:function(data) {
          $("div#loading_note_pad").hide();
          printContent(data);
        },
        error: function(errorThrown){
            console.log(errorThrown);
        }
    }); 

});


function initGrid() {
  var grid = new Muuri('.notepad_bf_grid', {
    items : '.notepad_bf_item',
    dragEnabled: true,
    layoutOnInit: false
  }).on('move', function () {
    saveLayout(grid);
  });

  var layout = user_sec_layout;
  if (layout) {
    try {
      loadLayout(grid, layout);
    }
    catch(e){
      grid.layout(true);
    }

  } else {
    grid.layout(true);
  }
}

function serializeLayout(grid) {
  var itemIds = grid.getItems().map(function (item) {
    return item.getElement().getAttribute('data-id');
  });
  return JSON.stringify(itemIds);
}

function saveLayout(grid) {
  $("div#loading_note_pad").show();
  var layout = serializeLayout(grid);
    // This does the ajax request
  $.ajax({
      url: ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
      type: 'POST',
      data: {
          'action': 'notepro_sv_loc_ajax_request',
          'layout' : layout,
          'pageid' : $(".notepad_bf_form").attr("data-id")
      },
      success:function(data) {
          // This outputs the result of the ajax request
          console.log(data);
          $("#loading_note_pad").hide();
      },
      error: function(errorThrown){
          console.log(errorThrown);
      }
  }); 
}

function loadLayout(grid, serializedLayout) {
  var layout = JSON.parse(serializedLayout);
  var currentItems = grid.getItems();
  var currentItemIds = currentItems.map(function (item) {
    return item.getElement().getAttribute('data-id')
  });
  var newItems = [];
  var itemId;
  var itemIndex;

  for (var i = 0; i < layout.length; i++) {
    itemId = layout[i];
    itemIndex = currentItemIds.indexOf(itemId);
    if (itemIndex > -1) {
      newItems.push(currentItems[itemIndex])
    }
  }

  grid.sort(newItems, {layout: 'instant'});
}


$(".notepad_bf_txt_ara").click(function(){
  $(this).addClass("notepad_bf_active");
 // $(this).children().first(".note_bf_txt_hold").find("textarea").focus();
});

$(".notepad_bf_txt_ara textarea").blur(function(){

  $(this).parent().parent().parent(".notepad_bf_txt_ara").each(function(){
    if($(this).find("textarea").val().length <= 0){
      //$(this).find("textarea").css("opacity","0");
      $(this).removeClass("notepad_bf_active");
    }
  })

});

$(".notepad_bf_txt_ara textarea").keyup(function(){
    $("#loading_note_pad").show();
	var notred = $(this).parent().parent().parent().parent().parent().find('.noted_pro_conpid');
	notred.addClass('disableclick');
	$(".noted_pro_con").addClass('disableclick');
      // This does the ajax request
    $.ajax({
        url: ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
        type: 'POST',
        data: {
            'action': 'notepro_bf_save_ajax_request',
            'notepad' : JSON.stringify($(".notepad_bf_form").serializeArray())
        },
        success:function(data) {
            // This outputs the result of the ajax request
            console.log(data);
            $("#loading_note_pad").hide();
			$(".notepad_bf_grid .notepad_pro_link_post .noted_pro_conpid").removeClass('disableclick');
			$(".noted_pro_con").removeClass('disableclick');
        },
        error: function(errorThrown){
            console.log(errorThrown);
        }
    });  

});

});
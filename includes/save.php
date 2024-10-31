<?php
function notepro_bf_save_ajax_request() {
 
    // The $_REQUEST contains all the data sent via ajax
    if ( isset($_REQUEST) ) {
     if(is_user_logged_in()){
        $notpd = $_REQUEST['notepad'];
        update_user_meta(get_current_user_id(),'notepaddata',$notpd);
     }
     else{
        echo "Un-Authorized Request";
     }
    }
    return 0;
     
    // Always die in functions echoing ajax content
   die();
}
 
add_action( 'wp_ajax_notepro_bf_save_ajax_request', 'notepro_bf_save_ajax_request' );
add_action( 'wp_ajax_nopriv_notepro_bf_save_ajax_request', 'notepro_bf_save_ajax_request' );


function notepro_sv_loc_ajax_request() {
 
    // The $_REQUEST contains all the data sent via ajax
    if ( isset($_REQUEST) ) {
     if(is_user_logged_in()){
        $pageid = sanitize_text_field($_REQUEST['pageid']);
        update_user_meta(get_current_user_id(),'layout_'.$pageid,sanitize_text_field($_REQUEST['layout']));
     }
     else{
        echo "Un-Authorized Request";
     }
    }
    return 0;
     
    // Always die in functions echoing ajax content
   die();
}
 
add_action( 'wp_ajax_notepro_sv_loc_ajax_request', 'notepro_sv_loc_ajax_request' );
add_action( 'wp_ajax_nopriv_notepro_sv_loc_ajax_request', 'notepro_sv_loc_ajax_request' );

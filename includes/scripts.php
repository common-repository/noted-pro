<?php
/**
* Contains CSS/JS assets and admin styles
*/

/**
 * Proper way to enqueue scripts and styles.
 */
function notepad_bf_frontend_scripts() {


   wp_enqueue_style( 'notepadpro-main',  plugin_dir_url( __FILE__ )."assets/css/style.css",array(),NOTEPADPRO_VER );
   wp_enqueue_script( 'web-animations', plugin_dir_url( __FILE__ )."assets/js/libraries/web-animations.min.js", array('jquery'),NOTEPADPRO_VER, true );
   wp_enqueue_script( 'hammer', plugin_dir_url( __FILE__ )."assets/js/libraries/hammer.min.js", array('jquery'),NOTEPADPRO_VER, true );
   wp_enqueue_script( 'muuri', plugin_dir_url( __FILE__ )."assets/js/libraries/muuri.min.js", array('jquery'),NOTEPADPRO_VER, true );

   wp_enqueue_script( 'notepadpro-js', plugin_dir_url( __FILE__ )."assets/js/script.js", array('jquery'),NOTEPADPRO_VER, true );


}

add_action('wp_head', 'notepad_bf_frontend_ajaxurl');

function notepad_bf_frontend_ajaxurl() {
   global $post;
   $count_posts = wp_count_posts( 'notepad' )->publish;
   $usersavedposts = get_user_meta(get_current_user_id(),'savedposts',true);
   if(empty($usersavedposts) || $usersavedposts != $count_posts){
   	 update_user_meta(get_current_user_id(),'layout_'.$post->ID,"");
   	 update_user_meta(get_current_user_id(),'savedposts',$count_posts);
   }
   echo "<script type='text/javascript'>
           var ajaxurl = '" . admin_url('admin-ajax.php') . "';
           var user_sec_layout = '".get_user_meta(get_current_user_id(),'layout_'.$post->ID,true)."';
         </script>";
}


add_action( 'admin_enqueue_scripts', 'notepad_bf_load_admin_style' );
function notepad_bf_load_admin_style() {
	global $post_type;
  $notepadreq = "";
  if(!empty($_REQUEST['page'])){
    $notepadreq = sanitize_text_field($_REQUEST['page']);
  }
  if( 'notepad' == $post_type || $notepadreq == "notepadshortcode") {
		wp_enqueue_style( 'notepadpro-adminmain',  plugin_dir_url( __FILE__ )."assets/admin/css/style.css",array(),NOTEPADPRO_VER );
    wp_enqueue_script( 'notepadpro-adminjs',  plugin_dir_url( __FILE__ )."assets/admin/js/script.js",array(),NOTEPADPRO_VER );
	}
}

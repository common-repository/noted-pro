<?php
/*
* Notepad
*/

// Register Custom Post Type
function notepad_post_type() {

	$labels = array(
		'name'                  => _x( 'Noted', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Noted', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Noted', 'text_domain' ),
		'name_admin_bar'        => __( 'Noted', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Noted', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Noted', 'text_domain' ),
		'description'           => __( 'Noted', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-aside',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'notepad', $args );

}
add_action( 'init', 'notepad_post_type', 0 );



add_action( 'add_meta_boxes', 'notepad_employee_meta' );

// Register Custom Taxonomy
function notepad_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Noted Cateogries', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Noted Cateogries', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Noted Categories', 'text_domain' ),
		'all_items'                  => __( 'All Category', 'text_domain' ),
		'parent_item'                => __( 'Parent Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Categories:', 'text_domain' ),
		'new_item_name'              => __( 'New Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Category', 'text_domain' ),
		'update_item'                => __( 'Update Category', 'text_domain' ),
		'view_item'                  => __( 'View Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Categories with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Category', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Categories', 'text_domain' ),
		'items_list'                 => __( 'Noted Categories list', 'text_domain' ),
		'items_list_navigation'      => __( 'Noted Categories list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'notepads', array( 'notepad' ), $args );

}
add_action( 'init', 'notepad_taxonomy', 0 );
 
/* Saving the data */
add_action( 'save_post', 'notepad_meta_save' );
 
	/* Adding the main meta box container to the post editor screen */
	function notepad_employee_meta() {
	    add_meta_box(
	        'notepad-details',
	       'Notepad Information',
	        'notepad_details_init',
	        'notepad');
	}
 
	/*Printing the box content */
	function notepad_details_init() {
	    global $post;
	    // Use nonce for verification
	    wp_nonce_field( plugin_basename( __FILE__ ), 'employee_nonce' );
	    ?>
	    <div id="notepad_meta_item">
	    <?php
 
	    //Obtaining the linked employeedetails meta values
	    $notepadDetails = get_post_meta($post->ID,'notepadDetails',true);
	    $c = 0;
	    if ( count( $notepadDetails ) > 0 && is_array($notepadDetails)) {
	        foreach( $notepadDetails as $employeeDetail ) {
	            if ( isset( $employeeDetail['name'] ) || isset( $employeeDetail['bio'] ) ) {
	                printf( '<div class="sm_ro_inr"><div class="sm_row_gp"><label class="sm_quz">Question</label> <input type="text" name="notepadDetails[%1$s][name]" value="%2$s" /></div> <div class="sm_row_gp"><label class="sm_quz">Suggestion</label>  <textarea name="notepadDetails[%1$s][bio]"  rows="4" cols="50" >%3$s</textarea></div><a href="#" class="remove-package">%4$s</a></div>', $c, $employeeDetail['name'], $employeeDetail['bio'], 'Remove' );
	                $c = $c +1;
	            }
	        }
	    }
 
	    ?>
	<span id="output-package"></span>
	<a href="#" class="add_package"><?php _e('Add Note Details'); ?></a>
	<script>
	    var $ =jQuery.noConflict();
	    $(document).ready(function() {
	        var count = <?php echo $c; ?>;
	        $(".add_package").click(function() {
	            count = count + 1;
 
	            $('#output-package').append('<div class="sm_ro_inr"><div class="sm_row_gp"><label class="sm_quz">Question</label> <input type="text" name="notepadDetails['+count+'][name]" value="" /></div><div class="sm_row_gp"><label class="sm_quz">Suggestion</label> <textarea name="notepadDetails['+count+'][bio]" rows="4" cols="50" ></textarea></div><a href="#" class="remove-package"><?php echo "Remove"; ?></a></div>' );
	            return false;
	        });
	       $(document.body).on('click','.remove-package',function() {
	            $(this).parent().remove();
	        });
	    });
	    </script>
	</div><?php
 
	}
 
	/* Save function for the entered data */
	function notepad_meta_save( $post_id ) {
	    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
	        return;
	    // Verifying the nonce
	    if ( !isset( $_POST['employee_nonce'] ) )
	        return;
 
	    if ( !wp_verify_nonce( $_POST['employee_nonce'], plugin_basename( __FILE__ ) ) )
	        return;
	    // Updating the notepadDetails meta data
	    $notepadDetails = $_POST['notepadDetails'];
 
	    update_post_meta($post_id,'notepadDetails',$notepadDetails);
	}
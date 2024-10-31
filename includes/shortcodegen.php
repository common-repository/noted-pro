<?php

add_action( 'admin_menu', 'notepad_add_admin_menu' );
add_action( 'admin_init', 'notepad_settings_init' );
function notepad_add_admin_menu()
{
    add_submenu_page(
        'edit.php?post_type=notepad',
        'Shortcode Generator',
        'Shortcode Generator',
        'manage_options',
        'notepadshortcode',
        'notepad_options_page'
    );
}

function notepad_settings_init()
{
    register_setting( 'pluginPage', 'notepad_settings' );
    add_settings_section(
        'notepad_pluginPage_section',
        __( 'Your section description', 'notepad' ),
        'notepad_settings_section_callback',
        'pluginPage'
    );
    add_settings_field(
        'notepad_select_field_0',
        __( 'Settings field description', 'notepad' ),
        'notepad_select_field_0_render',
        'pluginPage',
        'notepad_pluginPage_section'
    );
}

function notepad_select_field_0_render()
{
    $options = get_option( 'notepad_settings' );
    ?>
	<select name='notepad_settings[notepad_select_field_0]'>
		<option value='1' <?php 
    selected( $options['notepad_select_field_0'], 1 );
    ?>>Option 1</option>
		<option value='2' <?php 
    selected( $options['notepad_select_field_0'], 2 );
    ?>>Option 2</option>
	</select>

<?php 
}

function notepad_settings_section_callback()
{
    echo  __( 'This section description', 'notepad' ) ;
}

function notepad_options_page()
{
    ?>
		<div class="shortcode_page_gen">
			<div class="shortcode_page_inr">
				<div class="shortcode_page_title">
					Noted <?php 
    ?> Shortcode Generator
				</div>
				<div class="shortcode_select">
					<div class="display_all_notes">
						<input type="checkbox" value="" id="want_disp_all" /><label for="want_disp_all">Want to display all notes?</label>
					</div>
					<div class="shortcode_sl_row" id="not_all_notes" >
						<label for="sl_cate_up">Select Category</label>
						<select id="sl_cate_up">
							<?php 
    $terms = get_terms( 'notepads' );
    if ( !empty($terms) && !is_wp_error( $terms ) ) {
        foreach ( $terms as $term ) {
            ?>
							       <option value="<?php 
            echo  $term->term_id ;
            ?>"><?php 
            echo  $term->name ;
            ?></option>
							       <?php 
        }
    }
    ?>
						</select>
					</div>				
				</div>
				<div class="shortcode_view">
					<div class="shortcode_viewinr">
						<div id="shortcode_holder">
							[noted]
						</div>
					</div>
				</div>

		
			</div>
		</div>
	<?php 
}

<?php

/**
* Defining Shortcode here
*/
function notepad_bf_output_section( $atts )
{
    global  $post ;
    ob_start();
    notepad_bf_frontend_scripts();
    $category = "";
    $orderby = "";
    if ( !empty($atts['cat']) ) {
        $category = $atts['cat'];
    }
    if ( !empty($atts['order']) ) {
        $orderby = $atts['order'];
    }
    ?>
  <div id='notepad_pro_link'> 
  	<a href='#' class="noted_pro_con" data-id="<?php 
    echo  $category ;
    ?>" ><img src="<?php 
    echo  plugin_dir_url( __FILE__ ) . "assets/images/print.png" ;
    ?>" /></a> 
  </div>
	<form action="" class="notepad_bf_form" data-id="<?php 
    echo  $post->ID ;
    ?>" method="POST">
		<div class="notepad_bf_grid_row">
			<div class="notepad_bf_grid">

			  <?php 
    $args = array();
    $args = array(
        'post_type'      => 'notepad',
        'posts_per_page' => 2,
    );
    if ( !empty($category) ) {
        $args['tax_query'] = array( array(
            'taxonomy' => 'notepads',
            'field'    => 'term_id',
            'terms'    => $category,
        ) );
    }
    
    if ( !empty($orderby) ) {
        $args['orderby'] = 'title';
        
        if ( $orderby == "asc" ) {
            $args['order'] = 'ASC';
        } else {
            $args['order'] = 'DESC';
        }
    
    }
    
    $query = new WP_Query( $args );
    while ( $query->have_posts() ) {
        $query->the_post();
        $userdata = json_decode( get_user_meta( get_current_user_id(), 'notepaddata', true ) );
        $usertxtarea = notepad_get_serdata( $userdata, "notepad_txtarea_" . get_the_ID() . "_sb_1" );
        ?>

			  <div class="notepad_bf_item" data-id="<?php 
        echo  get_the_ID() ;
        ?>">
			    <div class="notepad_bf_item-content">
			   		<div class="notepad_bf_inr_con">
			   			<div class="notepad_bf_title">
			   				<?php 
        the_title();
        ?>
			   			</div>
			   			<div class="notepad_bf_txt_ara <?php 
        if ( !empty($usertxtarea) ) {
            ?>notepad_bf_active<?php 
        }
        ?>">
			   				<?php 
        $notepadDetails = get_post_meta( get_the_ID(), 'notepadDetails', true );
        $c = 0;
        $noteit = 1;
        if ( count( $notepadDetails ) > 0 && is_array( $notepadDetails ) ) {
            foreach ( $notepadDetails as $notepadDetail ) {
                $usertxtarea = notepad_get_serdata( $userdata, "notepad_txtarea_" . get_the_ID() . "_sb_" . $noteit );
                ?>
			   				<div class="note_bf_txt_hold">
			   					<label class="note_bf_label"><?php 
                echo  $notepadDetail['name'] ;
                ?></label>
			   					<div class="note_bf_txtarea_holder">
			   						<textarea name="notepad_txtarea_<?php 
                echo  get_the_ID() ;
                ?>_sb_<?php 
                echo  $noteit ;
                ?>" placeholder="<?php 
                echo  $notepadDetail['bio'] ;
                ?>"><?php 
                if ( !empty($usertxtarea) ) {
                    echo  $usertxtarea ;
                }
                ?></textarea>
			   					</div>
			   				</div>
			   				<?php 
                $noteit++;
            }
        }
        ?>
			   			</div>
			   		</div>

				 <div class='notepad_pro_link_post'> 
				  	<a href='#' class="noted_pro_conpid" data-id="<?php 
        echo  $category ;
        ?>" data-pid="<?php 
        echo  get_the_ID() ;
        ?>" ><img src="<?php 
        echo  plugin_dir_url( __FILE__ ) . "assets/images/print.png" ;
        ?>" /></a> 
				  </div>

			    </div>
			  </div>
			  <?php 
    }
    ?>
			  <?php 
    wp_reset_query();
    wp_reset_postdata();
    ?>
			</div>
			<div id="loading_note_pad" class="notepad-activity"></div>
		</div>
	</form>
	<?php 
    return ob_get_clean();
}

add_shortcode( 'noted', 'notepad_bf_output_section' );
/* DISPLAY ALL NOTEPAD */
function notepad_bf_output_all_section( $atts )
{
    global  $post ;
    ob_start();
    notepad_bf_frontend_scripts();
    $category = "";
    $orderby = "";
    if ( !empty($atts['cat']) ) {
        $category = $atts['cat'];
    }
    if ( !empty($atts['order']) ) {
        $orderby = $atts['order'];
    }
    ?>
  <div id='notepad_pro_link'> 
  	<a href='#' class="noted_pro_con" data-id="<?php 
    echo  $category ;
    ?>" ><img src="<?php 
    echo  plugin_dir_url( __FILE__ ) . "assets/images/print.png" ;
    ?>" /></a> 
  </div>	
	<form action="" class="notepad_bf_form" data-id="<?php 
    echo  $post->ID ;
    ?>" method="POST">

		<div class="notepad_bf_grid_row">
			<div class="notepad_bf_grid">

			  <?php 
    $args = array();
    $args = array(
        'post_type'      => 'notepad',
        'posts_per_page' => 2,
    );
    $query = new WP_Query( $args );
    while ( $query->have_posts() ) {
        $query->the_post();
        $userdata = json_decode( get_user_meta( get_current_user_id(), 'notepaddata', true ) );
        $usertxtarea = notepad_get_serdata( $userdata, "notepad_txtarea_" . get_the_ID() . "_sb_1" );
        ?>

			  <div class="notepad_bf_item" data-id="<?php 
        echo  get_the_ID() ;
        ?>">
			    <div class="notepad_bf_item-content">
			   		<div class="notepad_bf_inr_con">
			   			<div class="notepad_bf_title">
			   				<?php 
        the_title();
        ?>
			   			</div>
			   			<div class="notepad_bf_txt_ara <?php 
        if ( !empty($usertxtarea) ) {
            ?>notepad_bf_active<?php 
        }
        ?>">
			   				<?php 
        $notepadDetails = get_post_meta( get_the_ID(), 'notepadDetails', true );
        $c = 0;
        $noteit = 1;
        if ( count( $notepadDetails ) > 0 && is_array( $notepadDetails ) ) {
            foreach ( $notepadDetails as $notepadDetail ) {
                $usertxtarea = notepad_get_serdata( $userdata, "notepad_txtarea_" . get_the_ID() . "_sb_" . $noteit );
                ?>
			   				<div class="note_bf_txt_hold">
			   					<label class="note_bf_label"><?php 
                echo  $notepadDetail['name'] ;
                ?></label>
			   					<div class="note_bf_txtarea_holder">
			   						<textarea name="notepad_txtarea_<?php 
                echo  get_the_ID() ;
                ?>_sb_<?php 
                echo  $noteit ;
                ?>" placeholder="<?php 
                echo  $notepadDetail['bio'] ;
                ?>"><?php 
                if ( !empty($usertxtarea) ) {
                    echo  $usertxtarea ;
                }
                ?></textarea>
			   					</div>
			   				</div>
			   				<?php 
                $noteit++;
            }
        }
        ?>
			   			</div>
			   		</div>
				  <div class='notepad_pro_link_post'> 
				  	<a href='#' class="noted_pro_conpid" data-id="<?php 
        echo  $category ;
        ?>" data-pid="<?php 
        echo  get_the_ID() ;
        ?>" ><img src="<?php 
        echo  plugin_dir_url( __FILE__ ) . "assets/images/print.png" ;
        ?>" /></a> 
				  </div>	

			    </div>

			  </div>
			  <?php 
    }
    ?>
			  <?php 
    wp_reset_query();
    wp_reset_postdata();
    ?>
			</div>
			<div id="loading_note_pad" class="notepad-activity"></div>
		</div>
	</form>
	<?php 
    return ob_get_clean();
}

add_shortcode( 'my_notes', 'notepad_bf_output_all_section' );
<?php

function printing_get_content_single()
{
    // The $_REQUEST contains all the data sent via ajax
    
    if ( isset( $_REQUEST ) ) {
        $postid = $_REQUEST['postid'];
        ?>
        <html>
        <head>
            <style type="text/css" media="print">
              @page { size: landscape; }
            </style>
            <style type="text/css">
				.noted_row {page-break-after: always;}
                html {
                  -webkit-box-sizing: border-box;
                  -moz-box-sizing: border-box;
                  box-sizing: border-box;
                }
                *, *:before, *:after {
                  -webkit-box-sizing: inherit;
                  -moz-box-sizing: inherit;
                  box-sizing: inherit;
                  }  
                /* STYLE FOR FRONTEND */
                @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700');

                /* PACE */
                .notepad-activity {
                  display: block;

                  z-index: 2000;

                  border: solid 2px transparent;
                  border-top-color: #000000;
                  border-left-color: #000000;
                  -webkit-animation: pace-spinner 400ms linear infinite;
                  -moz-animation: pace-spinner 400ms linear infinite;
                  -ms-animation: pace-spinner 400ms linear infinite;
                  -o-animation: pace-spinner 400ms linear infinite;
                  animation: pace-spinner 400ms linear infinite;
                }

                @-webkit-keyframes pace-spinner {
                  0% { -webkit-transform: rotate(0deg); transform: rotate(0deg); }
                  100% { -webkit-transform: rotate(360deg); transform: rotate(360deg); }
                }
                @-moz-keyframes pace-spinner {
                  0% { -moz-transform: rotate(0deg); transform: rotate(0deg); }
                  100% { -moz-transform: rotate(360deg); transform: rotate(360deg); }
                }
                @-o-keyframes pace-spinner {
                  0% { -o-transform: rotate(0deg); transform: rotate(0deg); }
                  100% { -o-transform: rotate(360deg); transform: rotate(360deg); }
                }
                @-ms-keyframes pace-spinner {
                  0% { -ms-transform: rotate(0deg); transform: rotate(0deg); }
                  100% { -ms-transform: rotate(360deg); transform: rotate(360deg); }
                }
                @keyframes pace-spinner {
                  0% { transform: rotate(0deg); transform: rotate(0deg); }
                  100% { transform: rotate(360deg); transform: rotate(360deg); }
                }

                /* NOTEPAD */
                .notepad_bf_grid {
                  position: relative;
                }
                .notepad_bf_item {
                  display: block;
                  position: absolute;
                  margin: 8px;
                  z-index: 1;
                }
                .notepad_bf_item.muuri-item-dragging {
                  z-index: 3;
                }
                .notepad_bf_item.muuri-item-releasing {
                  z-index: 2;
                }
                .notepad_bf_item.muuri-item-hidden {
                  z-index: 0;
                }
                .notepad_bf_item-content {
                  position: relative;
                  width: 100%;
                  height: 100%;
                }
                .notepad_bf_item {
                  width: 30%;
                  height: auto;
                  background: #fff;
                }

                .notepad_bf_title {
                    color: #000;
                    font-size: 16px;
                    font-weight: bold;
                }

                .notepad_bf_item-content {
                    -webkit-box-shadow: 0 0px 3px rgba(68, 68, 68, 0.25);
                    box-shadow: 0 0px 3px rgba(68, 68, 68, 0.25);
                    border-radius: 0.2rem;
                    padding: 16px;
                }

                .note_bf_txtarea_holder {
                    height: 90px;
                    
                }

                .note_bf_txtarea_holder textarea {
                    opacity:0;
                }

                .notepad_bf_inr_con {
                    font-family: 'Open Sans', sans-serif;
                }

                label.note_bf_label {
                    font-family: 'Open Sans', sans-serif;
                    color: #999;
                    font-size: 13px;
                    line-height: 1;
                }
                label.note_bf_label {
                    font-weight: 600;
                }
                .notepad_bf_txt_ara {
                    padding-top: 6px;
                }
                .notepad_bf_txt_ara.notepad_bf_active {}

                .notepad_bf_txt_ara.notepad_bf_active textarea {
                    opacity:1;
                }

                .notepad_bf_txt_ara.notepad_bf_active .note_bf_txtarea_holder {
                    background: #fff;
                }

                .notepad_bf_txt_ara textarea {
                    width: 100% !important;
                    padding: 0 !important;
                    max-width: 100%;
                    border: 0;
                    resize: none;
                }

                .notepad_bf_txt_ara textarea::placeholder {
                    font-size: 13px;
                    font-style: italic;
                    font-family: "Open Sans";
                    color: #8f8f8f;
                }
                .notepad_bf_txt_ara textarea {
                    font-size: 13px !important;
                    height: 90px;
                }
                .notepad_bf_txt_ara textarea {

                }

                div#loading_note_pad {
                    position: absolute;
                    top: -30px;
                    width: 20px;
                    height: 20px;
                    border-radius: 50%;
                }
                div#loading_note_pad {
                    left: 10px;
                }
                .notepad_bf_grid_row {
                    position: relative;
                }
                div#loading_note_pad {
                    display: none;
                }
                .notepad_bf_title {
                    text-transform: uppercase;
                }
                a#noted_pro_con {
                    display: block;
                    text-align: right;
                }

                a#noted_pro_con img {
                    float: right;
                }

                a#noted_pro_con::after {
                    content: "";
                    display: block;
                    clear: both;
                }

                div#notepad_pro_link {
                    padding-right: 13px;
                }

                div#notepad_pro_link {
                    padding-bottom: 5px;
                }
                a#noted_pro_con img {
                    max-width: 28px !important;
                }

                div#notepad_pro_link {
                    margin-bottom: 0 !important;
                }

                div#notepad_pro_link {
                    text-align: right;
                }
                #notepad_pro_link img {max-width: 28px;}

                #notepad_pro_link img {
                    float: right;
                }

                div#notepad_pro_link::after {
                    content: "";
                    display: block;
                    clear: both;
                }


                .notepad_bf_item {position: relative;float: left;}

                .notepad_bf_item-content {
                    height: auto;
                }

                .notepad_bf_grid::after {
                    content: "";
                    display: block;
                    clear: both;
                }

                .note_bf_txtarea_holder {
                    min-height: 90px;
                    height: auto;
                }

                .noted_print_hold {
                    padding-top: 7px;
                    padding-bottom: 10px;
                }

                .notepad_bf_grid_row {
                    padding-top: 15px;
                }
                .noted_row::after {
                    content: "";
                    display: block;
                    clear: both;
                }
                .noted_print_hold {
                    font-size: 14px;
                    color: #666;
                }
            </style>
        </head>
        <body>
            <div class="notepad_bf_grid_row">
                <div class="notepad_bf_grid">
                   <div class="noted_row">
                  <?php 
        $args = array();
        $numOfCols = 3;
        $rowCount = 0;
        $args = array(
            'p'              => $postid,
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
                                        <div class="noted_print_hold">
                                            <?php 
                    if ( !empty($usertxtarea) ) {
                        echo  $usertxtarea ;
                    }
                    ?>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                    $noteit++;
                }
            }
            ?>
                            </div>
                        </div>
                    </div>
                  </div>
                    <?php 
            $rowCount++;
            if ( $rowCount % $numOfCols == 0 ) {
                echo  '</div><div class="noted_row">' ;
            }
            ?>

                  <?php 
        }
        ?>
                  <?php 
        wp_reset_query();
        wp_reset_postdata();
        ?>
                </div>
            </div>
        </body>
        </html>
        <?php 
    }
    
    // Always die in functions echoing ajax content
    die;
}

add_action( 'wp_ajax_printing_get_content_single', 'printing_get_content_single' );
add_action( 'wp_ajax_nopriv_printing_get_content_single', 'printing_get_content_single' );
function printing_get_content_req()
{
    // The $_REQUEST contains all the data sent via ajax
    
    if ( isset( $_REQUEST ) ) {
        $category = $_REQUEST['termid'];
        ?>
        <html>
        <head>
            <style type="text/css" media="print">
              @page { size: landscape; }
            </style>
            <style type="text/css">
				
				.noted_row {page-break-after: always;}
				
                html {
                  -webkit-box-sizing: border-box;
                  -moz-box-sizing: border-box;
                  box-sizing: border-box;
                }
                *, *:before, *:after {
                  -webkit-box-sizing: inherit;
                  -moz-box-sizing: inherit;
                  box-sizing: inherit;
                  }  
                /* STYLE FOR FRONTEND */
                @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700');

                /* PACE */
                .notepad-activity {
                  display: block;

                  z-index: 2000;

                  border: solid 2px transparent;
                  border-top-color: #000000;
                  border-left-color: #000000;
                  -webkit-animation: pace-spinner 400ms linear infinite;
                  -moz-animation: pace-spinner 400ms linear infinite;
                  -ms-animation: pace-spinner 400ms linear infinite;
                  -o-animation: pace-spinner 400ms linear infinite;
                  animation: pace-spinner 400ms linear infinite;
                }

                @-webkit-keyframes pace-spinner {
                  0% { -webkit-transform: rotate(0deg); transform: rotate(0deg); }
                  100% { -webkit-transform: rotate(360deg); transform: rotate(360deg); }
                }
                @-moz-keyframes pace-spinner {
                  0% { -moz-transform: rotate(0deg); transform: rotate(0deg); }
                  100% { -moz-transform: rotate(360deg); transform: rotate(360deg); }
                }
                @-o-keyframes pace-spinner {
                  0% { -o-transform: rotate(0deg); transform: rotate(0deg); }
                  100% { -o-transform: rotate(360deg); transform: rotate(360deg); }
                }
                @-ms-keyframes pace-spinner {
                  0% { -ms-transform: rotate(0deg); transform: rotate(0deg); }
                  100% { -ms-transform: rotate(360deg); transform: rotate(360deg); }
                }
                @keyframes pace-spinner {
                  0% { transform: rotate(0deg); transform: rotate(0deg); }
                  100% { transform: rotate(360deg); transform: rotate(360deg); }
                }

                /* NOTEPAD */
                .notepad_bf_grid {
                  position: relative;
                }
                .notepad_bf_item {
                  display: block;
                  position: absolute;
                  margin: 8px;
                  z-index: 1;
                }
                .notepad_bf_item.muuri-item-dragging {
                  z-index: 3;
                }
                .notepad_bf_item.muuri-item-releasing {
                  z-index: 2;
                }
                .notepad_bf_item.muuri-item-hidden {
                  z-index: 0;
                }
                .notepad_bf_item-content {
                  position: relative;
                  width: 100%;
                  height: 100%;
                }
                .notepad_bf_item {
                  width: 30%;
                  height: auto;
                  background: #fff;
                }

                .notepad_bf_title {
                    color: #000;
                    font-size: 16px;
                    font-weight: bold;
                }

                .notepad_bf_item-content {
                    -webkit-box-shadow: 0 0px 3px rgba(68, 68, 68, 0.25);
                    box-shadow: 0 0px 3px rgba(68, 68, 68, 0.25);
                    border-radius: 0.2rem;
                    padding: 16px;
                }

                .note_bf_txtarea_holder {
                    height: 90px;
                    
                }

                .note_bf_txtarea_holder textarea {
                    opacity:0;
                }

                .notepad_bf_inr_con {
                    font-family: 'Open Sans', sans-serif;
                }

                label.note_bf_label {
                    font-family: 'Open Sans', sans-serif;
                    color: #999;
                    font-size: 13px;
                    line-height: 1;
                }
                label.note_bf_label {
                    font-weight: 600;
                }
                .notepad_bf_txt_ara {
                    padding-top: 6px;
                }
                .notepad_bf_txt_ara.notepad_bf_active {}

                .notepad_bf_txt_ara.notepad_bf_active textarea {
                    opacity:1;
                }

                .notepad_bf_txt_ara.notepad_bf_active .note_bf_txtarea_holder {
                    background: #fff;
                }

                .notepad_bf_txt_ara textarea {
                    width: 100% !important;
                    padding: 0 !important;
                    max-width: 100%;
                    border: 0;
                    resize: none;
                }

                .notepad_bf_txt_ara textarea::placeholder {
                    font-size: 13px;
                    font-style: italic;
                    font-family: "Open Sans";
                    color: #8f8f8f;
                }
                .notepad_bf_txt_ara textarea {
                    font-size: 13px !important;
                    height: 90px;
                }
                .notepad_bf_txt_ara textarea {

                }

                div#loading_note_pad {
                    position: absolute;
                    top: -30px;
                    width: 20px;
                    height: 20px;
                    border-radius: 50%;
                }
                div#loading_note_pad {
                    left: 10px;
                }
                .notepad_bf_grid_row {
                    position: relative;
                }
                div#loading_note_pad {
                    display: none;
                }
                .notepad_bf_title {
                    text-transform: uppercase;
                }
                a#noted_pro_con {
                    display: block;
                    text-align: right;
                }

                a#noted_pro_con img {
                    float: right;
                }

                a#noted_pro_con::after {
                    content: "";
                    display: block;
                    clear: both;
                }

                div#notepad_pro_link {
                    padding-right: 13px;
                }

                div#notepad_pro_link {
                    padding-bottom: 5px;
                }
                a#noted_pro_con img {
                    max-width: 28px !important;
                }

                div#notepad_pro_link {
                    margin-bottom: 0 !important;
                }

                div#notepad_pro_link {
                    text-align: right;
                }
                #notepad_pro_link img {max-width: 28px;}

                #notepad_pro_link img {
                    float: right;
                }

                div#notepad_pro_link::after {
                    content: "";
                    display: block;
                    clear: both;
                }


                .notepad_bf_item {position: relative;float: left;}

                .notepad_bf_item-content {
                    height: auto;
                }

                .notepad_bf_grid::after {
                    content: "";
                    display: block;
                    clear: both;
                }

                .note_bf_txtarea_holder {
                    min-height: 90px;
                    height: auto;
                }

                .noted_print_hold {
                    padding-top: 7px;
                    padding-bottom: 10px;
                }

                .notepad_bf_grid_row {
                    padding-top: 15px;
                }
                .noted_row::after {
                    content: "";
                    display: block;
                    clear: both;
                }
                .noted_print_hold {
                    font-size: 14px;
                    color: #666;
                }
            </style>
        </head>
        <body>
            <div class="notepad_bf_grid_row">
                <div class="notepad_bf_grid">
                   <div class="noted_row">
                  <?php 
        $args = array();
        $numOfCols = 3;
        $rowCount = 0;
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
                                        <div class="noted_print_hold">
                                            <?php 
                    if ( !empty($usertxtarea) ) {
                        echo  $usertxtarea ;
                    }
                    ?>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                    $noteit++;
                }
            }
            ?>
                            </div>
                        </div>
                    </div>
                  </div>
                    <?php 
            $rowCount++;
            if ( $rowCount % $numOfCols == 0 ) {
                echo  '</div><div class="noted_row">' ;
            }
            ?>

                  <?php 
        }
        ?>
                  <?php 
        wp_reset_query();
        wp_reset_postdata();
        ?>
                </div>
            </div>
        </body>
        </html>
        <?php 
    }
    
    // Always die in functions echoing ajax content
    die;
}

add_action( 'wp_ajax_printing_get_content_req', 'printing_get_content_req' );
add_action( 'wp_ajax_nopriv_printing_get_content_req', 'printing_get_content_req' );
<?php

define( 'NOTEPADPRO_VER', rand() );

if ( !function_exists( 'notepad_fs' ) ) {
    // Create a helper function for easy SDK access.
    function notepad_fs()
    {
        global  $notepad_fs ;
        
        if ( !isset( $notepad_fs ) ) {
            // Activate multisite network integration.
            if ( !defined( 'WP_FS__PRODUCT_3406_MULTISITE' ) ) {
                define( 'WP_FS__PRODUCT_3406_MULTISITE', true );
            }
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $notepad_fs = fs_dynamic_init( array(
                'id'             => '3406',
                'slug'           => 'notedpro',
                'premium_slug'   => 'notepad-premium',
                'type'           => 'plugin',
                'public_key'     => 'pk_529c9c49c96db7a93390db2464abe',
                'is_premium'     => false,
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'first-path' => 'plugins.php',
                'contact'    => false,
                'support'    => false,
            ),
                'is_live'        => true,
            ) );
        }
        
        return $notepad_fs;
    }
    
    // Init Freemius.
    notepad_fs();
    // Signal that SDK was initiated.
    do_action( 'notepad_fs_loaded' );
}

function notepad_admin_notice__success()
{
    ?>
        <div class="notice notice-danger" id="note_pad_notice_main">
            <p><?php 
    _e( 'Notepad: Only 2 notes will be show on frontend with free version. <a href="' . site_url() . '/wp-admin/admin.php?billing_cycle=annual&page=notepad-pricing" class="upgrae_btn">Upgrade Now</a> to display unlimited notes', 'sample-text-domain' );
    ?></p>
        </div>
    <?php 
}

add_action( 'admin_notices', 'notepad_admin_notice__success' );
<?php
/*
Plugin Name: Noted PRO (Premium)
Plugin URI:  http://bloomfactor.com/
Description: Noted PRO allow you to add notes in a better way. 
Version:     1.02
Author:      Bloom Factor
Author URI:  http://bloomfactor.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: notepadpro
*/


// Global definitions
require_once('includes/defines.php');

// Helper functions
require_once('includes/helper.php');

// Adding ability to recongnize shortcode
require_once('includes/shortcode.php');

// Including CPT for backend
require_once('includes/cpt.php');

// Including scripts to site
require_once('includes/scripts.php');

// AJAX/Saving to Database
require_once('includes/save.php');

// Print Response
require_once('includes/print.php');

// Shortcode Generator
require_once('includes/shortcodegen.php');
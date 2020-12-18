<?php

/*
 Plugin Name: Imumi Time Line
 * Version: 1.0.0
 * */

include(__DIR__.'/admin/index.php');
include(__DIR__.'/create_table.php');
register_activation_hook(__FILE__, 'tl_create_table');

/* include(__DIR__.'/create_static_page.php'); */
/* register_activation_hook(__FILE__, 'tl_create_static_page'); */
/* add_action('wp', 'tl_update_static_page'); */


?>

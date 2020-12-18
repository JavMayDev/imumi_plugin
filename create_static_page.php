<?php


$tl_page_args = array(
	'post_type' => 'page',
	'post_name' => 'static_test',
	'post_title' => 'static test',
	'post_content' => include(__DIR__.'/public/index.php'),
	'post_status' => 'publish'
    );

/* function tl_update_static_page () { */
/*     global $tl_page_args; */
/*     wp_update_post($tl_page_args); */
/* } */

function tl_create_static_page () {
    global $tl_page_args;
    $page_id = wp_insert_post($tl_page_args);
    /* update_post_meta($page_id, '_wp_page_template', 'template-timeline.php'); */
}


?>

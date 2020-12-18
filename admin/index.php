
<?php
function tl_admin_page(){
    include(__DIR__.'/page.php');
}

function tl_add_admin_menu(){
    add_menu_page('timeline', 'timeline', 'administrator', 'timeline', 'tl_admin_page','dashicons-chart-area', 99 );
}

add_action('admin_menu', 'tl_add_admin_menu');

?>

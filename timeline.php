<?php

/*
 Plugin Name: Imumi Time Line
 * Version: 1.0.0
 * */

include(__DIR__.'/admin/index.php');
include(__DIR__.'/create_table.php');
register_activation_hook(__FILE__, 'tl_create_tables');

function tl_create_page (){
    $file = fopen(get_template_directory().'/page-timeline.php', 'wb');
    fwrite($file, '<?php include(realpath(__DIR__.\'/../../plugins/timeline/public/index.php\')) ?>');
    fclose($file);
}

register_activation_hook(__FILE__, 'tl_create_page');



?>

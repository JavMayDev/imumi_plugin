<?php

function tl_create_table(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'tl_docs';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
	id mediumint(9) NOT NULL AUTO_INCREMENT,
	date varchar(10),
	content text,
	image_url text,
	type int(1),
	country int(1),
	PRIMARY KEY  (id)
	) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    dbDelta( $sql );
}

?>

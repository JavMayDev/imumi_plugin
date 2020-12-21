<?php

function tl_create_tables(){

    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();


    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    $sql = "CREATE TABLE wp_tl_docs(
	id mediumint(9) NOT NULL AUTO_INCREMENT,
	date varchar(10),
	content text,
	image_url text,
	source text,
	type int(1),
	country text,
	PRIMARY KEY  (id)
	) $charset_collate;";

    dbDelta( $sql );

    $sql = "CREATE TABLE wp_tl_doc_types(
	id mediumint(9) NOT NULL AUTO_INCREMENT,
	type_name text,
	color varchar(6),
	PRIMARY KEY  (id)
	) $charset_collate;";

    dbDelta( $sql );
}

?>

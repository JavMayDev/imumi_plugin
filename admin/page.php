<?php

/* insert doc */
function tl_insert_doc($doc) {
    global $wpdb;
    $wpdb->insert('wp_tl_docs', $doc);
}
if(isset($_POST['doc_submit'])){
    unset($_POST['doc_submit']);
    tl_insert_doc($_POST);
}

/* insert doc type */
function tl_insert_doc_type($doc_type){
    global $wpdb;
    $wpdb->insert('wp_tl_doc_types', $doc_type);
}
if(isset($_POST['doc_type_submit'])) {
    unset($_POST['doc_type_submit']);
    tl_insert_doc_type($_POST);
}

function tl_get_doc_types(){
    global $wpdb;
    return $wpdb->get_results('select * from wp_tl_doc_types');
}
$doc_types = tl_get_doc_types();

/* delete doc */
function tl_get_matched_docs($column, $pattern) {
    global $wpdb;
    return $wpdb->get_results('select * from wp_tl_docs where '.$column.' like "%'.$pattern.'%";');
}
if(isset($_POST['doc_delete_find'])) {
    echo "LEts delete some docs";
    $matched_docs = tl_get_matched_docs($_POST['field'], $_POST['pattern']);
}
function tl_delete_doc ($doc_id) {
    global $wpdb;
    $wpdb->delete('wp_tl_docs', array('id' => $doc_id));
}
if(isset($_POST['doc_delete_by_id'])) {
    tl_delete_doc($_POST['doc_delete_by_id']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
	form {
	    border: 2px solid black;
	    display: flex;
	    flex-direction: column;
	    max-width: 500px;
	    margin:50px;
	    padding: 50px;
	}
    </style>
</head>
<body>

    <h1>Timeline setup admin panel</h1>

    <div style="display: flex; flex-direction: row;">

	<form class='tl_admin_form' method="POST">

	    <h2>Insertar documento</h2>

	    <input type="text" name="date" placeholder="YYYY-MM-DD">
	    <input type="text" name="country" placeholder="pais">
	    <textarea placeholder="contenido" id="" name="content" cols="30" rows="10"></textarea>
	    <input type="text" name='source' placeholder='fuente (url)'>

	    <!-- image input -->
	    <?php
		   if(function_exists( 'wp_enqueue_media' )){
		   wp_enqueue_media();
		   }else{
		   wp_enqueue_style('thickbox');
		   wp_enqueue_script('media-upload');
		   wp_enqueue_script('thickbox');
		   }
		   ?>
		   <div style="display: flex; flex-direction: row;">
		       <img style="height: 100px; width: 100px; object-fit: cover" class="header_logo" src="<?php echo get_option('header_logo'); ?>" height="100" width="100"/>
		       <a href="#" class="header_logo_upload"><button>Imagen</button></a>
		   </div>
		   <input style="display: none;" class="header_logo_url" type="text" name="image_url" size="60" value="<?php echo get_option('header_logo'); ?>">

		   </p>    

		   <label for="">categor&iacute;a</label>
		   <select name="type">

		       <option value="" disabled hidden default>categoria</option>

		       <?php foreach($doc_types as $type): ?>
		       <option 
			       style="background-color: #<?= $type->color?>;" 
			       value="<?= $type->id ?>">
			       <?= $type->type_name?>
		       </option>
		       <?php endforeach; ?>

		   </select>
		   <input type="submit" name="doc_submit">
	</form>

	<form method="POST">
	    <h2>Eliminar documento</h2>
	    <label for="">Filtrar por:</label>
	    <select name="field">
	        <option value="date">Fecha</option>
		<option value="content">contenido</option>
	    </select>
	    <input type="text" name="pattern" placeholder="patron">
	    <input type="submit" name="doc_delete_find" >
		
	    <?php if(isset($matched_docs)): foreach($matched_docs as $doc): ?>
		<div class="tl_matched-doc">
		    <input type="submit" name="doc_delete_by_id" value="<?= $doc->id?>">
		    <div>
			date:
			<?= $doc->date?>
		    </div>
		    <div>
			content:
			<?= $doc->content?>
		    </div>
		</div>
	    <?php endforeach; endif; ?>
		
	</form>
    </div>

    <form class='tl_admin_form' method="POST">

	<h2>Insertar categoria</h2>

	<input type="text" placeholder="nombre de la categoria" name='type_name'>
	<input placeholder="color (hex)" type="text" name='color' id='tl-doc-color-input'>
	<input type="submit" name="doc_type_submit">
    </form>

    <!-- set input background color as hex current value -->
    <script>
	document.getElementById('tl-doc-color-input').addEventListener('change', function(event){
	    event.target.style.backgroundColor = '#' + event.target.value
	})
    </script>
    <script src="<?= plugins_url().'/timeline/admin/uploadMedia.js'?>"></script>
</body>
</html>

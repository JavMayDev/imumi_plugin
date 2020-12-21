<?php

function tl_insert_doc($doc) {
    global $wpdb;
    $wpdb->insert('wp_tl_docs', $doc);
}

if(isset($_POST['doc_submit'])){
    unset($_POST['doc_submit']);
    tl_insert_doc($_POST);
}

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

$res = tl_get_doc_types();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
	.tl_admin_form {
	    display: flex;
	    flex-direction: column;
	    max-width: 500px;
	    margin: 100px;
	}
    </style>
</head>
<body>

    <h1>Timeline setup admin panel</h1>
    <form class='tl_admin_form' method="POST">

	<h2>Insertar documento</h2>

	<input type="text" name="date" placeholder="YYYY-MM-DD">
	<input type="text" name="country" placeholder="pais">
	<textarea id="" name="content" cols="30" rows="10"></textarea>
	<input type="text" name='source' placeholder='fuente (url)'>
	<input type="text" name="image_url" placeholder="image url">
	<select id="" name="type">
	    
	    <option value="" disabled hidden default>categoria</option>

	    <?php foreach($res as $type): ?>
	    <option 
		style="background-color: #<?= $type->color?>;" 
		value="<?= $type->id ?>">
		    <?= $type->type_name?>
	    </option>
	    <?php endforeach; ?>

	</select>
	<input type="submit" name="doc_submit">
    </form>

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
</body>
</html>

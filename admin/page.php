<?php

function tl_insert($doc) {
    global $wpdb;
    $wpdb->insert('wp_tl_docs', $doc);
}

if(isset($_POST['submit'])){
    unset($_POST['submit']);
    tl_insert($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>this is the admin page</h1>
    <!-- <form -->
	<!-- style="display: flex; flex-direction: column; max-width: 500px;" -->
	<!-- method="POST"> -->
    <form
	style="display: flex; flex-direction: column; max-width: 500px;"
	method="POST">
	<input type="text" name="date" placeholder="YYYY-MM-DD">
	<input type="text" name="image_url" placeholder="image url">
	<input type="text" name="country" placeholder="pais">
	<textarea id="" name="content" cols="30" rows="10"></textarea>
	<input type="submit" name="submit">
    </form>
</body>
</html>

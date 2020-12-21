<?php
$docs = $wpdb->get_results('select * from wp_tl_docs');
foreach($docs as $row) {
    $row->content = (str_replace("\r\n", "\\r\\n", $row->content));
}

$doc_types = $wpdb->get_results('select * from wp_tl_doc_types');
?>

<script>
var docs = JSON.parse( '<?php echo json_encode($docs) ?>' )
var doc_types = JSON.parse( '<?php echo json_encode($doc_types) ?>' )
console.log( 'docs_types: ', doc_types )
</script>

<div class="tl_container">
    <!-- info space -->
    <div id="tl_info-wrapper">
	<!-- <img id='week-img' src="" alt=""> -->
	<div id="tl_info"></div>
    </div>

    <div id="timeLineWrapper">
	<div id="timeLine">
	    <svg id="svgIndicator" height="50">
		<path
		    id="pathIndicator"
		    fill="none"
		    stroke="black"
		    stroke-width="2"
		    />
	    </svg>
	    <div><img id="pin" src="http://webmayorque.com/imumi_test/pin.png" alt=""></div>
	    <svg id="svgLine" width="auto"></svg>
	    <div id="monthTags"></div>
	</div>
    </div>
</div>

<button id="toggler">check timeLineData</button>


<script src="<?= plugins_url().'/timeline/public/bundle.js'?>"></script>


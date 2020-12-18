<div class="container">
    <!-- info space -->
    <div id="info-wrapper">
	<!-- <img id='week-img' src="" alt=""> -->
	<div id="info"></div>
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


	</div>
	<script src="/public/plyr/plyr.polyfilled.js"></script>
	<link rel="stylesheet" href="/public/plyr/plyr.css" />
	
	<div data-role="content" data-theme="a">
		<h3>Partie 1</h3>
		
		<script>
		    const player = new Plyr('#player');
		</script>
		<div style="width:100%;height:100%;background:#000">
		<div class="plyr">
			<video src="/public/videos/HankTV_PART1.mp4" id="player1" controls controlsList="nodownload" playsinline poster="/public/plyr/cover.png" data-plyr-config='{ "title": "Partie 1" }' />
		</div>
		</div>
		<h3>Partie 2</h3>

		<div style="width:100%;height:100%;background:#000">
		<div class="plyr">
			<video src="/public/videos/HankTV_PART2.mp4" id="player2" controls controlsList="nodownload" playsinline poster="/public/plyr/cover.png" data-plyr-config='{ "title": "Partie 2" }' />
		</div>
		</div>
		
		<h3>Partie 3-1</h3>
		
		<div style="width:100%;height:100%;background:#000">
		<div class="plyr">
			<video src="/public/videos/HankTV_PART3-1.mp4" id="player3-1" controls controlsList="nodownload" playsinline poster="/public/plyr/cover.png" data-plyr-config='{ "title": "Partie 3-1" }' />
		</div>
		</div>

		<h3>Partie 3-2</h3>
		
		<div style="width:100%;height:100%;background:#000">
		<div class="plyr">
			<video src="/public/videos/HankTV_PART3-2.mp4" id="player3-2" controls controlsList="nodownload" playsinline poster="/public/plyr/cover.png" data-plyr-config='{ "title": "Partie 3-2" }' />
		</div>
		</div>

	</div><!-- /content -->
</div><!-- /page -->

	<script type="text/javascript">
		$(document).ready(function(){
		   $('#player1').bind('contextmenu',function() { return false; });
		   $('#player2').bind('contextmenu',function() { return false; });
		   $('#player3-1').bind('contextmenu',function() { return false; });
		   $('#player3-2').bind('contextmenu',function() { return false; });
		});
</script>
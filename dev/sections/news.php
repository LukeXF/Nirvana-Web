<div id="container"><img alt="Intro Background" class="part-assets"
src="assets/img/news-part.png"></div>

<div class="content-lock">
	<div class="front-tile">
	<div class="left-overlay-news"></div>
		<h1 class="ip">Featured News</h1>

		<div class="row news-module">
			<div class="news-titles">
				<h4>Public BETA!</h4>

				<h5>3rd Novemeber</h5>
			</div>

			<div class="col-md-12">
				<p>We have officially launched into public BETA this Saturday! 
				That said, we thought this would be the perfect time to talk
				 about what will be added in the near future!</p>

				<p>Features-<br>
				We are planning on adding a lot of new features and games 
				before official launch! Currently all features within the 
				Nirvana Menu are working perfectly with the exception of 
				the "JukeBox" and the "Party" system! These will be added
				 within the next few weeks. After these features have been
				  added our main focus will be games and specified updates 
				  to different features on the server!</p>
				
				<p>Games -
				Currently we have Sploof, Survival Games, and Draw My Thing. 
				You may have noticed while looking...</p>

			</div>

			<div class="col-md-11 col-md-offset-1"><a class=
			"read-more" href=
			"http://nirvanamc.com/threads/public-beta.115/">
			Read More</a> - By MrSuperSweet <img src="http://root-image.luke.sx/da57.png"
			style="border-radius: 25%;" width="40"></div>
		</div>


		<hr>

		<div class="row news-module">
			<div class="news-titles">
				<h4>A Toast to the Future</h4>

				<h5>24th September</h5>
			</div>

			<div class="col-md-12">
				<p>It all started January 11th 2014, as all great
				ideas do, with a dazed outreach to a best
				friend..."NirvanaMC.com?" at 2:11 AM to
				@Gonzoman10.</p>

				<p>After 257 days, dozens of people, and more
				mistakes than we can count, a feeling of
				accomplishment washes over us. Our journey is far
				from over, but we are far from where we started.
				From the base of a mountain the peak is distant,
				seemingly unreachable, but with drive and
				determination you can achieve anything you put your
				heart, soul, and blood into. Looking down, its easy
				to see better routes, hard to fathom why you never
				quit. We gain strength, courage, and confidence in
				every moment, of every day.</p>

				<p>Success is continuing when you could stop,
				accomplishment is the total of your victories, and
				confidence is the scar of your failures. I truly
				hope, from the bottom of my heart, that one day we
				will look back on this journey, and know that it
				has forever shaped our character. Failure isn't an
				option... simply because we have already won.</p>
			</div>

			<div class="col-md-11 col-md-offset-1"><a class=
			"read-more" href=
			"http://forum.nirvanamc.com/index.php?threads/a-toast-to-the-future.3/">
			Read More</a> - By MrSuperSweet <img src="http://root-image.luke.sx/da57.png"
			style="border-radius: 25%;" width="40"></div>
		</div>
	</div>

	<div class="front-tile front-right">
		<h1 class="ip">Twitter Feed</h1>

		<div class="row">
			<div class="twitterLink"></div>
			<script type="text/javascript">

				$.getJSON( 'twitter/api.php', function( data ) {
				    var items = [];
				  $.each( data, function( key, val ) {
				    items.push( "<div class='col-md-10 col-md-offset-1 twitter-feed'><p>" + val + "</p>" + key + "<hr></div>" );
				  });
				 
				  $( "<div/>", {
				    "class": "my-new-list",
				    html: items.join( "" )
				  }).appendTo( ".twitterLink" );
				});

			</script>

			<div class="col-md-10 twitter-feed bottom">
				<h5><b>Follow us</b> today to stay up to date with
				all the latest news and more</h5>
				<hr>
			</div>

			<div class="twitter-module">
				<a href="https://twitter.com/NirvanaNetwork"
				target="_blank">Follow Us</a>
			</div>
		</div>
	</div>
</div>
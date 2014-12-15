<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<style type="text/css">
	a {
		text-decoration: none;
		color: #222;
	}
	a:hover {
		text-decoration: none;
		font-weight: bold;
	}
	.jumbotron {
		margin-top: 200px;
		min-height: 206px;
	}
	li {
		display: table;
	}
	ul {
		padding: 0px;
	}
</style>
<body>
	<div class="container">
		<div class="row">
			<div class="jumbotron">
				<h3>The latest Tweets from NirvanaMC</h3>

				<?php 
					$twitterAPI = json_decode(file_get_contents('api.php'));

					// uncomment to check if the facebook array works
					 echo "<pre>";
					 print_r($twitterAPI);
					 echo "</pre>";
				?>
				<script type="text/javascript">

				$.getJSON( 'api.php', function( data ) {
				    var items = [];
				  $.each( data, function( key, val ) {
				    items.push( "<a href='https://twitter.com/NirvanaNetwork/status/" + key + "' target='_blank'><li id='" + key + "'>" + val + "</li></a>" );
				  });
				 
				  $( "<ul/>", {
				    "class": "my-new-list",
				    html: items.join( "" )
				  }).appendTo( ".jumbotron" );
				});

				</script>

			</div>
		</div>
	</div>
</body>

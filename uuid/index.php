
<!-- 	
	This code and project was developed under contact by NivanaMC
	To Luke Brown (me@luke.sx). If you like what you see, rather
	than trying to steal my code - contact me and we can work together.
-->
<!DOCTYPE html>

<html>
	<head>
		<title>NirvanaMC - UUID Converter</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">


		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700">
		<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Oswald:400,300,700' ype='text/css'>

		<link rel="shortcut icon" href="http://cdn.nirvanamc.com/img/favicon.ico">
		<link rel="stylesheet"    href="http://cdn.nirvanamc.com/css/bootstrap.css" type="text/css" />
		<link rel="stylesheet"    href="http://cdn.nirvanamc.com/css/uuid.css" />

		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


	</head>


<!-- ////////////////////////////////////
	BEGIN BODY
///////////////////////////////////// -->

		<body>
			<nav class="navbar navbar-nirvana" role="navigation">
				<div class="container-fluid width-nav-nirvana">

					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="//nirvanamc.com"><img src="http://cdn.nirvanamc.com/img/logo.png"></a>
					</div>


					<div class="collapse navbar-collapse">
						<ul id="main-nav" class="nav navbar-nav nirvana-nav navbar-right">				
							<li><a href="//nirvanamc.com">Home</a></li>
							<li class=""><a href="//forum.nirvanamc.com">Forum</a></li>
							<li class=""><a href="//bans.nirvanamc.com">Bans</a></li>
							<li class=""><a href="//appeal.nirvanamc.com">Appeal</a></li>
							<li class=""><a href="//infractions.nirvanamc.com">Infractions</a></li>
						</ul>

					</div>
				</div>
			</nav>

		<div class="container">
		            <h3 class="coming-soon">What's my UUID?</h3>
		        <div class="col-md-6 col-md-offset-3">
		          <div class="header">
		          </div>

		          <div class="jumbotron" style="margin-top:20px">

		            <form id="username">
		            <label>Username to UUID</label>
		              <div class="input-group">
		                <input type="text" name="username" class="form-control" placeholder="Username">
		                <span class="input-group-btn">
		                <button class="btn btn-info" type="submit">Go!</button>
		                </span>
		              </div><!-- /input-group --><br>
		            </form>

		            <form id="uuid">
		            <label>UUID to username</label>
		              <div class="input-group">
		                <input type="text" name="uuid" class="form-control" placeholder="UUID">
		                <span class="input-group-btn">
		                <button class="btn btn-info" type="submit">Go!</button>
		                </span>
		              </div><!-- /input-group --><br>
		            </form>
		          </div>

		          <div class="footer">
		            <p>&copy; Copyright 2014</p>
		          </div>
		        </div>
		      </div> <!-- /container -->

		      <script src="//code.jquery.com/jquery.js"></script>
		      <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		      <script type="text/javascript" src="api.js"></script>
			</body>
		</html>
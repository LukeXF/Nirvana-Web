
<!-- 	
	This code and project was developed under contact by NivanaMC
	To Luke Brown (me@luke.sx). If you like what you see, rather
	than trying to steal my code - contact me and we can work together.
-->
<!DOCTYPE html>

<html>
	<head>
		<title>NirvanaMC - Appeal System</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">


		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700">
		<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Oswald:400,300,700' ype='text/css'>

		<link rel="shortcut icon" href="http://cdn.nirvanamc.com/img/favicon.ico">
		<link rel="stylesheet"    href="http://cdn.nirvanamc.com/css/bootstrap.css" type="text/css" />
		<link rel="stylesheet"    href="http://cdn.nirvanamc.com/css/blue.css" />

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
							<li class="active"><a href="//appeal.nirvanamc.com">Appeal</a></li>
							<li class=""><a href="//infractions.nirvanamc.com">Infactions</a></li>
						</ul>

					</div>
				</div>
			</nav>


			<div class="container">
			    <div class="row">
			        <div class="col-md-4 col-md-offset-4">

			            <div class="login-container">
			                <div id="output"></div>
			                <div class="avatar"></div>
			                <div class="form-box">
			                    <form method="post" action="index.php" name="loginform">
			                        <input id="login_input_username" class="login_input" name="user_name" required type="text" placeholder="Username">
			                        <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required placeholder="Code">
			                        <button class="btn btn-info btn-block login" name="login" value="Login" type="submit">Track Appeal</button>
			                    </form>
			                </div>
			            </div>
			        
			        </div>


		        </div>
		    </div>
		</div>

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	</body>
</html>
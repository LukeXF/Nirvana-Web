<?php 
	require 'db.php'; 
	$jsoninfo = json_decode(file_get_contents("cache.json"));
	$jsoninfo_sg = json_decode(file_get_contents("json/sg.json"));
	$jsoninfo = objectToArray($jsoninfo);

	function objectToArray($d) 
	{
	    if (is_object($d)) {
	        // Gets the properties of the given object
	        // with get_object_vars function
	        $d = get_object_vars($d);
	    }

	    if (is_array($d)) {
	        /*
	        * Return array converted to object
	        * Using __FUNCTION__ (Magic constant)
	        * for recursive call
	        */
	        return array_map(__FUNCTION__, $d);
	    } else {
	        // Return array
	        return $d;
	    }
	}

?>
<!-- 	
	This code and project was developed under contact by NivanaMC
	To Luke Brown (me@luke.sx). If you like what you see, rather
	than trying to steal my code - contact me and we can work together.
-->
<!DOCTYPE html>

<html>
	<head>
		<title>NirvanaMC - Cache System</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700">
		<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Oswald:400,300,700' ype='text/css'>

		<link rel="shortcut icon" href="http://cdn.nirvanamc.com/img/favicon.ico">
		<link rel="stylesheet"    href="http://cdn.nirvanamc.com/css/bootstrap.css" type="text/css" />
		<link rel="stylesheet"    href="http://cdn.nirvanamc.com/css/blue.css" />
		<link rel="stylesheet"    href="http://cdn.nirvanamc.com/css/panel.css" />

		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

	</head>
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
		<div class="row">

			<?php
				if (isset($_POST['submit']) && ($_POST['json_sg'])) {	
					$alert = "Survival Games has been forced updaed";
				} elseif (isset($_POST['submit']) && ($_POST['force_update'])) {								
					$alert = "All Stats have been assigned and updated";
				} elseif (isset($_POST['submit']) && ($_POST['stats'])) {					
					$alert = "Settings have been upload";
				} else {
					$alert = "";
				}
				if (isset($_POST['submit'])) {
					echo "<div class='alert alert-success role='alert'>
							<strong>Success</strong> - " . $alert . ". Please reload the page.<br>
							<a href='index.php'>- clear message -</a>
					</div>";
				}
			?>
			<h1 align="center">Nirvana Statistics &amp; Caching System</h1>



			<div class="col-md-6 tile">
			<?php
				date_default_timezone_set('America/Chicago'); // CDT
				$tomorrow_date = date('Y-m-d', strtotime('+1 day'));

				$current_date = date('Y-m-d');

				getdate(strtotime($current_date . "23:59:59"));
				$seconds = strtotime($settings['stats'] . " 23:59:59") - time();

				$days = floor($seconds / 86400);
				$seconds %= 86400;

				$hours = floor($seconds / 3600);
				$seconds %= 3600;

				$minutes = floor($seconds / 60);
				$seconds %= 60;

				echo "<b>Stat's Last Updated</b> - " . $current_date . " - 11:59PM</br>";
				echo "<b>Stat's Next Updating</b> - " . $tomorrow_date . " - 11:59PM</br>";
			?>
			</div>



			<div class="col-md-4 tile">
			<?php
				echo "<b>Next Stat Purge Update In</b>:<br>" . $hours . " hours and " . $minutes . " minutes.";
			?>
			</div>



			<div class="col-md-2 tile">
				<form action="index.php?alert=y" class="form" method="post">
					<input value="true" name="force_update" type="hidden" />
					<button class="main" name="submit" type="submit">Force Update</button>
				</form>
			</div>

		</div>
		<div class="row">



		<!--
			<div class="col-md-4 col-md-offset-4 tile formbox">
				<?php /*
					// When the post data is summited it then updated the var by placing into a file and exc
					if ( (isset($_POST['submit'])) && (!isset($_POST['force_update'])) )  {
					$jsoninfo_send['domain'] = $_POST['domain'];
					$jsoninfo_send['name'] = $_POST['name'];
					$jsoninfo_send['stats'] = $_POST['stats'];
					file_put_contents('cache.php', '<?php $settings = ' . var_export($settings, true) . '; ?>');
					file_put_contents('cache.json', json_encode($jsoninfo_send));
					echo "Post data that sent is: " . $name . " " . $domain;
					}
				*/ ?>
				<h1>Settings:</h1>
				<form action="index.php?alert=y" class="form" method="post">
				Name:   <input value="<?php // echo $jsoninfo['name']; ?>" name="name" type="text" /><br/>
				Domain: <input value="<?php //echo $jsoninfo['domain']; ?>" name="domain" type="text" /><br/>
				Stat's Reset on: <input value="<?php // echo $jsoninfo['stats']; ?>" name="stats" type="text" /><br/>
				<button name="submit" type="submit">Submit</button>
				</form>
			</div>
		-->



			<div class="col-md-4 tile">
				<form action="index.php?alert=y" class="form" method="post">
					<input value="true" name="force_update" type="hidden" />
					<input value="true" name="json_sg" type="hidden" />
					<button class="main" name="submit" type="submit">Force Update SG</button>
				</form>

				<?php 
					if (isset($_POST['json_sg'])) {

						$dbname = 'nirvanamc';
						$servername = '192.99.201.204';
						$username = 'root';
						$password = '8CFNpC8LJlNznfson4L4HjjrzsCyjVxEhpbRYwkJ0QCJkMjbEl';

						// connect to the database & PDO Query
						$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						$sth = $dbh->prepare("SELECT * FROM `Stats SG` ORDER BY `Wins` DESC LIMIT 0, 3");
						$sth->execute();

						// Fetch all of the remaining rows in the result set
						$result = $sth->fetchAll();
						if ( empty($result) ) {
						    echo "- error -";
						}
						file_put_contents('json/sg.json', json_encode($result));

						$commingsoon = "<p class='pageno'><b>- coming soon -</b><br>";
					}

                ?>
			</div>



		</div>
		<hr>
		<div class="row">
			<div class="col-md-4 tile">
				<?php
					echo "<pre>";
					echo "<h1>JSON LOADED TESTING:</h1>";
					print_r($jsoninfo);
					echo "</pre>";
				?>
			</div>
			<div class="col-md-4 tile">
				<?php
					echo "<pre>";
					echo "<h1>POST DATA:</h1>";
					print_r($_POST);
					echo "</pre>";
				?>
			</div>
			<div class="col-md-4 tile">
				<?php
					echo "<pre>";
					echo "<h1>Settings encoded:</h1>";
					echo json_encode(array_values($jsoninfo));
					echo "<h1>Survival Games encoded:</h1>";
					echo json_encode(array_values($jsoninfo_sg));
					echo "</pre>";
				?>
			</div>

		</div>
	</div>

</div>
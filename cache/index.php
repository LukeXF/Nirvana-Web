<?php 
	require 'db.php';

	$dbname = 'nirvanamc';
	$servername = '192.99.201.204';
	$username = 'root';
	$password = '8CFNpC8LJlNznfson4L4HjjrzsCyjVxEhpbRYwkJ0QCJkMjbEl';

	$dbname2 = 'xenforo';
	$servername2 = 'localhost';
	$username2 = 'root';
	$password2 = '9431286128';

	$jsoninfo_sg = jsonToArray(json_decode(file_get_contents("json/sg.json")));
	$jsoninfo_ip = jsonToArray(json_decode(file_get_contents("json/ip.json")));
	$jsoninfo_global = jsonToArray(json_decode(file_get_contents("json/global.json")));
	$jsoninfo_dmt = jsonToArray(json_decode(file_get_contents("json/dmt.json")));
	$jsoninfo_crusade = jsonToArray(json_decode(file_get_contents("json/crusade.json")));
	$jsoninfo_time = jsonToArray(json_decode(file_get_contents("json/time.json")));
	$jsoninfo_twitter = jsonToArray(json_decode(file_get_contents("json/twitter.json")));
	$jsoninfo_news = jsonToArray(json_decode(file_get_contents("json/news.json")));

	function jsonToArray($d) 
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

	include '/var/www/html/cdn/header.php';
	include '/var/www/html/cdn/navbar.php';

?>
<!-- 	
	This code and project was developed under contact by NivanaMC
	To Luke Brown (me@luke.sx). If you like what you see, rather
	than trying to steal my code - contact me and we can work together.
-->
<!DOCTYPE html>

		<title>Nirvana Cache System</title>



		<div class="container">
		<div class="row">

			<?php
				if (isset($_POST['submit']) && ($_POST['json_sg'])) {	
					$alert = "Survival Games has been forced updated";
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
				<?php 
					$jsontimes = array();
					$jsontimes['last_updated'] = $current_date;
					$jsontimes['last_forced_update'] = $tomorrow_date;
					file_put_contents('json/time.json', json_encode($jsontimes));


					if ( isset($_POST['global_update']) ) {
						$jsontimes['last_updated'] = $current_date;
						$jsontimes['last_forced_update'] = $current_date;			
						file_put_contents('json/time.json', json_encode($jsontimes));	
					}

					if ( $jsoninfo_time['last_updated'] != $jsontimes['last_updated'] ) {
						$jsontimes['last_updated'] = $current_date;
						$jsontimes['last_forced_update'] = $jsoninfo_time;				
						file_put_contents('json/time.json', json_encode($jsontimes));	
					}
				?>
				<form action="index.php?alert=y" class="form" method="post">
					<input value="true" name="force_update" type="hidden" />
					<input value="true" name="global_update" type="hidden" />
					<button class="main" name="submit" type="submit">Force Update</button>
				</form>
			</div>

		</div>
		<hr>
		<div class="row">


















			<div class="col-md-4 tile">
				<?php 
					if ( isset($_POST['json_sg']) || isset($_POST['global_update']) || $jsoninfo_time['last_updated'] != $jsontimes['last_updated'] ) {

						// connect to the database & PDO Query
						$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						$sth = $dbh->prepare("SELECT * FROM `Stats SG` ORDER BY `Wins` DESC LIMIT 0, 20");
						$sth->execute();

						// Fetch all of the remaining rows in the result set
						$result = $sth->fetchAll();
						if ( empty($result) ) {
								echo "- error -";
						}
						file_put_contents('json/sg.json', json_encode($result));
					}
				?>
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<form action="index.php?alert=y" class="form" method="post">
						<input value="true" name="force_update" type="hidden" />
						<input value="true" name="json_sg" type="hidden" />
						<button class="main in" name="submit" type="submit">Force Update SG</button>
					</form>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#open_sg" aria-expanded="false" aria-controls="collapseOne">
									View SG Data
								</a>
							</h4>
						</div>
						<div id="open_sg" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<?php
									echo "<pre>";
									echo print_r($jsoninfo_sg);
									echo "</pre>";
								?>
							</div>
						</div>
					</div>
				</div>
			</div>













			<div class="col-md-4 tile">
				<?php 
					if ( isset($_POST['json_ip']) || isset($_POST['global_update']) || $jsoninfo_time['last_updated'] != $jsontimes['last_updated'] ) {

						// connect to the database & PDO Query
						$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						$sth = $dbh->prepare("SELECT * FROM `Stats Infinite Parkour` ORDER BY `Best Score` DESC LIMIT 0, 20");
						$sth->execute();

						// Fetch all of the remaining rows in the result set
						$result = $sth->fetchAll();
						if ( empty($result) ) {
								echo "- error -";
						}
						file_put_contents('json/ip.json', json_encode($result));
					}
				?>
				<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
					<form action="index.php?alert=y" class="form" method="post">
						<input value="true" name="force_update" type="hidden" />
						<input value="true" name="json_ip" type="hidden" />
						<button class="main in" name="submit" type="submit">Force Update IP</button>
					</form>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion2" href="#open_ip" aria-expanded="false" aria-controls="collapseOne">
									View ip Data
								</a>
							</h4>
						</div>
						<div id="open_ip" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<?php
									echo "<pre>";
									echo print_r($jsoninfo_ip);
									echo "</pre>";
								?>
							</div>
						</div>
					</div>
				</div>
			</div>












			<div class="col-md-4 tile">
				<?php 
					if ( isset($_POST['json_global']) || isset($_POST['global_update']) || $jsoninfo_time['last_updated'] != $jsontimes['last_updated'] ) {

						// connect to the database & PDO Query
						$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						$sth = $dbh->prepare("SELECT * FROM `Stats Global` ORDER BY `Nuggets Earned` DESC LIMIT 0, 20");
						$sth->execute();

						// Fetch all of the remaining rows in the result set
						$result = $sth->fetchAll();
						if ( empty($result) ) {
								echo "- error -";
						}
						file_put_contents('json/global.json', json_encode($result));
					}
				?>
				<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
					<form action="index.php?alert=y" class="form" method="post">
						<input value="true" name="force_update" type="hidden" />
						<input value="true" name="json_global" type="hidden" />
						<button class="main in" name="submit" type="submit">Force Update global</button>
					</form>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion2" href="#open_global" aria-expanded="false" aria-controls="collapseOne">
									View global Data
								</a>
							</h4>
						</div>
						<div id="open_global" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<?php
									echo "<pre>";
									echo print_r($jsoninfo_global);
									echo "</pre>";
								?>
							</div>
						</div>
					</div>
				</div>
			</div>











			<div class="col-md-4 tile">
				<?php 
					if ( isset($_POST['json_DMT']) || isset($_POST['global_update']) || $jsoninfo_time['last_updated'] != $jsontimes['last_updated'] ) {

						// connect to the database & PDO Query
						$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						$sth = $dbh->prepare("SELECT * FROM `Stats DMT` ORDER BY `Points Earned` DESC LIMIT 0, 20");
						$sth->execute();

						// Fetch all of the remaining rows in the result set
						$result = $sth->fetchAll();
						if ( empty($result) ) {
								echo "- error -";
						}
						file_put_contents('json/dmt.json', json_encode($result));
					}
				?>
				<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
					<form action="index.php?alert=y" class="form" method="post">
						<input value="true" name="force_update" type="hidden" />
						<input value="true" name="json_DMT" type="hidden" />
						<button class="main in" name="submit" type="submit">Force Update DMT</button>
					</form>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion2" href="#open_DMT" aria-expanded="false" aria-controls="collapseOne">
									View DMT Data
								</a>
							</h4>
						</div>
						<div id="open_DMT" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<?php
									echo "<pre>";
									echo print_r($jsoninfo_dmt);
									echo "</pre>";
								?>
							</div>
						</div>
					</div>
				</div>
			</div>











			<div class="col-md-4 tile">
				<?php 
					if ( isset($_POST['json_crusade']) || isset($_POST['global_update']) || $jsoninfo_time['last_updated'] != $jsontimes['last_updated'] ) {

						// connect to the database & PDO Query
						$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						$sth = $dbh->prepare("SELECT * FROM `Stats Crusade` ORDER BY `Kills` DESC LIMIT 0, 20");
						$sth->execute();

						// Fetch all of the remaining rows in the result set
						$result = $sth->fetchAll();
						if ( empty($result) ) {
								echo "- error -";
						}
						file_put_contents('json/crusade.json', json_encode($result));
					}
				?>
				<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
					<form action="index.php?alert=y" class="form" method="post">
						<input value="true" name="force_update" type="hidden" />
						<input value="true" name="json_crusade" type="hidden" />
						<button class="main in" name="submit" type="submit">Force Update crusade</button>
					</form>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion2" href="#open_crusade" aria-expanded="false" aria-controls="collapseOne">
									View crusade Data
								</a>
							</h4>
						</div>
						<div id="open_crusade" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<?php
									echo "<pre>";
									echo print_r($jsoninfo_crusade);
									echo "</pre>";
								?>
							</div>
						</div>
					</div>
				</div>
			</div>











			<div class="col-md-4 tile">
				<?php 
					if ( isset($_POST['json_twitter']) || isset($_POST['global_update']) || $jsoninfo_time['last_updated'] != $jsontimes['last_updated'] ) {

						require_once('TwitterAPI.php');

						$settings = array(
							'oauth_access_token' => "545371167-irULMOms3sQrOaNwsL73EWeXDHLfy6PmYWrE2FMU",
							'oauth_access_token_secret' => "Zv9cS7OsiGXXuARfG92lj6UvO5yQwBjH16e987zEmtpjU",
							'consumer_key' => "7eJxfBBdxGoYf1BcPetNi9whC",
							'consumer_secret' => "pXTgOEQO804GWeZxPmXMqFmKTgrSc3KVs8GEH6M9tpHEL9wMpb"
						);
						$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
						$getfield = '?screen_name=NirvanaNetwork';
						$requestMethod = 'GET';
						$twitter = new TwitterAPIExchange($settings);
						$response = $twitter
							->setGetfield($getfield)
							->buildOauth($url, $requestMethod)
							->performRequest();
						$user = json_decode($response);
						$user = jsonToArray($user);


						$twitterlists = 0;
						$twitterJSON = array();
						while ($twitterlists <= 4) {
							$twitterJSON["<a href='https://twitter.com/NirvanaNetwork/status/" . $user[$twitterlists]['id'] . "'><h5 class='twt'>" . substr($user[$twitterlists]['created_at'], /*0,16*/0,10) . "</h5></a>"] = $user[$twitterlists]['text'];
							$twitterlists++;
						}
						$checkFive = count($twitterJSON);

						if ($checkFive == 5) {									
							file_put_contents('json/twitter.json', json_encode($twitterJSON));
						} else {
							echo "{'There was an error': 'There was an error'}";
						}
					}
				?>
				<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
					<form action="index.php?alert=y" class="form" method="post">
						<input value="true" name="force_update" type="hidden" />
						<input value="true" name="json_twitter" type="hidden" />
						<button class="main in" name="submit" type="submit">Force Update twitter</button>
					</form>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion2" href="#open_twitter" aria-expanded="false" aria-controls="collapseOne">
									View twitter Data
								</a>
							</h4>
						</div>
						<div id="open_twitter" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<?php
									echo "<pre>";
									echo print_r($jsoninfo_twitter);
									echo "</pre>";
								?>
							</div>
						</div>
					</div>
				</div>
			</div>











			<div class="col-md-4 tile">
				<?php 
					if ( isset($_POST['json_news']) || isset($_POST['global_update']) || $jsoninfo_time['last_updated'] != $jsontimes['last_updated'] ) {

						// connect to the database & PDO Query
						$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						$sth = $dbh->prepare("SELECT * FROM `Stats news` ORDER BY `Kills` DESC LIMIT 0, 20");
						$sth->execute();

						// Fetch all of the remaining rows in the result set
						$result = $sth->fetchAll();
						if ( empty($result) ) {
								echo "- error -";
						}
						file_put_contents('json/news.json', json_encode($result));
					}
				?>
				<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
					<form action="index.php?alert=y" class="form" method="post">
						<input value="true" name="force_update" type="hidden" />
						<input value="true" name="json_news" type="hidden" />
						<button class="main in" name="submit" type="submit">Force Update News</button>
					</form>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion2" href="#open_news" aria-expanded="false" aria-controls="collapseOne">
									View News Data
								</a>
							</h4>
						</div>
						<div id="open_news" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<?php
									echo "<pre>";
									echo print_r($jsoninfo_news);
									echo "</pre>";
								?>
							</div>
						</div>
					</div>
				</div>
			</div>





		</div>
	</div>
</div>
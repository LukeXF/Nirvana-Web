<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="../assets/css/style.css" rel="stylesheet">
		<title> Minecraft UUID puller </title>
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<style type="text/css">
			body {
				padding: 20px;
			}
		</style>
	</head>

	<center>

	<body>
		<form>
			<div class="row">
				<div class="col-md-12">
					<div class="input-group">
						<input type="text" name="user" placeholer="steve" value="8f65bf20b3e645ffb67ba14a9a54e7b6" class="form-control">
						<div class="input-group-btn">
							<button type="submit" value="Go" class="btn btn-default" onClick="window.location.reload()">Go</button>
						</div>
					</div><!-- /.input-group -->
				</div><!-- /.col-lg-6 -->
			</div><!-- /.row -->
		</form>


		<?php
		if(empty($_GET['user'])){
			$image = 'char';
		} else {
			$image = $_GET['user'];
		}

		echo "<br>";

		function getUUID($username, $timeout = 4) {
			if(strlen($username) >= 16)
				return false;
			$opts = array(
				'http' => array(
					'method'  => 'POST',
					'header'  => 'Content-Type: application/json',
					'content' => '{"name":"'.$username.'","agent":"minecraft"}',
					'timeout' => $timeout
				)
			);
			$context  = stream_context_create($opts);
			$json = @file_get_contents('https://api.mojang.com/profiles/page/1', false, $context);
			$result = json_decode($json, true);
			if(empty($result['profiles']))
				return false;
			$uuid = $result['profiles'][0]['id'];
			return $uuid;
		}

		function getUsername($uuid, $timeout = 4) {
			if(strlen($uuid) != 32)
				return false;
			$opts = array(
				'http' => array(
					'timeout' => $timeout
				)
			);
			$context  = stream_context_create($opts);
			$json = @file_get_contents('https://sessionserver.mojang.com/session/minecraft/profile/'.$uuid, false, $context);
			$result = json_decode($json, true);
			if(empty($result))
				return false;
			$username = $result['name'];
			return $username;
		}


		$formStart = "<div class='input-group'><span class='input-group-addon'>User</span><input type='text' value='";
		$formEnd = "' class='form-control'><span class='input-group-addon'><img style='border-radius: 25%;' src='https://minotar.net/avatar/" . $image . "/20'></span></div>";
		/* Username => UUID */
		$username = $_GET['user'];
		if( ($username = getUsername($UUID)) && (!empty($_GET['user'])) ){ 
			echo $formStart . $username . $formEnd;
		}
		elseif(!empty($_GET['user']) ){ 
			echo 'Error: invalid username or Mojang server down!';
		}

		if(empty($username)){
			echo "Enter your username and hit enter to begin.";
		}
		echo '<hr />';

		$UUID = '8f65bf20b3e645ffb67ba14a9a54e7b6';
		if($username = getUsername($UUID)) echo $username;
		else echo 'Error: invalid UUID or Mojang server down!';
		?>
	</body>
</body>
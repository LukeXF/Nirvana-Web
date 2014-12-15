<div id="container">
	<img alt="Intro Background" class="intro-img part-assets" id="image" src="assets/img/front.png"></div>

<div class="content-lock" style="padding-top: 324px;">
	<div class="front-tile">
		<h1 class="ip">Nirvana Stats</h1>

		<?php

			include_once 'assets/status.class.php';
			include_once '../cache/db.php';
			$jsoninfo_sg = jsonToArray(json_decode(file_get_contents("../cache/json/sg.json")));
			$jsoninfo_ip = jsonToArray(json_decode(file_get_contents("../cache/json/ip.json")));
			$jsoninfo_global = jsonToArray(json_decode(file_get_contents("../cache/json/global.json")));
			$jsoninfo_dmt = jsonToArray(json_decode(file_get_contents("../cache/json/dmt.json")));
			$jsoninfo_crusade = jsonToArray(json_decode(file_get_contents("../cache/json/crusade.json")));
			$jsoninfo_time = jsonToArray(json_decode(file_get_contents("../cache/json/time.json")));

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

			$serverip = "play.nirvanamc.com";
			$info = json_decode( file_get_contents( 'http://mcapi.ca/query/'.$serverip.'/players' ), true ); 


			date_default_timezone_set('UTC');

			$link = mysql_connect($servername, $username, $password);
			mysql_select_db($dbname, $link);
			$result = mysql_query("SELECT * FROM Players", $link);
			$num_rows = mysql_num_rows($result);


			$conn = mysqli_connect($servername, $username, $password, $dbname);

			$sql = "SELECT COUNT(*), SUM(`Nuggets Earned`) AS `total_money` FROM `Stats Global`";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					$money = $row["total_money"];
				}                        
			}

			mysqli_close($conn);






			$conn2 = mysqli_connect($servername, $username, $password, $dbname);

			$sql = "SELECT COUNT(*), SUM(`Nuggets Earned`) AS `total_money` FROM `Stats Global` WHERE `UUID` IN ('c12d7ad1-4a2a-469c-9046-c9820eb878b0','26a2b8b4-e3c8-4bb8-9640-b30ddaba3620','0b10c3aa6-5b84-31fb-512b-ed361b7a81c','8f65bf20-b3e6-45ff-b67b-a14a9a54e7b6')";
			$result3 = mysqli_query($conn2, $sql);

			if (mysqli_num_rows($result3) > 0) {
				// output data of each row
				while($row2 = mysqli_fetch_assoc($result3)) {
					$moneyelite = $row2["total_money"];
				}
			}

			mysqli_close($conn2);











			

			$time = strtotime('2014-10-28 17:25:43');
			$totaltimeswag = humanTiming($time) * $num_rows;


			if ($totaltimeswag > 1000) {
				$totaltimeswag2 = number_format(round($totaltimeswag / 100));
			} else {
				$totaltimeswag2 = "none";
			}



			function humanTiming ($time)
			{

				$time = time() - $time;

				$tokens = array (
					3600 => 'hour'
				);

				foreach ($tokens as $unit => $text) {
					if ($time < $unit) continue;
					$numberOfUnits = floor($time / $unit);
					return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
				}

			}



		?>

		<div class="row online-stats">
			<div class="forcewidth tile">
				<h5><?php echo number_format(round($num_rows)); ?></h5>Total Players Joined<br>
			</div>
		</div>

		<div class="row online-stats">
			<div class="col-xs-6 tile">
				<h5 class=".playercount">
					<?php if(!$info['status']) { echo 'Offline'; } else { echo $info['players']['online']; } ?>
				</h5>Currently Online
				
			</div>
			<div class="col-xs-6 tile">
				<h5 class=".playercount">
					<?php 
			   			$sexy = round( (round($money / 1000) - round($moneyelite / 1000)));
						echo number_format($sexy,0,",","."); 
					?>
				</h5> Million Nuggets Earned
			</div>
		</div>

		<div class="row online-stats">
			<div class="forcewidth tile">
				<h5><?php echo $totaltimeswag2; ?></h5>Total Hours Played
			</div>
		</div>

		<div class="row online-stats">
			<div class="col-xs-12">
				<br>
			   <?php echo $response['motd']; ?>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		var options = {
		  useEasing : true, 
		  useGrouping : true, 
		  separator : ',', 
		  decimal : '.' 
		  prefix : '' 
		  suffix : '' 
		}
		var demo = new countUp("myTargetElement", 0, 222222, 0, 2.5, options);
		demo.start();
	</script>




	<div class="front-tile front-right">


		<h2 class="ip">Latest Posts</h2>

		<div class="latest-forum-post row">
		<?php
			foreach ($topics_query as $thread)
			{
				// The absolute thread url is constructed for you
				$threadUrl = XenForo_Link::buildPublicLink('threads', $thread);

				// Trimmed and properly escaped
				$threadTitle = XenForo_Template_Helper_Core::helperWordTrim($thread['title'], 50);

				echo "<div class='col-xs-11 tile-forums' onclick=\"location.href='//forum.nirvanamc.com/$threadUrl';\"><a>$threadTitle</a><br><div class='comments'> Views: {$thread['view_count']}, Comments: {$thread['reply_count']}</div></div>";
			}
		?>
		<div class="latest-forum-post row">
			<div class="col-md-12 forum-link">
				<a class="online-stats" href="//forum.nirvanamc.com" target="_onblank">View All Forum Posts</a>
			</div>
		</div>
	</div>
</div>
<?php 	
	require_once '../cache/db.php';
	include '../cdn/classes/ReportsTable.php'; 
?>
<!-- 	
	This code and project was developed under contact by NivanaMC
	To Luke Brown (me@luke.sx). If you like what you see, rather
	than trying to steal my code - contact me and we can work together.
-->
<!DOCTYPE html>

<html>
	<head>
		<title>NirvanaMC - Report System</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700">
		<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Oswald:400,300,700' ype='text/css'>

		<link rel="shortcut icon" href="http://cdn.nirvanamc.com/img/favicon.ico">
		<link rel="stylesheet"    href="http://cdn.nirvanamc.com/css/bootstrap.css" type="text/css" />
		<link rel="stylesheet"    href="http://cdn.nirvanamc.com/css/blue.css" />

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<style type="text/css">body {color: #fff;}</style>

		<script src="//maxcdn.bootstrapcdn.collapsem/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="http://listjs.com/no-cdn/list.js"></script>
		<script src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>

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
							<li class="active"><a href="//bans.nirvanamc.com">Bans</a></li>
							<li class=""><a href="//appeal.nirvanamc.com">Appeal</a></li>
							<li class=""><a href="//infractions.nirvanamc.com">Infractions</a></li>
						</ul>

					</div>
				</div>
			</nav>


			<div class="container">
				<div class="row">
					<!--<div class="col-md-6">
						<pre>
							<?php //print_r($punishmentArray); ?>
						</pre>
					</div>-->
					<!--<div class="col-md-6">
						<pre>
							<?php // print_r($totalUsers); ?>
						</pre>
					</div>-->
					<!--<div class="col-md-6">
						<pre>
							<?php // print_r($punishmentArray);

							//	$amountOfProducts = 2;
							//	$height = ($amountOfProducts * 130) + 74 . "px";
							?>
						</pre>
					</div>-->

					<div class="col-md-12">

					<div id="users" class="row">
						<div class="col-md-8">
							<h1 class="admin-title left">Nirvana Reports</h1>
						</div>
						<div class="form col-md-4">
							<input class="search" placeholder="SEARCH" />
						</div>
						<table class="table-fill">
							<thead>
								<tr>
									<th class="sort"       style="width: 23%;"  data-sort='username'>Reported Player</th>
									<th class="sort"       style="width: 10%;"  data-sort='type'>Reason</th>
									<th class="sort"       style="width: 10%;"  data-sort='reason'>Specific</th>
									<th class="sort asc"   style="width: 23%;"  data-sort='duration'>Time</th>
									<th class="sort"       style="width: 23%;"  data-sort='placeby'>Reported By</th>
								</tr>
							</thead>
							<tbody class="list table-hover">

							<?php
								reset($punishmentArray);

								// Counts punishmentArray array to stop the while loop going on forever if an error occurs.
								$countOrders = count($punishmentArray);

								// Sets the counter to 1 for use in the while loop
								$displayCounter = 1; 

								while ($displayCounter <= $countOrders) {
									$p_id             = $punishmentArray['Punishment ' . $displayCounter]['id'];
									$p_username       = $punishmentArray['Punishment ' . $displayCounter]['Reported'];
									$p_type           = $punishmentArray['Punishment ' . $displayCounter]['Category'];
									$p_reason         = $punishmentArray['Punishment ' . $displayCounter]['Reason'];
									$p_time           = $punishmentArray['Punishment ' . $displayCounter]['Timestamp'];
									$p_reportby		  = $punishmentArray['Punishment ' . $displayCounter]['Reporter'];
									$p_comments		  = $punishmentArray['Punishment ' . $displayCounter]['Reporter'];

									// Gets the Minecraft User name and converts it into username
									$username = $p_username;
									// if there is no vaild username return steve for the image
									if ( (strlen($p_username) < 16 ) || empty($username) ) {
										$imageusername = "char";
									} else {
										$imageusername = $username;
									}

										$data = json_decode(file_get_contents('http://uuid.nirvanamc.com/api.php?uuid=' . $p_username), true); $username2 = $data['name'];
										$data2 = json_decode(file_get_contents('http://uuid.nirvanamc.com/api.php?uuid=' . $p_reportby), true); $username3 = $data2['name'];


										// Open Table
										echo "<tr data-toggle='modal' data-target='#editorder-" . $p_id . "'>";

										// Generates the username and image
										$size2 = "25px";
										$default2 = "https://minotar.net/avatar/char";
										echo "<td class='username'><img src='https://minespy.net/api/head/" . $imageusername . "' alt='' style='border-radius:5px;' width='" . $size2 . "'>&nbsp;" . $username2 . "</td>";


										echo "<td class='type'>" . $p_type . "</td>";
										echo "<td class='reason'>" . $p_reason . "</td>";
										// Date of punishment
										$phpdate = strtotime( $p_time ); $p_username2 = date( 'l jS', $phpdate ); $p_username3 = date( 'H:ia', $phpdate );
										echo "<td class='duration'><b>" . $p_username2 . " " . date('M') . "</b> - " . $p_username3 . "</td>";

									



										// if there is no vaild username return steve for the image
										if ( (strlen($p_reportby) < 16 ) || empty($p_reportby) ) {
											$imageusername2 = "char";
										} else {
											$imageusername2 = $p_reportby;
										}

										// Generates the username and image
										$size2 = "25px";
										echo "<td class='username'><img src='https://minespy.net/api/head/" . $imageusername2 . "' alt='' style='border-radius:5px;' width='" . $size2 . "'>&nbsp;" .  $username3 . "</td>";

										echo "</tr></a>";

									$displayCounter++;
								}
								?>
							</tbody>
						</table>

					</div>
					<h5 align="center" style="opacity:0.5"><?php echo "<3"; ?></h5>

					<script type="text/javascript">
						var options = {
						  valueNames: [ 'username', 'type', 'duration', 'reason', 'placeby' ]
						};

						var userList = new List('users', options);
					</script>
				</div><!--row-->
		    </div><!--container-->


			
		</body>
</html>
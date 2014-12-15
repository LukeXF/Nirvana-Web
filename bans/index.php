<?php include '../cdn/config/config.php'; ?>
<?php include '../cdn/classes/PunishmentTable.php'; ?>
<?php date_default_timezone_set('UTC'); ?>
<!-- 	
	This code and project was developed under contact by NivanaMC
	To Luke Brown (me@luke.sx). If you like what you see, rather
	than trying to steal my code - contact me and we can work together.
-->
<!DOCTYPE html>

<html>
	<head>
		<title>NirvanaMC - Bans System</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700">
		<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Oswald:400,300,700' ype='text/css'>

		<link rel="shortcut icon" href="http://cdn.nirvanamc.com/img/favicon.ico">
		<link rel="stylesheet"    href="http://cdn.nirvanamc.com/css/bootstrap.css" type="text/css" />
		<link rel="stylesheet"    href="http://cdn.nirvanamc.com/css/blue.css" />

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

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
							<h1 class="admin-title left">Nirvana Punishments</h1>
						</div>
						<div class="form col-md-4">
							<input class="search" placeholder="SEARCH" />
						</div>
						<table class="table-fill">
							<thead>
								<tr>
									<th class="sort" data-sort='username'>User</th>
									<th class="sort" data-sort='type'>Punishment</th>
									<th class="sort desc" data-sort='duration'>Time</th>
									<th class="sort" data-sort='expires'>Length</th>
									<th class="sort" data-sort='reason'>Reason</th>
									<th class="sort" data-sort='placeby'>Given By</th>
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
									$p_id             = $punishmentArray['Punishment ' . $displayCounter]['ID'];
									$p_username       = $punishmentArray['Punishment ' . $displayCounter]['Username'];
									$p_type           = $punishmentArray['Punishment ' . $displayCounter]['Type'];
									$p_reason         = $punishmentArray['Punishment ' . $displayCounter]['Reason'];
									$p_time           = $punishmentArray['Punishment ' . $displayCounter]['TimePlaced'];
									$p_duration       = $punishmentArray['Punishment ' . $displayCounter]['Duration'];
									$p_format         = $punishmentArray['Punishment ' . $displayCounter]['TimeFormat'];
									$p_reportby		  = $punishmentArray['Punishment ' . $displayCounter]['ReportBy'];
									$p_comments		  = $punishmentArray['Punishment ' . $displayCounter]['Comments'];

									// Gets the Minecraft User name and converts it into username
									$username = $p_username;
									/*
										$opts = array('http' => array('timeout' => 60));
										$context  = stream_context_create($opts);
										$json = @file_get_contents('https://sessionserver.mojang.com/session/minecraft/profile/'.$p_username, false, $context);
										$result = json_decode($json, true);
										$username = $result['name'];
									*/

									// if there is no vaild username return steve for the image
									if ( (strlen($p_username) > 16 ) || empty($username) ) {
										$imageusername = "char";
									} else {
										$imageusername = $username;
									}

										// Open Table
										echo "<tr data-toggle='modal' data-target='#editorder-" . $p_id . "'>";

										// Generates the username and image
										$size2 = "25px";
										$default2 = "https://minotar.net/avatar/char";
										echo "<td class='username'><img src='https://minotar.net/avatar/" . $imageusername . "' alt='' style='border-radius:5px;' width='" . $size2 . "'>&nbsp;" . $username . "</td>";

										// Punishment
										switch ($p_type) {
											case "mute": $p_type2 = "Muted";	break;
											case "ban": $p_type2 = "Banned";	break;
											case "kick": $p_type2 = "Kicked";	break;
											case "warn": $p_type2 = "Warned";	break;
											default:  $p_type2 = $p_type; 
										}
										echo "<td class='type'>" . $p_type2 . "</td>";

										// Date of punishment
										$phpdate = strtotime( $p_time );
										$p_username2 = date( 'l jS', $phpdate );
										$p_username3 = date( 'H:ia', $phpdate );
										echo "<td class='duration'><b>" . $p_username2 . " " . date('M') . "</b> - " . $p_username3 . "</td>";

										
										// Expires on
										if ($p_duration == 1) {
											$p_format = substr_replace($p_format, "", -1);
										}
										echo "<td class='expires'>" . $p_duration . " " . $p_format . "</td>";

										// Reason why they were banned
										switch ($p_reason) {
											case "griefing":   $p_reason2 = "Griefing";			break;
											case "stealing":   $p_reason2 = "Stealing";			break;
											case "hacking":    $p_reason2 = "Hacking";			break;
											case "flying":     $p_reason2 = "Flying";			break;
											case "killaura":   $p_reason2 = "Kill Aura";		break;
											case "quickbow":   $p_reason2 = "Quick Bow";		break;
											case "harassment": $p_reason2 = "Harassment";		break;
											case "spamming":   $p_reason2 = "Spamming";			break;
											case "advertising":$p_reason2 = "Advertising";			break;
											case "abusingpms": $p_reason2 = "Abusing PMs";		break;
											case "other":      $p_reason2 = "Other";			break;
											default:           $p_reason2 = $p_reason; 
										}
										echo "<td class='reason'>" . $p_reason2 . "</td>";

										echo "<td class='placeby'>" . $p_reportby . "</td>";

										echo "</tr></a>";

										/* echo "<div class='modal fade' id='editorder-" . $p_id . "' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
											echo "<div class='modal-dialog modal-lg'>";
												echo "<div class='modal-content'>";
													echo "<div class='modal-header account-overview'>";
														echo "<span type='button' class='close2'><h4>";
															switch ($countProductOrders) {
																case "0": echo "Zero";	break;
																case "1": echo "One";	break;
																case "2": echo "Two";	break;
																case "3": echo "Three";	break;
																case "4": echo "Four";	break;
																case "5": echo "Five";	break;
																case "6": echo "Six";	break;
																case "7": echo "Seven";	break;
																case "8": echo "Eight";	break;
																case "9": echo "Nine";	break;
																case "69": echo "69 hehe :)"; break; // That's right
																default: echo $countProductOrders; 
															}
														echo " Items - $" .  array_sum( $totalPriceOrder[$displayCounter] ) . "</h4><span class='sr-only'>Close</span></span>";
														echo "<h4 class='modal-title' id='myModalLabel'>Order ID Number " . $p_id . "</h4>";
													echo "</div>";
													echo "<div class='modal-body'>";
														echo "<div class='col-md-9'>";
															echo "<div class='thumbnail account-overview modalorder' style='min-height:" . $height . "'>";
																echo "<div class='title row' style='background-color: transparent !important;'>";
																	// Gets the product count for that order
																	$countProductOrders = count($punishmentArray['Order ' . $displayCounter]['ProductInfo']);
																	$displayProductCounter2 = 0; // The total order amount counter
																	$displayProductCounter = 0; // The product display counter

																	// Sets the value of the totalPriceOrder array for later use and later calculation
																	while ($displayProductCounter2 < $countProductOrders) { 
																		$p_price2 = $punishmentArray['Order ' . $displayCounter]['ProductInfo']['Product ' . $displayProductCounter2]['Price'];
																		// Adds to the total price order array the price of each product for later displaying
																		$totalPriceOrder[$displayCounter][$displayProductCounter2] = $p_price2;
																		$displayProductCounter2++;
																	}

																	// displays the total amount of products inside an order
																	echo "<div class='col-md-4 col-md-offset-4 title-right'>";
											
																	echo "</div>";


																	// Displays all the products inside the order
																	while ($displayProductCounter < $countProductOrders) { 
																		echo "<div class='row force-padding'>";
																		echo "<div class='col-md-3'>";
																		echo "		<img src='http://dev.gunsdaily.net/assets/img/store/" . $punishmentArray['Order ' . $displayCounter]['ProductInfo']['Product ' . $displayProductCounter]['Product Number'] . ".png' style='height:75px; width:160px;' alt='Image not found' />";
																		echo "	</div>";

																		echo "<div class='col-md-9'>";
																		echo "<div class='caption'>";
																		$p_number   = $punishmentArray['Order ' . $displayCounter]['ProductInfo']['Product ' . $displayProductCounter]['Product Number'];
																		$p_quantity = $punishmentArray['Order ' . $displayCounter]['ProductInfo']['Product ' . $displayProductCounter]['Quantity'];
																		$p_price    = $punishmentArray['Order ' . $displayCounter]['ProductInfo']['Product ' . $displayProductCounter]['Price'];
																		echo "<h4 class='pull-right'>" . $p_quantity . " ordered. <b>$" . $p_price . "</b></h4>";

																		// Gets product ID for the product that is been echoed in the while loop
																		$whileProductID = $punishmentArray['Order ' . $displayCounter]['ProductInfo']['Product ' . $displayProductCounter]['Product Number'];

																		echo "<h4><a href='#'>" .  $fullProductArray['Product ' . $whileProductID ]['Product Name'] . " </a> ";
																		echo " <i> ProductID #" .  $fullProductArray['Product ' . $whileProductID ]['Product ID'] . "</i></h4>";
																		echo "<p>" .  limit_desc($fullProductArray['Product ' . $whileProductID ]['Product Desc'],25) . "</p>";
																		echo "</div>";
																		echo "</div>";
																		echo "</div>";
																		echo "<hr>";
																		$displayProductCounter++;
																	}

																echo "</div>";
														echo "</div>";
														echo "</div>";
														echo "<div class='col-md-3'>";
														echo "<div class='thumbnail account-overview account-right overview-modal' style='min-height:" . $height . "'>";
														echo "<div class='title2 row'>";

														// Creates date for the order array
														$phpdate = strtotime( $p_time );
														$p_username2 = date( 'l jS', $phpdate );
														$p_username3 = date( 'H:ia', $phpdate );
														echo "<div class='col-md-12 title-right'>Placed <b>" . $p_time . "</b> - <b>" . $p_username2 . " " . date('M') . "</b></div>";
														echo "</div>";
														echo "<div class='row force-padding'>";

														// Displays the order status
														switch ($p_type) {
															case "0": $finalStatus = "We&#39;ve recived your order";		break;
															case "1": $finalStatus = "We&#39;re getting your order ready";	break;
															case "2": $finalStatus = "Order is on it&#39;s way - Dispatched";	break;
															case "3": $finalStatus = "Order Completed";		break;
															default: echo $p_type; 
														}
														echo "<p class='form'>";
														echo "<label class='et_pb_contact_form_label'>Status</label>";
														echo "<input type='text' class='input et_pb_contact_name' readonly='readonly' placeholder='" . $finalStatus . "' name='et_pb_contact_name'>";
														echo "</p>";

														// Displays user comments
														echo "<p class='form'>";
														echo "<label class='et_pb_contact_form_label'>User Comments</label>";
														echo "<input type='text' class='input et_pb_contact_name' readonly='readonly' placeholder='" . $p_reason . "' name='et_pb_contact_name'>";
														echo "</p>";

														// Displays Admin comments
														echo "<p class='form'>";
														echo "<label class='et_pb_contact_form_label'>Admin Comments</label>";
														echo "<input type='text' class='input et_pb_contact_name' readonly='readonly' placeholder='" . $p_time . "' name='et_pb_contact_name'>";
														echo "</p>";

														echo "</div>";
														echo "</div>";
													echo "</div>";
												echo "</div>";

												echo "<div class='modal-footer'>";
													echo "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
													echo "<button type='button' class='btn btn-primary'>Save changes</button>";
													echo "</div>";
												echo "</div>";
											echo "</div>";
										echo "</div>";
										*/
									$displayCounter++;
								}
								?>
							</tbody>
						</table>

					</div>

					<script type="text/javascript">
						var options = {
						  valueNames: [ 'username', 'type', 'duration', 'expires', 'reason', 'placeby' ]
						};

						var userList = new List('users', options);
					</script>
				</div><!--row-->
		    </div><!--container-->


			
		</body>
</html>
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
							<?php

								// Sets the active tab
							//	if ($x == $activeTab ) {
							//		$navbar[$activeTab]["active"] = "current";
							//	}
							//	$navbar[$activeTab]["active"] = "current";

								// Generates the navbar
								foreach($navbar as $x => $x_value) {

									/* 
										if the class array in the main associative array is defined
										then echo it (to display "active" on the page you are on).
									*/
									if (!empty($x_value["active"])) {
										// set $class to echo content
										$class = $x_value["active"];
									} else {
										// else set to echo literally nothing.
										$class = "";
									}



									/* 
										if the url array in the main associative array is defined
										then echo it. This is if you need to use an external link
										that does not match the array key.
									*/
									if (!empty($x_value["url"])) {
										// set $url to echo content
										$url = $x_value["url"];
									} else {
										// else set to echo literally nothing.
										$url = $x;
									}


									// Sets the active tab
									if ($x == $activeTab) {
										$class = "active";
									}

									/*
										if there is some submenu content then echo it,
										else treat it as as a normal tab menu
									*/
									if (!empty($x_value["submenu"])) {
										echo "<li class='" . $class . "'>";
											echo "<a>" . $x . " <i class='fa fa-caret-down'></i></a>";
											echo "<ul>";
											// echos the submenu
											foreach($x_value["submenu"][0] as $y => $y_value) {
												echo "<li><a href='" . $url . "'>" . $x_value["submenu"][0][1] . "</a></li>";
											}
											echo "</ul>";
										echo "</li>";
										
									} else {
										// else treat it as a normal tab
										echo "<li class='" . $class . "'><a href='$url'>";
										echo $x;
										echo "</a></li>";
									}
								}
							?>
						</ul>

					</div>
				</div>
			</nav>
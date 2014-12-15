<?php

	/**
	*
	* @author Luke Brown
	* @link Any issues please contact me@luke.sx
	* @since 07th August 2014
	*
	**/

	require('../cdn/config/config.php');
	include_once('assets/configurations.php'); // Settings for this project (edit this)
	include_once('assets/Main.php'); //	The compress backbone for this project
	include('assets/color.php'); // The background color selection for the importance level
	include('assets/time.php'); // The time frame selector to search by minutes
	include('assets/send.php'); // Makes the magic happen!

?>

<!-- 	
	This code and project was developed under contact by NivanaMC
	To Luke Brown (me@luke.sx). If you like what you see, rather
	than trying to steal my code - contact me and we can work together.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
	<title>Nirvana Infractions</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">


	<?php // 	Loads in external resources 	?>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700">
	<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Oswald:400,300,700' ype='text/css'>


	<?php // 	Favicon loading 	?>
	<link rel="shortcut icon" href="http://cdn.nirvanamc.com/img/favicon.ico">
	<link rel="stylesheet"    href="http://cdn.nirvanamc.com/css/bootstrap.css" type="text/css" />
	<style type="text/css">
	/* /////////////////////////////////////////////
    OVERALL STYLING
///////////////////////////////////////////// */
a:hover {
    text-decoration: none;
}
a {
    text-decoration: none;
    transition: all 0.25s;
    -webkit-transition: all 0.25s;
}

body {
    background: 
        /* top,
        transparent rgb(29, 44, 122), faked with gradient */ 
        linear-gradient( 
            rgba(0, 39, 65, 0.82), 
            #2b3c4e 
        ),
        /* bottom, image */ url(http://puu.sh/aZ1rP/89f025dd7a.png);
        font-family: 'Lato', sans-serif;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    margin:0;
    padding:0;
    height:100%;
}

.side-button {
    margin-top: -3px;
    padding-top: 3px;
    margin-bottom: 0px;
    padding-left: 40px;
    padding-right: 40px;
    border: 4px;
    overflow: hidden;
    position: fixed;
    z-index: 16000000;
    height: 30px;
    right: 36px;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.63);
    box-shadow: 8px 7px 7px rgba(0, 0, 0, 0.25);
}
/* /////////////////////////////////////////////
    NAVBAR STYLING
///////////////////////////////////////////// */

.navbar-brand > img {
    height: 60px;
    margin-top: -12px;
}

.nav {
    /* padding fixes */
    list-style: none;
    margin-left: 0;
    padding-left: 0;
    margin-bottom: -4px !important;
    font-family: 'Oswald', sans-serif !important;
}

.navbar-nirvana{
    /* Holy color! */
    color: #fff;
    background-color: #3d566e;
}


.width-nav-nirvana {
    /* sets the width for the navbar */
    width: 95%;
    max-width: 1440px;
    margin-left: auto;
    margin-right: auto;
}

/* Main Navbar settings for Nirvana */
.nirvana-nav li {
    position: relative;
    text-transform: uppercase;
    color: #fff;
    font-size: 1.6rem;
    margin: 10px;
    vertical-align: middle;
    min-width: 100px;
    text-align: center;
    margin-right: 8px;
    margin-bottom: 12px;
    border-radius: 2px;
    background-color: rgba(201,213,225,.05);
}


.nirvana-nav li > a {
    /* wording inside navbar li box */
    font-weight: 400;
    position: relative;
    display: block;
    color: #ecf0f1 !important;
    background-color: transparent;
    padding: 14px 31px;
    border-radius: 2px;
}

.nav > li > a:hover, 
.nav > li > a:focus {
    /* on hover of normal navbar li box */
    text-decoration: none;
    background-color: #6789ab;
    padding: 14px 31px;
}

.nirvana-nav > .active > a {
    /* if li contains active class */
    color: #fff;
    background-color: #6789ab;
    padding: 14px 31px;
}

.nirvana-nav > .active > a:hover,
.nirvana-nav > .active > a:focus {
    /* on hover of active class */
    color: #fff;
    background-color: #759FCA;;
    padding: 14px 31px;
}




/* Mobile settings for Nirvana */
@media (min-width: 768px !important)
.navbar-toggle {
    /* detects width */
    display: block !important;
}

@media (max-width: 900px)
.navbar-toggle {
    /* detects width */
    display: block !important;
}

.navbar-toggle {
    /* right side navbar drop down */
    position: relative;
    float: right;
    padding: 9px 10px;
    margin-top: 8px;
    margin-right: 33px;
    margin-bottom: 8px;
    background-color: rgba(179, 122, 122, 0);
    background-image: none;
    border: 1px solid rgba(255, 255, 255, 0.65);
    border-radius: 4px;
}


.navbar-toggle .icon-bar {
    /* the three bars on mobile view */
    display: block;
    width: 30px;
    height: 3px;
    border-radius: 1px;
    background-color: #fff;
    }

	</style>


	<?php // 	You must load ajax first for the page to work 	?>
	<script type="text/javascript" src="js/lukebrown-ajax.min.js"></script>

	<?php // 	Loading the css filesize 	?>
	<link rel="stylesheet" href="css/style.css" type="text/css" >
	<link rel="stylesheet" href="css/style.css" type="css/nirvanamc.css" >
	<link rel="stylesheet" href="//craftilldawn.com/buycraft/stylesheet.css">


</head>



<body>

	<?php // 	Navbar Elements		?>
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
					<li class="active"><a href="//infractions.nirvanamc.com">Infractions</a></li>
				</ul>

			</div>
		</div>
	</nav>


	<br>

	<?php // 	Begin Main Body		?>
	<div class="container">
		<div class="grid">

			<div class="grid__item desk--three-thirds">
				<main class="page-main">
					<article class="module">
						<?php echo $timeHeader; ?>
						<div class="grid__item desk--one-third sexysearch">




							<?php // 	The search button with javascript to function it below	?>
							<div class="dropdown button-group__small sexysearch">
								<a href="javascript: ctShowAdvancedSearch('ct');" title="Advanced Search" class="button button--small sexypadding">
									<i class="fa fa-search"></i> Advanced Search 
								</a>
							</div>

							<script type="text/javascript">
								var button = document.getElementById("button");
									button.addEventListener("click" ajaxFunction, false);
								var ajaxFunction = function () {
										javascript: ctShowAdvancedSearch('ct');
								}
							</script>




							<select id="dropdowntime" onchange="gotoPage(this)" value="Select Recent" class="sexytime">
								<?php // The timing options you specified above will be placed here ?>
							</select>

							<script>
							// This is for th drop down menu, specif the options above.
							timeSetting = [<?php echo $timeSetting; ?>];
							text = "";
							var i;
							for (i = 0; i < timeSetting.length; i++) {
							     text  += "<option value='?q=" + timeSetting[i] + "'>" + timeSetting[i] + " Minutes </option>";
							}

							// Print the results
							document.getElementById("dropdowntime").innerHTML = text;
							</script>


							<script type="text/javascript">
								function gotoPage(select){
									window.location = select.value;
								}
							</script>
							

					

						</div>

						<?php echo $out;?>

					</article>
				</main>
			</div>

			<?php 
				// Remove the comment to turn on all my sexy stats :D
				// include 'stats.php'; 

			?>

		</div><!-- grid -->
	</div><!-- container -->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

		
</body>
</html>
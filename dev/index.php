<?php 
// post display settings
$forum_url = 'http://nirvanamc.com';
$limit = 5;
$forum_directory = '../forum/';

$start = 0;
$end = 20;

// post settings
$startTime = microtime(true);
require($forum_directory. '/library/XenForo/Autoloader.php');
XenForo_Autoloader::getInstance()->setupAutoloader($forum_directory . '/library');
GeekPoint_Symfony::initializeXenforo($forum_directory, $startTime);
$nodeModel = XenForo_Model::create('XenForo_Model_Node');
$nodes = $nodeModel->getViewableNodeList();
$nodes_get = array_keys($nodes);
$node_id_list = implode($nodes_get, ',');
$sql_forum = "SELECT `title`, `thread_id`, `view_count`, `reply_count` FROM `xf_thread` WHERE `node_id` IN ($node_id_list) ORDER BY `last_post_date` DESC LIMIT {$limit}";
$topics_query = XenForo_Application::get('db')->fetchAll($sql_forum);


?>

<!DOCTYPE html>
<?php /* echo "<html lang='en' oncontextmenu='return false;'>"; */ ?>
<html lang="en"> 

<head>
	<title>NirvanaMC Minecraft Minigames Network</title>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="The NirvanaMC website for news, stats and more surround the minecraft server" name="description">
	<meta content="Nirvana, NirvanaMC, Minecraft, Server, Multiplayer, Network, Gaming, Cubed Chaos, NMC, Servers, Fun" name="keywords">
	<meta content="Luke Brown" name="author">
	<link href= 'https://fonts.googleapis.com/css?family=Dosis:400,700'rel='stylesheet' type='text/css'>
	<script src="assets/js/jquery.min.js"></script>
	<script src= "//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/app.js"                                               type="text/javascript"></script>
	<link href="assets/img/favicon.ico" rel="icon">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body data-spy="scroll" data-target="#myScrollspy">
<!--
	Website and all web systems developed by Luke Brown me@luke.sx http://luke.sx
	Artwork provided by CraftTillDawn http://craftilldawn.com/

      ___                       ___           ___           ___           ___           ___                 ___           ___     
     /\__\          ___        /\  \         /\__\         /\  \         /\__\         /\  \               /\__\         /\  \    
    /::|  |        /\  \      /::\  \       /:/  /        /::\  \       /::|  |       /::\  \             /::|  |       /::\  \   
   /:|:|  |        \:\  \    /:/\:\  \     /:/  /        /:/\:\  \     /:|:|  |      /:/\:\  \           /:|:|  |      /:/\:\  \  
  /:/|:|  |__      /::\__\  /::\~\:\  \   /:/__/  ___   /::\~\:\  \   /:/|:|  |__   /::\~\:\  \         /:/|:|__|__   /:/  \:\  \ 
 /:/ |:| /\__\  __/:/\/__/ /:/\:\ \:\__\  |:|  | /\__\ /:/\:\ \:\__\ /:/ |:| /\__\ /:/\:\ \:\__\       /:/ |::::\__\ /:/__/ \:\__\
 \/__|:|/:/  / /\/:/  /    \/_|::\/:/  /  |:|  |/:/  / \/__\:\/:/  / \/__|:|/:/  / \/__\:\/:/  /       \/__/~~/:/  / \:\  \  \/__/
     |:/:/  /  \::/__/        |:|::/  /   |:|__/:/  /       \::/  /      |:/:/  /       \::/  /              /:/  /   \:\  \      
     |::/  /    \:\__\        |:|\/__/     \::::/__/        /:/  /       |::/  /        /:/  /              /:/  /     \:\  \     
     /:/  /      \/__/        |:|  |        ~~~~           /:/  /        /:/  /        /:/  /              /:/  /       \:\__\    
     \/__/                     \|__|                       \/__/         \/__/         \/__/               \/__/         \/__/    
      
	Thank you for taking a peak behind the scenes of the NirvanaMC Site.
	Have a fantastic day now.

	Regards, 
	Luke
-->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<?php include'/var/www/html/dev/sections/navbar.php'; ?>
		</nav>

		<div id="jointhedarkside">
			<h4>Come Join Us:<br>
				play.nirvanamc.com</h4>
		</div>
	<div class="wrapper">
		<section id="intro" style="margin-bottom: 600px;">
			<?php include'/var/www/html/dev/sections/intro.php'; ?>
		</section>

		<section class="intrastuff" id="news">
			<?php include'/var/www/html/dev/sections/news.php'; ?>
		</section>

		<section class="intrastuff" id="store">
			<?php include'/var/www/html/dev/sections/store.php'; ?>
		</section>

		<section class="intrastuff" id="spotlight"><div id="container">
			<?php include'/var/www/html/dev/sections/youtube.php'; ?>
		</section>

		<section class="intrastuff" id="stats" style="margin-bottom: -441px !important;">
			<?php include'/var/www/html/dev/sections/stats.php'; ?>
		</section>

		<div class="footer row">

			<div class="col-xs-3 left">
				<h3>
					Connect with: <b>Play.NirvanaMC.Com</b><br>
					TeamSpeak IP: – <b>Ts.NirvanaMC.Com</b>
				</h3>
			</div>
			<div class="col-xs-6">
				<h3>Support Address:<br>
					<b>Support@NirvanaMC.com</b><br>
					Job, Business and other Contact:<br>
					<b>Contact@NirvanaMC.com</b>
				<div class="aff"><br>We Not affiliated with Mojang AB or Microsoft in any way.</div>
				</h3>
			</div>
			<div class="col-xs-3 right">
				<h3><b>NirvanaMC LLC</b><br>Terms of service:<br>
					<b>Store</b> / <b>Website</b>
				Trademark</h3>
			</div>
			<br>
		</div>
	</div>
</div>
</body>
</html>
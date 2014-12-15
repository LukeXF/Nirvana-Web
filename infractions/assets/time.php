<?php

	// The message displayed before the minute.
	$message = "currently showing the last ";

	// Runs the general timeframe selection to sql and adds the message.
	if(isset($_GET['q'])){
		$time2 = $message . $_GET['q'] . " minutes";
		$time1 = $_GET['q'];
	}


	// Special cases of the timeframe selection - this makes it more human.
	switch ($_GET['q']) {
		case 0: // If there is no set search time
			$time2 = "<!--No timeframe selected-->";
			$time1 = "999999999";
			break;
		case 1: // Removes the plural for just one minute. Literally :P
			$time2 = $message . $_GET['q'] . " minute";
			break;
	}

	// If there is any selected time add a " - " before the h2 tag below
	if ($_GET['q'] > 0) {
		$timepre = " - ";
	}

	// Within the last minute
	if ($_GET['q'] < 1 && $_GET['q'] != 0) {
		$time2 = $message . $_GET['q'] * 60 . " seconds";
	}

	// The actual SQL query
	$params['sql_query'] = "SELECT `Name`, `UUID`, `Rank`, `Check`, `Gametype`, `Level`, `Bans`, `Kicks`, `Importance`, `Timestamp` FROM `Infractions` WHERE `Timestamp` > DATE_SUB( NOW( ) , INTERVAL $time1 MINUTE )";

	// Header to display on the page
	$timeHeader = "<h1 class='module__heading h2'>Nirvana Infractions". $timepre . $time2 . "<i> Time is: " . date("G:i a") . "</i></h1>";

	// The timings from the drop down menu.
	$timeSetting="'Search by', '5', '10', '15', '20', '30', '45', '60','999999999'";

?>
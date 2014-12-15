<?php
	// Sets the JSON file
	header('Content-Type: application/json');

	// TWITTER STATS

	// Loads the Twitter SDK system for PHP
	require_once('TwitterAPI.php');

	// Create our Application instance that allows connecting to Twitter.
	$settings = array(
		'oauth_access_token' => "545371167-irULMOms3sQrOaNwsL73EWeXDHLfy6PmYWrE2FMU",
		'oauth_access_token_secret' => "Zv9cS7OsiGXXuARfG92lj6UvO5yQwBjH16e987zEmtpjU",
		'consumer_key' => "7eJxfBBdxGoYf1BcPetNi9whC",
		'consumer_secret' => "pXTgOEQO804GWeZxPmXMqFmKTgrSc3KVs8GEH6M9tpHEL9wMpb"
	);

	// This call will always work since we are fetching public data.
	$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
	$getfield = '?screen_name=NirvanaNetwork';
	$requestMethod = 'GET';

	// Generate responce through the exchange
	$twitter = new TwitterAPIExchange($settings);

	// Build in Oauth and request data
	$response = $twitter
		->setGetfield($getfield)
		->buildOauth($url, $requestMethod)
		->performRequest();

	// Decode json file into array
	$user = json_decode($response);
	$user = objectToArray($user);

	// converts the object into an array
	function objectToArray($d) {
		if (is_object($d)) { $d = get_object_vars($d); }
		if (is_array($d)) { return array_map(__FUNCTION__, $d); } else { return $d; }            
	}


	// echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css'>";
	// echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css'>";
	// echo "<pre>";
	// print_r($user);
	// echo "</pre>";

	// API MAKING

	// Sets the while loop counter
	$twitterlists = 0;

	// Creates the compressed API array
	$twitterJSON = array();

	// while there is less than 5 results
	// retunr the Twitter text and url id
	while ($twitterlists <= 4) {
		$twitterJSON["<a href='" . $user[$twitterlists]['id'] . "'><h5 class='twt'>" . substr($user[$twitterlists]['created_at'], /*0,16*/0,10) . "</h5></a>"] = $user[$twitterlists]['text'];
		$twitterlists++;
	}

	// count the amount of stored results
	// (there should be five)
	$checkFive = count($twitterJSON);


	if ($checkFive == 5) {
		// if there is 5 then return the encoded array		
		echo json_encode($twitterJSON);
	} else {
		// else return an error
		echo "{'There was an error': 'There was an error'}";
	}

	//	echo "<pre>";
	//  print_r($user);
	//  echo "</pre>";

?>
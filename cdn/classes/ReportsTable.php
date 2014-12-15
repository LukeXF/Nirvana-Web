<?php

	// Set's defined names into connection variable to work with the more securer PDO connection
	$userdb = 'root';
	$passdb = '8CFNpC8LJlNznfson4L4HjjrzsCyjVxEhpbRYwkJ0QCJkMjbEl';
	$hostdb = '192.99.201.204';
	$namedb = 'nirvanamc';

	// Creates the array where the order SQL data is stored
	$productsInArray = array();

	// Loads all SQL data and then puts that information into the already created array
	try {
		// Connect and create the PDO object
		$conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
		$conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

		// Define and perform the SQL SELECT query
		$sql  = "SELECT * FROM `Reports`";
		//$sql = "SELECT * FROM `orders` WHERE `user_id` = 1";
		// Connects to the database table and query SQL then sets the result to a variable
		$result = $conn->query($sql);

		$ihatekylecosbrokethis = 1;
		// Create the array the stores the order information belonging to the use selected
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$punishmentArray[ "Punishment " . $ihatekylecosbrokethis  ] ["id"]           = $row['id'];
			$punishmentArray[ "Punishment " . $ihatekylecosbrokethis  ] ["Reported"]     = $row['Reported'];
			$punishmentArray[ "Punishment " . $ihatekylecosbrokethis  ] ["Reporter"]     = $row['Reporter'];
			$punishmentArray[ "Punishment " . $ihatekylecosbrokethis  ] ["Reason"]       = $row['Reason'];
			$punishmentArray[ "Punishment " . $ihatekylecosbrokethis  ] ["Category"]     = $row['Category'];
			$punishmentArray[ "Punishment " . $ihatekylecosbrokethis  ] ["Timestamp"]    = $row['Timestamp'];
			$ihatekylecosbrokethis++;
		}
		//	echo "<pre>";
		//	print_r($punishmentArray);
		//	echo "</pre>";
	
		// Disconnect
		$conn = null;
	}
	// Returns any exceptions or errors that my code will not get...
	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$finalOrderList = array();
	// Counts the total amount of orders that user has
	$countTotalOrders = (count($punishmentArray));
	// Set to one so the the order number can be correctly displayed
	$counterforOrders = 1;
	// Changes the human associative values back to individual numbers for the key values in the array
	$numspunishmentArray = array_keys($punishmentArray);


?>
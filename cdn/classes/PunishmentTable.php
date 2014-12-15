<?php

	// Set's defined names into connection variable to work with the more securer PDO connection
	$userdb = DB_USER;
	$passdb = DB_PASS;
	$hostdb = DB_HOST;
	$namedb = DB_NAME;

	// Creates the array where the order SQL data is stored
	$productsInArray = array();

	// Loads all SQL data and then puts that information into the already created array
	try {
		// Connect and create the PDO object
		$conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
		$conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

		// Define and perform the SQL SELECT query
		$sql  = "SELECT * FROM `punishments`";
		//$sql = "SELECT * FROM `orders` WHERE `user_id` = 1";
		// Connects to the database table and query SQL then sets the result to a variable
		$result = $conn->query($sql);

		// Create the array the stores the order information belonging to the use selected
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$punishmentArray[ "Punishment " . $row['ID']  ] ["ID"]           = $row['ID'];
			$punishmentArray[ "Punishment " . $row['ID']  ] ["UUID"]         = $row['UUID'];
			$punishmentArray[ "Punishment " . $row['ID']  ] ["Username"]         = $row['Username'];
			$punishmentArray[ "Punishment " . $row['ID']  ] ["Type"]         = $row['Type'];
			$punishmentArray[ "Punishment " . $row['ID']  ] ["Duration"]     = $row['Duration'];
			$punishmentArray[ "Punishment " . $row['ID']  ] ["TimeFormat"]   = $row['TimeFormat'];
			$punishmentArray[ "Punishment " . $row['ID']  ] ["Reason"]       = $row['Reason']; 
			$punishmentArray[ "Punishment " . $row['ID']  ] ["TimePlaced"]   = $row['TimePlaced']; 
			$punishmentArray[ "Punishment " . $row['ID']  ] ["ReportBy"]     = $row['ReportBy']; 
			$punishmentArray[ "Punishment " . $row['ID']  ] ["Comments"]     = $row['Comments']; 
		}

	
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
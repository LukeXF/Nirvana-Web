<?php

	$dbname = 'nirvanamc';
	$servername = '192.99.201.204';
	$username = 'root';
	$password = '8CFNpC8LJlNznfson4L4HjjrzsCyjVxEhpbRYwkJ0QCJkMjbEl';

if (isset($_GET['user'])) {

	// connect to the database & PDO Query
	$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$sth = $dbh->prepare("SELECT `UUID` FROM `Players` WHERE `Name` = '". $_GET['user'] . "'");
	$sth->execute();

	// Fetch all of the remaining rows in the result set
	$result = $sth->fetchAll();

	header('Content-Type: application/json');
	$dauuid = array('id' => $result['0']['UUID']);
	$count = count($dauuid['id']);

	if ( $count == 0 ) {
		$dauuid = array('id' => "User has never played on Nirvana :(", 'error' => true);
		echo json_encode($dauuid);
	} else {
		echo json_encode($dauuid);		
	}
	
}


if (isset($_GET['uuid'])) {

	// connect to the database & PDO Query
	$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$sth = $dbh->prepare("SELECT `Name` FROM `Players` WHERE `UUID` = '". $_GET['uuid'] . "'");
	$sth->execute();

	// Fetch all of the remaining rows in the result set
	$result = $sth->fetchAll();

	header('Content-Type: application/json');
	$dauser = array('name' => $result['0']['Name']);
	$count = count($dauser['name']);

	if ( $count == 0 ) {
		$dauser = array('name' => "User has never played on Nirvana :(", 'error' => true);
		echo json_encode($dauser);
	} else {
		echo json_encode($dauser);		
	}
}


if (isset($_GET['uuid_legacy'])) {

	// connect to the database & PDO Query
	$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$sth = $dbh->prepare("SELECT `Name` FROM `Players` WHERE `UUID` = '". $_GET['uuid_legacy'] . "'");
	$sth->execute();

	// Fetch all of the remaining rows in the result set
	$result = $sth->fetchAll();

	header('Content-Type: application/json');
	$dauser = $result['0']['Name'];
	print json_encode($dauser);		

}
<?php

// TODO
function getMysqlConnection($group = 'employee') {
	global $CONFIG;

	$host = $CONFIG['database']['host'];
	$username = $CONFIG['database']['users'][$group]['username'];
	$password = $CONFIG['database']['users'][$group]['password'];
	$database = $CONFIG['database']['database'];

	$mysqli = new mysqli($host, $username, $password, $database);

	if ($mysqli->connect_errno) {
		die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
	}

	return $mysqli;
}

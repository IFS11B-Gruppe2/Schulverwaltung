<?php

$users = file('import/users.csv');

$mysqli = new mysqli('localhost', 'root', 'mysqlserver!');

if ($mysqli->connect_errno) {
	die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}

foreach($users as $index => $row) {
	if (!empty($row)) {
		$fields = explode(',', $row);
		$username = $fields[0];
		$password = $fields[1];
		$group = $fields[3];

		if ($group == 'systemadmin') {
			$groupID = 1;
		} else {
			$groupID = 2;
		}

		$sql = "
			INSERT INTO
				users
				(username, password, PK_Group)
			VALUES
				('" . $username . "', '" . $password . "', " . $groupID . ")
			;
		";

		$mysqli->query($sql);

		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}
	}
}

<?php

$users = file('import/users.csv');

$db = new mysqli('localhost', 'root', 'mysqlserver!');

if ($db->connect_errno) {
	die("Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error);
}

foreach($users as $index => $row) {
	if (!empty($row)) {
		$fields = explode(',', $row);
		$username = $fields[0];
		$password = $fields[1];
		$group = $fields[2];

		if ($group == 'sysadmin') {
			$groupID = 1;
		} else {
			$groupID = 2;
		}

		$sql = "
			INSERT INTO
				stammdatenverwaltung.users
				(username, password, FK_Group)
			VALUES
				('" . $username . "', '" . $password . "', " . $groupID . ")
			;
		";

		$mysqlResult = $db->query($sql);

		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		} else {
			echo '<h3>' . $username . ' importiert!</h3>';
		}
	}
}

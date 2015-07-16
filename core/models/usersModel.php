<?php

class Model_Users {
	static function getAllUsers($db, $orderBy = 'PK_ID') {
		$mysqlResult = null;
		$user = array();
		$sql = '
			SELECT *
			FROM users
			ORDER BY ' . $orderBy . '
		';

		$mysqlResult = $db->query($sql);

		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}

		$mysqlResult->data_seek(0);
		while ($row = $mysqlResult->fetch_assoc()) {
			array_push($user, $row);
		}

		return $user;
	}
	static function createNewUser($db, $userdata){
		$mysqlResult = null;

		$sql = "
			INSERT INTO users (username, password, FK_Group) VALUES ('".$userdata['username']."','".$userdata['password']."',".$userdata['FK_Group'].")
			";

		$mysqlResult = $db->query($sql);

		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}
		return $mysqlResult;
		}
	static function getLoginUser ($db, $logindata){
		$mysqlResult = null;
		$user = array();
		$sql = '
			SELECT u.*, g.name as "group"
			FROM users u
			JOIN groups g on u.FK_Group=g.PK_ID
			WHERE username="'.$logindata['name'].'";';

		$mysqlResult = $db->query($sql);

		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}

		$mysqlResult->data_seek(0);
		$user = $mysqlResult->fetch_assoc();

		return $user;


	}
	static function deleteUser($db, $userdata){
		$mysqlResult = null;

		$sql = 'DELETE FROM users WHERE username="'.$userdata['name'].'";';

		$mysqlResult = $db->query($sql);

		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}

		return $mysqlResult;
	}
	static function updateUsers($db, $name, $userdata){
		$mysqlResult = null;

		$sql = "
			UPDATE users
			SET
				username = '" . $userdata['username'] . "',
				password = '" . $userdata['password'] . "',
				FK_Group = '" . $userdata['FK_Group'] . "'
			WHERE
				username = '" . $name . "'
			;
		";

		$mysqlResult = $db->query($sql);

		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}

		return true;
	}

	static function getUserByName($db, $Name) {
	$mysqlResult = null;
		$user = null;
		$sql = "
			SELECT *
			FROM users
			WHERE username = '".$Name."'
			";

		$mysqlResult = $db->query($sql);
		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}

		$mysqlResult->data_seek(0);
		$user = $mysqlResult->fetch_assoc();

		return $user;
	}
}
